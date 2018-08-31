<?php
	if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) ob_start("ob_gzhandler"); else ob_start(); 
	include('connect/config.php');
	error_reporting(1);
	$path = $_SERVER['PHP_SELF'];
	$path_parts = pathinfo($path);
    $directory = $path_parts['dirname'];
	$directory = ($directory == "/") ? "" : $directory;
	/* Returns localhost OR mysite.com */
	$host = $_SERVER['HTTP_HOST'];
	$base_url="http://".$host . $directory;
	
	date_default_timezone_set('asia/calcutta');
	$admin="";
	if(isset($_SESSION['admin'])) {
	$admin=$_SESSION['admin']; } 
	if($admin==''){
		header('location:index.php');
	}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
	<?php if($title!=''){ $title; } else { $title="Do First Admin Panel"; } ?>
    <title> <?php echo $title;?> | Do First Admin</title>
	<link rel="shortcut icon" href="../images/fav/favicon.png" />
    <link href="<?php echo $adminurl;?>vendors/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo $adminurl;?>vendors/bootstrap/css/bootstrap-reset.css" rel="stylesheet">
	<link href="<?php echo $adminurl;?>vendors/font-awesome/css/font-awesome.css" rel="stylesheet">
	<link href="<?php echo $adminurl;?>vendors/animations/animate.css" rel="stylesheet">
	<link href="<?php echo $adminurl;?>vendors/bootstrap-fileupload/bootstrap-fileupload.css" rel="stylesheet">
    <link href="<?php echo $adminurl;?>vendors/bootstrap-datepicker/css/datepicker.css" rel="stylesheet">
    <link href="<?php echo $adminurl;?>vendors/bootstrap-timepicker/css/timepicker.css" rel="stylesheet">
    <link href="<?php echo $adminurl;?>vendors/bootstrap-datetimepicker/css/datetimepicker.css" rel="stylesheet">
    <link href="<?php echo $adminurl;?>vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
	<link href="<?php echo $adminurl;?>styles/table-responsive.css" rel="stylesheet" id="width_800">
    <link href="<?php echo $adminurl;?>vendors/advanced-datatable/css/demo_table.css" rel="stylesheet" />
    <link href="<?php echo $adminurl;?>styles/style.css" rel="stylesheet">
    <link href="<?php echo $adminurl;?>styles/custom.css" rel="stylesheet">
	
	<!-- Sweet alert -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" integrity="sha256-iXUYfkbVl5itd4bAkFH5mjMEN5ld9t3OHvXX3IU8UxU=" crossorigin="anonymous" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js" integrity="sha256-egVvxkq6UBCQyKzRBrDHu8miZ5FOaVrjSqQqauKglKc=" crossorigin="anonymous"></script>
	<style> .red{ color:red; } </style>
</head>
<body>    
	<section id="container">
		<header class="header white-bg">
			<div class="sidebar-toggle-box">
				<div data-original-title="MENU" data-placement="right" class="fa-bars tooltips"></div>
			</div>
			<a href="dashboard.php" class="logo" >
			<img src="../images/logo2.png" height="50"/>
			Do First fortunemart
			</a>
			<div class="top-nav pull-right">
				<ul class="nav top-menu">
				<li><a href="logout.php">Logout <i class="fa-key"></i></a></li>
                <?php if(isset($_SESSION['admin'])) { ?>
                <li><a href="profile.php">Profile <i class="fa-suitcase"></i></a></li>
                <?php } ?>
                </ul>
			</div>
		</header>
		<aside>
			<div id="sidebar" class="nav-collapse ">
				<ul class="sidebar-menu" id="nav-accordion">
					<li><a href="dashboard.php"><i class="icon-dashboard"></i><span>Dashboard</span></a></li>
					<li><a href="payment.php"><i class="icon-payreport"></i><span>Payment Request</span></a></li>
					<li><a href="department_list.php"><i class="icon-membership"></i><span>Department</span></a></li>
					<li><a href="dep_member_list.php"><i class="icon-package"></i><span>Department Member</span></a></li>
					<li><a href="users.php"><i class="icon-ureport"></i><span>Users List</span></a></li>
					<li><a href="dealers.php"><i class="icon-report"></i><span>Dealers</span></a></li>
					<li><a href="csv_list.php"><i class="icon-report"></i><span>CSV</span></a></li>
					<li><a href="commission_split.php"><i class="icon-preport"></i><span>Commission Split Up</span></a></li>
					<li><a href="javascript:;"><i class="icon-slider"></i><span style="font-size:12px;">Commission Mgmt</span></a>
						<ul class="sub-drop">
							<li><a href="commission.php"><i class="icon-program"></i><span>Commission Details</span></a></li>
							<li><a href="level_commission.php"><i class="icon-package"></i><span>Rewards & Recognitions</span></a></li>
							<li><a href="tds_report.php"><i class="icon-report"></i><span>TDS Details</span></a></li>
						</ul>
					</li>
					<li><a href="javascript:;"><i class="icon-manage"></i><span style="font-size:12px;">Product Mgmt</span></a>
						<ul class="sub-drop">
							<li><a href="category_list.php"><i class="icon-ad"></i><span>Category</span></a></li>
							<li><a href="product_list.php"><i class="icon-membership"></i><span>Product</span></a></li>
							<li><a href="slider_list.php"><i class="icon-dashboard"></i><span>Slider</span></a></li>
						</ul>
					</li>
					<li><a href="repurchase.php"><i class="icon-ad"></i><span>Purchase Details</span></a></li>
					<li><a href="javascript:;"><i class="icon-ureport"></i><span style="font-size:12px;">Staff Mgmt</span></a>
						<ul class="sub-drop">
							<li><a href="group.php"><i class="icon-membership"></i><span>Group</span></a></li>
							<li><a href="client.php"><i class="icon-program"></i><span>Add Staff </span></a></li>
						</ul>
					</li>
					<li><a href="javascript:;"><i class="icon-complaints"></i><span style="font-size:12px;">SMS</span></a>
						<ul class="sub-drop">
							<li><a href="admin_sms.php"><i class="icon-dashboard"></i><span>Admin SMS</span></a></li>
							<li><a href="mar_sms.php"><i class="icon-dashboard"></i><span>Marketing SMS</span></a></li>
						</ul>
					</li>
					<li><a href="logout.php"><i class="icon-staff"></i><span>Logout</span></a></li>                  
				</ul>
			</div>
		</aside>