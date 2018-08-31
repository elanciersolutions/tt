<?php  include('../admin/connect/config.php');error_reporting(1);extract($_POST); 
     if($saleorder_id != "")
	 {
	$approve_sale=mysql_query("UPDATE `sales` SET `sale_qty`='$sale_qty',sale_total='$sale_total'  WHERE  `cat`='$dept' AND `saleorder_id`='$saleorder_id' AND `product`='$prodid' AND `id`='$tid'");
	 
	 if($approve_sale)
	 {
		 echo 1;
	 }
	 else
	 {
		 echo 2;  
	 }
	}
	
	 
											
?>

 