@extends('Admin.layouts.app')
@section('content')

    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>Change Password</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="{{route('admin.home')}}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Change info
                                    </li>
                                </ol>
                            </nav>
                        </div>

                    </div>
                </div>
                <div class="pd-20 card-box mb-30">

                    <h1>Change Password</h1>

                    @if(session('success'))
                        <div>{{ session('success') }}</div>
                    @endif

                    @if(session('error'))
                        <div>{{ session('error') }}</div>
                    @endif

                    <form method="post" action="{{ route('admin.change.password.post') }}">
                        @csrf

                        <div class="form-group">
                            <label for="current_password">Current Password:</label>
                            <input type="password" id="current_password" name="current_password" required>
                            @error('current_password')
                            <div>{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="new_password">New Password:</label>
                            <input type="password" id="new_password" name="new_password" required>
                            @error('new_password')
                            <div>{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="new_password_confirmation">Confirm New Password:</label>
                            <input type="password" id="new_password_confirmation" name="new_password_confirmation"
                                   required>
                        </div>
                        <button type="submit" class="btn btn-success">Change Password</button>
                    </form>
                </div>


            </div>

        </div>
    </div>
@endsection
