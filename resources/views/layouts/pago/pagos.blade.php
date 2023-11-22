@extends('wrapper')
@section('contenido-dashboard')
    <div class="page-content-wrapper">
        <!-- start page content-->
        <div class="page-content">

            <!--start breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Pagos</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0 align-items-center">
                            <li class="breadcrumb-item"><a href="{{ route('admin') }}"><ion-icon
                                        name="home-outline"></ion-icon></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Pagos</li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
                    <div class="btn-group">
                        <a href="{{ route('nuevoPago') }}" class="btn btn-outline-primary">Nuevo metodo de pago</a>
                    </div>
                </div>
            </div>
            <!--end breadcrumb-->

            @include('mensajes')

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4 row-cols-xxl-3">
                @foreach ($pagos as $pago)
                    <div class="col">
                        <div class="card radius-10">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    @if ($pago->qr_imagen_pago)
                                        <a href="{{ asset('storage/qr/' . $pago->qr_imagen_pago) }}" target="_blank">
                                            <div class="widget-icon-2 bg-gradient-info text-white">
                                                <img src="{{ asset('storage/qr/' . $pago->qr_imagen_pago) }}" alt=""
                                                    width="45" height="45">
                                            </div>
                                        </a>
                                    @endif
                                    <div class="dropdown options ms-auto">
                                        <div class="dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown">
                                            <ion-icon name="ellipsis-horizontal-outline"></ion-icon>
                                        </div>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a class="dropdown-item" href="{{ route('editarPago', $pago->id_pago) }}">
                                                    <i class="lni lni-pencil"></i>&nbsp;&nbsp;Editar</a>
                                            </li>
                                            <li>
                                                <form method="POST" action="{{ route('eliminarPago', $pago->id_pago) }}"
                                                    style="display: inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="dropdown-item border-0 bg-transparent">
                                                        <i class="lni lni-trash"></i>&nbsp;&nbsp;Eliminar</button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <h5 class="my-3">{{ $pago->nombre_pago }}</h5>
                                <div>
                                    <span>Estado: </span>
                                    @if ($pago->estado_pago == 'ACTIVO')
                                        <form action="{{ route('post_estado_pago', $pago->id_pago) }}" method="POST"
                                            style="display: inline">
                                            @csrf
                                            <button type="submit" class="border-0 bg-transparent">
                                                <span class="badge bg-success">
                                                    {{ $pago->estado_pago }}
                                                </span>
                                            </button>
                                        </form>
                                    @else
                                        <form action="{{ route('post_estado_pago', $pago->id_pago) }}" method="POST"
                                            style="display: inline">
                                            @csrf
                                            <button type="submit" class="border-0 bg-transparent">
                                                <span class="badge bg-danger">
                                                    {{ $pago->estado_pago }}
                                                </span>
                                            </button>
                                        </form>
                                    @endif
                                </div>
                                {{-- <div class="progress mt-1" style="height: 5px;">
                                    <div class="progress-bar bg-gradient-info" role="progressbar" style="width: 65%"></div>
                                </div> --}}
                                <p class="mb-0 mt-2">{{ $pago->tipo_pago }}
                                    @if ($pago->tipo_pago == 'DEPOSITO')
                                        <span class="float-end">
                                            <span>{{ $pago->numero_pago }}</span>
                                            <br>
                                            <span>{{ $pago->info_numero_pago }}</span>
                                        </span>
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div><!--end row-->
        </div>
        <!-- end page content-->
    </div>
@endsection
