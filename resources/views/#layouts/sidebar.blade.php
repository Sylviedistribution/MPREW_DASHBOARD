<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4" id="sidenav-main">
    <!-- Icône pour ouvrir/fermer le sidebar sur mobile -->
    <button class="hamburger-menu" id="hamburger-menu" aria-label="Toggle sidebar">
        <span class="bar"></span>
        <span class="bar"></span>
        <span class="bar"></span>
    </button>

    <div class="sidenav-header">
        <a class="navbar-brand m-0" href="{{route('index')}}">
            <img src="{{asset('assets/img/logo_icon.png')}}" width="50px" height="80px" class="navbar-brand-img" alt="main_logo">
            <span class="ms-1 font-weight-bold">MPREW</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="navbar-collapse w-auto" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <!-- Menu items (Dashboard, Clients, Commandes, etc.) -->
            <li class="nav-item">
                <a class="nav-link {{ Request::is('index*') ? 'active' : '' }}" href="{{route("index")}}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-tv-2 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>

            @if(auth('admin')->check())
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('clients*') ? 'active' : '' }}" href="{{ route('clients.list') }}">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-circle-08 text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Clients</span>
                    </a>
                </li>
            @endif

            @if(auth('artisan')->check())
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('commandes*') ? 'active' : '' }}" href="#">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-cart text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Commandes</span>
                    </a>
                </li>
            @endif

            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Plus d'options</h6>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-button-power text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Se déconnecter</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
