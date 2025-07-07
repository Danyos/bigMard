@extends('layouts.app')
@push('css')
    <style>
        .auction-timer-wrapper {
            display: flex;
            flex-wrap: nowrap;
            gap: 5px;
            justify-content: center;
            align-items: center;
            margin-top: 12px;
            overflow-x: auto;
            scrollbar-width: none;
        }

        .auction-timer-wrapper::-webkit-scrollbar {
            display: none;
        }

        .timer-box {
            flex: 0 0 auto;
            padding: 6px 10px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 14px;
            line-height: 1;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.15);
            text-align: center;
            min-width: 50px;
        }

        .animate-blink {
            animation: blink 1s steps(2, start) infinite;
        }

        @keyframes blink {
            to { visibility: hidden; }
        }
    </style>
@endpush
@section('content')
    <!-- start section -->
    <section class="top-space-margin half-section bg-gradient-very-light-gray">
        <div class="container">
            <div class="row align-items-center justify-content-center" data-anime='{ "el": "childs", "translateY": [-15, 0], "opacity": [0,1], "duration": 300, "delay": 0, "staggervalue": 100, "easing": "easeOutQuad" }'>
                <div class="col-12 col-xl-8 col-lg-10 text-center position-relative page-title-extra-large">
                    <h2 class="title-section fw-600 text-dark-gray mb-10px">{{$title}}</h2>
                </div>
                <div class="col-12 breadcrumb breadcrumb-style-01 d-flex justify-content-center">
                    <ul>
                        <li><a href="{{route('home.index')}}">Գլխավոր</a></li>
                        <li>{{$title}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- end section -->
    <!-- start section -->
    <section class="pt-0 ps-6 pe-12 lg-ps-2 lg-pe-2 sm-ps-0 sm-pe-0">
        <div class="container-fluid">
            <div class="row flex-row-reverse">
                <div class="col-xxl-10 col-lg-9 ps-5 md-ps-15px md-mb-60px">
                    <ul class="shop-modern shop-wrapper grid-loading grid grid-4col xl-grid-3col sm-grid-2col xs-grid-1col gutter-extra-large text-center" data-anime='{ "el": "childs", "translateY": [-15, 0], "opacity": [0,1], "duration": 300, "delay": 0, "staggervalue": 150, "easing": "easeOutQuad" }'>
                        <li class="grid-sizer"></li>
                        @foreach($items as $best)


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
                                    <div class="auction-timer-wrapper" id="timer-{{ $best->id }}" data-end-time="{{ \Carbon\Carbon::parse($best->auction_end_time)->format('Y-m-d H:i:s') }}">
                                        <div class="timer-box bg-danger text-white">01 օ․</div>
                                        <div class="timer-box bg-warning text-dark">06 ժ․</div>
                                        <div class="timer-box bg-info text-dark">50 ր․</div>
                                        <div class="timer-box bg-success text-white">42 վ․</div>
                                    </div>
                                </div>
                            </li>
                        <!-- end shop item -->
                        @endforeach

                    </ul>

                    <div class="w-100 d-flex mt-4 justify-content-center md-mt-30px">
                        {{ $items->links('vendor.pagination.custom') }}

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end section -->

@endsection
@push('js')
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            document.querySelectorAll('.auction-timer-wrapper').forEach(timer => {
                const endTimeStr = timer.getAttribute('data-end-time');
                const endTime = new Date(endTimeStr).getTime();
                const boxes = timer.querySelectorAll('.timer-box');

                function update() {
                    const now = new Date().getTime();
                    const distance = endTime - now;

                    if (distance < 0) {
                        timer.innerHTML = "<strong class='text-danger'>Ժամկետը ավարտվել է</strong>";
                        return;
                    }

                    const days = Math.floor(distance / (1000 * 60 * 60 * 24));
                    const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                    const seconds = Math.floor((distance % (1000 * 60)) / 1000);

                    boxes[0].textContent = String(days).padStart(2, '0') + " օ․";
                    boxes[1].textContent = String(hours).padStart(2, '0') + " ժ․";
                    boxes[2].textContent = String(minutes).padStart(2, '0') + " ր․";
                    boxes[3].textContent = String(seconds).padStart(2, '0') + " վ․";
                }

                update();
                setInterval(update, 1000);
            });
        });
    </script>
@endpush

