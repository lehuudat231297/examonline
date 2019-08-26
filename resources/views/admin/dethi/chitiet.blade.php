@extends('admin.layout.index')

@section('content') 
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Đề thi
                    <small>{{$dethi->ten_de_thi}}</small>
                </h1>
            </div>
            <!-- /.col-lg-12 --> 

            @if($schHT < $sch)
                <dir>
                    <a class="btn btn-success" href="admin/cauhoi/them/{{$dethi->id}}">Thêm câu hỏi</a>
                </dir>
                <div style="margin-left: 5%; margin-top: 2%; font-weight: bold;">Số câu hỏi: {{$schHT}}/{{$sch}}</div>
            @else
                <div style="margin-left: 5%; margin-top: 1%; font-weight: bold; margin-bottom: 1%;">Số câu hỏi: {{$sch}}/{{$sch}}</div>
            @endif

            @if(session('thongbaoxoa'))
            <div class="alert alert-success" style="margin-left: 15%;">
                {{session('thongbaoxoa')}}
            </div>
            @endif

            @if(session('thongbaosua'))
            <div class="alert alert-success" style="margin-left: 15%;">
                {{session('thongbaosua')}}
            </div>
            @endif

            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID câu hỏi</th>
                        <th>Nội dung</th>
                        <th>Phương án A</th>
                        <th>Phương án B</th>
                        <th>Phương án C</th>
                        <th>Phương án D</th>
                        <th>Phương án E</th>
                        <th>Độ khó</th>
                        <th>Đáp án</th>
                        <th>Sửa</th>
                        <th>Xoá</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cauhoi as $ch)
                    
                    <tr class="odd gradeX" align="center">
                        <td>{{$ch->id}}</td>                       
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
            <!-- Button trigger modal -->
        </div>
        {{$cauhoi->links()}}
        <!-- /.row -->
    </div>
    <a style="margin-left: 2%;" href="admin/dethi/danhsach" class="btn btn-danger">Trở lại</a>


    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

<!-- jQuery -->


@endsection