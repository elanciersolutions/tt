<?php  include('admin/connect/config.php');error_reporting(1);extract($_POST); 
	

	$select_cse = mysql_query("SELECT * FROM `sponser` WHERE `assign_city`='$city'");
	
  ?>
   
   <option value="">Select Map Pincode</option>
	<?php
	while($fetch_cse = mysql_fetch_array($select_cse))
	{
		 $cseid= $fetch_cse['id'];
	  $map_pincode_id = explode(",",$fetch_cse['assign_pincode']);
	  foreach($map_pincode_id as $mapid){
	   $select_pin = mysql_query("SELECT * FROM `cse_count` WHERE `id`='$mapid'");
	   while($fetch_pin = mysql_fetch_array($select_pin)){
		   $pincode = $fetch_pin['pincode'];
		   $hubname = $fetch_pin['hubname'];
		   ?>
		   <option value="<?php echo $pincode.'-'.$hubname.'@'.$cseid;?>"><?php echo $pincode;?> - &nbsp;<?php echo $hubname;?></option>
		   <?php 
		   
	   }
	   }
	}
?>

	

 