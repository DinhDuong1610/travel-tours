@extends('layouts.app')

@section('content')

<div class="card card-default" style="min-height: calc(100vh - 100px);">
    <div class="card-header bg-dark text-white d-flex justify-content-between">
        <strong>Blog</strong>
        <a href="{{route('admin.blog.create')}}" class="btn btn-light">Add Blog</a>
    </div>
    <div class="card-body">
        @if ($blogs->count()>0)
        <table class="table table-striped table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th colspan="2" class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($blogs as $blog)
                <tr>
                    <td class="text-center">
                        <img src="{{asset('/storage/' . $blog->image)}}" width="150px" height="70px"
                            class="img-thumbnail" alt="responsive image">
                    </td>
                    <td>{{ $blog->title }}</td>
                    <td><a href="#" class="text-primary font-weight-bold">{{ $blog->category->name }}</a></td>

                    @if ($blog->trashed())
                    <td class="text-center">
                        <form action="#" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-info btn-sm">Restore</button>
                        </form>
                    </td>
                    @else
                    <td class="text-center">
                        <a href="#" class="btn btn-info btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                    </td>
                    @endif

                    <td class="text-center">
                        <form action="#" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                                {{-- {{ $blog->trashed() ? 'Delete' : 'Trash' }} --}}
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <h3 class="text-center">No Blogs Yet</h3>
        @endif
    </div>
</div>

@endsection


@section('scripts')
<script>
    function handleDelete(id){
        var form = document.getElementById('deleteBlogForm');
        form.action = '/blogs/' + id;
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