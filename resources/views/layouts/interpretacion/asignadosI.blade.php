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
                            <li class="breadcrumb-item active" aria-current="page">Asignacion</li>
                        </ol>
                    </nav>
                </div>
                @if (Auth::user()->id_role != 3 || Auth::user()->id_role != 5)
                    <div class="ms-auto">
                        <div class="btn-group">
                            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                                data-bs-target="#asignar_interpretacion">Nueva asignación</button>

                            <div class="modal fade" id="asignar_interpretacion" tabindex="-1"
                                aria-labelledby="asignar_interpretacionLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <form action="{{ route('asignarSolicitudTraductor') }}" method="POST"
                                        style="display: inline">
                                        @csrf
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="asignar_interpretacionLabel">
                                                    ASIGNAR INTERPRETE</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group mb-3">
                                                    <label for="id_asignado" class="form-label">Interprete:</label>
                                                    <select name="id_asignado" id="id_asignado" class="form-control">
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
                                                <div class="form-group">
                                                    <label for="id_interpretacion" class="form-label">Solicitud de
                                                        interpretacion:</label>
                                                    <select name="id_interpretacion" id="id_interpretacion"
                                                        class="form-control">
                                                        <option value="">Elegir opcion</option>

                                                        @foreach ($interpretacionesAll as $intA)
                                                            <option value="{{ $intA->id_interpretacion }}">
                                                                {{ $intA->titulo_interpretacion }} -
                                                                {{ $intA->idioma->nombre_idioma }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="modal-footer text-center">
                                                <button type="button" class="btn btn-danger"
                                                    data-bs-dismiss="modal">Cancelar</button>
                                                <button type="submit" class="btn btn-success">Asignar</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
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
            @error('id_interpretacion')
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

            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <h5 class="mb-0">Interpretaciones asignadas</h5>
                    </div>
                    <div class="table-responsive mt-3">
                        <table class="table align-middle mb-0" id="table-asignados">
                            <thead class="table-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Idioma</th>
                                    <th>Titulo</th>
                                    <th>Descripcion</th>
                                    <th>Asignado</th>
                                    <th>Estado del pago</th>
                                    <th>Tipo pago</th>
                                    <th>Comprobante</th>
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
                                        <td>{{ $int->descripcion_interpretacion }}</td>
                                        <td>
                                            @if ($int->id_asignado)
                                                <span class="badge bg-success border-0">Asignado</span>
                                            @else
                                                <span class="badge bg-warning border-0">No asignado</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($int->solicitud_pago)
                                                @if ($int->solicitud_pago->estado == 'PENDIENTE')
                                                    <span class="badge bg-info">{{ $int->solicitud_pago->estado }}</span>
                                                @elseif ($int->solicitud_pago->estado == 'PAGADO')
                                                    <span
                                                        class="badge bg-success">{{ $int->solicitud_pago->estado }}</span>
                                                @endif
                                            @endif
                                        </td>
                                        <td>
                                            @if ($int->solicitud_pago->pago)
                                                <span style="font-size:9px">
                                                    ({{ $int->solicitud_pago->pago->tipo_pago }})
                                                </span>
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td>
                                            @if ($int->solicitud_pago->comprobante_pago)
                                                <a href="{{ asset('storage/comprobante/' . $int->solicitud_pago->comprobante_pago) }}"
                                                    target="_blank">
                                                    <img src="{{ asset('storage/comprobante/' . $int->solicitud_pago->comprobante_pago) }}"
                                                        alt="" width="100">
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($int->estado_interpretacion == 'ACTIVO')
                                                <span
                                                    class="badge bg-success border-0">{{ $int->estado_interpretacion }}</span>
                                            @elseif ($int->estado_interpretacion == 'INACTIVO')
                                                <span
                                                    class="badge bg-danger border-0">{{ $int->estado_interpretacion }}</span>
                                            @elseif ($int->estado_interpretacion == 'INTERPRETADO')
                                                <span class="badge bg-success">
                                                    {{ $int->estado_interpretacion }}
                                                </span>
                                            @elseif ($int->estado_interpretacion == 'CANCELADO')
                                                <span class="badge bg-warning">
                                                    {{ $int->estado_interpretacion }}
                                                </span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($int->solicitud_pago->estado != 'PAGADO')
                                                <form
                                                    action="{{ route('validarPagoI', $int->solicitud_pago->id_solicitud_pagos) }}"
                                                    method="POST" style="display: inline">
                                                    @csrf
                                                    <input type="hidden" name="id_interpretacion"
                                                        value="{{ $int->id_interpretacion }}">
                                                    <input type="hidden" name="id_pago"
                                                        value="{{ $int->solicitud_pago->id_pago }}">
                                                    {{-- <button type="submit" class="btn btn-sm btn-warning"
                                                        data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                        title="Terminar">
                                                        <i class="bx bx-money"></i>Validar pago
                                                    </button> --}}
                                                    <button type="button" class="btn btn-sm btn-outline-info"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#verComprobante_{{ $int->id_interpretacion }}">
                                                        <i class="bx bx-money"></i> Validar pago
                                                    </button>

                                                    <div class="modal modal-lg fade"
                                                        id="verComprobante_{{ $int->id_interpretacion }}" tabindex="-1"
                                                        aria-labelledby="verComprobante_{{ $int->id_interpretacion }}Label"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title"
                                                                        id="verComprobante_Label_{{ $int->id_interpretacion }}">
                                                                        COMPROBANTE DE PAGO</h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <img src="{{ asset('storage/comprobante/' . $int->solicitud_pago->comprobante_pago) }}"
                                                                        alt="" class="w-100">
                                                                </div>
                                                                <div class="modal-footer text-center">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Cerrar</button>
                                                                    @if ($int->solicitud_pago->estado != 'PAGADO')
                                                                        <form
                                                                            action="{{ route('validarPagoI', $int->solicitud_pago->id_solicitud_pagos) }}"
                                                                            method="POST" style="display: inline">
                                                                            @csrf
                                                                            <input type="hidden" name="id_interpretacion"
                                                                                value="{{ $int->id_interpretacion }}">
                                                                            <input type="hidden" name="id_pago"
                                                                                value="{{ $int->solicitud_pago->id_pago }}">
                                                                            <button type="submit" class="btn btn-warning"
                                                                                data-bs-toggle="tooltip"
                                                                                data-bs-placement="bottom"
                                                                                title="Terminar">
                                                                                <i class="bx bx-money"></i>Validar pago
                                                                            </button>
                                                                        </form>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
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
        <!-- end page content-->
    </div>
@endsection
