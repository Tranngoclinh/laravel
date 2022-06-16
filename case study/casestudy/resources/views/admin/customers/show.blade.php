@extends('Layouts.main')
@section('title', 'Xem Chi Tiết Khách Hàng')
@section('body')

<div class="col-12">
   <div class="row">
      <div class="col-12">
         <h1>Chi Tiết Khách Hàng</h1>
      </div>
      {{-- @foreach ($customers as $key => $customer ) --}}
      <table class="table table-white">
         <div class="col-6">
            <tr>
               <th>Tên Khách Hàng: {{ $customer->name }}</th>
            </tr>
            <tr>
               <th>Tuổi: {{ $customer->age }}</th>
            </tr>
            <tr>
               <th>Số Điện Thoại: {{ $customer->phone }}
               </th>
            </tr>
            <tr>
               <th>Email: {{ $customer->email }}</th>
            </tr>
            <tr>
               <th>Địa Chỉ: {{ $customer->address }}</th>
            </tr>
      </table>
      {{-- <a href="{{route('customer.index')}}" class="btn btn-primary">Quay Lại</a> --}}
      <a class="btn btn-primary" onclick="history.go(-1)">Quay Lại</a>
      {{-- @endforeach --}}
   </div>
</div>
   @endsection