<?php

include_once __DIR__ . '/../inc/_header.admin.inc.php';
$product1 = $categoryclass->show_category();
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['proid'])) {
    $productedit =  $productclass->getProductsByid($_GET['proid']);
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productclass->update_product($_POST, $_GET['proid']);
}

?>

<div class="page-body">

    <!-- New Product Add Start -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-sm-8 m-auto">
                        <?php
                        if (isset($productedit)) {
                            if ($productedit && $productedit->num_rows > 0) {
                                $i = 0;
                                while ($results = $productedit->fetch_assoc()) {
                                    # code...
                        ?>
                        <form class="theme-form theme-form-2 mega-form" method="POST" action=""
                            enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="IjlXCCKF9soniAQd9wZ3xXCpwSfgtKbM0Q4i33vy"
                                autocomplete="off" data-bs-original-title="" title="">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-header-2">
                                        <h5>Product Information</h5>
                                    </div>

                                    <div class="mb-4 row align-items-center">
                                        <label class="form-label-title col-sm-3 mb-0">Product
                                            Name</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" value="<?php echo $results['name'] ?>"
                                                type="text" placeholder="Product Name" name="name"
                                                data-bs-original-title="" title="">
                                        </div>
                                    </div>



                                    <div class="mb-4 row align-items-center">
                                        <label class="col-sm-3 col-form-label form-label-title">Category</label>
                                        <div class="col-sm-9">
                                            <select class="js-example-basic-single w-100" name="category">
                                                <option disabled="">Category Menu</option>
                                                <?php
                                                            if (isset($product1)) {
                                                                if ($product1 && $product1->num_rows > 0) {
                                                                    $i = 0;
                                                                    while ($result = $product1->fetch_assoc()) {
                                                                        # code...
                                                            ?>
                                                <option <?php if ($result['id'] == $results['category']) {
                                                                                    echo 'selected';
                                                                                } ?>
                                                    value="<?php echo $result['id'] ?>">
                                                    <?php echo $result['name'] ?></option>
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

                                            </select>
                                        </div>
                                    </div>

                                    <div class="mb-4 row align-items-center">
                                        <label class="form-label-title col-sm-3 mb-0">Product
                                            Price</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="number" name="price"
                                                value="<?php echo $results['price'] ?>" data-bs-original-title=""
                                                title="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-header-2">
                                        <h5>Product Images</h5>
                                    </div>
                                    <div class="theme-form theme-form-2 mega-form">
                                        <div class="mb-4 row align-items-center">
                                            <label class="col-sm-3 col-form-label form-label-title">Images</label>
                                            <div class="col-sm-9">
                                                <input class="form-control form-choose" name="image" type="file"
                                                    id="formFile" multiple="" data-bs-original-title="" title="">
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary ms-auto mt-4" data-bs-original-title=""
                                title="">Save</button>
                        </form>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- New Product Add End -->

    <!-- footer Start -->
    <div class="container-fluid">
        <footer class="footer">
            <div class="row">
                <div class="col-md-12 footer-copyright text-center">
                    <p class="mb-0">Copyright 2022 © Fastkart theme by pixelstrap</p>
                </div>
            </div>
        </footer>
    </div>
    <!-- footer En -->
</div>

<?php

include_once __DIR__ . '/../inc/_footer.admin.inc.php';
?>