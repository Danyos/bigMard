<!DOCTYPE html>
<html lang="en">
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>BigMard Dashboard</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Iconic Fonts -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('admin/vendors/iconic-fonts/flat-icons/flaticon.css')}}">
    <link href="{{asset('admin/vendors/iconic-fonts/font-awesome/css/all.min.css')}}" rel="stylesheet">
    <!-- Bootstrap core CSS -->
    <link href="{{asset('admin/assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- jQuery UI -->
    <link href="{{asset('admin/assets/css/jquery-ui.min.css')}}" rel="stylesheet">
    <!-- Costic styles -->
    <link href="{{asset('admin/assets/css/style.css')}}" rel="stylesheet">
    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('admin/logo-black.png')}}">
    @yield('css')
</head>

<body class="ms-body ms-aside-left-open ms-primary-theme ms-has-quickbar">


@include('Admin.includes.nav.banner')

<!-- Sidebar Right -->
<aside id="ms-recent-activity" class="side-nav fixed ms-aside-right ms-scrollable">

    <div class="ms-aside-header">
        <ul class="nav nav-tabs tabs-bordered d-flex nav-justified mb-3" role="tablist">
            <li role="presentation" class="fs-12"><a href="#activityLog" aria-controls="activityLog" class="active"
                                                     role="tab" data-toggle="tab"> Activity Log</a></li>

            <li>
                <button type="button" class="close ms-toggler text-center" data-target="#ms-recent-activity"
                        data-toggle="slideRight"><span aria-hidden="true">&times;</span></button>
            </li>
        </ul>
    </div>

    <div class="ms-aside-body">

        <div class="tab-content">

            <div role="tabpanel" class="tab-pane active fade show" id="activityLog">
                <ul class="ms-activity-log">
                    <li>
                        <div class="ms-btn-icon btn-pill icon btn-light">
                            <i class="flaticon-gear"></i>
                        </div>
                        <h6>Update 1.0.0 Pushed</h6>
                        <span> <i class="material-icons">event</i>1 January, 2020</span>
                        <p class="fs-14">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque scelerisque
                            diam non nisi semper, ula in sodales vehicula....</p>
                    </li>
                    <li>
                        <div class="ms-btn-icon btn-pill icon btn-success">
                            <i class="flaticon-tick-inside-circle"></i>
                        </div>
                        <h6>Profile Updated</h6>
                        <span> <i class="material-icons">event</i>4 March, 2018</span>
                        <p class="fs-14">Curabitur purus sem, malesuada eu luctus eget, suscipit sed turpis. Nam
                            pellentesque felis vitae justo accumsan, sed semper nisi sollicitudin...</p>
                    </li>
                    <li>
                        <div class="ms-btn-icon btn-pill icon btn-warning">
                            <i class="flaticon-alert-1"></i>
                        </div>
                        <h6>Your payment is due</h6>
                        <span> <i class="material-icons">event</i>1 January, 2020</span>
                        <p class="fs-14">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque scelerisque
                            diam non nisi semper, ula in sodales vehicula....</p>
                    </li>
                    <li>
                        <div class="ms-btn-icon btn-pill icon btn-danger">
                            <i class="flaticon-alert"></i>
                        </div>
                        <h6>Database Error</h6>
                        <span> <i class="material-icons">event</i>4 March, 2018</span>
                        <p class="fs-14">Curabitur purus sem, malesuada eu luctus eget, suscipit sed turpis. Nam
                            pellentesque felis vitae justo accumsan, sed semper nisi sollicitudin...</p>
                    </li>
                    <li>
                        <div class="ms-btn-icon btn-pill icon btn-info">
                            <i class="flaticon-information"></i>
                        </div>
                        <h6>Checkout what's Trending</h6>
                        <span> <i class="material-icons">event</i>1 January, 2020</span>
                        <p class="fs-14">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque scelerisque
                            diam non nisi semper, ula in sodales vehicula....</p>
                    </li>
                    <li>
                        <div class="ms-btn-icon btn-pill icon btn-secondary">
                            <i class="flaticon-diamond"></i>
                        </div>
                        <h6>Your Dashboard is ready</h6>
                        <span> <i class="material-icons">event</i>4 March, 2018</span>
                        <p class="fs-14">Curabitur purus sem, malesuada eu luctus eget, suscipit sed turpis. Nam
                            pellentesque felis vitae justo accumsan, sed semper nisi sollicitudin...</p>
                    </li>
                </ul>
                <a href="#" class="btn btn-primary d-block"> View All </a>
            </div>


        </div>

    </div>

</aside>
{{--@include('Admin.includes.header.header')--}}
{{--@include('Admin.includes.feature.slidebar')--}}
{{----}}
<!-- Main Content -->
<main class="body-content">

    <!-- Navigation Bar -->
    <nav class="navbar ms-navbar">

        <div class="ms-aside-toggler ms-toggler pl-0" data-target="#ms-side-nav" data-toggle="slideLeft">
            <span class="ms-toggler-bar bg-primary"></span>
            <span class="ms-toggler-bar bg-primary"></span>
            <span class="ms-toggler-bar bg-primary"></span>
        </div>

        <div class="logo-sn logo-sm ms-d-block-sm">
            <a class="pl-0 ml-0 text-center navbar-brand mr-0" href="{{route('admin.home')}}"><img
                    src="{{asset('admin/logo-black.png')}}" alt="logo"> </a>
        </div>





        <div class="ms-toggler ms-d-block-sm pr-0 ms-nav-toggler" onclick="document.querySelector('#logout').submit()">
       <i class="fa fa-power-off"></i>
        </div>

    </nav>

    <!-- Body Content Wrapper -->
    <div class="ms-content-wrapper">
        @yield('content')

    </div>

</main>


<!-- MODALS -->

<!-- Quick bar -->
<!-- Quick bar -->
<aside  class="ms-quick-bar fixed ms-d-block-lg">

    <ul class="nav nav-tabs ms-quick-bar-list" role="tablist">

        <li class="ms-quick-bar-item ms-has-qa">
            <a  onclick="document.querySelector('#logout').submit()">
                <i class="fa fa-power-off"></i>

            </a>
        </li>

        <li class="ms-quick-bar-item ms-has-qa"
            title="Settings" data-title="Settings">
            <a href="{{route('admin.change.password')}}" >
                <i class="flaticon-gear"></i>

            </a>
        </li>
    </ul>
    <div class="ms-configure-qa" data-toggle="tooltip" data-placement="left" title="Configure Quick Access">

        <a href="#">
            <i class="flaticon-hammer"></i>

        </a>

    </div>

</aside>
<!-- Reminder Modal -->

<!-- Notes Modal -->

<!-- SCRIPTS -->
<!-- Global Required Scripts Start -->
<script src="{{asset('admin/assets/js/jquery-3.5.0.min.js')}}"></script>
<script src="{{asset('admin/assets/js/popper.min.js')}}"></script>
<script src="{{asset('admin/assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('admin/assets/js/perfect-scrollbar.js')}}"></script>
<script src="{{asset('admin/assets/js/jquery-ui.min.js')}}"></script>
<script src="{{asset('admin/assets/js/framework.js')}}"></script>


@yield('js')
</body>
</html>
