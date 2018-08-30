<?php 
$title="Product List";
include("header.php");
extract($_GET);
if(isset($_POST['submit'])){
	extract($_POST);
	if ($_FILES['image']['name']!='') {
		$main = $_FILES['image']['name'];
		$tmp = $_FILES['image']['tmp_name'];
		$size = $_FILES['image']['size'];
		$extension = getExtension($main);
		$extension = strtolower($extension);
		$m = time() . rand();
		$image = $m . "." . $extension;
		$fileimage1 = "../images/product/".$image;
		compress_image($tmp, $fileimage1, $width, $height, $quality);
		$img = $image;
	} else {
		$img = 'noimage.jpg';
	}
	$num_category = mysql_num_rows(mysql_query("SELECT * FROM product WHERE pname='$product_name'"));
	if($num_category < 1)
	{
    
	mysql_query("INSERT INTO `product` (`dept`,`category`,`subcategory`,`pname`,`date`,`dtime`,`commission`,`gst`,`image`,`price`,`brandname`) VALUES ('$dept','$category','$sub_categoryname','$product_name','".date('Y-m-d')."','".date('Y-m-d H:i:s')."','$commission','$gst','$img','$price','$brandname')");
	echo "<script type='text/javascript'>swal({
		title: 'Insert Successfully!...',
		type: 'success'
	}, function() {
		window.location = 'product_list.php';
	})</script>";
}
else{
	echo "<script type='text/javascript'>swal({
		title: 'Already Exist This Product!...',
		type: 'warning',
        showCancelButton: true
		 },
                    function(){
                        swal.close();
                        $('#product_name').val('');
						$('#product_name').focus();
	
	})</script>";
}
}
if(isset($_POST['update'])){
	extract($_POST);
	if ($_FILES['image']['name']!='') {
		$main = $_FILES['image']['name'];
		$tmp = $_FILES['image']['tmp_name'];
		$size = $_FILES['image']['size'];
		$extension = getExtension($main);
		$extension = strtolower($extension);
		$m = time() . rand();
		$image = $m . "." . $extension;
		$fileimage1 = "../images/product/".$image;
		compress_image($tmp, $fileimage1, $width, $height, $quality);
		$img = $image;
	} else {
		$img = $old_image;
	}
	$in=mysql_query("UPDATE `product` SET `category`='$category',`subcategory`='$sub_categoryname',`pname`='$product_name',`commission`='$commission',`gst`='$gst',image='$img',`price`='$price',`brandname`='$brandname' WHERE `id`='$id'");
	if($in){
		echo "<script type='text/javascript'>swal({
            title: 'Update Successfully!...',
            type: 'success'
        }, function() {
            window.location = 'product_list.php';
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
							<h4><?php if($_GET['id']!=''){ echo "Update"; } else{ echo "Add"; } ?> Product</h4>
							<div class="xtra_btn_top">
								<a title="BACK" data-placement="top" data-toggle="tooltip" class="btn btn-danger tooltips" onclick="window.history.go(-1); return false;">Back</a>
							</div>
                        </header>
                        <div class="panel-body">
							<?php 
							$dept1 = sessionvalue('department',$dept);
							$sql=mysql_fetch_array(mysql_query("SELECT * FROM `product` WHERE id='$id'")); 
							extract($sql); ?>
                            <form class="cmxform form-horizontal tasi-form" id="" method="post" name="product" enctype="multipart/form-data" >
                                <div class="form-group">
									<label class="col-lg-3 col-md-4 col-sm-4 col-xs-12 control-label" for="department">Category <span class="red">*</span></label>
									<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
										<!--<select name="category" id="category" class="form-control" required onchange="subcategory(this.value,<?php echo $dept1;?>)" >
											<option value="">--- Select ---</option>
											<?php $ca=mysql_query("SELECT `id`,`category` FROM `category` WHERE `dept`='$dept1' or `dept`=0 AND `status`=1");
											while($cat=mysql_fetch_array($ca)){ $cateid = $cat['id']; ?>
											<option value="<?php echo $cat['id'];?>" <?php if($cat['id']==$category){echo "selected";}?>><?php echo $cat['category'];?></option>
											<?php } ?>
										</select>-->
										<input required type="text" name="category" id="category" value="<?php $departmen = mysql_fetch_array(mysql_query("SELECT * FROM department WHERE id='$dept1'")); echo  $departmen['department'];?>" class="form-control" autocomplete="off" readonly />
									</div>
									
								<label class="col-lg-3 col-md-4 col-sm-4 col-xs-12 control-label" for="pname">Sub Category <!--<span class="red">*</span>--></label>
									<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
									
                                        <select name="sub_categoryname" id="sub_categoryname" class="form-control" onchange="brand_fetch(this.value,<?php echo $dept1;?>,category.value )" >
										<option value="">--- Select ---</option>
											<?php
											 $ca=mysql_query("SELECT * FROM `sub_category` WHERE `dept`='$dept' AND `status`=1");
											
											while($cat=mysql_fetch_array($ca)){ ?>
											<option value="<?php echo $cat['id'];?>" <?php if($cat['id'] == $subcategory){echo "selected";}?>><?php echo $cat['sub_categoryname'];?></option>
											<?php }	
											?>
										</select>
									</div>
								</div>
								<div class="form-group">
								<label class="col-lg-3 col-md-4 col-sm-4 col-xs-12 control-label" for="pname">Brand <!--<span class="red">*</span>--></label>
									<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
									
                                        <select name="brandname" id="brandname" class="form-control"  >
										<option value="">--- Select ---</option>
											
										</select>
									</div>
								</div>
								<div class="form-group">
								
									<label class="col-lg-3 col-md-4 col-sm-4 col-xs-12 control-label" for="pname">Product Name <span class="red">*</span></label>
									<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                        <input required type="text" name="product_name" id="product_name" value="<?php echo $product_name;?>" class="form-control" autocomplete="off" />
									</div>
									
									<label class="col-lg-3 col-md-4 col-sm-4 col-xs-12 control-label" for="price">Product Price <span class="red">*</span></label>
									<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="price" id="price" value="<?php echo $price;?>" class="form-control" autocomplete="off" />
									</div>
								
							
								</div>
								<div class="form-group">
							
								<label class="col-lg-3 col-md-4 col-sm-4 col-xs-12 control-label" for="commission">Cashback Offer <span class="red">*</span></label>
									<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="commission" id="commission" value="<?php echo $commission;?>" class="form-control" autocomplete="off" />
									</div>
										<div class="form-group">
									<label class="col-lg-3 col-md-4 col-sm-4 col-xs-12 control-label" for="gst">GST (%)<span class="red">*</span></label>
									<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="gst" id="gst" value="<?php echo $gst;?>" class="form-control" autocomplete="off" />
									</div>
								</div>
								</div>
								
								<div class="form-group">
									<label class="col-lg-3 col-md-4 col-sm-4 col-xs-12 control-label" for="">Product Image</label>
									<div class="col-lg-9 col-md-8 col-sm-8 col-xs-12">
										<div class="fileupload fileupload-new" data-provides="fileupload">
											<div class="fileupload-new thumbnail">
												<?php if($_GET['id']!=''){ ?>
												<img src="../images/product/<?php echo $image;?>" alt="<?php echo $pname;?>" />
												<input type="hidden" name="old_image" value="<?php echo $image;?>" />
												<?php } else { ?>
												<img src="designs/noimage.png" alt="Empty"/>
												<?php } ?>
											</div>
											<div class="fileupload-preview fileupload-exists thumbnail"></div>
											<div>
												<span class="btn btn-white btn-file">
													<span class="fileupload-new"><i class="fa-paperclip"></i> Select image</span>
													<span class="fileupload-exists"><i class="fa-undo"></i> Change</span>
													<input class="default" type="file" name="image">
												</span>
												<a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa-trash"></i> Remove</a>
											</div>
										</div>
										<p class="help-block label-danger"><i class="fa fa-exclamation-triangle"></i> Attached image thumbnail is supported in Latest Firefox, Chrome, Opera, Safari and Internet Explorer 10 only. <b>Upload Image size of 365 X 385</b></p>
									</div>
								</div>
								
								<div class="form-group">
									<label class="col-lg-3 col-md-4 col-sm-4 col-xs-12 control-label" for="commission">Featured <span class="red">*</span></label>
									<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                        <input type="checkbox" name="featured" id="featured" value="1" <?php if($featured==1){ echo "checked"; }?> autocomplete="off" />
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