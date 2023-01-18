@extends('layouts.adm.base')
@section('title', trans('menu.category.title'))

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
        <div class="card-body row">
            <div class="col-lg-6">
                <div class="form-group">
                    <strong>Nama : </strong>
                    {{ $dt->name }}
                </div>
                <div class="form-group">
                    <strong>Category : </strong>
                    {{ $dt->category->name }}
                </div>
                <div class="form-group">
                    <strong>Price : </strong>
                    {{ __('Rp.').number_format($dt->price,2,',','.') }}
                </div>
                <div class="form-group">
                    <strong>Detail : </strong>
                    {{ $dt->body == null ? '-' : $dt->body }}
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
            <div class="col-lg-6">
                <strong>Thumbnail : </strong>
                <div class="form-group">
                    <a href="{{ asset('frontend/assets/img/product') . "/" . $dt->thumbnail }}" target="_blank" rel="noopener noreferrer">
                        <img src="{{ asset('frontend/assets/img/product') . "/" . $dt->thumbnail }}" class="img-fluid rounded-start w-25" alt="Thumbnail">
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
