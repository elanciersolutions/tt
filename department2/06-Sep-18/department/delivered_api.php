<?php  include("../admin/connect/config.php");
       
	   header('Content-Type: application/json');
	   
	   $data		= file_get_contents('php://input');
	   $json_get    = json_decode($data,true);
	  
	   $approve = mysql_query("select * from sales where approve_status=1");
	   
	   $num = mysql_num_rows(mysql_query("select * from sales where approve_status=1"));
	 if($num > 0)
	   {
	   while($approve_salesorder=mysql_fetch_array($approve))
	   {
		
		   $sid  =  $approve_salesorder['id'];
		   $salesid = $approve_salesorder['salesid'];
		   $sdate = $approve_salesorder['dat'];
		   $stotal = $approve_salesorder['sale_total'];
		   $sqty = $approve_salesorder['sale_qty'];
		   
		   $json_value[] = array(
		   
		      'sid'     =>$sid,
			  'salesid' =>$salesid,
			  'sdate'   =>$sdate,
			  'stotal'  =>$stotal,
			  'sqty'    =>$sqty
		   );
		   
		   $json[] = array('status'=>'Success','Response'=>$json_value);
		   echo json_encode($json);
		   
	   }
	   }
	   else{
		   
		   $json[] = array('status'=>'Failure','Response'=>'Record Not Found');
		   echo json_encode($json);
	   }
	   
	   
	   

?>