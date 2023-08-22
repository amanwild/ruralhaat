<?php echo '<style>
  .stars' . $row['listing_id'] . $filter . ' i {
    color: #e6e6e6 !important;
    cursor: pointer !important;
    transition: color 0.2s ease !important;
  }

  .stars' . $row['listing_id'] . $filter . ' i.active {
    color: #ff9c1a !important;
  }
</style>'; ?>
<div class="col-lg-4 col-md-4 col-sm-6 match-height item item-grid-medium">
	<div class="classiera-box-div classiera-box-div-v5">
		<figure class="clearfix">
			<a href="./listing_details/index.php?listing_id=<?= $row['listing_id'] ?>">
				<div class="premium-img">
					<div class="featured-tag">
						<!-- <span class="left-corner"></span>
						<span class="right-corner"></span>
						<div class="featured">
							<p>Featured</p>
						</div> -->
					</div>
					<img class="img-responsive" src="wp-content/uploads/data/<?= $row['listing_image'] ?>" alt="<?= $row['listing_title'] ?>">
					<span class="hover-posts">
						<span>View Ad</span>
					</span>
					<span class="price">
						Price :
						<?= $row['listing_price'] ?> ₨</span>
					<span class="classiera-buy-sel">For sale
					</span>
				</div>
			</a>
			<div class="detail text-center">
				<span class="price">
					Price :
					<?= $row['listing_price'] ?> ₨ </span>
				<!-- <div class="box-icon">
					<?php
					if (isset($listing_owner_email)) {
						if ('' == $listing_owner_email) {
					?>
							<a href="mailto:<?= $listing_owner_email ?>">
								<i class="fas fa-envelope"></i>
							</a>
					<?php
						}
					} ?>
					<?php
					if (isset($listing_owner_phone)) {
						if ('' == $listing_owner_phone) {
					?>
							<a href="tel:<?= $listing_owner_phone ?>">
								<i class="fas fa-phone"></i>
							</a>
					<?php
						}
					} ?>

				</div> -->
				<a href="./listing_details/index.php?listing_id=<?= $row['listing_id'] ?>" class="btn btn-primary outline btn-style-five">View Ad</a>
			</div>
			<figcaption>
				<span class="price visible-xs">
					Price :
					<?= $row['listing_price'] ?> ₨ </span>
				<h5><a href="./listing_details/index.php?listing_id=<?= $row['listing_id'] ?>"><?= $row['listing_title'] ?></a>
				</h5>
				<div class="category">
					<span>
						Category :
						<a href="search_ads/index.php?category_id=<?= $row['category_name'] ?>&listing_keyword=&listing_city=&search_listing=true" title="<?= $row['category_name'] ?>"><?= $row['category_name'] ?></a> </span>
					<span>Location :
						<a href="index78a6.html?s=&amp;post_city=Richmond"><?= $row['listing_adderess'] ?></a>
					</span>
				</div>
				<h5>
					<span>
						<span>
							Rating :
						</span>

						<span class="stars<?= $row['listing_id'] . $filter ?>">
							<i style="margin-right: 0px;" class="fa-solid fa-star"></i>
							<i style="margin-right: 0px;" class="fa-solid fa-star"></i>
							<i style="margin-right: 0px;" class="fa-solid fa-star"></i>
							<i style="margin-right: 0px;" class="fa-solid fa-star"></i>
							<i style="margin-right: 0px;" class="fa-solid fa-star"></i>
						</span>(<span style="margin-right: 0px;" id="rating_<?= $row['listing_id'] . $filter ?>">

						</span>)
					</span>
				</h5>
				<p class="description"><?= $row['listing_description'] ?>
				</p>
			</figcaption>
		</figure>
	</div><!--row-->
</div><!--col-lg-4-->
<?php //echo$filter ;
?>

<script>
	// Select all elements with the "i" tag and store them in a NodeList called "stars"
	const stars<?= $row['listing_id'] . $filter ?> = document.querySelectorAll(".stars<?= $row['listing_id'] . $filter ?> i");

	// Loop through the "stars" NodeList
	stars<?= $row['listing_id'] . $filter ?>.forEach((star, index1) => {
		// Add an event listener that runs a function when the "click" event is triggered
		// star.addEventListener("click", () => {
		// Loop through the "stars" NodeList Again
		stars<?= $row['listing_id'] . $filter ?>.forEach((star, index2) => {
			// Add the "active" class to the clicked star and any stars with a lower index
			// and remove the "active" class from any stars with a higher index

			<?php if ($row['AVG(listing_rating_given)'] == '') {
				$row['AVG(listing_rating_given)'] = 0;
			}
			echo --$row['AVG(listing_rating_given)']; ?> >= index2 ? star.classList.add("active") : star.classList.remove("active");
			<?php $listing_listing_rating_avg = round($row['AVG(listing_rating_given)'], 1); ?>
			document.getElementById("rating_<?= $row['listing_id'] . $filter ?>").innerHTML = <?= ++$listing_listing_rating_avg ?>;
			// console.log(index1);
		});
		// });
	});
</script>

<?php

//   echo"<pre>";
//   var_dump($array);
//   echo"<pre>";


?>