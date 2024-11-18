<div class="min-height-300 bg-dark position-absolute w-100"></div>
<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 "
       id="sidenav-main">
    <div class="sidenav-header">
        <a class="navbar-brand m-0" href="{{route('index')}}">
            <img src="{{asset('assets/img/logo_icon.png')}}" width="50px" height="80px" class="navbar-brand-img"
                 alt="main_logo">
            <span class="ms-1 font-weight-bold">MPREW</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('index*') ? 'active' : '' }}" href="{{route("index")}}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-tv-2 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            @if(auth('admin')->check())
                <li class="nav-item">
                <a class="nav-link {{ Request::is('clients*') ? 'active' : '' }}" href="{{ route('clients.list') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-circle-08 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Clients</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ Request::is('artisans*') ? 'active' : '' }}" href="{{ route('artisans.list') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-circle-08 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Artisans</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ Request::is('robes*') ? 'active' : '' }}" href="{{ route('robes.list') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="text-dark text-sm opacity-10">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                 class="bi bi-person-standing-dress" viewBox="0 0 16 16">
                                <path
                                    d="M8 3a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3m-.5 12.25V12h1v3.25a.75.75 0 0 0 1.5 0V12h1l-1-5v-.215a.285.285 0 0 1 .56-.078l.793 2.777a.711.711 0 1 0 1.364-.405l-1.065-3.461A3 3 0 0 0 8.784 3.5H7.216a3 3 0 0 0-2.868 2.118L3.283 9.079a.711.711 0 1 0 1.365.405l.793-2.777a.285.285 0 0 1 .56.078V7l-1 5h1v3.25a.75.75 0 0 0 1.5 0Z"/>
                            </svg>
                        </i>
                    </div>
                    <span class="nav-link-text ms-1">Robes</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ Request::is('coupes*') ? 'active' : '' }}" href="{{ route('coupes.list') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-palette text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Coupes</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ Request::is('cols*') ? 'active' : '' }}" href="{{ route('cols.list') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-palette text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Cols</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ Request::is('manches*') ? 'active' : '' }}" href="{{ route('manches.list') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-palette text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Manches</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ Request::is('jupes*') ? 'active' : '' }}" href="{{ route('jupes.list') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-palette text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Jupes</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ Request::is('tissus*') ? 'active' : '' }}" href="{{ route('tissus.list') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-palette text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Tissus</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ Request::is('commandes*') ? 'active' : '' }}"
                   href="{{ route('commandes.list') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-cart text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Commandes</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ Request::is('paiements*') ? 'active' : '' }}"
                   href="{{ route('paiements.list') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-credit-card text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Paiements</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ Request::is('livraisons*') ? 'active' : '' }}"
                   href="{{ route('livraisons.list') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-delivery-fast text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Livraisons</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ Request::is('transactions*') ? 'active' : '' }}"
                   href="{{ route('transactions.list') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-money-coins text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Transactions</span>
                </a>
            </li>
            @else

            <li class="nav-item">
                <a class="nav-link {{ Request::is('commandes*') ? 'active' : '' }}"
                   href="{{ route('commandes.artisanView') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-cart text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Commandes</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ Request::is('livraisons*') ? 'active' : '' }}"
                   href="{{ route('livraisons.list') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-delivery-fast text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Livraisons</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ Request::is('transactions*') ? 'active' : '' }}"
                   href="{{ route('transactions.artisans') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-money-coins text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Transactions</span>
                </a>
            </li>
            @endif

            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Pages de compte</h6>
            </li>


            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-key-25 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Se déconnecter</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
