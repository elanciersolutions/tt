<?php 
$title="Department";
include("header.php");
extract($_GET);
if(isset($_POST['submit'])){
extract($_POST);
$dept1 = sessionvalue('department',$dept);
$num_depart = mysql_num_rows(mysql_query("SELECT * FROM inner_department WHERE `department`='$department'"));
if($num_depart < 1){
$in = mysql_query("INSERT INTO `inner_department` (`dept`,`department`) VALUES ('$dept1','$department')");
if($in){
echo "<script type='text/javascript'>swal({
title: 'Insert Successfully!...',
type: 'success'
}, function() {
window.location = 'department_list.php';
})</script>";
}
}
else{
echo "<script type='text/javascript'>swal({
title: 'Already Exist This Department!...',
type: 'warning',
showCancelButton: true
},
function(){
	swal.close();
	$('#department').val('');
	$('#department').focus();

})</script>";
}
}
if(isset($_POST['update']))
{
extract($_POST);
$num_depart = mysql_num_rows(mysql_query("SELECT * FROM inner_department WHERE `department`='$department'"));
//if($num_depart < 1){
$in=mysql_query("UPDATE `inner_department` SET `department`='$department' WHERE `id`='$id'") ;

if($in){
echo "<script type='text/javascript'>swal({
title: 'Update Successfully!...',
type: 'success'
}, function() {
window.location = 'department_list.php';
})</script>";
} 
/*}
else{
echo "<script type='text/javascript'>swal({
title: 'Already Exist This Department!...',
type: 'warning',
showCancelButton: true
},
function(){
	swal.close();
	$('#department').val('');
	$('#department').focus();

})</script>";
}*/
}
?>
<section id="main-content">
<section class="wrapper">
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<section class="panel">
			<header class="panel-heading">
				<h4><?php if($_GET['id']!=''){ echo "Update"; } else{ echo "Add"; } ?>  Department</h4>
				<div class="xtra_btn_top">
					<a title="BACK" data-placement="top" data-toggle="tooltip" class="btn btn-danger tooltips" onclick="window.history.go(-1); return false;">Back</a>
				</div>
			</header>
			<div class="panel-body">
				<?php $sql=mysql_fetch_array(mysql_query("SELECT * FROM `inner_department` WHERE id='$id'")); extract($sql);?>
				<form class="cmxform form-horizontal tasi-form" id="" method="post" name="product" enctype="multipart/form-data" >
					<div class="form-group">
						<label class="col-lg-3 col-md-4 col-sm-4 col-xs-12 control-label" for="department">Department <span class="red">*</span></label>
						<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
							<input type="text" required name="department" id="department" value="<?php echo $department;?>" class="form-control" autocomplete="off" />
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
					<a title="BACK" onclick="window.history.go(-1); return false;" data-placement="top" data-toggle="tooltip" class="btn btn-danger tooltips" href="#">Back</a>
				</div>
			</footer>
		</section>
	</div>
</div>
</section>
</section>
<?php include("footer.php");?>