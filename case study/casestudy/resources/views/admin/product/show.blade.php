@extends('Layouts.main')
@section('title', 'Xem Chi Tiết')

@section('body')

<div class="col-12">
   <div class="row">
      <div class="col-12">
         <h1> Chi Tiết Sản Phẩm</h1>
      </div>
      <div class="show">
         <div class="img">
            <img src="{{asset('upload/'.$product->image)}}">
         </div>
         <div class="table">
            <table class="table table-white">
               <div class="col-6">
                  <thead>
                     <tr>
                        <th scope="col">Tên sản phẩm: {{ $product->name }}</th>
                     </tr>
                     <tr>
                        <th scope="col">Danh Mục: {{ $product->category->name }}</th>
                     </tr>
                     <tr>
                        <th scope="col">Giá: {{ number_format($product->price )}} VNĐ</th>
                     </tr>
                     <tr>
                        <th scope="col">Số Lượng: {{ $product->quantity }}</th>
                     </tr>
                     <tr>
                        {{-- <th scope="col">Ảnh: <img src="{{asset('upload/'.$product->image)}}" width="120px"></th>
                        --}}
                     </tr>
                     <tr>
                        <th scope="col">Mô Tả: {{ $product->description }}</th>
                     </tr>
                  </thead>
            </table>
         </div>
      </div>
      {{-- <a href="{{route('product.index')}}" class="btn btn-primary">Quay Lại</a> --}}
      <a class="btn btn-primary" onclick="history.go(-1)">Quay Lại</a>
   </div>
</div>
@endsection