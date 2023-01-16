<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ \Setting::getSetting()->title_web }}</title>

    @include('layouts.adm.css')
    @stack('style')

</head>
{{-- <body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed"> --}}
<body class="layout-fixed layout-navbar-fixed sidebar-mini layout-footer-fixed">
    <!-- Site wrapper -->
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="
            @if (\Setting::getSetting()->logo == null)
            {{ Storage::disk('local')->url('public/images/setting/logo_default.png') }}
            @else
            {{ Storage::disk('local')->url('public/images/setting/'.\Setting::getSetting()->logo) }}
            @endif
            " alt="AdminLTELogo" height="60" width="120">
        </div>

        <!-- Navbar -->
        @include('layouts.adm.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('layouts.adm.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm">
                        <h1>@yield('title')</h1>
                        @include('layouts.adm.alert')
                    </div>
                </div>
            </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">

                <div class="container-fluid">
                    @yield('content')
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        @include('layouts.adm.footer')

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-dark btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>

    </div>
    <!-- ./wrapper -->

    @include('layouts.adm.js')
    @stack('scripts')

</body>
</html>
