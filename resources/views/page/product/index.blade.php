@extends('layouts.app')
@push('css')
    <style>
        .auction-timer-wrapper {
            display: flex;
            flex-wrap: nowrap;
            gap: 10px;

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
            padding: 6px 14px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 14px;
            line-height: 1;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.15);

            min-width: 60px;
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
    <section class="top-space-margin bg-gradient-very-light-gray pt-20px pb-20px ps-45px pe-45px sm-ps-15px sm-pe-15px">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-12 breadcrumb breadcrumb-style-01 fs-14">
                    <ul>
                        <li><a href="{{route('home.index')}}">Գլխավոր</a></li>
                        <li><a href="{{route('store.Shop',$category->slug)}}">{{$category->name}}</a></li>
                        <li>Relaxed corduroy shirt</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- end section -->
    <!-- start section -->
    <section class="pt-60px pb-0 md-pt-30px">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 pe-50px md-pe-15px md-mb-40px">
                    <div class="row overflow-hidden position-relative">
                        <div class="col-12 col-lg-10 position-relative order-lg-2 product-image ps-30px md-ps-15px">
                            <div class="swiper product-image-slider"
                                 data-slider-options='{ "spaceBetween": 10, "loop": true, "autoplay": { "delay": 2000, "disableOnInteraction": false }, "watchOverflow": true, "navigation": { "nextEl": ".slider-product-next", "prevEl": ".slider-product-prev" }, "thumbs": { "swiper": { "el": ".product-image-thumb", "slidesPerView": "auto", "spaceBetween": 15, "direction": "vertical", "navigation": { "nextEl": ".swiper-thumb-next", "prevEl": ".swiper-thumb-prev" } } } }'
                                 data-thumb-slider-md-direction="horizontal">
                                <div class="swiper-wrapper">
                                    @foreach($galleries as $gallerie)
                                        <!-- start slider item -->
                                        <div class="swiper-slide gallery-box">
                                            <a href="{{asset($gallerie->image_path)}}" data-group="lightbox-gallery"
                                               title="Relaxed corduroy shirt">
                                                <img class="w-100" src="{{asset($gallerie->image_path)}}" alt="">
                                            </a>
                                        </div>
                                        <!-- end slider item -->
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-2 order-lg-1 position-relative single-product-thumb">
                            <div class="swiper-container product-image-thumb slider-vertical">
                                <div class="swiper-wrapper">
                                    @foreach($galleries as $gallerie)
                                        <div class="swiper-slide">
                                            <img class="w-100" src="{{asset($gallerie->image_path)}}"
                                                 alt=""></div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-5 product-info">
                    <span class="fw-500 text-dark-gray d-block">Zalando</span>
                    <h4 class="alt-font text-dark-gray fw-500 mb-5px">{{$item->name}}</h5>
                        <div class="d-block d-sm-flex align-items-center mb-15px">
                            <div class="me-10px xs-me-0">
                                <a href="#tab" class="section-link ls-minus-1px icon-small">
                                    <i class="bi bi-star-fill text-golden-yellow"></i>
                                    <i class="bi bi-star-fill text-golden-yellow"></i>
                                    <i class="bi bi-star-fill text-golden-yellow"></i>
                                    <i class="bi bi-star-fill text-golden-yellow"></i>
                                    <i class="bi bi-star-fill text-golden-yellow"></i>
                                </a>
                            </div>
                            <a href="#tab" class="me-25px text-dark-gray fw-500 section-link xs-me-0">{{$feedbacks->count()}} Reviews</a>
                            <div><span class="text-dark-gray fw-500">SKU: </span>M4923{{$item->id}}</div>
                        </div>
                        <div class="product-price mb-10px">
                            <span class="text-dark-gray fs-28 xs-fs-24 fw-700 ls-minus-1px">
                                                       <del class="text-medium-gray me-10px fw-400">
                                                           {{$item->price}} դրամ</del>{{$item->price-($item->price*$item->discount)/100}} դրամ
                            </span>
                        </div>



                        <p>{{$item->OtherInformation->imgText}}</p>
                        @if($item->auction_end_time)
                            <div class="auction-timer-wrapper my-4"
                                 data-end-time="{{ \Carbon\Carbon::parse($item->auction_end_time)->format('Y-m-d H:i:s') }}">
                                <div class="timer-box bg-danger text-white">-- օ․</div>
                                <div class="timer-box bg-warning text-dark">-- ժ․</div>
                                <div class="timer-box bg-info text-dark">-- ր․</div>
                                <div class="timer-box bg-success text-white animate-blink">-- վ․</div>
                            </div>
                        @endif
                        <div class="d-flex align-items-center flex-column flex-sm-row mb-20px position-relative">

                            <button data-bs-toggle="modal" data-bs-target="#customModal"
                               class="btn btn-cart btn-extra-large btn-switch-text btn-box-shadow btn-none-transform btn-dark-gray left-icon btn-round-edge border-0 me-15px xs-me-0 order-3 order-sm-2">
                                    <span>
                                        <span><i class="feather icon-feather-shopping-bag"></i></span>
                                        <span class="btn-double-text ls-0px" data-text="Պատվիրել">Պատվիրել Հիմա</span>
                                    </span>
                            </button>
                            <a href="#"
                               class="wishlist d-flex align-items-center justify-content-center border border-radius-5px border-color-extra-medium-gray order-2 order-sm-3">
                                <i class="feather icon-feather-heart icon-small text-dark-gray"></i>
                            </a>
                        </div>

                        <div class="mb-20px h-1px w-100 bg-extra-medium-gray d-block"></div>
                        <div class="row mb-15px">
                            <div class="col-12 icon-with-text-style-08">
                                <div class="feature-box feature-box-left-icon d-inline-flex align-middle">
                                    <div class="feature-box-icon me-10px">
                                        <i class="feather icon-feather-truck top-8px position-relative align-middle text-dark-gray"></i>
                                    </div>
                                    <div class="feature-box-content">
                                        <span><span class="alt-font text-dark-gray fw-500">Estimated delivery:</span> March 03 - March 07</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 icon-with-text-style-08 mb-10px">
                                <div class="feature-box feature-box-left-icon d-inline-flex align-middle">
                                    <div class="feature-box-icon me-10px">
                                        <i class="feather icon-feather-archive top-8px position-relative align-middle text-dark-gray"></i>
                                    </div>
                                    <div class="feature-box-content">
                                        <span><span
                                                class="alt-font text-dark-gray fw-500">Free shipping & returns:</span> On all orders over $50</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                </div>
            </div>
        </div>
    </section>
    <!-- end section -->
    <!-- start section -->
    <section id="tab" class="pt-4 sm-pt-40px">
        <div class="container">
            <div class="row">
                <div class="col-12 tab-style-04">
                    <ul class="nav nav-tabs border-0 justify-content-center alt-font fs-19">
                        <li class="nav-item"><a data-bs-toggle="tab" href="#tab_five1" class="nav-link active">Նկարագրություն<span
                                    class="tab-border bg-dark-gray"></span></a></li>
                        <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#tab_five2">Լրացուցիչ տեղեկատվություն
                                <span class="tab-border bg-dark-gray"></span></a></li>
                        <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#tab_five3">Առաքում և վերադարձ
                                <span class="tab-border bg-dark-gray"></span></a></li>
                        <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#tab_five4"
                                                data-tab="review-tab">Կարծիքներ<span
                                    class="tab-border bg-dark-gray"></span></a></li>
                    </ul>
                    <div class="mb-5 h-1px w-100 bg-extra-medium-gray sm-mt-10px xs-mb-8"></div>
                    <div class="tab-content">
                        <!-- start tab content -->
                        <div class="tab-pane fade in active show" id="tab_five1">
                            <div class="row align-items-center justify-content-center">
                                <div class="col-lg-6 md-mb-40px">
                                    <div class="d-flex align-items-center mb-5px">
                                        <div class="col-auto pe-5px"><i class="bi bi-heart-fill text-red fs-16"></i>
                                        </div>
                                        <div class="col alt-font fw-500 text-dark-gray">Նկարագրություն</div>
                                    </div>

                                   {!! $item->description !!}

                                </div>
                                <div class="col-lg-6 col-md-8">
                                 <iframe src="   {{$item->OtherInformation->youtubUrl}}" width="100%" height="400px"> </iframe>
                                </div>
                            </div>
                        </div>
                        <!-- end tab content -->
                        <!-- start tab content -->
                        <div class="tab-pane fade in" id="tab_five2">
                            <div class="row m-0">
                                <div class="col-12">

                                     @foreach($details as $k=>$detail)
                                    <div class="row {{$k%2==0?'bg-very-light-gray':''}}">


                                        <div
                                            class="col-lg-2 col-md-3 col-sm-4 pt-10px pb-10px xs-pb-0 text-dark-gray alt-font fw-500">
                                            {{$detail->key}}
                                        </div>
                                        <div class="col-lg-10 col-md-9 col-sm-8 pt-10px pb-10px xs-pt-0">  {{$detail->value}}
                                        </div>
                                    </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                        <!-- end tab content -->
                        <!-- start tab content -->
                        <div class="tab-pane fade in" id="tab_five3">
                            <div class="row"><div class="col-12 col-md-6 last-paragraph-no-margin sm-mb-30px"><div class="alt-font fs-22 text-dark-gray mb-15px fw-500">Առաքման տեղեկատվություն</div><p class="mb-0"><span class="fw-500 text-dark-gray">Ստանդարտ առաքում </span>Պատվերները կառաքվեն ք. Երևան 1-2 ժամվա ընթացքում։</p><p class=""><span class="fw-500 text-dark-gray">Էքսպրես առաքում </span>Պատվերները կառաքվեն ք. Երևան 15-40 րոպեի ընթացքում։</p><p class=""><span class="fw-500 text-dark-gray">Առաքում մարզեր </span>Առաքում ՀՀ մարզեր՝ ՀայՓոստի միջոցով 24 ժամվա ընթացքում։</p><p class=""><span class="fw-500 text-dark-gray">Խանութից վերցնելու տարբերակ </span>Դուք կարող եք վերցնել պատվերը մեր խանութից։</p><p class="">Առաքման վճարները կախված են տարբերակից, հասցեից և պատվերի չափից։ Վճարումները տեսանելի են հաստատումից առաջ։ Առաքում կատարվում է միայն ՀՀ տարածքում, աշխատանքային ժամերին՝ 10:00-ից 21:00։</p><p class="">Պատվերից հետո կստանաք հաստատման նամակ, որտեղ կտեսնեք հետևման կոդ։ Ստանալուց հետո ստուգեք փաթեթը և խնդիրների դեպքում կապվեք մեր աջակցության թիմի հետ։</p></div><div class="col-12 col-md-6 last-paragraph-no-margin"><div class="alt-font fs-22 text-dark-gray mb-15px fw-500">Վերադարձի տեղեկատվություն</div><p class="w-80 md-w-100">Առցանց վճարումները վերադարձվում են մեր վերադարձման քաղաքականության համաձայն։</p><p class="w-80 md-w-100">Խնդրում ենք կապ հաստատել 033 934 040 հեռախոսահամարով՝ վերադարձման պայմանները ճշտելու համար։</p></div></div>
                        </div>
                        <!-- end tab content -->
                        <!-- start tab content -->
                        <div class="tab-pane fade in" id="tab_five4">
                            <div class="row g-0 mb-4 md-mb-35px">
                                @foreach($feedbacks as $feedback)
                                <div
                                    class="col-12 border-bottom border-color-extra-medium-gray pb-40px mb-40px xs-pb-30px xs-mb-30px">
                                    <div class="d-block d-md-flex w-100 align-items-center">
                                        <div class="w-300px md-w-250px sm-w-100 sm-mb-10px text-center">
                                            <img src="{{asset('assets/image/user_icon.avif')}}"
                                                 class="rounded-circle w-90px mb-10px" alt="">
                                            <span class="text-dark-gray fw-600 d-block">{{$feedback->name}}</span>

                                        </div>
                                        <div
                                            class="w-100 last-paragraph-no-margin sm-ps-0 position-relative text-center text-md-start">
                                           <span class="text-golden-yellow">
    @for ($i = 1; $i <= 5; $i++)
                                                   @if ($i <= $feedback->star)
                                                       <i class="bi bi-star-fill"></i> {{-- Լիքը աստղ --}}
                                                   @else
                                                       <i class="bi bi-star"></i> {{-- Դատարկ աստղ --}}
                                                   @endif
                                               @endfor
