@extends('admin.layout.index') 

@section('content') 
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Môn học
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

                        <!--<script>
                            function check() {
                              var tmh = document.getElementById("ten_mon_hoc");                            
                              if(tmh.value != "") {                              
                                return true;                               
                              } else {
                                alert("Dư liệu không được để trống");
                                return false;
                              } 
                            }
                        </script> -->              

                        <form action="admin/monhoc/them" onsubmit="return check()" method="POST">

                            <input type="hidden" name="_token" value="{{csrf_token()}}" />

                            <div class="form-group">
                                <label>Tên môn học</label>
                                <input class="form-control" name="ten_mon_hoc" id="ten_mon_hoc" placeholder="Hãy nhập tên môn học" />
                                @if ($errors->has('ten_mon_hoc'))
                                <div class="alert alert-danger" style="width: 755px; height: 40px; margin-top: 5px; ">{{ $errors->first('ten_mon_hoc') }}</div>
                                @endif  
                            </div>                    

                            <a href="admin/monhoc/danhsach" class="btn btn-danger">Trở lại</a>
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