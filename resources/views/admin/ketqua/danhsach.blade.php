@extends('admin.layout.index')

@section('content') 
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Kết quả
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
                        <th>Thí sinh</th>
                        <th>Đề thi</th>
                        <th>Điểm</th>
                        <th>Ngày thi</th>
                        <th>Xoá</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ketqua as $kq)
                    <tr class="odd gradeX" align="center">
                        <td>{{$kq->id}}</td>
                        <td>{{$kq->user->email}}</td>
                        <td>{{$kq->dethi->ten_de_thi}}</td>
                        <td>{{$kq->diem}}</td>
                        <td>{{$kq->created_at}}</td>

                       <!--  <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/ketqua/sua/{{$kq->id}}">Sửa</a></td> -->

                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/ketqua/xoa/{{$kq->id}}">Xoá</a></td>                                          
                    </tr>
                    @endforeach                           

                </tbody>
            </table>
            {{$ketqua->links()}}
            <!-- Button trigger modal -->
        </div>
        <!-- /.row -->
    </div>


    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

<!-- jQuery -->


@endsection