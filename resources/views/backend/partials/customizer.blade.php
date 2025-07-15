<!--  Customizer -->
<!--<button class="btn btn-primary p-3 rounded-circle d-flex align-items-center justify-content-center customizer-btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
<i class="ti ti-settings fs-7" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Settings"></i>
</button>
<div class="offcanvas offcanvas-end customizer" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel" data-simplebar="init">
   <div class="simplebar-wrapper" style="margin: 0px;">
      <div class="simplebar-height-auto-observer-wrapper">
         <div class="simplebar-height-auto-observer"></div>
      </div>
      <div class="simplebar-mask">
         <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
            <div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content" style="height: 100%; overflow: hidden scroll;">
               <div class="simplebar-content" style="padding: 0px;">
                  <div class="d-flex align-items-center justify-content-between p-3 border-bottom">
                     <h4 class="offcanvas-title fw-semibold" id="offcanvasExampleLabel">Settings</h4>
                     <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                  </div>
                  <div class="offcanvas-body p-4">
                     <div class="theme-option pb-4">
                        <h6 class="fw-semibold fs-4 mb-1">Theme Option</h6>
                        <div class="d-flex align-items-center gap-3 my-3">
                           <a href="javascript:void(0)" onclick="toggleTheme('{{url('public/assets/back/css/style.min.css')}}')" class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center gap-2 light-theme text-dark">
                           <i class="ti ti-brightness-up fs-7 text-primary"></i>
                           <span class="text-dark">Light</span>
                           </a>
                           <a href="javascript:void(0)" onclick="toggleTheme('{{url('public/assets/back/css/style-dark.min.css')}}')" class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center gap-2 dark-theme text-dark">
                           <i class="ti ti-moon fs-7 "></i>
                           <span class="text-dark">Dark</span>
                           </a>
                        </div>
                     </div>
                     <div class="theme-direction pb-4">
                        <h6 class="fw-semibold fs-4 mb-1">Theme Direction</h6>
                        <div class="d-flex align-items-center gap-3 my-3">
                           <a href="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/html/main/index.html" class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center gap-2">
                           <i class="ti ti-text-direction-ltr fs-6 text-primary"></i>
                           <span class="text-dark">LTR</span>
                           </a>
                           <a href="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/html/rtl/index.html" class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center gap-2">
                           <i class="ti ti-text-direction-rtl fs-6 text-dark"></i>
                           <span class="text-dark">RTL</span>
                           </a>
                        </div>
                     </div>
                     <div class="theme-colors pb-4">
                        <h6 class="fw-semibold fs-4 mb-1">Theme Colors</h6>
                        <div class="d-flex align-items-center gap-3 my-3">
                           <ul class="list-unstyled mb-0 d-flex gap-3 flex-wrap change-colors">
                              <li class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center justify-content-center">
                                 <a href="javascript:void(0)" class="rounded-circle position-relative d-block customizer-bgcolor skin1-bluetheme-primary active-theme " onclick="toggleTheme('{{url('public/assets/back/css/style.min.css')}}')" data-color="blue_theme" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="BLUE_THEME">undefined<i class="ti ti-check text-white d-flex align-items-center justify-content-center fs-5"></i>
                                 </a>
                              </li>
                              <li class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center justify-content-center">
                                 <a href="javascript:void(0)" class="rounded-circle position-relative d-block customizer-bgcolor skin2-aquatheme-primary " onclick="toggleTheme('{{url('public/assets/back/css/style-aqua.min.css')}}')" data-color="aqua_theme" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="AQUA_THEME">undefined<i class="ti ti-check  text-white d-flex align-items-center justify-content-center fs-5"></i>
                                 </a>
                              </li>
                              <li class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center justify-content-center">
                                 <a href="javascript:void(0)" class="rounded-circle position-relative d-block customizer-bgcolor skin3-purpletheme-primary" onclick="toggleTheme('{{url('public/assets/back/css/style-purple.min.css')}}')" data-color="purple_theme" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="PURPLE_THEME">undefined<i class="ti ti-check  text-white d-flex align-items-center justify-content-center fs-5"></i>
                                 </a>
                              </li>
                              <li class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center justify-content-center">
                                 <a href="javascript:void(0)" class="rounded-circle position-relative d-block customizer-bgcolor skin4-greentheme-primary" onclick="toggleTheme('{{url('public/assets/back/css/style-green.min.css')}}')" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="GREEN_THEME">undefined<i class="ti ti-check  text-white d-flex align-items-center justify-content-center fs-5"></i>
                                 </a>
                              </li>
                              <li class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center justify-content-center">
                                 <a href="javascript:void(0)" class="rounded-circle position-relative d-block customizer-bgcolor skin5-cyantheme-primary" onclick="toggleTheme('{{url('public/assets/back/css/style-cyan.min.css')}}')" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="CYAN_THEME">undefined<i class="ti ti-check  text-white d-flex align-items-center justify-content-center fs-5"></i>
                                 </a>
                              </li>
                              <li class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center justify-content-center">
                                 <a href="javascript:void(0)" class="rounded-circle position-relative d-block customizer-bgcolor skin6-orangetheme-primary" onclick="toggleTheme('{{url('public/assets/back/css/style-orange.min.css')}}')" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="ORANGE_THEME">undefined<i class="ti ti-check  text-white d-flex align-items-center justify-content-center fs-5"></i>
                                 </a>
                              </li>
                           </ul>
                        </div>
                     </div>
                     <div class="layout-type pb-4">
                        <h6 class="fw-semibold fs-4 mb-1">Layout Type</h6>
                        <div class="d-flex align-items-center gap-3 my-3">
                           <a href="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/html/main/index.html" class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center gap-2">
                           <i class="ti ti-layout-sidebar fs-6 text-primary"></i>
                           <span class="text-dark">Vertical</span>
                           </a>
                           <a href="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/html/horizontal/index.html" class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center gap-2">
                           <i class="ti ti-layout-navbar fs-6 text-dark"></i>
                           <span class="text-dark">Horizontal</span>
                           </a>
                        </div>
                     </div>
                     <div class="container-option pb-4">
                        <h6 class="fw-semibold fs-4 mb-1">Container Option</h6>
                        <div class="d-flex align-items-center gap-3 my-3">
                           <a href="javascript:void(0)" class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center gap-2 boxed-width text-dark">
                           <i class="ti ti-layout-distribute-vertical fs-7 text-primary"></i>
                           <span class="text-dark">Boxed</span>
                           </a>
                           <a href="javascript:void(0)" class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center gap-2 full-width text-dark">
                           <i class="ti ti-layout-distribute-horizontal fs-7"></i>
                           <span class="text-dark">Full</span>
                           </a>
                        </div>
                     </div>
                     <div class="sidebar-type pb-4">
                        <h6 class="fw-semibold fs-4 mb-1">Sidebar Type</h6>
                        <div class="d-flex align-items-center gap-3 my-3">
                           <a href="javascript:void(0)" class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center gap-2 fullsidebar">
                           <i class="ti ti-layout-sidebar-right fs-7"></i>
                           <span class="text-dark">Full</span>
                           </a>
                           <a href="javascript:void(0)" class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center text-dark sidebartoggler gap-2">
                           <i class="ti ti-layout-sidebar fs-7"></i>
                           <span class="text-dark">Collapse</span>
                           </a>
                        </div>
                     </div>
                     <div class="card-with pb-4">
                        <h6 class="fw-semibold fs-4 mb-1">Card With</h6>
                        <div class="d-flex align-items-center gap-3 my-3">
                           <a href="javascript:void(0)" class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center gap-2 text-dark cardborder">
                           <i class="ti ti-border-outer fs-7"></i>
                           <span class="text-dark">Border</span>
                           </a>
                           <a href="javascript:void(0)" class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center gap-2 cardshadow">
                           <i class="ti ti-border-none fs-7"></i>
                           <span class="text-dark">Shadow</span>
                           </a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="simplebar-placeholder" style="width: auto; height: 1173px;"></div>
   </div>
   <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
      <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
   </div>
   <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
      <div class="simplebar-scrollbar" style="height: 320px; transform: translate3d(0px, 0px, 0px); display: block;"></div>
   </div>
</div>-->

<!--<svg id="SvgjsSvg1001" width="2" height="0" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" style="overflow: hidden; top: -100%; left: -100%; position: absolute; opacity: 0;">
  <defs id="SvgjsDefs1002"></defs>
  <polyline id="SvgjsPolyline1003" points="0,0"></polyline>
  <path id="SvgjsPath1004" d="M-1 225L-1 225C-1 225 79.66666666666667 225 79.66666666666667 225C79.66666666666667 225 159.33333333333334 225 159.33333333333334 225C159.33333333333334 225 239 225 239 225C239 225 239 225 239 225 "></path>
</svg>-->
<!--  Customizer -->