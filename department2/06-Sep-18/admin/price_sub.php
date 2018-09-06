<?php  include('connect/config.php');error_reporting(1);extract($_POST); 
		
		$fetch_pname = mysql_fetch_array(mysql_query("select `price` from `product` WHERE `id`='$id'"));
	  
	  echo $fetch_pname['price'];
	

?>