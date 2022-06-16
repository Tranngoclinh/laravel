@extends('Layouts.main')
@section('title', 'Thùng Rác')

@section('body')

<div class="col-12">
   <div class="row">
      <div class="col-12">
         <h1>Thùng Rác</h1>
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
      <table class="table table-white">
         <div class="col-6">
            <form method="get" class="navbar-form navbar-left">
               @csrf
               <div class="row">
                  <div class="col-8">
                     <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search" name='search'>
                     </div>
                  </div>
                  <div class="col-4">
                     <button type="submit" class="btn btn-default">Tìm kiếm</button>
                  </div>
               </div>
            </form>
         </div>
         <thead>
            <tr>
               <th scope="col">#</th>
               <th scope="col">Tên sản phẩm</th>
               <th scope="col">Danh Mục</th>
               <th scope="col">Giá </th>
               <th scope="col">Số Lượng</th>
               <th scope="col">Ảnh</th>
               <th>Thao Tác</th> 
            </tr>
         </thead>
         <tbody>
            @if(count($products) == 0)
            <tr>
               <td colspan="4">Không có dữ liệu</td>
            </tr>
            @else
            @foreach($products as $key => $product)
            <tr>
               <th scope="row">{{ ++$key }}</th>
               <td>{{ $product->name }}</td>
               <td>{{ $product->category->name }}</td>
               <td>{{ $product->price }}</td>
               <td>{{ $product->quantity }}</td>
               <td><img src="{{asset('upload/'.$product->image)}}" width="120px"></td>
               <td>
                  <div class="one">
                     <div>
                        <form action="{{route('product.restore',$product->id)}}" method="">
                           @csrf
                        <button type="submit" class="text-success fas fa-trash-restore"
                           onclick="return confirm('Bạn chắc chắn muốn khôi phục?')"></button>
                        </form>
                  </div>
                  <div>
                     <form action="{{ route('product.forceDelete', $product->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                     <button type="submit" class="text-danger fas fa-archive"
                        onclick="return confirm('Bạn chắc chắn muốn xóa vĩnh viễn?')"></button>
                     </form>
                  </div>
                  </div>
               </td>
            </tr>
            @endforeach
            @endif

         </tbody>
      </table>
      <div class="button">
         <a href="{{route('product.index')}}" class="btn btn-warning ">Quay Lại</a>
         {{-- <a class="btn btn-warning" onclick="history.go(-1)">Quay Lại</a> --}}

      </div>
   </div>
</div>
@endsection