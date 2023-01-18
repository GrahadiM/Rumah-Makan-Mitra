@extends('layouts.adm.base')
@section('title', trans('menu.package.title'))

@push('style')

    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('admin') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('admin') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('admin') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

@endpush

@section('content')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ trans('menu.package.title') }}</h3>
            <div class="card-tools">
                <a href="{{ route('admin.products.create') }}" class="btn btn-success btn-sm">{{ trans('global.add')." ".trans('menu.package.title') }}</a>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Thumbnail</th>
                        <th>Detail</th>
                        <th>{{ trans('global.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $key => $dt)
                    <tr>
                        <td>{{ $dt->name }}</td>
                        <td>{{ $dt->category->name }}</td>
                        <td>{{ __('Rp.').number_format($dt->price,2,',','.') }}</td>
                        <td>
                            <a href="{{ asset('frontend/assets/img/product') . "/" . $dt->thumbnail }}" target="_blank" rel="noopener noreferrer">
                                <img src="{{ asset('frontend/assets/img/product') . "/" . $dt->thumbnail }}" class="img-fluid rounded-start w-25" alt="Thumbnail">
                            </a>
                        </td>
                        <td>{{ $dt->body == null ? '-' : $dt->body }}</td>
                        <td class="text-center">
                            <form action="{{ route('admin.products.destroy', $dt->id) }}" class="row" method="POST">
                                @method('DELETE')
                                @csrf
                                <div class="col-md-4">
                                    <a class="btn btn-info btn-sm" href="{{ route('admin.products.show', $dt->id) }}">
                                        <i class="fas fa-search"></i>
                                    </a>
                                </div>
                                <div class="col-md-4">
                                    <a class="btn btn-primary btn-sm" href="{{ route('admin.products.edit', $dt->id) }}">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                </div>
                                <div class="col-md-4">
                                    <button class="btn btn-danger btn-sm" type="submit">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </form>
                        </td>
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
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        "buttons": ["csv"]
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
