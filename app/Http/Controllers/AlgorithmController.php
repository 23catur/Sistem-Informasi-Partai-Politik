<?php

namespace App\Http\Controllers;

use App\Enums\CriteriaAttribute;
use App\Exports\ResultExport;
use App\Jobs\SendResultJob;
use App\Models\Alternative;
use App\Models\alternativeAddress;
use App\Models\AlternativeCriteria;
use App\Models\AlternativeCriteriaComponent;
use App\Models\AlternativeDocument;
use App\Models\AlternativeDocumentSchool;
use App\Models\alternativeProfile;
use App\Models\Criteria;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class AlgorithmController extends Controller
{
    public function index()
    {
        $alternatives = Alternative::with('subCriteria', 'criteria')->whereHas('subCriteria')->get();

        if (count($alternatives) < 3) {
            return redirect(route('alternatives.index'))->with(['error' => 'Jumlah alternative minimal 3 dan sudah mengisi kriteria.']);
        }

        return view('pages.algorithm', $this->algorithm());

    }

    public function algorithm()
    {
        $alternatives = Alternative::with('subCriteria', 'criteria')->whereHas('subCriteria')->get();

        if (count($alternatives) < 3) {
            return redirect(route('alternatives.index'))->with(['error' => 'Jumlah alternative minimal 3 dan sudah mengisi kriteria.']);
        }

        $assesments = [];

        foreach ($alternatives as $key => $alternative) {
            $assesments[] = [
                'code' => $alternative->code,
                'name' => $alternative->name,
                'criteria' => $alternative->subCriteria()->pluck('value', 'sub_criterias.criteria_id')->toArray(),
                'sub_criteria' => $alternative->subCriteria->toArray(),
            ];
        }

        $criterias = Criteria::with('subs')->orderBy('id')->get();

        $weight = [];
        $attribute = [];

        $err = [];

        foreach ($assesments as $assesment) {

            if (count($criterias) != count($assesment['criteria'])) {

                foreach ($criterias as $criteria) {

                    if (! array_key_exists($criteria->id, $assesment['criteria'])) {

                        $name = $assesment['code'].'_'.str_replace(' ', '_', $assesment['name']);

                        $err[$name][] = $criteria->name;

                    }
                }
            }
        }

        if (! empty($err)) {
            return compact('err');
        }

        $collectCriteria = collect($criterias);
        $weight = $collectCriteria->pluck('weight', 'id')->toArray();
        $attribute = $collectCriteria->pluck('attribute', 'id')->toArray();

        $vector_s_total = 0;
        $name = [];

        foreach ($assesments as $key => $assesment) {
            $assesments[$key]['vector_s'] = 1;
            foreach ($assesment['criteria'] as $criteriaId => $value) {
                $nWeight = $weight[$criteriaId] / $collectCriteria->sum('weight');
                $res_vektor_s = round(pow($value, $attribute[$criteriaId] == CriteriaAttribute::Benefit ? $nWeight : -$nWeight), 2);
                $assesments[$key]['res_vector_s'][$criteriaId] = $res_vektor_s;
                $assesments[$key]['vector_s'] *= $res_vektor_s;
            }
            $vector_s_total += round($assesments[$key]['vector_s'], 2);
        }

        foreach ($assesments as $key => $assesment) {
            $assesments[$key]['res_vector_v'] = round($assesment['vector_s'] / $vector_s_total, 2);
        }

        usort($assesments, function ($a, $b) {
            return $b['res_vector_v'] <=> $a['res_vector_v'];
        });

        return compact('assesments', 'criterias', 'weight');
    }

    public function rest()
    {
        $alternatives = Alternative::with('subCriteria', 'criteria')->whereHas('subCriteria')->get();

        if (count($alternatives) < 3) {
            return redirect(route('alternatives.index'))->with(['error' => 'Jumlah alternative minimal 3 dan sudah mengisi kriteria.']);
        }

        $limitData = array_key_exists('kuota', request()->all()) ? request()->kuota : count($this->algorithm()['assesments']);

        $newAsse = collect($this->algorithm()['assesments'])->take($limitData);

        $showPerPage = 15;

        $page = array_key_exists('page', request()->all()) ? request()->page : 1;

        $items = $newAsse->forPage(request()->page, $showPerPage);

        $assesments = new LengthAwarePaginator($items, $newAsse->count(), $showPerPage, $page, [
            'path' => route('algorithm.result'),
        ]);

        return view('pages.result', [
            'assesments' => $assesments,
            'criterias' => $this->algorithm()['criterias'],
            'weight' => $this->algorithm()['weight'],
        ]);
    }

    public function export()
    {
        $limitData = array_key_exists('kuota', request()->all()) ? request()->kuota : count($this->algorithm()['assesments']);

        $newAsse = collect($this->algorithm()['assesments'])->take($limitData)->keyBy('code');

        $alternatives = Alternative::with('criteria', 'subcriteria', 'profile.address')->whereIn('code', $newAsse->pluck('code')->toArray())->get();

        $alternatives = $alternatives->map(function ($alternative) {
            $alternative->profile->address['full_address'] = $alternative->profile->address->full_address;

            return $alternative;
        });

        return Excel::download(new ResultExport($newAsse->toArray(), $alternatives), 'hasil.xlsx');
    }

    public function resetData()
    {
        AlternativeCriteria::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        Alternative::truncate();
        alternativeAddress::truncate();
        AlternativeCriteriaComponent::truncate();
        AlternativeDocument::truncate();
        alternativeProfile::truncate();
        AlternativeDocumentSchool::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');

        $allFiles = Storage::allFiles('public');
        $allLivewire = Storage::allFiles('livewire-tmp');

        Storage::delete(array_merge($allFiles, $allLivewire));

        return redirect()->back()->with('success', 'Berhasil mereset data.');

    }

    public function sendMailResult()
    {
        $limitData = array_key_exists('kuota', request()->all()) ? request()->kuota : count($this->algorithm()['assesments']);

        $newAsse = collect($this->algorithm()['assesments'])->keyBy('code');

        $alternatives = Alternative::with('criteria', 'subcriteria', 'profile.address')->whereIn('code', $newAsse->pluck('code')->toArray())->get();

        $alternatives = $alternatives->map(function ($alternative) {
            $alternative->profile->address['full_address'] = $alternative->profile->address->full_address;

            return $alternative;
        });

        dispatch(new SendResultJob($newAsse->toArray(), $alternatives, $limitData));

        return redirect()->back()->with('success', 'Berhasil Mengirim Informasi Hasil Seleksi');
    }
}
