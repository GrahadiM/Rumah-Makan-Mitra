@extends('layouts.adm.base')
@section('title', trans('menu.category.title'))

@push('style')
@endpush

@push('scripts')
@endpush

@section('content')

@if (count($errors) > 0)
  <div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
       @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
       @endforeach
    </ul>
  </div>
@endif

{!! Form::open(array('route' => 'admin.categories.store','method'=>'POST')) !!}
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Create New Data</h3>
        <div class="card-tools">
            <a href="{{ url()->previous() }}" class="btn btn-danger btn-sm">Kembali</a>
        </div>
    </div>
    <div class="card-body">
        <div class="form-group">
            <strong>Name:</strong>
            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
        </div>
        <div class="form-group">
            <strong>Detail:</strong>
            {!! Form::text('detail', null, array('placeholder' => 'Detail','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
{!! Form::close() !!}

@endsection
