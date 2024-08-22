@extends('layouts.app')
@section('title', 'Edit Profile' )
@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">Edit Profile</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('users.profile.update') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                        value="{{ old('nama') ?? $user->name }}">
                    @error('nama')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" name="username" class="form-control @error('username') is-invalid @enderror"
                        value="{{ old('username') ?? $user->username }}">
                    @error('username')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                        value="{{ old('email') ?? $user->email }}">
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Foto</label>
                    <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror"
                        value="{{ old('foto') ?? $user->picture_url }}">
                    @error('foto')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                @if ($user->picture_url)
                <img src="{{ asset('storage/picture/' . $user->picture_url) }}" class="rounded-circle mb-2"
                width="128" height="128">
                <br><br>
                @endif
                <button class="btn btn-success" type="submit">Simpan</button>
                <a href="{{ route('criterias.index') }}" class="btn btn-warning">Batal</a>
            </form>
        </div>
    </div>
@endsection
