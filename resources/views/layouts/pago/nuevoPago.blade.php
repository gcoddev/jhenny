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
                            <li class="breadcrumb-item"><a href="javascript:;"><ion-icon name="home-outline"></ion-icon></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Nuevo metodo de pago</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->

            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="card radius-10">
                        <div class="card-body">
                            <form method="POST" action="{{ route('post_nuevoPago') }}" enctype="multipart/form-data">
                                @csrf
                                <h5 class="mb-3">Nuevo metodo de pago</h5>
                                <hr>
                                <div class="row g-3">
                                    <div class="col-6">
                                        <label class="form-label" for="nombre_pago">Nombre del pago <span
                                                style="color: red">*</span></label>
                                        <input type="text" class="form-control" id="nombre_pago" name="nombre_pago">
                                        @error('nombre_pago')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label" for="tipo_pago">Tipo de pago <span
                                                style="color: red">*</span></label>
                                        <select class="form-control" id="tipo_pago" name="tipo_pago"
                                            onchange="metodoPago()">
                                            <option value="">Seleccione opcion</option>
                                            <option value="EFECTIVO">
                                                EFECTIVO
                                            </option>
                                            <option value="DEPOSITO">
                                                DEPOSITO
                                            </option>
                                            <option value="TRANSFERENCIA">
                                                TRANSFERENCIA
                                            </option>
                                        </select>
                                        @error('tipo_pago')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label" for="descripcion_pago">Descripcion del pago <span
                                                style="color: red">*</span></label>
                                        <textarea class="form-control" id="descripcion_pago" name="descripcion_pago" rows="3"></textarea>
                                        @error('descripcion_pago')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-12" id="form_info_numero_pago" style="display: none">
                                        <label class="form-label" for="info_numero_pago">Informacion del destinatario <span
                                                style="color: red">*</span></label>
                                        <input type="text" class="form-control" id="info_numero_pago"
                                            name="info_numero_pago">
                                        @error('info_numero_pago')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-12" id="form_numero_pago" style="display: none">
                                        <label class="form-label" for="numero_pago">Numero de cuenta <span
                                                style="color: red">*</span></label>
                                        <input type="text" class="form-control" id="numero_pago" name="numero_pago">
                                        @error('numero_pago')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-12" id="form_qr_imagen_pago" style="display: none">
                                        <label class="form-label" for="qr_imagen_pago">Imagen QR del pago <span
                                                style="color: red">*</span></label>
                                        <input type="file" class="form-control" id="qr_imagen_pago" name="qr_imagen_pago"
                                            accept="image/png,image/jpg,image/jpeg">
                                        @error('qr_imagen_pago')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="text-start mt-3">
                                    <button type="submit" class="btn btn-primary px-4">Guardar datos</button>
                                    <a href="{{ route('pagos') }}" class="btn btn-secondary px-4">Volver</a>
                                </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div><!--end row-->

        </div>
        <!-- end page content-->
    </div>

    <script>
        function metodoPago() {
            tipo = document.getElementById('tipo_pago').value
            switch (tipo) {
                case 'DEPOSITO':
                    document.getElementById('form_info_numero_pago').style.display = 'block';
                    document.getElementById('form_numero_pago').style.display = 'block';
                    document.getElementById('form_qr_imagen_pago').style.display = 'none';
                    break
                case 'TRANSFERENCIA':
                    document.getElementById('form_info_numero_pago').style.display = 'none';
                    document.getElementById('form_numero_pago').style.display = 'none';
                    document.getElementById('form_qr_imagen_pago').style.display = 'block';
                    break
                default:
                    document.getElementById('form_info_numero_pago').style.display = 'none';
                    document.getElementById('form_numero_pago').style.display = 'none';
                    document.getElementById('form_qr_imagen_pago').style.display = 'none';
                    break
            }
        }
    </script>
@endsection
