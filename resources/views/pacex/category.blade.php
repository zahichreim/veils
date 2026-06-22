@extends('pacex.layout')
@section('title','PaceX | '.$category[0]->title)
@section('{{ $category->title }}-active','class=active-menu')
@section('products')

@php $category = $category->first(); @endphp

<div class="bg0 m-t-100 p-b-140">
<div class="container">
<div class="flex-w flex-sb-m p-b-52">
    <div class="flex-w flex-l-m filter-tope-group m-tb-10">
        <h3 class="mtext-101 cl2 m-r-32 m-tb-5">{{ $category->title }}</h3>
    </div>
    
    <!-- Search product -->
    <div class="dis-none panel-search w-full p-t-10 p-b-15">
        <div class="bor8 dis-flex p-l-15">
            <button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
                <i class="zmdi zmdi-search"></i>
            </button>

            <input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search-product" placeholder="Search">
        </div>	
    </div>


</div>

<div class="row isotope-grid"   id="products-container">

    @foreach ($category->products as $product)

     <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item {{ preg_replace('/[^a-zA-Z0-9]/', '', $category->title) }}">
        <!-- Block2 -->
        <div class="block2">
            <div class="block2-pic hov-img0">
                <img src="{{ asset('storage/'.$product->main_image) }}" alt="IMG-PRODUCT">

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
                        ${{ $product->price }}
                    </span>
                    @if($product->discount>0)
							<span class="stext-105 cl3 text-success">
                                ${{ $product->price-$product->price*$product->discount/100 }}
                            </span>
					@endif
                </div>
            </div>
        </div>
    </div>
    
    @endforeach

    @foreach ($category->products as $product)
			  <!-- Modal1 -->
				{{-- <div class="wrap-modal1 js-modal1 p-t-60 p-b-20" id="product-modal{{ $product->id }}">
					<div class="overlay-modal1 js-hide-modal1"></div>

					<div class="container">
						<div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent">
							<button class="how-pos3 hov3 trans-04 js-hide-modal1">
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

										<span class="mtext-106 cl2">
											${{ $product->price }}
										</span>

										<p class="stext-102 cl3 p-t-23">
											{!!$product->description !!}
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

															@foreach ($product->productinfo as $info)
																<option>Size {{ $info->size->title }}</option>
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
                                                ${{ $product->price }}
                                            </span>
                                            @if($product->discount>0)
                                                <br>
                                                <span class="mtext-106 cl2 text-success">
                                                    ${{ $product->price-$product->price*$product->discount/100 }}
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

            {{-- <!-- Load more -->
            @if ($products->count()==$newLoadedCount)
            <form method="GET" action="{{ url()->current() }}">
            <input type="hidden" name="loaded_count" value="{{ $newLoadedCount }}">
               <div class="flex-c-m flex-w w-full p-t-45">
				<button type="submit" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
					Load More
				</button>
			    </div>
            </form>
            @else
                <p>No more Products to load.</p>
            @endif --}}
  			
            
            
</div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
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
   function showMyModal(productId)
   {
	   // men $products hib el product elli 3ndo el id productId
   }

   




</script>

@endsection
