@extends('wrapper')
@section('contenido-dashboard')
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Roles</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0 align-items-center">
                            <li class="breadcrumb-item"><a href="{{ route('admin') }}"><ion-icon
                                        name="home-outline"></ion-icon></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Roles</li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
                    <div class="btn-group">
                        <button type="button" class="btn btn-outline-primary">Nuevo rol</button>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <h5 class="mb-0">Roles de usuario</h5>
                        <form class="ms-auto position-relative">
                            <div class="position-absolute top-50 translate-middle-y search-icon px-3"><ion-icon
                                    name="search-sharp"></ion-icon></div>
                            <input class="form-control ps-5" type="text" placeholder="search">
                        </form>
                    </div>
                    <div class="table-responsive mt-2">
                        <table class="table align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Rol</th>
                                    <th>Usuarios asignados</th>
                                    <th>Permisos</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $rol)
                                    <tr>
                                        <td>{{ $rol->id_role }}</td>
                                        <td>
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="product-info">
                                                    <h6 class="product-name mb-1">{{ $rol->nombre_rol }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>2</td>
                                        <td>
                                            <span class="badge bg-dark">dashboard.admin</span>
                                            <span class="badge bg-dark">dashboard.admin</span>
                                            <span class="badge bg-dark">dashboard.admin</span>
                                            <span class="badge bg-dark">dashboard.admin</span>
                                            <span class="badge bg-dark">dashboard.admin</span>
                                        </td>
                                        <td>
                                            @if ($rol->estado_rol == 'ACTIVO')
                                                <form action="{{ route('post_status_rol', $rol->id_role) }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" value="{{ $rol->estado_rol }}" name="estado_rol">
                                                    <button class="badge bg-success border-0"
                                                        type="submit">{{ $rol->estado_rol }}</button>
                                                </form>
                                            @elseif ($rol->estado_rol == 'INACTIVO')
                                                <form action="{{ route('post_status_rol', $rol->id_role) }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" value="{{ $rol->estado_rol }}" name="estado_rol">
                                                    <button class="badge bg-danger border-0"
                                                        type="submit">{{ $rol->estado_rol }}</button>
                                                </form>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center gap-3 fs-6">
                                                <a href="javascript:;" class="text-primary" data-bs-toggle="tooltip"
                                                    data-bs-placement="bottom" title=""
                                                    data-bs-original-title="View detail" aria-label="Views">
                                                    <ion-icon name="eye-outline"></ion-icon>
                                                </a>
                                                <a href="javascript:;" class="text-warning" data-bs-toggle="tooltip"
                                                    data-bs-placement="bottom" title=""
                                                    data-bs-original-title="Edit info" aria-label="Edit">
                                                    <ion-icon name="pencil-outline"></ion-icon>
                                                </a>
                                                <a href="javascript:;" class="text-danger" data-bs-toggle="tooltip"
                                                    data-bs-placement="bottom" title=""
                                                    data-bs-original-title="Delete" aria-label="Delete">
                                                    <ion-icon name="trash-outline"></ion-icon>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>



        </div>
        <!-- end page content-->
    </div>

    @include('components.footer')
@endsection
