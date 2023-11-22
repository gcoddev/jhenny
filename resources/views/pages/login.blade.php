@extends('index')
@section('login')
    <div class="wrapper">
        <div class="">
            <div class="row g-0 m-0">
                <div class="col-xl-6 col-lg-12">
                    <div class="login-cover-wrapper">
                        <div class="card shadow-none">
                            <div class="card-body">
                                <div class="text-center">
                                    <h4>Iniciar sesión</h4>
                                    <p>Accede a tu cuenta</p>
                                </div>
                                <form class="form-body row g-3" action="{{ route('post_login') }}" method="POST">
                                    @csrf
                                    <div class="col-12">
                                        <label for="username" class="form-label">Nombre de usuario</label>
                                        <input type="text" class="form-control" id="username" name="username"
                                            value="{{ old('username') }}">
                                    </div>
                                    <div class="col-12">
                                        <label for="password" class="form-label">Contraseña</label>
                                        <input type="password" class="form-control" id="password" name="password">
                                    </div>
                                    <div class="col-12 col-lg-12">
                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-primary">Iniciar sesión</button>
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-6 text-center">
                                        <p class="mb-0"><a href="{{ route('register') }}">Registrarse</a></p>
                                    </div>
                                    <div class="col-6 col-lg-6 text-center">
                                        <p class="mb-0"><a href="{{ route('home') }}">Volver al inicio</a></p>
                                    </div>
                                </form>
                            </div>
                            <div>
                                @include('mensajes')
                                @include('errores')
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-12">
                    <div class="position-fixed top-0 h-100 d-xl-block d-none login-cover-img">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
