@php
    $customer = auth()->user();
@endphp

<div class="aiz-user-sidenav-wrap position-relative z-1 rounded-0">
    <div class="aiz-user-sidenav overflow-auto c-scrollbar-light px-4 pb-4">
        <!-- Close button -->
        <div class="d-xl-none">
            <button class="btn btn-sm p-2 " data-toggle="class-toggle" data-backdrop="static"
                data-target=".aiz-mobile-side-nav" data-same=".mobile-side-nav-thumb">
                <i class="las la-times la-2x"></i>
            </button>
        </div>
        <!-- Customer info -->
        <div class="p-4 text-center mb-4 border-bottom position-relative">
            <!-- Image -->
            <span class="avatar avatar-md mb-3">
                <img src="https://demo.activeitzone.com/ecommerce/public/uploads/all/5XVyeLGw5zRpb63bqgn2dtIOjCktLgBltNSQIPG3.png"
                    onerror="this.onerror=null;this.src='https://demo.activeitzone.com/ecommerce/public/assets/img/avatar-place.png';">
            </span>

            <!-- Name -->
            <h4 class="h5 fs-14 mb-1 fw-700 text-dark">{{ ucfirst($customer->name) }}</h4>
            <!-- Email -->
            <div class="text-truncate opacity-60 fs-12">{{ $customer->email }}</div>
            <!-- Phone -->
            <div class="text-truncate opacity-60 fs-12">{{ $customer->mobile_number }}</div>
        </div>
        <!-- Menus -->
        <div class="sidemnenu">
            <ul class="aiz-side-nav-list mb-3 pb-3 border-bottom metismenu" data-toggle="aiz-side-menu">
                <!-- Dashboard -->
                <li class="aiz-side-nav-item mm-active">
                    <a href="{{ route('profile.customer_profile_dashboard') }}" class="aiz-side-nav-link active"
                        aria-expanded="true">
                        <i class="fa fa-home" style="font-size: 18px;margin-right: 5px;"></i>
                        <span class="aiz-side-nav-text ml-3">Dashboard</span>
                    </a>
                </li>
                <!-- Manage Profile -->
                <li class="aiz-side-nav-item">
                    <a href="{{ route('profile.customer_profile_edit') }}" class="aiz-side-nav-link ">
                        <i class="fa fa-user" style="font-size: 18px;margin-right: 5px;"></i>
                        <span class="aiz-side-nav-text ml-3">Manage Profile</span>
                    </a>
                </li>
            </ul>
            <!-- logout -->
            <!--<a href="" class="btn btn-primary btn-block fs-14 fw-700 mb-5 mb-md-0" style="border-radius: 25px;">Sign Out</a>-->
        </div>
    </div>
</div>
