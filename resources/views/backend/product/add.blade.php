@extends('backend.layouts.main')

{{-- ===== Page Specific Styles ===== --}}
<style>
    .form-input-row {
        padding: 10px 0px;
    }

    .form-input-col {
        padding: 10px 0px;

    }

    .manage-profile-form .form-title-box {
        align-items: center;
        text-align: right;
    }

    .manage-profile-form .form-title-box label {
        padding-top: 4px;
    }

    input::placeholder {
        font-size: 15px;
    }


    @media (max-width: 428px) {

        /* For tablets: */
        .manage-profile-form .form-title-box {
            text-align: left;
            /* padding: 4px 0px; */
        }
    }
</style>
{{-- ===== Main Page Content ===== --}}
@section('page.content')
    <div class="container-fluid">
        {{-- ===== Page Header & Breadcrumb ===== --}}
        <div class="card bg-light-info shadow-none position-relative overflow-hidden">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h4 class="fw-semibold mb-8">Add Product</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a class="text-muted" href="{{ url('admin/dashboard') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">Add Product</li>
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

        {{-- ===== Product Form Card ===== --}}
        <div class="col-md-11 col-sm-12">
            <div class="card">
                <div class="card-body">
                    {{-- ===== Product Create Form Start ===== --}}
                    <form method="post" action="{{ route('product.create') }}" class="manage-profile-form"
                        enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                        {{-- Product Title --}}
                        <div class="row form-input-row">
                            <div class="col-md-3 col-sm-5 form-title-box">
                                <label for="product_title">Product Title <span class="text-danger">*</span></label>
                            </div>
                            <div class="col-md-9 col-sm-7">
                                <input type="text" name="product_title" class="form-control" placeholder="Product Name"
                                    required>
                            </div>
                        </div>

                        {{-- Product Subtitle --}}
                        <div class="row form-input-row">
                            <div class="col-md-3 col-sm-5 form-title-box">
                                <label for="product_subtitle">Product Subtitle <span class="text-danger">*</span></label>
                            </div>
                            <div class="col-md-9 col-sm-7">
                                <input type="text" name="product_subtitle" class="form-control"
                                    placeholder="Product Subtitle">
                            </div>
                        </div>

                        {{-- Retail Price --}}
                        <div class="row form-input-row">
                            <div class="col-3 form-title-box">
                                <label for="retail_price">Retail Price <span class="text-danger">*</span></label>
                            </div>
                            <div class="col-9">
                                <input type="text" pattern="[0-9]*" name="retail_price" class="form-control"
                                    placeholder="Retail Price" required>
                            </div>
                        </div>

                        <div class="row form-input-row">
                            {{-- Amount Per Bid --}}
                            <div class="col-md-6 col-sm-12">
                                <div class="row form-input-col">
                                    <div class="col-6 form-title-box">
                                        <label for="amount_per_bid">Amount Per Bid <span
                                                class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-6">
                                        <input type="text" pattern="[0-9]*" name="amount_per_bid" class="form-control"
                                            placeholder="Amount Per Bid" required>
                                    </div>
                                </div>
                            </div>

                            {{-- Credit Per Bid --}}
                            <div class="col-md-6 col-sm-12">
                                <div class="row form-input-col">
                                    <div class="col-md-6 form-title-box">
                                        <label for="credit_per_bid">Credit Per Bid <span
                                                class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-6 ">
                                        <input type="text" pattern="[0-9]*" name="credit_per_bid" class="form-control"
                                            placeholder="Credit Per Bid" required>
                                    </div>
                                </div>
                            </div>

                            {{-- Bid Reset Time --}}
                            <div class="col-md-6 col-sm-12">
                                <div class="row form-input-col">
                                    <div class="col-6 form-title-box">
                                        <label for="reset_time_bid">Bid Reset Time <span
                                                class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-6">
                                        <input type="text" pattern="[0-9]*" name="reset_time_bid" class="form-control"
                                            placeholder="Bid Reset Time" required>
                                    </div>
                                </div>
                            </div>

                            {{-- Category Dropdown --}}
                            <div class="col-md-6 col-sm-12">
                                <div class="row form-input-col">
                                    <div class="col-6 form-title-box">
                                        <label for="reset_time_bid">Select Category<span
                                                class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-6">
                                        <select name="category_id" class="form-control" required>
                                            <option value="">Select Category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Bid Start Date + Time --}}
                        <div class="row form-input-row">
                            <div class="col-3 form-title-box">
                                <label for="start_date_bid">Bid Start Time <span class="text-danger">*</span></label>
                            </div>
                            <div class="col-9">
                                <div class="row">
                                    <div class="col-4">
                                        <input type="date" name="start_date_bid" class="form-control"
                                            placeholder="Start Time" required>
                                    </div>
                                    <div class="col-4">
                                        <select name="start_hour_bid" class="form-control" placeholder="Minute" required>
                                            <option value="0">0</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                            <option value="13">13</option>
                                            <option value="14">14</option>
                                            <option value="15">15</option>
                                            <option value="16">16</option>
                                            <option value="17">17</option>
                                            <option value="18">18</option>
                                            <option value="19">19</option>
                                            <option value="20">20</option>
                                            <option value="21">21</option>
                                            <option value="22">22</option>
                                            <option value="23">23</option>
                                            <option value="24">24</option>
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <select name="start_minute_bid" class="form-control" required>
                                            <option value="0">0</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                            <option value="13">13</option>
                                            <option value="14">14</option>
                                            <option value="15">15</option>
                                            <option value="16">16</option>
                                            <option value="17">17</option>
                                            <option value="18">18</option>
                                            <option value="19">19</option>
                                            <option value="20">20</option>
                                            <option value="21">21</option>
                                            <option value="22">22</option>
                                            <option value="23">23</option>
                                            <option value="24">24</option>
                                            <option value="25">25</option>
                                            <option value="26">26</option>
                                            <option value="27">27</option>
                                            <option value="28">28</option>
                                            <option value="29">29</option>
                                            <option value="30">30</option>
                                            <option value="31">31</option>
                                            <option value="32">32</option>
                                            <option value="33">33</option>
                                            <option value="34">34</option>
                                            <option value="35">35</option>
                                            <option value="36">36</option>
                                            <option value="37">37</option>
                                            <option value="38">38</option>
                                            <option value="39">39</option>
                                            <option value="40">40</option>
                                            <option value="41">41</option>
                                            <option value="42">42</option>
                                            <option value="43">43</option>
                                            <option value="44">44</option>
                                            <option value="45">45</option>
                                            <option value="46">46</option>
                                            <option value="47">47</option>
                                            <option value="48">48</option>
                                            <option value="49">49</option>
                                            <option value="50">50</option>
                                            <option value="51">51</option>
                                            <option value="52">52</option>
                                            <option value="53">53</option>
                                            <option value="54">54</option>
                                            <option value="55">55</option>
                                            <option value="56">56</option>
                                            <option value="57">57</option>
                                            <option value="58">58</option>
                                            <option value="59">59</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Auction Duration (hour, minute, second) --}}
                        <div class="row form-input-row">
                            <div class="col-3 form-title-box">
                                <label for="start_hour_auction">Auction Time <span class="text-danger">*</span></label>
                            </div>
                            <div class="col-9">
                                <div class="row">
                                    <div class="col-4">
                                        <input type="text" name="start_hour_auction" class="form-control"
                                            placeholder="Hour" required>
                                    </div>
                                    <div class="col-4">
                                        <input type="text" pattern="[0-9]*" name="start_minute_auction"
                                            class="form-control" placeholder="Minute" required>
                                    </div>
                                    <div class="col-4">
                                        <input type="text" pattern="[0-9]*" name="start_seconds_auction"
                                            class="form-control" placeholder="Seconds" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Delivery Information --}}
                        <div class="row form-input-row">
                            <div class="col-3 form-title-box">
                                <label for="delivery_information">Delivery Information <span
                                        class="text-danger">*</span></label>
                            </div>
                            <div class="col-9">
                                <textarea type="text" name="delivery_information" rows="2" class="form-control"
                                    placeholder="Delivery Information" required></textarea>
                            </div>
                        </div>

                        {{-- Shipping Charge + Buy Now Checkbox --}}
                        <div class="row form-input-row">
                            <div class="col-3 form-title-box">
                                <label for="shipping_charge">Shipping & handling Charges
                                    <span class="text-danger">*</span>
                                </label>
                            </div>
                            <div class="col-9">
                                <div class="row">
                                    <div class="col-8">
                                        <input type="text" pattern="[0-9]*" name="shipping_charge"
                                            class="form-control" placeholder="Shipping & handling Charges" required>
                                    </div>
                                    <div class="col-4">
                                        <div class="row">
                                            <div class="col-8 form-title-box">
                                                <label for="is_buynow">Buy Now <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-4 d-flex align-items-center pt-2">
                                                <input type="checkbox" name="is_buynow" value="1">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Product Image Upload --}}
                        <div class="row form-input-row">
                            <div class="col-3 form-title-box">
                                <label for="image">Select Image <span class="text-danger">*</span></label>
                            </div>
                            <div class="col-9">
                                <input type="file" name="image" class="form-control" required>
                            </div>
                        </div>

                        {{-- Product Description --}}
                        <div class="row form-input-row">
                            <div class="col-3 form-title-box">
                                <label for="description">Description <span class="text-danger">*</span></label>
                            </div>
                            <div class="col-9">
                                <textarea type="text" name="description" rows="3" class="form-control" placeholder="Description" required></textarea>
                            </div>
                        </div>

                        {{-- Submit Button --}}
                        <div class="row form-input-row">
                            <div class="col-12 text-center form-title-box">
                                <button type="submit" class="btn btn-primary"
                                    style="padding: 10px 50px; margin-top:20px;">CREATE</button>
                            </div>
                        </div>
                    </form>
                    {{-- ===== Product Form End ===== --}}
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- Form Validation Script --}}
@section('page.script')
    <script>
        $("#product-add").validate({});
        $("#product-add").submit(function(e) {
            var form = $(this);
            var CB = function() {
                window.location.href = '{{ route('product.index') }}';
                setTimeout(function() {
                    window.location.href = '{{ route('product.index') }}';
                }, 3000);
            }
            ajaxSubmit(e, form, CB);
        });
    </script>
@endsection
