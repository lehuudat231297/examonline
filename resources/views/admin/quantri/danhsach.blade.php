@extends('admin.layout.index')

@section('content') 
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Quản trị
                    <small>Danh sách</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->

            @if(session('thongbaoxoa'))
            <div class="alert alert-success">
                {{session('thongbaoxoa')}}
            </div>
            @endif

            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Tài khoản</th>
                        <th>Quyền</th>
                        <th>Họ tên</th>
                        <th>Ngày sinh</th>
                        <th>Giới tính</th>
                        <th>Email</th>
                        <th>Số điện thoại</th>
                        <th>Địa chỉ</th>
                        <!-- <th>Ngày tạo</th>
                            <th>Thời gian sửa gần nhất</th> -->
                            @if(Auth::guard('quantri')->user()->quyen == 0)
                            <th>Sửa</th>
                            <th>Xoá</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($quantri as $qt)
                        <tr class="odd gradeX" align="center">
                            @if($qt->quyen == 1)
                            <td>{{$qt->id}}</td>

                            <td>{{$qt->tai_khoan}}</td>

                            <td>
                                @if($qt->quyen == 0)
                                {{"Siêu quản trị"}}                          
                                @else
                                {{"Quản trị"}}
                                @endif
                            </td>

                            <td>{{$qt->ho_ten}}</td>

                            <td>{{$qt->ngay_sinh}}</td>

                            @if($qt->gioi_tinh==0)
                            <td>{{"Nam"}}</td>
                            @elseif($qt->gioi_tinh==1)
                            <td>{{"Nữ"}}</td>
                            @endif

                            <td>{{$qt->email}}</td>

                            <td>{{$qt->so_dien_thoai}}</td>

                            <td>{{$qt->dia_chi}}</td>                       

                            <!-- <td>{{$qt->created_at}}</td>
                        
                            <td>{{$qt->updated_at}}</td> -->

                            @if(Auth::guard('quantri')->user()->quyen == 0)
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/quantri/sua/{{$qt->id}}">Sửa</a></td>

                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/quantri/xoa/{{$qt->id}}">Xoá</a></td>
                            @endif

                            @endif

                        </tr>
                        @endforeach                           

                    </tbody>
                </table>
                {{$quantri->links()}}

                <!-- Button trigger modal -->
            </div>
            <!-- /.row -->
        </div>


        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->

    <!-- jQuery -->


    @endsection