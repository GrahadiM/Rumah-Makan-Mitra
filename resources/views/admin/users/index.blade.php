@extends('layouts.adm.base')
@section('title', trans('menu.user.title'))

@push('style')

    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('admin') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('admin') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('admin') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

@endpush

@section('content')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ trans('menu.user.title') }}</h3>
            {{-- <div class="card-tools">
                <a href="{{ route('admin.users.create') }}" class="btn btn-success btn-sm">{{ trans('global.add')." ".trans('menu.user.title') }}</a>
            </div> --}}
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>{{ trans('menu.user.fields.no') }}</th>
                        <th>{{ trans('menu.user.fields.name') }}</th>
                        <th>{{ trans('menu.user.fields.email') }}</th>
                        <th>{{ trans('menu.user.fields.roles') }}</th>
                        <th>{{ trans('menu.user.fields.created_at') }}</th>
                        <th>{{ trans('global.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $key => $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->fullname }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if(!empty($user->getRoleNames()))
                              @foreach($user->getRoleNames() as $v)
                                 <label class="badge badge-success">{{ $v }}</label>
                              @endforeach
                            @endif
                        </td>
                        <td>{{ $user->updated_at ? $user->updated_at : $user->created_at }}</td>
                        <td class="text-center">
                            <form action="{{ route('admin.users.destroy', $user->id) }}" class="row" method="POST">
                                @method('DELETE')
                                @csrf
                                <div class="col-md-4">
                                    <a class="btn btn-info btn-sm" href="{{ route('admin.users.show', $user->id) }}">
                                        <i class="fas fa-search"></i>
                                    </a>
                                </div>
                                {{-- <div class="col-md-4">
                                    <a class="btn btn-primary btn-sm" href="{{ route('admin.users.edit', $user->id) }}">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                </div> --}}
                                <div class="col-md-4">
                                    <button class="btn btn-danger btn-sm" type="submit">
                                        <i class="fas fa-trash"></i></button>
                                </div>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>{{ trans('menu.user.fields.no') }}</th>
                        <th>{{ trans('menu.user.fields.name') }}</th>
                        <th>{{ trans('menu.user.fields.email') }}</th>
                        <th>{{ trans('menu.user.fields.roles') }}</th>
                        <th>{{ trans('menu.user.fields.created_at') }}</th>
                        <th>{{ trans('global.actions') }}</th>
                    </tr>
                </tfoot>
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
