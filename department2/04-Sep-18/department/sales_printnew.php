<?php include('../admin/connect/config.php');error_reporting(1);extract($_REQUEST); $dept1=$dept;
$query = mysql_query("SELECT * FROM sales_details WHERE `dept`='$dept1' AND `sid`='$salesid'");

$query_saleorder = mysql_fetch_array(mysql_query("SELECT * FROM sales WHERE `dept`='$dept1' AND `id`='$salesid'"));
									
						$userdetails = mysql_fetch_array(mysql_query("SELECT * FROM login_users WHERE `username`='$userid'"));

$saleorder_date = mysql_fetch_array(mysql_query("SELECT * FROM sales_details WHERE `dept`='$dept1' AND `sid`='$salesid'"));						
?>						
<table width="700px" cellpadding="0px" cellspacing="0" border="1">
<thead>
<tr>

<th colspan="2" style="border-right:none">
<p><strong>Sale Order ID : </strong><span id="orderid1"><?php echo $query_saleorder['salesid'];?></span></p>
<p><strong>Sale Order Date :</strong><span id="orderdate1"><?php echo $saleorder_date['dtime'];?> </span></p>

</th>
<th colspan="3" style="text-align:right;border-left:none">
<h3><?php echo $BillType;?></h3>
<p><strong>Invoice Number : </strong> SPNA-82961</p>
<p><strong>Invoice Details : </strong> MH-SPNA-141936251-1819</p>
<p><strong>Invoice Date : </strong> 20.08.2018</p>
</th>

</tr>
<tr>
<th colspan="2" style="vertical-align: top;border-right:none">
<h3>Sold By:</h3>
<p>Dofirst</p>
<p>Cumbum Road</p>
<p>P.C.Patti,Theni-625531</p>
<p>Email: dofirstfortunemart@admin.com</p>
<br>
<p><strong>Copy Bill : </strong><span id="copybill1"></span></p>
<p><strong>PAN NO : </strong> AEEPP4832R</p>
<p><strong> GST Registration No : </strong> 27AEEPP4832R1ZT</p>
</th>
<th colspan="3" style="text-align:right;border-left:none">
<h3>Billing Address: </h3>
<p id="cusname1"><?php echo $userdetails['first_name'].' '.$userdetails['last_name'];?></p>
<p id="address1"><?php echo $userdetails['address'];?></p>
<p><span id="city1"><?php echo $userdetails['city'];?></span>-<span id="pincode1"><?php echo $userdetails['pincode'];?>,TAMIL NADU,</p>
<p>INDIA</p>
<br>


<h3>Shipping Address: </h3>
<p id="cusname1"><?php echo $userdetails['first_name'].' '.$userdetails['last_name'];?></p>
<p id="address1"><?php echo $userdetails['address'];?></p>
<p><span id="city1"><?php echo $userdetails['city'];?></span>-<span id="pincode1"><?php echo $userdetails['pincode'];?>,TAMIL NADU,</p>
<p>INDIA</p>


</th>
</tr>

<tr>
<th style="width:5%">Sno</th>
<th>Product Name</th>
<th>Price</th>
<th>Qty</th>
<th>Total</th>
</tr>
</thead>
<?php
$overall_amount = "";
									$i=1; while($result=mysql_fetch_array($query)){ ?>
									
<tbody>									
									<tr>
									<?php ?>
										<td class="text-center" style="width:5%"> <?php echo $i++;?></td>
										
										<td class="text-center"><?php 
										$prodid = $result['product'];
										$productname = mysql_fetch_array(mysql_query("SELECT * FROM product WHERE  `id` ='$prodid' AND dept='$dept1'")); echo  ucfirst($productname['pname']); ?></td>
										<td class="text-center"><?php
										echo $price = $productname['price']; ?></td>
										<td class="text-center">
										<?php $change_qty = mysql_fetch_array(mysql_query("SELECT * FROM sales_details WHERE `dept`='$dept1' AND `sid`='$salesid' AND product='$prodid'"));
										 if($change_qty['approve_status'] == 0){
										echo $qty = $result['qty'];}else{echo $qty = $result['sale_qty'];} ?>
										</td>
										<td class="text-center"><?php
										echo $total = $price * $qty; 
										 $overall_amount +=$total;
										?></td>
									</tr>
									
									<?php  } ?>
</tbody>

<tr>
<td colspan="2">

Signature:
</td>
<td colspan="3">
Total : <span id="overall1"><?php echo  $overall_amount;?></span>
</td>
</tr>
<tr id="qrcode1">
<td colspan="5">
<img alt="QR-code" style="width: 200px;float: right;" src="php/qr_img.php?d=<?php echo $salesid.' '.$userid.''.$dept1.''.$saleorder_date['dtime'];?>" >
</td>
</tr>
<style>
table{display:block;margin:0 auto;min-height:700px;border:0px;}
th{text-align:left;}
td, th{width:30%;padding:12px;}
tbody{min-height:300px;}
p{margin:0px;}
h4{margin:0px;}
h2{margin:0px;}
th, td{border-color:#000;}
do_first tr td:first-child{width:20px;}
</style>
</table>