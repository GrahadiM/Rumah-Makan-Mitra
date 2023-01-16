<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="Rumah Makan Mitra" />
        <meta name="author" content="Abdurrahman GM" />

        <title>{{ \Setting::getSetting()->title_web }}</title>

        @include('layouts.fe.css')
        @yield('css')

    </head>
    <body id="page-top">

        @include('sweetalert::alert')

        @yield('content')

        @include('layouts.fe.footer')

        @include('layouts.fe.js')
        @yield('js')

    </body>
</html>
