<?php include "../validation_of_user_manager.php"?>

<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from ulisting.utouchdesign.com/ulisting_ltr/dashboard_invoice.php by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Apr 2023 11:41:58 GMT -->
<head>
<meta name="author" content="">
<meta name="description" content="">
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Invoice</title>

<!-- Favicon -->
<link rel="shortcut icon" href="../wp-content/uploads/data/favicon.png" />s/data/favicon.png" />
<!-- Style CSS -->
<link rel="stylesheet" href="../css/bootstrap.php">
<link rel="stylesheet" href="../css/invoice.css">
<!-- Google Font -->
<link href="https://fonts.googleapis.com/css?family=Nunito:300,400,600,700,800&amp;display=swap&amp;subset=latin-ext,vietnamese" rel="stylesheet"> 
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700,800" rel="stylesheet" type="text/css">
</head>
<body>
<a href="javascript:window.print()" class="print-button">Print Invoice</a> 
<!-- Invoice -->
<div id="invoice"> 
  <div class="row">
    <div class="col-md-6">
      <div id="logo"><a href="index_1.php"><img src="images/logo.png" alt=""></a></div>
    </div>
    <div class="col-md-6">
      <p id="details"> 
	    <strong>Order Number:-</strong> 0043128641<br>
		<strong>Email:-</strong> support@example.com<br>
        <strong>Phone Number:-</strong> +1 (0123) 456 7890
      </p>
    </div>
  </div>
  
  <div class="row">
    <div class="col-md-12">
      <h2 class="invoice_title">U-Listing Invoice</h2>
    </div>
    <div class="col-md-6">
      <p><strong>Billed To:</strong><br>
        1789 Williamson Plaza, Maggieberg,<br> MT 878, United States
      </p>
    </div>
    <div class="col-md-6 fl_right"> 
      <p><strong>Shipped To:</strong><br>
        267 Suzanne Throughway, Breannabury,<br> OR 45801, United States
      </p>
    </div>
	<div class="col-md-6">
      <p><strong>Payment Method:</strong><br>
        Visa ending **** 2222<br>
		support@example.com
      </p>
    </div>
    <div class="col-md-6 fl_right"> 
      <p><strong>Order Date:</strong><br>
        22 January 2022
      </p>
    </div>
  </div>
  
  <div class="row">
    <div class="col-md-12">
      <table class="margin-top-20">
        <tr>
          <th>Item</th>
          <th>Quantity</th>
          <th>Hour</th>
          <th>Price</th>
        </tr>
        <tr>
          <td>Basic Plan</td>
          <td>1</td>
          <td>5</td>
          <td>$29.00</td>
        </tr>
		<tr>
          <td>Business Plan</td>
          <td>3</td>
          <td>7</td>
          <td>$49.00</td>
        </tr>
		<tr>
          <td>Premium Plan</td>
          <td>6</td>
          <td>12</td>
          <td>$69.00</td>
        </tr>
      </table>
    </div>
    <div class="col-md-12">
      <table id="totals">
		<tr>
          <th>Shipping</th>
          <th><span>$13.00</span></th>
        </tr>
		<tr>
          <th>Total Pay</th>
          <th><span>$160.00</span></th>
        </tr>
      </table>
    </div>
  </div>
</div>
</body>

<!-- Mirrored from ulisting.utouchdesign.com/ulisting_ltr/dashboard_invoice.php by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Apr 2023 11:41:58 GMT -->
</html>