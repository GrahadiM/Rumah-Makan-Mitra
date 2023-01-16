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
        <div class="card-body">
            <div class="form-group">
                <strong>Nama : </strong>
                {{ $dt->name }}
            </div>
            <div class="form-group">
                <strong>Slug : </strong>
                {{ $dt->slug }}
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
                <strong>Qty : </strong>
                {{ $dt->qty }}
            </div>
            <div class="form-group">
                <strong>Type : </strong>
                {{ $dt->type }}
            </div>
            <div class="form-group">
                <strong>Detail : </strong>
                {{ $dt->body == null ? '-' : $dt->body }}
            </div>
        </div>
    </div>
@endsection
