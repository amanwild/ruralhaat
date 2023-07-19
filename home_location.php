<section class="locations section-pad border-bottom">
	<div class="section-heading-v1">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-8 center-block">
					<h3 class="text-uppercase">Ads Locations</h3>
					<p> Description</p>
				</div><!--col-lg-8 col-md-8 center-block-->
			</div><!--row-->
		</div><!--container-->
	</div><!--section-heading-v1-->
	<div class="location-content-v2">
		<div class="container">
			<div class="row"><?php
								$select_location_query = "SELECT * ,count(cities.city_name) as count FROM listing left join cities on listing.listing_city_id = cities.city_id where ( listing.listing_status LIKE 'Active') GROUP BY listing_city_id"; //NOTE: here (`) is not equal to (')
								try {
									$select_loaction_result = 0;
									if ($connect) {
										$select_loaction_result = mysqli_query($connect, $select_location_query);
										// var_dump($select_loaction_result);
										if ($select_loaction_result) {
											$location_num = mysqli_num_rows($select_loaction_result);
										}
									}
								} catch (Exception $e) {
									$mess = $e->getMessage();
								}
								if ($location_num > 0) {
									$sno = 0;
									//Note : mysqli_fetch_assoc($result) it returns NULL when no data is persent to Select
									while ($row = mysqli_fetch_assoc($select_loaction_result)) {
								?>

						<div class="col-sm-3 col-md-3 col-lg-2 col-xs-6 match-height">
							<div class="location text-center border-bottom">
								<h5>
									<a href="./search_ads/index.php?category_id=&listing_keyword=&listing_city=<?= $row['city_name']?>&search_listing=true"> <?= $row['city_name']?> </a>
								</h5>
								<p>  <?= $row['count']?>&nbsp; Ads posted </p>
							</div>
						</div>

				<?php
									}
								}
				?>
			</div>
		</div>
	</div>
</section>