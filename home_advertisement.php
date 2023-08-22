<section class="classiera-advertisement advertisement-v5 section-pad-80 border-bottom">
	<div class="section-heading-v5">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-8 center-block">
					<h3 class="text-capitalize">ADVERTISEMENTS</h3>
					<p>Description</p>
				</div>
			</div>
		</div>
	</div>
	<div class="tab-divs">
		<div class="view-head">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-sm-7 col-xs-8">
						<div class="tab-button">
							<ul class="nav nav-tabs" role="tablist">
								<li role="presentation" class="active" style="padding:5px;">
									<a href="#all" aria-controls="all" role="tab" data-toggle="tab">
										All Ads <span class="arrow-down"></span>
									</a>
								</li>
								<li role="presentation" class="" style="padding:5px;">
									<a href="#random" aria-controls="random" role="tab" data-toggle="tab">
										Random Ads <span class="arrow-down"></span>
									</a>
								</li>
								<li role="presentation" class="" style="padding:5px;">
									<a href="#popular" aria-controls="popular" role="tab" data-toggle="tab">
										Popular Ads <span class="arrow-down"></span>
									</a>
								</li>
							</ul><!--nav nav-tabs-->
						</div><!--tab-button-->
					</div><!--col-lg-6 col-sm-8-->
					<div class="col-lg-6 col-sm-5 col-xs-4">
						<div class="view-as text-right flip">
							<!-- <a id="grid" class="grid" href="#">
								<i class="fas fa-th-large"></i>
							</a> -->
							<a id="grid" class="grid-medium active" href="#">
								<i class="fa fa-th"></i>
							</a>
							<a id="list" class="list " href="#">
								<i class="fas fa-th-list"></i>
							</a>
						</div>
					</div><!--col-lg-6 col-sm-4 col-xs-12-->
				</div><!--row-->
			</div>
		</div>
		<div class="tab-content">
			<div role="tabpanel" class="tab-pane fade in active" id="all">
				<div class="container">
					<div class="row">

						<?php
						$filter = "all";

						$select_listing_query = "  SELECT *,COUNT(listing_rating_given),AVG(listing_rating_given) FROM listing 
						left join category on listing.listing_category_id = category.category_id 
						left join sub_category on listing.listing_sub_category_id = sub_category.sub_category_id 
						left join countries on listing.listing_country_id = countries.country_id 
						left join states on listing.listing_state_id = states.state_id 
						left join cities on listing.listing_city_id = cities.city_id 
						left join users_entries on listing.listing_owner_id = users_entries.user_id 
						left join listing_rating on listing.listing_id = listing_rating.listing_rating_on_product_id where ( listing.listing_status LIKE 'Active') GROUP BY listing_id ORDER BY `listing`.`listing_title` ASC LIMIT 12 "; //NOTE: here (`) is not equal to (')
						// $select_listing_query = "SELECT * FROM `listing` LIMIT 12"; //NOTE: here (`) is not equal to (')
						try {
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
							$array = [];
							//Note : mysqli_fetch_assoc($result) it returns NULL when no data is persent to Select
							while ($row = mysqli_fetch_assoc($select_listing_result)) {
								$array = $row;
								$listing_owner_id = $row['listing_owner_id'];
								include "./home_cards.php";
							}
						}
						?>
					</div><!--row--1-->
				</div><!--container--!-->
			</div><!--tabpanel--!-->
			<div role="tabpanel" class="tab-pane fade" id="random">
				<div class="container">
					<div class="row">
					<?php
						$filter = "random";

						$select_listing_query = "  SELECT *,COUNT(listing_rating_given),AVG(listing_rating_given) FROM listing left join category on listing.listing_category_id = category.category_id left join sub_category on listing.listing_sub_category_id = sub_category.sub_category_id left join countries on listing.listing_country_id = countries.country_id left join states on listing.listing_state_id = states.state_id left join cities on listing.listing_city_id = cities.city_id left join users_entries on listing.listing_owner_id = users_entries.user_id left join listing_rating on listing.listing_id = listing_rating.listing_rating_on_product_id where ( listing.listing_status LIKE 'Active') GROUP BY listing_id ORDER BY `listing`.`listing_category_id` ASC LIMIT 12"; //NOTE: here (`) is not equal to (')
						// $select_listing_query = "SELECT * FROM `listing` LIMIT 12"; //NOTE: here (`) is not equal to (')
						try {
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
							$array = [];
							//Note : mysqli_fetch_assoc($result) it returns NULL when no data is persent to Select
							while ($row = mysqli_fetch_assoc($select_listing_result)) {
								$array = $row;
								$listing_owner_id = $row['listing_owner_id'];
								include "./home_cards.php";
							}
						}
						?>
					</div><!--row--!-->
				</div><!--container--!-->
			</div><!--tabpanel Random--!-->
			<div role="tabpanel" class="tab-pane fade" id="popular">
				<div class="container">
					<div class="row">
					<?php
						$filter = "popular";

						$select_listing_query = " SELECT *,COUNT(listing_rating_given),AVG(listing_rating_given) FROM listing left join category on listing.listing_category_id = category.category_id left join sub_category on listing.listing_sub_category_id = sub_category.sub_category_id left join countries on listing.listing_country_id = countries.country_id left join states on listing.listing_state_id = states.state_id left join cities on listing.listing_city_id = cities.city_id left join users_entries on listing.listing_owner_id = users_entries.user_id left join listing_rating on listing.listing_id = listing_rating.listing_rating_on_product_id where ( listing.listing_status LIKE 'Active') GROUP BY listing_id ORDER BY `AVG(listing_rating_given)` DESC LIMIT 12"; //NOTE: here (`) is not equal to (')
						// $select_listing_query = "SELECT * FROM `listing` LIMIT 12"; //NOTE: here (`) is not equal to (')
						try {
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
							$array = [];
							//Note : mysqli_fetch_assoc($result) it returns NULL when no data is persent to Select
							while ($row = mysqli_fetch_assoc($select_listing_result)) {
								$array = $row;
								$listing_owner_id = $row['listing_owner_id'];
								include "./home_cards.php";
							}
						}
						?>
					</div>
				</div>
			</div>
			<div class="view-all text-center">
				<a href="./search_ads/index.php" class="btn btn-primary outline btn-md btn-style-five">
					View All Ads </a>
			</div>
		</div><!--tab-content-->
	</div><!--tab-divs-->
</section>




























