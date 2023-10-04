<?php

include_once __DIR__ . '/../inc/_header.inc.php';
if (!isset($_SESSION['userid'])) {
    echo "<script>window.location.href = './login.php';</script>";
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['quantity'])) {
    if (!isset($_SESSION['userid'])) {
        echo "<script>window.location.href = './login.php';</script>";
    }
    print_r($_POST);
    $addtocart = $cartclass->addToCart($_POST, $_SESSION['userid']);
    $carts = $cartclass->show_cart($_SESSION['userid']);
    $carts1 = $cartclass->show_cart($_SESSION['userid']);
    if (isset($addtocart)) {
        echo $addtocart;
    }
} else {
}
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $carts = $cartclass->show_cart($_SESSION['userid']);
    $carts1 = $cartclass->show_cart($_SESSION['userid']);
    if (isset($carts)) {

        echo '<pre>';
        print_r($carts);
        echo '</pre>';
    }
} else {
}
?>



<!-- Breadcrumb Section Start -->
<section class="breadscrumb-section pt-0">
    <div class="container-fluid-lg">
        <div class="row">
            <div class="col-12">
                <div class="breadscrumb-contain">
                    <h2>Cart</h2>
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="index.html">
                                    <i class="fa-solid fa-house"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Cart</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Cart Section Start -->
