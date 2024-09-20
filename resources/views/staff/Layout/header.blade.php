<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="{{asset('') }}assets/images/KSG Logo (1).png" type="image/png" />
	<!--plugins-->
	<link href="{{asset('') }}assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="{{asset('') }}assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="{{asset('') }}assets/plugins/highcharts/css/highcharts-white.css" rel="stylesheet" />
	<link href="{{asset('') }}assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
	<link href="{{asset('') }}assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
	<!-- loader-->
	<link href="{{asset('') }}assets/css/pace.min.css" rel="stylesheet" />
	<script src="{{asset('') }}assets/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="{{asset('') }}assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="{{asset('') }}assets/css/bootstrap-extended.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
	<link href="{{asset('') }}assets/css/app.css" rel="stylesheet">
	<link href="{{asset('') }}assets/css/icons.css" rel="stylesheet">
</head>

<body class="bg-theme bg-theme3">
    <!--wrapper-->
	<div class="wrapper">
        <header>
            <div class="topbar d-flex align-items-center">
                <nav class="navbar navbar-expand gap-3">
                    <div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
                    </div>
                    <div class="search-bar flex-grow-1">
                        <div class="position-relative search-bar-box">
                            <input type="text" class="form-control search-control" placeholder="Type to search..."> <span class="position-absolute top-50 search-show translate-middle-y"><i class='bx bx-search'></i></span>
                            <span class="position-absolute top-50 search-close translate-middle-y"><i class='bx bx-x'></i></span>
                        </div>
                    </div>
                    <div class="top-menu ms-auto">
                        <ul class="navbar-nav align-items-center gap-1">
                            <li class="nav-item mobile-search-icon d-flex d-lg-none" data-bs-toggle="modal" data-bs-target="#SearchModal">
                                <a class="nav-link" href="avascript:;"><i class='bx bx-search'></i>
                                </a>
                            </li>

                            <li class="nav-item dropdown dropdown-app">
                                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown" href="javascript:;"><i class='bx bx-grid-alt'></i></a>
                                <div class="dropdown-menu dropdown-menu-end p-0">
                                    <div class="app-container p-2 my-2">
                                        <div class="row gx-0 gy-2 row-cols-3 justify-content-center p-2">
                                            <div class="col">
                                                <a href="javascript:;">
                                                    <div class="app-box text-center">
                                                        <div class="app-icon">
                                                            <img src="{{asset('') }}assets/images/app/slack.png" width="30" alt="">
                                                        </div>
                                                        <div class="app-name">
                                                            <p class="mb-0 mt-1"><?php echo "Social Network"; ?></p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div><!--end row-->
                                    </div>
                                </div>
                            </li>

                            <li class="nav-item dropdown dropdown-large">
                                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" data-bs-toggle="dropdown"><span class="alert-count">7</span>
                                    <i class='bx bx-bell'></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="javascript:;">
                                        <div class="msg-header">
                                            <p class="msg-header-title"><?php echo "Notifications"; ?></p>
                                            <p class="msg-header-badge"><?php echo "Number of New"; ?></p>
                                        </div>
                                    </a>
                                    <div class="header-notifications-list">
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="user-online">
                                                    <img src="{{asset('') }}assets/images/avatars/avatar-1.png" class="msg-avatar" alt="user avatar">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name"><?php echo "Message Title"; ?><span class="msg-time float-end"><?php echo "Time ago"; ?></span></h6>
                                                    <p class="msg-info"><?php echo "Message"; ?></p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <a href="javascript:;">
                                        <div class="text-center msg-footer">
                                            <button class="btn btn-light w-100">View All Notifications</button>
                                        </div>
                                    </a>
                                </div>
                            </li>
                            <li class="nav-item dropdown dropdown-large">
                                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <span class="alert-count">8</span>
                                    <i class='bx bx-shopping-bag'></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="javascript:;">
                                        <div class="msg-header">
                                            <p class="msg-header-title"><?php echo "Something"; ?></p>
                                            <p class="msg-header-badge"><?php echo "Number of something"; ?></p>
                                        </div>
                                    </a>
                                    <div class="header-message-list">
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="position-relative">
                                                    <div class="cart-product rounded-circle bg-light">
                                                        <img src="{{asset('') }}assets/images/products/03.png" class="" alt="product image">
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="cart-product-title mb-0"><?php echo "Device"; ?></h6>
                                                    <p class="cart-product-price mb-0"><?php echo "1 unit"; ?></p>
                                                </div>
                                                <div class="">
                                                    <p class="cart-price mb-0"><?php echo "Price"; ?></p>
                                                </div>
                                                <div class="cart-product-cancel"><i class="bx bx-x"></i>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <a href="javascript:;">
                                        <div class="text-center msg-footer">
                                            <div class="d-flex align-items-center justify-content-between mb-3">
                                                <h5 class="mb-0"><?php echo "Something"; ?></h5>
                                                <h5 class="mb-0 ms-auto"><?php echo "Value"; ?></h5>
                                            </div>
                                            <button class="btn btn-light w-100"><?php echo "Option"; ?></button>
                                        </div>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <div class="user-box dropdown px-3">
                        <a class="d-flex align-items-center nav-link dropdown-toggle gap-3 dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{asset('') }}assets/images/avatars/avatar-2.png" class="user-img" alt="user avatar">
                            <div class="user-info">
                                <p class="user-name mb-0"> {{ Auth::guard('staff')->user()->sname}}, {{ Auth::guard('staff')->user()->fname}} {{ Auth::guard('staff')->user()->mname}} </p>
                                <p class="designattion mb-0">{{ Auth::guard('staff')->user()->dept}}: {{ Auth::guard('staff')->user()->des}} </p>
                            </div>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item d-flex align-items-center" href="/staff/profile"><i class="bx bx-user fs-5"></i><span>Profile</span></a>
                            </li>
                            <li><a class="dropdown-item d-flex align-items-center" href="javascript:;"> <i class="bx bx-cog fs-5"></i> <span>Settings</span>
                            </a>
                            </li>
                            <li><a class="dropdown-item d-flex align-items-center" href="{{ route('staff.generate.pdf') }}"><i class="bx bx-download fs-5"></i><span>Device Allocated pdfs</span></a>
                            </li>
                            <li><a class="dropdown-item d-flex align-items-center" href="javascript:;"><i class="bx bx-download fs-5"></i><span>Downloads</span></a>
                            </li>
                            <li>
                                <div class="dropdown-divider mb-0"></div>
                            </li>
                            <li>
                                <form method="POST" action="{{ route('staff.logout') }}">
                                    @csrf
                                    <a class="dropdown-item d-flex align-items-center" href="javascript:;" onclick="this.closest('form').submit();">
                                        <i class="bx bx-log-out-circle"></i><span>Logout</span>
                                    </a>
                                </form>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>

        <!--sidebar wrapper -->
        <div class="sidebar-wrapper" data-simplebar="true">
            <div class="sidebar-header">
                <div>
                    <img src="{{asset('') }}assets/images/output-onlinepngtools (3).png" class="logo-icon" alt="logo icon" height = "66px" width = "70px">
                </div>

                <div>
                    <img src="{{asset('') }}assets/images/COA_Line__1.png" class="logo-icon" alt="logo icon" height = "66px" width = "5px">
                </div>

                <div>
                    <img src="{{asset('') }}assets/images/KSG Logo (1).png" class="logo-icon" alt="logo icon" height = "66px" width = "90px">
                </div>
                <div class="toggle-icon ms-auto"><i class='bx bx-arrow-back'></i>
                </div>
            </div>
            <!--navigation-->
            <ul class="metismenu" id="menu">
                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class='bx bx-home-alt'></i>
                        </div>
                        <div class="menu-title">Dashboard</div>
                    </a>
                    <ul>
                        <li> <a href="/staff/dashboard"><i class="bx bx-radio-circle"></i>Home</a>
                        </li>
                        <li> <a href="{{ route('staff.generate.pdf') }}"><i class="bx bx-radio-circle"></i>Download Allocation  Pdf</a>
                        </li>
                    </ul>
                </li>
                <li class="menu-label">Request Management</li>
                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class='bx bx-laptop'></i>
                        </div>
                            <div class="menu-title">Requests</div>
                    </a>
                    <ul>
                        <li> <a href="/staff/requests"><i class='bx bx-radio-circle'></i>My requests</a>
                        </li>
                        <li> <a href="/staff/request"><i class='bx bx-radio-circle'></i>New Request</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow" href="javascript:;">
                        <div class="parent-icon"><i class='bx bx-task'></i>
                        </div>
                        <div class="menu-title">Allocations</div>
                    </a>
                    <ul>
                        <li> <a href="/staff/myallocations"><i class='bx bx-radio-circle'></i>My Allocations</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow" href="javascript:;">
                        <div class="parent-icon"><i class="bx bx-transfer"></i>
                        </div>
                        <div class="menu-title">Returns</div>
                    </a>
                    <ul>
                        <li> <a href="/staff/myreturns"><i class='bx bx-radio-circle'></i>My Returns</a>
                        </li>
                    </ul>
                </li>
                <li class="menu-label">Device Management</li>
                <li>
                    <a class="has-arrow" href="javascript:;">
                        <div class="parent-icon"><i class='bx bx-devices'></i>
                        </div>
                        <div class="menu-title">Devices  KSG</div>
                    </a>
                   
                    
                    <ul>
                        <li> <a href="/device/staffdevices"><i class='bx bx-radio-circle'></i>All Devices</a>
                        </li>
                        <li> <a href="/staff/myalldevs"><i class='bx bx-radio-circle'></i>My Allocated Devices</a>
                        </li>
                        <li> <a href="/staff/myretdevs"><i class='bx bx-radio-circle'></i>My Returned Devices</a>
                        </li>
                        
                    </ul>
                </li>
                <li class="menu-label">Feedback Management</li>
                <li>
                    <li>
                        <a href="/staff/feedback">
                            <div class="parent-icon"><i class='bx bx-message-square-add' ></i>
                            </div>
                            <div class="menu-title">Send Feedback</div>
                        </a>
                    </li>
                    <li>
                        <a href="/staff/myfeed">
                            <div class="parent-icon"><i class='bx bxs-conversation' ></i>
                            </div>
                            <div class="menu-title">Feedback History</div>
                        </a>
                    </li>
                </li>

                <li class="menu-label">Account Management</li>
                    <li>
                        <a class="has-arrow" href="javascript:;">
                            <div class="parent-icon"><i class="bx bx-user"></i>
                            </div>
                            <div class="menu-title">Account</div>
                        </a>

                        <ul>
                            <li><a href="/staff/profile" target="_blank"><i class='bx bx-radio-circle'></i>User Profile</a></li>
                            <li><a href="auth-basic-forgot-password.php" target="_blank"><i class='bx bx-radio-circle'></i>Forgot Password</a></li>
                            <li><a href="auth-basic-reset-password.php" target="_blank"><i class='bx bx-radio-circle'></i>Reset Password</a></li>
                            <li>
                                <form method="POST" action="{{ route('staff.logout') }}">
                                    @csrf
                                    <a class="dropdown-item d-flex align-items-center" href="javascript:;" onclick="this.closest('form').submit();">
                                        <i class="bx bx-log-out-circle"></i><span>Logout</span>
                                    </a>
                                </form>
                            </li>
                        </ul>
                    </li>
                </li>
            </ul>
            <!--end navigation-->
        </div>

</html>
