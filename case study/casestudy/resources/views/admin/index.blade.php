@extends('Layouts.main')
@section('body')
<body>
		<!-- //market-->
		<div class="market-updates">
			<div class="col-md-3 market-update-gd">
				<a href="{{route('product.index')}}">
				<div class="market-update-block clr-block-2">
					<div class="col-md-4 market-update-right">
						<i class="fas fa-suitcase"> </i>
					</div>
					 <div class="col-md-8 market-update-left">
					 <h4>Tổng sản phẩm</h4>
					<h3>{{count($products)}}</h3>
					{{-- <p>Other hand, we denounce</p> --}}
				  </div>
				  <div class="clearfix"> </div>
				</div>
			</a>
			</div>
			<div class="col-md-3 market-update-gd">
				<a href="{{route('customer.index')}}">
				<div class="market-update-block clr-block-1">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-users" ></i>
					</div>
					<div class="col-md-8 market-update-left">
					<h4>Tổng khách hàng</h4>
						<h3>{{count($customer)}}</h3>
						{{-- <p>Other hand, we denounce</p> --}}
					</div>
				  <div class="clearfix"> </div>
				</div>
			</a>
			</div>
			<div class="col-md-3 market-update-gd">
				<a href="{{route('categori.index')}}">
				<div class="market-update-block clr-block-3">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-list"></i>
					</div>
					<div class="col-md-8 market-update-left">
						<h4>Tổng danh mục</h4>
						<h3>{{count($category)}}</h3>
						{{-- <p>Other hand, we denounce</p> --}}
					</div>
				  <div class="clearfix"> </div>
				</div>
			</a>
			</div>
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-4">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-shopping-cart" aria-hidden="true"></i>
					</div>
					<div class="col-md-8 market-update-left">
						<h4>Tổng đơn hàng</h4>
						<h3>0</h3>
						{{-- <p>Other hand, we denounce</p> --}}
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
		   <div class="clearfix"> </div>
		</div>	
@endsection
