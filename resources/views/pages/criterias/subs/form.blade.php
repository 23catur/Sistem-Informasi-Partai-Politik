@extends('layouts.app')
@section('title', ($sub_criteria->id ? 'Edit ' : 'Tambah ') . 'Sub Kriteria' )
@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">{{ $sub_criteria->id ? 'Edit' : 'Tambah' }} Sub Kriteria</h5>
        </div>
        <div class="card-body">
            <form action="{{ $sub_criteria->id ? route('sub-criterias.update', $sub_criteria) : route('sub-criterias.store') }}" method="post">
                @csrf
                @if ($sub_criteria->id)
                    @method('PUT')
                @endif
                <div class="form-group mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                        value="{{ old('nama') ?? $sub_criteria->name }}">
                    @error('nama')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Nilai</label>
                    <input type="number" name="nilai" class="form-control @error('nilai') is-invalid @enderror"
                        value="{{ old('nilai') ?? $sub_criteria->value }}">
                    @error('nilai')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <input type="hidden" value="{{ $criteria_id }}" name="kriteria">
                <button class="btn btn-success" type="submit">Simpan</button>
                <a href="{{ route('criterias.show', $criteria_id) }}" class="btn btn-warning">Batal</a>
            </form>
        </div>
    </div>
@endsection
