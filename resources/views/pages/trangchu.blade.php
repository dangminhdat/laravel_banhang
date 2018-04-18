@extends('layouts.master')

@section('title')
Trang chủ
@endsection

@section('content')
	@include('layouts.slide')
	
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="beta-products-list">
							<h4>Sản phẩm mới</h4>
							<div class="beta-products-details">
								<p class="pull-left">Tổng cộng: {{ count($sanpham_new) }} sản phẩm</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
								@foreach($sanpham_new as $value)
								<div class="col-sm-3">
									<div class="single-item">
										@if($value->promotion_price != 0)
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
										@endif
										<div class="single-item-header">
											<a href="{{ route('pages.sanpham',$value->id) }}"><img src="source/image/product/{{ $value->image }}" class="img-responsive" alt="{{ $value->name }}" style="width: 20em; height: 18em"></a>
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
											<a class="add-to-cart pull-left" href="{{ route('pages.addcart',$value->id) }}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{ route('pages.sanpham',$value->id) }}">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach
								<div class="container">
									{{ $sanpham_new->links() }}
								</div>
							</div>
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>

						<div class="beta-products-list">
							<h4>Sản phẩm khuyến mãi</h4>
							<div class="beta-products-details">
								<p class="pull-left">Tổng cộng: {{ count($sanpham_sale) }} sản phẩm</p>
								<div class="clearfix"></div>
							</div>
							<div class="row">
								@foreach($sanpham_sale as $value)
								<div class="col-sm-3">
									<div class="single-item">
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
										<div class="single-item-header">
											<a href="{{ route('pages.sanpham',$value->id) }}"><img src="source/image/product/{{ $value->image }}" alt="{{ $value->name }}" style="width: 20em; height: 18em"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{ $value->name }} đ</p>
											<p class="single-item-price">
												<span class="flash-del">{{ number_format($value->unit_price) }} đ</span>
												<span class="flash-sale">{{ number_format($value->promotion_price) }} đ</span>
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="{{ route('pages.addcart',$value->id) }}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{ route('pages.sanpham',$value->id) }}">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach
								<div class="container">
									{{ $sanpham_sale->links() }}
								</div>
							</div>
							<div class="space40">&nbsp;</div>
						</div> <!-- .beta-products-list -->
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection