<?php  include("../admin/connect/config.php");
       
	   header('Content-Type: application/json');
	   
	   $data		= file_get_contents('php://input');
	   
	   $json_get    = json_decode($data,true);
	  
	   $csc_list = mysql_query("select * from sponser");
	   
	   $num = mysql_num_rows(mysql_query("select * from sponser"));
	   
	 if($num > 0)
	   {
	   while($csc=mysql_fetch_array($csc_list))
	   {
		
		 $cscid      = $csc['id'];
		 $csc_name   = $csc['incharge_name'];
		 $cse_city   = $csc['assign_city'];
		 
		 $json_value[] = array(
		   
		      'cscid'    =>$cscid,
			  'csc_name' =>$csc_name,
			  'cse_city' =>$cse_city
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