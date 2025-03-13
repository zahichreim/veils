@extends('pacex.layout')
@section('title','PaceX | Track Your Order')
@section('info-active','class=active-menu')
@section('class','class=header-v4')
@section('content')
	<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url({{ asset('storage/'.$setting->image) }});">
		<h2 class="ltext-105 cl0 txt-center">
			Track Your Order
		</h2>
	</section>	


	<!-- Content page -->
	<section class="bg0 p-t-104 p-b-116">
		<div class="container">
			<div class="flex-w flex-tr">
				<div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
                    @if (session('success'))
                        <div class="alert alert-success text-center">
                            <p>{{ session('success') }}</p>
                        </div>
                    @endif
                    <form action="{{ route('order-status') }}" method="GET">
                        @csrf
						<h4 class="mtext-105 cl2 txt-center p-b-30">
							Track Your Order
						</h4>

						<div class="bor8 m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="order_nb" value="{{ old('order_nb') }}" placeholder="Enter Your Order Number">
						</div>

                        @error('order_nb')
                            <p class="text-danger">{{$message}}</p>
                        @enderror

						<button type="submit" class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
							View My Oder Status
						</button>
					</form>
                    
				</div>
                    
				<div class="size-210 bor10 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
                    @isset($error)
                        <div class="alert alert-danger text-center" style="width: fit-content; left: 50%; transform: translateX(-50%);">
                            <p>{{ $error }}</p>
                        </div>
                    @endisset
                        

                    @isset($order_status)
                    <div class="alert alert-success text-center" style="width: fit-content; left: 50%; transform: translateX(-50%);">
                        <p>{{ $order_status }}</p>
                    </div>
                    @endisset
                    
				</div>
			</div>
		</div>
	</section>	    
@endsection