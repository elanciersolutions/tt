<?php 
$title="Department Profile";
include("header.php");
$csvid=$_SESSION['csvid'];
if(isset($_POST['update'])){
	extract($_POST);
	$in=mysql_query("UPDATE `sponser` SET `name`='$name',`phone`='$mobile',`adhar`='$adhar',`pancard`='$pancard' WHERE `id`='$csvid'") ;
	if($in){
		echo "<script type='text/javascript'>swal({
            title: 'Update Successfully!...',
            type: 'success'
        }, function() {
            window.location = 'profile.php';
        })</script>";
	} 
}

?>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<section id="main-content">
		<section class="wrapper">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<section class="panel">
                        <header class="panel-heading">
							<h4>Profile</h4>
							<div class="xtra_btn_top">
								<a title="BACK" data-placement="top" data-toggle="tooltip" class="btn btn-danger tooltips" onclick="window.history.go(-1); return false;">Back</a>
							</div>
                        </header>
                        <div class="panel-body">
							<?php $sql=mysql_fetch_array(mysql_query("SELECT * FROM `sponser` WHERE `id`='$csvid'")); 
							extract($sql); ?>
                            <form class="cmxform form-horizontal tasi-form" id="" method="post" name="product" enctype="multipart/form-data" >
                                <div class="form-group">
									<label class="col-lg-3 col-md-4 col-sm-4 col-xs-12 control-label" for="category">Name <span class="red">*</span></label>
									<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
										<input type="text" name="name" id="name" value="<?php echo $incharge_name;?>" class="form-control" autocomplete="off" />
									</div>
									
									<label class="col-lg-3 col-md-4 col-sm-4 col-xs-12 control-label" for="pname">Mobile <span class="red">*</span></label>
									<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                        <input readonly type="text" maxlength="10" name="mobile" id="mobile" value="<?php echo $phone;?>" class="form-control" autocomplete="off" />
									</div>
								</div>
								<div class="form-group">
									<label class="col-lg-3 col-md-4 col-sm-4 col-xs-12 control-label" for="category">Pancard No<span class="red">*</span></label>
									<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
										<input type="text" name="pancard" id="pancard" value="<?php echo $pancard;?>" class="form-control" autocomplete="off" />
									</div>
									
									<label class="col-lg-3 col-md-4 col-sm-4 col-xs-12 control-label" for="pname">Adharcard No <span class="red">*</span></label>
									<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                        <input readonly type="text"  name="adhar" id="adhar" value="<?php echo $adhar;?>" class="form-control" autocomplete="off" />
									</div>
								</div>
								<div class="form-group">
								<label class="col-lg-3 col-md-4 col-sm-4 col-xs-12 control-label" for="pname">Sponser Name <span class="red">*</span></label>
									<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                        <input readonly type="text"  name="sponsername" id="sponsername" value="<?php echo $sponsername;?>" class="form-control" autocomplete="off" readonly/>
									</div>
								</div>
                                <div class="form-group last-btn">
                                    <div class="col-lg-offset-2 col-lg-10">
										<button name="update" class="btn btn-primary" type="submit">Save Changes </button>
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