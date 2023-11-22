@extends('wrapper')
@section('contenido-dashboard')
    <div class="page-content-wrapper">
        <!-- start page content-->
        <div class="page-content">

            <!--start breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Traducción</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0 align-items-center">
                            <li class="breadcrumb-item"><a href="{{ route('admin') }}"><ion-icon
                                        name="home-outline"></ion-icon></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Solicitudes de interpretacion</li>
                        </ol>
                    </nav>
                </div>
                @if (Auth::user()->id_role != 3)
                    <div class="ms-auto">
                        <div class="btn-group">
                            <a href="{{ route('nuevoInterpretacion') }}" class="btn btn-outline-primary">Crear solicitud</a>
                        </div>
                    </div>
                @endif
            </div>
            <!--end breadcrumb-->

            @include('mensajes')
            @error('id_asignado')
                <div class="alert alert-dismissible fade show py-2 bg-danger">
                    <div class="d-flex align-items-center">
                        <div class="fs-3 text-white"><ion-icon name="close-circle-sharp"></ion-icon>
                        </div>
                        <div class="ms-3">
                            <div class="text-white">{{ $message }}</div>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @enderror

            @error('id_pago')
                <div class="alert alert-dismissible fade show py-2 bg-danger">
                    <div class="d-flex align-items-center">
                        <div class="fs-3 text-white"><ion-icon name="close-circle-sharp" role="img" class="md hydrated"
                                aria-label="close circle sharp"></ion-icon>
                        </div>
                        <div class="ms-3">
                            <div class="text-white">{{ $message }}</div>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @enderror
            @error('comprobante_pago')
                <div class="alert alert-dismissible fade show py-2 bg-danger">
                    <div class="d-flex align-items-center">
                        <div class="fs-3 text-white"><ion-icon name="close-circle-sharp" role="img" class="md hydrated"
                                aria-label="close circle sharp"></ion-icon>
                        </div>
                        <div class="ms-3">
                            <div class="text-white">{{ $message }}</div>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @enderror

            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <h5 class="mb-0">Solicitudes</h5>
                        {{-- <form class="ms-auto position-relative">
                            <div class="position-absolute top-50 translate-middle-y search-icon px-3"><ion-icon
                                    name="search-sharp"></ion-icon></div>
                            <input class="form-control ps-5" type="text" placeholder="search">
                        </form> --}}
                    </div>
                    <div class="table-responsive mt-3">
                        <table class="table align-middle mb-0" id="table-solicitudes">
                            <thead class="table-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Idioma</th>
                                    <th>Titulo</th>
                                    <th>Asignado</th>
                                    <th>Estado de Pago</th>
                                    <th>Comprobante de pago</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($interpretaciones as $key => $int)
                                    <tr>
                                        <td>{{ $int->id_interpretacion }}</td>
                                        <td>{{ $int->idioma->nombre_idioma }}</td>
                                        <td>{{ $int->titulo_interpretacion }}</td>
                                        <td>{{ $int->asignado ? $int->asignado->nombres . ' ' . $int->asignado->paterno . ' ' . $int->asignado->materno : '-' }}
                                        </td>
                                        <td>
                                            @if ($int->solicitud_pago->estado == 'PENDIENTE')
                                                <span class="badge bg-info">{{ $int->solicitud_pago->estado }}</span>
                                            @elseif ($int->solicitud_pago->estado == 'PAGADO')
                                                <span class="badge bg-success">{{ $int->solicitud_pago->estado }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($int->solicitud_pago->comprobante_pago)
                                                <span class="text-success">Enviado</span> &nbsp;
                                                <a href="{{ asset('storage/comprobante/' . $int->solicitud_pago->comprobante_pago) }}"
                                                    class="btn btn-sm btn-info" target="_blank"><i class="lni lni-eye"></i></a>
                                            @else
                                                <span class="text-danger">No enviado</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($int->estado_interpretacion == 'ACTIVO')
                                                <form
                                                    action="{{ route('post_estado_interpretacion', $int->id_interpretacion) }}"
                                                    method="POST">
                                                    @csrf
                                                    <button class="badge bg-success border-0" type="submit"
                                                        onclick="success_noti()">{{ $int->estado_interpretacion }}</button>
                                                </form>
                                            @elseif ($int->estado_interpretacion == 'INACTIVO')
                                                <form
                                                    action="{{ route('post_estado_interpretacion', $int->id_interpretacion) }}"
                                                    method="POST">
                                                    @csrf
                                                    <button class="badge bg-danger border-0" type="submit"
                                                        onclick="success_noti()">{{ $int->estado_interpretacion }}</button>
                                                </form>
                                            @elseif ($int->estado_interpretacion == 'ENTREGADO')
                                                <span class="badge bg-dark">
                                                    {{ $int->estado_interpretacion }}
                                                </span>
                                            @elseif ($int->estado_interpretacion == 'CANCELADO')
                                                <span class="badge bg-warning">
                                                    {{ $int->estado_interpretacion }}
                                                </span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($int->id == Auth::user()->id || Auth::user()->id == 1)
                                                @if ($int->estado_interpretacion != 'ENTREGADO')
                                                    <a href="{{ route('editarInterpretacion', $int->id_interpretacion) }}"
                                                        class="btn btn-sm btn-warning" data-bs-toggle="tooltip"
                                                        data-bs-placement="bottom" title="Editar solicitud"
                                                        data-bs-original-title="Edit info" aria-label="Edit">
                                                        <ion-icon name="pencil-outline"></ion-icon>
                                                        Editar
                                                    </a>
                                                    @if (!$int->id_asignado)
                                                        <form
                                                            action="{{ route('eliminarInterpretacion', $int->id_interpretacion) }}"
                                                            method="POST" style="display: inline">
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
                                                @endif
                                            @endif
                                            @if (
                                                $int->solicitud_pago->estado == 'PENDIENTE' &&
                                                    (Auth::user()->id_role == 1 || Auth::user()->id_role == 2 || Auth::user()->id_role == 5) &&
                                                    !$int->solicitud_pago->comprobante_pago)
                                                <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal"
                                                    data-bs-target="#comprobantePago_{{ $key }}"><i
                                                        class="bx bx-money"></i>Pagar</button>



                                                <div class="modal fade" id="comprobantePago_{{ $key }}"
                                                    tabindex="-1"
                                                    aria-labelledby="comprobantePagoLabel_{{ $key }}"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        @if (count($pagos) > 0)
                                                            <form
                                                                action="{{ route('pagoComprobarI', $int->id_interpretacion) }}"
                                                                method="POST" style="display: inline"
                                                                enctype="multipart/form-data">
                                                                @csrf
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"
                                                                            id="comprobantePagoLabel_{{ $key }}">
                                                                            METODOS DE PAGO</h5>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="form-group">
                                                                            <label class="form-label">
                                                                                Elegir metodo de pago: <span
                                                                                    style="color: red">*</span>
                                                                            </label>

                                                                            @foreach ($pagos as $key => $pago)
                                                                                <label class="alert alert-info d-block">
                                                                                    <input type="radio" name="id_pago"
                                                                                        id="id_pago_{{ $key }}"
                                                                                        class="form-check-input"
                                                                                        value="{{ $pago->id_pago }}">
                                                                                    {{ $pago->nombre_pago }}
                                                                                    ({{ $pago->tipo_pago }})
                                                                                    <hr>
                                                                                    {{ $pago->descripcion_pago }}<br>
                                                                                    @if ($pago->tipo_pago == 'DEPOSITO')
                                                                                        <span>
                                                                                            {{ $pago->numero_pago }} -
                                                                                            {{ $pago->info_numero_pago }}
                                                                                        </span>
                                                                                    @elseif ($pago->tipo_pago == 'TRANSFERENCIA')
                                                                                        <img src="{{ asset('storage/qr/' . $pago->qr_imagen_pago) }}"
                                                                                            alt="qr" width="200">
                                                                                    @endif
                                                                                </label>
                                                                            @endforeach
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="comprobante_pago"
                                                                                class="form-label">Comprobante de
                                                                                pago:</label>
                                                                            <input type="file" class="form-control"
                                                                                name="comprobante_pago"
                                                                                accept="image/jpg,image/jpeg,image/png">
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer text-center">
                                                                        <button type="button" class="btn btn-danger"
                                                                            data-bs-dismiss="modal">Cancelar</button>
                                                                        <button type="submit"
                                                                            class="btn btn-success">Pagar</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        @else
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title"
                                                                        id="comprobantePagoLabel_{{ $key }}">
                                                                        PAGO</h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p class="alert alert-info">
                                                                        No existen metodos de pagos disponibles.<br>
                                                                        Debe apersonarse a oficinas para realizar el
                                                                        pago en
                                                                        efectivo.
                                                                    </p>
                                                                </div>
                                                                <div class="modal-footer text-center">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Aceptar</button>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            @endif
                                            @if ((Auth::user()->id_role == 1 || Auth::user()->id_role == 2) && !$int->id_asignado)
                                                <button type="button" class="btn btn-sm btn-primary"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#asignar_solicitud_{{ $key }}"><i
                                                        class="bx bx-check"></i>Asignar</button>


                                                <div class="modal fade" id="asignar_solicitud_{{ $key }}"
                                                    tabindex="-1"
                                                    aria-labelledby="asignar_solicitudLabel_{{ $key }}"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <form
                                                            action="{{ route('asignarInterprete', $int->id_interpretacion) }}"
                                                            method="POST" style="display: inline">
                                                            @csrf
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title"
                                                                        id="asignar_solicitudLabel_{{ $key }}">
                                                                        ASIGNAR TRADUCTOR</h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    {{-- <a href="{{ route('nuevoPago') }}"
                                                                    class="btn btn-primary">Agregar
                                                                    metodo de pago</a> --}}
                                                                    <div class="form-group">
                                                                        <label for="id_asignado"
                                                                            class="form-label">Traductor:</label>
                                                                        <select name="id_asignado" id="id_asignado"
                                                                            class="form-control">
                                                                            <option value="">Elegir opcion</option>

                                                                            @foreach ($interpretes as $interprete)
                                                                                <option value="{{ $interprete->id }}">
                                                                                    {{ $interprete->paterno }}
                                                                                    {{ $interprete->materno }}
                                                                                    {{ $interprete->nombres }} -
                                                                                    {{ $interprete->ci }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer text-center">
                                                                    <button type="button" class="btn btn-danger"
                                                                        data-bs-dismiss="modal">Cancelar</button>
                                                                    <button type="submit"
                                                                        class="btn btn-success">Asignar</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
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
        <!-- end page content-->
    </div>
@endsection
