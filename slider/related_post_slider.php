<section class="blog-post-section related-blog-post-section border-bottom">
  <div class="container" style="overflow: hidden;">
    <div class="row">
      <div class="col-sm-6 related-blog-post-head">
        <h4 class="text-uppercase">Related ads</h4>
      </div><!--col-sm-6-->
      <div class="col-sm-6">
        <div class="navText text-right flip hidden-xs">
          <a class="prev btn btn-primary sharp btn-style-one btn-sm"><i class="fas fa-chevron-left"></i></a>
          <a class="next btn btn-primary sharp btn-style-one btn-sm"><i class="fas fa-chevron-right"></i></a>
        </div>
      </div><!--col-sm-6-->
    </div><!--row-->
    <div class="row">
      <div class="col-lg-12">
        <div class="owl-carousel premium-carousel-v1" data-car-length="4" data-items="4" data-loop="true" data-nav="false" data-autoplay="true" data-autoplay-timeout="3000" data-dots="false" data-auto-width="false" data-auto-height="true" data-right="false" data-responsive-small="1" data-autoplay-hover="true" data-responsive-medium="2" data-responsive-xlarge="4" data-margin="30">

          <?php
          $select_listing_query = "SELECT * FROM listing left join category on listing.listing_category_id = category.category_id  WHERE `listing_category_id` = $listing_category_id and ( listing.listing_status LIKE 'Active') "; //NOTE: here (`) is not equal to (')
          try {
            $select_listing_result = 0;
            if ($connect) {
              $select_listing_result = mysqli_query($connect, $select_listing_query);
              if ($select_listing_result) {
                $listing_num = mysqli_num_rows($select_listing_result);
              }
            }
          } catch (Exception $e) {
            $mess = $e->getMessage();
          }

          if ($listing_num > 0) {
            $sno = 0;
            while ($row = mysqli_fetch_assoc($select_listing_result)) {
              $listing_title = $row['listing_title'];
              

          ?><div class="classiera-box-div-v1 item match-height">
                <figure>
                  <div class="premium-img">
                    <img class="img-responsive" src="../wp-content/uploads/data/<?= $row['listing_image'] ?>" alt="Classic black and orange motorcycle For Sale">
                    <span class="hover-posts">
                      <a href="../listing_details/index.php?listing_id=<?= $row['listing_id']?>" class="btn btn-primary sharp btn-sm active">View Ad</a>
                    </span>
                  </div>
                  <span class="classiera-price-tag" style="background-color:<?= $row['category_color'] ?>; color:<?= $row['category_color'] ?>;">
                    <span class="price-text">
                      <?= $row['listing_price'] ?></span>
                  </span>
                  <figcaption>
                    <h5><a href="../listing_details/index.php?listing_id=<?= $row['listing_id']?>"><?= $row['listing_title'] ?></a></h5>
                    <p>
                      Category :
                      <a href="../search_ads/index.php?category_id=<?= $row['category_id'] ?>&listing_keyword=&listing_city=&search_listing=true"><?= $row['category_name'] ?></a>
                    </p>
                    <span class="category-icon-box" style=" background:<?= $row['category_color'] ?>; color:<?= $row['category_color'] ?>; ">
                      <img src="../wp-content/uploads/data/<?= $row['category_image'] ?>" alt="Automotive">
                    </span>
                  </figcaption>
                </figure>
              </div><!--item-->
          <?php
            }
          }
          ?>


          <!--SingleItem-->

        </div><!--owl-carousel-->
      </div><!--col-lg-12-->
    </div><!--row-->
  </div>
</section>