<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Pet Lover</title>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />

</head>
<body>
<!-- Header -->
<div id="header">
  <div class="shell">
    <!-- Logo + Top Nav -->
    <div id="top">
      <h1><a href="index.php">Pet Lover</a></h1>
      <div id="top-navigation"> Welcome <strong><?php echo $_SESSION['admin_username']; ?></strong> <span>|</span> <a href="profile_sit.php">Profile Settings</a> <span>|</span> <a href="logout.php">Log out</a> </div>
    </div>
    <!-- End Logo + Top Nav -->
    <!-- Main Nav -->
    <div id="navigation">
      <ul>
        <li><a href="index.php" class="<?php if(get_page_name()=="index.php") { ?> active <?php } ?> "><span>Home</span></a></li>
        <li><a href="add_admin.php" class="<?php if(get_page_name()=="add_admin.php") { ?> active <?php } ?> "><span>Add New Admin</span></a></li>
        <li><a href="show_admin.php" class="<?php if(get_page_name()=="show_admin.php") { ?> active <?php } ?> "><span>View Admins</span></a></li>
        <li><a href="show_price.php" class="<?php if(get_page_name()=="show_price.php") { ?> active <?php } ?> "><span>View Price Packages</span></a></li>
        <li><a href="show_request_booking.php" class="<?php if(get_page_name()=="show_request_booking.php") { ?> active <?php } ?> "><span>View Booking Requests</span></a></li>
        <li><a href="show_request_contact.php" class="<?php if(get_page_name()=="show_request_contact.php") { ?> active <?php } ?> "><span>View Contact Requests</span></a></li>
        <li><a href="show_feedback.php" class="<?php if(get_page_name()=="show_feedback.php") { ?> active <?php } ?> "><span>Feedbacks</span></a></li>
        <!--<li><a href="#"><span>Products</span></a></li>
        <li><a href="#"><span>Services Control</span></a></li>-->
      </ul>
    </div>
    <!-- End Main Nav -->
  </div>
</div>
<!-- End Header -->