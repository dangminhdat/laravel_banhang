<div id="header">
		<div class="header-top">
			<div class="container">
				<div class="pull-left auto-width-left">
					<ul class="top-menu menu-beta l-inline">
						<li><a href=""><i class="fa fa-home"></i> 90-92 Lê Thị Riêng, Bến Thành, Quận 1</a></li>
						<li><a href=""><i class="fa fa-phone"></i> 0163 296 7751</a></li>
					</ul>
				</div>
				<div class="pull-right auto-width-right">
					<ul class="top-details menu-beta l-inline">
						@if(Auth::check())
						<li><a><i class="fa fa-user"></i>Xin chào {{ Auth::user()->full_name }}</a></li>
						<li><a href="{{ route('pages.dangxuat') }}"><i class="fa fa-sign-out"></i>Đăng xuất</a></li>
						@else
						<li><a href="{{ route('pages.dangky') }}">Đăng kí</a></li>
						<li><a href="{{ route('pages.dangnhap') }}">Đăng nhập</a></li>
						@endif
					</ul>
				</div>
				<div class="clearfix"></div>
			</div> <!-- .container -->
		</div> <!-- .header-top -->
		<div class="header-body">
			<div class="container beta-relative">
				<div class="pull-left">
					<a href="{{ route('pages.index') }}" id="logo"><img src="source/assets/dest/images/logo-cake.png" width="200px" alt=""></a>
				</div>
				<div class="pull-right beta-components space-left ov">
					<div class="space10">&nbsp;</div>
					<div class="beta-comp">
						<form role="search" method="get" id="searchform" action="{{ route('pages.timkiem') }}">
							<input type="hidden" name="_token" value="{{ csrf_token() }}" disabled>
					        <input type="text" value="" name="timkiem" id="s" placeholder="Nhập từ khóa..." />
					        <button class="fa fa-search" type="submit" id="searchsubmit"></button>
						</form>
					</div>

					<div class="beta-comp">
						<div class="cart">
							<div class="beta-select"><i class="fa fa-shopping-cart"></i> Giỏ hàng (
								@if(Session::has('cart'))
									{{ count($cart->items)}}
								@else
									"Trống"
								@endif
								) <i class="fa fa-chevron-down"></i></div>
							<div class="beta-dropdown cart-body">
								@if(Session::has('cart'))
								@foreach($product_cart as $value)
								<div class="cart-item">
									<a href="{{ route('pages.deletecart',$value['item']['id']) }}" class="cart-item-delete"><i class="fa fa-times"></i></a>
									<div class="media">
										<a class="pull-left" href="{{ route('pages.sanpham',$value['item']['id']) }}"><img src="source/image/product/{{ $value['item']['image'] }}" alt="{{ $value['item']['name'] }}"></a>
										<div class="media-body">
											<span class="cart-item-title">{{ $value['item']['name'] }}</span>
											<span class="cart-item-amount">{{ $value['qty'] }}*<span>
											@if($value['item']['promotion_price'] == 0)
											{{ number_format($value['item']['unit_price']) }}
											@else
											{{ number_format($value['item']['promotion_price']) }}
											@endif
											</span></span>
										</div>
									</div>
								</div>
								@endforeach
								@endif

								@if(Session::has('cart'))
								<div class="cart-caption">
									<div class="cart-total text-right">Tổng tiền: <span class="cart-total-value">{{ number_format($totalPrice) }}</span></div>
									<div class="clearfix"></div>

									<div class="center">
										<div class="space10">&nbsp;</div>
										<a href="{{ route('pages.dathang') }}" class="beta-btn primary text-center">Đặt hàng <i class="fa fa-chevron-right"></i></a>
									</div>
								</div>
								@endif
							</div>
						</div> <!-- .cart -->
					</div>
				</div>
				<div class="clearfix"></div>
			</div> <!-- .container -->
		</div> <!-- .header-body -->
		<div class="header-bottom" style="background-color: #0277b8;">
			<div class="container">
				<a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
				<div class="visible-xs clearfix"></div>
				<nav class="main-menu">
					<ul class="l-inline ov">
						<li><a href="{{ route('pages.index') }}">Trang chủ</a></li>
						<li><a>Loại sản phẩm</a>
							<ul class="sub-menu">
								@foreach($loaisp as $value)
								<li><a href="{{ route('pages.loaisanpham',$value->id) }}">{{ $value->name }}</a></li>
								@endforeach
							</ul>
						</li>
						<li><a href="{{ route('pages.gioithieu') }}">Giới thiệu</a></li>
						<li><a href="{{ route('pages.lienhe') }}">Liên hệ</a></li>
					</ul>
					<div class="clearfix"></div>
				</nav>
			</div> <!-- .container -->
		</div> <!-- .header-bottom -->
	</div> <!-- #header -->