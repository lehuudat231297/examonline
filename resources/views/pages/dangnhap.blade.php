@extends('layout.index')

@section('content')

<!-- banner-w3layouts -->
<section class="banner-w3layouts" style="background-color: #105ae4">
	<div class="container">
		<div class="row banner-w3layouts-grids">
			<div class="col-lg-5 sign-info" data-aos="fade-right">
				<h3>Đăng nhập vào tài khoản của bạn</h3>
				<p class="para-sign mt-2 mb-4 text-center">Nhập email và mật khẩu của bạn để đăng nhập.</p>

				@if(session('thongbao'))
				<div class="alert alert-danger">
					{{session('thongbao')}}
				</div>
				@endif

				<form action="dangnhap" method="post">
					@csrf
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
					<label class="anim">
						<input type="checkbox" class="checkbox">
						<span>Ghi nhớ</span> 
						<a href="#">Quên mật khẩu</a>
					</label>
					<div class="clearfix"></div>
					<input type="submit" value="Đăng nhập">
					<p class="para-sign mt-3">Bạn chưa có tài khoản ? <a href="dangky" class="ml-2"><strong>Tạo tài khoản</strong></a></p>
				</form>
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