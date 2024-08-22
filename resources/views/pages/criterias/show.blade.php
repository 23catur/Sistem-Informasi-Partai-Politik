@extends('layouts.app')
@section('title', 'Detail ' . $criteria->name)
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Detail {{ $criteria->name }}</h5>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>Kode</th>
                            <th>{{ $criteria->code }}</th>
                        </tr>
                        <tr>
                            <th>Nama</th>
                            <th>{{ $criteria->name }}</th>
                        </tr>
                        <tr>
                            <th>Atribut</th>
                            <th>{{ $criteria->attribute->description }}</th>
                        </tr>
                        <tr>
                            <th>Bobot</th>
                            <th>{{ $criteria->weight }}</th>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header mb-0">
                    <h5 class="card-title mb-0">Sub Kriteria</h5>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('sub-criterias.create', ['criteria_id' => $criteria->id]) }}"
                            class="btn btn-primary"><i
                                data-feather="plus"></i>Tambah</a>
                    <div class="float-end">
                        <form action="">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Nama / Kode"
                                    aria-label="Search nama" aria-describedby="search" name='search' value="{{ request()->search }}">
                                <button class="btn btn-outline-secondary me-2" type="submit" id="search"><i data-feather="search"></i></button>
                                <a href="{{ route('criterias.show', $criteria) }}" class="btn btn-success"><i
                                    data-feather="refresh-ccw"></i></a>
                            </div>
                        </form>
                    </div>
                </div>
                    <div class="table-responsive mt-2">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Nilai</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($subs as $sub)
                                    <tr>
                                        <td>
                                            {{ ($subs->currentPage() - 1) * $subs->perPage() + $loop->iteration }}
                                        </td>
                                        <td>{{ $sub->name }}</td>
                                        <td>{{ $sub->value }}</td>
                                        <td width="200">
                                            <a href="{{ route('sub-criterias.edit', $sub) }}" class="btn btn-warning">Edit</a>
                                            <a href="{{ route('sub-criterias.destroy', $sub) }}" class="btn btn-danger" onclick="return confirm('Apa kamu yakin?')">Hapus</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <th colspan="4" class="text-center">Tidak ada data</th>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $subs->withQueryString()->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
