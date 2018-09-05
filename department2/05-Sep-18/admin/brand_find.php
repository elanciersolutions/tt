<?php  include('../admin/connect/config.php');error_reporting(1);extract($_POST); 
 $catid = explode("@",$catid);
 echo "SELECT * FROM `brand` WHERE  `dept`=0 AND `sub_categoryname`='$subid' AND `category`='$catid[0]' AND `status`=1";
?>
<option value="">--- Select ---</option>
<?php $ca=mysql_query("SELECT * FROM `brand` WHERE  `dept`=0 AND `sub_categoryname`='$subid' AND `category`='$catid[0]' AND `status`=1");
while($cat=mysql_fetch_array($ca)){ ?>
<option value="<?php echo $cat['id'];?>"><?php echo $cat['brandname'];?></option>
<?php }
?>

