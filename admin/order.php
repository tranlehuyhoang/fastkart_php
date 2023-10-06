<?php

include_once __DIR__ . '/../inc/_header.admin.inc.php';
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
                                            <th>Order Image</th>
                                            <th>Order Code</th>
                                            <th>Date</th>
                                            <th>Payment Method</th>
                                            <th>Delivery Status</th>
                                            <th>Amount</th>
                                            <th>Option</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr data-bs-toggle="offcanvas" href="#order-details">
                                            <td>
                                                <a class="d-block" data-bs-original-title="" title="">
                                                    <span class="order-image">
                                                        <img src="../public/assets_admin/images/product/1.png"
                                                            class="img-fluid" alt="users">
                                                    </span>
                                                </a>
                                            </td>

                                            <td> 406-4883635</td>

                                            <td>Jul 20, 2022</td>

                                            <td>Paypal</td>

                                            <td class="order-success">
                                                <span>Success</span>
                                            </td>

                                            <td>$15</td>

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
                                                        <a href="javascript:void(0)" data-bs-toggle="modal"
                                                            data-bs-target="#exampleModalToggle"
                                                            data-bs-original-title="" title="">
                                                            <i class="ri-delete-bin-line"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="btn btn-sm btn-solid text-white"
                                                            href="order-tracking.html" data-bs-original-title=""
                                                            title="">
                                                            Tracking
                                                        </a>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>

                                        <tr data-bs-toggle="offcanvas" href="#order-details">
                                            <td>
                                                <span class="order-image">
                                                    <img src="../public/assets_admin/images/product/2.png" alt="users">
                                                </span>
                                            </td>

                                            <td> 573-685572</td>

                                            <td>Jul 25, 2022</td>

                                            <td>Paypal</td>

                                            <td class="order-success">
                                                <span>Success</span>
                                            </td>

                                            <td>$15</td>

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
                                                        <a href="javascript:void(0)" data-bs-toggle="modal"
                                                            data-bs-target="#exampleModalToggle"
                                                            data-bs-original-title="" title="">
                                                            <i class="ri-delete-bin-line"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="btn btn-sm btn-solid text-white"
                                                            href="order-tracking.html" data-bs-original-title=""
                                                            title="">
                                                            Tracking
                                                        </a>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>

                                        <tr data-bs-toggle="offcanvas" href="#order-details">
                                            <td>
                                                <span class="order-image">
                                                    <img src="../public/assets_admin/images/product/3.png" alt="users">
                                                </span>
                                            </td>

                                            <td> 759-4568734</td>

                                            <td>Jul 29, 2022</td>

                                            <td>Stripe</td>

                                            <td class="order-pending">
                                                <span>Pending</span>
                                            </td>

                                            <td>$15</td>

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
                                                        <a href="javascript:void(0)" data-bs-toggle="modal"
                                                            data-bs-target="#exampleModalToggle"
                                                            data-bs-original-title="" title="">
                                                            <i class="ri-delete-bin-line"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="btn btn-sm btn-solid text-white"
                                                            href="order-tracking.html" data-bs-original-title=""
                                                            title="">
                                                            Tracking
                                                        </a>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>

                                        <tr data-bs-toggle="offcanvas" href="#order-details">
                                            <td>
                                                <span class="order-image">
                                                    <img src="../public/assets_admin/images/product/4.png" alt="users">
                                                </span>
                                            </td>

                                            <td> 546-7664537</td>

                                            <td>Jul 30, 2022</td>

                                            <td>Paypal</td>

                                            <td class="order-success">
                                                <span>Success</span>
                                            </td>

                                            <td>$15</td>

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
                                                        <a href="javascript:void(0)" data-bs-toggle="modal"
                                                            data-bs-target="#exampleModalToggle"
                                                            data-bs-original-title="" title="">
                                                            <i class="ri-delete-bin-line"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="btn btn-sm btn-solid text-white"
                                                            href="order-tracking.html" data-bs-original-title=""
                                                            title="">
                                                            Tracking
                                                        </a>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>

                                        <tr data-bs-toggle="offcanvas" href="#order-details">
                                            <td>
                                                <span class="order-image">
                                                    <img src="../public/assets_admin/images/product/5.png" alt="users">
                                                </span>
                                            </td>

                                            <td> 479-7533144</td>

                                            <td>Aug 01, 2022</td>

                                            <td>Stripe</td>

                                            <td class="order-success">
                                                <span>Success</span>
                                            </td>

                                            <td>$15</td>

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
                                                        <a href="javascript:void(0)" data-bs-toggle="modal"
                                                            data-bs-target="#exampleModalToggle"
                                                            data-bs-original-title="" title="">
                                                            <i class="ri-delete-bin-line"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="btn btn-sm btn-solid text-white"
                                                            href="order-tracking.html" data-bs-original-title=""
                                                            title="">
                                                            Tracking
                                                        </a>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>

                                        <tr data-bs-toggle="offcanvas" href="#order-details">
                                            <td>
                                                <span class="order-image">
                                                    <img src="../public/assets_admin/images/product/6.png" alt="users">
                                                </span>
                                            </td>

                                            <td> 456-1245789</td>

                                            <td>Aug 10, 2022</td>

                                            <td>Stripe</td>

                                            <td class="order-cancle">
                                                <span>Cancel</span>
                                            </td>

                                            <td>$15</td>

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
                                                        <a href="javascript:void(0)" data-bs-toggle="modal"
                                                            data-bs-target="#exampleModalToggle"
                                                            data-bs-original-title="" title="">
                                                            <i class="ri-delete-bin-line"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="btn btn-sm btn-solid text-white"
                                                            href="order-tracking.html" data-bs-original-title=""
                                                            title="">
                                                            Tracking
                                                        </a>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>

                                        <tr data-bs-toggle="offcanvas" href="#order-details">
                                            <td>
                                                <span class="order-image">
                                                    <img src="../public/assets_admin/images/product/7.png" alt="users">
                                                </span>
                                            </td>

                                            <td> 057-3657895</td>

                                            <td>Aug 18, 2022</td>

                                            <td>Paypal</td>

                                            <td class="order-cancle">
                                                <span>Cancel</span>
                                            </td>

                                            <td>$15</td>

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
                                                        <a href="javascript:void(0)" data-bs-toggle="modal"
                                                            data-bs-target="#exampleModalToggle"
                                                            data-bs-original-title="" title="">
                                                            <i class="ri-delete-bin-line"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="btn btn-sm btn-solid text-white"
                                                            href="order-tracking.html" data-bs-original-title=""
                                                            title="">
                                                            Tracking
                                                        </a>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>

                                        <tr data-bs-toggle="offcanvas" href="#order-details">
                                            <td>
                                                <span class="order-image">
                                                    <img src="../public/assets_admin/images/product/8.png" alt="users">
                                                </span>
                                            </td>

                                            <td> 123-1234567</td>

                                            <td>Aug 29, 2022</td>

                                            <td>Paypla</td>

                                            <td class="order-success">
                                                <span>Success</span>
                                            </td>

                                            <td>$15</td>

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
                                                        <a href="javascript:void(0)" data-bs-toggle="modal"
                                                            data-bs-target="#exampleModalToggle"
                                                            data-bs-original-title="" title="">
                                                            <i class="ri-delete-bin-line"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="btn btn-sm btn-solid text-white"
                                                            href="order-tracking.html" data-bs-original-title=""
                                                            title="">
                                                            Tracking
                                                        </a>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>

                                        <tr data-bs-toggle="offcanvas" href="#order-details">
                                            <td>
                                                <span class="order-image">
                                                    <img src="../public/assets_admin/images/product/9.png" alt="users">
                                                </span>
                                            </td>

                                            <td> 987-9876543</td>

                                            <td>Sep 09, 2022</td>

                                            <td>Paypal</td>

                                            <td class="order-success">
                                                <span>Success</span>
                                            </td>

                                            <td>$15</td>

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
                                                        <a href="javascript:void(0)" data-bs-toggle="modal"
                                                            data-bs-target="#exampleModalToggle"
                                                            data-bs-original-title="" title="">
                                                            <i class="ri-delete-bin-line"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="btn btn-sm btn-solid text-white"
                                                            href="order-tracking.html" data-bs-original-title=""
                                                            title="">
                                                            Tracking
                                                        </a>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>

                                        <tr data-bs-toggle="offcanvas" href="#order-details">
                                            <td>
                                                <span class="order-image">
                                                    <img src="../public/assets_admin/images/product/10.png" alt="users">
                                                </span>
                                            </td>

                                            <td> 147-3692584</td>

                                            <td>Sep 17, 2022</td>

                                            <td>Stripe</td>

                                            <td class="order-success">
                                                <span>Success</span>
                                            </td>

                                            <td>$15</td>

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
                                                        <a href="javascript:void(0)" data-bs-toggle="modal"
                                                            data-bs-target="#exampleModalToggle"
                                                            data-bs-original-title="" title="">
                                                            <i class="ri-delete-bin-line"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="btn btn-sm btn-solid text-white"
                                                            href="order-tracking.html" data-bs-original-title=""
                                                            title="">
                                                            Tracking
                                                        </a>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>

                                        <tr data-bs-toggle="offcanvas" href="#order-details">
                                            <td>
                                                <span class="order-image">
                                                    <img src="../public/assets_admin/images/product/11.png" alt="users">
                                                </span>
                                            </td>

                                            <td> 586-5865224</td>

                                            <td>Sep 20, 2022</td>

                                            <td>Stripe</td>

                                            <td class="order-pending">
                                                <span>Pending</span>
                                            </td>

                                            <td>$15</td>

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
                                                        <a href="javascript:void(0)" data-bs-toggle="modal"
                                                            data-bs-target="#exampleModalToggle"
                                                            data-bs-original-title="" title="">
                                                            <i class="ri-delete-bin-line"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="btn btn-sm btn-solid text-white"
                                                            href="order-tracking.html" data-bs-original-title=""
                                                            title="">
                                                            Tracking
                                                        </a>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
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