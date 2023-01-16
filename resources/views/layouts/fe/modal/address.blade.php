
        <!-- Modal Alamat -->
        <div class="modal fade" id="alamat" tabindex="-1" aria-labelledby="alamat" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="alamat">Alamat Tersimpan</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @forelse ($address as $item)
                            <div class="row">
                                <div class="col-md-9 mt-2">
                                    <h5 class="card-title" style="color: #000;">{{ $item->title }}</h5>
                                    <p class="card-text" style="color: #000;">{{ $item->address. ', ' .$item->provinsi. ', ' .$item->kabupaten. ', ' .$item->kecamatan. ', ' .$item->pos }}</p>
                                </div>
                                <div class="col-md-3">
                                    <button onclick="event.preventDefault(); document.getElementById('update_address-{{ $item->id }}').submit();" class="btn btn-primary" style="margin-top:2.5rem!important;"><i class="fas fa-fw fa-pencil"></i> Pilih</button>
                                </div>
                            </div>
                            <form id="update_address-{{ $item->id }}" action="{{ route('fe.update_address', $item->id) }}" method="POST" class="d-none">
                                @method('PUT')
                                @csrf
                                <input type="hidden" name="type" value="{{ $adr->type }}">
                                <input type="hidden" name="address" value="{{ $item->id }}">
                            </form>
                        @empty
                            Maaf, Data Belum Tersedia!
                        @endforelse
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">TUTUP</button>
                    </div>
                </div>
            </div>
        </div>
