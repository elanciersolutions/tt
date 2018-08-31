<?php
	include 'admin/connect/config.php';
	extract($_POST);
	if($type=='Login'){
		if($uname!='' && $passwd!=''){
			$sql=mysql_fetch_array(mysql_query("SELECT `username`,`password` FROM `login_users` WHERE `username`='$uname'"));
			$sq=mysql_fetch_array(mysql_query("SELECT `id`,`mobile`,`password` FROM `members` WHERE `mobile`='$uname'"));
			
			$sq_dept=mysql_fetch_array(mysql_query("SELECT * FROM `user` WHERE `mobile`='$uname'"));
			
			$sq_csv=mysql_fetch_array(mysql_query("SELECT * FROM `sponser` WHERE `phone`='$uname'"));
			
			if($sql['username']){
				if($sql['password']==$passwd){
					$_SESSION['usn']=$sql['username'];
					echo 2;
				} else {
					echo 3;
				}
			} else if($sq['mobile']) {
				if($sq['password'] == $passwd){
					$_SESSION['dept']=$sq['id'];
					echo 4;
				} 
			}
				 else if($sq_dept['mobile']) {
				if($sq_dept['password'] == $passwd){
					$_SESSION['dept']=$sq_dept['dept'];
					$_SESSION['empid']=$sq_dept['id'];
					$_SESSION['empname']=$sq_dept['name'];
					$_SESSION['empmobile']=$sq_dept['mobile'];
					echo 5;
				} 
				
				else {
					echo 3;
				}
			} else if($sq_csv['phone']) {
				if($sq_csv['sp_password'] == $passwd){
					$_SESSION['csvid']=$sq_csv['id'];
					$_SESSION['incharge_name']=$sq_csv['incharge_name'];
					$_SESSION['csvmobile']=$sq_csv['mobile'];
					echo 6;
				} 
				
				else {
					echo 3;
				}
			}
			
			else {
				echo 1;
			}
		} else {
			echo 0;
		}
	} else if($type=='Username Check') {
		$sql = mysql_fetch_array(mysql_query("SELECT `username` FROM `login_users` WHERE `username`='$username'"));
		if($sql['username']){
			echo 0;
		} else {
			echo 1;
		}
	} else if($type=='Sponsor Check') {
		$sql = mysql_fetch_array(mysql_query("SELECT `first_name`,`last_name` FROM `login_users` WHERE `username`='$sname'"));
		if($sql['first_name']){
			echo $sql['first_name']." ".$sql['last_name'];
		} else {
			echo 0;
		}
	} else {
		echo 0;
	}