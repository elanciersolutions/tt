<?php  include('../admin/connect/config.php');error_reporting(1);extract($_POST); 

    if($saleorder_id != "")
	 {

     $select_approve = mysql_query("SELECT * FROM `sales_details` WHERE `sid`='$saleorder_id'");
	 
	 while($fetch_approve = mysql_fetch_array($select_approve))
	 {
		  $sale_qty = $fetch_approve['sale_qty'];
		  $pid = $fetch_approve['product'];
		  $sale_total = $fetch_approve['sale_total'];
		  $total = $fetch_approve['total'];
		  $qty = $fetch_approve['qty'];
		  
		  if($sale_qty != 0)
		  {
			  $approve_sale=mysql_query("UPDATE `sales_details` SET `approve_status`=1  WHERE  `dept`='$dept' AND `sid`='$saleorder_id' AND product='$pid'");
			  
		  }
		  else if($sale_qty == 0 &&  $sale_total == "")
		  {
			 $approve_sale=mysql_query("UPDATE `sales_details` SET `approve_status`=1,sale_qty='$qty',sale_total='$total'  WHERE  `cat`='$dept' AND `sid`='$saleorder_id' AND product='$pid'"); 
		  }
	 }
	 
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

 