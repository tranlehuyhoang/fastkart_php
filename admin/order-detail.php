<?php

include_once __DIR__ . '/../inc/_header.admin.inc.php';
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['bill'])) {
    $product1 = $invoiceclass->get_invoice_admin($_GET['bill']);
}
?>
<div class="page-body">
    <!-- tracking table start -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="title-header title-header-block package-card">
                            <div>
                                <h5>Order #36648</h5>
                            </div>
                            <div class="card-order-section">
                                <ul>
                                    <li>October 21, 2021 at 9:08 pm</li>
                                    <li>6 items</li>
                                    <li>Total $5,882.00</li>
                                </ul>
                            </div>
                        </div>
                        <div class="bg-inner cart-section order-details-table">
                            <div class="row g-4">
                                <div class="col-xl-8">
                                    <div class="table-responsive table-details">
                                        <table class="table cart-table table-borderless">
                                            <thead>
                                                <tr>
                                                    <th colspan="2">Items</th>
                                                    <th class="text-end" colspan="2">
                                                        <a href="javascript:void(0)" class="theme-color">Edit
                                                            Items</a>
                                                    </th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php
                                                if (isset($product1)) {
                                                    if ($product1 && $product1->num_rows > 0) {
                                                        $iz = 0;
                                                        while ($result = $product1->fetch_assoc()) {
                                                            # code...$iz
                                                            $iz++;
                                                ?>
                                                <tr class="table-order">
                                                    <td>
                                                        <a href="javascript:void(0)">
                                                            <img src="../public/<?php echo $result['image'] ?>"
                                                                class="img-fluid blur-up lazyload" alt="">
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <p>Product Name</p>
                                                        <h5><?php echo $result['name'] ?></h5>
                                                    </td>
                                                    <td>
                                                        <p>Quantity</p>
                                                        <h5><?php echo $result['quantity'] ?></h5>
                                                    </td>
                                                    <td>
                                                        <p>Price</p>
                                                        <h5>$<?php echo $result['price'] ?>.00</h5>
                                                    </td>
                                                </tr>

                                                <?php
                                                            $i++;
                                                        }
                                                    } else {
                                                        ?> <?php
                                                    }
                                                } else {
                                                        ?> <?php
                                                    }
                                                        ?>
                                            </tbody>
                                            <?php
                                $get_invoice1 = $invoiceclass->get_invoice_admin( $_GET['bill']);

                                if (isset($get_invoice1)) {
                                    if ($get_invoice1 && $get_invoice1->num_rows > 0) {
                                        $totals = 0;
                                        $z = 0;
                                        while ($result = $get_invoice1->fetch_assoc()) {
                                            $totals += $result['total_price'];
                                            $z = $result['user'];
                                        }
                                    }
                                }
                                ?>
                                            <tfoot>
                                                <tr class="table-order">
                                                    <td colspan="3">
                                                        <h5>Subtotal :</h5>
                                                    </td>
                                                    <td>
                                                        <h4>$<?php echo $totals ?>.00</h4>
                                                    </td>
                                                </tr>

                                                <tr class="table-order">
                                                    <td colspan="3">
                                                        <h5>Shipping :</h5>
                                                    </td>
                                                    <td>
                                                        <h4>$0.00</h4>
                                                    </td>
                                                </tr>

                                                <tr class="table-order">
                                                    <td colspan="3">
                                                        <h5>Tax(GST) :</h5>
                                                    </td>
                                                    <td>
                                                        <h4>$0.00</h4>
                                                    </td>
                                                </tr>

                                                <tr class="table-order">
                                                    <td colspan="3">
                                                        <h4 class="theme-color fw-bold">Total Price :</h4>
                                                    </td>
                                                    <td>
                                                        <h4 class="theme-color fw-bold">$<?php echo $totals ?>.00</h4>
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>

                                <div class="col-xl-4">
                                    <div class="order-success">
                                        <div class="row g-4">
                                            <h4>summery</h4>
                                            <ul class="order-details">
                                                <li>Order ID: 5563853658932</li>
                                                <li>Order Date: October 22, 2018</li>
                                                <li>Order Total: $907.28</li>
                                            </ul>

                                            <h4>shipping address</h4>
                                            <ul class="order-details">
                                                <li>Gerg Harvell</li>
                                                <li>568, Suite Ave.</li>
                                                <li>Austrlia, 235153 Contact No. 48465465465</li>
                                            </ul>

                                            <div class="payment-mode">
                                                <h4>payment method</h4>
                                                <p>Pay on Delivery (Cash/Card). Cash on delivery (COD)
                                                    available. Card/Net banking acceptance subject to device
                                                    availability.</p>
                                            </div>

                                            <div class="delivery-sec">
                                                <h3>expected date of delivery: <span>october 22, 2018</span>
                                                </h3>
                                                <a href="order-tracking.html">track order</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- section end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- tracking table end -->

    <div class="container-fluid">
        <!-- footer start-->
        <footer class="footer">
            <div class="row">
                <div class="col-md-12 footer-copyright text-center">
                    <p class="mb-0">Copyright 2022 © Fastkart theme by pixelstrap</p>
                </div>
            </div>
        </footer>
    </div>
</div>

<?php
include_once __DIR__ . '/../inc/_footer.admin.inc.php';
?>