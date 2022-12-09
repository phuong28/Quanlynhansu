@extends('admin/layouts.app')
@section('content')
    <div class="notification blue">
        <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0">
            <div>
                <span class="icon"><i class="mdi mdi-buffer"></i></span>
                <b>Danh sách đến muộn đã duyệt</b>
            </div>
        </div>
        <form class="navbar-item" method="GET" action="{{ route('search.user.late') }}">
            {{-- <input  class="control" placeholder="Tìm kiếm theo tên nhân sự..." class="input" name="searchByname"> --}}
            <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
                <h1 class="title">
                    <input name="search" style="color: black">
                </h1>
            </div>
            <button class="button light">Tìm kiếm</button>
        </form>
        <form class="navbar-item" method="GET" action="{{ route('search.user.late.by.date') }}">
            {{-- <input  class="control" placeholder="Tìm kiếm theo tên nhân sự..." class="input" name="searchByname"> --}}
            <div class="field">
                <div class="control icons-left">
                    <input class="input" type="date" name="search" value="{{ old('search') }}" style="color: black">
                    <span class="icon left"><i class="mdi mdi-account"></i></span>
                </div>
            </div>
            <button class="button light">Tìm kiếm</button>
        </form>
    </div>

    <div class="card has-table">
        <header class="card-header">
            <p class="card-header-title">
                <span class="icon"><i class="mdi mdi-account-multiple"></i></span>
            </p>
            <a href="#" class="card-header-icon">
                <span class="icon"><i class="mdi mdi-reload"></i></span>
            </a>
        </header>
        <div class="card-content">
            <table>
                <thead>
                    <tr>
                        <th>Tên nhân sự</th>
                        <th>phân loại</th>
                        <th>lý do </th>
                        <th>ngày xin phép</th>
                        <th>số ngày nghỉ</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($listlater as $item)
                        <tr>
                            <td data-label="Name">{{ $item->name }}</td>
                            <td>{{ $item->category }}</td>
                            <td>{{ $item->reason }}</td>
                            <td>{{ $item->date }}</td>
                            @if ($item->datebreak == 0)
                                <td>xin đến muộn</td>
                            @elseif($item->datebreak == 1)
                                <td>nghỉ nửa ngày</td>
                            @else
                                <td>nghỉ cả ngày</td>
                            @endif
                            <td class="actions-cell">
                                <div class="buttons right nowrap">
                                    <a href="{{ route('admin.edit.late', ['id' => $item->id]) }}"class="button small green --jb-modal"
                                        data-target="sample-modal-2" type="button">
                                        <span class="icon">Sửa</span>
                                    </a>
                                    <a href="{{ route('admin.delete.late', ['id' => $item->id]) }}"
                                        class="button small red --jb-modal" data-target="sample-modal" type="button">
                                        <span class="icon">Xóa</span>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="table-pagination">
                <div class="flex items-center justify-between">
                    <div class="buttons">
                        <button type="button" class="button active">{{ $listlater->links() }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
