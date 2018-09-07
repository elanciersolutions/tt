<?php 
$title="CSE";
include("header.php");
extract($_GET);
if(isset($_POST['submit'])){
	extract($_POST);
for($i=0; $i<count($zipcode); $i++)
	{
		 
		 
		 $in = mysql_query("INSERT INTO `cse_count` (`city`,`hubname`,`pincode`,`date`,`dtime`) VALUES ('$cse_cities','$hubname','$zipcode[$i]','".date('Y-m-d')."','".date('Y-m-d H:i:s')."')");
	}
	
	if($in)
	{
	echo "<script type='text/javascript'>swal({
		title: 'Insert Successfully!...',
		type: 'success'
	}, function() {
		window.location = 'cse_list.php';
	})</script>";
	}
}
if(isset($_POST['update']))
{
	extract($_POST);
	
		 $in=mysql_query("UPDATE `cse_count` SET `city`='$cse_cities',`hubname`='$hubname',`pincode`='$zipcode' WHERE `id`='$id'");
	
	
	
	if($in)
	{
		echo "<script type='text/javascript'>swal({
            title: 'Update Successfully!...',
            type: 'success'
        }, function() {
            window.location = 'cse_list.php';
        })</script>";
	} 
}
?>
	<section id="main-content" class="commission">
		<section class="wrapper">
			<div class="page-top-header">
<h2><?php if($_GET['id']!=''){ echo "Update"; } else{ echo "Add"; } ?>  Cse Cities </h2>
<div class="xtra_btn_top" style="padding-left:10px;">
								<a title="BACK" data-placement="top" data-toggle="tooltip" class="btn btn-danger tooltips" onclick="window.history.go(-1); return false;">Back</a>
							</div>
							

</div>
		
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<section class="panel">
                       
                       <div class="panel-body">
							<?php $sql=mysql_fetch_array(mysql_query("SELECT * FROM `cse_count` WHERE id='$id'")); 
							extract($sql); ?>
                            <form class="cmxform form-horizontal tasi-form" id="" method="post" name="product" enctype="multipart/form-data" >
                                <div class="form-group">
									<label class="col-lg-3 col-md-4 col-sm-4 col-xs-12 control-label" for="pname">City <span class="red">*</span></label>
									<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                   <select required  id="cse_cities" name="cse_cities" class="form-control" >
                       <option value="">Select City</option>
                   <?php  $select_city = mysql_query('SELECT * FROM city'); 
				   while($fetch = mysql_fetch_array($select_city)){
					   ?>
					   <option value="<?php echo $fetch['city'];?>" <?php if($fetch['city'] == $city){echo "selected";}?>><?php echo $fetch['city'];?></option>
					   <?php
				   } ?>					   
				 </select>									
									</div>
									<label class="col-lg-3 col-md-4 col-sm-4 col-xs-12 control-label" for="pname">Hub Name<span class="red">*</span></label>
									<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                        <input list="hublist" required type="text" name="hubname" id="hubname" value="<?php echo $hubname;?>" class="form-control" autocomplete="off" />
									
										
                      
                  				   
				 
									</div>
								</div>
								<div class="form-group">
								<input type="hidden" name="rowpincode" id="rowpincode" value="1">
									<label class="col-lg-3 col-md-4 col-sm-4 col-xs-12 control-label" for="price">Zip code <span class="red">*</span></label>
									<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                         <input  type="number" name="zipcode" id="zipcode"  class="form-control" value="<?php echo $pincode;?>" autocomplete="off" maxlength="6"/> <br>
									
									</div>
									
									<?php if($pincode == ""){
										?>
									<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                       <button name="button" class="btn btn-primary" type="button" onclick="dynamic_pincode(zipcode.value)">Add More  </button>
									</div>
									<?php 
									}
									?>
								</div>
								<div id="dynPincode"></div>
								
								<div class="form-group last-btn">
                                    <div class="col-lg-offset-2 col-lg-10">
                                        <?php if($_GET['id']!=''){ ?>
										<button name="update" class="btn btn-primary" type="submit">Save Changes </button>
										<?php } else { ?>
										<button name="submit" class="btn btn-primary" type="submit">submit</button>
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