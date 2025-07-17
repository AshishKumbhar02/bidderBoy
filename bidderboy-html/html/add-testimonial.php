<?php include 'header.php'; ?> <section class="inner_header">
  <div class="container">
    <ul class="breadcrumb breadcrumb list-inline justify-content-center">
      <li>
        <a href="index.php">Home</a>
      </li>
      <li> ></li>
      <li>Add Testimonial</li>
    </ul>
    <h4 class="text-center">Add Testimonial</h4>
  </div>
</section>
<section class="add_testiminials">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">

        <div class="border_boxex">
          <h4>Add Testimonial</h4>
          <form class="account_box" action="#" method="GET">
            <div class="row justify-content-center">
              <div class="col-md-8">
                <div class="form-group">
                  <label class="control-label"> Testimonial Text * <span class="text-danger">*</span>
                  </label>
                  <textarea name="" rows="2" cols="20" class=" form-control" placeholder="Address"></textarea>
                </div>
              </div>
              <div class="col-md-8">
                <div class="form-group">
                  <label class="control-label"> Pincode <span class="text-danger">*</span>
                  </label>
                  <input type="file" class="form-control" name="pincode" placeholder="Pincode">
                </div>
              </div>

              <div style="clear: both;"></div>

              <div class="col-md-8">
                <button type="button" class="btn btn-info"><i class="fa fa-save"></i> Save</button>
              </div>
            </div>

          </form>
        </div>

      </div>


    </div>
  </div>
</section> <?php include 'footer.php'; ?>