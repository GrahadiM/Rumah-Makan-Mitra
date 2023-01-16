    <!-- Favicon -->
    <link href="{{ \Setting::getSetting()->favicon == null ? asset('frontend/assets/images/favicon_default.ico') :  Storage::disk('local')->url('public/images/setting/'.\Setting::getSetting()->favicon) }}" rel="icon">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('admin') }}/plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('admin') }}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('admin') }}/dist/css/adminlte.min.css">
    {{-- <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css') }}/style.css"> --}}
