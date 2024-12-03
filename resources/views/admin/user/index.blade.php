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

        @if ($users->count() > 0)
        <table class="table table-striped table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>Tên</th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                    <th class="text-center">Cập nhật quyền</th>
                    <th class="text-center">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone }}</td>
                    <td class="text-center">
                        <form action="{{ route('admin.user.updateRole', $user->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <select name="role" class="form-control form-control-sm" onchange="this.form.submit()">
                                <option value="customer" {{ $user->role == 'customer' ? 'selected' : '' }}>Customer</option>
                                <option value="employee" {{ $user->role == 'employee' ? 'selected' : '' }}>Employee</option>
                                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                            </select>
                        </form>
                    </td>
                    <td class="text-center">
                        <button class="btn btn-danger btn-sm" onclick="handleDelete({{ $user->id }})"><i class="fa-solid fa-trash"></i></button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination -->
        <div class="d-flex justify-content-center">
            {{ $users->links('pagination::bootstrap-4') }}
        </div>

        <!-- Modal Delete User -->
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel">
            <div class="modal-dialog">
                <form action="{{route('admin.user.destroy', $user->id)}}" method="POST" id="deleteUserForm">
                    @csrf
                    @method('DELETE')
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel">Xóa người dùng</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p class="text-center font-weight-bold">
                                Bạn có chắc muốn xóa người dùng này không?
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
        <h3 class="text-center">Chưa có người dùng nào</h3>
        @endif
    </div>
</div>
@endsection

@section('scripts')
<script>
   function handleDelete(id){
      var form = document.getElementById('deleteUserForm');
    //   form.action = '/admin/users/' + id;
      $('#deleteModal').modal('show');
   }
</script>
@endsection
