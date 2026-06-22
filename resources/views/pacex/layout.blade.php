<!DOCTYPE html>
<html lang="en">
<head>
	<title>@yield('title')</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="{{ asset('pacex/images/branding/veils-logo.png') }}"/>
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
<!-- Velitique by Hawraa storefront theme -->
<style>
    :root {
        --brand-ivory: #f7f1e8;
        --brand-shell: #fcf9f3;
        --brand-champagne: #eadcc3;
        --brand-gold: #caa56a;
        --brand-gold-deep: #a77c47;
        --brand-ink: #26212b;
        --brand-mocha: #6f5d49;
        --brand-line: rgba(167, 124, 71, 0.24);
        --brand-shadow: 0 24px 60px rgba(61, 43, 21, 0.12);
    }

    body.brand-velitique {
        background:
            radial-gradient(circle at top, rgba(234, 220, 195, 0.55), transparent 38%),
            linear-gradient(180deg, #fffdf9 0%, var(--brand-ivory) 100%);
        color: var(--brand-ink);
    }

    body.brand-velitique a {
        color: inherit;
        transition: color 0.3s ease, border-color 0.3s ease, background-color 0.3s ease, transform 0.3s ease;
    }

    body.brand-velitique .bg0 {
        background-color: transparent !important;
    }

    body.brand-velitique .bg6,
    body.brand-velitique .bg8,
    body.brand-velitique .wrap-filter,
    body.brand-velitique .bor8.bg0,
    body.brand-velitique .size-210,
    body.brand-velitique .header-cart,
    body.brand-velitique .bg0.p-t-60,
    body.brand-velitique .bor10,
    body.brand-velitique .wrap-table-shopping-cart,
    body.brand-velitique .table-shopping-cart,
    body.brand-velitique .rs1-select2 .select2-container .select2-selection--single {
        background: rgba(255, 252, 247, 0.92) !important;
        border-color: var(--brand-line) !important;
        box-shadow: var(--brand-shadow);
    }

    body.brand-velitique .cl1,
    body.brand-velitique .hov-cl1:hover,
    body.brand-velitique .filter-link-active,
    body.brand-velitique .how-active1,
    body.brand-velitique .trans-04.hov-cl1:hover {
        color: var(--brand-gold) !important;
    }

    body.brand-velitique .bg1,
    body.brand-velitique .hov-bg1:hover,
    body.brand-velitique .btn-back-to-top,
    body.brand-velitique .bg8 {
        background-color: var(--brand-gold) !important;
    }

    body.brand-velitique .bg3,
    body.brand-velitique .hov-btn3:hover,
    body.brand-velitique .size-116.bg3:hover,
    body.brand-velitique .size-118.bg8:hover {
        background-color: var(--brand-ink) !important;
        border-color: var(--brand-ink) !important;
    }

    body.brand-velitique .cl2,
    body.brand-velitique .cl5,
    body.brand-velitique .mtext-101,
    body.brand-velitique .mtext-105,
    body.brand-velitique .mtext-109,
    body.brand-velitique .ltext-103,
    body.brand-velitique .ltext-105,
    body.brand-velitique .block1-name,
    body.brand-velitique .stext-104,
    body.brand-velitique .nav-link.active {
        color: var(--brand-ink) !important;
    }

    body.brand-velitique .cl3,
    body.brand-velitique .cl4,
    body.brand-velitique .cl6,
    body.brand-velitique .stext-102,
    body.brand-velitique .stext-105,
    body.brand-velitique .header-cart-item-info,
    body.brand-velitique .block1-info {
        color: var(--brand-mocha) !important;
    }

    body.brand-velitique .bor1,
    body.brand-velitique .bor2,
    body.brand-velitique .bor7,
    body.brand-velitique .bor8,
    body.brand-velitique .bor10,
    body.brand-velitique .bor13,
    body.brand-velitique .bor15,
    body.brand-velitique .table-shopping-cart td,
    body.brand-velitique .table-shopping-cart th,
    body.brand-velitique .nav-tabs,
    body.brand-velitique .nav-tabs .nav-link,
    body.brand-velitique .accordion-item,
    body.brand-velitique .form-control,
    body.brand-velitique textarea,
    body.brand-velitique input,
    body.brand-velitique select {
        border-color: var(--brand-line) !important;
    }

    body.brand-velitique .top-bar {
        height: 44px;
        background: linear-gradient(90deg, var(--brand-ink), #3b2f23, var(--brand-ink));
        border-bottom: 1px solid rgba(234, 220, 195, 0.25);
    }

    body.brand-velitique .left-top-bar,
    body.brand-velitique .left-top-bar p {
        color: rgba(247, 241, 232, 0.88) !important;
        letter-spacing: 0.18em;
        text-transform: uppercase;
        font-size: 11px;
    }

    body.brand-velitique .wrap-menu-desktop,
    body.brand-velitique .wrap-menu-desktop.how-shadow1,
    body.brand-velitique .fix-menu-desktop .wrap-menu-desktop {
        top: 44px;
        height: 92px;
        background: rgba(255, 250, 244, 0.92) !important;
        backdrop-filter: blur(16px);
        border-bottom: 1px solid rgba(167, 124, 71, 0.15);
        box-shadow: 0 18px 48px rgba(55, 35, 12, 0.08);
    }

    body.brand-velitique .logo {
        height: 156px;
        margin-right: 42px;
        padding: 6px 0;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    body.brand-velitique .logo img,
    body.brand-velitique .logo-mobile img {
        max-height: 100%;
        width: auto;
        object-fit: contain;
        filter: drop-shadow(0 14px 26px rgba(112, 90, 54, 0.2));
        transition: transform 0.3s ease, filter 0.3s ease;
    }

    body.brand-velitique .logo img {
        max-width: 380px;
    }

    body.brand-velitique .logo:hover img,
    body.brand-velitique .logo-mobile:hover img {
        transform: translateY(-1px) scale(1.02);
        filter: drop-shadow(0 18px 32px rgba(112, 90, 54, 0.24));
    }

    body.brand-velitique .menu-desktop .main-menu > li > a {
        position: relative;
        color: var(--brand-ink);
        letter-spacing: 0.14em;
        text-transform: uppercase;
        font-weight: 600;
        font-size: 13px;
    }

    body.brand-velitique .menu-desktop .main-menu > li > a::after {
        content: "";
        position: absolute;
        left: 2px;
        right: 2px;
        bottom: -8px;
        height: 2px;
        border-radius: 999px;
        background: linear-gradient(90deg, transparent, var(--brand-gold), transparent);
        transform: scaleX(0);
        transform-origin: center;
        transition: transform 0.35s ease;
    }

    body.brand-velitique .menu-desktop .main-menu > li:hover > a,
    body.brand-velitique .menu-desktop .main-menu > li.active-menu > a {
        color: var(--brand-gold-deep);
    }

    body.brand-velitique .menu-desktop .main-menu > li:hover > a::after,
    body.brand-velitique .menu-desktop .main-menu > li.active-menu > a::after {
        transform: scaleX(1);
    }

    body.brand-velitique .menu-desktop .main-menu .sub-menu {
        background: rgba(255, 250, 244, 0.98);
        border-top: 2px solid var(--brand-gold);
        border-radius: 18px;
        padding: 10px 0;
        box-shadow: 0 22px 40px rgba(48, 31, 12, 0.12);
    }

    body.brand-velitique .menu-desktop .main-menu .sub-menu a {
        color: var(--brand-mocha);
    }

    body.brand-velitique .menu-desktop .main-menu .sub-menu a:hover {
        color: var(--brand-gold-deep);
    }

    body.brand-velitique .container-menu-desktop .wrap-icon-header .icon-header-item {
        color: var(--brand-ink);
    }

    body.brand-velitique .icon-header-item:hover,
    body.brand-velitique .btn-num-product-up:hover,
    body.brand-velitique .btn-num-product-down:hover,
    body.brand-velitique .btn-num-product-up1:hover,
    body.brand-velitique .btn-num-product-down1:hover {
        color: var(--brand-gold-deep) !important;
        background: rgba(202, 165, 106, 0.12);
    }

    body.brand-velitique .wrap-header-mobile {
        position: relative;
        background: linear-gradient(90deg, var(--brand-ink), #3c3025 50%, var(--brand-ink));
        justify-content: flex-start;
        min-height: 74px;
        box-shadow: 0 18px 36px rgba(38, 33, 43, 0.18);
    }

    body.brand-velitique .wrap-header-mobile .hamburger-inner,
    body.brand-velitique .wrap-header-mobile .hamburger-inner::before,
    body.brand-velitique .wrap-header-mobile .hamburger-inner::after {
        background-color: #fff6ea !important;
    }

    body.brand-velitique .wrap-header-mobile .icon-header-item {
        color: #fff5e5 !important;
    }

    body.brand-velitique .wrap-header-mobile .btn-show-menu-mobile {
        order: 1;
        position: relative;
        z-index: 2;
        margin-right: 0;
    }

    body.brand-velitique .wrap-header-mobile .wrap-icon-header {
        order: 3;
        margin-left: auto;
        margin-right: 0;
        position: relative;
        z-index: 2;
    }

    body.brand-velitique .wrap-header-mobile .logo-mobile {
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        z-index: 1;
        width: 290px;
        height: 112px;
        padding: 0;
        text-align: center;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    body.brand-velitique .wrap-header-mobile .logo-mobile img {
        left: 50%;
        right: auto;
        transform: translateX(-50%);
        max-width: 290px;
    }

    body.brand-velitique .menu-mobile {
        position: relative;
        background:
            radial-gradient(circle at top, rgba(202, 165, 106, 0.25), transparent 34%),
            linear-gradient(180deg, #2b2320 0%, #1f1a20 100%);
        border-top: 1px solid rgba(234, 220, 195, 0.18);
        overflow: hidden;
    }

    body.brand-velitique .menu-mobile::before {
        content: "V";
        position: absolute;
        right: -22px;
        bottom: -96px;
        font-size: 340px;
        line-height: 1;
        font-family: PlayfairDisplay-Bold;
        color: rgba(255, 247, 234, 0.05);
        pointer-events: none;
        z-index: 0;
    }

    body.brand-velitique .menu-mobile .left-top-bar {
        position: relative;
        z-index: 1;
        background: transparent;
        color: rgba(255, 244, 227, 0.7) !important;
        text-align: center;
        letter-spacing: 0.18em;
        text-transform: uppercase;
        font-size: 11px;
        padding: 16px 0;
        border-bottom: 1px solid rgba(234, 220, 195, 0.12);
    }

    body.brand-velitique .main-menu-m {
        position: relative;
        z-index: 1;
        background-color: transparent;
        padding: 18px 16px 28px;
    }

    body.brand-velitique .main-menu-m > li {
        margin-bottom: 14px;
        border: 1px solid rgba(234, 220, 195, 0.16);
        border-radius: 16px;
        background-color: rgba(255, 251, 245, 0.05);
        overflow: hidden;
    }

    body.brand-velitique .main-menu-m > li:last-child {
        margin-bottom: 0;
    }

    body.brand-velitique .main-menu-m > li > a {
        display: block;
        color: #fff7eb;
        text-transform: uppercase;
        letter-spacing: 0.2em;
        font-size: 15px;
        font-weight: 600;
        line-height: 1.4;
        padding: 24px 26px;
        -webkit-tap-highlight-color: rgba(255, 255, 255, 0.25);
    }

    body.brand-velitique .main-menu-m > li > a:hover,
    body.brand-velitique .main-menu-m > li > a:active {
        background-color: rgba(202, 165, 106, 0.18);
        padding-left: 32px;
    }

    body.brand-velitique .main-menu-m .sub-menu-m {
        background-color: rgba(255, 255, 255, 0.04);
    }

    body.brand-velitique .main-menu-m .sub-menu-m li {
        border-top: 1px solid rgba(234, 220, 195, 0.08);
    }

    body.brand-velitique .main-menu-m .sub-menu-m li a {
        display: block;
        color: rgba(255, 244, 227, 0.8);
        font-size: 12px;
        letter-spacing: 0.18em;
        font-weight: 400;
        padding: 18px 26px 18px 38px;
        -webkit-tap-highlight-color: rgba(255, 255, 255, 0.25);
    }

    body.brand-velitique .main-menu-m .sub-menu-m li a:hover,
    body.brand-velitique .main-menu-m .sub-menu-m li a:active {
        color: #fff;
        background-color: rgba(202, 165, 106, 0.18);
        padding-left: 46px;
    }

    body.brand-velitique .main-menu-m .arrow-main-menu-m {
        top: 8px;
        right: 8px;
        padding: 16px;
    }

    body.brand-velitique .main-menu-m .arrow-main-menu-m,
    body.brand-velitique .main-menu-m .arrow-main-menu-m .fa {
        color: rgba(255, 244, 227, 0.65);
    }

    body.brand-velitique .section-slide {
        margin-top: 92px;
    }

    body.brand-velitique .item-slick1 {
        position: relative;
        overflow: hidden;
    }

    body.brand-velitique .item-slick1 .container,
    body.brand-velitique .item-slick1 .layer-slick1 {
        position: relative;
        z-index: 1;
    }

    body.brand-velitique .section-slide .flex-col-c-m {
        text-shadow: 0 10px 30px rgba(38, 33, 43, 0.16);
    }

    body.brand-velitique .section-slide .ltext-101,
    body.brand-velitique .section-slide .ltext-201 {
        text-shadow: 0 8px 24px rgba(255, 255, 255, 0.35);
    }

    body.brand-velitique .ltext-101,
    body.brand-velitique .ltext-201,
    body.brand-velitique .ltext-103,
    body.brand-velitique .ltext-105 {
        font-family: PlayfairDisplay-Bold;
        letter-spacing: 0.02em;
    }

    body.brand-velitique .block1,
    body.brand-velitique .block2,
    body.brand-velitique .how-bor1,
    body.brand-velitique .accordion-item {
        border-radius: 24px;
        overflow: hidden;
        border: 1px solid rgba(167, 124, 71, 0.12);
        box-shadow: var(--brand-shadow);
    }

    body.brand-velitique .block1-txt {
        background: linear-gradient(180deg, rgba(38, 33, 43, 0.04) 0%, rgba(38, 33, 43, 0.55) 100%);
    }

    body.brand-velitique .block1-txt:hover {
        background: linear-gradient(180deg, rgba(38, 33, 43, 0.08) 0%, rgba(38, 33, 43, 0.68) 100%);
    }

    body.brand-velitique .block1-link {
        padding-bottom: 3px;
        border-bottom: 1px solid rgba(255, 248, 236, 0.65);
        letter-spacing: 0.18em;
        text-transform: uppercase;
    }

    body.brand-velitique .block2 {
        padding: 14px;
        background: rgba(255, 252, 247, 0.88);
    }

    body.brand-velitique .block2-pic,
    body.brand-velitique .how-itemcart1,
    body.brand-velitique .slick3 .item-slick3 {
        border-radius: 18px;
        overflow: hidden;
    }

    body.brand-velitique .block2-btn,
    body.brand-velitique .flex-c-m.stext-101,
    body.brand-velitique .flex-c-m.stext-103,
    body.brand-velitique .size-118.bg8,
    body.brand-velitique .size-116.bg3 {
        border-radius: 999px;
        letter-spacing: 0.14em;
        text-transform: uppercase;
        font-weight: 700;
    }

    body.brand-velitique .hov-btn1:hover,
    body.brand-velitique .size-116.bg3,
    body.brand-velitique .size-118.bg8 {
        color: var(--brand-ink) !important;
        border-color: var(--brand-gold) !important;
        background-color: var(--brand-gold) !important;
    }

    body.brand-velitique .hov-btn1:hover,
    body.brand-velitique .size-116.bg3:hover,
    body.brand-velitique .size-118.bg8:hover {
        color: #fff7ea !important;
    }

    body.brand-velitique .bg-img1 {
        position: relative;
        overflow: hidden;
    }

    body.brand-velitique .bg-img1::before {
        content: "";
        position: absolute;
        inset: 0;
        background:
            linear-gradient(135deg, rgba(38, 33, 43, 0.72), rgba(167, 124, 71, 0.34)),
            linear-gradient(180deg, rgba(255, 255, 255, 0.08), transparent);
    }

    body.brand-velitique .bg-img1 > * {
        position: relative;
        z-index: 1;
    }

    body.brand-velitique .header-cart,
    body.brand-velitique .bg0.p-t-60.p-b-30.p-lr-15-lg {
        background: rgba(255, 252, 247, 0.98) !important;
    }

    body.brand-velitique .table-shopping-cart .table_head th {
        background: rgba(202, 165, 106, 0.16);
        color: var(--brand-ink);
    }

    body.brand-velitique .nav-tabs .nav-link {
        color: var(--brand-mocha);
    }

    body.brand-velitique .nav-tabs .nav-link.active {
        border-bottom: 2px solid var(--brand-gold) !important;
    }

    body.brand-velitique .accordion-button {
        background: rgba(247, 241, 232, 0.96) !important;
        color: var(--brand-ink) !important;
        font-weight: 600;
    }

    body.brand-velitique .accordion-button:not(.collapsed) {
        background: rgba(202, 165, 106, 0.18) !important;
        box-shadow: none;
    }

    body.brand-velitique .accordion-body {
        background: rgba(255, 252, 247, 0.92) !important;
        color: var(--brand-mocha) !important;
    }

    body.brand-velitique footer.bg3 {
        background:
            radial-gradient(circle at top, rgba(202, 165, 106, 0.18), transparent 32%),
            linear-gradient(180deg, #241d23 0%, #171218 100%) !important;
    }

    body.brand-velitique footer .cl7 {
        color: rgba(255, 243, 227, 0.7) !important;
    }

    body.brand-velitique footer .hov-cl1:hover {
        color: var(--brand-champagne) !important;
    }

    body.brand-velitique .btn-back-to-top {
        opacity: 0.92;
        right: 24px;
        bottom: 24px;
        box-shadow: 0 18px 30px rgba(74, 49, 24, 0.24);
    }

    body.brand-velitique .btn-back-to-top:hover {
        background-color: var(--brand-gold-deep) !important;
    }

    @media (max-width: 991px) {
        body.brand-velitique .logo {
            height: 128px;
        }

        body.brand-velitique .logo img {
            max-width: 320px;
        }

        body.brand-velitique .item-slick1 {
            height: 78vh !important;
            min-height: 520px !important;
            aspect-ratio: auto;
            background-size: cover !important;
            background-position: center center;
            background-color: var(--brand-ink);
        }

        body.brand-velitique .item-slick1 .container.h-full,
        body.brand-velitique .item-slick1 .flex-col-l-m.h-full {
            height: 100% !important;
        }

        body.brand-velitique .section-slide {
            margin-top: 0;
        }
    }

    @media (max-width: 575px) {
        body.brand-velitique .wrap-header-mobile .logo-mobile {
            width: 235px;
            height: 90px;
        }

        body.brand-velitique .wrap-header-mobile .logo-mobile img {
            max-width: 230px;
        }
    }
</style>
<!--===============================================================================================-->

</head>
<body class="animsition brand-velitique">
	
	<!-- Header -->
	<header @yield('class')>
		<!-- Header desktop -->
		<div class="container-menu-desktop">
			<!-- Topbar -->
			<div class="top-bar">
				<div class="content-topbar flex-sb-m h-full container">
					<div class="left-top-bar">
						<p>Signature modestwear with complimentary shipping on orders over $100</p>
					</div>
				</div>
			</div>

			<div class="wrap-menu-desktop how-shadow1">
				<nav class="limiter-menu-desktop container">
					
					<!-- Logo desktop -->		
					<a href="{{ route('home') }}" class="logo">
						<img src="{{ asset('pacex/images/branding/veils-logo.png') }}" alt="Velitique by Hawraa logo">
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
			<!-- Button show menu -->
			<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</div>

			<!-- Logo moblie -->		
			<div class="logo-mobile">
				<a href="{{ route('home') }}"><img src="{{ asset('pacex/images/branding/veils-logo.png') }}" alt="Velitique by Hawraa logo"></a>
			</div>

			<!-- Icon header -->
			<div class="wrap-icon-header flex-w flex-r-m">

				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="{{ count($cart) }}">
					<i class="zmdi zmdi-shopping-cart"></i>
				</div>
			</div>
		</div>


		<!-- Menu Mobile -->
		<div class="menu-mobile">
			<div class="left-top-bar">
				<p>Signature modestwear with complimentary shipping on orders over $100</p>
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
					Copyright &copy;{{ \Carbon\Carbon::now()->year }} All rights reserved | Velitique by Hawraa | Privacy and Terms.
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
