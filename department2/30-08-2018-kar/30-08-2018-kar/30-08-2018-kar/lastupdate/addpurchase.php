<?php 
$title="Purchase Entry";
include("header.php");
extract($_GET);
if(isset($_POST['submit'])){
	extract($_POST);
	for($i=0; $i<count($pname);$i++)
	{
	 $exisit_product = mysql_num_rows(mysql_query("SELECT * FROM addpurchase WHERE `product_name`='$pname[$i]' AND `category_name`='$category' "));		
	 if($exisit_product < 1)
	 {
		 
	$in = mysql_query("INSERT INTO `temp_purchase` (`category_name`,`product_name`,`subcategory`,`price`,`commission`,`purchase_date`,`dtime`,`stock`,`dept`,`gst`,`brandname`) VALUES ('$category','$pname[$i]','$subname[$i]','$price[$i]','$commission[$i]','".date('Y-m-d')."','".date('Y-m-d H:i:s')."','$stock[$i]','$dept','$gst[$i]','$brandname[$i]')");
	 }
	 else{
		 
		 $product_stock = mysql_fetch_array(mysql_query("SELECT * FROM temp_purchase WHERE `product_name`='$pname[$i]' AND `category_name`='$category' "));	
		 
         $product_stock['stock'].'<br>';
         $up_stock = $product_stock['stock'] + $stock[$i];

        $up = mysql_query("UPDATE `temp_purchase` SET stock='$up_stock' WHERE `product_name`='$pname[$i]' AND `category_name`='$category'");		 
		 
	 }
	 $in = mysql_query("INSERT INTO `addpurchase` (`category_name`,`product_name`,`subcategory`,`price`,`commission`,`purchase_date`,`dtime`,`stock`,`dept`,`gst`,`brandname`) VALUES ('$category','$pname[$i]','$subname[$i]','$price[$i]','$commission[$i]','".date('Y-m-d')."','".date('Y-m-d H:i:s')."','$stock[$i]','$dept','$gst[$i]','$brandname[$i]')");
	}
	if($in)
	{
	echo "<script type='text/javascript'>swal({
		title: 'Insert Successfully!...',
		type: 'success'
	}, function() {
		window.location = 'purchase.php';
	})</script>";
	}
}
if(isset($_POST['update']))
{
	extract($_POST);
	$in=mysql_query("UPDATE `addpurchase` SET `category_name`='$category',`subcategory`='$sub_categoryname',`product_name`='$product_name[1]',`brandname`='$brandname',`price`='$price',`commission`='$commission',`gst`='$gst',`stock`='$stock' WHERE `id`='$id'");
	if($in){
		echo "<script type='text/javascript'>swal({
            title: 'Update Successfully!...',
            type: 'success'
        }, function() {
            window.location = 'purchase.php';
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
							<h4><?php if($_GET['id']!=''){ echo "Update"; } else{ echo "Add"; } ?>  Purchase</h4>
							<div class="xtra_btn_top">
								<a title="BACK" data-placement="top" data-toggle="tooltip" class="btn btn-danger tooltips" onclick="window.history.go(-1); return false;">Back</a>
							</div>
                        </header>
                        <div class="panel-body">
							<?php 
							$dept1 = sessionvalue('department',$dept);
						    $sql=mysql_fetch_array(mysql_query("SELECT * FROM `addpurchase` WHERE id='$id'")); 
							extract($sql); $brandid = $sql['brandname']; $product_name = $sql['product_name']; $purid=$sql['id']; ?>
                            <form class="cmxform form-horizontal tasi-form" id="product" method="post" name="product" enctype="multipart/form-data" >
                             
								  <div class="form-group">
									<label class="col-lg-3 col-md-4 col-sm-4 col-xs-12 control-label" for="department">Category <span class="red">*</span></label>
									<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
										
										<input type="text" name="category" id="category" value="<?php $departmen = mysql_fetch_array(mysql_query("SELECT * FROM department WHERE id='$dept1'")); echo  $departmen['department'];?>" class="form-control" autocomplete="off" readonly />
									</div>
									
								<label class="col-lg-3 col-md-4 col-sm-4 col-xs-12 control-label" for="pname">Sub Category <span class="red">*</span></label>
									<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
									
                                        <select name="sub_categoryname" id="sub_categoryname" class="form-control selectpicker" data-show-subtext="true" data-live-search="true"   onchange="brand_fetch(this.value,<?php echo $dept1;?>,category.value )">
										<option value="">--- Select ---</option>
											<?php $ca=mysql_query("SELECT * FROM `sub_category` WHERE `dept`='$dept1' AND `status`=1");
											while($cat=mysql_fetch_array($ca)){ ?>
											<option value="<?php echo $cat['id'];?>" <?php if($cat['id'] == $subcategory){echo "selected";}?>><?php echo $cat['sub_categoryname'];?></option>
											<?php }	
											?>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-lg-3 col-md-4 col-sm-4 col-xs-12 control-label" for="price">Brand Name <span class="red">*</span></label>
									<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                       
										
										 <select name="brandname" id="brandname" class="form-control " onchange="product_expand(this.value,<?php echo $dept1;?>,sub_categoryname.value)" >
										 <option value="">--- Select ---</option>
										 
										 <?php 
										    if($brandid != "")
											{
										   $ca=mysql_query("SELECT * FROM `brand` WHERE  `dept`='$dept' AND `id`='$brandid' AND `status`=1");
											while($cat=mysql_fetch_array($ca)){ ?>
											<option value="<?php echo $cat['id'];?>" <?php if($cat['id'] == $brandid){echo "selected";}?>><?php echo $cat['brandname'];?></option>
											<?php }
											 }
?>									
										 </select>
										
										
									</div>
									
									<label class="col-lg-3 col-md-4 col-sm-4 col-xs-12 control-label" for="commission">Product Name <span class="red">*</span></label>
									<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                      
									    <select name="product_name" id="product_name" class="form-control" onchange="product_price(this.value,<?php echo $dept1;?>,sub_categoryname.value,brandname.value)" >
										<option value="">--- Select ---</option>
											<?php 
										    if($product_name != "")
											{
										   $ca=mysql_query("SELECT * FROM `product` WHERE  `dept`='$dept' AND `pname`='$product_name' AND `status`=1");
											while($cat=mysql_fetch_array($ca)){ ?>
											<option value="<?php echo $cat['pname'];?>" <?php if($cat['pname'] == $product_name){echo "selected";}?>><?php echo $cat['pname'];?></option>
											<?php }
											}
											
?>
										</select>
									   
									</div>
									
									
								</div>
								<div class="form-group">
									<label class="col-lg-3 col-md-4 col-sm-4 col-xs-12 control-label" for="price">Price <span class="red">*</span></label>
									<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                        <input  type="number" name="price" id="price" value="<?php echo $price;?>" class="form-control" autocomplete="off" readonly />
									</div>
									
									<label class="col-lg-3 col-md-4 col-sm-4 col-xs-12 control-label" for="commission">Cash Pack <span class="red">*</span></label>
									<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                        <input type="number" name="commission" id="commission" value="<?php echo $commission;?>" class="form-control" autocomplete="off" readonly />
									</div>
								</div>
								<div class="form-group">
									<label class="col-lg-3 col-md-4 col-sm-4 col-xs-12 control-label" for="gst">GST (%)<span class="red">*</span></label>
									<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                      <input type="text" name="gst" id="gst" value="<?php echo $gst;?>" class="form-control" autocomplete="off" readonly />
									</div>
								<label class="col-lg-3 col-md-4 col-sm-4 col-xs-12 control-label" for="commission">Stock <span class="red">*</span></label>
									<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                        <input   type="number" name="stock" id="stock" value="<?php echo $stock;?>" class="form-control" autocomplete="off" />
										
									</div>
									</div>
									
									<?php if($purid == "")
									{
										?>
									<div class="form-group last-btn">
                                    <div class="col-lg-offset-2 col-lg-10">
                                       
										<button name="button" class="btn btn-primary" type="button" onclick="dynamic_purchase(product_name.value,price.value,gst.value,commission.value,stock.value,tr_count.value,sub_categoryname.value,brandname.value)">Add More </button>
										
                                    </div>
                                </div>
								
								<div id="table_div" style="display:none">
								
								<table class="display table table-bordered cf" id="dyntable">
									<thead>
									<input type="hidden" name="tr_count" id="tr_count" value="1">
										<tr>
											<th>S.No</th>
											<th>Product Name</th>
											<th>Price</th>
											<th>GST</th>
											<th>Commission</th>
											<th>Stock</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody id="product_tobody">
									</tbody>
									</table>
								<div class="form-group last-btn">
                                    <div class="col-lg-offset-2 col-lg-10">
                                        <?php if($_GET['id']!=''){ ?>
										<button name="update" class="btn btn-primary" type="submit">Save Changes </button>
										<?php } else { ?>
										<button name="submit" class="btn btn-primary" type="submit">Submit </button>
										<?php } ?>
                                    </div>
                                </div>
								</div>
								<?php 
									}
									else{
										?>
										<div class="form-group last-btn">
                                    <div class="col-lg-offset-2 col-lg-10">
                                        
										<button name="update" class="btn btn-primary" type="submit">Save Changes </button>
										
                                    </div>
                                </div>
										<?php
									}
									?>
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