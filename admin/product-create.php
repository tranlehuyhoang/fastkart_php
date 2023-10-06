<?php

include_once __DIR__ . '/../inc/_header.admin.inc.php';
?>

<div class="page-body">

    <!-- New Product Add Start -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-sm-8 m-auto">
                        <form class="theme-form theme-form-2 mega-form" method="POST" action="../public/admin/product" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="IjlXCCKF9soniAQd9wZ3xXCpwSfgtKbM0Q4i33vy" autocomplete="off" data-bs-original-title="" title="">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-header-2">
                                        <h5>Product Information</h5>
                                    </div>

                                    <div class="mb-4 row align-items-center">
                                        <label class="form-label-title col-sm-3 mb-0">Product
                                            Name</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" placeholder="Product Name" name="name" data-bs-original-title="" title="">
                                        </div>
                                    </div>



                                    <div class="mb-4 row align-items-center">
                                        <label class="col-sm-3 col-form-label form-label-title">Category</label>
                                        <div class="col-sm-9">
                                            <select class="js-example-basic-single w-100" name="category">
                                                <option disabled="">Category Menu</option>
                                                <option value="5">rau củ</option>
                                                <option value="4">rau củ</option>
                                                <option value="3">rau củ</option>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="mb-4 row align-items-center">
                                        <label class="form-label-title col-sm-3 mb-0">Product
                                            Price</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="number" name="price" data-bs-original-title="" title="">
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
                                                <input class="form-control form-choose" name="image" type="file" id="formFile" multiple="" data-bs-original-title="" title="">
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary ms-auto mt-4" data-bs-original-title="" title="">Save</button>
                        </form>

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