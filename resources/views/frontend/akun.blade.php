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
                                <h5 class="card-title" style="color: #000;">Edit Profile</h5>
                                <p class="card-text" style="color: #000;">Masukan informasi profile dengan benar untuk memudahkan proses pemesanan</p>
                                <form class="row" action="{{ route('fe.update_akun') }}" method="POST">
                                    @method('PUT')
                                    @csrf
                                    <div class="col-md-6 mb-3">
                                        <label for="first_name" class="form-label">Nama Depan</label>
                                        <input name="firstname" required type="text" class="form-control" id="firstname" value="{{ Auth::user()->firstname }}" placeholder="Nama Depan">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="last_name" class="form-label">Nama Belakang</label>
                                        <input name="lastname" required type="text" class="form-control" id="lastname" value="{{ Auth::user()->lastname }}" placeholder="Nama Belakang">
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input name="email" required type="email" class="form-control" id="email" value="{{ Auth::user()->email }}" placeholder="test@mail.com">
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="phone" class="form-label">No WhatsApp</label>
                                        <div class="input-group">
                                            <span class="input-group-text">+62</span>
                                            <input name="phone" required type="number" class="form-control" id="phone" min="1" value="{{ Auth::user()->phone }}" placeholder="85767113554">
                                        </div>
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
