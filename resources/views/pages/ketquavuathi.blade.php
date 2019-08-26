@extends('layout.index')

@section('content')

<!-- portfolio -->
<section class="portfolio-flyer pt-5 pb-5" id="gallery">

	<div class="container py-lg-5">
		<h1 class="tittle text-uppercase text-center my-lg-5 my-3"><span class="sub-tittle"> Kết quả thi </span></h1>

		<div class="bottom-gd fea p-5 my-3" data-aos="fade-left">
			
			<div>
				<p style="text-align: center; font-size: 150%; ">
					Bạn đã hoàn thành bài thi: {{$dethi->ten_de_thi}}<br>
				</p>
				<p style="text-align: center; font-size: 200%; color: red;">
					Điểm: {{$diem}}/{{$dethi->diem_toi_da}}
				</p>
			</div>	

		</div>
	</div>
</section>
<!-- //portfolio -->



@endsection