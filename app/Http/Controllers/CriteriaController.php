<?php

namespace App\Http\Controllers;

use App\Enums\CriteriaAttribute;
use App\Http\Requests\CriteriaRequest;
use App\Models\Criteria;
use App\Models\SubCriteria;
use Illuminate\Http\Request;

class CriteriaController extends Controller
{
    public function index(Request $request)
    {
        $criterias = Criteria::when($request->search, fn ($q) => $q->search('name', $request->search)->search('code', $request->search, 'or'))->paginate(10);

        return view('pages.criterias.index', compact('criterias'));
    }

    public function create()
    {
        $criteria = new Criteria();
        $attributes = CriteriaAttribute::asSelectArray();

        return view('pages.criterias.form', compact('criteria', 'attributes'));
    }

    public function store(CriteriaRequest $request)
    {
        $data = $request->validated();

        Criteria::create([
            'code' => $data['kode'],
            'name' => $data['nama'],
            'attribute' => $data['atribut'],
            'weight' => $data['bobot'],
            'description' => $data['keterangan'],
        ]);

        return redirect()
            ->route('criterias.index')
            ->with('success', 'Kriteria berhasil ditambah!');
    }

    public function show(Request $request, Criteria $criteria)
    {
        $subs = SubCriteria::when($request->search, fn ($q) => $q->search('name', $request->search))
            ->where('criteria_id', $criteria->id)
            ->paginate();

        return view('pages.criterias.show', compact('criteria', 'subs'));
    }

    public function edit(Criteria $criteria)
    {
        $attributes = CriteriaAttribute::asSelectArray();

        return view('pages.criterias.form', compact('criteria', 'attributes'));
    }

    public function update(CriteriaRequest $request, Criteria $criteria)
    {
        $data = $request->validated();

        $criteria->update([
            'code' => $data['kode'],
            'name' => $data['nama'],
            'attribute' => $data['atribut'],
            'weight' => $data['bobot'],
            'description' => $data['keterangan'],
        ]);

        return redirect()
            ->route('criterias.index')
            ->with('success', 'Kriteria berhasil diubah!');
    }

    public function destroy(Criteria $criteria)
    {
        $criteria->delete();

        return redirect()
            ->route('criterias.index')
            ->with('success', 'Kriteria berhasil dihapus!');
    }
}
