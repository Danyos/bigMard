@extends('layouts.base')
@section('js')
    <script>


        function timesDate() {
            const second = 1000,
                minute = second * 60,
                hour = minute * 60,
                day = hour * 24;
            let end_time = document.querySelector('#auction_end_time')
            if (!end_time.dataset.action) {
                return
            }
            let countDown = new Date(end_time.dataset.action).getTime(),
                x = setInterval(function () {

                    let now = new Date().getTime(),
                        distance = countDown - now;
                    let h = Math.floor((distance % (day)) / (hour))
                    let m = Math.floor((distance % (hour)) / (minute))
                    let s = Math.floor((distance % (minute)) / second)

                    if (Math.floor(distance / (day)) >= 0) {
                        document.getElementById('days').innerText = Math.floor(distance / (day))
                        document.getElementById('hours').innerText = h <= 9 ? "0" + h : h
                        document.getElementById('minutes').innerText = m <= 9 ? "0" + m : m
                        document.getElementById('seconds').innerText = s <= 9 ? "0" + s : s
                        document.getElementById('days2').innerText = Math.floor(distance / (day))
                        document.getElementById('hours2').innerText = h <= 9 ? "0" + h : h
                        document.getElementById('minutes2').innerText = m <= 9 ? "0" + m : m
                        document.getElementById('seconds2').innerText = s <= 9 ? "0" + s : s
                    } else {
                        clearInterval(x)
                    }


                }, second)

        }

        timesDate()
    </script>

