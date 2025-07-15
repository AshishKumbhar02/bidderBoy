@extends('frontend.layouts.main')
<link href="{{url('public/assets/front/css/customer-profile.css')}}" rel="stylesheet">    
@section('page.breadcrumb')
<section class="inner_header">
  <div class="container">
    <ul class="breadcrumb breadcrumb list-inline justify-content-center">
      <li>
        <a href="{{url('')}}">Home</a>
      </li>
      <li> ></li>
      <li>Profile</li>
    </ul>
    <h4 class="text-center">Profile</h4>
  </div>
</section>
@endsection

@php
    $customerId = auth()->user()->id;
    $customer = DB::table('users')->where('id', '=', $customerId)->first();
@endphp

@section('page.content')
<section class="py-5">
   <div class="container">
      <div class="d-flex align-items-start">
         <!--include nav here-->
         @include('frontend/inc/profile-nav')
         <div class="aiz-user-panel">
            <div class="row gutters-16">
               <!-- Wallet summary -->
               <div class="col-xl-8 col-md-6 mb-4">
                  <div class="h-100" style="background-image: url('https://demo.activeitzone.com/ecommerce/public/assets/img/wallet-bg.png'); background-size: cover; background-position: center center;">
                     <div class="p-4 h-100 w-100 w-xl-50">
                        <p class="fs-14 fw-400 text-gray mb-3">Wallet Balance</p>
                        <h1 class="fs-30 fw-700 text-white ">0</h1>
                        <hr class="border border-dashed border-white opacity-40 ml-0 mt-4 mb-4">
                        <p class="fs-14 fw-400 text-gray mb-1">Last Recharge <strong>05.06.2023</strong></p>
                        <h3 class="fs-20 fw-700 text-white ">0</h3>
                        <button class="btn btn-block border border-soft-light hov-bg-dark text-white mt-5 py-3" onclick="show_wallet_modal()" style="border-radius: 0px; background: rgba(255, 255, 255, 0.1);">
                        <i class="la la-plus fs-18 fw-700 mr-2"></i>
                        Recharge Wallet
                        </button>
                        <hr class="border border-dashed border-white opacity-40 ml-0 mt-4 mb-4">
                        <h3 class="fs-20 fw-700 text-white ">Total Credits : {{$customer->credits}}</h3>
                        <button onclick="copyInvitationLink()" class="btn  border  hov-bg-dark text-white mt-5 py-3" onclick="show_wallet_modal()" style="border-radius: 0px; background: rgba(255, 255, 255, 0.1);">
                        
                        <i class="la la-plus fs-18 fw-700 mr-2"></i>
                            Invitation link
                        </button>
                     </div>
                  </div>
               </div>
               <div class="col mb-4">
                  <div class="h-100">
                     <div class="row h-100  row-cols-1">
                        <!-- Expenditure summary -->
                        <div class="col">
                           <div class="p-4 bg-primary " style="margin-bottom: 2rem;">
                              <div class="d-flex align-items-center pb-4 ">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48">
                                    <g id="Group_25000" data-name="Group 25000" transform="translate(-926 -614)">
                                       <rect id="Rectangle_18646" data-name="Rectangle 18646" width="48" height="48" rx="24" transform="translate(926 614)" fill="rgba(255,255,255,0.5)"></rect>
                                       <g id="Group_24786" data-name="Group 24786" transform="translate(701.466 93)">
                                          <path id="Path_32311" data-name="Path 32311" d="M122.052,10V8.55a.727.727,0,1,0-1.455,0V10a2.909,2.909,0,0,0-2.909,2.909v.727A2.909,2.909,0,0,0,120.6,16.55h1.455A1.454,1.454,0,0,1,123.506,18v.727a1.454,1.454,0,0,1-1.455,1.455H120.6a1.454,1.454,0,0,1-1.455-1.455.727.727,0,1,0-1.455,0,2.909,2.909,0,0,0,2.909,2.909V23.1a.727.727,0,1,0,1.455,0V21.641a2.909,2.909,0,0,0,2.909-2.909V18a2.909,2.909,0,0,0-2.909-2.909H120.6a1.454,1.454,0,0,1-1.455-1.455v-.727a1.454,1.454,0,0,1,1.455-1.455h1.455a1.454,1.454,0,0,1,1.455,1.455.727.727,0,0,0,1.455,0A2.909,2.909,0,0,0,122.052,10" transform="translate(127.209 529.177)" fill="#fff"></path>
                                       </g>
                                    </g>
                                 </svg>
                                 <div class="ml-3 d-flex flex-column justify-content-between">
                                    <span class="fs-14 fw-400 text-white mb-1">Total Expenditure</span>
                                    <span class="fs-20 fw-700 text-white">12,541.900</span>
                                 </div>
                              </div>
                              <a href="https://demo.activeitzone.com/ecommerce/purchase_history" class="fs-12 text-white">
                              View Order History
                              <i class="las la-angle-right fs-14"></i>
                              </a>
                           </div>
                        </div>
                        <!-- Club Point summary -->
                        <!--<div class="col">-->
                        <!--   <div class="p-4 bg-warning">-->
                        <!--      <div class="d-flex align-items-center pb-4 ">-->
                        <!--         <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48">-->
                        <!--            <g id="Group_25000" data-name="Group 25000" transform="translate(-926 -614)">-->
                        <!--               <rect id="Rectangle_18646" data-name="Rectangle 18646" width="48" height="48" rx="24" transform="translate(926 614)" fill="rgba(255,255,255,0.5)"></rect>-->
                        <!--               <g id="Group_24786" data-name="Group 24786" transform="translate(701.466 93)">-->
                        <!--                  <path id="Path_2961" data-name="Path 2961" d="M221.069,0a8,8,0,1,0,8,8,8,8,0,0,0-8-8m0,15a7,7,0,1,1,7-7,7,7,0,0,1-7,7" transform="translate(27.466 537)" fill="#fff"></path>-->
                        <!--                  <path id="Union_11" data-name="Union 11" d="M16425.393,420.226l-3.777-5.039a.42.42,0,0,1-.012-.482l1.662-2.515a.416.416,0,0,1,.313-.186l0,0h4.26a.41.41,0,0,1,.346.19l1.674,2.515a.414.414,0,0,1-.012.482l-3.777,5.039a.413.413,0,0,1-.338.169A.419.419,0,0,1,16425.393,420.226Zm-2.775-5.245,3.113,4.148,3.109-4.148-1.32-1.983h-3.592Z" transform="translate(-16177.195 129)" fill="#fff"></path>-->
                        <!--               </g>-->
                        <!--            </g>-->
                        <!--         </svg>-->
                        <!--         <div class="ml-3 d-flex flex-column justify-content-between">-->
                        <!--            <span class="fs-14 fw-400 text-white mb-1">Total Club Points</span>-->
                        <!--            <span class="fs-20 fw-700 text-white">10985</span>-->
                        <!--         </div>-->
                        <!--      </div>-->
                        <!--      <a href="https://demo.activeitzone.com/ecommerce/earning-points" class="fs-12 text-white">-->
                        <!--      Convert Club Points-->
                        <!--      <i class="las la-angle-right fs-14"></i>-->
                        <!--      </a>-->
                        <!--   </div>-->
                        <!--</div>-->
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
@endsection

@section('page.script')
<script>
 function copyInvitationLink(){
    navigator.clipboard.writeText('{{url("login?referral=".auth()->user()->id)}}');
    alert('Invitation Link Copied successfully!');
}     
</script>
@endsection