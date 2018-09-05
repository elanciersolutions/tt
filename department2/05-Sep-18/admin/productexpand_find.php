<?php  include('../admin/connect/config.php');error_reporting(1);extract($_POST); ?>
<option value="">--- Select ---</option>
<?php $ca=mysql_query("SELECT * FROM `product` WHERE `dept`=0 AND subcategory='$subid' AND `brandname`='$brandid' AND `status`=1");

while($cat=mysql_fetch_array($ca)){ ?>
<option value="<?php echo $cat['id'].'&'.$cat['pname'];?>"><?php echo $cat['pname'];?></option>
<?php }
?>