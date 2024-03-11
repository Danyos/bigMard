<div class="left-side-bar">
    <div class="brand-logo">
        <a href="{{route('admin.home')}}">
           BigMard
        </a>
        <div class="close-sidebar" data-toggle="left-sidebar-close">
            <i class="ion-close-round"></i>
        </div>
    </div>
    <div class="menu-block customscroll">
        <div class="sidebar-menu">
            <ul id="accordion-menu">
                <li>
                    <a href="{{route('admin.home')}}" class="dropdown-toggle no-arrow">
                        <span class="micon bi bi-house"></span>
                        <span class="mtext">Home</span>
                    </a>
                </li>

                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">

                        <span class="micon bi bi-table"></span
                        ><span class="mtext">Product</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{route('admin.product.index')}}">View All</a></li>
                        <li>
                            <a href="{{route('admin.product.create')}}">Add product</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="{{route('admin.category.index')}}" class="dropdown-toggle no-arrow">
							<span class="micon bi bi-textarea-resize"></span
                            ><span class="mtext">Category</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.reviews.index')}}" class="dropdown-toggle no-arrow">
                        <span class="micon bi bi-chat-right-dots"></span
                        ><span class="mtext">Review</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.callUp.index')}}" class="dropdown-toggle no-arrow">
							<span class="micon bi bi-receipt-cutoff"></span
                            ><span class="mtext">Call Up</span>
                    </a>
                </li>
                <li hidden>

                        <form method="post" action="{{ route('admin.logout') }}" id="logout">
                            @csrf

                        </form>

                </li>

            </ul>
        </div>
    </div>
</div>
