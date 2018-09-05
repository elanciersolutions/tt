<?php  include('../admin/connect/config.php');error_reporting(1);extract($_POST); 

 $cat=mysql_fetch_array(mysql_query("SELECT * FROM `product` WHERE `dept`=0 AND subcategory='$subid' AND `brandname`='$brandid' AND id='$pid' AND `status`=1"));

 echo $cat['price'].'@'.$cat['commission'].'@'.$cat['gst']; 

?>