@extends('backend.layouts.main')


<!-- Custom CSS for Table & Buttons -->
<style>
    #userTable th {
        font-size: 12px;
        padding: 5px;
    }

    #userTable td {
        font-size: 12px;
        padding: 5px;
    }

    .pagination-container svg {
        height: 20px;
    }

    #userTable .btn {
        font-size: 12px;
        padding: 5px;
        margin-bottom: 5px;
    }
</style>

@section('page.content')
    <div class="container-fluid">

        <!-- Page Header Section -->
        <div class="card bg-light-info shadow-none position-relative overflow-hidden">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h4 class="fw-semibold mb-8">Products</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a class="text-muted" href="{{ url('admin/dashboard') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">Products</li>
                            </ol>
                        </nav>
                    </div>

                    <!-- Add Product Button -->
                    <div class="col-3">
                        <div class="text-center mb-n5">
                            <a href="{{ route('product.add') }}" class="btn btn-primary btn-block">
                                Add Product
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Product Filter Form -->
        <div class="card">
            <div class="card-header p-3">
                <form action="" method="get" class="">
                    <div class="row">

                        <!-- Filter by ID -->
                        <div class="col-md-2 mb-3">
                            <div class="form-group">
                                <input type="text" name="id" class="form-control" placeholder="Auction ID"
                                    value="{{ $param['id'] }}">
                            </div>
                        </div>

                        <!-- Filter by Product Title -->
                        <div class="col-md-2 mb-3">
                            <div class="form-group">
                                <input type="text" name="product_title" class="form-control" placeholder="Product Name"
                                    value="{{ $param['product_title'] }}">
                            </div>
                        </div>

                        <!-- Date From -->
                        <div class="col-md-2 mb-3">
                            <div class="form-group">
                                <input type="date" name="from_date_start" class="form-control" placeholder="From"
                                    value="{{ $param['from_date_start'] }}">
                            </div>
                        </div>

                        <!-- Date To -->
                        <div class="col-md-2 mb-3">
                            <div class="form-group">
                                <input type="date" name="to_date_start" class="form-control" placeholder="To"
                                    value="{{ $param['to_date_start'] }}">
                            </div>
                        </div>

                        <!-- Filter Button -->
                        <div class="col-md-2">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block"
                                    style="width: 100%;">Filter</button>
                            </div>
                        </div>

                        <!-- Reset Button -->
                        <div class="col-md-1">
                            <div class="form-group">
                                <a href="{{ route('product.index') }}" class="btn btn-primary btn-block"><i
                                        style="font-size: 21px;" class="fa-solid fa-refresh"></i></a>
                            </div>
                        </div>

                        <!-- Total Count -->
                        <div class="col-md-1">
                            <strong>Total: {{ $products->total() }}</strong>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Product Table -->
            <div class="card-body p-3">
                <div class="row">
                    <div class="col-md-12">

                    </div>
                    <div class="col-md-12">
                        <div style1="overflow-x: scroll;">
                            <table id="userTable" class="table border table-striped table-bordered text-nowrap1 dataTable">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Product Name</th>
                                        {{-- <th>Product Subtitle</th> --}}
                                        <th>Price</th>
                                        <th>Start Date </th>
                                        <th>Start Date Bid</th>
                                        <th>End Date Bid</th>
                                        <th>Shipping Charge</th>
                                        <th>Reset Time</th>
                                        <th>Credit/Bid</th>
                                        <th>Amount/Bid</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            <td>{{ $product->id }}</td>
                                            <td>{{ $product->product_title }}</td>
                                            <!--<td>{{ $product->product_subtitle }}</td>-->
                                            <td>₹{{ $product->retail_price }}</td>
                                            <td>{{ date('d-m-Y', strtotime($product->start_date_bid)) }}
                                                <br>
                                                {{ $product->start_hour_bid }}:{{ $product->start_minute_bid }}:00
                                            </td>
                                            <td>{{ $product->start_date }}</td>
                                            <td>{{ $product->last_bid_date }}</td>
                                            <td>₹{{ $product->shipping_charge }}</td>
                                            <td>{{ $product->reset_time_bid }}</td>
                                            <td>{{ $product->credit_per_bid }}</td>
                                            <td>{{ $product->amount_per_bid }}</td>
                                            <td>
                                                <!-- Action Buttons -->
                                                <a title="Edit" class="btn btn-warning btn-xs"
                                                    href="{{ route('product.edit', $product->id) }}">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a title="Delete" class="btn btn-danger btn-xs"
                                                    href="{{ route('product.delete', $product->id) }}"
                                                    onclick="return confirm('Are you sure to delete?')">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                                <a title="Clone" class="btn btn-info btn-xs"
                                                    href="{{ route('product.clone', $product->id) }}"
                                                    onclick="return confirm('Are you really want to clone this product?')">
                                                    <i class="fa fa-copy"></i>
                                                </a>
                                                <a title="View history" class="btn btn-primary btn-xs" href="#">
                                                    <i class="fa fa-bars"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination -->
                        <div class="col-md-12 mt-3 pagination-container">
                            {{ $products->appends(request()->input())->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page.script')
    <!-- Optional Custom Scripts Can Be Placed Here -->
@endsection
