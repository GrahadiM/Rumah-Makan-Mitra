
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <a data-bs-toggle="modal" data-bs-target="#profile">
                                    <img src="{{ asset('frontend') }}/assets/img/product/ayam-bakar.jpg" class="card-img-top img-fluid img-thumbnail rounded-pill" style="height:250px;width:250px;" alt="profile">
                                </a>
                                <h5 class="card-title text-dark text-center mt-4">{{ Auth::user()->fullname }}</h5>
                                <a href="{{ route('fe.akun') }}" class="btn btn-outline-secondary d-block mt-4" style="text-align: start;"><i class="far fa-edit me-3"></i> Edit Profile</a>
                                <a href="{{ route('fe.password') }}" class="btn btn-outline-secondary d-block mt-4" style="text-align: start;"><i class="fas fa-key me-3"></i> Edit Password</a>
                                <a href="{{ route('fe.alamat') }}" class="btn btn-outline-secondary d-block mt-4" style="text-align: start;"><i class="fas fa-map-marker-alt me-3"></i> Alamat</a>
                                <a href="{{ route('fe.riwayat') }}" class="btn btn-outline-secondary d-block mt-4" style="text-align: start;"><i class="far fa-calendar-alt me-3"></i> Pesanan Saya</a>
                                <a href="{{ route('fe.bantuan') }}" class="btn btn-outline-secondary d-block mt-4" style="text-align: start;"><i class="far fa-question-circle me-3"></i> Pusat Bantuan</a>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-outline-danger d-block mt-4" style="text-align: start;"><i class="fas fa-sign-out-alt me-3"></i> Keluar</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
