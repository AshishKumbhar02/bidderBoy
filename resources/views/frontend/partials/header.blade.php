<style>
    .login_in {
        padding: 3px 15px 3px 15px !important;
        border-radius: 3px;
        float: right;
        margin-left: 20px !important;
        background: linear-gradient(0deg, rgb(73 162 219 / 77%) 0%, rgb(183 223 249 / 42%) 100%);
        border: 1px solid #8ec6ea !important;
    }

    .sign-up {
        padding: 3px 6px;
        font-size: 15px;
        justify-content: space-between;
        font-weight: 500;

        border-radius: 3px;
        margin-left: 10px !important;
        background: linear-gradient(0deg, rgb(73 162 219 / 77%) 0%, rgb(183 223 249 / 42%) 100%);
        border: 1px solid #8ec6ea !important;
        transition: 0.3s;
    }

    .form-control {
        padding: 6px 5px 6px 20px;
        font-size: 14px;
        font-weight: 400;
        line-height: 1.5;
        color: #212529;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #00000085;
        border-radius: 2px;
    }

    .login-form {
        padding: 20px 10px 50px 10px;
    }

    .sign-up-form-container {
        background-color: #615187;
        border-radius: 5px;
    }

    .signup-form-box h1 {
        margin-top: 10px;
        font-size: 50px;
        color: #fff;
        font-weight: 600;
    }

    .signup-form-box .p-text {
        font-size: 14px;
        color: #fff;
        margin-bottom: 30px;
    }

    .c-text {
        font-size: 14px;
        color: #fff;
        text-align: start;
        margin: 0px;
    }

    .c-text .checkbox-text {
        color: #ff9948;
    }


    .modal-header-signup {
        border: none !important;
    }

    .checkbox {
        margin: 30px 0px;
    }

    .media-btns-1 {
        width: 46%;
    }

    .media-btns-2 {
        width: 49%;
    }

    .divider-text {
        width: 4%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
    }

    .media-btns-1 button {
        width: 100%;
        background-color: #ff9948;
        color: #fff;
        text-transform: uppercase;
        font-size: 14px;
    }

    .media-btns-1 button:hover {
        width: 100%;
        background-color: #ff9919;
        color: #fff;
        text-transform: uppercase;
        font-size: 13px;
    }

    .media-btns-2 button {
        width: 100%;
        background-color: #5187d2;
        color: #fff;
        text-transform: uppercase;
        font-size: 14px;
    }

    .media-btns-2 button:hover {
        width: 100%;
        background-color: #5186e2;
        color: #fff;
        text-transform: uppercase;
        font-size: 13px;
    }

    .media-btns-1 button .btn-label {
        float: left;
        color: #fff;
        width: 16%;
        font-size: 16px;
        border-right: 0.05px solid #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100%;
        padding: 10px 10px 10px 7px;
        margin-right: 5px;
    }

    .media-btns-2 button .btn-label {
        float: left;
        color: #fff;
        width: 16%;
        font-size: 16px;
        border-right: 0.05px solid #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100%;
        padding: 10px 10px 10px 7px;
        margin-right: 5px;
    }

    .btn-text {
        width: 80%;
        text-align: center;
    }

    .btnss {
        padding: 0px;
    }


    .modal-content {
        background-color: #fff0;
    }

    .modal.fade.show {
        background: #00000000 !important;
    }

    .modal-content {
        background-color: #fff0;
        border: none;

    }


    /*lofin start */

    .login-form-container {
        background-color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .login-form h2 {
        font-size: 26px;
        color: #000;
        text-align: center;
        padding: 14px 0px;
    }

    .form-logo {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .form-logo img {
        width: 180px;

    }


    .log button {
        padding: 10px;
        background-color: red;
        color: #fff;
    }
</style>





<!-- ======= Header ======= -->
<div class="top_baar"></div>
<header id="header">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <nav id="navbar" class="navbar fltright">
                    <ul>
                        <li><a class="nav-link scrollto active" href="{{ url('faqs') }}">FAQs</a></li>
                        <li><a class="nav-link scrollto" href="{{ url('tips-and-trick') }}">Tips & Tricks</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-md-3">
                <div class="logo"><a href="{{ url('') }}"><img src="{{ url('assets/front/img/logo.png') }}"></a>
                </div>
            </div>
            <div class="col-md-5">
                <nav id="navbar" class="navbar mrgleft35">
                    <ul>
                        <li><a class="nav-link scrollto" href="{{ url('winner') }}">Winner</a></li>
                        <li><a class="nav-link scrollto" href="{{ url('') }}">Get Started</a></li>
                        @guest
                            <li><a class="nav-link scrollto login_in" href="{{ url('login') }}">Login </a></li>

                            <!--<button type="button " class="login_in scrollto" data-bs-toggle="modal" data-bs-target="#login">-->
                            <!--    Login-->
                            <!--</button>-->

                            <div class="modal fade signup-modal" id="login" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog  ">
                                    <div class="modal-content">
                                        <div class="row justify-content-center align-aitems-center ">


                                            <div class="col-lg-12 col-md-12 col-sm-12 login-form-container my-4">

                                                <div class="col-10">

                                                    <div class="col-12 form-logo mt-5">
                                                        <img src="./assets/front/images/logo.png" alt="">

                                                    </div>
                                                    <div class="login-form-box  text-center">


                                                        <form action="" class="login-form">
                                                            <h2>Sign Into Your Account</h2>

                                                            <div class="row g-4 d-flex justify-content-center">
                                                                <div class="col-12">
                                                                    <input type="text" class="form-control" required
                                                                        placeholder="Username Or Email ID" name="fName">
                                                                </div>
                                                                <div class="col-12">
                                                                    <input type="password" class="form-control" required
                                                                        placeholder="Password" name="password">
                                                                </div>

                                                            </div>

                                                            <div class="row align-aitems-center">

                                                                <div class="col-sm-12 col-md-5 ">
                                                                    <div class="form-check pt-3">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            value="" id="flexCheckDefault">
                                                                        <label class="form-check-label"
                                                                            for="flexCheckDefault">
                                                                            <p class="c-text text-dark ">Remember me </p>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-7 ">
                                                                    <a href="#" class="c-text pt-3">Forgot your
                                                                        password?</a>

                                                                </div>


                                                                <div class="col-12 py-4 my-2 log">
                                                                    <button type="button"
                                                                        class="btn btn-danger form-control">LOGIN</button>
                                                                </div>
                                                            </div>


                                                            <div class="row g-4 ">
                                                                <div class="col-md-4 col-sm-6">


                                                                    <button type="button"
                                                                        class="btn btn-primary form-control">Facebook
                                                                    </button>
                                                                </div>

                                                                <div class="col-md-4 col-sm-6">


                                                                    <button type="button"
                                                                        class="btn btn-secondary form-control">Twitter</button>
                                                                </div>



                                                                <div class="col-md-4 col-sm-6">


                                                                    <button type="button"
                                                                        class="btn btn-danger form-control">Google</button>
                                                                </div>
                                                            </div>

                                                            <div class="text-center  py-4">

                                                                <p>Don't have an account? Register here</p>
                                                            </div>


                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ route('profile.customer_profile_dashboard') }}">My
                                            Profile</a>
                                    </li>
                                    <li><a class="dropdown-item"
                                            href="{{ route('profile.customer_profile_dashboard') }}">Win History</a>
                                    </li>
                                    <li><a class="dropdown-item" href="{{ route('topup_bid_credits') }}">Top Up Credits</a>
                                    </li>
                                    <li><a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">Logout</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest


                        <!--Button trigger modal -->
                        <button type="button " class="sign-up scrollto" data-bs-toggle="modal"
                            data-bs-target="#signin">
                            Sign Up
                        </button>

                        <!-- Modal -->
                        <div class="modal fade signup-modal" id="signin" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog  ">
                                <div class="modal-content">
                                    <div class="row justify-content-center align-aitems-center ">
                                        <div class="col-lg-12 col-md-12 col-sm-12 sign-up-form-container my-4">
                                            <div class="signup-form-box  text-center">

                                                <form action="" class="login-form">
                                                    <h1>FREE SIGN UP</h1>
                                                    <p class="p-text">Sign-up takes less then 30 seconds. Get 5 Free
                                                        Credits on Joining.</p>

                                                    <div class="row g-4">
                                                        <div class="col-md-6 col-sm-12">
                                                            <input type="text" class="form-control" required
                                                                placeholder="First Name" name="fName">
                                                        </div>
                                                        <div class="col-md-6 col-sm-12">
                                                            <input type="text" class="form-control" required
                                                                placeholder="Last Name" name="lName">
                                                        </div>
                                                        <div class="col-md-6 col-sm-12">
                                                            <input type="text" class="form-control" required
                                                                placeholder="Choose Username" name="usrName">
                                                        </div>
                                                        <div class="col-md-6 col-sm-12">
                                                            <input type="password" class="form-control" required
                                                                placeholder="Choose Password" name="password">
                                                        </div>
                                                        <div class="col-md-6 col-sm-12">
                                                            <input type="email" class="form-control" required
                                                                placeholder="Email ID" name="email">
                                                        </div>
                                                        <div class="col-md-6 col-sm-12">
                                                            <input type="number" class="form-control" required
                                                                placeholder="Mobile" name="mobile">
                                                        </div>
                                                        <div class="col-md-6 col-sm-12">
                                                            <input type="text" class="form-control" required
                                                                placeholder="Captcha">
                                                        </div>
                                                    </div>

                                                    <div class="col-12 checkbox">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                value="" id="flexCheckDefault">
                                                            <label class="form-check-label" for="flexCheckDefault">
                                                                <p class="c-text"> I accept the <span
                                                                        class='checkbox-text'> Terms and Conditions
                                                                    </span> and the <span class='checkbox-text'>Privacy
                                                                        Policy </span> of Bidderboy.com </p>
                                                            </label>
                                                        </div>
                                                    </div>

                                                    <div class="row ">
                                                        <div class=" media-btns-1">
                                                            <button type="button"
                                                                class=" text-center btn btnss d-flex  align-items-center ">
                                                                <span class="btn-label"><i class="fa fa-user"
                                                                        aria-hidden="true"></i></span><span
                                                                    class="btn-text">Signup</span> </button>
                                                        </div>
                                                        <span class="divider-text"> OR</span>
                                                        <div class=" media-btns-2">
                                                            <button type="button"
                                                                class=" text-center btn btnss d-flex  align-items-center ">
                                                                <span class="btn-label"><i class="fa fa-facebook"
                                                                        aria-hidden="true"></i></span><span
                                                                    class="btn-text">Signup using
                                                                    Facebook</span></button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </ul>
                </nav>
            </div>
        </div>
        <i class="bi bi-list mobile-nav-toggle"></i>
    </div>
</header>
