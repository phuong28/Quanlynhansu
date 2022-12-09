<aside class="aside is-placed-left is-expanded">
    <div class="aside-tools">
        <div>
         <b class="font-black">{{auth()->user()->name}}</b>
        </div>
    </div>
    <div class="menu is-menu-main">
        <p class="menu-label">Quản lý nhân sự</p>
        <ul class="menu-list">
            <li class="active">
                <a href="{{route('dashboard')}}">
                    <span class="icon"><i class="mdi mdi-desktop-mac"></i></span>
                    <span class="menu-item-label">Trang chủ</span>
                </a>
            </li>
        </ul>
        <p class="menu-label">Danh mục</p>
        <ul class="menu-list">
            <li class="--set-active-tables-html">
                <a href="{{route('user.list')}}">
                    <span class="icon"><i class="mdi mdi-table"></i></span>
                    <span class="menu-item-label">Danh sách nhân sự</span>
                </a>
            </li>
            <li class="--set-active-forms-html">
                <a href="{{ route('admin.list.late') }}">
                    <span class="icon"><i class="mdi mdi-square-edit-outline"></i></span>
                    <span class="menu-item-label">Danh sách đến muộn/xin nghỉ</span>
                </a>
            </li>
            <li class="--set-active-profile-html">
                <a href="{{ route('users.salary') }}">
                    <span class="icon"><i class="mdi mdi-account-circle"></i></span>
                    <span class="menu-item-label">Danh sách lương</span>
                </a>
            </li>

            <li>
                <a href="{{route('admin.request.late')}}">
                    <span class="icon"><i class="mdi mdi-lock"></i></span>
                    <span class="menu-item-label">Thêm mới / xin đến muộn</span>
                </a>
            </li>
            <li class="--set-active-tables-html">
                <a href="{{route('admin.reason.list')}}">
                    <span class="icon"><i class="mdi mdi-table"></i></span>
                    <span class="menu-item-label">Danh mục phân loại theo lý do</span>
                </a>
            </li>
            <li class="--set-active-tables-html">
                <a href="{{route('report')}}">
                    <span class="icon"><i class="mdi mdi-table"></i></span>
                    <span class="menu-item-label">Báo cáo</span>
                </a>
            </li>
        </ul>
        <p class="menu-label">About</p>
    </div>
</aside>
