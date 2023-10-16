<?php

include_once __DIR__ . '/../inc/_header.admin.inc.php';
$product1 = $productclass->show_product();
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete'])) {
    $productclass->delete_product($_GET['delete']);
    echo "<script>window.location.href = './product.php';</script>";
}
?>


<div class="page-body">


    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table">
                    <div class="card-body">
                        <div class="title-header option-title d-sm-flex d-block">
                            <h5>Products List</h5>
                            <div class="right-options">
                                <ul>
                                    <li>
                                        <a href="javascript:void(0)">import</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">Export</a>
                                    </li>
                                    <li>
                                        <a class="btn btn-solid" href="add-new-product.html">Add Product</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div>
                            <div class="table-responsive">
                                <table class="table all-package theme-table table-product" id="table_id">
                                    <thead>
                                        <tr>
                                            <th>Product Image</th>
                                            <th>Product Name</th>
                                            <th>Category</th>

                                            <th>Price</th>

                                            <th>Option</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        if (isset($product1)) {
                                            if ($product1 && $product1->num_rows > 0) {
                                                $i = 0;
                                                while ($result = $product1->fetch_assoc()) {
                                                    # code...
                                        ?>
                                        <tr>
                                            <td>
                                                <div class="table-image">
                                                    <img src="../public/<?php echo $result['image'] ?>"
                                                        class="img-fluid" alt="">
                                                </div>
                                            </td>

                                            <td><?php echo $result['name'] ?></td>
                                            <td>rau củ</td>




                                            <td class="td-price">$<?php echo $result['price'] ?></td>



                                            <td>
                                                <ul>
                                                    <li>
                                                        <a href="order-detail.html">
                                                            <i class="ri-eye-line"></i>
                                                        </a>
                                                    </li>

                                                    <li>
                                                        <a href="./product-edit.php?proid=<?php echo $result['id'] ?>">
                                                            <i class="ri-pencil-line"></i>
                                                        </a>
                                                    </li>

                                                    <li>
                                                        <a href="./product.php?delete=<?php echo $result['id'] ?>">
                                                            <i class="ri-delete-bin-line"></i>
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

    <?php

    include_once __DIR__ . '/../inc/_footer.admin.inc.php';
    ?>