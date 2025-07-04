<!doctype html>
<html class="no-js" lang="en">
<head>
    <title>BigMard</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="author" content="ThemeZaa">
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="description" content="Elevate your online presence with Crafto - a modern, versatile, multipurpose Bootstrap 5 responsive HTML5, SCSS template using highly creative 52+ ready demos.">
    <!-- favicon icon -->
    <link rel="shortcut icon" href="images/favicon.png">
    <link rel="apple-touch-icon" href="images/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">
    <!-- google fonts preconnect -->
    <link rel="preconnect" href="https://fonts.googleapis.com" crossorigin>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- style sheets and font icons  -->
    <link rel="stylesheet" href="{{asset('assets/css/vendors.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/css/icon.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/css/modal.css')}}"/>

    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/demos/fashion-store/fashion-store.css')}}" />
    @stack('css')
</head>
<body data-mobile-nav-style="classic">
<!-- start header -->
<header class="header-with-topbar">
    <!-- start header top bar -->
    <div class="header-top-bar top-bar-light  h-40px bg-base-color disable-fixed md-border-bottom border-color-transparent-dark-very-light">

    </div>
    <!-- end header top bar -->
    <!-- start navigation -->
    <nav class="navbar navbar-expand-lg header-light bg-white disable-fixed center-logo">
        <div class="container-fluid">
            <div class="col-auto col-xxl-3 col-lg-2 menu-logo">
                <div class="header-icon d-none d-lg-flex">
                    <div class="widget-text icon alt-font">
                        <a href="{{route('home.index')}}"><i class="feather icon-feather-map-pin d-inline-block me-5px"></i><span class="d-none d-xxl-inline-block">Find stores</span></a>
                    </div>
{{--                    <div class="widget-text icon alt-font">--}}
{{--                        <a href="https://www.instagram.com/" target="_blank"><i class="feather icon-feather-instagram d-inline-block me-5px"></i><span class="d-none d-xxl-inline-block">100k Followers</span></a>--}}
{{--                    </div>--}}
                </div>
                <a class="navbar-brand" href="{{ route('home.index') }}">
                    <img src="{{asset('assets/image/logo.webp')}}" data-at2x="{{asset('assets/image/logo.webp')}}" style="transform:scale(3)" class="default-logo">
                    <img src="{{asset('assets/image/logo.webp')}}" data-at2x="{{asset('assets/image/logo.webp')}}" style="transform:scale(3)" class="alt-logo">
                    <img src="{{asset('assets/image/logo.webp')}}" data-at2x="{{asset('assets/image/logo.webp')}}" style="transform:scale(3)" class="mobile-logo">
                </a>
            </div>
            <div class="col-auto col-xxl-6 col-lg-8 menu-order">
                <button class="navbar-toggler float-end" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-label="Toggle navigation">
                    <span class="navbar-toggler-line"></span>
                    <span class="navbar-toggler-line"></span>
                    <span class="navbar-toggler-line"></span>
                    <span class="navbar-toggler-line"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
                    <ul class="navbar-nav alt-font navbar-left justify-content-end">
                        <li class="nav-item">
                            <a href="{{route('home.index')}}" class="nav-link">Գլխավոր</a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('home.best')}}" class="nav-link">TOP վաճառք</a>

                        </li>
                    </ul>
                    <ul class="navbar-nav alt-font navbar-right justify-content-start">
                        <li class="nav-item">
                            <a href="{{route('home.hot')}}" class="nav-link">Թեժ առաջարկ</a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{route('home.news')}}" class="nav-link ">NEW</a>
                        </li>

                    </ul>
                </div>
            </div>
            <div class="col-auto col-xxl-3 col-lg-2 text-end">
                <div class="header-icon">
                    <div class="header-search-icon icon alt-font">
                        <a href="javascript:void(0)" class="search-form-icon header-search-form"><i class="feather icon-feather-search me-5px"></i><span class="d-none d-xxl-inline-block">Search</span></a>
                        <div class="search-form-wrapper">
                            <button title="Close" type="button" class="search-close alt-font">×</button>
                            <form id="search-form" role="search" method="get" class="search-form text-left" action="search-result.html">
                                <div class="search-form-box">
                                    <h2 class="text-dark-gray text-center mb-4 fw-600 alt-font ls-minus-1px">What are you looking for?</h2>
                                    <input class="search-input alt-font" id="search-form-input5e219ef164995" placeholder="Enter your keywords..." name="s" value="" type="text" autocomplete="off">
                                    <button type="submit" class="search-button">
                                        <i class="feather icon-feather-search" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </nav>
