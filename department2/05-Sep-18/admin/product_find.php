<?php  include('../admin/connect/config.php');error_reporting(1);extract($_POST); 
 
       $ca=mysql_query("SELECT * FROM `product` WHERE  `dept`='$dept' AND subcategory='$subid' AND `status`=1");
	   $cat=mysql_fetch_array($ca);
	   
	   echo $cat['product_name'];
	   ?>
											
											