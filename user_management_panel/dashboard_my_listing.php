<?php include "../validation_of_user_manager.php" ?>
<?php include "../service/unlink_image.php" ?>

<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from ulisting.utouchdesign.com/ulisting_ltr/dashboard_my_listing.php by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Apr 2023 11:41:50 GMT -->

<head>
  <meta name="author" content="">
  <meta name="description" content="">
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Listing</title>

  <!-- Favicon -->
  <link rel="shortcut icon" href="../wp-content/uploads/data/favicon.png" />
  <!-- Style CSS -->
  <link rel="stylesheet" href="../css/stylesheet.css">
  <link rel="stylesheet" href="../css/mmenu.css">
  <link rel="stylesheet" href="../css/perfect-scrollbar.css">
  <link rel="stylesheet" href="../css/style.css" id="colors">
  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,600,700,800&amp;display=swap&amp;subset=latin-ext,vietnamese" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700,800" rel="stylesheet" type="text/css">
</head>

<body>


  <?php include "./component/preloader.php" ?>
  <?php include "./service/pick_ago_time.php" ?>


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
              <h2>User Listings</h2>
              <nav id="breadcrumbs">
                <ul>
                  <li><a href="index_1.php">Home</a></li>
                  <li><a href="dashboard.php">Dashboard</a></li>
                  <li>User Listings</li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
        <?php
        if (isset($_POST["delete_listing"]) && ($_SERVER["REQUEST_METHOD"] == "POST")) {
          $listing_id = $_POST["listing_id"];
          unlink_img('listing_image' ,'listing','listing_id', $listing_id, $connect);

          $delete_query = "DELETE FROM `listing` WHERE `listing`.`listing_id` = $listing_id";
          $delete_result = mysqli_query($connect, $delete_query);
          if ($delete_result) {
            echo '<div class="row"> <div class="col-md-12"> <div class="notification success closeable margin-bottom-30"> <p> Listing Deleted Successfully!!! </p> <a class="close" href="#"></a> </div> </div> </div>'; // echo ("<br> email shooting successfull <br>");

          }
        } ?>

        <div class="row">
          <div class="col-lg-12 col-md-12">
            <div class="utf_dashboard_list_box margin-top-0">
              <div class="sort-by my_sort_by">
                <div class="utf_sort_by_select_item">
                  <select data-placeholder="All Listing " onchange="filter_change()" name="filter" id="filter" class="utf_chosen_select_single">
                    <option class="hidden">
                      <?php
                      if (isset($_GET['filter']) && $_GET['filter'] != '') {
                        $filter = $_GET['filter'];
                        echo $filter . " Listing";
                      }
                      ?> </option>
                    <a href="dashboard_my_listing.php?filter=Default">
                      <option>All Listing</option>
                    </a>
                    <a href="dashboard_my_listing.php?filter=Active">
                      <option>Active Listing</option>
                    </a>
                    <a href="dashboard_my_listing.php?filter=Pending">
                      <option>Pending Listing</option>
                    </a>
                    <a href="dashboard_my_listing.php?filter=Expired">
                      <option>Expired Listing</option>
                    </a>
                  </select>
                </div>
              </div>
              <script>
                function filter_change() {
                  var filter = document.getElementById('filter');
                  var filter_value = (filter.value).slice(0, -8);

                  // alert(filter_value);
                  if (filter_value != "All") {
                    window.location.href = 'dashboard_my_listing.php?filter=' + filter_value;
                  } else {
                    window.location.href = 'dashboard_my_listing.php';
                  }
                }
              </script>

              <h4><i class="sl sl-icon-list"></i> My Listings</h4>
              <ul class="paginationTable">
                <?php
                $filter = "";
                if (isset($_GET['filter'])) {
                  $filter = $_GET['filter'];
                }


                $slave_id = $_SESSION['slave_id'];

                $select_query = "SELECT * FROM `users_entries` WHERE `user_id` = $slave_id";
                $select_result = mysqli_query($connect, $select_query);
                // INSERT INTO `users_entries` (`user_id`, `user_username`, `user_password`, `user_email`, `user_phone`, `user_timestamp`, `is_verified_email`, `is_verified_admin`, `user_type`, `user_vcode`, `user_otp`, `user_otp_created`, `user_otp_is_expired`, `user_first_name`, `user_last_name`) VALUES (NULL, 'dds', '', '', '', current_timestamp(), '0', '0', '', '', '', '', '', '', '');
                while ($row = mysqli_fetch_assoc($select_result)) {
                  $slave_id = $row['user_id'];
                  $user_username = $row['user_username'];
                  $user_email = $row['user_email'];
                  $user_phone = $row['user_phone'];
                }
                // echo $slave_id;

                $select_query = "SELECT * FROM `listing` WHERE `listing_owner_id` = $slave_id";
                if ($filter != "") {
                  $select_query = "SELECT * FROM `listing` WHERE `listing_owner_id` = $slave_id AND `listing_status` LIKE '$filter'";
                }
                $select_result = mysqli_query($connect, $select_query);
                $num_for_slave  = mysqli_num_rows($select_result);
                if ($num_for_slave) {



                  while ($row = mysqli_fetch_assoc($select_result)) {
                    $listing_id = $row['listing_id'];
                    $listing_title = $row['listing_title'];
                    $listing_category_id = $row['listing_category_id'];
                    $listing_keyword = $row['listing_keyword'];
                    $listing_tag = $row['listing_tag'];
                    $listing_price = $row['listing_price'];
                    $listing_sub_category_id = $row['listing_sub_category_id'];
                    $listing_description = $row['listing_description'];
                    $listing_country_id = $row['listing_country_id'];
                    $listing_pincode = $row['listing_pincode'];
                    $listing_state_id = $row['listing_state_id'];
                    $listing_adderess = $row['listing_adderess'];
                    $listing_city_id = $row['listing_city_id'];
                    $listing_image = $row['listing_image'];
                    $listing_since = $row['listing_since'];
                    $listing_status = $row['listing_status'];
                    $listing_permission = $row['listing_permission'];
                    $listing_since_ago_formate =  time_elapsed_string($listing_since);


                    $select_rating_query = "SELECT * FROM `listing_rating` WHERE `listing_rating_by_user_id` = $slave_id AND `listing_rating_on_product_id` = $listing_id";
                    $avgresult = mysqli_query($connect, $select_rating_query);
                    $fetchAverage = mysqli_fetch_array($avgresult);
                    $listing_rating = $fetchAverage['listing_rating_given'];
                    if ($listing_rating <= 0) {
                      $listing_rating = "Not ratings given.";
                    }


                    $select_listing_category_query = "SELECT * FROM category WHERE category_id = $listing_category_id";
                    try {
                      $select_listing_category_result = 0;
                      if ($connect) {
                        $select_listing_category_result = mysqli_query($connect, $select_listing_category_query);
                        if ($select_listing_category_result) {
                          $select_listing_category_num = mysqli_num_rows($select_listing_category_result);
                        }
                      }
                    } catch (Exception $e) {
                      $mess = $e->getMessage();
                    }
                    if ($select_listing_category_num > 0) {
                      $sno = 0;
                      //Note : mysqli_fetch_assoc($result) it returns NULL when no data is persent to Select
                      while ($row_for_listing_category = mysqli_fetch_assoc($select_listing_category_result)) {
                        $listing_category_name = $row_for_listing_category['category_name'];
                        $listing_category_color = $row_for_listing_category['category_color'];
                        $listing_category_image = $row_for_listing_category['category_image'];
                      }
                    }
                    // echo $listing_rating;

                ?>
                    <li class="tableItem utf_approved_booking_listing">
                      <div class="utf_list_box_listing_item ">
                        <div class="utf_list_box_listing_item-img"><a href="#"><img src="../wp-content/uploads/data/<?= $listing_image ?>" alt=""></a></div>
                        <div class="utf_list_box_listing_item_content">
                          <div class="inner row">
                            <div class=" col-md-6" style="">
                              <h3><?= $listing_title ?> <span class="utf_booking_listing_status" style="    background-color:
                            <?php if ($listing_status == 'Active') {
                              echo "#64bc36";
                            }
                            if ($listing_status == 'Pending') {
                              echo "#61b2db";
                            }
                            if ($listing_status == 'Expired') {
                              echo "#ee3535";
                            } ?> ;border-radius: 4px; line-height: 20px; font-weight: 500; font-size: 12px; color: #fff; font-style: normal;  position: relative; top: 0px; display: inline-block; vertical-align: top;padding-right:5px;padding-left:5px; "><?= $listing_status ?></span></h3>
                              <span><i class="fa fa-folder"></i> Category : <?= $listing_category_name ?> </span>
                              <span><i class="fa fa-map-marker"></i><?= $listing_adderess ?></span>
                              <span><i class="fa fa-phone"></i> <?= $user_phone ?></span>
                              <span><i class="fa fa-file"></i> Description : <?= $listing_description ?></span>
                              <span class="utf_booking_listing_status" style="    background-color:#ee3535;border-radius: 4px; line-height: 20px; font-weight: 500; font-size: 20px; color: #fff; font-style: normal;  position: relative; top: 0px; display: inline-block; vertical-align: top;padding-right:5px;padding-left:5px;padding-top:5px;padding-bottom:5px; "><?= $listing_price ?>/-</span>
                              <div class="utf_star_rating_section" data-rating="<?= $listing_rating ?>">
                                <div class="utf_counter_star_rating">(<?= $listing_rating ?>)</div>
                              </div>
                            </div>
                            <?php if (($_SESSION['user_type'] == 'admin' || $_SESSION['user_type'] == 'user_manager') || $_SESSION['user_type'] != 'inspector') { ?>
                              <div class=" col-md-6 text-right" style="float:right;margin-left:auto;">

                                <form enctype="multipart/form-data"  method="GET" style="display:inline-block" action="./dashboard_edit_listing.php">
                                  <input type="hidden" id="edit_listing_listing_id" name="edit_listing_listing_id" value="<?= $listing_id ?>" />
                                  <button type="submit" id="<?= $listing_id ?>" class="edit button gray"><i class="fa fa-pencil"></i> Edit</button>


                                </form>
                                <form enctype="multipart/form-data"  onsubmit="return confirm('Are you sure? you want to Delete Listing!');" method="POST" style="display:inline-block" action="<?= $_SERVER["REQUEST_URI"]; ?>">
                                  <input type="hidden" id="listing_id" name="listing_id" value="<?= $listing_id ?>" />
                                  <input type="hidden" id="delete_listing" name="delete_listing" value="true" />

                                  <button type="submit" id="d<?= $listing_id ?>" class="delete button gray"><i class="fa fa-trash-o"></i> Delete</button>

                                </form>

                              </div>

                            <?php } ?>




                          </div>

                        </div>
                      </div>
                      <!-- <div class="buttons-to-right">
                      <a href="#" class="button gray"><i class="fa fa-pencil"></i> Edit</a>
                      <a href="#" class="button gray"><i class="fa fa-trash-o"></i> Delete</a>
                    </div> -->
                    </li>
                    <!-- <li class="utf_approved_booking_listing">
                    <div class="utf_list_box_listing_item bookings">
                      <div class="utf_list_box_listing_item-img"><img src="images/client-avatar1.jpg" alt=""></div>
                      <div class="utf_list_box_listing_item_content">
                        <div class="inner">
                          <h3>Francis Burton <span class="utf_booking_listing_status">Approved</span></h3>
                        </div>
                      </div>
                    </div>
                    <div class="buttons-to-right"> <a href="#" class="button gray reject"><i class="sl sl-icon-close"></i> Cancel</a> </div>
                  </li>
                  <li class="utf_pending_booking_listing">
                    <div class="utf_list_box_listing_item bookings">
                      <div class="utf_list_box_listing_item-img"><img src="images/client-avatar1.jpg" alt=""></div>
                      <div class="utf_list_box_listing_item_content">
                        <div class="inner">
                          <h3>Francis Burton <span class="utf_booking_listing_status pending">Pending</span><span class="utf_booking_listing_status unpaid">Unpaid</span></h3>

                        </div>
                      </div>
                    </div>
                    <div class="buttons-to-right"> <a href="#" class="button gray reject"><i class="sl sl-icon-close"></i> Reject</a> <a href="#" class="button gray approve"><i class="sl sl-icon-check"></i> Approve</a> </div>
                  </li>  -->
                  <?php
                  }
                } else {
                  ?> <li class="tableItem utf_approved_booking_listing">
                    <div class="utf_list_box_listing_item ">
                      <div class="utf_list_box_listing_item-img">No Listing Found</div>
                    </div>

                  </li><?php
                      }
                        ?>



              </ul>
            </div>
            <div class="clearfix"></div>
            <style>
              .customPagination,
              .paginacaoCursor {
                /* color:white; */
                border-radius: 50%;
                width: 40px;
                height: 40px;
                padding: 0;
                font-weight: 700;
                line-height: 40px;
                margin: 5px;
                background-color: #e7e7e7 !important;
                color: #333 !important;
                cursor: pointer;
              }

              .activePagination {
                background-color: #ff2222 !important;
                color: #fff !important;
              }

              #pagination-container {
                margin: auto;
                width: auto;
                text-align: center;
              }
            </style>

            <div class="utf_pagination_container_part margin-top-30 margin-bottom-30">
              <div id="pagination-container" style="display:flex;">
                <p class='paginacaoCursor' id="beforePagination">
                  <</p>
                    <p class='paginacaoCursor' id="afterPagination">></p>
              </div>
            </div>
            <script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
            <!-- <script type="text/javascript" src="HZpagination.js"></script> -->
            <script>
              $(document).ready(function() {
                var HZperPage = 3, //number of results per page
                  HZwrapper = "paginationTable", //wrapper class
                  HZlines = "tableItem", //items class
                  HZpaginationId = "pagination-container", //id of pagination container
                  HZpaginationArrowsClass = "paginacaoCursor", //set the class of pagi
                  HZpaginationColorDefault = "#fff", //default color for the pagination numbers
                  HZpaginationColorActive = "#ff2222", //color when page is clicked
                  HZpaginationCustomClass = "customPagination"; //custom class for styling the pagination (css)

                /*-------------------------F/ AHMED HIJAZI -------------------------*/
                /*------------------------- HOPE YOU LIKE -------------------------*/

                /*-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
                function paginationShow() {
                  if ($("#" + HZpaginationId).children().length > 8) {
                    var a = $(".activePagination").attr("data-valor");
                    if (a >= 4) {
                      var i = parseInt(a) - 3,
                        o = parseInt(a) + 2;
                      $(".paginacaoValor").hide(),
                        (exibir2 = $(".paginacaoValor").slice(i, o).show());
                    } else
                      $(".paginacaoValor").hide(),
                      (exibir2 = $(".paginacaoValor").slice(0, 5).show());
                  }
                }
                paginationShow(), $("#beforePagination").hide(), $("." + HZlines).hide();
                for (
                  var tamanhotabela = $("." + HZwrapper).children().length,
                    porPagina = HZperPage,
                    paginas = Math.ceil(tamanhotabela / porPagina),
                    i = 1; i <= paginas;

                )
                  $("#" + HZpaginationId).append(
                    "<p class='paginacaoValor " +
                    HZpaginationCustomClass +
                    "' data-valor=" +
                    i +
                    ">" +
                    i +
                    "</p>"
                  ),
                  i++,
                  $(".paginacaoValor").hide(),
                  (exibir2 = $(".paginacaoValor").slice(0, 5).show());
                $(".paginacaoValor:eq(0)")
                  .css("background", "" + HZpaginationColorActive)
                  .addClass("activePagination");
                var exibir = $("." + HZlines)
                  .slice(0, porPagina)
                  .show();
                $(".paginacaoValor").on("click", function() {
                    $(".paginacaoValor")
                      .css("background", "" + HZpaginationColorDefault)
                      .removeClass("activePagination"),
                      $(this)
                      .css("background", "" + HZpaginationColorActive)
                      .addClass("activePagination");
                    var a = $(this).attr("data-valor"),
                      i = a * porPagina,
                      o = i - porPagina;
                    $("." + HZlines).hide(),
                      (exibir = $("." + HZlines)
                        .slice(o, i)
                        .show()),
                      "1" === a ? $("#beforePagination").hide() : $("#beforePagination").show(),
                      a === "" + $(".paginacaoValor:last").attr("data-valor") ?
                      $("#afterPagination").hide() :
                      $("#afterPagination").show(),
                      paginationShow();
                  }),
                  $(".paginacaoValor").last().after($("#afterPagination")),
                  $("#beforePagination").on("click", function(e) {
                    e.stopImmediatePropagation();
                    var a = $(".activePagination").attr("data-valor"),
                      i = parseInt(a) - 1;
                    $("[data-valor=" + i + "]").click(), paginationShow();
                  }),
                  $("#afterPagination").on("click", function(e) {
                    e.stopImmediatePropagation();
                    var a = $(".activePagination").attr("data-valor"),
                      i = parseInt(a) + 1;
                    $("[data-valor=" + i + "]").click(), paginationShow();
                  }),
                  $(".paginacaoValor").css("float", "unset"),
                  $("." + HZpaginationArrowsClass).css("float", "unset");
              });
              /*-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
            </script>
          </div>
          <?php include "./component/footer.php" ?>

        </div>
      </div>
    </div>
  </div>

  <!-- Scripts -->
  <script src="../scripts/jquery-3.4.1.min.js"></script>
  <script src="../scripts/chosen.min.js"></script>
  <script src="../scripts/perfect-scrollbar.min.js"></script>
  <script src="../scripts/slick.min.js"></script>
  <script src="../scripts/rangeslider.min.js"></script>
  <script src="../scripts/magnific-popup.min.js"></script>
  <script src="../scripts/jquery-ui.min.js"></script>
  <script src="../scripts/mmenu.js"></script>
  <script src="../scripts/tooltips.min.js"></script>
  <script src="../scripts/color_switcher.js"></script>
  <script src="../scripts/jquery_custom.js"></script>
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
    <h2>Choose Your Color </h2>
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
  <!-- <script>
    deletes = document.getElementsByClassName("delete");
    Array.from(deletes).forEach((element) => {
      element.addEventListener("click", (e) => {
        snoDelete = e.target.id.substr(1, );
        if (confirm("Are you sure? you want to Delete data!")) {
          // window.location = `/author/product_details/index.php?delete=${snoDelete}`
        } else {
          // console.log("No");
        }
        console.log(snoDelete);
      })
    })
  </script> -->
</body>

</html>