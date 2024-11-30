@extends('layouts.base')

@section('content')

    @include('includes.WelcoomSlid')
    @include('includes.service')

    <section id="our-shop" class="padding_top padding_bottom_half">
        <hr class="mb-5">
        <div class="container">
            <div class="row ">
                <div class="col-md-12 text-center wow fadeIn  text-center heading-title" data-wow-delay="300ms">


                    <h2 class="darkcolor text-uppercase bottom30 heading-title-small">գնումները Հեշտացել են</h2>
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
                                    <a class="opens" href="{{route('item.show',$items->id)}}">
                                        <i class="fa fa-eye "></i></a>
                                </div>
                            </div>
                            <div class="shop-content text-center">

                                @if (\Illuminate\Support\Carbon::parse($items->auction_end_time) <= \Illuminate\Support\Carbon::now())
                                    <h4 class="darkcolor pb-2"><a href="{{route('item.show',$items->id)}}">{{$items->name}}</a></h4>

                                    <h3 class="price-product font-weight-bold">{{$items->price}} դ</h3>
                                @else
                                    @if($items->discount)
                                        <div class="discounts"><span>{{$items->discount}}%</span></div>
                                    @endif
                                    @if($items->discount)
                                            <h4 class="darkcolor pb-2"><a href="{{route('item.show',$items->id)}}">{{$items->name}}</a></h4>

                                            <h5 class="price-product font-weight-bold">
                                            <del>{{$items->price}} դ</del>
                                        </h5>
                                        <h3 class="price-product font-weight-bold">{{$items->price - (($items->price * $items->discount) / 100) }}
                                            դրամ</h3>
                                    @else
                                            <h4 class="darkcolor pb-2"><a href="{{route('item.show',$items->id)}}">{{$items->name}}</a></h4>

                                            <h3 class="price-product font-weight-bold">{{$items->price}} դրամ</h3>

                                            @endif
                                            @endif

                                            <button type="button" class="btn btn-primary mt-2 whitecolor p-2 hover-default orderBtn"
                                                    data-toggle="modal" data-id="{{$items->id}}" data-title="{{$items->name}}" data-desc="{{$items->description}}" data-target="#exampleModal" >
                                                Պատվիրել հիմա <i class="fa fa-shopping-cart"></i>
                                            </button>

                            </div>
                        </div>
                    </div>

                @endforeach
            </div>
        </div>
    </section>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Contact Form</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAB2AAAAdgB+lymcgAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAANySURBVHic7ZrNSxtBGId/bxJaSO2tPRWh0FsRSrE2SQviIYfsYkHBXJJTlBgQ/xwhGAw5aC7Ggwhdc8hVYvyq0PZaSqFCP05tBdumuz2k0ZismYmZ2cE6z3GZbH7vk93ZdzYDaDQajUajua4Q70DHMG4iGMyAKAFgCMAtebEuxTGANyBaAZCjUukXz4e4BDjx+D0AL+E4j/oI6CWHIBqnUukjayBTgGMYNzEwULtCxTd5BaIw60rwMU8TDGauYPEA8Bi2nWYNYgsgSgqJowKO7GwBwEMBUVQxxBrAI2BAQBBV3GYN4BHwX6MFqA6gGi1AdQDViBcwNraL1dWvWF39gmi01vf5otHa6flGR/cEJDyHWAFEDubm7oPoDojuIpMZhmlWL30+06wikxk+Pd/8/CCIHIGJBQtwnPa1RQCp1MilJJhmFanUCIAA4zv6QvwtkMu9A1BvOdK7BPfi68jl3osJeYZ4AZVKCPn8HoDfLUcDSKWeYmJii/n5WGzbpfg/WF7eQaUSEpxW0lOgXA4jn9/H+SvBj2Qy3FVCLLaNmZkn6Cy+ho2NZzKiynsMNiTsgVfCRcUXi9uyigdk9wHdJExOnkkwjOqFxa+vP5cZMcAe0iflchhA+6/rRyIRBrCFkxMfpqc773kPige8EAA0JPh87TO7H4lEc1I7P9sXCruwLOnFA162wpYVcbkdAuj85WuwrIhXsbxdC7jPCU08u+xb8X4x1K2VJaFNHhfeCjCMqsuE16QxMbY+HTzAOwGm6VZ8He2PyEQi1NcCqke8EXBRe1ss1lwnRt62WQDyH4PdOryzCa+zT0gmG32C5ElR7hXAV3zvbbNA5AngLb6JIglyBPRafBMFEsQLiEZrLsXXUSjscN3P5XIYhcIuOiWEhLxjbEO8gNnZB3Dv7fnbW8uKuEgIIJ0eFJTyFPEvRQG75UjvxTdxlyAc8S9FFxY+wHE+w3E+IZs96GthY1kRLC7uw7aPYNtHyGaZOz56hb1DZGpK6Gtor6G1ta416n+GVAdQjRagOoBqtACOMT+kp5DHN9YAHgFvBQRRBTM7j4CigCCqWGENYAs4Ps4BOBSRxlOIDkC0xBrGFECbmz9BNI6rJIHoAH7/C54d4/zb5ePxG7Dt9L/tp0Pg2IToMd8BvAZQBNES73Z5jUaj0Wg015e/R9dTLXZQQv8AAAAASUVORK5CYII=" alt="">
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="dataHtmlJs mb-5"></div>
                        @include('includes.callUpform')
                               </div>
                </div>
                <div class="modal-footer">
                    <a href="" class="btn btn-primary moreModal">Ավելին</a>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')

@endsection
