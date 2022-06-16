@extends('Layouts.main')
@section('title', 'Danh Mục')

@section('body')

         <div class="col-12">
            <div class="row">
               <div class="col-12">
                  <h1>Danh Mục</h1>
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
                     <a style="float: left" class="btn btn-warning" href="{{ route('categori.trashed') }}">Thùng rác</a>
                     <a style="float: right" class="btn btn-primary" href="{{ route('categori.create') }}">Thêm mới +</a>
                  </div>
                  <thead>
                     <tr>
                        <th scope="col">#</th>
                        <th scope="col">Hãng Xe</th>
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
                           <button class="text-secondary"><a href="{{ route('categori.edit', $categori->id) }}" class="fas fa-edit"></a></button>
                        </div>
                        <div>
                           <form action="{{ route('categori.destroy', $categori->id) }}" method="POST">
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
               @if (isset($search))
               {{-- <a href="{{route('categori.index')}}" class="btn btn-primary">Quay Lại</a> --}}
               <a class="btn btn-primary" onclick="history.go(-1)">Quay Lại</a>
               @endif

            </div>
         </div>
         <div class=" d-flex justify-content-end">
            {{-- {{ $categories->links() }} --}}
            {{$categories->appends(request()->query())}}
        </div>
@endsection
