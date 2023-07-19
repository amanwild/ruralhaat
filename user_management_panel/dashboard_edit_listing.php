<?php include "../validation_of_user_manager.php" ?>
<!DOCTYPE html>
<html lang="zxx">
<!-- Mirrored from ulisting.utouchdesign.com/ulisting_ltr/dashboard_add_listing.php by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Apr 2023 11:41:50 GMT -->

<head>
  <meta name="author" content="" />
  <meta name="description" content="" />

  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Upadate Listing</title>

  <!-- Favicon -->
  <link rel="shortcut icon" href="../wp-content/uploads/data/favicon.png" />
  <!-- Style CSS -->
  <link rel="stylesheet" href="css/stylesheet.css" />
  <link rel="stylesheet" href="css/mmenu.css" />
  <link rel="stylesheet" href="css/perfect-scrollbar.css" />
  <link rel="stylesheet" href="css/style.css" id="colors" />
  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,600,700,800&amp;display=swap&amp;subset=latin-ext,vietnamese" rel="stylesheet" />
  <!-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700,800" rel="stylesheet" type="text/css" /> -->
</head>

<body>


  <?php include "./component/preloader.php" ?>

  <!-- Wrapper -->
  <div id="main_wrapper">
    <?php include "./component/slave_header.php" ?>
    <div class="clearfix"></div>

    <!-- Dashboard -->
    <div id="dashboard">
      <?php include "./component/slave_sidebar_navbar.php" ?>

      <script>
        var d = document.getElementById("user_dashboard_my_listing");
        d.className += "active";
      </script>
      <div class="utf_dashboard_content">
        <div id="titlebar" class="dashboard_gradient">
          <div class="row">
            <div class="col-md-12">
              <h2>Edit Listings</h2>
              <nav id="breadcrumbs">
                <ul>
                  <li><a href="index_1.php">Home</a></li>
                  <li><a href="dashboard.php">Dashboard</a></li>
                  <li><a href="dashboard_my_listing.php">My Listings</a></li>
                  <li>Edit Listing</li>
                </ul>
              </nav>
            </div>
          </div>
        </div>


        <?php


        if (isset($_GET['edit_listing_listing_id'])) {
          // echo "edit_listing_listing_id";
          $listing_id = $_GET['edit_listing_listing_id'];
          // echo $edit_listing_listing_id;
          $user_id = $_SESSION['user_id'];
          // foreach ($_POST as $key => $value) {
          //   echo "Field " . htmlspecialchars($key) . " is " . htmlspecialchars($value) . "<br>";
          // }
          // echo "hello";

          if (($_SERVER["REQUEST_METHOD"] == "POST") && (isset($_POST["updateList"]) && isset($_POST['listing_id']))) {
            $listing_id = '';
            if (isset($_POST["listing_id"])) {
              $listing_id = $_POST['listing_id'];
            }
            $listing_title = '';
            if (isset($_POST["listing_title"])) {
              $listing_title = $_POST['listing_title'];
            }
            $category_id = '';
            if (isset($_POST["category_id"])) {
              $category_id = $_POST['category_id'];
            }
            $keywords = '';
            if (isset($_POST["keywords"])) {
              $keywords = $_POST['keywords'];
            }
            $price = '';
            if (isset($_POST["price"])) {
              $price = $_POST['price'];
            }
            $tags = '';
            if (isset($_POST["tags"])) {
              $tags = $_POST['tags'];
            }
            $sub_category = '';
            if (isset($_POST["sub-category"])) {
              $sub_category = $_POST['sub-category'];
            }
            $listing_description = '';
            if (isset($_POST["listing_description"])) {
              $listing_description = $_POST['listing_description'];
            }
            $country = '';
            if (isset($_POST["country"])) {
              $country = $_POST['country'];
            }
            $pincode = '';
            if (isset($_POST["pincode"])) {
              $pincode = $_POST['pincode'];
            }
            $city = '';
            if (isset($_POST["city"])) {
              $city = $_POST['city'];
            }
            $state = '';
            if (isset($_POST["state"])) {
              $state = $_POST['state'];
            }
            $address = '';
            if (isset($_POST["address"])) {
              $address = $_POST['address'];
            }
            $logo_image = '';
            if (isset($_POST["logo_image"])) {
              $logo_image = $_POST['logo_image'];
            }
            // $listing_id = $_POST['listing_id'];
            // $user_id = $_POST['user_id'];
            // $listing_title = $_POST['listing_title'];
            // $listing_category_id = $_POST['category_id'];
            // $listing_keyword = $_POST['keywords'];
            // $listing_tag = $_POST['tags'];
            // $tags = $_POST['price'];
            // $listing_sub_category = $_POST['sub-category'];
            // $listing_description = $_POST['listing_description'];
            // $listing_country = $_POST['country'];
            // $listing_pincode = $_POST['pincode'];
            // $listing_state = $_POST['state'];
            // $listing_adderess = $_POST['address'];
            // $listing_city = $_POST['city'];



            // if ("" != $_POST['logo_image']) {
            //   $listing_image = $_POST['logo_image'];
            // }


            $filter = array(
              'listing_image' => $logo_image,
              // 'listing_id' => $listing_id,
              // 'listing_owner_id' => $user_id,
              'listing_title' => $listing_title,
              'listing_category_id' => $category_id,
              'listing_keyword' => $keywords,
              'listing_tag' => $tags,
              'listing_price' => $price,
              'listing_sub_category_id' => $sub_category,
              'listing_description' => $listing_description,
              'listing_country_id' => $country,
              'listing_pincode' => $pincode,
              'listing_state_id' => $state,
              'listing_adderess' => $address,
              'listing_city_id' => $city
            );
            $query_array = array();

            foreach ($filter as $key => $value) {
              if ($value != '') {
                if (preg_match('/\b_id\b/', $key)) {
                  $query_array[] = "`" . $key . "` = " . $value . "";
                } else {
                  $query_array[] = "`" . $key . "` = '" . $value . "'";
                }
              }
              // var_dump($value);
            }
            $update_query = 'UPDATE `listing` SET ' . implode(' , ', $query_array) . ' WHERE `listing`.`listing_id` = ' . $listing_id;
            try {
              // echo $update_query;
              $insert_result = mysqli_query($connect, $update_query);

              // var_dump($insert_result);
              if ($insert_result) {
                echo '<div class="row"> <div class="col-md-12"> <div class="notification success closeable margin-bottom-30"> <p> Listing is Successfully updated </p> <a class="close" href="#"></a> </div> </div> </div>'; // echo ("<br> email shooting successfull <br>");
              } else {
                echo "Data insertion failed " . "<br>";
              }
            } catch (Exception $e) {
              echo "Data insertion failed " . "<br>";
              // echo 'Message: ' . $e->getMessage() . "<br>";
            }
          }

          $select_query = "SELECT
          *,COUNT(listing_rating_given),AVG(listing_rating_given)
          FROM
            listing
            left join category on listing.listing_category_id = category.category_id
            left join sub_category on listing.listing_sub_category_id = sub_category.sub_category_id
            left join countries on listing.listing_country_id = countries.country_id
            left join states on listing.listing_state_id = states.state_id
            left join cities on listing.listing_city_id = cities.city_id
            left join users_entries on listing.listing_owner_id = $user_id
            left join listing_rating on listing.listing_id = listing_rating.listing_rating_on_product_id where listing.listing_id = $listing_id  group by listing.listing_id";

          // $select_query = "SELECT * FROM `listing` WHERE `listing_id` = $listing_id AND `listing_owner_id` = $user_id";
          $select_result = mysqli_query($connect, $select_query);

          // UPDATE `listing` SET `listing_title` = 'For sale Tuar dala', `listing_category` = 'grainsa', `listing_keyword` = 'dala', `listing_tag` = 'grains dala', `listing_price` = '1000', `listing_sub_category` = 'dala', `listing_description` = 'Fresh Conditiona', `listing_country` = 'indiaa', `listing_pincode` = '220022a', `listing_state` = 'Maharashtraa', `listing_adderess` = 'Mangalwari Complex, Sadar, Nagpura', `listing_city` = 'Nagpura', `listing_image` = 'logo.pnga', `listing_status` = 'Activea', `listing_permission` = 'rejecteda' WHERE `listing`.`listing_id` = 1;
          while ($row = mysqli_fetch_assoc($select_result)) {
            $listing_sub_category_id = $row['listing_sub_category_id'];
            $listing_category_id = $row['listing_category_id'];
            $listing_state_id = $row['listing_state_id'];
            $listing_city_id = $row['listing_city_id'];
            $listing_country_id = $row['listing_country_id'];
            $listing_title = $row['listing_title'];
            $listing_image = $row['listing_image'];
            $array = $row;
        ?>
            <div class="row">
              <div class="col-lg-12">

                <div id="utf_add_listing_part">
                  <form method="POST" action="<?= $_SERVER["REQUEST_URI"]; ?>">

                    <input type="hidden" id="edit_listing_user_id" name="edit_listing_user_id" value="<?= $user_id ?>" />
                    <input type="hidden" id="edit_listing_listing_id" name="edit_listing_listing_id" value="<?= $listing_id ?>" />
                    <input type="hidden" name="updateList" id="updateList" value="updateList" />
                    <input type="hidden" name="user_id" id="user_id" value="<?= $user_id ?>" />
                    <input type="hidden" name="listing_id" id="listing_id" value="<?= $listing_id ?>" />
                    <div class="add_utf_listing_section margin-top-45" validate>
                      <div class="utf_add_listing_part_headline_part">
                        <h3><i class="sl sl-icon-tag"></i> Categories & Tags</h3>
                      </div>

                      <div class="row with-forms">
                        <div class="col-md-6">
                          <label for="listing_title">Listing Title</label>
                          <input type="text" name="listing_title" id="listing_title" value="<?= $row['listing_title'] ?>" />
                        </div>
                        <div class="col-md-6">
                          <label for="">Category</label>
                          <div class="intro-search-field utf-chosen-cat-single">
                            <select class=" selectpicker" name="category_id" style="margin-bottom:0px" id="category_id" value="<?= $row['category_id'] ?>" title="<?= $row['category_name'] ?>" data-selected-text-format="count">

                              <?php
                              $select_category_query = "SELECT * FROM category";
                              try {
                                $select_category_result = 0;
                                if ($connect) {
                                  $select_category_result = mysqli_query($connect, $select_category_query);
                                  if ($select_category_result) {
                                    $select_category_num = mysqli_num_rows($select_category_result);
                                  }
                                }
                              } catch (Exception $e) {
                                $mess = $e->getMessage();
                              }
                              if ($select_category_num > 0) {
                                $sno = 0;
                                //Note : mysqli_fetch_assoc($result) it returns NULL when no data is persent to Select
                                while ($row_for_listing_category = mysqli_fetch_assoc($select_category_result)) {
                                  $listing_category_id = $row_for_listing_category['category_id'];
                                  $listing_category_name = $row_for_listing_category['category_name'];

                                  if ($listing_category_name == $row['category_name']) {
                              ?>
                                    <option name="category_id" value="<?= $row['category_id'] ?>" class="selected" select><?= $row['category_name'] ?></option select>
                                  <?php
                                  } else {
                                  ?><option name="category_id" value="<?= $listing_category_id ?>"><?= $listing_category_name ?></option>
                              <?php
                                  }
                                }
                              }
                              ?>
                              <?php

                              ?>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="row with-forms">
                        <div class="col-md-6">
                          <label for="keywords">Keywords</label>
                          <input type="text" name="keywords" id="keywords" value="<?= $row['listing_keyword'] ?>" />
                        </div>

                        <div class="col-md-6" id="sub-category1">
                          <label for="">Sub-Category</label>
                          <div class="intro-search-field utf-chosen-cat-single">

                            <?php
                            $select_category_sub_query = "SELECT * FROM sub_category where sub_category_id = " . $listing_sub_category_id;
                            try {
                              $select_category_sub_result = 0;
                              if ($connect) {
                                // echo $select_category_sub_query;
                                $select_category_sub_result = mysqli_query($connect, $select_category_sub_query);
                                if ($select_category_sub_result) {
                                  $select_category_sub_num = mysqli_num_rows($select_category_sub_result);
                                }
                              }
                            } catch (Exception $e) {
                              $mess = $e->getMessage();
                            }
                            if ($select_category_sub_num > 0) {
                              while ($row_for_title_listing_sub_category = mysqli_fetch_assoc($select_category_sub_result)) {
                                $sub_category_id = $row_for_title_listing_sub_category['sub_category_id'];
                                $sub_category_name = $row_for_title_listing_sub_category['sub_category_name'];
                            ?>

                                <select class="selectpicker default" style="margin-bottom:0px" name="sub-category" value="<?= $row_for_title_listing_sub_category['sub_category_id'] ?>" title="<?= $row_for_title_listing_sub_category['sub_category_name'] ?>" id="sub-category" data-selected-text-format="count">

                                <?php
                                // echo $sub_category_name;
                              }
                            }

                            $select_category_sub_query = "SELECT * FROM sub_category where sub_category_category_id = " . $row['listing_category_id'];
                            try {
                              $select_category_sub_result = 0;
                              if ($connect) {
                                // echo $select_category_sub_query;
                                $select_category_sub_result = mysqli_query($connect, $select_category_sub_query);
                                if ($select_category_sub_result) {
                                  $select_category_sub_num = mysqli_num_rows($select_category_sub_result);
                                }
                              }
                            } catch (Exception $e) {
                              $mess = $e->getMessage();
                            }
                            if ($select_category_sub_num > 0) {
                              while ($row_for_title_listing_sub_category = mysqli_fetch_assoc($select_category_sub_result)) {
                                ?>
                                  <option name="sub-category" value="<?= $row_for_title_listing_sub_category['sub_category_id'] ?>" select><?= $row_for_title_listing_sub_category['sub_category_name'] ?></option>
                              <?php
                              }
                            }
                              ?>
                                </select>
                          </div>
                        </div>

                      </div>
                      <div class="row with-forms">

                        <div class="col-md-6">
                          <label for="">Price</label>
                          <div class="fm-input pricing-price">
                            <input type="number" name="price" id="price" value="<?= $row['listing_price'] ?>" data-unit="$" />
                            <i class="data-unit">₨</i>
                          </div>
                        </div>
                        <!-- <div class="col-md-6">
                          <label for="">Tags(optional)</label>
                          <div class="intro-search-field utf-chosen-cat-single">
                            <select class="selectpicker default" name="tags" id="tags" data-selected-text-format="count" title="">

                            </select>
                          </div>
                        </div> -->
                      </div>
                      <div class="row with-forms">
                        <div class="col-md-12">
                          <label for="listing_description">Listing Description</label>
                          <input type="text" class="" name="listing_description" id="listing_description" value="<?= $row['listing_description'] ?>" />
                        </div>
                      </div>
                    </div>


                    <div class="add_utf_listing_section margin-top-45">
                      <div class="utf_add_listing_part_headline_part">
                        <h3><i class="sl sl-icon-map"></i> Location</h3>
                      </div>
                      <div class="utf_submit_section">
                        <div class="row with-forms">
                          <div class="col-md-6">
                            <label for="state">State</label>
                            <div class="intro-search-field utf-chosen-cat-single">
                              <select class="selectpicker default" name="state" id="state" data-selected-text-format="count" title="<?= $row['state_name']  ?>" value="<?= $row['state_id']  ?>">
                                <?php $result = mysqli_query($connect, "SELECT * FROM states");
                                while ($row_for_state_title = mysqli_fetch_array($result)) {
                                ?>
                                  <option value=" <?php echo $row_for_state_title["state_id"]; ?>"><?php echo $row_for_state_title["state_name"]; ?></option>
                                <?php
                                } ?>

                              </select>
                            </div>
                          </div>

                          <div class="col-md-6">
                            <label for="pincode">Pincode</label>
                            <input type="text" class="input-text" name="pincode" id="pincode" value="<?= $row['listing_pincode']  ?>" />
                          </div>

                          <div class="col-md-6" id="city1">
                            <label for="city">City</label>
                            <div class="intro-search-field utf-chosen-cat-single">
                              <?php
                              $select_city_query = "SELECT * FROM cities where city_id = " . $row['listing_city_id'];
                              try {
                                $select_city_result = 0;
                                if ($connect) {
                                  // echo $select_city_query;
                                  $select_city_result = mysqli_query($connect, $select_city_query);
                                  if ($select_city_result) {
                                    $select_city_num = mysqli_num_rows($select_city_result);
                                  }
                                }
                              } catch (Exception $e) {
                                $mess = $e->getMessage();
                              }
                              if ($select_city_num > 0) {
                                // echo $select_city_query;
                                while ($row_for_title_listing_city = mysqli_fetch_assoc($select_city_result)) {
                                  $city_id = $row_for_title_listing_city['city_id'];
                                  $city_name = $row_for_title_listing_city['city_name'];
                              ?>
                                  <select class="selectpicker default" name="city" style="margin-bottom:0px" id="city" data-selected-text-format="count" value="<?= $row['city_id']  ?>" title="<?= $row['city_name']  ?>">

                                  <?php
                                  // echo $city_name;
                                }
                              }

                              $select_city_option_query = "SELECT * FROM cities where state_id = " . $row['listing_state_id'];
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
                              }
                                ?>
                                  </select>

                            </div>
                          </div>
                          <div class="col-md-6">
                            <label for="address">Address</label>
                            <input type="text" class="input-text" name="address" id="address" value="<?= $row['listing_adderess']  ?>" />
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
                            <input type="file" onchange="showimg();" name="logo_image" id="logo_image">
                          </div>
                          <div class="">
                            <img style="<?php if ($listing_image != "") {
                                          echo 'display:block';
                                        } else {
                                          echo 'display:none';
                                        } ?>" class="dropzone" name="view_logo_image" id="view_logo_image" src="
                                    <?php if ($listing_image != "") {
                                      echo "../wp-content/uploads/data/" . $listing_image;
                                    } else {
                                      echo '';
                                    } ?>" />
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

        <?php
          }
          // echo "<pre>";
          // var_dump($array);
          // echo "<pre>";
        }

        ?>
        <!-- Form data -->

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
    $(document).ready(function() {
      // $('#sub-category').html('<option value="">Select Category First</option>');
      // $('#state').html('<option value="">Select Country First</option>');
      // $('#city').html('<option value="">Select State First</option>');
      $('#category_id').on('change', function() {
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
            $("#sub-category1").empty();
            $("#sub-category1").append("<label for=''>Sub-Category</label>",
              <?php
              $select_category_sub_query = 'SELECT * FROM sub_category where sub_category_id = ' . $listing_sub_category_id;
              try {
                $select_category_sub_result = 0;
                if ($connect) {
                  // echo $select_category_sub_query;
                  $select_category_sub_result = mysqli_query($connect, $select_category_sub_query);
                  if ($select_category_sub_result) {
                    $select_category_sub_num = mysqli_num_rows($select_category_sub_result);
                  }
                }
              } catch (Exception $e) {
                $mess = $e->getMessage();
              }
              if ($select_category_sub_num > 0) {
                while ($row_for_title_listing_sub_category = mysqli_fetch_assoc($select_category_sub_result)) {
                  $sub_category_id = $row_for_title_listing_sub_category['sub_category_id'];
                  $sub_category_name = $row_for_title_listing_sub_category['sub_category_name'];
              ?> "<div class='intro-search-field utf-chosen-cat-single'><select style='margin-bottom:0px' name='sub-category' value='<?= $row_for_title_listing_sub_category['sub_category_id'] ?>' title='<?= $row_for_title_listing_sub_category['sub_category_name'] ?>' id='sub-category' data-selected-text-format='count'> </select> </div>",

              <?php
                }
              }
              ?>
            );


            // $("#sub-category").removeClass("selectpicker");
            // $("#sub-category").removeClass("default");
            $("#sub-category").html(result);
            console.log(result);
          }
        });
      });
      $('#country').on('change', function() {
        // alert("hello");
        var country_id = this.value;
        $.ajax({
          url: "states-by-country.php",
          type: "POST",
          data: {
            country_id: country_id
          },
          cache: false,
          success: function(result) {

            $("#state1").empty();
            $("#state1").append("<label for=''>State</label>",
              <?php
              $select_state_in_js_query = 'SELECT * FROM states where state_id = ' . $listing_state_id;
              try {
                $select_state_in_js_result = 0;
                if ($connect) {
                  // echo $select_state_in_js_query;
                  $select_state_in_js_result = mysqli_query($connect, $select_state_in_js_query);
                  if ($select_state_in_js_result) {
                    $select_state_in_js_num = mysqli_num_rows($select_state_in_js_result);
                  }
                }
              } catch (Exception $e) {
                $mess = $e->getMessage();
              }
              if ($select_state_in_js_num > 0) {
                while ($row_for_state_in_js = mysqli_fetch_assoc($select_state_in_js_result)) {
                  $state_id = $row_for_state_in_js['state_id'];
                  $state_name = $row_for_state_in_js['state_name'];
              ?> "<div class='intro-search-field utf-chosen-cat-single'><select style='margin-bottom:0px' name='state' value='<?= $row_for_state_in_js['state_id'] ?>' title='<?= $row_for_state_in_js['state_name'] ?>' id='state' data-selected-text-format='count'> </select> </div>",

              <?php
                }
              }
              ?>
            );
            // alert("hello");
            $("#state").html(result);
            $('#city').html('<option value="">Select State First</option>');
            console.log(result);
          }
        });
      });
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
              $select_city_in_js_query = 'SELECT * FROM cities where city_id = ' . $listing_city_id;
              try {
                $select_city_in_js_result = 0;
                if ($connect) {
                  // echo $select_city_in_js_query;
                  $select_city_in_js_result = mysqli_query($connect, $select_city_in_js_query);
                  if ($select_city_in_js_result) {
                    $select_city_in_js_num = mysqli_num_rows($select_city_in_js_result);
                  }
                }
              } catch (Exception $e) {
                $mess = $e->getMessage();
              }
              if ($select_city_in_js_num > 0) {
                while ($row_for_city_in_js = mysqli_fetch_assoc($select_city_in_js_result)) {
                  $city_id = $row_for_city_in_js['city_id'];
                  $city_name = $row_for_city_in_js['city_name'];
              ?> "<div class='intro-search-field utf-chosen-cat-single'><select style='margin-bottom:0px' name='city' value='<?= $row_for_city_in_js['city_id'] ?>' title='<?= $row_for_city_in_js['city_name'] ?>' id='city' data-selected-text-format='count'> </select> </div>",

              <?php
                }
              }
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
  <!-- <script src="http://maps.google.com/maps/api/js?sensor=false&amp;language=en"></script> -->
  <script src="scripts/infobox.min.js"></script>
  <script src="scripts/markerclusterer.js"></script>
  <script src="scripts/maps.js"></script>
  <!-- <script src="scripts/dropzone.js"></script> -->
</body>

<!-- Mirrored from ulisting.utouchdesign.com/ulisting_ltr/dashboard_add_listing.php by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Apr 2023 11:41:50 GMT -->

</html>