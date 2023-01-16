
        <!-- Modal Hapus Alamat -->
        <div class="modal fade" id="hapusAlamat-{{ $item->id }}" tabindex="-1" aria-labelledby="hapusAlamat" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="hapusAlamat">Hapus Alamat</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Anda akan menghapus {{ $item->title }} <br> Anda tidak dapat mengembalikan data alamat yang sudah dihapus!</p>
                    </div>
                    <div class="modal-footer">
                        <form action="{{ route('fe.delete_alamat') }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <input type="text" name="id" value="{{ $item->id }}">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">BATAL</button>
                            <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">HAPUS</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