</header>
<!-- end header -->
@yield('content')
<!-- start footer -->
<footer class="footer-dark bg-dark-gray p-0">

    <div class="pt-30px pb-30px bg-nero-grey">
        <div class="container">
            <div class="row align-items-center fs-15">
                <div class="col-12 col-lg-7 last-paragraph-no-margin md-mb-15px text-center text-lg-start lh-22">
                    <p>This site is protected by reCAPTCHA and the Google <a href="#" class="text-white text-decoration-line-bottom">privacy policy</a> and <a href="#" class="text-white text-decoration-line-bottom">terms of service.</a></p>
                </div>
                <div class="col-12 col-lg-5 text-center text-lg-end lh-22">
                    <span>&copy; 2024 Bigmard is Proudly Powered by <a href="https://bigmard.am/" target="_blank" class="text-decoration-line-bottom text-white">ThemeZaa</a></span>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- end footer -->
<!-- start cookie message -->
<div id="cookies-model" class="cookie-message bg-dark-gray border-radius-8px">
    <div class="cookie-description fs-14 text-white mb-20px lh-22">We use cookies to enhance your browsing experience, serve personalized ads or content, and analyze our traffic. By clicking "Allow cookies" you consent to our use of cookies. </div>
    <div class="cookie-btn">
        <a href="#" class="btn btn-transparent-white border-1 border-color-transparent-white-light btn-very-small btn-switch-text btn-rounded w-100 mb-15px" aria-label="btn">
                    <span>
                        <span class="btn-double-text" data-text="Cookie policy">Cookie policy</span>
                    </span>
        </a>
        <a href="#" class="btn btn-white btn-very-small btn-switch-text btn-box-shadow accept_cookies_btn btn-rounded w-100" data-accept-btn aria-label="text">
                    <span>
                        <span class="btn-double-text" data-text="Allow cookies">Allow cookies</span>
                    </span>
        </a>
    </div>
</div>
<!-- end cookie message -->
<!-- start sticky elements -->
<div class="sticky-wrap z-index-1 d-none d-xl-inline-block" data-animation-delay="100" data-shadow-animation="true">
    <div class="elements-social social-icon-style-10">
        <ul class="fs-16">
            <li class="me-30px"><a class="facebook" href="https://www.facebook.com/BidMardStore" target="_blank">
                    <i class="fa-brands fa-facebook-f me-10px"></i>
                    <span class="alt-font">Facebook</span>
                </a>
            </li>
            <li>
                <a class="instagram" href="https://www.instagram.com/bigmardstore/" target="_blank">
                    <i class="fa-brands fa-instagram me-10px"></i>
                    <span class="alt-font">Instagram</span>
                </a>
            </li>
        </ul>
    </div>
</div>
<!-- end sticky elements -->
<!-- start scroll progress -->
<div class="scroll-progress d-none d-xxl-block">
    <a href="#" class="scroll-top" aria-label="scroll">
        <span class="scroll-text">Scroll</span><span class="scroll-line"><span class="scroll-point"></span></span>
    </a>
</div>
<!-- end scroll progress -->
<!-- javascript libraries -->
<script type="text/javascript" src="{{asset('assets/js/jquery.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/vendors.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/main.js')}}"></script>
@stack('js')
</body>
</html>
