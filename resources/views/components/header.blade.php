<header class="top-header">
    <nav class="navbar navbar-expand gap-3">
        <div class="toggle-icon">
            <ion-icon name="menu-outline"></ion-icon>
        </div>

        <form class="searchbar">
            <div class="position-absolute top-50 translate-middle-y search-icon ms-3">
                <ion-icon name="search-outline"></ion-icon>
            </div>
            <input class="form-control" type="text" placeholder="Search for anything">
            <div class="position-absolute top-50 translate-middle-y search-close-icon">
                <ion-icon name="close-outline"></ion-icon>
            </div>
        </form>
        <div class="top-navbar-right ms-auto">

            <ul class="navbar-nav align-items-center">
                <li class="nav-item">
                    <a class="nav-link dark-mode-icon" href="javascript:;" onclick="changeTheme()">
                        <div class="mode-icon">
                            <ion-icon name="moon-outline"></ion-icon>
                        </div>
                    </a>
                </li>
                <li class="">
                    <div class="d-flex flex-row align-items-center mx-3">
                        <div class="mt-2">
                            <h6 class="mb-0 dropdown-user-name">
                                {{ Auth::user()->nombres . ' ' . Auth::user()->paterno . ' ' . Auth::user()->materno }}
                            </h6>
                            <small
                                class="mb-0 dropdown-user-designation text-secondary">{{ Auth::user()->roles->nombre_rol }}</small>
                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown dropdown-user-setting">
                    <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;"
                        data-bs-toggle="dropdown">
                        <div class="user-setting">
                            @if (Auth::user()->imagen_perfil == null)
                                <img src="{{ asset('avatar.png') }}" class="user-img" alt="">
                            @else
                                <img src="{{ asset('storage/perfil/' . Auth::user()->imagen_perfil) }}" class="user-img"
                                    alt="Perfil">
                            @endif
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item" href="{{ route('editarUsuario', Auth::user()->id) }}">
                                <div class="d-flex flex-row align-items-center gap-2">
                                    @if (Auth::user()->imagen_perfil == null)
                                        <img src="{{ asset('avatar.png') }}" class="user-img rounded-circle"
                                            width="54" height="54" alt="">
                                    @else
                                        <img src="{{ asset('storage/perfil/' . Auth::user()->imagen_perfil) }}"
                                            class="user-img rounded-circle" width="54" height="54"
                                            alt="Perfil">
                                    @endif
                                    <div class="">
                                        <h6 class="mb-0 dropdown-user-name">{{ Auth::user()->nombres }}</h6>
                                        <small
                                            class="mb-0 dropdown-user-designation text-secondary">{{ Auth::user()->roles->nombre_rol }}</small>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            {{-- <a class="dropdown-item" href="{{ route('logout') }}">
                                <div class="d-flex align-items-center">
                                    <div class="">
                                        <ion-icon name="log-out-outline"></ion-icon>
                                    </div>
                                    <div class="ms-3"><span>Cerrar sesion</span></div>
                                </div>
                            </a> --}}

                            <form action="{{ route('post_logout') }}" method="POST">
                                @csrf
                                <button class="dropdown-item" type="submit">
                                    <div class="d-flex align-items-center">
                                        <div class="">
                                            <ion-icon name="log-out-outline"></ion-icon>
                                        </div>
                                        <div class="ms-3"><span>Cerrar sesion</span></div>
                                    </div>
                                </button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
