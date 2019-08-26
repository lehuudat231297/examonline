@extends('layout.index')

@section('content')

<!-- portfolio -->
<section class="portfolio-flyer pt-5 pb-5" id="gallery">
	<div class="container py-lg-5">
		<h3 class="tittle text-uppercase text-center my-lg-5 my-3"><span class="sub-tittle"></span>Sửa thông tin</h3>
		
		<!-- /.col-lg-12 -->
		<div class="col-lg-7" style="margin-left: 20%;">

			@if(session('thongbao'))
			<div class="alert alert-success">
				{{session('thongbao')}}
			</div>
			@endif

			<form action="suathongtin" method="post" enctype="multipart/form-data">
				<input type="hidden" name="_token" value="{{csrf_token()}}" />
				<div class="form-group">
					<label>Hình ảnh</label>
					@if(Auth::user()->hinh_anh)
					<p><img width="50%" src="upload/thisinh/{{Auth::user()->hinh_anh}}"></p> <br>
					@endif

					<input type="file" name="hinh_anh" id="hinh_anh" class="form-control"/>

					@if(session('loihinhanh'))
					<div class="alert alert-danger">
						{{session('loihinhanh')}}
					</div>
					@endif  
				</div>

				<div class="form-group">
					<label>Họ tên:</label>
					<input class="form-control" name="ten" value="{{Auth::user()->name}}" />
					@if ($errors->has('ten'))
					<div class="alert alert-danger" style="width: 755px; height: 40px; margin-top: 5px; ">{{ $errors->first('ten') }}</div>
					@endif 
				</div>

				<div class="form-group">
					<label>Email:</label>
					<input class="form-control" value="{{Auth::user()->email}}" disabled />
				</div>

				<div class="form-group">
					<input type="checkbox" name="changePassword" id="changePassword">

					<label>Đổi mật khẩu:</label>
					<input type="password" class="form-control password" name="password" placeholder="Nhập mật khẩu" disabled="" />
					@if ($errors->has('password'))
					<div class="alert alert-danger" style="width: 100%; height: 15%; margin-top: 5px; ">{{ $errors->first('password') }}</div>
					@endif
				</div>

				<div class="form-group">
					<label>Nhập lại mật khẩu:</label>
					<input type="password" class="form-control password" name="passwordAgain" placeholder="Nhập lại mật khẩu" disabled="" />
					@if ($errors->has('passwordAgain'))
					<div class="alert alert-danger" style="width: 100%; height: 15%; margin-top: 5px; ">{{ $errors->first('passwordAgain') }}</div>
					@endif
				</div>

				<div class="form-group">
					<label>Ngày sinh</label>
					<label class="date">                                   
						<select name="day">
							<option selected="selected">{{substr( Auth::user()->ngay_sinh,  8, 2)}}</option>
							@for($d=1;$d<=31;$d++)
							<option value="{{$d}}">{{$d}}</option>
							@endfor
						</select>                                    
					</label>
					<label class="date">                                     
						<select name="month">
							<option selected="selected">{{substr(  Auth::user()->ngay_sinh,  5, 2)}}</option>
							@for($m=1;$m<=12;$m++)
							<option value="{{$m}}">{{$m}}</option>
							@endfor
						</select>                                    
					</label>
					<label class="date">                                    
						<select name="year">
							<option selected="selected">{{substr(  Auth::user()->ngay_sinh,  0, 4)}}</option>
							@for($y=1975;$y<=2019;$y++)
							<option value="{{$y}}">{{$y}}</option>
							@endfor
						</select>                                   
					</label>
				</div>

				<div class="form-group">
					<label>Giới tính</label>
					<label class="radio-inline">
						<input name="gioi_tinh" value="0" type="radio"
						@if(Auth::user()->gioi_tinh==0)
						{{"checked"}}
						@endif
						>Nam
					</label>
					<label class="radio-inline">
						<input name="gioi_tinh" value="1" type="radio"
						@if(Auth::user()->gioi_tinh==1)
						{{"checked"}}
						@endif
						>Nữ
					</label>
				</div>

				<div class="form-group">
					<label>Số điện thoại</label>
					<input class="form-control" name="so_dien_thoai" value="{{Auth::user()->so_dien_thoai}}"/>
					@if ($errors->has('so_dien_thoai'))
					<div class="alert alert-danger" style="width: 755px; height: 40px; margin-top: 5px; ">{{ $errors->first('so_dien_thoai') }}</div>
					@endif  
				</div>

				<div class="form-group">
					<label>Địa chỉ</label>
					<input class="form-control" name="dia_chi" value="{{Auth::user()->dia_chi}}"/>
					@if ($errors->has('dia_chi'))
					<div class="alert alert-danger" style="width: 755px; height: 40px; margin-top: 5px; ">{{ $errors->first('dia_chi') }}</div>
					@endif 
				</div>
				<center>
					<button type="submit" class="btn btn-success">Gửi</button>
				</center>
			</form>

		</div>
	</div>
</section>
<!-- //portfolio -->

		@endsection

		@section('script')
		<script type="text/javascript">
			$(document).ready(function() {
				$("#changePassword").change(function() {
					if($(this).is(":checked")) {
						$(".password").removeAttr('disabled');
					} else {
						$(".password").attr('disabled', '');
					}
				});
			});
		</script>
		@endsection