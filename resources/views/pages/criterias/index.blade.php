@extends('layouts.app')
@section('title', 'Kriteria')
@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">Kriteria</h5>
        </div>
        <div class="card-body">
            <div class="d-flex justify-content-between">
                    <a href="{{ route('criterias.create') }}"
                        class="btn btn-primary"><i
                            data-feather="plus"></i>Tambah</a>
                <div class="float-end">
                    <form action="">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Nama / Kode"
                                aria-label="Search nama" aria-describedby="search" name='search' value="{{ request()->search }}">
                            <button class="btn btn-outline-secondary me-2" type="submit" id="search"><i data-feather="search"></i></button>
                            <a href="{{ route('criterias.index') }}" class="btn btn-success"><i
                                data-feather="refresh-ccw"></i></a>
                        </div>
                    </form>
                </div>
            </div>
            <div class="table-responsive mt-3">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Atribut</th>
                            <th>Bobot</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($criterias as $criteria)
                            <tr>
                                <td>
                                    {{ ($criterias->currentPage() - 1) * $criterias->perPage() + $loop->iteration }}
                                </td>
                                <td>{{ $criteria->code }}</td>
                                <td>{{ $criteria->name }}</td>
                                <td>{{ $criteria->attribute->description }}</td>
                                <td>{{ $criteria->weight }}</td>
                                <td>{{ $criteria->description }}</td>
                                <td width="250">
                                    <a href="{{ route('criterias.edit', $criteria) }}" class="btn btn-warning">Edit</a>
                                    <a href="{{ route('criterias.show', $criteria) }}" class="btn btn-info">Detail</a>
                                    <a href="{{ route('criterias.destroy', $criteria) }}" class="btn btn-danger" onclick="return confirm('Apa kamu yakin?')">Hapus</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">Tidak ada data</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            {{ $criterias->withQueryString()->links() }}
        </div>
    </div>
@endsection
