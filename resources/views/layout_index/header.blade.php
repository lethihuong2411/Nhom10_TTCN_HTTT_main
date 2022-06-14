<!--************************************
                Header Start
        *************************************-->
<header id="tg-header" class="tg-header tg-haslayout">
    <div class="tg-topbar">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <ul class="tg-addnav">
                        <li>
                            <a href="javascript:void(0);">
                                <i class="icon-question-circle"></i>
                                <em>{{ __('free ship') }}</em>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);">
                                <i class="fa fa-phone"></i>
                                <em>{{ __('phone') }}: 0123 456 789 || 0868 950 891</em>
                            </a>
                        </li>
                    </ul>
                    <div class="dropdown tg-themedropdown tg-currencydropdown" style="margin-left: 4%">
                        <a href="{!! route('user.language', ['en']) !!}">
                            <span><img src="{{ asset('images/icon/tienganh.png') }}" height="25px" width="25px"></span>
                        </a>
                        <a href="{!! route('user.language', ['vi']) !!}">
                            <span><img src="{{ asset('images/icon/tiengviet.png') }}" height="25px" width="25px"></span>
                        </a>
                    </div>
                    @if (Auth::check())
                    @if (Auth::user()->id_role == 1 || Auth::user()->id_role == 2)

                    <div style="margin-left:320px " class="dropdown tg-themedropdown tg-currencydropdown">
                        <a href="" id="tg-currenty" class="tg-btnthemedropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="icon-user"></i>
                            <span style="font-weight: bold;">{{ Auth::user()->full_name }}</span>
                        </a>

                        <ul class="dropdown-menu tg-dropdownmenu" aria-labelledby="tg-currenty">
                            <li style="list-style-type: none;text-align:center;">
                                <a href="{{ route('admin') }}"><span>{{ __('Thông Tin') }}</span></a>

                            </li>
                            <li style="list-style-type: none;text-align:center;">
                                <a href="{{ url('logout') }}"><span>{{ __('Đăng Xuất') }}</span></a>

                            </li>
                        </ul>
                    </div>
                    @else
                    <div style="margin-left:320px " class="dropdown tg-themedropdown tg-currencydropdown">
                        <a href="javascript:" id="tg-currenty" class="tg-btnthemedropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="icon-user"></i>
                            <span style="font-weight: bold;">{{ Auth::user()->full_name }}</span>
                        </a>
                        <ul class="dropdown-menu tg-dropdownmenu" aria-labelledby="tg-currenty">
                            <li style="list-style-type: none;text-align:center;">
                                <a href="{{ route('info',Auth::user()->id) }}"> <span>{{ __('Thông Tin') }}</span> </a>
                            </li>
                            <li style="list-style-type: none;text-align:center;">
                                <a href="{{ url('logout') }}"> <span>{{ __('Đăng Xuất') }}</span> </a>
                            </li>
                        </ul>
                    </div>
                    @endif
                    @else
                    <a style="margin-left:320px;margin-top:5px ;font-size:15px;font-weight: bold" class="tg-btn" href="{{ route('login') }}"><span>{{ __('login') }}</span></a>
                </div>
                @endif


            </div>
        </div>

    </div>
    </div>
    <div class="tg-middlecontainer">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <strong class="tg-logo"><a href="{{ route('index') }}"><img width="220px" src="images/bookstore.jpg" alt="image description"></a></strong>
                    <div class="tg-wishlistandcart">
                        <div class="dropdown tg-themedropdown tg-minicartdropdown">
                            <a href="{{ route('cart') }}" id="tg-minicart" class="tg-btn" aria-haspopup="true" aria-expanded="false">
                                <span style=" margin-left:28px;margin-top:11px " class="tg-themebadge quntity"> @if (Session::has('cart'))
                                    {{ Session('cart')->totalQty }}
                                    @else 0 @endif
                                </span>
                                <i style="font-size: 20px" class="icon-cart"></i>
                                <span style="font-size: 16px" class="total-price">( @if(Session::has('cart')) {{number_format($cart->totalPrice)}} @else 0 @endif VNĐ )</span>
                            </a>

                        </div>
                    </div>
                    <div class="tg-searchbox" style="margin-top:18px">
                        <form class="tg-formtheme tg-formsearch" role="search" method="get" id="searchform" action="{{ route('search') }}">
                            <fieldset>
                                <input type="text" value="" name="key" id="s" class="typeahead form-control" placeholder="{{ __('Enter keywords') }}" autocomplete="off">
                                <button type="submit"><i class="icon-magnifier"></i></button>
                            </fieldset>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tg-navigationarea">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <nav style="font-weight: bold;font-size: 16px" id="tg-nav" class="tg-nav">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#tg-navigation" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div id="tg-navigation" class="collapse navbar-collapse tg-navigation">
                            <ul>
                                <li>
                                    <a href="{{ route('index') }}">{{ __('Trang chủ') }}</a>
                                </li>
                                <li style="font-weight: bold" class="menu-item-has-children">
                                <a href="javascript:void(0)">{{ __('Danh mục') }}</a>
                                    <ul class="sub-menu" style="width:280px">
                                    @for($i = 0; $i < count($product_n); $i++) <li style="font-weight: bold;font-size: 13px"><a href="{{ route('product_type', $types_id[$i]) }}">{{ $types_name[$i] }} ({{ $product_n[$i] }})</a>
                                </li>
                                @endfor
                                    </ul>
                            <li style="font-weight: bold" class="menu-item-has-children">
                                <a href="{{ route('all_book') }}">{{ __('Toàn bộ sách') }}</a>
                                <ul class="sub-menu">
                                    <li style="font-weight: bold;font-size: 13px"><a href="{{ route('allnew') }}">{{ __("Sách mới") }}</a>
                                    </li>
                                    <li style="font-weight: bold;font-size: 13px"><a href="{{ route('allsale') }}">{{ __("Sách giảm giá") }}</a>
                                    </li>
                                    <li style="font-weight: bold;font-size: 13px"><a href="{{  route('allhighlights')  }}">{{ __("Sách hot") }}</a>
                                    </li>
                                </ul>
                            </li>
                            <li style="font-weight: bold" class="menu-item-has-children">
                                <a href="javascript:void(0)"> {{ __('Nhà Xuất Bản') }}</a>
                                <ul class="sub-menu">
                                    @foreach ($company as $com)
                                    <li style="font-weight: bold"><a href="{{ route('product_company', $com->id) }}">{{ $com->name }}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li><a href="{{ route('introduce') }}">{{ __('Giới thiệu') }} </a></li>

                            <li><a href="{{ route('news') }}">{{ __('Tin tức') }}</a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
<!--************************************
                Header End
        *************************************-->