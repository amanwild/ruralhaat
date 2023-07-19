
<section class="inner-page-content border-bottom top-pad-60">    
    <div class="login-register login-register-v1" style="padding-top: 10px;">
      <div class="container">
        <section class="inner-page-content border-bottom" id="forget_form">
          <div class="login-register login-register-v1"  style="padding-top: 10px;">
            <div class="container">
              <div class="row">
                <div class="col-lg-10 col-md-11 col-sm-12 center-block">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="classiera-login-register-heading border-bottom text-center">
                        <h3 class="text-uppercase">Reset Your Password</h3>
                        <?php echo "<h4 style='color:red;' id='label_for_email_validation'></h4>"; ?>
                      </div>
                    </div><!--col-lg-12-->
                  </div><!--row-->
                  <div class="row">
                    <div class="col-lg-8 col-sm-10 col-md-8 center-block">
                      <form method="POST" id="myform" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
                        <div class="form-group">
                          <div class="row">
                            <div class="col-lg-4 col-sm-4 single-label">
                              <label for="forget_email">Your Email : <span class="text-danger">*</span></label>
                            </div>
                            <div class="col-lg-8 col-sm-8">
                              <div class="inner-addon left-addon">
                                <i class="left-addon form-icon fas fa-lock"></i>

                                <input type="hidden" id="forget_password" name="forget_password" value="true">

                                <input type="email" id="forget_email" onchange="validation_for_email()" onload="validation_for_email()" name="forget_email" class="form-control form-control-md sharp-edge" placeholder="Type Your Email" data-error="Email required" required>
                                <div class="help-block with-errors"></div>
                              </div>
                            </div>
                          </div>
                        </div><!--Email div-->
                        <a href="../login/index.php"> Login Now</a>
                        <div class="col-lg-8 col-sm-8 pull-right flip">
                          <div class="form-group">
                            <input type="hidden" id="submit" name="submit" value="Reset" />
                            <button class="btn btn-primary sharp btn-md btn-style-one" name="op" value="Reset" id="validate_email_btn" type="submit">Reset Password</button>
                          </div>
                        </div><!--Email div-->
                      </form>
                    </div>
                  </div><!--row-->
                </div><!--col-lg-10-->
              </div><!--row-->
            </div><!--container-->
          </div><!--login-register login-register-v1-->
        </section>
      </div>
    </div>
  </section>

