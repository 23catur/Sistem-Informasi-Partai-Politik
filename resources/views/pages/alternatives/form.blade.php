@extends('layouts.app')
@section('title', ($alternative->id ? 'Edit ' : 'Tambah ') . 'alternative' )
@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">{{ $alternative->id ? 'Edit' : 'Tambah' }} Data</h5>
        </div>
        <div class="card-body">
            <form action="{{ $alternative->id ? route('alternatives.update', $alternative) : route('alternatives.store') }}" method="post">
                @csrf
                @if ($alternative->id)
                    @method('PUT')
                @endif
                <div class="form-group mb-3">
                    <label class="form-label">Kode</label>
                    <input type="text" name="kode" class="form-control @error('kode') is-invalid @enderror"
                        value="{{ old('kode') ?? $alternative->code }}">
                    @error('kode')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                        value="{{ old('nama') ?? $alternative->name }}">
                    @error('nama')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">No KK</label>
                    <input type="text" name="no_kk" class="form-control @error('no_kk') is-invalid @enderror"
                        value="{{ old('no_kk') ?? $alternative->profile?->no_kk }}">
                    @error('no_kk')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">NIK</label>
                    <input type="text" name="nik" class="form-control @error('nik') is-invalid @enderror"
                        value="{{ old('nik') ?? $alternative->profile?->nik }}">
                    @error('nik')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" class="form-control @error('tempat_lahir') is-invalid @enderror"
                        value="{{ old('tempat_lahir') ?? $alternative->profile?->place_of_birth }}">
                    @error('tempat_lahir')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror"
                        value="{{ old('tanggal_lahir') ?? $alternative->profile?->date_of_birth }}">
                    @error('tanggal_lahir')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-control">
                        @foreach ($gender as $key => $item)
                            <option value="{{ $key }}">{{ $item }}</option>
                        @endforeach
                    </select>
                    @error('jenis_kelamin')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Agama</label>
                    <select name="agama" class="form-control">
                        @foreach ($religion as $key => $item)
                            <option value="{{ $key }}">{{ $item }}</option>
                        @endforeach
                    </select>
                    @error('agama')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">No HP</label>
                    <input type="text" name="no_hp" class="form-control @error('no_hp') is-invalid @enderror"
                        value="{{ old('no_hp') ?? $alternative->profile?->phone_number }}">
                    @error('no_hp')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                        value="{{ old('email') ?? $alternative->profile?->email }}">
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <button class="btn btn-success" type="submit">Simpan</button>
                <a href="{{ route('alternatives.index') }}" class="btn btn-warning">Batal</a>
            </form>
        </div>
    </div>
@endsection
