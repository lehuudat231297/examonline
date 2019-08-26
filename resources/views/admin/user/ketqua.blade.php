@extends('admin.layout.index')

@section('content') 
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Kết quả
                </h1>
                <div style="margin-left: 3%; margin-bottom: 1%; text-align: center; font-weight: bold; font-size: 20px;">
                    Thí sinh: {{$user->name}}
                </div>
            </div>
            <!-- /.col-lg-12 -->

            @if(session('thongbaoxoa'))
            <div class="alert alert-success">
                {{session('thongbaoxoa')}}
            </div>
            @endif

            <table class="table table-striped table-bordered table-hover" id="dataTables-example" border="5">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Đề thi</th>
                        <th>Điểm</th>
                        <th>Ngày thi</th>
                        <th>Xoá</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ketqua as $k)
                    <tr class="odd gradeX" align="center">
                        <td>{{$k->id}}</td>
                        <td>{{$k->dethi->ten_de_thi}}</td>
                        <td>{{$k->diem}}</td>
                        <td>{{$k->created_at}}</td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/user/xoaKQ/{{$k->id}}">Xoá</a></td>
                    </tr>
                    @endforeach                        
                </tbody>
            </table>
            {{ $ketqua->links() }}
            <!-- Button trigger modal -->

        </div>
        <a href="admin/user/danhsach" class="btn btn-danger">Trở lại</a>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

@endsection