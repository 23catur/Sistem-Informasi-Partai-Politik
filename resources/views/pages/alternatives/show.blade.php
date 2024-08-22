@extends('layouts.app')
@section('title', $alternative->name)
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <h5 class="card-title mb-0">Detail {{ $alternative->name }}</h5>
                <a href="{{ route('alternatives.edit', $alternative) }}" class="btn btn-warning">Edit</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th>Kode</th>
                        <td>{{ $alternative->code }}</td>
                    </tr>
                    <tr>
                        <th>Nama Lengkap</th>
                        <td>{{ $alternative->name }}</td>
                    </tr>
                    <tr>
                        <th>No. Kartu Keluarga</th>
                        <td>{{ $alternative->profile?->no_kk ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>KTP</th>
                        <td>{{ $alternative->profile?->nik ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Tempat Lahir</th>
                        <td>{{ $alternative->profile?->place_of_birth ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Lahir</th>
                        <td>{{ $alternative->profile?->date_of_birth ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Jenis Kelamin</th>
                        <td>{{ $alternative->profile?->gender->description ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Agama</th>
                        <td>{{ $alternative->profile?->religion->description ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>No. HP</th>
                        <td>{{ $alternative->profile?->phone_number ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $alternative->profile?->email ?? '-' }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <h5 class="card-title mb-0">Alamat</h5>
                @if ($alternative->profile)
                    <a href="{{ route('alternatives.address.create', $alternative) }}"
                        class="btn btn-{{ $alternative->profile?->address ? 'warning' : 'success' }}">{{ $alternative->profile?->address ? 'Edit' : 'Tambah' }}</a>
                @else
                    Perbaharui profile terlebih dahulu
                @endif
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Alamat</th>
                            <th>RT</th>
                            <th>RW</th>
                            <th>Desa/Kelurahan</th>
                            <th>Kecamantan</th>
                            <th>Kota/Kabupaten</th>
                            <th>Provinsi</th>
                            <th>Kode Pos</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($alternative->profile?->address)
                            <tr>
                                <td>{{ $alternative->profile?->address?->address }}</td>
                                <td>{{ $alternative->profile?->address?->rt }}</td>
                                <td>{{ $alternative->profile?->address?->rw }}</td>
                                <td>{{ $alternative->profile?->address?->village?->name }}</td>
                                <td>{{ $alternative->profile?->address?->village?->district?->name }}</td>
                                <td>{{ $alternative->profile?->address?->village?->district?->city?->name }}</td>
                                <td>{{ $alternative->profile?->address?->village?->district?->city?->province?->name }}
                                </td>
                                <td>{{ $alternative->profile?->address?->zip_code }}</td>
                            </tr>
                        @else
                            <tr>
                                <td colspan="8" class="text-center">Tidak ada data</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <h5 class="card-title mb-0">Komponen Kriteria</h5>
                @if ($alternative->profile)
                    <a href="{{ route('alternatives.criteria-component.index', $alternative) }}"
                        class="btn btn-{{ $alternative->profile?->address ? 'warning' : 'success' }}">{{ count($alternative->profile?->components) > 0 ? 'Edit' : 'Tambah' }}</a>
                @else
                    Perbaharui profile terlebih dahulu
                @endif
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tbody>
                        @if ($alternative->profile?->components)
                            @foreach ($alternative->profile?->components as $item)
                                @php
                                    $ex = explode('-', $item['type']->description);
                                    $key = $ex[0];
                                    $val = explode(',', $ex[1]);
                                @endphp
                                <tr>
                                    <th width="20%" rowspan="2">{{ $key }}</th>
                                    @foreach ($val as $row)
                                        <!-- <th>{{ $row }}</th> -->
                                    @endforeach
                                </tr>
                                <tr>
                                    <td>{{ $item['name_person'] }}</td>
                                    <!-- <td>{{ $item['val_1'] }}</td>
                                    <td>{{ $item['val_2'] }}</td> -->
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <h5 class="card-title mb-0">Dokumen</h5>
                @if ($alternative->profile)
                    <a href="{{ route('alternatives.documents.index', $alternative) }}"
                        class="btn btn-{{ $alternative->profile?->document ? 'warning' : 'success' }}">{{ $alternative->profile?->document ? 'Edit' : 'Tambah' }}</a>
                @else
                    Perbaharui profile terlebih dahulu
                @endif
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <th>KTP</th>
                        <td>
                            @if ($alternative->profile?->document?->ktp)
                                <a target="_blank"
                                    href="{{ asset('storage/document/ktp/' . $alternative->profile?->document?->ktp) }}">Lihat
                                    KTP</a>
                            @else
                                -
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Pernyataan Bakal Calon</th>
                        <td>
                            @if ($alternative->profile?->document?->bakalcalon)
                                <a target="_blank"
                                    href="{{ asset('storage/document/bakalcalon/' . $alternative->profile?->document?->bakalcalon) }}">Lihat
                                    Pernyataan Bakal Calon</a>
                            @else
                                -
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Tingkat Pendidikan Terakhir</th>
                        <td>
                            @if ($alternative->profile?->document?->ijazah)
                                <a target="_blank"
                                    href="{{ asset('storage/document/ijazah/' . $alternative->profile?->document?->ijazah) }}">Lihat
                                    Tingkat Pendidikan Terakhir</a>
                            @else
                                -
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Terdaftar Pemilih</th>
                        <td>
                            @if ($alternative->profile?->document?->kia)
                                <a target="_blank"
                                    href="{{ asset('storage/document/pemilih/' . $alternative->profile?->document?->pemilih) }}">Lihat
                                    Terdaftar Pemilih</a>
                            @else
                                -
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>KTA</th>
                        <td>
                            @if ($alternative->profile?->document?->kta)
                                <a target="_blank"
                                    href="{{ asset('storage/document/kta/' . $alternative->profile?->document?->kta) }}">Lihat
                                    KTA</a>
                            @else
                                -
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Pas Foto</th>
                        <td>
                            @if ($alternative->profile?->document?->foto)
                                <a target="_blank"
                                    href="{{ asset('storage/document/foto/' . $alternative->profile?->document?->foto) }}">Lihat
                                    Pas Foto</a>
                            @else
                                -
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Surat Keterangan Kesehatan Jasmani</th>
                        <td>
                            @if ($alternative->profile?->document?->jasmani)
                                <a target="_blank"
                                    href="{{ asset('storage/document/jasmani/' . $alternative->profile?->document?->jasmani) }}">Lihat
                                    Surat Keterangan Kesehatan Jasmani</a>
                            @else
                                -
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Surat Keterangan Kesehatan Rohani</th>
                        <td>
                            @if ($alternative->profile?->document?->rohani)
                                <a target="_blank"
                                    href="{{ asset('storage/document/rohani/' . $alternative->profile?->document?->rohani) }}">Lihat
                                    Surat Keterangan Kesehatan Rohani</a>
                            @else
                                -
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Surat Keterangan Bebas Narkoba</th>
                        <td>
                            @if ($alternative->profile?->document?->narkoba)
                                <a target="_blank"
                                    href="{{ asset('storage/document/narkoba/' . $alternative->profile?->document?->narkoba) }}">Lihat
                                    Surat Keterangan Bebas Narkoba</a>
                            @else
                                -
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Surat Keterangan Berstatus Mantan Terpidana</th>
                        <td>
                            @if ($alternative->profile?->document?->mantan)
                                <a target="_blank"
                                    href="{{ asset('storage/document/mantan/' . $alternative->profile?->document?->mantan) }}">Lihat
                                    Surat Keterangan Berstatus Mantan Terpidana</a>
                            @else
                                -
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Surat Keterangan Tidak Berstatus Terpidana</th>
                        <td>
                            @if ($alternative->profile?->document?->terpidana)
                                <a target="_blank"
                                    href="{{ asset('storage/document/terpidana/' . $alternative->profile?->document?->terpidana) }}">Lihat
                                    Surat Keterangan Tidak Berstatus Terpidana</a>
                            @else
                                -
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Surat Keterangan Pekerjaan Wajib Mundur</th>
                        <td>
                            @if ($alternative->profile?->document?->mundur)
                                <a target="_blank"
                                    href="{{ asset('storage/document/mundur/' . $alternative->profile?->document?->mundur) }}">Lihat
                                    Surat Keterangan Pekerjaan Wajib Mundur</a>
                            @else
                                -
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Surat Pengadilan Tidak Memiliki Status Hukum</th>
                        <td>
                            @if ($alternative->profile?->document?->pengadilan)
                                <a target="_blank"
                                    href="{{ asset('storage/document/pengadilan/' . $alternative->profile?->document?->pengadilan) }}">Lihat
                                    Surat Pengadilan Tidak Memiliki Status Hukum</a>
                            @else
                                -
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Surat Berstatus Anggota DPR/DPRD Beda Parpol</th>
                        <td>
                            @if ($alternative->profile?->document?->beda_parpol)
                                <a target="_blank"
                                    href="{{ asset('storage/document/beda_parpol/' . $alternative->profile?->document?->beda_parpol) }}">Lihat
                                    Surat Berstatus Anggota DPR/DPRD Beda Parpol</a>
                            @else
                                -
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Surat Berstatus Penyelenggara Pemilu</th>
                        <td>
                            @if ($alternative->profile?->document?->pemilu)
                                <a target="_blank"
                                    href="{{ asset('storage/document/pemilu/' . $alternative->profile?->document?->pemilu) }}">Lihat
                                    Surat Berstatus Penyelenggara Pemilu</a>
                            @else
                                -
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Surat Pencantuman Gelar</th>
                        <td>
                            @if ($alternative->profile?->document?->gelar)
                                <a target="_blank"
                                    href="{{ asset('storage/document/gelar/' . $alternative->profile?->document?->gelar) }}">Lihat
                                    Surat Pencantuman Gelar</a>
                            @else
                                -
                            @endif
                        </td>
                    </tr>
                    {{-- @if ($alternative->profile?->document)
                        @if (count($alternative->profile?->document?->docSchool) > 0)
                            @foreach ($alternative->profile?->document->docSchool as $docSchool)
                                <tr>
                                    <th>Raport {{ strtoupper($docSchool->type->description) }}</th>
                                    <td>
                                        @if ($docSchool->raport)
                                            <a target="_blank"
                                                href="{{ asset('storage/document/raport_' . strtolower($docSchool->type->description) . '/' . $docSchool->raport) }}">Lihat
                                                Raport {{ strtoupper($docSchool->type->description) }}</a>
                                        @else
                                            -
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <th colspan="2">Tidak ada dokumen raport</th>
                            </tr>
                        @endif
                    @else
                        <tr>
                            <th colspan="2">Tidak ada dokumen raport</th>
                        </tr>
                    @endif --}}
                </table>
            </div>
        </div>
    </div>
@endsection
