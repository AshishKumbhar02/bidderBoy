@extends('backend.layouts.main')

@section('page.content')
    <style>
        .owl-carousel img.mb-3 {
            width: 35% !important;
            height: auto;
            display: inline-block;
        }
    </style>

    <!-- Owl Carousel Counter Boxes -->
    <div class="owl-carousel counter-carousel owl-theme owl-rtl">
        <!-- Users -->
        <div class="item">
            <div class="card border-0 zoom-in bg-light-primary shadow-none">
                <div class="card-body text-center">
                    <img src="{{ asset('assets/back/img/icon-user-male.svg') }}" width="50" height="50" class="mb-3"
                        alt="Users">
                    <p class="fw-semibold fs-3 text-primary mb-1">Users</p>
                    <h5 class="fw-semibold text-primary mb-0">{{ DB::table('users')->count() }}</h5>
                </div>
            </div>
        </div>

        <!-- Credit Requests -->
        <div class="item">
            <div class="card border-0 zoom-in bg-light-success shadow-none">
                <div class="card-body text-center">
                    <img src="{{ asset('assets/back/img/money.png') }}" width="50" height="50" class="mb-3"
                        alt="Credits">
                    <p class="fw-semibold fs-3 text-success mb-1">Credit Requests</p>
                    <h5 class="fw-semibold text-success mb-0">{{ DB::table('credits')->count() }}</h5>
                </div>
            </div>
        </div>

        <!-- Products -->
        <div class="item">
            <div class="card border-0 zoom-in bg-light-info shadow-none">
                <div class="card-body text-center">
                    <img src="{{ asset('assets/back/img/box.png') }}" width="50" height="50" class="mb-3"
                        alt="Products">
                    <p class="fw-semibold fs-3 text-info mb-1">Products</p>
                    <h5 class="fw-semibold text-info mb-0">{{ DB::table('products')->count() }}</h5>
                </div>
            </div>
        </div>

        <!-- Bids Pack -->
        <div class="item">
            <div class="card border-0 zoom-in bg-light-danger shadow-none">
                <div class="card-body text-center">
                    <img src="{{ asset('assets/back/img/discount.png') }}" width="50" height="50" class="mb-3"
                        alt="Bids Pack">
                    <p class="fw-semibold fs-3 text-danger mb-1">Bids Pack</p>
                    <h5 class="fw-semibold text-danger mb-0">{{ DB::table('bids_packs')->count() }}</h5>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page.script')
    <!-- Current page js files -->
    <script src="{{ asset('assets/back/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/back/js/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/back/js/dashboard.js') }}?time={{ time() }}"></script>
@endsection
