@extends('layout.index')

@section('content')

<!-- portfolio -->
<section class="portfolio-flyer pt-5 pb-5" id="gallery">

	<div class="container py-lg-5">
		<h1 class="tittle text-uppercase text-center my-lg-5 my-3"><span class="sub-tittle"> Kết quả thi </span></h1>
		@if(isset($ketqua))
			@foreach($ketqua as $kq)

			<div class="bottom-gd fea p-5 my-3" data-aos="fade-left">
				<div>
					<p style="text-align: center; font-size: 150%; ">
						{{$kq->dethi->ten_de_thi}}<br>
					</p>
					<p style="text-align: center; font-size: 200%; color: red;">
						Điểm: {{$kq->diem}}
					</p>
					<p style="float: right;">Thời gian thi: {{$kq->created_at}}</p>
				</div>
			</div>

			@endforeach
		@else
			<center>
				<h1 style="color: red;">
					Bạn chưa có kết quả thi nào <br>Hãy vào làm bài thi để có kết quả thi
				</h1>
			</center>
		@endif

	</div>
</section>
<!-- //portfolio -->



@endsection