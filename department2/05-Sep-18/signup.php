<?php 
$title="Sign Up";
include('include/header.php');
include('include/menu.php');
if(isset($_POST['submit'])){
	extract($_POST);
	if($sponsor!=''){
		$username = trim($username);
		$password = trim($password);
		$rst = mysql_fetch_array(mysql_query("SELECT `username` FROM `login_users` WHERE `username`='$username'"));
		if($rst['username']){ 
			echo "<script type='text/javascript'>swal({
				title: 'Username already exits!...',
				type: 'warning'
			}, function() {
				window.location = '".$fsiteurl."pages/signup.htm';
			})</script>";
		} else { 
			/*** Insert New User ***/
			$map_pincode = explode('@',$map_pincode);
			$sql = mysql_query("INSERT INTO `login_users` (`username`,`password`,`first_name`,`last_name`,`email`,`mobile`,`aadhar`,`pan`,`bank`,`ifsc`,`accno`,`date`,`sponsor`,`mode`,`address`,`pincode`,`csemap_location`,`cseid`) VALUES ('$username','$password','$fname','$lname','$email','$phone','$aadhar','$pan','$bname','$ifsc','$accno','".date('Y-m-d')."','$sponsor',1,'$address','$pincode','$map_pincode[0]','$map_pincode[1]')");
			$last = mysql_insert_id();
			
			/*** Get Sponsor Details ***/
			$sponser_rst = mysql_fetch_array(mysql_query("SELECT `parent`,`child`,`id` FROM `login_users` WHERE `username`='$sponsor'"));
			$parent = $sponser_rst['parent']; $child = $sponser_rst['child']; $sid = $sponser_rst['id']; 
			
			/*** Child Update ***/
			mysql_query("UPDATE `login_users` SET `child`='$child,$last' WHERE `username`='$sponsor'");
			
			/*** Parent Update ***/
			mysql_query("UPDATE `login_users` SET `parent`='$sid,$parent' WHERE `id`='$last'");
			
			/*** Count Increment ***/
			$qw=mysql_fetch_array(mysql_query("SELECT * FROM `login_users` WHERE `id`='$last'"));
			$ppp=trim($qw['parent'],',');
			$dp=explode(',',$ppp);
			foreach($dp as $a) {
				$u78=mysql_query("UPDATE `login_users` SET count=count+1 WHERE `id`='$a'");
			}
			
			/*** Level Information ***/
			$spon1 = sponser_name($last);
			$spon2 = sponser_name($spon1);
			$spon3 = sponser_name($spon2);
			$spon4 = sponser_name($spon3);
			$spon5 = sponser_name($spon4);
			$spon6 = sponser_name($spon5);
			$spon7 = sponser_name($spon6);
			$spon8 = sponser_name($spon7);
			$spon9 = sponser_name($spon8); 
			$spon10 = sponser_name($spon9); 
			
			$level = array($spon6,$spon7,$spon8,$spon9,$spon10);
			$level = implode(',',$level);
			$level = trim($level,',');
			
			mysql_query("UPDATE `login_users` SET `level`='$level' WHERE `id`='$last'");
			
			//Welcome SMS
			$mobileNumber = $phone;
			$name = $fname ." ". $lname; 

			$details="Dear $name, Welcome to Dofirstfortunemart. You have Successfully registered. Username : $username, Password : $password. log on to http://dofirstfortunemart.com/pages/login.htm";


			include_once("sendsms.php");
			$sendsms = new sendsms();
			$url = 'http://sms.elanciersms.com/';
			$token = '4db9d02078e8a370fce4e032f5203d77';

			// for sent sms
			$credit = '2';
			$sender = 'DFIRST';
			$sms = $details;
			$number = $mobileNumber; 
			$message_id = $sendsms->sendmessage($url,$token,$credit,$sender,$sms,$number);
			
			if($sql){
				echo "<script type='text/javascript'>swal({
					title: 'Register Successfully!...',
					type: 'success'
				}, function() {
					window.location = '".$fsiteurl."pages/login.htm';
				})</script>";
			} else {
				echo "<script type='text/javascript'>swal({
					title: 'Registration Failed!...',
					type: 'warning'
				}, function() {
					window.location = '".$fsiteurl."pages/signup.htm';
				})</script>";
			}
		}
	} else {
		echo "<script type='text/javascript'>swal({
			title: 'Sponsor Name Cannot be empty!...',
			type: 'warning'
		}, function() {
			window.location = '".$fsiteurl."pages/signup.htm';
		})</script>";
	}
}
?>
	<script>
		$(document).ready(function() {
			$('#phone').keyup(function() {
				this.value = this.value.replace(/[^0-9\.]/g,'');
			});
			$('#name').keyup(function() {
				this.value = this.value.replace(/[^a-zA-Z\.\s]/g,'');
			});
			$('#username').keyup(function() {
				this.value = this.value.replace(/[^a-zA-Z\s]/g,'');
			});
			$('#pincode').keyup(function() {
				this.value = this.value.replace(/[^0-9\.]/g,'');
			});
			$('#phone').keyup(function() {
				var array=$('#phone').val().split(",");
				for (i=0;i<array.length;i++){
					var num=(array[i] [0]);
					if(num != '9' && num != '7' && num != '8' && num != '6') {
						this.value = this.value.replace(/[^0-9\.]/g,'');  
						this.value = this.value.replace(/[^A-Za-z]/g,''); 
					}
				}
			});
			$('#username').change(function() {
				var username=$('#username').val();
				if(username.length < 5){
					swal('username must be 5 characters');
					$('#username').val('');
					$('#username').focus();
				} else {
					var request = jQuery.ajax({
						url: "<?php echo $fsiteurl;?>ajax_login.php",
						type: "POST",  
						data: {username: username, type: 'Username Check'},
						dataType: "html"
					});
					request.done(function(msg) {
						if(msg==0){
							swal('Username already Exits');
							$('#username').val('');
							$('#username').focus();
							return false;
						}        
					});
				}
			});
			$('#password').change(function() {
				var passwd=$('#password').val();
				if(passwd.length < 5){
					swal('Password must be 5 characters');
					$('#password').val('');
					$('#password').focus();
					return false;
				}
			});
			$('#cpassword').change(function() {
				var passwd=$('#password').val();
				var cpasswd=$('#cpassword').val();
				if(passwd!=cpasswd){
					swal('Enter Correct Password');
					$('#cpassword').val('');
					$('#cpassword').focus();
					return false; 
				} else {
					$('#project-contact-us-button1').prop('disabled', false);
				}
			});
			$('#sname').change(function() {
				var sname=$('#sname').val();
				var request = jQuery.ajax({
					url: "<?php echo $fsiteurl;?>ajax_login.php",
					type: "POST",  
					data: {sname: sname, type: 'Sponsor Check'},
					dataType: "html"
				});
				request.done(function(msg) {
					if(msg==0){
						swal('Enter Correct Sponsor Name');
						$('#sname').val('');
						$('#suname').focus();
						$('#sname').focus();
						return false;
					} else {
						$('#suname').val(msg);
					}       
				});
			});
		});
	</script>
	<?php if($_GET['sponsor']!=''){ ?>	<script>
	$(document).ready(function() {
		var sname=$('#sname').val();
		var request = jQuery.ajax({	
			url: "<?php echo $fsiteurl;?>ajax_login.php",
			type: "POST",
			data: {sname: sname, type: 'Sponsor Check'},
			dataType: "html"
		});
		request.done(function(msg) {
			if(msg==0){
				swal('Enter Correct Sponsor Name');
				$('#sname').val('');
				$('#suname').focus();
				$('#sname').focus();
				return false;
			} else {
				$('#suname').val(msg);
			} 
		});
	});
	</script>
	<?php } ?>
	<noscript>
		<style type="text/css">
			.wow {display:none;}
		</style>
		<section class="fadeIn" id="start-your-project">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h3>JavaScript is not enabled!</h3>
					</div>
				</div>
			</div>
		</div>
	</noscript>
	<section class="wow fadeIn" id="start-your-project">
		<div class="container">
			<h5>Register Your Free Account</h5>
			<form id=" project-contact-form1" action="" method="post">
				<div class="row">
					 <div class="col-md-12">
						<div id="success-project-contact-form" class="no-margin-lr"></div>
					</div>
					<div class="col-md-6">
						<input type="text" required autocomplete="off" name="fname" id="fname" placeholder="First Name *" class="big-input"/>
					</div>
					<div class="col-md-6">
						<input type="text" required autocomplete="off" name="lname" id="lname" placeholder="Last Name *" class="big-input"/>
					</div>
					<div class="col-md-6">
						<input type="text" required autocomplete="off" maxlength="10" required autocomplete="off" name="phone" id="phone" placeholder="Phone *" class="big-input"/>
					</div>
					<div class="col-md-6">
						<input type="email" autocomplete="off" name="email" id="email" placeholder="E-mail" class="big-input"/>
					</div>
				</div>
				<h6>Sponsor Details</h6>
				<div class="row">
					<div class="col-md-6">
						<input type="text" required autocomplete="off" name="sponsor" id="sname" value="<?php echo $_GET['sponsor'];?>" <?php if($_GET['sponsor']!=''){ echo "readonly"; }?> placeholder="Sponsor Username *" class="big-input"/>
					</div>
					<div class="col-md-6">
						<input type="text" readonly required autocomplete="off" name="suname" id="suname" placeholder="Sponsor Name *" class="big-input"/>
					</div>
				</div>
				<h6 style="display:none">Bank Details</h6>
				<div class="row" style="display:none">
					<div class="col-md-6">
						<input type="text" autocomplete="off" name="bname" id="bname" placeholder="Bank Name *" class="big-input"/>
					</div>
					<div class="col-md-6">
						<input type="text" autocomplete="off" name="accno" id="accno" placeholder="Account No *" class="big-input"/>
					</div>
					<div class="col-md-6">
						<input type="text" autocomplete="off" name="ifsc" id="ifsc" placeholder="IFSC Code *" class="big-input"/>
					</div>
					<div class="col-md-6">
						<input type="text" autocomplete="off" name="pan" id="panno" placeholder="Pan No *" class="big-input"/>
					</div>
					<div class="col-md-6">
						<input type="text" autocomplete="off" name="aadhar" id="aadhar" placeholder="Aadhar No *" class="big-input"/>
					</div>
				</div>
				<h6>Login Details</h6>
				<div class="row">
					<div class="col-md-6">
						<input type="text" required autocomplete="off" name="username" id="username" placeholder="Username *" class="big-input"/>
					</div>
					<div class="col-md-6">
						<input type="password" required autocomplete="off" name="password" id="password" placeholder="Password *" class="big-input"/>
					</div>
					<div class="col-md-6">
						<input type="password" required autocomplete="off" name="cpassword" id="cpassword" placeholder="Retype Password *" class="big-input"/>
					</div>
				</div>
				<h6>Personal Details</h6>
				<div class="row">
					<div class="col-md-6">
						<Select  required name="address" id="address" placeholder="City *" class="big-input" />
						<option value="">Select City</option>
						<?php $select = mysql_query("SELECT * FROM city");
						 while($fetch = mysql_fetch_array($select))
						 {
							 ?>
							 <option value="<?php echo $fetch['city'];?>"><?php echo $fetch['city'];?></option>
							 <?php
							 
						 }
						?>
						</select>
					</div>
					<div class="col-md-6">
						<input type="text" maxlength="6" required autocomplete="off" name="pincode" id="pincode" placeholder="Pin Code *" class="big-input"/>
					</div>
					
				</div>
				<h6>Map Cse</h6>
				<div class="row">
					<div class="col-md-6">
						<Select  required name="map_city" id="map_city" placeholder="Map City *" class="big-input" onchange="Map_cse(this.value)" />
						<option value="">Map City</option>
						<?php $select = mysql_query("SELECT * FROM city");
						 while($fetch = mysql_fetch_array($select))
						 {
							 ?>
							 <option value="<?php echo $fetch['city'];?>"><?php echo $fetch['city'];?></option>
							 <?php
							 
						 }
						?>
						</select>
					</div>
					<div class="col-md-6">
						<Select  required name="map_pincode" id="map_pincode" placeholder="Map Pincode *" class="big-input"/>
						
						</select>
					</div>
					<div class="col-md-12 text-center">
						<button name="submit" disabled id="project-contact-us-button1" type="submit" class="btn btn-transparent-dark-gray btn-large margin-20px-top">REGISTER</button>
					</div>
				</div>
			</form>
		</div>
	</section>
<?php include('include/footer.php');?>