@extends('Layouts.main')
@section('title', 'Chỉnh sửa danh mục')
@section('body')
<div class="col-12 col-md-12">
   <div class="row">
       <div class="col-12"><h1>Chỉnh sửa danh mục</h1></div>
       <div class="col-12">
           <form method="post" action="{{ route('categori.update', $categori->id) }}">
               @csrf
               @method('PUT')
               <div class="form-group">
                   <label>Tên danh mục</label>
                   <input type="text" class="form-control" name="name" value="{{ $categori->name }}" >
                   @if ($errors->any())
                     <p style="color:red">{{ $errors->first('name') }}</p>
                   @endif
               </div>
               <button type="submit" class="btn btn-primary">Chỉnh sửa</button>
               {{-- <a href="{{route('categori.index')}}" class="btn btn-warning" >Hủy</a> --}}
               <a class="btn btn-warning" onclick="history.go(-1)">Quay Lại</a>
           </form>
       </div>
   </div>
</div>
@endsection