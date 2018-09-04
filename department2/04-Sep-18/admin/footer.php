		<footer class="site-footer">
			<div class="">
				<div style="margin-left: 20%;float:left">
				2018 &copy; Do First
				</div>
				
				<span id="scrolltop"><i class="fa-angle-up"></i></span>
				
				<div style="float:right;">
				</div>			
				
			</div>
		</footer>
	</section>
    
	<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
	<script src="<?php echo $adminurl;?>scripts/jquery-1.8.2.min.js"></script>
	<script src="<?php echo $adminurl;?>vendors/bootstrap/js/bootstrap.min.js"></script>
	
	<!-- Left Sidebar -->
    <script class="include" src="<?php echo $adminurl;?>scripts/jquery.dcjqaccordion.2.7.js"></script>
	
	<!-- Scroll -->
    <script src="<?php echo $adminurl;?>vendors/nicescroll/jquery.scrollTo.min.js"></script>
    <script src="<?php echo $adminurl;?>vendors/nicescroll/jquery.nicescroll.js" type="text/javascript"></script>
	
	<!-- Tags Input -->
	<script src="<?php echo $adminurl;?>vendors/jquery-tags-input/jquery.tagsinput.min.js"></script>
	
	<!-- Input Mask -->
	<script src="<?php echo $adminurl;?>vendors/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
	
	<!-- Switch Checkbox and Radios -->
	<script src="<?php echo $adminurl;?>vendors/bootstrap-switch/js/bootstrap-switch.min.js"></script> 
	
	<!-- Ckeditor -->
	<script src="<?php echo $adminurl;?>vendors/ckeditor/ckeditor.js"></script>
	
	<!-- Ckeditor -->
	<script src="<?php echo $adminurl;?>vendors/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>
	
	<!-- Date-Picker -->
	<script src="<?php echo $adminurl;?>vendors/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	
	<!-- Time-Picker -->
	<script src="<?php echo $adminurl;?>vendors/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
	
	<!-- DateTime-Picker -->
	<script src="<?php echo $adminurl;?>vendors/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
	
	<!-- DateRange-Picker -->
	<script src="<?php echo $adminurl;?>vendors/bootstrap-daterangepicker/moment.min.js"></script>
	<script src="<?php echo $adminurl;?>vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
	
	<!-- Image Cropping -->
	<!--<script src="vendors/jcrop/js/jquery.jcrop.min.js"></script>-->
	<script src="<?php echo $adminurl;?>scripts/form-image-crop.js"></script>
	
	<!-- Advanced Datatable -->
    <script src="<?php echo $adminurl;?>vendors/advanced-datatable/js/jquery.dataTables.min.js"></script>
	
	<!-- Editable Datatable - -->
    <script src="<?php echo $adminurl;?>vendors/data-tables/js/datatable_tools.min.js"></script>
    <script src="<?php echo $adminurl;?>scripts/editable-table.js"></script>
		
	<!-- Charts -->
    <script src="<?php echo $adminurl;?>vendors/jquery-easy-pie-chart/js/jquery.easy-pie-chart.js"></script>
    <script src="<?php echo $adminurl;?>scripts/jquery.sparkline.js"></script>
    <script src="<?php echo $adminurl;?>scripts/sparkline-chart.js"></script>
	
	<!-- Validate Form -->
    <script src="<?php echo $adminurl;?>scripts/jquery.validate.min.js"></script>
	
	<!-- Custom Script -->
	<script src="<?php echo $adminurl;?>scripts/custom.js"></script>
	
	<script>
		jQuery(document).ready(function () {
			if (jQuery('.wrapper').width() < 1024) {
				jQuery('#width_800').removeAttr('disabled');
				var rows1 = jQuery("table.display tbody tr td");
				var rows2 = jQuery("table.display thead tr th");
				rows1.each(function () {
					jQuery(rows2[jQuery(this).index()]).height(jQuery(this).height());
				});
			} else {
				jQuery('#width_800').attr('disabled', 'disabled');
				jQuery('table.display thead tr th, table tbody tr td').css({
					'height': ''
				});
			}
			if (jQuery('#container').hasClass('sidebar-closed')) {
				jQuery('#sidebar').css({ 'margin-left': '-210px' });
				jQuery('#sidebar > ul').hide();
			} else {
				jQuery('#main-content').css({ 'margin-left': '0px' });
				jQuery('#sidebar > ul').show();
			}
		});
		jQuery(window).resize(function () {
			var footer_height = jQuery('.site-footer').height() + 16 + 'px';
			jQuery('#main-content').css({
				'padding-bottom': footer_height
			});
			if (jQuery('.wrapper').width() < 1024) {
				jQuery('#width_800').removeAttr('disabled');
				var rows1 = jQuery("table.display tbody tr td");
				var rows2 = jQuery("table.display thead tr th");
				rows1.each(function () {
					jQuery(rows2[jQuery(this).index()]).height(jQuery(this).height());
				});
			} else {
				jQuery('#width_800').attr('disabled', 'disabled');
				jQuery('table.display thead tr th, table tbody tr td').css({
					'height': ''
				});
			}
			if (jQuery('#container').hasClass('sidebar-closed')) {
				jQuery('#sidebar').css({ 'margin-left': '-210px' });
				jQuery('#sidebar > ul').hide();
			} else {
				jQuery('#main-content').css({ 'margin-left': '0px' });
				jQuery('#sidebar > ul').show();
			}
		});
		/***** Delete Confirmation *****/
		function del() {
			var retVal = confirm("Do you want to Delete the Record ?");
			if (retVal == true) {
				return true;
			} else {
				return false;
			}
		}
		/********Coupon Generation confirmation**********/
		function Confirm() {
			var retVal = confirm("Do you want to generate coupon code for this User?");
			if (retVal == true) {
				return true;
			} else {
				return false;
			}
		}
		function find_sponser(sponser)
		{
			
			$.ajax({
				
                url     : 'sponser_find.php',
                type    : 'POST',				
				data    : {'sponser':sponser},
				
				success : function(flname)
				{
				  var spname = flname.split('@');
				  $('#sponserid').val(spname[0]);
				  $('#sponsername').val(spname[1]);
				}
		  });
		}
		
		/****** Dynamic Pincode Add In CSE ********/
		
		function dynamic_pincode(zipcode)
		{	
		   var rowpincode = $('#rowpincode').val();
		
			var data = '<div id="row'+rowpincode+'"><label class="col-lg-3 col-md-4 col-sm-4 col-xs-12 control-label" for="price"></label><div class="form-group"><div class="col-lg-3 col-md-6 col-sm-6 col-xs-12"><input type="number" name="zipcode[]" id="zipcode1" value="'+zipcode+'" class="form-control" autocomplete="off" readonly /><br></div><div class="col-lg-3 col-md-6 col-sm-6 col-xs-12"><button name="button" class="btn btn-danger"  type="button" onclick="remove_pincode('+rowpincode+')">Remove   </button></div></div><div>';
			
			
			
			var append = $('#dynPincode').append(data);
			if(append)
			{
			var rowpin = parseInt(rowpincode)+1;
			$('#rowpincode').val(rowpin);
			$('#zipcode').val('');
			}
		}
		
		function remove_pincode(rowid)
		{
			$('#row'+rowid).remove();
		}
		
		/****** Find Hub and Pin ********/
		function hubpin_name(city)
		{
			$.ajax({
				
                url     : 'hubpin_find.php',
                type    : 'POST',				
				data    : {'city':city},
				
				success : function(hubpin)
				{
				  $('#hubpin_div1').css('display','block');	
				  $('#hubpin_div').html(hubpin);
				}
		  });
		}
	</script>
</body>
</html>