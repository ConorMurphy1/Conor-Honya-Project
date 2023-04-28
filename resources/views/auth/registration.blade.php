{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
        <!-- Image -->
        <div>
            <x-input-label for="image" :value="__('Image')" />
            <x-text-input id="image" class="block mt-1 w-full" type="file" name="image" :value="old('image')" required autofocus autocomplete="image" />
            <x-input-error :messages="$errors->get('image')" class="mt-2" />
        </div>
        <!-- Phone -->
        <div>
            <x-input-label for="phone" :value="__('Phone')" />
            <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required autofocus autocomplete="phone" />
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>
        <!-- Address -->
        <div>
            <x-input-label for="address" :value="__('Address')" />
            <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required autofocus autocomplete="address" />
            <x-input-error :messages="$errors->get('address')" class="mt-2" />
        </div>
        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ asset('dashgrin/dashgrin_download_pack/html/{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}


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
    <title>dashgrin I Signup</title>
    <meta name="description" content="A responsive bootstrap 4 admin dashboard template by hencework" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('dashgrin/dashgrin_download_pack/html/favicon.ico')}}">
    <link rel="icon" href="{{ asset('dashgrin/dashgrin_download_pack/html/favicon.ico')}}" type="image/x-icon">

    <!-- Custom CSS -->
    <link href="{{ asset('dashgrin/dashgrin_download_pack/html/dist/css/style.css')}}" rel="stylesheet" type="text/css">
</head>

<body>
    <!-- HK Wrapper -->
	<div class="hk-wrapper">

        <!-- Main Content -->
        <div class="hk-pg-wrapper hk-auth-wrapper">
            <header class="d-flex justify-content-end align-items-center">
              
            </header>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12 pa-0">
                        <div class="auth-form-wrap pt-xl-0 pt-70">
                            <div class="auth-form w-xl-35 w-lg-65 w-sm-85 w-100 card pa-25 shadow-lg">
                                <form method="POST" action="{{ route('register.custom') }}" enctype="multipart/form-data">
                                @csrf
                                    <h1 class="display-4 mb-10 text-center">Sign up for free</h1>
                                    <p class="mb-30 text-center">Create your account</p>
                                    <div class="form-row">
                                        
                                        <div class="col-md form-group">
                                            <input class="form-control" placeholder="Name" name="name" type="text" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Image" type="file" name="image" required>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Email" name="email" required>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Phone" type="text" name="phone" required>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Address" type="text" name="address" required>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Password" type="password" name="password" required>
                                    </div>
                                    <input type="text" value="3" hidden name="role_id">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input class="form-control" placeholder="Confirm Password" type="password">
                                            <div class="input-group-append">
                                                <span class="input-group-text"><span class="feather-icon"><i data-feather="eye-off"></i></span></span>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary btn-block" type="submit">Register</button>
                                    <p class="text-center">Already have an account? <a href="{{route('login')}}">Sign In</a></p>
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

    <!-- Toggles JavaScript -->
    <script src="{{ asset('dashgrin/dashgrin_download_pack/html/vendors/jquery-toggles/toggles.min.js')}}"></script>
    <script src="{{ asset('dashgrin/dashgrin_download_pack/html/dist/js/toggle-data.js')}}"></script>

    <!-- Init JavaScript -->
    <script src="{{ asset('dashgrin/dashgrin_download_pack/html/dist/js/init.js')}}"></script>
</body>

</html>