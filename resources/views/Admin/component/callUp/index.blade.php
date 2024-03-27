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
                                <th scope="col">Name</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Type</th>
                                <th scope="col">Product</th>
                                <th scope="col">Status</th>
                                <th scope="col">DateTime</th>
                                <th scope="col">Actions</th> <!-- Added Actions column for delete button -->
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($call as $k=>$calls)
                                <tr>
                                    <th scope="row">{{$call->count()-$k}}</th>
                                    <td>{{$calls->name??"-"}}</td>
                                    <td>{{$calls->phone}}</td>
                                    <td>{{$calls->type_id}}</td>
                                    @if($calls->item_id)
                                        <td><a href="{{route('admin.product.show',$calls->item_id)}}">View Product</a>
                                        </td>
                                    @else
                                        <td>Պատվիրել զանգ</td>
                                    @endif
                                    <td>
                                        <form action="{{route('admin.callUp.update',$calls->id)}}" method="post" id="statusChange">
                                            @csrf
                                            @method('put')
                                            <span class="badge" style="background: {{$calls->status==='active'?'green':'red'}}; color: white" onclick="document.getElementById('statusChange').submit()" >{{$calls->status==='active'?"viewed":"not viewed"}}</span>
                                        </form>
                                    </td>
                                    <td>{{$calls->created_at}}</td>
                                    <td>
                                        <form action="{{ route('admin.callUp.destroy', $calls->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
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
