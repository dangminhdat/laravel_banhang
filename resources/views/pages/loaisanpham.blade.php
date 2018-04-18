@extends('layouts.master')

@section("title")
{{ $loaisanpham->name }}
@endsection

@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Sản phẩm {{ $loaisanpham->name }}</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{ route('pages.index') }}">Home</a> / <span>{{ $loaisanpham->name }}</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-3">
						<ul class="aside-menu">
							@foreach($all_loaisanpham as $value)
							<li><a href="{{ route('pages.loaisanpham',$value->id) }}">{{ $value->name }}</a></li>
							@endforeach
						</ul>
					</div>
					<div class="col-sm-9">
						<div class="beta-products-list">
							<h4>{{ $loaisanpham->name }}</h4>
							<div class="beta-products-details">
								<p class="pull-left">Tổng cộng: {{ count($loaisanpham->product) }} sản phẩm</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
								@foreach($sanpham as $value)
								<div class="col-sm-4">
									<div class="single-item">
										<div class="single-item-header">
											<a href="{{ route('pages.sanpham',$value->id) }}"><img src="source/image/product/{{ $value->image }}" alt="{{ $value->name }}" style="width: 20em; height: 18em"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{ $value->name }}</p>
											<p class="single-item-price">
												@if($value->promotion_price == 0)
												<span>{{ number_format($value->unit_price) }} đ</span>
												@else
												<span class="flash-del">{{ number_format($value->unit_price) }} đ</span>
												<span class="flash-sale">{{ number_format($value->promotion_price) }} đ</span>
												@endif
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{ route('pages.sanpham',$value->id) }}">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach
							</div>
							<div>
								{{ $sanpham->links() }}
							</div>
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>

						<div class="beta-products-list">
							<h4>Sản phẩm khác</h4>
							<div class="beta-products-details">
								<!-- <p class="pull-left">438 styles found</p> -->
								<div class="clearfix"></div>
							</div>
							<div class="row">
								@foreach($sanpham_khac as $value)
								<div class="col-sm-4">
									<div class="single-item">
										<div class="single-item-header">
											<a href="product.html"><img src="source/image/product/{{ $value->image }}" alt="{{ $value->name }}" style="width: 20em; height: 18em"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{ $value->name }}</p>
											<p class="single-item-price">
												@if($value->promotion_price == 0)
												<span>{{ number_format($value->unit_price) }} đ</span>
												@else
												<span class="flash-del">{{ number_format($value->unit_price) }} đ</span>
												<span class="flash-sale">{{ number_format($value->promotion_price) }} đ</span>
												@endif
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="product.html">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach
							</div>
							<div class="space40">&nbsp;</div>
							
						</div> <!-- .beta-products-list -->
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection