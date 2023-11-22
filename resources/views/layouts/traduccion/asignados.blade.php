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
                                data-bs-target="#asignar_solicitud">Nueva asignación</button>

                            <div class="modal fade" id="asignar_solicitud" tabindex="-1"
                                aria-labelledby="asignar_solicitudLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <form action="{{ route('asignarSolicitudTraductor') }}" method="POST"
                                        style="display: inline">
                                        @csrf
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="asignar_solicitudLabel">
                                                    ASIGNAR TRADUCTOR</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group mb-3">
                                                    <label for="id_asignado" class="form-label">Traductor:</label>
                                                    <select name="id_asignado" id="id_asignado" class="form-control">
                                                        <option value="">Elegir opcion</option>

                                                        @foreach ($traductores as $traductor)
                                                            <option value="{{ $traductor->id }}">
                                                                {{ $traductor->paterno }}
                                                                {{ $traductor->materno }}
                                                                {{ $traductor->nombres }} -
                                                                {{ $traductor->ci }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="id_solicitud" class="form-label">Solicitud:</label>
                                                    <select name="id_solicitud" id="id_solicitud" class="form-control">
                                                        <option value="">Elegir opcion</option>

                                                        @foreach ($solicitudesAll as $sol)
                                                            <option value="{{ $sol->id_solicitud }}">
                                                                {{ $sol->titulo_solicitud }} -
                                                                {{ $sol->idioma->nombre_idioma }}
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
            @error('id_solicitud')
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
                        <h5 class="mb-0">Traducciones asignadas</h5>
                        {{-- <form class="ms-auto position-relative">
                            <div class="position-absolute top-50 translate-middle-y search-icon px-3"><ion-icon
                                    name="search-sharp"></ion-icon></div>
                            <input class="form-control ps-5" type="text" placeholder="search">
                        </form> --}}
                    </div>
                    <div class="table-responsive mt-3">
                        <table class="table align-middle mb-0" id="table-asignados">
                            <thead class="table-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Idioma</th>
                                    <th>Titulo</th>
                                    <th>Descripcion</th>
                                    <th>Documento</th>
                                    <th>Asignado</th>
                                    <th>Traducido</th>
                                    <th>Estado del pago</th>
                                    <th>Tipo pago</th>
                                    <th>Comprobante</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($solicitudes as $sol)
                                    <tr>
                                        <td>{{ $sol->id_solicitud }}</td>
                                        <td>{{ $sol->idioma->nombre_idioma }}</td>
                                        <td>{{ $sol->titulo_solicitud }}</td>
                                        <td>{{ $sol->descripcion_solicitud }}</td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-dark" data-bs-toggle="modal"
                                                data-bs-target="#verDocumento">
                                                <span class="lni lni-files"></span>
                                            </button>

                                            <div class="modal fade" id="verDocumento" tabindex="-1"
                                                aria-labelledby="verDocumentoLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="verDocumentoLabel">
                                                                DOCUMENTO</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <iframe class="w-100" style="height:500px"
                                                                src="{{ asset('storage/documentos/' . $sol->documento_solicitud) }}"
                                                                frameborder="0"></iframe>
                                                        </div>
                                                        <div class="modal-footer text-center">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Cerrar</button>
                                                            <a href="{{ route('descargarDocumento', $sol->id_solicitud) }}"
                                                                class="btn btn-success">Descargar
                                                                documento</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            @if ($sol->id_asignado)
                                                <span class="badge bg-success border-0">Asignado</span>
                                            @else
                                                <span class="badge bg-warning border-0">No asignado</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($sol->documento_solicitud_fin)
                                                <button type="button" class="btn btn-sm btn-dark" data-bs-toggle="modal"
                                                    data-bs-target="#verTraducido">
                                                    <span class="lni lni-files"></span>
                                                </button>

                                                <div class="modal fade" id="verTraducido" tabindex="-1"
                                                    aria-labelledby="verTraducidoLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="verTraducidoLabel">
                                                                    DOCUMENTO TRADUCIDO</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <iframe class="w-100" style="height:500px"
                                                                    src="{{ asset('storage/documentos/' . $sol->documento_solicitud_fin) }}"
                                                                    frameborder="0"></iframe>
                                                            </div>
                                                            <div class="modal-footer text-center">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Cerrar</button>
                                                                <a href="{{ route('descargarDocumentoFin', $sol->id_solicitud) }}"
                                                                    class="btn btn-success">Descargar
                                                                    documento</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @else
                                                <span>-</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($sol->solicitud_pago)
                                                @if ($sol->solicitud_pago->estado == 'PENDIENTE')
                                                    <span class="badge bg-info">{{ $sol->solicitud_pago->estado }}</span>
                                                @elseif ($sol->solicitud_pago->estado == 'PAGADO')
                                                    <span
                                                        class="badge bg-success">{{ $sol->solicitud_pago->estado }}</span>
                                                @endif
                                            @endif
                                        </td>
                                        <td>
                                            @if ($sol->solicitud_pago->pago)
                                                <span style="font-size:9px">
                                                    ({{ $sol->solicitud_pago->pago->tipo_pago }})
                                                </span>
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td>
                                            @if ($sol->solicitud_pago->comprobante_pago)
                                                <a href="{{ asset('storage/comprobante/' . $sol->solicitud_pago->comprobante_pago) }}"
                                                    target="_blank">
                                                    <img src="{{ asset('storage/comprobante/' . $sol->solicitud_pago->comprobante_pago) }}"
                                                        alt="" width="100">
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($sol->estado_solicitud == 'ACTIVO')
                                                <span
                                                    class="badge bg-success border-0">{{ $sol->estado_solicitud }}</span>
                                            @elseif ($sol->estado_solicitud == 'INACTIVO')
                                                <span class="badge bg-danger border-0">{{ $sol->estado_solicitud }}</span>
                                            @elseif ($sol->estado_solicitud == 'ENTREGADO')
                                                <span class="badge bg-success">
                                                    {{ $sol->estado_solicitud }}
                                                </span>
                                            @elseif ($sol->estado_solicitud == 'CANCELADO')
                                                <span class="badge bg-warning">
                                                    {{ $sol->estado_solicitud }}
                                                </span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($sol->estado_solicitud != 'ENTREGADO')
                                                <a href="{{ route('enviarTraduccion', $sol->id_solicitud) }}"
                                                    class="btn btn-sm btn-primary" data-bs-toggle="tooltip"
                                                    data-bs-placement="bottom" title="Terminar">
                                                    <i class="bx bx-file"></i>Enviar traducción
                                                </a>
                                            @endif
                                            @if ($sol->solicitud_pago->estado != 'PAGADO' && $sol->id_asignado)
                                                @if ($sol->solicitud_pago->id_pago)
                                                    <button type="button" class="btn btn-sm btn-outline-info"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#verComprobante_{{ $sol->id_solicitud }}">
                                                        <i class="bx bx-money"></i> Validar pago
                                                    </button>
                                                @endif

                                                <div class="modal modal-lg fade"
                                                    id="verComprobante_{{ $sol->id_solicitud }}" tabindex="-1"
                                                    aria-labelledby="verComprobanteLabel_{{ $sol->id_solicitud }}"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title"
                                                                    id="verComprobanteLabel_{{ $sol->id_solicitud }}">
                                                                    COMPROBANTE DE PAGO</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <img src="{{ asset('storage/comprobante/' . $sol->solicitud_pago->comprobante_pago) }}"
                                                                    alt="" class="w-100">
                                                            </div>
                                                            <div class="modal-footer text-center">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Cerrar</button>
                                                                @if ($sol->solicitud_pago->estado != 'PAGADO')
                                                                    <form
                                                                        action="{{ route('validarPago', $sol->solicitud_pago->id_solicitud_pagos) }}"
                                                                        method="POST" style="display: inline">
                                                                        @csrf
                                                                        <input type="hidden" name="id_solicitud"
                                                                            value="{{ $sol->id_solicitud }}">
                                                                        <input type="hidden" name="id_pago"
                                                                            value="{{ $sol->solicitud_pago->id_pago }}">
                                                                        <button type="submit" class="btn btn-warning"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-placement="bottom" title="Terminar">
                                                                            <i class="bx bx-money"></i>Validar pago
                                                                        </button>
                                                                    </form>
                                                                @endif
                                                            </div>
                                                        </div>
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
