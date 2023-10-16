<?php

include_once __DIR__ . '/../inc/_header.admin.inc.php';
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['catid'])) {
    $catedit =  $categoryclass->getcatbyId($_GET['catid']);
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $catedit =  $categoryclass->update_category($_POST, $_GET['catid']);
}
?>

<div class="page-body">

    <!-- New Product Add Start -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-sm-8 m-auto">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-header-2">
                                    <h5>Category Information</h5>
                                </div>
                                <?php
                                if (isset($catedit)) {
                                    if ($catedit && $catedit->num_rows > 0) {
                                        $i = 0;
                                        while ($result = $catedit->fetch_assoc()) {
                                            # code...
                                ?>
                                <form class="theme-form theme-form-2 mega-form" method="POST" action=""
                                    enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="IjlXCCKF9soniAQd9wZ3xXCpwSfgtKbM0Q4i33vy"
                                        autocomplete="off" data-bs-original-title="" title="">
                                    <div class="mb-4 row align-items-center">
                                        <label class="form-label-title col-sm-3 mb-0">Category Name</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="name"
                                                value="<?php echo $result['name'] ?>" placeholder="Category Name"
                                                data-bs-original-title="" title="">
                                        </div>
                                    </div>

                                    <div class="mb-4 row align-items-center">
                                        <label class="col-sm-3 col-form-label form-label-title">Category
                                            Image</label>
                                        <div class="form-group col-sm-9">
                                            <div class="dropzone-wrapper">
                                                <div class="dropzone-desc">
                                                    <i class="ri-upload-2-line"></i>
                                                    <p>Choose an image file or drag it here.</p>
                                                </div>
                                                <input type="file" name="image" class="dropzone"
                                                    data-bs-original-title="" title="">
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