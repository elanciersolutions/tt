<?php  include('../admin/connect/config.php');error_reporting(1);extract($_POST); ?>
<option value="">--- Select ---</option>
<?php $ca=mysql_query("SELECT * FROM `product` WHERE `dept`=0 AND subcategory='$subid' AND `status`=1");
while($cat=mysql_fetch_array($ca)){ ?>
<option value="<?php echo $cat['product_code'];?>"><?php echo $cat['product_code'];?></option>
<?php }
?>