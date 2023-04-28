<!DOCTYPE html>
<!--
Template Name: dashgrin - Responsive Bootstrap 4 Admin Dashboard Template
Author: Hencework

License: You must have a valid license purchased only from themeforest to legally use the template for your project.
-->
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Honya-BookStore</title>
    <meta name="description" content="Books of All Genre or Language" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('dashgrin/dashgrin_download_pack/html/favicon.ico')}}">
    <link rel="icon" href="{{ asset('dashgrin/dashgrin_download_pack/html/favicon.ico')}}" type="image/x-icon">

    <!-- Toggles CSS -->
    <link href="{{ asset('dashgrin/dashgrin_download_pack/html/vendors/jquery-toggles/css/toggles.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('dashgrin/dashgrin_download_pack/html/vendors/jquery-toggles/css/themes/toggles-light.css')}}" rel="stylesheet" type="text/css">

    <!-- Custom CSS -->
    <link href="{{ asset('dashgrin/dashgrin_download_pack/html/dist/css/style.css')}}" rel="stylesheet" type="text/css">

    <!-- Data Table CSS -->
    <link href="{{ asset('dashgrin/dashgrin_download_pack/html/vendors/datatables.net-dt/css/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('dashgrin/dashgrin_download_pack/html/vendors/datatables.net-responsive-dt/css/responsive.dataTables.min.css')}}" rel="stylesheet" type="text/css" />

    <!-- select2 CSS -->
    <link href="{{ asset('dashgrin/dashgrin_download_pack/html/vendors/select2/dist/css/select2.min.css')}}" rel="stylesheet" type="text/css" />

    <!-- Pickr CSS -->
    <link href="{{ asset('dashgrin/dashgrin_download_pack/html/vendors/pickr-widget/dist/pickr.min.css')}}" rel="stylesheet" type="text/css" />
</head>

