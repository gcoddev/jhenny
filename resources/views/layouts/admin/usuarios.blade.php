@extends('wrapper')
@section('contenido-dashboard')
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Usuarios</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0 align-items-center">
                            <li class="breadcrumb-item"><a href="{{ route('admin') }}"><ion-icon
                                        name="home-outline"></ion-icon></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Usuarios</li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
                    <div class="btn-group">
                        <a href="{{ route('nuevoUsuario') }}" class="btn btn-outline-primary">Nuevo usuario</a>
                    </div>
                </div>
            </div>

            @include('mensajes')

            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <h5 class="mb-0">Usuarios habilitados</h5>
                        {{-- <form class="ms-auto position-relative">
                            <div class="position-absolute top-50 translate-middle-y search-icon px-3"><ion-icon
                                    name="search-sharp"></ion-icon></div>
                            <input class="form-control ps-5" type="text" placeholder="search">
                        </form> --}}
                    </div>
                    <div class="table-responsive mt-3">
                        <table class="table align-middle">
                            <thead class="table-secondary">
                                <tr>
                                    <th>#</th>
                                    <th>Nombres</th>
                                    <th>Apellido Paterno</th>
                                    <th>Apellido Materno</th>
                                    <th>CI</th>
                                    <th>Expedido</th>
                                    <th>Email</th>
                                    <th>Rol</th>
                                    <th>Rol</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($usuarios as $usuario)
                                    <tr>
                                        <td>{{ $usuario->id }}</td>
                                        {{-- <td>
                                        <div class="d-flex align-items-center gap-3 cursor-pointer">
                                            <img src="assets/images/avatars/01.png" class="rounded-circle" width="44"
                                                height="44" alt="">
                                            <div class="">
                                                <p class="mb-0"></p>
                                            </div>
                                        </div>
                                    </td> --}}
                                        <td>{{ $usuario->nombres }}</td>
                                        <td>{{ $usuario->paterno }}</td>
                                        <td>{{ $usuario->materno }}</td>
                                        <td>{{ $usuario->ci }}</td>
                                        <td>{{ $usuario->expedido }}</td>
                                        <td>{{ $usuario->email }}</td>
                                        <td>{{ $usuario->nombre_rol }}</td>
                                        <td>
                                            @if ($usuario->id == 1)
                                                <span class="badge bg-success border-0">{{ $usuario->status }}</span>
                                            @else
                                                @if ($usuario->status == 'ACTIVO')
                                                    <form action="{{ route('post_status', $usuario->id) }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" value="{{ $usuario->status }}"
                                                            name="status">
                                                        <button class="badge bg-success border-0"
                                                            type="submit">{{ $usuario->status }}</button>
                                                    </form>
                                                @elseif ($usuario->status == 'INACTIVO')
                                                    <form action="{{ route('post_status', $usuario->id) }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" value="{{ $usuario->status }}"
                                                            name="status">
                                                        <button class="badge bg-danger border-0"
                                                            type="submit">{{ $usuario->status }}</button>
                                                    </form>
                                                @endif
                                            @endif
                                        </td>
                                        <td>
                                            @if ($usuario->id != 1)
                                                <a href="{{ route('editarUsuario', $usuario->id) }}" class="btn btn-sm btn-warning"
                                                    data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                    title="Editar usuario" data-bs-original-title="Edit info"
                                                    aria-label="Edit">
                                                    <ion-icon name="pencil-outline"></ion-icon>
                                                    Editar
                                                </a>
                                                <form action="{{ route('eliminarUsuario', $usuario->id) }}" method="POST"
                                                    style="display: inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger"
                                                        data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                        title="Eliminar usuario" data-bs-original-title="Delete"
                                                        aria-label="Delete">
                                                        <ion-icon name="trash-outline"></ion-icon>
                                                        Eliminar
                                                    </button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('components.footer')
@endsection
