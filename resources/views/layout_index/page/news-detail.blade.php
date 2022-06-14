@extends('layout_index.master')
@section('content')
<!--************************************
				Inner Banner Start
		*************************************-->
<div class="tg-innerbanner tg-haslayout tg-parallax tg-bginnerbanner" data-z-index="-100" data-appear-top-offset="600" data-parallax="scroll" data-image-src="images/parallax/bgparallax-07.jpg">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="tg-innerbannercontent">
					<h1>Tin tức</h1>
					<ol class="tg-breadcrumb">
						<li><a href="javascript:void(0);">trang Chủ</a></li>
						<li><a href="javascript:void(0);">tin Tức</a></li>
						<li class="tg-active">chi tiết</li>
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
							@foreach ($content_detail as $con)
							<div class="tg-newsdetail">
								<ul class="tg-bookscategories">
								</ul>
								<div class="tg-themetagbox"><span class="tg-themetag">News</span></div>

								<div class="tg-posttitle">
									<h2><a href="javascript:void(0);">{{ $con->name }}.</a></h2>
								</div>
								<blockquote>
									<div class="tg-description" style="text-align: justify; font-size: 18px">
										{!! $con->content !!}
									</div>
								</blockquote>
							</div>
							@endforeach
						</div>
					</div>
					<div class="col-xs-12 col-sm-4 col-md-4 col-lg-3 pull-left">
						<aside id="tg-sidebar" class="tg-sidebar">
							<div class="tg-widget tg-catagories">
								<div class="tg-widgettitle">
									<h3>Danh mục sách</h3>
								</div>
								<div class="tg-widgetcontent">
									<ul>

										@for($i = 0; $i < count($product_n); $i++) <li><a href="{{ route('product_type', $types_id[$i]) }}">{{ $types_name[$i] }} ({{ $product_n[$i] }})</a></li>
											@endfor
								</div>
							</div>
							<div class="tg-widget tg-widgettrending">
								<div class="tg-widgettitle">
									<h3>Bài đăng</h3>
								</div>
								<div class="tg-widgetcontent">
									@foreach ($content as $con)
									<ul>
										<li>
											<article class="tg-post">
												<figure><a href="{{ route('newsdetail', [$con['id']]) }}"><img style="width:100px;height:80px;" src="{{ asset('images/news/' . $con->image) }}" alt="image description"></a></figure>
												<div class="tg-postcontent">
													<div class="tg-posttitle">
														<h3 style=" width:150px;text-overflow: ellipsis;overflow: hidden;white-space: nowrap;"><a href="{{ route('newsdetail', [$con['id']]) }}">{{$con->name}}</a></h3>
													</div>
													<ul class="tg-postmetadata">

													<li><a href="javascript:void(0);"><i class="fa fa-eye"></i><i>{{number_format($con->news_view,0,"",",") }} lượt xem</i></a></li>
													</ul>
												</div>
											</article>
									</ul>
									@endforeach
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
	<section class="tg-sectionspace tg-haslayout">
		<div class="container">
			<div class="row">

				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="tg-sectionhead">
						<h2><span>Liên Quan &amp; </span>Có gì Hot ?</h2>
						<a class="tg-btn" href="javascript:void(0);">Xem Thêm</a>
					</div>
				</div>
				<div id="tg-postslider" class="tg-postslider tg-blogpost owl-carousel">
					@foreach ($content_new_four as $four)

					<article class="item tg-post">
						<figure><a href="{{ route('newsdetail', [$four['id']]) }}"><img style="width:300px;height:250px;" src="{{ asset('images/news/' . $four->image) }}" alt="image description"></a>
						</figure>
						<div class="tg-postcontent">
							<ul class="tg-bookscategories">


							</ul>
							<div class="tg-themetagbox"><span class="tg-themetag">New</span></div>
							<div class="tg-posttitle">
								<h3 style=" width:250px;text-overflow: ellipsis;overflow: hidden;white-space: nowrap;">
									<a href="{{ route('newsdetail', [$four['id']]) }}">{{ $four->name }}</a></h3>

								<p style=" margin-top:10px;display: -webkit-box;width:230px;line-height:20px;overflow: hidden;text-overflow: ellipsis;-webkit-line-clamp:3;-webkit-box-orient: vertical;">
									{{ $four->name }}
								</p>
							</div>
							<ul class="tg-postmetadata">
								<li><a href="javascript:void(0);">Bởi:Tuấn </a></li>
								<li><a href="javascript:void(0);"><i class="fa fa-eye"></i><i>{{ $four->news_view  }} lượt xem</i></a></li>
							</ul>
						</div>
					</article>
					@endforeach

				</div>
			</div>
		</div>
	</section>
</main>
@endsection