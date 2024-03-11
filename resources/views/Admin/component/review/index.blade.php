@extends('Admin.layouts.app')
@section('content')

    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="pd-20 card-box mb-30">

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">name</th>
                                <th scope="col">email</th>
                                <th scope="col">star</th>
                                <th scope="col">product</th>
                                <th scope="col">comments</th>
                                <th scope="col">Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($feedback as $feedbacks)
                                <tr>
                                    <th scope="row">{{$feedbacks->id}}</th>
                                    <td>{{$feedbacks->name}}</td>
                                    <td>{{$feedbacks->email}}</td>
                                    <td>{{$feedbacks->star}}</td>
                                    @if($feedbacks->item_id)
                                        <td><a href="{{route('admin.product.show',$feedbacks->item_id)}}">View Product</a>
                                        </td>
                                    @else
                                        <td>-</td>
                                    @endif
                                    <td>{{$feedbacks->comment}}</td>
                                    <td>
                                        <form action="{{route('admin.reviews.update',$feedbacks->id)}}" method="post" id="statusChange">
                                            @csrf
                                            @method('put')
                                            <button  class="badge" style="background: {{$feedbacks->status==='active'?'green':'red'}}; color: white"
                                                  onclick="document.getElementById('statusChange').submit()" >{{$feedbacks->status==='active'?"viewed":"not viewed"}}</button>

                                    </form>
                                    </td>


                          </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
