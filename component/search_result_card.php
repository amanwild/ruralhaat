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
                        <a id="grid" class="grid " href="#">
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