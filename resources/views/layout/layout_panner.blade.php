<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">
<head>

    <meta charset="utf-8" />
    <title>admins - Quản lý</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose admins & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="/admins/images/favicon.ico">

    <!-- Layout config Js -->
    <script src="{{asset('admins/js/layout.js')}}"></script>
    <!-- Bootstrap Css -->
    <link href="{{asset('admins/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{asset('admins/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{asset('admins/css/app.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="{{asset('admins/css/custom.min.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.css" />
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css">

    <style>
    .VIpgJd-ZVi9od-ORHb-OEVmcd{
        display: none;
    }
.lb-overlay {
    background-color: rgba(0, 0, 0, 0.8); /* Màu nền */
}

/* Định dạng khu vực chứa ảnh */
.lb-container {
    padding: 20px; /* Khoảng cách giữa ảnh và viền ngoài */
}

/* Định dạng ảnh */
.lb-image {
    max-width: 80vw !important; /* Chiều cao tối đa của ảnh */
    min-width: 50vw;
    height: auto;
    min-height: 30vh;
    object-fit: contain;
   
}

/* Định dạng nút đóng */
.lb-close {
    color: #fff; /* Màu chữ */
    font-size: 20px; /* Kích thước chữ */
    position: absolute; /* Vị trí tuyệt đối */
    top: 10px; /* Khoảng cách từ trên xuống */
    right: 20px; /* Khoảng cách từ phải qua */
    cursor: pointer; /* Con trỏ khi rê chuột */
    z-index: 9999; /* Độ sâu */
}

/* Định dạng tiêu đề */
.lb-caption {
    color: #fff; /* Màu chữ */
    font-size: 16px; /* Kích thước chữ */
    text-align: center; /* Căn chỉnh văn bản */
    margin-top: 10px; /* Khoảng cách từ trên xuống */
}

/* Định dạng nút điều hướng */
.lb-nav {
    color: #fff; /* Màu chữ */
    font-size: 30px; /* Kích thước chữ */
    cursor: pointer; /* Con trỏ khi rê chuột */
    position: absolute; /* Vị trí tuyệt đối */
    top: 50%; /* Ở giữa theo chiều cao */
    transform: translateY(-50%); /* Dịch chuyển theo trục y */
    z-index: 9999; /* Độ sâu */
}
.lb-number{
    display:none !important;
}
.lb-prev {
    display:none !important; /* Khoảng cách từ trái qua */
}

.lb-next {
   display:none !important; /* Khoảng cách từ phải qua */
}
    </style>

    @yield('style')
</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

        <header id="page-topbar">
            <div class="layout-width">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box horizontal-logo">
                            <a href="" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="/admins/images/logo-sm.png" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="/admins/images/logo-dark.png" alt="" height="17">
                                </span>
                            </a>
        
                            <a href="" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="/admins/images/logo-sm.png" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="/admins/images/logo-light.png" alt="" height="17">
                                </span>
                            </a>
                        </div>
        
                        <button type="button" class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger material-shadow-none" id="topnav-hamburger-icon">
                            <span class="hamburger-icon">
                                <span></span>
                                <span></span>
                                <span></span>
                            </span>
                        </button>
        
                        <!-- App Search-->
                   
                    </div>
        
                    <div class="d-flex align-items-center">
        
                        <div class="dropdown d-md-none topbar-head-dropdown header-item">
                            <button type="button" class="btn btn-icon btn-topbar material-shadow-none btn-ghost-secondary rounded-circle" id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-search fs-22"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-search-dropdown">
                                <form class="p-3">
                                    <div class="form-group m-0">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                            <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
        
                        <div class="dropdown ms-1 topbar-head-dropdown header-item">
                            <div id="google_translate_element"></div>
                        </div>
        
                       
        
                     
        
                        <div class="ms-1 header-item d-none d-sm-flex">
                            <button type="button" class="btn btn-icon btn-topbar material-shadow-none btn-ghost-secondary rounded-circle light-dark-mode">
                                <i class='bx bx-moon fs-22'></i>
                            </button>
                        </div>
        
                        <div class="dropdown topbar-head-dropdown ms-1 header-item" id="notificationDropdown">
                            <button type="button" class="btn btn-icon btn-topbar material-shadow-none btn-ghost-secondary rounded-circle" id="page-header-notifications-dropdown" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false">
                                <i class='bx bx-bell fs-22'></i>
                                <span class="position-absolute topbar-badge fs-10 translate-middle badge rounded-pill bg-danger">3<span class="visually-hidden">unread messages</span></span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-notifications-dropdown">
        
                                <div class="dropdown-head bg-primary bg-pattern rounded-top">
                                    <div class="p-3">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <h6 class="m-0 fs-16 fw-semibold text-white"> Notifications </h6>
                                            </div>
                                            <div class="col-auto dropdown-tabs">
                                                <span class="badge bg-light text-body fs-13"> 4 New</span>
                                            </div>
                                        </div>
                                    </div>
        
                                    <div class="px-2 pt-2">
                                        <ul class="nav nav-tabs dropdown-tabs nav-tabs-custom" data-dropdown-tabs="true" id="notificationItemsTab" role="tablist">
                                            <li class="nav-item waves-effect waves-light">
                                                <a class="nav-link active" data-bs-toggle="tab" href="#all-noti-tab" role="tab" aria-selected="true">
                                                    All (4)
                                                </a>
                                            </li>
                                            <li class="nav-item waves-effect waves-light">
                                                <a class="nav-link" data-bs-toggle="tab" href="#messages-tab" role="tab" aria-selected="false">
                                                    Messages
                                                </a>
                                            </li>
                                            <li class="nav-item waves-effect waves-light">
                                                <a class="nav-link" data-bs-toggle="tab" href="#alerts-tab" role="tab" aria-selected="false">
                                                    Alerts
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
        
                                </div>
        
                                <div class="tab-content position-relative" id="notificationItemsTabContent">
                                    <div class="tab-pane fade show active py-2 ps-2" id="all-noti-tab" role="tabpanel">
                                        <div data-simplebar style="max-height: 300px;" class="pe-2">
                                            <div class="text-reset notification-item d-block dropdown-item position-relative">
                                                <div class="d-flex">
                                                    <div class="avatar-xs me-3 flex-shrink-0">
                                                        <span class="avatar-title bg-info-subtle text-info rounded-circle fs-16">
                                                            <i class="bx bx-badge-check"></i>
                                                        </span>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <a href="#!" class="stretched-link">
                                                            <h6 class="mt-0 mb-2 lh-base">Your <b>Elite</b> author Graphic
                                                                Optimization <span class="text-secondary">reward</span> is
                                                                ready!
                                                            </h6>
                                                        </a>
                                                        <p class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                                            <span><i class="mdi mdi-clock-outline"></i> Just 30 sec ago</span>
                                                        </p>
                                                    </div>
                                                    <div class="px-2 fs-15">
                                                        <div class="form-check notification-check">
                                                            <input class="form-check-input" type="checkbox" value="" id="all-notification-check01">
                                                            <label class="form-check-label" for="all-notification-check01"></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
        
                                            <div class="text-reset notification-item d-block dropdown-item position-relative">
                                                <div class="d-flex">
                                                    <img src="/admins/images/users/avatar-2.jpg" class="me-3 rounded-circle avatar-xs flex-shrink-0" alt="user-pic">
                                                    <div class="flex-grow-1">
                                                        <a href="#!" class="stretched-link">
                                                            <h6 class="mt-0 mb-1 fs-13 fw-semibold">Angela Bernier</h6>
                                                        </a>
                                                        <div class="fs-13 text-muted">
                                                            <p class="mb-1">Answered to your comment on the cash flow forecast's
                                                                graph 🔔.</p>
                                                        </div>
                                                        <p class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                                            <span><i class="mdi mdi-clock-outline"></i> 48 min ago</span>
                                                        </p>
                                                    </div>
                                                    <div class="px-2 fs-15">
                                                        <div class="form-check notification-check">
                                                            <input class="form-check-input" type="checkbox" value="" id="all-notification-check02">
                                                            <label class="form-check-label" for="all-notification-check02"></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
        
                                            <div class="text-reset notification-item d-block dropdown-item position-relative">
                                                <div class="d-flex">
                                                    <div class="avatar-xs me-3 flex-shrink-0">
                                                        <span class="avatar-title bg-danger-subtle text-danger rounded-circle fs-16">
                                                            <i class='bx bx-message-square-dots'></i>
                                                        </span>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <a href="#!" class="stretched-link">
                                                            <h6 class="mt-0 mb-2 fs-13 lh-base">You have received <b class="text-success">20</b> new messages in the conversation
                                                            </h6>
                                                        </a>
                                                        <p class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                                            <span><i class="mdi mdi-clock-outline"></i> 2 hrs ago</span>
                                                        </p>
                                                    </div>
                                                    <div class="px-2 fs-15">
                                                        <div class="form-check notification-check">
                                                            <input class="form-check-input" type="checkbox" value="" id="all-notification-check03">
                                                            <label class="form-check-label" for="all-notification-check03"></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
        
                                            <div class="text-reset notification-item d-block dropdown-item position-relative">
                                                <div class="d-flex">
                                                    <img src="/admins/images/users/avatar-8.jpg" class="me-3 rounded-circle avatar-xs flex-shrink-0" alt="user-pic">
                                                    <div class="flex-grow-1">
                                                        <a href="#!" class="stretched-link">
                                                            <h6 class="mt-0 mb-1 fs-13 fw-semibold">Maureen Gibson</h6>
                                                        </a>
                                                        <div class="fs-13 text-muted">
                                                            <p class="mb-1">We talked about a project on linkedin.</p>
                                                        </div>
                                                        <p class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                                            <span><i class="mdi mdi-clock-outline"></i> 4 hrs ago</span>
                                                        </p>
                                                    </div>
                                                    <div class="px-2 fs-15">
                                                        <div class="form-check notification-check">
                                                            <input class="form-check-input" type="checkbox" value="" id="all-notification-check04">
                                                            <label class="form-check-label" for="all-notification-check04"></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
        
                                            <div class="my-3 text-center view-all">
                                                <button type="button" class="btn btn-soft-success waves-effect waves-light">View
                                                    All Notifications <i class="ri-arrow-right-line align-middle"></i></button>
                                            </div>
                                        </div>
        
                                    </div>
        
                                    <div class="tab-pane fade py-2 ps-2" id="messages-tab" role="tabpanel" aria-labelledby="messages-tab">
                                        <div data-simplebar style="max-height: 300px;" class="pe-2">
                                            <div class="text-reset notification-item d-block dropdown-item">
                                                <div class="d-flex">
                                                    <img src="/admins/images/users/avatar-3.jpg" class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                                    <div class="flex-grow-1">
                                                        <a href="#!" class="stretched-link">
                                                            <h6 class="mt-0 mb-1 fs-13 fw-semibold">James Lemire</h6>
                                                        </a>
                                                        <div class="fs-13 text-muted">
                                                            <p class="mb-1">We talked about a project on linkedin.</p>
                                                        </div>
                                                        <p class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                                            <span><i class="mdi mdi-clock-outline"></i> 30 min ago</span>
                                                        </p>
                                                    </div>
                                                    <div class="px-2 fs-15">
                                                        <div class="form-check notification-check">
                                                            <input class="form-check-input" type="checkbox" value="" id="messages-notification-check01">
                                                            <label class="form-check-label" for="messages-notification-check01"></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
        
                                            <div class="text-reset notification-item d-block dropdown-item">
                                                <div class="d-flex">
                                                    <img src="/admins/images/users/avatar-2.jpg" class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                                    <div class="flex-grow-1">
                                                        <a href="#!" class="stretched-link">
                                                            <h6 class="mt-0 mb-1 fs-13 fw-semibold">Angela Bernier</h6>
                                                        </a>
                                                        <div class="fs-13 text-muted">
                                                            <p class="mb-1">Answered to your comment on the cash flow forecast's
                                                                graph 🔔.</p>
                                                        </div>
                                                        <p class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                                            <span><i class="mdi mdi-clock-outline"></i> 2 hrs ago</span>
                                                        </p>
                                                    </div>
                                                    <div class="px-2 fs-15">
                                                        <div class="form-check notification-check">
                                                            <input class="form-check-input" type="checkbox" value="" id="messages-notification-check02">
                                                            <label class="form-check-label" for="messages-notification-check02"></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
        
                                            <div class="text-reset notification-item d-block dropdown-item">
                                                <div class="d-flex">
                                                    <img src="/admins/images/users/avatar-6.jpg" class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                                    <div class="flex-grow-1">
                                                        <a href="#!" class="stretched-link">
                                                            <h6 class="mt-0 mb-1 fs-13 fw-semibold">Kenneth Brown</h6>
                                                        </a>
                                                        <div class="fs-13 text-muted">
                                                            <p class="mb-1">Mentionned you in his comment on 📃 invoice #12501.
                                                            </p>
                                                        </div>
                                                        <p class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                                            <span><i class="mdi mdi-clock-outline"></i> 10 hrs ago</span>
                                                        </p>
                                                    </div>
                                                    <div class="px-2 fs-15">
                                                        <div class="form-check notification-check">
                                                            <input class="form-check-input" type="checkbox" value="" id="messages-notification-check03">
                                                            <label class="form-check-label" for="messages-notification-check03"></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
        
                                            <div class="text-reset notification-item d-block dropdown-item">
                                                <div class="d-flex">
                                                    <img src="/admins/images/users/avatar-8.jpg" class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                                    <div class="flex-grow-1">
                                                        <a href="#!" class="stretched-link">
                                                            <h6 class="mt-0 mb-1 fs-13 fw-semibold">Maureen Gibson</h6>
                                                        </a>
                                                        <div class="fs-13 text-muted">
                                                            <p class="mb-1">We talked about a project on linkedin.</p>
                                                        </div>
                                                        <p class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                                            <span><i class="mdi mdi-clock-outline"></i> 3 days ago</span>
                                                        </p>
                                                    </div>
                                                    <div class="px-2 fs-15">
                                                        <div class="form-check notification-check">
                                                            <input class="form-check-input" type="checkbox" value="" id="messages-notification-check04">
                                                            <label class="form-check-label" for="messages-notification-check04"></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
        
                                            <div class="my-3 text-center view-all">
                                                <button type="button" class="btn btn-soft-success waves-effect waves-light">View
                                                    All Messages <i class="ri-arrow-right-line align-middle"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade p-4" id="alerts-tab" role="tabpanel" aria-labelledby="alerts-tab"></div>
        
                                    <div class="notification-actions" id="notification-actions">
                                        <div class="d-flex text-muted justify-content-center">
                                            Select <div id="select-content" class="text-body fw-semibold px-1">0</div> Result <button type="button" class="btn btn-link link-danger p-0 ms-3" data-bs-toggle="modal" data-bs-target="#removeNotificationModal">Remove</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
        
                        <div class="dropdown ms-sm-3 header-item topbar-user">
                            <button type="button" class="btn material-shadow-none" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="d-flex align-items-center">
                                    <img class="rounded-circle header-profile-user" src="/admins/images/users/avatar-1.jpg" alt="Header Avatar">
                                    <span class="text-start ms-xl-2">
                                        @if(Auth::user() == null || Auth::user()->role == 0)
                                        <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">Super Admin</span>
                                        <span class="d-none d-xl-block ms-1 fs-12 user-name-sub-text"></span>
                                        @else
                                         <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">Đại lý</span>
                                         <span class="d-none d-xl-block ms-1 fs-12 user-name-sub-text"></span>
                                        @endif
                                    </span>
                                </span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                @if(Auth::user() == null || Auth::user()->role == 0)
                                <h6 class="dropdown-header">CHào mừng Admin!</h6>
                                <a class="dropdown-item" href="logoutAdmin"><i class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span class="align-middle" data-key="t-logout">Logout</span></a>
                                @else
                                 <h6 class="dropdown-header">Chào mừng đại lý!</h6>
                                 <a class="dropdown-item" href="/"><i class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span class="align-middle" data-key="t-logout">Quay về app</span></a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        
        <!-- ========== App Menu ========== -->
        <div class="app-menu navbar-menu">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <!-- Dark Logo-->
                <a href="index.html" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="/admins/images/logo-sm.png" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="/admins/images/logo-dark.png" alt="" height="17">
                    </span>
                </a>
                <!-- Light Logo-->
                <a href="index.html" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="/admins/images/logo-sm.png" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="/admins/images/logo-light.png" alt="" height="17">
                    </span>
                </a>
                <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
                    <i class="ri-record-circle-line"></i>
                </button>
            </div>
    
           
            <div id="scrollbar">
                <div class="container-fluid">


                    <div id="two-column-menu">
                    </div>
                    <ul class="navbar-nav" id="navbar-nav">
                        <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                        @if(Auth::user() == null || Auth::user()->role ==0)
 <li class="nav-item">
                            <a class="nav-link" href="/manager/statistic"  role="button" aria-expanded="false" aria-controls="sidebarAuth">
                                <i class="ri-bar-chart-box-line"></i> <span >Thống kê hệ thống</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/manager/customer"   role="button" aria-expanded="false" aria-controls="sidebarAuth">
                                <i class="ri-account-circle-line"></i> <span >Quản lý khách hàng</span>
                            </a>
                        </li>
                        @else
                         <li class="nav-item">
                            <a class="nav-link" href="/partner/customer"   role="button" aria-expanded="false" aria-controls="sidebarAuth">
                                <i class="ri-account-circle-line"></i> <span >Quản lý khách hàng</span>
                            </a>
                        </li>
                        @endif
                        @if(Auth::user() == null || Auth::user()->role ==0)
                         <li class="nav-item">
                            <a class="nav-link menu-link collapsed" href="#sidebarTrans" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                                <i class="ri-wallet-3-line"></i> <span data-key="t-apps">Quản lý nạp rút</span>
                            </a>
                            <div class="menu-dropdown collapse" id="sidebarTrans" style="">
                                <ul class="nav nav-sm flex-column">
                                    
                                    <li class="nav-item">
                                        <a href="/manager/transfer?type=1" class="nav-link">Quản lý nạp </a>
                                    </li>
                                   
                                    <li class="nav-item">
                                        <a href="/manager/transfer?type=1" class="nav-link">Quản lý rút</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        @endif
                        
                        @if(Auth::user() != null && Auth::user()->role == 1)

                         <li class="nav-item">
                            <a class="nav-link menu-link collapsed" href="#sidebarHis" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                                <i class="ri-history-fill"></i> <span data-key="t-apps">Quản lý mua bán</span>
                            </a>
                            <div class="menu-dropdown collapse" id="sidebarHis" style="">
                                <ul class="nav nav-sm flex-column">
                                    
                                    <li class="nav-item">
                                        <a href="/partner/history" class="nav-link">Quản lý giao dịch</a>
                                    </li>
                                   
                                    <li class="nav-item">
                                        <a href="/partner/orders" class="nav-link">Quản lý mua bán CP</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        @else 
                         <li class="nav-item">
                            <a class="nav-link menu-link collapsed" href="#sidebarHis" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                                <i class="ri-history-fill"></i> <span data-key="t-apps">Quản lý mua bán</span>
                            </a>
                            <div class="menu-dropdown collapse" id="sidebarHis" style="">
                                <ul class="nav nav-sm flex-column">
                                    
                                    <li class="nav-item">
                                        <a href="/manager/history" class="nav-link">Quản lý giao dịch</a>
                                    </li>
                                   
                                    <li class="nav-item">
                                        <a href="/manager/orders" class="nav-link">Quản lý mua bán CP</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        @endif


                      
                        
                        @if(Auth::user() == null || Auth::user()->role == 0)

                        
                            <li class="nav-item">
                            <a class="nav-link" href="/manager/report"  role="button" aria-expanded="false" aria-controls="sidebarAuth">
                                <i class=" ri-error-warning-line"></i> <span >Quản lý khiếu nại</span>
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="/manager/notification"  role="button" aria-expanded="false" aria-controls="sidebarAuth">
                                <i class="ri-notification-3-line"></i> <span >Quản lý thông báo</span>
                            </a>
                        </li>
                       
                        @endif
                        
                        
                        @if(Auth::user() == null || Auth::user()->role == 0)
 
                         <li class="nav-item">
                            <a class="nav-link menu-link collapsed" href="#sidebarRoe" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                                <i class="ri-currency-line"></i> <span data-key="t-apps">Quản lý lãi xuất</span>
                            </a>
                            <div class="menu-dropdown collapse" id="sidebarRoe" style="">
                                <ul class="nav nav-sm flex-column">
                                    
                                  
                                   
                                    <li class="nav-item">
                                        <a href="/manager/interest" class="nav-link">Quản lý lãi xuất vay</a>
                                    </li>
                                    
                                     <li class="nav-item">
                                        <a href="/manager/wallet-save" class="nav-link">Quản lý gửi tích kiệm</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        @else
                     
                                   
                         <li class="nav-item">
                            <a class="nav-link menu-link collapsed" href="#sidebarRoe" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                                <i class="ri-currency-line"></i> <span data-key="t-apps">Quản lý lãi xuất</span>
                            </a>
                            <div class="menu-dropdown collapse" id="sidebarRoe" style="">
                                <ul class="nav nav-sm flex-column">
                                    
                                   
                                   
                                  
                                    
                                     <li class="nav-item">
                                        <a href="/partner/wallet-save" class="nav-link">Quản lý gửi tích kiệm</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        @endif
                         
                       
                        
                        
                        @if(Auth::user() == null || Auth::user()->role == 0)

                        
                           
                        <li class="nav-item">
                            <a class="nav-link menu-link collapsed" href="#sidebarApps" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                                <i class="ri-apps-2-line"></i> <span data-key="t-apps">Quản lý hệ thống</span>
                            </a>
                            <div class="menu-dropdown collapse" id="sidebarApps" style="">
                                <ul class="nav nav-sm flex-column">
                                    
                                    <li class="nav-item">
                                        <a href="/manager/setting" class="nav-link">Quản lý cấu hình</a>
                                    </li>
                                   
                                    <li class="nav-item">
                                        <a href="/manager/banner" class="nav-link">Quản lý Logo | Banner | Icon</a>
                                    </li>
                                    
                                    <li class="nav-item">
                                        <a href="/manager/role" class="nav-link">Quản lý nhóm quyền</a>
                                    </li>
                                    
                                    <li class="nav-item">
                                        <a href="/manager/banner" class="nav-link">Quản lý nhân viên</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        @endif

                    </ul>
                </div>
                <!-- Sidebar -->
            </div>

            <div class="sidebar-background"></div>
        </div>
        <!-- Left Sidebar End -->
        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    @yield('main_content')

                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <script>document.write(new Date().getFullYear())</script> © Stock.
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-end d-none d-sm-block">
                                Design & Develop Stock
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->



    <!--start back-to-top-->
    <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
        <i class="ri-arrow-up-line"></i>
    </button>
    <!--end back-to-top-->

    <!--preloader-->
    <div id="preloader">
        <div id="status">
            <div class="spinner-border text-primary avatar-sm" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>

    <div class="customizer-setting d-none d-md-block">
        <div class="btn-info rounded-pill shadow-lg btn btn-icon btn-lg p-2" data-bs-toggle="offcanvas" data-bs-target="#theme-settings-offcanvas" aria-controls="theme-settings-offcanvas">
            <i class='mdi mdi-spin mdi-cog-outline fs-22'></i>
        </div>
    </div>

    <!-- Theme Settings -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- JAVASCRIPT -->
    <script src="{{asset('admins/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('admins/libs/simplebar/simplebar.min.js')}}"></script>
    <script src="{{asset('admins/libs/node-waves/waves.min.js')}}"></script>
    <script src="{{asset('admins/libs/feather-icons/feather.min.js')}}"></script>
    <script src="{{asset('admins/js/pages/plugins/lord-icon-2.1.0.js')}}"></script>
    <script src="{{asset('admins/js/plugins.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.js"></script>
    <!-- App js -->
    <script src="{{asset('admins/js/app.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox-plus-jquery.min.js"></script>

    <script>
        
        function showConfirmPassword(url){
                $('#txtUrlRedirect').val(url);
                $('#modaulShowPasswordConfirm').modal('show');
            }
        $(document).ready(function(){
            var input = document.getElementById("txtPasswordConfirm");
            input.addEventListener("keypress", function(event) {
              if (event.key === "Enter") {
                event.preventDefault();
                document.getElementById("btnSubmitPasswordConfirm").click();
              }
            });
            $('#btnSubmitPasswordConfirm').click(function(){
               $.ajax({
                   url: '/manager/checkpass',
                   data:{
                       password: $('#txtPasswordConfirm').val()
                   },
                   success: function(res){
                       if(res.status){
                           var url = $('#txtUrlRedirect').val();
                           window.location.href = '/manager/' + url + '?password=' + $('#txtPasswordConfirm').val();
                       }
                       else{
                           alert(res.message);
                       }
                   }
               }) 
            });
        });
      
    </script>
    <script type="text/javascript">
 
        function googleTranslateElementInit() {
          new google.translate.TranslateElement({pageLanguage: 'vi', includedLanguages: "vi,zh-CN,zh-TW", layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
        }
      </script>
    <script type="text/javascript" src="http://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

    @yield('scripts')
    
</body>
</html>