<body>
	<!-- HK Wrapper -->
	<div class="hk-wrapper hk-vertical-nav">
        @include('sweetalert::alert')

        {{-- @if () --}}
        <!-- Top Navbar -->
        <nav class="navbar navbar-expand-xl navbar-dark fixed-top hk-navbar">
            <a class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" href="javascript:void(0);"><span class="feather-icon"><i data-feather="more-vertical"></i></span></a>
			<a id="navbar_toggle_btn" class="navbar-toggle-btn nav-link-hover" href="javascript:void(0);"><span class="feather-icon"><i data-feather="menu"></i></span></a>
            <a class="navbar-brand" href="{{route('home')}}">
                <h5>Honya-Bookstore</h5>
            </a>
			<ul class="navbar-nav hk-navbar-content order-xl-2">
                    <li class="nav-item">
                        <a id="settings_toggle_btn" class="nav-link nav-link-hover" href="javascript:void(0);"><span class="feather-icon"><i data-feather="search"></i></span></a>
                    </li>
                    @if (auth()->user())
                        <li class="nav-item">
                            <a class="nav-link nav-link-hover" href="{{route('orders.detail')}}"> <i class="material-icons pt-2">shopping_cart</i></a>
                        </li>
                    @endif
                <li class="nav-item dropdown dropdown-authentication">
                    <a class="nav-link dropdown-toggle no-caret" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="media">
                            @if (auth()->user())
                                <div class="media-img-wrap">
                                    <span class="badge badge-success badge-indicator"></span>
                                </div>
                                <div class="media-body">
                                    <span>{{auth()->user()->name}}<i class="zmdi zmdi-chevron-down"></i></span>
                                </div>
                            @else
                            <div class="media-body">
                                <span>Login Or Register<i class="zmdi zmdi-chevron-down"></i></span>
                            </div>
                            @endif
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" data-dropdown-in="flipInX" data-dropdown-out="flipOutX">
                        <form action="{{route('signout')}}" method="get">
                            @csrf
                        @if (auth()->user())
                            {{-- <a class="dropdown-item" href="profile.html"><i class="dropdown-icon zmdi zmdi-account"></i><span>Profile</span></a> --}}
                            <button type="submit" class="dropdown-item"><i class="dropdown-icon zmdi zmdi-power"></i><span>Log out</span></button>
                        @else
                            <a class="dropdown-item" href="{{route('login')}}"><i class="dropdown-icon zmdi zmdi-account"></i><span>Login</span></a>
                            <a class="dropdown-item" href="{{route('register-user')}}"><i class="dropdown-icon zmdi zmdi-account"></i><span>Register</span></a>
                        @endif
                        </form>
                    </div>
                </li>
            </ul>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav ml-0">
					<li class="nav-item">
						<a href="{{ route('home') }}" class="nav-link active">Dashboard</a>
					</li>
					<li class="nav-item">
						<a href="{{route('contact-us.create')}}" class="nav-link">Contact Us</a>
					</li>
				</ul>
            </div>

		</nav>
        <!-- /Top Navbar -->
        @if(auth()->user() != null )

        <!-- Vertical Nav -->
        @include('leftnav')
        @endif

        <!-- Setting Panel -->
        <div class="hk-settings-panel">
            <div class="nicescroll-bar position-relative">
                <div class="settings-panel-wrap">
                    <form action="{{route('search')}}" method="GET">
                        <h6 class="mb-5">Search</h6>
                        <p class="font-14">Name</p>
                        <div class="button-list hk-nav-select mb-10">
                            <input type="text" class="form-control" name="name"><span class="icon-label"> </span>
                        </div>
                        <hr>
                        <p class="font-14">Category</p>
                        <div class="button-list hk-nav-select mb-10">
                            <select name="category_id" class="form-control">
                                <option value="">Choose..</option>
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <hr>
                        <p class="font-14">Year</p>
                        <div class="button-list hk-nav-select mb-10">
                            <select name="year" class="form-control">
                                <option value="">Choose..</option>
                                @foreach ($books as $book)
                                    <option value="{{$book->year}}">{{$book->year}}</option>
                                @endforeach
                            </select>
                        </div>
                        <hr>
                        <p class="font-14">Author</p>
                        <div class="button-list hk-nav-select mb-10">
                            <select name="author_id" class="form-control">
                                <option value="">Choose..</option>
                                @foreach ($authors as $author)
                                    <option value="{{$author->id}}">{{$author->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <hr>
                        <button type="submit" class="btn btn-success btn-block btn-reset mt-30">Search</button>
                    </form>
                </div>
            </div>
            <img class="d-none" src="dist/img/logo-light.png" alt="Honya-Bookstore" />
            <img class="d-none" src="dist/img/logo-dark.png" alt="Honya-Bookstore" />
        </div>
        <!-- /Setting Panel -->

        <!-- Main Content -->
        <div class="hk-pg-wrapper">
			<!-- Container -->
            @yield('content')
            <!-- /Container -->

            <!-- Footer -->
            <div class="hk-footer-wrap container-fluid px-xxl-65 px-xl-20">
                <footer class="footer">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <p>Pampered by<a href="https://hencework.com/" class="text-dark" target="_blank">Hencework</a> © 2019</p>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <p class="d-inline-block">Follow us</p>
                            <a href="#" class="d-inline-block btn btn-icon btn-icon-only btn-indigo btn-icon-style-4"><span class="btn-icon-wrap"><i class="fa fa-facebook"></i></span></a>
                            <a href="#" class="d-inline-block btn btn-icon btn-icon-only btn-indigo btn-icon-style-4"><span class="btn-icon-wrap"><i class="fa fa-twitter"></i></span></a>
                            <a href="#" class="d-inline-block btn btn-icon btn-icon-only btn-indigo btn-icon-style-4"><span class="btn-icon-wrap"><i class="fa fa-google-plus"></i></span></a>
                        </div>
                    </div>
                </footer>
            </div>
            <!-- /Footer -->
        </div>
        <!-- /Main Content -->

    </div>
    <!-- /HK Wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('dashgrin/dashgrin_download_pack/html/vendors/jquery/dist/jquery.min.js')}}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('dashgrin/dashgrin_download_pack/html/vendors/popper.js/dist/umd/popper.min.js')}}"></script>
    <script src="{{ asset('dashgrin/dashgrin_download_pack/html/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>

    <!-- Slimscroll JavaScript -->
    <script src="{{ asset('dashgrin/dashgrin_download_pack/html/dist/js/jquery.slimscroll.js')}}"></script>

    <!-- Jasny-bootstrap  JavaScript -->
    <script src="{{ asset('dashgrin/dashgrin_download_pack/html/vendors/jasny-bootstrap/dist/js/jasny-bootstrap.min.js')}}"></script>

    <!-- Fancy Dropdown JS -->
    <script src="{{ asset('dashgrin/dashgrin_download_pack/html/dist/js/dropdown-bootstrap-extended.js')}}"></script>

    <!-- FeatherIcons JavaScript -->
    <script src="{{ asset('dashgrin/dashgrin_download_pack/html/dist/js/feather.min.js')}}"></script>

    <!-- Toggles JavaScript -->
    <script src="{{ asset('dashgrin/dashgrin_download_pack/html/vendors/jquery-toggles/toggles.min.js')}}"></script>
    <script src="{{ asset('dashgrin/dashgrin_download_pack/html/dist/js/toggle-data.js')}}"></script>

	<!-- Sparkline JavaScript -->
    {{-- <script src="{{ asset('dashgrin/dashgrin_download_pack/html/vendors/jquery.sparkline/dist/jquery.sparkline.min.js')}}"></script> --}}

	<!-- Owl JavaScript -->
    <script src="{{ asset('dashgrin/dashgrin_download_pack/html/vendors/owl.carousel/dist/owl.carousel.min.js')}}"></script>

    <!-- Init JavaScript -->
    <script src="{{ asset('dashgrin/dashgrin_download_pack/html/dist/js/init.js')}}"></script>
	<script src="{{ asset('dashgrin/dashgrin_download_pack/html/dist/js/dashboard-data.js')}}"></script>

    <!-- Data Table JavaScript -->
    <script src="{{ asset('dashgrin/dashgrin_download_pack/html/vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('dashgrin/dashgrin_download_pack/html/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('dashgrin/dashgrin_download_pack/html/vendors/datatables.net-dt/js/dataTables.dataTables.min.js')}}"></script>
    <script src="{{ asset('dashgrin/dashgrin_download_pack/html/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{ asset('dashgrin/dashgrin_download_pack/html/vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('dashgrin/dashgrin_download_pack/html/vendors/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
    <script src="{{ asset('dashgrin/dashgrin_download_pack/html/vendors/jszip/dist/jszip.min.js')}}"></script>
    <script src="{{ asset('dashgrin/dashgrin_download_pack/html/vendors/pdfmake/build/pdfmake.min.js')}}"></script>
    <script src="{{ asset('dashgrin/dashgrin_download_pack/html/vendors/pdfmake/build/vfs_fonts.js')}}"></script>
    <script src="{{ asset('dashgrin/dashgrin_download_pack/html/vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{ asset('dashgrin/dashgrin_download_pack/html/vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{ asset('dashgrin/dashgrin_download_pack/html/vendors/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{ asset('dashgrin/dashgrin_download_pack/html/dist/js/dataTables-data.js')}}"></script>

    <!-- Select2 JavaScript -->
    <script src="{{ asset('dashgrin/dashgrin_download_pack/html/vendors/select2/dist/js/select2.full.min.js')}}"></script>
    <script src="{{ asset('dashgrin/dashgrin_download_pack/html/dist/js/select2-data.js')}}"></script>

    <!-- Pickr JavaScript -->
    <script src="{{ asset('dashgrin/dashgrin_download_pack/html/vendors/pickr-widget/dist/pickr.min.js')}}"></script>
    <script src="{{ asset('dashgrin/dashgrin_download_pack/html/dist/js/pickr-data.js')}}"></script>

    @yield('script')

</body>

</html>
