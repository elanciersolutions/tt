<?php 
$title="Subcategory Creation";
include("header.php");
extract($_GET);
if(isset($_POST['submit'])){
extract($_POST);
$num_category = mysql_num_rows(mysql_query("SELECT * FROM sub_category WHERE sub_categoryname='$sub_categoryname'"));
if($num_category < 1)
{
	 $category = explode("@",$category);
	 $dept = explode("@",$department);
$in = mysql_query("INSERT INTO `sub_category` (`dept`,`category`,`sub_categoryname`,`date`,`dtime`,`catid`,`department`) VALUES ('$dept[0]','$category[1]','$sub_categoryname','".date('Y-m-d')."','".date('Y-m-d H:i:s')."','$category[0]','$dept[1]')");
if($in)
{
echo "<script type='text/javascript'>swal({
title: 'Insert Successfully!...',
type: 'success'
}, function() {
window.location = 'subcategory_list.php';
})</script>";
}
}
else{
echo "<script type='text/javascript'>swal({
title: 'Already Exist This Subcategory!...',
type: 'warning',
showCancelButton: true
},
function(){
swal.close();
$('#sub_categoryname').val('');
$('#sub_categoryname').focus();

})</script>";
}
}
if(isset($_POST['update'])){
extract($_POST);
$category = explode("@",$category);
$dept = explode("@",$department);
$in=mysql_query("UPDATE `sub_category` SET `category`='$category[1]',`sub_categoryname`='$sub_categoryname',`catid`='$category[0]',`dept`='$dept[0]',`department`='$dept[1]' WHERE `id`='$id'");
if($in){
echo "<script type='text/javascript'>swal({
title: 'Update Successfully!...',
type: 'success'
}, function() {
window.location = 'subcategory_list.php';
})</script>";
} 
}
?>
<section id="main-content">
<section class="wrapper">
<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<section class="panel">
<header class="panel-heading">
<h4><?php if($_GET['id']!=''){ echo "Update"; } else{ echo "Add"; } ?> Sub Category</h4>
<div class="xtra_btn_top">
<a title="BACK" data-placement="top" data-toggle="tooltip" class="btn btn-danger tooltips" onclick="window.history.go(-1); return false;">Back</a>
</div>
</header>
<div class="panel-body">
<?php 

$sql=mysql_fetch_array(mysql_query("SELECT * FROM `sub_category` WHERE id='$id'")); 
extract($sql); ?>
<form class="cmxform form-horizontal tasi-form" id="" method="post" name="product" enctype="multipart/form-data" >
<div class="form-group">
<label class="col-lg-3 col-md-4 col-sm-4 col-xs-12 control-label" for="department">Department <span class="red">*</span></label>
<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
<select name="department" id="department" class="form-control" onchange="cat_find(this.value)">
<option>Select Department</option>
<?php
$select = mysql_query("select * from department where status=1");										
while($depart = mysql_fetch_array($select))		
{										?>
<option value="<?php echo $depart['id'].'@'.$depart['department'];?>" <?php if($dept == $depart['id']){ echo "selected";}?>><?php echo $depart['department'];?></option>
<?php
}										
?>
</select>

</div>
<label class="col-lg-3 col-md-4 col-sm-4 col-xs-12 control-label" for="pname">Category<span class="red">*</span></label>

<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">

<select name="category" id="category" class="form-control" required >
	<option value="">--- Select ---</option>
	<?php $ca=mysql_query("SELECT * FROM `category` WHERE `status`=1");
	while($cat=mysql_fetch_array($ca)){ ?>
	<option value="<?php echo $cat['id'].'@'.$cat['category'];?>" <?php if($cat['id']==$catid){echo "selected";}?>><?php echo $cat['category'];?></option>
	<?php } ?>
</select>

</div>
</div>
 <div class="form-group">

<label class="col-lg-3 col-md-4 col-sm-4 col-xs-12 control-label" for="pname">Sub Category <span class="red">*</span></label>
<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
<input required type="text" name="sub_categoryname" id="sub_categoryname" value="<?php echo $sub_categoryname;?>" class="form-control" autocomplete="off" />
</div>

</div>
<div class="form-group last-btn">
<div class="col-lg-offset-2 col-lg-10">
<?php if($_GET['id']!=''){ ?>
<button name="update" class="btn btn-primary" type="submit">Save Changes </button>
<?php } else { ?>
<button name="submit" class="btn btn-primary" type="submit">Submit </button>
<?php } ?>
</div>
</div>
</form>
</div>
<footer class="panel-footer">
<div class="xtra_btn_bottom">
<a title="BACK" onclick="window.history.go(-1); return false;" data-placement="top" data-toggle="tooltip" class="btn btn-danger tooltips" href="product_list.php">Back</a>
</div>
</footer>
</section>
</div>
</div>
</section>
</section>
<?php include("footer.php");?>