@extends('Admin.layouts.app')

@section('content')

    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="pd-20 card-box mb-30">
                    <h5 class="mb-4">Slider Images List</h5>

                    <div class="mb-3">
                        <a href="{{ route('admin.slider-images.create') }}" class="btn btn-success">Add New Image</a>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Image</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($sliderImages as $image)
                                <tr>
                                    <th scope="row">{{ $image->id }}</th>
                                    <td>{{ $image->title }}</td>
                                    <td>
                                        <img src="{{ asset($image->image) }}" width="100" alt="slider image">
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.slider-images.edit', $image->id) }}" class="btn btn-sm btn-warning">Edit</a>

                                        <form action="{{ route('admin.slider-images.destroy', $image->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
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
