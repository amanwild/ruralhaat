<?php include "../validation_of_session.php" ?>

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


<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
  <title>success Stories &#8211; </title>
  <?php include "../theme/head_data.php" ?>
</head>

<body data-rsssl=1 class="page-template page-template-template-all-categories page-template-template-all-categories-php page page-id-27 theme-classiera woocommerce-no-js single-author elementor-default elementor-kit-1989">
  <?php include "../navbar/index.php" ?>
  <?php include "../searchbar_section/index.php" ?>

  <section class="classiera-premium-ads-v5 border-bottom section-pad-80 bg-white">
    <div class="section-heading-v5">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-8 center-block">
            <h3 class="text-capitalize">Success Stories</h3>
            <p>Haats, or rural marketplaces, constitute a significant part of rural life in our country. More than being a place to buy necessary items, they also serve as a community meeting place.</p>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div style="overflow: hidden; padding-top:10px;">
            <div style="margin-bottom: 40px;">
              <div id="owl-demo" class="owl-carousel premium-carousel-v5" data-car-length="4" data-items="4" data-loop="true" data-nav="false" data-autoplay="true" data-autoplay-timeout="3000" data-dots="false" data-auto-width="false" data-auto-height="true" data-right="false" data-responsive-small="1" data-autoplay-hover="true" data-responsive-medium="2" data-responsive-large="4" data-responsive-xlarge="4" data-margin="30">


                <?php

                $select_listing_query = "SELECT * FROM `success_story`";
                // echo $select_listing_query;

                try {
                  // echo $select_listing_query;
                  $select_listing_result = 0;
                  if ($connect) {
                    $select_listing_result = mysqli_query($connect, $select_listing_query);
                    if ($select_listing_result) {
                      $select_listing_num = mysqli_num_rows($select_listing_result);
                    }
                  }
                } catch (Exception $e) {
                  $mess = $e->getMessage();
                }
                if ($select_listing_num > 0) {
                  $sno = 0;
                  //Note : mysqli_fetch_assoc($result) it returns NULL when no data is persent to Select
                  while ($row = mysqli_fetch_assoc($select_listing_result)) {
                ?>
                    <div class="classiera-box-div-v5 item match-height">
                      <figure>
                        <div class="premium-img">
                          <img class="img-responsive" src="../wp-content/uploads/data/<?= $row['success_story_image'] ?>" alt="">
                          <span class="hover-posts">
                            <a href="#">View Success Stories</a>
                          </span>
                        </div>
                        <figcaption>
                          <h5><a href="#"><?= $row['success_story_title'] ?></a></h5>
                        </figcaption>
                      </figure>
                    </div>

                    <!-- <div class="classiera-box-div-v5 item match-height">
                      <figure>
                        <div class="premium-img">
                          <img class="img-responsive" src="../wp-content/uploads/2018/11/handcraft.jpg" alt="">
                          <span class="hover-posts">
                            <a href="../2018-honda-accord-for-sale/index.html">View Success Stories</a>
                          </span>
                        </div>
                        <figcaption>
                          <h5><a href="../2018-honda-accord-for-sale/index.html">Rural Handcraft</a></h5>
                        </figcaption>
                      </figure>
                    </div> -->
                <?php
                  }
                }
                ?>


              </div>
            </div>
            <div class="navText">
              <a class="prev btn btn-primary radius outline btn-style-five">
                <i class="icon-left zmdi zmdi-arrow-back"></i>
                Previous </a>
              <a class="next btn btn-primary radius outline btn-style-five">
                Next <i class="icon-right zmdi zmdi-arrow-forward"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php include "../footer/section_footer.php" ?>
  <?php include "../footer/index.php" ?>

  <?php include "../theme/body_data.php" ?>

</body>

<!-- Mirrored from demo.joinwebs.com/classiera/plum/categories/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 12 Apr 2023 08:26:08 GMT -->

</html>