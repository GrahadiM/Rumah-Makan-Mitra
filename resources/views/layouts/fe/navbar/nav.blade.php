
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg bg-header text-uppercase fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="{{ route('fe.index') }}">{{ \Setting::getSetting()->title_web }}</a>
            <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button"
                data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive"
                aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <!-- <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#">Home</a></li> -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item mx-0 mx-lg-1">
                                <div class="button"><a class="nav-link py-3 px-0 px-lg-3 rounded"
                                        href="{{ route('login') }}">{{ __('Masuk') }}</a></div>
                            </li>
                        @endif
                    @else
                        <li class="nav-item mx-0 mx-lg-1">
                            <div class="button">
                                <a class="nav-link py-3 px-0 px-lg-3 rounded" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('Keluar') }}
                                </a>
                            </div>
                        </li>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
