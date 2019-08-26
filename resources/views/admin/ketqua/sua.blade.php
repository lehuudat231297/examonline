@extends('admin.layout.index')

@section('content') 
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Kết quả
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

                <form action="admin/ketqua/sua/{{$ketqua->id}}" method="POST" enctype="multipart/form-data">

                    <input type="hidden" name="_token" value="{{csrf_token()}}" />

                    <div class="form-group">
                        <label>Thí Sinh </label>
                        <select class="form-control" name="id_users">
                            <option value="{{$ketqua->user->id}}">{{$ketqua->user->email}}</option>
                            @foreach($user as $u)
                            <option value="{{$u->id}}">{{$u->ho_ten}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Đề thi</label>
                        <select class="form-control" name="id_dethi" id="dethi">
                            <option value="{{$ketqua->dethi->id}}">{{$ketqua->dethi->ten_de_thi}}</option>
                            @foreach($dethi as $dt)
                            <option value="{{$dt->id}}">{{$dt->ten_de_thi}}</option>
                            @endforeach
                        </select>
                    </div> 

                    <div class="form-group">
                        <label>Điểm</label>
                        <input class="form-control" name="diem"  placeholder="Hãy nhập số điểm" 
                        value="{{$ketqua->diem}}" /> 
                    </div>

                    <div class="form-group">
                        <label>Ngày Thi</label>
                        <input class="form-control" name="ngay_thi"  placeholder="Hãy nhập Ngày thi" 
                        value="{{$ketqua->ngay_thi}}" />

                    </div>

                    <a href="admin/ketqua/danhsach" class="btn btn-danger">Trở lại</a>
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