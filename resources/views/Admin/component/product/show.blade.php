@extends('Admin.layouts.app')
@section('content')
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>Show product</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item " aria-current="page">
                                        <a href="{{route('admin.product.index')}}">Product</a>
                                    </li>
                                    <li class="breadcrumb-item active">
                                        <form action="{{route('admin.product.destroy',$item->id)}}" method="post" style="display: inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="breadcrumb-item  " style="border: none">Delete</button>
                                        </form>
                                    </li>
                                    <li class="breadcrumb-item " aria-current="page">
                                        <a href="{{route('admin.product.edit',$item->id)}}">Edit</a>
                                    </li>
                                    <li class="breadcrumb-item " aria-current="page">
                                        <a href="{{route('admin.product.show',$item->id)}}">Show</a>
                                    </li>
                                    <li class="breadcrumb-item " aria-current="page">
                                        <a href="{{route('item.show',encrypt($item->id))}}" target="_blank"
                                          >go page</a>
                                    </li>
                                </ol>
                            </nav>
                        </div>

                    </div>
                </div>

                <div class="pd-20 card-box mb-30">
                    <div class="clearfix">
                        <h4 class="text-blue h4">Start</h4>

                    </div>
                    <div class="">
                        <table class="table">
                            <tbody>
                            <tr>
                                <th>name</th>
                                <td>{{$item->name}}</td>
                            </tr>
                            <tr>
                                <th>description</th>
                                <td>{!! $item->description !!}</td>
                            </tr>
                            <tr>
                                <th>price</th>
                                <td>{{$item->price}}</td>
                            </tr>
                            <tr>
                                <th>discount</th>
                                <td>{{$item->discount?$item->discount:"-"}}</td>
                            </tr>
                            
                            <tr>
                                <th>auction_end_time</th>
                                <td>{{$item->auction_end_time?\Illuminate\Support\Carbon::parse($item->auction_end_time)->format('Y-m-d\TH:i'):"-"}}</td>
                            </tr>
                            <tr>
                                <th>imgText</th>
                                <td>{{$item->imgText}}</td>
                            </tr>
                              <tr>
                                <th>count</th>
                                <td>{{$item->count}}</td>
                            </tr>
                            <tr>
                                <th>Youtube video</th>
                                <td>
                                    <iframe width="517" height="247" src="{{$other->youtubUrl ?? ''}}"
                                            title="Arman Hovhannisyan  Tata Simonyan- Im Arev" frameborder="0"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                            allowfullscreen></iframe>
                                </td>
                            </tr>
                            <tr>
                                <th>status</th>
                                <td>{{$item->status}}</td>
                            </tr>
                            <tr>
                                <th>underImages</th>
                                <td><img width="200px"
                                         src="{{isset($other->underImages)?asset($other->underImages):''}}" alt=""></td>
                            </tr>
                            <tr>
                                <th>coverImages</th>
                                <td><img width="200px"
                                         src="{{isset($other->coverImages)?asset($other->coverImages):''}}" alt=""></td>
                            </tr>            <tr>
                                <th>middle_picture</th>
                                <td>      <img width="200px"
                                               src="{{isset($other->middle_picture)?asset($other->middle_picture):''}}"
                                               alt=""></td>
                            </tr>        <tr>
                                <th>Product images</th>
                                <td>   @foreach($itemGallery as $Gallery)
                                <ul>
                                    <li><img width="200px" src="{{asset($Gallery->image_path)}}" alt=""></li>

                                </ul>
                                @endforeach
                                </td>
                            </tr>
                            </tbody>


                        </table>


                    </div>
                </div>


            </div>
        </div>
@endsection
