<?php  include("../admin/connect/config.php");
       
	   header('Content-Type: application/json');
	   
	   $data		= file_get_contents('php://input');
	   
	   $json_get    = json_decode($data,true);
	  
		$today_csc_list = mysql_real_escape_string($json_get['today']);
	   
	   $cscid = mysql_query("select * from sales  where `approve_date`='$today_csc_list' and `approve_status`=1");
	   
	   $num = mysql_num_rows(mysql_query("select * from sales where `approve_date`='$today_csc_list' and `approve_status`=1"));
	   
	 if($num > 0)
	   {
	   while($csc=mysql_fetch_array($cscid))
	   {
		  $cscid1 = $csc['cscid']; 
		  
		$csc_list = mysql_fetch_array(mysql_query("select * from `sponser` where `id`='$cscid1'"));
		
		 $cscid1     = $csc_list['id'];
		 $csc_name   = $csc_list['incharge_name'];
		 $csc_city   = $csc_list['assign_city'];
		 
		 $json_value[] = array(
		   
		      'csc_id'    =>$cscid1,
			  'csc_name' =>$csc_name,
			  'cse_city' =>$csc_city
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