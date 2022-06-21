@include('Layouts.includes.website.sidebar')
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<style>
   img {
      vertical-align: middle;
      border-style: none;
      width: 104px;
   }

   .container {
      max-width: 1209px;
   }

   .col-md-6 {
      -ms-flex: 0 0 50%;
      flex: 0 0 50%;
      max-width: 52%;
   }

   a.btn.btn-primary {
      height: 43px;
      /* font-weight: 500; */
      padding: 8px 13px 0px 13px;
   }

   .fa-cart-plus:before {
      content: "\f217";
      color: red;
   }

   .fa-cart-plus:before {
      content: "\f217";
      margin: 0px 0pc 0px 15px;
      font-size: 28px;
   }

   .box {
      display: flex;
   }

   /* .cart {
    margin: 10px 167px 12px 197px;
} */
   a.navbar-brand {
      margin: 0px 67px;
      font-weight: 600;
      font-size: 24px;
   }

   span {
      color: #6ec66b;
   }

   table {
      font-family: arial, sans-serif;
      border-collapse: collapse;
      width: 1000px;
      margin: 10px 51px;
   }

   td,
   th {
      border: 1px solid #060606;
      text-align: left;
      padding: 8px;
   }

   tr:nth-child(even) {
      background-color: beige;
   }

   .card {
      background: beige;
   }

   a {
      color: black;
   }

   .fa-trash:before {
      content: "\f1f8";
      color: red;
   }

   td,
   th {
      border: 1px solid #060606;
      text-align: center;
      padding: 8px;
   }

   .profile {
      margin: 10px -30px;
   }

   .cart h2 {
      margin: 0px 483px;
   }

   h2 {
      margin: 23px 50px;
   }

   ol.breadcrumb {
      background: white;
   }

   .col-md-7 {
      -ms-flex: 0 0 58.333333%;
      flex: 0 0 58.333333%;
      max-width: 99.333333%;
      width: 820px;
      border-radius: 10px;
   }

   .col-md-7 {
      margin-left: 186px;
      background: darkseagreen;
      margin-top: 37px;
      padding: 7px 25px 25px 25px;
   }

   a.btn.btn-success.form-control {
      margin-top: 20px;
   }

   .form-control {
      display: block;
      width: 100%;
      padding: .375rem .75rem;
      font-size: 1rem;
      line-height: 1.5;
      color: #495057;
      background-color: #fff;
      background-clip: padding-box;
      border: 1px solid #ced4da;
      border-radius: .25rem;
      transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
   }
   .buttons_added {
    opacity:1;
    display:inline-block;
    display:-ms-inline-flexbox;
    display:inline-flex;
    white-space:nowrap;
    vertical-align:top;
}
.is-form {
    overflow:hidden;
    position:relative;
    background-color:#f9f9f9;
    height:2.2rem;
    width:1.9rem;
    padding:0;
    text-shadow:1px 1px 1px #fff;
    border:1px solid #ddd;
}
.is-form:focus,.input-text:focus {
    outline:none;
}
.is-form.minus {
    border-radius:4px 0 0 4px;
}
.is-form.plus {
    border-radius:0 4px 4px 0;
}
.input-qty {
    background-color:#fff;
    height:2.2rem;
    text-align:center;
    font-size:1rem;
    display:inline-block;
    vertical-align:top;
    margin:0;
    border-top:1px solid #ddd;
    border-bottom:1px solid #ddd;
    border-left:0;
    border-right:0;
    padding:0;
}
.mr-2, .mx-2 {
    margin-right: -0.5rem!important;
}
.update {
    display: flex;
}
.input-qty::-webkit-outer-spin-button,.input-qty::-webkit-inner-spin-button {
    -webkit-appearance:none;
    margin:0;
}
a.btn.btn-warning {
    margin-left: 1000px;
}
a.btn.btn-success {
    margin: 0px 0px 12px 996px;
}
.text-primary {
    color: #ea0808!important;
    font-size: 18px;
    font-weight: 600;
}
/* .col-2.text-end {
    width: 0px;
    background: dodgerblue;
    height: 30px;
    border-radius: 11px;
    padding: 2px 0px 0px 26px;
} */
</style>
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css"
   href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
<link rel="stylesheet" type="text/css"
   href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" type="text/css"
   href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
