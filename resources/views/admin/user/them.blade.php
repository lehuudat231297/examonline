@extends('admin.layout.index') 

@section('content') 
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thí sinh
                    <small>Thêm</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">

                @if(session('thongbao'))
                <div class="alert alert-success">
                    {{session('thongbao')}}
                </div>
                @endif               

                <form action="admin/user/them" method="POST">

                    <input type="hidden" name="_token" value="{{csrf_token()}}" />                          
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Hãy nhập email" />
                        @if ($errors->has('email'))
                        <div class="alert alert-danger" style="width: 755px; height: 40px; margin-top: 5px; ">{{ $errors->first('email') }}</div>
                        @endif  
                    </div>                        

                    <div class="form-group">
                        <label>Mật khẩu</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Hãy nhập mật khẩu" />
                        @if ($errors->has('password'))
                        <div class="alert alert-danger" style="width: 755px; height: 40px; margin-top: 5px; ">{{ $errors->first('password') }}</div>
                        @endif  
                    </div>

                    <div class="form-group">
                        <label>Họ tên</label>
                        <input class="form-control" name="ten" id="ten" placeholder="Hãy nhập họ tên" />
                        @if ($errors->has('ten'))
                        <div class="alert alert-danger" style="width: 755px; height: 40px; margin-top: 5px; ">{{ $errors->first('ten') }}</div>
                        @endif    
                    </div>

                    <div class="form-group">
                        <label>Ngày sinh</label>
                        <label class="date">                                   
                            <select name="day">
                                @for($d=1;$d<=31;$d++)
                                <option value="{{$d}}">{{$d}}</option>
                                @endfor
                            </select>                                    
                        </label>
                        <label class="date">                                     
                            <select name="month">
                                @for($m=1;$m<=12;$m++)
                                <option value="{{$m}}">{{$m}}</option>
                                @endfor
                            </select>                                    
                        </label>
                        <label class="date">                                    
                            <select name="year">
                                @for($y=1975;$y<=2019;$y++)
                                <option value="{{$y}}">{{$y}}</option>
                                @endfor
                            </select>                                   
                        </label>
                    </div>

                    <div class="form-group">
                        <label>Giới tính</label>
                        <label class="radio-inline">
                            <input name="gioi_tinh" value="0" checked="checked" type="radio">Nam
                        </label>
                        <label class="radio-inline">
                            <input name="gioi_tinh" value="1" type="radio">Nữ
                        </label> 
                    </div>

                    <div class="form-group">
                        <label>Địa chỉ</label>
                        <input class="form-control" name="dia_chi" id="dia_chi" placeholder="Hãy nhập địa chỉ" />
                        @if ($errors->has('dia_chi'))
                        <div class="alert alert-danger" style="width: 755px; height: 40px; margin-top: 5px; ">{{ $errors->first('dia_chi') }}</div>
                        @endif  
                    </div>

                    <div class="form-group">
                        <label>Số điện thoại</label>
                        <input class="form-control" name="so_dien_thoai" id="so_dien_thoai" placeholder="Hãy nhập số điện thoại" />
                        @if ($errors->has('so_dien_thoai'))
                        <div class="alert alert-danger" style="width: 755px; height: 40px; margin-top: 5px; ">{{ $errors->first('so_dien_thoai') }}</div>
                        @endif  
                    </div>

                    <button type="submit" class="btn btn-default">Tạo mới</button>                       

                    <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

        @endsection