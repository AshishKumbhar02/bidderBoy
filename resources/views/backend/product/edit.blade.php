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
                        <h4 class="fw-semibold mb-8">Update Product</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a class="text-muted" href="{{ url('admin/dashboard') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">Update Product</li>
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
                    {{-- Product Update Form --}}
                    <form method="post" action="{{ route('product.update', $product->id) }}" enctype="multipart/form-data"
                        class="manage-profile-form" id="product-add">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                        {{-- Product Title --}}
                        <div class="row form-input-row">
                            <div class="col-md-3 col-sm-5 form-title-box">
                                <label for="product_title">Product Title <span class="text-danger">*</span></label>
                            </div>
                            <div class="col-md-9 col-sm-7">
                                <input type="text" name="product_title" value="{{ $product->product_title }}"
                                    class="form-control" placeholder="Product Name" required>
                            </div>
                        </div>

                        {{-- Product Subtitle --}}
                        <div class="row form-input-row">
                            <div class="col-md-3 col-sm-5 form-title-box">
                                <label for="product_subtitle">Product Subtitle <span class="text-danger">*</span></label>
                            </div>
                            <div class="col-md-9 col-sm-7">
                                <input type="text" name="product_subtitle" value="{{ $product->product_subtitle }}"
                                    class="form-control" placeholder="Product Subtitle" required>
                            </div>
                        </div>

                        {{-- Retail Price --}}
                        <div class="row form-input-row">
                            <div class="col-3 form-title-box">
                                <label for="retail_price">Retail Price <span class="text-danger">*</span></label>
                            </div>
                            <div class="col-9">
                                <input type="text" pattern="[0-9]*" name="retail_price"
                                    value="{{ $product->retail_price }}" class="form-control" placeholder="Retail Price"
                                    required>
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
                                        <input type="text" pattern="[0-9]*" name="amount_per_bid"
                                            value="{{ $product->amount_per_bid }}" class="form-control"
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
                                        <input type="text" pattern="[0-9]*" name="credit_per_bid"
                                            value="{{ $product->credit_per_bid }}" class="form-control"
                                            placeholder="Credit Per Bid" required>
                                    </div>
                                </div>
                            </div>

                            {{-- Reset Time Bid --}}
                            <div class="col-md-6 col-sm-12">
                                <div class="row form-input-col">
                                    <div class="col-6 form-title-box">
                                        <label for="reset_time_bid">Bid Reset Time <span
                                                class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-6">
                                        <input type="text" pattern="[0-9]*" name="reset_time_bid"
                                            value="{{ $product->reset_time_bid }}" class="form-control"
                                            placeholder="Bid Reset Time" required>
                                    </div>
                                </div>
                            </div>

                            {{-- Category Selection --}}
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
                                                <option value="{{ $category->id }}"
                                                    @if ($category->id == $product->category_id) selected @endif>
                                                    {{ $category->category_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Bid Start Time --}}
                        <div class="row form-input-row">
                            <div class="col-3 form-title-box">
                                <label for="start_date_bid">Bid Start Time <span class="text-danger">*</span></label>
                            </div>
                            <div class="col-9">
                                <div class="row">
                                    <div class="col-4">
                                        <input type="date" name="start_date_bid"
                                            value="{{ $product->start_date_bid }}" class="form-control"
                                            placeholder="Start Time" required>
                                    </div>
                                    <div class="col-4">
                                        <select name="start_hour_bid" class="form-control" placeholder="Minute" required>
                                            @for ($i = 0; $i <= 24; $i++)
                                                <option value="{{ $i }}"
                                                    @if ($product->start_hour_bid == $i) selected @endif>{{ $i }}
                                                </option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <select name="start_minute_bid" class="form-control" required>
                                            @for ($i = 0; $i <= 59; $i++)
                                                <option value="{{ $i }}"
                                                    @if ($product->start_minute_bid == $i) selected @endif>{{ $i }}
                                                </option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Auction Time --}}
                        <div class="row form-input-row">
                            <div class="col-3 form-title-box">
                                <label for="start_hour_auction">Auction Time <span class="text-danger">*</span></label>
                            </div>
                            <div class="col-9">
                                <div class="row">
                                    <div class="col-4">
                                        <input type="text" name="start_hour_auction"
                                            value="{{ $product->start_hour_auction }}" class="form-control"
                                            placeholder="Hour" required>
                                    </div>
                                    <div class="col-4">
                                        <input type="text" pattern="[0-9]*" name="start_minute_auction"
                                            value="{{ $product->start_minute_auction }}" class="form-control"
                                            placeholder="Minute" required>
                                    </div>
                                    <div class="col-4">
                                        <input type="text" pattern="[0-9]*" name="start_seconds_auction"
                                            value="{{ $product->start_seconds_auction }}" class="form-control"
                                            placeholder="Seconds" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Delivery Info --}}
                        <div class="row form-input-row">
                            <div class="col-3 form-title-box">
                                <label for="delivery_information">Delivery Information <span
                                        class="text-danger">*</span></label>
                            </div>
                            <div class="col-9">
                                <textarea type="text" name="delivery_information" rows="2" class="form-control"
                                    placeholder="Delivery Information" required>{{ $product->delivery_information }}</textarea>
                            </div>
                        </div>

                        {{-- Shipping Charge and Buy Now checkbox --}}
                        <div class="row form-input-row">
                            <div class="col-3 form-title-box">
                                <label for="shipping_charge">Shipping & handling Charges <span
                                        class="text-danger">*</span></label>
                            </div>
                            <div class="col-9">
                                <div class="row">
                                    <div class="col-8">
                                        <input type="text" pattern="[0-9]*" name="shipping_charge"
                                            value="{{ $product->shipping_charge }}" class="form-control"
                                            placeholder="Shipping & handling Charges" required>
                                    </div>
                                    <div class="col-4">
                                        <div class="row">
                                            <div class="col-8 form-title-box">
                                                <label for="is_buynow">Buy Now <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-4 d-flex align-items-center pt-2">
                                                <input type="checkbox" id="is_buynow" name="is_buynow" value="1"
                                                    @if ($product->is_buynow == 1) checked @endif>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Image Upload --}}
                        <div class="row form-input-row">
                            <div class="col-3 form-title-box">
                                <label for="image">Select Image <span class="text-danger">*</span></label>
                            </div>
                            <div class="col-9">
                                <input type="file" name="image" class="form-control">
                                {{-- @if ($product->image)
                                    <img src="{{ asset('uploads/products/' . $product->image) }}"
                                         alt="Product Image" style="max-height: 100px; margin-top: 10px;">
                                @endif --}}
                            </div>
                        </div>

                        {{-- Product Description --}}
                        <div class="row form-input-row">
                            <div class="col-3 form-title-box">
                                <label for="description">Description <span class="text-danger">*</span></label>
                            </div>
                            <div class="col-9">
                                <textarea type="text" name="description" rows="3" class="form-control" placeholder="Description" required>{{ $product->description }}</textarea>
                            </div>
                        </div>

                        {{-- Submit Button --}}
                        <div class="row form-input-row">
                            <div class="col-12 text-center form-title-box">
                                <button type="submit" class="btn btn-primary"
                                    style="padding: 10px 50px; margin-top:20px;">UPDATE</button>
                            </div>
                        </div>
                    </form>
                    {{-- ===== End of Form ===== --}}
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- Form Validation Script --}}
@section('page.script')
    <script>
        $("#product-add").validate();
    </script>
@endsection
