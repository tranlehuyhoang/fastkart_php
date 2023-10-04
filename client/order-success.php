<?php

include_once __DIR__ . '/../inc/_header.inc.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['bill'])) {

    $getbill = $invoiceclass->getbill($_GET['bill']);
    $getbill1 = $invoiceclass->getbill($_GET['bill']);
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // echo $_POST['totalPrice'];
    // echo $_POST['status'];
    $invoiceclass->re_payment($_POST['status'], $_POST['totalPrice']);
}
?>

<!-- Breadcrumb Section Start -->
<section class="breadscrumb-section pt-0">
    <div class="container-fluid-lg">
        <div class="row">
            <div class="col-12">
                <div class="breadscrumb-contain breadscrumb-order">
                    <div class="order-box">
                        <div class="order-image">
                            <div class="checkmark">
                                <svg class="star" height="19" viewBox="0 0 19 19" width="19"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M8.296.747c.532-.972 1.393-.973 1.925 0l2.665 4.872 4.876 2.66c.974.532.975 1.393 0 1.926l-4.875 2.666-2.664 4.876c-.53.972-1.39.973-1.924 0l-2.664-4.876L.76 10.206c-.972-.532-.973-1.393 0-1.925l4.872-2.66L8.296.746z">
                                    </path>
                                </svg>
                                <svg class="star" height="19" viewBox="0 0 19 19" width="19"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M8.296.747c.532-.972 1.393-.973 1.925 0l2.665 4.872 4.876 2.66c.974.532.975 1.393 0 1.926l-4.875 2.666-2.664 4.876c-.53.972-1.39.973-1.924 0l-2.664-4.876L.76 10.206c-.972-.532-.973-1.393 0-1.925l4.872-2.66L8.296.746z">
                                    </path>
                                </svg>
                                <svg class="star" height="19" viewBox="0 0 19 19" width="19"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M8.296.747c.532-.972 1.393-.973 1.925 0l2.665 4.872 4.876 2.66c.974.532.975 1.393 0 1.926l-4.875 2.666-2.664 4.876c-.53.972-1.39.973-1.924 0l-2.664-4.876L.76 10.206c-.972-.532-.973-1.393 0-1.925l4.872-2.66L8.296.746z">
                                    </path>
                                </svg>
                                <svg class="star" height="19" viewBox="0 0 19 19" width="19"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M8.296.747c.532-.972 1.393-.973 1.925 0l2.665 4.872 4.876 2.66c.974.532.975 1.393 0 1.926l-4.875 2.666-2.664 4.876c-.53.972-1.39.973-1.924 0l-2.664-4.876L.76 10.206c-.972-.532-.973-1.393 0-1.925l4.872-2.66L8.296.746z">
                                    </path>
                                </svg>
                                <svg class="star" height="19" viewBox="0 0 19 19" width="19"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M8.296.747c.532-.972 1.393-.973 1.925 0l2.665 4.872 4.876 2.66c.974.532.975 1.393 0 1.926l-4.875 2.666-2.664 4.876c-.53.972-1.39.973-1.924 0l-2.664-4.876L.76 10.206c-.972-.532-.973-1.393 0-1.925l4.872-2.66L8.296.746z">
                                    </path>
                                </svg>
                                <svg class="star" height="19" viewBox="0 0 19 19" width="19"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M8.296.747c.532-.972 1.393-.973 1.925 0l2.665 4.872 4.876 2.66c.974.532.975 1.393 0 1.926l-4.875 2.666-2.664 4.876c-.53.972-1.39.973-1.924 0l-2.664-4.876L.76 10.206c-.972-.532-.973-1.393 0-1.925l4.872-2.66L8.296.746z">
                                    </path>
                                </svg>
                                <svg class="checkmark__check" height="36" viewBox="0 0 48 36" width="48"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M47.248 3.9L43.906.667a2.428 2.428 0 0 0-3.344 0l-23.63 23.09-9.554-9.338a2.432 2.432 0 0 0-3.345 0L.692 17.654a2.236 2.236 0 0 0 .002 3.233l14.567 14.175c.926.894 2.42.894 3.342.01L47.248 7.128c.922-.89.922-2.34 0-3.23">
                                    </path>
                                </svg>
                                <svg class="checkmark__background" height="115" viewBox="0 0 120 115" width="120"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M107.332 72.938c-1.798 5.557 4.564 15.334 1.21 19.96-3.387 4.674-14.646 1.605-19.298 5.003-4.61 3.368-5.163 15.074-10.695 16.878-5.344 1.743-12.628-7.35-18.545-7.35-5.922 0-13.206 9.088-18.543 7.345-5.538-1.804-6.09-13.515-10.696-16.877-4.657-3.398-15.91-.334-19.297-5.002-3.356-4.627 3.006-14.404 1.208-19.962C10.93 67.576 0 63.442 0 57.5c0-5.943 10.93-10.076 12.668-15.438 1.798-5.557-4.564-15.334-1.21-19.96 3.387-4.674 14.646-1.605 19.298-5.003C35.366 13.73 35.92 2.025 41.45.22c5.344-1.743 12.628 7.35 18.545 7.35 5.922 0 13.206-9.088 18.543-7.345 5.538 1.804 6.09 13.515 10.696 16.877 4.657 3.398 15.91.334 19.297 5.002 3.356 4.627-3.006 14.404-1.208 19.962C109.07 47.424 120 51.562 120 57.5c0 5.943-10.93 10.076-12.668 15.438z">
                                    </path>
                                </svg>
                            </div>
                        </div>

                        <div class="order-contain">
                            <h3 class="theme-color">Chưa thanh toán</h3>
                            <h5 class="text-content">Payment Is Successfully And Your Order Is On The Way</h5>
                            <h6>Transaction ID: 7447981838527103</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Cart Section Start -->
