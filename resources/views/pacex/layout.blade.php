<!DOCTYPE html>
<html lang="en">
<head>
	<title>@yield('title')</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="{{asset('storage\settings_image\BA4EG0Hfv6vgf1Nnw7Mz0KxJ7079qY71I44AUXoI.jpg')}}"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('pacex/vendor/bootstrap/css/bootstrap.min.css')}}">
	
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" type="text/css" rel="stylesheet">

<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('pacex/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('pacex/fonts/iconic/css/material-design-iconic-font.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('pacex/fonts/linearicons-v1.0.0/icon-font.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('pacex/vendor/animate/animate.css')}}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{asset('pacex/vendor/css-hamburgers/hamburgers.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('pacex/vendor/animsition/css/animsition.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('pacex/vendor/select2/select2.min.css')}}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{asset('pacex/vendor/daterangepicker/daterangepicker.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('pacex/vendor/slick/slick.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('pacex/vendor/MagnificPopup/magnific-popup.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('pacex/vendor/perfect-scrollbar/perfect-scrollbar.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('pacex/css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('pacex/css/main.css')}}">
<!--===============================================================================================-->
<!-- MDB -->
<link
  href="https://cdn.jsdelivr.net/npm/mdb-ui-kit@8.2.0/css/mdb.min.css"
  rel="stylesheet"
/>

<!--===============================================================================================-->
<!-- PaceX "X" brand navbar — monochrome / glass / transparency -->
<style>
    /* ===== Desktop: solid BLACK navbar, white monochrome links ===== */
    .top-bar {
        background-color: #000;
    }
    .wrap-menu-desktop,
    .wrap-menu-desktop.how-shadow1,
    .fix-menu-desktop .wrap-menu-desktop {
        background-color: #000 !important;
    }
    .menu-desktop .main-menu > li > a {
        position: relative;
        color: #fff;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        font-weight: 600;
    }
    .menu-desktop .main-menu > li.active-menu > a {
        color: #fff;
    }
    .menu-desktop .main-menu > li > a::after {
        content: "";
        position: absolute;
        left: 22px;
        right: 22px;
        bottom: 16px;
        height: 1px;
        background: #fff;
        transform: scaleX(0);
        transform-origin: left;
        transition: transform 0.35s ease;
    }
    .menu-desktop .main-menu > li:hover > a::after,
    .menu-desktop .main-menu > li.active-menu > a::after {
        transform: scaleX(1);
    }
    /* cart icon white on the black bar */
    .container-menu-desktop .wrap-icon-header .icon-header-item {
        color: #fff;
    }
    /* Info dropdown styled as a dark panel to match */
    .menu-desktop .main-menu .sub-menu {
        background-color: #000;
        border-top: 2px solid #fff;
    }
    .menu-desktop .main-menu .sub-menu a {
        color: rgba(255, 255, 255, 0.75);
    }
    .menu-desktop .main-menu .sub-menu a:hover {
        color: #fff;
    }
    /* push the hero slider below the fixed header so it isn't covered */
    @media (min-width: 992px) {
        .section-slide {
            margin-top: 84px;
        }
    }

    /* ===== Mobile header bar (black) ===== */
    .wrap-header-mobile {
        background-color: #000;
    }
    .wrap-header-mobile .hamburger-inner,
    .wrap-header-mobile .hamburger-inner::before,
    .wrap-header-mobile .hamburger-inner::after {
        background-color: #fff !important;
    }
    .wrap-header-mobile .icon-header-item {
        color: #fff !important;
    }

    /* ===== Mobile menu: solid black + giant faint "X" brand mark ===== */
    .menu-mobile {
        position: relative;
        background-color: #000;
        border-top: 1px solid rgba(255, 255, 255, 0.15);
        overflow: hidden;
    }
    .menu-mobile::before {
        content: "X";
        position: absolute;
        right: -25px;
        bottom: -80px;
        font-size: 340px;
        line-height: 1;
        font-weight: 800;
        font-style: italic;
        color: rgba(255, 255, 255, 0.04);
        pointer-events: none;
        z-index: 0;
    }
    .menu-mobile .left-top-bar {
        position: relative;
        z-index: 1;
        background: transparent;
        color: rgba(255, 255, 255, 0.55);
        text-align: center;
        letter-spacing: 2px;
        text-transform: uppercase;
        font-size: 11px;
        padding: 14px 0;
        border-bottom: 1px solid rgba(255, 255, 255, 0.08);
    }
    /* kill the theme's beige background; pad the list so cards have room */
    .main-menu-m {
        position: relative;
        z-index: 1;
        background-color: transparent;
        padding: 18px 16px 28px;
    }
    /* each item is a clearly pressable card with spacing between them */
    .main-menu-m > li {
        margin-bottom: 14px;
        border: 1px solid rgba(255, 255, 255, 0.18);
        border-radius: 12px;
        background-color: rgba(255, 255, 255, 0.04);
        overflow: hidden;
    }
    .main-menu-m > li:last-child {
        margin-bottom: 0;
    }
    .main-menu-m > li > a {
        display: block;                 /* whole row is tappable */
        color: #fff;
        text-transform: uppercase;
        letter-spacing: 3px;
        font-size: 15px;
        font-weight: 600;
        line-height: 1.4;
        padding: 24px 26px;             /* tall, finger-friendly tap target */
        -webkit-tap-highlight-color: rgba(255, 255, 255, 0.25);
        transition: padding-left 0.25s ease, background-color 0.2s ease;
    }
    .main-menu-m > li > a:hover,
    .main-menu-m > li > a:active {
        background-color: rgba(255, 255, 255, 0.14);
        padding-left: 32px;
    }
    /* Info sub-menu (the only remaining dropdown on mobile) */
    .main-menu-m .sub-menu-m {
        background-color: rgba(0, 0, 0, 0.35);
    }
    .main-menu-m .sub-menu-m li {
        border-top: 1px solid rgba(255, 255, 255, 0.08);
    }
    .main-menu-m .sub-menu-m li a {
        display: block;                 /* full-row tap target */
        color: rgba(255, 255, 255, 0.75);
        font-size: 12px;
        letter-spacing: 2px;
        font-weight: 400;
        padding: 18px 26px 18px 38px;
        -webkit-tap-highlight-color: rgba(255, 255, 255, 0.25);
        transition: padding-left 0.25s ease, background-color 0.2s ease;
    }
    .main-menu-m .sub-menu-m li a:hover,
    .main-menu-m .sub-menu-m li a:active {
        color: #fff;
        background-color: rgba(255, 255, 255, 0.08);
        padding-left: 46px;
    }
    /* bigger, centered tap area for the Info expand arrow */
    .main-menu-m .arrow-main-menu-m {
        top: 8px;
        right: 8px;
        padding: 16px;
    }
    .main-menu-m .arrow-main-menu-m,
    .main-menu-m .arrow-main-menu-m .fa {
        color: rgba(255, 255, 255, 0.6);
    }

    /* ===== Mobile slider: show the FULL image (no cropping) ===== */
    @media (max-width: 991px) {
        .item-slick1 {
            height: auto !important;
            min-height: 0 !important;
            aspect-ratio: 16 / 9;          /* keeps a banner shape; image still fully shown */
            background-size: contain !important;
            background-position: center center;
            background-color: #000;        /* fills any letterbox area */
        }
        /* let captions sit naturally over the contained image */
        .item-slick1 .container.h-full,
        .item-slick1 .flex-col-l-m.h-full {
            height: 100% !important;
        }
    }
</style>
<!--===============================================================================================-->

</head>
<body class="animsition">
	
	<!-- Header -->
	<header @yield('class')>
		<!-- Header desktop -->
		<div class="container-menu-desktop">
			<!-- Topbar -->
			<div class="top-bar">
				<div class="content-topbar flex-sb-m h-full container">
					<div class="left-top-bar">
						<p>Free shipping for standard order over $100</p>
					</div>
				</div>
			</div>

			<div class="wrap-menu-desktop how-shadow1">
				<nav class="limiter-menu-desktop container">
					
					<!-- Logo desktop -->		
					<a href="#" class="logo">
						<img src="{{ asset('storage/'.$logo) }}" alt="IMG-LOGO">
					</a>

					<!-- Menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu">
							<li @yield('home-active')>
								<a href="{{ route('home') }}">Home</a>
							</li>

                            @foreach ($categories as $category)
                            <li class={{ request()->is(['products/'.$category->title.'/*','products/'.$category->title]) ? 'active-menu':''}}>
                                <a href="{{ route('category',$category->title) }}">{{ $category->title }}</a>
                            </li>
                            @endforeach
                            <li @yield('info-active')>
								<a href="#">Info</a>
                                <ul class="sub-menu">
									<li>
										<a href="{{ route('track-order') }}">Track Order</a>
									</li>
                                    <li>
                                      <a href="{{ route('about-us') }}">About Us</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('contact-us') }}">Contact Us</a>
                                      </li>
                                      <li>
                                        <a href="{{ route('FAQs') }}">FAQs</a>
                                      </li>
                                    </ul>
							</li>
							
						</ul>
					</div>	

					<!-- Icon header -->
					<div class="wrap-icon-header flex-w flex-r-m">

						<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify="{{ count($cart) }}">
							<i id="shopping-cart" class="zmdi zmdi-shopping-cart"></i>
						</div>

					
					</div>
				</nav>
			</div>	
		</div>

		<!-- Header Mobile -->
		<div class="wrap-header-mobile">
			<!-- Logo moblie -->		
			<div class="logo-mobile">
				<a href="{{ route('home') }}"><img src="{{ asset('storage/'.$logo) }}" alt="IMG-LOGO"></a>
			</div>

			<!-- Icon header -->
			<div class="wrap-icon-header flex-w flex-r-m m-r-15">

				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="{{ count($cart) }}">
					<i class="zmdi zmdi-shopping-cart"></i>
				</div>
			</div>

			<!-- Button show menu -->
			<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</div>
		</div>


		<!-- Menu Mobile -->
		<div class="menu-mobile">
			<div class="left-top-bar">
				<p>Free shipping for standard order over $100</p>
			</div>
			<ul class="main-menu-m">
				<li>
					<a href="{{ route('home') }}">Home</a>
				</li>
				@foreach ($categories as $category)
				<li>
					<a href="{{ route('category',$category->title) }}">{{ $category->title }}</a>
				</li>
				@endforeach
							<li>
								<a href="#">Info</a>
                                <ul class="sub-menu-m">
									<li>
                                        <a href="{{ route('track-order') }}">Track Order</a>
                                    </li>
                                    <li>
                                      <a href="{{ route('about-us') }}">About Us</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('contact-us') }}">Contact Us</a>
                                      </li>
                                      <li>
                                        <a href="{{ route('FAQs') }}">FAQs</a>
                                      </li>
                                    </ul>
									<span class="arrow-main-menu-m">
										<i class="fa fa-angle-right" aria-hidden="true"></i>
									</span>
							</li>
			</ul>
		</div>


	</header>

	<!-- Cart -->
	<div class="wrap-header-cart js-panel-cart">
		<div class="s-full js-hide-cart"></div>

		<div class="header-cart flex-col-l p-l-65 p-r-25">
			<div class="header-cart-title flex-w flex-sb-m p-b-8">
				<span class="mtext-103 cl2">
					Your Cart
				</span>

				<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
					<i class="zmdi zmdi-close"></i>
				</div>
			</div>
			
			<div class="header-cart-content flex-w js-pscroll">
				<ul class="header-cart-wrapitem w-full">
					@isset($cart)
                    @php $totalPrice=0 @endphp
                    @foreach ($cart as $c)
                    @php
                        $totalPrice+=$c->quantity*$c->price;
                    @endphp
                       <li class="header-cart-item flex-w flex-t m-b-12">
						<div class="header-cart-item-img">
							<img src="{{ asset('storage/'.$c->image) }}" alt="IMG">
						</div>

						<div class="header-cart-item-txt p-t-8">
							<a href="{{ route('product_details',$c->id) }}" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
								{{ $c->title }} - {{ $c->size }}
							</a>

							<span id="{{ $c->id }}{{ $c->sizeId }}" class="header-cart-item-info">
								{{ $c->quantity }} x $ {{ round($c->price,2) }}
							</span>
						</div>
					</li> 
                    @endforeach
					
				</ul>
				
				<div class="w-full">
					<div id="totalPrice" class="header-cart-total w-full p-tb-40">
						Total: ${{ round($totalPrice,2) }}
					</div>

					<div class="header-cart-buttons flex-w w-full">
						<a href="{{ route('cart') }}" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
							View Cart
						</a>
					</div>
				</div>
				@endisset
			</div>
		</div>
	</div>

    @yield('slider')
    @yield('categories')
    @yield('products')
    @yield('product')
    @yield('content')

	<!-- Footer -->
	<footer class="bg3 p-t-75 p-b-32">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Categories
					</h4>
					@foreach ($categories as $category)

						<li class="p-b-10">
							<a href="{{ route('category',$category->title) }}" class="stext-107 cl7 hov-cl1 trans-04">
								{{ $category->title }}
							</a>
						</li>

					@endforeach
					
				</div>

				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Info
					</h4>

						<li class="p-b-10">
							<a href="{{ route('track-order') }}" class="stext-107 cl7 hov-cl1 trans-04">
								Track Order
							</a>
						</li>

						<li class="p-b-10">
							<a href="{{ route('about-us') }}" class="stext-107 cl7 hov-cl1 trans-04">
								About US 
							</a>
						</li>

						<li class="p-b-10">
							<a href="{{ route('contact-us') }}" class="stext-107 cl7 hov-cl1 trans-04">
								Contact US
							</a>
						</li>

						<li class="p-b-10">
							<a href="{{ route('FAQs') }}" class="stext-107 cl7 hov-cl1 trans-04">
								FAQs
							</a>
						</li>

				</div>

				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						{!! $get_in_touch->description !!}
					</h4>

					<p class="stext-107 cl7 size-201">
						{!! $get_in_touch->value !!}
					</p>

					<div class="p-t-27">
						<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-facebook"></i>
						</a>

						<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-instagram"></i>
						</a>

						<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fab fa-tiktok"></i>
						</a>
					</div>
				</div>

				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						{!! $join_us->description !!}
					</h4>

					<p class="stext-107 cl7 size-201">
						{!! $join_us->value !!}
					</p>

					<div class="p-t-27">
						<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-facebook"></i>
						</a>

						<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-instagram"></i>
						</a>

						<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fab fa-tiktok"></i>
						</a>
					</div>
				</div>


			</div>

			<div class="p-t-40">
				<p class="stext-107 cl6 txt-center">
					Copyright &copy;{{ \Carbon\Carbon::now()->year }} All rights reserved | Pacex | Privacy and Terms.
				</p>
			</div>
		</div>
	</footer>


	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>

	{{-- <!-- Modal1 -->
	<div class="wrap-modal1 js-modal1 p-t-60 p-b-20">
		<div class="overlay-modal1 js-hide-modal1"></div>

		<div class="container">
			<div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent">
				<button class="how-pos3 hov3 trans-04 js-hide-modal1">
					<img src="images/icons/icon-close.png" alt="CLOSE">
				</button>

				<div class="row">
					<div class="col-md-6 col-lg-7 p-b-30">
						<div class="p-l-25 p-r-30 p-lr-0-lg">
							<div class="wrap-slick3 flex-sb flex-w">
								<div class="wrap-slick3-dots"></div>
								<div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

								<div class="slick3 gallery-lb">
									<div class="item-slick3" data-thumb="images/product-detail-01.jpg">
										<div class="wrap-pic-w pos-relative">
											<img src="images/product-detail-01.jpg" alt="IMG-PRODUCT">

											<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="images/product-detail-01.jpg">
												<i class="fa fa-expand"></i>
											</a>
										</div>
									</div>

									<div class="item-slick3" data-thumb="images/product-detail-02.jpg">
										<div class="wrap-pic-w pos-relative">
											<img src="images/product-detail-02.jpg" alt="IMG-PRODUCT">

											<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="images/product-detail-02.jpg">
												<i class="fa fa-expand"></i>
											</a>
										</div>
									</div>

									<div class="item-slick3" data-thumb="images/product-detail-03.jpg">
										<div class="wrap-pic-w pos-relative">
											<img src="images/product-detail-03.jpg" alt="IMG-PRODUCT">

											<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="images/product-detail-03.jpg">
												<i class="fa fa-expand"></i>
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<div class="col-md-6 col-lg-5 p-b-30">
						<div class="p-r-50 p-t-5 p-lr-0-lg">
							<h4 class="mtext-105 cl2 js-name-detail p-b-14">
								Lightweight Jacket
							</h4>

							<span class="mtext-106 cl2">
								$58.79
							</span>

							<p class="stext-102 cl3 p-t-23">
								Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat.
							</p>
							
							<!--  -->
							<div class="p-t-33">
								<div class="flex-w flex-r-m p-b-10">
									<div class="size-203 flex-c-m respon6">
										Size
									</div>

									<div class="size-204 respon6-next">
										<div class="rs1-select2 bor8 bg0">
											<select class="js-select2" name="time">
												<option>Choose an option</option>
												<option>Size S</option>
												<option>Size M</option>
												<option>Size L</option>
												<option>Size XL</option>
											</select>
											<div class="dropDownSelect2"></div>
										</div>
									</div>
								</div>

								<div class="flex-w flex-r-m p-b-10">
									<div class="size-203 flex-c-m respon6">
										Color
									</div>

									<div class="size-204 respon6-next">
										<div class="rs1-select2 bor8 bg0">
											<select class="js-select2" name="time">
												<option>Choose an option</option>
												<option>Red</option>
												<option>Blue</option>
												<option>White</option>
												<option>Grey</option>
											</select>
											<div class="dropDownSelect2"></div>
										</div>
									</div>
								</div>

								<div class="flex-w flex-r-m p-b-10">
									<div class="size-204 flex-w flex-m respon6-next">
										<div class="wrap-num-product flex-w m-r-20 m-tb-10">
											<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-minus"></i>
											</div>

											<input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product" value="1">

											<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-plus"></i>
											</div>
										</div>

										<button class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
											Add to cart
										</button>
									</div>
								</div>	
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> --}}

