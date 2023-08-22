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
            <form enctype="multipart/form-data" id="verify_phone_for_register" class="text-center">


              <?php echo "<h4 style='color:red;' id='label_for_phone_validation'></h4>"; ?>
              <div class="form-group">
                <div class="inner-addon left-addon">
                  <i class="left-addon form-icon fas fa-user"></i>
                   <input type="tel" pattern="[0-9]{10}"  onchange="validation_for_email_username_phone()" onload="validation_for_email_username_phone()" name="verify_phone" id="verify_phone" class="form-control form-control-md sharp-edge" placeholder="Phone no." data-error="Phone no. required" required>
                  <div class="help-block with-errors"></div>
                </div>
              </div><!--username-->

              <div class="form-group">
                <div class="inner-addon left-addon">
                  <i class="left-addon form-icon fas fa-user"></i>
                  <input type="text" onchange="validation_for_email_username_phone()" onload="validation_for_email_username_phone()" name="verify_phone_otp" id="verify_phone_otp" class="form-control form-control-md sharp-edge" placeholder="Enter OTP" data-error="Enter OTP" required>
                  <div class="help-block with-errors"></div>
                </div>
              </div><!--username-->

 
           


             


              <div class="form-group">
                <div class="checkbox">

                  <label>Already have an account? <a href="../login/index.php">Login here</a></label>
                  <div class="left-side help-block with-errors"></div>
                </div>
              </div><!--Agreed-->

              <div class="form-group">
                <input type="hidden" name="register_value" value="Register" id="register_value" />

                <button class="btn btn-primary sharp btn-md btn-style-one" id="verify_phone_btn" name="verify_phone_btn" type="submit" value="Send OTP">Send OTP</button>

                <button class="btn btn-primary sharp btn-md btn-style-one" id="verify_phone_otp" name="verify_phone_otp" value="Verify Phone No." type="submit">Verify Phone No.</button>
              </div><!--register button-->

            </form>
          </div>
          <!--Register-->
        </div>
      </div><!--col-lg-10-->

    </div>
  </div><!--row-->

</section>