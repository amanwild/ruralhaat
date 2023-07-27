<?php include "../validation_of_user_manager.php" ?>

<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from ulisting.utouchdesign.com/ulisting_ltr/dashboard_messages.php by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Apr 2023 11:41:50 GMT -->

<head>
  <meta name="author" content="">
  <meta name="description" content="">
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Messages</title>

  <!-- Favicon -->
  <link rel="shortcut icon" href="../wp-content/uploads/data/favicon.png" />s/data/favicon.png" />
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


  <!-- Wrapper -->
  <div id="main_wrapper">
    <?php include "./component/header.php" ?>

    <div class="clearfix"></div>

    <!-- Dashboard -->
    <div id="dashboard">
      <?php include "./component/user_sidebar_navbar.php" ?>

      <script>
        var d = document.getElementById("user_dashboard_messages");
        d.className += "active";
      </script>

      <div class="utf_dashboard_content">
        <div id="titlebar" class="dashboard_gradient">
          <div class="row">
            <div class="col-md-12">
              <h2>Messages</h2>
              <nav id="breadcrumbs">
                <ul>
                  <li><a href="index_1.php">Home</a></li>
                  <li><a href="dashboard.php">Dashboard</a></li>
                  <li>Messages</li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12 col-md-12">
            <div class="utf_dashboard_list_box margin-top-0">
              <h4 class="gray"><i class="fa fa-envelope-o"></i> Messages</h4>
              <div class="utf_user_messages_block">
                <ul class="paginationTable">
                  <li class="unread tableItem">
                    <a href="dashboard_messages_details.php">
                      <div class="utf_message_user online"><img src="images/user_avatar_01.jpg" alt="user_avatar" /></div>
                      <div class="utf_message_headline_item">
                        <div class="utf_message_headline_text">
                          <h5>John Doe <i>New</i></h5>
                          <span><i class="fa fa-clock-o"></i> Jan 05, 2022 - 8:52 am</span>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt...</p>
                      </div>
                    </a>
                  </li>
                  <li class="unread tableItem">
                    <a href="dashboard_messages_details.php">
                      <div class="utf_message_user online"><img src="images/user_avatar_02.jpg" alt="user_avatar" /></div>
                      <div class="utf_message_headline_item">
                        <div class="utf_message_headline_text">
                          <h5>John Doe <i>New</i></h5>
                          <span><i class="fa fa-clock-o"></i> Jan 05, 2022 - 8:52 am</span>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt...</p>
                      </div>
                    </a>
                  </li>
                  <li class="tableItem">
                    <a href="dashboard_messages_details.php">
                      <div class="utf_message_user online"><img src="images/user_avatar_03.jpg" alt="user_avatar" /></div>
                      <div class="utf_message_headline_item">
                        <div class="utf_message_headline_text">
                          <h5>John Doe <i>New</i></h5>
                          <span><i class="fa fa-clock-o"></i> Jan 05, 2022 - 8:52 am</span>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt...</p>
                      </div>
                    </a>
                  </li>
                  <li class="tableItem">
                    <a href="dashboard_messages_details.php">
                      <div class="utf_message_user"><img src="images/user_avatar_04.jpg" alt="user_avatar" /></div>
                      <div class="utf_message_headline_item">
                        <div class="utf_message_headline_text">
                          <h5>John Doe</h5>
                          <span><i class="fa fa-clock-o"></i> Jan 05, 2022 - 8:52 am</span>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt...</p>
                      </div>
                    </a>
                  </li>
                  <li class="tableItem">
                    <a href="dashboard_messages_details.php">
                      <div class="utf_message_user"><img src="images/user_avatar_01.jpg" alt="user_avatar" /></div>
                      <div class="utf_message_headline_item">
                        <div class="utf_message_headline_text">
                          <h5>John Doe</h5>
                          <span><i class="fa fa-clock-o"></i> Jan 05, 2022 - 8:52 am</span>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt...</p>
                      </div>
                    </a>
                  </li>
                </ul>
              
              </div>
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
  <!-- Wrapper / End -->

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

<!-- Mirrored from ulisting.utouchdesign.com/ulisting_ltr/dashboard_messages.php by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Apr 2023 11:41:57 GMT -->

</html>