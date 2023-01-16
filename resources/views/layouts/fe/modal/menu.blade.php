
        <!-- Modal Keranjang -->
        <div class="modal fade" id="cart" tabindex="-1" aria-labelledby="cart" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="cart">Menu</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row justify-content-center">
                            <!-- Portfolio Item -->
                            <div class="col-6">
                                <a href="{{ route('fe.cart_instan') }}" class="text-decoration-none">
                                    <img class="img-fluid" src="{{ asset('frontend') }}/assets/img/menu/instant-logo.png" alt="..." />
                                </a>
                            </div>
                            <!-- Portfolio Item -->
                            <div class="col-6">
                                <a href="{{ route('fe.cart_catering') }}" class="text-decoration-none">
                                    <img class="img-fluid" src="{{ asset('frontend') }}/assets/img/menu/catering-logo.png" alt="..." />
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">TUTUP</button>
                    </div>
                </div>
            </div>
        </div>
