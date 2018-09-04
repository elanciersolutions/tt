<?php 
$title="Cse City List";
include("header.php");
if(isset($_GET['cmd'])){
extract($_GET);
if($cmd=='act'){
mysql_query("UPDATE `cse_count` SET `status`=1 WHERE `id`='$id'");
} else if($cmd=='deac') {
mysql_query("UPDATE `cse_count` SET `status`=0 WHERE `id`='$id'");
}
header('location:cse_list.php');
}
?>
<section id="main-content" class="depart-list">
<section class="wrapper">
<div class="page-top-header">

<h2>Cse Cities</h2>
<div class="xtra_btn_top">
				<a title="New" href="cse.php" data-placement="top" data-toggle="tooltip" class="btn btn-success tooltips" >Add Cse</a>
			</div>
	</div>
<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<form class="cmxform form-horizontal tasi-form" id="" method="post" action="productdelete.php">
	<section class="panel">
		<!--<header class="panel-heading">
			<h4>Member's List </h4>
			<div class="xtra_btn_top">
				<a title="New" href="dep_member.php" data-placement="top" data-toggle="tooltip" class="btn btn-success tooltips" >Add New</a>
			</div>
		</header> -->
		<div class="panel-body">
			<section id="flip-scroll">
				<table class="display table table-bordered cf" id="dyntable">
					<thead>
						<tr>
							<th>S.No</th>
							<th>City</th>
							<th>Hub Name</th>
							<th>Pincode</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$query=mysql_query("SELECT * FROM `cse_count` ORDER BY `id` DESC");
						$i=1; while($result=mysql_fetch_array($query)) { ?>		
						<tr>
							<td class="text-center"><?php echo $i++;?></td>
							<td><?php echo $result['city'];?></td>
							<td class="text-center"><?php echo $result['hubname'];?></td>
							<td class="text-center">
							<?php  $zipcode = explode(',',$result['pincode']);
							for($i=0; $i<count($zipcode); $i++)
							{
							  echo $pincode1 = $zipcode[$i].'<br/>';  
							}
							?></td>
							<td class="text-center"><?php if($result['status']==1){?>
							<a class="block_tip tooltips" href="cse_list.php?id=<?php echo $result['id'];?>&cmd=deac"><i class="fa fa-thumbs-up"></i></a>
							<?php } else if($result['status']==0){ ?>
							<a class="block_tip tooltips" href="cse_list.php?id=<?php echo $result['id'];?>&cmd=act"><i class="fa fa-thumbs-down"></i></a>
							<?php } ?></td>
							<td class="text-center">
							<a href="cse.php?id=<?php echo $result['id'];?>" class="block_tip tooltips"><i class="fa fa-pencil"></i></a></td>
						</tr>
						<?php  } ?>
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