<?php  include('../admin/connect/config.php');error_reporting(1);extract($_POST); 
 
 
		 $fetch_pname = mysql_fetch_array(mysql_query("select `pname` from `product` WHERE `id`='$id'"));
	  
	  echo $fetch_pname['pname'];
	

?>