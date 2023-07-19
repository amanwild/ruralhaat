<?php echo '<style>
  .stars' . $row_for_listing['listing_id'] . ' i {
    color: #e6e6e6 !important;
    cursor: pointer !important;
    transition: color 0.2s ease !important;
  }

  .stars' . $row_for_listing['listing_id']. ' i.active {
    color: #ff9c1a !important;
  }
</style>'; ?>
<div class="col-lg-4 col-md-4 col-sm-6 match-height item item-grid">
  <div class="classiera-box-div classiera-box-div-v1">
    <figure class="clearfix">
      <div class="premium-img">
        <div class="featured-tag">
          <span class="left-corner"></span>
          <span class="right-corner"></span>
          <div class="featured" style="border-bottom-color: <?= $row_for_listing['category_color']?> !important;">
            <p>Featured</p>
          </div>
        </div>
        <img class="img-responsive" src="../wp-content/uploads/data/<?= $row_for_listing['listing_image'] ?>" alt="Used BMW Car 2018 Model For Sale">
        <span class="hover-posts">
          <a href="../listing_details/index.php?listing_id=<?=$row_for_listing['listing_id']?>" class="btn btn-primary outline btn-sm active">View</a>
        </span>
        <span class="classiera-buy-sel">
          For Sale </span>
      </div><!--premium-img-->
      <span class="classiera-price-tag" style="background-color:<?= $row_for_listing['category_color']?>; color:<?= $row_for_listing['category_color']?>;">
        <span class="price-text">
          <?= $row_for_listing['listing_price'] ?> ₹ </span>
      </span>
      <figcaption>
        <h5 style="    margin-bottom: 15px;">
          <a href="../listing_details/index.php?listing_id=<?=$row_for_listing['listing_id']?>">
            <?= $row_for_listing['listing_title'] ?></a>
        </h5>
        <h5>
          <span>
            <span>
              Rating :
            </span>

            <span class="stars<?= $row_for_listing['listing_id'] ?>">
              <i style="margin-right: 0px;" class="fa-solid fa-star"></i>
              <i style="margin-right: 0px;" class="fa-solid fa-star"></i>
              <i style="margin-right: 0px;" class="fa-solid fa-star"></i>
              <i style="margin-right: 0px;" class="fa-solid fa-star"></i>
              <i style="margin-right: 0px;" class="fa-solid fa-star"></i>
            </span>(<span style="margin-right: 0px;" id="rating_<?= $row_for_listing['listing_id'] ?>">

            </span>)
          </span>
        </h5>
        <p>
          Category :
          <a href="../search_ads/index.php?category_name=<?= $row_for_listing['category_name']?>&listing_keyword=&listing_city=&search_listing=true">
            <?= $row_for_listing['category_name']?> </a>
        </p>

        <span class="category-icon-box" style=" background:<?= $row_for_listing['category_color'] ?>; color:<?= $row_for_listing['category_color'] ?>; ">
          <img src="../wp-content/uploads/data/<?= $row_for_listing['category_image'] ?>" alt="<?= $row_for_listing['category_image'] ?>">
        </span>



        <p class="description">
          <?= $row_for_listing['listing_description'] ?> </p>

        <div class="post-tags">
          <span><i class="fas fa-tags"></i>
            Tags&nbsp; :
          </span>
          <a href="../tag/ads/index.html" rel="tag">ads</a><a href="../tag/auto/index.html" rel="tag">auto</a><a href="../tag/automotor/index.html" rel="tag">automotor</a><a href="../tag/bmw/index.html" rel="tag">bmw</a><a href="../tag/car/index.html" rel="tag">car</a><a href="../tag/classified/index.html" rel="tag">classified</a>
        </div><!--post-tags-->
      </figcaption>
    </figure>
  </div><!--classiera-box-div-->
</div><!--col-lg-4-->


<script>
  // Select all elements with the "i" tag and store them in a NodeList called "stars"
  const stars<?= $row_for_listing['listing_id'] ?> = document.querySelectorAll(".stars<?= $row_for_listing['listing_id'] ?> i");

  // Loop through the "stars" NodeList
  stars<?= $row_for_listing['listing_id'] ?>.forEach((star, index1) => {
    // Add an event listener that runs a function when the "click" event is triggered
    // star.addEventListener("click", () => {
    // Loop through the "stars" NodeList Again
    stars<?= $row_for_listing['listing_id'] ?>.forEach((star, index2) => {
      // Add the "active" class to the clicked star and any stars with a lower index
      // and remove the "active" class from any stars with a higher index
      
      <?php
      if($row_for_listing['AVG(listing_rating_given)'] !=""){
        echo --$row_for_listing['AVG(listing_rating_given)'];
      }else{
        echo '-1';

      }
       ?> >= index2 ? star.classList.add("active") : star.classList.remove("active");
      <?php $listing_listing_rating_avg = round($row_for_listing['AVG(listing_rating_given)'], 1); ?>
      
      document.getElementById("rating_<?= $row_for_listing['listing_id'] ?>").innerHTML = <?php    if($row_for_listing['AVG(listing_rating_given)'] !=""){
        echo ++$listing_listing_rating_avg ;
      }else{
        echo $listing_listing_rating_avg ;

      } ?>;
      // console.log(index1);
    });
    // });
  });
</script>