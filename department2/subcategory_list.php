<?php 
$title="Subcategory's List";
include("header.php");
if(isset($_GET['cmd'])){
	extract($_GET);
	
	if($cmd=='act'){
		
		mysql_query("UPDATE `sub_category` SET `status`=1 WHERE `id`='$id'");
	} else if($cmd=='deac') {
		
		mysql_query("UPDATE `sub_category` SET `status`=0 WHERE `id`='$id'");
	}
	header('location:subcategory_list.php');
}
?>
<section id="main-content">
	<section class="wrapper">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<form class="cmxform form-horizontal tasi-form" id="" method="post" action="productdelete.php">
					<section class="panel">
						<header class="panel-heading">
							<h4>Subcategory's List </h4>
							<div class="xtra_btn_top">
								<a title="New" href="subcategory.php" data-placement="top" data-toggle="tooltip" class="btn btn-success tooltips" >Add New</a>
							</div>
						</header>
						<div class="panel-body">
							<section id="flip-scroll">
								<table class="display table table-bordered cf" id="dyntable">
									<thead>
										<tr>
											<th>S.No</th>
											<th>Category</th>
											<th>Sub Category</th>
											<th>Status</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$dept1 = sessionvalue('department', $dept);
										
										
										$sub = mysql_query("SELECT * FROM sub_category WHERE dept='$dept1' ");
										
										$i=1; while($result=mysql_fetch_array($sub)) { ?>		
										<tr>
											<td class="text-center"><?php echo $i;?></td>
											<td class="text-center"><?php //echo $result['category'];?>
											 <?php //$catid = $result['category'];
											//$catename = mysql_fetch_array(mysql_query("SELECT * FROM category WHERE dept='$dept1' and id='$catid' ")); echo  $catename['category'];
											
											$departmen = mysql_fetch_array(mysql_query("SELECT * FROM department WHERE id='$dept1'")); echo  $departmen['department'];
											?>
											</td>
											<td class="text-center"><?php echo $result['sub_categoryname'];?></td>
											<td class="text-center"><?php if($result['status']==1){?>
											<a class="block_tip tooltips" href="subcategory_list.php?id=<?php echo $result['id'];?>&cmd=deac"><i class="fa fa-thumbs-up"></i></a>
											<?php } else if($result['status']==0){?>
											<a class="block_tip tooltips" href="subcategory_list.php?id=<?php echo $result['id'];?>&cmd=act"><i class="fa fa-thumbs-down"></i></a>
											<?php } ?></td>
											<td class="text-center"><a href="subcategory.php?id=<?php echo $result['id'];?>" class="block_tip tooltips"><i class="fa fa-pencil"></i></a></td>
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