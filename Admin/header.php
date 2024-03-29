<?php
session_start();
if(!isset($_SESSION["loginid"])) {
    header("location:../Guest/login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Grass Busters Admin</title>
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css" />
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css" />
    <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css" />
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="shortcut icon" href="assets/images/GB_Logo.png" />
    <link rel="stylesheet" href="assets/css/profile.css" type="text/css">
</head>

<body>
    <div class="container-scroller">
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <div class="text-center sidebar-brand-wrapper d-flex align-items-center">
                <!-- <a class="sidebar-brand brand-logo" href="index.php"><img src="assets/images/GB_Logo.png"
                        alt="" /></a> -->
                <!-- <a class="sidebar-brand brand-logo-mini pl-4 pt-3" href="index.html"><img
                        src="assets/images/logo-mini.svg" alt="logo" /></a> -->
            </div>
            <ul class="nav">
                <li class="nav-item nav-profile">
                    <a class="nav-link" data-toggle="collapse" href="#ui-admin" aria-expanded="false"
                        aria-controls="ui-admin">
                        <div class="nav-profile-image">
                            <img src="assets/images/faces-clipart/pic-1.png" alt="profile" />
                            <span class="login-status online"></span>
                            <!--change to offline or busy as needed-->
                        </div>
                        <div class="nav-profile-text d-flex flex-column pr-3">

                            <span class="font-weight-medium mb-2">Admin</span>
                            <!-- <span class="font-weight-normal">$8,753.00</span> -->
                        </div>
                        <span class="badge badge-danger text-white ml-3 rounded"></span>
                    </a>
                </li>
                <!-- <div class="collapse" id="ui-admin">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item">
                            <a class="nav-link" href="customerview.php">Customer Status</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="bookingview.php">Booking Status</a>
                        </li>
                    </ul>
                </div> -->
                <li class="nav-item">
                    <a class="nav-link" href="index.php">
                        <i class="mdi mdi-home menu-icon"></i>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#ui-status" aria-expanded="false"
                        aria-controls="ui-status">
                        <!-- <i class="mdi mdi-crosshairs-gps menu-icon"></i> -->
                        <span class="menu-title">Status</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-status">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item">
                                <a class="nav-link" href="customerview.php">Customer Status</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="bookingview.php">Booking Status</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#ui-registration" aria-expanded="false"
                        aria-controls="ui-registration">
                        <!-- <i class="mdi mdi-crosshairs-gps menu-icon"></i> -->
                        <span class="menu-title">Registrations</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-registration">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item">
                                <a class="nav-link" href="districtreg.php">District</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="gamecategory.php">Game</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="turfreg.php">Turf</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#ui-view" aria-expanded="false"
                        aria-controls="ui-view">
                        <!-- <i class="mdi mdi-crosshairs-gps menu-icon"></i> -->
                        <span class="menu-title">View</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-view">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item">
                                <a class="nav-link" href="locationview.php">Location</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="turfview.php">Turf</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="timeslotview.php">Time slot</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#ui-report" aria-expanded="false"
                        aria-controls="ui-view">
                        <!-- <i class="mdi mdi-crosshairs-gps menu-icon"></i> -->
                        <span class="menu-title">Report</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-report">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item">
                                <a class="nav-link" href="report_daywise_booking.php">Daywise Booking</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="report_customer_details.php">Customer List</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#ui-piechart" aria-expanded="false"
                        aria-controls="ui-piechart">
                        <!-- <i class="mdi mdi-crosshairs-gps menu-icon"></i> -->
                        <span class="menu-title">Pie Chart</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-piechart">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item">
                                <a class="nav-link" href="Bookingcount_piereport.php">Most Booked Turf</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="gamecount_piereport.php">Most Booked Game</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" href="pages/icons/mdi.html">
                        <i class="mdi mdi-contacts menu-icon"></i>
                        <span class="menu-title">Icons</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pages/forms/basic_elements.html">
                        <i class="mdi mdi-format-list-bulleted menu-icon"></i>
                        <span class="menu-title">Forms</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pages/charts/chartjs.html">
                        <i class="mdi mdi-chart-bar menu-icon"></i>
                        <span class="menu-title">Charts</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pages/tables/basic-table.html">
                        <i class="mdi mdi-table-large menu-icon"></i>
                        <span class="menu-title">Tables</span>
                    </a>
                </li>
                <li class="nav-item">
                    <span class="nav-link" href="#">
                        <span class="menu-title">Docs</span>
                    </span>
                </li> -->
                <!-- <li class="nav-item">
                    <a class="nav-link"
                        href="https://www.bootstrapdash.com/demo/breeze-free/documentation/documentation.html">
                        <i class="mdi mdi-file-document-box menu-icon"></i>
                        <span class="menu-title">Documentation</span>
                    </a>
                </li> -->
                <!-- <a href="../logout.php">
                    <li class="nav-item sidebar-actions">
                        <div class="nav-link">
                            <div class="mt-4">
                                <div class="border-none">
                                    <p class="text-black">Notification</p>
                                </div>
                                <ul class="mt-4 pl-0">
                                    <li>Sign Out</li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </a> -->
            </ul>
        </nav>
        <div class="container-fluid page-body-wrapper">
            <div id="theme-settings" class="settings-panel">
                <i class="settings-close mdi mdi-close"></i>
                <p class="settings-heading">SIDEBAR SKINS</p>
                <div class="sidebar-bg-options selected" id="sidebar-default-theme">
                    <div class="img-ss rounded-circle bg-light border mr-3"></div> Default
                </div>
                <div class="sidebar-bg-options" id="sidebar-dark-theme">
                    <div class="img-ss rounded-circle bg-dark border mr-3"></div> Dark
                </div>
                <p class="settings-heading mt-2">HEADER SKINS</p>
                <div class="color-tiles mx-0 px-4">
                    <div class="tiles light"></div>
                    <div class="tiles dark"></div>
                </div>
            </div>
            <nav class="navbar col-lg-12 col-12 p-lg-0 fixed-top d-flex flex-row">
                <div class="navbar-menu-wrapper d-flex align-items-stretch justify-content-between">
                    <a class="navbar-brand brand-logo-mini align-self-center d-lg-none" href="index.html"><img
                            src="assets/images/logo-mini.svg" alt="logo" /></a>
                    <button class="navbar-toggler navbar-toggler align-self-center mr-2" type="button"
                        data-toggle="minimize">
                        <i class="mdi mdi-menu"></i>
                    </button>
                    <!-- <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#"
                                data-toggle="dropdown">
                                <i class="mdi mdi-bell-outline"></i>
                                <span class="count count-varient1">7</span>
                            </a>
                            <div class="dropdown-menu navbar-dropdown navbar-dropdown-large preview-list"
                                aria-labelledby="notificationDropdown">
                                <h6 class="p-3 mb-0">Notifications</h6>
                                <a class="dropdown-item preview-item">
                                    <div class="preview-thumbnail">
                                        <img src="assets/images/faces/face4.jpg" alt="" class="profile-pic" />
                                    </div>
                                    <div class="preview-item-content">
                                        <p class="mb-0"> Dany Miles <span class="text-small text-muted">commented on
                                                your photo</span>
                                        </p>
                                    </div>
                                </a>
                                <a class="dropdown-item preview-item">
                                    <div class="preview-thumbnail">
                                        <img src="assets/images/faces/face3.jpg" alt="" class="profile-pic" />
                                    </div>
                                    <div class="preview-item-content">
                                        <p class="mb-0"> James <span class="text-small text-muted">posted a photo on
                                                your wall</span>
                                        </p>
                                    </div>
                                </a>
                                <a class="dropdown-item preview-item">
                                    <div class="preview-thumbnail">
                                        <img src="assets/images/faces/face2.jpg" alt="" class="profile-pic" />
                                    </div>
                                    <div class="preview-item-content">
                                        <p class="mb-0"> Alex <span class="text-small text-muted">just mentioned you in
                                                his post</span>
                                        </p>
                                    </div>
                                </a>
                                <div class="dropdown-divider"></div>
                                <p class="p-3 mb-0">View all activities</p>
                            </div>
                        </li>
                        <li class="nav-item dropdown d-none d-sm-flex">
                            <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#"
                                data-toggle="dropdown">
                                <i class="mdi mdi-email-outline"></i>
                                <span class="count count-varient2">5</span>
                            </a>
                            <div class="dropdown-menu navbar-dropdown navbar-dropdown-large preview-list"
                                aria-labelledby="messageDropdown">
                                <h6 class="p-3 mb-0">Messages</h6>
                                <a class="dropdown-item preview-item">
                                    <div class="preview-item-content flex-grow">
                                        <span class="badge badge-pill badge-success">Request</span>
                                        <p class="text-small text-muted ellipsis mb-0"> Suport needed for user123 </p>
                                    </div>
                                    <p class="text-small text-muted align-self-start"> 4:10 PM </p>
                                </a>
                                <a class="dropdown-item preview-item">
                                    <div class="preview-item-content flex-grow">
                                        <span class="badge badge-pill badge-warning">Invoices</span>
                                        <p class="text-small text-muted ellipsis mb-0"> Invoice for order is mailed </p>
                                    </div>
                                    <p class="text-small text-muted align-self-start"> 4:10 PM </p>
                                </a>
                                <a class="dropdown-item preview-item">
                                    <div class="preview-item-content flex-grow">
                                        <span class="badge badge-pill badge-danger">Projects</span>
                                        <p class="text-small text-muted ellipsis mb-0"> New project will start tomorrow
                                        </p>
                                    </div>
                                    <p class="text-small text-muted align-self-start"> 4:10 PM </p>
                                </a>
                                <h6 class="p-3 mb-0">See all activity</h6>
                            </div>
                        </li>
                        <li class="nav-item nav-search border-0 ml-1 ml-md-3 ml-lg-5 d-none d-md-flex">
                            <form class="nav-link form-inline mt-2 mt-md-0">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search" />
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="mdi mdi-magnify"></i>
                                        </span>
                                    </div>
                                </div>
                            </form>
                        </li>
                    </ul> -->
                    <ul class="navbar-nav navbar-nav-right ml-lg-auto">
                        <!-- <li class="nav-item dropdown d-none d-xl-flex border-0">
                            <a class="nav-link dropdown-toggle" id="languageDropdown" href="#" data-toggle="dropdown">
                                <i class="mdi mdi-earth"></i> English </a>
                            <div class="dropdown-menu navbar-dropdown" aria-labelledby="languageDropdown">
                                <a class="dropdown-item" href="#"> French </a>
                                <a class="dropdown-item" href="#"> Spain </a>
                                <a class="dropdown-item" href="#"> Latin </a>
                                <a class="dropdown-item" href="#"> Japanese </a>
                            </div>
                        </li> -->
                        <li class="nav-item nav-profile dropdown border-0">
                            <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown">
                                <img class="nav-profile-img mr-2" alt="" src="assets/images/faces-clipart/pic-1.png" />
                                <span class="profile-name">Admin</span>
                            </a>
                            <div class="dropdown-menu navbar-dropdown w-100" aria-labelledby="profileDropdown">
                                <!-- <a class="dropdown-item" href="#">
                                    <i class="mdi mdi-cached mr-2 text-success"></i> Activity Log </a> -->
                                <a class="dropdown-item" href="../logout.php">
                                    <i class="mdi mdi-logout mr-2 text-primary"></i> Signout </a>
                            </div>
                        </li>
                    </ul>
                    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                        data-toggle="offcanvas">
                        <span class="mdi mdi-menu"></span>
                    </button>
                </div>
            </nav>