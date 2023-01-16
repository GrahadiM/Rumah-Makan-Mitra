@extends('layouts.fe.base')

@section('content')

        @include('layouts.fe.navbar.subnav')

        <!-- Masthead-->
        <header class="masthead">
            <div class="container">
                <div class="row">
                    @include('layouts.fe.navbar.sidebar')
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title" style="color: #000;">Pesanan Saya</h5>
                                <p class="card-text" style="color: #000;">Riwayat belanja Anda</p>
                                <nav>
                                    <div class="nav nav-tabs border-0" id="nav-tab" role="tablist">
                                        <button class="nav-link border-0 border-bottom-primary active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Instant Order</button>
                                        <button class="nav-link border-0 border-bottom-primary" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Katering</button>
                                    </div>
                                </nav>
                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
                                        <div class="row mt-5">
                                            <div class="col-md-2">
                                                <img src="assets/logo/logo-instant.png" class="img-fluid p-2" alt="logo">
                                            </div>
                                            <div class="col-md-7">
                                                <p class="card-text" style="color: #000;">
                                                    Paket Nasi Ayam Gulai, Paket Nasi Rendang
                                                    <br>
                                                    Rp.52.800
                                                    <br>
                                                    2 menu
                                                </p>
                                                <p class="text-muted">2 Januari 2023, 12:01</p>
                                            </div>
                                            <div class="col-md-3 text-end">
                                                <button class="btn btn-sm rounded btn-outline-primary">Dalam Proses</button>
                                            </div>
                                        </div>
                                        <div class="row mt-5">
                                            <div class="col-md-2">
                                                <img src="assets/logo/logo-instant.png" class="img-fluid p-2" alt="logo">
                                            </div>
                                            <div class="col-md-7">
                                                <p class="card-text" style="color: #000;">
                                                    Paket Nasi Ayam Gulai, Paket Nasi Rendang
                                                    <br>
                                                    Rp.52.800
                                                    <br>
                                                    2 menu
                                                </p>
                                                <p class="text-muted">2 Januari 2023, 12:01</p>
                                            </div>
                                            <div class="col-md-3 text-end">
                                                <button class="btn btn-sm rounded btn-outline-danger">Review</button>
                                            </div>
                                        </div>
                                        <div class="row mt-5">
                                            <div class="col-md-2">
                                                <img src="assets/logo/logo-instant.png" class="img-fluid p-2" alt="logo">
                                            </div>
                                            <div class="col-md-7">
                                                <p class="card-text" style="color: #000;">
                                                    Paket Nasi Ayam Gulai, Paket Nasi Rendang
                                                    <br>
                                                    Rp.52.800
                                                    <br>
                                                    2 menu
                                                </p>
                                                <p class="text-muted">2 Januari 2023, 12:01</p>
                                            </div>
                                            <div class="col-md-3 text-end">
                                                <button class="btn btn-sm rounded btn-outline-secondary">Selesai</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
                                        <div class="row mt-5">
                                            <div class="col-md-2">
                                                <img src="assets/logo/logo-katering.png" class="img-fluid p-2" alt="logo">
                                            </div>
                                            <div class="col-md-7">
                                                <p class="card-text" style="color: #000;">
                                                    Paket Nasi Ayam Gulai, Paket Nasi Rendang
                                                    <br>
                                                    Rp.52.800
                                                    <br>
                                                    2 menu
                                                </p>
                                                <p class="text-muted">2 Januari 2023, 12:01</p>
                                            </div>
                                            <div class="col-md-3 text-end">
                                                <button class="btn btn-sm rounded btn-outline-primary">Dalam Proses</button>
                                            </div>
                                        </div>
                                        <div class="row mt-5">
                                            <div class="col-md-2">
                                                <img src="assets/logo/logo-katering.png" class="img-fluid p-2" alt="logo">
                                            </div>
                                            <div class="col-md-7">
                                                <p class="card-text" style="color: #000;">
                                                    Paket Nasi Ayam Gulai, Paket Nasi Rendang
                                                    <br>
                                                    Rp.52.800
                                                    <br>
                                                    2 menu
                                                </p>
                                                <p class="text-muted">2 Januari 2023, 12:01</p>
                                            </div>
                                            <div class="col-md-3 text-end">
                                                <button class="btn btn-sm rounded btn-outline-danger">Review</button>
                                            </div>
                                        </div>
                                        <div class="row mt-5">
                                            <div class="col-md-2">
                                                <img src="assets/logo/logo-katering.png" class="img-fluid p-2" alt="logo">
                                            </div>
                                            <div class="col-md-7">
                                                <p class="card-text" style="color: #000;">
                                                    Paket Nasi Ayam Gulai, Paket Nasi Rendang
                                                    <br>
                                                    Rp.52.800
                                                    <br>
                                                    2 menu
                                                </p>
                                                <p class="text-muted">2 Januari 2023, 12:01</p>
                                            </div>
                                            <div class="col-md-3 text-end">
                                                <button class="btn btn-sm rounded btn-outline-secondary">Selesai</button>
                                            </div>
                                        </div>
                                        <div class="row mt-5">
                                            <div class="col-md-2">
                                                <img src="assets/logo/logo-katering.png" class="img-fluid p-2" alt="logo">
                                            </div>
                                            <div class="col-md-7">
                                                <p class="card-text" style="color: #000;">
                                                    Paket Nasi Ayam Gulai, Paket Nasi Rendang
                                                    <br>
                                                    Rp.52.800
                                                    <br>
                                                    2 menu
                                                </p>
                                                <p class="text-muted">2 Januari 2023, 12:01</p>
                                            </div>
                                            <div class="col-md-3 text-end">
                                                <button class="btn btn-sm rounded btn-outline-warning">Batal</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        @include('layouts.fe.modal.menu')
        @include('layouts.fe.modal.profile')

@endsection
