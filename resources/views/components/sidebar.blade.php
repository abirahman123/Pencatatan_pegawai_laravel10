<aside class="sidebar d-flex flex-column flex-shrink-0 bg-secondary text-white">
    <a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <span class="fs-4 ms-2 d-sm-none"><span data-feather="briefcase"></span></span>
        <span class="fs-4 ms-5 brand-text">MyEmployee</span>
        
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item my-2">
            <a href="{{ route('dashboard') }}"
                class="nav-link text-white border border-light {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <span data-feather="home"></span>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="nav-item my-2">
            <a href="{{ route('pegawais.index') }}"
                class="nav-link text-white border border-light {{ request()->routeIs('pegawais.index') ? 'active' : '' }}">
                <span data-feather="users"></span>
                <span>Daftar Pegawai</span>
            </a>
        </li>
        <li class="my-2">
            <form method="POST" action="{{ route('logout') }}" class="d-inline">
                @csrf
                <a href="#" class="nav-link text-white"
                    onclick="event.preventDefault(); this.closest('form').submit();">
                    <span data-feather="log-out"></span>
                    <span>Logout</span>
                </a>
            </form>
        </li>
    </ul>
</aside>
