<section class="footer_sections">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="footer_icon1">
                    <img src="{{ url('assets/front/img/boy-footer.png') }}">
                </div>
            </div>
            <div class="col-md-12">
                <a href="">Hot Products</a> | <a href="">Partnership</a> | <a href="">Careers</a> | <a
                    href="">Winnings Tips</a>
            </div>
            <div class="col-md-12">
                <a href="">Responsible Bidding</a> | <a href="">How It Works</a> | <a
                    href="{{ url('faqs') }}">FAQs</a> | <a href="">Referal Program</a> | <a
                    href="{{ url('about-us') }}">About Us</a> | <a href="{{ url('contact-us') }}">Contact Us</a>
            </div>
            <div class="col-md-12">
                <a href="{{ url('terms-and-condition') }}">Terms & Conditions</a> | <a
                    href="{{ url('terms-and-condition') }}">Legal Terms of Use</a> | <a
                    href="{{ url('privacy-policy') }}">Privacy</a>
            </div>
            <div class="col-md-12">
                <a href=""><i class="fa fa-facebook-square" aria-hidden="true"></i></a><a href=""><i
                        class="fa fa-twitter-square" aria-hidden="true"></i></a><a href=""><i
                        class="fa fa-youtube-square" aria-hidden="true"></i></a> <a><i class="fa fa-linkedin-square"
                        aria-hidden="true"></i></a>
            </div>
            <div class="col-md-12">
                <p>Copyright 2011 - 2023 Bidderboy Corporation. All right reserved.</p>
            </div>
        </div>
    </div>
</section>
<!-- Vendor JS Files -->
<!--<script src="{{ url('public/assets/front/js/bootstrap.bundle.min.js') }}"></script>-->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

 <script src="{{ url('assets/front/js/jquery.min.js') }}"></script> -->
<!-- <script src="{{ url('assets/front/js/owl.carousel.js') }}"></script>
<script src="{{ url('assets/front/js/intlTelInput.js') }}"></script>
<script src="{{ url('assets/front/js/toastr.min.js') }}"></script> -->

<!--toastr notification Start-->
<!-- <script>
    toastr.options = {
        "showHideTransition": 'plain',
        "closeButton": true,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "500",
        "timeOut": "7000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }

    @if (session('success'))
        Command: toastr["success"]('{{ session('success') }}', "Success");
    @endif

    @if (session('error'))
        Command: toastr["error"]('{{ session('error') }}', "Alert");
    @endif

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            Command: toastr["error"]('{{ $error }}', "Alert");
        @endforeach
    @endif
</script> -->
<!--toastr notification End-->
