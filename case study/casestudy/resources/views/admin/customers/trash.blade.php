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
        <table class="table table-striped">
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
                    <th scope="col">Tên khách hàng</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Địa Chỉ</th>
                    <th>Thao Tác</th>

                </tr>
            </thead>
            <tbody>
                @if(count($customers) == 0)
                <tr>
                    <td colspan="4">Không có dữ liệu</td>
                </tr>
                @else
                @foreach($customers as $key => $customer)
                <tr>
                    <th scope="row">{{ ++$key }}</th>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->phone }}</td>
                    <td>{{ $customer->address }}</td>
                    <td>
                     <div class="one">
                        <div>
                           <form action="{{route('customer.restore',$customer->id)}}" method="">
                              @csrf
                           <button type="submit" class="text-success fas fa-trash-restore"
                              onclick="return confirm('Bạn chắc chắn muốn khôi phục?')"></button>
                           </form>
                     </div>
                     <div>
                        <form action="{{ route('customer.forceDelete', $customer->id) }}" method="POST">
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
        <a href="{{route('customer.index')}}" class="btn btn-warning">Quay Lại</a>
        {{-- <a class="btn btn-warning" onclick="history.go(-1)">Quay Lại</a> --}}

      </div>
    </div>
</div>
@endsection