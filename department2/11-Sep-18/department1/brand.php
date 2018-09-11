<?php 
$title="Brand Creation";
include("header.php");
extract($_GET);
if(isset($_POST['submit']))
{
extract($_POST);
$num_brand = mysql_num_rows(mysql_query("SELECT * FROM brand WHERE brandname='$brandname' AND `sub_categoryname`='$sub_categoryname'"));
if($num_brand < 1)
{
mysql_query("INSERT INTO `brand` (`dept`,`category`,`sub_categoryname`,`brandname`,`date`,`dtime`,`department`) VALUES ('$dept','$category','$sub_categoryname','$brandname','".date('Y-m-d')."','".date('Y-m-d H:i:s')."','$department')");
echo "<script type='text/javascript'>swal({
title: 'Insert Successfully!...',
type: 'success'
}, function() {
window.location = 'brand_list.php';
})</script>";
}

else{
echo "<script type='text/javascript'>swal({
title: 'Already Exist This Brand!...',
type: 'warning',
showCancelButton: true
},
	function(){
		swal.close();
		$('#brandname').val('');
		$('#brandname').focus();

})</script>";
}
}
if(isset($_POST['update'])){
extract($_POST);

$in=mysql_query("UPDATE `brand` SET `category`='$category',`sub_categoryname`='$sub_categoryname',`brandname`='$brandname' WHERE `id`='$id'");
if($in){
echo "<script type='text/javascript'>swal({
title: 'Update Successfully!...',
type: 'success'
}, function() {
window.location = 'brand_list.php';
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
			<h4><?php if($_GET['id']!=''){ echo "Update"; } else{ echo "Add"; } ?> Brand</h4>
			<div class="xtra_btn_top">
				<a title="BACK" data-placement="top" data-toggle="tooltip" class="btn btn-danger tooltips" onclick="window.history.go(-1); return false;">Back</a>
			</div>
		</header>
		<div class="panel-body">
			<?php 
			$dept1 = sessionvalue('department',$dept);
			$sql=mysql_fetch_array(mysql_query("SELECT * FROM `brand` WHERE id='$id'")); 
			
			extract($sql); ?>
			<form class="cmxform form-horizontal tasi-form" id="" method="post" name="product" enctype="multipart/form-data" >
				<div class="form-group">
					<label class="col-lg-3 col-md-4 col-sm-4 col-xs-12 control-label" for="department">Category <span class="red">*</span></label>
					<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
					<input type="hidden" name="department" id="department" value="Grocery" class="form-control" autocomplete="off" readonly />
						<select name="category" id="category" class="form-control" required  onchange="subcategory(this.value,<?php echo $dept1;?>)">
<option value="">--- Select ---</option>
<?php $ca=mysql_query("SELECT * FROM `category` WHERE `status`=1");
while($cat=mysql_fetch_array($ca)){ ?>
<option value="<?php echo $cat['id'].'@'.$cat['category'];?>" <?php if($cat['id']==$category){echo "selected";}?>><?php echo $cat['category'];?></option>
<?php } ?>
</select>
					</div>
					
					
					
				<label class="col-lg-3 col-md-4 col-sm-4 col-xs-12 control-label" for="pname">Sub Category <span class="red">*</span></label>
						<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
						<select name="sub_categoryname" id="sub_categoryname" class="form-control selectpicker1" required  data-show-subtext="true" data-live-search="true" >
						<option>---Select Brand---</option>
						<?php $ca=mysql_query("SELECT * FROM `sub_category` WHERE   `status`=1");
						
							while($cat=mysql_fetch_array($ca)){ ?>
							<option value="<?php echo $cat['id'];?>" <?php if($cat['id'] == $sub_categoryname){echo "selected";}?>><?php echo $cat['sub_categoryname'];?></option>
							<?php }	
							?>
							
						</select>
					</div>
				</div>
				
				 <div class="form-group">
				
				<label class="col-lg-3 col-md-4 col-sm-4 col-xs-12 control-label" for="pname">Brand Name<span class="red">*</span></label>
					<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
						<input required type="text" name="brandname" id="brandname" value="<?php echo $brandname;?>" class="form-control" autocomplete="off" />
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