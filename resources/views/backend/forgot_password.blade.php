<!DOCTYPE html>
<html lang="en">

<head>

    {{-- Meta tags and CSS --}}
    @include('backend.partials.meta')
    @include('backend.partials.css')

</head>

<body>
    {{-- Preloader --}}
    @include('backend.partials.preloader')
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-sidebartype="full" data-sidebar-position="fixed"
        data-header-position="fixed">

        <!-- Background Layout -->
        <div class="position-relative overflow-hidden radial-gradient min-vh-100">
            <div class="position-relative z-index-5">
                <div class="row">
                    <!-- Left Side (Logo) -->
                    <div class="col-xl-7 col-xxl-8">
                        <div class="d-none d-xl-flex align-items-center justify-content-center"
                            style="height: calc(100vh - 80px);">
                            <img src="{{ asset('assets/front/img/logo.png') }}" alt="" class="img-fluid"
                                width="500">
                        </div>
                    </div>

                    <!-- Right Side: Forgot Password Form -->
                    <div class="col-xl-5 col-xxl-4">
                        <div
                            class="authentication-login min-vh-100 bg-body row justify-content-center align-items-center p-4">
                            <div class="col-sm-8 col-md-6 col-xl-9">

                                {{-- Page Heading --}}
                                <h2 class="mb-3 fs-7 fw-bolder">Forgot Password</h2>

                                {{-- Forgot Password Form --}}
                                <form action="{{ url('admin/post_forgot_password') }}" method="post">
                                    @csrf

                                    {{-- Email Input --}}
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Email</label>
                                        <input name="email" type="email" class="form-control"
                                            id="exampleInputEmail1" placeholder="Enter your email ID">
                                        {{-- Show validation error if email is incorrect --}}
                                        @if ($errors->has('email'))
                                            <div class="text-danger text-sm">{{ $errors->first('email') }}</div>
                                        @endif
                                        {{-- Show credential error if login fails --}}
                                        @if ($errors->has('invalid_credential'))
                                            <div class="text-danger text-sm">{{ $errors->first('invalid_credential') }}
                                            </div>
                                        @endif
                                    </div>
                                    {{-- Back to login link --}}
                                    <div class="d-flex align-items-center justify-content-between mb-4">
                                        <a class="text-primary fw-medium" href="{{ route('admin.login') }}">Go to
                                            login</a>
                                    </div>
                                    {{-- Submit button --}}
                                    <button type="submit"
                                        class="btn btn-primary w-100 py-8 mb-4 rounded-2">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- End Right Column -->
                </div>
            </div>
        </div>
    </div>

    {{-- JS Files --}}
    @include('backend.partials.js')
</body>

</html>
