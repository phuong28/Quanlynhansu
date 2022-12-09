@extends('admin/layouts.app')
@section('content')
    <div class="notification blue">
        <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0">
            <div>
                <span class="icon"><i class="mdi mdi-buffer"></i></span>
                <b>Danh sách phân loại lý do</b>
            </div>
            <a href="{{ route('admin.reason.create') }}" class="button small textual --jb-notification-dismiss">Thêm lý do
            </a>
        </div>
        <form class="navbar-item" method="GET" action="{{ route('search.late') }}">
            {{-- <input  class="control" placeholder="Tìm kiếm theo tên nhân sự..." class="input" name="searchByname"> --}}
            <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
                <h1 class="title">
                    <input name="search" placeholder="Tìm kiếm theo phân loại" style="color: black">
                </h1>
            </div>
            <button class="button light">Tìm kiếm</button>
        </form>
    </div>
    <div class="card has-table">
        <header class="card-header">
            <p class="card-header-title">
                <span class="icon"><i class="mdi mdi-account-multiple"></i></span>
                Lý do
            </p>
            <a href="#" class="card-header-icon">
                <span class="icon"><i class="mdi mdi-reload"></i></span>
            </a>
        </header>
        <div class="card-content">
            <table>
                <thead>
                    <tr>
                        <th>Lý do </th>
                        <th>Ghi chú</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($reason->count() == 0)
                        <p>không có kết quả tìm kiếm phù hợp cho <b>{{ $category }}</b></p>
                    @else
                        <p>Kết quả tìm kiếm phù hợp cho <b>{{ $category }}</b></p>
                        @foreach ($reason as $item)
                            <tr>
                                <td data-label="Name">{{ $item->category }}</td>
                                <td data-label="Phone">{{ $item->note }}</td>
                                <td class="actions-cell">
                                    <div class="buttons right nowrap">
                                        <a href="{{ route('admin.delete.reason', $item->id) }}"class="button small green --jb-modal"
                                            data-target="sample-modal-2" type="button">
                                            @method('DELETE')
                                            <span class="icon">Xóa</span>
                                        </a>
                                        <a href="{{ route('admin.edit.reason', $item->id) }}"
                                            class="button small red --jb-modal" data-target="sample-modal" type="button">
                                            <span class="icon">Sửa</span>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
            <div class="table-pagination">
                <div class="flex items-center justify-between">
                    <div class="buttons">
                        <button type="button" class="button active">{{ $reason->links() }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
