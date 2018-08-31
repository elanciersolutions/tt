<?php 
	ob_start();
	include('include/header.php');
	include('include/menu.php'); 
	$fname = $_SESSION['usn'];
	if($fname!=''){ ?>
		<script>
			self.location='<?php echo $fsiteurl;?>users/myaccount.php';
		</script>
	<?php }
?>
<script>
	$(document).ready(function() {
		$('#submit').click(function(e) {
			var uname = $('#username').val();
			var passwd = $('#passwd').val();
			if(uname==''){
				swal('Enter Username');
				return false;
			} else if(passwd==''){
				swal('Enter Password');
				return false;
			} else {
				var request = jQuery.ajax({
					url: "<?php echo $fsiteurl;?>pages/ajax_login.htm",
					type: "POST",  
					data: {uname:uname,passwd:passwd, type: 'Login'},
					dataType: "html"
				});
				request.done(function(msg) { 
					if(msg==0){
						swal('Enter all mandatory fields');
						$('#username').focus();
						return false;
					} else if(msg==1){
						swal('Enter correct Username');
						$('#username').val('');
						$('#passwd').val('');
						$('#username').focus();
						return false;
					} else if(msg==3){
						swal('Enter correct Password');
						$('#passwd').val('');
						$('#passwd').focus();
						return false;
					} else if(msg==2){
						self.location='<?php echo $fsiteurl;?>users/myaccount.php';
					} else if(msg==4){
						self.location='<?php echo $fsiteurl;?>department/dashboard.php';
					} 
					else if(msg==5){
						self.location='<?php echo $fsiteurl;?>department/dashboard.php';
					} 
					else if(msg==6){
						
						self.location='<?php echo $fsiteurl;?>csv/dashboard.php';
					}
				});
			}
		});
	});
</script>
	<section class="wow fadeIn bg-light-gray bg-light-gray1">
		<div class="container">
			<div class="row">
				<div class="col-md-7 col-sm-12 col-xs-12 center-col text-center margin-100px-bottom xs-margin-40px-bottom">
					<div class="position-relative overflow-hidden width-100">
					</div>
				</div>
			</div>
			<form id="contact-form-3" action="" method="post">
				<div class="row"> 
					<div class="col-md-4 wow fadeIn center-col">
						<div class="padding-fifteen-all bg-white1 border-radius-62 md-padding-seven-all">
						 <img class="img-responsive user_bg" src="<?php echo $fsiteurl;?>images/user.png" alt="images" >
						  
							<div class="text-extra-dark-gray1 alt-font text-large font-weight-600 margin-30px-bottom">Sign In </div> 
							<div>
								<div id="success-contact-form-3" class="no-margin-lr"></div>
								<input type="text" name="username" id="username" autocomplete="off" placeholder="User Name *" class="input-bg">
								<input type="password" name="passwd" id="passwd" placeholder="Password *" autocomplete="off" class="input-bg">
								<button id="submit" type="button" class="btn btn-small border-radius-4 btn-black">submit</button>
								<div class="pull_li">
									<div class="pull-right">
										<a href="#" class="forget">Forget Password?</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>     
	</section>
<?php include ('include/footer.php') ?>