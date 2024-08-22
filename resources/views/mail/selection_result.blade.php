<div style="font-family: Arial, Helvetica, sans-serif; font-size: 14px;">
    @if ($status == \App\Enums\ResultStatus::Passed)
    <p>Halo {{ $alternative['name'] }}, {{ $alternative['profile']['nik'] }}</p>

    <p>Kami senang memberitahu Anda bahwa Anda dinyatakan <b>lolos</b> ke tahap selanjutnya dalam seleksi bantuan
        Program Keluarga Harapan (PKH). Selamat atas pencapaian ini!</p>
    <p>Dalam tahap selanjutnya, kami akan melakukan verifikasi dan evaluasi lebih lanjut terhadap data dan kelengkapan
        dokumen yang Anda submit. Proses ini akan memastikan bahwa Anda memenuhi syarat dan kelayakan untuk mendapatkan
        bantuan dari PKH.</p>
    <p>Berikut adalah beberapa hal yang perlu Anda perhatikan selama proses tahap selanjutnya:</p>
    <ol>
        <li>Pastikan Anda memiliki semua dokumen yang diperlukan dalam kondisi yang lengkap dan terbaru.</li>
        <li>Pastikan semua informasi yang Anda berikan akurat dan sesuai dengan kondisi Anda.</li>
        <li>Jaga komunikasi dengan kami terbuka dan respon dengan cepat jika kami meminta informasi tambahan.</li>
    </ol>
    <p>Kami akan segera menghubungi Anda melalui email, telepon, atau surat resmi untuk memberikan petunjuk lebih lanjut
        tentang tahap selanjutnya ini. Harap periksa secara berkala kotak masuk email Anda dan pastikan untuk menjaga
        nomor telepon yang terdaftar tetap aktif.</p>

    <p>Jika Anda memiliki pertanyaan atau membutuhkan bantuan tambahan, jangan ragu untuk menghubungi kami melalui
        kontak yang telah disediakan.</p>

    Salam hangat,
    <br>
    <p>Tim ASPEN (Seleksi Bantuan PKH) <br>
        Telp: 082346390001 <br>
        Email: temanpkhmu@gmail.com</p>
@else
    <p>Halo {{ $alternative['name'] }}, {{ $alternative['profile']['nik'] }}</p>

    <p>Kami ingin memberitahu Anda bahwa setelah melalui proses seleksi yang teliti, kami dengan sedih harus
        memberitahukan bahwa Anda dinyatakan <b>Tidak Lolos</b> untuk melanjutkan ke tahap selanjutnya dalam seleksi
        bantuan Program Keluarga Harapan (PKH).</p>

    <p>Meskipun Anda tidak lolos pada tahap ini, kami tetap menghargai keseriusan dan upaya Anda dalam mengajukan
        permohonan bantuan PKH. Kami memahami bahwa setiap keluarga memiliki kebutuhan yang unik, dan keputusan ini
        tidak mengurangi nilai dan pentingnya situasi Anda.</p>

    <p>Kami ingin mendorong Anda untuk tetap mencari sumber daya dan kesempatan lain yang mungkin dapat membantu dalam
        situasi Anda saat ini. Ada berbagai program bantuan dan layanan lain yang mungkin sesuai dengan kebutuhan dan
        kriteria Anda. Kami mendorong Anda untuk mencari informasi lebih lanjut tentang program-program ini melalui
        sumber daya lokal dan pemerintah setempat.</p>

    <p>Terima kasih atas pengertian dan kerjasamanya selama proses seleksi ini. Jika Anda memiliki pertanyaan lebih
        lanjut atau membutuhkan informasi tambahan, jangan ragu untuk menghubungi kami melalui kontak yang telah kami
        sediakan sebelumnya.</p>

    <p>Kami berharap yang terbaik bagi Anda dan keluarga Anda di masa yang akan datang.</p>

    Salam hangat,
    <br>
    <p>Tim ASPEN (Seleksi Bantuan PKH) <br>
        Telp: 082346390001 <br>
        Email: temanpkhmu@gmail.com</p>
@endif

</div>
