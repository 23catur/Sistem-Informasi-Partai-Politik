<nav class="navbar navbar-expand navbar-light navbar-bg">
    <a class="sidebar-toggle js-sidebar-toggle">
        <i class="hamburger align-self-center"></i>
    </a>
    <div class="navbar-collapse collapse">
        <ul class="navbar-nav navbar-align">
            <li class="nav-item dropdown">
                <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                    <i class="align-middle" data-feather="settings"></i>
                </a>

                <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                    <img src="{{ auth()->user()->picture_url ? asset('storage/picture/' . auth()->user()->picture_url) : asset('img/avatars/user.jpg') }}" class="avatar img-fluid rounded me-1"
                        alt="Charles Hall" /> <span class="text-dark">{{ auth()->user()->name }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item" href="{{ route('users.profile.index') }}"><i class="align-middle me-1"
                            data-feather="user"></i> Profile</a>
                    <a class="dropdown-item" href="{{ route('users.change_password.index') }}"><i class="align-middle me-1" data-feather="key"></i>
                        Ubah Kata Sandi</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('auth.logout') }}">Keluar</a>
                </div>
            </li>
        </ul>
    </div>
</nav>
