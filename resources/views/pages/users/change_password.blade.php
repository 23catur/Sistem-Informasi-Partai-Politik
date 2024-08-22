@extends('layouts.app')
@section('title', 'Ubah Kata Sandi')
@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">Ubah Kata Sandi</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('users.change_password.update') }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group mb-3">
                    <label class="form-label">Kata Sandi Lama</label>
                    <input type="password" name="old_password" class="form-control @error('old_password') is-invalid @enderror">
                    @error('old_password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Kata Sandi Baru</label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Konfirmasi Kata Sandi Baru</label>
                    <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror">
                    @error('password_confirmation')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <button class="btn btn-success" type="submit">Simpan</button>
                <a href="{{ route('dashboard') }}" class="btn btn-warning">Batal</a>
            </form>
        </div>
    </div>
@endsection
