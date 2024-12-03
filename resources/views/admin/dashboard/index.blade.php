@extends('layouts.admin')

@section('content')
    <div class="card card-default" style="min-height: calc(100vh - 100px);">
        <div class="card-header bg-dark text-white d-flex justify-content-between">
            <strong>Quản lý tài khoản</strong>
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
                            <h3>20</h3>
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
                            <h3>300</h3>
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
                            <h3>500</h3>
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
                            <h3>155</h3>
                            <p>Đơn đặt tour</p>
                        </div>
                        <div class="icon">
                            <i class="nav-icon fas fa-money-bill-alt"></i>
                        </div>
                        <a href="#" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
      
    </script>
@endsection