</span>

                                            <a href="#"
                                               class="w-65px bg-light-red border-radius-15px fs-13 text-dark-gray fw-600 text-center position-absolute sm-position-relative d-inline-block d-md-block right-0px top-0px"><i
                                                    class="fa-solid fa-heart text-red me-5px"></i><span>08</span></a>
                                            <p class="w-85 sm-w-100 sm-mt-15px">{{$feedback->comment}}</p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-12">
                                    <div class="p-7 lg-p-5 sm-p-7 bg-very-light-gray">
                                        <div class="row justify-content-center mb-30px sm-mb-10px">
                                            <div class="col-md-9 text-center">
                                                <h4 class="alt-font text-dark-gray fw-500 mb-15px">Ավելացնել Կարծիք</h4>
                                            </div>
                                        </div>
                                        <form id="feedbackForm" class="row contact-form-style-02" novalidate>
                                            <div class="col-lg-5 col-md-6 mb-20px">
                                                <label class="form-label mb-15px">Ձեր անունը*</label>
                                                <input type="text" class="form-control border-radius-4px" id="fbName" placeholder="Մուտքագրեք ձեր անունը">
                                                <div class="text-danger" id="errName"></div>
                                            </div>

                                            <div class="col-lg-5 col-md-6 mb-20px">
                                                <label class="form-label mb-15px">Էլ․ հասցե*</label>
                                                <input type="email" class="form-control border-radius-4px" id="fbEmail" placeholder="Մուտքագրեք ձեր էլ․ հասցեն">
                                                <div class="text-danger" id="errEmail"></div>
                                            </div>

                                            <div class="col-lg-2 mb-20px">
                                                <label class="form-label">Ձեր գնահատականը*</label>
                                                <div id="starRating" class="mt-2 text-golden-yellow fs-5">
                                                    <i class="bi bi-star" data-value="1"></i>
                                                    <i class="bi bi-star" data-value="2"></i>
                                                    <i class="bi bi-star" data-value="3"></i>
                                                    <i class="bi bi-star" data-value="4"></i>
                                                    <i class="bi bi-star" data-value="5"></i>
                                                </div>
                                                <div class="text-danger" id="errStar"></div>
                                            </div>

                                            <div class="col-md-12 mb-20px">
                                                <label class="form-label mb-15px">Ձեր կարծիքը</label>
                                                <textarea class="form-control border-radius-4px" rows="4" id="fbComment" placeholder="Գրեք ձեր կարծիքը այստեղ..."></textarea>
                                                <div class="text-danger" id="errComment"></div>
                                            </div>

                                            <div class="col-lg-9 mb-3 d-flex">
                                                <div class="form-check d-flex align-items-center">
                                                    <input class="form-check-input me-2" type="checkbox" id="fbTerms">
                                                    <label class="form-check-label text-muted" for="fbTerms">
                                                        Համաձայն եմ պայմաններին և գաղտնիության քաղաքականությանը։
                                                    </label>
                                                </div>
                                                <div class="text-danger" id="errTerms"></div>
                                            </div>

                                            <div class="col-lg-3 text-start text-lg-end">
                                                <button type="submit" class="btn btn-dark btn-sm">Ուղարկել կարծիքը</button>
                                            </div>

                                            <div class="col-12">
                                                <div id="fbSuccessMsg" class="alert alert-success mt-3 d-none">✅ Ձեր կարծիքը հաջողությամբ ուղարկվեց։</div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end tab content -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end section -->
    <!-- start section -->
    <section class="pt-0">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12 text-center">
                    <h2 class="alt-font text-dark-gray mb-0 ls-minus-2px">Նախընտրելի <span class="text-highlight fw-600">Ապրանքներ<span
                                class="bg-base-color h-5px bottom-2px"></span></span></h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <ul class="shop-modern shop-wrapper grid grid-4col md-grid-3col sm-grid-2col xs-grid-1col gutter-extra-large text-center">
                        <li class="grid-sizer"></li>
                        @foreach($other as $product)


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
                </div>
            </div>
        </div>
    </section>



    <!-- Modal -->
    <div class="modal fade" id="customModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4 overflow-hidden border-0">

                <!-- Վերևի գովազդային նկար -->
                <div style="background-color: #fff;">
                    <img src="{{asset($item->OtherInformation->coverImages)}}" class="w-100" alt="Դանիսոֆտ գովազդ" />
                    <button type="button" class="btn-close position-absolute top-0 end-0 m-2" aria-label="Փակել" onclick="closeModal()"></button>
                </div>

                <!-- Ստորև՝ վերնագիր, ֆորմա -->
                <div class="p-4" style="background-color: #2A2D34;" id="formSection">
                    <h5 class="text-white text-center mb-4">Անլար ականջակալներ AirPods Pro 2</h5>
                    <form onsubmit="submitForm(event)">
                        <div class="mb-3">
                            <input type="text" class="form-control rounded-pill bg-dark text-white border-secondary" placeholder="Անուն Ազգանուն" id="formName" />
                            <div class="form-text text-danger" id="nameError"></div>
                        </div>
                        <input type="hidden" id="productId" value="{{ $item->id }}">
                        <div class="mb-3">
                            <input type="tel" class="form-control rounded-pill bg-dark text-white border-secondary" placeholder="Հեռախոսահամար" id="formPhone" />
                            <div class="form-text text-danger" id="phoneError"></div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-warning rounded-pill px-5 fw-bold">ԳՐԱՆՑՎԵԼ</button>
                        </div>
                    </form>
                </div>
                <div class="p-4 text-center d-none" id="messageSection" style="background-color: #2A2D34; color: white;">
                    <h4 id="responseMessage">✅ Շնորհակալություն</h4>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('js')
    <script>
        function closeModal() {
            const modalEl = document.getElementById('customModal');
            const modalInstance = bootstrap.Modal.getInstance(modalEl);

            if (modalInstance) {
                modalInstance.hide();
            } else {
                modalEl.classList.remove('show', 'd-block');
                modalEl.setAttribute('aria-hidden', 'true');
                const backdrop = document.querySelector('.modal-backdrop');
                if (backdrop) backdrop.remove();
            }
        }

        function showMessage(text, type = "success") {
            const msgEl = document.getElementById('responseMessage');
            const formSection = document.getElementById('formSection');
            const msgSection = document.getElementById('messageSection');

            console.log({ msgEl, formSection, msgSection }); // ✅ սա ցույց կտա՝ ով է null

            msgEl.textContent = (type === "success" ? "✅ " : "❌ ") + text;
            formSection.classList.add("d-none");
            msgSection.classList.remove("d-none");

            setTimeout(() => {
                closeModal();
                // reset
                formSection.classList.remove("d-none");
                msgSection.classList.add("d-none");
                document.getElementById('formName').value = "";
                document.getElementById('formPhone').value = "";
            }, 3000);
        }
        function submitForm(e) {
            e.preventDefault();

            const name = document.getElementById('formName').value.trim();
            const rawPhone = document.getElementById('formPhone').value;
            const phone = rawPhone.replace(/[\s\-]/g, '').trim();
            const id = document.getElementById('productId').value;

            let hasError = false;
            document.getElementById('nameError').textContent = "";
            document.getElementById('phoneError').textContent = "";

            if (!name) {
                document.getElementById('nameError').textContent = "Անունը պարտադիր է";
                hasError = true;
            }

            if (!phone) {
                document.getElementById('phoneError').textContent = "Հեռախոսահամարը պարտադիր է";
                hasError = true;
            } else if (!/^\+?\d{9,15}$/.test(phone)) {
                document.getElementById('phoneError').textContent = "Մուտքագրեք վավեր հեռախոսահամար";
                hasError = true;
            }

            if (!hasError) {
                fetch("/order/product", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-Requested-With": "XMLHttpRequest",
                        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({ name, phone, id })
                })
                    .then(res => {
                        if (!res.ok) throw new Error();
                        return res.json();
                    })
                    .then(data => {
                        showMessage("Շնորհակալություն, շուտով կապ կհաստատենք։", "success");
                    })
                    .catch(err => {
                        showMessage("Տեղի ունեցավ սխալ։ Խնդրում ենք փորձել կրկին։", "error");
                    });
            }
        }
    </script>

    <script>
        let selectedStar = 0;

        // Աստղիկների ընտրում
        document.querySelectorAll("#starRating i").forEach(star => {
            star.addEventListener("click", () => {
                selectedStar = star.dataset.value;
                document.querySelectorAll("#starRating i").forEach(s => {
                    s.classList.remove("bi-star-fill");
                    s.classList.add("bi-star");
                });
                for (let i = 0; i < selectedStar; i++) {
                    document.querySelectorAll("#starRating i")[i].classList.add("bi-star-fill");
                    document.querySelectorAll("#starRating i")[i].classList.remove("bi-star");
                }
            });
        });

        // Ֆորմայի ուղարկում
        document.getElementById("feedbackForm").addEventListener("submit", function(e) {
            e.preventDefault();

            const name = document.getElementById("fbName").value.trim();
            const email = document.getElementById("fbEmail").value.trim();
            const comment = document.getElementById("fbComment").value.trim();
            const terms = document.getElementById("fbTerms").checked;
            const id = document.getElementById('productId').value;

            // Մաքրել հին սխալները
            ["errName", "errEmail", "errComment", "errStar", "errTerms"].forEach(id => {
                document.getElementById(id).textContent = "";
            });

            // Վավերացում
            let hasError = false;
            if (!name) { document.getElementById("errName").textContent = "Անունը պարտադիր է"; hasError = true; }
            if (!email) { document.getElementById("errEmail").textContent = "Էլ․ հասցեն պարտադիր է"; hasError = true; }
            if (!selectedStar) { document.getElementById("errStar").textContent = "Խնդրում ենք ընտրել գնահատական"; hasError = true; }
            if (!comment) { document.getElementById("errComment").textContent = "Խնդրում ենք գրեք կարծիք"; hasError = true; }
            if (!terms) { document.getElementById("errTerms").textContent = "Պետք է համաձայնեք պայմաններին"; hasError = true; }

            if (hasError) return;

            // AJAX ուղարկում
            fetch("/feedback", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content")
                },
                body: JSON.stringify({
                    name,
                    email,
                    comment,
                    star: selectedStar,
                    item_id:id

                })
            })
                .then(res => {
                    if (!res.ok) throw res;
                    return res.json();
                })
                .then(data => {
                    document.getElementById("fbSuccessMsg").classList.remove("d-none");
                    document.getElementById("feedbackForm").reset();
                    selectedStar = 0;
                    document.querySelectorAll("#starRating i").forEach(s => {
                        s.classList.remove("bi-star-fill");
                        s.classList.add("bi-star");
                    });
                })
                .catch(async err => {
                    const errorData = await err.json();
                    if (errorData.errors) {
                        if (errorData.errors.name) document.getElementById("errName").textContent = errorData.errors.name[0];
                        if (errorData.errors.email) document.getElementById("errEmail").textContent = errorData.errors.email[0];
                        if (errorData.errors.comment) document.getElementById("errComment").textContent = errorData.errors.comment[0];
                        if (errorData.errors.star) document.getElementById("errStar").textContent = errorData.errors.star[0];
                    } else {
                        alert("Տեղի ունեցավ սխալ, փորձեք ավելի ուշ։");
                    }
                });
        });
    </script>



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
