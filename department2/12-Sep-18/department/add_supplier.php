<?php  include('../admin/connect/config.php');error_reporting(1);extract($_POST); 

    $insert = mysql_query("INSERT INTO `supplier`(`supplier`, `gstno`, `mobile`, `address`, `state`, `city`, `pincode`) VALUES ('$q1', '$q2','$q3', '$q4','$q5', '$q6','$q7')");

     if($insert)
	{
      echo 1;
	}
	else
	{
      echo 2;
	}
?>