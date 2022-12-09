@extends('useraccount/layouts.app')
@section('content')
    <section class="section main-section">
        <div class="card mb-6">
            <header class="card-header">
                <p class="card-header-title">
                    <span class="icon"><i class="mdi mdi-ballot"></i></span>
                    Thêm mới xin đến muộn
                </p>
            </header>
            <div class="card-content">
                <form method="POST" action="{{route('useraccount.late.new')}}">
                    {{ csrf_field() }}
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
                        <label class="label">Nội dung, lý do</label>
                        <div class="control icons-left">
                            <input class="input" type="text" name="reason" value="{{ old('reason') }}">
                            <span class="icon left"><i class="mdi mdi-account"></i></span>
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Ngày xin phép</label>
                        <div class="control icons-left">
                            <input class="input" type="date" name="date" value="{{ old('date') }}">
                            <span class="icon left"><i class="mdi mdi-account"></i></span>
                        </div>
                    </div>
                    {{-- Nội dung - lý do, Ngày xin phép, số ngày nghỉ --}}
                    <hr>
                    <div class="field grouped">
                        <div class="control">
                            <button type="submit" class="button green">
                                Thêm
                            </button>
                        </div>
                        <div class="control">
                            <button type="reset" class="button red">
                                Quay trở về
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
