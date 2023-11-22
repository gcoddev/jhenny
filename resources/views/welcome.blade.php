<!DOCTYPE html>
<html lang="es">

<head>
    <!-- ========== Meta Tags ========== -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Traducciones Consultoria">

    <!-- ========== Page Title ========== -->
    <title>Consultoria de Traducción</title>

    <!-- ========== Favicon Icon ========== -->
    <link rel="shortcut icon" href="{{ URL::asset('assets_landing/img/favicon.png') }}" type="image/x-icon">

    <!-- ========== Start Stylesheet ========== -->
    <link href="{{ URL::asset('assets_landing/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets_landing/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets_landing/css/themify-icons.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets_landing/css/elegant-icons.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets_landing/css/flaticon-set.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets_landing/css/magnific-popup.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets_landing/css/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets_landing/css/animate.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets_landing/css/validnavs.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets_landing/css/helper.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets_landing/css/unit-test.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets_landing/css/style.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('style.css') }}" rel="stylesheet">

</head>

<body class="bg-fixed dark-layout text-light"
    style="background-image: url({{ URL::asset('assets_landing/img/shape/banner-2.jpg') }});">

    <!-- Start Preloader
    ============================================= -->
    <div id="preloader">
        <div id="anaton-preloader" class="anaton-preloader">
            <div class="animation-preloader">
                <div class="spinner"></div>
                <div class="txt-loading">
                    <span data-text-preloader="T" class="letters-loading">
                        T
                    </span>
                    <span data-text-preloader="R" class="letters-loading">
                        R
                    </span>
                    <span data-text-preloader="A" class="letters-loading">
                        A
                    </span>
                    <span data-text-preloader="N" class="letters-loading">
                        N
                    </span>
                    <span data-text-preloader="S" class="letters-loading">
                        S
                    </span>
                    <span data-text-preloader="L" class="letters-loading">
                        L
                    </span>
                    <span data-text-preloader="A" class="letters-loading">
                        A
                    </span>
                    <span data-text-preloader="T" class="letters-loading">
                        T
                    </span>
                    <span data-text-preloader="I" class="letters-loading">
                        I
                    </span>
                    <span data-text-preloader="O" class="letters-loading">
                        O
                    </span>
                    <span data-text-preloader="N" class="letters-loading">
                        N
                    </span>
                </div>
            </div>
            <div class="loader">
                <div class="row">
                    <div class="col-2 loader-section section-left">
                        <div class="bg"></div>
                    </div>
                    <div class="col-2 loader-section section-left">
                        <div class="bg"></div>
                    </div>
                    <div class="col-2 loader-section section-left">
                        <div class="bg"></div>
                    </div>
                    <div class="col-2 loader-section section-right">
                        <div class="bg"></div>
                    </div>
                    <div class="col-2 loader-section section-right">
                        <div class="bg"></div>
                    </div>
                    <div class="col-2 loader-section section-right">
                        <div class="bg"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- End Preloader -->

    <!-- Header
    ============================================= -->
    <header>
        <!-- Start Navigation -->
        <nav
            class="navbar mobile-sidenav secondary navbar-sticky navbar-default validnavs navbar-fixed white no-background">

            <div class="container d-flex justify-content-between align-items-center">


                <div class="left-items">
                    <!-- Start Header Navigation -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                            <i class="fa fa-bars"></i>
                        </button>
                        <a class="navbar-brand" href="{{ route('welcome') }}">
                            <img src="{{ asset('logo.jpeg') }}" class="logo" alt="Logo" width="85" height="85">
                        </a>
                    </div>
                    <!-- End Header Navigation -->

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="navbar-menu">

                        <img src="{{ URL::asset('assets_landing/img/logo-blue.png') }}" alt="Logo">
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                            data-target="#navbar-menu">
                            <i class="fa fa-times"></i>
                        </button>

                        <ul class="nav navbar-nav navbar-center" data-in="fadeInDown" data-out="fadeOutUp">
                            <li><a href="#home">Inicio</a></li>
                            <li><a href="#info">Informacion</a></li>
                            <li><a href="#mision">Mision</a></li>
                            <li><a href="#vision">Vision</a></li>
                            <li><a href="#objetivos">Objetivos</a></li>
                            <li><a href="#caracteristicas">Caracteristicas</a></li>
                            <li><a href="#about">Acerca</a></li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div>

                <div class="attr-right">
                    <!-- Start Atribute Navigation -->
                    <div class="attr-nav">
                        <ul>
                            <li class="button border-btn secondary">
                                <a href="{{route('login')}}">Acceder</a>
                            </li>
                        </ul>
                    </div>
                    <!-- End Atribute Navigation -->

                    <!-- Overlay screen for menu -->
                    <div class="overlay-screen"></div>
                    <!-- End Overlay screen for menu -->

                </div>
                <!-- Main Nav -->

            </div>
        </nav>
        <!-- End Navigation -->
    </header>
    <!-- End Header -->

    <!-- Start Banner Area
    ============================================= -->
    <div class="banner-style-two-area text-light overflow-hidden"
        style="background-image: url({{ URL::asset('assets_landing/img/shape/6.png') }});" id="home">

        <div class="banner-shape-right-top">
            <img src="{{ URL::asset('assets_landing/img/shape/9.png') }}" alt="Image Not Found">
        </div>

        <!-- Single Item -->
        <div class="banner-style-two">
            <div class="container">
                <div class="content">
                    <div class="row">
                        <div class="col-xl-5">
                            <h2 class="wow fadeInUp" data-wow-delay="500ms" data-wow-duration="400ms">Consultoria de <strong>Traducciones</strong></h2>
                        </div>
                        <div class="col-xl-6 offset-xl-1">
                            <p class="wow fadeInUp" data-wow-delay="900ms" data-wow-duration="400ms">
                                La Carrera de Lingüística presta servicios enseñanza de idiomas a la toda la Universidad Pública de El Alto y la población, a través del Departamento de Idiomas. Sin embargo, no cuenta oficialmente con un centro de traducción, aunque en su organigrama tiene planificado un Centro de traducciones. En las últimas gestiones, la Decanatura del área Ciencias Sociales de la Universidad Pública de El Alto (UPEA) ha gestionado un proyecto de construcción de Consultorios Comunitarios, donde se pretende implementar el Consultorio Lingüístico. Para ello, en el año 2020 se gestionó la licitación del equipamiento para el consultorio comunitario de la carrera de lingüística.
                            </p>
                        </div>
                        <div class="col-lg-12">
                            <div class="thumb">
                                <img class="wow fadeInDown"
                                    src="{{ URL::asset('dashboard.png') }}" alt="Thumb">
                                <div class="banner-app-features">
                                    <ul>
                                        <li>
                                            <div class="icon">
                                                <i class="fas fa-video"></i>
                                            </div>
                                            <div class="info">
                                                <span>Calling Features</span>
                                                <h4>Live Video Call</h4>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="icon">
                                                <i class="fas fa-database"></i>
                                            </div>
                                            <div class="info">
                                                <span>Database</span>
                                                <h4>Unlimited Database</h4>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="icon">
                                                <i class="fas fa-cog"></i>
                                            </div>
                                            <div class="info">
                                                <span>Core Settings</span>
                                                <h4>Dynamic Functionality</h4>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Single Item -->
    </div>
    <!-- End Banner -->

    <!-- Start Process
    ============================================= -->
    <div class="process-style-onea-rea default-padding-bottom pt-md-120 pt-xs-50"
        style="background-image: url({{ URL::asset('assets_landing/img/shape/25.png') }};" id="info">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="site-heading text-center">
                        <h5 class="sub-heading">Working Process</h5>
                        <h2 class="heading">The only app you will need</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="process-style-one-box text-center">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <div class="row">

                            <!-- Single Item -->
                            <div class="col-lg-6 col-md-6">
                                <div class="process-style-one">
                                    <div class="inner-info">
                                        <img src="{{ URL::asset('assets_landing/img/icon/1.png') }}" alt="Icon">
                                        <h4>New sharing made for people</h4>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Item -->
                            <!-- Single Item -->
                            <div class="col-lg-6 col-md-6">
                                <div class="process-style-one">
                                    <div class="inner-info">
                                        <img src="{{ URL::asset('assets_landing/img/icon/4.png') }}" alt="Icon">
                                        <h4>Thousand of features and Custom option.</h4>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Item -->
                            <div class="shape-center">
                                <img src="{{ URL::asset('assets_landing/img/shape/24.png') }}" alt="Shape">
                            </div>

                            <!-- Single Item -->
                            <div class="col-lg-6 offset-lg-3">
                                <div class="process-style-one">
                                    <div class="inner-info">
                                        <img src="{{ URL::asset('assets_landing/img/icon/3.png') }}" alt="Icon">
                                        <h4>One integrated solution Manage</h4>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Item -->

                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="process-fun-fact">
                            <div class="fun-fact">
                                <div class="counter">
                                    <div class="timer" data-to="276" data-speed="2000">276</div>
                                    <div class="operator">K</div>
                                </div>
                                <span class="medium">Active user from the community</span>
                            </div>
                            <div class="fun-fact">
                                <div class="counter">
                                    <div class="timer" data-to="90" data-speed="2000">90</div>
                                    <div class="operator">%</div>
                                </div>
                                <span class="medium">(4,655) Positive Rating</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Process -->

    <!-- Start Feature
    ============================================= -->
    <div class="feature-style-two-area shadow pt-120 pt-xs-50 pb-70 pb-md-90 pb-xs-20 bg-gray"
        style="background-image: url({{ URL::asset('assets_landing/img/shape/26.png') }};">
        <div class="shape-right-top">
            <img src="{{ URL::asset('assets_landing/img/shape/27.png') }}" alt="Shape">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="site-heading text-light text-center">
                        <h2 class="sub-heading" style="color: black!important;">Antecedentes de la investigacion</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <!-- Single Itme -->
                <div class="col-lg-6 col-md-6" id="mision">
                    <div class="feature-style-two">
                        <div class="icon">
                            <img src="{{ URL::asset('assets_landing/img/icon/5.png') }}" alt="Icon">
                            <a href="#" class="btn-arrow">
                                <i class="fas fa-long-arrow-up"></i>
                            </a>
                        </div>
                        <div class="content">
                            <h3><a href="#">MISION DE LA CARRERA</a></h3>
                            <p>
                                Formar profesionales íntegros, con conocimientos científicos y tecnológicos en
                                Lingüística e Idiomas; con conciencia crítica y reflexiva; con valores éticos, morales y
                                altamente competentes, para responder a la vida intracultural, intercultural y
                                plurilingüe, del Estado Plurinacional de Bolivia, en pro de un desarrollo
                                sustentable-productivo y ecológico, enmarcado en el paradigma del Suma Qamaña.
                            </p>
                        </div>
                    </div>
                </div>
                <!-- End Single Itme -->
                <!-- Single Itme -->
                <div class="col-lg-6 col-md-6" id="vision">
                    <div class="feature-style-two">
                        <div class="icon">
                            <img src="{{ URL::asset('assets_landing/img/icon/6.png') }}" alt="Icon">
                            <a href="#" class="btn-arrow">
                                <i class="fas fa-long-arrow-up"></i>
                            </a>
                        </div>
                        <div class="content">
                            <h3><a href="#">MISION DE LA CARRERA</a></h3>
                            <p>
                                La Carrera de Lingüística e Idiomas tiene la visión de constituirse en una institución
                                líder en el campo de las ciencias del lenguaje verbal, con el objetivo de generar
                                investigación, ciencia y tecnología, para el desarrollo de los idiomas oficiales del
                                Estado Plurinacional de Bolivia y lenguas extranjeras, aplicando la teoría en la
                                práctica, en favor de los intereses de las naciones originarias.
                            </p>
                        </div>
                    </div>
                </div>
                <!-- End Single Itme -->
                <!-- Single Itme -->
                <div class="col-lg-12 col-md-12" id="objetivos">
                    <div class="feature-style-two">
                        <div class="icon">
                            <img src="{{ URL::asset('assets_landing/img/icon/7.png') }}" alt="Icon">
                            <a href="#" class="btn-arrow">
                                <i class="fas fa-long-arrow-up"></i>
                            </a>
                        </div>
                        <div class="content">
                            <h3><a href="#">OBJETIVOS</a></h3>
                            <p>
                                Formar profesionales íntegros y competentes en la Ciencia de la Lingüística y el
                                aprendizaje de idiomas, con alta sensibilidad y responsabilidad social, que trabajen con
                                vocación de servicio para el desarrollo sustentable, productivo y ecológico, enmarcado
                                en el paradigma del “Suma qamaña”.
                            </p>
                            <ul class="list-circle secondary mt-20">
                                <li>Promover la investigación científica de las lenguas, orientada al desarrollo de los
                                    saberes y conocimientos de la realidad pluricultural y multilingüe.</li>
                                <li>Desarrollar políticas lingüísticas en favor de los idiomas oficiales del Estado
                                    Plurinacional de Bolivia y lenguas extranjeras.</li>
                                <li>Desarrollar habilidades para la enseñanza-aprendizaje de Lingüística e Idiomas.</li>
                                <li>Aplicar los conocimientos de la lingüística y otras ciencias para la traducción e
                                    interpretación de idiomas.</li>
                                <li>Desarrollar una Educación Intracultural, Intercultural y Plurilingüe en el Estado
                                    Plurinacional de Bolivia.</li>
                                <li>Promover la investigación lingüística, orientada a la aplicación del ecoturismo,
                                    respetando el paradigma del “Suma qamaña”.</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End Single Itme -->
            </div>
        </div>
    </div>
    <!-- End Feature -->

    <!-- Start Choose Us
    ============================================= -->
    <div class="choose-us-area default-padding overflow-hidden" id="caracteristicas">
        <div class="container">
            <div class="row align-center">
                <div class="col-lg-6 choose-us-style-one">
                    <div class="choose-us-thumb">
                        <img class="wow fadeInDown"
                            src="{{ URL::asset('assets_landing/img/illustration/il-1.png') }}" alt="illustration">
                        <img class="wow fadeInRight" data-wow-delay="300ms"
                            src="{{ URL::asset('assets_landing/img/illustration/d8.png') }}" alt="illustration">
                        <img class="wow fadeInUp" data-wow-delay="900ms"
                            src="{{ URL::asset('assets_landing/img/illustration/d7.png') }}" alt="illustration">
                        <img class="wow fadeInLeft" data-wow-delay="300ms"
                            src="{{ URL::asset('assets_landing/img/illustration/d4.png') }}" alt="illustration">
                        <img class="wow fadeInLeft" data-wow-delay="900ms"
                            src="{{ URL::asset('assets_landing/img/illustration/d5.png') }}" alt="illustration">
                        <img class="wow fadeInUp" data-wow-delay="300ms"
                            src="{{ URL::asset('assets_landing/img/illustration/d9.png') }}" alt="illustration">
                        <img class="wow fadeInDown" data-wow-delay="1200ms"
                            src="{{ URL::asset('assets_landing/img/illustration/d2.png') }}" alt="illustration">
                        <img class="wow fadeInUp" data-wow-delay="900ms"
                            src="{{ URL::asset('assets_landing/img/illustration/d11.png') }}" alt="illustration">
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1 choose-us-style-one">
                    <h2 class="title">An editor designed <br> for contracts. </h2>
                    <ul class="list-double mt-50 mt-xs-30 mt-md-30">
                        <li>
                            <div class="content">
                                <h4>Admin Dashboard</h4>
                                <p>
                                    Seeing rather her you not esteem men settle genius excuse. Deal say over you age
                                    from comparison new.
                                </p>
                            </div>
                        </li>
                        <li>
                            <div class="content">
                                <h4>Cloud Hosting</h4>
                                <p>
                                    Esteem men settle genius excuse. Deal say over you age from. Comparison new ham
                                    melancholy son themselves.
                                </p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Choose Us -->

    <!-- Start Free Trial
    ============================================= -->
    <div class="free-trial-area overflow-hidden default-padding-bottom"
        style="background-image: url({{ URL::asset('assets_landing/img/shape/31.png') }};">
        <div class="container">
            <div class="row align-center">
                <div class="col-lg-6 free-trial-style-one">
                    <h2 class="title mb-25">Sign up & get <br> <strong>15 days</strong> free trial</h2>
                    <p>
                        Seeing rather her you not esteem men settle genius excuse. Deal say over you age from.
                        Comparison new ham melancholy son themselves.
                    </p>
                    <ul class="check-list mt-30">
                        <li>Ticketing system</li>
                        <li>Automated ticket distribution</li>
                        <li>Social media integration</li>
                        <li>Call and voice mail recordings</li>
                    </ul>
                    <div class="call mt-25">
                        <p>Give us a free cal</p>
                        <h4><a href="tel:+4733378901">+4733378901</a></h4>
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1">
                    <div class="trial-form">
                        <h4>Request for demo</h4>
                        <form action="#" class="contact-form contact-form">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input class="form-control" id="name" name="name" placeholder="Name"
                                            type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input class="form-control" id="email" name="email"
                                            placeholder="Email*" type="email">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input class="form-control" id="phone" name="phone"
                                            placeholder="Phone" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input class="form-control" id="company" name="company"
                                            placeholder="Company Name" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <button class="btn btn-sm btn-theme secondary" type="submit" name="submit"
                                        id="submit">
                                        Send Request
                                    </button>
                                </div>
                            </div>
                        </form>
                        <div class="shape">
                            <img src="{{ URL::asset('assets_landing/img/illustration/2.png') }}"
                                alt="Image Not Found">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Free Trial -->

    <!-- Start Pricing
    ============================================= -->
    <div class="pricing-style-two-area shadow top-shape-gray default-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="site-heading text-light text-center">
                        <h5 class="sub-heading">Best Pricing</h5>
                        <h2 class="heading">No hidden charges! <br> choose your plan.</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="pricing-style-two-items mt-25">
                <div class="row">
                    <!-- Single Itme -->
                    <div class="col-lg-4 col-md-6 pricing-style-two">
                        <div class="item">
                            <div class="pricing-header">
                                <h4>Basic Plan</h4>
                                <div class="price">
                                    <h2><strong>Free</strong></h2>
                                </div>
                            </div>
                            <div class="pricing-content">
                                <p>
                                    Low cost & affordable services to get you started very soon.
                                </p>
                                <ul>
                                    <li><i class="fas fa-check-circle"></i> Increase traffic 130%</li>
                                    <li><i class="fas fa-check-circle"></i> Organic traffic 215%</li>
                                    <li><i class="fas fa-times-circle"></i> 10 Free Optimization</li>
                                </ul>
                                <a class="btn circle mt-25 btn-sm btn-border effect" href="#">Purchase Plan</a>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Itme -->

                    <!-- Single Itme -->
                    <div class="col-lg-4 col-md-6 pricing-style-two active">
                        <div class="item">
                            <div class="pricing-header">
                                <h4>Premium Plan</h4>
                                <div class="price">
                                    <h2><sup>$</sup>29 <sub>/ Monthly</sub></h2>
                                </div>
                            </div>
                            <div class="pricing-content">
                                <p>
                                    Increased processing power with multiple sites, storage.
                                </p>
                                <ul>
                                    <li><i class="fas fa-check-circle"></i> 1,300 Keywords</li>
                                    <li><i class="fas fa-check-circle"></i> SEO Optimized</li>
                                    <li><i class="fas fa-check-circle"></i> Live Support</li>
                                </ul>
                                <a class="btn circle mt-25 btn-sm btn-light effect" href="#">Purchase Plan</a>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Itme -->

                    <!-- Single Itme -->
                    <div class="col-lg-4 col-md-6 pricing-style-two">
                        <div class="item">
                            <div class="pricing-header">
                                <h4>Advanced Plan</h4>
                                <div class="price">
                                    <h2><sup>$</sup>58 <sub>/ Monthly</sub></h2>
                                </div>
                            </div>
                            <div class="pricing-content">
                                <p>
                                    Target is processing power with multiple sites, storage.
                                </p>
                                <ul>
                                    <li><i class="fas fa-check-circle"></i> Increase traffic 130%</li>
                                    <li><i class="fas fa-check-circle"></i> Backlink analysis</li>
                                    <li><i class="fas fa-times-circle"></i> 10 Free Optimization</li>
                                </ul>
                                <a class="btn circle mt-25 btn-sm btn-border effect" href="#">Purchase Plan</a>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Itme -->

                </div>
            </div>
        </div>
    </div>
    <!-- End Pricing -->

    <!-- Start Faq
    ============================================= -->
    <div class="faq-style-area default-padding-bottom"
        style="background-image: url({{ URL::asset('assets_landing/img/shape/34.png') }};">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 faq-style-two">
                    <h2 class="title">Frequently asked questions from our social community</h2>
                    <div class="user-fun-fact mt-35">
                        <div class="fun-fact secondary">
                            <div class="content">
                                <div class="counter">
                                    <div class="timer" data-to="276" data-speed="2000">276</div>
                                    <div class="operator">K</div>
                                </div>
                                <span class="medium">Active user from the community</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 offset-lg-1">
                    <div class="faq-style-two mt--20">
                        <div class="accordion" id="faqAccordion">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="true"
                                        aria-controls="collapseOne">
                                        Where can I get software help?
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show"
                                    aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        <p>
                                            Bennings appetite disposed me an at subjects an. To no indulgence diminution
                                            so discovered mr apartments. Are off under folly death wrote cause her way
                                            spite. Plan upon yet way get cold spot its week.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false"
                                        aria-controls="collapseTwo">
                                        How much does data software costs?
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse"
                                    aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        <p>
                                            Cennings appetite disposed me an at subjects an. To no indulgence diminution
                                            so discovered mr apartments. Are off under folly death wrote cause her way
                                            spite. Plan upon yet way get cold spot its week.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                        aria-expanded="false" aria-controls="collapseThree">
                                        What kind of data is needed for software?
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse"
                                    aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        <p>
                                            Tennings appetite disposed me an at subjects an. To no indulgence diminution
                                            so discovered mr apartments. Are off under folly death wrote cause her way
                                            spite. Plan upon yet way get cold spot its week.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Faq -->

    <!-- Start Software Info
    ============================================= -->
    <div class="soft-info-area default-padding bg-gray"
        style="background-image: url({{ URL::asset('assets_landing/img/shape/23.png') }};" id="about">
        <div class="container">
            <div class="row align-center">

                <div class="col-lg-5 soft-info-style-one">
                    <div class="soft-info-list">
                        <h3>Unlock a superior customer experience </h3>
                        <p>
                            Excellence projecting is devonshire dispatched remarkably on estimating. Side in so life
                            past. Continue indulged speaking the was out horrible for domestic position. Seeing rather
                            her you not esteem men settle genius excuse. Deal say over you age from. Comparison new ham
                            melancholy son themselves.
                        </p>
                    </div>
                    <div class="soft-info-list mt-30">
                        <h3>Advanced Control and Privacy</h3>
                        <ul>
                            <li>
                                Continued at up to zealously necessary breakfast. Surrounded sir motionless she end
                                literature. Gay direction neglected but supported yet her.
                            </li>
                            <li>
                                Vulgar as hearts by garret. Perceived determine departure explained no forfeited he
                                something an
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-6 offset-lg-1">
                    <div class="soft-info-thumb">
                        <img class="wow fadeInUp" src="{{ URL::asset('assets_landing/img/dashboard/6.png') }}"
                            alt="Dashboard">
                        <div class="go-premium wow fadeInRight" data-wow-delay="500ms">
                            <span>Go Unlmited</span>
                            <h5>Unlock all features to improve your performance</h5>
                            <ul class="user-lists">
                                <li><img src="{{ URL::asset('assets_landing/img/100x100.png') }}"
                                        alt="Image Not Found"></li>
                                <li><img src="{{ URL::asset('assets_landing/img/100x100.png') }}"
                                        alt="Image Not Found"></li>
                                <li><img src="{{ URL::asset('assets_landing/img/100x100.png') }}"
                                        alt="Image Not Found"></li>
                                <li><img src="{{ URL::asset('assets_landing/img/100x100.png') }}"
                                        alt="Image Not Found"></li>
                                <li><i class="fas fa-plus"></i></li>
                            </ul>
                            <p>(200k Active user)</p>
                            <a class="btn circle mt-25 btn-sm btn-theme secondary animation" href="#">Premium
                                Plan</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- End Software Info -->

    <!-- Start Blog
    ============================================= -->
    <div class="blog-area secondary home-blog default-padding bottom-less">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="site-heading text-center">
                        <h5 class="sub-heading">News & Events</h5>
                        <h2 class="heading">Check out our blog posts </h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <!-- Single Item -->
                <div class="col-lg-4 mb-30">
                    <div class="blog-style-one">
                        <div class="thumb">
                            <a href="#"><img src="{{ URL::asset('assets_landing/img/800x600.png') }}"
                                    alt="Image Not Found"></a>
                        </div>
                        <div class="info">
                            <div class="meta">
                                <ul>
                                    <li>
                                        <a href="#">Md Sohag</a>
                                    </li>
                                    <li>
                                        25 April, 2023
                                    </li>
                                </ul>
                            </div>
                            <h3><a href="#">Miscovery incommode earnestly commanded if.</a></h3>
                            <a href="" class="button-regular">
                                Continue Reading <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- End Single Item -->
                <!-- Single Item -->
                <div class="col-lg-4 mb-30">
                    <div class="blog-style-one">
                        <div class="thumb">
                            <a href="#"><img src="{{ URL::asset('assets_landing/img/800x600.png') }}"
                                    alt="Image Not Found"></a>
                        </div>
                        <div class="info">
                            <div class="meta">
                                <ul>
                                    <li>
                                        <a href="#">Md Sohag</a>
                                    </li>
                                    <li>
                                        25 April, 2023
                                    </li>
                                </ul>
                            </div>
                            <h3><a href="#">Expression acceptance imprudence particular</a></h3>
                            <a href="" class="button-regular">
                                Continue Reading <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- End Single Item -->
                <!-- Single Item -->
                <div class="col-lg-4 mb-30">
                    <div class="blog-style-one">
                        <div class="thumb">
                            <a href="#"><img src="{{ URL::asset('assets_landing/img/800x600.png') }}"
                                    alt="Image Not Found"></a>
                        </div>
                        <div class="info">
                            <div class="meta">
                                <ul>
                                    <li>
                                        <a href="#">Md Sohag</a>
                                    </li>
                                    <li>
                                        25 April, 2023
                                    </li>
                                </ul>
                            </div>
                            <h3><a href="#">Considered imprudence of technical friendship.</a></h3>
                            <a href="" class="button-regular">
                                Continue Reading <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- End Single Item -->
            </div>
        </div>
    </div>
    <!-- End Blog -->

    <!-- Start Footer
    ============================================= -->
    <footer class="bg-dark text-light">
        <div class="container">
            <div class="f-items default-padding">
                <div class="row">
                    <!-- Singel Item -->
                    <div class="col-lg-5 col-md-6 footer-item pr-50 pr-xs-15 pr-md-15">
                        <div class="f-item about">
                            <img class="logo" src="{{ URL::asset('assets_landing/img/logo-blue.png') }}"
                                alt="Logo">

                            <div class="f-item newsletter">
                                <p>
                                    Join our subscribers list to get the instant <br> latest news and special offers.
                                </p>
                                <form action="#">
                                    <input type="email" placeholder="Your Email" class="form-control"
                                        name="email">
                                    <button type="submit">Subscribe</button>
                                </form>
                            </div>
                            <div class="copyright-text mt-40">
                                <p>&copy; Copyright 2023. All Rights Reserved by <a href="#">validthemes</a></p>
                            </div>
                            <div class="footer-social mt-20">
                                <ul>
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- End Singel Item -->

                    <!-- Singel Item -->
                    <div class="col-lg-2 col-md-6 footer-item">
                        <div class="f-item link">
                            <h4 class="widget-title">Company</h4>
                            <ul>
                                <li>
                                    <a href="#">Compnay Profile</a>
                                </li>
                                <li>
                                    <a href="#">About</a>
                                </li>
                                <li>
                                    <a href="#">Help Center</a>
                                </li>
                                <li>
                                    <a href="#">Career</a>
                                </li>
                                <li>
                                    <a href="#">Plans & Pricing</a>
                                </li>
                                <li>
                                    <a href="#">Contact</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- End Singel Item -->

                    <!-- Singel Item -->
                    <div class="col-lg-2 col-md-6 footer-item">
                        <div class="f-item link">
                            <h4 class="widget-title">Community</h4>
                            <ul>
                                <li>
                                    <a href="#">Career</a>
                                </li>
                                <li>
                                    <a href="#">Leadership</a>
                                </li>
                                <li>
                                    <a href="#">Strategy</a>
                                </li>
                                <li>
                                    <a href="#">Services</a>
                                </li>
                                <li>
                                    <a href="#">History</a>
                                </li>
                                <li>
                                    <a href="#">Components</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- End Singel Item -->

                    <!-- Singel Item -->
                    <div class="col-lg-3 col-md-6 item">
                        <div class="footer-item contact">
                            <h4 class="widget-title">Contact Info</h4>
                            <ul>
                                <li>
                                    <div class="icon">
                                        <i class="fas fa-home"></i>
                                    </div>
                                    <div class="content">
                                        <strong>Address:</strong>
                                        5919 Trussville Crossings Pkwy, Birmingham
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                    <div class="content">
                                        <strong>Email:</strong>
                                        <a href="mailto:info@validtheme.com">info@validtheme.com</a>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <i class="fas fa-phone"></i>
                                    </div>
                                    <div class="content">
                                        <strong>Phone:</strong>
                                        <a href="tel:2151234567">+123 34598768</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- End Singel Item -->

                </div>
            </div>
        </div>

        <!-- Footer Bottom -->
        <div class="footer-bottom bg-dark text-light text-center">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <p>
                            Copyright &copy; 2023 Anaton. All Rights Reserved
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Footer Bottom -->

        <div class="foter-shape-right-bottom">
            <img src="{{ URL::asset('assets_landing/img/shape/10.png') }}" alt="Thumb">
        </div>
    </footer>
    <!-- End Footer -->

    <!-- jQuery Frameworks
    ============================================= -->
    <script src="{{ URL::asset('assets_landing/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ URL::asset('assets_landing/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ URL::asset('assets_landing/js/jquery.appear.js') }}"></script>
    <script src="{{ URL::asset('assets_landing/js/jquery.easing.min.js') }}"></script>
    <script src="{{ URL::asset('assets_landing/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ URL::asset('assets_landing/js/modernizr.custom.13711.js') }}"></script>
    <script src="{{ URL::asset('assets_landing/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ URL::asset('assets_landing/js/wow.min.js') }}"></script>
    <script src="{{ URL::asset('assets_landing/js/progress-bar.min.js') }}"></script>
    <script src="{{ URL::asset('assets_landing/js/circle-progress.js') }}"></script>
    <script src="{{ URL::asset('assets_landing/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ URL::asset('assets_landing/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ URL::asset('assets_landing/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ URL::asset('assets_landing/js/count-to.js') }}"></script>
    <script src="{{ URL::asset('assets_landing/js/jquery.scrolla.min.js') }}"></script>
    <script src="{{ URL::asset('assets_landing/js/YTPlayer.min.js') }}"></script>
    <script src="{{ URL::asset('assets_landing/js/TweenMax.min.js') }}"></script>
    <script src="{{ URL::asset('assets_landing/js/validnavs.js') }}"></script>
    <script src="{{ URL::asset('assets_landing/js/main.js') }}"></script>

</body>

</html>
