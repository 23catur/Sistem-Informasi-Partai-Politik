@extends('layouts.app')
@section('content')
@section('title', 'Dashboard')

<main id="main" class="main">

    <section class="section dashboard">
        <div class="card info-card customers-card">

            <div class="card-body">
                <h5 class="card-title" style="text-align: center;font-size: 18px;">Aplikasi Penentuan Nomor Urut Calon Legislatif Kabupaten Enrekang</h5>

                <p style="font-size: 18px;">
                    <img style="float: left; margin: 0px 15px 15px 0px;" src="{{asset('img/clients/nasdem.png')}}" width="200" />Aplikasi ini merupakan aplikasi penentuan nomor urut calon legislatif 
                berbasis website yang bekerjasama dengan DPD Nasional Demokrasi (NasDem) Enrekang berfungsi untuk menyeleksi kadernya dalam menentukan nomor urut caleg yang akan maju dipemilu legislatif 
                sesuai dengan kriteria-kriteria yang telah ditetapkan. Sistem ini membantu Dewan Pimpinan Daerah (DPD) Nasional Demokrasi (NasDem) kabupaten Enrekang agar lebih efisien dan transparansi.
                </p>

            </div>
        </div>

    </section>

</main>

@endsection
