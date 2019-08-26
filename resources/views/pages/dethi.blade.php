@extends('layout.index')

@section('content')

<section class="portfolio-flyer pt-5 pb-5" id="gallery" style="background-image: url(images/nogi.jpeg); background-repeat: no-repeat;background-attachment:fixed; background-position: center;">
	<div class="container py-lg-5">
		<h3 class="tittle text-uppercase text-center my-lg-5 my-3"><span class="sub-tittle"> Danh sách đề thi </span> {{$monhocchon->ten_mon_hoc}} </h3>

		<div class="container">
			<div class="tab-content" id="pills-tabContent">
				<div class="tab-pane fade show active" id="showall" role="tabpanel" aria-labelledby="showall-tab">
					@foreach($dethi as $dt)
					<div cclass="bottom-gd fea p-5 my-3" data-aos="fade-left" style="border: 5px"   id="{{$dt->id}}" >
						<div class="bottom-gd p-5"> 

							<h3 class="my-3"> <span class="fa fa-laptop" aria-hidden="true"></span>  {{$dt->ten_de_thi}} </h3>
							<p>Môn học: <span>{{$monhocchon->ten_mon_hoc}}</span> {{$dt->thoi_gian}} phút.  
								<span style="margin-left: 30px"> 
									Loại đề:
									@if($dt->mat_khau !=NULL)
									Có mật khẩu
									@else
									Miễn Phí
									@endif  
								</span>
							</p>  
						</div>
					</div>
					<br> 

					@endforeach
					{{$dethi->links()}}
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
</section>

@foreach($dethi as $dt)
<div class="bg-modal" id="bg-modal{{$dt->id}}"  style="position: fixed;">
	<div class= "modal-cont">
		@if(Auth::check())
			@if(isset(Auth::user()->email_verified_at))
			<div style="height: 40px;background-color: aqua;border-radius: 8px;">
				<span style="margin-top: 5px;font-size: 26px">{{$dt->ten_de_thi}}</span>
				<div  class="close12" id="close{{$dt->id}}" >+</div>
			</div>
			<div>
				<center>
					<div>
						Môn học: <span id="monhoc"></span>{{$monhocchon->ten_mon_hoc}}	
					</div>
					<div>
						Người tạo: <span id="nguoitao">{{$dt->nguoi_tao}}</span>					
					</div>
					<div>
						Điểm tối đa: <span id="max">{{$dt->diem_toi_da}}</span>
					</div>
				</center>
				<br>
				<form action="" >

					<div id="form">
						Mật khẩu: <input id="pass{{$dt->id}}" type="password" name="pas">
						<p id ="waring{{$dt->id}}" style="color: red; display: none;">Mật Khẩu không đúng</p>
					</div>
				</form>
				<br>
				<br>
				<br>
				<p>			
					<button id="cancer{{$dt->id}}" class="btn btn-danger">Thoát</button>
					<button id="start{{$dt->id}}" class="btn btn-success">Vào thi</button>							
				</p>
			</div>
			@else
			<div style="height: 40px;background-color: aqua;border-radius: 8px;">
			<span style="margin-top: 5px;font-size: 26px">Hãy xác thực tài khoản để làm bài thi</span>
			<div  class="close12" id="close{{$dt->id}}" >+</div>
			</div>
			<div>
			<p style="margin-top: 15px;">
				<button id="cancer{{$dt->id}}" class="btn btn-danger">Thoát</button>			
				<a href="xacthuc"><button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Xác thực</button></a>						
			</p>
		</div>	
		@endif	
		@else
		<div style="height: 40px;background-color: aqua;border-radius: 8px;">
			<span style="margin-top: 5px;font-size: 26px">Hãy đăng nhập để làm bài thi</span>
			<div  class="close12" id="close{{$dt->id}}" >+</div>
		</div>
		<div>
			<p style="margin-top: 15px;">
				<button id="cancer{{$dt->id}}" class="btn btn-danger">Thoát</button>			
				<a href="dangnhap"><button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Đăng nhập</button></a>						
			</p>
		</div>	
		@endif		              
	</div>		
</div>

<script type="text/javascript">
                        // var x=1;
                        document.getElementById('{{$dt->id}}').addEventListener('click',function(){
                        	document.getElementById('bg-modal{{$dt->id}}').style.display = 'flex';
		                          // var div = document.querySelector("#monhoc");
                            //      div.textContent = "{{$monhocchon->ten_mon_hoc}}" + ":";
                            //      var div1 = document.querySelector("#nguoitao");
                            //      div1.textContent = "{{$dt->nguoi_tao}}" + ":";
                            //      var div2 = document.querySelector("#max");
                            //      div2.textContent = "{{$dt->diem_toi_da}}" + ":";
		                         // display = document.querySelector('monhoc');

		                     });

                        document.getElementById('close{{$dt->id}}').addEventListener('click',function(){
                        	document.getElementById('bg-modal{{$dt->id}}').style.display = 'none';
                        	document.getElementById('waring{{$dt->id}}').style.display = 'none';
                        });
                        document.getElementById('cancer{{$dt->id}}').addEventListener('click',function(){
                        	document.getElementById('bg-modal{{$dt->id}}').style.display = 'none';
                        	document.getElementById('waring{{$dt->id}}').style.display = 'none';
                        });

                        var type = '{{$dt->mat_khau}}';
                        var count = type.length;

                        if (count==0) {
                        	document.getElementById("form").style.display = 'none';
                        	document.getElementById('start{{$dt->id}}').addEventListener('click',function(){
                        		window.location="cauhoi/{{$dt->id}}";
                        	});

                        }

                        else if (count >0) {}{
                        	document.getElementById('start{{$dt->id}}').addEventListener('click',function(){
                        		var password = document.getElementById('pass{{$dt->id}}').value;
                                   //alert(password);
                                   if(type==password){

                                   	window.location="cauhoi/{{$dt->id}}";
                                   }else {
                                   	document.getElementById('waring{{$dt->id}}').style.display = 'flex';
                                   }
                               });
                        }

                    </script>		

                    @endforeach           

                    @endsection

                    @section('css')
                    <link rel="stylesheet" type="text/css" href="css/nhapmk.css">
                    @endsection

