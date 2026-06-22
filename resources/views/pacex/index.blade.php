@extends('pacex/layout')
@section('title','PaceX')
@section('home-active','class=active-menu')
@section('slider')

<section class="section-slide">
    <div class="wrap-slick1">
        <div class="slick1">

            @foreach ($sliders as $slider)
              <div class="item-slick1" style="background-image: url({{ asset('storage/'.$slider->image) }});">
                <div class="container h-full">
                    <div class="flex-col-c-m h-full p-t-100 p-b-30 respon5 text-center">
                        @if(!empty($slider->title))
                        <div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
                            <span class="ltext-101 respon2" style="color: {{ $slider->title_color ?? '#222222' }};">
                                {{ $slider->title }}
                            </span>
                        </div>
                        @endif

                        @if(!empty($slider->sub_title))
                        <div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
                            <h2 class="ltext-201 p-t-19 p-b-43 respon1" style="color: {{ $slider->sub_title_color ?? '#222222' }};">
                                {{ $slider->sub_title }}
                            </h2>
                        </div>
                        @endif

                        @if(!empty($slider->url))
                        <div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
                            <a href="{{ $slider->url }}" class="flex-c-m stext-101 size-101 bor1 hov-btn1 p-lr-15 trans-04" style="color: {{ $slider->button_text_color ?? '#ffffff' }}; background-color: {{ $slider->button_background_color ?? '#717fe0' }}; border-color: {{ $slider->button_background_color ?? '#717fe0' }};">
                                {{ $slider->button_text ?: 'Shop Now' }}
                            </a>
                        </div>
                        @endif
                    </div>
                </div>
              </div>  
            @endforeach
            
        </div>
    </div>
</section>
    
@endsection

@section('categories')

<div class="sec-banner bg0 p-t-80 p-b-50">
    <div class="container">
        <div class="row">

            @foreach ($categories as $category)
            <div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
                <!-- Block1 -->
                <div class="block1 wrap-pic-w">
                    <img src="{{ asset('storage/'.$category->image) }}" alt="IMG-BANNER">

                    <a href="{{ route('category',$category->title) }}" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                        <div class="block1-txt-child1 flex-col-l">
                            <span class="block1-name ltext-102 trans-04 p-b-8">
                                {{ $category->title }}
                            </span>

                            <span class="block1-info stext-102 trans-04">
                                {{ $category->sub_title }}
                            </span>
                        </div>

                        <div class="block1-txt-child2 p-b-4 trans-05">
                            <div class="block1-link stext-101 cl0 trans-09">
                                Shop Now
                            </div>
                        </div>
                    </a>
                </div>
            </div>   
            @endforeach


       
        </div>
    </div>
</div>
    
@endsection

@section('products')
 
