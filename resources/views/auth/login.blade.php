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
		<title>dashgrin I Login</title>
		<meta name="description" content="A responsive bootstrap 4 admin dashboard template by hencework" />
		
		<!-- Favicon -->
		<link rel="shortcut icon" href="{{ asset('dashgrin/dashgrin_download_pack/html/favicon.ico')}}">
		<link rel="icon" href="{{ asset('dashgrin/dashgrin_download_pack/html/favicon.ico')}}" type="image/x-icon">
		
		<!-- Toggles CSS -->
		<link href="{{ asset('dashgrin/dashgrin_download_pack/html/vendors/jquery-toggles/css/toggles.css')}}" rel="stylesheet" type="text/css">
		<link href="{{ asset('dashgrin/dashgrin_download_pack/html/vendors/jquery-toggles/css/themes/toggles-light.css')}}" rel="stylesheet" type="text/css">
		
		<!-- Custom CSS -->
		<link href="{{ asset('dashgrin/dashgrin_download_pack/html/dist/css/style.css')}}" rel="stylesheet" type="text/css">
	</head>
	<body>
		<!-- HK Wrapper -->
		<div class="hk-wrapper">
			
			<!-- Main Content -->
			<div class="hk-pg-wrapper hk-auth-wrapper">
				
				<div class="container-fluid">
					<div class="row">
						<div class="col-xl-12 pa-0">
							<div class="auth-form-wrap pt-xl-0 pt-70">
								<div class="auth-form w-xl-35 w-lg-65 w-sm-85 w-100 card pa-25 shadow-lg">
									<a class="auth-brand text-center d-block mb-20" href="#">
										<img class="brand-img" src="{{ asset('dashgrin/dashgrin_download_pack/html/dist/img/logo-light.png')}}" alt="brand"/>
									</a>
									<form action="{{route('login.custom')}}" method="POST">
                                        @csrf
										<h1 class="display-4 text-center mb-10">Welcome Back :)</h1>
										<p class="text-center mb-30">Sign in to your account and enjoy unlimited perks.</p> 
										<div class="form-group">
											<input class="form-control" placeholder="Email"  type="email" name="email">
										</div>
										<div class="form-group">
											<div class="input-group">
												<input class="form-control" placeholder="Password" type="password" name="password">
												<div class="input-group-append">
													<span class="input-group-text"><span class="feather-icon"><i data-feather="eye-off"></i></span></span>
												</div>
											</div>
										</div>
										<div class="custom-control custom-checkbox mb-25">
											<input class="custom-control-input" id="same-address" type="checkbox" checked>
											<label class="custom-control-label font-14" for="same-address">Keep me logged in</label>
										</div>
										<button class="btn btn-success btn-block" >Login</button>
										<p class="text-center">Do have an account yet? <a href="{{ route('register-user')}}">Sign Up</a></p>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /Main Content -->
		
		</div>
		<!-- /HK Wrapper -->
		
		<!-- JavaScript -->
		
		<!-- jQuery -->
		<script src="{{ asset('dashgrin/dashgrin_download_pack/html/vendors/jquery/dist/jquery.min.js')}}"></script>
		
		<!-- Bootstrap Core JavaScript -->
		<script src="{{ asset('dashgrin/dashgrin_download_pack/html/vendors/popper.js/dist/umd/popper.min.js')}}"></script>
		<script src="{{ asset('dashgrin/dashgrin_download_pack/html/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
		
		<!-- Slimscroll JavaScript -->
		<script src="{{ asset('dashgrin/dashgrin_download_pack/html/dist/js/jquery.slimscroll.js')}}"></script>
	
		<!-- Fancy Dropdown JS -->
		<script src="{{ asset('dashgrin/dashgrin_download_pack/html/dist/js/dropdown-bootstrap-extended.js')}}"></script>
		
		<!-- FeatherIcons JavaScript -->
		<script src="{{ asset('dashgrin/dashgrin_download_pack/html/dist/js/feather.min.js')}}"></script>
		
		<!-- Init JavaScript -->
		<script src="{{ asset('dashgrin/dashgrin_download_pack/html/dist/js/init.js')}}"></script>
	</body>
</html>