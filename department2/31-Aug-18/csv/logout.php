<?php 
include('../admin/connect/config.php');
date_default_timezone_set('Asia/Kolkata');
$currentDateTime=date('m/d/Y H:i:s');
$logofftime = date('h:i A', strtotime($currentDateTime));

	if($_SESSION['dept']){
		/*$log="update admin_login set logout='$logofftime' where id=".$_SESSION['aid']; 
		$logqry=mysql_query($log);*/
		unset($_SESSION['csvid']); 
	} 
	echo "<script>";
	echo "self.location='../index.php';";
	echo "</script>";
	exit(0);