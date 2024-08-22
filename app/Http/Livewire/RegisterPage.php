<?php

namespace App\Http\Livewire;

use App\Enums\CriteriaComponent;
use App\Enums\DocumentType;
use App\Enums\Gender;
use App\Enums\Religion;
use App\Models\Alternative;
use App\Models\AlternativeCriteriaComponent;
use App\Models\AlternativeDocumentSchool;
use App\Models\City;
use App\Models\Criteria;
use App\Models\District;
use App\Models\Period;
use App\Models\Province;
use App\Models\SubCriteria;
use App\Models\Village;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;

class RegisterPage extends Component
{
    use WithFileUploads, LivewireAlert;

    public $isActive;

    public $page = 'data-diri';

    // data diri
    public $nama;

    public $no_kk;

    public $nik;

    public $tempat_lahir;

    public $tanggal_lahir;

    public $jenis_kelamin;

    public $agama;

    public $no_hp;

    public $email;

    public $genders;

    public $religions;

    // Alamat
    public $alamat;

    public $rt;

    public $rw;

    public $provinsi;

    public $namaProvinsi;

    public $kota;

    public $namaKota;

    public $kecamatan;

    public $namaKecamatan;

    public $kelurahan;

    public $namaKelurahan;

    public $kode_pos;

    public $alternative;

    public $provinces;

    public $cities = [];

    public $districts = [];

    public $villages = [];

    // kriteria
    public $criteriaComponents;

    public $criterias;

    public $criteriasAttr;

    public $com;

    // dokumen
    public $documentTypes;

    public $ktp;

    public $bakalcalon;

    public $ijazah;

    public $pemilih;

    public $kta;

    public $foto;

    public $jasmani;

    public $rohani;

    public $narkoba;

    public $mantan;

    public $terpidana;

    public $mundur;

    public $pengadilan;

    public $beda_parpol;

    public $pemilu;

    public $gelar;

    public $period;

    public $fullAddress;

    public $subCriteria;

    protected $listeners = [
        'confirmed',
        'cancelled',
    ];

