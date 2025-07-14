<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="POS - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>GOFTECH_COMPANY</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/img/logo.png') }}" type="image/x-icon">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/bootstrap.min.css') }}">

    <!-- Bootstrap DateTimePicker CSS -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/bootstrap-datetimepicker.min.css') }}">

    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/animate.css') }}">

    <!-- Select2 CSS -->
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/select2/css/select2.min.css') }}">

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/dataTables.bootstrap4.min.css') }}">

    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/fontawesome/css/all.min.css') }}">

    <!-- Custom Style -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/style.css') }}">

</head>



<body>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


    <div id="global-loader">
        <div class="whirly-loader"> </div>
    </div>

    <div class="main-wrapper">

        <div class="header">

            <div class="header-left active">
                <a href="{{ route('client-dash.dashboard') }}" class="logo">
                    <img src="{{ asset('assets/img/gof_logo.png') }}" alt="">
                </a>
                <a href="{{ route('client-dash.dashboard') }}" class="logo-small">
                    <img src="{{ asset('assets/admin/img/logo-small.png') }}" alt="">
                </a>
                <a id="toggle_btn" href="javascript:void(0);">
                </a>
            </div>

            <a id="mobile_btn" class="mobile_btn" href="#sidebar">
                <span class="bar-icon">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
            </a>

            <ul class="nav user-menu">

                <li class="nav-item">
                    <div class="top-nav-search">
                        <a href="javascript:void(0);" class="responsive-search">
                            <i class="fa fa-search"></i>
                        </a>
                        <form action="#">
                            <div class="searchinputs">
                                <input type="text" placeholder="Search Here ...">
                                <div class="search-addon">
                                    <span><img src="{{ asset('assets/admin/img/icons/closes.svg') }}"
                                            alt="img"></span>
                                </div>
                            </div>
                            <a class="btn" id="searchdiv"><img
                                    src="{{ asset('assets/admin/img/icons/search.svg') }}" alt="img"></a>
                        </form>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                        <img src="{{ asset('assets/admin/img/icons/notification-bing.svg') }}" alt="img"> <span
                            class="badge rounded-pill">4</span>
                    </a>
                    <div class="dropdown-menu notifications">
                        <div class="topnav-dropdown-header">
                            <span class="notification-title">Notifications</span>
                            <a href="javascript:void(0)" class="clear-noti"> Clear All </a>
                        </div>
                        <div class="noti-content">
                            <ul class="notification-list">
                                <li class="notification-message">
                                    <a href="activities.html">
                                        <div class="media d-flex">
                                            <span class="avatar flex-shrink-0">
                                                <img alt=""
                                                    src="{{ asset('assets/admin/img/profiles/avatar-02.jpg') }}">
                                            </span>
                                            <div class="media-body flex-grow-1">
                                                <p class="noti-details"><span class="noti-title">John Doe</span> added
                                                    new task <span class="noti-title">Patient appointment
                                                        booking</span></p>
                                                <p class="noti-time"><span class="notification-time">4 mins ago</span>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="topnav-dropdown-footer">
                            <a href="activities.html">View all Notifications</a>
                        </div>
                    </div>
                </li>

                <li class="nav-item dropdown has-arrow main-drop">
                    <a href="javascript:void(0);" class="dropdown-toggle nav-link userset" data-bs-toggle="dropdown">
                        <span class="user-img"><img src="{{ asset('assets/admin/img/profiles/avator1.jpg') }}"
                                alt="">
                            <span class="status online"></span></span>
                    </a>
                    <div class="dropdown-menu menu-drop-user">
                        <div class="profilename">
                            <div class="profileset">
                                <span class="user-img"><img
                                        src="{{ asset('assets/admin/img/profiles/avator1.jpg') }}" alt="">
                                    <span class="status online"></span></span>
                                <div class="profilesets">
                                    <h6>{{ Auth::user()->name }}</h6>

                                    <h5>Client</h5>
                                </div>
                            </div>
                            <hr class="m-0">
                            {{-- <a class="dropdown-item" href="profile.html"> <i class="me-2" data-feather="user"></i>
                                My Profile</a>
                            <a class="dropdown-item" href="generalsettings.html"><i class="me-2"
                                    data-feather="settings"></i>Settings</a> --}}
                            <hr class="m-0">
                            <a class="dropdown-item logout pb-0" href="{{ route('clientlogout') }}"><img
                                    src="{{ asset('assets/admin/img/icons/log-out.svg') }}" class="me-2"
                                    alt="img">Logout</a>
                        </div>
                    </div>
                </li>
            </ul>

            <div class="dropdown mobile-user-menu">
                <a href="javascript:void(0);" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"
                    aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="profile.html">My Profile</a>
                    <a class="dropdown-item" href="generalsettings.html">Settings</a>
                    <a class="dropdown-item" href="{{ route('clientlogout') }}">Logout</a>
                </div>
            </div>

        </div>
        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li class="active">
                            <a href="{{ route('client-dash.dashboard') }}"><img
                                    src="{{ asset('assets/admin/img/icons/dashboard.svg') }}" alt="img"><span>
                                    Dashboard</span> </a>
                        </li>
                        <li class="">
                            <a href="{{ route('client-dash.message.view-message', Auth::user()->id) }}">
                                <img src="{{ asset('assets/admin/img/icons/dashboard.svg') }}" alt="img">
                                <span>Messages</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="{{ route('client-dash.project.all-project') }}"><img
                                    src="{{ asset('assets/admin/img/icons/dashboard.svg') }}" alt="img"><span>
                                    Projects</span> </a>
                        </li>

                        <li class="">
                            <a href="{{ route('client-dash.milestone.all-milestone') }}"><img
                                    src="{{ asset('assets/admin/img/icons/dashboard.svg') }}" alt="img"><span>
                                    Milestones</span> </a>
                        </li>

                        <li class="">
                            <a href="{{ route('client-dash.invoice.all-invoice') }}"><img
                                    src="{{ asset('assets/admin/img/icons/dashboard.svg') }}" alt="img"><span>
                                    Invoices</span> </a>
                        </li>
                        <li class="">
                            <a href="{{ route('client-dash.quotation.all-quotation') }}"><img
                                    src="{{ asset('assets/admin/img/icons/dashboard.svg') }}" alt="img"><span>
                                        Quotation</span> </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        @yield('content')

        <!-- jQuery -->
        <script src="{{ asset('assets/admin/js/jquery-3.6.0.min.js') }}"></script>

        <!-- Feather Icons -->
        <script src="{{ asset('assets/admin/js/feather.min.js') }}"></script>

        <!-- jQuery Slimscroll -->
        <script src="{{ asset('assets/admin/js/jquery.slimscroll.min.js') }}"></script>

        <!-- DataTables -->
        <script src="{{ asset('assets/admin/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('assets/admin/js/dataTables.bootstrap4.min.js') }}"></script>

        <!-- Bootstrap Bundle -->
        <script src="{{ asset('assets/admin/js/bootstrap.bundle.min.js') }}"></script>

        <!-- Moment JS -->
        <script src="{{ asset('assets/admin/js/moment.min.js') }}"></script>

        <!-- Bootstrap DateTimePicker -->
        <script src="{{ asset('assets/admin/js/bootstrap-datetimepicker.min.js') }}"></script>

        <!-- Select2 -->
        <script src="{{ asset('assets/admin/plugins/select2/js/select2.min.js') }}"></script>

        <!-- SweetAlert -->
        <script src="{{ asset('assets/admin/plugins/sweetalert/sweetalert2.all.min.js') }}"></script>
        <script src="{{ asset('assets/admin/plugins/sweetalert/sweetalerts.min.js') }}"></script>

        <!-- ApexCharts -->
        <script src="{{ asset('assets/admin/plugins/apexchart/apexcharts.min.js') }}"></script>
        <script src="{{ asset('assets/admin/plugins/apexchart/chart-data.js') }}"></script>

        <!-- Custom Script -->
        <script src="{{ asset('assets/admin/js/script.js') }}"></script>




</body>

</html>
