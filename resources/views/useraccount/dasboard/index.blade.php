@extends('useraccount/layouts.app')
@section('content')
<section class="section main-section">
    <div class="grid gap-6 grid-cols-1 md:grid-cols-3 mb-6">
        <div class="card">
            <div class="card-content">
                <div class="flex items-center justify-between">
                    <div class="widget-label">
                        <h3>
                            tổng số lượng nhân sự
                        </h3>
                        <h1>
                            512
                        </h1>
                    </div>
                    <span class="icon widget-icon text-green-500"><i
                            class="mdi mdi-account-multiple mdi-48px"></i></span>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-content">
                <div class="flex items-center justify-between">
                    <div class="widget-label">
                        <h3>
                            số lượng nhân sự hiện tại
                        </h3>
                        <h1>
                            300
                        </h1>
                    </div>
                    <span class="icon widget-icon text-blue-500"><i
                            class="mdi mdi-cart-outline mdi-48px"></i></span>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection