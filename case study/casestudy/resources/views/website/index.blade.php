@extends('Layouts.main2')
@section('title')
<section class="ftco-section ftco-no-pt bg-light">
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-md-12 heading-section text-center ftco-animate mb-5">
            <span class="subheading">NHỮNG GÌ CHÚNG TÔI CUNG CẤP</span>
            <h2 class="mb-2">Các Dòng Xe Mới Nhất</h2>
         </div>
      </div>
      <div class="row">
         <div class="col-md-12">
            <div class="carousel-car owl-carousel">     
               @foreach ($products as $product)
               <div class="item">
                  <a href="{{route('home.detail',$product->id)}}">
                  <div class="car-wrap rounded ftco-animate">
                     <div class="img rounded d-flex align-items-end"
                        style="background-image: url({{asset('upload/'.$product->image)}}">
                        {{-- <img src="{{asset('website/images/car-1.jpg')}}" alt=""> --}}
                     </div>
                     <div class="text">
                        <h2 class="mb-0"><a href="#">{{$product->name}}</a></h2>
                        <div class="d-flex mb-3">
                           <span class="cat">Giá :</span>
                           <p class="price ml-auto">{{ number_format($product->price) }} <span>VNĐ</span></p>
                        </div>
                        <p class="d-flex mb-0 d-block"><a href="#" class="btn btn-primary py-2 mr-1">Mua Ngay</a> <a
                              href="{{route('home.detail',$product->id)}}" class="btn btn-secondary py-2 ml-1">Xem Chi Tiết</a></p>
                     </div>
                  </div>
               </a>
               </div>
               @endforeach              
            </div>
         </div>
         <section class="ftco-section">
            <div class="container">
               <div class="row justify-content-center mb-5">
             <div class="col-md-7 text-center heading-section ftco-animate">
                <span class="subheading">Dịch Vụ</span>
               <h2 class="mb-3">Dịch vụ mới nhất của chúng tôi</h2>
             </div>
           </div>
               <div class="row">
                  <div class="col-md-3">
                     <div class="services services-2 w-100 text-center">
                  <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-wedding-car"></span></div>
                  <div class="text w-100">
                   <h3 class="heading mb-2">Wedding Ceremony</h3>
                   <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                 </div>
               </div>
                  </div>
                  <div class="col-md-3">
                     <div class="services services-2 w-100 text-center">
                  <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-transportation"></span></div>
                  <div class="text w-100">
                   <h3 class="heading mb-2">City Transfer</h3>
                   <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                 </div>
               </div>
                  </div>
                  <div class="col-md-3">
                     <div class="services services-2 w-100 text-center">
                  <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-car"></span></div>
                  <div class="text w-100">
                   <h3 class="heading mb-2">Airport Transfer</h3>
                   <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                 </div>
               </div>
                  </div>
                  <div class="col-md-3">
                     <div class="services services-2 w-100 text-center">
                  <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-transportation"></span></div>
                  <div class="text w-100">
                   <h3 class="heading mb-2">Whole City Tour</h3>
                   <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                 </div>
               </div>
                  </div>
               </div>
            </div>
         </section>
   
</section>
@endsection