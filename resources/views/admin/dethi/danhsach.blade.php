@extends('admin.layout.index')

@section('content') 
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Đề thi
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
                        <th>Môn học</th>
                        <th>Tên đề thi</th>
                        <th>Số câu hỏi</th>
                        <th>Điểm tối đa</th>
                        <th>Thời gian</th>
                        <th>Mật khẩu</th>
                        <th>Người tạo</th>
                        <th>Ngày tạo</th>
                        <th>Cập nhật lúc</th>
                        <th>Chi tiết</th>
                        <th>Sửa</th>
                        <th>Xoá</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dethi as $dt)
                    <tr class="odd gradeX" align="center">
                        <td>{{$dt->id}}</td>
                        <td>{{$dt->monhoc->ten_mon_hoc}}</td>
                        <td>{{$dt->ten_de_thi}}</td>
                        <td>{{$dt->so_cau_hoi}}</td>
                        <td>{{$dt->diem_toi_da}}</td>
                        <td>{{$dt->thoi_gian}}</td>
                        <td>{{$dt->mat_khau}}</td>
                        <td>{{$dt->nguoi_tao}}</td>
                        <td>{{$dt->created_at}}</td>
                        <td>{{$dt->updated_at}}</td>

                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/dethi/chitiet/{{$dt->id}}">Chi_tiết</a></td>

                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/dethi/sua/{{$dt->id}}">Sửa</a></td>

                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/dethi/xoa/{{$dt->id}}">Xoá</a></td>                                          
                    </tr>
                    @endforeach                                          
                </tbody>
            </table>
            {{ $dethi->links() }}
            
            <!-- Button trigger modal -->
        </div>
        <!-- /.row -->
    </div>


    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

<!-- jQuery -->


@endsection