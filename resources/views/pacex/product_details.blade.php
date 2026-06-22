@extends('pacex.layout')
@section('title','PaceX | '.$product->title)
@section('product')
	<!-- Product Detail -->
	<section class="sec-product-detail bg0 p-t-100 p-b-60">
		<div class="container">
			{{-- <div class="row">
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
			</div> --}}
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

                            <span class="@if($product->discount>0)text-decoration-line-through text-danger @endif mtext-106 cl2">
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

			<div class="bor10 m-t-50 p-t-43 p-b-40">
				<!-- Tab01 -->
				<div class="tab01">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item p-b-10">
							<a class="nav-link active" data-toggle="tab" href="#description" role="tab">Description</a>
						</li>

						<li class="nav-item p-b-10">
							<a class="nav-link" data-toggle="tab" href="#information" role="tab">Additional information</a>
						</li>

						
					</ul>

					<!-- Tab panes -->
					<div class="tab-content p-t-43">
						<!-- - -->
						<div class="tab-pane fade show active" id="description" role="tabpanel">
							<div class="how-pos2 p-lr-15-md">
								<p class="stext-102 cl6">
									{!!$product->description !!}
								</p>
							</div>
						</div>

						<!-- - -->
						<div class="tab-pane fade" id="information" role="tabpanel">
							<div class="row">
								<div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
                                    {!! $product->additional_information !!}
								</div>
							</div>
						</div>

					
					</div>
				</div>
			</div>
		</div>

		<div class="bg6 flex-c-m flex-w size-302 m-t-73 p-tb-15">
			<span class="stext-107 cl6 p-lr-25">
				SKU: JAK-01
			</span>

			<span class="stext-107 cl6 p-lr-25">
				Categories: {{ $product->category->title }}
			</span>
		</div>
	</section>
    
@endsection