@extends('wrapper')
@section('contenido-dashboard')
    <!-- start page content wrapper-->
    <div class="page-content-wrapper">
        <!-- start page content-->
        <div class="page-content">

            <!--start breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Inicio</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0 align-items-center">
                            <li class="breadcrumb-item"><a href="javascript:;">
                                    <ion-icon name="home-outline"></ion-icon>
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Inicio</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->
            @include('mensajes')

            <div class="row">
                <div class="col-12 col-lg-1 col-xl-1 d-flex"></div>
                <div class="col-12 col-lg-10 col-xl-10 d-flex">
                    <div class="card radius-10 w-100">
                        <div class="card-body px-5">
                            <div class="d-flex align-items-center mb-3 row">
                                <h4 class="mb-0 text-center col-12">Traducciones e Interpretaciones</h4>
                                <br><br><br><hr>
                            </div>
                            <div class="row row-cols-1 row-cols-md-2 g-3 align-items-center">
                                <div class="col-12 col-lg-6 col-xl-6 col-xxl-6">
                                    <div class="">
                                        <div class="mb-4">
                                            <h2 class="mb-0">{{ count($solicitudes) }}</h2>
                                            <p class="mb-0">Total</p>
                                        </div>
                                        @php
                                            $sols = 0;
                                            $pendientes = 0;
                                            $entregados = 0;
                                            foreach ($solicitudes as $sol) {
                                                if ($sol->estado_solicitud != 'ENTREGADO' && $sol->id_asignado == null && $sol->documento_solicitud_fin == null) {
                                                    $sols++;
                                                }
                                                if ($sol->estado_solicitud == 'ENTREGADO') {
                                                    $entregados++;
                                                }
                                                if ($sol->id_asignado != null && $sol->documento_solicitud_fin == null) {
                                                    $pendientes++;
                                                }
                                            }
                                        @endphp
                                        <div class="d-flex align-items-start gap-3 mb-3">
                                            <div class="widget-icon-small rounded bg-light-purple text-purple">
                                                <ion-icon name="book-outline"></ion-icon>
                                            </div>
                                            <div>
                                                <p class="mb-1">Solicitudes de traducción</p>
                                                <p class="mb-0 h5">{{ $sols }}</p>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-start gap-3 mb-3">
                                            <div class="widget-icon-small rounded bg-light-info text-info">
                                                <ion-icon name="briefcase-outline"></ion-icon>
                                            </div>
                                            <div>
                                                <p class="mb-1">Pendientes</p>
                                                <p class="mb-0 h5">{{ $pendientes }}</p>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-start gap-3">
                                            <div class="widget-icon-small rounded bg-light-orange text-orange">
                                                <ion-icon name="book"></ion-icon>
                                            </div>
                                            <div>
                                                <p class="mb-1">Traducciones completas</p>
                                                <p class="mb-0 h5">{{ $entregados }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 col-xl-6 col-xxl-6">
                                    <div class="">
                                        <div class="mb-4">
                                            <h2 class="mb-0">{{ count($interpretaciones) }}</h2>
                                            <p class="mb-0">Total</p>
                                        </div>
                                        @php
                                            $ints = 0;
                                            $pendientes = 0;
                                            $entregados = 0;
                                            foreach ($interpretaciones as $int) {
                                                if ($int->estado_solicitud != 'ENTREGADO' && $int->id_asignado == null && $int->documento_solicitud_fin == null) {
                                                    $ints++;
                                                }
                                                if ($int->estado_solicitud == 'ENTREGADO') {
                                                    $entregados++;
                                                }
                                                if ($int->id_asignado != null && $int->documento_solicitud_fin == null) {
                                                    $pendientes++;
                                                }
                                            }
                                        @endphp
                                        <div class="d-flex align-items-start gap-3 mb-3">
                                            <div class="widget-icon-small rounded bg-light-purple text-purple">
                                                <ion-icon name="book-outline"></ion-icon>
                                            </div>
                                            <div>
                                                <p class="mb-1">Solicitudes de interpretacion</p>
                                                <p class="mb-0 h5">{{ $ints }}</p>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-start gap-3 mb-3">
                                            <div class="widget-icon-small rounded bg-light-info text-info">
                                                <ion-icon name="briefcase-outline"></ion-icon>
                                            </div>
                                            <div>
                                                <p class="mb-1">Pendientes</p>
                                                <p class="mb-0 h5">{{ $pendientes }}</p>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-start gap-3">
                                            <div class="widget-icon-small rounded bg-light-orange text-orange">
                                                <ion-icon name="book"></ion-icon>
                                            </div>
                                            <div>
                                                <p class="mb-1">Interpretaciones hechas</p>
                                                <p class="mb-0 h5">{{ $entregados }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-1 col-xl-1 d-flex"></div>
            </div>
            <!--end row-->

        </div>
        <!-- end page content-->
    </div>
    <!--end page content wrapper-->
@endsection
