@extends('frontend.layouts.main')

@section('page.breadcrumb')
<section class="inner_header">
  <div class="container">
    <ul class="breadcrumb breadcrumb list-inline justify-content-center">
      <li>
        <a href="{{url('')}}">Home</a>
      </li>
      <li> ></li>
      <li>My shopping cart</li>
    </ul>
    <h4 class="text-center">My shopping cart</h4>
  </div>
</section>
@endsection

@section('page.content')

<section class="tips_tricks para_test">
  <div class="container">
    <div class="row">
        @php
            $product = DB::table('products')->where('id', $id)->first();
        @endphp
        
<div class="row">
        <div class="col-md-12">

            <div class="table-responsive">
              <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>Product</th>
                    <th>Price</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="product-in-table" style="display: flex;">
                      <img
                        id="Body_imgProduct"
                        class="img-responsive"
                        src="{{url('public/storage/'.$product->image)}}"
                        style="height: 144px; width: 126px; margin-right: 10px"
                      />
                      <div class="product-it-in">
                        <h3>{{$product->product_title}}</h3>
                      </div>
                    </td>
                    <td>₹{{$product->retail_price}}</td>
                  </tr>
                </tbody>
              </table>
            </div>
            
        </div>
        <div class="col-md-12">
            <hr>
        </div>
        <div class="col-md-4 order-md-2 mb-4">
          <ul class="list-group mb-3">
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">Subtotal</h6>
              </div>
              <span class="text-muted">₹{{$product->retail_price}}</span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">Shipping</h6>
              </div>
              <span class="text-muted">₹0</span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">Discount</h6>
              </div>
              <span class="text-muted">₹<span id="discount">0</span></span>
            </li>
            <li class="list-group-item d-flex justify-content-between">
              <span>Total (INR)</span>
              <strong>₹<span id="grandTotal">{{$product->retail_price}}</span></strong>
            </li>
          </ul>
          <a href="{{url('product/payment/ccavenue/'.$product->id)}}" class="btn btn-sm btn-primary btn-block mb-1">INR - CCAvenue</a>
          <button class="btn btn-sm btn-primary btn-block mb-1">Pay in US Dollar - Paypal</button>
          <button class="btn btn-sm btn-primary btn-block mb-1">Pay in BTC - GOURL</button>
        </div>
        <div class="col-md-8 order-md-1">
          {{--<div class="row">
              <div class="col-md-8">
                  <form action="{{url(route('applyCoupon'))}}" class="card p-2" id="couponForm">
                    @csrf
                    <div class="input-group">
                      <input type="text" name="coupon_code" class="form-control" placeholder="Promo Code (Optional)">
                      <input type="hidden" name="cost" value="{{$product->cost}}">
                      <div class="input-group-append">
                        <button type="submit" class="btn btn-secondary">Apply Code</button>
                        <a href="">Reset</a>
                      </div>
                    </div>
                  </form>                  
              </div>
          </div>--}}
        </div>
      </div>        
        
    </div>
  </div>
@endsection

@section('page.script')
<script>
/*$(document).ready(function() {
    $('#couponForm').submit(function(e) {
        e.preventDefault(); // Prevent the default form submission

        var formData = $(this).serialize(); // Serialize the form data

        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: formData,
            dataType: 'json',
            success: function(response) {
                if(response.success){
                    $('#discount').html(response.discount);
                    $('#grandTotal').html(response.new_total);
                    $('#couponForm').css('pointer-events', 'none');
                    $('#couponForm').css('opacity', '0.5');
                    $("#couponForm").after('<div class="text-success">Coupon applied successfully!</div>');
                    Command: toastr["success"](response.message, "Success");
                }else{
                    Command: toastr["error"](response.message, "Alert");
                }
            },
            error: function(error) {
                // Handle error cases
                console.error(error);
            }
        });
    });
});*/
</script>
@endsection