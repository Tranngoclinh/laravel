@extends('Layouts.main')
@section('title', 'Thêm danh mục')

@section('body')
      <div class="col-12 col-md-12">
         <div class="row">
             <div class="col-12">
                 <h1>Thêm mới hãng xe</h1>
             </div>
             <div class="col-12">
                 <form method="post" action="{{ route('categori.store') }}">
                     @csrf
                     <div class="form-group">
                         <label>Hãng Xe</label>
                         <input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên danh mục" >
                         @if ($errors->any())
                           <p style="color:red">{{ $errors->first('name') }}</p>
                         @endif
                     </div>
                     <button type="submit" class="btn btn-primary">Submit</button>
                     {{-- <a href="{{route('categori.index')}}" class="btn btn-warning">Quay Lại</a> --}}
                     <a class="btn btn-warning" onclick="history.go(-1)">Quay Lại</a>
 
                 </form>
             </div>
         </div>
     </div>
@endsection