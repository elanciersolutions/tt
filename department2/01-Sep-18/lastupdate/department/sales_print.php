<?php  include('../admin/connect/config.php');error_reporting(1);extract($_POST); $dept1=$dept;?>

	<tbody style="min-height:300px;">						
	<?php	
										
										$query = mysql_query("SELECT * FROM sales WHERE `cat`='$dept1' AND `saleorder_id`='$salesid'");
										
									$overall_amount = "";
										$i=1; while($result=mysql_fetch_array($query)){ ?>
										
										<tr>
											<td class="text-center"><?php echo $i++;?></td>
											
											<td class="text-center"><?php 
											$prodid = $result['product'];
											$productname = mysql_fetch_array(mysql_query("SELECT * FROM product WHERE  `id` ='$prodid' AND dept='$dept1'")); echo  ucfirst($productname['pname']); ?></td>
											<td class="text-center"><?php
									        echo $price = $productname['price']; ?></td>
											<td class="text-center">
											<?php $change_qty = mysql_fetch_array(mysql_query("SELECT * FROM sales WHERE `cat`='$dept1' AND `saleorder_id`='$salesid' AND product='$prodid'"));
											 if($change_qty['approve_status'] == 0){
									        echo $qty = $result['qty'];}else{echo $qty = $result['sale_qty'];} ?>
											</td>
											<td class="text-center"><?php
									        echo $total = $price * $qty; 
											 $overall_amount +=$total;
											?></td>
										</tr>
										
										<?php  } ?>
</tbody>										
<tr>
<td colspan="2" style="width:25%;padding:18px;border-color:#000;">
Signature: 
</td>
<td colspan="3" style="width:25%;padding:18px;border-color:#000;">
Total Amount:  <?php echo $overall_amount;?>


</td>
</tr>
