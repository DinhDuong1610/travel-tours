<div class="col-md-4 sidebar">
    <ul class="list-group">
        <li class="list-group-item">
            <a href="#"><i class=" sidebar-icon fa-solid fa-house"></i> Tổng quan</a>
        </li>
        <li class="list-group-item">
            <a href="{{ Route('admin.destinations.index') }}"><i class="sidebar-icon fas fa-map-marked-alt"></i> Điểm đến</a>
        </li>
        <li class="list-group-item">
            <a href="{{ Route('admin.category.index') }}"><i class="sidebar-icon fas fa-list-alt"></i> Danh mục</a>
        </li>
        <li class="list-group-item">
            <a href="{{ Route('admin.tag.index') }}"><i class="sidebar-icon fas fa-tags"></i> Nhãn</a>
        </li>
        <li class="list-group-item">
            <a href="{{ Route('admin.blog.index') }}"><i class="sidebar-icon fas fa-blog"></i> Bài viết</a>
        </li>
        <li class="list-group-item">
            <a href="#"><i class="sidebar-icon fa-solid fa-plane-departure"></i>Đơn đặt tour</a>
        </li>
        @if (auth()->user()->isAdmin())
            <li class="list-group-item">
                <a href="#"><i class="sidebar-icon fas fa-users"></i> Người dùng</a>
            </li>
            <li class="list-group-item">
                <a href="#"><i class="sidebar-icon fas fa-users"></i> Vai trò</a>
            </li>
        @endif
    </ul>
</div>
