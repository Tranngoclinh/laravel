@extends('Layouts.main')
@section('title', 'Thêm danh mục')

@section('body')
<div class="col-12 col-md-12">
   <div class="row">
      <div class="col-12">
         <h1>Thêm mới sản phẩm</h1>
      </div>
      <div class="col-12">
         @if (Session::has('success'))
         <p class="text-success">
            <i class="fa fa-check" aria-hidden="true"></i>{{ Session::get('success') }}
         </p>
         @endif
      </div>
      <div class="col-12">
         @if (Session::has('error'))
         <p class="text-danger">
            <i class="fa fa-check" aria-hidden="true"></i>{{ Session::get('error') }}
         </p>
         @endif
      </div>
      <div class="col-12">
         <form method="post" action="{{ route('product.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
               <label>Tên Sản Phẩm</label>
               <input type="text" class="form-control" name="name" placeholder="Nhập tên sản phẩm">
               @if ($errors->any())
               <p style="color:red">{{ $errors->first('name') }}</p>
               @endif
            </div>
            <div class="form-group">       
               <label>Hãng Xe</label>
                     <select name="category_id" class="form-control" >
                             <option value="">Chọn hãng xe</option>
                         @foreach ($products as $product)
                             <option value="{{$product->id}}">{{$product->name}}</option>
                         @endforeach
                  </select>  
               @if ($errors->any())
               <p style="color:red">{{ $errors->first('category_id') }}</p>
               @endif
            </div>
            <div class="form-group">
               <label>Giá</label>
               <input type="text" class="form-control" name="price" placeholder="Nhập Giá">
               @if ($errors->any())
               <p style="color:red">{{ $errors->first('price') }}</p>
               @endif
            </div>
            <div class="form-group">
               <label>Số Lượng</label>
               <input type="text" class="form-control" name="quantity" placeholder="Nhập số lượng">
               @if ($errors->any())
               <p style="color:red">{{ $errors->first('quantity') }}</p>
               @endif
            </div>
            <div class="form-group">
               <label>Ảnh</label>
               <input type="file" class="form-control" name="image" placeholder="" >
               @if ($errors->any())
               <p style="color:red">{{ $errors->first('image') }}</p>
               @endif
            </div>
            <div class="form-group">
               <label>Mô Tả</label>
               <textarea  class="form-control" name="description" placeholder="Nhập mô tả" rows="5"></textarea>

               {{-- <input type="text" class="form-control" name="description" placeholder="Nhập mô tả"> --}}
               @if ($errors->any())
               <p style="color:red">{{ $errors->first('description') }}</p>
               @endif
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            {{-- <a href="{{route('product.index')}}" class="btn btn-warning">Quay Lại</a> --}}
            <a class="btn btn-warning" onclick="history.go(-1)">Hủy</a>
          
            
            {{-- <input action="action" onclick="window.history.go(-1); return false;"type="submit"value="Quay Lại"/> --}}
         </form>
      </div>
   </div>
</div>
@endsection