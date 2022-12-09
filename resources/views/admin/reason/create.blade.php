@extends('admin/layouts.app')
@section('content')
    <section class="section main-section">
        <div class="card mb-6">
            <header class="card-header">
                <p class="card-header-title">
                    <span class="icon"><i class="mdi mdi-ballot"></i></span>
                    Thêm lý do
                </p>
            </header>
            <div class="card-content">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($error->all() as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                <form method="POST" action="{{route('admin.reason.add')}}">
                    {{ csrf_field() }}
                    <div class="field">
                        <label class="label">Thêm lý do </label>
                        <div class="field-body">
                            <div class="field">
                                <label class="label">Phân loại lý do</label>
                                <div class="control icons-left">
                                    <input class="input" type="text" name="category" value="{{ old('category') }}">
                                    <span class="icon left"><i class="mdi mdi-account"></i></span>
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Ghi chú</label>
                                <div class="control icons-left">
                                    <input class="input" type="text" name="note" value="{{ old('note') }}">
                                    <span class="icon left"><i class="mdi mdi-account"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="field grouped">
                        <div class="control">
                            <button type="submit" class="button green">
                                Thêm lý do 
                            </button>
                        </div>
                        <div class="control">
                            <a href="{{route('dashboard')}}" type="reset" class="button red">
                                Quay trở về
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
