
<ul class="accordion ms-main-aside fs-14" id="side-nav-accordion">
    <!-- Dashboard -->
    <li class="menu-item">
        <a href="{{route('admin.home')}}" class="has-chevron" >
            <span><i class="material-icons fs-16">dashboard</i>Dashboard </span>
        </a>
    </li>
    <!-- /Dashboard -->
    <!-- product -->

    <li class="menu-item">
        <a href="#" class="has-chevron" data-toggle="collapse" data-target="#product" aria-expanded="false" aria-controls="admin/products">
            <span><i class="fa fa-archive fs-16"></i>Products </span>
        </a>
        <ul id="product" class="collapse" aria-labelledby="product" data-parent="#side-nav-accordion">
            <li> <a href="{{route('admin.product.create')}}">Add Product</a> </li>
            <li> <a href="{{route('admin.product.index')}}">Product List</a> </li>
            <li> <a href="{{route('admin.product.draft')}}">Product draft</a> </li>


        </ul>
    </li>
    <!-- product end -->

    <!-- orders -->
    <li class="menu-item">
        <a href="{{route('admin.callUp.index')}}">
            <span><i class="fas fa-clipboard-list fs-16"></i>Orders</span>
        </a>
    </li>
    <!-- orders end -->
    <!-- restaurants -->
    <li class="menu-item">
        <a href="{{route('admin.category.index')}}">
            <span><i class="fa fa-tasks fs-16"></i>Category List</span>
        </a>
    </li> <li class="menu-item">
        <a href="{{route('admin.reviews.index')}}">
            <span><i class="material-icons fs-16">message</i>Reviews List</span>

        </a>
    </li>
    <li class="menu-item">
        <a href="{{route('admin.slider-images.index')}}">
            <span><i class="material-icons fs-16">input</i>Slider List</span>

        </a>
    </li>
    <!-- restaurants end -->



</ul>
<form method="post" action="{{ route('admin.logout') }}" id="logout">
    @csrf

</form>
