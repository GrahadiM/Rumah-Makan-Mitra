<style>
    body {
        background-color: gray;
    }
    @media print {
        .noPrint{
            display:none;
        }
    }
    .body {
        margin: 0;
        padding-top: 70px;
        /* padding-bottom: 70px; */
        display: flex;
        justify-content: center;
        align-items: center;
    }
    #invoice {
        width: 500px;
        padding: 50px;
        background-color: #FFFFFF;
        border: 5px solid;
        border-style: dashed;

    }
</style>

<body>
    <button onclick="location.href='{{ route('fe.riwayat') }}';" class="noPrint">Riwayat</button>
    <button onclick="window.print();" class="noPrint">Print PDF</button>
    <div class="body">
        <div id="invoice" class="center">
            <div class="card">
                <div class="card-body mx-4">
                    <div class="container">
                        <p class="my-5 mx-5" style="font-size: 30px;">Terimakasih atas pesanan anda</p>
                        <div class="row">
                            <ul class="list-unstyled">
                                <li class="text-black" style="text-transform: uppercase;">{{ $transaksi->status }}</li>
                                <li class="text-black mt-1">Invoice #{{ $transaksi->kode_transaksi }}</li>
                                <li class="text-black mt-1">{{ $transaksi->created_at }}</li>
                            </ul>
                            <hr>
                            <div class="col-xl-10">
                                <p><b><u>Informasi Pribadi</u></b></p>
                            </div>
                            <div class="col-xl-2">
                                <p class="float-end">Nama Pemesan : {{ $transaksi->customer->fullname }}</p>
                                <p class="float-end">WhatsApp: {{ "+62".$transaksi->customer->phone }}</p>
                            </div>
                            <hr>
                            <div class="col-xl-10">
                                <p><b><u>Informasi Penerima</u></b></p>
                            </div>
                            <div class="col-xl-2">
                                <p class="float-end">Nama Tempat : {{ $transaksi->address->title }}</p>
                                <p class="float-end">Nama Penerima : {{ $transaksi->address->name }}</p>
                                <p class="float-end">WhatsApp: {{ "+62".$transaksi->address->wa }}</p>
                                <p class="float-end">Alamat : {{ $transaksi->address->address. ', ' .$transaksi->address->provinsi. ', ' .$transaksi->address->kabupaten. ', ' .$transaksi->address->kecamatan. ', ' .$transaksi->address->pos }}</p>
                            </div>
                            <hr>
                        </div>
                        <div class="row">
                            <div class="col-xl-10">
                                <p><b><u>Informasi Catatan</u></b></p>
                            </div>
                            <div class="col-xl-2">
                                <p class="float-end">Type Order : {{ Str::upper($transaksi->type) }}</p>
                                <p class="float-end">Tanggal Pengantaran : {{ $transaksi->tgl_pesanan == NULL ? $transaksi->created_at : $transaksi->tgl_pesanan }}</p>
                                <p class="float-end">Note : {{ $transaksi->note }}</p>
                            </div>
                        </div>
                        <hr style="border: 2px solid black;">
                        <div class="row text-black">
                            <div class="col-xl-12">
                                <p class="float-end fw-bold">Total : {{ __('Rp.').number_format($transaksi->total_harga,2,',','.') }}</p>
                            </div>
                            <hr style="border: 2px solid black;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
