<?php  include('../admin/connect/config.php');error_reporting(1);extract($_POST); 

?>

<option value="">--- Select ---</option>
									<?php $ca=mysql_query("SELECT a.*,b.*,b.id as idd FROM `product` as a inner join sub_category as b on a.subcategory=b.id  WHERE a.category='$catid' AND a.`status`=1");
									while($cat=mysql_fetch_array($ca)){ ?>
									<option value="<?php echo $cat['idd'];?>"><?php echo $cat['sub_categoryname'];?></option>
									<?php }
?>