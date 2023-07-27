<?php include "../validation_of_login.php" ?>
<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" lang="en-US">
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" lang="en-US">
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html lang="en-US">
<!--<![endif]-->


<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
  <title>Listing Owner</title>

<?php include "../theme/head_data.php";?>
    <style>
    /* Import Google font - Poppins */
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");

    .rating-box .stars {
      display: flex;
      align-items: center;
    }
  </style>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />

</head>

<body data-rsssl=1 class="archive author author-admin author-1 theme-classiera woocommerce-no-js single-author elementor-default elementor-kit-1989">
  <header>
    <?php include "../navbar/index.php" ?>
  </header>
  <?php
  if (isset($_GET['listing_owner_id']) && $_GET['listing_owner_id'] != '') {
    $listing_owner_id = $_GET['listing_owner_id'];

    $select_listing_owner_query = "SELECT * FROM users_entries left join countries on users_entries.user_country_id = countries.country_id left join states on users_entries.user_state_id = states.state_id left join cities on users_entries.user_city_id = cities.city_id  WHERE users_entries.user_id =$listing_owner_id";
    // echo$fname,$lname;
    try {
      // echo$select_listing_owner_query;
      $select_listing_owner_result = mysqli_query($connect, $select_listing_owner_query);
      $listing_owner_num  = mysqli_num_rows($select_listing_owner_result);
    } catch (Exception $e) {
      $mess = $e->getMessage();
    }
    if ($listing_owner_num > 0) {
      $array = [];
      $sno = 0;
      while ($row_listing_owner = mysqli_fetch_assoc($select_listing_owner_result)) {
        $listing_owner_phone = $row_listing_owner['user_phone'];
        $listing_owner_email = $row_listing_owner['user_email'];
        $listing_owner_first_name = $row_listing_owner['user_first_name'];
        $listing_owner_last_name = $row_listing_owner['user_last_name'];
        $listing_owner_facebook_link = $row_listing_owner['user_facebook_link'];
        $listing_owner_google_link = $row_listing_owner['user_google_link'];
        $listing_owner_instagram_link = $row_listing_owner['user_instagram_link'];
        $listing_owner_address = $row_listing_owner['user_address'];
        $listing_owner_age = $row_listing_owner['user_age'];
        $listing_owner_city = $row_listing_owner['city_name'];
        $listing_owner_state = $row_listing_owner['state_name'];
        $listing_owner_timestamp = $row_listing_owner['user_timestamp'];
        $listing_owner_username = $row_listing_owner['user_username'];
        $listing_owner_image = $row_listing_owner['user_image'];
        $array = $row_listing_owner;
      }
    }
    $select_listing_query = "SELECT
      *,COUNT(listing_rating_given),COUNT(listing_id),AVG(listing_rating_given)
    FROM
      listing
      left join category on listing.listing_category_id = category.category_id
      left join sub_category on listing.listing_sub_category_id = sub_category.sub_category_id
      left join countries on listing.listing_country_id = countries.country_id
      left join states on listing.listing_state_id = states.state_id
      left join cities on listing.listing_city_id = cities.city_id
      left join users_entries on listing.listing_owner_id = users_entries.user_id
      left join listing_rating on listing.listing_id = listing_rating.listing_rating_on_product_id  
    WHERE listing.listing_owner_id = $listing_owner_id and ( listing.listing_status LIKE 'Active')  group by listing.listing_id";
    // echo$fname,$lname;
    try {
      $select_listing_result = mysqli_query($connect, $select_listing_query);
      $listing_num  = mysqli_num_rows($select_listing_result);
    } catch (Exception $e) {
      $mess = $e->getMessage();
    }
    // echo"<pre>";
    // var_dump($array);
    // echo"<pre>";

    try {
      $update_listing_view_count = mysqli_query($connect, "UPDATE `users_entries` SET `user_view_count` = `user_view_count`+1 WHERE `users_entries`.`user_id` = $listing_owner_id");

      if (isset($_SESSION['user_id'])) {
        $update_view_count = mysqli_query($connect, "INSERT INTO `views_count` (`views_count_of`, `views_count_of_id`, `views_count_timestamp`,`views_count_by_id`, `views_count_by`) VALUES ('ac', '$listing_owner_id', current_timestamp(),'" . $_SESSION['user_id'] . "', 'user')");
      } else if (isset($_SESSION['enquery_id'])) {
        $update_view_count = mysqli_query($connect, "INSERT INTO `views_count` (`views_count_of`, `views_count_of_id`, `views_count_timestamp`,`views_count_by_id`, `views_count_by`) VALUES ('ac', '$listing_owner_id', current_timestamp(),'" . $_SESSION['enquery_id'] . "', 'enquery')");
      } else {
        $update_view_count = mysqli_query($connect, "INSERT INTO `views_count` (`views_count_of`, `views_count_of_id`, `views_count_timestamp`,`views_count_by_id`, `views_count_by`) VALUES ('ac', '$listing_owner_id', current_timestamp(),'0', 'stranger')");
      }
    } catch (Exception $e) {
      $mess = $e->getMessage();
    }

  ?>

    <?php
    if (isset($_POST['email_interaction'])) {
      $email_interaction = $_POST['email_interaction'];
      $email_interaction_query = "INSERT INTO `user_interaction` (`interaction_id`, `interaction_by_user_id`, `interaction_on_user_id`, `interaction_timestamp`, `interaction_way`, `interaction_on_listing_id`, `interaction_type`) VALUES (NULL, '" . $_SESSION['user_id'] . "', '$listing_owner_id', current_timestamp(), 'email', '0', 'visit')";
      // echo$fname,$lname;
      try {
        $email_interaction_result = mysqli_query($connect, $email_interaction_query);
      } catch (Exception $e) {
        $mess = $e->getMessage();
      }
      // echo"<pre>";
      // var_dump($array);
      // echo"<pre>";
    }
    ?>

    <section class="author-box">
      <div class="container border author-box-bg">
        <div class="row">
          <div class="col-lg-12">
            <div class="row no-gutter removeMargin border-bottom author-first-row">
              <div class="col-lg-7 col-sm-7">
                <div class="author-info">
                  <div class="media">
                    <div class="media-left">
                      <img class="media-object" src='  
                    <?php if (isset($listing_owner_image) && $listing_owner_image != "") {
                      echo "../wp-content/uploads/data/" . $listing_owner_image;
                    } else {
                      echo "https://secure.gravatar.com/avatar/7e387a2a191c50af53f6bff43ef1f5f7?s=96&amp;d=mm&amp;r=g" . $listing_owner_image;
                    }
                    ?>' alt="admin">
                    </div><!--media-left-->
                    <div class="media-body">
                      <h5 class="media-heading text-uppercase">
                        <?= $listing_owner_first_name ?> <?= $listing_owner_last_name ?> <span class="small classiera_verified">Verified</span><i class="far fa-check-circle classiera_verified" data-toggle="tooltip" data-placement="top" title="Verified"></i> </h5>
                      <p class="member_since">
                        Member Since&nbsp;
                        <?= $listing_owner_timestamp ?> </p>
                      <!-- <span class="offline"><i class="fas fa-circle"></i>Offline</span> -->
                    </div><!--media-body-->
                  </div><!--media-->
                </div><!--author-info-->
              </div><!--col-lg-7-->
              <div class="col-lg-5 col-sm-5">
                <div class="author-social">
                  <h5 class="text-uppercase">Social profile Links</h5>
                  <div class="author-social-icons">
                    <ul class="list-unstyled list-inline">
                      <?php if (isset($listing_owner_facebook_link) && $listing_owner_facebook_link != "") {
                      ?>
                        <form enctype="multipart/form-data"  method="POST" id="facebook_interaction" style="display:inline-block;cursor:pointer;">
                          <button class="btn" name="facebook_interaction" value="true" type="submit">
                            <li>
                              <i class="fab fa-facebook-f"></i>
                            </li>
                          </button>
                          <input type="hidden" name="facebook_url" value="<?= $listing_owner_facebook_link ?>" id="facebook_url" />
                        </form>
                      <?php
                      }
                      ?>
                      <?php if (isset($listing_owner_twitter_link) && $listing_owner_twitter_link != "") {
                      ?>
                        <form enctype="multipart/form-data"  method="POST" style="display:inline-block">
                          <botton type="submit">
                            <li>
                              <a href="<?= $listing_owner_twitter_link ?>" target="_blank">
                                <i class="fab fa-twitter"></i>
                              </a>
                            </li>
                            <input type="hidden" name="twitter_interation">
                          </botton>
                        </form>
                      <?php
                      }
                      ?>
                      <?php if (isset($listing_owner_google_link) && $listing_owner_google_link != "") {
                      ?>
                        <form enctype="multipart/form-data"  method="POST" id="google_interaction" style="display:inline-block;cursor:pointer;">
                          <button class="btn" name="google_interaction" value="true" type="submit">
                            <li>
                              <i class="fab fa-google-plus-g"></i>
                            </li>
                          </button>
                          <input type="hidden" name="google_url" value="<?= $listing_owner_google_link ?>" id="google_url" />
                        </form>

                      <?php
                      }
                      ?>
                      <?php if (isset($listing_owner_youtube_link) && $listing_owner_youtube_link != "") {
                      ?>
                        <form enctype="multipart/form-data"  method="POST" action="<?= $listing_owner_youtube_link ?>" id="youtube_interaction" style="display:inline-block;cursor:pointer;">
                          <button class="btn" name="youtube_interaction" value="true" type="submit">
                            <li>
                              <i class="fab fa-youtube"></i>
                            </li><?= $listing_owner_youtube_link ?>
                          </button>
                        </form>

                      <?php
                      }
                      ?>
                      <?php if (isset($listing_owner_email) && $listing_owner_email != "") {
                      ?>
                        <form enctype="multipart/form-data"  method="POST" action="mailto:<?= $listing_owner_email ?>" id="email_interaction" style="display:inline-block;cursor:pointer;">
                          <button class="btn" name="email_interaction" value="true" type="submit">
                            <li type="submit">
                              <i class="fas fa-envelope"></i>
                            </li>
                          </button>
                          <input type="hidden" name="interaction_on_user_id" value="<?= $listing_owner_id ?>" id="interaction_on_user_id" />
                        </form>
                      <?php
                      }
                      ?>
                    </ul><!--list-unstyled-->
                  </div><!--author-social-icons-->
                </div><!--author-social-->
              </div><!--col-lg-5 col-sm-5-->
            </div><!--row-->
            <div class="row no-gutter removeMargin author-second-row">

              <?php if (isset($listing_owner_about) && $listing_owner_about != "") {
              ?>
                <div class="col-lg-7">
                  <div class="author-desc">
                    <p>
                    <p> <?= $listing_owner_about ?> </p>
                    </p>
                  </div><!--author-desc-->
                </div><!--col-lg-7-->

              <?php
              }
              ?>

              <div class="col-lg-5">
                <div class="author-contact-details">
                  <h5 class="text-uppercase">Contact Details</h5>
                  <div class="contact-detail-row">
                    <div class="contact-detail-col">
                      <span>

                        <?php if (isset($listing_owner_phone) && $listing_owner_phone != "") {
                        ?>
                         <form enctype="multipart/form-data"  method="POST" action="tel:<?= $listing_owner_phone ?>" id="tel_interaction" style="display:inline-block;cursor:pointer;">
                          <button class="btn" name="tel_interaction" value="true" type="submit">
                            <span>
                            <i class="fas fa-phone-square"></i>
                            </span><?= $listing_owner_phone ?>
                          </button>
                        </form>


                        <?php
                        }
                        ?>
                      </span>
                    </div><!--contact-detail-col-->

                    <?php if (isset($listing_owner_email) && $listing_owner_email != "") {
                    ?>
                      <div class="contact-detail-col">



                      <form enctype="multipart/form-data"  method="POST" action="mailto:<?= $listing_owner_email ?>" id="email_interaction2" style="display:inline-block;cursor:pointer;">
                          <button class="btn" name="email_interaction" value="true" type="submit">
                          <span>
                          <i class="fas fa-envelope"></i>
                         
                            <?= $listing_owner_email ?> 
                        </span>
                          </button>
                        </form>





                      
                      </div><!--contact-detail-col-->
                    <?php
                    }
                    ?>
                  </div><!--contact-detail-row-->


                </div><!--author-contact-details-->
              </div><!--col-lg-5-->
            </div><!--row no-gutter removeMargin author-second-row-->
          </div><!--col-lg-12-->
        </div><!--row-->
      </div><!--container border author-box-bg-->
    </section><!--author-box-->

    <section class="inner-page-content border-bottom">
      <section class="classiera-advertisement advertisement-v1">
        <div class="tab-divs section-light-bg">
          <div class="view-head">
            <div class="container">
              <div class="row">
                <div class="col-lg-6 col-sm-6 col-xs-6">
                  <div class="total-post">
                    <p>Total ads:
                      <span>
                        <?php $select_listing_count_query = "SELECT
                     COUNT(listing_id)
                    FROM
                      listing
                    WHERE listing_owner_id = $listing_owner_id ";
                        // echo$fname,$lname;
                        try {
                          $select_listing_count_result = mysqli_query($connect, $select_listing_count_query);
                          $listing_num  = mysqli_num_rows($select_listing_count_result);
                        } catch (Exception $e) {
                          $mess = $e->getMessage();
                        }
                        if ($listing_num > 0) {
                          while ($row_for_listing_count = mysqli_fetch_assoc($select_listing_count_result)) {
                            echo    $row_for_listing_count['COUNT(listing_id)'];
                          }
                        }
                        ?>
                        Ads Posted </span>
                    </p>
                  </div><!--total-post-->
                </div><!--col-lg-6 col-sm-6 col-xs-6-->
                <div class="col-lg-6 col-sm-6 col-xs-6">
                  <div class="view-as text-right flip">
                    <span>View As:</span>
                    <a id="grid" class="grid btn btn-sm sharp outline active" href="#"><i class="fas fa-th"></i></a>
                    <a id="list" class="list btn btn-sm sharp outline " href="#"><i class="fas fa-bars"></i></a>
                  </div><!--view-as text-right flip-->
                </div><!--col-lg-6 col-sm-6 col-xs-6-->
              </div><!--row-->
            </div><!--container-->
          </div><!--view-head-->
          <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade in active" id="all">
              <div class="container">
                <div class="row">


                  <?php

                  if ($listing_num > 0) {
                    $sno = 0;
                    //Note : mysqli_fetch_assoc($result) it returns NULL when no data is persent to Select
                    // INSERT INTO `listing` (`listing_id`, `listing_title`, `listing_category`, `listing_keyword`, `listing_tag`, `listing_price`, `listing_sub_category`, `listing_description`, `listing_country`, `listing_pincode`, `listing_state`, `listing_adderess`, `listing_city`, `listing_image`, `listing_since`, `listing_status`, `listing_permission`, `listing_owner_id`, `is_listing_verified_by_admin`) VALUES (NULL, '5', 's', 's', 's', '5', 's', 's', 's', 'ss', 's', 's', 's', 's', current_timestamp(), 't', 'Pending', '4', '0');
                    while ($row_for_listing = mysqli_fetch_assoc($select_listing_result)) {

                      include "./post_cards.php";
                    }
                  }
                  ?>


                </div><!--row-->
              </div><!--container-->
            </div><!--tabpanel-->
          </div><!--tab-content-->
        </div><!--tab-divs section-light-bg-->
      </section><!--classiera-advertisement advertisement-v1-->
    </section><!--inner-page-content-->
    <!-- Company Section Start-->
    <!-- Company Section End-->
  <?php
  }
  ?>
  <?php include "../footer/section_footer.php" ?>
  <?php include "../footer/index.php" ?>
  <?php include "../theme/body_data.php";?>


