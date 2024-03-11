@extends('Admin.layouts.app')

@section('content')
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>Edit Category</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item " aria-current="page">
                                        <a href="{{route('admin.category.index')}}">Go to the Category </a>
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

                        <form class="p-5" method="post" action="{{route('admin.category.update',$id)}}"
                              enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <h5>Personal Info</h5>
                            <section class=" my-3">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Title :</label>
                                            <input type="text" class="form-control" name="name" value="{{$category->name}}" required/>
                                            @if($errors->has('title'))
                                                <em class="invalid-feedback">
                                                    {{ $errors->first('title') }}
                                                </em>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <h5>Save</h5>
                            <section>
                                <button class="btn btn-primary my-3" type="submit">Submit</button>
                            </section>
                        </form>
                    </div>
                </div>




            </div>
        </div>
        @endsection
