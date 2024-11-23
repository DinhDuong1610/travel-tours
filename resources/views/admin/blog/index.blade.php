@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-end mb-2">
    <a href="{{route('admin.blog.create')}}" class="btn btn-success ">Add Blog</a>
</div>


<div class="card card-default">
    <div class="card-header">Blog</div>

    <div class="card-body">
        @if ($blogs->count()>0)
        <table class="table">
            <thead>
                <th>Image</th>
                <th>Title</th>
                <th>Category</th>
                <th></th>
                <th></th>
            </thead>
            <tbody>
                @foreach ($blogs as $blog)
                <tr>
                    <td>
                        <img src="{{asset('/storage/' . $blog->image)}}" width="120px" height="60px"
                            class="img-thumbnail" alt="responsive image">
                    </td>
                    <td>
                        {{ $blog->title }}
                    </td>
                    <td>
                        <a href="#">
                            {{$blog->category->name}}
                        </a>
                    </td>
                    @if ($blog->trashed())
                    <td>
                        <form action="#" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-info btn-sm">Restore</button>
                        </form>
                    </td>
                    @else
                    <td>
                        <a href="#"
                            class="btn btn-info btn-sm">Edit</a>
                    </td>
                    @endif

                    <td>
                        <form action="#" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                                {{$blog->trashed()? 'Delete':'Trash'}}
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