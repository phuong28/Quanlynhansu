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
            {{-- <li class="--set-active-profile-html">
                <a href="profile.html">
                    <span class="icon"><i class="mdi mdi-account-circle"></i></span>
                    <span class="menu-item-label">Trang cá nhân</span>
                </a>
            </li> --}}
            <li>
                <a href="{{route('useraccount.late')}}">
                    <span class="icon"><i class="mdi mdi-lock"></i></span>
                    <span class="menu-item-label">Danh sách xin đến muộn</span>
                </a>
            </li>
        </ul>
        <p class="menu-label">About</p>
    </div>
</aside>
