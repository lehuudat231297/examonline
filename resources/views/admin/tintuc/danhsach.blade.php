@extends('admin.layout.index')

@section('content') 
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tin tức
                    <small>Danh sách</small>
                </h1>
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
                        <th>Tiêu Đề</th>
                        <th>Nội Dung</th>
                        <th>Hình Ảnh</th>
                        <th>Ngày Đăng</th>
                        <th>Cập nhật lúc</th>
                        <th>Sửa</th>
                        <th>Xoá</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($tintuc as $tt)
                    <tr class="odd gradeX" align="center">
                        <td>{{$tt->id}}</td>
                        <td>{{$tt->tieu_de}}</td>
                        <td width="50%">{!!$tt->noi_dung!!}</td>
                        <td>
                         @if($tt->hinh_anh != "")
                         <img width="100px" src="upload/tintuc/{{$tt->hinh_anh}}" />
                         @endif
                     </td>

                     <td>{{$tt->created_at}}</td>
                     <td>{{$tt->updated_at}}</td>

                     <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/tintuc/sua/{{$tt->id}}">Sửa</a>
                     </td>
                     <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/tintuc/xoa/{{$tt->id}}"> Xoá</a>
                     </td>
                 </tr>
                 @endforeach                      

             </tbody>
         </table>
         {{$tintuc->links()}}
         <!-- Button trigger modal -->
     </div>
     <!-- /.row -->
 </div>
 <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

<!-- jQuery -->
<script src="admin_asset/z/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="admin_asset/z/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="admin_asset/z/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="admin_asset/z/sb-admin-2.js"></script>

<!-- DataTables JavaScript -->
<script src="admin_asset/z/jquery.dataTables.min.js"></script>
<script src="admin_asset/z/dataTables.bootstrap.min.js"></script>

<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
</script>
@endsection