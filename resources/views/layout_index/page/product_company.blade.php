@extends('layout_index.master')
@section('content')
<style type="text/css">
	.Out {
		display: block;
		position: absolute;
		top: 108px;
		padding: 0px 13px;
		width: 190px;
		font-size: 20px;
		color: #FFF;
		text-align: center;
		text-transform: uppercase;
		-moz-transform: rotate(45deg);
		-webkit-transform: rotate(45deg);
		-o-transform: rotate(45deg);
		-ms-transform: rotate(45deg);
		background-color: #C1272C;
		z-index: 3;
		right: 0px;
		height: 28px;
		line-height: 30px;
		box-shadow: 0px 1px 2px #666;
		-webkit-box-shadow: 0px 1px 2px #666;
		-moz-box-shadow: 0px 1px 2px #666;
		font-weight: 700;
		font-family: 'Source Sans Pro', Arial;
	}

	/*-------------------------------------------------*/
</style>
<!--************************************
				Inner Banner Start
		*************************************-->
<div class="tg-innerbanner tg-haslayout tg-parallax tg-bginnerbanner" data-z-index="-100" data-appear-top-offset="600" data-parallax="scroll" data-image-src="images/parallax/bgparallax-07.jpg">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="tg-innerbannercontent">
					<h1>{{ __("Nhà Xuất Bản") }}</h1>
					<ol class="tg-breadcrumb">
						<li> <a href="{{ route('index') }}">{{ __("Trang Chủ") }}</a></li>
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
					Author Detail Start
			*************************************-->
	<div class="tg-sectionspace tg-haslayout">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="tg-authordetail">
						<figure class="tg-authorimg">
							<img style="width:370px; height:370px" src="{{ asset('images/companies/' . $company_name->image) }}" alt="image description">
							<br>
							<div>
								<h2>Thông Tin</h2>
							</div>
							<ul class="tg-productinfo" style="width:370px">
								<li><span>Tên:</span><span>{{ $company_name->name}}</span></li>
								<li><span>Email:</span><span>{{ $company_name->email}}</span></li>
								<li><span>Địa chỉ:</span><span>{{ $company_name->address}}</span></li>
								<li><span>Số điện thoại:</span><span>{{ $company_name->phone_number}}</span></li>
							</ul>
						</figure>

						<div class="tg-authorcontentdetail">
							<div class="tg-sectionhead">
								<div class="tg-booksfromauthor">
									<div class="tg-sectionhead">
										<h1>{{ $company_name->name }}</h1>
									</div>
									<div class="row">
										@foreach ($product_company as $books)
										<div class="col-xs-6 col-sm-6 col-md-4 col-lg-3">
											<div class="tg-postbook">

												<figure class="tg-featureimg" style="height: 250px">
													<div class="tg-bookimg">
														<div class="tg-frontcover"><img style="height: 240px" src="{{ asset('images/product/' . $books->image) }}" alt="image" /></div>
														<div class="tg-backcover"><img src="{{ asset('images/product/' . $books->image) }}" alt="image" /></div>
													</div>
													<a class="tg-btnaddtowishlist" href="{{route('Read',$books->id)}}">
														<i class="fa fa-book"></i>
														<span>Đọc Online</span>
													</a>
												</figure>
												<div class="tg-postbookcontent">
													<div class="tg-themetagbox"><span class="tg-themetag">sale</span></div>
													@if($books->store && $books->store->stored_product == 0)
													<div class="Out">Hết Hàng</div>
													@endif
													<div class="tg-booktitle">
														<h3><a href="javascript:void(0);">{{ $books->name }}</a></h3>
													</div>
													<span class="tg-bookwriter"><a href="javascript:void(0);">{{$books->productCompany->name}}</a></span>
													<span class="tg-bookprice">
														@if($books->promotion_price == 0)
														<ins style="margin-bottom: 20px">{{number_format($books->unit_price,0,"",",")}} VNĐ</ins>
														@else
														<del>{{number_format($books->unit_price,0,"",",")}} VNĐ</del>
														<ins>{{number_format($books->promotion_price,0,"",",")}} VNĐ</ins>
														@endif
													</span>
													<a class="tg-btn tg-btnstyletwo" onclick="AddCart('{{ $books->id }}')">
														<i class="fa fa-shopping-basket"></i>
														<em>{{ __('Thêm giỏ hàng') }}</em>
													</a>
													<a class="tg-btn tg-btnstyletwo" href="{{ route('detail', $books->id) }}" style="margin-top: 4px;">
														<i class="fa fa-info"></i>
														<em>{{ __('Chi tiết') }}</em>
													</a>
												</div>
											</div>
										</div>
										@endforeach
									</div>
									<div class="row" style="margin-left:10px">
										<div class="btn-sec">{{$product_company->appends(request()->input())->links('vendor.pagination.bootstrap-4')}}</div>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
		<!--************************************
					Author Detail End
			*************************************-->
</main>
<!--************************************
				Main End
		*************************************-->
@endsection