<?php include 'header.php'; ?>

<style>
    .top_baar {
        display: none;
    }

    header#header {
        display: none;
    }

    section.footer_sections {
        display: none;
    }
</style>

<div class="login_page">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="form-section">
                    <div class="form-inner">
                        <a href="index.php" class="logo">
                            <img src="img/logo.png">
                        </a>
                        <h3>Sign Into Your Account</h3>
                        <form action="#" method="GET">
                            <div class="form-group form-box clearfix">
                                <input type="email" class="form-control" name="login-email" placeholder="Email Address" required>

                            </div>
                            <div class="form-group form-box clearfix">
                                <input type="password" name="login-password" class="form-control" autocomplete="off" placeholder="Password" required>

                            </div>
                            <div class="checkbox form-group clearfix">
                                <div class="form-check float-start">
                                    <input class="form-check-input" type="checkbox" id="rememberme">
                                    <label class="form-check-label" for="rememberme">
                                        Remember me
                                    </label>
                                </div>
                                <a href="#" class="link-light float-end forgot-password pddtop13">Forgot your password?</a>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg btn-theme"><span>Login</span></button>
                            </div>
                            <div class="extra-login form-group clearfix">
                                <span>Or Login With</span>
                            </div>
                        </form>
                        <div class="clearfix"></div>
                        <ul class="social-list clearfix">
                            <li><a href="#" class="facebook-bg">Facebook</a></li>
                            <li><a href="#" class="twitter-bg">Twitter</a></li>
                            <li><a href="#" class="google-bg">Google</a></li>
                        </ul>
                        <div class="clearfix"></div>
                        <p>Don't have an account? <a data-bs-toggle="modal" data-bs-target="#registration_form" class="thembo"> Register here</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="registration_form" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Register Here</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body registration_section">
                <div class="col-lg-12">
                    <div class="form-section">
                        <div class="form-inner">

                            <form action="#" method="GET">
                                <div class="form-group form-box clearfix">
                                    <input type="text" name="password" class="form-control" placeholder="Name" required>

                                </div>


                                <div class="form-group form-box clearfix">
                                    <input type="email" class="form-control" name="email" placeholder="Email Address" required>

                                </div>


                                <div class="form-group form-box clearfix">
                                    <input name="mobilenumber" type="password" class="form-control" placeholder="Mobile Number" required>

                                </div>

                                <div class="form-group form-box clearfix">
                                    <input type="password" class="form-control" name="password" placeholder="Password" required>

                                </div>


                                <div class="form-group form-box clearfix text-left">
                                    <input id="checkbox" type="checkbox" />
                                    <label for="checkbox"> I agree to these <a href="#">Terms and Conditions</a>.</label>
                                </div>


                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-theme"><span>Register Here</span></button>
                                </div>

                            </form>
                            <div class="clearfix"></div>
                            <p>Already have an account? <a href="login.php"> Log In</a></p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>



<?php include 'footer.php'; ?>