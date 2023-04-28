@if ( auth()->user()->role_id == 2 || auth()->user()->role_id == 1 )


<nav class="hk-nav hk-nav-light">
    <a href="javascript:void(0);" id="hk_nav_close" class="hk-nav-close"><span class="feather-icon"><i data-feather="x"></i></span></a>
    <div class="nicescroll-bar">
        <div class="navbar-nav-wrap">
            <div class="nav-header">
                <span>User Interface</span>
            </div>
            <ul class="navbar-nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0);" data-toggle="collapse" data-target="#books_drp">
                        <i class="ion ion-md-outlet"></i>
                        <span class="nav-link-text">Books</span>
                    </a>
                    <ul id="books_drp" class="nav flex-column collapse collapse-level-1">
                        <li class="nav-item">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('contract-types.index')}}">Contract Types</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('contracts.index')}}">Contracts</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('authors.index')}}">Author</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('categories.index')}}">Categories</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('books.index')}}">Books</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0);" data-toggle="collapse" data-target="#customer_drp">
                        <i class="ion ion-md-outlet"></i>
                        <span class="nav-link-text">Customers</span>
                    </a>
                    <ul id="customer_drp" class="nav flex-column collapse collapse-level-1">
                        <li class="nav-item">
                            <ul class="nav flex-column">
                                {{-- <li class="nav-item">
                                    <a class="nav-link" href="{{route('customer-types.index')}}">Customer Types</a>
                                </li> --}}
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('contact-us.index')}}">Feedback</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('orders.index')}}">Orders</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0);" data-toggle="collapse" data-target="#employee_drp">
                        <i class="ion ion-md-outlet"></i>
                        <span class="nav-link-text">Employees</span>
                    </a>
                    <ul id="employee_drp" class="nav flex-column collapse collapse-level-1">
                        <li class="nav-item">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('roles.index')}}">Roles</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('users.index')}}">Users</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div id="hk_nav_backdrop" class="hk-nav-backdrop"></div>
@endif
