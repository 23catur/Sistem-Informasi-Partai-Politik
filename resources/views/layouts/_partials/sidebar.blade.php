@php
    use App\Utils\Utils;
@endphp
<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="{{ route('dashboard') }}">
            <span class="align-middle">NasDem Enrekang</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">

            </li>

            <li class="sidebar-item {{ Utils::menuActive(['dashboard']) }}">
                <a class="sidebar-link" href="{{ route('dashboard') }}">
                    <i class="align-middle" data-feather="home"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>

            @if (auth()->user()->level->value == App\Enums\UserLevel::Admin)
            

            <li
                class="sidebar-item {{ Utils::menuActive(['alternatives.index', 'alternatives.create', 'alternatives.edit']) }}">
                <a class="sidebar-link" href="{{ route('alternatives.index') }}">
                    <i class="align-middle" data-feather="list"></i> <span class="align-middle">Data Calon Legislatif</span>
                </a>
            </li>

            <li
                class="sidebar-item {{ Utils::menuActive(['criterias.index', 'criterias.create', 'criterias.edit', 'criterias.show', 'sub-criterias.create', 'sub-criterias.edit']) }}">
                <a class="sidebar-link" href="{{ route('criterias.index') }}">
                    <i class="align-middle" data-feather="tag"></i> <span class="align-middle">Data Kriteria</span>
                </a>
            </li>

            <li
                class="sidebar-item {{ Utils::menuActive(['alternatives.assesments.index']) }}">
                <a class="sidebar-link" href="{{ route('alternatives.assesments.index') }}">
                    <i class="align-middle" data-feather="check-circle"></i> <span class="align-middle">Penilaian</span>
                </a>
            </li>

            <li
                class="sidebar-item {{ Utils::menuActive(['algorithm.index']) }}">
                <a class="sidebar-link" href="{{ route('algorithm.index') }}">
                    <i class="align-middle" data-feather="star"></i> <span class="align-middle">Perhitungan</span>
                </a>
            </li>

            <li
                class="sidebar-item {{ Utils::menuActive(['algorithm.result']) }}">
                <a class="sidebar-link" href="{{ route('algorithm.result') }}">
                    <i class="align-middle" data-feather="book"></i> <span class="align-middle">Hasil Perankingan</span>
                </a>
            </li>
            @endif

            @if (auth()->user()->level->value == App\Enums\UserLevel::Superuser)
                
                <li
                class="sidebar-item {{ Utils::menuActive(['alternatives.index', 'alternatives.create', 'alternatives.edit']) }}">
                <a class="sidebar-link" href="{{ route('alternatives.index') }}">
                    <i class="align-middle" data-feather="list"></i> <span class="align-middle">Data Calon Legislatif</span>
                </a>
            </li>

            <li
                class="sidebar-item {{ Utils::menuActive(['criterias.index', 'criterias.create', 'criterias.edit', 'criterias.show', 'sub-criterias.create', 'sub-criterias.edit']) }}">
                <a class="sidebar-link" href="{{ route('criterias.index') }}">
                    <i class="align-middle" data-feather="tag"></i> <span class="align-middle">Data Kriteria</span>
                </a>
            </li>

            <li
                class="sidebar-item {{ Utils::menuActive(['alternatives.assesments.index']) }}">
                <a class="sidebar-link" href="{{ route('alternatives.assesments.index') }}">
                    <i class="align-middle" data-feather="check-circle"></i> <span class="align-middle">Penilaian & Validasi</span>
                </a>
            </li>

            <li
                class="sidebar-item {{ Utils::menuActive(['algorithm.index']) }}">
                <a class="sidebar-link" href="{{ route('algorithm.index') }}">
                    <i class="align-middle" data-feather="star"></i> <span class="align-middle">Perhitungan</span>
                </a>
            </li>

            <li
                class="sidebar-item {{ Utils::menuActive(['algorithm.result']) }}">
                <a class="sidebar-link" href="{{ route('algorithm.result') }}">
                    <i class="align-middle" data-feather="book"></i> <span class="align-middle">Hasil Perankingan</span>
                </a>
            </li>
                <li class="sidebar-item {{ Utils::menuActive(['periods.index']) }}">
                    <a class="sidebar-link" href="{{ route('periods.index') }}">
                        <i class="align-middle" data-feather="list"></i> <span class="align-middle">Periode</span>
                    </a>
                </li>
                <li class="sidebar-item {{ Utils::menuActive(['users.index', 'users.create', 'users.edit']) }}">
                    <a class="sidebar-link" href="{{ route('users.index') }}">
                        <i class="align-middle" data-feather="users"></i> <span class="align-middle">Pengguna</span>
                    </a>
                </li>
        @endif
        </ul>
    </div>
</nav>
