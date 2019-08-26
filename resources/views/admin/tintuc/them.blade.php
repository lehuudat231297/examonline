@extends('admin.layout.index') 

@section('content') 
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tin Tức
                    <small> Thêm</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">

                @if(session('thongbao'))
                <div class="alert alert-success">
                    {{session('thongbao')}}
                </div>
                @endif

                <form action="admin/tintuc/them" method="POST"  enctype="multipart/form-data">

                    <input type="hidden" name="_token" value="{{csrf_token()}}" />

                    <div class="form-group">
                        <label>Tiêu Đề</label>
                        <input class="form-control" name="tieu_de" placeholder="Hãy nhập Tiêu Đề"  />
                        @if ($errors->has('tieu_de'))
                        <p class="alert alert-danger" >{{ $errors->first('tieu_de') }}</p>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Hình Ảnh</label>
                        <input type="file" name="hinh_anh" id="hinh_anh" class="form-control"/>

                    </div>

                    <div  class="form-group">
                        <label>Nội Dung</label>
                        <!-- <input class="form-control" name="noi_dung" placeholder="Hãy nhập nội dung" /> -->
                        <textarea name="noi_dung" class="form-control ckeditor" tabindex="9" rows="5" required ="required" placeholder="Nhập nội dung"></textarea>
                        @if ($errors->has('noi_dung'))
                        <p class="alert alert-danger" >{{ $errors->first('noi_dung') }}</p>
                        @endif
                    </div>

                    <a href="admin/tintuc/danhsach" class="btn btn-danger">Trở lại</a>
                    <button type="submit" class="btn btn-success">Tạo mới</button>
                    <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

        @endsection