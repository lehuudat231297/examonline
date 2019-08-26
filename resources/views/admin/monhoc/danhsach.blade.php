@extends('admin.layout.index')

@section('content') 
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Môn học
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
                        <th>Sửa</th>
                        <th>Xoá</th>                   
                    </tr>
                </thead>
                <tbody>
                    @foreach($monhoc as $mh)
                    <tr class="odd gradeX" align="center">
                        <td>{{$mh->id}}</td>
                        <td>{{$mh->ten_mon_hoc}}</td>
                    
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/monhoc/sua/{{$mh->id}}">Sửa</a></td>

                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/monhoc/xoa/{{$mh->id}}">Xoá</a></td>                                        
                    </tr>
                    @endforeach                           
                </tbody>           
            </table>
            {{$monhoc->links()}}
            <!-- Button trigger modal -->
        </div>
        <!-- /.row -->
    </div>


    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

<!-- jQuery -->


@endsection