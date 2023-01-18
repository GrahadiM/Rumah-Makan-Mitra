@extends('layouts.adm.base')
@section('title', trans('menu.transaction.title'))

@push('style')

    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('admin') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('admin') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('admin') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

@endpush

@section('content')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ trans('menu.transaction.title').' '.$title }}</h3>
            {{-- <div class="card-tools">
                <a href="{{ route('admin.transactions.create') }}" class="btn btn-success btn-sm">{{ trans('global.add')." ".trans('menu.transaction.title') }}</a>
            </div> --}}
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Code</th>
                        <th>Customer</th>
                        <th>Total Harga</th>
                        <th>Alamat</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $key => $dt)
                    <tr>
                        <td>{{ $dt->kode_transaksi }}</td>
                        <td>{{ $dt->customer->fullname }}</td>
                        <td>{{ __('Rp.').number_format($dt->total_harga,2,',','.') }}</td>
                        <td>{{ strtoupper($dt->address->title) }}</td>
                        <td>
                            @if ($dt->status == 'PENDING')
                                <button disabled href="{{ route('admin.transactions.status', $dt->id) }}" class="btn btn-secondary">{{ $dt->status }}</button>
                            @elseif ($dt->status == 'PROSES')
                                <button disabled href="{{ route('admin.transactions.status', $dt->id) }}" class="btn btn-warning">{{ $dt->status }}</button>
                            @elseif ($dt->status == 'SUCCESS')
                                <button disabled href="{{ route('admin.transactions.status', $dt->id) }}" class="btn btn-succes">{{ $dt->status }}</button>
                            @else
                                <button disabled href="{{ route('admin.transactions.status', $dt->id) }}" class="btn btn-danger">{{ $dt->status }}</button>
                            @endif
                        </td>
                        <td>{{ $dt->updated_at ? $dt->updated_at : $dt->created_at }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection

@push('scripts')

    <!-- DataTables  & Plugins -->
    <script src="{{ asset('admin') }}/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('admin') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('admin') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('admin') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="{{ asset('admin') }}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('admin') }}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="{{ asset('admin') }}/plugins/jszip/jszip.min.js"></script>
    <script src="{{ asset('admin') }}/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="{{ asset('admin') }}/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="{{ asset('admin') }}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ asset('admin') }}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="{{ asset('admin') }}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- Page specific script -->
    <script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["csv", "excel", "pdf", "print", "colvis"],
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
    </script>

@endpush
