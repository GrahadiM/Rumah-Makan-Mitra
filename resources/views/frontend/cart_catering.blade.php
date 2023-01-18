@extends('layouts.fe.base')

@section('content')

        @include('layouts.fe.navbar.subnav')

        <!-- Masthead-->
        <header class="masthead">
            <div class="container">
                <div class="card">
                    <div class="card-body row">
                        <h5 class="col-md-10 card-title" style="color: #000;">Pengiriman</h5>
                        <button data-bs-toggle="modal" data-bs-target="#hari" class="col-md-2 btn btn-sm btn-primary text-decoration-none fw-bold">Order min H-1</button>
                        <a data-bs-toggle="modal" data-bs-target="#alamat" class="col-md-12 card-text text-decoration-underline" style="color: #000;">{{ $adr->address->title }}</a>
                        <p class="col-md-12 card-text" style="color: #000;">{{ $adr->address->address. ', ' .$adr->address->provinsi. ', ' .$adr->address->kabupaten. ', ' .$adr->address->kecamatan. ', ' .$adr->address->pos }}</p>
                        <form action="" method="POST">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="note"><i class="far fa-sticky-note"></i></span>
                                <input type="text" class="form-control" placeholder="Tambahkan catatan pengiriman" aria-label="Note" aria-describedby="note">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </header>

        <!-- Category Section-->
        <section class="page-section category" id="category">
            <div class="container">
                <div class="card mb-5">
                    <div class="card-body">
                        <h5 class="card-title" style="color: #000;">Pesanan</h5>
                        <div class="card border-0 mt-4">
                            <div class="row g-0">
                                @forelse ($items as $item)
                                    <div class="col-md-2 p-3">
                                        <img src="{{ asset('frontend/assets/img/product') . "/" . $item->product->thumbnail }}" class="img-fluid rounded-start" alt="Thumbnail">
                                    </div>
                                    <div class="col-md-10">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $item->product->name }}</h5>
                                            <p class="card-text">{{ $item->product->body }}</p>
                                            <div class="row">
                                                <p class="card-text col-md-10"><b>{{ __('Rp.').number_format($item->product->price,2,',','.') }}</b></p>
                                                <div class="col-md-2">
                                                    <div class="row btn-group" role="group">
                                                        <button class="btn btn-outline-primary border-end-0 col-3" style="height: 36px;" onclick="event.preventDefault(); document.getElementById('minus-form-{{ $item->id }}').submit();"><i class="fas fa-minus"></i></button>
                                                        <input type="number" class="border border-primary border-start-0 border-end-0 text-center col-6"style="height: 36px;width: 64px;" min="1" value="{{ $item->qty }}" disabled>
                                                        <button class="btn btn-outline-primary border-start-0 col-3" style="height: 36px;" onclick="event.preventDefault(); document.getElementById('plus-form-{{ $item->id }}').submit();"><i class="fas fa-plus"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <form id="minus-form-{{ $item->id }}" action="{{ route('fe.minus', $item->id) }}" method="POST" class="d-none">
                                        @method('PUT')
                                        @csrf
                                        <input type="hidden" name="qty" value="{{ $item->qty-1 }}">
                                    </form>
                                    <form id="plus-form-{{ $item->id }}" action="{{ route('fe.plus', $item->id) }}" method="POST" class="d-none">
                                        @method('PUT')
                                        @csrf
                                        <input type="hidden" name="qty" value="{{ $item->qty+1 }}">
                                    </form>
                                @empty
                                    <div class="col-12 text-center">Maaf, Data Belum Tersedia!</div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-5">
                    <div class="card-body">
                        <h5 class="card-title" style="color: #000;">Ringkasan Pembayaran</h5>
                        <div class="row">
                            <div class="col-md-10">Total Harga</div>
                            <div class="col-md-2">{{ __('Rp.').number_format($total,2,',','.') }}</div>
                        </div>
                        <div class="row">
                            <div class="col-md-10">Biaya Pelayanan</div>
                            <div class="col-md-2">{{ __('Rp.').number_format($total*(10/100),2,',','.') }}</div>
                        </div>
                        <div class="row">
                            <div class="col-md-10">Ongkos Kirim</div>
                            <div class="col-md-2">Rp.0</div>
                        </div>
                        <hr style="color:#000;opacity:unset;">
                        <div class="row fw-bold">
                            <div class="col-md-10">Total Harga</div>
                            <div class="col-md-2">{{ __('Rp.').number_format($total+($total*(10/100)),2,',','.') }}</div>
                        </div>
                    </div>
                </div>
                <div class="row fw-bold mb-5">
                    <div class="col-md-10">
                        Total Harga
                        <h5>{{ __('Rp.').number_format($total,2,',','.') }}</h5>
                    </div>
                    <div class="col-md-2">
                        @if (\Setting::getDay() == NULL)
                            <form class="modal-body row" action="{{ route('fe.post_cart') }}" method="POST">
                            @csrf
                        @endif
                            <button type="submit" class="btn btn-dark">Pembayaran</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        @include('layouts.fe.modal.menu')
        @include('layouts.fe.modal.day')
        @include('layouts.fe.modal.address')

@endsection
