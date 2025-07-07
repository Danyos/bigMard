@extends('layouts.app')

@section('content')
    <!-- start section -->
    <section class="p-0">
        <div class="swiper full-screen top-space-margin md-h-600px sm-h-500px magic-cursor magic-cursor-vertical swiper-number-pagination-progress swiper-number-pagination-progress-vertical" data-slider-options='{ "slidesPerView": 1, "direction": "horizontal", "loop": true, "parallax": true, "speed": 1000, "pagination": { "el": ".swiper-number", "clickable": true }, "autoplay": { "delay": 4000, "disableOnInteraction": false },  "keyboard": { "enabled": true, "onlyInViewport": true }, "breakpoints": { "1199": { "direction": "vertical" }}, "effect": "slide" }' data-swiper-number-pagination-progress="true">
            <div class="swiper-wrapper">
                @foreach($sliders as $slider)
                <!-- start slider item -->
                <div class="swiper-slide overflow-hidden">
                    <div class="cover-background position-absolute top-0 start-0 w-100 h-100" data-swiper-parallax="500" style="background-image:url('{{asset($slider->image)}}');">
                        <div class="container h-100">
                            <div class="row align-items-center h-100 justify-content-start">
                                <div class="col-md-10 position-relative text-white d-flex flex-column justify-content-center h-100">
                                    <div data-anime='{ "opacity": [0, 1], "translateY": [50, 0], "easing": "easeOutQuad", "duration": 500, "delay": 300 }' class="alt-font text-dark-gray mb-25px fs-20 sm-mb-15px"><span class="text-highlight">{{$slider->title}}<span class="bg-base-color h-8px bottom-0px"></span></span></div>
                                    <div class="alt-font fs-120 xs-fs-95 lh-100 mb-40px text-dark-gray fw-600 transform-origin-right ls-minus-5px sm-mb-25px" data-anime='{ "el": "childs", "rotateX": [90, 0], "opacity": [0,1], "staggervalue": 150, "easing": "easeOutQuad" }'>
                                        <span class="d-block fw-300">{{$slider->description}}</span>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end slider item -->
                @endforeach
                <!-- end slider item -->
            </div>
            <!-- start slider pagination -->
            <div class="swiper-pagination-wrapper">
                <div class="pagination-progress-vertical d-flex align-items-center justify-content-center">
                    <div class="number-prev text-dark-gray fs-16 fw-500"></div>
                    <div class="swiper-pagination-progress">
                        <span class="swiper-progress"></span>
                    </div>
                    <div class="number-next text-dark-gray fs-16 fw-500"></div>
                </div>
            </div>
            <!-- end slider pagination -->
        </div>
    </section>
    <!-- end section -->
    <!-- start section -->
    <section class="half-section">
        <div class="container">
            <div class="row row-cols-1 row-cols-xl-4 row-cols-lg-4 row-cols-md-2 row-cols-sm-2" data-anime='{ "el": "childs", "translateX": [30, 0], "opacity": [0,1], "duration": 800, "delay": 200, "staggervalue": 300, "easing": "easeOutQuad" }'>
                <!-- start features box item -->
                <div class="col icon-with-text-style-01 md-mb-35px">
                    <div class="feature-box feature-box-left-icon-middle last-paragraph-no-margin">
                        <div class="feature-box-icon me-20px">
                            <i class="line-icon-Box-Close icon-large text-dark-gray"></i>
                        </div>
                        <div class="feature-box-content">
                            <span class="alt-font fs-20 fw-500 d-block text-dark-gray">Առաքում</span>
                            <p class="fs-16 lh-24">Անվճար առաքում</p>
                        </div>
                    </div>
                </div>
                <!-- end features box item -->
                <!-- start features box item -->
                <div class="col icon-with-text-style-01 md-mb-35px">
                    <div class="feature-box feature-box-left-icon-middle last-paragraph-no-margin">
                        <div class="feature-box-icon me-20px">
                            <i class="line-icon-Reload-3 icon-large text-dark-gray"></i>
                        </div>
                        <div class="feature-box-content">
                            <span class="alt-font fs-20 fw-500 d-block text-dark-gray">Երաշխիք</span>
                            <p class="fs-16 lh-24">Երաշխիք 15 օր և գումարի վերադարձ</p>
                        </div>
                    </div>
                </div>
                <!-- end features box item -->
                <!-- start features box item -->
                <div class="col icon-with-text-style-01 xs-mb-35px">
                    <div class="feature-box feature-box-left-icon-middle last-paragraph-no-margin">
                        <div class="feature-box-icon me-20px">
                            <i class="line-icon-Credit-Card2 icon-large text-dark-gray"></i>
                        </div>
                        <div class="feature-box-content">
                            <span class="alt-font fs-20 fw-500 d-block text-dark-gray">Որակ</span>
                            <p class="fs-16 lh-24">Երաշխավորված որակ</p>
                        </div>
                    </div>
                </div>
                <!-- end features box item -->
                <!-- start features box item -->
                <div class="col icon-with-text-style-01">
                    <div class="feature-box feature-box-left-icon-middle last-paragraph-no-margin">
                        <div class="feature-box-icon me-20px">
                            <i class="line-icon-Phone-2 icon-large text-dark-gray"></i>
                        </div>
                        <div class="feature-box-content">
                            <span class="alt-font fs-20 fw-500 d-block text-dark-gray">Աջակցություն</span>
                            <p class="fs-16 lh-24">Առցանց կապ 24/7</p>
                        </div>
                    </div>
                </div>
                <!-- end features box item -->
            </div>
        </div>
    </section>
    <!-- end section -->
    <!-- start section -->
    <section class="pt-0 pb-0 ps-7 pe-7 lg-ps-3 lg-pe-3 xs-p-0">
        <div class="container-fluid">
            <div class="row row-cols-1 row-cols-xl-4 row-cols-lg-2 row-cols-md-2" data-anime='{ "el": "childs", "translateY": [-15, 0], "perspective": [1200,1200], "scale": [1.1, 1], "rotateX": [50, 0], "opacity": [0,1], "duration": 400, "delay": 100, "staggervalue": 200, "easing": "easeOutQuad" }'>
               @foreach($categories as $category)
                <!-- start categories style -->
                <div class="col categories-style-02 lg-mb-30px">
                    <div class="categories-box">
                        <a href="{{route('store.Shop',$category->slug)}}">
                            <img class="sm-w-100" src="https://placehold.co/600x450" alt=""/>
                        </a>
                        <div class="border-color-transparent-dark-very-light border alt-font fw-500 text-dark-gray text-uppercase ps-15px pe-15px fs-11 lh-26 border-radius-100px d-inline-block position-absolute right-20px top-20px">8 items</div>
                        <div class="absolute-bottom-center bottom-40px md-bottom-25px">
                            <a href="{{route('store.Shop',$category->slug)}}" class="btn btn-white btn-switch-text btn-round-edge btn-box-shadow fs-18 text-uppercase-inherit p-5 min-w-150px">
                                    <span>
                                        <span class="btn-double-text ls-0px" data-text="Women">{{$category->name}}</span>
                                    </span>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- end categories style -->
                @endforeach
            </div>
        </div>
    </section>
    <!-- end section -->
    <!-- start section -->
    <section class="ps-7 pe-7 pb-3 lg-ps-3 lg-pe-3 sm-pb-6 xs-px-0">
        <div class="container">
            <div class="row mb-5 xs-mb-8">
                <div class="col-12 text-center">
                    <h2 class="alt-font text-dark-gray mb-0 ls-minus-2px">Լավագույն <span class="text-highlight fw-600">վաճառք<span class="bg-base-color h-5px bottom-2px"></span></span></h2>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <ul class="shop-modern shop-wrapper grid-loading grid grid-5col lg-grid-4col md-grid-3col sm-grid-2col xs-grid-1col gutter-extra-large text-center" data-anime='{ "el": "childs", "translateY": [-15, 0], "opacity": [0,1], "duration": 300, "delay": 0, "staggervalue": 100, "easing": "easeOutQuad" }'>
                        <li class="grid-sizer"></li>
                        @foreach($bests as $best)
                        <!-- start shop item -->
                        <li class="grid-item">
                            <div class="shop-box mb-10px">
                                <div class="shop-image mb-20px">
                                    <a href="{{route('store.product',$best->id)}}">
                                        <img src="{{asset($best->OtherInformation->coverImages)}}" alt="">
                                        @if($best->new==='active')
                                        <span class="lable new">New</span>
                                        @endif
                                        <div class="shop-overlay bg-gradient-gray-light-dark-transparent"></div>
                                    </a>

                                </div>
                                <div class="shop-footer text-center">
                                    <a href="{{route('store.product',$best->id)}}" class="alt-font text-dark-gray fs-19 fw-500">{{$best->name}}</a>
                                    <div class="price lh-22 fs-16"><del>{{$best->price}} դրամ</del>{{$best->price-($best->price*$best->discount)/100}} դրամ</div>
                                </div>
                            </div>
                        </li>
                        <!-- end shop item -->
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- end section -->
    <!-- start section -->
    <section class="ps-7 pe-7 pb-3 lg-ps-3 lg-pe-3 md-pb-5 xs-px-0">
        <div class="container">
            <div class="row mb-5 xs-mb-8">
                <div class="col-12 text-center">
                    <h2 class="alt-font text-dark-gray mb-0 ls-minus-2px">Գնված ապրանքների <span class="text-highlight fw-600">TOP<span class="bg-base-color h-5px bottom-2px"></span></span></h2>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <ul class="shop-modern shop-wrapper grid-loading grid grid-5col lg-grid-3col sm-grid-2col xs-grid-1col gutter-extra-large text-center" data-anime='{ "el": "childs", "translateY": [-15, 0], "opacity": [0,1], "duration": 300, "delay": 0, "staggervalue": 100, "easing": "easeOutQuad" }'>
                        <li class="grid-sizer"></li>
                        @foreach($allItems as $allItem)
                            <!-- start shop item allItems -->
                            <li class="grid-item">
                                <div class="shop-box mb-10px">
                                    <div class="shop-image mb-20px">
                                        <a href="{{route('store.product',$allItem->id)}}">
                                            <img src="{{asset($allItem->OtherInformation->coverImages)}}" style="width: 100%;height: 275px;object-fit: cover">
                                            <div class="shop-overlay bg-gradient-gray-light-dark-transparent"></div>
                                        </a>


                                    </div>
                                    <div class="shop-footer text-center">
                                        <a href="{{route('store.product',$allItem->id)}}" class="alt-font text-dark-gray fs-19 fw-500">  {{$allItem->name}}</a>
                                        <div class="price lh-22 fs-16"><del>{{$allItem->price}} դրամ</del>{{$allItem->price-($allItem->price*$allItem->discount)/100}} դրամ</div>
                                    </div>
                                </div>
                            </li>
                            <!-- end shop item -->
                        @endforeach

                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- end section -->
    <!-- start section -->
    <section class="p-15px bg-dark-gray text-white">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center h-40px">
                </div>
            </div>
        </div>
    </section>
    <!-- end section -->
    <!-- start section -->
    <section class="bg-very-light-gray overflow-hidden position-relative ps-3 xs-ps-0">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-3 ps-5 pe-5 xl-pe-0 lg-ps-0 text-center text-lg-start md-mb-40px">
                    <h2 class="alt-font lh-50 text-dark-gray ls-minus-1px mb-15px">Նոր  <span class="fw-600  text-nowrap">ընտրանի</span></h2>
                    <a href="{{route('home.news')}}" class="btn btn-dark-gray btn-box-shadow btn-medium">Իմանալ ավելին</a>

                </div>
                <div class="col-12 col-lg-9 position-relative">
                    <div class="outside-box-right-10 lg-outside-box-right-20 md-outside-box-right-25 xs-outside-box-right-0">
                        <div class="swiper slider-three-slide" data-slider-options='{ "slidesPerView": 1, "spaceBetween": 30, "loop": true, "autoplay": { "delay": 4000, "disableOnInteraction": false }, "navigation": { "nextEl": ".slider-one-slide-next-1", "prevEl": ".slider-one-slide-prev-1" }, "pagination": { "el": ".slider-four-slide-pagination-1", "clickable": true, "dynamicBullets": false }, "keyboard": { "enabled": true, "onlyInViewport": true }, "breakpoints": { "1400": { "slidesPerView": 4 }, "1024": { "slidesPerView": 3 }, "768": { "slidesPerView": 3 }, "576": { "slidesPerView": 2 }, "320": { "slidesPerView": 1 } }, "effect": "slide" }'>
                            <div class="swiper-wrapper">
                                @foreach($newItems as $newItem)
                                <!-- start content carousal item -->
                                <div class="swiper-slide">
                                    <div class="interactive-banner-style-09 border-radius-6px overflow-hidden position-relative">
                                        <img src="{{asset($newItem->OtherInformation->coverImages)}}" alt="" />
                                        <div class="opacity-full bg-gradient-gray-light-dark-transparent"></div>
                                        <div class="image-content h-100 w-100 ps-15 pe-15 pt-11 pb-11 lg-p-11 d-flex justify-content-bottom align-items-start flex-column">
                                            <div class="mt-auto d-flex align-items-start w-100 z-index-1 position-relative overflow-hidden flex-column">
                                                <span class="text-white fw-500 fs-22">{{$newItem->name}}</span>
                                                <span class="content-title text-white fs-14 fw-500 opacity-7 text-uppercase ls-05px">Outfits matching</span>
                                                <a href="{{route('store.product',$newItem->id)}}" class="content-title-hover fs-14 lh-24 fw-500 ls-05px text-uppercase text-white opacity-6 text-decoration-line-bottom">Explore collection</a>
                                                <span class="content-arrow lh-50 rounded-circle bg-base-color w-50px h-50px ms-20px text-center"><i class="bi bi-arrow-right-short text-dark-gray icon-very-medium"></i></span>
                                            </div>
                                            <div class="position-absolute left-0px top-0px w-100 h-100 bg-gradient-regal-blue-transparent opacity-9"></div>
                                            <div class="box-overlay bg-gradient-gray-light-dark-transparent"></div>
                                            <a href="{{route('store.product',$newItem->id)}}" class="position-absolute z-index-1 top-0px left-0px h-100 w-100"></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- end content carousal item -->
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- start slider pagination -->
                    <!--<div class="swiper-pagination slider-four-slide-pagination-1 swiper-pagination-style-2 swiper-pagination-clickable swiper-pagination-bullets"></div>-->
                    <!-- end slider pagination -->
                </div>
            </div>
        </div>
        <div class="fs-180 lg-fs-150 md-fs-130 fw-700 position-absolute bottom-minus-50px md-bottom-minus-40px ls-minus-5px left-0px right-0px text-center w-100 opacity-1 d-none d-md-block"  data-bottom-top="transform:scale(1, 1) translate3d(0px, 0px, 0px);" data-top-bottom="transform:scale(1, 1) translate3d(-100px, 0px, 0px);">new collection</div>
    </section>
    <!-- end section -->
    <!-- start section -->
    <section class="half-section border-bottom border-color-extra-medium-gray">
        <div class="container">
            <div class="row row-cols-2 row-cols-md-5 row-cols-sm-3 position-relative justify-content-center" data-anime='{ "el": "childs", "translateY": [-15, 0], "scale": [0.8, 1], "opacity": [0,1], "duration": 300, "delay": 0, "staggervalue": 100, "easing": "easeOutQuad" }'>
                <!-- start client item -->
                <div class="col text-center sm-mb-30px">
                    <a href="#"><img src="images/logo-asos.svg" class="h-30px" alt="" /></a>
                </div>
                <!-- end client item -->
                <!-- start client item -->
                <div class="col text-center sm-mb-30px">
                    <a href="#"><img src="images/logo-chanel.svg" class="h-30px" alt="" /></a>
                </div>
                <!-- end client item -->
                <!-- start client item -->
                <div class="col text-center sm-mb-30px">
                    <a href="#"><img src="images/logo-gucci.svg" class="h-30px" alt="" /></a>
                </div>
                <!-- end client item -->
                <!-- start client item -->
                <div class="col text-center xs-mb-30px">
                    <a href="#"><img src="images/logo-celine.svg" class="h-30px" alt="" /></a>
                </div>
                <!-- end client item -->
                <!-- start client item -->
                <div class="col text-center">
                    <a href="#"><img src="images/logo-adidas.svg" class="h-30px" alt="" /></a>
                </div>
                <!-- end client item -->
            </div>
        </div>
    </section>
    <!-- end section -->

    <!-- start section -->
    <section class="p-0 border-top border-bottom border-color-extra-medium-gray">
        <div class="container-fluid">
            <div class="row position-relative">
                <div class="col swiper text-center swiper-width-auto" data-slider-options='{ "slidesPerView": "auto", "spaceBetween":0, "speed": 10000, "loop": true, "pagination": { "el": ".slider-four-slide-pagination-2", "clickable": false }, "allowTouchMove": false, "autoplay": { "delay":0, "disableOnInteraction": false }, "navigation": { "nextEl": ".slider-four-slide-next-2", "prevEl": ".slider-four-slide-prev-2" }, "keyboard": { "enabled": true, "onlyInViewport": true }, "effect": "slide" }'>
                    <div class="swiper-wrapper marquee-slide">
                        <!-- start client item -->
                        <div class="swiper-slide">
                            <div class="alt-font fs-26 fw-500 text-dark-gray border-color-extra-medium-gray border-end pt-30px pb-30px ps-60px pe-60px sm-p-25px">Get 20% off for your first order</div>
                        </div>
                        <!-- end client item -->
                        <!-- start client item -->
                        <div class="swiper-slide">
                            <div class="alt-font fs-26 fw-500 text-dark-gray border-color-extra-medium-gray border-end pt-30px pb-30px ps-60px pe-60px sm-p-25px">The fashion core collection</div>
                        </div>
                        <!-- end client item -->
                        <!-- start client item -->
                        <div class="swiper-slide">
                            <div class="alt-font fs-26 fw-500 text-dark-gray border-color-extra-medium-gray border-end pt-30px pb-30px ps-60px pe-60px sm-p-25px">100% secure protected payment</div>
                        </div>
                        <!-- end client item -->
                        <!-- start client item -->
                        <div class="swiper-slide">
                            <div class="alt-font fs-26 fw-500 text-dark-gray border-color-extra-medium-gray border-end pt-30px pb-30px ps-60px pe-60px sm-p-25px">Free shipping for orders over $130</div>
                        </div>
                        <!-- end client item -->
                        <!-- start client item -->
                        <div class="swiper-slide">
                            <div class="alt-font fs-26 fw-500 text-dark-gray border-color-extra-medium-gray border-end pt-30px pb-30px ps-60px pe-60px sm-p-25px">Pay with multiple credit cards</div>
                        </div>
                        <!-- end client item -->
                        <!-- start client item -->
                        <div class="swiper-slide">
                            <div class="alt-font fs-26 fw-500 text-dark-gray border-color-extra-medium-gray border-end pt-30px pb-30px ps-60px pe-60px sm-p-25px">Get 20% off for your first order</div>
                        </div>
                        <!-- end client item -->
                        <!-- start client item -->
                        <div class="swiper-slide">
                            <div class="alt-font fs-26 fw-500 text-dark-gray border-color-extra-medium-gray border-end pt-30px pb-30px ps-60px pe-60px sm-p-25px">The fashion core collection</div>
                        </div>
                        <!-- end client item -->
                        <!-- start client item -->
                        <div class="swiper-slide">
                            <div class="alt-font fs-26 fw-500 text-dark-gray border-color-extra-medium-gray border-end pt-30px pb-30px ps-60px pe-60px sm-p-25px">100% secure protected payment</div>
                        </div>
                        <!-- end client item -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end section -->


@endsection
@section('js')

@endsection
