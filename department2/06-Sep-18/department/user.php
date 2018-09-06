<?php 
$title="User Creation";
include("header.php");
extract($_GET);
if(isset($_POST['submit'])){
	extract($_POST);
	$num_user = mysql_num_rows(mysql_query("SELECT * FROM user WHERE `mobile`='$mobile'"));
  if($num_user < 1)
  {
	$in= mysql_query("INSERT INTO `user` (`dept`,`department`,`name`,`mobile`,`password`,`date`,`dtime`) VALUES ('$dept','$department','$name','$mobile','$password','".date('Y-m-d')."','".date('Y-m-d H:i:s')."')");
	if($in){
	echo "<script type='text/javascript'>swal({
		title: 'Insert Successfully!...',
		type: 'success'
	}, function() {
		window.location = 'user_list.php';
	})</script>";
	}
  }
  else{
	  echo "<script type='text/javascript'>swal({
title: 'Already Exist This Mobile No!...',
type: 'warning',
showCancelButton: true
},
function(){
	swal.close();
	$('#mobile').val('');
	$('#mobile').focus();

})</script>";
  }
}
if(isset($_POST['update'])){
	extract($_POST);
	$in=mysql_query("UPDATE `user` SET `dept`='$dept',`department`='$department',`name`='$name',`mobile`='$mobile',`password`='$password' WHERE `id`='$id'");
	if($in){
		echo "<script type='text/javascript'>swal({
            title: 'Update Successfully!...',
            type: 'success'
        }, function() {
            window.location = 'user_list.php';
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
							<h4><?php if($_GET['id']!=''){ echo "Update"; } else{ echo "Add"; } ?>  User</h4>
							<div class="xtra_btn_top">
								<a title="BACK" data-placement="top" data-toggle="tooltip" class="btn btn-danger tooltips" onclick="window.history.go(-1); return false;">Back</a>
							</div>
                        </header>
                        <div class="panel-body">
							<?php 
							$dept1 = sessionvalue('department',$dept);
							$sql=mysql_fetch_array(mysql_query("SELECT * FROM `user` WHERE id='$id'")); 
							extract($sql); ?>
                            <form class="cmxform form-horizontal tasi-form" id="" method="post" name="product" enctype="multipart/form-data" >
                                <div class="form-group">
									<label class="col-lg-3 col-md-4 col-sm-4 col-xs-12 control-label" for="department">Department <span class="red">*</span></label>
									<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
										<select name="department" id="department" class="form-control" required >
											<option value="">--- Select ---</option>
											<?php $ca=mysql_query("SELECT `id`,`department` FROM `inner_department` WHERE `dept`='$dept1' AND `status`=1");
											while($cat=mysql_fetch_array($ca)){ ?>
											<option value="<?php echo $cat['id'];?>" <?php if($cat['id']==$department){echo "selected";}?>><?php echo $cat['department'];?></option>
											<?php } ?>
										</select>
									</div>
									
									<label class="col-lg-3 col-md-4 col-sm-4 col-xs-12 control-label" for="pname"> Name <span class="red">*</span></label>
									<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                        <input required type="text" name="name" id="name" value="<?php echo $name;?>" class="form-control" autocomplete="off" />
									</div>
								</div>
								<div class="form-group">
									<label class="col-lg-3 col-md-4 col-sm-4 col-xs-12 control-label" for="price">Mobile <span class="red">*</span></label>
									<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                        <input required type="text" name="mobile" id="mobile" value="<?php echo $mobile;?>" class="form-control" autocomplete="off" />
									</div>
									
									<label class="col-lg-3 col-md-4 col-sm-4 col-xs-12 control-label" for="commission">Password <span class="red">*</span></label>
									<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                        <input required type="text" name="password" id="password" value="<?php echo $password;?>" class="form-control" autocomplete="off" />
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