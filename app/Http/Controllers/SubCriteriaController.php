<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubCriteriaRequest;
use App\Models\SubCriteria;
use Illuminate\Http\Request;

class SubCriteriaController extends Controller
{
    public function create(Request $request)
    {
        return view('pages.criterias.subs.form', [
            'criteria_id' => $request->criteria_id,
            'sub_criteria' => new SubCriteria(),
        ]);
    }

    public function store(SubCriteriaRequest $request)
    {
        $data = $request->validated();

        SubCriteria::create([
            'name' => $data['nama'],
            'value' => $data['nilai'],
            'criteria_id' => $data['kriteria'],
        ]);

        return redirect()->route('criterias.show', $data['kriteria'])->with('success', 'Sub kriteria berhasil ditambah!');
    }

    public function edit(SubCriteria $subCriteria)
    {
        return view('pages.criterias.subs.form', [
            'criteria_id' => $subCriteria->criteria_id,
            'sub_criteria' => $subCriteria,
        ]);
    }

    public function update(SubCriteriaRequest $request, SubCriteria $subCriteria)
    {
        $data = $request->validated();

        $subCriteria->update([
            'name' => $data['nama'],
            'value' => $data['nilai'],
            'criteria_id' => $data['kriteria'],
        ]);

        return redirect()->route('criterias.show', $data['kriteria'])->with('success', 'Sub kriteria berhasil diubah!');
    }

    public function destroy(SubCriteria $subCriteria)
    {
        $criteria_id = $subCriteria->criteria_id;

        $subCriteria->delete();

        return redirect()->route('criterias.show', $criteria_id)->with('success', 'Sub kriteria berhasil dihapus!');
    }
}
