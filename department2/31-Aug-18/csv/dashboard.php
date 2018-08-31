<?php 
$title="Dashboard";
include("header.php");?>
<script type="text/javascript">
function getTv() {
	var e = document.getElementById("tv");
	var strUser = e.options[e.selectedIndex].value;
	window.location.href="dashboard.php?sub="+strUser;
}
</script>
<section id="main-content">
	<section class="wrapper">
	<?php   $csvid=$_SESSION['csvid'];
				$incharge_name=$_SESSION['incharge_name'];
				if($csvid == "")
				{
					?>
		<!--<div class="row state-overview">
		
			<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
				<section class="panel">
					<div class="symbol terques">
						<i class="fa-users"></i>
					</div>
					<div class="value">
						<h1 class="count"><?php 
						 $dept1 = sessionvalue('department', $dept);
						echo $num=mysql_num_rows(mysql_query("SELECT `id` FROM `user` WHERE dept='$dept1'"));?></h1>
						<p>Total User</p>
					</div>
				</section>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
				<section class="panel">
					<div class="symbol yellow">
					<i class="fa-user"></i>
					</div>
					<div class="value">
						<h1 class="count2"><?php echo $num=mysql_num_rows(mysql_query("SELECT `id` FROM `user` WHERE dept='$dept1' AND `date`='".date('Y-m-d')."'"));?></h1>
						<p>Today Register User's</p>
					</div>
				</section>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
				<section class="panel">
					<div class="symbol terques">
						<i class="fa-certificate"></i>
					</div>
					<div class="value">
						<h1 class="count"><?php echo $num=mysql_num_rows(mysql_query("SELECT `id` FROM `category` WHERE dept='$dept1'"));?></h1>
						<p>Total Category</p>
					</div>
				</section>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
				<section class="panel">
					<div class="symbol terques">
						<i class="fa-certificate"></i>
					</div>
					<div class="value">
						<h1 class="count"><?php echo $num=mysql_num_rows(mysql_query("SELECT `id` FROM `sub_category` WHERE dept='$dept1'"));?></h1>
						<p>Total Sub Category</p>
					</div>
				</section>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
				<section class="panel">
					<div class="symbol yellow">
						<i class="fa-star"></i>
					</div>
					<div class="value">
						<h1 class="count"><?php echo $num=mysql_num_rows(mysql_query("SELECT `id` FROM `product` WHERE dept='$dept1'"));?></h1>
						<p>Total Products</p>
					</div>
				</section>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
				<section class="panel">
					<div class="symbol yellow">
					<i class="fa-money"></i>
					</div>
					<div class="value">
						<h1 class="count2"><?php echo $num=mysql_num_rows(mysql_query("SELECT `id` FROM `payment` WHERE dept='$dept1'"));?></h1>
						<p>Total Payment Request</p>
					</div>
				</section>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
				<section class="panel">
					<div class="symbol yellow">
						<i class="fa-rupee"></i>
					</div>
					<div class="value">
						<h1 class="count">0<?php //echo $num=mysql_num_rows(mysql_query("SELECT `id` FROM `sales` WHERE dept='$dept1'"));?></h1>
						<p>Total Sale </p>
					</div>
				</section>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
				<section class="panel">
					<div class="symbol terques">
						<i class="fa-money"></i>
					</div>
					<div class="value">
						<h1 class="count">0<?php //echo $num=mysql_num_rows(mysql_query("SELECT `id` FROM `sales` WHERE dept='$dept1'"));?></h1>
						<p>Total Transactions</p>
					</div>
				</section>
			</div>
			
			
			
		</div>-->
		<?php 
			}
		?>
	</section>
</section>
<?php include("footer.php");?>