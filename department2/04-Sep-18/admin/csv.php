<?php 
$title="CSE";
include("header.php");
extract($_GET);
if(isset($_POST['submit'])){
	extract($_POST);	
	for($i=0; $i<count($pin); $i++)
	{
		 $pin1 .= $pin[$i].',';
	}
	$pincode = rtrim($pin1,',');
	$in= mysql_query("INSERT INTO `sponser` (`incharge_name`,`pancard`,`adhar`,`phone`,`sponsername`,`sponserid`,`date`,`dtime`,`sp_password`,`assign_city`,`assign_pincode`) VALUES ('$incharge_name','$pancard','$adhar','$phone','$sponsername','$sponserid','".date('Y-m-d')."','".date('Y-m-d H:i:s')."','$sp_password','$cse_cities','$pincode')");
	if($in){
	echo "<script type='text/javascript'>swal({
		title: 'Insert Successfully!...',
		type: 'success'
	}, function() {
		window.location = 'csv_list.php';
	})</script>";
	}
}
if(isset($_POST['update'])){
	extract($_POST);
	
	$in=mysql_query("UPDATE `sponser` SET `incharge_name`='$incharge_name',`pancard`='$pancard',`adhar`='$adhar',`phone`='$phone',`sponsername`='$sponsername',`sponserid`='$sponserid',`sp_password`='$sp_password' WHERE `id`='$id'");
	if($in){
		echo "<script type='text/javascript'>swal({
            title: 'Update Successfully!...',
            type: 'success'
        }, function() {
            window.location = 'csv_list.php';
        })</script>";
	} 
}
?>
	<section id="main-content" class="commission">
		<section class="wrapper">
			<div class="page-top-header">
<h2><?php if($_GET['id']!=''){ echo "Update"; } else{ echo "Add"; } ?>  CSE </h2>

<div class="xtra_btn_top" style="padding-left:10px;">
								<a title="BACK" data-placement="top" data-toggle="tooltip" class="btn btn-danger tooltips" onclick="window.history.go(-1); return false;">Back</a>
							</div>
							<div class="xtra_btn_top">
								<a title="New" href="cse_list.php" data-placement="top" data-toggle="tooltip" class="btn btn-success tooltips" >List Cse Cities</a>
							</div>

</div>
		
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<section class="panel">
                        <!---<header class="panel-heading">
							<h4><?php if($_GET['id']!=''){ echo "Update"; } else{ echo "Add"; } ?>  Dept Members</h4>
							<div class="xtra_btn_top">
								<a title="BACK" data-placement="top" data-toggle="tooltip" class="btn btn-danger tooltips" onclick="window.history.go(-1); return false;">Back</a>
							</div>
                        </header> --->
                        <div class="panel-body">
							<?php $sql=mysql_fetch_array(mysql_query("SELECT * FROM `sponser` WHERE id='$id'")); 
							extract($sql); ?>
                            <form class="cmxform form-horizontal tasi-form" id="" method="post" name="product" enctype="multipart/form-data" >
                                <div class="form-group">
									<label class="col-lg-3 col-md-4 col-sm-4 col-xs-12 control-label" for="pname">Incharge Name <span class="red">*</span></label>
									<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                        <input required type="text" name="incharge_name" id="incharge_name" value="<?php echo $incharge_name;?>" class="form-control" autocomplete="off" />
									</div>
									<label class="col-lg-3 col-md-4 col-sm-4 col-xs-12 control-label" for="pname">PanCard No<span class="red">*</span></label>
									<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                        <input required type="text" name="pancard" id="pancard" value="<?php echo $pancard;?>" class="form-control" autocomplete="off" />
									</div>
								</div>
								<div class="form-group">
									<label class="col-lg-3 col-md-4 col-sm-4 col-xs-12 control-label" for="price">Adhar card No </label>
									<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="adhar" id="adhar" value="<?php echo $adhar;?>" class="form-control" autocomplete="off" />
									</div>
									
									<label class="col-lg-3 col-md-4 col-sm-4 col-xs-12 control-label" for="commission">Mobile <span class="red">*</span></label>
									<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                        <input required type="text" name="phone" id="phone" value="<?php echo $phone;?>" class="form-control" autocomplete="off" />
									</div>
								</div>
								<div class="form-group">
									<label class="col-lg-3 col-md-4 col-sm-4 col-xs-12 control-label" for="price">Find Sponser<span class="red">*</span></label>
									<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                        <input  type="text" list="sponserfind" name="sponser" id="sponser"  class="form-control" autocomplete="off"  onkeyup="find_sponser(this.value)" onselect="find_sponser(this.value)"/>
										<datalist id="sponserfind">
										<?php 
										$select_sponser = mysql_query("SELECT * FROM `login_users`");
										while($fetch_sponser = mysql_fetch_array($select_sponser))
										{
										?>
										<option value="<?php echo $fetch_sponser['username'];?>"><?php echo $fetch_sponser['username'];?></option>
										<?php
										}
										?>
										</datalist>
										<input type="hidden" name="sponserid" id="sponserid">
									</div>
									
									<label class="col-lg-3 col-md-4 col-sm-4 col-xs-12 control-label" for="commission">Sponser FullName <span class="red">*</span></label>
									<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                        <input required type="text" name="sponsername" id="sponsername" value="<?php echo $sponsername;?>" class="form-control" autocomplete="off" readonly/>
									</div>
								</div>
								<div class="form-group">
									<label class="col-lg-3 col-md-4 col-sm-4 col-xs-12 control-label" for="commission">Password <span class="red">*</span></label>
									<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                        <input required type="text" name="sp_password" id="sp_password" value="<?php echo $sp_password;?>" class="form-control" autocomplete="off" />
									</div>
								</div>
						<div class="form-group">
						<label class="col-lg-3 col-md-4 col-sm-4 col-xs-12 control-label" for="pname">Cse Cities <span class="red">*</span></label><div class="col-lg-3 col-md-6 col-sm-6 col-xs-12"><select required  id="cse_cities" name="cse_cities" class="form-control" onchange="hubpin_name(this.value)" ><option value="">Select City</option>
                   <?php  $select_city = mysql_query('SELECT * FROM cse_count GROUP BY `city`'); 
				   while($fetch = mysql_fetch_array($select_city)){
					   ?>
					   <option value="<?php echo $fetch['city'];?>" <?php if($fetch['city'] == $assign_city){echo "selected";}?>><?php echo $fetch['city'];?></option>
					   <?php
				   } ?>					   
				 </select></div>
				 <label class="col-lg-3 col-md-4 col-sm-4 col-xs-12 control-label" for="pname">Select Hub & Pincode<span class="red">*</span></label>
				 <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12" style="display:none;" id="hubpin_div1" >
				 <?php if($assign_city != "")
				 {
			    ?>
				<?php	 
				 }else{?>
				 
				 <div class="form-control" style="height:auto;" id="hubpin_div"  >
				 </div>
				 
				 <?php 
				 }
				 ?></div>
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