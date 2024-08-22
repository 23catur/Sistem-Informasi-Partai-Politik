<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="{{ asset('img/icons/icon-48x48.png') }}" />

    <title>Masuk | NasDem Enrekang</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lipis/flag-icons@6.6.6/css/flag-icons.min.css" />
    <link rel="stylesheet" href="{{ asset('css/sweetalert2.min.css') }}">
</head>

<body>
    <main class="d-flex w-100">
        <div class="container d-flex flex-column">
            <div class="row vh-100">
                <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-auto d-table h-100">
                    <div class="d-table-cell align-middle">

                        <div class="text-center mt-4">
                            <h1 class="h2">Selamat Datang</h1>
                            <p class="lead">
                                Masuk ke akunmu untuk melanjutkan!
                            </p>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="m-sm-3">
                                    <form action="{{ route('auth.login') }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="form-label">Username</label>
                                            <input
                                                class="form-control form-control-lg @error('username') is-invalid @enderror"
                                                type="text" name="username"
                                                placeholder="username" />
                                            @error('username')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Kata Sandi</label>
                                            <input
                                                class="form-control form-control-lg @error('kata_sandi') is-invalid @enderror"
                                                type="password" name="kata_sandi"
                                                placeholder="Kata Sandi" />
                                            @error('kata_sandi')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div>
                                            <div class="form-check align-items-center">
                                                <input id="customControlInline" type="checkbox" class="form-check-input"
                                                    value="remember-me" name="remember_me" checked>
                                                <label class="form-check-label text-small"
                                                    for="customControlInline">Ingatkan saya</label>
                                            </div>
                                        </div>
                                        <div class="d-grid gap-2 mt-3">
                                            <button type="submit"
                                                class="btn btn-lg btn-primary">Masuk</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="text-center mb-5">
                        Kembali ke <a href="{{ url('/') }}" >Halaman Utama</a>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/sweetalert2.min.js') }}"></script>

    <x-alert-toast />
</body>

</html>
