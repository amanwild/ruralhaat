<?php include "../validation_of_user.php" ?>

<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from ulisting.utouchdesign.com/ulisting_ltr/dashboard_visitor_review.php by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Apr 2023 11:41:57 GMT -->

<head>
  <meta name="author" content="">
  <meta name="description" content="">
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reviews</title>

  <!-- Favicon -->
  <link rel="shortcut icon" href="images/favicon.png">
  <!-- Style CSS -->
  <link rel="stylesheet" href="css/stylesheet.css">
  <link rel="stylesheet" href="css/mmenu.css">
  <link rel="stylesheet" href="css/perfect-scrollbar.css">
  <link rel="stylesheet" href="css/style.css" id="colors">
  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,600,700,800&amp;display=swap&amp;subset=latin-ext,vietnamese" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700,800" rel="stylesheet" type="text/css">
</head>

<body>

  <?php include "./component/preloader.php" ?>


  <!-- Wrapper -->
  <div id="main_wrapper">
    <?php include "./component/header.php" ?>

    <div class="clearfix"></div>

    <!-- Dashboard -->
    <div id="dashboard">
    <?php include "./component/user_sidebar_navbar.php" ?>
    
    <script>
      var d = document.getElementById("user_dashboard_review");
      d.className += "active";
    </script>
      <div class="utf_dashboard_content">
        <div id="titlebar" class="dashboard_gradient">
          <div class="row">
            <div class="col-md-12">
              <h2>Reviews</h2>
              <nav id="breadcrumbs">
                <ul>
                  <li><a href="index_1.php">Home</a></li>
                  <li><a href="dashboard.php">Dashboard</a></li>
                  <li>Reviews</li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12 col-md-12">
            <div class="utf_dashboard_list_box margin-top-0">
              <div class="sort-by my_sort_by">
                <div class="utf_sort_by_select_item">
                  <select data-placeholder="All Listing Review" class="utf_chosen_select_single">
                    <option>All Listing Review</option>
                    <option>Burger House</option>
                    <option>Sandfields Silver</option>
                    <option>Beer Bar & Restaurant</option>
                    <option>Vintage Italian</option>
                    <option>Modern Apartment</option>
                  </select>
                </div>
              </div>
              <h4><i class="sl sl-icon-star"></i> Visitor Reviews</h4>
              <div id="small-dialog" class="zoom-anim-dialog mfp-hide">
                <div class="small_dialog_header">
                  <h3>Reply to Review</h3>
                </div>
                <div class="utf_message_reply_block margin-top-0">
                  <textarea cols="40" rows="3" placeholder="Your Message..."></textarea>
                  <button class="button">Reply Message</button>
                </div>
              </div>
              <ul>
                <li>
                  <div class="comments utf_listing_reviews dashboard_review_item">
                    <ul>
                      <li>
                        <div class="avatar"><img src="images/client-avatar1.jpg" alt="" /></div>
                        <div class="utf_comment_content">
                          <div class="utf_arrow_comment"></div>
                          <div class="utf_by_comment">John Smith
                            <div class="utf_by_comment-listing">on <a href="#">The Lounge & Bar</a></div>
                            <span class="date"><i class="fa fa-clock-o"></i> Jan 05, 2022 - 8:52 am</span>
                            <div class="utf_star_rating_section" data-rating="5"></div>
                            <a href="#small-dialog" class="rate-review popup-with-zoom-anim">Reply Review <i class="fa fa-reply"></i></a>
                          </div>
                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt.</p>
                        </div>
                      </li>
                    </ul>
                  </div>
                </li>
                <li>
                  <div class="comments utf_listing_reviews dashboard_review_item">
                    <ul>
                      <li>
                        <div class="avatar"><img src="images/client-avatar2.jpg" alt="" /> </div>
                        <div class="utf_comment_content">
                          <div class="utf_arrow_comment"></div>
                          <div class="utf_by_comment">John Smith
                            <div class="utf_by_comment-listing">on <a href="#">The Lounge & Bar</a></div>
                            <span class="date"><i class="fa fa-clock-o"></i> Jan 05, 2022 - 8:52 am</span>
                            <div class="utf_star_rating_section" data-rating="4"></div>
                            <a href="#small-dialog" class="rate-review popup-with-zoom-anim">Reply Review <i class="fa fa-reply"></i></a>
                          </div>
                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt.</p>
                          <div class="review-images utf_gallery_container">
                            <a href="images/review-image-01.jpg" class="utf_gallery"><img src="images/review-image-01.jpg" alt=""></a>
                            <a href="images/review-image-02.jpg" class="utf_gallery"><img src="images/review-image-02.jpg" alt=""></a>
                            <a href="images/review-image-03.jpg" class="utf_gallery"><img src="images/review-image-03.jpg" alt=""></a>
                            <a href="images/review-image-01.jpg" class="utf_gallery"><img src="images/review-image-01.jpg" alt=""></a>
                            <a href="images/review-image-02.jpg" class="utf_gallery"><img src="images/review-image-02.jpg" alt=""></a>
                            <a href="images/review-image-03.jpg" class="utf_gallery"><img src="images/review-image-03.jpg" alt=""></a>
                          </div>
                        </div>
                      </li>
                    </ul>
                  </div>
                </li>
                <li>
                  <div class="comments utf_listing_reviews dashboard_review_item">
                    <ul>
                      <li>
                        <div class="avatar"><img src="images/client-avatar3.jpg" alt="" /></div>
                        <div class="utf_comment_content">
                          <div class="utf_arrow_comment"></div>
                          <div class="utf_by_comment">John Smith
                            <div class="utf_by_comment-listing">on <a href="#">The Lounge & Bar</a></div>
                            <span class="date"><i class="fa fa-clock-o"></i> Jan 05, 2022 - 8:52 am</span>
                            <div class="utf_star_rating_section" data-rating="5"></div>
                            <a href="#small-dialog" class="rate-review popup-with-zoom-anim">Reply Review <i class="fa fa-reply"></i></a>
                          </div>
                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt.</p>
                        </div>
                      </li>
                    </ul>
                  </div>
                </li>
                <li>
                  <div class="comments utf_listing_reviews dashboard_review_item">
                    <ul>
                      <li>
                        <div class="avatar"><img src="images/client-avatar1.jpg" alt="" /></div>
                        <div class="utf_comment_content">
                          <div class="utf_arrow_comment"></div>
                          <div class="utf_by_comment">John Smith
                            <div class="utf_by_comment-listing">on <a href="#">The Lounge & Bar</a></div>
                            <span class="date"><i class="fa fa-clock-o"></i> Jan 05, 2022 - 8:52 am</span>
                            <div class="utf_star_rating_section" data-rating="5"></div>
                            <a href="#small-dialog" class="rate-review popup-with-zoom-anim">Reply Review <i class="fa fa-reply"></i></a>
                          </div>
                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt.</p>
                        </div>
                      </li>
                    </ul>
                  </div>
                </li>
              </ul>
            </div>
            <div class="clearfix"></div>
            <div class="utf_pagination_container_part margin-top-30 margin-bottom-30">
              <nav class="pagination">
                <ul>
                  <li><a href="#"><i class="sl sl-icon-arrow-left"></i></a></li>
                  <li><a href="#" class="current-page">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">4</a></li>
                  <li><a href="#"><i class="sl sl-icon-arrow-right"></i></a></li>
                </ul>
              </nav>
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
  <script src="scripts/magnific-popup.min.js"></script>
  <script src="scripts/jquery-ui.min.js"></script>
  <script src="scripts/mmenu.js"></script>
  <script src="scripts/tooltips.min.js"></script>
  <script src="scripts/color_switcher.js"></script>
  <script src="scripts/jquery_custom.js"></script>
  <script>
    (function($) {
      try {
        var jscr1 = $('.js-scrollbar');
        if (jscr1[0]) {
          const ps1 = new PerfectScrollbar('.js-scrollbar');

        }
      } catch (error) {
        console.log(error);
      }
    })(jQuery);
  </script>
  <!-- Style Switcher -->
  <div id="color_switcher_preview">
    <h2>Choose Your Color  </h2>
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
</body>

<!-- Mirrored from ulisting.utouchdesign.com/ulisting_ltr/dashboard_visitor_review.php by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Apr 2023 11:41:57 GMT -->

</html>