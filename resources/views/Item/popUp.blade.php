@extends('layouts.base')
@section('js')
    <script>


        function timesDate(){
            const second = 1000,
                minute = second * 60,
                hour = minute * 60,
                day = hour * 24;
            let end_time = document.querySelector('#auction_end_time')

            if(!end_time.dataset.action){
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
                                <div class="d-flex  py-2">
                                    <h6 class="price-product font-weight-bold mr-2">
                                        <del>{{$item->price}} դ</del>
                                    </h6>
                                    <h3 class="price-product font-weight-bold"> {{$item->price - (($item->price * $item->discount) / 100) }}
                                        դրամ</h3>

                                </div>
                            @else
                                <h3 class="price-product font-weight-bold  py-2">{{$item->price}} դրամ</h3>

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

                                <livewire:call-number-input type_id="2-1" item_id="{{$item->id}}" />
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>


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
                          @if($other->youtubUrl)
                    <iframe src="{{$other->youtubUrl}}"
                            frameborder="0" height="550px" allowfullscreen=""></iframe>
                @else
                
                    <img src="{{asset($other->underImages)}}" alt="" class="w-100 h-100">
                @endif
                        
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 mt-lg-0 mt-4 text-center whitebox">
                           <h2 class="defaultcolor">Մնացել է</h2>
                    <h3 class="font-light py-4">{{$item->count}} հատ</h3>
                    <div class=" wow bounceIn" data-wow-delay="300ms">
                        <ul class="count_down animated-gradient alt-font" id="auction_end_time"
                            data-action="{{$item->auction_end_time?\Illuminate\Support\Carbon::parse($item->auction_end_time)->format('M d, Y H:i:s'):''}}">
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
                    <livewire:call-number-input type_id="2-2" item_id="{{$item->id}}" />
                    
                </div>
            </div>
        </div>
    </section>

