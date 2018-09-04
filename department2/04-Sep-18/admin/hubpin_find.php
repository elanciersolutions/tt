<?php  include('connect/config.php');error_reporting(1);extract($_POST); 
	
	$select_hub = mysql_query("SELECT * FROM `cse_count` WHERE `city`='$city' GROUP BY `hubname`");
	
	while($fetch_hub = mysql_fetch_array($select_hub))
	{
	 // echo  $hubname = $fetch_hub['hubname'];
	 ?>
	 
	 <input type="hidden" name="hub[]" id="hub" value="<?php  echo  $hubid = $fetch_hub['id']; ?>">&nbsp;&nbsp;&nbsp;<span style="font-weight:bold;font-size:16px;padding-bottom:100px;"><?php  echo  $hubname = $fetch_hub['hubname']; ?></span> <br>

     <?php	 
	  $select_pin = mysql_query("SELECT * FROM `cse_count` WHERE `city`='$city' AND `hubname`='$hubname' GROUP BY `pincode` ");
	  
	  while($fetch_pin = mysql_fetch_array($select_pin))
	  {
	           $pincode = $fetch_pin['pincode'];
	           $pinid = $fetch_pin['id'];
	   ?>
	  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="pin[]" id="pin" value="<?php echo $fetch_pin['id'];?>">&nbsp;&nbsp;&nbsp;<?php echo $pincode;?><br></div>  
	   <?php
	  
	  }
	}
?>

	

 