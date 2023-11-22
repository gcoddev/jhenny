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
                            <li class="breadcrumb-item"><a href="javascript:;"><ion-icon name="home-outline"></ion-icon></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Editar idioma</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->

            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="card radius-10">
                        <div class="card-body">
                            <form method="POST" action="{{ route('postIdioma') }}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id_idioma" value="{{ $idioma->id_idioma }}">
                                <h5 class="mb-3">Editar idioma</h5>
                                <hr>
                                <div class="row g-3">
                                    <div class="col-5">
                                        <label class="form-label" for="nombre_idioma">Nombre del idioma <span
                                                style="color: red">*</span></label>
                                        <input type="text" class="form-control" value="{{ $idioma->nombre_idioma }}"
                                            id="nombre_idioma" name="nombre_idioma">
                                        @error('nombre_idioma')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-7 row">
                                        <label class="form-label" for="imagen_idioma">Imagen del idioma <span
                                                style="color: red">*</span></label>
                                        <img src="{{ asset('storage/idiomas/' . $idioma->imagen_idioma) }}" width="50"
                                            alt="" class="col-2">
                                        <input type="file" class="form-contro col-10" id="imagen_idioma" name="imagen_idioma">
                                        @error('imagen_idioma')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label" for="tipo_idioma">Tipo de idioma <span
                                                style="color: red">*</span></label>
                                        <select class="form-control" id="tipo_idioma" name="tipo_idioma">
                                            <option value="">Seleccione opcion</option>
                                            <option value="NATIVO" {{ $idioma->tipo_idioma == 'NATIVO' ? 'selected' : '' }}>
                                                NATIVO
                                            </option>
                                            <option value="EXTRANJERO"
                                                {{ $idioma->tipo_idioma == 'EXTRANJERO' ? 'selected' : '' }}>EXTRANJERO
                                            </option>
                                        </select>
                                        @error('tipo_idioma')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="text-start mt-3">
                                    <button type="submit" class="btn btn-primary px-4">Guardar datos</button>
                                    <a href="{{ route('idiomas') }}" class="btn btn-secondary px-4">Volver</a>
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
