@extends('layouts.app')
@section('title', ($criteria->id ? 'Edit ' : 'Tambah ') . 'Kriteria' )
@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">{{ $criteria->id ? 'Edit' : 'Tambah' }} Kriteria</h5>
        </div>
        <div class="card-body">
            <form action="{{ $criteria->id ? route('criterias.update', $criteria) : route('criterias.store') }}" method="post">
                @csrf
                @if ($criteria->id)
                    @method('PUT')
                @endif
                <div class="form-group mb-3">
                    <label class="form-label">Kode</label>
                    <input type="text" name="kode" class="form-control @error('kode') is-invalid @enderror"
                        value="{{ old('kode') ?? $criteria->code }}">
                    @error('kode')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                        value="{{ old('nama') ?? $criteria->name }}">
                    @error('nama')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Atribut</label>
                    <select name="atribut" class="form-control">
                        @foreach ($attributes as $key => $item)
                            <option value="{{ $key }}"
                                {{ old('attribute') == $key || $criteria->attribute?->value == $key ? 'selected' : '' }}>
                                {{ $item }}</option>
                        @endforeach
                    </select>
                    @error('atribut')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Bobot</label>
                    <input type="number" name="bobot" class="form-control @error('bobot') is-invalid @enderror"
                        value="{{ old('bobot') ?? $criteria->weight }}">
                    @error('bobot')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="form-label">Keterangan</label>
                    <textarea name="keterangan" class="form-control" cols="30" rows="10">{{ old('description') ?? $criteria->description }}</textarea>
                </div>
                <button class="btn btn-success" type="submit">Simpan</button>
                <a href="{{ route('criterias.index') }}" class="btn btn-warning">Batal</a>
            </form>
        </div>
    </div>
@endsection
