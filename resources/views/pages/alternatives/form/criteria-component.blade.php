@extends('layouts.app')
@section('title', ($alternative->profile?->components ? 'Edit ' : 'Tambah ') . 'Komponen Kriteria')
@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">{{ $alternative->profile?->components ? 'Edit' : 'Tambah' }} Komponen Kriteria</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('alternatives.criteria-component.store', $alternative) }}"
                method="post">
                @csrf
                @foreach ($criteriaComponents as $key => $criteriaComponent)
                    @php
                        $cri = explode('-', $criteriaComponent);
                        $com = explode(',', $cri[1]);
                    @endphp
                    <div class="form-group mb-3">
                        <label class="form-label">{{ $cri[0] }}</label>
                        @foreach ($com as $k => $item)
                            <input type="text" name="comp[{{ $key }}][]" class="form-control mb-2" placeholder="{{ $item }}" value="{{ isset($components[$key][$k]) ? $components[$key][$k] : '' }}">
                        @endforeach
                    </div>
                @endforeach
                <button class="btn btn-success" type="submit">Simpan</button>
                <a href="{{ route('alternatives.show', $alternative) }}" class="btn btn-warning">Batal</a>
            </form>
        </div>
    </div>
@endsection
