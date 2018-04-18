@extends('layouts.master')

@section('title')
Đăng ký
@endsection

@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Đăng kí</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb">
					<a href="{{ route('pages.index') }}">Home</a> / <span>Đăng kí</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	
	<div class="container">
		<div id="content">
			
			<form action="{{ route('pages.postDangKy') }}" method="post" class="beta-form-checkout">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="row">
					<div class="col-sm-3"></div>
					<div class="col-sm-6">
						<h4>Đăng kí</h4>
						<div class="space20">&nbsp;</div>
					
						@if(count($errors) > 0)
							<div class="alert alert-danger">
							@foreach($errors->all() as $error)
								<strong class="text-danger">{{ $error }}</strong>
							@endforeach
							</div>
						@endif
						
						@if(session('thongbao'))
							<div class="alert alert-success">
								<strong class="text-success">{{ session('thongbao') }}</strong>
							</div>
						@endif

						<div class="form-block">
							<label for="email">Email address*</label>
							<input type="email" name="email" id="email" required>
						</div>

						<div class="form-block">
							<label for="your_last_name">Fullname*</label>
							<input type="text" name="name" id="your_last_name" required>
						</div>

						<div class="form-block">
							<label for="adress">Address*</label>
							<input type="text" name="address" id="adress" value="Street Address" required>
						</div>


						<div class="form-block">
							<label for="phone">Phone*</label>
							<input type="text" name="phone" id="phone" required>
						</div>
						<div class="form-block">
							<label for="phone">Password*</label>
							<input type="password" name="password" id="phone" required>
						</div>
						<div class="form-block">
							<label for="phone">Re password*</label>
							<input type="password" name="re-password" id="phone" required>
						</div>
						<div class="form-block">
							<button type="submit" class="btn btn-primary">Đăng ký</button>
						</div>
					</div>
					<div class="col-sm-3"></div>
				</div>
			</form>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection