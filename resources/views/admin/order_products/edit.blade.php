@extends('layouts.adm.base')
@section('title', trans('menu.clothes.title'))

@push('style')
@endpush

@push('scripts')
@endpush

@section('content')

    {!! Form::open(['route' => 'admin.clothes.store', 'method' => 'POST']) !!}
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Create New Data</h3>
            <div class="card-tools">
                <a href="{{ url()->previous() }}" class="btn btn-danger btn-sm">Kembali</a>
            </div>
        </div>
        <div class="card-body">
            <input type="hidden" name="tr_id" id="tr" value="{{ $tr->id }}" required>
            <div class="form-group">
                <div class="mb-2"><strong>Name:</strong></div>
                {!! Form::text('name', null, ['required', 'placeholder' => 'Name', 'class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                <div class="mb-2"><strong>Qty:</strong></div>
                {!! Form::number('qty', null, ['required', 'min=1', 'placeholder' => 'Qty', 'class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                <div class="mb-2"><strong>Detail:</strong></div>
                {!! Form::text('detail', null, ['required', 'placeholder' => 'Detail', 'class' => 'form-control']) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
    {!! Form::close() !!}

@endsection
