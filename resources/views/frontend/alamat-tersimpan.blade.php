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
                                <h5 class="card-title" style="color: #000;">Alamat Tersimpan</h5>
                                <p class="card-text" style="color: #000;">Masukan alamat dengan benar untuk memudahkan proses pengantaran</p>
                                <div class="d-md-flex justify-content-md-end">
                                    <button data-bs-toggle="modal" data-bs-target="#tambahAlamat" class="btn btn-sm btn-primary text-decoration-none fw-bold px-5">Tambah Alamat Baru</button>
                                </div>
                            </div>
                            <hr>
                            <div class="card-body">
                                <div class="row">
                                    <h5 class="col-md-9 card-title" style="color: #000;">Rumah <span class="badge bg-primary ms-5">Alamat Utama</span></h5>
                                    <div class="col-md-3 d-flex justify-content-end">
                                        <button data-bs-toggle="modal" data-bs-target="#editAlamat" class="btn btn-sm btn-secondary text-decoration-none fw-bold mb-4 me-1"><i class="fas fa-pencil-alt"></i></button>
                                        <button data-bs-toggle="modal" data-bs-target="#hapusAlamat" class="btn btn-sm btn-danger text-decoration-none fw-bold mb-4 me-1"><i class="fas fa-trash-alt"></i></button>
                                    </div>
                                    <div class="col-md-3">
                                        <p class="card-text" style="color: #000;">
                                            Susan
                                            <br>
                                            +6286789090905
                                        </p>
                                    </div>
                                    <div class="col-md-9">
                                        <p class="card-text" style="color: #000;">Jalan Mawar II, Kel. Kebon Jeruk, Kec. Kebon Jeruk, Kota Jakarta Barat, DKI Jakarta 11530</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <h5 class="col-md-9 card-title" style="color: #000;">Kantor</h5>
                                    <div class="col-md-3 d-flex justify-content-end">
                                        <button class="btn btn-sm btn-primary text-decoration-none fw-bold mb-4 me-1" onclick="location.href='alamat-tersimpan.html'">Set Utama</button>
                                        <button data-bs-toggle="modal" data-bs-target="#editAlamat" class="btn btn-sm btn-secondary text-decoration-none fw-bold mb-4 me-1"><i class="fas fa-pencil-alt"></i></button>
                                        <button data-bs-toggle="modal" data-bs-target="#hapusAlamat" class="btn btn-sm btn-danger text-decoration-none fw-bold mb-4 me-1"><i class="fas fa-trash-alt"></i></button>
                                    </div>
                                    <div class="col-md-3">
                                        <p class="card-text" style="color: #000;">
                                            Susan
                                            <br>
                                            +6286789090905
                                        </p>
                                    </div>
                                    <div class="col-md-9">
                                        <p class="card-text" style="color: #000;">Jalan Mawar II, Kel. Kebon Jeruk, Kec. Kebon Jeruk, Kota Jakarta Barat, DKI Jakarta 11530</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <h5 class="col-md-9 card-title" style="color: #000;">Kantor 2</h5>
                                    <div class="col-md-3 d-flex justify-content-end">
                                        <button class="btn btn-sm btn-primary text-decoration-none fw-bold mb-4 me-1" onclick="location.href='alamat-tersimpan.html'">Set Utama</button>
                                        <button data-bs-toggle="modal" data-bs-target="#editAlamat" class="btn btn-sm btn-secondary text-decoration-none fw-bold mb-4 me-1"><i class="fas fa-pencil-alt"></i></button>
                                        <button data-bs-toggle="modal" data-bs-target="#hapusAlamat" class="btn btn-sm btn-danger text-decoration-none fw-bold mb-4 me-1"><i class="fas fa-trash-alt"></i></button>
                                    </div>
                                    <div class="col-md-3">
                                        <p class="card-text" style="color: #000;">
                                            Susan
                                            <br>
                                            +6286789090905
                                        </p>
                                    </div>
                                    <div class="col-md-9">
                                        <p class="card-text" style="color: #000;">Jalan Mawar II, Kel. Kebon Jeruk, Kec. Kebon Jeruk, Kota Jakarta Barat, DKI Jakarta 11530</p>
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
        @include('layouts.fe.modal.addAlamat')
        @include('layouts.fe.modal.editAlamat')
        @include('layouts.fe.modal.delAlamat')

@endsection
