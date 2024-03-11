@extends('Admin.layouts.app')
@section('content')
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="title">
                                <h4>Product</h4>
                            </div>
                            <nav aria-label="breadcrumb" class="d-flex justify-content-between" role="navigation">
                                <ol class="breadcrumb">
                                    <div class="breadcrumb-item">
                                        <a href="{{route('admin.home')}}">Home</a>
                                    </div>
                                    <div class="breadcrumb-item active" aria-current="page">
                                        Product
                                    </div>
                                </ol>
                                <a href="{{route('admin.product.create')}}" class="btn btn-primary">Created new</a>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="product-wrap">
                    <div class="product-divst">
                        <div class="row">
                            @foreach($product as $products)
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <div class="product-box">
                                        <div class="producct-img position-relative">
                                            <span class="badge badge-danger position-absolute top5 " style="z-index: 999">{{$products->discount?$products->discount.'%':''}}</span>
                                            @if(isset($products->ItemGallery->image_path))
                                                <img src="{{asset($products->ItemGallery->image_path)}}" alt="shop">
                                            @endif
                                        </div>
                                        <div class="product-caption">
                                            <h4><a href="#">{{$products->name}}</a></h4>
                                            <div class="price">


                                                @if($products->discount)
                                                    <del>{{$products->price}} դ</del>
                                                    <ins>{{$products->price - (($products->price * $products->discount) / 100) }} դ</ins>



                                                @else

                                                    <ins>{{$products->price}} դ</ins>

                                                @endif


                                                    @if (\Illuminate\Support\Carbon::parse($products->auction_end_time) <= \Illuminate\Support\Carbon::now())


                                                        <span style="color: red">
                                                            {{$products->auction_end_time?\Illuminate\Support\Carbon::parse($products->auction_end_time)->
format('Y-m-d\TH:i'):"-"}}
                                                      </span>
                                                    @else
                                                      <span style="color: green">
                                                            {{$products->auction_end_time?\Illuminate\Support\Carbon::parse($products->auction_end_time)->
format('Y-m-d\TH:i'):"-"}}
                                                      </span>
                                                    @endif





                                            </div>
                                            <a href="{{route('admin.product.edit',$products->id)}}" class="btn btn-outdivne-primary">Edit</a>
                                            <a href="{{route('admin.product.show',$products->id)}}" class="btn btn-outdivne-primary">View</a>
                                            <a href="{{route('item.show',encrypt($products->id))}}" target="_blank"
                                               class="btn btn-outdivne-primary">go page</a>
                                            <form action="{{route('admin.product.destroy',$products->id)}}" method="post" style="display: inline">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="blog-pagination mt-30 mb-30">
                        <div class="btn-toolbar justify-content-center mb-15">
                            <div class="btn-group">
                                {{$product->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
