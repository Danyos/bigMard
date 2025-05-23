@extends('Admin.layouts.app')

@section('content')
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <!-- Page header -->
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>Add Item Detail</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('admin.home') }}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('admin.product.index') }}">Product Page</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('admin.item-details.index') }}">Item Details</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Add
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <!-- End Page header -->

                <div class="pd-20 card-box mb-30">

                    <div class="">
                        <form class="p-5" method="POST" action="{{ route('admin.item-details.store') }}">
                            @csrf
                            <div class="row">




                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="key">Key:</label>
                                        <input type="text" id="key" name="key" class="form-control" required>
                                        <input type="hidden"  value="{{$id}}" id="product_id" name="product_id" class="form-control" required>

                                        @error('key')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="value">Value:</label>
                                        <textarea id="value" name="value" class="form-control" rows="3"></textarea>
                                        @error('value')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <button class="btn btn-primary" type="submit">Save</button>
                                    <a href="{{ route('admin.item-details.show',$id) }}" class="btn btn-secondary">Back</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
