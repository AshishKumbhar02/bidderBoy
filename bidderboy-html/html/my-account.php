<?php include 'header.php'; ?> <section class="inner_header">
  <div class="container">
    <ul class="breadcrumb breadcrumb list-inline justify-content-center">
      <li>
        <a href="index.php">Home</a>
      </li>
      <li> ></li>
      <li>My Account</li>
    </ul>
    <h4 class="text-center">My Account</h4>
  </div>
</section>
<section class="account_section">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <form class="account_box" action="#" method="GET">
          <div class="row">

            <div class="">
              <h4>Edit Profile</h4>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label class="control-label"> First Name</label>
                <input type="text" class="form-control" name="first-name" placeholder="First Name" />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label class="control-label">Last Name</label>
                <input type="text" class="form-control" name="last-name" placeholder="Last Name" />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label class="control-label"> User Name <span class="text-danger">*</span>
                </label>
                <input type="text" class="form-control" name="user-name" placeholder="User Name" />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label class="control-label"> Email</label>
                <input type="email" class="form-control" name="email" placeholder="Email" />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label class="control-label"> Mobile <span class="text-danger">*</span>
                </label>
                <input type="tel" class="form-control" name="mobile" placeholder="Mobile" />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label class="control-label"> Birthdate <span class="text-danger">*</span>
                </label>
                <input type="text" class="form-control" name="birthdate" placeholder="Birthdate" />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label class="control-label"> Pincode <span class="text-danger">*</span>
                </label>
                <input type="text" class="form-control" name="pincode" placeholder="Pincode" />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label class="control-label"> City <span class="text-danger">*</span>
                </label>
                <input name="city" type="text" class="form-control" placeholder="City">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label class="control-label"> State <span class="text-danger">*</span>
                </label>
                <input name="state" type="text" class="form-control" placeholder="State">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label class="control-label"> Country <span class="text-danger">*</span>
                </label>
                <input name="country" type="text" class=" form-control" placeholder="Country">
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label class="control-label"> Address <span class="text-danger">*</span>
                </label>
                <textarea name="" rows="2" cols="20" class=" form-control" placeholder="Address"></textarea>
              </div>
            </div>
          </div>

        </form>
      </div>


      <div class="col-md-6">

        <div class="row">

          <div class="col-md-12">

            <form class="account_box" action="#" method="GET">
              <div class="row">

                <div class="">
                  <h4>Statistics</h4>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label"> Auctions Participated</label>
                    <input type="text" class="form-control" name="auctions-participated" placeholder="Auctions Participated" />
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label"> Auctions Won</label>
                    <input type="text" class="form-control" name="auctions-won" placeholder="Auctions Won" />
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label"> Bidderboy Credits Used
                    </label>
                    <input type="text" class="form-control" name="credits-used" placeholder="Bidderboy Credits Used" />
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label"> Bidderboy Credits Bought</label>
                    <input type="text" class="form-control" name="credits-Bought" placeholder="Bidderboy Credits Bought" />
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label"> Bidderboy Credits Left
                    </label>
                    <input class="form-control" name="credits-left" placeholder="Bidderboy Credits Left" />
                  </div>
                </div>

              </div>

            </form>


          </div>



          <div class="col-md-12 mt-4">

            <form class="account_box" action="#" method="GET">
              <div class="row">

                <div class="">
                  <h4>Change Password</h4>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label"> Passwordd</label>
                    <input type="text" class="form-control" name="passwordd" placeholder="Passwordd" />
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label"> New Password</label>
                    <input type="text" class="form-control" name="new-password" placeholder="New Password" />
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="control-label"> Confirm Password <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="confirm-password" placeholder="Confirm Password" />
                  </div>
                </div>

                <div class="text-center">
                  <div class="form-group">
                    <button type="button" class="btn btn-info mrgleft10">Change Password</button>
                  </div>
                </div>
              </div>

            </form>


          </div>


        </div>

      </div>


    </div>
  </div>
</section> <?php include 'footer.php'; ?>