@extends('admin/layouts.app')
@section('content')
    <section class="section main-section">
        <div class="card mb-6">
            <header class="card-header">
                <p class="card-header-title">
                    <span class="icon"><i class="mdi mdi-ballot"></i></span>
                    Thêm Nhân sự
                </p>
            </header>
            <div class="card-content">
                <form method="POST" action={{route('create.user')}} enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="field">
                        <label class="label">Thêm Nhân Sự</label>
                        <div class="field-body">
                            <div class="field">
                                <div class="control icons-left">
                                    <input class="input" type="text" placeholder="Name" name="name"
                                        value="{{ old('name') }}">
                                    <span class="icon left"><i class="mdi mdi-account"></i></span>
                                </div>
                                <div class="field">
                                    <div class="field-body">
                                        <div class="field">
                                            <div class="field addons">
                                                <div class="control">
                                                    <input class="input" value="+84" size="3" readonly>
                                                </div>
                                                <div class="control expanded">
                                                    <input class="input" type="tel" placeholder="Your phone number"
                                                        name="phone" value="{{ old('phone') }}">
                                                </div>
                                                @error('phone')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="control icons-left">
                                        <input class="input" type="date" name="date" value="{{ old('date') }}">
                                        <span class="icon left"><i class="mdi mdi-account"></i></span>
                                    </div>
                                </div>
                                <div class="field">
                                    <label class="label">Ảnh avatars</label>
                                    <div class="field-body">
                                        <div class="field file">
                                            <label class="upload control">
                                                <a class="button blue">
                                                    Tải ảnh
                                                </a>
                                                <input accept="image/*"  type="file" name="image" value="{{ old('image') }}" id="photo">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="field">
                                    <label class="label">Tài khoản </label>
                                    <div class="control icons-left">
                                        <input class="input" type="text" name="username" value="{{ old('username') }}">
                                        <span class="icon left"><i class="mdi mdi-account"></i></span>
                                    </div>
                                    @error('username')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                {{-- <div class="field">
                                    <label class="label">Mật khẩu</label>
                                    <div class="control icons-left">
                                        <input class="input" type="password" name="password" value="{{ old('password') }}">
                                        <span class="icon left"><i class="mdi mdi-account"></i></span>
                                    </div>
                                </div> --}}
                                <div class="field">
                                    <label class="label">Email</label>
                                    <div class="control icons-left">
                                        <input class="input" type="email" name="email" value="{{ old('email') }}">
                                        <span class="icon left"><i class="mdi mdi-account"></i></span>
                                    </div>
                                </div>
                                <div class="field">
                                    <label class="label">Chức vụ</label>
                                    <div class="control">
                                        <div class="select">
                                            <select name="level">
                                                <option value="Giám đốc">Giám đốc</option>
                                                <option value="Trưởng Phòng">Trưởng Phòng</option>
                                                <option value="Nhân viên">Nhân viên</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="field">
                                    <label class="label">Trạng thái</label>
                                    <div class="control">
                                        <div class="select">
                                            <select name="status">
                                                <option value="Đã nghỉ việc">Đã nghỉ việc</option>
                                                <option value="Đang làm">Đang làm</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="field grouped">
                        <div class="control">
                            <button type="submit" class="button green">
                                Thêm nhân viên
                            </button>
                        </div>
                        <div class="control">
                            <a  href="{{route('dashboard')}}" type="reset" class="button red">
                                Quay trở về
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
