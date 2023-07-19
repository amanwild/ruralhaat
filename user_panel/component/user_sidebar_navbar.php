<a href="#" class="utf_dashboard_nav_responsive"><i class="fa fa-reorder"></i> Dashboard Sidebar Menu</a>
<div class="utf_dashboard_navigation js-scrollbar">
  <div class="utf_dashboard_navigation_inner_block">
    <ul>
      <li id="user_dashboard"><a href="dashboard.php"><i class="sl sl-icon-layers"></i> Dashboard</a></li>
      <li id="user_dashboard_add_listing"><a href="dashboard_add_listing.php"><i class="sl sl-icon-plus"></i> Add Listing</a></li>
      <li  id="user_dashboard_my_listing">
        <a href="javascript:void(0)"><i class="sl sl-icon-layers"></i> My Listings</a>
        <?php include "./component/my_listing_count.php" ?>
      </li>
      <!-- <li id="user_dashboard_bookings"><a href="dashboard_bookings.php"><i class="sl sl-icon-docs"></i> Bookings</a></li> -->
      <!-- <li id="user_dashboard_messages"><a href="dashboard_messages.php"><i class="sl sl-icon-envelope-open"></i> Messages</a></li> -->
      <li id="user_dashboard_notification"><a href="dashboard_notification.php"><i class="sl sl-icon-bell"></i> Notification</a></li>
      <!-- <li id="user_dashboard_wallet"><a href="dashboard_wallet.php"><i class="sl sl-icon-wallet"></i> Wallet</a></li> -->
      <!-- <li id="user_dashboard_review" >
        <a href="javascript:void(0)"><i class="sl sl-icon-star"></i> Reviews</a>
        <ul>
          <li><a href="dashboard_visitor_review.php">Visitor Reviews <span class="nav-tag green">4</span></a></li>
          <li><a href="dashboard_submitted_review.php">Submitted Reviews <span class="nav-tag yellow">5</span></a></li>
        </ul>
      </li> -->
      <!-- <li id="user_dashboard_bookmark"><a href="dashboard_bookmark.php"><i class="sl sl-icon-heart"></i> Bookmark</a></li> -->
      <li id="user_dashboard_my_profile"><a href="dashboard_my_profile.php"><i class="sl sl-icon-user"></i> My Profile</a></li>
      <!-- <li id="user_dashboard_change_password"><a href="dashboard_change_password.php"><i class="sl sl-icon-key"></i> Change Password</a></li> -->
      <li id="" ><a href="../logout/index.php"><i class="sl sl-icon-power"></i> Logout</a></li>
    </ul>
  </div>
</div>