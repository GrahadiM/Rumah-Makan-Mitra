{{-- Extends layout --}}
@extends('layouts.adm.base')

{{-- Styles --}}
@push('style')

    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('admin') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('admin') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('admin') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

@endpush

{{-- Content --}}
@section('content')
    <h3 class="mb-3">{{ $title }}</h3>
    <div class="row">
        <div class="col-lg-6 col-12">
            <div class="row">
                <div class="col-lg-6 col-6">
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
                <div class="col-lg-6 col-6">
                    <!-- small card -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $transaction }}</h3>
                            <p>Data Transaction</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                        <a href="{{ route('admin.riwayat.index') }}" class="small-box-footer">
                            Tampilkan Data <i class="fas fa-arrow-circle-right ml-1"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 col-6">
                    <!-- small card -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ __('Rp.') . number_format($money, 2, ',', '.') }}</h3>
                            <p>Data Income</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-dollar-sign"></i>
                        </div>
                        <a href="{{ route('admin.riwayat.index') }}" class="small-box-footer">
                            Tampilkan Data <i class="fas fa-arrow-circle-right ml-1"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-12">
            <div class="card card-dark">
                <div class="card-header">
                    <h3 class="card-title">
                        {{-- Chart --}}
                    </h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        {{-- <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i> --}}
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chartjs-size-monitor">
                        <div class="chartjs-size-monitor-expand">
                            <div class=""></div>
                        </div>
                        <div class="chartjs-size-monitor-shrink">
                            <div class=""></div>
                        </div>
                    </div>
                    {{-- <canvas id="donutChart"
                        style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 532px;"
                        width="1064" height="500" class="chartjs-render-monitor"></canvas> --}}
                    <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
            </div>
        </div>
        {{-- <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ __('Menu Terlaris') }}</h3>
                    <div class="card-tools">
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Nama | Kategori | Harga</th>
                                <th>Thumbnail</th>
                                <th>Total Terjual</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $key => $product)
                            <tr>
                                <td>{{ $product->name." | ".$product->category->name." | ".__('Rp.').number_format($product->price,2,',','.') }}</td>
                                <td>
                                    <a href="{{ asset('frontend/assets/img/product') . "/" . $product->thumbnail }}" target="_blank" rel="noopener noreferrer">
                                        <img src="{{ asset('frontend/assets/img/product') . "/" . $product->thumbnail }}" class="img-fluid rounded-start w-25" alt="Thumbnail">
                                    </a>
                                </td>
                                        <td>{{ $total }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div> --}}
    </div>
@endsection

{{-- Script --}}
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
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
            "buttons": ["excel", "pdf", "print", "colvis"],
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
    <script src="{{ asset('admin') }}/plugins/chart.js/Chart.min.js"></script>
    <script>
        $(function() {
            /* ChartJS
             * -------
             * Here we will create a few charts using ChartJS
             */

            //-------------
            //- DONUT CHART -
            //-------------
            // Get context with jQuery - using jQuery's .get() method.
            // var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
            // var donutData = {
            //     labels: [
            //         'SUCCESS',
            //         'PENDING',
            //         'PROSES',
            //         'FAIL',
            //     ],
            //     datasets: [{
            //         data: [{{ $success }}, {{ $pending }}, {{ $proses }}, {{ $fail }}],
            //         backgroundColor: ['#00a65a', '#f39c12', '#d2d6de', '#f56954'],
            //     }]
            // }
            // var donutOptions = {
            //     maintainAspectRatio: false,
            //     responsive: true,
            // }
            // //Create pie or douhnut chart
            // // You can switch between pie and douhnut using the method below.
            // new Chart(donutChartCanvas, {
            //     type: 'doughnut',
            //     data: donutData,
            //     options: donutOptions
            // })

            //-------------
            //- PIE CHART -
            //-------------
            // Get context with jQuery - using jQuery's .get() method.
            var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
            var pieData = {
                labels: [
                    'BERHASIL',
                    'PENDING',
                    'PROSES',
                    'GAGAL',
                ],
                datasets: [{
                    data: [{{ $success }}, {{ $pending }}, {{ $proses }},
                        {{ $fail }}
                    ],
                    backgroundColor: ['#00a65a', '#f39c12', '#d2d6de', '#f56954'],
                }]
            }
            var pieOptions = {
                maintainAspectRatio: false,
                responsive: true,
                title: {
                    display: true,
                    text: 'DATA TRANSAKSI',
                    fontStyle: 'bold',
                    fontSize: 20
                },
                tooltips: {
                    callbacks: {
                        // this callback is used to create the tooltip label
                        label: function(tooltipItem, data) {
                            // get the data label and data value to display
                            // convert the data value to local string so it uses a comma seperated number
                            var dataLabel = data.labels[tooltipItem.index];
                            var value = ': ' + data.datasets[tooltipItem.datasetIndex].data[tooltipItem
                                .index].toLocaleString();

                            // make this isn't a multi-line label (e.g. [["label 1 - line 1, "line 2, ], [etc...]])
                            if (Chart.helpers.isArray(dataLabel)) {
                                // show value on first line of multiline label
                                // need to clone because we are changing the value
                                dataLabel = dataLabel.slice();
                                dataLabel[0] += value;
                            } else {
                                dataLabel += value;
                            }

                            // return the text to display on the tooltip
                            return dataLabel;
                        }
                    }
                }
            }
            //Create pie or douhnut chart
            // You can switch between pie and douhnut using the method below.
            new Chart(pieChartCanvas, {
                type: 'pie',
                data: pieData,
                options: pieOptions
            })
        })
    </script>

@endpush