<!-- Product -->
<section class="bg0 p-t-23 p-b-140">
    <div class="container">
        <div class="p-b-10">
            <h3 class="ltext-103 cl5">
                Featured Products
            </h3>
        </div>

        <div class="row isotope-grid">

            @foreach ($products as $product)
             <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
                <!-- Block2 -->
                <div class="block2">
                    <div class="block2-pic hov-img0 position-relative d-inline-block @if($product->discount>0) label-onsale @endif" data-label="ON SALE &#10; {{$product->discount}}%">
                        <img src="{{ asset('storage/'.$product->main_image) }}" alt="IMG-PRODUCT">
						{{-- @if($product->discount>0)
						<span class="badge bg-danger position-absolute top-0 start-50 ms-5 mt-1 fs-6 rounded-circle">
							ON SALE <br>
							{{ $product->discount }}%
						</span>
						@endif --}}
                        <a href="#" id="{{ $product->id }}" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                            Quick View
                        </a>
                    </div>

                    <div class="block2-txt flex-w flex-t p-t-14">
                        <div class="block2-txt-child1 flex-col-l ">
                            <a href="{{ route('product_details',$product->id) }}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                {{ $product->title }}
                            </a>

                            <span class="@if($product->discount>0)text-decoration-line-through text-danger @endif stext-105 cl3">
                                ${{ number_format($product->price,2) }}
                            </span>
							@if($product->discount>0)
							<span class="stext-105 cl3 text-success">
                                ${{ number_format($product->price-$product->price*$product->discount/100,2) }}
                            </span>
							@endif
                        </div>
						<div class="block2-txt-child2 flex-r p-t-3 rounded-circle bg" style="background-color: {{$product->color}}; width: 25px; height: 25px;">
							
						</div>

                    </div>
                </div>
            </div>

            @endforeach
			
            @foreach ($products as $product)
					
			<!-- Modal1 -->
				{{-- <form action="/add-to-cart" method="POST" id="add-to-cart-form">
				@csrf --}}
				<div class="wrap-modal1 js-modal1 p-t-60 p-b-20" id="product-modal{{ $product->id }}">
					<div class="overlay-modal1 js-hide-modal1"></div>

					<div class="container">
						<div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent">
							<button id="close" type="button" class="how-pos3 hov3 trans-04 js-hide-modal1">
								<img src="{{ asset('pacex/images/icons/icon-close.png') }}" alt="CLOSE">
							</button>

							<div class="row">
								<div class="col-md-6 col-lg-7 p-b-30">
									<div class="p-l-25 p-r-30 p-lr-0-lg">
										<div class="wrap-slick3 flex-sb flex-w">
											<div class="wrap-slick3-dots"></div>
											<div class="wrap-slick3-arrows flex-sb-m flex-w"></div>
												<div class="slick3 gallery-lb">


													<div class="item-slick3" data-thumb="{{ asset('storage/'.$product->main_image) }}">
													
													
													<div class="wrap-pic-w pos-relative">
														<img src="{{ asset('storage/'.$product->main_image) }}" alt="IMG-PRODUCT">

														<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="{{ asset('storage/'.$product->main_image) }}">
														<i class="fa fa-expand"></i>
														</a>
													</div>
													</div>
											@foreach ($product->images as $image)
												
													<div class="item-slick3" data-thumb="{{ asset('storage/'.$image->path) }}">
													
													
													<div class="wrap-pic-w pos-relative">
														<img src="{{ asset('storage/'.$image->path) }}" alt="IMG-PRODUCT">

														<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="{{ asset('storage/'.$image->path) }}">
														<i class="fa fa-expand"></i>
														</a>
													</div>
													</div>
												
											@endforeach
												</div>
										</div>
									</div>
								</div>
								
								<div class="col-md-6 col-lg-5 p-b-30">
									<div class="p-r-50 p-t-5 p-lr-0-lg">
										<h4 class="mtext-105 cl2 js-name-detail p-b-14">
											{{ $product->title }}
										</h4>

										<span class="mtext-106 cl2 @if($product->discount>0)text-decoration-line-through text-danger @endif">
											${{ number_format($product->price,2) }}
										</span>
										@if($product->discount>0)
											<br>
											<span class="mtext-106 cl2 text-success">
                                				${{ number_format($product->price-$product->price*$product->discount/100,2) }}
                            				</span>
										@endif

										<p class="stext-102 cl3 p-t-23">
											{!! $product->description !!}
										</p>
										
										<!--  -->
										<div class="p-t-33">
											<div class="flex-w flex-r-m p-b-10">
												<div class="size-203 flex-c-m respon6">
													Size
												</div>

												<div class="size-204 respon6-next">
													<div class="rs1-select2 bor8 bg0">
														<select class="js-select2" id="size{{ $product->id }}" name="size">
															<option>Choose a size</option>

															@foreach ($product->productinfo as $info)
																<option data-extra="{{ $info->size->id }}" value="{{ $info->size->title }}">Size {{ $info->size->title }}</option>
															@endforeach
															
															
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

														<input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product" id="quantity{{ $product->id }}" value="1" readonly>

														<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
															<i class="fs-16 zmdi zmdi-plus"></i>
														</div>
													</div>
													<input type="hidden" name="id{{ $product->id }}" value="{{ $product->id }}">
													<input type="hidden" name="product{{ $product->id }}" value="{{ $product->title }}">
													<input type="hidden" name="imagepath{{ $product->id }}" value="{{ $product->main_image }}">
													<input type="hidden" name="price{{ $product->id }}" value="{{ $product->price }}">

													<button id="submit" type="button" onclick="addToCart({{ $product->id }},'{{ $product->title }}','{{ $product->main_image }}',{{ $product->price-$product->price*$product->discount/100 }},'size{{ $product->id }}','size{{ $product->id }}','quantity{{ $product->id }}')" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
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
				</div>
			  	{{-- </form> --}}
			
            @endforeach
			
        </div>
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

@endsection
