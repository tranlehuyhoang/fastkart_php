<?php

include_once __DIR__ . '/../inc/_header.inc.php';
if (isset($_SESSION['userid'])) {
    echo "<script>window.location.href = './home.php';</script>";
}
?>


<!-- mobile fix menu end -->

<!-- Breadcrumb Section Start -->
<section class="breadscrumb-section pt-0">
    <div class="container-fluid-lg">
        <div class="row">
            <div class="col-12">
                <div class="breadscrumb-contain">
                    <h2>Sign In</h2>
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="index.html">
                                    <i class="fa-solid fa-house"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item active">Sign In</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- log in section start -->
<section class="log-in-section section-b-space">
    <div class="container-fluid-lg w-100">
        <div class="row">
            <div class="col-xxl-6 col-xl-5 col-lg-6 d-lg-block d-none ms-auto">
                <div class="image-contain">
                    <img src="../public/assets_client/images/inner-page/sign-up.png" class="img-fluid" alt="">
                </div>
            </div>

            <div class="col-xxl-4 col-xl-5 col-lg-6 col-sm-8 mx-auto">
                <div class="log-in-box">
                    <div class="log-in-title">
                        <h3>Welcome To Fastkart</h3>
                        <h4>Create New Account</h4>
                    </div>

                    <div class="input-box">
                        <form class="row g-4">
                            <div class="col-12">
                                <div class="form-floating theme-form-floating">
                                    <input type="text" class="form-control" id="fullname" placeholder="Full Name">
                                    <label for="fullname">Full Name</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating theme-form-floating">
                                    <input type="email" class="form-control" id="email" placeholder="Email Address">
                                    <label for="email">Email Address</label>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-floating theme-form-floating">
                                    <input type="password" class="form-control" id="password" placeholder="Password">
                                    <label for="password">Password</label>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="forgot-box">
                                    <div class="form-check ps-0 m-0 remember-box">
                                        <input class="checkbox_animated check-box" type="checkbox" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">I agree with
                                            <span>Terms</span> and <span>Privacy</span></label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <button class="btn btn-animation w-100" type="submit">Sign Up</button>
                            </div>
                        </form>
                    </div>

                    <div class="other-log-in">
                        <h6>or</h6>
                    </div>

                    <div class="log-in-button">
                        <ul>
                            <li>
                                <a href="https://accounts.google.com/signin/v2/identifier?flowName=GlifWebSignIn&amp;flowEntry=ServiceLogin" class="btn google-button w-100">
                                    <img src="../public/assets_client/images/inner-page/google.png" class="blur-up lazyloaded" alt="">
                                    Sign up with Google
                                </a>
                            </li>
                            <li>
                                <a href="https://www.facebook.com/" class="btn google-button w-100">
                                    <img src="../public/assets_client/images/inner-page/facebook.png" class="blur-up lazyloaded" alt=""> Sign up with Facebook
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="other-log-in">
                        <h6></h6>
                    </div>

                    <div class="sign-up-box">
                        <h4>Already have an account?</h4>
                        <a href="login.html">Log In</a>
                    </div>
                </div>
            </div>

            <div class="col-xxl-7 col-xl-6 col-lg-6"></div>
        </div>
    </div>
</section>
<!-- log in section end -->

<!-- Tap to top start -->

<!-- Tap to top end -->

<!-- Bg overlay Start -->
<div class="bg-overlay"></div>
<!-- Bg overlay End -->

<!-- latest jquery-->
<script src="../public/assets_client/js/jquery-3.6.0.min.js"></script>

<!-- Bootstrap js-->
<script src="../public/assets_client/js/bootstrap/bootstrap.bundle.min.js"></script>
<script src="../public/assets_client/js/bootstrap/popper.min.js"></script>

<!-- feather icon js-->
<script src="../public/assets_client/js/feather/feather.min.js"></script>
<script src="../public/assets_client/js/feather/feather-icon.js"></script>

<!-- Slick js-->
<script src="../public/assets_client/js/slick/slick.js"></script>
<script src="../public/assets_client/js/slick/slick-animation.min.js"></script>
<script src="../public/assets_client/js/slick/custom_slick.js"></script>

<!-- Lazyload Js -->
<script src="../public/assets_client/js/lazysizes.min.js"></script>

<!-- script js -->
<script src="../public/assets_client/js/script.js"></script>


</body>

</html>
<?php

include_once __DIR__ . '/../inc/_footer.inc.php';
?>