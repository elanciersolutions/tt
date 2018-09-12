<?php  include('../admin/connect/config.php');error_reporting(1);extract($_POST); 
     if($appstatus == 0)
	 {
	  $ca=mysql_query("UPDATE `sub_category` SET `appstatus`=1  WHERE  `dept`='$dept' AND `id`='$subid' ");
	 
	  $selectapp = mysql_fetch_array(mysql_query("SELECT * FROM sub_category WHERE `id`='$subid'"));
	 
	 echo $appstatus = $selectapp['appstatus'];
	
	 }
	 else
	 {
		 $ca=mysql_query("UPDATE `sub_category` SET `appstatus`=0  WHERE  `dept`=$dept' AND `id`='$subid' ");
		 
		  $selectapp = mysql_fetch_array(mysql_query("SELECT * FROM sub_category WHERE `id`='$subid'"));
	 
	 echo $appstatus = $selectapp['appstatus'];
	
	 }
											
?>

 