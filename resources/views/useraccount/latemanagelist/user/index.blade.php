@extends('useraccount/layouts.app')
@section('content')
    <div class="notification blue">
        <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0">
            <div>
                <span class="icon"><i class="mdi mdi-buffer"></i></span>
                <b>Xin đến muộn và xin nghỉ</b>
            </div>
            <a href="{{ route('useraccount.late.new') }}" class="button small textual --jb-notification-dismiss">
                xin đến muộn</a>
            <a href="{{ route('useraccount.break.create') }}" class="button small textual --jb-notification-dismiss">
                xin nghỉ</a>
        </div>
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
                        <th>phân loại</th>
                        <th>lý do </th>
                        <th>ngày xin phép</th>
                        <th>số ngày nghỉ</th>
                        <th>Trạng thái</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($listlater as $item)
                        <tr>
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
                            @if ($item->status == 0)
                                <td class="actions-cell">
                                    <div class="buttons right nowrap">
                                        <a href="{{ route('send.reason', $item->id) }}" class="button small red --jb-modal"
                                            data-target="sample-modal" type="button">
                                            <span class="icon">Gửi</span>
                                        </a>
                                    </div>
                                </td>
                            @elseif($item->status == 1)
                                <td>chờ duyệt</td>
                            @else
                                <td class="actions-cell">
                                    <div class="buttons right nowrap">
                                        <a href="" class="button small green --jb-modal"
                                            data-target="sample-modal" type="button">
                                            <span class="icon">ok</span>
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
                        <button type="button" class="button active">{{ $listlater->links() }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
