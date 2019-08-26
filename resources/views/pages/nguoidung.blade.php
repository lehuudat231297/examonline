@extends('layout.index')

@section('content')
<!--//team -->
<section class="banner-w3layouts-bottom py-lg-5 py-4">
	<div class="container">
		<div class="inner-sec-wthree py-lg-5 py-4 speak">
			<h3 class="tittle text-uppercase text-center my-lg-5 my-3"><span class="sub-tittle"></span>Thông tin tài khoản</h3>
			<div class="row mt-lg-5 mt-4" style="width: 305%;">
				<div class="col-md-4 team-gd text-center" data-aos="fade-right">
					<div class="team-img mb-4">
						@if(isset(Auth::user()->hinh_anh))
						<img style="width: 350px;" src="upload/thisinh/{{Auth::user()->hinh_anh}}" class="img-fluid rounded-circle" alt="user-image">
						@else 
						<img src="upload/thisinh/avatar.png" class="img-fluid rounded-circle" alt="user-image">
						@endif
					</div>
					<div class="team-info">
						<h3 class="mt-md-4 mt-3"><span class="sub-tittle-team">Thí sinh</span> {{Auth::user()->name}}</h3>

						<p>Email: {{Auth::user()->email}}</p>

						<p>Họ tên: {{Auth::user()->name}}</p>

						<p>Ngày sinh: {{Auth::user()->ngay_sinh}}</p>

						@if((Auth::user()->gioi_tinh) == 0)
						<p>Giới tính: Nam</p>
						@else
						<p>Giới tính: Nữ</p>
						@endif

						<p>Số điện thoại: {{Auth::user()->so_dien_thoai}}</p>

						<p>Địa chỉ: {{Auth::user()->dia_chi}}</p>

						<ul class="social_section_1info mt-md-4 mt-3">
							<li class="mb-2 facebook"><a href="suathongtin">Sửa thông tin</a></li>
							<li class="mb-2 twitter"><a href="ketqua">Xem điểm</a></li>
						</ul>
					</div>
				</div>							
			</div>
		</div>
	</div>
</section>
<!--//team -->

@endsection