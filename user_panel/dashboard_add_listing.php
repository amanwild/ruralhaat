<?php include "../validation_of_user.php" ?>

<!DOCTYPE html>
<html lang="zxx">
<!-- Mirrored from ulisting.utouchdesign.com/ulisting_ltr/dashboard_add_listing.php by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Apr 2023 11:41:50 GMT -->

<head>
  <meta name="author" content="" />
  <meta name="description" content="" />

  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Add Lisiting</title>

  <!-- Favicon -->
  <link rel="shortcut icon" href="../wp-content/uploads/data/favicon.png" />
  <!-- Style CSS -->
  <link rel="stylesheet" href="css/stylesheet.css" />
  <link rel="stylesheet" href="css/mmenu.css" />
  <link rel="stylesheet" href="css/perfect-scrollbar.css" />
  <link rel="stylesheet" href="css/style.css" id="colors" />
  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,600,700,800&amp;display=swap&amp;subset=latin-ext,vietnamese" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700,800" rel="stylesheet" type="text/css" />
</head>

<body onload="validate_user()">

  <?php include "./component/preloader.php" ?>

  <!-- Wrapper -->
  <div id="main_wrapper">
    <?php include "./component/header.php" ?>
    <div class="clearfix"></div>

    <!-- Dashboard -->
    <div id="dashboard">
      <?php include "./component/user_sidebar_navbar.php" ?>

      <script>
        var d = document.getElementById("user_dashboard_add_listing");
        d.className += "active";
      </script>

      <!-- Content -->
      <div class="utf_dashboard_content">
        <div id="titlebar" class="dashboard_gradient">
          <div class="row">
            <div class="col-md-12">
              <h2>Add Listing</h2>
              <nav id="breadcrumbs">
                <ul>
                  <li><a href="index_1.php">Home</a></li>
                  <li><a href="dashboard.php">Dashboard</a></li>
                  <li>Add Listing</li>
                  <!-- <li> -->

                  <!-- </li> -->
                </ul>
              </nav>
            </div>
          </div>
        </div>
        <?php
        // foreach ($_POST as $key => $value) {
        //   echo "Field " . htmlspecialchars($key) . " is " . htmlspecialchars($value) . "<br>";
        // }
        // echo "hello";

        if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["addList"]) && $_POST['listing_title']) {
          // $user_id = $_POST['user_id'];
          $user_id = $_SESSION['user_id'];

          $listing_title = "";
          if (isset($_POST["listing_title"])) {
            $listing_title = $_POST['listing_title'];
          }

          $category_id = "";
          if (isset($_POST["category_id"])) {
            $category_id = $_POST['category_id'];
          }

          $keywords = "";
          if (isset($_POST["keywords"])) {
            $keywords = $_POST['keywords'];
          }

          $tags = "";
          if (isset($_POST["tags"])) {
            $tags = $_POST['tags'];
          }

          $price = "";
          if (isset($_POST["price"])) {
            $price = $_POST['price'];
          }

          $sub_category_id  = "";
          if (isset($_POST["sub_category_id"])) {
            $sub_category_id  = $_POST['sub_category_id'];
          }

          $listing_description = "";
          if (isset($_POST["listing_description"])) {
            $listing_description = $_POST['listing_description'];
          }

          $country_id = "";
          if (isset($_POST["country_id"])) {
            $country_id = $_POST['country_id'];
          }

          $city_id = "";
          if (isset($_POST["city"])) {
            $city_id = $_POST['city'];
          }

          $state_id = "";
          if (isset($_POST["state"])) {
            $state_id = $_POST['state'];
          }
          $pincode = "";
          if (isset($_POST["pincode"])) {
            $pincode = $_POST['pincode'];
          }

          $address = "";
          if (isset($_POST["address"])) {
            $address = $_POST['address'];
          }

          $logo_image = "";
          if (isset($_POST["logo_image"])) {
            $logo_image = $_POST['logo_image'];
          }

          include "../db.php"; 
          try {
            $insert_query = "INSERT INTO `listing` (`listing_id`, `listing_title`, `listing_category_id`, `listing_keyword`, `listing_tag`, `listing_price`, `listing_sub_category_id`, `listing_description`, `listing_country_id`, `listing_pincode`, `listing_state_id`, `listing_adderess`, `listing_city_id`, `listing_image`, `listing_since`, `listing_status_timestamp`, `listing_status`, `listing_permission`, `listing_owner_id`) VALUES (NULL, '$listing_title', '$category_id', '$keywords', '$tags', '$price', '$sub_category_id', '$listing_description', '1', '$pincode', '$state_id', '$address', '$city_id', '$logo_image',  current_timestamp(),  current_timestamp(), 'Pending', 'Pending', '" . $_SESSION['user_id'] . "')";
            $insert_result = mysqli_query($connect, $insert_query);

            // echo $insert_query;
            if ($insert_result) {
              echo '<div class="row"> <div class="col-md-12"> <div class="notification success closeable margin-bottom-30"> <p> Listing is Successfully Added </p> <a class="close" href="#"></a> </div> </div> </div>'; // echo ("<br> email shooting successfull <br>");

              // echo ("<br> email shooting successfull <br>");
            } else {

              echo "Data insertion failed " . "<br>";
            }
          } catch (Exception $e) {
            echo "Data insertion failed " . "<br>";
            // echo 'Message: ' . $e->getMessage() . "<br>";
          }


          // echo "hello";
        }
        ?>
        <!-- Form data -->
        <div class="row">
          <div class="col-lg-12">

            <div id="utf_add_listing_part">
              <form method="POST" action="<?= $_SERVER["REQUEST_URI"]; ?>">
                <input type="hidden" name="addList" id="addList" value="addList" />
                <div class="add_utf_listing_section margin-top-45" validate>
                  <div class="utf_add_listing_part_headline_part">
                    <h3><i class="sl sl-icon-tag"></i> Categories & Tags</h3>
                  </div>

                  <div class="row with-forms">
                    <div class="col-md-6">
                      <label for="listing_title">Listing Title</label>
                      <input type="text" name="listing_title" id="listing_title" placeholder="Listing Title" required />
                    </div>
                    <div class="col-md-6">
                      <label for="">Category</label>
                      <div class="intro-search-field utf-chosen-cat-single">
                        <select class="selectpicker " name="category_id" id="category" data-selected-text-format="count" data-size="7" title="Select Category" required>


                          <?php

                          $select_category_query = "SELECT * FROM `category`"; //NOTE: here (`) is not equal to (')
                          try {
                            $select_category_result = 0;
                            if ($connect) {
                              $select_category_result = mysqli_query($connect, $select_category_query);
                              if ($select_category_result) {
                                $category_num = mysqli_num_rows($select_category_result);
                              }
                            }
                          } catch (Exception $e) {
                            $mess = $e->getMessage();
                          }

                          if ($category_num > 0) {
                            $sno = 0;
                            //Note : mysqli_fetch_assoc($result) it returns NULL when no data is persent to Select
                            while ($row = mysqli_fetch_assoc($select_category_result)) {
                          ?> <option value=" <?php echo $row["category_id"]; ?>"><?= $row['category_name'] ?></option>
                          <?php }
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row with-forms">
                    <!-- <div class="col-md-6">
                      <label for="keywords">Keywords</label>
                      <input type="text" name="keywords" id="keywords" placeholder="Keywords..." required />
                    </div> -->
                    <div class="col-md-6">
                      <label for="">Price</label>
                      <div class="fm-input pricing-price">
                        <input type="number" name="price" id="price" placeholder="Price" data-unit="$" required />
                        <i class="data-unit">₨</i>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <label for="">Sub-Category</label>
                      <div class="intro-search-field utf-chosen-cat-single">
                        <select class=" default" name="sub_category_id" style="margin-bottom:0px" id="sub-category" data-selected-text-format="count" data-size="7" title="Select Sub-Category" required>

                        </select>
                      </div>
                    </div>

                  </div>
                  <div class="row with-forms">


                    <!-- <div class="col-md-6">
                      <label for="">Tags(optional)</label>
                      <div class="intro-search-field utf-chosen-cat-single">
                        <select class="selectpicker default" name="tags" id="tags" data-selected-text-format="count" data-size="7" title="Select Tags" required>
                        </select>
                      </div>
                    </div> -->

                  </div>
                  <div class="row with-forms">
                    <div class="col-md-12">
                      <label for="listing_description">Listing Description</label>
                      <input type="text" class="" name="listing_description" id="listing_description" placeholder="" required />
                    </div>
                  </div>
                </div>


                <div class="add_utf_listing_section margin-top-45">
                  <div class="utf_add_listing_part_headline_part">
                    <h3><i class="sl sl-icon-map"></i> Location</h3>
                  </div>
                  <div class="utf_submit_section">
                    <div class="row with-forms">
                      <!-- <div class="col-md-6">
                        <label for="country">Country</label>
                        <div class="intro-search-field utf-chosen-cat-single">
                          <select class="selectpicker default" name="country_id" id="country" data-selected-text-format="count" data-size="7" title="Select Country" required>

                            <?php $result = mysqli_query($connect, "SELECT * FROM countries");
                            while ($row = mysqli_fetch_array($result)) {
                            ?>
                              <option value=" <?php echo $row["country_id"]; ?>"><?php echo $row["country_name"]; ?></option>
                            <?php
                            } ?>
                          </select>
                        </div>
                      </div> -->
                      <div class="col-md-6" id="state1">
                        <label for="state">State</label>
                        <div class="intro-search-field utf-chosen-cat-single">
                          <select class="selectpicker default" style="margin-bottom:0px" name="state" id="state" title="Select State" required>
                            <?php $result = mysqli_query($connect, "SELECT * FROM states");
                            while ($row_for_state_title = mysqli_fetch_array($result)) {
                            ?>
                              <option name="state" value="<?php echo $row_for_state_title["state_id"]; ?>"><?php echo $row_for_state_title["state_name"]; ?></option>
                            <?php
                            } ?>

                          </select>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <label for="pincode">Pincode</label>
                        <input type="text" class="input-text" name="pincode" id="pincode" placeholder="Pincode" required />
                      </div>

                      <div class="col-md-6" id="city1">
                        <label for="city">City</label>
                        <div class="intro-search-field utf-chosen-cat-single">
                          <select class=" default" style="margin-bottom:0px" name="city" id="city" title="Select City" required>
                            <?php $select_city_option_query = "SELECT * FROM cities where state_id = " . $row['listing_state_id'];
                            try {
                              $select_city_option_result = 0;
                              if ($connect) {
                                // echo $select_city_option_query;
                                $select_city_option_result = mysqli_query($connect, $select_city_option_query);
                                if ($select_city_option_result) {
                                  $select_city_option_num = mysqli_num_rows($select_city_option_result);
                                }
                              }
                            } catch (Exception $e) {
                              $mess = $e->getMessage();
                            }
                            if ($select_city_option_num > 0) {
                              while ($row_for_city_option = mysqli_fetch_assoc($select_city_option_result)) {
                            ?>
                                <option name="city" value="<?= $row_for_city_option['city_id'] ?>" select><?= $row_for_city_option['city_name'] ?></option>
                            <?php
                              }
                            } ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <label for="address">Address</label>
                        <input type="text" class="input-text" name="address" id="address" placeholder="Address" required />
                      </div>

                    </div>
                  </div>
                </div>

                <div class="add_utf_listing_section margin-top-45">
                  <div class="utf_add_listing_part_headline_part">
                    <h3><i class="sl sl-icon-picture"></i> Images</h3>
                  </div>
                  <div class="row with-forms">
                    <div class="utf_submit_section col-md-4">
                      <h4>Logo</h4>
                      <!-- <form></form> -->
                      <div class="">
                        <input type="file" onchange="showimg();" name="logo_image" id="logo_image" required>
                      </div>
                      <div class="">
                        <img style="display:none" class="dropzone" name="view_logo_image" id="view_logo_image" src="" />
                      </div>

                      <script>
                        function showimg() {
                          document.getElementById("view_logo_image").style.display = "block";
                          var x = (document.getElementById("logo_image").value).slice(12, 100);
                          console.log(x);
                          document.getElementById("view_logo_image").src = "../wp-content/uploads/data/" + x;
                          // alert("hello");
                        }
                      </script>

                      </input>
                    </div>
                  </div>
                </div> <!-- <a href="#" class="button preview">Save </a> -->
                <button type="submit" class="button preview" id="submit">Save</button>
              </form>
            </div>
          </div>
          <?php include "./component/footer.php" ?>
        </div>
      </div>
    </div>
  </div>

  <!-- Scripts -->
  <script src="scripts/jquery-3.4.1.min.js"></script>
  <script src="scripts/chosen.min.js"></script>
  <script src="scripts/perfect-scrollbar.min.js"></script>
  <script src="scripts/slick.min.js"></script>
  <script src="scripts/rangeslider.min.js"></script>
  <script src="scripts/bootstrap-select.min.js"></script>
  <script src="scripts/magnific-popup.min.js"></script>
  <script src="scripts/jquery-ui.min.js"></script>
  <script src="scripts/mmenu.js"></script>
  <script src="scripts/tooltips.min.js"></script>
  <script src="scripts/color_switcher.js"></script>
  <script src="scripts/jquery_custom.js"></script>
  <script>
    //   $(document).ready(function() {
    //     $('#country').on('change', function() {
    //       // alert("here");
    //       $("#country_id").value = $("#country").value;
    //       document.getElementById("for_country_id").submit();

    //     })
    //   });
    // 
  </script>
  <script>
    $(document).ready(function() {
      $('#sub-category').html('<option value="">Select Category First</option>');
      // $('#state').append('<option value="">Select State</option>');
      $('#city').html('<option value="">Select State First</option>');
      $('#category').on('change', function() {
        // alert("hello");
        var category_id = this.value;
        $.ajax({
          url: "sub_category_by_category.php",
          type: "POST",
          data: {
            category_id: category_id
          },
          cache: false,
          success: function(result) {
            // alert("hello");
            $("#sub-category").html(result);
            console.log(result);
          }
        });
      });
      // $('#country').on('change', function() {
      //   // alert("hello");
      //   var country_id = this.value;
      //   $.ajax({
      //     url: "states-by-country.php",
      //     type: "POST",
      //     data: {
      //       country_id: country_id
      //     },
      //     cache: false,
      //     success: function(result) {
      //       // alert("hello");
      //       $("#state").html(result);
      //       $('#city').html('<option value="">Select State First</option>');
      //       console.log(result);
      //     }
      //   });
      // });
      // $('#state').on('change', function() {
      //   var state_id = this.value;
      //   $.ajax({
      //     url: "cities-by-state.php",
      //     type: "POST",
      //     data: {
      //       state_id: state_id
      //     },
      //     cache: false,
      //     success: function(result) {
      //       $("#city").html(result);
      //     }
      //   });
      // });

    
      $('#state').on('change', function() {
        var state_id = this.value;
        // alert("hello");

        $.ajax({
          url: "cities-by-state.php",
          type: "POST",
          data: {
            state_id: state_id
          },
          cache: false,
          success: function(result) {
            $("#city1").empty();
            $("#city1").append("<label for=''>City</label>",
              <?php
             
              ?> "<div class='intro-search-field utf-chosen-cat-single'><select style='margin-bottom:0px' name='city' value='' title='' id='city' data-selected-text-format='count'> </select> </div>",

              <?php
              ?>
            );
            $("#city").html(result);
            console.log(result);
          }
        });
      });

    });
  </script>
  <script>
    (function($) {
      try {
        var jscr1 = $(".js-scrollbar");
        if (jscr1[0]) {
          const ps1 = new PerfectScrollbar(".js-scrollbar");
        }
      } catch (error) {
        console.log(error);
      }
    })(jQuery);
  </script>

  <!-- Style Switcher -->
  <div id="color_switcher_preview">
    <h2>
      Choose Your Color

    </h2>
    <div>
      <ul class="colors" id="color1">
        <li><a href="#" class="stylesheet"></a></li>
        <li><a href="#" class="stylesheet_1"></a></li>
        <li><a href="#" class="stylesheet_2"></a></li>
        <li><a href="#" class="stylesheet_3"></a></li>
        <li><a href="#" class="stylesheet_4"></a></li>
        <li><a href="#" class="stylesheet_5"></a></li>
      </ul>
    </div>
  </div>

  <!-- Maps -->
  <script src="http://maps.google.com/maps/api/js?sensor=false&amp;language=en"></script>
  <script src="scripts/infobox.min.js"></script>
  <script src="scripts/markerclusterer.js"></script>
  <script src="scripts/maps.js"></script>
  <script src="scripts/dropzone.js"></script>
</body>

<!-- Mirrored from ulisting.utouchdesign.com/ulisting_ltr/dashboard_add_listing.php by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Apr 2023 11:41:50 GMT -->

</html>