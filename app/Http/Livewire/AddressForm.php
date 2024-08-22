<?php

namespace App\Http\Livewire;

use App\Models\Alternative;
use App\Models\City;
use App\Models\District;
use App\Models\Province;
use App\Models\Village;
use Livewire\Component;

class AddressForm extends Component
{
    public $alamat;

    public $rt;

    public $rw;

    public $provinsi;

    public $kota;

    public $kecamatan;

    public $kelurahan;

    public $kode_pos;

    public $alternative;

    public $provinces;

    public $cities = [];

    public $districts = [];

    public $villages = [];

    public function mount(Alternative $alternative)
    {
        $this->alternative = $alternative;
        $this->alamat = $alternative->profile?->address?->address;
        $this->rt = $alternative->profile?->address?->rt;
        $this->rw = $alternative->profile?->address?->rw;
        $this->provinsi = $alternative->profile?->address?->village?->district?->city?->province?->id;
        $this->kota = $alternative->profile?->address?->village?->district?->city?->id;
        $this->kecamatan = $alternative->profile?->address?->village?->district?->id;
        $this->kelurahan = $alternative->profile?->address?->village?->id;
        $this->kode_pos = $alternative->profile?->address?->zip_code;

        $this->provinces = Province::get();
    }

    public function getCity()
    {
        $this->cities = City::where('province_id', $this->provinsi)->get();
    }

    public function getDistrict()
    {
        $this->districts = District::where('city_id', $this->kota)->get();
    }

    public function getVillage()
    {
        $this->villages = Village::where('district_id', $this->kecamatan)->get();
    }

    public function submit()
    {
        $data = $this->validate([
            'alamat' => 'required',
            'rt' => 'required|numeric',
            'rw' => 'required|numeric',
            'kelurahan' => 'required',
            'kode_pos' => 'required|numeric',
        ]);

        if ($this->alternative->profile?->address) {
            $this->alternative->profile?->address()->update([
                'address' => $data['alamat'],
                'rt' => $data['rt'],
                'rw' => $data['rw'],
                'village_id' => $data['kelurahan'],
                'zip_code' => $data['kode_pos'],
            ]);
        } else {
            $this->alternative->profile?->address()->create([
                'address' => $data['alamat'],
                'rt' => $data['rt'],
                'rw' => $data['rw'],
                'village_id' => $data['kelurahan'],
                'zip_code' => $data['kode_pos'],
            ]);
        }

        return redirect()->route('alternatives.show', $this->alternative)->with('success', 'Berhasil memperbaharui alamat');
    }

    public function render()
    {
        return view('livewire.address-form');
    }
}
