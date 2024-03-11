<!DOCTYPE html>
<html>
<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8" />
    <title>BigMard</title>

    <!-- Site favicon -->
    <link
        rel="apple-touch-icon"
        sizes="180x180"
        href="{{asset('admin/vendors/images/apple-touch-icon.png')}}"
    />
    <link
        rel="icon"
        type="image/png"
        sizes="32x32"
        href="{{asset('admin/vendors/images/favicon-32x32.png')}}"
    />
    <link
        rel="icon"
        type="image/png"
        sizes="16x16"
        href="{{asset('admin/vendors/images/favicon-16x16.png')}}"
    />

    <!-- Mobile Specific Metas -->
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1"
    />

    <!-- Google Font -->
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet"
    />
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/vendors/styles/core.css')}}" />
    <link
        rel="stylesheet"
        type="text/css"
        href="{{asset('admin/vendors/styles/icon-font.min.css')}}"
    />
    <link
        rel="stylesheet"
        type="text/css"
        href="{{asset('admin/src/plugins/jvectormap/jquery-jvectormap-2.0.3.css')}}"
    />
    <style>
        .invalid-feedback {
            display: block !important;
        }
    </style>
    <link rel="stylesheet"
          type="text/css"
          href="{{asset('admin/vendors/tinymce/tinymce.min.js')}}">
    />

    @yield('css')
    <livewire:styles/>

    <link rel="stylesheet" type="text/css" href="{{asset('admin/vendors/styles/style.css')}}" />
    <style>
        .relative svg{
            width: 30px!important;
        }
    </style>

</head>
<body>
{{--<div class="pre-loader">--}}
{{--    <div class="pre-loader-box">--}}
{{--        <div class="loader-logo">--}}
{{--            <img src="{{asset('admin/vendors/images/deskapp-logo.svg')}}" alt="" />--}}
{{--        </div>--}}
{{--        <div class="loader-progress" id="progress_div">--}}
{{--            <div class="bar" id="bar1"></div>--}}
{{--        </div>--}}
{{--        <div class="percent" id="percent1">0%</div>--}}
{{--        <div class="loading-text">Loading...</div>--}}
{{--    </div>--}}
{{--</div>--}}

@include('Admin.includes.header.header')
@include('Admin.includes.feature.slidebar')
@include('Admin.includes.nav.NavBar')




<div class="mobile-menu-overlay"></div>

@yield('content')

<!-- js -->
<script src="{{asset('admin/vendors/scripts/core.js')}}"></script>
<script src="{{asset('admin/vendors/scripts/script.min.js')}}"></script>
<script src="{{asset('admin/vendors/scripts/process.js')}}"></script>
<script src="{{asset('admin/vendors/scripts/layout-settings.js')}}"></script>
<script src="{{asset('admin/src/plugins/jQuery-Knob-master/jquery.knob.min.js')}}"></script>
<script src="{{asset('admin/src/plugins/highcharts-6.0.7/code/highcharts.js')}}"></script>
<script src="{{asset('admin/src/plugins/highcharts-6.0.7/code/highcharts-more.js')}}"></script>
<script src="{{asset('admin/src/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js')}}"></script>
<script src="{{asset('admin/src/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
@yield('js')
<script src="{{asset('js/app.js')}}"></script>
<livewire:scripts/>
<script src="{{asset('admin/vendors/scripts/dashboard2.js')}}"></script>

</body>
</html>
