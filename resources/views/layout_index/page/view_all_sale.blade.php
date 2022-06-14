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
	.Out2 {
		position: absolute;
		right: 15px;
		top: 15px;
		z-index: 19;
		padding: 10px;
		font-size: 13px;
		color: #fff;
		background: #900101;
		-webkit-border-radius: 10px;
		border-radius: 10px;
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
					<h1>{{ __('Sách Giảm Giá') }}</h1>
					<ol class="tg-breadcrumb">
						<li> <a href="{{ route('index') }}">{{ __('Trang Chủ') }}</a></li>
						<li class="tg-active">{{ __('Sản Phẩm') }}</li>
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
					News Grid Start
			*************************************-->
	<div class="tg-sectionspace tg-haslayout">
		<div class="container">
			<div class="row">
				<div id="tg-twocolumns" class="tg-twocolumns">
					<div class="col-xs-12 col-sm-8 col-md-8 col-lg-9 pull-right">
						<div id="tg-content" class="tg-content">
							<div class="tg-products">
								<div class="tg-sectionhead">
									<h2>{{ __("Sách Giảm Giá") }}</h2>
								</div>
								<div class="tg-productgrid">
									<div class="tg-refinesearch">
										<form action="" class="tg-formtheme tg-formsortshoitems">
											@csrf
											<fieldset>
												<div class="form-group">
													<label>Sắp xếp:</label>
													<span class="tg-select">
														<select id="sort_by" name="sort_by">
															<option value="{{Request::url()}}?sort_by=none"> --Mặc định--</option>
															<option value="{{Request::url()}}?sort_by=giam_dan"> Giá giảm dần</option>
															<option value="{{Request::url()}}?sort_by=tang_dan">Giá tăng dần</option>
															<option value="{{Request::url()}}?sort_by=duoi_70">Dưới 70,000 VNĐ</option>
															<option value="{{Request::url()}}?sort_by=70-100"> Từ 70,000 - 100,000 VNĐ</option>
															<option value="{{Request::url()}}?sort_by=tren_100">Trên 100,000 VNĐ</option>
														</select>
													</span>
												</div>
											</fieldset>
										</form>
									</div>
									@foreach ($product_sale as $books)
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
													<em>{{ __('Giỏ Hàng') }}</em>
												</a>
												<a class="tg-btn tg-btnstyletwo" href="{{ route('detail', $books->id) }}" style="margin-top: 4px;">
													<i class="fa fa-info"></i>
													<em>{{ __('Chi Tiết') }}</em>
												</a>
											</div>
										</div>
									</div>
									@endforeach
								</div>
								<div class="row">
									<div class="btn-sec">{{$product_sale->appends(request()->input())->links('vendor.pagination.bootstrap-4')}}</div>
								</div>
							</div>

						</div>
					</div>
					<div class="col-xs-12 col-sm-4 col-md-4 col-lg-3 pull-left">
						<aside id="tg-sidebar" class="tg-sidebar">
							<div class="tg-widget tg-catagories">
								<div class="tg-widgettitle">
									<h3>{{ __('Danh Mục') }}</h3>
								</div>
								<div class="tg-widgetcontent">
									<ul>
										@for ($i = 0; $i < count($product_n); $i++) <li><a href="{{ route('product_type', $types_id[$i]) }}"><span>{{ $types_name[$i] }} </span><span>({{ $product_n[$i] }})</span></a>
											</li>
											@endfor

									</ul>
								</div>
							</div>
							<div class="tg-widget tg-catagories">
								<div class="tg-widgettitle">
									<h3>{{ __('Nhà Xuất Bản') }}</h3>
								</div>
								<div class="tg-widgetcontent">
									<ul>
										@foreach ($company as $com)
										<li>
											<a href="{{ route('product_company', $com->id) }}">{{ $com->name }}</a>
										</li>
										@endforeach

									</ul>
								</div>
							</div>
						</aside>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--************************************
         News Grid End
       *************************************-->
</main>
<!--************************************
        Main End
      *************************************-->
@endsection