<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>NasDem Enrekang</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('assets/img/nasdem.png')}}" rel="icon">
  <!-- <link href="{{asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon"> -->

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: FlexStart
  * Updated: Jul 27 2023 with Bootstrap v5.3.1
  * Template URL: https://bootstrapmade.com/flexstart-bootstrap-startup-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span>NasDem Enrekang</span>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Beranda</a></li>
          <li><a class="nav-link scrollto" href="#about">Tentang</a></li>
          <li><a class="nav-link scrollto" href="#features">Persyaratan Caleg</a></li>
          <li><a class="nav-link scrollto" href="#services">Alur Pendaftaran</a></li>
          <li><a class="nav-link scrollto" href="#faq">FAQ</a></li>
          <li><a class="nav-link scrollto" href="#contact">Kontak</a></li>
          <li><a class="getstarted scrollto" href="{{ route('register')}}">Daftar</a></li>
          <li><a class="nav-link scrollto" href="{{route('auth.login')}}">Admin</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center">
          <h1 data-aos="fade-up">Selamat Datang di NasDem Enrekang</h1>
          <h2 data-aos="fade-up" data-aos-delay="400">Aplikasi Penentuan Nomor Urut Calon Legislatif Kabupaten Enrekang</h2>
          <div data-aos="fade-up" data-aos-delay="600">
            <div class="text-center text-lg-start">
              <a href="{{ route('register') }}" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                <span>Daftar Segera</span>
                <i class="bi bi-arrow-right"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
          <img src="assets/img/logonasdem.png" class="img-fluid" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">
    <!-- ======= About Section ======= -->
    <section id="about" class="about">

      <div class="container" data-aos="fade-up">
        <div class="row gx-0">

        <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
        <div class="content">
            <h3>Tentang</h3>
            <h2>APLIKASI PENENTUAN NOMOR URUT CALEG ENREKANG</h2>
            <p>
            Aplikasi ini merupakan aplikasi penentuan nomor urut calon legislatif berbasis website yang bekerjasama dengan DPD Nasional Demokrasi (NasDem) Enrekang 
            berfungsi untuk menyeleksi kadernya dalam menentukan nomor urut caleg yang akan maju dipemilu legislatif sesuai dengan kriteria-kriteria yang telah ditetapkan. 
            Sistem ini membantu Dewan Pimpinan Daerah (DPD) Nasional Demokrasi (NasDem) kabupaten Enrekang agar lebih efisien dan transparansi
            </p>
            <div class="text-center text-lg-start">
                <a href="https://drive.google.com/file/d/1wTX5bFk9dT9Rj8KvRzUPhAJ9rOT9gE2P/view?usp=sharing" target="_blank" class="btn-read-more d-inline-flex align-items-center justify-content-center align-self-center">
                    <span>PANDUAN DAFTAR</span>
                    <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>

          <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
            <img src="assets/img/nasdem.jpg" class="img-fluid" alt="">
          </div>

        </div>
      </div>

    </section><!-- End About Section -->

    <!-- ======= Values Section ======= -->
    <section id="values" class="values">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h2>DPD NASDEM KABUPATEN ENREKANG</h2>
          <p>Program ini dikelola oleh Dewan Pimpinan Daerah Partai NasDem Kabupaten Enrekang</p>
        </header>

        <div class="row">

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
            <div class="box">
              <img src="assets/img/mahar.png" class="img-fluid" alt="">
              
              <!-- <h3>Politik Tanpa Mahar</h3> -->
              <p>langkah untuk mengembalikan kepercayaan masyarakat terhadap partai politik yang mengalami penurunan, mengurangi beban finansial kandidat sehingga tidak perlu memikirkan “balik modal” dan dapat berkonsentrasi dalam membangun daerah, serta ingin membangun kesadaran kepada partai politik lain dan masyarakat bahwa Pileg, Pipres dan Pilkada merupakan sarana mencari pemimpin yang terbaik bukan untuk mencari keuntungan finansial.</p>
            
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="400">
            <div class="box">
              <img src="assets/img/manifesto1.png" class="img-fluid" alt="">
              
              <!-- <h3>Manifesto Nasional Demokrat</h3> -->
              <p>Nasional Demokrat adalah gerakan perubahan yang berikhtiar menggalang seluruh warga negara dari beragam lapisan dan golongan untuk merestorasi Indonesia. Nasional Demokrat tidak hanya bertumpu dan berpusat di Jakarta, melainkan gerakan perubahan yang titik-titik sumbunya terpencar diseluruh penjuru Indonesia.</p>
            
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="600">
            <div class="box">
              <img src="assets/img/platform.png" class="img-fluid" alt="">
              
              <!-- <h3>Penggunaan Teknologi dalam Platform Restorasi NasDem</h3> -->
              <p>Program ini berfokus pada restorasi dan perbaikan sistem politik di Indonesia. Platform ini mencakup berbagai aspek, termasuk peningkatan kualitas pemerintahan, mengurangi korupsi, dan meningkatkan transparansi dan lebih efisien. Pendataan dan penentuan nomor urut caleg dilakukan melalui sistem elektronik yang memungkinkan identifikasi dan verifikasi data calon legislatif.</p>
            
            </div>
          </div>

        </div>

      </div>

    </section><!-- End Values Section -->

    <!-- ======= Features Section ======= -->
    <section id="features" class="features">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h2>8 PERSYARATAN CALEG DPRD</h2>
          <p>Syarat Menjadi Calon Legislatif Dewan Perwakilan Rakyat Daerah (DPRD)</p>
        </header>

        <div class="row">

          <div class="col-lg-6">
            <img src="assets/img/features.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-6 mt-5 mt-lg-0 d-flex">
            <div class="row align-self-center gy-4">
                <!-- 1 -->
              <div class="col-md-6" data-aos="zoom-out" data-aos-delay="200">
              <div class="feature-box d-flex align-items-center">
                  <i class="bi bi-check"></i>
                  <h3>Wajib Merupakan Warga Negara Indonesia (WNI)</h3>
              </div>
              </div>
              <div class="col-md-6" data-aos="zoom-out" data-aos-delay="400">
                <div class="feature-box d-flex align-items-center">
                  <i class="bi bi-check"></i>
                  <h3>Berumur 21 Tahun atau Lebih</h3>
                </div>
              </div>
              <div class="col-md-6" data-aos="zoom-out" data-aos-delay="600">
                <div class="feature-box d-flex align-items-center">
                  <i class="bi bi-check"></i>
                  <h3>Menjadi Anggota partai politik peserta pemilu</h3>
                </div>
              </div>
              <div class="col-md-6" data-aos="zoom-out" data-aos-delay="700">
                <div class="feature-box d-flex align-items-center">
                  <i class="bi bi-check"></i>
                  <h3>Dicalonkan sebagai bakal calon anggota DPR oleh partai politik peserta pemilu</h3>
                </div>
              </div>
              <div class="col-md-6" data-aos="zoom-out" data-aos-delay="300">
                <div class="feature-box d-flex align-items-center">
                  <i class="bi bi-check"></i>
                  <h3>Pendidikan minimal SMA/sederajat</h3>
                </div>
              </div>
              <div class="col-md-6" data-aos="zoom-out" data-aos-delay="500">
                <div class="feature-box d-flex align-items-center">
                  <i class="bi bi-check"></i>
                  <h3>Terdaftar sebagai pemilih</h3>
                </div>
              </div>
              <div class="col-md-6" data-aos="zoom-out" data-aos-delay="700">
                <div class="feature-box d-flex align-items-center">
                  <i class="bi bi-check"></i>
                  <h3>Dicalonkan di 1 lembaga perwakilan</h3>
                </div>
              </div>
              <div class="col-md-6" data-aos="zoom-out" data-aos-delay="700">
                <div class="feature-box d-flex align-items-center">
                  <i class="bi bi-check"></i>
                  <h3>Dicalonkan hanya di 1 dapil</h3>
                </div>
              </div>
            </div>
          </div>

        </div> <!-- / row -->      

      </div>

    </section><!-- End Features Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h2>ALUR PENDAFTARAN</h2>
          <p>Alur Pendaftaran Calon Legislatif NasDem</p>
        </header>

        <div class="row gy-4">

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="service-box blue">
              <i class="ri-discuss-line icon"></i>
              <h3>Pendaftaran dan Pengisian Data</h3>
              <p>Calon penerima mengisi formulir pendaftaran online dengan informasi pribadi dan data komponen serta mengunggah beberapa dokumen pendukung</p>
              <a href="#service" class="read-more"><span>1</span> <i class="bi bi-arrow-right"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="service-box orange">
              <i class="ri-discuss-line icon"></i>
              <h3>Verifikasi Data dan Dokumen</h3>
              <p>Sistem melakukan verifikasi data dan dokumen yang diunggah oleh calon legislatif</p>
              <a href="#" class="read-more"><span>2</span> <i class="bi bi-arrow-right"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
            <div class="service-box green">
              <i class="ri-discuss-line icon"></i>
              <h3>Analisis Data dan Penilaian Kelayakan</h3>
              <p>Analisis data berdasarkan kriteria kelayakan yang telah ditetapkan serta menghasilkan skor atau peringkat untuk setiap calon legislatif berdasarkan analisis data</p>
              <a href="#" class="read-more"><span>3</span> <i class="bi bi-arrow-right"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
            <div class="service-box red">
              <i class="ri-discuss-line icon"></i>
              <h3>Seleksi dan Penentuan Nomor Urut Calon Legislatif</h3>
              <p>Calon legislatif yang memenuhi kriteria kelayakan akan diurutkan berdasarkan skor atau peringkat. Berdasarkan peringkat dan kuota yang tersedia, sistem akan menentukan siapa yang layak menjadi nomor urut calon legislatif</p>
              <a href="#" class="read-more"><span>4</span> <i class="bi bi-arrow-right"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
            <div class="service-box purple">
              <i class="ri-discuss-line icon"></i>
              <h3>Pemberitahuan dan Konfirmasi</h3>
              <p>Calon legislatif yang terpilih menerima pemberitahuan melalui surat keputusan dari DPP Partai NasDem</p>
              <a href="#" class="read-more"><span>5</span> <i class="bi bi-arrow-right"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="700">
            <div class="service-box pink">
              <i class="ri-discuss-line icon"></i>
              <h3>Pendataan Lebih Lanjut</h3>
              <p>Data calon legislatif yang telah terpilih diperbarui dan disimpan dalam sistem kemudian menjadi penginputan data ke sistem DPP Partai NasDem</p>
              <a href="#" class="read-more"><span>6</span> </a>
            </div>
          </div>

        </div>

      </div>

    </section><!-- End Services Section -->

    <!-- ======= F.A.Q Section ======= -->
    <section id="faq" class="faq">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h2>F.A.Q</h2>
          <p>Frequently Asked Questions</p>
        </header>

        <div class="row">
          <div class="col-lg-6">
            <!-- F.A.Q List 1-->
            <div class="accordion accordion-flush" id="faqlist1">
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-1">
                  Apa itu Aplikasi SISPEN untuk calon legislatif NasDem Enrekang?
                  </button>
                </h2>
                <div id="faq-content-1" class="accordion-collapse collapse" data-bs-parent="#faqlist1">
                  <div class="accordion-body">
                  Aplikasi SISPEN untuk calon legislatif NasDem Enrekang adalah sistem yang digunakan untuk membantu dalam proses pengambilan keputusan terkait penentuan nomor urut calon legislatif. Aplikasi ini menggunakan data dan algoritma untuk mengidentifikasi calon legislatif yang paling kompeten.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-2">
                  Bagaimana Cara Mengakses Aplikasi SPK NasDem?
                  </button>
                </h2>
                <div id="faq-content-2" class="accordion-collapse collapse" data-bs-parent="#faqlist1">
                  <div class="accordion-body">
                  Anda dapat mengakses Aplikasi SISPEN NasDem melalui platform online yang telah disediakan oleh DPD NasDem Kabupaten Enrekang. Silakan ikuti petunjuk pendaftaran atau login yang diberikan.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-3">
                  Apa Yang Diperlukan untuk Mendaftar Melalui Aplikasi ini?
                  </button>
                </h2>
                <div id="faq-content-3" class="accordion-collapse collapse" data-bs-parent="#faqlist1">
                  <div class="accordion-body">
                  Untuk mendaftar melalui Aplikasi ini, Anda akan memerlukan informasi pribadi, seperti nama, alamat, KTA, KTP dan beberapa dokumen pendukung seperti scan kartu identitas dan bukti lainnya.
                  </div>
                </div>
              </div>

              

            </div>
          </div>

          <div class="col-lg-6">

            <!-- F.A.Q List 2-->
            <div class="accordion accordion-flush" id="faqlist2">

            <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-4">
                  Bagaimana Sistem Menilai Kelayakan Penentuan Nomor Urut?
                  </button>
                </h2>
                <div id="faq-content-4" class="accordion-collapse collapse" data-bs-parent="#faqlist1">
                  <div class="accordion-body">
                  Sistem menggunakan data yang Anda berikan untuk melakukan analisis berdasarkan kriteria kelayakan yang telah ditetapkan dan faktor-faktor lainnya. Berdasarkan analisis ini, sistem menghasilkan skor atau peringkat.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2-content-2">
                  Apakah Data Pribadi Saya Aman?
                  </button>
                </h2>
                <div id="faq2-content-2" class="accordion-collapse collapse" data-bs-parent="#faqlist2">
                  <div class="accordion-body">
                  Ya, data pribadi Anda akan dijaga kerahasiaannya dan digunakan sesuai dengan kebijakan privasi yang berlaku. Hanya pihak yang berwenang yang memiliki akses ke informasi Anda.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2-content-3">
                  Bagaimana Saya Dapat Melakukan Perubahan Data Setelah Pendaftaran?
                  </button>
                </h2>
                <div id="faq2-content-3" class="accordion-collapse collapse" data-bs-parent="#faqlist2">
                  <div class="accordion-body">
                  Jika Anda perlu melakukan perubahan data setelah pendaftaran, biasanya ada opsi dalam aplikasi untuk mengedit atau memperbarui informasi Anda. Anda juga mungkin diminta untuk menghubungi admin partai jika perubahan data lebih kompleks.
                  </div>
                </div>
              </div>

            </div>
          </div>

        </div>

      </div>

    </section><!-- End F.A.Q Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h2>Kontak</h2>
          <p>Kontak Kami</p>
        </header>

        <div class="row gy-4">

          <div class="col-lg-6">

            <div class="row gy-4">
              <div class="col-md-6">
                <div class="info-box">
                  <i class="bi bi-geo-alt"></i>
                  <h3>Alamat</h3>
                  <p>Jln. Jenderal Sudirman No. 26 Kec. Enrekang, Kabupaten Enrekang, Sulawesi Selatan 91711</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box">
                  <i class="bi bi-telephone"></i>
                  <h3>Telpon</h3>
                  <p>+62 812 9055 0277<br>-<br>-<br>-</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box">
                  <i class="bi bi-envelope"></i>
                  <h3>Email Kami</h3>
                  <p>nasdemmenang2013@gmail.com<br></p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box">
                  <i class="bi bi-clock"></i>
                  <h3>Jam Kerja</h3>
                  <p>Senin - Jumat | 08:00 - 03:00</p>
                </div>
              </div>
            </div>

          </div>

          <div class="col-lg-6">
            <form action="forms/contact.php" method="post" class="php-email-form">
              <div class="row gy-4">

                <div class="col-md-6">
                  <input type="text" name="name" class="form-control" placeholder="Nama Anda" required>
                </div>

                <div class="col-md-6 ">
                  <input type="email" class="form-control" name="email" placeholder="Email" required>
                </div>

                <div class="col-md-12">
                  <input type="text" class="form-control" name="subject" placeholder="Subjek" required>
                </div>

                <div class="col-md-12">
                  <textarea class="form-control" name="message" rows="6" placeholder="Pesan" required></textarea>
                </div>

                <div class="col-md-12 text-center">
                  <div class="loading">Memuat</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Pesan Anda telah terkirim. Terima kasih</div>

                  <button type="submit">Kirim Pesan</button>
                </div>

              </div>
            </form>

          </div>

        </div>

      </div>

    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>DPD Enrekang</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/flexstart-bootstrap-startup-template/ -->
        <!-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> -->
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('assets/vendor/purecounter/purecounter_vanilla.js')}}"></script>
  <script src="{{asset('assets/vendor/aos/aos.js')}}"></script>
  <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('assets/js/main.js')}}"></script>

</body>

</html>
