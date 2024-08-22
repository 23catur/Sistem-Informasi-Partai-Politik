<main class="d-flex w-100 mt-5">
    <div class="container d-flex flex-column">
        <div class="row vh-100">
            <div class="col-10 mx-auto d-table h-100">
                <div class="d-table-cell align-middle">
                    @if ($period->status->value)
                        <div class="text-center mt-4">
                            <h1 class="bold">PENDAFTARAN CALON LEGISLATIF NasDem Enrekang</h1>
                            <p class="lead">
                                Silahkan isi form dibawah ini untuk mendaftar!
                            </p>
                        </div>
                        <section class="section">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="alert alert-warning  alert-dismissible fade show" role="alert">
                                    <h4 class="alert-heading">Perhatian!!</h4>
                                    <p>1. Mohon pastikan bahwa seluruh data telah diisi dengan lengkap sebelum disimpan. Hal ini penting untuk memastikan kelengkapan data</p>
                                    <p>2. Kolom yang bertanda (*) adalah wajib diisi. Pastikan Bukti dokumen Anda Lengkap.</p>
                                    <p>3. Batas ukuran File/ Dokumen adalah 2 mb, tidak lebih!</p>
                                    <hr>
                                    <p class="mb-0">Terima kasih atas perhatiannya dalam pengisian data yang benar<i class="fa-solid fa-face-smile"></i></p>

                            </div>
                            </div>
                        </div>
                        </section>
                        @if (Session::has('success'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('success') }}
                            </div>
                        @endif
                        @if (Session::has('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ Session::get('error') }}
                            </div>
                        @endif
                        @if ($errors->any())
                            <div class="col-md-12">
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endif
                        <ul class="nav justify-content-center">
                            <li class="nav-item">
                                <button class="nav-link {{ $page == 'data-diri' ? 'active' : 'disabled' }}">Data
                                    Diri</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link {{ $page == 'data-alamat' ? 'active' : 'disabled' }}">Data
                                    Alamat</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link {{ $page == 'data-kriteria' ? 'active' : 'disabled' }}">Data
                                    Kriteria</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link {{ $page == 'data-dokumen' ? 'active' : 'disabled' }}">Data
                                    Dokumen</button>
                            </li>
                            <li class="nav-item">
                                <button
                                    class="nav-link {{ $page == 'ringkasan' ? 'active' : 'disabled' }}">Ringkasan</button>
                            </li>
                        </ul>

                        <div class="card">
                            <div class="card-body">
                                <div class="m-sm-3">
                                    <form wire:submit.prevent='register'>
                                        @if ($page == 'data-diri')
                                            <div class="form-group mb-3">
                                                <label class="required-label">Nama Lengkap</label>
                                                <input type="text"
                                                    class="form-control @error('nama') is-invalid @enderror"
                                                    wire:model.defer='nama'>
                                                @error('nama')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group mb-3">
                                                <label class="required-label">No. Kartu Keluarga/ KK</label>
                                                <input type="text"
                                                    class="form-control @error('no_kk') is-invalid @enderror"
                                                    wire:model.defer='no_kk'>
                                                @error('no_kk')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group mb-3">
                                                <label class="required-label">Nomor Induk Kependudukan/ NIK</label>
                                                <input type="text"
                                                    class="form-control @error('nik') is-invalid @enderror"
                                                    wire:model.defer='nik'>
                                                @error('nik')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group mb-3">
                                                <label class="required-label">Tempat Lahir</label>
                                                <input type="text"
                                                    class="form-control @error('tempat_lahir') is-invalid @enderror"
                                                    wire:model.defer='tempat_lahir'>
                                                @error('tempat_lahir')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group mb-3">
                                                <label class="required-label">Tanggal Lahir</label>
                                                <input type="date"
                                                    class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                                    wire:model.defer='tanggal_lahir'>
                                                @error('tanggal_lahir')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group mb-3">
                                                <label class="required-label">Jenis Kelamin</label>
                                                <select wire:model.defer='jenis_kelamin' class="form-control">
                                                    <option value="">--Pilih--</option>
                                                    @foreach ($genders as $key => $item)
                                                        <option value="{{ $key }}">{{ $item }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('jenis_kelamin')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group mb-3">
                                                <label class="required-label">Agama</label>
                                                <select wire:model.defer='agama' class="form-control">
                                                    <option value="">--Pilih--</option>
                                                    @foreach ($religions as $key => $item)
                                                        <option value="{{ $key }}">{{ $item }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('agama')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group mb-3">
                                                <label class="required-label">No HP</label>
                                                <input type="text"
                                                    class="form-control @error('no_hp') is-invalid @enderror"
                                                    wire:model.defer='no_hp'>
                                                @error('no_hp')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group mb-3">
                                                <label class="required-label">Email</label>
                                                <input type="email"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    wire:model.defer='email'>
                                                @error('email')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        @endif
                                        @if ($page == 'data-alamat')
                                            <div class="form-group mb-3">
                                                <label class="required-label">Alamat</label>
                                                <input type="text"
                                                    class="form-control @error('alamat') is-invalid @enderror"
                                                    wire:model.defer="alamat">
                                                @error('alamat')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group mb-3">
                                                <label class="required-label">RT</label>
                                                <input type="text"
                                                    class="form-control @error('rt') is-invalid @enderror"
                                                    wire:model.defer='rt' placeholder="00">
                                                @error('rt')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group mb-3">
                                                <label class="required-label">Rw</label>
                                                <input type="text"
                                                    class="form-control @error('rw') is-invalid @enderror"
                                                    wire:model.defer='rw'placeholder="00">
                                                @error('rw')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group mb-3" wire:ignore wire:key='100'>
                                                <label class="required-label">Provinsi</label>
                                                <select wire:model='provinsi' class="form-control" id="province"
                                                    wire:change='getCity'>
                                                    <option value="">Pilih Provinsi</option>
                                                    @foreach ($provinces as $province)
                                                        <option value="{{ $province->id }}">{{ $province->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('provinsi')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group mb-3">
                                                <label class="required-label">Kota/Kabupaten</label>
                                                <select wire:model='kota' class="form-control" id="city"
                                                    wire:change='getDistrict'>
                                                    <option value="">Pilih Kota/Kabupaten</option>
                                                    @foreach ($cities as $city)
                                                        <option value="{{ $city->id }}">{{ $city->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('kota')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group mb-3">
                                                <label class="required-label">Kecamatan</label>
                                                <select wire:model='kecamatan' class="form-control" id="kecamatan"
                                                    wire:change='getVillage'>
                                                    <option value="">Pilih Kecamatan</option>
                                                    @foreach ($districts as $district)
                                                        <option value="{{ $district->id }}">{{ $district->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('kecamatan')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group mb-3">
                                                <label class="required-label">Desa/Kelurahan</label>
                                                <select wire:model='kelurahan' class="form-control" id="kelurahan">
                                                    <option value="">Pilih Kelurahan</option>
                                                    @foreach ($villages as $village)
                                                        <option value="{{ $village->id }}">{{ $village->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('kelurahan')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group mb-3">
                                                <label class="required-label">Kode Pos</label>
                                                <input type="number"
                                                    class="form-control @error('kode_pos') is-invalid @enderror"
                                                    wire:model.defer='kode_pos' placeholder="Ex: 92371">
                                                @error('kode_pos')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        @endif
                                        @if ($page == 'data-kriteria')
                                            @foreach ($criterias as $criteria)
                                                <div class="form-group mb-3">
                                                    <label
                                                        class="form-label">{{ $criteria->code . ' - ' . $criteria->name }}</label>
                                                    <select wire:model="criteriasAttr.{{ $criteria->id }}"
                                                        class="form-control">
                                                        <option value="">--Pilih--</option>
                                                        @foreach ($criteria->subs as $sub)
                                                            <option value="{{ $sub->id }}"
                                                                {{ isset($data[$criteria->id]) ? ($data[$criteria->id] == $sub->id ? 'selected' : '') : '' }}>
                                                                {{ $sub->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            @endforeach
                                            <!-- @foreach ($criteriaComponents as $key => $criteriaComponent)
                                                @php
                                                    $cri = explode('-', $criteriaComponent);
                                                    $com = explode(',', $cri[1]);
                                                @endphp
                                                <div class="form-group mb-3">
                                                    <label class="form-label">{{ $cri[0] }}</label>
                                                    @foreach ($com as $k => $item)
                                                        <input type="text"
                                                            wire:model="com.{{ $key }}.{{ $k }}"
                                                            class="form-control mb-2"
                                                            placeholder="{{ $item }}"
                                                            value="{{ isset($components[$key][$k]) ? $components[$key][$k] : '' }}">
                                                    @endforeach
                                                </div>
                                            @endforeach -->
                                        @endif
                                        @if ($page == 'data-dokumen')
                                            <div class="form-group mb-3 row">
                                                <div class="col-md-6 mb-3">
                                                    <label class="required-label">Foto KTP</label>
                                                    <input type="file" wire:model='ktp'
                                                        class="form-control @error('ktp') is-invalid @enderror">
                                                    @error('ktp')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label class="required-label">Surat Pernyataan Bakal Calon</label>
                                                    <input type="file"
                                                        class="form-control @error('bakalcalon') is-invalid @enderror"
                                                        wire:model='bakalcalon'>
                                                    @error('bakalcalon')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group mb-3 row">
                                                <div class="col-md-6 mb-3">
                                                    <label class="required-label">Bukti Ijazah (Pendidikan Terakhir)</label>
                                                    <input type="file"
                                                        class="form-control @error('ijazah') is-invalid @enderror"
                                                        wire:model='ijazah'>
                                                    @error('ijazah')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label class="required-label">Surat Terdaftar Pemilih</label>
                                                    <input type="file"
                                                        class="form-control @error('pemilih') is-invalid @enderror"
                                                        wire:model='pemilih'>
                                                    @error('pemilih')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group mb-3 row">
                                                <div class="col-md-6 mb-3">
                                                    <label class="required-label">Kartu Tanda Anggota Partai</label>
                                                    <input type="file"
                                                        class="form-control @error('kta') is-invalid @enderror"
                                                        wire:model='kta'>
                                                    @error('kta')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label class="required-label">Pas Foto</label>
                                                    <input type="file"
                                                        class="form-control @error('foto') is-invalid @enderror"
                                                        wire:model='foto'>
                                                    @error('foto')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group mb-3 row">
                                                <div class="col-md-6 mb-3">
                                                    <label class="required-label">Surat Keterangan Kesehatan Jasmani</label>
                                                    <input type="file"
                                                        class="form-control @error('jasmani') is-invalid @enderror"
                                                        wire:model="jasmani">
                                                    @error('jasmani')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label class="required-label">Surat Keterangan Kesehatan Rohani</label>
                                                    <input type="file"
                                                        class="form-control @error('rohani') is-invalid @enderror"
                                                        wire:model="rohani">
                                                    @error('rohani')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group mb-3 row">
                                                <div class="col-md-6 mb-3">
                                                    <label class="required-label">Surat Keterangan Bebas Narkoba</label>
                                                    <input type="file"
                                                        class="form-control @error('narkoba') is-invalid @enderror"
                                                        wire:model="narkoba">
                                                    @error('narkoba')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">Surat Keterangan Berstatus Mantan Terpidana</label>
                                                    <input type="file"
                                                        class="form-control @error('mantan') is-invalid @enderror"
                                                        wire:model="mantan">
                                                    @error('mantan')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group mb-3 row">
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">Surat Keterangan Tidak Berstatus Terpidana</label>
                                                    <input type="file"
                                                        class="form-control @error('terpidana') is-invalid @enderror"
                                                        wire:model="terpidana">
                                                    @error('terpidana')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">Surat Keterangan Pekerjaan Wajib Mundur</label>
                                                    <input type="file"
                                                        class="form-control @error('mundur') is-invalid @enderror"
                                                        wire:model="mundur">
                                                    @error('mundur')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group mb-3 row">
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">Surat Pengadilan Tidak Memiliki Status Hukum</label>
                                                    <input type="file"
                                                        class="form-control @error('pengadilan') is-invalid @enderror"
                                                        wire:model="pengadilan">
                                                    @error('pengadilan')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">Surat Berstatus Anggota DPR/DPRD Beda Parpol</label>
                                                    <input type="file"
                                                        class="form-control @error('beda_parpol') is-invalid @enderror"
                                                        wire:model="beda_parpol">
                                                    @error('beda_parpol')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group mb-3 row">
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">Surat Berstatus Penyelenggara Pemilu</label>
                                                    <input type="file"
                                                        class="form-control @error('pemilu') is-invalid @enderror"
                                                        wire:model="pemilu">
                                                    @error('pemilu')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">Surat Pencantuman Gelar</label>
                                                    <input type="file"
                                                        class="form-control @error('gelar') is-invalid @enderror"
                                                        wire:model="gelar">
                                                    @error('gelar')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        @endif
                                        @if ($page == 'ringkasan')
                                            <div class="row mb-5">
                                                <h3><u>Data Diri</u></h3>
                                                <div class="col-md-6">
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <tr>
                                                                <th>Nama</th>
                                                                <td>{{ $nama }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>No KK</th>
                                                                <td>{{ $no_kk }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>NIK</th>
                                                                <td>{{ $nik }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Tempat Lahir</th>
                                                                <td>{{ $tempat_lahir }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Tanggal Lahir</th>
                                                                <td>{{ $tanggal_lahir }}</td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <tr>
                                                                <th>Jenis Kelamin</th>
                                                                <td>{{ \App\Enums\Gender::getDescription((int) $jenis_kelamin) }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>Agama</th>
                                                                <td>{{ \App\Enums\Religion::getDescription((int) $agama) }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>No. HP</th>
                                                                <td>{{ $no_hp }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Email</th>
                                                                <td>{{ $email }}</td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-5">
                                                <h3><u>Data Alamat</u></h3>
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <tr>
                                                            <th>Alamat</th>
                                                            <td>{{ $fullAddress }}</td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                            
                                        @endif
                                        <div class="float-end mt-5">
                                            @if ($page == 'data-diri')
                                                <button type="button" class="btn btn-success"
                                                    wire:click='changePage("data-alamat")'>Selanjutnya</button>
                                            @elseif ($page == 'data-alamat')
                                                <button type="button" class="btn btn-primary"
                                                    wire:click='changePage("data-diri")'>Kembali</button>
                                                <button type="button" class="btn btn-success ml-2"
                                                    wire:click='changePage("data-kriteria")'>Selanjutnya</button>
                                            @elseif ($page == 'data-kriteria')
                                                <button type="button" class="btn btn-primary"
                                                    wire:click='changePage("data-alamat")'>Kembali</button>
                                                <button type="button" class="btn btn-success ml-2"
                                                    wire:click='changePage("data-dokumen")'>Selanjutnya</button>
                                            @elseif ($page == 'data-dokumen')
                                                <button type="button" class="btn btn-primary"
                                                    wire:click='changePage("data-kriteria")'>Kembali</button>
                                                <button type="button" class="btn btn-success ml-2"
                                                    wire:click='changePage("ringkasan")'>Submit</button>
                                            @elseif ($page == 'ringkasan')
                                                <button type="button" class="btn btn-primary"
                                                    wire:click='changePage("data-kriteria")'>Periksa Kembali</button>
                                                <button type="submit" class="btn btn-success ml-2" id="registerBtn">Submit</button>
                                            @endif
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="text-center mt-4">
                            <h1 class="h2">Mohon maaf, pendaftaran saat ini belum dibuka.</h1>
                            <p class="lead">
                                Silahkan kembali lagi nanti. Terima Kasih.
                            </p>
                        </div>
                    @endif
                    <div class="text-center mb-5">
                        Kembali ke <a href="{{ url('/') }}">Halaman Utama</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
