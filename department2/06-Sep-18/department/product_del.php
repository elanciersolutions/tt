<?php  include('../admin/connect/config.php');error_reporting(1);extract($_POST); 
 
  if($delid != "")
  {
	 $del = mysql_query("DELETE FROM `product` WHERE id='$delid'"); 
	 
	 if($del)
	 {
		 echo 1;
	 }
	 else{
		 echo 2;
	 }
  }

?>