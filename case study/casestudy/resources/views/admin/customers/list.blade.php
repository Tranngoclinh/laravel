@extends('Layouts.main')
@section('title', 'Danh sách khách hàng')
@section('body')
<div class="col-12">
    <div class="row">
        <div class="col-12">
            <h1>Danh Sách Khách Hàng</h1>
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
            </div>
            <a class="btn btn-warning" href="{{ route('customer.trashed') }}">Thùng rác</a>
            <a class="btn btn-primary" href="{{ route('customer.create') }}">Thêm mới +</a>
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
                                <button class="text-secondary"><a href="{{route('customer.show',$customer->id)}}" class="text-success	fas	fa-eye"></a></button>
                            </div>
                            <div>
                               <button class="text-secondary"><a href="{{ route('customer.edit', $customer->id) }}" class="fas fa-edit"></a></button>
                            </div>
                            <div>
                                <form action="{{ route('customer.destroy', $customer->id) }}" method="POST">
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
        {{-- <a href="{{route('customer.index')}}" class="btn btn-warning">Quay Lại</a> --}}
        <a class="btn btn-warning" onclick="history.go(-1)">Hủy</a>
        @endif
        {{-- {{$customers->links()}} --}}
        {{$customers->appends(request()->query())}}
    </div>
</div>
@endsection