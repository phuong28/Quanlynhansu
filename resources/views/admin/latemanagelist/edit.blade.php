@extends('admin/layouts.app')
@section('content')
    <section class="section main-section">
        <div class="card mb-6">
            <header class="card-header">
                <p class="card-header-title">
                    <span class="icon"><i class="mdi mdi-ballot"></i></span>
                    Sửa thông tin đến muộn
                </p>
            </header>
            <div class="card-content">
                @foreach($items as $item)
                <form method="POST" action="{{route('admin.update.late',['id'=>$item->id])}}">
                    {{ csrf_field() }}
                    <div class="field">
                        <label class="label">Sửa thông tin xin đến muộn </label>
                        <div class="field-body">
                            <div class="field">
                                <label class="label">Họ tên : {{$item->name}}</label>
                            </div>
                            <div class="field">
                                <label class="label">Phân loại lý do</label>
                                <div class="control">
                                    <div class="select">
                                        <?php 
                                            $reason = new App\Models\Reason();
                                            $reasons=$reason->all();
                                        ?>
                                        <select name="category">
                                            @foreach($reasons as $reason)
                                                <option value="{{$reason->category}}">{{$reason->category}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Lý do </label>
                                <div class="control icons-left">
                                    <input class="input" type="text" name="reason"  value="{{$item->reason}}">
                                    <span class="icon left"><i class="mdi mdi-account"></i></span>
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Số ngày nghỉ</label>
                                <div class="control">
                                    <div class="select">
                                        <?php 
                                            $reason = new App\Models\Reason();
                                            $reasons=$reason->all();
                                        ?>
                                        <select name="datebreak">
                                            <option value="0">Xin đến muộn</option>
                                            <option value="1">nghỉ nửa ngày</option>
                                            <option value="2">nghỉ cả ngày</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="field grouped">
                        <div class="control">
                            <button type="submit" class="button green">
                                Cập nhật thông tin 
                            </button>
                        </div>
                        <div class="control">
                            <a  href="{{route('dashboard')}}" type="reset" class="button red">
                                Quay trở về
                            </a>
                        </div>
                    </div>
                </form>
                @endforeach
            </div>
        </div>
    </section>
@endsection
