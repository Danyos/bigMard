@extends('layouts.app')

@section('content')
    <!-- start section -->
    <section class="top-space-margin half-section bg-gradient-very-light-gray">
        <div class="container">
            <div class="row align-items-center justify-content-center" data-anime='{ "el": "childs", "translateY": [-15, 0], "opacity": [0,1], "duration": 300, "delay": 0, "staggervalue": 100, "easing": "easeOutQuad" }'>
                <div class="col-12 col-xl-8 col-lg-10 text-center position-relative page-title-extra-large">
                    <h2 class="title-section fw-600 text-dark-gray mb-10px">{{$category->name}}</h2>
                </div>
                <div class="col-12 breadcrumb breadcrumb-style-01 d-flex justify-content-center">
                    <ul>
                        <li><a href="{{route('home.index')}}">Գլխավոր</a></li>
                        <li>{{$category->name}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- end section -->
    <!-- start section -->
    <section class="pt-0 ps-6 pe-6 lg-ps-2 lg-pe-2 sm-ps-0 sm-pe-0">
        <div class="container-fluid">
            <div class="row flex-row-reverse">
                <div class="col-xxl-10 col-lg-9 ps-5 md-ps-15px md-mb-60px">
                    <ul class="shop-modern shop-wrapper grid-loading grid grid-4col xl-grid-3col sm-grid-2col xs-grid-1col gutter-extra-large text-center" data-anime='{ "el": "childs", "translateY": [-15, 0], "opacity": [0,1], "duration": 300, "delay": 0, "staggervalue": 150, "easing": "easeOutQuad" }'>
                        <li class="grid-sizer"></li>
                        @foreach($products as $product)


                        <!-- start shop item -->
                        <li class="grid-item">
                            <div class="shop-box mb-10px">
                                <div class="shop-image mb-20px">
                                    <a href="{{route('store.product',$product->id)}}">
                                        <img src="{{asset($product->OtherInformation->coverImages)}}" alt="">
                                        <span class="lable new">New</span>
                                        <div class="shop-overlay bg-gradient-gray-light-dark-transparent"></div>
                                    </a>
                                    <div class="shop-buttons-wrap">
                                        <a href="{{route('store.product',$product->id)}}" class="alt-font btn btn-small btn-box-shadow btn-white btn-round-edge left-icon add-to-cart">
                                            <i class="feather icon-feather-shopping-bag"></i><span class="quick-view-text button-text">Add to cart</span>
                                        </a>
                                    </div>
                                    <div class="shop-hover d-flex justify-content-center">
                                        <ul>
                                            <li>
                                                <a href="#" class="w-40px h-40px bg-white text-dark-gray d-flex align-items-center justify-content-center rounded-circle ms-5px me-5px" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to wishlist"><i class="feather icon-feather-heart fs-16"></i></a>
                                            </li>
                                            <li>
                                                <a href="#" class="w-40px h-40px bg-white text-dark-gray d-flex align-items-center justify-content-center rounded-circle ms-5px me-5px" data-bs-toggle="tooltip" data-bs-placement="left" title="Quick shop"><i class="feather icon-feather-eye fs-16"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="shop-footer text-center">
                                    <a href="{{route('store.product',$product->id)}}" class="alt-font text-dark-gray fs-19 fw-500">{{$product->name}}</a>
                                    <div class="price lh-22 fs-16"><del>{{$product->price}} դրամ</del>{{$product->price-($product->price*$product->discount)/100}} դրամ</div>
                                </div>
                            </div>
                        </li>
                        <!-- end shop item -->
                        @endforeach

                    </ul>

                    <div class="w-100 d-flex mt-4 justify-content-center md-mt-30px">
                        {{ $products->links('vendor.pagination.custom') }}

                    </div>
                </div>
                <div class="col-xxl-2 col-lg-3 shop-sidebar" data-anime='{ "el": "childs", "translateY": [-15, 0], "opacity": [0,1], "duration": 300, "delay": 0, "staggervalue": 300, "easing": "easeOutQuad" }'>
                    <div class="mb-30px">
                        <span class="alt-font fw-500 fs-19 text-dark-gray d-block mb-10px">Filter by categories</span>
                        <ul class="shop-filter category-filter fs-16">
                            <li><a href="#"><span class="product-cb product-category-cb"></span>Jeans</a><span class="item-qty">22</span></li>
                            <li><a href="#"><span class="product-cb product-category-cb"></span>Dupattas</a><span class="item-qty">22</span></li>
                        </ul>
                    </div>
                    <div class="mb-30px">
                        <span class="alt-font fw-500 fs-19 text-dark-gray d-block mb-10px">Filter by color</span>
                        <ul class="shop-filter color-filter fs-16">
                            <li><a href="#"><span class="product-cb product-color-cb" style="background-color:#232323"></span>Black</a><span class="item-qty">05</span></li>
                        </ul>
                    </div>
                    <div class="mb-30px">
                        <span class="alt-font fw-500 fs-19 text-dark-gray d-block mb-10px">Filter by size</span>
                        <ul class="shop-filter price-filter fs-16">
                            <li><a href="#"><span class="product-cb product-category-cb"></span>S</a><span class="item-qty">08</span></li>
                        </ul>
                    </div>
                    <div class="mb-30px">
                        <div class="d-flex align-items-center mb-20px">
                            <span class="alt-font fw-500 fs-19 text-dark-gray">New arrivals</span>
                            <div class="d-flex ms-auto">
                                <!-- start slider navigation -->
                                <div class="slider-one-slide-prev-1 icon-very-small swiper-button-prev slider-navigation-style-08 me-5px"><i class="fa-solid fa-arrow-left text-dark-gray"></i></div>
                                <div class="slider-one-slide-next-1 icon-very-small swiper-button-next slider-navigation-style-08 ms-5px"><i class="fa-solid fa-arrow-right text-dark-gray"></i></div>
                                <!-- end slider navigation -->
                            </div>
                        </div>
                        <div class="swiper slider-one-slide" data-slider-options='{ "slidesPerView": 1, "loop": true, "autoplay": { "delay": 5000, "disableOnInteraction": false }, "navigation": { "nextEl": ".slider-one-slide-next-1", "prevEl": ".slider-one-slide-prev-1" }, "keyboard": { "enabled": true, "onlyInViewport": true }, "effect": "slide" }'>
                            <div class="swiper-wrapper">
                                <!-- start text slider item -->
                                <div class="swiper-slide">
                                    <div class="shop-filter new-arribals">
                                        <div class="d-flex align-items-center mb-20px">
                                            <figure class="mb-0">
                                                <a href="#">
                                                    <img class="border-radius-4px w-80px" src="https://via.placeholder.com/600x765" alt="">
                                                </a>
                                            </figure>
                                            <div class="col ps-25px">
                                                <a href="#" class="text-dark-gray alt-font fw-500 d-inline-block lh-normal">Textured sweater</a>
                                                <div class="fs-15 lh-normal"><del class="me-5px">$30.00</del>$23.00</div>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center mb-20px">
                                            <figure class="mb-0">
                                                <a href="#">
                                                    <img class="border-radius-4px w-80px" src="https://via.placeholder.com/600x765" alt="">
                                                </a>
                                            </figure>
                                            <div class="col ps-25px">
                                                <a href="#" class="text-dark-gray alt-font fw-500 d-inline-block lh-normal">Traveller shirt</a>
                                                <div class="fs-15 lh-normal"><del class="me-5px">$50.00</del>$43.00</div>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <figure class="mb-0">
                                                <a href="#">
                                                    <img class="border-radius-4px w-80px" src="https://via.placeholder.com/600x765" alt="">
                                                </a>
                                            </figure>
                                            <div class="col ps-25px">
                                                <a href="#" class="text-dark-gray alt-font fw-500 d-inline-block lh-normal">Crewneck tshirt</a>
                                                <div class="fs-15 lh-normal"><del class="me-5px">$20.00</del>$15.00</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end text slider item -->
                                <!-- start text slider item -->
                                <div class="swiper-slide">
                                    <div class="shop-filter new-arribals">
                                        <div class="d-flex align-items-center mb-20px">
                                            <figure class="mb-0">
                                                <a href="#">
                                                    <img class="border-radius-4px w-80px" src="https://via.placeholder.com/600x765" alt="">
                                                </a>
                                            </figure>
                                            <div class="col ps-25px">
                                                <a href="#" class="text-dark-gray alt-font fw-500 d-inline-block lh-normal">Skinny trousers</a>
                                                <div class="fs-15 lh-normal"><del class="me-5px">$15.00</del>$10.00</div>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center mb-20px">
                                            <figure class="mb-0">
                                                <a href="#">
                                                    <img class="border-radius-4px w-80px" src="https://via.placeholder.com/600x765" alt="">
                                                </a>
                                            </figure>
                                            <div class="col ps-25px">
                                                <a href="#" class="text-dark-gray alt-font fw-500 d-inline-block lh-normal">Sleeve sweater</a>
                                                <div class="fs-15 lh-normal"><del class="me-5px">$35.00</del>$30.00</div>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <figure class="mb-0">
                                                <a href="#">
                                                    <img class="border-radius-4px w-80px" src="https://via.placeholder.com/600x765" alt="">
                                                </a>
                                            </figure>
                                            <div class="col ps-25px">
                                                <a href="#" class="text-dark-gray alt-font fw-500 d-inline-block lh-normal">Pocket white</a>
                                                <div class="fs-15 lh-normal"><del class="me-5px">$20.00</del>$15.00</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end text slider item -->
                            </div>
                            <!-- start slider navigation -->
                        </div>
                    </div>
                    <div>
                        <span class="alt-font fw-500 fs-19 text-dark-gray d-block mb-10px">Filter by tags</span>
                        <div class="shop-filter tag-cloud fs-16">
                            <a href="#">Coats</a>
                            <a href="#">Cotton</a>
                            <a href="#">Dresses</a>
                            <a href="#">Jackets</a>
                            <a href="#">Polyester</a>
                            <a href="#">Printed</a>
                            <a href="#">Shirts</a>
                            <a href="#">Shorts</a>
                            <a href="#">Tops</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end section -->

@endsection
