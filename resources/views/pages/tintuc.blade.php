@extends('layout.index')

@section('content')

<!-- banner-w3layouts -->
<section class="ab-info-main py-md-5 py-5">
	<div class="container py-md-5 py-5">
		<div class="ab-info-grids pt-md-5 pt-0">
			<div class="blog-sec pt-md-3 pt-3">
				<h3 class="tittle text-uppercase text-center mb-lg-5 mb-3 inner-tittle"><span class="sub-tittle">Danh sách </span> Tin tức</h3>
				<div class="row mt-lg-5 mt-3">
					<div class="col-lg-8 blog-left-content">

						@foreach($tintuc as $tt)
						<div class="card" data-aos="fade-up">
							
							<div class="card-body" >
								
								@if(isset($tt->hinh_anh))
								<a  style="float: left; margin-right: 10px" href="xemtin/{{$tt->id}}"> <img style="object-fit: cover;" border="2px"  width="200px" height="200px" src="upload/tintuc/{{$tt->hinh_anh}}" alt="Card image cap"></a> 
								@endif

								<h5 class="card-title"><a class="b-post text-dark" href="xemtin/{{$tt->id}}">{{$tt->tieu_de}}</a></h5>
								<h6 class="date"><span>
								By: Admin</span>{{$tt->created_at}}</h6>
								<p style="margin: 5px">{!!substr($tt->noi_dung,3,203)."....."!!}<a class="btn btn-banner-w3layouts text-capitalize my-3" href="xemtin/{{$tt->id}}">Xem thêm</a></p>	
							</div>
							<div class="card-footer">
								<small class="text-muted">{{"Last updated ".$tt->updated_at}}</small>
							</div>
						</div>
						<br>
						@endforeach

						{{$tintuc->links()}}
					</div>
					
					<aside class="col-lg-4 blog-sldebar-right">
						<div class="single-gd">
							<h4>Tin mới nhất</h4><?php $i = 1; ?>
							@foreach($tintuc as $tt)
							
							<div class="blog-grids">
								<div class="blog-grid-left">
									@if(isset($tt->hinh_anh))
									<a href="xemtin/{{$tt->id}}">
										<img src="upload/tintuc/{{$tt->hinh_anh}}" class="img-fluid" alt="">
									</a>
									@endif
								</div>
								<div class="blog-grid-right">

									<h5>
										<a href="xemtin/{{$tt->id}}">{{$tt->tieu_de}}</a>
									</h5>
								</div>
								<div class="clearfix"> </div>
							</div>
							<?php $i++; ?>
							<?php if($i==4) break; ?>
							@endforeach
					
						</div>

						<!-- <div class="single-gd" data-aos="fade-up">
							<h4>Our Progress</h4>
							<div class="progress">
								<div class="progress-bar progress-bar-striped" role="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
							<div class="progress">
								<div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
							<div class="progress">
								<div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
							<div class="progress">
								<div class="progress-bar progress-bar-striped bg-warning" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
							<div class="progress">
								<div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
						</div> -->
						
					</aside>
				</aside>
			</div>
		</div>
	</div>
</div>
</section>

<!-- //banner-w3layouts -->

@endsection