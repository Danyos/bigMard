<div>
    <section id="our-shop" class="padding_top padding_bottom_half">
        <div class="container">
            <div class="row ">
                <div class="col-md-12 text-center wow fadeIn  text-center heading-title" data-wow-delay="300ms">

                    <span class="defaultcolor">Առցանց</span>
                    <h2 class="darkcolor text-uppercase bottom30 heading-title-small">գնումները Հեշտացել է</h2>
                    <div class="col-md-8 offset-md-2 heading_space">
                        <p>
                            Օգտակար և թրենդային ապրանքների լավագույն տեսականին:
                            Պատվիրեք հիմա-ստացեք հնարավորինս արագ:
                            ներկայացված ապրանքների տեսականին առկա են:
                            
                            <br>
                           <b></b>
                            </p>
                    </div>
                </div>
                @foreach($item as $items)

                    <div class="col-lg-4 col-md-6 col-sm-6 wow fadeIn" data-wow-delay="300ms">
                        <div class="shopping-box bottom15">
                            <div class="image">

                                @if(isset($items->ItemGallery->image_path))
                                    <img src="{{asset($items->ItemGallery->image_path)}}" alt="shop">
                                @endif

                                <div class="overlay overlay-blue center-block">
                                    <a class="opens" type="button" wire:click="showitems({{$items->id}})">
                                        <i class="fa fa-shopping-cart"></i></a>
                                </div>
                            </div>
                            <div class="shop-content text-center">
                                <h4 class="darkcolor pb-2"><a>{{$items->name}}</a></h4>

                                @if (\Illuminate\Support\Carbon::parse($items->auction_end_time) <= \Illuminate\Support\Carbon::now())
                                    <h3 class="price-product font-weight-bold">{{$items->price}} դ</h3>
                                @else
                                    @if($items->discount)
                                        <div class="discounts"><span>{{$items->discount}}%</span></div>
                                    @endif
                                    @if($items->discount)
                                        <h5 class="price-product font-weight-bold">
                                            <del>{{$items->price}} դ</del>
                                        </h5>
                                        <h3 class="price-product font-weight-bold">{{$items->price - (($items->price * $items->discount) / 100) }}
                                            դրամ</h3>
                                    @else
                                        <h3րամ class="price-product font-weight-bold">{{$items->price}} դրամ</h3>

                                    @endif
                                @endif

                                <button type="button" class="btn btn-primary mt-5 whitecolor p-2 hover-default"
                                        data-toggle="modal" data-target="#exampleModal"
                                        wire:click="showitems({{$items->id}})">
                                    Պատվիրել հիմա <i class="fa fa-shopping-cart"></i>
                                </button>

                            </div>
                        </div>
                    </div>

                @endforeach
            </div>
        </div>
    </section>

    <livewire:item-show/>
</div>
