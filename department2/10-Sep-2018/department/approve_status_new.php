<?php  include('../admin/connect/config.php');error_reporting(1);extract($_POST); $date= date('Y-m-d'); $dtime = date('Y-m-d h:i:s');

    if($saleorder_id != "")
	 {
     $select_approve = mysql_query("SELECT * FROM `sales_details` WHERE `sid`='$saleorder_id'");
	 $sale_total_order = 0;
	 $sale_qty = 0;
	 
	 $fetch_approve = mysql_fetch_array(mysql_query("SELECT * FROM `sales_details` WHERE `sid`='$saleorder_id'"));
	 
	 $uname = $fetch_approve['uname'];
	 
	 $fetch_csc = mysql_fetch_array(mysql_query("select * from `login_users` where `username`='$uname' "));
	 
	 $cscid = $fetch_csc[cseid];
	 
	 while($fetch_approve = mysql_fetch_array($select_approve))
	 {
		  $sale_qty = $fetch_approve['sale_qty'];
		  $pid = $fetch_approve['product'];
		  $sale_total = $fetch_approve['sale_total'];
		  $sale_total_order += $fetch_approve['total'];
		  $total = $fetch_approve['total'];
		  $qty = $fetch_approve['qty'];
		  $qty_order += $fetch_approve['qty'];
		  
		  if($sale_qty != 0)
		  {
			  $approve_sale=mysql_query("UPDATE `sales_details` SET `approve_status`=1,`approve_date`='$date',`approve_dtime`='$dtime'  WHERE  `dept`='$dept' AND `sid`='$saleorder_id' AND product='$pid'");
			  
			  
		  }
		  else if($sale_qty == 0)
		  {
			 $approve_sale=mysql_query("UPDATE `sales_details` SET `approve_status`=1,sale_qty='$qty',sale_total='$total',`approve_date`='$date',`approve_dtime`='$dtime'  WHERE  `dept`='$dept' AND `sid`='$saleorder_id' AND product='$pid'");
			 
		
			 
		  }
	 }
	   if($approve_sale)
	   {
		$sales_approve = mysql_query("SELECT * FROM `sales_details` WHERE `sid`='$saleorder_id'");
		
	    $approve_sale_qty = 0;
		
		$approve_sale_total = 0;
		
	    while($fetch_sale = mysql_fetch_array($sales_approve))
		{
			$approve_sale_qty += $fetch_sale['sale_qty'];
			$approve_sale_total += $fetch_sale['sale_total'];
		
		}
		 
		  $approve_sales =mysql_query("UPDATE `sales` SET `approve_status`=1,`cscid`='$cscid',`sale_qty`='$approve_sale_qty',`sale_total`='$approve_sale_total',`approve_date`='$date',`approve_dtime`='$dtime'  WHERE  `dept`='$dept' AND `id`='$saleorder_id' ");
		
		 
		  
		 echo 1;
	 }
	 else
	 {
		 echo 2;  
	 }
	 
	 
	 
   
	}
	
	 
											
?>

 