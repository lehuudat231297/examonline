@extends('layout.index')

@section('content')

<!-- banner-w3layouts -->
<section class="ab-info-main py-md-5 py-5">
	<div class="container py-md-5 py-5">
		<div class="ab-info-grids pt-md-5 pt-3">
			<div class="contact-info pt-md-5 pt-0 text-center">
				<h3 class="tittle text-uppercase text-center mb-lg-5 mb-3 inner-tittle"><span class="sub-tittle">Tìm chúng tôi</span> Liên hệ</h3>
				<p class="text-center" data-aos="fade-up">Nếu bạn có góp ý và đánh giá về trang web của chúng tồi vui lòng điền thông tin và gửi cho chúng tôi.</p>
				<div class="contact-form mt-md-5">
					<div class="contact-form-inner mx-auto text-left">
						@if(session('thongbao'))
						<div class="alert alert-success">
							{{session('thongbao')}}
						</div>
						@endif

						@if(session('thongbaoloi'))
						<div class="alert alert-danger">
							{{session('thongbaoloi')}}
						</div>
						@endif

						<form name="contactform " id="contactform" method="POST" action="lienhe" onsubmit="return(validate());" novalidate="novalidate">
							<input type="hidden" name="_token" value="{{csrf_token()}}" />

							<div class="row">
								<div class="col-lg-6">
									<div class="form-group" data-aos="fade-up">
										<label>Tên</label>
										<input type="text" class="form-control" id="name" placeholder="Enter Name" name="name">
										@if ($errors->has('name'))
										<div class="alert alert-danger" style="width: 100%; margin-top: 5px; ">{{ $errors->first('name') }}</div>
										@endif  
									</div>

									<div class="form-group" data-aos="fade-up">
										<label>Email</label>
										<input type="email" class="form-control" id="name" placeholder="Enter Email" name="email">
										@if ($errors->has('email'))
										<div class="alert alert-danger" style="width: 100%; margin-top: 5px; ">{{ $errors->first('email') }}</div>
										@endif  
									</div>

								</div>
								<div class="col-lg-6">

									<div class="form-group" data-aos="fade-up">
										<label>Số điện thoại</label>
										<input type="text" class="form-control" id="phone" placeholder="Enter Your Phone" name="phone">
										@if ($errors->has('phone'))
										<div class="alert alert-danger" style="width: 100%; margin-top: 5px; ">{{ $errors->first('phone') }}</div>
										@endif  
									</div>

									<div class="form-group" data-aos="fade-up">
										<label>Tiêu đề</label>
										<input type="text" class="form-control" id="name" placeholder="Enter Subject" name="subject">
										@if ($errors->has('subject'))
										<div class="alert alert-danger" style="width: 100%; margin-top: 5px; ">{{ $errors->first('subject') }}</div>
										@endif  
									</div>
								</div>
							</div>
							<div class="form-group" data-aos="fade-up">
								<label>Chúng tôi có thể giúp gì cho bạn?</label>
								<textarea name="issues" class="form-control" id="iq" placeholder="Enter Your Message Here"></textarea>
								@if ($errors->has('issues'))
								<div class="alert alert-danger" style="width: 100%; margin-top: 5px; ">{{ $errors->first('issues') }}</div>
								@endif  
							</div>
							<button type="submit" class="btn btn-default">Gửi</button>
						</form>
						<div class="map mt-md-5" data-aos="fade-up">				
							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.6775312871914!2d105.8412741148202!3d21.00555959394607!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ac76ccab6dd7%3A0x55e92a5b07a97d03!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBCw6FjaCBraG9hIEjDoCBO4buZaQ!5e0!3m2!1svi!2s!4v1556343069106!5m2!1svi!2s" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe></div>
						</div>

					</div>

				</div>
			</div>
		</div>
	</section>
	<!-- //banner-w3layouts -->

	@endsection