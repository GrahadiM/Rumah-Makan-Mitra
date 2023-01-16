@extends('layouts.adm.base')
@section('title', trans('menu.transaction.title'))

@push('style')
@endpush

@push('scripts')
@endpush

@section('content')
    {!! Form::model($dt, ['method' => 'PATCH', 'route' => ['admin.transactions.update', $dt->id]]) !!}
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Data</h3>
            <div class="card-tools">
                <a href="{{ url()->previous() }}" class="btn btn-danger btn-sm">Kembali</a>
            </div>
        </div>
        <div class="card-body">
            <div class="form-group">
                <div class="mb-2"><strong>Code Order : </strong></div>

                {!! Form::text('code_order', null, ['required', 'placeholder' => 'Code Order', 'class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                <div class="mb-2"><strong>Cost : </strong></div>
                {!! Form::number('cost', null, array('required', 'min' => '0','placeholder' => 'Cost','class' => 'form-control')) !!}
            </div>
            {{-- <div class="form-group">
                <div class="mb-2"><strong>Detail : </strong></div>
                {!! Form::text('body', null, array('required', 'placeholder' => 'Detail','class' => 'form-control')) !!}
            </div> --}}
            <div class="form-group">
                <strong>Status :</strong>
                <select name="status" id="myselect" class="form-control">
                    <option value="{{ $dt->status }}" selected>{{ $dt->status }}</option>
                    @if ($dt->status == 'Pending')
                        <option value="Proses">Proses</option>
                        <option value="Success">Success</option>
                    @elseif ($dt->status == 'Proses')
                        <option value="Success">Success</option>
                    @elseif ($dt->status == 'Success')
                        <option value="Proses">Proses</option>
                    @endif
                </select>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
    {!! Form::close() !!}

@endsection
