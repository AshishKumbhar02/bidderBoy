<?php include 'header.php'; ?>

<section class="inner_header">
  <div class="container">
    <ul class="breadcrumb breadcrumb list-inline justify-content-center">
      <li><a href="index.php">Home</a></li>
      <li> > </li>
      <li><a href="index.php">Auction</a></li>
      <li> > </li>
      <li>External Hard Drives</li>
    </ul>

    <h4 class="text_rght">External Hard Drives</h4>
    <p class="text_rght">2 TB, Orange Silver Color, with Leather Box</p>
  </div>
</section>


<section class="product_dtt_box">
  <div class="container">
    <div class="row">


      <div class="col-md-6 marg39 col order-first">
        <div class="product_dtt_center ">
          <img src="img/drive1.jpg">
        </div>
      </div>

      <div class="col-md-2 col-12">
        <div class="product_dtt_left text_rght">
          <h5>00:00:06</h5>
          <p>Waiting for Bid</p>
        </div>
      </div>

      <div class="col-md-1 d-none d-lg-block">
        <div class="product_dtt_line">
        </div>
      </div>


      <div class="col-md-3 col-12 marg40 col order-last text_rght">
        <div class="product_dtt_center">
          <h4>Auction Price <i class="fa fa-inr" aria-hidden="true"></i>0.00</h4>
        </div>

        <div class="product_bottom_bx">
          <a href=""><img class="cardbtn" src="img/cart-button.png"></a>
          <a href=""><img class="cardbtn" src="img/auto-button.png"></a>
          <button type="button" class="btn btn-info mrgleft10">BID NOW</button>
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
            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Product Details </button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Auction Details</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Bidding History</button>
          </li>


        </ul>
        <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">


            <p>it will show product description, which includes texts and images . this content I will mostly copy/paste from amazon/Flipkart</p>


          </div>
          <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">

            <table class="table">

              <tbody>
                <tr>
                  <th>Auction ID</th>
                  <td>Bb34933</td>
                </tr>

                <tr>
                  <th>Price</th>
                  <td>4499.00</td>
                </tr>

                <tr>
                  <th>Shipping & Processing Fees</th>
                  <td>250.00</td>
                </tr>


                <tr>
                  <th>Bid Reset Time</th>
                  <td>10 Second</td>
                </tr>



                <tr>
                  <th>Credit used per bid</th>
                  <td>6X</td>
                </tr>


                <tr>
                  <th>Auction Type</th>
                  <td>10 Paisa</td>
                </tr>

                <tr>
                  <th>Delivery Details</th>
                  <td>---</td>
                </tr>




              </tbody>
            </table>

          </div>
          <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
            <table class="table">

              <tbody>
                <tr>
                  <th>Price</th>
                  <td>5000.00</td>
                </tr>

                <tr>
                  <th>Bid Time</th>
                  <td>25-05-2023</td>
                </tr>

                <tr>
                  <th>User ID</th>
                  <td>---</td>
                </tr>



              </tbody>
            </table>

          </div>
        </div>

      </div>
    </div>
  </div>
</section>

<?php include 'footer.php'; ?>