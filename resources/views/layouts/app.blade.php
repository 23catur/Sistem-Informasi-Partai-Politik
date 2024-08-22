<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="{{ asset('img/icons/logo.png') }}" />

    <title>@yield('title') | NasDem Enrekang</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- App CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <!-- Flag Icons CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lipis/flag-icons@6.6.6/css/flag-icons.min.css" />
    <!-- Custom Styles -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="{{ asset('css/sweetalert2.min.css') }}">
    <!-- Select2 CSS -->
    <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
    <!-- Livewire Styles -->
    @livewireStyles
    <!-- Extra CSS -->
    @stack('extra-css')
</head>

<body>
    <div id="loading">
        <div class="spinner-border text-secondary" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
    <div class="wrapper">
        @include('layouts._partials.sidebar')
        <div class="main">
            @include('layouts._partials.nav')
            <main class="content">
                <div class="container-fluid p-0">
                    {{ Breadcrumbs::render() }}
                    @yield('content')
                    @isset($slot)
                        {{ $slot }}
                    @endisset
                </div>
            </main>
            @include('layouts._partials.footer')
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <!-- App JS -->
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- jQuery -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <!-- Main JS -->
    <script src="{{ asset('js/main.js') }}"></script>
    <!-- SweetAlert2 JS -->
    <script src="{{ asset('js/sweetalert2.min.js') }}"></script>
    <!-- Select2 JS -->
    <script src="{{ asset('js/select2.min.js') }}"></script>
    <!-- Livewire Scripts -->
    @livewireScripts
    <!-- Select2 Initialization -->
    <script>
        $(document).ready(function () {
            $('.select2').select2()
        })
    </script>
    <!-- Alert Component -->
    <x-alert-toast />
    <!-- Extra JS -->
    @stack('extra-js')
</body>

</html>
