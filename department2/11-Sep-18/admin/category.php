<?php 
$title="Category";
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
		$fileimage1 = "../images/category/".$image;
		compress_image($tmp, $fileimage1, $width, $height, $quality);
		$img = $image;
	} else {
		$img = 'noimage.jpg';
	}
	$in = mysql_query("INSERT INTO `category` (`category`,`image`,`department`) VALUES ('$category','$img','$department')");
	if($in){
	echo "<script type='text/javascript'>swal({
		title: 'Insert Successfully!...',
		type: 'success'
	}, function() {
		window.location = 'category_list.php';
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
		$fileimage1 = "../images/category/".$image;
		compress_image($tmp, $fileimage1, $width, $height, $quality);
		$img = $image;
		unlink("../images/category/".$old_image);
	} else {
		$img = $old_image;
	}
	$in=mysql_query("UPDATE `category` SET `category`='$category',`image`='$img' WHERE `id`='$id'") ;
	if($in){
		echo "<script type='text/javascript'>swal({
            title: 'Update Successfully!...',
            type: 'success'
        }, function() {
            window.location = 'category_list.php';
        })</script>";
	} 
}
?>
	<section id="main-content" class="commission">
		<section class="wrapper">
			<div class="page-top-header">
<h2><?php if($_GET['id']!=''){ echo "Update"; } else{ echo "Add"; } ?>  Category</h2>
<div class="xtra_btn_top">
								<a title="BACK" data-placement="top" data-toggle="tooltip" class="btn btn-danger tooltips" onclick="window.history.go(-1); return false;">Back</a>
							</div>
</div>
		
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<section class="panel">
                        <!----<header class="panel-heading">
							<h4><?php if($_GET['id']!=''){ echo "Update"; } else{ echo "Add"; } ?>  Category</h4>
							<div class="xtra_btn_top">
								<a title="BACK" data-placement="top" data-toggle="tooltip" class="btn btn-danger tooltips" onclick="window.history.go(-1); return false;">Back</a>
							</div>
                        </header> ---->
                        <div class="panel-body">
							<?php $sql=mysql_fetch_array(mysql_query("SELECT * FROM `category` WHERE id='$id'")); extract($sql);?>
                            <form class="cmxform form-horizontal tasi-form" id="" method="post" name="product" enctype="multipart/form-data" >
                                <div class="form-group">
								
								<label class="col-lg-3 col-md-4 col-sm-4 col-xs-12 control-label" for="category">Department <span class="red">*</span></label>
									<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="department" id="department" value="Grocery" class="form-control" autocomplete="off" readonly />
									</div>
									
									
									<label class="col-lg-3 col-md-4 col-sm-4 col-xs-12 control-label" for="category">Category <span class="red">*</span></label>
									<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="category" id="category" value="<?php echo $category;?>" class="form-control" autocomplete="off" />
									</div>
								</div>
								<div class="form-group">
									<label class="col-lg-3 col-md-4 col-sm-4 col-xs-12 control-label" for="">Category Image</label>
									<div class="col-lg-9 col-md-8 col-sm-8 col-xs-12">
										<div class="fileupload fileupload-new" data-provides="fileupload">
											<div class="fileupload-new thumbnail">
												<?php if($_GET['id']!=''){ ?>
												<img src="../images/category/<?php echo $image;?>" alt="<?php echo $category;?>" />
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