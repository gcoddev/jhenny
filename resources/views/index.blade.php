<!DOCTYPE html>
<html lang="es" id="theme_html">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Consultoria</title>
    <link rel="shortcut icon" href="{{ asset('logo.jpeg') }}" type="image/x-icon">

    <!-- loader-->
    <link href="{{ URL::asset('assets/css/pace.min.css') }}" rel="stylesheet" />
    <script src="{{ URL::asset('assets/js/pace.min.js') }}"></script>

    <!--plugins-->
    <link href="{{ URL::asset('assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/bs-stepper/css/bs-stepper.css') }}" rel="stylesheet" />

    <!-- CSS Files -->
    <link href="{{ URL::asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/bootstrap-extended.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/icons.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap') }}" rel="stylesheet">

    <!--Theme Styles-->
    <link href="{{ URL::asset('assets/css/dark-theme.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/css/semi-dark.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/css/header-colors.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/jquery.dataTables.min.css') }}" rel="stylesheet" />
</head>

<body>
    <div class="wrapper">
        @yield('contenido')
        @yield('login')
    </div>
</body>

</html>
