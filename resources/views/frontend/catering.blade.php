@extends('layouts.fe.base')

@section('content')

        @include('layouts.fe.navbar.subnav')

        <!-- Masthead-->
        <header class="masthead text-white text-center">
            <div class="container d-flex align-items-center flex-column">
                <!-- Sub Header Image-->
                <img class="img-fluid img-thumbnail mb-5" src="{{ asset('frontend') }}/assets/img/sub-banner.png" alt="..." />
            </div>
        </header>

        <!-- Category Section-->
        <section class="page-section category" id="category">
            <div class="container">
                <div class="row justify-content-center">
                    <!-- Portfolio Item -->
                    <div class="col-6 col-category mb-5 mt-5">
                        <a href="{{ route('fe.resto_catering') }}">
                            <img class="img-fluid" src="{{ asset('frontend') }}/assets/img/category/makanan_berat.png" alt="..." />
                        </a>
                    </div>
                    <!-- Portfolio Item -->
                    <div class="col-6 col-category mb-5 mt-5">
                        <a href="{{ route('fe.resto_catering') }}">
                            <img class="img-fluid" src="{{ asset('frontend') }}/assets/img/category/minuman.png" alt="..." />
                        </a>
                    </div>
                    <!-- Portfolio Item -->
                    <div class="col-6 col-category mb-5 mt-5">
                        <a href="{{ route('fe.resto_catering') }}">
                            <img class="img-fluid" src="{{ asset('frontend') }}/assets/img/category/lauk.png" alt="..." />
                        </a>
                    </div>
                    <!-- Portfolio Item -->
                    <div class="col-6 col-category mb-5 mt-5">
                        <a href="{{ route('fe.resto_catering') }}">
                            <img class="img-fluid" src="{{ asset('frontend') }}/assets/img/category/makanan_ringan.png" alt="..." />
                        </a>
                    </div>
                    <!-- Portfolio Item -->
                    <div class="col-6 col-category mb-5 mt-5">
                        <a href="{{ route('fe.resto_catering') }}">
                            <img class="img-fluid" src="{{ asset('frontend') }}/assets/img/category/sayuran.png" alt="..." />
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Favorite Section-->
        <section class="page-section portfolio" id="portfolio">
            <div class="container">
                <!-- Favorite Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Makanan Terfavorit</h2>
                <!-- Icon Divider-->
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Favorite Grid Items-->
                <div class="row justify-content-center">
                    <!-- Favorite Item -->
                    <div class="col-md-6 col-lg-3 mb-5">
                        <a href="{{ route('fe.resto_catering') }}" class="text-decoration-none">
                            <div class="card card-product">
                                <img src="{{ asset('frontend') }}/assets/img/product/ayam-bakar.jpg" class="card-img-top img-fluid" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title text-dark">Nasi Ayam Bakar</h5>
                                    <p class="card-text text-dark">Nasi, Sayur Komplit, Sambal Ijo Ayam Bakar</p>
                                    <div class="text-dark">
                                        <i class="fas fa-star star-active"></i> 4.7
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-- Favorite Item -->
                    <div class="col-md-6 col-lg-3 mb-5">
                        <a href="{{ route('fe.resto_catering') }}" class="text-decoration-none">
                            <div class="card card-product">
                                <img src="{{ asset('frontend') }}/assets/img/product/ayam-bakar.jpg" class="card-img-top img-fluid" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title text-dark">Nasi Ayam Bakar</h5>
                                    <p class="card-text text-dark">Nasi, Sayur Komplit, Sambal Ijo Ayam Bakar</p>
                                    <div class="text-dark">
                                        <i class="fas fa-star star-active"></i> 4.7
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-- Favorite Item -->
                    <div class="col-md-6 col-lg-3 mb-5">
                        <a href="{{ route('fe.resto_catering') }}" class="text-decoration-none">
                            <div class="card card-product">
                                <img src="{{ asset('frontend') }}/assets/img/product/ayam-bakar.jpg" class="card-img-top img-fluid" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title text-dark">Nasi Ayam Bakar</h5>
                                    <p class="card-text text-dark">Nasi, Sayur Komplit, Sambal Ijo Ayam Bakar</p>
                                    <div class="text-dark">
                                        <i class="fas fa-star star-active"></i> 4.7
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-- Favorite Item -->
                    <div class="col-md-6 col-lg-3 mb-5">
                        <a href="{{ route('fe.resto_catering') }}" class="text-decoration-none">
                            <div class="card card-product">
                                <img src="{{ asset('frontend') }}/assets/img/product/ayam-bakar.jpg" class="card-img-top img-fluid" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title text-dark">Nasi Ayam Bakar</h5>
                                    <p class="card-text text-dark">Nasi, Sayur Komplit, Sambal Ijo Ayam Bakar</p>
                                    <div class="text-dark">
                                        <i class="fas fa-star star-active"></i> 4.7
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        @forelse ($products as $name => $product)
            <!-- Favorite Section-->
            <section class="page-section portfolio" id="portfolio">
                <div class="container">
                    <!-- Favorite Section Heading-->
                    <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">{{ $name }}</h2>
                    <!-- Icon Divider-->
                    <div class="divider-custom">
                        <div class="divider-custom-line"></div>
                        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                        <div class="divider-custom-line"></div>
                    </div>
                    <!-- Favorite Grid Items-->
                    <div class="row justify-content-center">
                        @if (count($product)>0)
                            @forelse ($product as $item)
                                {{-- <div id="product"></div> --}}
                                <!-- Favorite Item -->
                                <div class="col-md-6 col-lg-3 mb-5">
                                    <a data-bs-toggle="modal" data-bs-target="#cart" class="text-decoration-none">
                                        <div class="card card-product">
                                            <img src="{{ asset('frontend/assets/img/product') . "/" . $item->thumbnail }}" class="card-img-top img-fluid" alt="...">
                                            <div class="card-body text-dark">
                                                <h5 class="card-title">{{ $item->name }}</h5>
                                                <p class="card-text">{{ $item->body }}</p>
                                                <div class="text-dark">
                                                    <i class="fas fa-star star-active"></i> 4.7
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @empty
                                Maaf, Data Belum Tersedia!
                            @endforelse
                        @endif
                    </div>
                </div>
            </section>
        @empty
            Maaf, Data Belum Tersedia!
        @endforelse

        @include('layouts.fe.modal.menu')

@endsection
