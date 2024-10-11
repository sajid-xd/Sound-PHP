<?php
session_start();


include "../db.php";

if($_SESSION['usertype']!="1"){
    header('location: ../logout.php');

}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Sound Admin-Panel</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="../assets/images/fav-icon.ico">

        <!-- third party css -->
        <link href="../assets/css/vendor/dataTables.bootstrap5.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/vendor/responsive.bootstrap5.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/vendor/buttons.bootstrap5.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/vendor/select.bootstrap5.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/vendor/fixedHeader.bootstrap5.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/vendor/fixedColumns.bootstrap5.css" rel="stylesheet" type="text/css" />
        <!-- third party css end -->

        <!-- App css -->
        <link href="../assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style"/>

    </head>

    <body class="loading" data-layout-color="light" data-leftbar-theme="dark" data-layout-mode="fluid" data-rightbar-onstart="true">
        <!-- Begin page -->
        <div class="wrapper">
            <!-- ========== Left Sidebar Start ========== -->
            <div class="leftside-menu">
    
                <!-- LOGO -->
                <a href="index.html" class="logo text-center logo-light">
                    <span class="logo-lg">
                        <img src="../assets/images/1.png" alt="" height="60">
                    </span>
                    <span class="logo-sm">
                        <img src="../assets/images/logo_smm.png" alt="" height="30">
                    </span>
                </a>

                <!-- LOGO -->
                <a href="index.html" class="logo text-center logo-dark">
                    <span class="logo-lg">
                        <img src="../assets/images/logo-dark.png" alt="" height="16">
                    </span>
                    <span class="logo-sm">
                        <img src="../assets/images/logo_sm_dark.png" alt="" height="16">
                    </span>
                </a>
    
                <div class="h-100" id="leftside-menu-container" data-simplebar>

                    <!--- Sidemenu -->
                    <ul class="side-nav">

                        <li class="side-nav-title side-nav-item">Navigation</li>

                        <li class="side-nav-item">
                            <a  class="side-nav-link" href="index.php">
                                <i class="uil-home-alt"></i>
                                <span> Dashboards </span>
                            </a>
                           
                        </li>

             
                        <li class="side-nav-item">
                            <a  class="side-nav-link" href="songs.php">
                                <i class="uil-music"></i>
                                <span> Songs </span>
                            </a>
                           
                        </li>


                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">
                    <!-- Topbar Start -->
                    <div class="navbar-custom">
                        <ul class="list-unstyled topbar-menu float-end mb-0">
                 
                          

                            <li class="dropdown notification-list">
                                <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                                    aria-expanded="false">
                                    <span class="account-user-avatar"> 
                                        <img src="../assets/images/users/avatar-1.jpg" alt="user-image" class="rounded-circle">
                                    </span>
                                    <span>
                                        <span class="account-user-name"><?php echo $_SESSION['adminName']?></span>
                                        <span class="account-position">Admin</span>
                                    </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown">
                                    <!-- item-->
                                    <div class=" dropdown-header noti-title">
                                        <h6 class="text-overflow m-0">Welcome !</h6>
                                    </div>

                                   
                                    <!-- item-->
                                    <a href="../logout.php" class="dropdown-item notify-item">
                                        <i class="mdi mdi-logout me-1"></i>
                                        <span>Logout</span>
                                    </a>
                                </div>
                            </li>

                        </ul>
                        <button class="button-menu-mobile open-left">
                            <i class="mdi mdi-menu"></i>
                        </button>
                       
                        </div>
                    </div>
                    <!-- end Topbar -->
