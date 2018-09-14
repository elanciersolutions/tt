<?php  include("../admin/connect/config.php");
       
	   header('Content-Type: application/json');
	   
	   $data		= file_get_contents('php://input');
	   
	   $json_get    = json_decode($data,true);
	   
	   $cscid = mysql_real_escape_string($json_get['cscid']);
	   $start_limit = mysql_real_escape_string($json_get['start_limit']);
	   $end_limit = mysql_real_escape_string($json_get['end_limit']);
	   
	   $approve = mysql_query("select * from sales where `approve_status`=1 and `cscid`='$cscid' and `delivery_to_csc_status`=0 order by `id` asc LIMIT $start_limit,$end_limit");
	   
	   $num = mysql_num_rows(mysql_query("select * from sales where approve_status=1 and cscid='$cscid' and `delivery_to_csc_status`=0"));
	   
	   $csc_list = mysql_fetch_array(mysql_query("select * from `sponser` where `id`='$cscid'"));
	   
	 if($num > 0)
	   {
	   while($approve_salesorder=mysql_fetch_array($approve))
	   {
		   
		
		 $sid     = $approve_salesorder['id'];
		 $approve_status     = $approve_salesorder['approve_status'];
		 $salesid = $approve_salesorder['salesid'];
	     $sdate   = $approve_salesorder['dat'];
		 $approve_date   = $approve_salesorder['approve_date'];
	     $stotal  = $approve_salesorder['sale_total'];
	     $sqty    = $approve_salesorder['sale_qty'];
		 $csc_name   = $csc_list['incharge_name'];
		   
		   $json_value[] = array(
		   
		      'sid'     =>$sid,
			  'salesid' =>$salesid,
			  'sdate'   =>$sdate,
			  'stotal'  =>$stotal,
			  'sqty'    =>$sqty,
			  'status'    =>$approve_status,
			  'approve_date' =>$approve_date,
			  'status' =>'Shifted',
			  'csc_name'=>$csc_name
		   );
		   
		  
		   
	   }
	    $json[] = array('status'=>'Success','Response'=>$json_value);
		   echo json_encode($json);
	   }
	   else{
		   
		   $json[] = array('status'=>'Failure','Response'=>'Record Not Found');
		   echo json_encode($json);
	   }
	   
	   
	   

?>