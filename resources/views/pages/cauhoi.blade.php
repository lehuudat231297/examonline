@extends('layout.index')

@section('content')

<!-- portfolio -->
<section class="portfolio-flyer pt-5 pb-5" id="gallery">

	<div style="width: 12%; height: 8%; margin-top: 13%; margin-left: 2.5%; position: fixed; color: red; font-size: 50px; background-color: #00CC33; font-weight: bold; text-align: center;" id="timer" class="fa fa-clock-o">00:00:00</div>
	
	<div id="tabLink" style="width: 175px; position: fixed; margin-top: 18%; margin-left: 2.5%;">			
		<?php $i=1; ?>
		@foreach($dethi->cauhoi as $ch)
		<div style="float: left; width: 35px; padding: 2px;">
			<a href="cauhoi/{{$dethi->id}}#cau{{$i}}"><button style="width: 100%; text-align: center;">{{$i}}</button></a>
		</div>
		<?php $i++; ?>
		@endforeach
		
	</div>

	<div class="container py-lg-5">
		<h3 class="tittle text-uppercase text-center my-lg-5 my-3" id="cau1"><span class="sub-tittle"> Đề thi </span>{{$dethi->ten_de_thi}}</h3>

		<form action="cauhoi/{{$dethi->id}}" method="POST">
			<input type="hidden" name="_token" value="{{csrf_token()}}" />

			<?php $i=1; ?>
			@foreach($dethi->cauhoi as $ch)

			<div class="bottom-gd fea p-5 my-3" data-aos="fade-left" style="margin-left: 60px;">
				<tr>
					<th>
						<p style="font-weight: bold; color: black; font-size: 15px;">Câu hỏi {{$i}}: {!!$ch->noi_dung!!}</p> 

						<input style="margin-left: 3%;" type="radio" name="{{$i}}" id="{{$i}}" value="{{$ch->phuong_an_a}}">
						<label for="{{$i}}">{!!$ch->phuong_an_a!!}</label>

						<input style="margin-left: 3%;" type="radio" name="{{$i}}" id="{{$i}}" value="{{$ch->phuong_an_b}}">
						<label for="{{$i}}">{!!$ch->phuong_an_b!!}</label>

						@if(isset($ch->phuong_an_c))
						<input style="margin-left: 3%;" type="radio" name="{{$i}}" id="{{$i}}" value="{{$ch->phuong_an_c}}">
						<label for="{{$i}}">{!!$ch->phuong_an_c!!}</label>
						@endif

						@if(isset($ch->phuong_an_d))
						<input style="margin-left: 3%;" type="radio" name="{{$i}}" id="{{$i}}" value="{{$ch->phuong_an_d}}">
						<label for="{{$i}}">{!!$ch->phuong_an_d!!}</label>
						@endif

						@if(isset($ch->phuong_an_e))
						<input style="margin-left: 3%;" type="radio" name="{{$i}}" id="{{$i}}" value="{{$ch->phuong_an_e}}">
						<label for="{{$i}}">{!!$ch->phuong_an_e!!}</label>
						@endif	
					</th>		

					<th>
						@if(isset($ch->hinh_anh))
						<img style="margin-left: 30%;" width="30%" src="upload/cauhoi/{{$ch->hinh_anh}}">
						@endif								
					</th>
					<div id="cau{{$i+1}}"></div>
				</tr>	

			</div>

			<?php $i++; ?>
			@endforeach

			<center>
				<button style="margin-top: 50px; width: 20%; height: 15%;" na type="submit" class="btn btn-success" id="nopbai">
					Nộp bài
				</button>
			</center>

		</form>
	</div>
</section>
<!-- //portfolio -->

@endsection

@section('script')

<script>
	var timeoutHandle;
	function countdown(minutes,stat) {
		var seconds = 60;
		var mins = minutes;

		if(getCookie("minutes")&&getCookie("seconds")&&stat)
		{
			var seconds = getCookie("seconds");
			var mins = getCookie("minutes");
		}

		function tick() {

			var counter = document.getElementById("timer");
			setCookie("minutes",mins,10)
			setCookie("seconds",seconds,10)
			var current_minutes = mins-1
			seconds--;
			counter.innerHTML = 
			current_minutes.toString() + ":" + (seconds < 10 ? "0" : "") + String(seconds);
            //save the time in cookie

            if( seconds > 0 ) {
            	timeoutHandle=setTimeout(tick, 1000);
            } else {

            	if(mins > 1){  
            		setTimeout(function () { countdown(parseInt(mins)-1,false); }, 1000);

            	}
            }
        }
        tick();
    }

    function setCookie(cname,cvalue,exdays) {
    	var d = new Date();
    	d.setTime(d.getTime() + (exdays*24*60*60*1000));
    	var expires = "expires=" + d.toGMTString();
    	document.cookie = cname+"="+cvalue+"; "+expires;
    }

    function getCookie(cname) {
    	var name = cname + "=";
    	var ca = document.cookie.split(';');
    	for(var i=0; i<ca.length; i++) {
    		var c = ca[i];
    		while (c.charAt(0)==' ') c = c.substring(1);
    		if (c.indexOf(name) == 0) {
    			return c.substring(name.length, c.length);
    		}
    	}
    	return "";
    }

    window.onload = function startingTimer(){
        //countdown(prompt("Enter how many minutes you want to count down:"),true);
        var timeout = <?php echo $tg; ?>;
        countdown(timeout,true); 


    }
</script>

@endsection