@extends('layouts.adm.base')
@section('title', trans('menu.package.title'))

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

{!! Form::open(array('route' => 'admin.packages.store','method'=>'POST')) !!}
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
            {!! Form::text('name', null, array('required','placeholder' => 'Name','class' => 'form-control')) !!}
        </div>
        <div class="form-group">
            <strong>Category:</strong>
            <select name="category_id" id="myselect" class="form-control">
                <option value="" selected disabled>Please Select Category!</option>
                @foreach ($categories as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
            {{-- {!! Form::text('name', null, array('required','placeholder' => 'Name','class' => 'form-control')) !!} --}}
            {{-- {!! Form::select(
                    'myselect',
                    array_merge(['' => 'Please Select'], $categories),
                    $myselectedcategories,
                    array(
                        'class' => 'form-control',
                        'id' => 'myselect'
                    ))
            !!} --}}
        </div>
        <div class="form-group">
            <strong>Price:</strong>
            {!! Form::number('price', null, array('required','min' => '0','placeholder' => 'Price','class' => 'form-control')) !!}
        </div>
        <div class="form-group">
            <strong>Qty:</strong>
            {!! Form::number('qty', null, array('required','min' => '0','placeholder' => 'Qty','class' => 'form-control')) !!}
        </div>
        <div class="form-group">
            <strong>Type:</strong>
            {!! Form::text('type', null, array('required','placeholder' => 'Type','class' => 'form-control')) !!}
        </div>
        <div class="form-group">
            <strong>Detail:</strong>
            {!! Form::text('body', null, array('required','placeholder' => 'Detail','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
{!! Form::close() !!}

@endsection
