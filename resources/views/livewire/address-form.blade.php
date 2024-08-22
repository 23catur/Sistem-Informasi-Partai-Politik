@section('title', ($alternative->id ? 'Edit ' : 'Tambah ') . 'Alamat')
<div class="card">
    <div class="card-header">
        <h5 class="card-title mb-0">{{ $alternative->id ? 'Edit' : 'Tambah' }} Alamat</h5>
    </div>
    <div class="card-body">
        <form wire:submit.prevent='submit'>
            <div class="form-group mb-3">
                <label class="form-label">Alamat</label>
                <input type="text" class="form-control @error('alamat') is-invalid @enderror"
                    wire:model="alamat">
                @error('alamat')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label class="form-label">RT</label>
                <input type="text" class="form-control @error('rt') is-invalid @enderror"
                    wire:model='rt'>
                @error('rt')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label class="form-label">Rw</label>
                <input type="text" class="form-control @error('rw') is-invalid @enderror"
                    wire:model='rw'>
                @error('rw')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group mb-3" wire:ignore>
                <label class="form-label">Provinsi</label>
                <select wire:model='provinsi' class="form-control" id="province" wire:change='getCity'>
                    <option value="">Pilih Provinsi</option>
                    @foreach ($provinces as $province)
                        <option value="{{ $province->id }}">{{ $province->name }}</option>
                    @endforeach
                </select>
                @error('provinsi')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label class="form-label">Kota/Kabupaten</label>
                <select wire:model='kota' class="form-control" id="city" wire:change='getDistrict'>
                    <option value="">Pilih Kota/Kabupaten</option>
                    @foreach ($cities as $city)
                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                    @endforeach
                </select>
                @error('kota')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label class="form-label">Kecamatan</label>
                <select wire:model='kecamatan' class="form-control" id="kecamatan" wire:change='getVillage'>
                    <option value="">Pilih Kecamatan</option>
                    @foreach ($districts as $district)
                        <option value="{{ $district->id }}">{{ $district->name }}</option>
                    @endforeach
                </select>
                @error('kecamatan')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label class="form-label">Desa/Kelurahan</label>
                <select wire:model='kelurahan' class="form-control" id="kelurahan">
                    <option value="">Pilih Kelurahan</option>
                    @foreach ($villages as $village)
                        <option value="{{ $village->id }}">{{ $village->name }}</option>
                    @endforeach
                </select>
                @error('kelurahan')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label class="form-label">Kode Pos</label>
                <input type="number" class="form-control @error('kode_pos') is-invalid @enderror"
                    wire:model='kode_pos'>
                @error('kode_pos')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <button class="btn btn-success" type="submit">Simpan</button>
            <a href="{{ route('alternatives.show', $alternative) }}" class="btn btn-warning">Batal</a>
        </form>
    </div>
</div>

{{-- @push('extra-js')
    <script>
        $(document).ready(function () {
            $('#province').on('change', function () {
                @this.call('getCity', $('#province').select2("val"))
                $('#city').select2()
            });

            $('#city').on('change', function () {
                @this.call('getDistrict', $('#city').select2("val"))
            });
        })
    </script>
@endpush --}}
