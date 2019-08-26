@extends('admin.layout.index')

@section('content') 
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Quản trị
                    <small>Sửa</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">

                @if(session('thongbaosua'))
                <div class="alert alert-success">
                    {{session('thongbaosua')}}
                </div>
                @endif

                <form action="admin/quantri/sua/{{$quantri->id}}" method="POST">

                    <input type="hidden" name="_token" value="{{csrf_token()}}" />

                    <div class="form-group">
                        <label>Tài khoản</label>
                        <input class="form-control" name="tai_khoan" placeholder="Hãy nhập tài khoản" value="{{$quantri->tai_khoan}}" readonly="" />
                        @if ($errors->has('tai_khoan'))
                        <div class="alert alert-danger" style="width: 755px; height: 40px; margin-top: 5px; ">{{ $errors->first('tai_khoan') }}</div>
                        @endif  
                    </div>

                    <div class="form-group">
                        <input type="checkbox" name="changePassword" id="changePassword">

                        <label>Đổi mật khẩu</label>
                        <input type="password" class="form-control password" name="password" disabled="" />
                        @if ($errors->has('password'))
                        <div class="alert alert-danger" style="width: 755px; height: 40px; margin-top: 5px; ">{{ $errors->first('password') }}</div>
                        @endif  
                    </div>

                    <div class="form-group">
                        <label>Nhập lại mật khẩu:</label>
                        <input type="password" class="form-control password" name="passwordAgain" disabled="" />
                        @if ($errors->has('passwordAgain'))
                        <div class="alert alert-danger" style="width: 100%; height: 15%; margin-top: 5px; ">{{ $errors->first('passwordAgain') }}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Họ tên</label>
                        <input class="form-control" name="ho_ten" placeholder="Hãy nhập họ tên" value="{{$quantri->ho_ten}}"/>
                        @if ($errors->has('ho_ten'))
                        <div class="alert alert-danger" style="width: 755px; height: 40px; margin-top: 5px; ">{{ $errors->first('ho_ten') }}</div>
                        @endif  
                    </div>

                    <div class="form-group">
                        <label>Ngày sinh</label>
                        <label class="date">                                   
                            <select name="day">
                                <option selected="selected">{{substr( $quantri->ngay_sinh,  8, 2)}}</option>
                                @for($d=1;$d<=31;$d++)
                                <option value="{{$d}}">{{$d}}</option>
                                @endfor
                            </select>                                    
                        </label>
                        <label class="date">                                     
                            <select name="month">
                                <option selected="selected">{{substr( $quantri->ngay_sinh,  5, 2)}}</option>
                                @for($m=1;$m<=12;$m++)
                                <option value="{{$m}}">{{$m}}</option>
                                @endfor
                            </select>                                    
                        </label>
                        <label class="date">                                    
                            <select name="year">
                                <option selected="selected">{{substr( $quantri->ngay_sinh,  0, 4)}}</option>
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
                            @if($quantri->gioi_tinh==0)
                            {{"checked"}}
                            @endif
                            >Nam
                        </label>
                        <label class="radio-inline">
                            <input name="gioi_tinh" value="1" type="radio"
                            @if($quantri->gioi_tinh==1)
                            {{"checked"}}
                            @endif
                            >Nữ
                        </label>
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Hãy nhập Email" value="{{$quantri->email}}"/>
                        @if ($errors->has('email'))
                        <div class="alert alert-danger" style="width: 755px; height: 40px; margin-top: 5px; ">{{ $errors->first('email') }}</div>
                        @endif  
                    </div>

                    <div class="form-group">
                        <label>Số điện thoại</label>
                        <input class="form-control" name="so_dien_thoai" placeholder="Hãy nhập số điện thoại" value="{{$quantri->so_dien_thoai}}"/>
                        @if ($errors->has('so_dien_thoai'))
                        <div class="alert alert-danger" style="width: 755px; height: 40px; margin-top: 5px; ">{{ $errors->first('so_dien_thoai') }}</div>
                        @endif  
                    </div>

                    <div class="form-group">
                        <label>Địa chỉ</label>
                        <input class="form-control" name="dia_chi" placeholder="Hãy nhập địa chỉ" value="{{$quantri->dia_chi}}"/>
                        @if ($errors->has('dia_chi'))
                        <div class="alert alert-danger" style="width: 755px; height: 40px; margin-top: 5px; ">{{ $errors->first('dia_chi') }}</div>
                        @endif  
                    </div>

                    <div class="form-group">
                        <label>Quyền người dùng</label>
                        
                        <label class="radio-inline">
                            <input type="radio" name="quyen" value="1"
                            @if($quantri->quyen == 1)
                            {{"checked"}}
                            @endif
                            >Quản trị
                        </label>
                                     
                    </div>

                    <a href="admin/quantri/danhsach" class="btn btn-danger">Trở lại</a>
                    <button type="submit" class="btn btn-success">Sửa</button>

                    <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
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