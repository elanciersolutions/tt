<?php  include('../admin/connect/config.php');error_reporting(1);extract($_POST);
$deptid = explode("@",$deptid); 
 ?>
<option value="">--- Select ---</option>
<?php $ca=mysql_query("SELECT * FROM `category` WHERE `status`=1 AND `dept`='$deptid[0]'");
	while($cat=mysql_fetch_array($ca)){ ?>
	<option value="<?php echo $cat['id'].'@'.$cat['category'];?>"><?php echo $cat['category'];?></option>
	<?php } ?>

