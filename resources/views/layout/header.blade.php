<!-- header -->
<header class="py-1">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <h1>
                <a class="navbar-brand" href="trangchu"><i class="fa fa-ravelry" aria-hidden="true"> EXAM ONLINE</i></a>
            </h1>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                @if(Auth::check())
                   
                    <ul class="navbar-nav ml-4 m-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="trangchu">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Chọn đề thi <i class="fa fa-angle-down" aria-hidden="true"></i>
                          </a>

                          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @foreach($monhoc as $mh)
                            <a class="dropdown-item" href="dethi/{{$mh->id}}">{{$mh->ten_mon_hoc}}</a>
                            @endforeach
                        </div>
                        
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="tintuc">Tin tức</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="lienhe">Liên hệ</a>
                    </li>
                </ul>
           
            @else 
                <ul class="navbar-nav ml-4 m-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="trangchu">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Chọn đề thi <i class="fa fa-angle-down" aria-hidden="true"></i>
                          </a>

                          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @foreach($monhoc as $mh)
                            <a class="dropdown-item" href="dethi/{{$mh->id}}">{{$mh->ten_mon_hoc}}</a>
                            @endforeach
                        </div>
                        
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="tintuc">Tin tức</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="lienhe">Liên hệ</a>
                    </li>
                </ul>
            @endif

            <div class="header-right">
                @if(!Auth::check())
                <a href="dangnhap" class="signin mr-4"> Đăng nhập <i class="fas fa-sign-in-alt"></i></a>
                <a href="dangky" class="contact">Đăng ký</a>

                @else 
                    
                    <div class="dropdown">
                        <div class="dropdown-toggle text-danger" data-toggle="dropdown">
                            <strong style="color: white;">
                                {{Auth::user()->name}}
                                @if(isset(Auth::user()->hinh_anh))
                                <img style="width: 50px;                           
                                border-radius:50%;
                                -moz-border-radius:50%;
                                -webkit-border-radius:50%;" src="upload/thisinh/{{Auth::user()->hinh_anh}}">
                                @else
                                <img style="width: 50px;;
                                border-radius:50%;
                                -moz-border-radius:50%;
                                -webkit-border-radius:50%;" src="upload/thisinh/avatar.png">
                                @endif
                            </strong>                    
                        </div>
                        <div class="dropdown-menu">
                            
                            <a class="dropdown-item" href="nguoidung">Xem thông tin</a>
                            <div class="dropdown-divider"></div>
                
                            <a class="dropdown-item" href="dangxuat">Đăng xuất</a>
                        
                    </div>
                   
                </div>
                @endif
            </div>
        </div>
    </nav>
</div>
</header>
<!-- //header -->