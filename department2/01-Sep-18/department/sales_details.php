<?php 
$title="Sale Details";
include("header.php");
if(isset($_GET['cmd'])){
	extract($_GET);
	
	header('location:purchase.php');
}
?>
<section id="main-content">
	<section class="wrapper">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<form class="cmxform form-horizontal tasi-form" id="" method="post" action="productdelete.php">
					<section class="panel">
						<header class="panel-heading">
							<h4>Sale Order Product Details</h4>
							<div class="xtra_btn_top">
								<a title="Sale Order ID"  data-placement="top" data-toggle="tooltip" class="btn btn-success tooltips" >Sale Order : <?php echo $salesid = $_REQUEST['salesid'];?></a>
							</div>						</header>
						<div class="panel-body">
							<section id="flip-scroll">
								<table class="display table table-bordered cf" id="dyntable">
									<thead>
										<tr>
											<th>S.No</th>
											<th>Product Name</th>
											<th>price</th>
											<th>Qty</th>
											<th>Total</th>
											<th>Edit Qty</th>
										</tr>
									</thead>
									<tbody>
										<?php
										
										$dept1 = sessionvalue('department', $dept);
										
										$query = mysql_query("SELECT * FROM sales WHERE `cat`='$dept1' AND `saleorder_id`='$salesid'");
										
									
										$i=1; while($result=mysql_fetch_array($query)){ ?>
										
										<tr>
											<td class="text-center"><?php echo $i;?></td>
											
											<td class="text-center"><?php 
											$prodid = $result['product'];
											$productname = mysql_fetch_array(mysql_query("SELECT * FROM product WHERE  `id` ='$prodid' AND dept='$dept1'")); echo  ucfirst($productname['pname']); ?></td>
											<td class="text-center"><?php
									        echo $price = $productname['price']; ?></td>
											<td class="text-center">
											<?php $change_qty = mysql_fetch_array(mysql_query("SELECT * FROM sales WHERE `cat`='$dept1' AND `saleorder_id`='$salesid' AND product='$prodid'"));
											?>
											<input type="text" name="edit_qty"  value="<?php if($change_qty['approve_status'] == 0){
									        echo $qty = $result['qty'];}else{echo $qty = $result['sale_qty'];} ?>" id="edit_qty<?php echo $tableid=$result['id'];?>" style="width:50px;text-align:center;"readonly onkeyup="edit_salesorder(<?php echo $salesid;?>,<?php echo $price;?>,<?php echo $prodid;?>,<?php echo $tableid=$result['id'];?>,this.value,<?php echo $result['qty'];?>,<?php
									        echo $total = $price * $qty; ?>,<?php echo $dept1; ?>)"></td>
											<td class="text-center"><input type="text" name="edit_price"  value="<?php
									        echo $total = $price * $qty; ?>"id="edit_price<?php echo $tableid=$result['id'];?>" style="width:70px;text-align:center;"readonly></td>
											
											<td>
											<?php if($result['approve_status'] != 1){?>
											<a onclick="editqty(<?php echo $tableid=$result['id'];?>)" class="block_tip tooltips"><i class="fa fa-pencil"></i></a>
											<?php }
											else{
												?>
												<a  class="block_tip tooltips"><i class="fa fa-check "></i></a>
												<?php
												
											}
											?>
											</td>
											
										</tr>
										
										
										
										<?php $i++; } ?>
									</tbody>
								</table>
							</section>
						</div>
						<footer class="panel-footer">
						
							<div class="xtra_btn_bottom" style="padding-left:15px;">
								<a title="BACK" data-placement="top" data-toggle="tooltip" class="btn btn-danger tooltips" onclick="window.history.go(-1); return false;">Back</a>
							</div> 
							
							<div class="xtra_btn_bottom">
							<?php   
							 $query1 = mysql_query("SELECT * FROM sales WHERE `cat`='$dept1' AND `saleorder_id`='$salesid'");
							$result1 = mysql_fetch_array($query1);
							if($result1['approve_status'] == 0)
							{
								?>
								<a title="Approve" data-placement="top" data-toggle="tooltip" class="btn btn-success tooltips" onclick="approve_status(<?php echo $salesid; ?>,<?php echo $dept1; ?>)">Approve</a>
						  <?php 
							}
							else
							{
							?>
							<a title="Approve" data-placement="top" data-toggle="tooltip" class="btn btn-danger tooltips" >Approved</a>
							
							<?php 
							}
							?>
							</div>
							
						</footer>
					</section>
				</form>
			</div>
		</div>
	</section>
</section>
<?php include("footer.php");?>