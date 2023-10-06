<?php

include_once __DIR__ . '/../inc/_header.admin.inc.php';
$product1 = $invoiceclass->get_order_admin();

?>
<div class="page-body">
    <!-- Table Start -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table">
                    <div class="card-body">
                        <div class="title-header option-title">
                            <h5>Order List</h5>
                            <a href="#" class="btn btn-solid" data-bs-original-title="" title="">Download all orders</a>
                        </div>
                        <div>
                            <div class="table-responsive">
                                <table class="table all-package order-table theme-table" id="table_id">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Order </th>
                                            <th>Order Code</th>
                                            <th>Date</th>
                                            <th>Email</th>

                                            <th>Delivery Status</th>
                                            <th>Amount</th>
                                            <th>Option</th>
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

                                        <tr data-bs-toggle="offcanvas" href="#order-details">
                                            <td>#<?php echo $iz ?></td>

                                            <td>
                                                <a class="d-block" data-bs-original-title="" title="">
                                                    <span class="order-image">
                                                        <img src="../public/assets_client/box.png" class="img-fluid"
                                                            alt="users">
                                                    </span>
                                                </a>
                                            </td>

                                            <td>#<?php echo $result['code'] ?></td>

                                            <td><?php echo $result['created_at'] ?></td>


                                            <td><?php echo $result['users_email'] ?></td>
                                            <td class="order-success">
                                                <span>Success</span>
                                            </td>

                                            <td>$15</td>

                                            <td>
                                                <ul>

                                                    <li>
                                                        <a class="btn btn-sm btn-solid text-white"
                                                            href="./order-detail.php?bill=<?php echo $result['id'] ?>"
                                                            data-bs-original-title="" title="">
                                                            Details
                                                        </a>
                                                    </li>
                                                </ul>
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
                </div>
            </div>
        </div>
    </div>
    <!-- Table End -->

    <!-- footer start-->
    <div class="container-fluid">
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