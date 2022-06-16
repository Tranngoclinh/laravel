<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<head>
<title>Đăng Ký</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="css/bootstrap.min.css" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="admin/css/style.css" rel='stylesheet' type='text/css' />
<link href="admin/css/style-responsive.css" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="admin/css/font.css" type="text/css"/>
<link href="admin/css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<script src="admin/js/jquery2.0.3.min.js"></script>
<style>
	body {
		background-image: url('../website/images/bg.jpg');
		font-size: 0px;
	}
</style>
</head>
<body>
	<div class="reg-w3">
		<div class="w3layouts-main">
   <h2><a href="{{route('login')}}">Đăng Nhập</a>Đăng Ký</h2>
		<form action="#" method="post">
         @csrf
			<input type="text" class="ggg" name="name" value="{{old('name')}}" placeholder="Tên">
			@if ($errors->any())
			<p style="color:red">{{ $errors->first('name') }}</p>
			@endif
			<input type="email" class="ggg" name="email" value="{{old('email')}}" placeholder="Email">
			@if ($errors->any())
			<p style="color:red">{{ $errors->first('email') }}</p>
			@endif
			{{-- <input type="text" class="ggg" name="age" value="{{old('age')}}" placeholder="Tuổi">
			@if ($errors->any())
			<p style="color:red">{{ $errors->first('age') }}</p>
			@endif
			<input type="text" class="ggg" name="phone" value="{{old('phone')}}" placeholder="Số Điện Thoại">
			@if ($errors->any())
			<p style="color:red">{{ $errors->first('phone') }}</p>
			@endif
			<input type="text" class="ggg" name="address" value="{{old('address')}}" placeholder="Địa Chỉ">
			@if ($errors->any())
			<p style="color:red">{{ $errors->first('address') }}</p>
			@endif --}}
			{{-- <input type="text" class="ggg" name="phone" placeholder="PHONE"> --}}
			<input type="password" class="ggg" name="password"  placeholder="Mật Khẩu">
			@if ($errors->any())
			<p style="color:red">{{ $errors->first('password') }}</p>
			@endif
			<input type="password" class="ggg" name="password_confirmation" placeholder="Nhập Lại Mật Khẩu">
			@if ($errors->any())
			<p style="color:red">{{ $errors->first('password_confirmation') }}</p>
			@endif
			<h4><input type="checkbox" />Tôi đồng ý với Điều khoản dịch vụ và Chính sách quyền riêng tư</h4>
			
				<div class="clearfix"></div>
				<input type="submit" value="Đăng Ký" name="register">
		</form>
		{{-- <p>Already Registered.<a href="login.html">Login</a></p> --}}
</div>
</div>
<script src="admin/js/bootstrap.js"></script>
<script src="admin/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="admin/js/scripts.js"></script>
<script src="admin/js/jquery.slimscroll.js"></script>
<script src="admin/js/jquery.nicescroll.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="admin/js/jquery.scrollTo.js"></script>
</body>
</html>
