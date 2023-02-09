@extends('layouts.fe.base')

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/react/15.1.0/react.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/react/15.1.0/react-dom.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
@endsection

@section('content')

    @include('layouts.fe.navbar.nav')

    <!-- Masthead-->
    <header id="bg-banner" class="masthead text-white text-center">
        <div class="container d-flex align-items-center flex-column">
            <!-- Masthead Avatar Image-->
            <img class="masthead-avatar mb-5" src="{{ asset('frontend') }}/assets/img/avataaars.svg" alt="..." />
            <!-- Masthead Heading-->
            @guest()
                <h1 class="masthead-heading text-uppercase mb-0">Login terlebih dahulu!</h1>
            @else
                <h1 class="masthead-heading text-uppercase mb-0">{{ Auth::user()->fullname }}</h1>
            @endguest
            <!-- Icon Divider-->
            <div class="divider-custom divider-light">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <!-- Masthead Subheading-->
            <p class="masthead-subheading font-weight-light mb-0">Selamat Datang di <b>{{ \Setting::getSetting()->title_web }}</b></p>
        </div>
    </header>

    <!-- Menu Section-->
    <section class="page-section menu" id="menu" style="margin-top: -250px;">
        <div class="container">
            <div class="card" id="card-menu">
                <div class="card-body">
                    <div class="row justify-content-center">
                        <!-- Portfolio Item -->
                        <div class="col-6 col-lg-3 mb-5 mt-5">
                            <a href="{{ route('fe.instan') }}" class="text-decoration-none">
                                <img class="img-fluid" src="{{ asset('frontend') }}/assets/img/menu/instant-logo.png" alt="..." />
                            </a>
                        </div>
                        <!-- Portfolio Item -->
                        <div class="col-6 col-lg-3 mb-5 mt-5">
                            <a href="{{ route('fe.catering') }}" class="text-decoration-none">
                                <img class="img-fluid" src="{{ asset('frontend') }}/assets/img/menu/catering-logo.png" alt="..." />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Category Section-->
    <section class="page-section category" id="category">
        <div class="container">
            <div class="row justify-content-center">
                <!-- Portfolio Item -->
                <div class="col-6 col-category mb-5 mt-5">
                    <a href="{{ url('/') }}/#makanan-berat">
                        <img class="img-fluid" src="{{ asset('frontend') }}/assets/img/category/makanan_berat.png" alt="Thumbnail" />
                    </a>
                </div>
                <!-- Portfolio Item -->
                <div class="col-6 col-category mb-5 mt-5">
                    <a href="{{ url('/') }}/#makanan-ringan">
                        <img class="img-fluid" src="{{ asset('frontend') }}/assets/img/category/makanan_ringan.png" alt="Thumbnail" />
                    </a>
                </div>
                <!-- Portfolio Item -->
                <div class="col-6 col-category mb-5 mt-5">
                    <a href="{{ url('/') }}/#lauk-pauk">
                        <img class="img-fluid" src="{{ asset('frontend') }}/assets/img/category/lauk.png" alt="Thumbnail" />
                    </a>
                </div>
                <!-- Portfolio Item -->
                <div class="col-6 col-category mb-5 mt-5">
                    <a href="{{ url('/') }}/#sayuran">
                        <img class="img-fluid" src="{{ asset('frontend') }}/assets/img/category/sayuran.png" alt="Thumbnail" />
                    </a>
                </div>
                <!-- Portfolio Item -->
                <div class="col-6 col-category mb-5 mt-5">
                    <a href="{{ url('/') }}/#minuman">
                        <img class="img-fluid" src="{{ asset('frontend') }}/assets/img/category/minuman.png" alt="Thumbnail" />
                    </a>
                </div>
            </div>
        </div>
    </section>

    @if (count($favorite)>0)
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
                    @forelse ($favorite as $item)
                        <!-- Favorite Item -->
                        <div class="col-md-6 col-lg-3 mb-5">
                            <a data-bs-toggle="modal" data-bs-target="#cart" class="text-decoration-none">
                                <div class="card card-product">
                                    <img src="{{ asset('frontend/assets/img/product') . "/" . $item->thumbnail }}" class="card-img-top img-fluid" style="height:200px;" alt="...">
                                    <div class="card-body text-dark">
                                        <h5 class="card-title">{{ $item->name }}</h5>
                                        <p class="card-text">{{ Str::limit($item->body, 100, '...') }}</p>
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
                </div>
            </div>
        </section>
    @endif

    {{-- <div id="indexPage"></div> --}}
    @forelse ($products as $name => $product)
        <!-- Favorite Section-->
        <section class="page-section portfolio" id="{{ Str::slug($name) }}">
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
                            <!-- Favorite Item -->
                            <div class="col-md-6 col-lg-3 mb-5">
                                <a data-bs-toggle="modal" data-bs-target="#cart" class="text-decoration-none">
                                    <div class="card card-product">
                                        <img src="{{ asset('frontend/assets/img/product') . "/" . $item->thumbnail }}" class="card-img-top img-fluid" style="height:200px;" alt="...">
                                        <div class="card-body text-dark">
                                            <h5 class="card-title">{{ $item->name }}</h5>
                                            <p class="card-text">{{ Str::limit($item->body, 100, '...') }}</p>
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
