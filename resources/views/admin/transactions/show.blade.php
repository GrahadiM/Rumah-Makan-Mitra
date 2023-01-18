@extends('layouts.adm.base')
@section('title', trans('menu.transaction.title'))

@push('style')
@endpush

@push('scripts')
@endpush

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Detail</h3>
            <div class="card-tools">
                <a href="{{ url()->previous() }}" class="btn btn-danger btn-sm">Kembali</a>
            </div>
        </div>
        <div class="card-body">
            <div class="form-group">
                <strong>Code Transaction : </strong>
                {{ $dt->kode_transaksi }}
            </div>
            <div class="form-group">
                <strong>Customer : </strong>
                {{ $dt->customer->fullname }}
            </div>
            <div class="form-group">
                <strong>Phone : </strong>
                {{ '+62'.$dt->customer->phone }}
            </div>
            <div class="form-group">
                <strong>Address : </strong>
                {{ strtoupper($dt->address->title). ' - ' .$dt->address->address. ', ' .$dt->address->provinsi. ', ' .$dt->address->kabupaten. ', ' .$dt->address->kecamatan. ', ' .$dt->address->pos }}
            </div>
            <div class="form-group">
                <strong>Total Price : </strong>
                {{ __('Rp.').number_format($dt->total,2,',','.') }}
            </div>
            <div class="form-group">
                <strong>Order by : </strong>
                {{ $dt->type == NULL ? 'Data Tidak Ditemukan!' : strtoupper($dt->type) }}
            </div>
            <div class="form-group">
                <strong>Status : </strong>
                {{ $dt->status }}
            </div>
            <div class="form-group">
                <strong>Tanggal di Buat : </strong>
                {{ $dt->created_at }}
            </div>
            <div class="form-group">
                <strong>Tanggal di Ubah : </strong>
                {{ $dt->updated_at }}
            </div>
        </div>
    </div>
@endsection
