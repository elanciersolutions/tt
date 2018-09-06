<?php 
$title="Product List";
include("header.php");
if(isset($_GET['cmd'])){
extract($_GET);

if($cmd=='act'){

mysql_query("UPDATE `product` SET `status`=1 WHERE `id`='$id'");
} else if($cmd=='deac') {

mysql_query("UPDATE `product` SET `status`=0 WHERE `id`='$id'");
}
header('location:product_list.php');
}
?>
<section id="main-content">
<section class="wrapper">
<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<form class="cmxform form-horizontal tasi-form" id="" method="post" action="productdelete.php">
<section class="panel">
<header class="panel-heading">
<h4>Product List </h4>
<div class="xtra_btn_top">
	<a title="New" href="product.php" data-placement="top" data-toggle="tooltip" class="btn btn-success tooltips" >Add New</a>
</div>
</header>
<div class="panel-body">
<section id="flip-scroll">
	<table class="display table table-bordered cf" id="dyntable">
		<thead>
			<tr>
				<th>S.No</th>
				<th>Category</th>
				<th>Product Name</th>
				<th>Product Price</th>
				<th>Commission</th>
				<th>GST</th>
				<th>Status</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
			
			
			$query=mysql_query("SELECT * FROM `product` ORDER BY `id` DESC");
			
			
			
			$i=1; while($result=mysql_fetch_array($query)) { $categoryid = $result['category'];?>		
			<tr id="<?php echo $i;?>" onchange="product_success(<?php echo $result['id'];?>,'<?php echo $result['pname'];?>',<?php echo $i;?>);price_success(<?php echo $result['id'];?>,<?php echo $result['price'];?>,<?php echo $i;?>)">
				<td class="text-center" ><?php echo $i;?></td>
				
				<td><?php $departmen = mysql_fetch_array(mysql_query("SELECT * FROM department WHERE id='$categoryid'")); echo  $departmen['department'];?></td>
				<td class="text-center"><span style="cursor:pointer" id="product_spanid<?php echo $i;?>" onclick="prod_edit(<?php echo $result['id'];?>,'<?php echo $result['pname'];?>',<?php echo $i;?>)"><?php echo $result['pname'];?></span> <input type="hidden" name="pname" id="pname<?php echo $i;?>"onkeyup="product_type(this.value,<?php echo $result['id'];?>,<?php echo $i;?>)" ></td>
				<td class="text-center"><span style="cursor:pointer" id="price_spanid<?php echo $i;?>" onclick="prod_editprice(<?php echo $result['id'];?>,'<?php echo $result['price'];?>',<?php echo $i;?>)"><?php echo $result['price'];?></span>  <input type="hidden" name="price" id="price<?php echo $i;?>" onkeyup="productprice_type(this.value,<?php echo $result['id'];?>,<?php echo $i;?>)" ></td>
				<td class="text-center"><?php echo $result['commission'];?></td>
				<td class="text-center"><?php echo $result['gst'];?></td>
				<td class="text-center"><?php if($result['status']==1){?>
				<a class="block_tip tooltips" href="product_list.php?id=<?php echo $result['id'];?>&cmd=deac"><i class="fa fa-thumbs-up"></i></a>
				<?php } else if($result['status']==0){?>
				<a class="block_tip tooltips" href="product_list.php?id=<?php echo $result['id'];?>&cmd=act"><i class="fa fa-thumbs-down"></i></a>
				<?php } ?></td>
				<td class="text-center"><a href="product.php?id=<?php echo $result['id'];?>" class="block_tip tooltips"><i class="fa fa-pencil"></i></a><a  onclick="del_product(<?php echo $result['id'];?>)" class="block_tip tooltips"><i class="fa fa-times"></i></a></td>
			</tr>
			<?php $i++; } ?>
		</tbody>
	</table>
</section>
</div>
<footer class="panel-footer">
<div class="xtra_btn_bottom">
	<a title="BACK" data-placement="top" data-toggle="tooltip" class="btn btn-danger tooltips" onclick="window.history.go(-1); return false;">Back</a>
</div>
</footer>
</section>
</form>
</div>
</div>
</section>
</section>
<?php include("footer.php");?>