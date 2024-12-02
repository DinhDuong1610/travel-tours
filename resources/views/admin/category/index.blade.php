@extends('layouts.admin')

@section('content')

<div class="card card-default" style="min-height: calc(100vh - 100px);">
    <div class="card-header bg-dark text-white d-flex justify-content-between">
        <strong>Danh mục</strong>
        <a href="{{route('admin.category.create')}}" class="btn btn-light">Thêm danh mục</a>
    </div>
    <div class="card-body">
        @if ($categories->count()>0)
        <table class="table table-striped table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>Tên</th>
                    <th class="text-center">Số điểm đến</th>
                    <th colspan="2" class="text-center">Thao tác</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td class="text-center">{{ $category->Destinations()->count() }}</td>
                    <td class="text-center">
                        <a href="{{route('admin.category.edit', $category->id)}}" class="btn btn-info btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                    </td>
                    <td class="text-center">
                        <button class="btn btn-danger btn-sm" onclick="handleDelete({{$category->id}})"><i class="fa-solid fa-trash"></i></button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination -->
        <div class="d-flex justify-content-center">
            {{ $categories->links('pagination::bootstrap-4') }}
        </div>

        <!-- Modal Delete Category -->
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel">
            <div class="modal-dialog">
                <form action="" method="POST" id="deleteCategoryForm">
                    @csrf
                    @method('DELETE')
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel">Delete Category</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p class="text-center font-weight-bold">
                                Are you sure you want to delete this Category?
                            </p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No, go back</button>
                            <button type="submit" class="btn btn-danger">Yes, Delete</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        @else
        <h3 class="text-center">Chưa có danh mục nào</h3>
        @endif
    </div>
</div>

@endsection


@section('scripts')
<script>
   function handleDelete(id){
      var form = document.getElementById('deleteCategoryForm');
      form.action = '/categories/' + id;
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
    background-color: #007bff;
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
    background-color: #343a40; /* Tương đương với bg-dark của Bootstrap */
}

/* Màu chữ sáng cho các liên kết */
.pagination .page-link {
    color: #3b3b3b; /* Màu chữ sáng cho các trang */
}

/* Thay đổi màu khi hover */
.pagination .page-item:hover .page-link {
    background-color: #495057; /* Màu xám nhạt hơn khi hover */
    color: #ffffff; /* Màu chữ vẫn sáng khi hover */
}

/* Thay đổi màu của trang đang được chọn */
.pagination .page-item.active .page-link {
    background-color: #343a40; /* Màu xanh lam cho trang hiện tại */
    color: #ffffff; /* Màu chữ sáng */
    border: none;
}
</style>
@endsection