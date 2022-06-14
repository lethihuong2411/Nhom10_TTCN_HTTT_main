@extends('layout_index.master')
@section('content')
<style type="text/css">
	.contai {
		display: block;
		position: relative;
		padding-left: 35px;
		margin-bottom: 12px;
		cursor: pointer;
		font-size: 22px;
		-webkit-user-select: none;
		-moz-user-select: none;
		-ms-user-select: none;
		user-select: none;
	}

	.contai input {
		position: absolute;
		opacity: 0;
		cursor: pointer;
	}

	.checkmark {
		position: absolute;
		top: 0;
		left: 0;
		height: 25px;
		width: 25px;
		background-color: #eee;
		border-radius: 50%;
	}

	.contai:hover input~.checkmark {
		background-color: #ccc;
	}

	.contai input:checked~.checkmark {
		background-color: #2196F3;
	}

	.checkmark:after {
		content: "";
		position: absolute;
		display: none;
	}

	.contai input:checked~.checkmark:after {
		display: block;
	}

	.contai .checkmark:after {
		top: 9px;
		left: 9px;
		width: 8px;
		height: 8px;
		border-radius: 50%;
		background: white;
	}
</style>

<!--************************************
				Inner Banner Start
		*************************************-->
<div class="tg-innerbanner tg-haslayout tg-parallax tg-bginnerbanner" data-z-index="-100" data-appear-top-offset="600" data-parallax="scroll" data-image-src="images/parallax/bgparallax-07.jpg">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="tg-innerbannercontent">
					<h1>{{ __('Thanh Toán') }}</h1>
					<ol class="tg-breadcrumb">
						<li> <a href="{{ route('index') }}">{{ __('Trang Chủ') }}</a></li>
					</ol>
				</div>
			</div>
		</div>
	</div>
</div>
<!--************************************
				Inner Banner End
		*************************************-->
<!--************************************
				Main Start
		*************************************-->
<main id="tg-main" class="tg-main tg-haslayout">
	<!--************************************
					Contact Us Start
			*************************************-->
	<div class="tg-sectionspace tg-haslayout">
		<div class="container">
			<div class="row">
				<div class="tg-contactus">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div class="tg-sectionhead">
							<h2><span>{{ __('Xin Chào!') }}</span>{{ __('Xin thanh toán') }}</h2>
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
						<!--REVIEW ORDER-->
						<div class="panel panel-info">
							<div class="panel-body">
								@if (Session::has('cart'))
								@foreach ($product_cart as $pro)
								<div class="form-group">
									<div class="col-sm-3 col-xs-3">
										<img width="60%" src="{{ asset('images/product/' . $pro['item']['image']) }}" alt="" class="pull-left">
									</div>
									<div class="col-sm-6 col-xs-6">
										<div class="col-xs-12">{{ $pro['item']['name'] }}</div>
										<div class="col-xs-12"><small>Số Lượng : {{ $pro['qty'] }}</small></div>
										<div class="col-xs-12"><span>{{ number_format($pro['price']) }} VNĐ</span></div>
									</div>
								</div>
								<div class="form-group">
									<hr />
								</div>
								@endforeach
								@endif
								<div class="form-group">
									<div class="col-xs-12">
										<strong>Tổng Tiền :</strong>
										<div class="pull-right"><span>@if (Session::has('cart'))
												{{ number_format($totalPrice) }} @else 0 @endif VNĐ</span></div>
									</div>
								</div>
							</div>
						</div>
						<!--REVIEW ORDER END-->
					</div>
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
						@if (Session::has('flag'))
						<div class="alert alert-{{ Session::get('flag') }}">{{ Session::get('messege') }} </div>
						@endif
						<form action="{{ url('checkout') }}" method="post" class="tg-formtheme tg-formcontactus">
							@csrf
							<div class="panel panel-info">
								<div class="panel-body">
									<div class="form-group">
										<div class="col-md-6 col-xs-12">
											<strong>Họ và tên:</strong>
											<input type="text" value="{{ $name }}" class="form-control" />
										</div>
										<div class="span1"></div>
										<div class="col-md-6 col-xs-12">
											<strong>Số Điện Thoại:</strong>
											<input name="phone" type="text" value="{{ $phone }}" class="form-control" />
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-12"><strong>E-mail:</strong></div>
										<div class="col-md-12">
											<input name="email" type="text" value="{{ $email }}" class="form-control" />
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-12"><strong>Địa Chỉ:</strong></div>
										<div class="col-md-12">
											<input name="address" type="text" value="{{ $address }}" class="form-control" />
										</div>
									</div>
								</div>
							</div>
							<label class="contai">Thanh Toán Khi Nhận Hàng
								<input type="radio" name="Kate" value="COD" checked>
								<span class="checkmark"></span>
							</label>
							<fieldset>


								<div class="form-group">
									<button type="submit" class="tg-btn tg-active">Thanh Toán</button>
								</div>
							</fieldset>

						</form>

					</div>
				</div>
			</div>
		</div>
	</div>
	<!--************************************
					Contact Us End
			*************************************-->
</main>
<!--************************************
				Main End
		*************************************-->
@endsection