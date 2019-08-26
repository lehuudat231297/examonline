@extends('layout.index')

@section('content')

<section class="banner-w3layouts-bottom py-lg-5 py-4">
    <div class="container">
        <div class="inner-sec-wthree py-lg-5 py-4 speak">
            <h3 class="tittle text-uppercase text-center my-lg-5 my-3"><span class="sub-tittle"></span>Thông tin tài khoản</h3>
            
            <div style="float: left;">
                Xin chào: {{Auth::user()->name}} 
            </div>

            <div class="row mt-lg-5 mt-4" style="width: 305%;">
                <div class="card">
                <div style="padding-left: 1.5%;" class="card-header">{{ __('Xác thực địa chỉ email của bạn') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Một liên kết xác minh mới đã được gửi đến địa chỉ email của bạn.') }}
                        </div>
                    @endif

                    {{ __('Trước khi tiếp tục, vui lòng kiểm tra email của bạn để biết liên kết xác minh.') }}
                    {{ __('Để nhận mã xác nhận hãy') }}, <a href="{{ route('verification.resend') }}">{{ __(' bấm vào đây') }}</a>.
                </div>
            </div>                       
            </div>
        </div>
    </div>
</section>
@endsection