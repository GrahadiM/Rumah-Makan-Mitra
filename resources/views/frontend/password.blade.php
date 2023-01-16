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
                                <h5 class="card-title" style="color: #000;">Edit Password</h5>
                                <p class="card-text" style="color: #000;">Gunakan Kombinasi Password untuk Melindungi Akun</p>
                                <form class="row" action="{{ route('fe.update_password') }}" method="POST" enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <div class="col-md-12 mb-3">
                                        <label for="current_password" class="form-label">Password Lama</label>
                                        <input name="current_password" required type="password" class="form-control" id="current_password" placeholder="Masukan Password Lama">
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="new_password" class="form-label">Password Baru</label>
                                        <input name="password" required type="password" class="form-control" id="new_password" placeholder="Masukan Password Baru">
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="password_confirmation" class="form-label">Konfirmasi Password Baru</label>
                                        <input name="password_confirmation" required type="password" class="form-control" id="password_confirmation" placeholder="Konfirmasi Password Baru">
                                    </div>
                                    <div class="col-md-12 input-group mt-3 mb-3">
                                        <button type="submit" class="btn btn-primary px-5">SIMPAN</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        @include('layouts.fe.modal.menu')
        @include('layouts.fe.modal.profile')

@endsection
