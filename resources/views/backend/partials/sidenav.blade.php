<!-- Sidebar Start -->
<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="{{ url('admin/dashboard') }}" class="text-nowrap logo-img">
                <img src="{{ url('assets/front/img') }}/logo.png" class="dark-logo" width="180" height="auto"
                    alt="">
                <img src="{{ url('assets/front/img') }}/logo.png" class="light-logo" width="180" height="auto"
                    alt="" style="display: none;">
            </a>
            <div class="close-btn d-lg-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                <i class="ti ti-x fs-8"></i>
            </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="init">
            <div class="simplebar-wrapper selected" style="margin: 0px -24px;">
                <div class="simplebar-height-auto-observer-wrapper">
                    <div class="simplebar-height-auto-observer"></div>
                </div>
                <div class="simplebar-mask selected">
                    <div class="simplebar-offset selected" style="right: 0px; bottom: 0px;">
                        <div class="simplebar-content-wrapper selected" tabindex="0" role="region"
                            aria-label="scrollable content" style="height: 100%; overflow: hidden scroll;">
                            <div class="simplebar-content selected" style="padding: 0px 24px;">
                                <ul id="sidebarnav" class="in">
                                    <!-- ============================= -->
                                    <!-- Home -->
                                    <!-- ============================= -->
                                    <li class="nav-small-cap">
                                        <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                                        <span class="hide-menu">Home</span>
                                    </li>
                                    <!-- =================== -->
                                    <!-- Dashboard -->
                                    <!-- =================== -->
                                    <li class="sidebar-item @if (request()->segment(2) == 'dashboard') selected @endif">
                                        <a class="sidebar-link" href="{{ url('admin/dashboard') }}"
                                            aria-expanded="false">
                                            <span>
                                                <i class="fa-solid fa-gauge"></i>
                                            </span>
                                            <span class="hide-menu">Dashboard</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item @if (request()->segment(2) == 'customers' && request()->segment(3) == '') selected @endif">
                                        <a class="sidebar-link" href="{{ url('admin/customers') }}"
                                            aria-expanded="false">
                                            <span>
                                                <i class="fa-solid fa-user-group"></i>
                                            </span>
                                            <span class="hide-menu">User Management</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item @if (request()->segment(2) == 'bid_log' && request()->segment(3) == '') selected @endif">
                                        <a class="sidebar-link" href="{{ url('admin/bid_log') }}" aria-expanded="false">
                                            <span>
                                                <i class="fa-solid fa-user-group"></i>
                                            </span>
                                            <span class="hide-menu">Bid Log</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item @if (request()->segment(2) == 'auto_bid_customers' && request()->segment(3) == '') selected @endif">
                                        <a class="sidebar-link" href="{{ url('admin/auto_bid_customers') }}"
                                            aria-expanded="false">
                                            <span>
                                                <i class="fa-solid fa-user-group"></i>
                                            </span>
                                            <span class="hide-menu">Auto Bid Customers</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item @if (request()->segment(2) == 'product' && request()->segment(3) == 'all') selected @endif">
                                        <a class="sidebar-link" href="{{ route('product.index') }}"
                                            aria-expanded="false">
                                            <span>
                                                <i class="fa-solid fa-bag-shopping"></i>
                                            </span>
                                            <span class="hide-menu">Product Management</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item @if (request()->segment(2) == 'customers' && request()->segment(3) == 'credits_list') selected @endif">
                                        <a class="sidebar-link" href="{{ url('admin/customers/credits_list') }}"
                                            aria-expanded="false">
                                            <span>
                                                <i class="fa-solid fa-user-group"></i>
                                            </span>
                                            <span class="hide-menu">Credit Requests</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item @if (request()->segment(2) == 'frontend_settings') selected @endif">
                                        <a class="sidebar-link" href="{{ url('admin/frontend_settings') }}"
                                            aria-expanded="false">
                                            <span>
                                                <i class="fa-solid fa-gear"></i>
                                            </span>
                                            <span class="hide-menu">Content Management</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item @if (request()->segment(2) == 'business_settings') selected @endif">
                                        <a class="sidebar-link" href="{{ url('admin/business_settings') }}"
                                            aria-expanded="false">
                                            <span>
                                                <i class="fa-solid fa-gear"></i>
                                            </span>
                                            <span class="hide-menu">Business Settings</span>
                                        </a>
                                    </li>

                                    <li class="sidebar-item @if (request()->segment(2) == 'bids_packs') selected @endif">
                                        <a class="sidebar-link" href="{{ url('admin/bids_packs') }}"
                                            aria-expanded="false">
                                            <span>
                                                <i class="fa-solid fa-cubes"></i>
                                            </span>
                                            <span class="hide-menu">Bids Packs</span>
                                        </a>
                                    </li>

                                    <li class="sidebar-item @if (request()->segment(2) == 'coupon') selected @endif">
                                        <a class="sidebar-link" href="{{ url('admin/coupon') }}" aria-expanded="false">
                                            <span>
                                                <i class="fa-solid fa-tag"></i>
                                            </span>
                                            <span class="hide-menu">Coupons</span>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="simplebar-placeholder" style="width: auto; height: 3097px;"></div>
            </div>
            <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
            </div>
            <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
                <div class="simplebar-scrollbar"
                    style="height: 91px; transform: translate3d(0px, 369px, 0px); display: block;"></div>
            </div>
        </nav>
        <div class="fixed-profile p-3 bg-light-secondary rounded sidebar-ad mt-3">
            <div class="hstack gap-3">
                <div class="john-img">
                    <img src="{{ url('assets/back/img') }}/user-1.jpg" class="rounded-circle" width="40"
                        height="40" alt="">
                </div>
                <div class="john-title">
                    <h6 class="mb-0 fs-4 fw-semibold">Mathew</h6>
                    <span class="fs-2 text-dark">Designer</span>
                </div>
                <button class="border-0 bg-transparent text-primary ms-auto" tabindex="0" type="button"
                    aria-label="logout" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="logout">
                    <i class="ti ti-power fs-6"></i>
                </button>
            </div>
        </div>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<!--  Sidebar End -->
