<?php

include_once __DIR__ . '/../inc/_header.admin.inc.php';
$product1 = $reviewclass->show_review();

?>

<div class="page-body">

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table">
                    <!-- Table Start -->
                    <div class="card-body">
                        <div class="title-header option-title">
                            <h5>Product Reviews</h5>
                        </div>
                        <div>
                            <div class="table-responsive">
                                <table class="user-table ticket-table review-table theme-table table" id="table_id">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Customer Name</th>
                                            <th>Product Name</th>
                                            <th>Rating</th>
                                            <th>Comment</th>
                                            <th>Published</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (isset($product1)) {
                                            if ($product1 && $product1->num_rows > 0) {
                                                $is = 0;
                                                while ($result = $product1->fetch_assoc()) {
                                                    $is++
                                        ?>
                                                    <tr>
                                                        <td><?php echo $is ?></td>
                                                        <td><?php echo $result['name'] ?></td>
                                                        <td><?php echo $result['product_name'] ?></td>
                                                        <td>
                                                            <ul class="rating">
                                                                <?php
                                                                for ($i = 0; $i < 5; $i++) {
                                                                    if ($i < $result['rate']) {
                                                                ?> <li>
                                                                            <i class="fas fa-star theme-color"></i>
                                                                        </li>
                                                                    <?php
                                                                    } else {

                                                                    ?> <li>
                                                                            <i class="fas fa-star"></i>
                                                                        </li>
                                                                <?php


                                                                    }
                                                                }
                                                                ?>


                                                            </ul>
                                                        </td>
                                                        <td><?php echo $result['description'] ?></td>
                                                        <td class="td-check">
                                                            <i class="ri-checkbox-circle-line"></i>
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
                    <!-- Table End -->
                </div>
            </div>
        </div>
    </div>

    <!-- Container-fluid Ends-->

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