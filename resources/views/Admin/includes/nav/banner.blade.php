<div class="ms-aside-overlay ms-overlay-left ms-toggler" data-target="#ms-side-nav" data-toggle="slideLeft"></div>
<div class="ms-aside-overlay ms-overlay-right ms-toggler" data-target="#ms-recent-activity" data-toggle="slideRight"></div>

<!-- Sidebar Navigation Left -->
<aside id="ms-side-nav" class="side-nav fixed ms-aside-scrollable ms-aside-left">

    <!-- Logo -->
    <div class="logo-sn ms-d-block-lg">
        <a class="pl-0 ml-0 text-center" href="{{route('admin.home')}}"> <img src="{{asset('admin/logo-black.png')}}" alt="logo"> </a>
    </div>

    <!-- Navigation -->
@include('Admin.includes.nav.NavBar')

</aside>
