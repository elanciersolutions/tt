<?php 
$title="Purchase Entry";
include("header.php");
extract($_GET);
if(isset($_POST['submit'])){
extract($_POST);
$dept1 = sessionvalue('department',$dept);
for($i=0; $i<count($pname);$i++)
{
 $exisit_product = mysql_num_rows(mysql_query("SELECT * FROM addpurchase WHERE `product_name`='$pname[$i]'"));		
if($exisit_product < 1)
{

$in = mysql_query("INSERT INTO `temp_purchase` (`category_name`,`product_name`,`subcategory`,`price`,`commission`,`purchase_date`,`dtime`,`stock`,`dept`,`gst`,`brandname`) VALUES ('$category_name[$i]','$pname[$i]','$subname[$i]','$price[$i]','$commission[$i]','".date('Y-m-d')."','".date('Y-m-d H:i:s')."','$stock[$i]','$dept1','$gst[$i]','$brandname[$i]')");
}
else{

$product_stock = mysql_fetch_array(mysql_query("SELECT * FROM temp_purchase WHERE `product_name`='$pname[$i]' AND `category_name`='$category_name[$i]' "));	

$product_stock['stock'].'<br>';
$up_stock = $product_stock['stock'] + $stock[$i];

$up = mysql_query("UPDATE `temp_purchase` SET stock='$up_stock' WHERE `product_name`='$pname[$i]' AND `category_name`='$category_name[$i]'");		 

}
$in = mysql_query("INSERT INTO `addpurchase` (`category_name`,`product_name`,`subcategory`,`price`,`commission`,`purchase_date`,`dtime`,`stock`,`dept`,`gst`,`brandname`) VALUES ('$category_name[$i]','$pname[$i]','$subname[$i]','$price[$i]','$commission[$i]','".date('Y-m-d')."','".date('Y-m-d H:i:s')."','$stock[$i]','$dept','$gst[$i]','$brandname[$i]')");
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
$in=mysql_query("UPDATE `addpurchase` SET `category_name`='$category_name',`subcategory`='$sub_categoryname',`product_name`='$product_name[1]',`brandname`='$brandname',`price`='$price',`commission`='$commission',`gst`='$gst',`stock`='$stock' WHERE `id`='$id'");
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
	$sql=mysql_fetch_array(mysql_query("SELECT * FROM `temp_purchase` WHERE `id`='$id'")); 
	extract($sql); $brandid = $sql['brandname']; $product_name = $sql['product_name']; $purid=$sql['id']; ?>
	<form class="cmxform form-horizontal tasi-form" id="product" method="post" name="product" enctype="multipart/form-data" >
	      
          <div class="form-group">
			<label class="col-lg-3 col-md-4 col-sm-4 col-xs-12 control-label" for="department">Supplier <span class="red">*</span></label>
			<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
		<select name="supplier1" id="supplier1" class="form-control">
			<option value="">--- Select ---</option>
			<?php $ca=mysql_query("SELECT * FROM `supplier`");
			while($cat=mysql_fetch_array($ca)){ ?>
			<option value="<?php echo $cat['id'];?>"><?php echo $cat['supplier'];?></option>
			<?php } ?>
     </select>
			</div>
		
			<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
			<button class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal"  type="button">Add Supplier</button>
			</div>
		</div>		
 

        <div class="form-group">
			<label class="col-lg-3 col-md-4 col-sm-4 col-xs-12 control-label" for="department">Category <span class="red">*</span></label>
			<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
		<select name="category" id="category" class="form-control"   onchange="subcategory_purchase(this.value,<?php echo $dept1;?>)">
			<option value="">--- Select ---</option>
			<?php $ca=mysql_query("SELECT a.*,b.*,a.category as catid FROM `product` as a inner join category as b on a.category=b.id  group by a.category");
			while($cat=mysql_fetch_array($ca)){ ?>
			<option value="<?php echo $cat['catid'];?>"><?php echo $cat['category'];?></option>
			<?php } ?>
     </select>
			</div>
			
		<label class="col-lg-3 col-md-4 col-sm-4 col-xs-12 control-label" for="pname">Sub Category <span class="red">*</span></label>
			<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
			
				<select  name="sub_categoryname" id="sub_categoryname" class="form-control selectpicker1" data-show-subtext="true" data-live-search="true"   onchange="brand_fetch_purchase(this.value,<?php echo $dept1;?>,category.value )">
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
				 <select  name="brandname" id="brandname" class="form-control " onchange="product_expand(this.value,<?php echo $dept1;?>,sub_categoryname.value)" >
				 <option value="">--- Select ---</option>
				 
				
				 </select>
				
				
			</div>
			
			<label class="col-lg-3 col-md-4 col-sm-4 col-xs-12 control-label" for="commission">Product Name <span class="red">*</span></label>
			<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
			  
				<select  name="product_name" id="product_name" class="form-control" onchange="product_price(this.value,<?php echo $dept1;?>,sub_categoryname.value,brandname.value)" >
				<option value="">--- Select ---</option>
				</select>
			   
			</div>
			
			
		</div>
		<div class="form-group">
			<label class="col-lg-3 col-md-4 col-sm-4 col-xs-12 control-label" for="price">Price <span class="red">*</span></label>
			<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
				<input required  type="number" name="price" id="price" value="<?php echo $price;?>" class="form-control" autocomplete="off" readonly />
				<input  type="hidden" name="commission" id="commission" value="<?php echo $commission;?>" class="form-control" autocomplete="off" readonly />
			</div>
		
		</div>
		<div class="form-group">
			<label class="col-lg-3 col-md-4 col-sm-4 col-xs-12 control-label" for="gst">GST (%)<span class="red">*</span></label>
			<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
			  <input  type="text" name="gst" id="gst" value="<?php echo $gst;?>" class="form-control" autocomplete="off" readonly />
			</div>
		<label class="col-lg-3 col-md-4 col-sm-4 col-xs-12 control-label" for="commission">Qty <span class="red">*</span></label>
			<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
				<input  type="number" name="stock" id="stock" value="<?php echo $stock;?>" class="form-control" autocomplete="off" />
				
			</div>
			</div>

       
			
			<?php if($purid == "")
			{
				?>
			<div class="form-group last-btn">
			<div class="col-lg-offset-2 col-lg-10">
			   
				<button name="button" class="btn btn-primary" type="button" onclick="dynamic_purchase(product_name.value,price.value,gst.value,commission.value,stock.value,tr_count.value,sub_categoryname.value,brandname.value,category.value)">Add More </button>
				
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

 <!-- Popup Content Add Supplier ---->
   
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Supplier</h4>
        </div>
      
        <div class="modal-body">
          <div class="form-group row">
			<label class="col-lg-3 col-md-4 col-sm-4 col-xs-12 control-label" for="price">Supllier Name <span class="red">*</span></label>
			<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
				<input required  type="text" name="supplier" id="supplier"  class="form-control" autocomplete="off"  />
				
			</div>
			<label class="col-lg-3 col-md-4 col-sm-4 col-xs-12 control-label" for="price">Gst No</label>
			<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
				<input required  type="text" name="sup_gstno" id="sup_gstno"  class="form-control" autocomplete="off" />
				</div>
			</div>
         
       <div class="form-group row">
			<label class="col-lg-3 col-md-4 col-sm-4 col-xs-12 control-label" for="price">Mobile </label>
			<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
			<input type="text" name="sup_mob" id="sup_mob"  class="form-control" autocomplete="off"  />
				
			</div>
			<label class="col-lg-3 col-md-4 col-sm-4 col-xs-12 control-label" for="price">Address</label>
			<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
				<input required  type="text" name="sup_address" id="sup_address"  class="form-control"/>
			</div>
		
		
		</div>
         <div class="form-group row">

           <label class="col-lg-3 col-md-4 col-sm-4 col-xs-12 control-label" for="price">State</label>
			<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
				<input required  type="text" name="sup_state" id="sup_state"  class="form-control" autocomplete="off" />
			</div>

			<label class="col-lg-3 col-md-4 col-sm-4 col-xs-12 control-label" for="price">City </label>
			<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
				<input type="text" name="sup_city" id="sup_city"  class="form-control" autocomplete="off"  />
				
			</div>
		</div>
       <div class="form-group row" >

           <label class="col-lg-3 col-md-4 col-sm-4 col-xs-12 control-label" for="price">Pincode<span class="red">*</span></label>
			<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
				<input type="text" name="sup_pincode" id="sup_pincode"  class="form-control" autocomplete="off" />
			</div>
		 </div>
 
        
        <div class="modal-footer">
          <button type="button" class="btn btn-default" id="addsup" onclick="add_supplier(sup_pincode.value,sup_city.value,sup_state.value,sup_address.value,sup_mob.value,sup_gstno.value,supplier.value)">Save</button>
        </div>
      </div>
      
    </div>
  </div>
  	
</div>
      

        <!---- End Popup Add Supplier ---->

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


<style>
.modal-footer{border-top:0px solid #fff!important}
</style>
<?php include("footer.php");?>