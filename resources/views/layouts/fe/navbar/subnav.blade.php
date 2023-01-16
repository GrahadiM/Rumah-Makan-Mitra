
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg bg-header text-uppercase fixed-top" id="mainSubnav">
        <div class="container">
            <a class="navbar-brand" href="{{ route('fe.index') }}">{{ $title }}</a>
            <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item mx-0 mx-lg-1"><button class="nav-link py-lg-2 px-0 px-lg-2 rounded" data-bs-toggle="modal" data-bs-target="#cart"><i class="fas fa-shopping-cart text-dark"></i></button></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-lg-2 px-0 px-lg-3 rounded text-capitalize text-dark fw-bold" href="{{ route('fe.akun') }}">{{ Auth::user()->firstname }}</a></li>
                </ul>
            </div>
        </div>
    </nav>
