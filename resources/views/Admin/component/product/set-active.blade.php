@extends('Admin.layouts.app')

@section('content')
    <div class="container">
        <h2>Սահմանել Ակտիվացման Ժամանակ՝ {{ $item->name }}</h2>

        <form action="{{ route('admin.items.set-active.post', $item->id) }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="order_time">Ընտրեք Ակտիվացման Ժամանակ (datetime-local):</label>

                <!-- Սահմանված արժեքի ցուցադրում -->
                <input
                    type="datetime-local"
                    id="order_time"
                    name="order_time"
                    class="form-control"
                    required
                    value="{{ $item->order_time ? date('Y-m-d\TH:i', strtotime($item->order_time)) : '' }}"
                >
            </div>

            <button type="submit" class="btn btn-primary mt-3">Հաստատել</button>
            <a href="{{ route('admin.product.index') }}" class="btn btn-secondary mt-3">Վերադառնալ</a>
        </form>
    </div>
@endsection
