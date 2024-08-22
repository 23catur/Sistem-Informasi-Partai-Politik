@extends('layouts.app')
@section('title', 'Pengguna')
@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">Pengguna</h5>
        </div>
        <div class="card-body">
            <div class="d-flex justify-content-between">
                    <a href="{{ route('users.create') }}"
                        class="btn btn-primary"><i
                            data-feather="plus"></i>Tambah</a>
                <div class="float-end">
                    <form action="">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Cari"
                                aria-label="Search nama" aria-describedby="search" name='search' value="{{ request()->search }}">
                            <button class="btn btn-outline-secondary me-2" type="submit" id="search"><i data-feather="search"></i></button>
                            <a href="{{ route('users.index') }}" class="btn btn-success"><i
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
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Level</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                            <tr>
                                <td>
                                    {{ ($users->currentPage() - 1) * $users->perPage() + $loop->iteration }}
                                </td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->level->description }}</td>
                                <td width="250">
                                    <a href="{{ route('users.edit', $user) }}" class="btn btn-warning">Edit</a>
                                    @if (auth()->user()->id != $user->id)
                                    <a href="{{ route('users.destroy', $user) }}" class="btn btn-danger" onclick="return confirm('Apa kamu yakin?')">Hapus</a>
                                    @endif
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
            {{ $users->withQueryString()->links() }}
        </div>
    </div>
@endsection
