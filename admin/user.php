<?php

include_once __DIR__ . '/../inc/_header.admin.inc.php';
$product1 = $userclass->show_user();
?>

<div class="page-body">
    <!-- All User Table Start -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table">
                    <div class="card-body">
                        <div class="title-header option-title">
                            <h5>All Users</h5>
                            <form class="d-inline-flex">
                                <a href="add-new-user.html" class="align-items-center btn btn-theme d-flex" data-bs-original-title="" title="">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus">
                                        <line x1="12" y1="5" x2="12" y2="19"></line>
                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                    </svg>Add New
                                </a>
                            </form>
                        </div>

                        <div class="table-responsive table-product">
                            <table class="table all-package theme-table" id="table_id">
                                <thead>
                                    <tr>
                                        <th>User</th>
                                        <th>Name</th>

                                        <th>Email</th>
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
                                                            <img src="../public/assets_admin/images/users/5.jpg" class="img-fluid" alt="">
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class="user-name">
                                                            <span><?php echo $result['name'] ?></span>
                                                            <span><?php echo $result['role'] == '1' ? 'Admin' : 'User' ?></span>
                                                        </div>
                                                    </td>



                                                    <td><?php echo $result['email'] ?></td>

                                                    <td>
                                                        <ul>
                                                            <li>
                                                                <a href="order-detail.html" data-bs-original-title="" title="">
                                                                    <i class="ri-eye-line"></i>
                                                                </a>
                                                            </li>

                                                            <li>
                                                                <a href="javascript:void(0)" data-bs-original-title="" title="">
                                                                    <i class="ri-pencil-line"></i>
                                                                </a>
                                                            </li>

                                                            <li>
                                                                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#exampleModalToggle" data-bs-original-title="" title="">
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
    <!-- All User Table Ends-->

    <div class="container-fluid">
        <!-- footer start-->
        <footer class="footer">
            <div class="row">
                <div class="col-md-12 footer-copyright text-center">
                    <p class="mb-0">Copyright 2022 © Fastkart theme by pixelstrap</p>
                </div>
            </div>
        </footer>
        <!-- footer end-->
    </div>
</div>

<?php

include_once __DIR__ . '/../inc/_footer.admin.inc.php';
?>