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
                                <h5 class="card-title" style="color: #000;">Pusat Bantuan</h5>
                                <p class="card-text" style="color: #000;">Kami siap menjawab pertanyaan anda dan membantu kendala anda!</p>
                                <h5 class="card-title mt-5 mb-4" style="color: #000;">Frequently Ask Question</h5>
                                <div class="accordion" id="accordionExample">
                                    <div class="accordion-item border-0 border-bottom">
                                        <h2 class="accordion-header" id="headingOne">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                                Apa itu Rumah Makan Mitra?
                                            </button>
                                        </h2>
                                        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                Apa itu Rumah Makan Mitra?
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item border-0 border-bottom">
                                        <h2 class="accordion-header" id="headingTwo">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                Bagaimana cara  saya memesan makanan?
                                            </button>
                                        </h2>
                                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                Bagaimana cara  saya memesan makanan?
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item border-0 border-bottom">
                                        <h2 class="accordion-header" id="headingThree">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                Bagaimana cara saya membuat pesanan instant?
                                            </button>
                                        </h2>
                                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                Bagaimana cara saya membuat pesanan instant?
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item border-0 border-bottom">
                                        <h2 class="accordion-header" id="headingFour">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                                Bagaimana cara saya membuat pesanan katering?
                                            </button>
                                        </h2>
                                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                Bagaimana cara saya membuat pesanan katering?
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item border-0 border-bottom">
                                        <h2 class="accordion-header" id="headingFive">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                                Bagaimana cara melakukan pembayaran di Rumah Makan Mitra?
                                            </button>
                                        </h2>
                                        <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                Bagaimana cara melakukan pembayaran di Rumah Makan Mitra?
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item border-0 border-bottom">
                                        <h2 class="accordion-header" id="headingSix">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                                Apakah ada kontak yang bisa saya hubungi jika saya ada pertanyaan tambahan?
                                            </button>
                                        </h2>
                                        <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                Apakah ada kontak yang bisa saya hubungi jika saya ada pertanyaan tambahan?
                                            </div>
                                        </div>
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

@endsection