@endsection
@section('content')
    <section id="main-banner-page" class="position-relative page-header coming-soon-header parallax section-nav-smooth"
             @if($other->coverImages)style="background-image: url('{{asset($other->coverImages)}}')"@endif>
        <div class="overlay overlay-dark opacity-6"></div>

        <div class="container">

            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="page-titles whitecolor padding_half">
                        <h1 class="font-light coming-soon-heading">


                        </h1>
                        <div class=" wow bounceIn pt-4 pb-5" data-wow-delay="300ms">

                            <ul class="count_down white alt-font" id="auction_end_time"
                                data-action="{{$item->auction_end_time?\Illuminate\Support\Carbon::parse($item->auction_end_time)->format('M d, Y H:i:s'):''}}">
                                <li>
                                    <p class="days" id="days">00</p>
                                    <p class="days_ref">days</p>
                                </li>
                                <li>
                                    <p class="hours" id="hours">00</p>
                                    <p class="hours_ref">hours</p>
                                </li>
                                <li>
                                    <p class="minutes" id="minutes">00</p>
                                    <p class="minutes_ref">minutes</p>
                                </li>
                                <li>
                                    <p class="seconds" id="seconds">00</p>
                                    <p class="seconds_ref">seconds</p>
                                </li>

                            </ul>
                        </div>

                        <!--<h3 class="font-light">Our Website Is Almost Ready</h3>-->
                    </div>
                </div>
            </div>
            <div class="bg-blue title-wrap">
                <div class="row">
                    <!--<div class="col-lg-12 col-md-12 whitecolor">-->
                    <!--    <h3 class="float-left">Coming Soon</h3>-->
                    <!--    <ul class="breadcrumb top10 bottom10 float-right">-->
                    <!--        <li class="breadcrumb-item hover-light"><a href="./index.html">Home</a></li>-->
                    <!--        <li class="breadcrumb-item hover-light">Page</li>-->
                    <!--    </ul>-->

                    <!--</div>-->
                </div>
            </div>
        </div>
    </section>
    <!--Page Header ends -->
    <section id="shop" class="padding">
        <div class="container">

            @if($item)
                <div class="row">
                    <!-- NOTE: The Id of both of below tags should be same as below-->
                    <!-- shop-dual-carousel -->
                    <div class="col-lg-5 col-md-5 col-sm-12   heading-space" id="shop-dual-carousel">
                        <!-- syncCarousel -->
                        <div class="owl-carousel carousel-shop-detail owl-theme" id="syncCarousel">
                            <!--Item 1-->
                            @foreach($item->ItemGalleries as $items)
                                <div class="item" wire:key="product-{{ $items->id }}">
                                    @if (!(\Illuminate\Support\Carbon::parse($item->auction_end_time) <= \Illuminate\Support\Carbon::now()))
                                        @if($item->discount)
                                            <div class="discounts" style="transform: rotate(90deg)"><span>{{$item->discount}}%</span></div>
                                        @endif
                                    @endif
                                    <a href="{{asset($items->image_path)}}" data-fancybox="gallery"
                                       title="Zoom In">
                                        <img src="{{asset($items->image_path)}}" alt="Latest News">
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        <!-- The second carousel will be created dynamically using JS Based upon the items added in upper carousel -->
                    </div>

                    <div class="col-lg-7 col-md-7 col-sm-12 shop_info heading-space  ">
                        <!--Shop detail-->
                        <h3 class="heading darkcolor font-light2 bottom15 py-2">{{$item->name}}<span
                                class="divider-left"></span></h3>

                        @if (\Illuminate\Support\Carbon::parse($item->auction_end_time) <= \Illuminate\Support\Carbon::now())
                            <h3 class="price-product font-weight-bold  py-2">{{$item->price}} դ</h3>
                        @else
                            @if($item->discount)

                                <div class="d-flex  py-4 position-relative">

                                    <h6 class="price-product font-weight-bold">
                                        <del>{{$item->price}} դ</del>
                                    </h6>
                                    <h3 class="price-product font-weight-bold"> {{$item->price - (($item->price * $item->discount) / 100) }}
                                        դ</h3>

                                </div>
                            @else
                                <h3 class="price-product font-weight-bold  py-2">{{$item->price}} դ</h3>

                            @endif
                        @endif

                        <p class=" bottom10">{!! $item->description !!}</p>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <ul style="list-style: disc;" class="pl-3">
                                    @if($item->ItemQuestion)

                                        @foreach($item->ItemQuestion as $ItemQuestions)
                                            <li>
                                                <p class="mt-1 bottom10">
                                                    <span>{{$ItemQuestions->question}} : </span><span
                                                        class="font-light">{{$ItemQuestions->answer}}</span></p>
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <div class="row callmealltoaction" style="padding-top: 35px">
                            <div class="col-md-8 mt-1">

                                <livewire:call-number-input type_id="3-1" item_id="{{$item->id}}"/>

                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>
    <!--Page Header ends -->
    @if($other->youtubUrl)

        <iframe
            src="{{$other->youtubUrl}}"
            frameborder="0" height="550px" allowfullscreen=""></iframe>
    @endif
    @include('includes.service')
    <!--Shopping--><!-- Counters -->
    <section class="padding bg-shop-quote parallax mt-5"
             @if($other->middle_picture)style="background-image: url('{{asset($other->middle_picture)}}')"@endif>
        <div class="overlay overlay-dark opacity-6 z-index-0"></div>
        <div class="container">
            <div class="row align-items-center text-center">
                <div class="col-md-8 offset-2">
                    <div class="quote-wrapper">
                        <h3>{{$other->imgText}}</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Counters ends-->
    <section id="our-shop" class="padding_top padding_bottom_half">
        <div class="container">
            <div id="tab3" style="">
                @foreach($feedback as $feedbacks)
                    <div class="profile_bg bottom30">
                        <div class="profile">
                            <div class="p_pic"><img src="{{asset('assets/images/testimonial-3.jpg')}}"
                                                    alt="instructure">
                            </div>
                            <div class="profile_text">
                                <h5><strong>{{$feedbacks->name}}</strong> - <span>Awesome Quality</span></h5>
                                <ul class="comment">
                                    <li><a href="javascript:void(0)" class="text-warning-hvr">
                                            @if($feedbacks->star==1)
                                                <i class="fa fa-star "></i>
                                                <i class="far fa-star "></i>
                                                <i class="far fa-star "></i>
                                                <i class="far fa-star "></i>
                                                <i class="far fa-star "></i>

                                            @elseif($feedbacks->star==2)
                                                <i class="fa fa-star "></i>
                                                <i class="fa fa-star "></i>
                                                <i class="far fa-star "></i>
                                                <i class="far fa-star "></i>
                                                <i class="far fa-star "></i>

                                            @elseif($feedbacks->star==3)
                                                <i class="fa fa-star "></i>
                                                <i class="fa fa-star "></i>
                                                <i class="fa fa-star "></i>
                                                <i class="far fa-star "></i>
                                                <i class="far fa-star "></i>

                                            @elseif($feedbacks->star==4)
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="far fa-star"></i>
                                            @elseif($feedbacks->star==5)
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            @endif
                                        </a></li>
                                </ul>
                                <p>{{$feedbacks->comment}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="add-review">
                    <h3 class="heading darkcolor font-light2 bottom25">Ավելացնել ձեր կարծիքը<span class="divider-left"></span>
                    </h3>
                    <h5 class="pb-1 font-light">Your Rating: <span id="ratingText" class="bluecolor font-normal">Խնդրում ենք ընտրել</span>
                    </h5>
                    <form class="findus" action="{{route('item.feedback')}}" method="post" id="contact-form">
                        @csrf

                        <div class="feedback">
                            <div class="rating" id="rattingIcon">
                                <input type="radio" name="star" value="5" id="rating-5">
                                <label for="rating-5"></label>
                                <input type="radio" name="star" checked value="4" id="rating-4">
                                <label for="rating-4"></label>
                                <input type="radio" name="star" value="3" id="rating-3">
                                <label for="rating-3"></label>
                                <input type="radio" name="star" value="2" id="rating-2">
                                <label for="rating-2"></label>
                                <input type="radio" name="star" value="1" id="rating-1">
                                <label for="rating-1"></label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div id="result1"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label for="name" class="d-none"></label>
                                    <input type="text" class="form-control" placeholder="Անուն" name="name" id="name"
                                           required="">
                                    @error('name')
                                    <div style="color: red;">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label for="email1" class="d-none"></label>
                                    <input type="email" class="form-control" placeholder="Փոստ *" name="email"
                                           id="email1"
                                           required=""> <input type="hidden" name="item_id"
                                                               value="{{$item->id}}">
                                    @error('email')
                                    <div style="color: red;">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12 col-sm-12 mb-4">
                                <label for="message" class="d-none"></label>
                                <textarea placeholder="Մեկնաբանություն *" name="comment" id="message" required></textarea>
                                @error('comment')
                                <div style="color: red;">{{ $message }}</div>
                                @enderror
                                <button class="button btn btn-alt" id="btn_submit">Ավելացնել կարծիք</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!--Shopping ends-->

    <section id="error" class="padding bglight">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center wow fadeIn" data-wow-delay="300ms">
                     <h2 class="heading heading_space darkcolor font-light2" style="text-transform: uppercase;"><span class="font-weight-bold">Թեժ </span>
                        առաջարկ
                        <span class="divider-center"></span>
                    </h2>
                </div>
                <div class="col-lg-6">
                    <div class=" image coming-soon-image h-100">
                        <img src="{{asset($other->underImages)}}" alt="" class="w-100 h-100">
                        @if (!(\Illuminate\Support\Carbon::parse($item->auction_end_time) <= \Illuminate\Support\Carbon::now()))
                            @if($item->discount)
                                <div class="discounts" style="transform: rotate(90deg)"><span>{{$item->discount}}%</span></div>
                            @endif
                        @endif
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 mt-lg-0 mt-4 text-center whitebox">
                     <h2 class="defaultcolor">Մնացել է</h2>
                    <h3 class="font-light py-4">{{$item->count}} հատ</h3>

                    <div class=" wow bounceIn" data-wow-delay="300ms">
                        <ul class="count_down animated-gradient alt-font">
                            <li>
                                <p class="days" id="days2">00</p>
                                <p class="days_ref">days</p>
                            </li>
                            <li>
                                <p class="hours" id="hours2">00</p>
                                <p class="hours_ref">hours</p>
                            </li>
                            <li>
                                <p class="minutes" id="minutes2">00</p>
                                <p class="minutes_ref">minutes</p>
                            </li>
                            <li>
                                <p class="seconds" id="seconds2">00</p>
                                <p class="seconds_ref">seconds</p>
                            </li>
                        </ul>
                    </div>
                    <h4 class="font-light py-5 mt-3 line-height-17">Բոլոր ապրանքները անցել են փորձաքննությունները և սերտիֆիկացված են</h4>
                    <livewire:call-number-input type_id="3-2" item_id="{{$item->id}}"/>

                 
                </div>
            </div>
        </div>
    </section>

@endsection
