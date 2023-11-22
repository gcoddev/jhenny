@extends('wrapper')
@section('contenido-dashboard')
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Reportes</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0 align-items-center">
                            <li class="breadcrumb-item"><a href="{{ route('admin') }}"><ion-icon
                                        name="home-outline"></ion-icon></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Reportes</li>
                        </ol>
                    </nav>
                </div>
            </div>

            @include('mensajes')

            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <h5 class="mb-0">Reportes de interpretacion</h5>
                    </div>
                    <div class="table-responsive mt-3">
                        <table class="table align-middle">
                            <thead class="table-secondary">
                                <tr>
                                    <th>#</th>
                                    <th>Interpretacion</th>
                                    <th>Reporte</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $cont = 1;
                                @endphp
                                <tr>
                                    <td>{{ $cont }}</td>
                                    <td>GENERAL</td>
                                    <td>
                                        <a href="{{ route('generarPDF', [0, 'I']) }}" class="btn btn-sm btn-danger"
                                            target="_blank">PDF</a>
                                        {{-- <button class="btn btn-sm btn-success">EXCEL</button> --}}
                                    </td>
                                </tr>
                                @php
                                    $cont++;
                                @endphp
                                @foreach ($idiomas as $idioma)
                                    <tr>
                                        <td>{{ $cont }}</td>
                                        <td>{{ $idioma->nombre_idioma }}</td>
                                        <td>
                                            <a href="{{ route('generarPDF', [$idioma->id_idioma, 'I']) }}"
                                                class="btn btn-sm btn-danger" target="_blank">PDF</a>
                                            {{-- <button class="btn btn-sm btn-success">EXCEL</button> --}}
                                        </td>
                                    </tr>
                                    @php
                                        $cont++;
                                    @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('components.footer')
@endsection
