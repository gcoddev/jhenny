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
                            <li class="breadcrumb-item active" aria-current="page">Editar solicitud</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->

            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="card radius-10">
                        <div class="card-body">
                            <form method="POST" action="{{ route('postSolicitud') }}" enctype="multipart/form-data">
                                @csrf
                                <h5 class="mb-3">Editar solicitud</h5>
                                <hr>
                                <input type="hidden" name="id_solicitud" value="{{ $solicitud->id_solicitud }}">
                                <div class="row g-3">
                                    <div class="col-6">
                                        <label class="form-label" for="id_idioma">Idioma <span
                                                style="color: red">*</span></label>
                                        <select class="form-control" id="id_idioma" name="id_idioma">
                                            <option value="">Seleccione opcion</option>
                                            @foreach ($idiomas as $idioma)
                                                <option value="{{ $idioma->id_idioma }}"
                                                    {{ $solicitud->id_idioma == $idioma->id_idioma ? 'selected' : '' }}>
                                                    {{ $idioma->nombre_idioma }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('id_idioma')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label" for="codigo_solicitud">Codigo solicitud</label>
                                        <input type="text" class="form-control" id="codigo_solicitud"
                                            name="codigo_solicitud" value="{{ $solicitud->codigo_solicitud }}">
                                        @error('codigo_solicitud')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label" for="titulo_solicitud">Titulo de la solicitud <span
                                                style="color: red">*</span></label>
                                        <input type="text" class="form-control" id="titulo_solicitud"
                                            name="titulo_solicitud" value="{{ $solicitud->titulo_solicitud }}">
                                        @error('titulo_solicitud')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label" for="descripcion_solicitud">Descripcion <span
                                                style="color: red">*</span></label>
                                        <textarea name="descripcion_solicitud" id="descripcion_solicitud" cols="10" class="form-control">{{ $solicitud->descripcion_solicitud }}</textarea>
                                        @error('descripcion_solicitud')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label for="documento_solicitud" class="form-label">Cambiar documento</label>
                                        <input type="file" class="form-control" id="documento_solicitud"
                                            name="documento_solicitud">
                                        @error('documento_solicitud')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>
                                <div class="text-start mt-3">
                                    <button type="submit" class="btn btn-primary px-4">Guardar datos</button>
                                    <a href="{{ route('solicitudes') }}" class="btn btn-secondary px-4">Cancelar</a>
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
