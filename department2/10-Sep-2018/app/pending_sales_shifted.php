<?php  include("../admin/connect/config.php");
       
	   header('Content-Type: application/json');
	   
	   $data		= file_get_contents('php://input');
	   $json_get    = json_decode($data,true);
	   $sid         = mysql_real_escape_string($json_get['sid']);
	   $cscid       = mysql_real_escape_string($json_get['cscid']);
	   
	   $delivery_tot_cscdate = mysql_real_escape_string(date("Y-m-d"));
	   
	   $num = mysql_num_rows(mysql_query("select * from sales where id='$sid' and cscid='$cscid'"));
	   if($num > 0)
	   {
	  if($sid != "" && $cscid != 0)
	  {
		
	   /*** Delivered to csc ****/
	   
	   $update_csc = mysql_query("update sales set `csc_status`=1,`delivery_to_csc_date`='$delivery_tot_cscdate',`delivery_to_csc_status`=1 where `id`='$sid'");
	   
	   $json_value[] = array(
			  'Csc'     =>'Deliverd to Csc',
			  'Comment' =>'Packed to Shifted'
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