<div class="min-height-300 bg-dark position-absolute w-100"></div>
<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4"
       id="sidenav-main">
    <!-- Bouton pour ouvrir/fermer le sidebar sur mobile -->
    <button class="navbar-toggler d-block d-md-none" type="button" data-bs-toggle="collapse" data-bs-target="#sidenav-collapse-main" aria-controls="sidenav-collapse-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="sidenav-header">
        <a class="navbar-brand m-0" href="{{route('index')}}">
            <img src="{{asset('assets/img/logo_icon.png')}}" width="50px" height="80px" class="navbar-brand-img"
                 alt="main_logo">
            <span class="ms-1 font-weight-bold">MPREW</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <!-- Items de menu (les éléments restent les mêmes, avec des classes pour la responsivité) -->
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
                <!-- Autres liens admin comme Artisans, Robes, etc. -->
            @endif

            @if(auth('artisan')->check())
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('commandes*') ? 'active' : '' }}" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-cart text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Commandes</span>
                    </a>
                    <ul class="dropdown-menu" style="margin-top: 0;margin-left: 25px" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ route('commandes.artisanView') }}">Lister toutes les offres</a></li>
                        <li><a class="dropdown-item" href="{{ route('commandes.accepter') }}">Mes commandes</a></li>
                    </ul>
                </li>
                <!-- Autres liens artisan comme Paiements -->
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
