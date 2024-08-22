<?php

namespace App\Http\Controllers;

use App\Enums\CriteriaComponent;
use App\Enums\DocumentType;
use App\Enums\Gender;
use App\Enums\Religion;
use App\Http\Requests\AlternativeRequest;
use App\Http\Requests\DocumentRequest;
use App\Models\Alternative;
use App\Models\AlternativeCriteriaComponent;
use App\Models\AlternativeDocumentSchool;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AlternativeController extends Controller
{
    public function index(Request $request)
    {
        $alternatives = Alternative::when($request->search, fn ($q) => $q->search('name', $request->search)->search('code', $request->search, 'or'))->paginate(10);

        return view('pages.alternatives.index', compact('alternatives'));
    }

    public function create()
    {
        $alternative = new Alternative();
        $gender = Gender::asSelectArray();
        $religion = Religion::asSelectArray();

        return view('pages.alternatives.form', compact('alternative', 'gender', 'religion'));
    }

    public function store(AlternativeRequest $request)
    {
        $data = $request->validated();

        $alternative = Alternative::create([
            'code' => $data['kode'],
            'name' => $data['nama'],
        ]);

        $alternative->profile()->create([
            'no_kk' => $data['no_kk'],
            'nik' => $data['nik'],
            'place_of_birth' => $data['tempat_lahir'],
            'date_of_birth' => $data['tanggal_lahir'],
            'gender' => $data['jenis_kelamin'],
            'religion' => $data['agama'],
            'phone_number' => $data['no_hp'],
            'email' => $data['email'],
        ]);

        return redirect()
            ->route('alternatives.index')
            ->with('success', 'Data berhasil ditambah!');
    }

    public function show(Alternative $alternative)
    {
        $criteriaComponents = CriteriaComponent::asSelectArray();
        $documentTypes = DocumentType::asSelectArray();

        return view('pages.alternatives.show', compact('alternative', 'criteriaComponents', 'documentTypes'));
    }

    public function edit(Alternative $alternative)
    {
        $gender = Gender::asSelectArray();
        $religion = Religion::asSelectArray();

        return view('pages.alternatives.form', compact('alternative', 'gender', 'religion'));
    }

    public function update(AlternativeRequest $request, Alternative $alternative)
    {
        $data = $request->validated();

        $alternative->update([
            'code' => $data['kode'],
            'name' => $data['nama'],
        ]);

        $alternative->profile()->update([
            'no_kk' => $data['no_kk'],
            'nik' => $data['nik'],
            'place_of_birth' => $data['tempat_lahir'],
            'date_of_birth' => $data['tanggal_lahir'],
            'gender' => $data['jenis_kelamin'],
            'religion' => $data['agama'],
            'phone_number' => $data['no_hp'],
            'email' => $data['email'],
        ]);

        return redirect()
            ->route('alternatives.index')
            ->with('success', 'Data berhasil diubah!');
    }

    public function destroy(Alternative $alternative)
    {
        $alternative->delete();

        return redirect()
            ->route('alternatives.index')
            ->with('success', 'Data berhasil dihapus!');
    }

    public function criteriaComponentForm(Alternative $alternative)
    {
        $criteriaComponents = CriteriaComponent::asSelectArray();

        $components = [];

        foreach ($alternative->profile->components as $key => $value) {
            $components[$value->type->value] = [$value->name_person, $value->val_1, $value->val_2];
        }

        return view('pages.alternatives.form.criteria-component', compact('alternative', 'criteriaComponents', 'components'));
    }

    public function criteriaComponentCreate(Request $request, Alternative $alternative)
    {
        $data = [];

        foreach ($request->comp as $key => $value) {
            $data[] = [
                'alternative_profile_id' => $alternative->profile?->id,
                'name_person' => $value[0] ?? '-',
                'val_1' => $value[1] ?? '-',
                'val_2' => isset($value[2]) ? $value['2'] : '-',
                'type' => $key,
            ];
        }

        AlternativeCriteriaComponent::upsert($data, ['alternative_profile_id']);

        return redirect()->route('alternatives.show', $alternative)->with('success', 'Berhasil memperbaharui komponen kriteria');
    }

    public function uploadDocumentForm(Alternative $alternative)
    {
        $documentTypes = DocumentType::asSelectArray();

        return view('pages.alternatives.form.document', compact('alternative', 'documentTypes'));
    }

    public function uploadDocumentStore(DocumentRequest $request, Alternative $alternative)
    {
        $data = $request->validated();
        $documentSchool = [];

        $documents = $alternative->profile?->document;

        $ktp = $documents->ktp ?? '';
        $bakalcalon = $documents->bakalcalon ?? '';
        $ijazah = $documents->ijazah ?? '';
        $pemilih = $documents->pemilih ?? '';
        $kta = $documents->kta ?? '';
        $foto = $documents->foto ?? '';
        $jasmani = $documents->jasmani ?? '';
        $rohani = $documents->rohani ?? '';
        $narkoba = $documents->narkoba ?? '';
        $mantan = $documents->mantan ?? '';
        $terpidana = $documents->terpidana ?? '';
        $mundur = $documents->mundur ?? '';
        $pengadilan = $documents->pengadilan ?? '';
        $beda_parpol = $documents->beda_parpol ?? '';
        $pemilu = $documents->pemilu ?? '';
        $gelar = $documents->gelar ?? '';

        if ($request->file('ktp')) {
            $file = $request->file('ktp');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->storeAs('public/document/ktp', $filename);
            $ktp = $filename;
            if ($alternative->profile?->document?->ktp) {
                Storage::delete('public/document/ktp/'.$alternative->profile?->document->ktp);
            }
        }

        if ($request->file('bakalcalon')) {
            $file = $request->file('bakalcalon');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->storeAs('public/document/bakalcalon', $filename);
            $bakalcalon = $filename;
            if ($alternative->profile?->document?->bakalcalon) {
                Storage::delete('public/document/bakalcalon/'.$alternative->profile?->document->bakalcalon);
            }
        }

        if ($request->file('ijazah')) {
            $file = $request->file('ijazah');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->storeAs('public/document/ijazah', $filename);
            $ijazah = $filename;
            if ($alternative->profile?->document?->education) {
                Storage::delete('public/document/ijazah/'.$alternative->profile?->document->ijazah);
            }
        }

        if ($request->file('pemilih')) {
            $file = $request->file('pemilih');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->storeAs('public/document/pemilih', $filename);
            $pemilih = $filename;
            if ($alternative->profile?->document?->pemilih) {
                Storage::delete('public/document/pemilih/'.$alternative->profile?->document->pemilih);
            }
        }

        if ($request->file('kta')) {
            $file = $request->file('kta');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->storeAs('public/document/kta', $filename);
            $kta = $filename;
            if ($alternative->profile?->document?->kta) {
                Storage::delete('public/document/kta/'.$alternative->profile?->document->kta);
            }
        }

        if ($request->file('foto')) {
            $file = $request->file('foto');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->storeAs('public/document/foto', $filename);
            $foto = $filename;
            if ($alternative->profile?->document?->foto) {
                Storage::delete('public/document/foto/'.$alternative->profile?->document->foto);
            }
        }

        if ($request->file('jasmani')) {
            $file = $request->file('jasmani');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->storeAs('public/document/jasmani', $filename);
            $jasmani = $filename;
            if ($alternative->profile?->document?->jasmani) {
                Storage::delete('public/document/jasmani/'.$alternative->profile?->document->jasmani);
            }
        }

        if ($request->file('rohani')) {
            $file = $request->file('rohani');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->storeAs('public/document/rohani', $filename);
            $rohani = $filename;
            if ($alternative->profile?->document?->rohani) {
                Storage::delete('public/document/rohani/'.$alternative->profile?->document->rohani);
            }
        }

        if ($request->file('narkoba')) {
            $file = $request->file('narkoba');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->storeAs('public/document/narkoba', $filename);
            $narkoba = $filename;
            if ($alternative->profile?->document?->narkoba) {
                Storage::delete('public/document/narkoba/'.$alternative->profile?->document->narkoba);
            }
        }

        if ($request->file('mantan')) {
            $file = $request->file('mantan');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->storeAs('public/document/mantan', $filename);
            $mantan = $filename;
            if ($alternative->profile?->document?->mantan) {
                Storage::delete('public/document/mantan/'.$alternative->profile?->document->mantan);
            }
        }

        if ($request->file('terpidana')) {
            $file = $request->file('terpidana');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->storeAs('public/document/terpidana', $filename);
            $terpidana = $filename;
            if ($alternative->profile?->document?->terpidana) {
                Storage::delete('public/document/terpidana/'.$alternative->profile?->document->terpidana);
            }
        }

        if ($request->file('mundur')) {
            $file = $request->file('mundur');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->storeAs('public/document/mundur', $filename);
            $mundur = $filename;
            if ($alternative->profile?->document?->mundur) {
                Storage::delete('public/document/mundur/'.$alternative->profile?->document->mundur);
            }
        }

        if ($request->file('pengadilan')) {
            $file = $request->file('pengadilan');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->storeAs('public/document/pengadilan', $filename);
            $pengadilan = $filename;
            if ($alternative->profile?->document?->pengadilan) {
                Storage::delete('public/document/pengadilan/'.$alternative->profile?->document->pengadilan);
            }
        }

        if ($request->file('beda_parpol')) {
            $file = $request->file('beda_parpol');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->storeAs('public/document/beda_parpol', $filename);
            $beda_parpol = $filename;
            if ($alternative->profile?->document?->beda_parpol) {
                Storage::delete('public/document/beda_parpol/'.$alternative->profile?->document->beda_parpol);
            }
        }

        if ($request->file('pemilu')) {
            $file = $request->file('pemilu');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->storeAs('public/document/pemilu', $filename);
            $pemilu = $filename;
            if ($alternative->profile?->document?->pemilu) {
                Storage::delete('public/document/pemilu/'.$alternative->profile?->document->pemilu);
            }
        }

        if ($request->file('gelar')) {
            $file = $request->file('gelar');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->storeAs('public/document/gelar', $filename);
            $gelar = $filename;
            if ($alternative->profile?->document?->gelar) {
                Storage::delete('public/document/gelar/'.$alternative->profile?->document->gelar);
            }
        }

        try {
            DB::beginTransaction();
            $data = [
                'ktp' => $ktp,
                'bakalcalon' => $bakalcalon,
                'ijazah' => $ijazah,
                'pemilih' => $pemilih,
                'kta' => $kta,
                'foto' => $foto,
                'jasmani' => $jasmani,
                'rohani' => $rohani,
                'narkoba' => $narkoba,
                'mantan' => $mantan,
                'terpidana' => $terpidana,
                'mundur' => $mundur,
                'pengadilan' => $pengadilan,
                'beda_parpol' => $beda_parpol,
                'pemilu' => $pemilu,
                'gelar' => $gelar,
            ];
            if ($alternative->profile?->document) {
                $alternative->profile?->document()->update($data);
            } else {
                $alternative->profile?->document()->create($data);
            }

            $alternative->refresh();

            // if ($request->file('raport_sd')) {
            //     $file = $request->file('raport_sd');
            //     $filename = date('YmdHi').$file->getClientOriginalName();
            //     $file->storeAs('public/document/raport_sd', $filename);
            //     $documentSchool[] = ['alternative_document_id' => $alternative->profile?->document->id, 'raport' => $filename, 'type' => DocumentType::SD];
            // }

            // if ($request->file('raport_smp')) {
            //     $file = $request->file('raport_smp');
            //     $filename = date('YmdHi').$file->getClientOriginalName();
            //     $file->storeAs('public/document/raport_smp', $filename);
            //     $documentSchool[] = ['alternative_document_id' => $alternative->profile?->document->id, 'raport' => $filename, 'type' => DocumentType::SMP];
            // }

            // if ($request->file('raport_sma')) {
            //     $file = $request->file('raport_sma');
            //     $filename = date('YmdHi').$file->getClientOriginalName();
            //     $file->storeAs('public/document/raport_sma', $filename);
            //     $documentSchool[] = ['alternative_document_id' => $alternative->profile?->document->id, 'raport' => $filename, 'type' => DocumentType::SMA];
            // }

            // if (count($documentSchool) > 0) {
            //     AlternativeDocumentSchool::upsert($documentSchool, ['alternative_document_id', 'type']);
            // }

            DB::commit();

            return redirect()->route('alternatives.show', $alternative)->with('success', 'Dokumen berhasil diupload');
        } catch (Exception $e) {
            DB::rollback();

            return redirect()->back()->with('error', 'Gagal Upload Dokumen');
        }
    }
}
