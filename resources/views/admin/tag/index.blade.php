@extends('layouts.app')

@section('content')

<div class="card card-default" style="min-height: calc(100vh - 100px);">
    <div class="card-header bg-dark text-white d-flex justify-content-between">
        <strong>Nhãn</strong>
        <a href="{{route('admin.tag.create')}}" class="btn btn-light">Thêm nhãn</a>
    </div>
    <div class="card-body">
        @if ($tags->count()>0)
        <table class="table table-striped table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>Tên</th>
                    <th class="text-center">Số địa điểm</th>
                    <th colspan="2" class="text-center">Thao tác</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($tags as $tag)
                <tr>
                    <td>{{ $tag->name }}</td>
                    <td class="text-center">{{ $tag->Destinations()->count() }}</td>
                    <td class="text-center">
                        <a href="#" class="btn btn-info btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                    </td>
                    <td class="text-center">
                        <button class="btn btn-danger btn-sm" onclick="handleDelete({{$tag->id}})"><i class="fa-solid fa-trash"></i></button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Modal Delete Tag -->
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel">
            <div class="modal-dialog">
                <form action="" method="POST" id="deleteTagForm">
                    @csrf
                    @method('DELETE')
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel">Delete Tag</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p class="text-center font-weight-bold">
                                Are you sure you want to delete this Tag?
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
        <h3 class="text-center">Chưa có nhãn nào</h3>
        @endif
    </div>
</div>

@endsection


@section('scripts')
<script>
    function handleDelete(id){
        var form = document.getElementById('deleteTagForm');
        form.action = '/tags/' + id;
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
</style>
@endsection