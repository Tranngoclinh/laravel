
<!DOCTYPE html>

<head>
   <title>Đăng Nhập</title>
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
   <script type="application/x-javascript">
      addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } 
   </script>
   <!-- bootstrap-css -->
   <link rel="stylesheet" href="admin/css/bootstrap.min.css">
   <!-- //bootstrap-css -->
   <!-- Custom CSS -->
   <link href="admin/css/style.css" rel='stylesheet' type='text/css' />
   <link href="admin/css/style-responsive.css" rel="stylesheet" />
   <!-- font CSS -->
   <link
      href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic'
      rel='stylesheet' type='text/css'>
   <!-- font-awesome icons -->
   <link rel="stylesheet" href="admin/css/font.css" type="text/css" />
   <link href="admin/css/font-awesome.css" rel="stylesheet">
   <!-- //font-awesome icons -->
   <script src="admin/js/jquery2.0.3.min.js"></script>
   <style>
      body {
         background-image: url('../website/images/bg.jpg');
      }
   </style>
</head>

<body>
   <div class="logo">
   <h1>Car<span style="color: rgb(81, 216, 122)">Shop</span></h1>
</div>
   <div class="log-w3">
      <div class="w3layouts-main">
         <h2>Đăng Nhập<a href="{{route('register')}}">Đăng Ký</a></h2>
         <div class="col-12">
            @if (Session::has('success'))
            <p class="text-success">
               <i class="fa fa-check" aria-hidden="true"></i>{{ Session::get('success') }}
            </p>
            @endif
         </div>
         @if (session()->get('messages'))
         <p class="messages">
            <i class="fa fa-check" aria-hidden="true"></i>{{ Session::get('messages') }}
         </p>
         {{Session::forget('messages')}}
         @endif
         @if (Session::has('error_password'))
         <div class="alert alert-danger">{{session::get('error_password')}}</div>
         @endif
         <form action="" method="post">
            @csrf
            <input type="email" class="ggg" name="email" value="{{old('email')}}" placeholder="E-MAIL">
            @if ($errors->any())
            <p style="color:red">{{ $errors->first('email') }}</p>
            @endif
            <input type="password" class="ggg" name="password" id="myInput" value="{{old('password')}}" placeholder="Mật Khẩu">
            @if ($errors->any())
            <p style="color:red">{{ $errors->first('password') }}</p>
            @endif
            <span><input type="checkbox" onclick="myFunction()">Hiển thị mật khẩu</span>
            {{-- <span><input type="checkbox" />Lưu Tài Khoản</span> --}}
            <h6><a href="#">Quên Mật Khẩu?</a></h6>
            <div class="clearfix"></div>
            <input type="submit" value="Đăng Nhập">
         </form>
         <div class="one"><p>Không có tài khoản ?<a href="{{route('register')}}">Tạo tài khoản</a></p></div>
      </div>
   </div>

   <script>
      function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
   </script>
   <script src="admin/js/bootstrap.js"></script>
   <script src="admin/js/jquery.dcjqaccordion.2.7.js"></script>
   <script src="admin/js/scripts.js"></script>
   <script src="admin/js/jquery.slimscroll.js"></script>
   <script src="admin/js/jquery.nicescroll.js"></script>
   <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
   <script src="admin/js/jquery.scrollTo.js"></script>
</body>

</html>
