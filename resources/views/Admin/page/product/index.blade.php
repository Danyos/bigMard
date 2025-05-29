@extends('Admin.layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="title">
                <h4>Products</h4>
            </div>
            <nav aria-label="breadcrumb" class="d-flex justify-content-between" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.home') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Product List</li>
                </ol>
                <a href="{{ route('admin.product.create') }}" class="btn btn-primary">Create New</a>
            </nav>
        </div>
    </div>

    <div class="row">
        @foreach($products as $product)
            @php
                $orderTimeTime = \Illuminate\Support\Carbon::parse($product->order_time);
                $isOrderExpired = $orderTimeTime->isPast();
            @endphp

            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 border">
                <div class="ms-card">
                    <div class="ms-card-img">
                        @if(isset($product->OtherInformation->coverImages))
                            <img src="{{asset($product->OtherInformation->coverImages)}}" alt="shop" width="1080px"
                                 height="1080px">
                        @else
                            <img
                                src="https://user-images.githubusercontent.com/24848110/33519396-7e56363c-d79d-11e7-969b-09782f5ccbab.png"
                                width="1080px" height="1080px"
                                alt="shop">
                        @endif
                            <span class="badge badge-secondary">Best-{{$product->best}}</span>
                            <span class="badge badge-secondary">New-{{$product->new}}</span>
                    </div>
                    <div class="ms-card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h6 class="mb-0">{{ $product->name }}</h6>
                            <h6 class="ms-text-primary mb-0"> {{ number_format($product->price, 2) }} դրամ</h6>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mt-2">
                            <div>
                                <p>Set Active</p>


                                <span class="badge {{ $isOrderExpired ? 'd-none' : 'badge-success' }}">
        {{ $product->order_time ? $orderTimeTime->format('Y-m-d\TH:i') : "-" }}
    </span>
                            </div>
                            <div>
                                <p>Action</p>

                                @php
                                    $auctionTime = \Illuminate\Support\Carbon::parse($product->auction_end_time);
                                    $isExpired = $auctionTime->isPast();
                                @endphp

                                <span class="badge {{ $isExpired ? 'badge-danger' : 'badge-success' }}">
        {{ $product->auction_end_time ? $auctionTime->format('Y-m-d\TH:i') : "-" }}
    </span>
                            </div>


                        </div>

                        <div class="d-flex justify-content-between">

                            <a href="{{ route('admin.item-details.show',$product->id) }}"
                               class="btn btn grid-btn btn-sm btn-warning">Details</a>
                            <div class="btn-group">
                                <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Action
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{route('admin.items.setActive',$product->id)}}">SET Active</a>
                                    <a class="dropdown-item" href="{{route('admin.product.coverImage',$product->id)}}">coverImage</a>
                                    <a class="dropdown-item" href="{{ route('admin.product.edit', $product->id) }}">EDIT</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Separated link</a>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">

                            <form action="{{ route('admin.product.destroy', $product->id) }}" method="POST"
                                  onsubmit="return confirm('Are you sure?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn grid-btn btn-sm btn-danger">Remove</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="blog-pagination mt-30 mb-30">
        <div class="btn-toolbar justify-content-center mb-15">
            <div class="btn-group">
                {{ $products->links() }}
            </div>
        </div>
    </div>

@endsection
