<!DOCTYPE html>
<html>
  <head>
    @include('backend.partials.meta')
    @include('backend.partials.css')
  </head>
  <body> 
  @include('backend.partials.preloader')
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-theme="blue_theme" data-layout="vertical" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
      @include('backend.partials.sidenav')
      <!--  Main wrapper -->
      <div class="body-wrapper">
        @include('backend.partials.header')
        <div class="container-fluid">
            @yield('page.content') 
        </div>
      </div>
    </div>    
    
    <!--  Shopping Cart -->
    <div class="offcanvas offcanvas-end shopping-cart" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
      <div class="offcanvas-header py-4">
        <h5 class="offcanvas-title fs-5 fw-semibold" id="offcanvasRightLabel">Shopping Cart</h5>
        <span class="badge bg-primary rounded-4 px-3 py-1 lh-sm">5 new</span>
      </div>
      <div class="offcanvas-body h-100 px-4 pt-0" data-simplebar="init">
        <div class="simplebar-wrapper" style="margin: 0px -24px -16px;">
          <div class="simplebar-height-auto-observer-wrapper">
            <div class="simplebar-height-auto-observer"></div>
          </div>
          <div class="simplebar-mask">
            <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
              <div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content" style="height: 100%; overflow: hidden;">
                <div class="simplebar-content" style="padding: 0px 24px 16px;">
                  <ul class="mb-0">
                    <li class="pb-7">
                      <div class="d-flex align-items-center">
                        <img src="{{url('public/assets/back/img')}}/product-1.jpg" width="95" height="75" class="rounded-1 me-9 flex-shrink-0" alt="">
                        <div>
                          <h6 class="mb-1">Supreme toys cooker</h6>
                          <p class="mb-0 text-muted fs-2">Kitchenware Item</p>
                          <div class="d-flex align-items-center justify-content-between mt-2">
                            <h6 class="fs-2 fw-semibold mb-0 text-muted">$250</h6>
                            <div class="input-group input-group-sm w-50">
                              <button class="btn border-0 round-20 minus p-0 bg-light-success text-success " type="button" id="add1"> - </button>
                              <input type="text" class="form-control round-20 bg-transparent text-muted fs-2 border-0  text-center qty" placeholder="" aria-label="Example text with button addon" aria-describedby="add1" value="1">
                              <button class="btn text-success bg-light-success  p-0 round-20 border-0 add" type="button" id="addo2"> + </button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li class="pb-7">
                      <div class="d-flex align-items-center">
                        <img src="{{url('public/assets/back/img')}}/product-2.jpg" width="95" height="75" class="rounded-1 me-9 flex-shrink-0" alt="">
                        <div>
                          <h6 class="mb-1">Supreme toys cooker</h6>
                          <p class="mb-0 text-muted fs-2">Kitchenware Item</p>
                          <div class="d-flex align-items-center justify-content-between mt-2">
                            <h6 class="fs-2 fw-semibold mb-0 text-muted">$250</h6>
                            <div class="input-group input-group-sm w-50">
                              <button class="btn border-0 round-20 minus p-0 bg-light-success text-success " type="button" id="add2"> - </button>
                              <input type="text" class="form-control round-20 bg-transparent text-muted fs-2 border-0  text-center qty" placeholder="" aria-label="Example text with button addon" aria-describedby="add2" value="1">
                              <button class="btn text-success bg-light-success  p-0 round-20 border-0 add" type="button" id="addon34"> + </button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li class="pb-7">
                      <div class="d-flex align-items-center">
                        <img src="{{url('public/assets/back/img')}}/product-3.jpg" width="95" height="75" class="rounded-1 me-9 flex-shrink-0" alt="">
                        <div>
                          <h6 class="mb-1">Supreme toys cooker</h6>
                          <p class="mb-0 text-muted fs-2">Kitchenware Item</p>
                          <div class="d-flex align-items-center justify-content-between mt-2">
                            <h6 class="fs-2 fw-semibold mb-0 text-muted">$250</h6>
                            <div class="input-group input-group-sm w-50">
                              <button class="btn border-0 round-20 minus p-0 bg-light-success text-success " type="button" id="add3"> - </button>
                              <input type="text" class="form-control round-20 bg-transparent text-muted fs-2 border-0  text-center qty" placeholder="" aria-label="Example text with button addon" aria-describedby="add3" value="1">
                              <button class="btn text-success bg-light-success  p-0 round-20 border-0 add" type="button" id="addon3"> + </button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </li>
                  </ul>
                  <div class="align-bottom">
                    <div class="d-flex align-items-center pb-7">
                      <span class="text-dark fs-3">Sub Total</span>
                      <div class="ms-auto">
                        <span class="text-dark fw-semibold fs-3">$2530</span>
                      </div>
                    </div>
                    <div class="d-flex align-items-center pb-7">
                      <span class="text-dark fs-3">Total</span>
                      <div class="ms-auto">
                        <span class="text-dark fw-semibold fs-3">$6830</span>
                      </div>
                    </div>
                    <a href="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/html/main/eco-checkout.html" class="btn btn-outline-primary w-100">Go to shopping cart</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="simplebar-placeholder" style="width: auto; height: 469px;"></div>
        </div>
        <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
          <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
        </div>
        <div class="simplebar-track simplebar-vertical" style="visibility: hidden;">
          <div class="simplebar-scrollbar" style="height: 0px; display: none;"></div>
        </div>
      </div>
    </div>
    <!--  Mobilenavbar -->
    <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="mobilenavbar" aria-labelledby="offcanvasWithBothOptionsLabel">
      <nav class="sidebar-nav scroll-sidebar">
        <div class="offcanvas-header justify-content-between">
          <img src="{{url('public/assets/back/img')}}/favicon.png" alt="" class="img-fluid">
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body profile-dropdown mobile-navbar" data-simplebar="init">
          <div class="simplebar-wrapper" style="margin: -16px;">
            <div class="simplebar-height-auto-observer-wrapper">
              <div class="simplebar-height-auto-observer"></div>
            </div>
            <div class="simplebar-mask">
              <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                <div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content" style="height: 100%; overflow: hidden;">
                  <div class="simplebar-content" style="padding: 16px;">
                    <ul id="sidebarnav">
                      <li class="sidebar-item">
                        <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                          <span>
                            <i class="ti ti-apps"></i>
                          </span>
                          <span class="hide-menu">Apps</span>
                        </a>
                        <ul aria-expanded="false" class="collapse first-level my-3">
                          <li class="sidebar-item py-2">
                            <a href="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/html/main/index.html#" class="d-flex align-items-center">
                              <div class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                <img src="{{url('public/assets/back/img')}}/icon-dd-chat.svg" alt="" class="img-fluid" width="24" height="24">
                              </div>
                              <div class="d-inline-block">
                                <h6 class="mb-1 bg-hover-primary">Chat Application</h6>
                                <span class="fs-2 d-block fw-normal text-muted">New messages arrived</span>
                              </div>
                            </a>
                          </li>
                          <li class="sidebar-item py-2">
                            <a href="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/html/main/index.html#" class="d-flex align-items-center">
                              <div class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                <img src="{{url('public/assets/back/img')}}/icon-dd-invoice.svg" alt="" class="img-fluid" width="24" height="24">
                              </div>
                              <div class="d-inline-block">
                                <h6 class="mb-1 bg-hover-primary">Invoice App</h6>
                                <span class="fs-2 d-block fw-normal text-muted">Get latest invoice</span>
                              </div>
                            </a>
                          </li>
                          <li class="sidebar-item py-2">
                            <a href="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/html/main/index.html#" class="d-flex align-items-center">
                              <div class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                <img src="{{url('public/assets/back/img')}}/icon-dd-mobile.svg" alt="" class="img-fluid" width="24" height="24">
                              </div>
                              <div class="d-inline-block">
                                <h6 class="mb-1 bg-hover-primary">Contact Application</h6>
                                <span class="fs-2 d-block fw-normal text-muted">2 Unsaved Contacts</span>
                              </div>
                            </a>
                          </li>
                          <li class="sidebar-item py-2">
                            <a href="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/html/main/index.html#" class="d-flex align-items-center">
                              <div class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                <img src="{{url('public/assets/back/img')}}/icon-dd-message-box.svg" alt="" class="img-fluid" width="24" height="24">
                              </div>
                              <div class="d-inline-block">
                                <h6 class="mb-1 bg-hover-primary">Email App</h6>
                                <span class="fs-2 d-block fw-normal text-muted">Get new emails</span>
                              </div>
                            </a>
                          </li>
                          <li class="sidebar-item py-2">
                            <a href="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/html/main/index.html#" class="d-flex align-items-center">
                              <div class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                <img src="{{url('public/assets/back/img')}}/icon-dd-cart.svg" alt="" class="img-fluid" width="24" height="24">
                              </div>
                              <div class="d-inline-block">
                                <h6 class="mb-1 bg-hover-primary">User Profile</h6>
                                <span class="fs-2 d-block fw-normal text-muted">learn more information</span>
                              </div>
                            </a>
                          </li>
                          <li class="sidebar-item py-2">
                            <a href="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/html/main/index.html#" class="d-flex align-items-center">
                              <div class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                <img src="{{url('public/assets/back/img')}}/icon-dd-date.svg" alt="" class="img-fluid" width="24" height="24">
                              </div>
                              <div class="d-inline-block">
                                <h6 class="mb-1 bg-hover-primary">Calendar App</h6>
                                <span class="fs-2 d-block fw-normal text-muted">Get dates</span>
                              </div>
                            </a>
                          </li>
                          <li class="sidebar-item py-2">
                            <a href="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/html/main/index.html#" class="d-flex align-items-center">
                              <div class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                <img src="{{url('public/assets/back/img')}}/icon-dd-lifebuoy.svg" alt="" class="img-fluid" width="24" height="24">
                              </div>
                              <div class="d-inline-block">undefined<h6 class="mb-1 bg-hover-primary">Contact List Table</h6>undefined<span class="fs-2 d-block fw-normal text-muted">Add new contact</span>
                              </div>
                            </a>
                          </li>
                          <li class="sidebar-item py-2">
                            <a href="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/html/main/index.html#" class="d-flex align-items-center">
                              <div class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">undefined<img src="{{url('public/assets/back/img')}}/icon-dd-application.svg" alt="" class="img-fluid" width="24" height="24">undefined</div>undefined<div class="d-inline-block">undefined<h6 class="mb-1 bg-hover-primary">Notes Application</h6>undefined<span class="fs-2 d-block fw-normal text-muted">To-do and Daily tasks</span>undefined</div>
                            </a>
                          </li>
                          <ul class="px-8 mt-7 mb-4">
                            <li class="sidebar-item mb-3">undefined<h5 class="fs-5 fw-semibold">Quick Links</h5>
                            </li>
                            <li class="sidebar-item py-2">undefined<a class="fw-semibold text-dark" href="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/html/main/index.html#">Pricing Page</a>
                            </li>
                            <li class="sidebar-item py-2">undefined<a class="fw-semibold text-dark" href="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/html/main/index.html#">Authentication Design</a>
                            </li>
                            <li class="sidebar-item py-2">undefined<a class="fw-semibold text-dark" href="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/html/main/index.html#">Register Now</a>
                            </li>
                            <li class="sidebar-item py-2">undefined<a class="fw-semibold text-dark" href="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/html/main/index.html#">404 Error Page</a>
                            </li>
                            <li class="sidebar-item py-2">undefined<a class="fw-semibold text-dark" href="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/html/main/index.html#">Notes App</a>
                            </li>
                            <li class="sidebar-item py-2">undefined<a class="fw-semibold text-dark" href="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/html/main/index.html#">User Application</a>
                            </li>
                            <li class="sidebar-item py-2">undefined<a class="fw-semibold text-dark" href="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/html/main/index.html#">Account Settings</a>
                            </li>
                          </ul>
                        </ul>
                      </li>
                      <li class="sidebar-item">
                        <a class="sidebar-link" href="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/html/main/app-chat.html" aria-expanded="false">
                          <span>
                            <i class="ti ti-message-dots"></i>
                          </span>
                          <span class="hide-menu">Chat</span>
                        </a>
                      </li>
                      <li class="sidebar-item">
                        <a class="sidebar-link" href="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/html/main/app-calendar.html" aria-expanded="false">
                          <span>
                            <i class="ti ti-calendar"></i>
                          </span>
                          <span class="hide-menu">Calendar</span>
                        </a>
                      </li>
                      <li class="sidebar-item">
                        <a class="sidebar-link" href="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/html/main/app-email.html" aria-expanded="false">
                          <span>
                            <i class="ti ti-mail"></i>
                          </span>
                          <span class="hide-menu">Email</span>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="simplebar-placeholder" style="width: auto; height: 234px;"></div>
          </div>
          <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
            <div class="simplebar-scrollbar" style="width: 0px; transform: translate3d(0px, 0px, 0px); display: none;"></div>
          </div>
          <div class="simplebar-track simplebar-vertical" style="visibility: hidden;">
            <div class="simplebar-scrollbar" style="height: 0px; display: none;"></div>
          </div>
        </div>
      </nav>
    </div>
    <!--  Search Bar -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content rounded-1">
          <div class="modal-header border-bottom">
            <input type="search" class="form-control fs-3" placeholder="Search here" id="search">
            <span data-bs-dismiss="modal" class="lh-1 cursor-pointer">
              <i class="ti ti-x fs-5 ms-3"></i>
            </span>
          </div>
          <div class="modal-body message-body" data-simplebar="init">
            <div class="simplebar-wrapper" style="margin: -16px;">
              <div class="simplebar-height-auto-observer-wrapper">
                <div class="simplebar-height-auto-observer"></div>
              </div>
              <div class="simplebar-mask">
                <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                  <div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content" style="height: auto; overflow: hidden;">
                    <div class="simplebar-content" style="padding: 16px;">
                      <h5 class="mb-0 fs-5 p-1">Quick Page Links</h5>
                      <ul class="list mb-0 py-2">
                        <li class="p-1 mb-1 bg-hover-light-black">
                          <a href="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/html/main/index.html#">undefined<span class="fs-3 text-black fw-normal d-block">Modern</span>undefined<span class="fs-3 text-muted d-block">/dashboards/dashboard1</span>
                          </a>
                        </li>
                        <li class="p-1 mb-1 bg-hover-light-black">
                          <a href="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/html/main/index.html#">undefined<span class="fs-3 text-black fw-normal d-block">Dashboard</span>undefined<span class="fs-3 text-muted d-block">/dashboards/dashboard2</span>
                          </a>
                        </li>
                        <li class="p-1 mb-1 bg-hover-light-black">
                          <a href="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/html/main/index.html#">undefined<span class="fs-3 text-black fw-normal d-block">Contacts</span>undefined<span class="fs-3 text-muted d-block">/apps/contacts</span>
                          </a>
                        </li>
                        <li class="p-1 mb-1 bg-hover-light-black">
                          <a href="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/html/main/index.html#">undefined<span class="fs-3 text-black fw-normal d-block">Posts</span>undefined<span class="fs-3 text-muted d-block">/apps/blog/posts</span>
                          </a>
                        </li>
                        <li class="p-1 mb-1 bg-hover-light-black">
                          <a href="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/html/main/index.html#">undefined<span class="fs-3 text-black fw-normal d-block">Detail</span>undefined<span class="fs-3 text-muted d-block">/apps/blog/detail/streaming-video-way-before-it-was-cool-go-dark-tomorrow</span>
                          </a>
                        </li>
                        <li class="p-1 mb-1 bg-hover-light-black">
                          <a href="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/html/main/index.html#">undefined<span class="fs-3 text-black fw-normal d-block">Shop</span>undefined<span class="fs-3 text-muted d-block">/apps/ecommerce/shop</span>
                          </a>
                        </li>
                        <li class="p-1 mb-1 bg-hover-light-black">
                          <a href="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/html/main/index.html#">undefined<span class="fs-3 text-black fw-normal d-block">Modern</span>undefined<span class="fs-3 text-muted d-block">/dashboards/dashboard1</span>
                          </a>
                        </li>
                        <li class="p-1 mb-1 bg-hover-light-black">
                          <a href="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/html/main/index.html#">undefined<span class="fs-3 text-black fw-normal d-block">Dashboard</span>undefined<span class="fs-3 text-muted d-block">/dashboards/dashboard2</span>
                          </a>
                        </li>
                        <li class="p-1 mb-1 bg-hover-light-black">
                          <a href="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/html/main/index.html#">undefined<span class="fs-3 text-black fw-normal d-block">Contacts</span>undefined<span class="fs-3 text-muted d-block">/apps/contacts</span>
                          </a>
                        </li>
                        <li class="p-1 mb-1 bg-hover-light-black">
                          <a href="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/html/main/index.html#">undefined<span class="fs-3 text-black fw-normal d-block">Posts</span>undefined<span class="fs-3 text-muted d-block">/apps/blog/posts</span>
                          </a>
                        </li>
                        <li class="p-1 mb-1 bg-hover-light-black">
                          <a href="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/html/main/index.html#">undefined<span class="fs-3 text-black fw-normal d-block">Detail</span>undefined<span class="fs-3 text-muted d-block">/apps/blog/detail/streaming-video-way-before-it-was-cool-go-dark-tomorrow</span>
                          </a>
                        </li>
                        <li class="p-1 mb-1 bg-hover-light-black">
                          <a href="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/html/main/index.html#">undefined<span class="fs-3 text-black fw-normal d-block">Shop</span>undefined<span class="fs-3 text-muted d-block">/apps/ecommerce/shop</span>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <div class="simplebar-placeholder" style="width: 0px; height: 0px;"></div>
            </div>
            <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
              <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
            </div>
            <div class="simplebar-track simplebar-vertical" style="visibility: hidden;">
              <div class="simplebar-scrollbar" style="height: 0px; display: none;"></div>
            </div>
          </div>
        </div>
      </div>
    </div>

    @include('backend.partials.customizer')
    
    @include('backend.partials.js')
      
    @yield('page.script')
  </body>
</html>