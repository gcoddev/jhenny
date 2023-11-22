<aside class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ asset('logo.jpeg') }}" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">IDIOMAS</h4>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="{{ route('admin') }}">
                <div class="parent-icon">
                    <ion-icon name="home-outline"></ion-icon>
                </div>
                <div class="menu-title">Inicio</div>
            </a>
        </li>
        @if (Auth::user()->id_role == 1 || Auth::user()->id_role == 2)
            <li class="menu-label">Menu</li>
            <li> <a href="{{ route('usuarios') }}">
                    <ion-icon name="person-outline"></ion-icon>&nbsp;&nbsp;Usuarios
                </a>
            </li>
        @endif
        <li class="menu-label">TRADUCCIÓN</li>
        <li>
            <a href="{{ route('solicitudes') }}">
                <ion-icon name="newspaper-outline"></ion-icon>&nbsp;&nbsp;Solicitudes
            </a>
        </li>
        @if (Auth::user()->id_role == 1 || Auth::user()->id_role == 2 || Auth::user()->id_role == 3)
            <li>
                <a href="{{ route('asignados') }}">
                    <ion-icon name="people-outline"></ion-icon>&nbsp;&nbsp;Asignacion
                </a>
            </li>
        @endif
        <li class="menu-label">INTERPRETACION</li>
        <li>
            <a href="{{ route('interpretacion') }}">
                <ion-icon name="newspaper-outline"></ion-icon>&nbsp;&nbsp;Solicitudes
            </a>
        </li>
        @if (Auth::user()->id_role == 1 || Auth::user()->id_role == 2 || Auth::user()->id_role == 4)
            <li>
                <a href="{{ route('asignadosI') }}">
                    <ion-icon name="people-outline"></ion-icon>&nbsp;&nbsp;Asignacion
                </a>
            </li>
        @endif
        @if (Auth::user()->id_role == 1 || Auth::user()->id_role == 2)
            <li class="menu-label">COMPLEMENTOS</li>
            <li> <a href="{{ route('idiomas') }}">
                    <ion-icon name="language-outline"></ion-icon>&nbsp;&nbsp;Idiomas
                </a>
            </li>
            <li> <a href="{{ route('pagos') }}">
                    <ion-icon name="card-outline"></ion-icon>&nbsp;&nbsp;Metodos de pago
                </a>
            </li>
        @endif
        @if (Auth::user()->id_role != 5)
            <li class="menu-label">REPORTES</li>
            <li> <a href="{{ route('reportes') }}">
                    <ion-icon name="clipboard-outline"></ion-icon>&nbsp;&nbsp;Traducciones
                </a>
            </li>
            <li> <a href="{{ route('reportesI') }}">
                    <ion-icon name="clipboard-outline"></ion-icon>&nbsp;&nbsp;Interpretaciones
                </a>
            </li>
        @endif
    </ul>
    <!--end navigation-->
</aside>