    public function mount()
    {
        $this->genders = Gender::asSelectArray();
        $this->religions = Religion::asSelectArray();
        $this->provinces = Province::get();

        $this->criteriaComponents = CriteriaComponent::asSelectArray();

        $this->criterias = Criteria::with('subs')
            ->orderBy('id')
            ->get();

        $this->subCriteria = SubCriteria::pluck('name', 'id');

        $this->documentTypes = DocumentType::asSelectArray();

        $this->period = Period::first();
        $this->com = [];

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

    public function changePage($page)
    {
        if ($page == 'ringkasan') {
            $this->validation();
            $this->getVillageName();
        }
        $this->page = $page;
    }

    public function getVillageName()
    {
        $village = Village::with('district.city.province')->find($this->kelurahan);
        $this->namaProvinsi = $village->district->city->province->name;
        $this->namaKota = $village->district->city->name;
        $this->namaKecamatan = $village->district->name;
        $this->namaKelurahan = $village->name;

        $this->fullAddress = "{$this->alamat} RT.{$this->rt}/RW.{$this->rw}, Kel. {$this->namaKelurahan}, Kec. {$this->namaKecamatan}, {$this->namaKota}, {$this->namaProvinsi}, {$this->kode_pos}";
    }

    public function validation()
    {
        return $this->validate([
            'nama' => 'required',
            'no_kk' => 'required|numeric|unique:alternative_profiles,no_kk|digits:16',
            'nik' => 'required|numeric|unique:alternative_profiles,nik|digits:16',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date|date_format:Y-m-d',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'no_hp' => 'required|numeric',
            'email' => 'required|unique:alternative_profiles,email',
            'alamat' => 'required',
            'rt' => 'required|numeric',
            'rw' => 'required|numeric',
            'kelurahan' => 'required',
            'kode_pos' => 'required|numeric',
            'ktp' => 'required|file|mimes:png,jpg,pdf|max:2045',
            'bakalcalon' => 'required|file|mimes:png,jpg,pdf|max:2045',
            'ijazah' => 'required|file|mimes:png,jpg,pdf|max:2045',
            'pemilih' => 'required|file|mimes:png,jpg,pdf|max:2045',
            'kta' => 'required|file|mimes:png,jpg,pdf|max:2045',
            'foto' => 'required|file|mimes:png,jpg,pdf|max:2045',
            'jasmani' => 'required|file|mimes:png,jpg,pdf|max:2045',
            'rohani' => 'required|file|mimes:png,jpg,pdf|max:2045',
            'narkoba' => 'required|file|mimes:png,jpg,pdf|max:2045',
            'mantan' => 'nullable|file|mimes:png,jpg,pdf|max:2045',
            'terpidana' => 'nullable|file|mimes:png,jpg,pdf|max:2045',
            'mundur' => 'nullable|file|mimes:png,jpg,pdf|max:2045',
            'pengadilan' => 'nullable|file|mimes:png,jpg,pdf|max:2045',
            'beda_parpol' => 'nullable|file|mimes:png,jpg,pdf|max:2045',
            'pemilu' => 'nullable|file|mimes:png,jpg,pdf|max:2045',
            'gelar' => 'nullable|file|mimes:png,jpg,pdf|max:2045',
        ]);
    }

    public function confirmed()
    {
        $this->submit();
    }

    public function cancelled()
    {

    }

    public function register()
    {
        $this->alert('warning', 'Apakah kamu yakin Data Sudah Benar?', [
            'position' => 'center',
            'toast' => false,
            'showConfirmButton' => true,
            'onConfirmed' => 'confirmed',
            'showCancelButton' => true,
            'onDismissed' => 'cancelled',
            'confirmButtonText' => 'Submit',
            'cancelButtonText' => 'Periksa Kembali',
            'text' => 'Kamu tidak bisa memperbaharui data setelah submit.',
        ]);
    }

    public function submit()
    {

        $data = $this->validation();
        try {
            DB::beginTransaction();
            $alternative = Alternative::orderByDesc('id')->first();
            $lastNumber = $alternative ? substr($alternative->code, 1) : 0;
            $max = Str::padRight($lastNumber + 1, 1, '0');

            $code = 'A'.$max;

            $alternative = Alternative::create([
                'code' => $code,
                'name' => $data['nama'],
            ]);

            $alternative->profile()->create([
                'no_kk' => $data['no_kk'],
                'nik' => $data['nik'],
                'place_of_birth' => $data['tempat_lahir'],
                'date_of_birth' => $data['tanggal_lahir'],
                'gender' => $data['jenis_kelamin'],
                'religion' => $data['agama'],
                'phone_number' => $data['no_hp'],
                'email' => $data['email'],
            ]);

            $alternative->refresh();

            $alternative->profile?->address()->create([
                'address' => $data['alamat'],
                'rt' => $data['rt'],
                'rw' => $data['rw'],
                'village_id' => $data['kelurahan'],
                'zip_code' => $data['kode_pos'],
            ]);

            $data = [];
            
            $this->criteriasAttr = $this->criteriasAttr ?? [];

            foreach ($this->criteriasAttr as $criteriaId => $subId) {
                $data[$criteriaId] = ['sub_criteria_id' => $subId];
            }

            $alternative->criteria()->sync($data);

            $data = [];

            foreach ($this->com as $key => $value) {
                $data[] = [
                    'alternative_profile_id' => $alternative->profile?->id,
                    'name_person' => isset($value[0]) ? $value[0] : '-',
                    'val_1' => isset($value[1]) ? $value[1] : '-',
                    'val_2' => isset($value[2]) ? $value[2] : '-',
                    'type' => $key,
                ];
            }

            AlternativeCriteriaComponent::upsert($data, ['alternative_profile_id']);

            $ktp = '';
            $bakalcalon = '';
            $ijazah = '';
            $pemilih = '';
            $kta = '';
            $foto = '';
            $jasmani = '';
            $rohani = '';
            $narkoba = '';
            $mantan = '';
            $terpidana = '';
            $mundur = '';
            $pengadilan = '';
            $beda_parpol = '';
            $pemilu = '';
            $gelar = '';

            if ($this->ktp) {
                $file = $this->ktp;
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file->storeAs('public/document/ktp', $filename);
                $ktp = $filename;
            }

            if ($this->bakalcalon) {
                $file = $this->bakalcalon;
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file->storeAs('public/document/bakalcalon', $filename);
                $bakalcalon = $filename;
            }

            if ($this->ijazah) {
                $file = $this->ijazah;
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file->storeAs('public/document/ijazah', $filename);
                $ijazah = $filename;
            }

            if ($this->pemilih) {
                $file = $this->pemilih;
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file->storeAs('public/document/pemilih', $filename);
                $pemilih = $filename;
            }

            if ($this->kta) {
                $file = $this->kta;
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file->storeAs('public/document/kta', $filename);
                $kta = $filename;
            }

            if ($this->foto) {
                $file = $this->foto;
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file->storeAs('public/document/foto', $filename);
                $foto = $filename;
            }

            if ($this->jasmani) {
                $file = $this->jasmani;
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file->storeAs('public/document/jasmani', $filename);
                $jasmani = $filename;
            }

            if ($this->rohani) {
                $file = $this->rohani;
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file->storeAs('public/document/rohani', $filename);
                $rohani = $filename;
            }

            if ($this->narkoba) {
                $file = $this->narkoba;
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file->storeAs('public/document/narkoba', $filename);
                $narkoba = $filename;
            }

            if ($this->mantan) {
                $file = $this->mantan;
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file->storeAs('public/document/mantan', $filename);
                $mantan = $filename;
            }

            if ($this->terpidana) {
                $file = $this->terpidana;
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file->storeAs('public/document/terpidana', $filename);
                $terpidana = $filename;
            }

            if ($this->mundur) {
                $file = $this->mundur;
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file->storeAs('public/document/mundur', $filename);
                $mundur = $filename;
            }

            if ($this->pengadilan) {
                $file = $this->pengadilan;
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file->storeAs('public/document/pengadilan', $filename);
                $pengadilan = $filename;
            }

            if ($this->beda_parpol) {
                $file = $this->beda_parpol;
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file->storeAs('public/document/beda_parpol', $filename);
                $beda_parpol = $filename;
            }

            if ($this->pemilu) {
                $file = $this->pemilu;
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file->storeAs('public/document/pemilu', $filename);
                $pemilu = $filename;
            }

            if ($this->gelar) {
                $file = $this->gelar;
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file->storeAs('public/document/gelar', $filename);
                $gelar = $filename;
            }

            $data = [
                'ktp' => $ktp,
                'bakalcalon' => $bakalcalon,
                'ijazah' => $ijazah,
                'pemilih' => $pemilih,
                'kta' => $kta,
                'foto' => $foto,
                'jasmani' => $jasmani,
                'rohani' => $rohani,
                'narkoba' => $narkoba,
                'mantan' => $mantan,
                'terpidana' => $terpidana,
                'mundur' => $mundur,
                'pengadilan' => $pengadilan,
                'beda_parpol' => $beda_parpol,
                'pemilu' => $pemilu,
                'gelar' => $gelar
            ];

            $alternative->profile?->document()->create($data);

            $alternative->refresh();

            // $documentSchool = [];

            // if ($this->raport_sd) {
            //     $file = $this->raport_sd;
            //     $filename = date('YmdHi').$file->getClientOriginalName();
            //     $file->storeAs('public/document/raport_sd', $filename);
            //     $documentSchool[] = ['alternative_document_id' => $alternative->profile?->document->id, 'raport' => $filename, 'type' => DocumentType::SD];
            // }

            // if ($this->raport_smp) {
            //     $file = $this->raport_smp;
            //     $filename = date('YmdHi').$file->getClientOriginalName();
            //     $file->storeAs('public/document/raport_smp', $filename);
            //     $documentSchool[] = ['alternative_document_id' => $alternative->profile?->document->id, 'raport' => $filename, 'type' => DocumentType::SMP];
            // }

            // if ($this->raport_sma) {
            //     $file = $this->raport_sma;
            //     $filename = date('YmdHi').$file->getClientOriginalName();
            //     $file->storeAs('public/document/raport_sma', $filename);
            //     $documentSchool[] = ['alternative_document_id' => $alternative->profile?->document->id, 'raport' => $filename, 'type' => DocumentType::SMA];
            // }

            // if (count($documentSchool) > 0) {
            //     AlternativeDocumentSchool::upsert($documentSchool, ['alternative_document_id', 'type']);
            // }

            DB::commit();

            return redirect()->route('register')->with('success', 'Terima kasih sudah mendaftar, data anda sudah kami simpan. Pastikan mengecek Email yang didaftarkan untuk mendapatkan Informasi/ Pengumuman Selanjutnya');

        } catch (Exception $e) {
            DB::rollback();

            throw $e;

            return redirect()->route('register')->with('error', 'Terjadi kesalahan saat menyimpan data, hubungi admin untuk info lebih lanjut.');
        }
    }

    public function render()
    {
        return view('livewire.register-page')->layout('layouts.base');
    }
}
