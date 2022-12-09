@extends('admin/layouts.app')
@section('content')
    <div class="notification blue">
        <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0">
            <div>
                <span class="icon"><i class="mdi mdi-buffer"></i></span>
                <b>Danh sách nhân sự</b>
            </div>
            <a href="{{ route('user.create') }}" class="button small textual --jb-notification-dismiss">Thêm nhân sự</a>
        </div>
        <form class="navbar-item" method="GET" action="{{ route('searchuser') }}">
            {{-- <input  class="control" placeholder="Tìm kiếm theo tên nhân sự..." class="input" name="searchByname"> --}}
            <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
                <h1 class="title">
                    <input name="search" style="color: black">
                </h1>
            </div>
            <button class="button light">Tìm kiếm</button>
        </form>
    </div>

    <div class="card has-table">
        <header class="card-header">
            <p class="card-header-title">
                <span class="icon"><i class="mdi mdi-account-multiple"></i></span>
                thành viên
            </p>
            <a href="#" class="card-header-icon">
                <span class="icon"><i class="mdi mdi-reload"></i></span>
            </a>
        </header>
        <div class="card-content">
            <table>
                <thead>
                    <tr>
                        <th>Ảnh</th>
                        <th>Tên</th>
                        <th>Số điện thoại</th>
                        <th>Ngày sinh</th>
                        <th>Tài khoản</th>
                        <th>Mật khẩu</th>
                        <th>Email</th>
                        <th>Chức vụ</th>
                        <th>Trạng thái</th>
                        <th>Hành động</th>
                        <th>Bỏ theo dõi</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($user->count() == 0)
                        <p>không có kết quả tìm kiếm phù hợp cho <b>{{ $name }}</b></p>
                    @else
                        <p>Kết quả tìm kiếm phù hợp cho <b>{{ $name }}</b></p>
                        @foreach ($user as $item)
                            @if ($item->id == auth()->user()->id)
                                <tr>
                                    <td class="image-cell">
                                        <div class="image">
                                            <img src="{{ asset($item->image) }}" class="rounded-full">
                                        </div>
                                    </td>
                                    <td data-label="Name">{{ $item->name }}</td>
                                    <td data-label="Phone">{{ $item->phone }}</td>
                                    <td data-label="Created">
                                        <small class="text-gray-500" title="Oct 25, 2021">{{ $item->date }}</small>
                                    </td>
                                    <td data-label="City">{{ $item->username }}</td>
                                    <td data-label="">********</td>
                                    <td data-label="Progress" class="progress-cell">1
                                        {{ $item->email }}
                                    </td>
                                    <td data-label="">{{ $item->level }}</td>
                                    <td data-label="">{{ $item->status }}</td>
                                @else
                                <tr>
                                    <td class="image-cell">
                                        <div class="image">
                                            <img src="{{ asset($item->image) }}" class="rounded-full">
                                        </div>
                                    </td>
                                    <td data-label="Name">{{ $item->name }}</td>
                                    <td data-label="Phone">{{ $item->phone }}</td>
                                    <td data-label="Created">
                                        <small class="text-gray-500" title="Oct 25, 2021">{{ $item->date }}</small>
                                    </td>
                                    <td data-label="City">{{ $item->username }}</td>
                                    <td data-label="">********</td>
                                    <td data-label="Progress" class="progress-cell">1
                                        {{ $item->email }}
                                    </td>
                                    <td data-label="">{{ $item->level }}</td>
                                    <td data-label="">{{ $item->status }}</td>
                                    <td class="actions-cell">
                                        <div class="buttons right nowrap">
                                            <a href="{{ route('delete.user', $item->id) }} "class="button small green --jb-modal"
                                                data-target="sample-modal-2" type="button">
                                                @method('DELETE')
                                                <span class="icon">Xóa</span>
                                            </a>
                                            <a href="{{ route('user.edit', $item->id) }}"
                                                class="button small red --jb-modal" data-target="sample-modal"
                                                type="button">
                                                <span class="icon">Sửa</span>
                                            </a>
                                        </div>
                                    </td>
                                    <td class="actions-cell">
                                        <div class="buttons right nowrap">
                                            <a href="" class="button small blue --jb-modal"
                                                data-target="sample-modal" type="button">
                                                <span class="icon">Dừng</span>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    @endif
                </tbody>
            </table>
            <div class="table-pagination">
                <div class="flex items-center justify-between">
                    <div class="buttons">
                        <button type="button" class="button active">{{ $user->links() }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
