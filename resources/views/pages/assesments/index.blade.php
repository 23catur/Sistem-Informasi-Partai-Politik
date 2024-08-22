@extends('layouts.app')
@section('title', 'Penilaian Alternatif')
@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">Penilaian Alternatif</h5>
        </div>
        <div class="card-body">
            <div class="d-flex justify-content-end">
                <div class="float-end">
                    <form action="">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Nama / Kode"
                                aria-label="Search nama" aria-describedby="search" name='search' value="{{ request()->search }}">
                            <button class="btn btn-outline-secondary me-2" type="submit" id="search"><i data-feather="search"></i></button>
                            <a href="{{ route('alternatives.index') }}" class="btn btn-success"><i
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
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($alternatives as $alternative)
                            <tr>
                                <td width="50">
                                    {{ ($alternatives->currentPage() - 1) * $alternatives->perPage() + $loop->iteration }}
                                </td>
                                <td width="100">{{ $alternative->code }}</td>
                                <td>{{ $alternative->name }}</td>
                                <td width="50">
                                    <a href="{{ route('alternatives.assesments.edit', $alternative) }}" class="btn btn-primary">Nilai</a>
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
            {{ $alternatives->withQueryString()->links() }}
        </div>
    </div>
@endsection
