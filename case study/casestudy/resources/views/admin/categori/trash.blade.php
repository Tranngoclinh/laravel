@extends('Layouts.main')
@section('title', 'Thùng Rác')

@section('body')

         <div class="col-12">
            <div class="row">
               <div class="col-12">
                  <h1>Thùng rác</h1>
               </div>
               <div class="col-12">
                  @if (Session::has('success'))
                  <p class="text-success">
                     <i class="fa fa-check" aria-hidden="true"></i>{{ Session::get('success') }}
                  </p>
                  @endif
                  @if (Session::has('error'))
                  <p class="text-danger">
                     <i class="fa fa-check" aria-hidden="true"></i>{{ Session::get('error') }}
                  </p>
                  @endif
               </div>
               <table class="table table-white">
                  <div class="col-6">
                     <form class="navbar-form navbar-left" method="get">
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
                        <th scope="col">Tên danh mục</th>
                        <th>Thao Tác</th>
                     </tr>
                  </thead>
                  <tbody>
                     @if(count($categories) == 0)
                     <tr>
                        <td colspan="4">Không có dữ liệu</td>
                     </tr>
                     @else
                     @foreach($categories as $key => $categori)
                     <tr>
                        <th scope="row">{{ ++$key }}</th>
                        <td>{{ $categori->name }}</td>
                        <td>
                           <div class="one">
                           <div>
                              <form action="{{route('categori.restore',$categori->id)}}" method="">
                                 @csrf
                              <button type="submit" class="text-success fas fa-trash-restore"
                                 onclick="return confirm('Bạn chắc chắn muốn khôi phục?')"></button>
                              </form>
                        </div>
                        <div>
                           <form action="{{ route('categori.forceDelete', $categori->id) }}" method="POST">
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
               <a href="{{route('categori.index')}}" class="btn btn-primary">Quay Lại</a>
            </div>
         </div>
         <div class=" d-flex justify-content-end">
        </div>
@endsection