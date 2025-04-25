@extends('pacex.layout')
@section('title','PaceX | About US')
@section('info-active','class=active-menu')
@section('class','class=header-v4')
@section('content')

	<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('{{ asset('storage/'.$header_image) }}');">
		<h2 class="ltext-105 cl0 txt-center">
			About US
		</h2>
	</section>	


	<!-- Content page -->
	<section class="bg0 p-t-75 p-b-120">
		<div class="container">
			<div class="row p-b-148">
				<div class="col-md-7 col-lg-8">
					<div class="p-t-7 p-r-85 p-r-15-lg p-r-0-md">
						{!! $setting->value !!}
					</div>
				</div>

				<div class="col-11 col-md-5 col-lg-4 m-lr-auto">
					<div class="how-bor1 ">
						<div class="hov-img0">
							<img src="{{ asset('storage/'.$setting->image) }}" alt="IMG">
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</section>	
    
@endsection