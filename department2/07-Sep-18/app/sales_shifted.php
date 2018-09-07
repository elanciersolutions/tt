<?php  include("../admin/connect/config.php");
       
	   header('Content-Type: application/json');
	   
	   $data		= file_get_contents('php://input');
	   $json_get    = json_decode($data,true);
	   $sid = mysql_real_escape_string($json_get['sid']);
	   $cscid = mysql_real_escape_string($json_get['cscid']);
	   
	  if($sid != "" && $cscid != 0)
	  {
		
	   /*** Delivered to csc ****/
	   
	   $update_csc = mysql_query("update sales set `csc_status`=1 where `id`='$sid' ");
	   
	   $json_value[] = array(
			  'Csc'     =>'Deliverd to Csc',
		   );
		
	   
	      $json[] = array('status'=>'Success','Response'=>$json_value);
		   echo json_encode($json);
	  }
	   
	   else{
		   
		   $json[] = array('status'=>'Failure','Response'=>'Record Not Found');
		   echo json_encode($json);
	   }
	   	   
	   

?>