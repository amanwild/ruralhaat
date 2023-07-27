<section class="inner-page-content border-bottom top-pad-50">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-lg-12">

        <!--style5 -->
        <section class="classiera-advertisement advertisement-v5 section-pad-80 border-bottom">
          <div class="tab-divs">

            <?php
            // echo $select_listing_num;
            // var_dump($select_listing_num);
            if ($select_listing_num > 0) {
            ?>
              <div class="view-head">
                <div class="container">
                  <div class="row">
                    <div class="col-lg-6 col-sm-7 col-xs-8">
                      <div class="total-post">
                        <p>Total ads:
                          <span>
                            <?= $select_listing_num ?>
                            ads posted </span>
                        </p>
                      </div><!--total-post-->
                    </div>
                    <div class="col-lg-6 col-sm-5 col-xs-4">
                      <div class="view-as text-right flip">
                        <a id="grid" class="grid active" href="#">
                          <i class="fas fa-th-large"></i>
                        </a>
                        <a id="grid" class="grid-medium" href="#">
                          <i class="fa fa-th"></i>
                        </a>
                        <a id="list" class="list " href="#">
                          <i class="fas fa-th-list"></i>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!--view-head-->
            <?php
            } else { ?>
              <div class="view-head">
                <div class="container">
                  <div class="row">
                    <div class="col-lg-12">
                      <h5>Sorry, no result found.</h5>
                    </div>
                  </div>
                </div>
              </div>
            <?php
            } ?>
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane fade in active" id="all">
                <div class="container">
                  <div class="row">
               
                    <?php

                    if ($select_listing_num > 0) {
                      $sno = 0;
                      //Note : mysqli_fetch_assoc($result) it returns NULL when no data is persent to Select
                      while ($row = mysqli_fetch_assoc($select_listing_result)) {
                        include "../cards/index.php";
                      }
                    }
                    ?>
                    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
                  <script type="text/javascript">
  //##### Add record when Add Record Button is click #########
  $(document).ready(function() {


    $("#enquery_form").submit(function(e) {

      e.preventDefault();
      // alert("hello")
      var enquery_first_name = $("#enquery_first_name").val(); //build a post data structure
      var enquery_last_name = $("#enquery_last_name").val(); //build a post data structure
      var enquery_phone = $("#enquery_phone").val(); //build a post data structure
      var enquery_email = $("#enquery_email").val(); //build a post data structure
      var enquery_form_value = $("#enquery_form_value").val(); //build a post data structure
      var enquery_listing_id = $("#enquery_listing_id").val(); //build a post data structure

      jQuery.ajax({
        type: "POST", // Post / Get method
        url: "../listing_details/response.php", //Where form data is sent on submission
        dataType: "text", // Data type, HTML, json etc.
        data: {
          enquery_first_name: enquery_first_name,
          enquery_last_name: enquery_last_name,
          enquery_phone: enquery_phone,
          enquery_email: enquery_email,
          enquery_listing_id: enquery_listing_id,
          enquery_form_value: enquery_form_value,
        }, //Form variables
        success: function(response) {
          // // $("#responds").append(response);
          console.log(typeof(response));
          console.log(response);
          // console.log(response.includes("success"))  
          if (response.includes("success")) {
            // $("#contactForm").submit();
            alert("Message Sent Successfully!");
            location.reload();
          }
          if (response.includes("failed")) {
            // alert("Message Sending Failed!");
            // show_enquery_popup();

          }
        },
        error: function(xhr, ajaxOptions, thrownError) {
          // alert(xhr);
          // alert(ajaxOptions);
          // alert(thrownError);
        }
      });
    });




    // $("#report_form").submit(function(e) {
    //   e.preventDefault();
    //   alert("hello")
    //   var report_ad_val = $("#report_ad_val").val(); //build a post data structure
    //   var enquery_last_name = $("#enquery_last_name").val(); //build a post data structure
    //   var enquery_phone = $("#enquery_phone").val(); //build a post data structure
    //   var enquery_email = $("#enquery_email").val(); //build a post data structure
    //   var enquery_form_value = $("#enquery_form_value").val(); //build a post data structure
    //   var enquery_listing_id = $("#enquery_listing_id").val(); //build a post data structure

    //   jQuery.ajax({
    //     type: "POST", // Post / Get method
    //     url: "../listing_details/response.php", //Where form data is sent on submission
    //     dataType: "text", // Data type, HTML, json etc.
    //     data: {
    //       enquery_first_name: enquery_first_name,
    //       enquery_last_name: enquery_last_name,
    //       enquery_phone: enquery_phone,
    //       enquery_email: enquery_email,
    //       enquery_listing_id: enquery_listing_id,
    //       enquery_form_value: enquery_form_value,
    //     }, //Form variables
    //     success: function(response) {
    //       // // $("#responds").append(response);
    //       // console.log(typeof(response));
    //       // console.log(response.includes("success"))  
    //       if (response.includes("success")) {

    //         alert("Message Sent Successfully!");
    //       }
    //       if (response.includes("failed")) {
    //         alert("Message Sending Failed!");
    //         // show_enquery_popup();

    //       }
    //     },
    //     error: function(xhr, ajaxOptions, thrownError) {
    //       // alert(xhr);
    //       // alert(ajaxOptions);
    //       // alert(thrownError);
    //     }
    //   });
    // });

  });


  function show_registration_popup() {
    hide_login_popup();
    hide_enquery_popup();

    document.getElementById("overlay_for_registration").style.display = "block";
  }

  function hide_registration_popup() {
    document.getElementById("overlay_for_registration").style.display = "none";
  }

  function show_login_popup() {
    hide_registration_popup();
    hide_enquery_popup();
    document.getElementById("overlay_for_login").style.display = "block";
  }

  function hide_login_popup() {
    document.getElementById("overlay_for_login").style.display = "none";
  }

  function show_enquery_popup() {
    hide_registration_popup();
    hide_login_popup();
    document.getElementById("overlay_for_enquery").style.display = "block";
  }

  function hide_enquery_popup() {
    document.getElementById("overlay_for_enquery").style.display = "none";
  }
</script>

                    <!--col-lg-4-->
                  </div>
                  <!--row-->
                </div>
                <!--container-->
              </div>
              <!--tabpanel-->
            </div>
            <!--tab-content-->
          </div>
          <!--tab-divs-->
        </section>
        <!-- end style5-->
      </div>
    </div>
    <!--row-->
  </div>
  <!--container-->
</section>