@extends('master')

@section('main-page')
    <!-- Slider -->
    @if(count($slide_images) > 0)
        <section class="section-slide">
            <div class="wrap-slick1">
                <div class="slick1">
                    @foreach($slide_images as $image)
                        <div class="item-slick1" style="background-image: url({{ url("$image->image") }});">
                            <div class="container h-full">
                                <div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
                                    @if(!empty($image->title))
                                        <div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
										<span class="ltext-101 cl2 respon2">
											{{ $image->title }}
										</span>
                                        </div>
                                    @endif

                                    @if(!empty($image->description))
                                        <div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
                                            <h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
                                                {{ $image->description }}
                                            </h2>
                                        </div>
                                    @endif

                                    @if(!empty($image->link))
                                        <div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
                                            <a href="{{ url("$image->link") }}" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
                                                Xem thêm
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
    @endif

    <!-- Banner -->
    <div class="sec-banner bg0 p-t-80 p-b-35">
        <div class="container">
            <div class="row">
                @foreach($all_categories as $category)
                    @php $category_image = $category->image @endphp
                    <div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
                        <!-- Block1 -->
                        <div class="block1 wrap-pic-w">
                            <img src="{{ url("$category_image") }}" alt="IMG-BANNER" style="width: 100%;height: 245px;object-fit: cover;object-position: center">

                            <a href="{{ route('product', ['cate' => $category->id]) }}" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                                <div class="block1-txt-child1 flex-col-l">
								<span class="block1-name ltext-102 trans-04 p-b-8" style="text-shadow: 0 0 10px white">
									{{ $category->name }}
								</span>

                                    <span class="block1-info stext-102 trans-04">
									2019
								</span>
                                </div>

                                <div class="block1-txt-child2 p-b-4 trans-05">
                                    <div class="block1-link stext-101 cl0 trans-09">
                                        Xem thêm
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Lastest Products -->
    <section class="newproduct bgwhite p-b-80">
        <div class="container">
            <div class="sec-title p-b-35">
                <h3 class="m-text5 t-center" style="font-size: 2rem">
                    Sản phẩm mới nhất
                </h3>
            </div>

            <!-- Slide2 -->
            <div class="wrap-slick2">
                <div class="slick2">
                    @foreach($lastest_products as $product)
                        @if(count($product->images) > 0)
                            @php
                                $thumpnail_img = $product->images[0]->path;
                            @endphp
                            <div class="each-product col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item">
                                <!-- Block2 -->
                                <div class="block2">
                                    <div class="block2-pic hov-img0">
                                        <img src="{{ url("$thumpnail_img") }}" alt="IMG-PRODUCT">

                                        <a href="{{ route('product', ['product_id' => $product->id]) }}" class="quick-view-btn block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1" data-id="{{ $product->id }}">
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

    <!-- Top Products -->
    <section class="newproduct bgwhite p-b-80">
        <div class="container">
            <div class="sec-title p-b-35">
                <h3 class="m-text5 t-center" style="font-size: 2rem">
                    Sản phẩm hàng đầu
                </h3>
            </div>

            <!-- Slide2 -->
            <div class="wrap-slick2">
                <div class="slick2">
                    @foreach($top_products as $product)
                        @if(count($product->product->images) > 0)
                            @php
                                $thumpnail_img = $product->product->images[0]->path;
                            @endphp
                            <div class="each-product col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item">
                                <!-- Block2 -->
                                <div class="block2">
                                    <div class="block2-pic hov-img0">
                                        <img src="{{ url("$thumpnail_img") }}" alt="IMG-PRODUCT">

                                        <a href="{{ route('product', ['product_id' => $product->id]) }}" class="quick-view-btn block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1" data-id="{{ $product->product->id }}">
                                            Xem ngay
                                        </a>
                                    </div>

                                    <div class="block2-txt flex-w flex-t p-t-14">
                                        <div class="block2-txt-child1 flex-col-l ">
                                            <a href="{{ route('product', ['product_id' => $product->id]) }}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                                {{ $product->product->name }}
                                            </a>

                                            <span class="stext-105 cl3">
											₽ {{ $product->product->price }}
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
