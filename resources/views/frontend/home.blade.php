@extends('frontend.layouts.main')
@php
    use Carbon\Carbon;
@endphp
<style>
    .name_of_bidder {
        font-size: 12px;
    }

    body {
        font-family: "Open Sans", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", Helvetica, Arial, sans-serif;
    }

    /* <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'></link> */
</style>

@section('page.content')
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 justify-content-end branded_box">
                    <h1>Branded Products <br>
                        Fast Closing Deals
                    </h1>
                    <select class="form-select category_name" aria-label="Default select example">
                        <option selected>Browse Product Category</option>
                        @foreach ($categories as $row)
                            <option value="{{ $row->id }}">{{ $row->category_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
                </div>
            </div>
        </div>
    </section>
    <!-- End Hero -->
    <main id="main">
        <!-- ======= Clients Section ======= -->
        <section class="top_section_form">
            <div class="container">
                <div class="row" data-aos="zoom-in">
                    <div class="col-sm-2 col-md-6">
                        <button type="button" class="btn auction_button active"> <img
                                src="{{ url('/assets/front') }}/img/boy-footer.png">Live Auctions</button>
                        <button type="button" class="btn auction_button">Upcoming Auctions</button>
                        <button type="button" class="btn auction_button">Closed Auctions</button>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <form class="navbar-form" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search" name="q">
                                <div class="input-group-btn">
                                    <button class="btn btn-default" type="submit"><i class="fa fa-search"
                                            aria-hidden="true"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>



        <section class="product_main_box">
            <div class="container">
                <div class="row">

                    @foreach ($products as $row)
                        <div class="col-md-4 col-sm-6" id="product-{{ $row->id }}">
                            <div class="product-grid pro_mrg_1 product-active">
                                <div class="product_top_box">
                                    <h4>{{ $row->product_title }}</h4>
                                    <p>{{ $row->product_subtitle }}/p>
                                </div>
                                <div class="product_star">
                                    <a href="#">MRP: Rs.{{ $row->retail_price }}</a>
                                    <p>{{ $row->credit_per_bid }}
                                        <img class="cross_icon" src="{{ url('assets/front') }}/img/close.png">
                                        <img class="pic-1" src="{{ url('assets/front') }}/img/star.png">
                                    </p>
                                </div>
                                <div class="product-image ">
                                    <a href="{{ url('auction/' . $row->id) }}" class="image">
                                        <img class="pic-1" src="{{ url('images/' . $row->image) }}">

                                    </a>
                                    <span class="product-sale-label">No New Bidders</span>
                                </div>
                                <div class="product-content">

                                    <h3 class="title product_cur_price_{{ $row->id }}"> Rs.
                                        <span class="bid-price-{{ $row->id }} ">
                                            <?php
                                            date_default_timezone_set('Asia/Kolkata');
                                            
                                            $start_date_bid = $row->start_date_bid;
                                            $start_hour_bid = $row->start_hour_bid;
                                            $start_minute_bid = $row->start_minute_bid;
                                            // $last_bid_is= $row->last_bid_is;
                                            
                                            $currentDateTime = Carbon::now();
                                            $targetDateTime = Carbon::parse($row->start_date_bid);
                                            $hour = !empty($row->start_hour_bid) ? $row->start_hour_bid : 0;
                                            $minute = !empty($row->start_minute_bid) ? $row->start_minute_bid : 0;
                                            $targetDateTime->addHours($hour);
                                            $targetDateTime->addMinutes($minute);
                                            
                                            $end_timestamp = strtotime("$start_date_bid $start_hour_bid:$start_minute_bid:00");
                                            
                                            $current_datetime = now();
                                            $current_timestamp = strtotime($current_datetime);
                                            
                                            $name_show = 0;
                                            $current_product_price = $time_left = 0;
                                            // dd($row);
                                            if (!empty($row->amount_per_bid) && $row->amount_per_bid != 0) {
                                                // Calculate end time based on last bid time and reset_time_bid_sec
                                                $reset_time_bid_sec = $row->reset_time_bid;
                                            
                                                $last_bid_timestamp = strtotime($row->last_bid_date);
                                                //  $last_bid_timestamp += $reset_time_bid_sec;
                                            
                                                if ($current_timestamp < $last_bid_timestamp) {
                                                    // Calculate time left for ongoing bid
                                                    $time_left_seconds = $last_bid_timestamp - $current_timestamp;
                                                    $time_left = gmdate('H:i:s', $time_left_seconds);
                                            
                                                    $current_product_price = $row->amount_per_bid;
                                                    $name_show = 1;
                                                } else {
                                                    // Set up for a new bid cycle
                                                    $time_left = '00:00:00';
                                                    $current_product_price = $row->amount_per_bid;
                                                }
                                            }
                                            
                                            echo $current_product_price;
                                            
                                            ?></span>
                                    </h3>

                                    <h6
                                        class="bidder-name-{{ $row->id }} name_of_bidder name_of_bidder_{{ $row->id }}">
                                        @php

                                            echo !empty($row->last_bidder_name)
                                                ? $row->last_bidder_name
                                                : 'No New Bidders';

                                        @endphp </h6>
                                    <h3 class="title"><a href="{{ url('auction/' . $row->id) }}">Auction ID:
                                            {{ $row->id }}</a></h3>
                                    <h4 class="title_hed"><a href="{{ url('auction/' . $row->id) }}"
                                            data-seconds="{{ $time_left }}" data-product-id="{{ $row->id }}"
                                            class="product_timer_div product_timer_{{ $row->id }} ">
                                            <span class="countdown"> {{ $time_left }} </span> </a></h4>
                                    <div class="product_bottom_bx">
                                        <a href="{{ route('buy_product_detail_page', $row->id) }}">
                                            <img class="cardbtn" src="{{ url('assets/front') }}/img/cart-button.png">
                                        </a>
                                        @if (Auth::check())
                                            <a type="button" class="auto_bid_product" data-bs-toggle="modal"
                                                data-bs-target="#myModal" data-product-name="{{ $row->product_title }}"
                                                data-id="{{ $row->id }}"><img class="cardbtn"
                                                    src="{{ url('assets/front') }}/img/auto-button.png"></a>

                                            <button type="button" class="btn btn-info mrgleft10 bid_now"
                                                data-id="{{ $row->id }}" data-amount="{{ $row->credit_per_bid }}"
                                                data-user="{{ Auth::user()->id }}" data-token="{{ csrf_token() }}">BID
                                                NOW</button>
                                        @else
                                            <a href="{{ url('login') }}" data-product-name="{{ $row->product_title }}"
                                                data-id="{{ $row->id }}"><img class="cardbtn"
                                                    src="{{ url('assets/front') }}/img/auto-button.png"></a>

                                            <a href="{{ url('login') }}" class="btn btn-info mrgleft10">BID NOW</a>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <!-- The Modal -->
                    <div class="modal" id="myModal">
                        <div style="background: white;" class="modal-dialog">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title"> Auto Bid</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <input type="hidden" id="auto_bid_product_id" />
                                <!-- Modal body -->
                                <div class="modal-body">
                                    Number of Automatic Bids
                                    <input name="txtMaxBidCredit" type="number" id="MaxBidCredit"
                                        placeholder="i.e 5 or 20 or 100" class="form-control">
                                    Activate at Rs *
                                    <input name="txtStartRs" type="number" id="StartRs"
                                        placeholder="i.e 2.30 or 0.10" class="form-control">

                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>

                                    <button type="button" class="btn btn-success auto_bid_submit">Submit</button>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!--<div class="col-md-4 col-sm-6">
                <div class="product-grid pro_mrg_2">
                   <div class="product_top_box">
                      <h4>External Hard Drives</h4>
                      <p>2 TB, Orange Silver Color,</p>
                      <p>with Leather Box</p>
                   </div>
                   <div class="product_star">
                                                               <a href="#"  >MRP: Rs.15000.00</a>

                      <p>2 <img class="cross_icon" src="{{ url('assets/front') }}/img/close.png"> <img class="pic-1" src="{{ url('assets/front') }}/img/star.png"></p>
                   </div>
                   <div class="product-image">
                      <a href="{{ url('auction/1') }}" class="image">
                      <img class="pic-1" src="{{ url('assets/front') }}/img/drive.jpg">
                      </a>
                   </div>
                   <div class="product-content">
                      <h3 class="title"><a href="{{ url('auction/1') }}">Ajit Singh</a></h3>
                      <h4 class="title_hed"><a href="{{ url('auction/1') }}">00:00:06</a></h4>
                      <div class="product_bottom_bx">
                         <a href=""><img class="cardbtn" src="{{ url('assets/front') }}/img/cart-button.png"></a>
                         <a href=""><img class="cardbtn" src="{{ url('assets/front') }}/img/auto-button.png"></a>
                         <button type="button" class="btn btn-info mrgleft10">BID NOW</button>
                      </div>
                   </div>
                </div>
             </div>
             <div class="col-md-4 col-sm-6">
                <div class="product-grid pro_mrg_3 product-active">
                   <div class="product_top_box">
                      <h4>Fire-Boltt Smartwatch</h4>
                      <p>Talk 2 Bluetooth Calling, Dual Button,</p>
                      <p>Hands On Voice Assistance, 120 Sports Modes,</p>
                   </div>
                   <div class="product_star">                                        <a href="#"  >MRP: Rs.15000.00</a>

                      <p>1 <img class="cross_icon" src="{{ url('assets/front') }}/img/close.png"> <img class="pic-1" src="{{ url('assets/front') }}/img/star.png"></p>
                   </div>
                   <div class="product-image">
                      <a href="{{ url('auction/1') }}" class="image">
                      <img class="pic-1" src="{{ url('assets/front') }}/img/watch.jpg">
                      </a>
                      <span class="product-sale-label">No New Bidders</span>
                   </div>
                   <div class="product-content">
                      <h3 class="title"><a href="{{ url('auction/1') }}">Ramesh</a></h3>
                      <h4 class="title_hed"><a href="{{ url('auction/1') }}">00:00:07</a></h4>
                      <div class="product_bottom_bx">
                         <a href=""><img class="cardbtn" src="{{ url('assets/front') }}/img/cart-button.png"></a>
                         <a href=""><img class="cardbtn" src="{{ url('assets/front') }}/img/auto-button.png"></a>
                         <button type="button" class="btn btn-info mrgleft10">BID NOW</button>
                      </div>
                   </div>
                </div>
             </div>
             <div class="col-md-4 col-sm-6">
                <div class="product-grid pro_mrg_1">
                   <div class="product_top_box">
                      <h4>Garden Outdoor Indoor Zula</h4>
                      <p>Zula with Stand, MZ-140, Honey Cum Brown,</p>
                      <p>Dark Brown Cushion</p>
                   </div>
                   <div class="product_star">
                                                               <a href="#"  >MRP: Rs.15000.00</a>

                      <p>4 <img class="cross_icon" src="{{ url('assets/front') }}/img/close.png"> <img class="pic-1" src="{{ url('assets/front') }}/img/star.png"></p>
                   </div>
                   <div class="product-image">
                      <a href="{{ url('auction/1') }}" class="image">
                      <img class="pic-1" src="{{ url('assets/front') }}/img/zula.jpg">
                      </a>
                   </div>
                   <div class="product-content">
                      <h3 class="title"><a href="{{ url('auction/1') }}">Kapil</a></h3>
                      <h4 class="title_hed"><a href="{{ url('auction/1') }}">00:00:08</a></h4>
                      <div class="product_bottom_bx">
                         <a href=""><img class="cardbtn" src="{{ url('assets/front') }}/img/cart-button.png"></a>
                         <a href=""><img class="cardbtn" src="{{ url('assets/front') }}/img/auto-button.png"></a>
                         <button type="button" class="btn btn-info mrgleft10">BID NOW</button>
                      </div>
                   </div>
                </div>
             </div>
             <div class="col-md-4 col-sm-6">
                <div class="product-grid pro_mrg_2 product-active">
                   <div class="product_top_box">
                      <h4>Casio Youth Collection</h4>
                      <p>100-meter water resistance</p>
                      <p>10-year battery life, LED backlight, Dual time</p>
                   </div>
                   <div class="product_star">
                                                               <a href="#"  >MRP: Rs.15000.00</a>

                      <p>9 <img class="cross_icon" src="{{ url('assets/front') }}/img/close.png"> <img class="pic-1" src="{{ url('assets/front') }}/img/star.png"></p>
                   </div>
                   <div class="product-image">
                      <a href="{{ url('auction/1') }}" class="image">
                      <img class="pic-1" src="{{ url('assets/front') }}/img/watch-min.jpg">
                      </a>
                      <span class="product-sale-label">No New Bidders</span>
                   </div>
                   <div class="product-content">
                      <h3 class="title"><a href="{{ url('auction/1') }}">Sandeep</a></h3>
                      <h4 class="title_hed"><a href="{{ url('auction/1') }}">00:00:01</a></h4>
                      <div class="product_bottom_bx">
                         <a href=""><img class="cardbtn" src="{{ url('assets/front') }}/img/cart-button.png"></a>
                         <a href=""><img class="cardbtn" src="{{ url('assets/front') }}/img/auto-button.png"></a>
                         <button type="button" class="btn btn-info mrgleft10">BID NOW</button>
                      </div>
                   </div>
                </div>
             </div>
             <div class="col-md-4 col-sm-6">
                <div class="product-grid pro_mrg_3">
                   <div class="product_top_box">
                      <h4>Chuwi HeroBook Pro 14.1"</h4>
                      <p>8GB RAM 256GB SSD, Windows 10 Laptop,</p>
                      <p>Intel Celeron N4020 Processor</p>
                   </div>
                   <div class="product_star">
                                                               <a href="#"  >MRP: Rs.15000.00</a>

                      <p>8 <img class="cross_icon" src="{{ url('assets/front') }}/img/close.png"> <img class="pic-1" src="{{ url('assets/front') }}/img/star.png"></p>
                   </div>
                   <div class="product-image">
                      <a href="{{ url('auction/1') }}" class="image">
                      <img class="pic-1" src="{{ url('assets/front') }}/img/laptop.jpg">
                      </a>
                   </div>
                   <div class="product-content">
                      <h3 class="title"><a href="{{ url('auction/1') }}">Kamlesh</a></h3>
                      <h4 class="title_hed"><a href="{{ url('auction/1') }}">00:00:03</a></h4>
                      <div class="product_bottom_bx">
                         <a href=""><img class="cardbtn" src="{{ url('assets/front') }}/img/cart-button.png"></a>
                         <a href=""><img class="cardbtn" src="{{ url('assets/front') }}/img/auto-button.png"></a>
                         <button type="button" class="btn btn-info mrgleft10">BID NOW</button>
                      </div>
                   </div>
                </div>
             </div>-->
                </div>
            </div>
        </section>
        <!-- End Cliens Section -->
        <!-- ======= About Us Section ======= -->
        <section class="upcoming_auction">
            <div class="container">
                <div class="button_hed_auction text-center">
                    <button type="button" class="btn auction_button1 mrgleft105"> <img
                            src="{{ url('assets/front') }}/img/boy-footer.png">Upcoming Auctions</button>
                </div>
                <div class="row content">
                    <?php

            foreach ($products1 as $row) {


            ?>
                    <div class="col-lg-3 col-6">
                        <div class="upcoming_box">
                            <div class="upcoming_content">
                                <p class="height38">{{ $row->product_title }}</p>
                                <div class="upcoming_img">
                                    <a href="{{ url('auction/' . $row->id) }}" class="image">
                                        <img src="{{ url('images/' . $row->image) }}">
                                    </a>
                                </div>
                                <p>MRP: <i class="fa fa-inr" aria-hidden="true"></i>{{ $row->retail_price }}</p>
                            </div>
                            <div class="upcoming_button">
                                <button type="button" class="btn btn-info">OPEN -<?php echo date('d-m-y', strtotime($row->start_date)) . ' - ' . date('H:i:s', strtotime($row->start_date)); ?></button>
                            </div>
                        </div>
                    </div>

                    <?php  } ?>
                    <!--<div class="col-lg-3 col-6">
                <div class="upcoming_box">
                   <div class="upcoming_content">
                      <p class="height38">OnePlus Nord 2T 5G</p>
                      <div class="upcoming_img">
                         <img src="{{ url('assets/front') }}/img/mobile.jpg">
                      </div>
                      <p>MRP: <i class="fa fa-inr" aria-hidden="true"></i>29000</p>
                   </div>
                   <div class="upcoming_button">
                      <button type="button" class="btn btn-info">OPEN - 20:40:01</button>
                   </div>
                </div>
             </div>
             <div class="col-lg-3 col-6">
                <div class="upcoming_box">
                   <div class="upcoming_content">
                      <p class="height38">Voltas 1.5 Ton Split ACUsha</p>
                      <div class="upcoming_img">
                         <img src="{{ url('assets/front') }}/img/ac.jpg">
                      </div>
                      <p>MRP: <i class="fa fa-inr" aria-hidden="true"></i>34000</p>
                   </div>
                   <div class="upcoming_button">
                      <button type="button" class="btn btn-info">OPEN - 02:10:08</button>
                   </div>
                </div>
             </div>
             <div class="col-lg-3 col-6">
                <div class="upcoming_box">
                   <div class="upcoming_content">
                      <p class="height38">Usha EX9 Ceiling Fan</p>
                      <div class="upcoming_img">
                         <img src="{{ url('assets/front') }}/img/fan.jpg">
                      </div>
                      <p>MRP: <i class="fa fa-inr" aria-hidden="true"></i>7155</p>
                   </div>
                   <div class="upcoming_button">
                      <button type="button" class="btn btn-info">OPEN - 00:20:45</button>
                   </div>
                </div>
             </div>-->
                </div>
            </div>
        </section>
        <section class="testiminials_sections">
            <div class="container">
                <div class="button_hed_auction text-center">
                    <button type="button" class="btn auction_button1 mrgleft80"> <img
                            src="{{ url('assets/front') }}/img/boy-footer.png">Testimonials</button>
                </div>
                <div class="row">
                    <div class="owl-carousel owl-theme">
                        <div class="item">
                            <div class="testi_box text-center">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                                    when an unknown printer took a galley of type and scrambled it to make a type specimen
                                    book.
                                </p>
                                <p>Amit Kandelwal <br> Mumbai</p>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testi_box text-center">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                                    when an unknown printer took a galley of type and scrambled it to make a type specimen
                                    book.
                                </p>
                                <p>Amit Kandelwal <br> Mumbai</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endsection

    @section('page.script')
        <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script> -->
        <!--<script src="https://cdn.socket.io/4.0.1/socket.io.min.js"
            integrity="sha384-LzhRnpGmQP+lOvWruF/lgkcqD+WDVt9fU3H4BWmwP5u5LTmkUGafMcpZKNObVMLU" crossorigin="anonymous">
        </script>-->

        <script>
            $(document).ready(function() {

                $('.auto_bid_product').click(function() {

                    var product_id = $(this).attr('data-id');
                    var product_name = $(this).attr('data-product-name');
                    var user_id = $(this).attr('data-user');
                    var token = $(this).attr('data-token');
                    var url = "{{ url('auto-bid-req') }}";
                    var MaxBidCredit = $("#MaxBidCredit").val();
                    var StartRs = $("#StartRs").val();
                    $("#auto_bid_product_id").val(product_id);
                    $(".modal-title").html("Auto bid - " + product_name);
                    $("#MaxBidCredit").val("");
                    $("#StartRs").val("");


                });





                //////////////////////

                // start timer from product_timer_div class
                $('.product_timer_div').each(function() {
                    var $timerDiv = $(this);
                    var timer_string = $timerDiv.text()
                .trim(); // Get the timer string from the element's content
                    var timer_parts = timer_string.split(
                    ':'); // Split the string into parts: hours, minutes, seconds

                    var hours = parseInt(timer_parts[0]);
                    var minutes = parseInt(timer_parts[1]);
                    var seconds = parseInt(timer_parts[2]);

                    var total_seconds = hours * 3600 + minutes * 60 + seconds; // Convert everything to seconds
                    console.log(total_seconds);
                    // get value of data-product-id 
                    var product_id = $timerDiv.attr('data-product-id');
                    startCountdownTimer($timerDiv, total_seconds, product_id);
                });
            });

            function startCountdownTimer($timerDiv, total_seconds, product_id) {
                function updateCountdownDisplay(timer_seconds) {
                    //show with hour
                    //  $timerDiv.find('.countdown').text(minutes + 'm ' + seconds + 's'); // Update the countdown display
                    var hours = Math.floor(timer_seconds / 3600);
                    var minutes = Math.floor((timer_seconds - hours * 3600) / 60);
                    var seconds = timer_seconds - hours * 3600 - minutes * 60;

                    var hours_str = hours.toString().padStart(2, '0');
                    var minutes_str = minutes.toString().padStart(2, '0');
                    var seconds_str = seconds.toString().padStart(2, '0');

                    $timerDiv.find('.countdown').text(hours_str + ':' + minutes_str + ':' + seconds_str);
                }

                function countdown(interval) {
                    updateCountdownDisplay(interval);

                    if (interval > 0) {
                        setTimeout(function() {

                            var product_id = $timerDiv.attr('data-product-id');
                            countdown(interval - 1);
                        }, 1000);
                    } else {
                        // Restart the timer
                        setTimeout(function() {

                            $timerDiv.find('.name_of_bidder').text('No New Bidder');
                            startCountdownTimer($timerDiv, total_seconds);
                            // reset name_of_bidder

                        }, 1000); // Restart after 3 seconds (adjust as needed)
                    }
                }


                countdown(total_seconds);
            }

            function latest_bidder(product_id) {

                // set timeout to reduce server load

                setTimeout(function() {
                    // next ajax request has to wait untill this request is completed

                    var url = "{{ url('latest-bidder') }}";
                    // pass product_id to get last    bidder name

                    //formdata 

                    var formdata = new FormData();
                    formdata.append('product_id', product_id);
                    formdata.append('_token', '{{ csrf_token() }}');

                    $.ajax({
                        url: url,
                        type: 'POST', // Use the POST method
                        data: formdata,

                        contentType: false,
                        processData: false,


                        success: function(data) {
                            console.log("data => ", data);
                            if (data.status == 'success') {

                                $('.name_of_bidder_' + product_id).text(data.product.last_bid_user_name);
                                $('.product_cur_price' + product_id).text('Rs. ' + data.product
                                    .amount_per_bid);



                            } else {
                                //  alert(data.message);
                            }
                        },
                        error: function(xhr, textStatus, errorThrown) {
                            // Handle any errors
                        }
                    });
                }, 3000);
            }





            $(document).ready(function() {

                /*  let ip_address = 'https://maptek.online';
                 let socket_port = '3000';
                 let socket = io(ip_address + ':' + socket_port); */

                // category on category_name detect
                $('.category_name').change(function() {

                    var category_id = $(this).val();
                    // reload page with category_id
                    window.location.href = "{{ url('/') }}/?category=" + category_id;
                })
                var owl = $('.owl-carousel');
                owl.owlCarousel({
                    margin: 10,
                    nav: true,
                    navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>',
                        '<i class="fa fa-angle-right" aria-hidden="true"></i>'
                    ],
                    loop: true,
                    responsive: {
                        0: {
                            items: 1
                        },
                        600: {
                            items: 3
                        },
                        1000: {
                            items: 1
                        }
                    }
                })

                /* $('.bid_now').click(function() {
                    var product_id = $(this).attr('data-id');
                    var bid_amount = $(this).attr('data-amount');
                    var user_id = $(this).attr('data-user');
                    var token = $(this).attr('data-token');
                    var url = "{{ url('bid-now') }}";

                    $.ajax({
                       url: url,
                       type: 'POST',
                       data: {
                          product_id: product_id,
                          bid_amount: bid_amount,
                          user_id: user_id,
                          _token: token
                       },
                       success: function(data) {
                          console.log("bid data => ", data);

                          if (data.status == 'success') {
                             $('.name_of_bidder_' + product_id).text('<?php echo isset($user->name) ? $user->name : ''; ?>')
                             $('.product_cur_price_' + product_id).text('Rs. ' + data.amount_per_bid);

                             let message = [data.amount_per_bid, product_id, '<?php echo isset($user->name) ? $user->name : ''; ?>'];
                             swal(
                                'Great!',
                                data.message,
                                data.status
                             )

                          } else {
                             swal(
                                'Oh No!',
                                data.message,
                                data.status
                             )
                          }
                       }
                    });
                 }); */

                $('.auto_bid_submit').click(function() {
                    var product_id = $("#auto_bid_product_id").val();
                    var MaxBidCredit = $("#MaxBidCredit").val();
                    var StartRs = $("#StartRs").val();
                    var token = $('.csrf-token').attr('data-token');
                    var url = "{{ url('auto-bid-req') }}";
                    var MaxBidCredit = $("#MaxBidCredit").val();
                    var StartRs = $("#StartRs").val();
                    $("#auto_bid_product_id").val(product_id);

                    if (MaxBidCredit <= 0 || StartRs <= 0) {
                        swal(
                            'Oh No!',
                            'amount Match Be greater then 0',
                            'error'
                        )
                        return false;
                    }


                    $.ajax({
                        url: url,
                        type: 'POST', // Use the POST method
                        data: {
                            product_id: product_id,
                            MaxBidCredit: MaxBidCredit,
                            StartRs: StartRs,
                            _token: token
                        },
                        success: function(data) {
                            console.log("data", data);
                            if (data.message == "Unauthenticated") {
                                swal(
                                    'Oh No!',
                                    'Unauthenticated Kindly login',
                                    'error'
                                )
                            }
                            if (data.status == 'success') {
                                /* $('.name_of_bidder_'+product_id).text(data.product.last_bid_user_name); */
                                /* $('.product_cur_price'+product_id).text('Rs. '+data.product.amount_per_bid); */
                                console.log(data.data.amount_per_bid, data.data.product_id, data
                                    .data.name);
                                let message = [data.data.amount_per_bid, data.data.product_id, data
                                    .data.name
                                ];
                                socket.emit('sendChatToServer', message);

                                $(".btn-danger").click();
                                swal(
                                    'Great',
                                    data.message,
                                    data.status
                                )
                            } else {
                                swal(
                                    'Oh No!',
                                    data.message,
                                    data.status
                                )
                            }
                        },
                        error: function(xhr, textStatus, errorThrown) {
                            // Handle any errors
                        }
                    });

                });
            })

            function padLeft(number) {
                return number < 10 ? '0' + number : number;
            }
        </script>

        <script>
            $(function() {
                /* let ip_address = 'https://maptek.online';
                let socket_port = '3000';
                let socket = io(ip_address + ':' + socket_port);
                socket.on('sendChatToClient', (message) => {
                   let div_id = message[1];
                   $('.name_of_bidder_' + div_id).html(message[2]);
                   $('.product_cur_price_' + div_id).html('Rs. ' + message[0]);
                }); */
            });
        </script>
    @endsection
