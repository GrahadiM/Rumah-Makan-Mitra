
        <!-- Modal Tambah Alamat -->
        <div class="modal fade" id="tambahAlamat" tabindex="-1" aria-labelledby="Jam" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                <form class="modal-content" action="{{ route('fe.post_alamat') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="Jam">Tambah Alamat</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="title" class="form-label">Judul Alamat</label>
                            <input name="title" required type="text" class="form-control" id="title" placeholder="Contoh: Rumah, Kost, Kontrakan">
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Lengkap</label>
                            <input name="name" required type="text" class="form-control" id="name" placeholder="Nama Lengkap Anda">
                        </div>
                        <div class="mb-3">
                            <label for="wa" class="form-label">No WhatsApp</label>
                            <div class="input-group">
                                <span class="input-group-text">+62</span>
                                <input name="wa" required type="number" class="form-control" id="wa" min="1" placeholder="85767113554">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">No Telpon</label>
                            <div class="input-group">
                                <span class="input-group-text">+62</span>
                                <input name="phone" required type="number" class="form-control" id="phone" min="1" placeholder="85767113554">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Alamat</label>
                            <textarea name="address" class="form-control" id="address" rows="10" placeholder="Detail nama jalan"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="provinsi" class="form-label">Provinsi</label>
                            <select name="provinsi" class="form-select" id="provinsi" aria-label="Default select example">
                                <option class="text-uppercase" value="DKI Jakarta" selected>DKI JAKARTA</option>
                                <option class="text-uppercase" value="BANTEN">BANTEN</option>
                                <option class="text-uppercase" value="JAWA TIMUR">JAWA TIMUR</option>
                                {{-- @foreach ($provinces as $provinsi)
                                    <option class="text-uppercase" value="1">{{ $provinsi->name }}</option>
                                @endforeach --}}
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="city" class="form-label">Kabupaten / Kota</label>
                            <select name="kabupaten" class="form-select" id="city" aria-label="Default select example">
                                <option class="text-uppercase" value="Jakarta Timur" selected>KOTA JAKARTA TIMUR</option>
                                <option class="text-uppercase" value="Jakarta Selatan">KOTA JAKARTA SELATAN</option>
                                <option class="text-uppercase" value="Jakarta Pusat">KOTA JAKARTA PUSAT</option>
                                <option class="text-uppercase" value="Jakarta Barat">KOTA JAKARTA BARAT</option>
                                <option class="text-uppercase" value="Jakarta Utara">KOTA JAKARTA UTARA</option>
                                <option class="text-uppercase" value="Cilegon">KOTA CILEGON</option>
                                <option class="text-uppercase" value="Tangerang">KOTA TANGERANG</option>
                                <option class="text-uppercase" value="Tangerang Selatan">KOTA TANGERANG SELATAN</option>
                                <option class="text-uppercase" value="Kediri">KOTA KEDIRI</option>
                                <option class="text-uppercase" value="Malang">KOTA MALANG</option>
                                {{-- @foreach ($regencies as $kabupaten)
                                    <option class="text-uppercase" value="1">{{ $kabupaten->name }}</option>
                                @endforeach --}}
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="kecamatan" class="form-label">Kecamatan</label>
                            <select name="kecamatan" class="form-select" id="kecamatan" aria-label="Default select example">
                                <option class="text-uppercase" value="Pulo Gadung" selected>PULO GADUNG</option>
                                <option class="text-uppercase" value="Pisangan Timur">PISANGAN TIMUR</option>
                                <option class="text-uppercase" value="Rawamangun">RAWAMANGUN</option>
                                <option class="text-uppercase" value="Kayu Putih">KAYU PUTIH</option>
                                <option class="text-uppercase" value="Jatinegara Kaum">JATINEGARA KAUM</option>
                                <option class="text-uppercase" value="Kandangan">Kandangan</option>
                                <option class="text-uppercase" value="Gampengrejo">Gampengrejo</option>
                                <option class="text-uppercase" value="Kandat">Kandat</option>
                                <option class="text-uppercase" value="Mojo">Mojo</option>
                                <option class="text-uppercase" value="Ngadiluwih">Ngadiluwih</option>
                                <option class="text-uppercase" value="Pare">Pare</option>
                                <option class="text-uppercase" value="Batuceper">Batuceper</option>
                                <option class="text-uppercase" value="Ciledug">Ciledug</option>
                                <option class="text-uppercase" value="Cipondoh">Cipondoh</option>
                                <option class="text-uppercase" value="Karang Tengah">Karangtengah</option>
                                <option class="text-uppercase" value="Karawaci">Karawaci</option>
                                <option class="text-uppercase" value="Curug">Curug</option>
                                {{-- @foreach ($districts as $kecamatan)
                                    <option class="text-uppercase" value="1">{{ $kecamatan->name }}</option>
                                @endforeach --}}
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="code_pos" class="form-label">Kode Pos</label>
                            <input name="pos" required type="number" class="form-control" id="code_pos" min="1" placeholder="13220">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">BATAL</button>
                        <button type="submit" class="btn btn-primary">SIMPAN</button>
                    </div>
                </form>
            </div>
        </div>