<!--===============================================================================================-->	
    <script src="{{asset ('pacex/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
    
<!--===============================================================================================-->
	<script src="{{asset ('pacex/vendor/animsition/js/animsition.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset ('pacex/vendor/bootstrap/js/popper.js')}}"></script>
	<script src="{{asset ('pacex/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset ('pacex/vendor/select2/select2.min.js')}}"></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
	
<!--===============================================================================================-->
	<script src="{{asset ('pacex/vendor/daterangepicker/moment.min.js')}}"></script>
	<script src="{{asset ('pacex/vendor/daterangepicker/daterangepicker.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset ('pacex/vendor/slick/slick.min.js')}}"></script>
	<script src="{{asset ('pacex/js/slick-custom.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset ('pacex/vendor/parallax100/parallax100.js')}}"></script>
	<script>
        $('.parallax100').parallax100();
	</script>
<!--===============================================================================================-->
	<script src="{{asset ('pacex/vendor/MagnificPopup/jquery.magnific-popup.min.js')}}"></script>
	<script>
		$('.gallery-lb').each(function() { // the containers for all your galleries
			$(this).magnificPopup({
		        delegate: 'a', // the selector for gallery item
		        type: 'image',
		        gallery: {
		        	enabled:true
		        },
		        mainClass: 'mfp-fade'
		    });
		});
	</script>
