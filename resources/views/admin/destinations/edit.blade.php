@extends('layouts.admin')

@section('content')

<div class="card card-default card-dark">
    <div class="card-header bg-dark text-white d-flex justify-content-between">
        <strong>Sửa điểm đến</strong>
    </div>

    <div class="card-body">
        @include('error')

        <form action="{{ route('admin.destinations.update', ['id' => $destination->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Title -->
            <div class="form-group">
                <label for="title">Tiêu đề</label>
                <input type="text" class="form-control" name="title" id="title" value="{{ isset($destination) ? $destination->title : '' }}" onkeyup="generateSlug()">
            </div>

            <!-- Slug -->
            <div class="form-group">
                <label for="slug">Slug</label>
                <input type="text" class="form-control" name="slug" id="slug" value="{{ isset($destination) ? $destination->slug : '' }}" readonly>
            </div>

            <!-- Description -->
            <div class="form-group">
                <label for="description">Mô tả</label>
                <textarea name="description" class="form-control" id="description" cols="5" rows="5">{{ isset($destination) ? $destination->description : '' }}</textarea>
            </div>

            <!-- Content (Trix Editor) -->
            <div class="form-group">
                <label for="content">Nội dung</label>
                <input id="content" type="hidden" name="content" value="{{ isset($destination) ? $destination->content : '' }}">
                <trix-editor input="content"></trix-editor>
            </div>

            <div class="form-group">
                <label for="pricing">Giá</label>
                <input type="number" min="0" step="1000" class="form-control" name="pricing" id="pricing" value="{{ isset($destination) ? $destination->pricing : '' }}">
            </div>

            <!-- Published At (Flatpickr) -->
            <div class="form-group">
                <label for="published_at">Ngày phát hành</label>
                <input type="text" class="form-control" name="published_at" id="published_at" value="{{ isset($destination) ? $destination->published_at : '' }}">
            </div>

            <!-- Image Preview (if editing) -->
            {{-- @if (isset($destination))
                <div class="form-group">
                    <img src="{{ asset($destination->image) }}" alt="Destination Image" class="img-fluid">
                </div>
            @endif --}}

            <!-- Image Upload -->
            <div class="form-group d-flex flex-column">
                <div class="d-flex justify-content-start">
                    <label for="image" class="mr-2">Ảnh</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="image" id="image" accept="image/*">
                        <label class="custom-file-label" for="image">Chọn ảnh</label>
                    </div>
                </div>
                <div class="mt-2 d-flex justify-content-center">
                    <img id="imagePreview" src="{{asset('/storage/' . $destination->image)}}" alt="Image Preview" class="img-fluid" style="display: {{ isset($destination) ? 'block' : 'none' }};">
                </div>
            </div>

            <!-- Category -->
            <div class="form-group">
                <label for="category">Danh mục</label>
                <select name="category" id="category" class="form-control">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @if (isset($destination) && $category->id === $destination->category_id) selected @endif>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Tags (Select2) -->
            @if ($tags->count() > 0)
                <div class="form-group">
                    <label for="tags">Nhãn</label>
                    <select name="tags[]" id="tags" class="form-control tags-selector" multiple>
                        @foreach ($tags as $tag)
                            <option value="{{ $tag->id }}" @if (isset($destination) && $destination->hasTag($tag->id)) selected @endif>
                                {{ $tag->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            @endif

            <!-- Submit Button -->
            <div class="form-group">
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-dark">
                        <b>Cập nhật điểm đến</b>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection


@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

<script>
    flatpickr('#published_at', {
        enableTime: true,
        dateFormat: "Y-m-d H:i",
    });

    $(document).ready(function() {
        $('.tags-selector').select2();
    });

    document.getElementById('image').addEventListener('change', function(event) {
    var file = event.target.files[0];
    var preview = document.getElementById('imagePreview');
    var reader = new FileReader();

    reader.onload = function() {
        preview.src = reader.result;
        preview.style.display = 'block'; // Hiển thị ảnh đã chọn
    }

    if (file) {
        reader.readAsDataURL(file); // Đọc ảnh đã chọn
    }
});

</script>

<script>
    // Function to generate slug from title
    function generateSlug() {
        let title = document.getElementById('title').value;
        let slug = title.toLowerCase()
                      .replace(/á|à|ả|ã|ạ|â|ấ|ầ|ẩ|ẫ|ậ/g, 'a')
                      .replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/g, 'e')
                      .replace(/í|ì|ỉ|ĩ|ị/g, 'i')
                      .replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ/g, 'o')
                      .replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/g, 'u')
                      .replace(/ý|ỳ|ỷ|ỹ|ỵ/g, 'y')
                      .replace(/đ/g, 'd')
                      .replace(/\s+/g, '-') 
                      .replace(/[^a-z0-9\-]/g, '') 
                      .replace(/-+/g, '-'); 

        document.getElementById('slug').value = slug;
    }
</script>
@endsection


@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<style>
    /* Cải thiện giao diện card */
    .card {
        border-radius: 0.375rem;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .card-header {
        background-color: #343A40;
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

    .select2-container--default .select2-selection--multiple {
        border: 1px solid #ced4da;
        border-radius: 0.375rem;
        padding: 0.5rem;
    }

    /* Tùy chỉnh giao diện nút chọn ảnh */
.custom-file-input {
    cursor: pointer;
    opacity: 0;
    position: absolute;
    z-index: -1;
}

.custom-file-label {
    display: inline-block;
    padding: 3px 15px;
    font-size: 14px;
    font-weight: 600;
    color: #1e1e1e;
    background-color: transparent;
    border: 1px solid #1e1e1e;
    border-radius: 0.375rem;
    cursor: pointer;
    /* transition: background-color 0.2s, color 0.2s; */
    display: inline;
}

/* Hover effect */
.custom-file-label:hover {
    background-color: #1e1e1e;
    color: white;
}

/* Focus effect */
.custom-file-input:focus ~ .custom-file-label {
    box-shadow: none;
}

/* Preview image */
#imagePreview {
    display: none;
    height: 400px;
    width: auto;
    aspect-ratio: 4/3;
    border-radius: 0.375rem;
    margin-top: 1rem;
}

/* Style cho khi không có ảnh được chọn */
/* .custom-file-label::after {
    content: 'Chọn ảnh';
} */

label {
    font-weight: bold;
}

</style>
@endsection