<!-- Mirrored from demo.joinwebs.com/classiera/plum/author/admin/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 12 Apr 2023 08:32:18 GMT -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<script type="text/javascript">
  $(document).ready(function() {
    var interaction_on_user_id = $("#interaction_on_user_id").val(); 


    $("#email_interaction").submit(function(e) {
      var interaction_type = "visit"; 
      var interaction_way = "email"; 
      jQuery.ajax({
        type: "POST", 
        url: "./insert_interaction.php", 
        dataType: "text", 
        data: {
          interaction_on_user_id: interaction_on_user_id,
          interaction_type: interaction_type,
          interaction_way: interaction_way,

        },
        success: function(response) {
          console.log(response);

        },
        error: function(xhr, ajaxOptions, thrownError) {}
      });
    });
    $("#email_interaction2").submit(function(e) {
      var interaction_type = "visit"; 
      var interaction_way = "email"; 
      jQuery.ajax({
        type: "POST", 
        url: "./insert_interaction.php", 
        dataType: "text", 
        data: {
          interaction_on_user_id: interaction_on_user_id,
          interaction_type: interaction_type,
          interaction_way: interaction_way,

        },
        success: function(response) {
          console.log(response);

        },
        error: function(xhr, ajaxOptions, thrownError) {}
      });
    });
    $("#google_interaction").submit(function(e) {
      // alert('hello');
      var google_url = $("#google_url").val(); 
      var interaction_type = "visit"; 
      var interaction_way = "google"; 

      jQuery.ajax({
        type: "POST", // Post / Get method
        url: "./insert_interaction.php", //Where form data is sent on submission
        dataType: "text", // Data type, HTML, json etc.
        data: {
          interaction_on_user_id: interaction_on_user_id,
          interaction_type: interaction_type,
          interaction_way: interaction_way,

        },
        success: function(response) {
          console.log(response);
          window.location.replace(google_url);

        },
        error: function(xhr, ajaxOptions, thrownError) {}
      });
    });
    $("#facebook_interaction").submit(function(e) {
      // alert('hello');
      var facebook_url = $("#facebook_url").val(); 
      var interaction_type = "visit"; 
      var interaction_way = "facebook"; 

      jQuery.ajax({
        type: "POST", // Post / Get method
        url: "./insert_interaction.php", //Where form data is sent on submission
        dataType: "text", // Data type, HTML, json etc.
        data: {
          interaction_on_user_id: interaction_on_user_id,
          interaction_type: interaction_type,
          interaction_way: interaction_way,

        },
        success: function(response) {
          console.log(response);
          window.location.replace(facebook_url);

        },
        error: function(xhr, ajaxOptions, thrownError) {}
      });
    });
    $("#tel_interaction").submit(function(e) {
      // alert('hello');
      // var facebook_url = $("#facebook_url").val(); 
      var interaction_type = "visit"; 
      var interaction_way = "tel"; 

      jQuery.ajax({
        type: "POST", // Post / Get method
        url: "./insert_interaction.php", //Where form data is sent on submission
        dataType: "text", // Data type, HTML, json etc.
        data: {
          interaction_on_user_id: interaction_on_user_id,
          interaction_type: interaction_type,
          interaction_way: interaction_way,

        },
        success: function(response) {
          console.log(response);
          // window.location.replace(facebook_url);

        },
        error: function(xhr, ajaxOptions, thrownError) {}
      });
    });
  });
</script></body>

</html>