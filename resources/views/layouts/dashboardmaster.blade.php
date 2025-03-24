
<!DOCTYPE html>
<html lang="en" data-bs-theme="light" data-menu-color="dark" data-topbar-color="light">


<!-- Mirrored from myrathemes.com/drezoc/layouts/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 03 Mar 2025 18:01:40 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8" />
    <title>Dashboard | Saqline Zaman | Portfolio</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Drezoc - Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="MyraStudio" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('dashboard')}}/assets/images/fab-image.webp">

    <link href="{{asset('dashboard')}}/assets/libs/morris.js/morris.css" rel="stylesheet" type="text/css" />

    {{-- tostify --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

    <!-- App css -->
    <link href="{{asset('dashboard')}}/assets/css/style.min.css" rel="stylesheet" type="text/css">
    {{-- font awsome cdn --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{asset('dashboard')}}/assets/css/icons.min.css" rel="stylesheet" type="text/css">
    {{-- font awsome  --}}
    <script src="{{asset('dashboard')}}/assets/js/config.js"></script>
</head>

<body>

    <!-- Begin page -->
    <div class="layout-wrapper">

        <!-- ========== Left Sidebar ========== -->
        <div class="main-menu">
            <!-- Brand Logo -->
            <div class="logo-box">
                <h3 style="color: #ECF4D6">Saqline Zaman</h3>

            </div>

            <!--- Menu -->
            <div data-simplebar>
                <ul class="app-menu">

                    <li class="menu-title">Menu</li>
                    {{-- view website --}}
                    <li class="menu-item">
                        <a class='menu-link waves-effect' href='{{route('home')}}'>
                            <span class="menu-icon"><i class="fa-solid fa-eye"></i></i></span>
                            <span class="menu-text"> View Website </span>
                            <span class="badge bg-info rounded-pill ms-auto">3</span>
                        </a>
                    </li>
                    {{-- dashboard --}}
                    <li class="menu-item">
                        <a class='menu-link waves-effect' href='{{route('deshboard.index')}}'>
                            <span class="menu-icon"><i data-lucide="airplay "></i></span>
                            <span class="menu-text"> Dashboards </span>
                            <span class="badge bg-info rounded-pill ms-auto">3</span>
                        </a>
                    </li>
                    {{-- Management --}}
                    @if (Auth::user()->role =='admin' || Auth::user()->role =='manager' )

                    <li class="menu-item">
                        <a href="#menumanage" data-bs-toggle="collapse" class="menu-link waves-effect waves-light">
                            <span class="menu-icon"><i class="fa-solid fa-people-roof"></i></span>
                            <span class="menu-text"> Management Role & <br> Permission </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="menumanage">
                            <ul class="sub-menu">
                                {{-- regiser --}}
                                <li class="menu-item">
                                    <a class='menu-link' href='{{ route('management.index') }}'>
                                        <span class="menu-text">Assgin roll & register</span>
                                    </a>
                                </li>
                                {{-- role exosting--}}
                                <li class="menu-item">
                                    <a class='menu-link' href='{{ route('management.role.index') }}'>
                                        <span class="menu-text">Assgin exosting user roll</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    @endif
                    {{-- profile --}}
                    <li class="menu-item">
                        <a class='menu-link waves-effect' href='{{route("profile.index")}}'>
                            <span class="menu-icon"><i class="fa-regular fa-id-badge"></i></span>
                            <span class="menu-text"> Profile </span>
                            <span class="badge bg-info rounded-pill ms-auto">3</span>
                        </a>
                    </li>
                    {{-- category --}}
                    <li class="menu-item">
                        <a href="#menucat" data-bs-toggle="collapse" class="menu-link waves-effect waves-light">
                            <span class="menu-icon"><i class="bx bx-file"></i></span>
                            <span class="menu-text"> Category </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="menucat">
                            <ul class="sub-menu">
                                <li class="menu-item">
                                    <a class='menu-link' href='{{ route('category.index') }}'>
                                        <span class="menu-text">Show Categories</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    {{-- blogs --}}
                    <li class="menu-item">
                        <a href="#menublog" data-bs-toggle="collapse" class="menu-link waves-effect waves-light">
                            <span class="menu-icon"><i class="fa-solid fa-book-open"></i></span>
                            <span class="menu-text"> Blog </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="menublog">
                            <ul class="sub-menu">
                                <li class="menu-item">
                                    <a class='menu-link' href='{{ route('blog.index') }}'>
                                        <span class="menu-text">Show blogs</span>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a class='menu-link' href='{{ route('blog.create') }}'>
                                        <span class="menu-text">Create blogs</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    {{-- services --}}
                    <li class="menu-item">
                        <a href="#menuservice" data-bs-toggle="collapse" class="menu-link waves-effect waves-light">
                            <span class="menu-icon"><i class="fa-solid fa-briefcase"></i></span>
                            <span class="menu-text"> Services </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="menuservice">
                            <ul class="sub-menu">
                                <li class="menu-item">
                                    <a class='menu-link' href='{{ route('service.index') }}'>
                                        <span class="menu-text">Show services</span>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a class='menu-link' href='{{ route('service.create') }}'>
                                        <span class="menu-text">Create Services</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>




        <!-- Start Page  -->

        <div class="page-content">

            <!-- ========== Topbar Start ========== -->
            <div class="navbar-custom">
                <div class="topbar">
                    <div class="topbar-menu d-flex align-items-center gap-lg-2 gap-1">

                        <!-- Brand Logo -->
                        <div class="logo-box">
                            <!-- Brand Logo Light -->
                            <a class='logo-light' href='index.html'>
                                <h3 alt="logo" class="logo-lg" height="20">Saqline</h3>
                                <h3 alt="small logo" class="logo-sm" height="20">Saqline</h3>
                            </a>

                            <!-- Brand Logo Dark -->
                            <a class='logo-dark' href='index.html'>
                                <h3 alt="dark logo" class="logo-lg" height="20">Saqline</h3>
                                <h3 alt="small logo" class="logo-sm" height="20">Saqline</h3>
                            </a>
                        </div>

                        <!-- Sidebar Menu Toggle Button -->
                        <button class="button-toggle-menu waves-effect waves-dark rounded-circle">
                            <i class="mdi mdi-menu"></i>
                        </button>
                    </div>

                    <ul class="topbar-menu d-flex align-items-center gap-2">

                        <li class="d-none d-md-inline-block">
                            <a class="nav-link waves-effect waves-dark" href="#" data-bs-toggle="fullscreen">
                                <i class="mdi mdi-fullscreen font-size-24"></i>
                            </a>
                        </li>

                        <li class="dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <i class="mdi mdi-magnify font-size-24"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-animated dropdown-menu-end dropdown-lg p-0">
                                <form class="input-group p-3">
                                    <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary rounded-start-0" type="submit"><i class="mdi mdi-magnify"></i></button>
                                    </div>
                                </form>
                            </div>
                        </li>


                        <li class="dropdown d-none d-md-inline-block">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <img src="{{asset('dashboard')}}/assets/images/flags/us.jpg" alt="user-image" class="me-0 me-sm-1" height="18">
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated">

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">
                                    <img src="{{asset('dashboard')}}/assets/images/flags/germany.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">German</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">
                                    <img src="{{asset('dashboard')}}/assets/images/flags/italy.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">Italian</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">
                                    <img src="{{asset('dashboard')}}/assets/images/flags/spain.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">Spanish</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">
                                    <img src="{{asset('dashboard')}}/assets/images/flags/russia.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">Russian</span>
                                </a>

                            </div>
                        </li>

                        <li class="dropdown notification-list">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <i class="mdi mdi-bell font-size-24"></i>
                                <span class="badge bg-danger rounded-circle noti-icon-badge">9</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated dropdown-lg py-0">
                                <div class="p-2 border-top-0 border-start-0 border-end-0 border-dashed border">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h6 class="m-0 font-size-16 fw-semibold"> Notification</h6>
                                        </div>
                                        <div class="col-auto">
                                            <a href="javascript: void(0);" class="text-dark text-decoration-underline">
                                                <small>Clear All</small>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="px-1" style="max-height: 300px;" data-simplebar>

                                    <h5 class="text-muted font-size-13 fw-normal mt-2">Today</h5>
                                    <!-- item-->

                                    <a href="javascript:void(0);" class="dropdown-item p-0 notify-item card unread-noti shadow-none mb-1">
                                        <div class="card-body">
                                            <span class="float-end noti-close-btn text-muted"><i class="mdi mdi-close"></i></span>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0">
                                                    <div class="notify-icon bg-primary">
                                                        <i class="mdi mdi-comment-account-outline"></i>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1 text-truncate ms-2">
                                                    <h5 class="noti-item-title fw-semibold font-size-14">Datacorp <small class="fw-normal text-muted ms-1">1 min ago</small></h5>
                                                    <small class="noti-item-subtitle text-muted">Caleb Flakelar commented on
                                                        Admin</small>
                                                </div>
                                            </div>
                                        </div>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item p-0 notify-item card read-noti shadow-none mb-1">
                                        <div class="card-body">
                                            <span class="float-end noti-close-btn text-muted"><i class="mdi mdi-close"></i></span>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0">
                                                    <div class="notify-icon bg-info">
                                                        <i class="mdi mdi-account-plus"></i>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1 text-truncate ms-2">
                                                    <h5 class="noti-item-title fw-semibold font-size-14">Admin <small class="fw-normal text-muted ms-1">1 hours ago</small></h5>
                                                    <small class="noti-item-subtitle text-muted">New user registered</small>
                                                </div>
                                            </div>
                                        </div>
                                    </a>

                                    <h5 class="text-muted font-size-13 fw-normal mt-0">Yesterday</h5>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item p-0 notify-item card read-noti shadow-none mb-1">
                                        <div class="card-body">
                                            <span class="float-end noti-close-btn text-muted"><i class="mdi mdi-close"></i></span>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0">
                                                    <div class="notify-icon">
                                                        <img src="{{asset('dashboard')}}/assets/images/users/avatar-2.jpg" class="img-fluid rounded-circle" alt="" />
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1 text-truncate ms-2">
                                                    <h5 class="noti-item-title fw-semibold font-size-14">Cristina Pride <small class="fw-normal text-muted ms-1">1 day ago</small></h5>
                                                    <small class="noti-item-subtitle text-muted">Hi, How are you? What about our
                                                        next meeting</small>
                                                </div>
                                            </div>
                                        </div>
                                    </a>

                                    <h5 class="text-muted font-size-13 fw-normal mt-0">30 Dec 2021</h5>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item p-0 notify-item card read-noti shadow-none mb-1">
                                        <div class="card-body">
                                            <span class="float-end noti-close-btn text-muted"><i class="mdi mdi-close"></i></span>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0">
                                                    <div class="notify-icon bg-primary">
                                                        <i class="mdi mdi-comment-account-outline"></i>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1 text-truncate ms-2">
                                                    <h5 class="noti-item-title fw-semibold font-size-14">Datacorp</h5>
                                                    <small class="noti-item-subtitle text-muted">Caleb Flakelar commented on
                                                        Admin</small>
                                                </div>
                                            </div>
                                        </div>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item p-0 notify-item card read-noti shadow-none mb-1">
                                        <div class="card-body">
                                            <span class="float-end noti-close-btn text-muted"><i class="mdi mdi-close"></i></span>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0">
                                                    <div class="notify-icon">
                                                        <img src="{{asset('dashboard')}}/assets/images/users/avatar-4.jpg" class="img-fluid rounded-circle" alt="" />
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1 text-truncate ms-2">
                                                    <h5 class="noti-item-title fw-semibold font-size-14">Karen Robinson</h5>
                                                    <small class="noti-item-subtitle text-muted">Wow ! this admin looks good and
                                                        awesome design</small>
                                                </div>
                                            </div>
                                        </div>
                                    </a>

                                    <div class="text-center">
                                        <i class="mdi mdi-dots-circle mdi-spin text-muted h3 mt-0"></i>
                                    </div>
                                </div>

                                <!-- All-->
                                <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item border-top border-light py-2">
                                    View All
                                </a>

                            </div>
                        </li>

                        <li class="nav-link waves-effect waves-dark" id="theme-mode">
                            <i class="bx bx-moon font-size-24"></i>
                        </li>

                        <li class="dropdown">
                            <a class="nav-link dropdown-toggle nav-user me-0 waves-effect waves-dark" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
{{----default image-----------------------------------------------  --}}
                    @if (auth()->user()->image == 'default.png')
                                <img src="{{ asset('uploads/default/' . auth()->user()->image) }}" alt="user-image" class="rounded-circle">

                            @else

                                <img src="{{ asset('uploads/profile/' . auth()->user()->image) }}" alt="user-image" class="rounded-circle">

                            @endif
                                <span class="ms-1 d-none d-md-inline-block">
                                    {{Auth::user()->name}} <i class="mdi mdi-chevron-down"></i>
                                </span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-end profile-dropdown ">
                                <!-- item-->
                                <div class="dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Welcome !</h6>
                                </div>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i data-lucide="user" class="font-size-16 me-2"></i>
                                    <span>My Account</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i data-lucide="settings" class="font-size-16 me-2"></i>
                                    <span>Settings</span>
                                </a>

                                <!-- item-->
                                <a class='dropdown-item notify-item' href='pages-lock-screen.html'>
                                    <i data-lucide="lock" class="font-size-16 me-2"></i>
                                    <span>Lock Screen</span>
                                </a>

                                <div class="dropdown-divider"></div>

                                <!-- logout item-->
                                <form action="{{route('logout')}}" method="POST">
                                    @csrf
                                    <button type="submit" class='dropdown-item notify-item' href='pages-login.html'>
                                        <i data-lucide="log-out" class="font-size-16 me-2"></i>
                                        <span class="text-danger">Logout</span>
                                    </button>
                                </form>

                            </div>
                        </li>

                    </ul>
                </div>
            </div>
            <!-- ========== Topbar End ========== -->


            <div class="px-3">

                <!-- Start Content-->
                <div class="container-fluid">


                </div> <!-- container -->

            </div> <!-- content -->


            @yield('content')

             <!-- Footer Start -->
             <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <div><script>document.write(new Date().getFullYear())</script> © Saqline</div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-none d-md-flex gap-4 align-item-center justify-content-md-end">
                                <p class="mb-0">Saqline Zaman<a href="" target="_blank">MyraStudio</a> </p>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- end Footer -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->

    <!-- App js -->
    <script src="{{asset('dashboard')}}/assets/js/vendor.min.js"></script>
    <script src="{{asset('dashboard')}}/assets/js/app.js"></script>

    <!-- Jquery Sparkline Chart  -->
    <script src="{{asset('dashboard')}}/assets/libs/jquery-sparkline/jquery.sparkline.min.js"></script>

    <!-- Jquery-knob Chart Js-->
    <script src="{{asset('dashboard')}}/assets/libs/jquery-knob/jquery.knob.min.js"></script>


    <!-- Morris Chart Js-->
    <script src="{{asset('dashboard')}}/assets/libs/morris.js/morris.min.js"></script>

    <script src="{{asset('dashboard')}}/assets/libs/raphael/raphael.min.js"></script>

    <!-- Dashboard init-->
    <script src="{{asset('dashboard')}}/assets/js/pages/dashboard.js"></script>

    {{-- tostify --}}
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

    {{-- tiny for long text description --}}
    <script src="https://cdn.tiny.cloud/1/b0vka1a0o2pmw8tslxinbmomkz7k45idtfea9zr5j7o05o6l/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>

    @yield('script')

</body>


<!-- Mirrored from myrathemes.com/drezoc/layouts/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 03 Mar 2025 18:01:40 GMT -->
</html>
