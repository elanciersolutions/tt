<?php  include('connect/config.php');error_reporting(1);extract($_POST); 
	
	$fetch_sponser=mysql_fetch_array(mysql_query("SELECT * FROM `login_users` WHERE  `username`='$sponser'"));
	
	echo $fetch_sponser['id'].'@'.$fetch_sponser['first_name'].' '.$fetch_sponser['last_name'];
	
	
?>

 