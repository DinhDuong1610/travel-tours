@extends('layouts.admin')

@section('content')

<div class="card card-default" style="min-height: calc(100vh - 100px);">
    <div class="card-header bg-dark text-white d-flex justify-content-between">
        <strong>Đơn đặt tour</strong>
        <a href="#" class="btn btn-light">Thêm đơn đặt tour</a>
    </div>
    <div class="card-body">
        @if ($checkouts->count()>0)
        <table class="table table-striped table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>Thông tin khách hàng</th>
                    <th class="text-center">Số hành khách</th>
                    <th class="text-center">Ngày khởi hành</th>
                    <th class="text-center">Điểm đến</th>
                    <th class="text-center">Tổng tiền</th>
                    <th class="text-center">Trạng thái</th>
                    <th class="text-center">Cập nhật trạng thái</th>

                </tr>
            </thead>

            <tbody>
                @foreach ($checkouts as $checkout)
                <tr>
                    <td>{{ $checkout->name }} <br> {{ $checkout->phone }} <br> {{ $checkout->email }}</td>
                    <td class="text-center">{{ $checkout->number_of_passengers }}</td>
                    <td class="text-center">{{ \Carbon\Carbon::parse($checkout->departure_date)->format('d/m/Y') }}</td>
                    <td class="text-center">{{ $checkout->destination->title }}</td>
                    <td class="text-center">{{ number_format($checkout->number_of_passengers * $checkout->destination->pricing), 0, ',', '.' }} VND</td>
                    <td class="text-center">
                        @if ($checkout->status == 'pending')
                        <span class="badge badge-warning py-2 px-3">Chờ xác nhận</span>
                        @elseif ($checkout->status == 'approved')
                        <span class="badge badge-success py-2 px-3">Đã xác nhận</span>
                        @elseif ($checkout->status == 'declined')
                        <span class="badge badge-danger py-2 px-3">Hủy đơn</span>
                        @endif
                    </td>
                    <td class="text-center">
                      <form action="{{ route('admin.checkout.updateStatus', $checkout->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <select name="status" class="form-control form-control-sm" onchange="this.form.submit()">
                            <option value="pending" {{ $checkout->status == 'pending' ? 'selected' : '' }} class="status-pending">Chờ xác nhận</option>
                            <option value="approved" {{ $checkout->status == 'approved' ? 'selected' : '' }} class="status-approved">Đã xác nhận</option>
                            <option value="declined" {{ $checkout->status == 'declined' ? 'selected' : '' }} class="status-declined">Hủy đơn</option>
                        </select>
                    </form>
                  </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination -->
        <div class="d-flex justify-content-center">
            {{ $checkouts->links('pagination::bootstrap-4') }}
        </div>


        @else
        <h3 class="text-center">Chưa có đơn đặt tour nào</h3>
        @endif
    </div>
</div>

@endsection

@section('scripts')
<script>
    function handleDelete(id) {
        var form = document.getElementById('deleteCheckoutForm');
        form.action = '/admin/checkout/' + id;
        $('#deleteModal').modal('show');
    }
</script>
@endsection

@section('css')
<style>
    /* Cải thiện giao diện card */
    .card {
        border-radius: 0.375rem;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .card-header {
        background-color: #007bff;
        color: white;
        font-weight: 600;
        font-size: 1.25rem;
        border-radius: 0.375rem 0.375rem 0 0;
    }

    /* Cải thiện bảng */
    .table {
        border-collapse: collapse;
        width: 100%;
    }

    .table th, .table td {
        text-align: left;
        padding: 15px;
        vertical-align: middle;
    }

    .table-striped tbody tr:nth-of-type(odd) {
        background-color: #f9f9f9;
    }

    .table-bordered {
        border: 1px solid #dee2e6;
    }

    .table-hover tbody tr:hover {
        background-color: #f1f1f1;
    }

    .table th {
        background-color: #343a40;
        color: white;
    }

    /* Button */
    .btn-lg {
        font-size: 1.2rem;
        padding: 0.75rem 1.5rem;
    }

    .btn-info {
        color: #ffffff;
        background-color: #17a2b8;
        border-color: #17a2b8;
    }

    .btn-info:hover {
        background-color: #138496;
        border-color: #117a8b;
    }

    .btn-danger {
        background-color: #dc3545;
        border-color: #dc3545;
    }

    .btn-danger:hover {
        background-color: #c82333;
        border-color: #bd2130;
    }

    .btn-sm {
        font-size: 0.875rem;
        padding: 0.25rem 0.5rem;
    }

    /* Modal */
    .modal-content {
        border-radius: 0.375rem;
    }

    .modal-header {
        background-color: #343A40;
        color: white;
        font-weight: 600;
    }

    .modal-footer {
        background-color: #f8f9fa;
    }

    .text-center {
        text-align: center;
    }

    .font-weight-bold {
        font-weight: bold;
    }

    /* Thêm chút padding cho các thành phần chính */
    .card-body {
        padding: 20px;
    }

    /* Hover effects for rows */
    .table tbody tr:hover {
        background-color: #f1f1f1;
        cursor: pointer;
    }

    /* Cải thiện ảnh */
    .img-thumbnail {
        border-radius: 0.375rem;
    }

    /* Alert style */
    .alert {
        border-radius: 0.375rem;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .pagination {
        background-color: #343a40;
    }

    /* Màu chữ sáng cho các liên kết */
    .pagination .page-link {
        color: #3b3b3b;
    }

    /* Thay đổi màu khi hover */
    .pagination .page-item:hover .page-link {
        background-color: #495057;
        color: #ffffff;
    }

    /* Thay đổi màu của trang đang được chọn */
    .pagination .page-item.active .page-link {
        background-color: #343a40;
        color: #ffffff;
        border: none;
    }

</style>
@endsection
