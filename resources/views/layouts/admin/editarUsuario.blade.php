@extends('wrapper')
@section('contenido-dashboard')
    <div class="page-content-wrapper">
        <!-- start page content-->
        <div class="page-content">
            <!--start breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Pages</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0 align-items-center">
                            <li class="breadcrumb-item"><a href="{{ route('admin') }}"><ion-icon name="home-outline"></ion-icon></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Editar usuario</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->

            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="card radius-10">
                        <div class="card-body">
                            <form method="POST" enctype="multipart/form-data" action="{{ route('postUsuario') }}">
                                @csrf
                                <input type="hidden" name="id" value="{{ $user->id }}">
                                <h5 class="mb-3">Editar Perfil</h5>
                                <div class="mb-4 d-flex flex-column gap-3 align-items-center justify-content-center">
                                    <div class="user-change-photo shadow">
                                        @if ($user->imagen_perfil == null)
                                            <img src="{{ asset('avatar.png') }}" alt="">
                                        @else
                                            <img src="{{ asset('storage/perfil/' . $user->imagen_perfil) }}"
                                                alt="Perfil">
                                        @endif
                                    </div>
                                    <input type="file" id="imagen_perfil" name="imagen_perfil"
                                        accept="image/png,image/jpg,image/jpeg">
                                    <label class="btn btn-outline-primary btn-sm radius-30 px-4"
                                        for="imagen_perfil"><ion-icon name="image-sharp"></ion-icon>Cambiar foto de
                                        perfil</label>
                                </div>
                                <h5 class="mb-0 mt-4">Informacion de usuario</h5>
                                <hr>
                                <div class="row g-3">
                                    <div class="col-6">
                                        <label class="form-label" for="ci">CI <span
                                                style="color: red">*</span></label>
                                        <input type="text" class="form-control" value="{{ $user->ci }}"
                                            id="ci" name="ci">
                                        @error('ci')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label" for="expedido">Expedido <span
                                                style="color: red">*</span></label>
                                        <input type="text" class="form-control" value="{{ $user->expedido }}"
                                            id="expedido" name="expedido">
                                        @error('expedido')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label" for="paterno">Apellido Paterno <span
                                                style="color: red">*</span></label>
                                        <input type="text" class="form-control" value="{{ $user->paterno }}"
                                            id="paterno" name="paterno">
                                        @error('paterno')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label" for="materno">Apellido Materno <span
                                                style="color: red">*</span></label>
                                        <input type="text" class="form-control" value="{{ $user->materno }}"
                                            id="materno" name="materno">
                                        @error('materno')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label" for="nombres">Nombres <span
                                                style="color: red">*</span></label>
                                        <input type="text" class="form-control" value="{{ $user->nombres }}"
                                            id="nombres" name="nombres">
                                        @error('nombres')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label" for="fecha_nacimiento">Fecha de Nacimiento <span
                                                style="color: red">*</span></label>
                                        <input type="date" class="form-control" value="{{ $user->fecha_nacimiento }}"
                                            id="fecha_nacimiento" name="fecha_nacimiento">
                                        @error('fecha_nacimiento')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label" for="estado_civil">Estado Civil <span
                                                style="color: red">*</span></label>
                                        <select class="form-control" id="estado_civil" name="estado_civil">
                                            <option value="">Seleccione opción</option>
                                            <option value="SOLTERO/A"
                                                {{ $user->estado_civil == 'SOLTERO/A' ? 'selected' : '' }}>SOLTERO/A
                                            </option>
                                            <option value="CASADO/A"
                                                {{ $user->estado_civil == 'CASADO/A' ? 'selected' : '' }}>CASADO/A</option>
                                            <option value="VIUDO/A"
                                                {{ $user->estado_civil == 'VIUDO/A' ? 'selected' : '' }}>VIUDO/A</option>
                                        </select>
                                        @error('estado_civil')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label" for="profesion">Profesion <span
                                                style="color: red">*</span></label>
                                        <input type="text" class="form-control" value="{{ $user->profesion }}"
                                            id="profesion" name="profesion">
                                        @error('profesion')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <h5 class="mb-0 mt-4">Informacion de contacto</h5>
                                <hr>
                                <div class="row g-3">
                                    <div class="col-12">
                                        <label class="form-label" for="email">Email <span
                                                style="color: red">*</span></label>
                                        <input type="email" class="form-control" value="{{ $user->email }}"
                                            id="email" name="email">
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label" for="username">Nombre de usuario <span
                                                style="color: red">*</span></label>
                                        <input type="username" class="form-control" value="{{ $user->username }}"
                                            id="username" name="username">
                                        @error('username')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label" for="id_role">Rol de usuario <span
                                                style="color: red">*</span></label>
                                        <select class="form-control" id="id_role" name="id_role"
                                            @if (Auth::user()->id_role != 1 || $user->id == 1) style="pointer-events: none" @endif>
                                            <option value="">Seleccione opción</option>
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->id_role }}"
                                                    {{ $user->id_role == $role->id_role ? 'selected' : '' }}>
                                                    {{ $role->nombre_rol }}</option>
                                            @endforeach
                                        </select>
                                        @error('id_role')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label" for="password">Nueva contraseña</label>
                                        <input type="password" class="form-control" id="password" name="password">
                                        @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label" for="confirmar_password">Confirmar nueva contraseña</label>
                                        <input type="password" class="form-control" id="confirmar_password" name="confirmar_password">
                                        @error('confirmar_password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="text-start mt-3">
                                    <button type="submit" class="btn btn-primary px-4">Guardar datos</button>
                                </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div><!--end row-->

        </div>
        <!-- end page content-->
    </div>
@endsection
