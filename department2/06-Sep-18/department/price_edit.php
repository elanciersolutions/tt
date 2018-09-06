<?php  include('../admin/connect/config.php');error_reporting(1);extract($_POST); 
 
  if($id != "")
  { 
	  $up = mysql_query("UPDATE `product` SET `price`='$price' WHERE `id`='$id'");
	  if($up)
	  {
	  $fetch_pname = mysql_fetch_array(mysql_query("select `price` from `product` WHERE `id`='$id'"));
	  
	  echo $fetch_pname['price'];
	  }
	  else
	  {
		 echo $price;
	  }
	
	  
	  
  }

?>