<!DOCTYPE html>

<head>
   <title>ADMIN PRO</title>
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
   <script type="application/x-javascript">
      addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } 
   </script>
   <!-- bootstrap-css -->
   <link rel="stylesheet" href="{{asset('admin/css/bootstrap.min.css')}}">
   <!-- //bootstrap-css -->
   <!-- Custom CSS -->
   <link href="{{asset('admin/css/style.css')}}" rel='stylesheet' type='text/css' />
   <link href="{{asset('admin/css/style-responsive.css')}}" rel="stylesheet" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
   <!-- font CSS -->
   <link
      href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic'
      rel='stylesheet' type='text/css'>
   <!-- font-awesome icons -->
   <link rel="stylesheet" href="{{asset('admin/css/font.css')}}" type="text/css" />
   <link href="{{asset('admin/css/font-awesome.css')}}" rel="stylesheet">
   <link rel="stylesheet" href="{{asset('admin/css/morris.css')}}" type="text/css" />
   <!-- calendar -->
   <link rel="stylesheet" href="{{asset('admin/css/monthly.css')}}">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <!-- //calendar -->
   <!-- //font-awesome icons -->
   <script src="{{asset('admin/js/jquery2.0.3.min.js')}}"></script>
   <script src="{{asset('admin/js/raphael-min.js')}}"></script>
   <script src="{{asset('admin/js/morris.js')}}"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
   <script src="js/jquery.min.js"></script>
   <script src="js/popper.js"></script>
   <script src="js/bootstrap.min.js"></script>
   <script src="js/main.js"></script>
   <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
   <link rel="stylesheet" href="{{asset('login/css/ionicons.min.css')}}">
   {{--
   <link rel="stylesheet" href="{{asset('login/css/style.css')}}"> --}}
  
</head>

<body>
   @include('Layouts.includes.admin.header')
   @include('Layouts.includes.admin.sidebar')
   <section id="container">
      <section id="main-content">
         <section class="wrapper">
            @yield('body')
         </section>
         @include('Layouts.includes.admin.footer')