@extends('Layouts.main')
@section('title', 'Danh Sách Sản Phẩm')

@section('body')
<script>
   $(document).ready(function(){
     $("#myInput").on("keyup", function() {
       var value = $(this).val().toLowerCase();
       $("#myTable tr").filter(function() {
         $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
       });
     });
   });
   </script>
<div class="col-12">
   <div class="row">
      <div class="col-12">
         <h1>Danh Sách Sản Phẩm</h1>
      </div>
      <div class="col-12">
         @if (Session::has('success'))
         <p class="text-success">
            <i class="fa fa-check" aria-hidden="true"></i>{{ Session::get('success') }}
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
                        <input type="text" class="form-control" placeholder="Search" name='search' id="myInput">
                     </div>
                  </div>
                  <div class="col-4">
                     <button type="submit" class="btn btn-default">Tìm kiếm</button>
                  </div>
               </div>
            </form>
            {{-- <form action="{{route('product.index')}}" method="post">
               @csrf
            <div class="select">
               <label>Hiển Thị</label>
               <div class="detail">
                  <select name="category_id" id="getselect" class="form-control">
                     <option value="0">Tất Cả</option>
                     @foreach ($category as $key => $value)
                     <option value="{{$key->id}}">{{$key->name}}</option>
                     @endforeach
                  </select>
               </div>
               <div class="submit">
                  <button type="submit">OK</button>
               </div>
            </div>
         </form> --}}
            <a class="btn btn-warning " href="{{ route('product.trashed') }}">Thùng rác</a>
            <a style="float: right" class="btn btn-primary" href="{{ route('product.create') }}">Thêm mới +</a>
         </div>


         <thead>
            <tr>
               <th scope="col">#</th>
               <th scope="col">Tên sản phẩm</th>
               <th scope="col">Hãng Xe</th>
               <th scope="col">Giá </th>
               <th scope="col">Số Lượng</th>
               <th scope="col">Ảnh</th>
               <th>Thao Tác</th>
            </tr>
         </thead>
         <tbody id="myTable">
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
               <td>{{ number_format($product->price) }}</td>
               <td>{{ $product->quantity }}</td>
               <td><img src="{{asset('upload/'.$product->image)}}" width="120px"></td>
               <td>
                  <div class="one">
                     <div>
                        <button class="text-secondary"><a href="{{route('product.show',$product->id)}}"
                              class="text-success	fas	fa-eye"></a></button>
                     </div>
                     <div>
                        <button class="text-secondary"> <a href="{{ route('product.edit', $product->id) }}"
                              class="fas fa-edit"></a></button>
                     </div>
                     <div>
                        <form action="{{ route('product.destroy', $product->id) }}" method="POST">
                           @csrf
                           @method('DELETE')
                           <button type="submit" class="text-danger fas fa-archive"
                              onclick="return confirm('Bạn chắc chắn muốn xóa?')"></button>
                        </form>
                     </div>
                  </div>
               </td>
            </tr>
            @endforeach
            @endif

         </tbody>
      </table>
      <div class="container">
         @if (isset($search))
         <a href="{{route('product.index')}}" class="btn btn-warning">Quay Lại</a>
         @endif
         {{-- {{$categories->links()}} --}}

      </div>
      {{$products->appends(request()->query())}}
   </div>
</div>
{{-- <script>
   $(document).ready(function(){
     $("#myInput").on("keyup", function() {
       var value = $(this).val().toLowerCase();
       $("#myTable tr").filter(function() {
         $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
       });
     });
   });
</script> --}}
@endsection
