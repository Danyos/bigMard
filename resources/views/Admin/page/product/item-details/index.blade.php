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
                                <h4>Item Details List</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('admin.home') }}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('admin.product.index') }}">Product Page</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Item Details
                                    </li>
                                </ol>
                            </nav>
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="{{ route('admin.item-details.edit',$id) }}" class="btn btn-primary">
                                Add Item Detail
                            </a>
                        </div>
                    </div>
                </div>
                <!-- End Page header -->

                <div class="pd-20 card-box mb-30">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Product ID</th>
                                <th>Key</th>
                                <th>Value</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($itemDetails as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->ItemInfo->name ?? $item->product_id }}</td>
                                    <td>{{ $item->key }}</td>
                                    <td>{{ $item->value }}</td>
                                    <td>
                                        <form action="{{ route('admin.item-details.destroy', $item->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Are you sure you want to delete this item?')">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">No item details found.</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
