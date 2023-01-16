{{-- Extends layout --}}
@extends('layouts.adm.base')

{{-- Styles --}}
@push('style')

@endpush

{{-- Content --}}
@section('content')

        <h3 class="mb-3">{{ $title }}</h3>
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small card -->
                <div class="small-box bg-primary">
                <div class="inner">
                        <h3>{{ $user }}</h3>
                        <p>Data User</p>
                    </div>
                    <div class="icon">
                        <i class="far fa-address-card"></i>
                    </div>
                    <a href="{{ route('admin.users.index') }}" class="small-box-footer">
                        Tampilkan Data <i class="fas fa-arrow-circle-right ml-1"></i>
                    </a>
                </div>
            </div>
        </div>

@endsection

{{-- Script --}}
@push('app')

@endpush
