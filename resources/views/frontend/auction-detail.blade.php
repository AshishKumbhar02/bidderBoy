@extends('frontend.layouts.main')

@section('page.breadcrumb')
    <section class="inner_header">
        <div class="container">
            <ul class="breadcrumb breadcrumb list-inline justify-content-center">
                <li><a href="{{ url('') }}">Home</a></li>
                <li> > </li>
                <li><a href="{{ url('') }}">Auction</a></li>
                <li> > </li>
                <li>{{ $product->product_title }}</li>
            </ul>

            <h4>{{ $product->product_title }}</h4>
            <p>2 TB, Orange Silver Color, with Leather Box</p>
        </div>
    </section>
@endsection

@section('page.content')
    <section class="product_dtt_box">
        <div class="container">
            <div class="row">
                <div class="col-md-2 col-12">
                    <div class="product_dtt_left">
                        <h5>00:00:06</h5>
                        <p>Waiting for Bid</p>
                    </div>
                </div>
                <div class="col-md-1 d-none d-lg-block">
                    <div class="product_dtt_line"></div>
                </div>
                <div class="col-md-4 col-12 marg40 col order-last">
                    <div class="product_dtt_center">
                        <h4>Auction Price <i class="fa fa-inr" aria-hidden="true"></i><span
                                class="bid-price-{{ $product->id }}">{{ $product->amount_per_bid }}</span></h4>
                        <h6>Last Bidder : </i><span
                                class="bidder-name-{{ $product->id }}">{{ $product->last_bidder_name }}<span></h6>
                    </div>
                    <div class="product_bottom_bx">
                        <a href="">
                            <img class="cardbtn" src="{{ url('assets/front/img/cart-button.png') }}">
                        </a>
                        <a href="">
                            <img class="cardbtn" src="{{ url('assets/front/img/auto-button.png') }}">
                        </a>
                        <!-- <button type="button" class="btn btn-info mrgleft10">BID NOW</button> -->

                        <button type="button" class="btn btn-info mrgleft10 bid_now" data-id="{{ $product->id }}"
                            data-amount="{{ $product->credit_per_bid }}" data-user="{{ Auth::user()->id }}"
                            data-token="{{ csrf_token() }}">BID NOW</button>
                    </div>
                </div>
                <div class="col-md-5 marg39 col order-first">
                    <div class="product_dtt_center ">
                        <img src="{{ url('images/' . $product->image) }}">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="product_dtt">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="nav nav-pills" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                                aria-selected="true">Auction</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                                aria-selected="false">Product</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact"
                                aria-selected="false">Bidding History</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact"
                                aria-selected="false">Delivery</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                            aria-labelledby="pills-home-tab">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>Auction ID</th>
                                        <td>{{ $product->id }}</td>
                                    </tr>
                                    <tr>
                                        <th>Price</th>
                                        <td><i class="fa fa-inr" aria-hidden="true"></i> <span
                                                class="bid-price-{{ $product->id }}">{{ $product->amount_per_bid }}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Shipping & Processing Fees</th>
                                        <td>{{ $product->shipping_charge }}</td>
                                    </tr>
                                    <tr>
                                        <th>Bid Reset Time</th>
                                        <td>{{ $product->reset_time_bid }} Second</td>
                                    </tr>
                                    <tr>
                                        <th>Credit used per bid</th>
                                        <td>{{ $product->credit_per_bid }}</td>
                                    </tr>
                                    <tr>
                                        <th>Auction Type</th>
                                        <td>10 Paisa</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">2
                        </div>
                        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">3
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('page.script')
    <script></script>
@endsection
