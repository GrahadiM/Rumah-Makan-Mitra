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
                <strong>Code Order : </strong>
                {{ $dt->code_order }}
            </div>
            <div class="form-group">
                <strong>Customer : </strong>
                {{ $dt->customer->name }}
            </div>
            <div class="form-group">
                <strong>Phone : </strong>
                {{ $dt->phone }}
            </div>
            <div class="form-group">
                <strong>Address : </strong>
                {{ $dt->address }}
            </div>
            <div class="form-group">
                <strong>Total Harga : </strong>
                {{ __('Rp.').number_format($dt->total,2,',','.') }}
            </div>
            <div class="form-group">
                <strong>Kurir : </strong>
                {{ $dt->order_by == NULL ? 'Data Tidak Ditemukan!' : $dt->order_by }}
            </div>
            <div class="form-group">
                <strong>Status : </strong>
                {{ $dt->status }}
            </div>
            <div class="form-group">
                <strong>Tgl Penjemputan : </strong>
                {{ $dt->tgl_penjemputan == NULL ? 'Data Tidak Ditemukan!' : $dt->tgl_penjemputan }}
            </div>
            <div class="form-group">
                <strong>Tgl Pengantaran : </strong>
                {{ $dt->tgl_pengantaran == NULL ? 'Data Tidak Ditemukan!' : $dt->tgl_pengantaran }}
            </div>
        </div>
    </div>
@endsection
