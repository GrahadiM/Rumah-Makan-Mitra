{{-- Extends layout --}}
@extends('layouts.adm.base')

{{-- Styles --}}
@push('style')

    <style>
        a.disabled{
            pointer-events: none;
            cursor: default;
        }
    </style>

@endpush

{{-- Content --}}
@section('content')

    <div class="page-body">
        <div class="container-xl">
            <div class="row row-cards">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <span class="avatar avatar-md" style="background-image: url({{ Storage::disk('local')->url('public/images/avatar/'.\Setting::getSetting()->logo) }})"></span>
                                </div>
                                <div class="col">
                                    <h2 class="page-title">Nama: {{ auth()->user()->name }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Edit Profile</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('profile.update') }}" method="POST" autocomplete="off" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf

                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <label class="form-label">Nama User</label>
                                        <input type="text" class="form-control" name="name" value="{{ auth()->user()->name }}" placeholder="Masukan Nama User" required>
                                    </div>
                                    {{-- <div class="col-12 mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="text" class="form-control" name="email" value="{{ auth()->user()->email }}" required>
                                    </div> --}}
                                    {{-- <div class="col-12 mb-3">
                                        <label for="formFile" class="form-label">Foto Profile</label>
                                        <input type="file" class="form-control" name="avatar" id="formFile">
                                    </div> --}}

                                    <div class="col-12 d-grid gap-2 d-md-flex justify-content-md-end">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Edit Password</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('profile.password') }}" method="POST">
                                @method('PUT')
                                @csrf

                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <label class="form-label">Password Lama</label>
                                        <input type="password" class="form-control" name="current_password" placeholder="Masukan Password Lama" required>
                                    </div>
                                    {{-- <input type="hidden" class="form-control" name="current_password" value="{{ auth()->user()->password }}" placeholder="Masukan Password Lama" required> --}}
                                    <div class="col-12 mb-3">
                                        <label for="inputPassword5" class="form-label">Password Baru</label>
                                        <input type="password" name="password" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock" placeholder="Masukan Password Baru" required>
                                        <div id="passwordHelpBlock" class="form-text text-muted">
                                            Kata sandi harus terdiri dari 8-16 karakter, berisi huruf dan angka, dan tidak boleh mengandung spasi, karakter khusus, atau emoji.
                                        </div>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label class="form-label">Konfirmasi Password Baru</label>
                                        <input type="password" class="form-control" name="password_confirmation" placeholder="Konfirmasi Password Baru" required>
                                    </div>
                                    @if($errors->any()) @foreach($errors->all() as $error)
                                        <span><strong class="text-danger">{{ $error }}</strong></span>
                                    @endforeach @endif
                                    @if(session('success'))
                                        <span><strong class="text-success"> {{ session('success') }}</strong></span>
                                    @endif
                                    <div class="col-12 d-grid gap-2 d-md-flex justify-content-md-end">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                @can (Auth()->user()->role == 2)
                    <div class="col-md-12 mb-3">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Lengkapi Biodata Perguruan Tinggi</h3>
                            </div>
                            <div class="card-body">
                                <form action="" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-6 mb-3">
                                            <div class="row">
                                                <div class="col-12 mb-3">
                                                    <label class="form-label">Nama Perguruan Tinggi</label>
                                                    <input type="text" class="form-control" name="nama" value="" placeholder="Masukan Nama Perguruan Tinggi">
                                                </div>
                                                <div class="col-12 mb-3">
                                                    <label class="form-label">Jumlah Mahasiswa</label>
                                                    <input type="number" class="form-control" name="" value="" placeholder="Masukan Jumlah Mahasiswa">
                                                </div>
                                                <div class="col-12 mb-3">
                                                    <label class="form-label">Jumlah Gedung</label>
                                                    <input type="number" class="form-control" name="" value="" placeholder="Masukan Jumlah Gedung">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <label for="exampleFormControlTextarea1" class="form-label">Alamat Perguruan Tinggi</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="9" name="" placeholder="Masukan Alamat Perguruan Tinggi"></textarea>
                                        </div>
                                        <div class="col-12 d-grid gap-2 d-md-flex justify-content-md-end">
                                            <button type="submit" class="btn btn-primary" disabled>Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endcan

            </div>
        </div>
    </div>

@endsection

{{-- Script --}}
@push('app')

    <script>
        $(function(){
            $('a.disabled').on('click',function(event){
                event.preventDefault();
            }).removeClass('disabled');
        });
    </script>

@endpush
