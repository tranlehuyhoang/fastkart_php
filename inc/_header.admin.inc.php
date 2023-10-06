<?php
session_start();
include_once __DIR__ .  '/../controller/category.class.php';
include_once __DIR__ .  '/../controller/product.class.php';
include_once __DIR__ .  '/../controller/review.class.php';
include_once __DIR__ .  '/../controller/user.class.php';
include_once __DIR__ .  '/../controller/cart.class.php';
include_once __DIR__ .  '/../controller/checkout.class.php';
include_once __DIR__ .  '/../controller/invoice.class.php';
$invoiceclass = new invoice();

// $user = new user();
$categoryclass = new category();
$userclass = new user();

$productclass = new product();
$reviewclass = new review();
$cartclass = new cart();
$checkoutclass = new checkout();

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] == 'logout') {
    $logoutadmin = $userclass->logoutadmin();
}
if (!isset($_SESSION['adminid'])) {
    echo "<script>window.location.href = './login.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Fastkart admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Fastkart admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="../public/assets_admin/images/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="../public/assets_admin/images/favicon.png" type="image/x-icon">
    <title>Fastkart - Dashboard</title>

    <!-- Google font-->
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Linear Icon css -->
    <link rel="stylesheet" href="../public/assets_admin/css/linearicon.css">

    <!-- fontawesome css -->

    <link rel="stylesheet" type="text/css" href="../public/assets_admin/css/vendors/font-awesome.css">

    <!-- Themify icon css-->
    <link rel="stylesheet" type="text/css" href="../public/assets_admin/css/vendors/themify.css">

    <!-- ratio css -->
    <link rel="stylesheet" type="text/css" href="../public/assets_admin/css/ratio.css">

    <!-- remixicon css -->
    <link rel="stylesheet" type="text/css" href="../public/assets_admin/css/remixicon.css">

    <!-- Feather icon css-->
    <link rel="stylesheet" type="text/css" href="../public/assets_admin/css/vendors/feather-icon.css">

    <!-- Plugins css -->
    <link rel="stylesheet" type="text/css" href="../public/assets_admin/css/vendors/scrollbar.css">
    <link rel="stylesheet" type="text/css" href="../public/assets_admin/css/vendors/animate.css">

    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="../public/assets_admin/css/vendors/bootstrap.css">

    <!-- vector map css -->
    <link rel="stylesheet" type="text/css" href="../public/assets_admin/css/vector-map.css">

    <!-- Slick Slider Css -->
    <link rel="stylesheet" href="../public/assets_admin/css/vendors/slick.css">

    <!-- App css -->
    <link rel="stylesheet" type="text/css" href="../public/assets_admin/css/style.css">
</head>

<body>

    <!-- tap on top start -->
    <div class="tap-top">
        <span class="lnr lnr-chevron-up"></span>
    </div>
    <!-- tap on tap end -->

    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
        <!-- Page Header Start-->
        <div class="page-header">
            <div class="header-wrapper m-0">
                <div class="header-logo-wrapper p-0">
                    <div class="logo-wrapper">
                        <a href="./index.php">
                            <img class="img-fluid main-logo" src="../public/assets_admin/images/logo/1.png" alt="logo">
                            <img class="img-fluid white-logo" src="../public/assets_admin/images/logo/1-white.png"
                                alt="logo">
                        </a>
                    </div>
                    <div class="toggle-sidebar">
                        <i class="status_toggle middle sidebar-toggle" data-feather="align-center"></i>
                        <a href="./index.php">
                            <img src="../public/assets_admin/images/logo/1.png" class="img-fluid" alt="">
                        </a>
                    </div>
                </div>

                <form class="form-inline search-full" action="javascript:void(0)" method="get">
                    <div class="form-group w-100">
                        <div class="Typeahead Typeahead--twitterUsers">
                            <div class="u-posRelative">
                                <input class="demo-input Typeahead-input form-control-plaintext w-100" type="text"
                                    placeholder="Search Fastkart .." name="q" title="" autofocus>
                                <i class="close-search" data-feather="x"></i>
                                <div class="spinner-border Typeahead-spinner" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>
                            <div class="Typeahead-menu"></div>
                        </div>
                    </div>
                </form>
                <div class="nav-right col-6 pull-right right-header p-0">
                    <ul class="nav-menus">
                        <li>
                            <span class="header-search">
                                <i class="ri-search-line"></i>
                            </span>
                        </li>
                        <li class="onhover-dropdown">
                            <div class="notification-box">
                                <i class="ri-notification-line"></i>
                                <span class="badge rounded-pill badge-theme">4</span>
                            </div>
                            <ul class="notification-dropdown onhover-show-div">
                                <li>
                                    <i class="ri-notification-line"></i>
                                    <h6 class="f-18 mb-0">Notitications</h6>
                                </li>
                                <li>
                                    <p>
                                        <i class="fa fa-circle me-2 font-primary"></i>Delivery processing <span
                                            class="pull-right">10 min.</span>
                                    </p>
                                </li>
                                <li>
                                    <p>
                                        <i class="fa fa-circle me-2 font-success"></i>Order Complete<span
                                            class="pull-right">1 hr</span>
                                    </p>
                                </li>
                                <li>
                                    <p>
                                        <i class="fa fa-circle me-2 font-info"></i>Tickets Generated<span
                                            class="pull-right">3 hr</span>
                                    </p>
                                </li>
                                <li>
                                    <p>
                                        <i class="fa fa-circle me-2 font-danger"></i>Delivery Complete<span
                                            class="pull-right">6 hr</span>
                                    </p>
                                </li>
                                <li>
                                    <a class="btn btn-primary" href="javascript:void(0)">Check all notification</a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <div class="mode">
                                <i class="ri-moon-line"></i>
                            </div>
                        </li>
                        <li class="profile-nav onhover-dropdown pe-0 me-0">
                            <div class="media profile-media">
                                <img class="user-profile rounded-circle" src="../public/assets_admin/images/users/4.jpg"
                                    alt="">
                                <div class="user-name-hide media-body">
                                    <?php
                                    if (isset($_SESSION['adminid'])) {
                                        $userdeetail = $userclass->getuserbyid($_SESSION['adminid']);



                                    ?>
                                    <?php
                                        if (isset($userdeetail)) {
                                            if ($userdeetail && $userdeetail->num_rows > 0) {
                                                $i = 0;
                                                while ($result = $userdeetail->fetch_assoc()) {
                                                    # code...
                                        ?>
                                    <span><?php echo $result['name'] ?></span>
                                    <?php
                                                    $i++;
                                                }
                                            } else {
                                                ?>
                                    <?php
                                            }
                                        } else {
                                            ?>
                                    <?php
                                        }
                                        ?>
                                    <?php
                                    }
                                    ?>
                                    <p class="mb-0 font-roboto">Admin<i class="middle ri-arrow-down-s-line"></i></p>
                                </div>
                            </div>
                            <ul class="profile-dropdown onhover-show-div">
                                <li>
                                    <a href="../public/admin/user">
                                        <i data-feather="users"></i>
                                        <span>Users</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="../public/admin/order-list">
                                        <i data-feather="archive"></i>
                                        <span>Orders</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="support-ticket.php">
                                        <i data-feather="phone"></i>
                                        <span>Spports Tickets</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="profile-setting.php">
                                        <i data-feather="settings"></i>
                                        <span>Settings</span>
                                    </a>
                                </li>
                                <li>
                                    <a data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                                        href="javascript:void(0)">
                                        <i data-feather="log-out"></i>
                                        <span>Log out</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Page Header Ends-->
        <div class="page-body-wrapper">
            <!-- Page Sidebar Start-->
            <div class="sidebar-wrapper">
                <div id="sidebarEffect"></div>
                <div>
                    <div class="logo-wrapper logo-wrapper-center">
                        <a href="./index.php" data-bs-original-title="" title="">
                            <img class="img-fluid for-white" src="../public/assets_admin/images/logo/full-white.png"
                                alt="logo">
                        </a>
                        <div class="back-btn">
                            <i class="fa fa-angle-left"></i>
                        </div>
                        <div class="toggle-sidebar">
                            <i class="ri-apps-line status_toggle middle sidebar-toggle"></i>
                        </div>
                    </div>
                    <div class="logo-icon-wrapper">
                        <a href="./index.php">
                            <img class="img-fluid main-logo main-white"
                                src="../public/assets_admin/images/logo/logo.png" alt="logo">
                            <img class="img-fluid main-logo main-dark"
                                src="../public/assets_admin/images/logo/logo-white.png" alt="logo">
                        </a>
                    </div>
                    <nav class="sidebar-main">
                        <div class="left-arrow" id="left-arrow">
                            <i data-feather="arrow-left"></i>
                        </div>

                        <div id="sidebar-menu">
                            <ul class="sidebar-links" id="simple-bar">
                                <li class="back-btn"></li>

                                <li class="sidebar-list">
                                    <a class="sidebar-link sidebar-title link-nav" href="./index.php">
                                        <i class="ri-home-line"></i>
                                        <span>Dashboard</span>
                                    </a>
                                </li>

                                <li class="sidebar-list">
                                    <a class="linear-icon-link sidebar-link sidebar-title" href="javascript:void(0)">
                                        <i class="ri-store-3-line"></i>
                                        <span>Product</span>
                                    </a>
                                    <ul class="sidebar-submenu">
                                        <li>
                                            <a href="./product.php">Prodcts</a>
                                        </li>

                                        <li>
                                            <a href="./product-create.php">Add New Products</a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="sidebar-list">
                                    <a class="linear-icon-link sidebar-link sidebar-title" href="javascript:void(0)">
                                        <i class="ri-list-check-2"></i>
                                        <span>Category</span>
                                    </a>
                                    <ul class="sidebar-submenu">
                                        <li>
                                            <a href="./category.php">Category List</a>
                                        </li>

                                        <li>
                                            <a href="./category-create.php">Add New Category</a>
                                        </li>
                                    </ul>
                                </li>



                                <li class="sidebar-list">
                                    <a class="sidebar-link sidebar-title" href="javascript:void(0)">
                                        <i class="ri-user-3-line"></i>
                                        <span>Users</span>
                                    </a>
                                    <ul class="sidebar-submenu">
                                        <li>
                                            <a href="./user.php">All users</a>
                                        </li>
                                        <li>
                                            <a href="./user-create.php">Add new user</a>
                                        </li>
                                    </ul>
                                </li>



                                <li class="sidebar-list">
                                    <a class="sidebar-link sidebar-title link-nav" href="./media.php">
                                        <i class="ri-price-tag-3-line"></i>
                                        <span>Media</span>
                                    </a>
                                </li>

                                <li class="sidebar-list">
                                    <a class="sidebar-link sidebar-title link-nav" href="./order.php">
                                        <i class="ri-archive-line"></i>
                                        <span>Orders</span>
                                    </a>

                                </li>


                                <li class="sidebar-list">
                                    <a class="sidebar-link sidebar-title link-nav" href="./review.php">
                                        <i class="ri-star-line"></i>
                                        <span>Product Review</span>
                                    </a>
                                </li>

                            </ul>
                        </div>

                        <div class="right-arrow" id="right-arrow">
                            <i data-feather="arrow-right"></i>
                        </div>
                    </nav>
                </div>
            </div>
            <!-- Page Sidebar Ends-->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog  modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <h5 class="modal-title" id="staticBackdropLabel">Logging Out</h5>
                            <p>Are you sure you want to log out?</p>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                            <div class="button-box">
                                <button type="button" class="btn btn--no" data-bs-dismiss="modal">No</button>
                                <a href="?action=logout" class="btn  btn--yes btn-primary">Yes</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>