<!--===============================================================================================-->
	<script src="{{asset ('pacex/vendor/isotope/isotope.pkgd.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset ('pacex/vendor/sweetalert/sweetalert.min.js')}}"></script>
	<script>
		$('.js-addwish-b2').on('click', function(e){
			e.preventDefault();
		});

		$('.js-addwish-b2').each(function(){
			var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-b2');
				$(this).off('click');
			});
		});

		$('.js-addwish-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-detail');
				$(this).off('click');
			});
		});

		/*---------------------------------------------*/

		$('.js-addcart-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
			$(this).on('click', function(){
				// swal(nameProduct, "is added to cart !", "success");
			});
		});
	
	</script>
<!--===============================================================================================-->
	<script src="{{asset ('pacex/vendor/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
	<script>
		$('.js-pscroll').each(function(){
			$(this).css('position','relative');
			$(this).css('overflow','hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function(){
				ps.update();
			})
		});
	</script>
<!--===============================================================================================-->
	<script src="{{asset ('pacex/js/main.js')}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- MDB -->
<script
type="text/javascript"
src="https://cdn.jsdelivr.net/npm/mdb-ui-kit@8.2.0/js/mdb.umd.min.js"
></script>


<script>

function findProductPosition(productId, sizeId) {
	cart= @json($cart);

	
	
  for (let i = 0; i < cart.length; i++) {
    if (cart[i].id == productId && cart[i].sizeId == sizeId) {
      return cart[i]; // Return the product in the cart
    }
  }
  return -1; // Return -1 if the product is not found in the cart
}



		function addToCart(productId,product,image,price,s,sId,q) {
			event.preventDefault();
		// Get values from the form inputs
		let quantity = document.getElementById(q).value; // Get the quantity
		
		let size = document.getElementById(s).value;

        let selectedOption = $("#"+sId+" option:selected");
        let sizeId=selectedOption.data("extra");

			
		// Call the addToCart function with the extracted values
		if (!size || size.trim() === ''||size==='Choose a size') {
            swal(size, "size is not valid !", "warning");
        return; // Prevent further execution of the function
    }
		
		let itemData = {
            id: productId,
			size: size,
            sizeId: sizeId,
			'num-product': quantity,
			product: product,
			imagepath: image,
			price: price
		};
        
        let productQuantity=itemData['num-product'];
        let imageUrl='{{ asset('storage') }}/' + itemData.imagepath;
	
		// Now handle adding this item to the cart (send to Laravel via AJAX or store in cookies)
		
		$.ajax({
						url: '/add-to-cart',
						method: 'POST',
						headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
						data: itemData,
						success: function(response) {
                            swal(itemData.product, "is added to cart !", "success").then(() => {
                                if(document.getElementById("close")) {
									document.getElementById("close").click();
								}
								
                                document.getElementById("shopping-cart").click();
                            });

                            let newItem = `
                <li class="header-cart-item flex-w flex-t m-b-12">
                    <div class="header-cart-item-img">
                        <img src="${imageUrl}" alt="IMG">
                    </div>
                    <div class="header-cart-item-txt p-t-8">
                        <a href="/productdetails/${itemData.id}" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                            ${itemData.product} - ${itemData.size}
                        </a>
                        <span id="${itemData.id}${itemData.sizeId}" class="header-cart-item-info">
                            ${productQuantity} x $${itemData.price.toFixed(2)}
                        </span>
                    </div>
                </li>`;
				
				
				let cart=findProductPosition(itemData.id,itemData.sizeId);
				
				if(findProductPosition(itemData.id,itemData.sizeId)==-1) {
	
					 $('.header-cart-wrapitem').append(newItem);
				}
				else {
				let newQuantity=parseInt($('#'+itemData.id+itemData.sizeId).text().match(/\d+/)[0])+parseInt(productQuantity);
					
					$('#'+itemData.id+itemData.sizeId).text(newQuantity+" x $"+itemData.price.toFixed(2));
				}
           
            let totalPrice = parseFloat($('#totalPrice').text().match(/[\d.]+/)[0]) + (productQuantity * itemData.price);
            $('#totalPrice').text("Total: $"+totalPrice.toFixed(2));
							
						},
						error: function(xhr) {
							alert('Error adding item to cart');
						}
					});
	}
	
	

	   function showMyModal(productId)
	   {
		   // men $products hib el product elli 3ndo el id productId
	   }
</script>
<script>

    $(document).ready(function() {  
          $('.js-show-modal1').on('click',function(e){
           e.preventDefault();
           var productId = $(this).attr('id');
           $('#product-modal'+productId).addClass('show-modal1');
           // 
       });
    
       $('.js-hide-modal1').on('click',function(){
           $('.js-modal1').removeClass('show-modal1');
       });
    
    
    
        });
    </script>

@yield('JS-plus-minus')
</body>
</html>