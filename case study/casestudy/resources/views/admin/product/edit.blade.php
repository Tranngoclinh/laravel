{{-- {{dd($product->quantity)}} --}}
@extends('Layouts.main')
@section('title', 'Chỉnh sửa sản phẩm')
@section('body')
<div class="col-12 col-md-12">
   <div class="row">
      <div class="col-12">
         <h1>Chỉnh sửa sản phẩm</h1>
      </div>
      <div class="col-12">
         @if (Session::has('error'))
         <p class="text-success">
            <i class="fa fa-check" aria-hidden="true"></i>{{ Session::get('error') }}
         </p>
         @endif
      </div>
      <div class="col-12">
         <form method="post" action="{{ route('product.update', $product->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
               <label>Tên sản phẩm</label>
               <input type="text" class="form-control" name="name" value="{{ $product->name }}">
               @if ($errors->any())
               <p style="color:red">{{ $errors->first('name') }}</p>
               @endif
            </div>
            <div class="form-group">       
               <label>Hãng Xe</label>
                     <select name="category_id" class="form-control" >
                             {{-- <option>{{$product->category->name}}</option> --}}
                         @foreach ($categories as $category)
                             <option value="{{$category->id}}">{{$category->name}}</option>
                         @endforeach
                  </select>  
               @if ($errors->any())
               <p style="color:red">{{ $errors->first('category') }}</p>
               @endif
            </div>
            <div class="form-group">
               <label>Giá</label>
               <input type="text" class="form-control" name="price" value="{{ $product->price }}">
               @if ($errors->any())
               <p style="color:red">{{ $errors->first('price') }}</p>
               @endif
            </div>
            <div class="form-group">
               <label>Số Lượng</label>
               <input type="text" class="form-control" name="quantity" value="{{ $product->quantity }}">
               @if ($errors->any())
               <p style="color:red">{{ $errors->first('quantity') }}</p>
               @endif
            </div>
            <div class="form-group">
               <label>Ảnh</label>
               <input type="file" class="form-control" name="image[]" value="{{asset('upload/'.$product->image)}}" multiple>
               @if ($errors->any())
               <p style="color:red">{{ $errors->first('image') }}</p>
               @endif
            </div>
            <div class="form-group">
               <label>Mô tả</label>
               <textarea  class="form-control" name="description"  rows="5">{{ $product->description }}</textarea>
               {{-- <input type="text" class="form-control" name="description" value="{{ $product->description }}"> --}}
               @if ($errors->any())
               <p style="color:red">{{ $errors->first('description') }}</p>
               @endif
            </div>
   
            <button type="submit" class="btn btn-primary">Chỉnh sửa</button>
            <a class="btn btn-warning" onclick="history.go(-1)">Hủy</a>
            
            
         </form>
      </div>
   </div>
</div>
@endsection