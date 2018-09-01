<?php 
$title="Sales Order List";
include("header.php");
if(isset($_GET['cmd'])){
	extract($_GET);
	
}
?>
<section id="main-content">
	<section class="wrapper">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<form class="cmxform form-horizontal tasi-form" id="" method="post" action="productdelete.php">
					<section class="panel">
						<header class="panel-heading">
							<h4>Sale Order's List </h4>
							<!--<div class="xtra_btn_top">
								<a title="New" href="addpurchase.php" data-placement="top" data-toggle="tooltip" class="btn btn-success tooltips" >Add New</a>
							</div>-->
						</header>
						<div class="panel-body">
							<section id="flip-scroll">
								<table class="display table table-bordered cf" id="dyntable">
									<thead>
										<tr>
											<th>S.No</th>
											<th>Sale Order ID</th>
											<th>User Name</th>
											<th>Qty</th>
											<th>Total</th>
											<th>Approve Status</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php
										
										$dept1 = sessionvalue('department', $dept);
										
										$query = mysql_query("SELECT * FROM sales WHERE `cat`='$dept1' GROUP BY saleorder_id");
										
										$i=1; while($result=mysql_fetch_array($query)){ ?>		
										<tr>
											<td class="text-center"><?php echo $i;?></td>
											<td class="text-center"><?php  echo $salesid = $result['saleorder_id'];?></td>
											<td class="text-center"><?php 
											$userid = $result['userid'];
											$user_name = mysql_fetch_array(mysql_query("SELECT * FROM login_users WHERE  `id` ='$userid'")); echo  ucfirst($user_name['first_name']).' '.ucfirst($user_name['last_name']); ?></td>
											<td class="text-center"> 
											<?php $sale_total = mysql_fetch_array(mysql_query("SELECT cat,sum(sale_total) as approve_total,saleorder_id,userid ,sum(sale_qty) as approve_qty,sum(total) as order_total,sum(qty) as order_qty FROM sales WHERE `cat`='$dept1' AND `saleorder_id`='$salesid'"));
											
											?>
											Order Qty :&nbsp;&nbsp;&nbsp; <?php  echo $sale_total['order_qty'];?>
											<br /> <br />
											Approve Qty :&nbsp;&nbsp;&nbsp; <?php  echo $sale_total['approve_qty'];?>
											</td>
											<td class="text-center"> Order Total  :&nbsp;&nbsp;&nbsp;<?php 
											echo $sale_total['order_total'];
											 ?> <br /><br />
											 Approve Total  :&nbsp;&nbsp;&nbsp;<?php 
											echo $sale_total['approve_total']; ?>
											</td>
											<td class="text-center"><?php if($result['approve_status']==1){?>
											<a class="block_tip tooltips" ><i class="fa fa-thumbs-up"></i></a>
											<?php } else if($result['approve_status']==0){?>
											<a class="block_tip tooltips"><i class="fa fa-thumbs-down"></i></a>
											<?php } ?></td>
											<td class="text-center"><a href="sales_details.php?salesid=<?php echo $result['saleorder_id'];?>" class="block_tip tooltips"><i class="fa fa-eye"></i></a></td>
										</tr>
										<?php $i++; } ?>
									</tbody>
								</table>
							</section>
						</div>
						<footer class="panel-footer">
							<div class="xtra_btn_bottom">
								<a title="BACK" data-placement="top" data-toggle="tooltip" class="btn btn-danger tooltips" onclick="window.history.go(-1); return false;">Back</a>
							</div>
						</footer>
					</section>
				</form>
			</div>
		</div>
	</section>
</section>
<?php include("footer.php");?>