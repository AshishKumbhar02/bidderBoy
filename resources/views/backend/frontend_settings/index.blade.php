@extends('backend.layouts.main')

@section('page.content')

    @php
        $frontendSetting = App\Models\Frontendsetting::first();
    @endphp

    <div class="container-fluid">
        <div class="card bg-light-info shadow-none position-relative overflow-hidden">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h4 class="fw-semibold mb-8">Frontend Setting</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a class="text-muted" href="{{ url('admin/dashboard') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">Frontend Setting</li>
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
        <div class="card">
            <ul class="nav nav-pills user-profile-tab" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button
                        class="nav-link position-relative rounded-0 active d-flex align-items-center justify-content-center bg-transparent fs-3 py-4"
                        id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-account" type="button"
                        role="tab" aria-controls="pills-account" aria-selected="true">
                        <i class="fa-solid fa-address-card me-2 fs-6"></i>
                        <span class="d-none d-md-block">Contact Details</span>
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button
                        class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-4"
                        id="pills-about-tab" data-bs-toggle="pill" data-bs-target="#pills-notifications" type="button"
                        role="tab" aria-controls="pills-notifications" aria-selected="false">
                        <i class="fa-solid fa-copyright me-2 fs-6"></i>
                        <span class="d-none d-md-block">About Us</span>
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button
                        class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-4"
                        id="pills-faq-tab" data-bs-toggle="pill" data-bs-target="#pills-bills" type="button" role="tab"
                        aria-controls="pills-bills" aria-selected="false">
                        <i class="fa-solid fa-question me-2 fs-6"></i>
                        <span class="d-none d-md-block">Faqs</span>
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button
                        class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-4"
                        id="pills-tips-tab" data-bs-toggle="pill" data-bs-target="#pills-tips" type="button" role="tab"
                        aria-controls="pills-tips" aria-selected="false">
                        <i class="fa-solid fa-wand-magic-sparkles me-2 fs-6"></i>
                        <span class="d-none d-md-block">Tips & trick</span>
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button
                        class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-4"
                        id="pills-terms-tab" data-bs-toggle="pill" data-bs-target="#pills-terms" type="button"
                        role="tab" aria-controls="pills-bills" aria-selected="false">
                        <i class="fa-solid fa-asterisk me-2 fs-6"></i>
                        <span class="d-none d-md-block">Terms & condition</span>
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button
                        class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-4"
                        id="pills-privacy-tab" data-bs-toggle="pill" data-bs-target="#pills-privacy" type="button"
                        role="tab" aria-controls="pills-bills" aria-selected="false">
                        <i class="fa-solid fa-lock me-2 fs-6"></i>
                        <span class="d-none d-md-block">Privacy Policy</span>
                    </button>
                </li>
            </ul>
            <div class="card-body">
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-account" role="tabpanel"
                        aria-labelledby="pills-contact-tab" tabindex="0">
                        <div class="row justify-content-start">
                            <div class="col-10">
                                <div class="card w-100 position-relative overflow-hidden mb-0">
                                    <div class="card-body p-4">
                                        <h5 class="card-title fw-semibold">Contact Details</h5>
                                        <p class="card-subtitle mb-4">To change your Contact detail , edit and save from
                                            here</p>
                                        <form id="f-contact-detail" method="POST"
                                            action="{{ url(route('frontend_settings.update_contact_detail')) }}">
                                            @csrf
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="mb-4">
                                                        <label class="form-label fw-semibold">Email</label>
                                                        <input type="email" name="contact_email" class="form-control"
                                                            value="{{ $frontendSetting->contact_email }}" required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-4">
                                                        <label class="form-label fw-semibold">Phone</label>
                                                        <input type="text" name="contact_phone" class="form-control"
                                                            value="{{ $frontendSetting->contact_phone }}" required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-4">
                                                        <label class="form-label fw-semibold">Facebook Url</label>
                                                        <input type="text" name="facebook_url" class="form-control"
                                                            value="{{ $frontendSetting->facebook_url }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-4">
                                                        <label class="form-label fw-semibold">Twitter Url</label>
                                                        <input type="text" name="twitter_url" class="form-control"
                                                            value="{{ $frontendSetting->twitter_url }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-4">
                                                        <label class="form-label fw-semibold">Youtube Url</label>
                                                        <input type="text" name="youtube_url" class="form-control"
                                                            value="{{ $frontendSetting->youtube_url }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-4">
                                                        <label class="form-label fw-semibold">LinkeIn Url</label>
                                                        <input type="text" name="linkedin_url" class="form-control"
                                                            value="{{ $frontendSetting->linkedin_url }}">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="">
                                                        <label class="form-label fw-semibold">Address</label>
                                                        <input type="text" name="address" class="form-control"
                                                            value="{{ $frontendSetting->address }}" required>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="d-flex align-items-center justify-content-end mt-4 gap-3">
                                                        <button class="btn btn-primary">Save</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-notifications" role="tabpanel"
                        aria-labelledby="pills-about-tab" tabindex="0">
                        <div class="row justify-content-center">
                            <div class="col-10">
                                <div class="card w-100 position-relative overflow-hidden mb-0">
                                    <div class="card-body p-4">
                                        <h5 class="card-title fw-semibold">About Details</h5>
                                        <p class="card-subtitle mb-4">To change your About detail , edit and save from here
                                        </p>
                                        <form id="f-about" method="POST"
                                            action="{{ url(route('frontend_settings.update_about_us')) }}">
                                            @csrf
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="">
                                                        <label class="form-label fw-semibold">About Us</label>
                                                        <textarea name="about_us" class="form-control quill-editor" rows="10">{{ $frontendSetting->about_us }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="d-flex align-items-center justify-content-end mt-4 gap-3">
                                                        <button class="btn btn-primary">Save</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-bills" role="tabpanel" aria-labelledby="pills-faq-tab"
                        tabindex="0">
                        <div class="row justify-content-center">
                            <div class="col-10">
                                <div class="card w-100 position-relative overflow-hidden mb-0">
                                    <div class="card-body p-4">
                                        <h5 class="card-title fw-semibold">FAQs</h5>
                                        <p class="card-subtitle mb-4">To change FAQs , edit and save from here</p>
                                        <form id="f-faqs" method="POST"
                                            action="{{ url(route('frontend_settings.update_faqs')) }}">
                                            @csrf
                                            <div id="faq-container">
                                                @if (!$frontendSetting->faqs)
                                                    <div class="faq-section">
                                                        <div class="row">
                                                            <div class="col-10">
                                                                <div class="">
                                                                    <input type="text" name="question[]"
                                                                        class="form-control mb-2"
                                                                        placeholder="Question 1">
                                                                    <textarea name="answer[]" class="form-control mb-4" rows="5" placeholder="Answer 1"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-2 text-right" style="text-align: right;">
                                                                <button type="button"
                                                                    class="btn btn-success btn-sm add-faq">+</button>
                                                                <button type="button"
                                                                    class="btn btn-danger btn-sm remove-faq">-</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @else
                                                    @php $x = 1; @endphp
                                                    @foreach (json_decode($frontendSetting->faqs, true) as $key => $val)
                                                        @foreach ($val as $question => $answer)
                                                            <div class="faq-section">
                                                                <div class="row">
                                                                    <div class="col-10">
                                                                        <div class="">
                                                                            <input type="text" name="question[]"
                                                                                class="form-control mb-2"
                                                                                placeholder="Question {{ $x }}"
                                                                                value="{{ $question }}" required>
                                                                            <textarea name="answer[]" class="form-control mb-4" rows="5" placeholder="Answer {{ $x }}"
                                                                                required>{{ $answer }}</textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-2 text-right"
                                                                        style="text-align: right;">
                                                                        <button type="button"
                                                                            class="btn btn-success btn-sm add-faq">+</button>
                                                                        <button type="button"
                                                                            class="btn btn-danger btn-sm remove-faq">-</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                        @php $x++; @endphp
                                                    @endforeach
                                                @endif
                                            </div>
                                            <div class="col-12">
                                                <div class="d-flex align-items-center justify-content-end mt-4 gap-3">
                                                    <button class="btn btn-primary">Save</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="pills-tips" role="tabpanel" aria-labelledby="pills-tips-tab"
                        tabindex="0">
                        <div class="row justify-content-center">
                            <div class="col-10">
                                <div class="card w-100 position-relative overflow-hidden mb-0">
                                    <div class="card-body p-4">
                                        <h5 class="card-title fw-semibold">Tips & Trick</h5>
                                        <p class="card-subtitle mb-4">To change your Tips & Trick detail , edit and save
                                            from here</p>
                                        <form id="f-tips" method="POST"
                                            action="{{ url(route('frontend_settings.update_tips_and_trick')) }}">
                                            @csrf
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="">
                                                        <label class="form-label fw-semibold">Tips & Trick</label>
                                                        <textarea name="tips_and_tricks" class="form-control quill-editor" rows="10">{{ $frontendSetting->tips_and_tricks }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="d-flex align-items-center justify-content-end mt-4 gap-3">
                                                        <button class="btn btn-primary">Save</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="pills-terms" role="tabpanel" aria-labelledby="pills-terms-tab"
                        tabindex="0">
                        <div class="row justify-content-center">
                            <div class="col-10">
                                <div class="card w-100 position-relative overflow-hidden mb-0">
                                    <div class="card-body p-4">
                                        <h5 class="card-title fw-semibold">Terms & Condition</h5>
                                        <p class="card-subtitle mb-4">To change terms & condition detail , edit and save
                                            from here</p>
                                        <form id="f-terms-conditon" method="POST"
                                            action="{{ url(route('frontend_settings.update_terms_and_condition')) }}">
                                            @csrf
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="">
                                                        <label class="form-label fw-semibold">Terms & Condition</label>
                                                        <textarea class="form-control quill-editor" rows="10" name="terms_condition">{{ $frontendSetting->terms_condition }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="d-flex align-items-center justify-content-end mt-4 gap-3">
                                                        <button class="btn btn-primary">Save</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="pills-privacy" role="tabpanel" aria-labelledby="pills-privacy-tab"
                        tabindex="0">
                        <div class="row justify-content-center">
                            <div class="col-10">
                                <div class="card w-100 position-relative overflow-hidden mb-0">
                                    <div class="card-body p-4">
                                        <h5 class="card-title fw-semibold">Privacy Policy</h5>
                                        <p class="card-subtitle mb-4">To change privacy policy , edit and save from here
                                        </p>
                                        <form id="f-privacy-policy" method="POST"
                                            action="{{ url(route('frontend_settings.update_privacy_policy')) }}">
                                            @csrf
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="">
                                                        <label class="form-label fw-semibold">Privacy Policy</label>
                                                        <textarea class="form-control quill-editor" rows="10" name="privacy_policy">{{ $frontendSetting->privacy_policy }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="d-flex align-items-center justify-content-end mt-4 gap-3">
                                                        <button class="btn btn-primary">Save</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
    </div>

@endsection

@section('page.script')
    <script>
        // Get all textarea elements with the class "quill-editor"
        /*var textareas = document.querySelectorAll(".quill-editor");
        
        // Iterate over each textarea element and initialize Quill
        textareas.forEach(function(textarea) {
          var quill = new Quill(textarea, {
            theme: "snow",
          });
        });*/

        $('.quill-editor').trumbowyg();

        $(document).ready(function() {
            // Add FAQ section
            $(document).on('click', '.add-faq', function() {
                var faqSection = $('.faq-section').last().clone(); // Clone the last FAQ section
                var questionField = faqSection.find('input[name="question[]"]');
                var answerField = faqSection.find('textarea[name="answer[]"]');

                // Clear the input and textarea values
                questionField.val('');
                answerField.val('');

                // Increment the placeholder numbers
                var questionNumber = parseInt(questionField.attr('placeholder').split(' ')[1]);
                var answerNumber = parseInt(answerField.attr('placeholder').split(' ')[1]);
                questionField.attr('placeholder', 'Question ' + (questionNumber + 1));
                answerField.attr('placeholder', 'Answer ' + (answerNumber + 1));

                $('#faq-container').append(faqSection); // Append the cloned FAQ section
            });

            // Remove FAQ section
            $(document).on('click', '.remove-faq', function() {
                if ($('.faq-section').length > 1) { // Ensure there is always at least one FAQ section
                    $(this).closest('.faq-section').remove();
                }
            });
        });

        $(document).ready(function() {
            //contact detail
            $("#f-contact-detail").validate({});
            $("#f-contact-detail").submit(function(e) {
                var form = $(this);
                var CB = function() {
                    //nothing
                }
                ajaxSubmit(e, form, CB);
            });

            //about
            $("#f-about").validate({});
            $("#f-about").submit(function(e) {
                var form = $(this);
                var CB = function() {
                    //nothing
                }
                ajaxSubmit(e, form, CB);
            });

            //faqs
            $("#f-faqs").validate({});
            $("#f-faqs").submit(function(e) {
                var form = $(this);
                var CB = function() {
                    //nothing
                }
                ajaxSubmit(e, form, CB);
            });

            //tips and trick
            $("#f-tips").validate({});
            $("#f-tips").submit(function(e) {
                var form = $(this);
                var CB = function() {
                    //nothing
                }
                ajaxSubmit(e, form, CB);
            });

            //terms
            $("#f-terms-conditon").validate({});
            $("#f-terms-conditon").submit(function(e) {
                var form = $(this);
                var CB = function() {
                    //nothing
                }
                ajaxSubmit(e, form, CB);
            });

            //privacy
            $("#f-privacy-policy").validate({});
            $("#f-privacy-policy").submit(function(e) {
                var form = $(this);
                var CB = function() {
                    //nothing
                }
                ajaxSubmit(e, form, CB);
            });
        });
    </script>
@endsection
