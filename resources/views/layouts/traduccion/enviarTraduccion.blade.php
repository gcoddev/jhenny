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
                            <li class="breadcrumb-item"><a href="{{ route('admin') }}"><ion-icon name="home-outline"></ion-icon></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Finalizar traducción</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->

            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="card radius-10">
                        <div class="card-body">
                            <form method="POST" action="{{ route('postEntrega') }}" enctype="multipart/form-data">
                                @csrf
                                <h5 class="mb-3">Enviar traducción - {{ $solicitud->titulo_solicitud }}</h5>
                                <hr>
                                <input type="hidden" name="id_solicitud" value="{{ $solicitud->id_solicitud }}">
                                <div class="row g-3">
                                    <div class="col-6">
                                        <label class="form-label" for="id_idioma">Idioma</label>
                                        <input type="text" class="form-control"
                                            value="{{ $solicitud->idioma->nombre_idioma }}" readonly>
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label" for="codigo_solicitud">Codigo solicitud</label>
                                        <input type="text" class="form-control"
                                            value="{{ $solicitud->codigo_solicitud }}" readonly>
                                    </div>
                                    <div class="col-12">
                                        <p class="alert alert-info">
                                            {{ $solicitud->descripcion_solicitud }}
                                        </p>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label" for="descripcion_solicitud">Descripcion de entrega <span
                                                style="color: red">*</span></label>
                                        <textarea name="descripcion_solicitud_fin" id="descripcion_solicitud_fin" cols="10" class="form-control"></textarea>
                                        @error('descripcion_solicitud_fin')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label for="documento_solicitud_fin" class="form-label">Entregar documento <span
                                                style="color: red">*</span></label>
                                        <input type="file" class="form-control" id="documento_solicitud_fin"
                                            name="documento_solicitud_fin">
                                        @error('documento_solicitud_fin')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>
                                <div class="text-start mt-3">
                                    <button type="submit" class="btn btn-primary px-4">Guardar datos</button>
                                    <a href="{{ route('asignados') }}" class="btn btn-secondary px-4">Cancelar</a>
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
