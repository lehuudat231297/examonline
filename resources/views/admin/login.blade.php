<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>ExamOnline Admin - Login</title>

  <base href="{{asset('')}}">

  <!-- Custom fonts for this template-->
  <link href="admin_asset/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="admin_asset/css/avatar.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="admin_asset/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="avatar">
                <img width="465px" height="577px" src="admin_asset/img/meo.jpg">
              </div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Welcome!</h1>
                  </div>

                  @if(session('thongbao'))
                  <div class="alert alert-danger">
                    {{session('thongbao')}}
                  </div>
                  @endif

                  <form class="quantri" action="admin/dangnhap" method="post">

                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    
                    <div class="form-group">
                      <input name="tai_khoan" class="form-control" id="tai_khoan" placeholder="Nhập tài khoản ...">
                      @if ($errors->has('tai_khoan'))
                      <div class="alert alert-danger" style="width: 100%; height: 15%; margin-top: 5px; ">{{ $errors->first('tai_khoan') }}</div>
                      @endif
                    </div>

                    <div class="form-group">
                      <input name="password" type="password" class="form-control" id="password" placeholder="Mật khẩu">
                      @if ($errors->has('password'))
                      <div class="alert alert-danger" style="width: 100%; height: 15%; margin-top: 5px; ">{{ $errors->first('password') }}</div>
                      @endif
                    </div>
                    
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Nhớ tài khoản</label>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">Đăng nhập</button>
                    <hr>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="admin_asset/vendor/jquery/jquery.min.js"></script>
    <script src="admin_asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="admin_asset/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="admin_asset/js/sb-admin-2.min.js"></script>

  </body>

  </html>
