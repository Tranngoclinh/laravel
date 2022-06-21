<style>
  a.fas.fa-sign-out-alt {
    color: white;
    margin: 19px 0px 0px 0px;
}
a.fas.fa-sign-in-alt {
    color: white;
    margin: 19px 8px 0px 0px;
}
a.fas.fa-key{
  color: white;
    margin: 19px 8px 0px 0px;
}
a.fas.fa-sign-in-alt:hover{
  color: #01d28e;
}
a.fas.fa-key:hover{
  color: #01d28e;
}
a.fas.fa-sign-out-alt:hover{
  color: #01d28e;
}
/* .nav>li.header-divider {
    border-left: 1px solid rgba(0,0,0,.1);
    height: 30px;
    vertical-align: middle;
    position: relative;
    margin: 0 7.5px;
} */  
</style>
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
   <div class="container">
     <a class="navbar-brand" href="{{route('home.index')}}">Car<span>Shop</span></a>
     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
       <span class="oi oi-menu"></span> Menu
     </button>

     <div class="collapse navbar-collapse" id="ftco-nav">
       <ul class="navbar-nav ml-auto">
         <li class="nav-item active"><a href="{{route('home.index')}}" class="nav-link">Trang Chủ</a></li>
         {{-- <li class="nav-item"><a href="about.html" class="nav-link">About</a></li> --}}
         <li class="nav-item"><a href="services.html" class="nav-link">Dịch Vụ</a></li>
         <li class="nav-item"><a href="pricing.html" class="nav-link">Định Giá</a></li>
         <li class="nav-item"><a href="{{route('cars')}}" class="nav-link">Xe</a></li>
         <li class="nav-item"><a href="blog.html" class="nav-link">Blog</a></li>
         <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>
         @if (isset($admin))
         <li class="nav-item"><a href="{{route('logout')}}" class="nav-link"> Đăng Xuất</a></li>
         @endif
         @if (!isset($admin))
         <li class="nav-item"><a href="{{route('login')}}"  class="nav-link"> Đăng Nhập</a></li>
         {{-- <li class="header-divider"></li> --}}
         <li class="nav-item"><a href="{{route('register')}}"  class="nav-link"> Đăng Ký</a></li>
         @endif
         <a class="fas fa-cart-plus" href="{{route('home.cart')}}"></a>
        </ul>
     </div>
   </div>
 </nav>