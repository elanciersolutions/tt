<?php  include("../admin/connect/config.php");
       
	   header('Content-Type: application/json');
	   
	   $data		= file_get_contents('php://input');
	   $json_get    = json_decode($data,true);
	   
		$sid = mysql_real_escape_string($json_get['sid']);
		$today = mysql_real_escape_string($json_get['today']);
		
	  if($sid != "")
	  {
		  
	   $saleorder = mysql_query("select * from sales_details where sid='$sid' and approve_date='$today'");
	   
	   while($sale_list=mysql_fetch_array($saleorder))
	   {
		
		   $pid  =  $sale_list['product'];
		   
		   $prod_details = mysql_query("select * from product where id='$pid'");
		   
		   $userid = mysql_fetch_array(mysql_query("select * from sales where id='$sid' and approve_date='$today'"));
		   
		   $uname = $userid['uname'];
		   
		   $users_details = mysql_fetch_array(mysql_query("select * from login_users where username='$uname'"));
		   
		   $fname = $users_details['first_name'];
		   $lname = $users_details['last_name'];
		   $address = $users_details['address'];
		   $city = $users_details['city'];
		   $pincode = $users_details['pincode'];
		   $state = $users_details['state'];
		   $mobile = $users_details['mobile'];
		   
		   
		while($prod_list = mysql_fetch_array($prod_details))
	   {
		   
		   
		   $price = $prod_list['price'];
		   $pname = $prod_list['pname'];
		   $sqty = $sale_list['sale_qty'];
		   $stotal = $sale_list['sale_total'];
		   $approve_date = $sale_list['approve_date'];
		   $sdate = $sale_list['dat'];
		   $image = $prod_list['image'];
		   
		   $json_value[] = array(
		   
		      'pname'     =>$pname,
			  'price'     =>$price,
			  'sqty'      =>$sqty,
			  'stotal'    =>$stotal,
			  'approve_date'     =>$approve_date,
			  'order_date' => $sdate,
			  'image' =>"../images/product/".$image
			 
		   );
		   
		   
	   }
	   
	   
		
	   }
	    $json_user[]=array(
		      'firstname' => $fname,
			  'lastname' => $lname,
			  'address' => $address,
			  'city' => $city,
			  'state' => $state,
			  'pincode' => $pincode,
			  'mobile' => $mobile,
			  'products' => $json_value
			  );
			  
	      $json[] = array('status'=>'Success','Response'=>$json_user);
		   echo json_encode($json);
	  }
	   
	   else{
		   
		   $json[] = array('status'=>'Failure','Response'=>'Record Not Found');
		   echo json_encode($json);
	   }
	   	   
	   

?>