@extends('admin.layout.index')

@section('content') 
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thí sinh
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
                        <th>Họ tên</th> 
                        <th>Ảnh đại diện</th>              
                        <th>Email</th>
                        <th>Xác nhận email</th>
                        <th>Ngày sinh</th>   
                        <th>Giới tính</th> 
                        <th>Địa chỉ</th> 
                        <th>Số điện thoại</th>              
                        <th>Ngày tạo</th>
                        <th>Cập nhật lúc</th>
                        <!-- <th>Sửa</th> -->
                        <th>Kết quả</th>
                        <th>Xoá</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($user as $u)
                    <tr class="odd gradeX" align="center">
                        <td>{{$u->id}}</td>
                        <td>{{$u->name}}</td>
                        <td>@if(isset($u->hinh_anh))<img style="width: 100px;" src="upload/thisinh/{{$u->hinh_anh}}">@else Chưa có @endif</td>
                        <td>{{$u->email}}</td>
                        <td>{{$u->email_verified_at}}</td>
                        <td>{{$u->ngay_sinh}}</td>

                        @if($u->gioi_tinh==0)
                        <td>{{"Nam"}}</td>
                        @elseif($u->gioi_tinh==1)
                        <td>{{"Nữ"}}</td>
                        @endif

                        <td>{{$u->dia_chi}}</td>

                        <td>{{$u->so_dien_thoai}}</td>

                        <td>{{$u->created_at}}</td>
                        <td>{{$u->updated_at}}</td>

                        <!-- <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/user/sua/{{$u->id}}">Sửa</a></td> -->

                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a   href="admin/user/ketqua/{{$u->id}}">Kết_quả</a></td>

                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/user/xoa/{{$u->id}}">Xoá</a></td>
                    
                    </tr>
                    @endforeach                           

                </tbody>
            </table>
            {{$user->links()}}
            <!-- Button trigger modal -->
        </div>
        <!-- /.row -->
    </div>


    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

<!-- jQuery -->


@endsection