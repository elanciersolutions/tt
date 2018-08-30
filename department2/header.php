<?php
	if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) ob_start("ob_gzhandler"); else ob_start(); 
	include('../admin/connect/config.php');
	error_reporting(1);
	$path = $_SERVER['PHP_SELF'];
	$path_parts = pathinfo($path);
    $directory = $path_parts['dirname'];
	$directory = ($directory == "/") ? "" : $directory;
	/* Returns localhost OR mysite.com */
	$host = $_SERVER['HTTP_HOST'];
	$base_url="http://".$host . $directory;
	
	date_default_timezone_set('asia/calcutta');
	$dept="";
	if(isset($_SESSION['dept'])) {
	$empid=$_SESSION['empid'];
	$dept=$_SESSION['dept'];
	if($empid == "")
	{
	
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
	<?php if($title!=''){ $title; } else { $title="Do First Department"; } ?>
    <title> <?php echo $title;?> | Do First Department</title>
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
	
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	
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
			<a href="dashboard.php" class="logo" ><img src="../images/logo2.png" height="50"/></a>
			
			<div class="header-heading">
			<h3><?php  if($dept) { $y00=mysql_fetch_array(mysql_query("SELECT `name` FROM `members` WHERE `id`='$dept'")); echo $y00['name'];?> 
			<?php } ?></h3>
			</div>
			
			<div class="top-nav pull-right">
				<ul class="nav top-menu">
					<li><a href="logout.php">Logout <i class="fa-key"></i></a></li>
					<li><a href="profile.php">Profile <i class="fa-suitcase"></i></a></li>
                </ul>
			</div>
		</header>
		<aside>
			<div id="sidebar" class="nav-collapse ">
				<ul class="sidebar-menu" id="nav-accordion">
					<li><a href="dashboard.php"><i class="icon-dashboard"></i><span>Dashboard</span></a></li>
					<li><a href="payment_list.php"><i class="icon-dashboard"></i><span>Payment Request</span></a></li>
					<li><a href="department_list.php"><i class="icon-dashboard"></i><span>Department</span></a></li>
					<li><a href="user_list.php"><i class="icon-dashboard"></i><span>New User</span></a></li>
					<li><a href="passbook.php"><i class="icon-dashboard"></i><span>Day Book </span></a></li>
					<li><a href="javascript:;"><i class="icon-manage"></i><span style="font-size:12px;">Product Mgmt</span></a>
						<ul class="sub-drop">
							<!--<li><a href="category_list.php"><i class="icon-ad"></i><span>Category</span></a></li>-->
							<li><a href="subcategory_list.php"><i class="icon-membership"></i><span>Sub Category</span></a></li>
							
							<li><a href="brand_list.php"><i class="icon-membership"></i><span>Brand</span></a></li>

							<li><a href="product_list.php"><i class="icon-membership"></i><span>Product</span></a></li>
						</ul>
					</li>
					<li><a href="purchase.php"><i class="icon-dashboard"></i><span>Purchase</span></a></li>
					<li><a href="javascript:;"><i class="icon-dashboard"></i><span>Purchase Details</span></a></li>
					<li><a href="javascript:;"><i class="icon-dashboard"></i><span>Sales Details</span></a></li>
					<li><a href="javascript:;"><i class="icon-dashboard"></i><span>Sales</span></a></li>
					<li><a href="logout.php"><i class="icon-staff"></i><span>Logout</span></a></li>                  
				</ul>
			</div>
		</aside>

<?php 

	} 
	else{
		
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
	<?php if($title!=''){ $title; } else { $title="Do First Department"; } ?>
    <title> <?php echo $title;?> | Do First Department</title>
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
	
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	
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
			<a href="dashboard.php" class="logo" ><img src="../images/logo2.png" height="50"/></a>
			
			<div class="header-heading">
			<h3><?php  if($dept) { $y01=mysql_fetch_array(mysql_query("SELECT * FROM `user` WHERE `dept`='$dept' and id='$empid'")); echo $y01['name'];?> 
			<?php  $departid = $y01['department']; } ?></h3>
			</div>
			
			<div class="top-nav pull-right">
				<ul class="nav top-menu">
					<li><a href="logout.php">Logout <i class="fa-key"></i></a></li>
					<li><a href="profile.php">Profile <i class="fa-suitcase"></i></a></li>
                </ul>
			</div>
		</header>
		<aside>
			<div id="sidebar" class="nav-collapse ">
				<ul class="sidebar-menu" id="nav-accordion">
					<li><a href="dashboard.php"><i class="icon-dashboard"></i><span>Employee Dashboard</span></a></li>
					
					<?php  $y02=mysql_fetch_array(mysql_query("SELECT * FROM `inner_department` WHERE `dept`='$dept' and id='$departid'")); if($y02['department'] == 'Purchase'){
						?>
							<li><a href="javascript:;"><i class="icon-manage"></i><span style="font-size:12px;">Product Mgmt</span></a>
						<ul class="sub-drop">
							<!--<li><a href="category_list.php"><i class="icon-ad"></i><span>Category</span></a></li>-->
							<li><a href="subcategory_list.php"><i class="icon-membership"></i><span>Sub Category</span></a></li>
							
							<li><a href="brand_list.php"><i class="icon-membership"></i><span>Brand</span></a></li>

							<li><a href="product_list.php"><i class="icon-membership"></i><span>Product</span></a></li>
						</ul>
					</li>
						<li><a href="purchase.php"><i class="icon-dashboard"></i><span>Purchase</span></a></li>
						<?php
					} else if($y02['department'] == 'Sales') {
						?>
						<li><a href="javascript:;"><i class="icon-dashboard"></i><span>Sales</span></a></li>
						
						<?php 
					}
						?>
					<!--<li><a href="payment_list.php"><i class="icon-dashboard"></i><span>Payment Request</span></a></li>
					<li><a href="department_list.php"><i class="icon-dashboard"></i><span>Department</span></a></li>
					<li><a href="user_list.php"><i class="icon-dashboard"></i><span>New User</span></a></li>
					<li><a href="passbook.php"><i class="icon-dashboard"></i><span>Day Book </span></a></li>
					<li><a href="javascript:;"><i class="icon-manage"></i><span style="font-size:12px;">Product Mgmt</span></a>
						<ul class="sub-drop">
							<li><a href="category_list.php"><i class="icon-ad"></i><span>Category</span></a></li>
							<li><a href="subcategory_list.php"><i class="icon-membership"></i><span>Sub Category</span></a></li>
							<li><a href="product_list.php"><i class="icon-membership"></i><span>Product</span></a></li>
						</ul>
					</li>
					<li><a href="purchase.php"><i class="icon-dashboard"></i><span>Purchase</span></a></li>
					<li><a href="javascript:;"><i class="icon-dashboard"></i><span>Purchase Details</span></a></li>
					<li><a href="javascript:;"><i class="icon-dashboard"></i><span>Sales Details</span></a></li>
					<li><a href="javascript:;"><i class="icon-dashboard"></i><span>Sales</span></a></li>
					<li><a href="logout.php"><i class="icon-staff"></i><span>Logout</span></a></li>  -->                
				</ul>
			</div>
		</aside>

		
		<?php
		
	}
	
    	} 
	if($dept==''){
		header('location:../index.php');
	}

?>	
		