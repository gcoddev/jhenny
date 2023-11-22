<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Centro de traducción</title>

    <link rel="stylesheet" href="assets-landing/css/maicons.css">
    <link rel="stylesheet" href="assets-landing/css/bootstrap.css">
    <link rel="stylesheet" href="assets-landing/vendor/owl-carousel/css/owl.carousel.css">
    <link rel="stylesheet" href="assets-landing/vendor/animate/animate.css">
    <link rel="stylesheet" href="assets-landing/css/theme.css">
</head>

<body>

    <!-- Back to top button -->
    <div class="back-to-top"></div>

    <header>
        <div class="topbar">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 text-sm">
                        <div class="site-info">
                            {{-- <a href="#"><span class="mai-call text-primary"></span> +00 123 4455 6666</a>
                            <span class="divider">|</span>
                            <a href="#"><span class="mai-mail text-primary"></span> mail@example.com</a> --}}
                        </div>
                    </div>
                    <div class="col-sm-4 text-right text-sm">
                        <div class="social-mini-button">
                            <a href="https://www.facebook.com/groups/135396129849549" target="_blank">
                                <span class="mai-logo-facebook-f"></span>
                            </a>
                            <a href="https://linguistica.upea.edu.bo" target="_blank">
                                <span class="mai-globe"></span>
                            </a>
                        </div>
                    </div>
                </div> <!-- .row -->
            </div> <!-- .container -->
        </div> <!-- .topbar -->

        <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="logo.jpeg" alt="" width="100">
                </a>

                {{-- <form action="#">
                    <div class="input-group input-navbar">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="icon-addon1"><span class="mai-search"></span></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Enter keyword.." aria-label="Username"
                            aria-describedby="icon-addon1">
                    </div>
                </form> --}}

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupport"
                    aria-controls="navbarSupport" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupport">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#objetivos">Objetivos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#idiomas">Idiomas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Registrarse</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-primary ml-lg-3" href="{{ route('login') }}">Acceder</a>
                        </li>
                    </ul>
                </div> <!-- .navbar-collapse -->
            </div> <!-- .container -->
        </nav>
    </header>

    <div class="page-hero bg-image overlay-dark" style="background-image: url(bg-upea.jpg);">
        <div class="hero-section">
            <div class="container text-center wow zoomIn">
                <span class="subhead">Lingüistiga e Idiomas</span>
                <h1 class="display-4">Centro de Traducción</h1>
                <a href="#register" class="btn btn-primary">Solicitar traducción</a>
            </div>
        </div>
    </div>


    <div class="bg-light">
        {{-- <div class="page-section py-3 mt-md-n5 custom-index">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-4 py-3 py-md-0">
                        <div class="card-service wow fadeInUp">
                            <div class="circle-shape bg-secondary text-white">
                                <span class="mai-chatbubbles-outline"></span>
                            </div>
                            <p><span>Chat</span> with a doctors</p>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- .page-section --> --}}

        <div class="page-section pb-0" id="objetivos">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 py-3 wow fadeInUp">
                        <h1>Objetivos del Centro de Traducción</h1>
                        <p class="text-grey mb-4">
                            El Departamento de Traducción e Interpretación, está destinado a brindar servicio de
                            traducción e interpretación, según requerimiento a la sociedad, a los estudiantes de la
                            Universidad Pública de El Alto y público en general, como también a docentes y
                            administrativos de la universidad.
                        </p>
                        <ul class="text-grey mb-4" style="font-size:15px">
                            <li>
                                Promover la investigación científica de las lenguas, orientada al desarrollo de los
                                saberes y conocimientos de la realidad pluricultural y multilingüe.
                            </li>
                            <li>
                                Desarrollar políticas lingüísticas en favor de los idiomas oficiales del Estado
                                Plurinacional de Bolivia y lenguas extranjeras.
                            </li>
                            <li>
                                Desarrollar habilidades para la enseñanza-aprendizaje de Lingüística e Idiomas.
                            </li>
                            <li>
                                Aplicar los conocimientos de la lingüística y otras ciencias para la traducción e
                                interpretación de idiomas.
                            </li>
                            <li>
                                Desarrollar una Educación Intracultural, Intercultural y Plurilingüe en el Estado
                                Plurinacional de Bolivia.
                            </li>
                            <li>
                                Promover la investigación lingüística, orientada a la aplicación del ecoturismo,
                                respetando
                                el paradigma del “Suma qamaña”.
                            </li>
                        </ul>
                        {{-- <a href="about.html" class="btn btn-primary">Learn More</a> --}}
                    </div>
                    <div class="col-lg-6 wow fadeInRight" data-wow-delay="400ms">
                        <div class="img-place custom-img-1">
                            <img src="logo.jpeg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- .bg-light -->
    </div> <!-- .bg-light -->

    <div class="page-section" id="idiomas">
        <div class="container">
            <h1 class="text-center mb-5 wow fadeInUp">IDIOMAS</h1>

            @if (count($idiomas) > 0)
                <div class="owl-carousel wow fadeInUp" id="doctorSlideshow">
                    @foreach ($idiomas as $idioma)
                        <div class="item">
                            <div class="card-doctor">
                                <div class="header">
                                    <img src="{{ asset('storage/idiomas/' . $idioma->imagen_idioma) }}" alt="">
                                </div>
                                <div class="body">
                                    <p class="text-xl mb-0">{{ $idioma->nombre_idioma }}</p>
                                    <span class="text-sm text-grey">{{ $idioma->tipo_idioma }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div>No hay idiomas disponibles</div>
            @endif
        </div>
    </div>


    <div class="page-section" id="register">
        <div class="container">
            <h1 class="text-center wow fadeInUp">Registro de Usuarios</h1>
            @include('mensajes')
            <form class="main-form" method="POST" action="{{ route('post_nuevoUsuario') }}">
                @csrf
                <div class="row mt-5 ">
                    <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
                        <label for="ci">Cedula de Identidad:</label>
                        <input type="text" class="form-control" id="ci" name="ci" placeholder="CI"
                            value="{{ old('ci') }}">
                        @error('ci')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
                        <label for="expedido">Expedido Carnet:</label>
                        <input type="text" class="form-control" id="expedido" name="expedido" placeholder="Expedido"
                            onkeyup="javascript:this.value=this.value.toUpperCase();" value="{{ old('expedido') }}">
                        @error('expedido')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
                        <label for="paterno">Apellido paterno:</label>
                        <input type="text" class="form-control" id="paterno" name="paterno" placeholder="Apellido Paterno"
                            value="{{ old('paterno') }}">
                        @error('paterno')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
                        <label for="materno">Apellido materno:</label>
                        <input type="text" class="form-control" id="materno" name="materno" placeholder="Apellido Materno"
                            value="{{ old('materno') }}">
                        @error('materno')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
                        <label for="nombres">Nombre completo:</label>
                        <input type="text" class="form-control" id="nombres" name="nombres" placeholder="Nombres"
                            value="{{ old('nombres') }}">
                        @error('nombres')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
                        <label for="fecha_nacimiento">Fecha de nacimiento:</label>
                        <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento"
                            placeholder="Fecha de Nacimiento" value="{{ old('fecha_nacimiento') }}">
                        @error('fecha_nacimiento')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-12 col-sm-6 py-2 wow fadeInRight">
                        <label for="email">Direccion Email:</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Email"
                            value="{{ old('email') }}">
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-12 col-sm-6 py-2 wow fadeInRight">
                        <label for="estado_civil">Estado civil:</label>
                        <select id="estado_civil" class="custom-select" name="estado_civil">
                            <option value="">ESTADO CIVIL</option>
                            <option value="SOLTERO/A" {{ old('estado_civil') == 'SOLTERO/A' ? 'selected' : '' }}>SOLTERO/A</option>
                            <option value="CASADO/A" {{ old('estado_civil') == 'CASADO/A' ? 'selected' : '' }}>CASADO/A</option>
                            <option value="VIUDO/A" {{ old('estado_civil') == 'VIUDO/A' ? 'selected' : '' }}>VIUDO/A</option>
                        </select>
                        @error('estado_civil')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-12 col-sm-6 py-2 wow fadeInRight">
                        <label for="profesion">Profesión:</label>
                        <input type="text" class="form-control" id="profesion" name="profesion" placeholder="Profesion"
                            value="{{ old('profesion') }}">
                        @error('profesion')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-12 col-sm-6 py-2 wow fadeInRight">
                        <label for="username">Nombre de usuario:</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Nombre de usuario"
                            value="{{ old('username') }}">
                        @error('username')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-12 col-sm-6 py-2 wow fadeInRight">
                        <label for="password">Contraseña:</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña">
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-12 col-sm-6 py-2 wow fadeInRight">
                        <label for="confirmar_password">Confirmar contraseña:</label>
                        <input type="password" class="form-control" id="confirmar_password" name="confirmar_password"
                            placeholder="Confirmar contraseña">
                        @error('confirmar_password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <button type="submit" id="btn-register" class="btn btn-primary mt-3 wow zoomIn">Registrarse</button>
            </form>
        </div>
    </div> <!-- .page-section -->
    {{--
    <div class="page-section banner-home bg-image"
        style="background-image: url(assets-landing/img/banner-pattern.svg);">
        <div class="container py-5 py-lg-0">
            <div class="row align-items-center">
                <div class="col-lg-4 wow zoomIn">
                    <div class="img-banner d-none d-lg-block">
                        <img src="assets-landing/img/mobile_app.png" alt="">
                    </div>
                </div>
                <div class="col-lg-8 wow fadeInRight">
                    <h1 class="font-weight-normal mb-3">Get easy access of all features using One Health Application
                    </h1>
                    <a href="#"><img src="assets-landing/img/google_play.svg" alt=""></a>
                    <a href="#" class="ml-2"><img src="assets-landing/img/app_store.svg" alt=""></a>
                </div>
            </div>
        </div>
    </div> --}}

    <footer class="page-footer">
        <div class="container">
            <div class="row px-md-3">
                <div class="col-sm-6 py-3">
                    <h5>Institucion</h5>
                    <ul class="footer-menu">
                        <li><a href="#objetivos">Objetivos</a></li>
                        <li><a href="#idiomas">Idiomas</a></li>
                    </ul>
                </div>
                <div class="col-sm-6 py-3">
                    <h5>Contactos</h5>
                    <p class="footer-link mt-2">Carrera de Linguistica e Idiomas</p>

                    <h5 class="mt-3">Redes Sociales</h5>
                    <div class="footer-sosmed mt-3">
                        <a href="https://linguistica.upea.edu.bo" target="_blank">
                            <span class="mai-globe"></span>
                        </a>
                        <a href="https://www.facebook.com/groups/135396129849549" target="_blank">
                            <span class="mai-logo-facebook-f"></span>
                        </a>
                    </div>
                </div>
            </div>

            <hr>

            <p id="copyright">Copyright Jhenny &copy; 2023</p>
        </div>
    </footer>

    <script src="assets-landing/js/jquery-3.5.1.min.js"></script>

    <script src="assets-landing/js/bootstrap.bundle.min.js"></script>

    <script src="assets-landing/vendor/owl-carousel/js/owl.carousel.min.js"></script>

    <script src="assets-landing/vendor/wow/wow.min.js"></script>

    <script src="assets-landing/js/theme.js"></script>

    <script>
        document.getElementById('btn-register').addEventListener('submit', (event) => {
            event.preventDefault();
        })
    </script>

</body>

</html>
