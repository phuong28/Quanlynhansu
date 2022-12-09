@extends('admin/layouts.app')
@section('content')
    <div class="notification blue">
        <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0">
            <div>
                <span class="icon"><i class="mdi mdi-buffer"></i></span>
                <b>Danh sách lương của nhân sự</b>
            </div>
            <a href="{{ route('salary.export') }}" class="button small textual --jb-notification-dismiss">Xuất file</a>
        </div>
        <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0">
            <a href="{{ route('salary.user.export') }}" class="button small textual --jb-notification-dismiss">Xuất danh sách nhân sự để tạo lương</a>
        </div>
        <form class="navbar-item" method="POST" enctype="multipart/form-data" action="{{ route('salary.import') }}">
            {{ csrf_field() }}
            <input type="file" name="file" class="form-control">
            <button class="button light">Tải file lên</button>
        </form>
    </div>
    <div class="card has-table">
        <header class="card-header">
            <p class="card-header-title">
                <span class="icon"><i class="mdi mdi-account-multiple"></i></span>
                Lương nhân sự hàng tháng
            </p>
            <a href="#" class="card-header-icon">
                <span class="icon"><i class="mdi mdi-reload"></i></span>
            </a>
        </header>
        <div class="card-content">
            <table>
                <thead>
                    <tr>
                        <th>Tên nhân viên</th>
                        <th>email</th>
                        <th>tài khoản</th>
                        <th>lương</th>
                        <th>gửi email</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($salary as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->username }}</td>
                            <td>{{ $item->salarymounth }}</td>
                            @if ($item->status == 0)
                                <td class="actions-cell">
                                    <div class="buttons right nowrap">
                                        <a href="{{ route('send.salary', $item->email) }}"
                                            class="button small red --jb-modal" data-target="sample-modal" type="button">
                                            <span class="icon">Gửi</span>
                                        </a>
                                    </div>
                                </td>
                            @else
                                <td class="actions-cell">
                                    <div class="buttons right nowrap">
                                        <a class="button small green --jb-modal" data-target="sample-modal" type="button">
                                            <span class="icon">Đã gửi</span>
                                        </a>
                                    </div>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="table-pagination">
                <div class="flex items-center justify-between">
                    <div class="buttons">
                        <button type="button" class="button active"></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
