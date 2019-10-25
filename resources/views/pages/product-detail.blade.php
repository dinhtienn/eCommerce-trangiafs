@extends('master')

@section('css')
	<style>
		.wrap-menu-desktop {
			box-shadow: 0 0 3px 0 rgba(0,0,0,0.2);
		}
		.container-menu-desktop {
			height: 84px;
		}
	</style>
@endsection

@section('main-page')
	<!-- breadcrumb -->
	<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="/" class="stext-109 cl8 hov-cl1 trans-04">
				Trang chủ
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<a href="{{ route('product', ['cate' => $product->category->id]) }}" class="stext-109 cl8 hov-cl1 trans-04">
				{{ $product->category->name }}
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				{{ $product->name }}
			</span>
		</div>
	</div>

	<!-- Product Detail -->
	<section class="sec-product-detail bg0 p-t-65 p-b-60">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-lg-7 p-b-30">
					<div class="p-l-25 p-r-30 p-lr-0-lg">
						<div class="wrap-slick3 flex-sb flex-w">
							<div class="wrap-slick3-dots"></div>
							<div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

							<div class="slick3 gallery-lb">
								@foreach($product->images as $image)
									<div class="item-slick3" data-thumb="{{ $image->path }}">
										<div class="wrap-pic-w pos-relative">
											<img src="{{ $image->path }}" alt="IMG-PRODUCT">

											<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="{{ $image->path }}">
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
							{{ $product->name }}
						</h4>

						<span class="mtext-106 cl2">
							₽ {{ $product->price }}
						</span>

						<p class="stext-102 cl3 p-t-23">
							{{ $product->short_description }}
						</p>

						<!--  -->
						<div class="flex-w flex-m p-l-100 p-t-40 respon7">
							@foreach($footer_data['social'] as $social)
								@if($social->social == 'Facebook')
									<a href="{{ $social->link }}" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Facebook" target="_blank">
										<i class="fa fa-facebook"></i>
									</a>
								@elseif($social->social == 'Instagram')
									<a href="{{ $social->link }}" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Instagram" target="_blank">
										<i class="fa fa-instagram"></i>
									</a>
								@elseif($social->social == 'Twitter')
									<a href="{{ $social->link }}" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Twitter" target="_blank">
										<i class="fa fa-twitter"></i>
									</a>
								@endif
							@endforeach
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
					</ul>

					<!-- Tab panes -->
					<div class="tab-content p-t-43">
						<!-- - -->
						<div class="tab-pane fade show active" id="description" role="tabpanel">
							<div class="how-pos2 p-lr-15-md">
								<p class="stext-102 cl6">
									{{ $product->description }}
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


	<!-- Related Products -->
	<section class="sec-relate-product bg0 p-t-35 p-b-70">
		<div class="container">
			<div class="p-b-45">
				<h3 class="ltext-106 cl5 txt-center">
					Related Products
				</h3>
			</div>

			<!-- Slide2 -->
			<div class="wrap-slick2">
				<div class="slick2">
					@foreach($product->category->products as $product)
						@if(count($product->images) > 0)
							@php
								$thumpnail_img = $product->images[0]->path;
							@endphp
							<div class="each-product col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item">
								<!-- Block2 -->
								<div class="block2">
									<div class="block2-pic hov-img0">
										<img src="{{ url("$thumpnail_img") }}" alt="IMG-PRODUCT">

										<a href="{{ route('product', ['product_id' => $product->id]) }}" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
											Xem ngay
										</a>
									</div>

									<div class="block2-txt flex-w flex-t p-t-14">
										<div class="block2-txt-child1 flex-col-l ">
											<a href="{{ route('product', ['product_id' => $product->id]) }}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
												{{ $product->name }}
											</a>

											<span class="stext-105 cl3">
												₽ {{ $product->price }}
											</span>
										</div>
									</div>
								</div>
							</div>
						@endif
					@endforeach
				</div>
			</div>
		</div>
	</section>
@endsection