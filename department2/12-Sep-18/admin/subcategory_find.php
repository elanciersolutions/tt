<?php  include('../admin/connect/config.php');error_reporting(1);extract($_POST); 
$catid = explode("@",$catid); 
$deptid = explode("@",$deptid); 

?>

<option value="">--- Select ---</option>
									<?php $ca=mysql_query("SELECT * FROM `sub_category` WHERE `dept`='$deptid[0]' AND catid='$catid[0]' AND `status`=1");
									while($cat=mysql_fetch_array($ca)){ ?>
									<option value="<?php echo $cat['id'];?>"><?php echo $cat['sub_categoryname'];?></option>
									<?php }
?>