<section class="cart-section section-b-space">
    <div class="container-fluid-lg">
        <div class="row g-sm-5 g-3">
            <div class="col-xxl-9">
                <div class="cart-table">
                    <div class="table-responsive-xl">
                        <table class="table">
                            <tbody>
                                <?php
                                if (isset($carts)) {
                                    if ($carts && $carts->num_rows > 0) {
                                        $i = 0;
                                        while ($result = $carts->fetch_assoc()) {
                                            // echo '<pre>';
                                            // print_r($result);
                                            // echo '</pre>';
                                            # code...
                                ?>
                                            <tr class="product-box-contain">
                                                <td class="product-detail">
                                                    <div class="product border-0">
                                                        <a href="product-left-thumbnail.html" class="product-image">
                                                            <img src="../public/<?php echo $result['image'] ?>" class="img-fluid blur-up lazyload" alt="">
                                                        </a>
                                                        <div class="product-detail">
                                                            <ul>
                                                                <li class="name">
                                                                    <a href="product-left-thumbnail.html"><?php echo $result['product_name'] ?></a>
                                                                </li>

                                                                <li class="text-content"><span class="text-title">Category
                                                                        By:</span> <?php echo $result['category_name'] ?></li>

                                                                <li class="text-content"><span class="text-title">Quantity</span> -
                                                                    500 g</li>

                                                                <li>
                                                                    <h5 class="text-content d-inline-block">Price :</h5>
                                                                    <span>$35.10</span>
                                                                    <span class="text-content">$45.68</span>
                                                                </li>

                                                                <li>
                                                                    <h5 class="saving theme-color">Saving : $20.68</h5>
                                                                </li>

                                                                <li class="quantity-price-box">
                                                                    <div class="cart_qty">
                                                                        <div class="input-group">
                                                                            <button type="button" class="btn qty-left-minus" data-type="minus" data-field="">
                                                                                <i class="fa fa-minus ms-0" aria-hidden="true"></i>
                                                                            </button>
                                                                            <input class="form-control input-number qty-input" type="text" name="quantity" value="0">
                                                                            <button type="button" class="btn qty-right-plus" data-type="plus" data-field="">
                                                                                <i class="fa fa-plus ms-0" aria-hidden="true"></i>
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </li>

                                                                <li>
                                                                    <h5>Total:
                                                                        $<?php echo $result['quantity'] * $result['price'] ?>.00
                                                                    </h5>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td class="price">
                                                    <h4 class="table-title text-content">Price</h4>
                                                    <h5>$<?php echo $result['price'] ?>.00</h5>
                                                    <h6 class="theme-color">You Save : $<?php echo $result['price'] ?>.00</h6>
                                                </td>

                                                <td class="quantity">
                                                    <h4 class="table-title text-content">Qty</h4>
                                                    <div class="quantity-price">
                                                        <div class="cart_qty">
                                                            <div class="input-group">
                                                                <button type="button" class="btn qty-left-minus" data-type="minus" data-field="">
                                                                    <i class="fa fa-minus ms-0" aria-hidden="true"></i>
                                                                </button>
                                                                <input class="form-control input-number qty-input" type="number" name="quantity" value="<?php echo $result['quantity']  ?>">
                                                                <button type="button" class="btn qty-right-plus" data-type="plus" data-field="">
                                                                    <i class="fa fa-plus ms-0" aria-hidden="true"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td class="subtotal">
                                                    <h4 class="table-title text-content">Total</h4>
                                                    <h5>$<?php echo $result['quantity'] * $result['price'] ?>.00</h5>
                                                </td>

                                                <td class="save-remove">
                                                    <h4 class="table-title text-content">Action</h4>
                                                    <a class="save notifi-wishlist" href="javascript:void(0)">Save for later</a>
                                                    <a class="remove close_button" href="javascript:void(0)">Remove</a>
                                                </td>
                                            </tr>
                                        <?php

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
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <?php
            if (isset($carts1)) {
                if ($carts1 && $carts1->num_rows > 0) {
                    $i = 0;
                    while ($result = $carts1->fetch_assoc()) {
                        $i += $result['total_cost'];
            ?>

                    <?php

                    }
                    ?>
                    <div class="col-xxl-3">
                        <div class="summery-box p-sticky">
                            <div class="summery-header">
                                <h3>Cart Total</h3>
                            </div>

                            <div class="summery-contain">
                                <div class="coupon-cart">
                                    <h6 class="text-content mb-2">Coupon Apply</h6>
                                    <div class="mb-3 coupon-box input-group">
                                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Enter Coupon Code Here...">
                                        <button class="btn-apply">Apply</button>
                                    </div>
                                </div>
                                <ul>
                                    <li>
                                        <h4>Subtotal</h4>
                                        <h4 class="price">$<?php echo $i ?>.00</h4>
                                    </li>

                                    <li>
                                        <h4>Coupon Discount</h4>
                                        <h4 class="price">(-) 0.00</h4>
                                    </li>

                                    <li class="align-items-start">
                                        <h4>Shipping</h4>
                                        <h4 class="price text-end">$0.00</h4>
                                    </li>
                                </ul>
                            </div>

                            <ul class="summery-total">
                                <li class="list-total border-top-0">
                                    <h4>Total (USD)</h4>
                                    <h4 class="price theme-color">$<?php echo $i ?>.00</h4>
                                </li>
                            </ul>

                            <div class="button-group cart-button">
                                <ul>
                                    <li>
                                        <button onclick="location.href = './checkout.php';" class="btn btn-animation proceed-btn fw-bold">Process To Checkout</button>
                                    </li>

                                    <li>
                                        <button onclick="location.href = 'index.html';" class="btn btn-light shopping-button text-dark">
                                            <i class="fa-solid fa-arrow-left-long"></i>Return To Shopping</button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php
                } else {
                ?>
                <?php
                }
            } else {
                ?>
            <?php
            }
            ?>
        </div>
    </div>
</section>
<!-- Cart Section End -->

<!-- Footer Section Start -->
<footer class="section-t-space">
    <div class="container-fluid-lg">
        <div class="service-section">
            <div class="row g-3">
                <div class="col-12">
                    <div class="service-contain">
                        <div class="service-box">
                            <div class="service-image">
                                <img src="../public/assets_client/svg/product.svg" class="blur-up lazyload" alt="">
                            </div>

                            <div class="service-detail">
                                <h5>Every Fresh Products</h5>
                            </div>
                        </div>

                        <div class="service-box">
                            <div class="service-image">
                                <img src="../public/assets_client/svg/delivery.svg" class="blur-up lazyload" alt="">
                            </div>

                            <div class="service-detail">
                                <h5>Free Delivery For Order Over $50</h5>
                            </div>
                        </div>

                        <div class="service-box">
                            <div class="service-image">
                                <img src="../public/assets_client/svg/discount.svg" class="blur-up lazyload" alt="">
                            </div>

                            <div class="service-detail">
                                <h5>Daily Mega Discounts</h5>
                            </div>
                        </div>

                        <div class="service-box">
                            <div class="service-image">
                                <img src="../public/assets_client/svg/market.svg" class="blur-up lazyload" alt="">
                            </div>

                            <div class="service-detail">
                                <h5>Best Price On The Market</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="main-footer section-b-space section-t-space">
            <div class="row g-md-4 g-3">
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="footer-logo">
                        <div class="theme-logo">
                            <a href="index.html">
                                <img src="../public/assets_client/images/logo/1.png" class="blur-up lazyload" alt="">
                            </a>
                        </div>

                        <div class="footer-logo-contain">
                            <p>We are a friendly bar serving a variety of cocktails, wines and beers. Our bar is a
                                perfect place for a couple.</p>

                            <ul class="address">
                                <li>
                                    <i data-feather="home"></i>
                                    <a href="javascript:void(0)">1418 Riverwood Drive, CA 96052, US</a>
                                </li>
                                <li>
                                    <i data-feather="mail"></i>
                                    <a href="javascript:void(0)">support@fastkart.com</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                    <div class="footer-title">
                        <h4>Categories</h4>
                    </div>

                    <div class="footer-contain">
                        <ul>
                            <li>
                                <a href="shop-left-sidebar.html" class="text-content">Vegetables & Fruit</a>
                            </li>
                            <li>
                                <a href="shop-left-sidebar.html" class="text-content">Beverages</a>
                            </li>
                            <li>
                                <a href="shop-left-sidebar.html" class="text-content">Meats & Seafood</a>
                            </li>
                            <li>
                                <a href="shop-left-sidebar.html" class="text-content">Frozen Foods</a>
                            </li>
                            <li>
                                <a href="shop-left-sidebar.html" class="text-content">Biscuits & Snacks</a>
                            </li>
                            <li>
                                <a href="shop-left-sidebar.html" class="text-content">Grocery & Staples</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-xl col-lg-2 col-sm-3">
                    <div class="footer-title">
                        <h4>Useful Links</h4>
                    </div>

                    <div class="footer-contain">
                        <ul>
                            <li>
                                <a href="index.html" class="text-content">Home</a>
                            </li>
                            <li>
                                <a href="shop-left-sidebar.html" class="text-content">Shop</a>
                            </li>
                            <li>
                                <a href="about-us.html" class="text-content">About Us</a>
                            </li>
                            <li>
                                <a href="blog-list.html" class="text-content">Blog</a>
                            </li>
                            <li>
                                <a href="contact-us.html" class="text-content">Contact Us</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-xl-2 col-sm-3">
                    <div class="footer-title">
                        <h4>Help Center</h4>
                    </div>

                    <div class="footer-contain">
                        <ul>
                            <li>
                                <a href="order-success.html" class="text-content">Your Order</a>
                            </li>
                            <li>
                                <a href="user-dashboard.html" class="text-content">Your Account</a>
                            </li>
                            <li>
                                <a href="order-tracking.html" class="text-content">Track Order</a>
                            </li>
                            <li>
                                <a href="wishlist.html" class="text-content">Your Wishlist</a>
                            </li>
                            <li>
                                <a href="search.html" class="text-content">Search</a>
                            </li>
                            <li>
                                <a href="faq.html" class="text-content">FAQ</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="footer-title">
                        <h4>Contact Us</h4>
                    </div>

                    <div class="footer-contact">
                        <ul>
                            <li>
                                <div class="footer-number">
                                    <i data-feather="phone"></i>
                                    <div class="contact-number">
                                        <h6 class="text-content">Hotline 24/7 :</h6>
                                        <h5>+91 888 104 2340</h5>
                                    </div>
                                </div>
                            </li>

                            <li>
                                <div class="footer-number">
                                    <i data-feather="mail"></i>
                                    <div class="contact-number">
                                        <h6 class="text-content">Email Address :</h6>
                                        <h5>fastkart@hotmail.com</h5>
                                    </div>
                                </div>
                            </li>

                            <li class="social-app">
                                <h5 class="mb-2 text-content">Download App :</h5>
                                <ul>
                                    <li class="mb-0">
                                        <a href="https://play.google.com/store/apps" target="_blank">
                                            <img src="../public/assets_client/images/playstore.svg" class="blur-up lazyload" alt="">
                                        </a>
                                    </li>
                                    <li class="mb-0">
                                        <a href="https://www.apple.com/in/app-store/" target="_blank">
                                            <img src="../public/assets_client/images/appstore.svg" class="blur-up lazyload" alt="">
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="sub-footer section-small-space">
            <div class="reserve">
                <h6 class="text-content">©2022 Fastkart All rights reserved</h6>
            </div>

            <div class="payment">
                <img src="../public/assets_client/images/payment/1.png" class="blur-up lazyload" alt="">
            </div>

            <div class="social-link">
                <h6 class="text-content">Stay connected :</h6>
                <ul>
                    <li>
                        <a href="https://www.facebook.com/" target="_blank">
                            <i class="fa-brands fa-facebook-f"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://twitter.com/" target="_blank">
                            <i class="fa-brands fa-twitter"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com/" target="_blank">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://in.pinterest.com/" target="_blank">
                            <i class="fa-brands fa-pinterest-p"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Section End -->

<!-- Location Modal Start -->
<div class="modal location-modal fade theme-modal" id="locationModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Choose your Delivery Location</h5>
                <p class="mt-1 text-content">Enter your address and we will specify the offer for your area.</p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="location-list">
                    <div class="search-input">
                        <input type="search" class="form-control" placeholder="Search Your Area">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </div>

                    <div class="disabled-box">
                        <h6>Select a Location</h6>
                    </div>

                    <ul class="location-select custom-height">
                        <li>
                            <a href="javascript:void(0)">
                                <h6>Alabama</h6>
                                <span>Min: $130</span>
                            </a>
                        </li>

                        <li>
                            <a href="javascript:void(0)">
                                <h6>Arizona</h6>
                                <span>Min: $150</span>
                            </a>
                        </li>

                        <li>
                            <a href="javascript:void(0)">
                                <h6>California</h6>
                                <span>Min: $110</span>
                            </a>
                        </li>

                        <li>
                            <a href="javascript:void(0)">
                                <h6>Colorado</h6>
                                <span>Min: $140</span>
                            </a>
                        </li>

                        <li>
                            <a href="javascript:void(0)">
                                <h6>Florida</h6>
                                <span>Min: $160</span>
                            </a>
                        </li>

                        <li>
                            <a href="javascript:void(0)">
                                <h6>Georgia</h6>
                                <span>Min: $120</span>
                            </a>
                        </li>

                        <li>
                            <a href="javascript:void(0)">
                                <h6>Kansas</h6>
                                <span>Min: $170</span>
                            </a>
                        </li>

                        <li>
                            <a href="javascript:void(0)">
                                <h6>Minnesota</h6>
                                <span>Min: $120</span>
                            </a>
                        </li>

                        <li>
                            <a href="javascript:void(0)">
                                <h6>New York</h6>
                                <span>Min: $110</span>
                            </a>
                        </li>

                        <li>
                            <a href="javascript:void(0)">
                                <h6>Washington</h6>
                                <span>Min: $130</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Location Modal End -->

<!-- Deal Box Modal Start -->
<div class="modal fade theme-modal deal-modal" id="deal-box" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down">
        <div class="modal-content">
            <div class="modal-header">
                <div>
                    <h5 class="modal-title w-100" id="deal_today">Deal Today</h5>
                    <p class="mt-1 text-content">Recommended deals for you.</p>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="deal-offer-box">
                    <ul class="deal-offer-list">
                        <li class="list-1">
                            <div class="deal-offer-contain">
                                <a href="shop-left-sidebar.html" class="deal-image">
                                    <img src="../public/assets_client/images/vegetable/product/10.png" class="blur-up lazyload" alt="">
                                </a>

                                <a href="shop-left-sidebar.html" class="deal-contain">
                                    <h5>Blended Instant Coffee 50 g Buy 1 Get 1 Free</h5>
                                    <h6>$52.57 <del>57.62</del> <span>500 G</span></h6>
                                </a>
                            </div>
                        </li>

                        <li class="list-2">
                            <div class="deal-offer-contain">
                                <a href="shop-left-sidebar.html" class="deal-image">
                                    <img src="../public/assets_client/images/vegetable/product/11.png" class="blur-up lazyload" alt="">
                                </a>

                                <a href="shop-left-sidebar.html" class="deal-contain">
                                    <h5>Blended Instant Coffee 50 g Buy 1 Get 1 Free</h5>
                                    <h6>$52.57 <del>57.62</del> <span>500 G</span></h6>
                                </a>
                            </div>
                        </li>

                        <li class="list-3">
                            <div class="deal-offer-contain">
                                <a href="shop-left-sidebar.html" class="deal-image">
                                    <img src="../public/assets_client/images/vegetable/product/12.png" class="blur-up lazyload" alt="">
                                </a>

                                <a href="shop-left-sidebar.html" class="deal-contain">
                                    <h5>Blended Instant Coffee 50 g Buy 1 Get 1 Free</h5>
                                    <h6>$52.57 <del>57.62</del> <span>500 G</span></h6>
                                </a>
                            </div>
                        </li>

                        <li class="list-1">
                            <div class="deal-offer-contain">
                                <a href="shop-left-sidebar.html" class="deal-image">
                                    <img src="../public/assets_client/images/vegetable/product/13.png" class="blur-up lazyload" alt="">
                                </a>

                                <a href="shop-left-sidebar.html" class="deal-contain">
                                    <h5>Blended Instant Coffee 50 g Buy 1 Get 1 Free</h5>
                                    <h6>$52.57 <del>57.62</del> <span>500 G</span></h6>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Deal Box Modal End -->

<!-- Tap to top start -->
<div class="theme-option">
    <div class="setting-box">
        <button class="btn setting-button">
            <i class="fa-solid fa-gear"></i>
        </button>

        <div class="theme-setting-2">
            <div class="theme-box">
                <ul>
                    <li>
                        <div class="setting-name">
                            <h4>Color</h4>
                        </div>
                        <div class="theme-setting-button color-picker">
                            <form class="form-control">
                                <label for="colorPick" class="form-label mb-0">Theme Color</label>
                                <input type="color" class="form-control form-control-color" id="colorPick" value="#0da487" title="Choose your color">
                            </form>
                        </div>
                    </li>

                    <li>
                        <div class="setting-name">
                            <h4>Dark</h4>
                        </div>
                        <div class="theme-setting-button">
                            <button class="btn btn-2 outline" id="darkButton">Dark</button>
                            <button class="btn btn-2 unline" id="lightButton">Light</button>
                        </div>
                    </li>

                    <li>
                        <div class="setting-name">
                            <h4>RTL</h4>
                        </div>
                        <div class="theme-setting-button rtl">
                            <button class="btn btn-2 rtl-unline">LTR</button>
                            <button class="btn btn-2 rtl-outline">RTL</button>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="back-to-top">
        <a id="back-to-top" href="#">
            <i class="fas fa-chevron-up"></i>
        </a>
    </div>
</div>
<!-- Tap to top end -->

<!-- Bg overlay Start -->
<div class="bg-overlay"></div>
<!-- Bg overlay End -->

<!-- latest jquery-->
<script src="../public/assets_client/js/jquery-3.6.0.min.js"></script>

<!-- jquery ui-->
<script src="../public/assets_client/js/jquery-ui.min.js"></script>

<!-- Bootstrap js-->
<script src="../public/assets_client/js/bootstrap/bootstrap.bundle.min.js"></script>
<script src="../public/assets_client/js/bootstrap/popper.min.js"></script>
<script src="../public/assets_client/js/bootstrap/bootstrap-notify.min.js"></script>

<!-- feather icon js-->
<script src="../public/assets_client/js/feather/feather.min.js"></script>
<script src="../public/assets_client/js/feather/feather-icon.js"></script>

<!-- Lazyload Js -->
<script src="../public/assets_client/js/lazysizes.min.js"></script>

<!-- Slick js-->
<script src="../public/assets_client/js/slick/slick.js"></script>
<script src="../public/assets_client/js/slick/custom_slick.js"></script>

<!-- Quantity js -->
<script src="../public/assets_client/js/quantity.js"></script>

<!-- script js -->
<script src="../public/assets_client/js/script.js"></script>

<!-- thme setting js -->
<script src="../public/assets_client/js/theme-setting.js"></script>
</body>

</html>

<?php

include_once __DIR__ . '/../inc/_footer.inc.php';
?>