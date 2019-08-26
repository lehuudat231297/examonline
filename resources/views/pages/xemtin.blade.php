@extends('layout.index')

@section('content')

<!-- banner-w3layouts -->

<section class="ab-info-main py-md-5 py-5">
	<div class="container py-md-5 py-5">
		<div class="ab-info-grids pt-md-5 pt-0">
			<div class="blog-sec pt-md-3 pt-3">
				<a href="tintuc" class="btn btn-danger">Trở lại</a>
				<div class="row mt-lg-5 mt-3" style="width: 150%;">
					<div class="col-lg-8 blog-left-content">
						<h5 style="font-style: italic; font-size: 28px">{{$tintuc->tieu_de}}</h5>
						<small> By: Admin</span>{{$tintuc->created_at}}</h6></small>
						<br>

						<div class="card" data-aos="fade-up">

							@if(isset($tintuc->hinh_anh))
							<a href="single.html"> <img style="object-fit: cover;" border="2px" width="100%"  src="upload/tintuc/{{$tintuc->hinh_anh}}" alt="Card image cap"></a> 
							@endif
							<div class="card-body" >
								<h6 class="date"><span>								
									<p class="card-text" style="text-align: center;">{!!$tintuc->noi_dung!!}</p>	
								</div>
								<div class="card-footer">
									<small class="text-muted">{{"Last updated ".$tintuc->updated_at}}</small>
								</div>
							</div>
						</div>		
						
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- //banner-w3layouts -->

	@endsection