@extends('admin.layout.index') 

@section('content') 
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Kết Quả
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

                <form action="admin/ketqua/them" onsubmit="return validate()" method="POST" enctype="multipart/form-data">

                    <input type="hidden" name="_token" value="{{csrf_token()}}" />

                    <div class="form-group">
                        <label>Thí Sinh</label>
                        <select class="form-control" name="id_users">
                            @foreach($user as $u)
                            <option value="{{$u->id}}">{{$u->email}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Đề thi</label>
                        <select class="form-control" name="id_dethi" id="dethi">
                            @foreach($dethi as $dt)
                            <option value="{{$dt->id}}">{{$dt->ten_de_thi}}</option>
                            @endforeach
                        </select>
                    </div> 

                    <div class="form-group">
                        <label>Điểm</label>
                        <input class="form-control" name="diem"  placeholder="Hãy nhập số điểm" /> 
                    </div>

                    <div class="form-group">
                        <label>Ngày Thi</label>
                        <input class="form-control" name="ngay_thi"  placeholder="Hãy nhập Ngày thi" />

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

        @section('script')
        <script type="text/javascript">
            $(document).ready(function() {
                $('#monhoc').change(function() {
                    var id_monhoc = $(this).val();
                    $.get("admin/ajax/dethi/"+id_monhoc, function(data) {
                        $("#dethi").html(data);
                    });
                });
            });
        </script>
        @endsection