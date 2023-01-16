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
                {{ $category->name }}
            </div>
            <div class="form-group">
                <strong>Slug : </strong>
                {{ $category->slug }}
            </div>
            <div class="form-group">
                <strong>Detail : </strong>
                {{ $category->detail == null ? '-' : $category->detail }}
            </div>
        </div>
    </div>
@endsection
