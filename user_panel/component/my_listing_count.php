<ul>
  <li><a href="dashboard_my_listing.php">Default <span class="nav-tag "><?= $default_listing_count ?></span></a></li>
  <li><a href="dashboard_my_listing.php?filter=Active">Active <span class="nav-tag green"><?= $active_listing_count ?></span></a></li>
  <li><a href="dashboard_my_listing.php?filter=Pending">Pending <span class="nav-tag yellow"><?= $pending_listing_count ?></span></a></li>
  <li><a href="dashboard_my_listing.php?filter=Expired">Expired <span class="nav-tag red"><?= $expired_listing_count ?></span></a></li>
</ul>