<?php

namespace App\Http\Controllers;

use App\Http\Requests\AssesmentRequest;
use App\Models\Alternative;
use App\Models\Criteria;
use Illuminate\Http\Request;
use App\Enums\UserLevel;
use Illuminate\Support\Facades\DB;

class AssesmentController extends Controller
{
    public function index(Request $request)
    {
        $alternatives = Alternative::when($request->search, fn ($q) => $q->search('name', $request->search)->search('code', $request->search, 'or'))->paginate(10);

        return view('pages.assesments.index', compact('alternatives'));
    }

    public function edit(Alternative $alternative)
    {
        $criterias = Criteria::with('subs')->orderBy('id')->get();

        $data = $alternative->criteria()->pluck('sub_criteria_id', 'criteria_id');

        return view('pages.assesments.form', compact('alternative', 'criterias', 'data'));
    }

    public function syncCriteria(AssesmentRequest $request, Alternative $alternative)
{
    $data = [];
    foreach ($request->validated()['criterias'] as $criteriaId => $subId) {
        $data[$criteriaId] = ['sub_criteria_id' => $subId];
    }
    $alternative->criteria()->sync($data);
   

    if ($request->has('status')) {
        $status = $request->input('status');
        DB::table('alternative_criterias')
            ->where('alternative_id', $alternative->id)
            ->update(['status' => $status]);
    } else {
        // Jika tidak ada input status, default ke 'Validasi'
        DB::table('alternative_criterias')
            ->where('alternative_id', $alternative->id)
            ->update(['status' => 'Belum Validasi']);
    }

    // return redirect()->route('alternatives.assesments.index')->with('success', 'Berhasil memberi penilaian!');

    $user = auth()->user();
    if ($user->level->value == UserLevel::Admin) {
        $message = 'Berhasil memberi penilaian!';
    } elseif ($user->level->value == UserLevel::Superuser) {
        $message = 'Berhasil melakukan Validasi!';
    } else {
        $message = 'Aksi berhasil!';
    }

    return redirect()->route('alternatives.assesments.index')->with('success', $message);

}

}
