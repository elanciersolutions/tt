<?php  include("../admin/connect/config.php");
       
	   header('Content-Type: application/json');
	   
	   $data		= file_get_contents('php://input');
	   $json_get    = json_decode($data,true);
	   
	   $sid = mysql_real_escape_string($json_get['sid']);
	  
	   $num = mysql_num_rows(mysql_query("select * from sales_details where sid='$sid'"));
	  if($num > 0){
	  if($sid != "")
	  {
		  
	   $saleorder = mysql_query("select * from sales_details where sid='$sid'");
	   
	   while($sale_list=mysql_fetch_array($saleorder))
	   {
		
		   $pid  =  $sale_list['product'];
		   
		   $prod_details = mysql_query("select * from product where id='$pid'");
		   
		while($prod_list = mysql_fetch_array($prod_details))
	   {
		   
		   $price = $prod_list['price'];
		   $pname = $prod_list['pname'];
		   $sqty = $sale_list['sale_qty'];
		   $stotal = $sale_list['sale_total'];
		   $approve_date = $sale_list['approve_date'];
		   $sdate = $sale_list['dat'];
		   
		   $json_value[] = array(
		   
		      'pname'     =>$pname,
			  'price'     =>$price,
			  'sqty'      =>$sqty,
			  'stotal'    =>$stotal,
			  'approve_date'     =>$approve_date,
			  'order_date' => $sdate
			 
		   );
		   
		   
	   }
		
	   }
	      $json[] = array('status'=>'Success','Response'=>$json_value);
		   echo json_encode($json);
	  }
	  }
	   else{
		   
		   $json[] = array('status'=>'Failure','Response'=>'Record Not Found');
		   echo json_encode($json);
	   }
	   	   
	   

?>