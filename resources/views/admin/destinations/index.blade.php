@extends('layouts.admin')

@section('content')

<div class="card card-default" style="min-height: calc(100vh - 100px);">
    <div class="card-header bg-dark text-white d-flex justify-content-between">
        <strong>Điểm đến</strong>
        <a href="{{ route('admin.destinations.create') }}" class="btn btn-light">Thêm điểm đến</a>
    </div>

    <div class="card-body">
        @if ($destinations->count() > 0)
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
                        <img src="{{ asset('/storage/' . $destination->image) }}" style="width: 150px; height: 80px;"
                            class="img-thumbnail" alt="responsive image">
                    </td>
                    <td>
                        {{ $destination->title }}
                    </td>
                    <td>
                        <a href="#" class="text-primary font-weight-bold">{{ $destination->category->name }}</a>
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
                        <a href="{{ route('admin.destinations.edit', $destination->id) }}" class="btn btn-info btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                    </td>
                    @endif

                    <td class="text-center">
                        <!-- Trigger the modal with a button -->
                        <button class="btn btn-danger btn-sm" onclick="handleDelete({{ $destination->id }})"><i class="fa-solid fa-trash"></i></button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination -->
        <div class="d-flex justify-content-center">
            {{ $destinations->links('pagination::bootstrap-4') }}
        </div>

        <!-- Modal Delete Destination -->
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel">
            <div class="modal-dialog">
                <form action="{{ route('admin.destinations.destroy', $destination->id) }}" method="POST" id="deleteDestinationForm">
                    @csrf
                    @method('DELETE')
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel">Xóa điểm đến</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p class="text-center font-weight-bold">
                                Bạn có chắc muốn xóa điểm đến này không?
                            </p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Không</button>
                            <button type="submit" class="btn btn-danger">Có</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
        @else
        <h3 class="text-center">Chưa có điểm đến nào</h3>
        @endif
    </div>
</div>

@endsection

@section('scripts')
<script>
    function handleDelete(id) {
        var form = document.getElementById('deleteDestinationForm');
        // Update the form action to the correct destination id
        // form.action = '/admin/destinations/' + id;
        // Show the modal
        $('#deleteModal').modal('show');
    }
</script>
@endsection

@section('css')
<style>
   /* Thêm một số style cho modal */
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
        background-color: #343a40; /* Tương đương với bg-dark của Bootstrap */
    }

    .pagination .page-link {
        color: #3b3b3b;
    }

    .pagination .page-item:hover .page-link {
        background-color: #495057;
        color: #ffffff;
    }

    .pagination .page-item.active .page-link {
        background-color: #343a40;
        color: #ffffff;
        border: none;
    }
</style>
@endsection
