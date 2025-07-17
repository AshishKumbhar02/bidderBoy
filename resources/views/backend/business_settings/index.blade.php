@extends('backend.layouts.main')

@section('page.content')
    <style>
        .body-wrapper>.container-fluid,
        .body-wrapper>.container-lg,
        .body-wrapper>.container-md,
        .body-wrapper>.container-sm,
        .body-wrapper>.container-xl,
        .body-wrapper>.container-xxl {
            max-width: 98%;
            margin: 0 auto;
            padding: 24px;
            transition: .2s ease-in;
        }
    </style>

    @php
        $frontendSetting = App\Models\Frontendsetting::first();
    @endphp

    <div class="container-fluid">
        <div class="card bg-light-info shadow-none position-relative overflow-hidden">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h4 class="fw-semibold mb-8">Business Setting</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a class="text-muted" href="{{ url('admin/dashboard') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">Business Setting</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-3">
                        <div class="text-center mb-n5">
                            <img src="../../dist/images/breadcrumb/ChatBc.png" alt="" class="img-fluid mb-n4">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!--<div class="col-sm-12 col-md-6">
          <div class="card">
             <div class="card-body">
                <div class="d-flex mb-3 align-items-center">
                   <div>
                      <h5 class="mb-0 fs-5">Fast2SMS</h5>
                   </div>
                </div>
                <p class="mb-3 card-subtitle">

                </p>
                <form id="f-fast2sms" class="mt-3" method="POST" action="{{ url(route('business_settings.update_fast2sms_settings')) }}">
                  @csrf
                  <div class="form-check form-switch">
                    @php
                        $value = \App\Models\BusinessSetting::getSetting('fast2sms_registration_otp');
                    @endphp
                    <input class="form-check-input" type="checkbox" id="onSwitch" name="fast2sms_registration_otp" value="on" @if ($value == 'on') checked @endif>
                    <label class="form-check-label" for="onSwitch">SMS OTP registration</label>
                  </div>
                    <div class="d-flex align-items-center justify-content-end mt-4 gap-3">
                      <button class="btn btn-primary">Update</button>
                    </div>
                </form>
             </div>
          </div>
       </div>
       <div class="col-sm-12 col-md-6">
          <div class="card">
             <div class="card-body">
                <div class="d-flex mb-3 align-items-center">
                   <div>
                      <h5 class="mb-0 fs-5">KYC Verification</h5>
                   </div>
                </div>
                <p class="mb-3 card-subtitle">

                </p>
                <form id="f-kyc-verification" class="mt-3" method="POST" action="{{ url(route('business_settings.update_kyc_verification_settings')) }}">
                  @csrf
                  <div class="form-check form-switch">
                    @php
                        $value = \App\Models\BusinessSetting::getSetting('kyc_verification');
                    @endphp
                    <input class="form-check-input" type="checkbox" id="onSwitch" name="kyc_verification" value="on" @if ($value == 'on') checked @endif>
                    <label class="form-check-label" for="onSwitch">KYC verification</label>
                  </div>
                    <div class="d-flex align-items-center justify-content-end mt-4 gap-3">
                      <button class="btn btn-primary">Update</button>
                    </div>
                </form>
             </div>
          </div>
       </div>-->

        <div class="col-sm-12 col-md-6">
            <form id="f-fast2sms" class="mt-3" method="POST"
                action="{{ url(route('business_settings.update_fast2sms_settings')) }}">
                @csrf
                <div class="form-check form-switch">
                    @php
                        $value = \App\Models\BusinessSetting::getSetting('fast2sms_registration_otp');
                    @endphp
                    <input onchange="form_submit('#f-fast2sms');" class="form-check-input" type="checkbox" id="onSwitch"
                        name="fast2sms_registration_otp" value="on" @if ($value == 'on') checked @endif>
                    <label class="form-check-label" for="onSwitch">SMS OTP registration</label>
                </div>
                <div class="d-flex align-items-center justify-content-end mt-4 gap-3 d-none">
                    <button class="btn btn-primary">Update</button>
                </div>
            </form>
            <form id="f-kyc-verification" class="mt-3" method="POST"
                action="{{ url(route('business_settings.update_kyc_verification_settings')) }}">
                @csrf
                <div class="form-check form-switch">
                    @php
                        $value = \App\Models\BusinessSetting::getSetting('kyc_verification');
                    @endphp
                    <input onchange="form_submit('#f-kyc-verification');" class="form-check-input" type="checkbox"
                        id="onSwitch" name="kyc_verification" value="on"
                        @if ($value == 'on') checked @endif>
                    <label class="form-check-label" for="onSwitch">KYC verification</label>
                </div>
                <div class="d-flex align-items-center justify-content-end mt-4 gap-3 d-none">
                    <button class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>

    </div>
@endsection

@section('page.script')
    <script>
        function form_submit(target) {
            $(target).submit();
        }

        $("#f-fast2sms").validate({});
        $("#f-fast2sms").submit(function(e) {
            var form = $(this);
            var CB = function() {
                //nothing
            }
            ajaxSubmit(e, form, CB);
        });

        $("#f-kyc-verification").validate({});
        $("#f-kyc-verification").submit(function(e) {
            var form = $(this);
            var CB = function() {
                //nothing
            }
            ajaxSubmit(e, form, CB);
        });
    </script>
@endsection
