@extends('admin.layout.index')

@section('content') 
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Môn học
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

                <form action="admin/monhoc/sua/{{$monhoc->id}}" method="POST">

                    <input type="hidden" name="_token" value="{{csrf_token()}}" />

                    <div class="form-group">
                        <label>Tên môn học</label>
                        <input class="form-control" name="ten_mon_hoc" placeholder="Hãy nhập tên môn học" value="{{$monhoc->ten_mon_hoc}}" />
                        @if ($errors->has('ten_mon_hoc'))
                        <div class="alert alert-danger" style="width: 755px; height: 40px; margin-top: 5px; ">{{ $errors->first('ten_mon_hoc') }}</div>
                        @endif  
                    </div>

                    <a href="admin/monhoc/danhsach" class="btn btn-danger">Trở lại</a>
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