<!DOCTYPE html>
<html lang="en">
<head>
    <title>TranGiaFS</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{ url('images/logo-tab.png') }}"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ url('vendor/bootstrap/css/bootstrap.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ url('fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ url('fonts/iconic/css/material-design-iconic-font.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ url('fonts/linearicons-v1.0.0/icon-font.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ url('vendor/animate/animate.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ url('vendor/css-hamburgers/hamburgers.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ url('vendor/animsition/css/animsition.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ url('vendor/select2/select2.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ url('vendor/daterangepicker/daterangepicker.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ url('vendor/slick/slick.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ 'vendor/MagnificPopup/magnific-popup.css' }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ 'vendor/perfect-scrollbar/perfect-scrollbar.css' }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ url('css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('css/main.css') }}">
    <!--===============================================================================================-->
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    @yield('css')
</head>
<body class="animsition">
    <!-- Header -->
    <header class="header-v4">
        <!-- Header desktop -->
        <div class="container-menu-desktop">
            <div class="wrap-menu-desktop">
                <nav class="limiter-menu-desktop container">
                    <!-- Logo desktop -->
                    <a href="/" class="logo">
                        @foreach($header_data['company_info'] as $company)
                            <img src="{{ url("$company->logo") }}" alt="IMG-LOGO">
                        @endforeach
                    </a>
                    <!-- Menu desktop -->
                    <div class="menu-desktop">
                        <ul class="main-menu">
                            <li class="active-menu">
                                <a href="/">Trang chủ</a>
                            </li>
                            <li>
                                <a href="{{ route('product') }}">Mua sắm</a>
                            </li>
                            <li>
                                <a href="{{ route('info') }}">Thông tin</a>
                            </li>
                            <li>
                                <a href="{{ route('contact') }}">Liên hệ</a>
                            </li>
                        </ul>
                    </div>
                    <!-- Icon header -->
                    <div class="wrap-icon-header flex-w flex-r-m">
                        <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
                            <i class="zmdi zmdi-search"></i>
                        </div>
                    </div>
                </nav>
            </div>
        </div>

        <!-- Header Mobile -->
        <div class="wrap-header-mobile">
            <!-- Logo moblie -->
            <div class="logo-mobile">
                @foreach($header_data['company_info'] as $company)
                    <a href="/"><img src="{{ url("$company->logo") }}" alt="IMG-LOGO"></a>
                @endforeach
            </div>
            <!-- Icon header -->
            <div class="wrap-icon-header flex-w flex-r-m m-r-15">
                <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
                    <i class="zmdi zmdi-search"></i>
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
            <ul class="main-menu-m">
                <li>
                    <a href="/">Trang chủ</a>
                </li>
                <li>
                    <a href="{{ route('product') }}">Mua sắm</a>
                </li>
                <li>
                    <a href="{{ route('info') }}">Thông tin</a>
                </li>
                <li>
                    <a href="{{ route('contact') }}">Liên hệ</a>
                </li>
            </ul>
        </div>

        <!-- Modal Search -->
        <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
            <div class="container-search-header">
                <button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
                    <img src="{{ url('images/icons/icon-close2.png') }}" alt="CLOSE">
                </button>

                <form class="wrap-search-header flex-w p-l-15" method="GET" action="{{ route('product') }}">
                    <button class="flex-c-m trans-04">
                        <i class="zmdi zmdi-search"></i>
                    </button>
                    <input class="plh3" type="text" name="search" placeholder="Tìm kiếm...">
                </form>
            </div>
        </div>
    </header>

    @yield('main-page')

    <!-- Footer -->
    <footer class="bg3 p-t-75 p-b-32">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-lg-3 p-b-50">
                    <h4 class="stext-301 cl0 p-b-30">
                        Danh mục
                    </h4>

                    <ul>
                        @foreach($footer_data['category'] as $category)
                            <li class="p-b-10">
                                <a href="{{ route('product', ['cate' => $category->id]) }}" class="stext-107 cl7 hov-cl1 trans-04">
                                    {{ $category->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="col-sm-6 col-lg-3 p-b-50">
                    <h4 class="stext-301 cl0 p-b-30">
                        Giúp đỡ
                    </h4>

                    <ul>
                        <li class="p-b-10">
                            <a href="{{ route('info') }}" class="stext-107 cl7 hov-cl1 trans-04">
                                Thông tin
                            </a>
                        </li>

                        <li class="p-b-10">
                            <a href="{{ route('contact') }}" class="stext-107 cl7 hov-cl1 trans-04">
                                Liên hệ
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="col-sm-6 col-lg-3 p-b-50">
                    <h4 class="stext-301 cl0 p-b-30">
                        Tương tác
                    </h4>

                    <p class="stext-107 cl7 size-201">
                        @foreach($header_data['company_info'] as $company)
                            Liên hệ nhanh với chúng tôi: {{ $company->address }} hoặc gọi {{ $company->phone }}
                        @endforeach
                    </p>

                    <div class="p-t-27">
                        @foreach($footer_data['social'] as $social)
                            @if($social->social == 'Facebook')
                                <a href="{{ $social->link }}" target="_blank" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
                                    <i class="fa fa-facebook"></i>
                                </a>
                            @elseif($social->social == 'Instagram')
                                <a href="{{ $social->link }}" target="_blank" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
                                    <i class="fa fa-instagram"></i>
                                </a>
                            @elseif($social->social == 'Twitter')
                                <a href="{{ $social->link }}" target="_blank" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
                                    <i class="fa fa-twitter"></i>
                                </a>
                            @endif
                        @endforeach
                    </div>
                </div>

                <div class="col-sm-6 col-lg-3 p-b-50">
                    <h4 class="stext-301 cl0 p-b-30">
                        Tham quan
                    </h4>

                    <div>
                        <div class="p-t-18">
                            <button id="footer-shopping" data-route="{{ route('product') }}" class="flex-c-m stext-101 cl0 size-103 bg1 bor1 hov-btn2 p-lr-15 trans-04">
                                Mua sắm
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <p class="stext-107 cl6 txt-center">
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> TranGiaFS
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

    <!-- Modal1 -->
    <div class="wrap-modal1 js-modal1 p-t-60 p-b-20">
        <div class="overlay-modal1 js-hide-modal1"></div>

        <div class="container">
            <div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent">
                <button class="how-pos3 hov3 trans-04 js-hide-modal1">
                    <img src="{{ url('images/test_images/icons/icon-close.png') }}" alt="CLOSE">
                </button>

                <div id="quick-view-content" class="row">
                    {{-- AJAX RENDER --}}
                </div>
            </div>
        </div>
    </div>

    <!--===============================================================================================-->
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/select2/select2.min.js"></script>
    <script>
        $(".js-select2").each(function(){
            $(this).select2({
                minimumResultsForSearch: 20,
                dropdownParent: $(this).next('.dropDownSelect2')
            });
        })
    </script>
    <!--===============================================================================================-->
    <script src="vendor/daterangepicker/moment.min.js"></script>
    <script src="vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/slick/slick.min.js"></script>
    <script src="js/slick-custom.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/parallax100/parallax100.js"></script>
    <script>
        $('.parallax100').parallax100();
    </script>
    <!--===============================================================================================-->
    <script src="vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
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
    <script src="vendor/isotope/isotope.pkgd.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/sweetalert/sweetalert.min.js"></script>
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
            swal(nameProduct, "is added to cart !", "success");
        });
    });

    </script>
    <!--===============================================================================================-->
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
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
    <script>
        var apiSendMessageRoute = "{{ route('api.message.send') }}";
        var apiQuickView = "{{ route('ajax.product.view') }}";
        var listSocial = [];
        @foreach($footer_data['social'] as $social)
            @if($social->social == 'Facebook')
                listSocial['Facebook'] = "{{ $social->link }}"
            @elseif($social->social == 'Instagram')
                listSocial['Instagram'] = "{{ $social->link }}"
            @elseif($social->social == 'Twitter')
                listSocial['Twitter'] = "{{ $social->link }}"
            @endif
        @endforeach
    </script>
    <script src="js/main.js"></script>
    <script src="js/handle.js"></script>
</body>
</html>