@extends('Layouts.main')
@section('title', 'Thêm mới khách hàng')
@section('body')
    <div class="col-12 col-md-12">
        <div class="row">
            <div class="col-12">
                <h1>Thêm mới khách hàng</h1>
            </div>
            <div class="col-12">
                <form method="post" action="{{ route('customer.store') }}">
                    @csrf
                    <div class="form-group">
                        <label>Tên khách hàng</label>
                        <input type="text" class="form-control" name="name" placeholder="Nhập tên khách hàng" >
                        @if ($errors->any())
                          <p style="color:red">{{ $errors->first('name') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Tuổi khách hàng</label>
                        <input type="number" class="form-control" name="age" placeholder="Nhập tuổi khách hàng" >
                        @if ($errors->any())
                          <p style="color:red">{{ $errors->first('age') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Nhập email" >
                        @if ($errors->any())
                          <p style="color:red">{{ $errors->first('email') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Số Điện Thoại</label>
                        <input type="text" class="form-control" name="phone" placeholder="Nhập số điện thoại" >
                        @if ($errors->any())
                          <p style="color:red">{{ $errors->first('phone') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Địa chỉ khách hàng</label>
                        <input type="text" class="form-control" name="address" placeholder="Nhập địa chỉ" >
                        @if ($errors->any())
                          <p style="color:red">{{ $errors->first('address') }}</p>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    {{-- <a href="{{route('customer.index')}}" class="btn btn-warning">Quay Lại</a> --}}
                    <a class="btn btn-warning" onclick="history.go(-1)">Quay Lại</a>

                </form>
            </div>
        </div>
    </div>
@endsection 