@extends('admin.layout.index')

@section('content') 
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Đề thi
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

                <form action="admin/dethi/sua/{{$dethi->id}}" method="POST">

                    <input type="hidden" name="_token" value="{{csrf_token()}}" />

                    <div class="form-group">
                        <label>Môn học</label>
                        <select  class="form-control" name="monhoc" id="monhoc">
                            @foreach($monhoc as $mh)
                            <option                              
                            @if($dethi->id_monhoc == $mh->id)
                            {{"selected"}}
                            @endif 
                            value="{{$mh->id}}">{{$mh->ten_mon_hoc}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Tên đề thi</label>
                        <input class="form-control" name="ten_de_thi" id="ten_de_thi" placeholder="Hãy nhập tên đề thi" value="{{$dethi->ten_de_thi}}"/>
                        @if ($errors->has('ten_de_thi'))
                        <div class="alert alert-danger" style="width: 755px; height: 40px; margin-top: 5px; ">{{ $errors->first('ten_de_thi') }}</div>
                        @endif                                
                    </div>  

                    <div class="form-group">
                        <label>Số câu hỏi</label>
                        <input class="form-control" name="so_cau_hoi" id="so_cau_hoi" placeholder="Hãy nhập số câu hỏi" value="{{$dethi->so_cau_hoi}}"/>
                        @if ($errors->has('so_cau_hoi'))
                        <div class="alert alert-danger" style="width: 755px; height: 40px; margin-top: 5px; ">{{ $errors->first('so_cau_hoi') }}</div>
                        @endif   
                    </div>

                    <div class="form-group">
                        <label>Điểm tối đa</label>
                        <input class="form-control" name="diem_toi_da" id="diem_toi_da" placeholder="Hãy nhập điểm tối đa" value="{{$dethi->diem_toi_da}}"/>
                        @if ($errors->has('diem_toi_da'))
                        <div class="alert alert-danger" style="width: 755px; height: 40px; margin-top: 5px; ">{{ $errors->first('diem_toi_da') }}</div>
                        @endif 
                    </div>

                    <div class="form-group">
                        <label>Thời gian</label>
                        <input class="form-control" name="thoi_gian" id="thoi_gian" placeholder="Hãy nhập thời gian" value="{{$dethi->thoi_gian}}"/>
                        @if ($errors->has('thoi_gian'))
                        <div class="alert alert-danger" style="width: 755px; height: 40px; margin-top: 5px; ">{{ $errors->first('thoi_gian') }}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Mật khẩu</label>
                        <input class="form-control" name="mat_khau" id="mat_khau" placeholder="Hãy nhập mật khẩu" value="{{$dethi->mat_khau}}"/>
                    </div>

                    <div class="form-group">
                        <label>Người tạo</label>
                        <input class="form-control" name="nguoi_tao" id="nguoi_tao" placeholder="Hãy nhập tên người tạo" value="{{$dethi->nguoi_tao}}"/>
                    </div>
                    
                    <a href="admin/dethi/danhsach" class="btn btn-danger">Trở lại</a>
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