<section class="inner-page-content border-bottom top-pad-60">
  <div class="login-register login-register-v1">
    <div class="container">
      <div class="row" id="login_form">
        <div class="row">
          <div class="col-lg-12">
            <div class="classiera-login-register-heading border-bottom text-center">
              <h3 class="text-uppercase">Login</h3>
            </div>


            <div class="login" style="padding-left: 10px;padding-right: 10px;width:auto;height:auto;margin:5px;">
              <!-- <img class="image" src="../wp-content/uploads/2018/11/mgiri office.jpg" alt="Your Image"> -->
              <div class="row">
                <div class="col-lg-12 center-block">
                  <form data-toggle="validator" method="POST" id="classiera_login_form" name="classiera_login_form">
                    <div class="form-group">
                      <div class="row">
                        <div class="col-sm-3 col-lg-3 single-label left-pad-20">
                          <label style="color:#017FB1" for="login_username">Username <span>or</span> Email : <span class="text-danger">*</span></label>
                        </div><!--col-lg-3-->
                        <div class="col-sm-9 col-lg-9">
                          <div class="inner-addon left-addon">
                            <i class="left-addon form-icon fas fa-user"></i>
                            <input type="text" id="login_username" name="login_username" class="form-control form-control-md sharp-edge" placeholder="Your Username" data-error="Username is required" required>
                            <div class="help-block with-errors"></div>
                          </div>
                        </div><!--col-lg-9-->
                      </div><!--row-->
                    </div><!--UserName-->
                    <div class="form-group">
                      <div class="row">
                        <div class="col-sm-3 col-lg-3 single-label">
                          <label style="color:#017FB1" for="login_password">Password : <span class="text-danger">*</span></label>

                        </div>
                        <div class="col-sm-9 col-lg-9">
                          <div class="inner-addon left-addon">
                            <i class="left-addon form-icon fas fa-lock"></i>
                            <input id="login_password" type="password" name="login_password" class="form-control form-control-md sharp-edge" placeholder="Enter Password" data-error="Password required" required>
                            <div class="help-block with-errors"></div>
                          </div>
                        </div>
                      </div>
                    </div><!--Password-->
                    <div class="col-sm-9 col-lg-9 col-xs-12 pull-right flip">
                      <div class="form-group clearfix">
                        <p class="forget-pass pull-left flip">
                          <a href="../forget_password/index.php">Forgot Password?</a>
                        </p>
                        <p class="forget-pass pull-right flip"><b>Don&rsquo;t have an account?</b>
                        <a href="../login-v2/index.php">Create one here.</a>
                        </p>
                      </div>
                      <!--Google-->

                      <!--Google-->
                      <div class="form-group">
                        <input type="hidden" id="submitbtn" name="submit" value="Login" />
                        <input type="hidden" id="submit_login" name="submit_login" value="Login" />
                        <button type="submit" class="btn btn-primary sharp btn-md btn-style-one" name="op" value="Login">LOGIN NOW</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div><!--col-lg-12-->
        </div><!--row-->


        <div class="social-login border-bottom">
          <div class="social-login-or">
            <span>OR</span>
          </div>

          <div class='apsl-login-networks theme-1 clearfix'>
            <div class='social-networks'>
              <div class="form-group text-center">
              </div>
            </div>
          </div>
        </div>
        <div class="social-login border-bottom">
          <div class="social-login-or">
            
          </div>
          <h5 class="text-uppercase text-center">
            Log in or sign up with a Google Account </h5>
          <!--NextendSocialLogin-->
          <!--AccessPress Socil Login-->
          <div class='apsl-login-networks theme-1 clearfix'>
            <div class='social-networks'>
              <div class="form-group text-center">
                <p>
                  <!-- <a href="../login-v2/index.php" style="margin:10px;text-decoration:none !important;background-color:#3b5998;color:white;font-weight:900;font-size:25px;padding:15px !important;padding-right:25px !important;padding-left:25px !important;border-radius:100px;">F</a> -->

                  <a href="<?php echo $google_client->createAuthUrl(); ?>" style="margin:10px;text-decoration:none !important;background-color:#dc4e41;color:white;font-weight:900;font-size:25px;padding:15px !important;border-radius:100px;">G+</a>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>