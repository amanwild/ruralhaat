<section class="inner-page-content border-bottom top-pad-50">
  <div class="login-register">
    <div class="container">
      <div class="row">


        <div class="col-lg-10 col-md-11 col-sm-12 center-block">
          <div class="row">
            <div class="col-lg-12">


              <div class="classiera-login-register-heading border-bottom text-center">
                <h3 class="text-uppercase">Register Here</h3>
              </div>
              <div id="regiter_success" style="background-color:#61a961;padding:2px;border-radius:8px;margin-bottom:10px;display:none;" class="text-center">
                <h4 style="color:white !important;font-weight:100">Registration DONE<h5>(Email has been sent successfully, check your email for further process.)<h5>
                </h4>
              </div>

              <!-- <div class="social-login border-bottom"> -->
              <marquee class="sampleMarquee" id="register_tip" direction="left" scrollamount="10" behavior="scroll">Fill out the form carefully for registration</marquee>

              <style>
                .image-container {
                  position: relative;
                  top: -50px;
                }

                .image-container img {
                  position: absolute;
                  top: -50Spx;
                  right: 0;
                }
              </style>
              <br>

              <style>
                .sampleMarquee {
                  color: #e00000cb;
                  background-color: #ffffff;
                  font-size: 34px;
                  line-height: 31px;
                  padding: 1px;
                  margin: 1px;
                  font-style: italic;
                  text-align: left;
                  font-variant: small-caps;
                  border-radius: 0px;
                }
              </style>
              <div class='apsl-login-networks theme-1 clearfix'>
                <div class='social-networks'>
                </div>
              </div>
            </div><!--social-login-->
          </div><!--col-lg-12-->
        </div><!--row-->
        <div class="row "> <!--Register-->


          <div class="col-lg-12" id="register_form">

            <div class="social-login-v2">
              <!-- <h5 class="text-uppercase"><b>Register an Account</b></h5> -->
            </div>
            <form enctype="multipart/form-data"  id="registration_form" class="text-center">

            <div class="form-group">
                <div class="inner-addon left-addon" style="">

                  <p>Please select User Type :</p>
                  <input type="radio" id="user" name="user_type" value="user" required>
                  <label for="user">Supplier</label>
                  <input type="radio" id="buyer" name="user_type" value="buyer" required>
                  <label for="buyer">Buyer</label>

                  <div class="help-block with-errors"></div>
                </div>
              </div><!--register_last_name-->

              <?php echo "<h4 style='color:red;' id='label_for_username_validation'></h4>"; ?>

              <div class="form-group">
                <div class="inner-addon left-addon">
                  <i class="left-addon form-icon fas fa-user"></i>
                  <input type="text" onchange="validation_for_email_username_phone()" onload="validation_for_email_username_phone()" name="register_username" id="register_username" class="form-control form-control-md sharp-edge" placeholder="Enter username" data-error="Username required" required>
                  <div class="help-block with-errors"></div>
                </div>
              </div><!--username-->
              <div class="form-group">
                <div class="inner-addon left-addon">
                  <i class="left-addon form-icon fas fa-">F</i>
                  <input type="text" name="register_first_name" id="register_first_name" class="form-control form-control-md sharp-edge" placeholder="Enter First name" data-error="First name required" required>
                  <div class="help-block with-errors"></div>
                </div>
              </div><!--register_first_name-->

              <div class="form-group">
                <div class="inner-addon left-addon">
                  <i class="left-addon form-icon fas fa-">L</i>
                  <input type="text" name="register_last_name" id="register_last_name" class="form-control form-control-md sharp-edge" placeholder="Enter Last name" data-error="Last name required" required>
                  <div class="help-block with-errors"></div>
                </div>
              </div><!--register_last_name-->

             
              <?php echo "<h4 style='color:red;' id='label_for_email_validation'></h4>"; ?>

              <div class="form-group">
                <div class="inner-addon left-addon">
                  <i class="left-addon form-icon fas fa-envelope"></i>
                  <input type="email" name="register_email" onchange="validation_for_email_username_phone()" onload="validation_for_email_username_phone()" id="register_email" class="form-control form-control-md sharp-edge" placeholder="Enter email address" data-error="Email required" required>
                  <div class="help-block with-errors"></div>
                </div>
              </div><!--Email Address-->

              <?php echo "<h4 style='color:red;' id='label_for_phone_validation'></h4>"; ?>

              <div class="form-group">
                <div class="inner-addon left-addon">
                  <i class="left-addon form-icon fas fa-phone"></i>
                  <input type="tel" pattern="[0-9]{10}" name="register_phone" onchange="validation_for_email_username_phone()" onload="validation_for_email_username_phone()" id="register_phone" class="form-control form-control-md sharp-edge" placeholder="Enter Phone no." data-error="Phone required" required>
                  <div class="help-block with-errors">Enter 10 digit Phone no.</div>
                </div>
              </div><!--Phone no.-->
            

              <div class="form-group">
                <div class="checkbox">
                  <input type="checkbox" id="agree" data-error="You must agree to our Terms and Conditions" required>
                  <label for="agree">Agree to <a href="#" target="_blank">Terms &amp; Conditions</a></label>
                  <div class="left-side help-block with-errors"></div>
                </div>
              </div><!--Agreed-->

              <div class="form-group">
                <div class="checkbox">

                  <label>Already have an account? <a href="../login/index.php">Login here</a></label>
                  <div class="left-side help-block with-errors"></div>
                </div>
              </div><!--Agreed-->

              <div class="form-group">
                <input type="hidden" name="register_value" value="Register" id="register_value" />

                <button class="btn btn-primary sharp btn-md btn-style-one" id="register_submit_btn" name="op_classiera" type="submit">Register</button>
              </div><!--register button-->
            </form>
          </div>
          <!--Register-->
        </div>
      </div><!--col-lg-10-->

    </div>
  </div><!--row-->

</section>