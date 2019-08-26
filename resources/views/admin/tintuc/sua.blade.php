@extends('admin.layout.index')

@section('content') 
<!-- Page Content -->
<div id="page-wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Tin Tức
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

        <form action="admin/tintuc/sua/{{$tintuc->id}}" method="POST" enctype="multipart/form-data">

          <input type="hidden" name="_token" value="{{csrf_token()}}" />

          <div class="form-group">
            <label>Tiêu Đề</label>
            <input class="form-control" name="tieu_de" placeholder="Hãy nhập tiêu đề" value="{{$tintuc->tieu_de}}" />
            @if ($errors->has('tieu_de'))
            <p class="alert alert-danger" >{{ $errors->first('tieu_de') }}</p>
            @endif
          </div>

          <div class="form-group">
            <label>Hình Ảnh</label>
            @if($tintuc->hinh_anh != "")
            <p> 
              <img width="100px" src="upload/tintuc/{{$tintuc->hinh_anh}}" />
            </p>
            @endif
            <input type="file" name="hinh_anh" id="hinh_anh" class="form-control" />
            @if(session('loihinhanh'))
            <div class="alert alert-danger">
              {{session('loihinhanh')}}
            </div>
            @endif

          </div>

          <div  class="form-group">
            <label>Nội Dung</label>
            
            <textarea name="noi_dung" class="form-control ckeditor" tabindex="9" rows="5" placeholder="Nhập nội dung" >{{$tintuc->noi_dung}}</textarea>
            @if ($errors->has('noi_dung'))
            <p class="alert alert-danger" >{{ $errors->first('noi_dung') }}</p>
            @endif
          </div>
          
          <a href="admin/tintuc/danhsach" class="btn btn-danger">Trở lại</a>
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