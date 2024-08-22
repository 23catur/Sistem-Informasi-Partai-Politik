@extends('layouts.app')
@section('title', ($alternative->profile?->components ? 'Edit ' : 'Tambah ') . 'Dokumen')
@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">{{ $alternative->profile?->components ? 'Edit' : 'Tambah' }} Dokumen</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('alternatives.documents.store', $alternative) }}"
                method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-3 row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">KTP</label>
                        <input type="file" class="form-control @error('ktp') is-invalid @enderror" name="ktp">
                        @error('ktp')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div> 
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Pernyataan Bakal Calon</label>
                        <input type="file" class="form-control @error('bakalcalon') is-invalid @enderror" name="bakalcalon">
                        @error('bakalcalon')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group mb-3 row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Tingkat Pendidikan Terakhir</label>
                        <input type="file" class="form-control @error('ijazah') is-invalid @enderror" name="ijazah">
                        @error('ijazah')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Terdaftar Pemilih</label>
                        <input type="file" class="form-control @error('pemilih') is-invalid @enderror" name="pemilih">
                        @error('pemilih')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group mb-3 row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">KTA</label>
                        <input type="file" class="form-control @error('kta') is-invalid @enderror" name="kta">
                        @error('kta')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Pas Foto</label>
                        <input type="file" class="form-control @error('foto') is-invalid @enderror" name="foto">
                        @error('foto')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group mb-3 row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Surat Keterangan Kesehatan Jasmani</label>
                        <input type="file" class="form-control @error('jasmani') is-invalid @enderror" name="jasmani">
                        @error('jasmani')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Surat Keterangan Kesehatan Rohani</label>
                        <input type="file" class="form-control @error('rohani') is-invalid @enderror" name="rohani">
                        @error('rohani')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group mb-3 row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Surat Keterangan Bebas Narkoba</label>
                        <input type="file" class="form-control @error('narkoba') is-invalid @enderror" name="narkoba">
                        @error('narkoba')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Surat Keterangan Berstatus Mantan Terpidana</label>
                        <input type="file" class="form-control @error('mantan') is-invalid @enderror" name="mantan">
                        @error('mantan')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group mb-3 row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Surat Keterangan Tidak Berstatus Terpidana</label>
                        <input type="file" class="form-control @error('terpidana') is-invalid @enderror" name="terpidana">
                        @error('terpidana')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Surat Keterangan Pekerjaan Wajib Mundur</label>
                        <input type="file" class="form-control @error('mundur') is-invalid @enderror" name="mundur">
                        @error('mundur')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group mb-3 row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Surat Pengadilan Tidak Memiliki Status Hukum</label>
                        <input type="file" class="form-control @error('pengadilan') is-invalid @enderror" name="pengadilan">
                        @error('pengadilan')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Surat Berstatus Anggota DPR/DPRD Beda Parpol</label>
                        <input type="file" class="form-control @error('beda_parpol') is-invalid @enderror" name="beda_parpol">
                        @error('beda_parpol')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group mb-3 row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Surat Berstatus Penyelenggara Pemilu</label>
                        <input type="file" class="form-control @error('pemilu') is-invalid @enderror" name="pemilu">
                        @error('pemilu')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Surat Pencantuman Gelar</label>
                        <input type="file" class="form-control @error('gelar') is-invalid @enderror" name="gelar">
                        @error('gelar')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- @foreach ($documentTypes as $type)
                    <div class="form-group mb-3">
                        <label class="form-label">Raport {{ strtoupper($type) }}</label>
                        <input type="file" class="form-control @error('raport_'.strtolower($type)) is-invalid @enderror" name="raport_{{ strtolower($type) }}">
                        @error('raport_'.strtolower($type))
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                @endforeach -->
                <div class="mt-3">
                    <button class="btn btn-success" type="submit">Simpan</button>
                    <a href="{{ route('alternatives.index') }}" class="btn btn-warning">Batal</a>
                </div>
            </form>
        </div>
    </div>
@endsection
