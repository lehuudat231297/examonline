@extends('admin.layout.index')

@section('content') 
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Câu hỏi
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
                        <th>Đề thi</th>
                        <th>Nội dung</th>
                        <th>Phương án A</th>
                        <th>Phương án B</th>
                        <th>Phương án C</th>
                        <th>Phương án D</th>
                        <th>Phương án E</th>
                        <th>Độ khó</th>
                        <th>Đáp án</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cauhoi as $ch)
                    <tr class="odd gradeX" align="center">
                        <td>{{$ch->id}}</td>
                        <td>{{$ch->dethi->monhoc->ten_mon_hoc}}</td>
                        <td>{{$ch->dethi->ten_de_thi}}</td>
                        <td>
                            <p>{!!$ch->noi_dung!!}</p>
                            @if($ch->hinh_anh != "")
                            <img width="100px" src="upload/cauhoi/{{$ch->hinh_anh}}" />
                            @endif
                        </td>
                        <td>{{$ch->phuong_an_a}}</td>
                        <td>{{$ch->phuong_an_b}}</td>
                        <td>{{$ch->phuong_an_c}}</td>
                        <td>{{$ch->phuong_an_d}}</td>
                        <td>{{$ch->phuong_an_e}}</td>
                        <td>{{$ch->do_kho}}</td>
                        <td>{{$ch->dap_an}}</td>

                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/cauhoi/sua/{{$ch->id}}">Sửa</a></td>

                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/cauhoi/xoa/{{$ch->id}}">Xoá</a></td>                                          
                    </tr>
                    @endforeach                           
                    
                </tbody>
            </table>
            {{$cauhoi->links()}}
            <!-- Button trigger modal -->
        </div>
        <!-- /.row -->
    </div>


    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

<!-- jQuery -->


@endsection