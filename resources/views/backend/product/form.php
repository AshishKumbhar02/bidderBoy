<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Add Product Form</title>

    <!-- Custom CSS Styling -->
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
</head>

<body>
    <div class="col-md-9 col-sm-12">
        <div class="card">
            <div class="card-body">
                <!-- Product Form Start -->
                <form method="post" action="{{route('customers.createPost')}}" class="manage-profile-form">

                    <!-- Product Title -->
                    <div class="row form-input-row">
                        <div class="col-md-3 col-sm-5 form-title-box">
                            <label for="product_title">Product Title<span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-9 col-sm-7"><input type="text" name="product_title" class="form-control"
                                placeholder="Product Name" required></div>
                    </div>

                    <!-- Product Subtitle -->
                    <div class="row form-input-row">
                        <div class="col-md-3 col-sm-5 form-title-box">
                            <label for="product_subtitle">Product Subtitle</label>
                        </div>
                        <div class="col-md-9 col-sm-7">
                            <input type="text" name="product_subtitle" class="form-control" placeholder="Product Subtitle">
                        </div>
                    </div>

                    <!-- Retail Price -->
                    <div class="row form-input-row">
                        <div class="col-3 form-title-box">
                            <label for="retail_price">Retail Price <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-9"> <input type="text" name="retail_price" class="form-control"
                                placeholder="Retail Price" required>
                        </div>
                    </div>

                    <div class="row form-input-row">
                        <!-- Amount Per Bid -->
                        <div class="col-md-6 col-sm-12">
                            <div class="row form-input-col">
                                <div class="col-6 form-title-box">
                                    <label for="amount_per_bid">Amount Per Bid <span
                                            class="text-danger">*</span></label>
                                </div>
                                <div class="col-6"> <input type="text" name="amount_per_bid" class="form-control"
                                        placeholder="Amount Per Bid" required>
                                </div>
                            </div>
                        </div>

                        <!-- Credit Per Bid -->
                        <div class="col-md-6 col-sm-12">
                            <div class="row form-input-col">
                                <div class="col-md-6 form-title-box">
                                    <label for="credit_per_bid">Credit Per zBid
                                        <span class="text-danger">*</span>
                                    </label>
                                </div>
                                <div class="col-md-6  col-smzzz"> <input type="text" name="credit_per_bid"
                                        class="form-control" placeholder="Credit Per Bid" required>
                                </div>
                            </div>
                        </div>

                        <!-- Bid Reset Time -->
                        <div class="col-md-6 col-sm-12">
                            <div class="row form-input-col">
                                <div class="col-6 form-title-box">
                                    <label for="reset_time_bid">Bid Reset Time
                                        <span class="text-danger">*</span>
                                    </label>
                                </div>
                                <div class="col-6"> <input type="text" name="reset_time_bid" class="form-control"
                                        placeholder="Bid Reset Time" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Bid Start Time -->
                    <div class="row form-input-row">
                        <div class="col-3 form-title-box">
                            <label for="start_date_bid">Bid Start Time <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-9">
                            <div class="row">
                                <div class="col-4">
                                    <input type="date" name="start_date_bid" class="form-control" placeholder="Start Time" required>
                                </div>
                                <div class="col-4">
                                    <input type="number" name="start_hour_bid" class="form-control" placeholder="Hour" required>
                                </div>
                                <div class="col-4">
                                    <input type="number" name="start_minute_bid" class="form-control" placeholder="Minute" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Auction Time -->
                    <div class="row form-input-row">
                        <div class="col-3 form-title-box">
                            <label for="start_hour_auction">Auction Time <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-9">
                            <div class="row">
                                <div class="col-4">
                                    <input type="number" name="start_hour_auction" class="form-control" placeholder="Hour" required>
                                </div>
                                <div class="col-4">
                                    <input type="number" name="start_minute_auction" class="form-control" placeholder="Minute" required>
                                </div>
                                <div class="col-4">
                                    <input type="number" name="start_seconds_auctio" class="form-control" placeholder="Seconds" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Delivery Information -->
                    <div class="row form-input-row">
                        <div class="col-3 form-title-box">
                            <label for="delivery_information">Delivery Information
                                <span class="text-danger">*</span>
                            </label>
                        </div>
                        <div class="col-9">
                            <textarea type="text" name="delivery_information" rows="2"
                                class="form-control" placeholder="Delivery Information" required>
                            </textarea>
                        </div>
                    </div>

                    <!-- Shipping Charges & Buy Now -->
                    <div class="row form-input-row">
                        <div class="col-3 form-title-box">
                            <label for="shipping_charge">Shipping & handling Charges <span
                                    class="text-danger">*</span></label>
                        </div>
                        <div class="col-9">
                            <div class="row">
                                <div class="col-8">
                                    <input type="text" name="shipping_charge" class="form-control" placeholder="Shipping & handling Charges" required>
                                </div>
                                <div class="col-4">
                                    <div class="row">
                                        <div class="col-8 form-title-box">
                                            <label for="shipping_charge">Buy Now
                                                <span class="text-danger">*</span>
                                            </label>
                                        </div>
                                        <div class="col-4"> <input type="checkbox" name="is_buynow" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Product Image -->
                    <div class="row form-input-row">
                        <div class="col-3 form-title-box">
                            <label for="image">Select Image <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-9">
                            <input type="file" name="image" class="form-control" required>
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="row form-input-row">
                        <div class="col-3 form-title-box">
                            <label for="description">Description <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-9">
                            <textarea type="text" name="description" rows="3" class="form-control"
                                placeholder="Description" required>
                            </textarea>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="row form-input-row">
                        <div class="col-12 text-center form-title-box">
                            <button type="submit" class="btn btn-primary" style="padding: 10px 50px;">CREATE</button>
                        </div>
                    </div>
                </form>
                <!-- Product Form End -->

            </div>
        </div>
    </div>
    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>