<section class="cart-section section-b-space">
    <div class="container-fluid-lg">
        <div class="row g-sm-4 g-3">
            <div class="col-xxl-9 col-lg-8">
                <div class="cart-table order-table order-table-2">
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <tbody>
                                <?php
                                if (isset($getbill)) {
                                    if ($getbill && $getbill->num_rows > 0) {
                                        $i = 0;
                                        while ($result = $getbill->fetch_assoc()) {
                                            $i +=  $result['total_price'];
                                            // echo '<pre>';
                                            // print_r($result);
                                            // echo '</pre>';
                                ?>
                                <tr>
                                    <td class="product-detail">
                                        <div class="product border-0">
                                            <a href="product.left-sidebar.html" class="product-image">
                                                <img src="../public/<?php echo $result['image'] ?>" class=" img-fluid
                                                    blur-up lazyload" alt="">
                                            </a>
                                            <div class="product-detail">
                                                <ul>
                                                    <li class="name">
                                                        <a
                                                            href="product-left-thumbnail.html"><?php echo $result['name'] ?></a>
                                                    </li>

                                                    <li class="text-content">Category:
                                                        <?php echo $result['category_name'] ?></li>


                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="price">
                                        <h4 class="table-title text-content">Price</h4>
                                        <h6 class="theme-color">$<?php echo $result['price'] ?></h6>
                                    </td>

                                    <td class="quantity">
                                        <h4 class="table-title text-content">Qty</h4>
                                        <h4 class="text-title"><?php echo $result['quantity'] ?></h4>
                                    </td>

                                    <td class="subtotal">
                                        <h4 class="table-title text-content">Total</h4>

                                        <h5>$<?php echo $result['total_price'] ?>.00</h5>
                                    </td>
                                </tr>

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


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <?php
            if (isset($getbill1)) {
                if ($getbill1 && $getbill1->num_rows > 0) {
                    $i = 0;
                    $z = 0;
                    $status = 0;
                    while ($result = $getbill1->fetch_assoc()) {
                        $i +=  $result['total_price'];
                        $z +=  $result['quantity'];
                        $status =  $result['status'];
                        // echo '<pre>';
                        // print_r($result);
                        // echo '</pre>';
            ?>

            <?php

                    }
                    ?>
            <div class="col-xxl-3 col-lg-4">
                <div class="row g-4">
                    <div class="col-lg-12 col-sm-6">
                        <div class="summery-box">
                            <div class="summery-header">
                                <h3>Price Details</h3>
                                <h5 class="ms-auto theme-color">(<?php echo $z ?> Items)</h5>
                            </div>

                            <ul class="summery-contain">
                                <li>
                                    <h4>Sub Total</h4>
                                    <h4 class="price">$<?php echo $i ?>.00</h4>
                                </li>

                                <li>
                                    <h4>Vegetables Saving</h4>
                                    <h4 class="price theme-color">$0.00</h4>
                                </li>

                                <li>
                                    <h4>Coupon Discount</h4>
                                    <h4 class="price text-danger">$0.00</h4>
                                </li>
                            </ul>

                            <ul class="summery-total">
                                <li class="list-total">
                                    <h4>Total (USD)</h4>
                                    <h4 class="price">$<?php echo $i ?>.00</h4>
                                </li>
                            </ul>
                            <form class="summery-total" action="" method="post">

                                <input type="number" style="display: none" value="<?php echo $status ?>" name="status">
                                <input type="number" style="display: none" value="<?php echo $i ?>" name="totalPrice">
                                <button type="submit"
                                    class="btn theme-bg-color text-white btn-md w-100 mt-4 fw-bold">Thanh
                                    toán</button>

                            </form>
                        </div>
                    </div>

                    <div class="col-lg-12 col-sm-6">
                        <div class="summery-box">
                            <div class="summery-header d-block">
                                <h3>Shipping Address</h3>
                            </div>

                            <ul class="summery-contain pb-0 border-bottom-0">
                                <li class="d-block">
                                    <h4>8424 James Lane South</h4>
                                    <h4 class="mt-2">San Francisco, CA 94080</h4>
                                </li>

                                <li class="pb-0">
                                    <h4>Expected Date Of Delivery:</h4>
                                    <h4 class="price theme-color">

                                    </h4>
                                </li>
                            </ul>

                            <ul class="summery-total">
                                <li class="list-total border-top-0 pt-2">
                                    <h4 class="fw-bold">Oct 21, 2021</h4>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="summery-box">
                            <div class="summery-header d-block">
                                <h3>Payment Method</h3>
                            </div>

                            <ul class="summery-contain pb-0 border-bottom-0">
                                <li class="d-block pt-0">
                                    <p class="text-content">Pay on Delivery (Cash/Card). Cash on delivery (COD)
                                        available. Card/Net banking acceptance subject to device availability.</p>
                                </li>
                            </ul>
                        </div>
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
<?php

include_once __DIR__ . '/../inc/_footer.inc.php';
?>