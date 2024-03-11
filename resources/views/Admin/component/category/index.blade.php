@extends('Admin.layouts.app')
@section('content')

    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="pd-20 card-box mb-30">
                    <form class="p-5" method="post" action="{{route('admin.category.store')}}"
                          enctype="multipart/form-data">
                        @csrf
                        <h5>Personal Info</h5>
                        <section class=" my-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class=" d-flex align-items-center">
                                     <div class="form-group">
                                         <label>Title :</label>
                                         <input type="text" class="form-control" name="name" placeholder="create new category" required/>
                                         @if($errors->has('title'))
                                             <em class="invalid-feedback">
                                                 {{ $errors->first('title') }}
                                             </em>
                                         @endif
                                     </div>
                                        <div>
                                            <button class="btn btn-primary mt-2 ml-3" type="submit">Submit</button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </section>

                    </form>

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">name</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($category as $categorys)
                                <tr>
                                    <th scope="row">{{$categorys->id}}</th>
                                    <td>{{$categorys->name}}</td>
                                    <td><a href="{{route('admin.category.edit',$categorys->id)}}">Edit</a></td>
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
