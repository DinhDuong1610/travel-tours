@extends('layouts.admin')

@section('content')

<div class="card card-default" style="min-height: calc(100vh - 100px);">
    <div class="card-header bg-dark text-white d-flex justify-content-between">
        <strong>Điểm đến</strong>
        <a href="{{route('admin.destinations.create')}}" class="btn btn-light">Thêm điểm đến</a>
    </div>

    <div class="card-body">
        @if ($destinations->count()>0)
        <table class="table table-striped table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>Ảnh</th>
                    <th>Tiêu đề</th>
                    <th>Danh mục</th>
                    <th>Giá</th>
                    <th colspan="2" class="text-center">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($destinations as $destination)
                <tr>
                    <td class="text-center">
                        <img src="{{asset('/storage/' . $destination->image)}}" style="width: 150px; height: 80px;"
                            class="img-thumbnail" alt="responsive image">
                    </td>
                    <td>
                        {{ $destination->title }}
                    </td>
                    <td>
                        <a href="#" class="text-primary font-weight-bold">{{$destination->category->name}}</a>
                    </td>
                    <td class="text-center">
                        {{ number_format($destination->pricing, 0, ',', '.') }} VND
                    </td>

                    @if ($destination->trashed())
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
                                {{-- {{$destination->trashed()? 'Delete':'Trash'}} --}}
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination -->
        <div class="d-flex justify-content-center">
            {{ $destinations->links('pagination::bootstrap-4')}}
        </div>
        
        @else
        <h3 class="text-center">Chưa có điểm đến nào</h3>
        @endif
    </div>
</div>

@endsection

@section('css') 
    <style>

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
        background-color: #e9ecef;
    }

    .table th {
        background-color: #343a40;
        color: white;
    }

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

    .table tbody tr:hover {
        background-color: #f1f1f1;
        cursor: pointer;
    }

    .text-center {
        text-align: center;
    }

    .img-thumbnail {
        border-radius: 0.375rem;
    }

    .card-body {
        padding: 20px;
    }

    .alert {
        border-radius: 0.375rem;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    /* Màu nền tối cho pagination */
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