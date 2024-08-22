<!DOCTYPE html>
<html lang="en" class="loading">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="{{ asset('img/icons/logo.png') }}" />

    <title>Register | NasDem Enrekang</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lipis/flag-icons@6.6.6/css/flag-icons.min.css" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
    @livewireStyles

    <style>
        .active {
            background-color: #ffffff;
        }
    </style>
</head>

<body>
    <div id="loading">
        <div class="spinner-border text-secondary" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
    {{ $slot }}
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('js/select2.min.js') }}"></script>

    @livewireScripts
    <script>
        $(document).ready(function () {
            $('.select2').select2()
        })
    </script>
    <x-alert-toast />
    <x-livewire-alert::scripts />
</body>

</html>