<div class="pd-wrap">
   <!-- giao diện giỏ hàng  -->
   <section class="content my-3">
      <div class="container">
         <div class="cart-page bg-white">
            <div class="row">
               <!-- giao diện giỏ hàng khi không có item  -->
               {{-- @if(count($cart) == 0)
               <div class="col-12 cart-empty ">
                  <div class="py-3 pl-3">
                     <h6 class="header-gio-hang">GIỎ HÀNG CỦA BẠN <span>(0 sản phẩm)</span></h6> --}}
                     {{-- <div class="cart-empty-content w-100 text-center justify-content-center">
                        <img src="{{asset('front-end/images/shopping-cart-not-product.png')}}"
                           alt="shopping-cart-not-product">
                        <p>Chưa có sản phẩm nào trong giỏ hàng của bạn</p>
                        <a href="" class="btn nutmuathem mb-`3">Mua thêm</a>
                     </div> --}}
                  {{-- </div>
               </div>
               @endif --}}
               <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                     <li class="breadcrumb-item active">
                        <a href="{{route('home.index')}}"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Trang Chủ</a>
                     </li>
                  </ol>
               </nav>

               <!-- giao diện giỏ hàng khi có hàng (phần comment màu xanh bên dưới là phần 2 sản phẩm trong giỏ hàng nhưng giờ đã demo bằng jquery) -->
               <div class="col-12">
                  <div class="card">
                     <div class="card-body">
                        <div class="box">
                           <div class="cart">
                              <h2>Giỏ Hàng</h2>
                           </div>

                        </div>
                        <div class="row">
                           <div class="col-md-6">
                              <table>
                                 <thead>
                                    <tr>
                                       <th>Tên Xe</th>
                                       <th>Hình Ảnh</th>
                                       <th>Số Lượng</th>
                                       <th>Giá</th>
                                       <th></th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    @if (isset($cart))
                                    @foreach($cart as $items)
                                    {{-- {{dd($cart)}} --}}
                                    <tr>
                                       <form action="" method="post">
                                          @csrf
                                          <td class="product_name"><a href="{{route('home.detail',$items['product'])}}">{{ $items['name']}}</a></td>
                                          <td class="product_thumb"><a
                                                href="{{route('home.detail',$items['product'])}}"><img
                                                   src="{{asset('upload/'.$items['image'])}}" alt=""></a></td>
                                          {{-- <td class="product_quantity"><input min="1" max="100"
                                                value="{{$items['quantity']}}" name="quantity" type="number"></td> --}}
                                          <td>
                                             <div class="buttons_added">
                                                <input class="minus is-form" type="button" value="-">
                                                <input aria-label="quantity" class="input-qty" max="10000"  min="1" name="quantity" type="number" value="{{$items['quantity']}}">
                                                <input class="plus is-form" type="button" value="+">
                                              </div>
                                          </td>
                                          <td class="product-price">{{ number_format($items['price']*$items['quantity'])
                                             }} <span style="color: red">VNĐ</span></td>

                                          <td><a href="{{route('remove.from.cart',$items['product'])}}"><i
                                                   class="fas fa-trash"></i></a></td>
                                          {{-- <input type="hidden" class="hidden" value="{{$item['item']->id}}"
                                             name="product_id[]"> --}}
                                          {{-- <td class="product_total"></td>
                                          <td class="product_remove"><a href="" type="button"><i
                                                   class="fa fa-trash-o"></i></a></td> --}}
                                    </tr>
                                    
                                    @endforeach

                                    @else
                                    <tr>
                                       <td colspan="5">Không có sản phẩm</td>
                                    </tr>
                                    @endif
                                 </tbody>
                              </table>
                              <h2>Tổng:   <span style="color: red">  VNĐ</span></h2>
                              <a href="{{route('update.cart')}}" class="btn btn-success">Cập Nhật</a>                       
                              <a onclick="history.go(-1)" class="btn btn-warning">Quay Lại</a>

                           </div>

                        </div>
                     </div>
                  </div>
                  <div class="col-md-7">
                     <div class="profile">
                        <h2>Thông Tin Người Nhận Hàng & Thanh Toán</h2>
                     </div>
                     <form action="{{route('cart.ordered')}}">
                        @csrf
                        <label>Họ & Tên <span style="color: red">*</span></label>
                        <div class="form-label-group">
                           <input type="text" id="inputName" class="form-control" placeholder="Nhập họ và tên"
                              name="name" autocomplete="off">
                        </div>
                        @if ($errors)
                        <div class="text-danger">{{$errors->first('name')}}</div>
                        @endif
                        <label>Số Điện Thoại<span style="color: red">*</span></label>
                        <div class="form-label-group">
                           <input type="text" id="inputPhone" class="form-control" placeholder="Nhập số điện thoại"
                              name="phone" autocomplete="off">
                        </div>
                        @if ($errors)
                        <div class="text-danger">{{$errors->first('phone')}}</div>
                        @endif
                        <label>Email<span style="color: red">*</span></label>
                        <div class="form-label-group">
                           <input type="email" id="inputEmail" class="form-control" placeholder="Nhập địa chỉ email"
                              name="email" autocomplete="off">
                        </div>
                        @if ($errors)
                        <div class="text-danger">{{$errors->first('email')}}</div>
                        @endif
                        <label>Địa Chỉ<span style="color: red">*</span>( Tỉnh/thành phố - Huyện - Xã/Phường - Thôn/Làng - Số Nhà/Đường)</label>
                        <div class="form-label-group">
                           <input type="text" id="inputAddress" class="form-control"
                              placeholder="Nhập Địa chỉ giao hàng" name="address" autocomplete="off">
                        </div>
                        {{-- <select name="calc_shipping_provinces" required="">
                           <option value="">Tỉnh / Thành phố</option>
                         </select>
                         <select name="calc_shipping_district" required="">
                           <option value="">Quận / Huyện</option>
                         </select>
                         <input class="billing_address_1" name="" type="hidden" value="">
                         <input class="billing_address_2" name="" type="hidden" value=""> --}}
                        @if ($errors)
                        <div class="text-danger">{{$errors->first('address')}}</div>
                        @endif
               
                        <div class="m-2 d-flex">
                           <fieldset class="border p-3 mr-2 col-6">    
                              <legend class="small text-primary fw-bold">Phương thức thanh toán</legend>
                              <div class="form-group row1">
                                <p><input type="radio" name="phuongthuctt" value="ck"> Chuyển khoản</p>
                                <p><input type="radio" name="phuongthuctt" value="khinhan"> Khi nhận hàng</p>
                                <p><input type="radio" name="phuongthuctt" value="onepay"> Onepay</p>
                                <p><input type="radio" name="phuongthuctt" value="nganluong"> Ngân Lượng</p>
                              </div>
                            </fieldset>
                            <fieldset class="border p-3 ml-3 col-6">    
                               <legend class="small text-primary fw-bold">Phương thức giao hàng</legend>
                               <div class="form-group row2">
                                  <p><input type="radio" name="phuongthuctt1" value="ghnhanh"> Giao hàng nhanh</p>
                                 <p><input type="radio" name="phuongthuctt1" value="ghtietkiem"> Giao hàng tiết kiệm</p>
                                 <p><input type="radio" name="phuongthuctt1" value="vnpost"> VN Post</p>
                                 <p><input type="radio" name="phuongthuctt1" value="viettel"> Viettel</p>
                               </div>
                            </fieldset>    
                        </div>  
                        <div class="py-2 m-2 d-flex justify-content-end">  
                           <div class="col-2 text-end">
                               <button class="btn btn-success">Mua hàng</button>
                               {{-- <a href="">Mua Hàng</a> --}}
                           </div>
                       </div> 
                     </form>
                  </div>
                  {{-- <a href="" class="btn btn-success form-control" style="background: #faf42b">Đặt
                     mua</a> --}}
               </div>
            </div>
         </div>
      </div>
      <!-- het row  -->
</div>
<!-- het cart-page  -->
</div>
<!-- het container  -->
</section>

<script>
   $('input.input-qty').each(function() {
  var $this = $(this),
    qty = $this.parent().find('.is-form'),
    min = Number($this.attr('min')),
    max = Number($this.attr('max'))
  if (min == 0) {
    var d = 0
  } else d = min
  $(qty).on('click', function() {
    if ($(this).hasClass('minus')) {
      if (d > min) d += -1
    } else if ($(this).hasClass('plus')) {
      var x = Number($this.val()) + 1
      if (x <= max) d += 1
    }
    $this.attr('value', d).val(d)
  })
})
</script>