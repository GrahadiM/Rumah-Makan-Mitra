@extends('layouts.fe.base')

@section('js')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                $("#editAlamat").modal({
                    keyboard: true,
                    backdrop: "static",
                    show: false,
                });
              });
            });
        </script>
@endsection

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
                                    @include('layouts.fe.modal.addAlamat')
                                </div>
                            </div>
                            <hr>
                            @forelse ($items as $item)
                                <div class="card-body">
                                    <div class="row">
                                        <h5 class="col-md-10 card-title" style="color: #000;">{{ $item->title }}</h5>
                                        <div class="col-md-2">
                                            <h5><span class=" badge bg-primary ms-5">{{ $item->type }}</span></h5>
                                        </div>
                                        <div class="col-md-3">
                                            <p class="card-text" style="color: #000;">
                                                {{ $item->name }}
                                                <br>
                                                {{ '+62'.$item->wa }}
                                            </p>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="card-text" style="color: #000;">{{ $item->address. ', ' .$item->provinsi. ', ' .$item->kabupaten. ', ' .$item->kecamatan. ', ' .$item->pos }}</p>
                                        </div>
                                        <div class="col-md-3 d-flex justify-content-end">
                                            @if (strtoupper($item->type) == 'UMUM')
                                            <form action="{{ route('fe.set_alamat') }}" method="POST">
                                                @method('PUT')
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $item->id }}">
                                                <input type="hidden" name="type" value="{{ $item->type }}">
                                                <button class="btn btn-sm btn-primary text-decoration-none fw-bold mb-4 me-1" type="submit">Set Utama</button>
                                            </form>
                                            @endif
                                            <button data-id="{{ $item->id }}" data-bs-toggle="modal" data-bs-target="#editAlamat-{{ $item->id }}" class="btn btn-sm btn-secondary text-decoration-none fw-bold mb-4 me-1"><i class="fas fa-pencil-alt"></i></button>
                                            @include('layouts.fe.modal.editAlamat')
                                            <button data-id="{{ $item->id }}" data-bs-toggle="modal" data-bs-target="#hapusAlamat-{{ $item->id }}" class="btn btn-sm btn-danger text-decoration-none fw-bold mb-4 me-1"><i class="fas fa-trash-alt"></i></button>
                                            @include('layouts.fe.modal.delAlamat')
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="card-body text-center"><h5>Maaf, Data Belum Tersedia! Silahkan Lengkapi Data Anda Terlebih Dahulu!</h5></div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </header>

        @include('layouts.fe.modal.menu')
        @include('layouts.fe.modal.profile')

@endsection
