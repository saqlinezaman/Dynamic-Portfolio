{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}


<!DOCTYPE html>
<html lang="en" data-bs-theme="light" data-menu-color="dark" data-topbar-color="light">


<!-- Mirrored from myrathemes.com/drezoc/layouts/pages-register by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 03 Mar 2025 18:01:44 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8" />
    <title>Register & Signup | Saqline Zaman | Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Drezoc - Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="MyraStudio" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/fab-image.webp">

    <!-- App css -->
    <link href="assets/css/style.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css">
    <script src="assets/js/config.js"></script>
</head>

<body>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex align-items-center min-vh-100">
                        <div class="w-100 d-block card shadow-lg rounded my-5 overflow-hidden">
                            <div class="row">
                                <div class="col-lg-5 d-none d-lg-block bg-register rounded-left"></div>
                                <div class="col-lg-7">
                                    <div class="p-5">
                                        <div class="text-center w-75 mx-auto mb-4">
                                            <h1 class="mb-7" style="color: #ECF4D6">Hey I ' M Saqline Zaman</h1>
                                        </div>


                                        <h1 class="h5 mb-1">Create an Account!</h1>

                                        <p class="text-muted mb-4">Don't have an account? Create your own account, it
                                            takes less than a minute</p>
                                    {{-- form started --}}
                                        <form action="{{route('register')}}" method="POST">
                                            @csrf

                                            <div class="form-group mb-3">
                                                <label class="form-label" for="name">Name</label>
                                                <input class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name')}}" type="text" id="name"
                                                    placeholder="Enter your Name" name="name">

                                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                            </div>

                                            <div class="form-group mb-3">
                                                <label class="form-label" for="emailaddress">Email address</label>
                                                <input class="form-control @error('email') is-invalid @enderror"  value="{{ old('email') }}" type="text" id="emailaddress"
                                                    placeholder="Enter your email" name="email">
                                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                            </div>

                                            {{-- password --}}
                                            <div class="form-group mb-3">
                                                <a class='text-muted float-end' href='pages-recoverpw.html'><small></small></a>
                                                <label class="form-label" for="password">Password</label>
                                                <input class="form-control @error('password') is-invalid @enderror" value="{{ old('email') }}"  name="password" type="password" id="password"
                                                    placeholder="Enter your password">
                                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                            </div>
                                            {{-- confirm password --}}
                                            <div class="form-group mb-3">
                                                <a class='text-muted float-end' href='pages-recoverpw.html'><small></small></a>
                                                <label class="form-label" for="password">Password</label>
                                                <input class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}"  name="password_confirmation" type="password" id="password"
                                                    placeholder="Enter your password">
                                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                            </div>
                                    {{-- terms and condition --}}
                                            <div class="form-group mb-3">
                                                <div class="">
                                                    <input class="form-check-input" type="checkbox" id="checkbox-signin"
                                                        checked>
                                                    <label class="form-check-label ms-2" for="checkbox-signin">I accept
                                                        <a href="#">Terms and Conditions</a></label>
                                                </div>
                                            </div>

                                            <div class="form-group mb-0 text-center">
                                                <button style="background-color: #2D9596" class="w-100 py-2 border-0" type="submit"> Sign Up </button>
                                            </div>
                                        </form>


                                        <div class="text-center mt-4">
                                            <h5 class="text-muted font-size-16">Sign in using</h5>

                                            <ul class="list-inline mt-3 mb-0">
                                                <li class="list-inline-item">
                                                    <a href="javascript: void(0);"
                                                        class="social-list-item border border-primary text-primary"><i
                                                            class="mdi mdi-facebook"></i></a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="javascript: void(0);"
                                                        class="social-list-item border border-danger text-danger"><i
                                                            class="mdi mdi-google"></i></a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="javascript: void(0);"
                                                        class="social-list-item border border-info text-info"><i
                                                            class="mdi mdi-twitter"></i></a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="javascript: void(0);"
                                                        class="social-list-item border border-secondary text-secondary"><i
                                                            class="mdi mdi-github"></i></a>
                                                </li>
                                            </ul>
                                        </div>


                                        <div class="row mt-4">
                                            <div class="col-12 text-center">
                                                <p class="text-muted mb-0">Already have account? <a class='text-muted font-weight-medium ms-1' href='{{route('login')}}'><b>Sign In</b></a></p>
                                            </div> <!-- end col -->
                                        </div>
                                        <!-- end row -->
                                    </div> <!-- end .padding-5 -->
                                </div> <!-- end col -->
                            </div> <!-- end row -->
                        </div> <!-- end .w-100 -->
                    </div> <!-- end .d-flex -->
                </div> <!-- end col-->
            </div> <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->

    <!-- App js -->
    <script src="assets/js/vendor.min.js"></script>
    <script src="assets/js/app.js"></script>

</body>


<!-- Mirrored from myrathemes.com/drezoc/layouts/pages-register by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 03 Mar 2025 18:01:44 GMT -->
</html>
