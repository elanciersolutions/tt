<?php  include('../admin/connect/config.php');error_reporting(1);extract($_POST); 

?>
<option value="">--- Select ---</option>
					<?php $ca=mysql_query("SELECT * FROM `brand` WHERE  `sub_categoryname`='$subid' AND `status`=1");
					while($cat=mysql_fetch_array($ca)){ ?>
					<option value="<?php echo $cat['id'];?>"><?php echo $cat['brandname'];?></option>
					<?php }
?>

