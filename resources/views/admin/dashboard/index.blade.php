@extends('layouts.admin')

@section('content')
    <div class="card card-default" style="min-height: calc(100vh - 100px);">
        <div class="card-header bg-dark text-white d-flex justify-content-between">
            <strong>Tổng quan</strong>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="row mt-3">
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $data['users'] }}</h3>
                            <p>Người dùng</p>
                        </div>
                        <div class="icon">
                            <i class="nav-icon fas fa-user"></i>
                        </div>
                        <a href="{{ route('admin.user.index') }}" class="small-box-footer">Xem thêm <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $data['destinations'] }}</h3>
                            <p>Tour</p>
                        </div>
                        <div class="icon">
                            <i class="nav-icon fas fa-flag"></i>
                        </div>
                        <a href="{{ route('admin.destinations.index') }}" class="small-box-footer">Xem thêm <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $data['blogs'] }}</h3>
                            <p>Bài viết</p>
                        </div>
                        <div class="icon">
                            <i class="right fas fa-users"></i>
                        </div>
                        <a href="{{ route('admin.blog.index') }}" class="small-box-footer">Xem thêm <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ $data['checkouts'] }}</h3>
                            <p>Đơn đặt tour</p>
                        </div>
                        <div class="icon">
                            <i class="nav-icon fas fa-money-bill-alt"></i>
                        </div>
                        <a href="{{ route('admin.checkout.index') }}" class="small-box-footer">Xem thêm <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>

            <div class="chart">
                <canvas id="barChart"
                    style="min-height: 350px; height: 350px; max-height: 250px; max-width: 100%;"></canvas>
            </div>

            @if ($checkouts_list->count() > 0)
                <table class="table table-striped table-bordered table-hover mt-5">
                    <thead class="thead-dark">
                        <tr>
                            <th>Thông tin khách hàng</th>
                            <th class="text-center">Số hành khách</th>
                            <th class="text-center">Ngày khởi hành</th>
                            <th class="text-center">Điểm đến</th>
                            <th class="text-center">Tổng tiền</th>
                            <th colspan="2" class="text-center">Trạng thái</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($checkouts_list as $checkout)
                            <tr>
                                <td>{{ $checkout->name }} <br> {{ $checkout->phone }} <br> {{ $checkout->email }}</td>
                                <td class="text-center">{{ $checkout->number_of_passengers }}</td>
                                <td class="text-center">
                                    {{ \Carbon\Carbon::parse($checkout->departure_date)->format('d/m/Y') }}</td>
                                <td class="text-center">{{ $checkout->destination->title }}</td>
                                <td class="text-center">
                                    {{ number_format($checkout->number_of_passengers * $checkout->destination->pricing), 0, ',', '.' }}
                                    VND</td>
                                <td class="text-center">
                                    <form action="{{ route('admin.checkout.updateStatus', $checkout->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('PUT')
                                        <select name="status" class="form-control form-control-sm"
                                            onchange="this.form.submit()">
                                            <option value="pending" {{ $checkout->status == 'pending' ? 'selected' : '' }}
                                                class="status-pending">Chờ xác nhận</option>
                                            <option value="approved"
                                                {{ $checkout->status == 'approved' ? 'selected' : '' }}
                                                class="status-approved">Đã xác nhận</option>
                                            <option value="declined"
                                                {{ $checkout->status == 'declined' ? 'selected' : '' }}
                                                class="status-declined">Hủy đơn</option>
                                        </select>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection

@section('scripts')
    <!-- jQuery -->
    {{-- <script src="plugins/jquery/jquery.min.js"></script> --}}
    <script src="{{ asset('admin-lte/plugins/jquery/jquery.min.js') }}"></script>

    <!-- Bootstrap 4 -->
    {{-- <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script> --}}
    <script src="{{ asset('admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    {{-- <script src="dist/js/adminlte.min.js"></script> --}}
    <script src="{{ asset('admin-lte/dist/js/adminlte.min.js') }}"></script>

    <script src="{{ asset('admin-lte/plugins/chart.js/Chart.min.js') }}"></script>
    <script>
        $(function() {
            var monthlyCheckoutData = @json($data['monthlyCheckoutData']);

            var areaChartData = {
                labels: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8',
                    'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'
                ],
                datasets: [{
                        label: 'Số lượng đơn đặt tour',
                        backgroundColor: '#28A745',
                        borderColor: '#28A745',
                        pointRadius: false,
                        pointColor: '#28A745',
                        pointStrokeColor: '#28A745',
                        pointHighlightFill: '#fff',
                        pointHighlightStroke: '#28A745',
                        // data: campaignStatistics.map(stat => stat.count)
                        data: Object.values(monthlyCheckoutData)
                    },

                ]
            }


            //-------------
            //- BAR CHART -
            //-------------
            var barChartCanvas = $('#barChart').get(0).getContext('2d')
            var barChartData = $.extend(true, {}, areaChartData)
            var temp0 = areaChartData.datasets[0]
            barChartData.datasets[0] = temp0

            var barChartOptions = {
                responsive: true,
                maintainAspectRatio: false,
                datasetFill: false
            }

            new Chart(barChartCanvas, {
                type: 'bar',
                data: barChartData,
                options: barChartOptions
            })
        })
    </script>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('admin-lte/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('admin-lte/dist/css/adminlte.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('admin-lte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('admin-lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('admin-lte/plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('admin-lte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('admin-lte/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('admin-lte/plugins/summernote/summernote-bs4.min.css') }}">

    <link rel="stylesheet" href="{{ asset('admin-lte/css/style.css') }}">

    <style>

    </style>
@endsection
