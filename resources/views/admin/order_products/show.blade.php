@extends('layouts.adm.base')
@section('title', trans('menu.order_products.title'))

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
                <strong>Category & Package : </strong>
                {{ $dt->package->category->name.' - '.$dt->package->name }}
            </div>
            <div class="form-group">
                <strong>Price : </strong>
                {{ __('Rp.').number_format($dt->package->price,2,',','.').'/'.$dt->package->qty.$dt->package->type }}
            </div>
            <div class="form-group">
                <strong>Cost : </strong>
                {{ $dt->cost == NULL ? 'Data Belum Diinput' : __('Rp.').number_format($dt->cost,2,',','.') }}
            </div>
            <div class="form-group">
                <strong>Order By : </strong>
                {{ $dt->order_by == NULL ? 'Data Belum Diinput' : $dt->order_by }}
            </div>
            <div class="form-group">
                <strong>Status : </strong>
                {{ $dt->status }}
            </div>
            <div class="form-group">
                <strong>Tgl Penerimaan : </strong>
                {{ $dt->tgl_penerimaan == NULL ? 'Data Belum Diinput' : $dt->tgl_penerimaan }}
            </div>
            <div class="form-group">
                <strong>Tgl Pengambilan : </strong>
                {{ $dt->tgl_pengambilan == NULL ? 'Data Belum Diinput' : $dt->tgl_pengambilan }}
            </div>
        </div>
    </div>
@endsection
