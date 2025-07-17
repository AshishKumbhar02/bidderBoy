<style>
    .manage-profile-form {
        border: 1px solid #dfdcdc;
        /*color: #9e9c9c;*/

        padding: 0px 15px;
    }


    .update-btn {
        padding: 6px 20px;
        background-color: #dfdcdc;
        border: 1px solid #9e9c9c;
    }
</style>


@extends('frontend.layouts.main')
<link href="{{ url('public/assets/front/css/customer-profile.css') }}" rel="stylesheet">
@section('page.breadcrumb')
    <section class="inner_header">
        <div class="container">
            <ul class="breadcrumb breadcrumb list-inline justify-content-center">
                <li>
                    <a href="{{ url('') }}">Home</a>
                </li>
                <li> ></li>
                <li>Profile</li>
            </ul>
            <h4 class="text-center">Profile</h4>
        </div>
    </section>
@endsection

@section('page.content')
    <section class="py-5">
        <div class="container">
            <div class="d-flex align-items-start">
                <!--include nav here-->
                @include('frontend/inc/profile-nav')
                <div class="aiz-user-panel">
                    <div class="aiz-titlebar mb-4">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <h1 class="fs-20 fw-700 text-dark">Manage Profile</h1>
                                <form method="post" action="{{ route('profile.update_basic_profile_detail') }}"
                                    class="p-md-4 p-sm-2 manage-profile-form">
                                    @csrf
                                    <div class="row g-3">
                                        <div class="col-md-6 col-sm-12 p-2">
                                            <label for="first_name">First Name <span class="text-danger">*</span></label>
                                            <input type="text" name="first_name" id="first_name" class="form-control"
                                                placeholder="Enter Your First Name" value="{{ $customer->first_name }}"
                                                required>
                                        </div>
                                        <div class="col-md-6 col-sm-12 p-2">
                                            <label for="last_name">Last Name <span class="text-danger">*</span></label>
                                            <input type="text" name="last_name" id="last_name" class="form-control"
                                                placeholder="Enter Your Last Name" value="{{ $customer->last_name }}"
                                                required>
                                        </div>
                                        <div class="col-md-6 col-sm-12 p-2">
                                            <label for="username">User Name <span class="text-danger">*</span></label>
                                            <input type="text" name="username" id="username" class="form-control"
                                                placeholder="Enter Your User Name" value="{{ $customer->username }}"
                                                required>
                                            <input type="checkbox" id="change_username" name="change_username"
                                                value="1"> <label for="change_username">Change username</label>
                                        </div>
                                        <div class="col-md-6 col-sm-12 p-2">
                                            <label for="mobNo">Mobile Number</label>
                                            <input type="text" name="mobile_number" id="mobile_number"
                                                class="form-control" placeholder="Enter Your Mobile Number"
                                                value="{{ $customer->mobile_number }}" required>
                                            <input type="checkbox" id="change_mobile_number" name="change_mobile_number"
                                                value="1"> <label for="change_mobile_number">Change mobile
                                                number</label>
                                        </div>
                                        <div class="col-md-6 col-sm-12 p-2">
                                            <label for="email">Email ID <span class="text-danger">*</span></label>
                                            <input type="email" name="email" id="email" class="form-control"
                                                placeholder="Enter Your Email" value="{{ $customer->email }}" readonly
                                                required>
                                        </div>
                                        <div class="col-md-6 col-sm-12 p-2">
                                            <label for="address">Address</label>
                                            <textarea id="address" name="address" rows="7" cols="50" class="form-control" placeholder="your address"
                                                required>{{ $customer->address }}</textarea>
                                        </div>
                                        <div class="col-md-6 col-sm-12 p-2">
                                            <label for="password">Password</label>
                                            <input type="password" name="password" id="password" class="form-control"
                                                placeholder="Enter Your Password" />
                                            <input type="checkbox" id="change_password" name="change_password"
                                                value="1"> <label for="change_password">Change password</label>
                                        </div>
                                        <div class="col-md-6 col-sm-12 p-2">
                                            <label for="confirmPassword">Confirm Password</label>
                                            <input type="password" name="password_confirmation"
                                                placeholder="Confirm Password" id="confirmPassword" class="form-control" />
                                        </div>
                                    </div>
                                    <button type="submit" class=" update-btn my-2">UPDATE</button>
                                </form>
                            </div>


                            <!--<div class="col-md-12">
                              <h1 class="fs-20 fw-700 text-dark">Change Password</h1>
                              <form method="post" action="{{ route('profile.update_password') }}" class="p-md-4 p-sm-2 manage-profile-form">
                                @csrf
                                <div class="row g-3">
                                  <div class="col-md-6 col-sm-12 p-2">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Enter Your Password" required />
                                  </div>
                                  <div class="col-md-6 col-sm-12 p-2">
                                    <label for="confirmPassword">Confirm Password</label>
                                    <input type="password" name="password_confirmation" placeholder="Confirm Password" id="confirmPassword" class="form-control" required />
                                  </div>
                                </div>
                                <button type="submit" class="update-btn my-2">UPDATE</button>
                              </form>
                            </div>-->


                        </div>
                    </div>
                    {{-- @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif --}}

                    @php
                        $customerId = auth()->user()->id;
                        $customer = DB::table('users')->where('id', '=', $customerId)->first();
                        $kycVerification = \App\Models\BusinessSetting::getSetting('kyc_verification');
                    @endphp
                    @if ($kycVerification == 'on')
                        <div class="card rounded-0 shadow-none border">
                            <div class="card-header pt-4 border-bottom-0">
                                <h5 class="mb-0 fs-18 fw-700 text-dark">KYC verification</h5>
                            </div>
                            <div class="card-body">
                                @if ($customer->kyc_document_verification == 1 && !empty($customer->kyc_document))
                                    <div class="row">
                                        <div class="col-md-12">
                                            <a href="{{ url('public/uploads/users/kyc_document/' . $customer->kyc_document) }}"
                                                target="_blank">View Document</a>
                                            <p class="text-success">Document verification successfull</p>
                                        </div>
                                    </div>
                                @elseif($customer->kyc_document_verification == 0 && !empty($customer->kyc_document))
                                    <div class="row">
                                        <div class="col-md-12">
                                            <a href="{{ url('public/uploads/users/kyc_document/' . $customer->kyc_document) }}"
                                                target="_blank">View Document</a>
                                            <p class="text-danger">Document verification is pending from Admin</p>
                                        </div>
                                    </div>
                                @else
                                    <form action="{{ route('profile.update_profile') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <!-- Name-->
                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label fs-14 fs-14">ID proof</label>
                                            <div class="col-md-10">
                                                <input type="file" class="form-control rounded-0"
                                                    placeholder="Your Name" name="kyc_document" required>
                                            </div>
                                        </div>
                                        <!-- Submit Button-->
                                        <div class="form-group mb-0 text-right">
                                            <button type="submit"
                                                class="btn btn-primary rounded-0 w-150px mt-3">Submit</button>
                                        </div>
                                    </form>
                                @endif
                            </div>
                    @endif

                </div>
            </div>
        </div>
        </div>
    </section>
@endsection

@section('page.script')
    <script></script>
@endsection
