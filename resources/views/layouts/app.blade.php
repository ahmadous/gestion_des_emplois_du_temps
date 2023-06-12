<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="{{asset("img/logo/logo.png")}}" rel="icon">
    <title>GESTION-EDT - Dashboard</title>
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/ruang-admin.min.css') }}" rel="stylesheet">
</head>

<body id="page-top">
    <div id="wrapper">
        <!-- Sidebar -->
        @include('partials.sidebar')
        <!-- Sidebar -->
        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">
                <!-- TopBar -->
                <h1 class="logo me-auto"><a href="{{ url('/') }}">{{ config('app.name', 'Laravel') }}</a></h1>
                @include('partials.header')
                <!-- Topbar -->
                <section id="breadcrumbs" class="d-flex flex-columns text-uppercase .text-light">

                    <div class="container">

                        <ol class="navbar-nav ml-auto">
                            <li class="nav-item dropdown no-arrow"><a class="nav-link dropdown-toggle"
                                    href="{{ route('home') }}">Accueil</a></li>
                            <li class="nav-item dropdown no-arrow">@yield('titre')</li>
                        </ol>

                    </div>
                </section>
                <hr>
                <!-- Container Fluid-->
                <div class="container">
                    @yield('content')
                </div>
                <!---Container Fluid-->
            </div>
            <!-- Footer -->
            @include('partials.footer')
            <!-- Footer -->
        </div>
    </div>

    <!-- Scroll to top -->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('js/ruang-admin.min.js') }}"></script>
    <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('js/demo/chart-area-demo.js') }}"></script>
</body>

</html>
