<?php  include('../admin/connect/config.php');error_reporting(1);extract($_POST); 
     if($saleorder_id != "")
	 {
	$approve_sale=mysql_query("UPDATE `sales` SET `approve_status`=1  WHERE  `cat`='$dept' AND `saleorder_id`='$saleorder_id' ");
	 
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

 