<?php 

// echo $expired_listing_count;
?>

<header>
  <!-- NavBar -->
  <section class="classiera-navbar   classiera-navbar-v6 ">
    <!--Only Shown For Nav Style 4-->
    <nav id="myNavmenu" class="navmenu navmenu-default offcanvas offcanvas-light navmenu-fixed-left"
        role="navigation">
        <div class="navmenu-brand clearfix">
          <a href="../index.php">
            <img src="../wp-content/uploads/2021/12/logo-grid-3 (2).png" alt="Classiera Classifieds Ads WordPress Theme">
          </a>
          <button type="button" class="offcanvas-button" data-toggle="offcanvas" data-target="#myNavmenu">
            <i class="fas fa-times"></i>
          </button>
        </div><!--navmenu-brand clearfix-->
        <div class="menu-main-menu-container">
          <ul id="menu-main-menu" class="nav navmenu-nav">
            <li id="menu-item-190"
              class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home menu-item-has-children menu-item-190 dropdown">
              <a title="Home" href="../index.php" data-toggle="dropdown" data-hover="dropdown" data-animations="fadeIn"
                class="dropdown-toggle" aria-haspopup="true">Home <span class="caret"></span></a>
            </li>
            <li id="menu-item-190"
              class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home menu-item-has-children menu-item-190 dropdown">
              <a title="Home" href="../admin_panel/index.php" data-toggle="dropdown" data-hover="dropdown" data-animations="fadeIn"
                class="dropdown-toggle" aria-haspopup="true">Registration <span class="caret"></span></a>
            </li>
            <li id="menu-item-190"
              class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home menu-item-has-children menu-item-190 dropdown">
              <a title="Home" href="../admin_panel/user_conversion.php" data-toggle="dropdown" data-hover="dropdown" data-animations="fadeIn"
                class="dropdown-toggle" aria-haspopup="true">User Conversion <span class="caret"></span></a>
            </li>
            <li id="menu-item-190"
              class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home menu-item-has-children menu-item-190 dropdown">
              <a title="Home" href="../admin_panel/product_details.php" data-toggle="dropdown" data-hover="dropdown" data-animations="fadeIn"
                class="dropdown-toggle" aria-haspopup="true">Listings <span class="caret"></span></a>
            </li>
            <li id="menu-item-190"
              class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home menu-item-has-children menu-item-190 dropdown">
              <a title="Home" href="../admin_panel/category.php" data-toggle="dropdown" data-hover="dropdown" data-animations="fadeIn"
                class="dropdown-toggle" aria-haspopup="true">Categories <span class="caret"></span></a>
            </li>
            <li id="menu-item-190"
              class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home menu-item-has-children menu-item-190 dropdown">
              <a title="Home" href="../admin_panel/user_interaction.php" data-toggle="dropdown" data-hover="dropdown" data-animations="fadeIn"
                class="dropdown-toggle" aria-haspopup="true">User Interaction <span class="caret"></span></a>
            </li>
            <li id="menu-item-190"
              class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home menu-item-has-children menu-item-190 dropdown">
              <a title="Home" href="../admin_panel/user_tracking_enquery.php" data-toggle="dropdown" data-hover="dropdown" data-animations="fadeIn"
                class="dropdown-toggle" aria-haspopup="true">User Tracking <span class="caret"></span></a>
            </li>
            <li id="menu-item-190"
              class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home menu-item-has-children menu-item-190 dropdown">
              <a title="Home" href="../success stories/index.php" data-toggle="dropdown" data-hover="dropdown" data-animations="fadeIn"
                class="dropdown-toggle" aria-haspopup="true">Sucess Stories <span class="caret"></span></a>
            </li>
            <!-- <li id="menu-item-190"
              class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home menu-item-has-children menu-item-190 dropdown">
              <a title="Home" href="../contact/index.php" data-toggle="dropdown" data-hover="dropdown" data-animations="fadeIn"
                class="dropdown-toggle" aria-haspopup="true">Contact <span class="caret"></span></a>
            </li> -->
          </ul>
        </div>
        <div class="submit-post">
          <a href="../logout/index.php" class="btn btn-block btn-primary btn-md active">
            Logout</a>
        </div><!--submit-post-->
        <div class="social-network">
          <h5>Social network</h5>
          <!--FacebookLink-->
          <a href="#" class="social-icon social-icon-sm offcanvas-social-icon"
            target="_blank">
            <i class="fab fa-facebook-f"></i>
          </a>
          <!--twitter-->
          <a href="#" class="social-icon social-icon-sm offcanvas-social-icon"
            target="_blank">
            <i class="fab fa-twitter"></i>
          </a>
          <!--Dribbble-->
          <!--Flickr-->
          <!--Github-->
          <!--Pinterest-->
          <!--YouTube-->
          <!--Google-->
          <a href="#" class="social-icon social-icon-sm offcanvas-social-icon"
            target="_blank">
            <i class="fab fa-google-plus-g"></i>
          </a>
          <!--Linkedin-->
          <!--Instagram-->
          <!--Vimeo-->
          <!--VK-->
          <!--OK-->
        </div>
      </nav>
    <!--Only Shown For Nav Style 4-->
    <div class="">
      <!-- mobile off canvas nav -->
      <!-- mobile off canvas nav -->
      <!--Primary Nav-->
      <nav class="navbar navbar-default ">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="offcanvas" data-target="#myNavmenu" data-canvas="body">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand-custom" href="../index.php">
            <img class="img-responsive" src="../wp-content/uploads/2021/12/logo-grid-3 (2).png" alt="Classiera Classifieds Ads WordPress Theme">
          </a>
        </div><!--navbar-header-->
        <div class="collapse navbar-collapse visible-lg" id="navbarCollapse">





          <div class="navbar-right login-reg flip">

            <!-- <a href="../submit-ad/index.php" class="btn btn-primary outline round">Submit Ad</a> -->

            <form id="myForm" action="../logout/index.php" method="POST">
              <input id="Logout" name="Logout" value="Logout" type="hidden"></input>

              <a class="btn btn-primary outline round" href="../logout/index.php" type="submit" id="logout_btn" name="logout_btn">Logout</a>


            </form>
            <!-- <script>
              function myFunction() {
                document.getElementById("myForm").submit();
              }
            </script> -->
          </div>





          <ul id="menu-main-menu-1" class="nav navbar-nav navbar-right nav-margin-top flip nav-ltr">
            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home menu-item-has-children menu-item-190 dropdown">
              <a title="Home" href="../index.php" data-toggle="dropdown" data-hover="dropdown" data-animations="fadeIn" class="dropdown-toggle" aria-haspopup="true">Home
              </a>
            </li>

            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home menu-item-has-children menu-item-190 dropdown">
              <a title="Home" href="../admin_panel/index.php" data-toggle="dropdown" data-hover="dropdown" data-animations="fadeIn" class="dropdown-toggle" aria-haspopup="true">Registration
              </a>
            </li>
            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home menu-item-has-children menu-item-190 dropdown">
              <a title="Home" href="../admin_panel/user_conversion.php" data-toggle="dropdown" data-hover="dropdown" data-animations="fadeIn" class="dropdown-toggle" aria-haspopup="true">User Conversion
              </a>
            </li>
            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home menu-item-has-children menu-item-190 dropdown">
              <a title="Home" href="../admin_panel/product_details.php" data-toggle="dropdown" data-hover="dropdown" data-animations="fadeIn" class="dropdown-toggle" aria-haspopup="true">Listings
              </a>
            </li>
            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home menu-item-has-children menu-item-190 dropdown">
              <a title="Home" href="../admin_panel/statistics.php" data-toggle="dropdown" data-hover="dropdown" data-animations="fadeIn" class="dropdown-toggle" aria-haspopup="true">Category Statistics
              </a>
            </li>
            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home menu-item-has-children menu-item-190 dropdown">
              <a title="Home" href="../admin_panel/view_statistics.php" data-toggle="dropdown" data-hover="dropdown" data-animations="fadeIn" class="dropdown-toggle" aria-haspopup="true">View Statistics
              </a>
            </li>
            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home menu-item-has-children menu-item-190 dropdown">
              <a title="Home" href="../admin_panel/category.php" data-toggle="dropdown" data-hover="dropdown" data-animations="fadeIn" class="dropdown-toggle" aria-haspopup="true">Category
              </a>
            </li>
            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home menu-item-has-children menu-item-190 dropdown">
              <a title="Home" href="../admin_panel/cummunity_member.php" data-toggle="dropdown" data-hover="dropdown" data-animations="fadeIn" class="dropdown-toggle" aria-haspopup="true">Cummunity Member
              </a>
            </li>
            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home menu-item-has-children menu-item-190 dropdown">
              <a title="Home" href="../admin_panel/user_interaction.php" data-toggle="dropdown" data-hover="dropdown" data-animations="fadeIn" class="dropdown-toggle" aria-haspopup="true">User Interaction
              </a>
            </li>
            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home menu-item-has-children menu-item-190 dropdown">
              <a title="Home" href="../admin_panel/user_tracking_enquery.php" data-toggle="dropdown" data-hover="dropdown" data-animations="fadeIn" class="dropdown-toggle" aria-haspopup="true">User Tracking
              </a>
            </li>
            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home menu-item-has-children menu-item-190 dropdown">
              <a title="Home" href="../admin_panel/user_management.php" data-toggle="dropdown" data-hover="dropdown" data-animations="fadeIn" class="dropdown-toggle" aria-haspopup="true">User Management
              </a>
            </li>
            <!-- <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-193"><a title="Contact" href="../admin_panel/contact.php">Contact</a></li> -->
          </ul>
        </div><!--collapse navbar-collapse visible-lg-->
      </nav>
      <!--Primary Nav-->
    </div><!--container-->
  </section>
  <!-- NavBar --> <!-- Mobile App button -->
  <div class="mobile-submit affix">
    <ul class="list-unstyled list-inline mobile-app-button">
      <li>
        <a href="../admin_home.php">
          <i class="fas fa-home"></i>
          <span>Home</span>
        </a>
      </li>
      <li>
        <a href="../admin_panel/index.php">
          <i class="fas fa-list"></i>
          <span>Registrations</span>
        </a>
      </li>
      <li>
        <a href="../admin_panel/user_conversion.php">
          <i class="fas fa-list"></i>
          <span>User Conversion</span>
        </a>
      </li>
      <li>
        <a href="../admin_panel/product_details.php">
          <i class="fas fa-box"></i>
          <span>Products</span>
        </a>
      </li>
      <li>
        <a href="../admin_panel/category.php">
          <i class="fas fa-list"></i>
          <span>Categories</span>
        </a>
      </li>
      <li>
        <a href="../admin_panel/submit_ad">
          <i class="fas fa-edit"></i>
          <span>Submit Ad</span>
        </a>
      </li>
    </ul>
  </div>
  <!-- Mobile App button -->
</header>