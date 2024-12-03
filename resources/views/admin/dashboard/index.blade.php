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
                            <h3>{{$data['users']}}</h3>
                            <p>Người dùng</p>
                        </div>
                        <div class="icon">
                            <i class="nav-icon fas fa-user"></i>
                        </div>
                        <a href="#" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{$data['destinations']}}</h3>
                            <p>Tour</p>
                        </div>
                        <div class="icon">
                            <i class="nav-icon fas fa-flag"></i>
                        </div>
                        <a href="#" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{$data['blogs']}}</h3>
                            <p>Bài viết</p>
                        </div>
                        <div class="icon">
                            <i class="right fas fa-users"></i>
                        </div>
                        <a href="#" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{$data['checkouts']}}</h3>
                            <p>Đơn đặt tour</p>
                        </div>
                        <div class="icon">
                            <i class="nav-icon fas fa-money-bill-alt"></i>
                        </div>
                        <a href="#" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>

            <div class="chart">
              <canvas id="barChart"
                  style="min-height: 350px; height: 350px; max-height: 250px; max-width: 100%;"></canvas>
            </div>

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
<link rel="stylesheet" href="{{ asset('admin-lte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
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