@extends('layout.index')

@section('content')

<!-- banner-w3layouts -->
<section class="banner-w3layouts" style="background-color: #105ae4">
    <div class="container">
        <div class="row banner-w3layouts-grids">
            <div class="col-lg-5 sign-info" data-aos="fade-right">
                <h3>Tạo tài khoản</h3>
                <p class="para-sign mt-2 mb-4 text-center">Nhập thông tin tài khoản.</p>

                @if(session('thongbao'))
                <div class="alert alert-success">
                    {{session('thongbao')}}
                </div>
                @endif

                <form action="dangky" method="POST">

                    <input type="hidden" name="_token" value="{{csrf_token()}}" />

                    <div class="form-group">

                        <label>Họ tên*</label>
                        <div class="icon1">
                            <input placeholder="" name="ten" type="text" required="">
                        </div>
                        @if ($errors->has('ten'))
                        <div class="alert alert-danger" style="width: 755px; height: 40px; margin-top: 5px; ">{{ $errors->first('ten') }}</div>
                        @endif 
                    </div>

                    <div class="form-group">

                        <label>Email*</label>
                        <div class="icon1">
                            <input placeholder="" name="email" type="email" required="">
                        </div>
                        @if ($errors->has('email'))                     
                        <div class="alert alert-danger" style="width: 100%; height: 15%; margin-top: 5px; ">{{ $errors->first('email') }}</div>
                        @endif
                    </div>

                    <div class="form-group">

                        <label>Mật khẩu*</label>
                        <div class="icon2">
                            <input placeholder="" name="password" type="password" required="">
                        </div>
                        @if ($errors->has('password'))
                        <div class="alert alert-danger" style="width: 100%; height: 15%; margin-top: 5px; ">{{ $errors->first('password') }}</div>
                        @endif
                    </div>

                    <div class="form-group">

                        <label>Nhập lại mật khẩu*</label>
                        <div class="icon2">
                            <input placeholder="" name="passwordAgain" type="password" required="">
                        </div>
                        @if ($errors->has('passwordAgain'))
                        <div class="alert alert-danger" style="width: 100%; height: 15%; margin-top: 5px; ">{{ $errors->first('passwordAgain') }}</div>
                        @endif
                    </div>
                    
                    <div class="form-group">

                        <label>Ngày sinh*</label>
                        <div class="icon2">
                           <label class="date">                                   
                            <select name="day">
                                @for($d=1;$d<=31;$d++)
                                <option value="{{$d}}">{{$d}}</option>
                                @endfor
                            </select>                                    
                        </label>
                        <label class="date">                                     
                            <select name="month">
                                @for($m=1;$m<=12;$m++)
                                <option value="{{$m}}">{{$m}}</option>
                                @endfor
                            </select>                                    
                        </label>
                        <label class="date">                                    
                            <select name="year">
                                @for($y=1975;$y<=2019;$y++)
                                <option value="{{$y}}">{{$y}}</option>
                                @endfor
                            </select>                                   
                        </label>
                    </div>
                </div>

                <div class="form-group">

                    <label>Giới tính*</label>
                    <div class="icon2">
                       <label class="radio-inline">
                        <input name="gioi_tinh" value="0" checked="checked" type="radio">Nam
                    </label>
                    <label class="radio-inline">
                        <input name="gioi_tinh" value="1" type="radio">Nữ
                    </label> 
                </div>

                <div class="form-group">

                    <label>Số điện thoại</label>
                    <div class="icon2">
                        <input placeholder="" name="so_dien_thoai" type="text">
                    </div>
                    @if ($errors->has('so_dien_thoai'))
                    <div class="alert alert-danger" style="width: 100%; height: 15%; margin-top: 5px; ">{{ $errors->first('so_dien_thoai') }}</div>
                    @endif
                </div>

                <div class="form-group">

                    <label>Địa chỉ</label>
                    <div class="icon2">
                        <input placeholder="" name="dia_chi" type="text">
                    </div>
                    @if ($errors->has('dia_chi'))
                    <div class="alert alert-danger" style="width: 100%; height: 15%; margin-top: 5px; ">{{ $errors->first('dia_chi') }}</div>
                    @endif
                </div>
            </div>


            <input type="submit" value="Tạo tài khoản">

        </form>
        <p class="para-sign mt-3">Bạn đã có tài khoản ? <a href="dangnhap" class="ml-2"><strong>Đăng nhập vào tài khoản của bạn</strong></a></p>

    </div>
    <div class="col-lg-7 banner-w3layouts-image pl-md-5">
        <div class="effect-w3">
            <img src="images/img4.jpg" alt="" class="img-fluid image1">
            <img src="images/img4.jpg" alt="" class="img-fluid image2">
            <img src="images/img4.jpg" alt="" class="img-fluid image3">
            <img src="images/img4.jpg" alt="" class="img-fluid image4">
        </div>

    </div>
</div>
</div>
</section>
<!-- //banner-w3layouts -->

@endsection