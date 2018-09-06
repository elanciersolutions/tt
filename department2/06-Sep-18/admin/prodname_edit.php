<?php  include('connect/config.php');error_reporting(1);extract($_POST); 
 
  if($id != "")
  { 
	  $up = mysql_query("UPDATE `product` SET `pname`='$prodname' WHERE `id`='$id'");
	  if($up)
	  {
	  $fetch_pname = mysql_fetch_array(mysql_query("select `pname` from `product` WHERE `id`='$id'"));
	  
	  echo $fetch_pname['pname'];
	  }
	  else
	  {
		 echo $prodname;
	  }
	
	  
	  
  }

?>