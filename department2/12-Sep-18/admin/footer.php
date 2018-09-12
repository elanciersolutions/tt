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
			/*********** Find SubCategory  ***************/
		
		function subcategory(catid)
		{
			
			var deptid = $('#department').val();
			
          $.ajax({
			    
                url     : 'subcategory_find.php',
                type    : 'POST',				
				data    : {'catid':catid,'deptid':deptid},
				
				success : function(subid)
				{
				  	$('#sub_categoryname').html(subid);
				}
		  });
		  
		}
		/*********** Find Product Details  ***************/
		function product_details(subid,dept,catid)
		{
			
			 $.ajax({
			    
                url     : 'productdetails_find.php',
                type    : 'POST',				
				data    : {'subid':subid,'dept':dept,'catid':catid},
				
				success : function(product_details)
				{
					
				  	$('#list_of_productcode').html(product_details);
				}
		  });
		}
		
		function product_expand(brandid,dept,subid)
		{
			
			 $.ajax({
			    
                url     : 'productexpand_find.php',
                type    : 'POST',				
				data    : {'brandid':brandid,'dept':dept,'subid':subid},
				
				success : function(products_details)
				{
					
				  	$('#product_name').html(products_details);
				}
		  });
		}
		
		/*********** Find Brand Name  ***************/
		function brand_fetch(subid,catid,dept)
		{
			
			$.ajax({
			    
                url     : 'brand_find.php',
                type    : 'POST',				
				data    : {'subid':subid,'catid':catid,'dept':dept},
				
				success : function(brand)
				{
					
				  	$('#brandname').html(brand);
				}
		  });
		}
		
		function product_price(pid,dept,subid,brandid)
		{
			$.ajax({
			    
                url     : 'productprice_find.php',
                type    : 'POST',				
				data    : {'brandid':brandid,'dept':dept,'subid':subid,'pid':pid},
				
				success : function(product_price)
				{
					
				    var product = product_price.split('@');	
						
				  	$('#price').val(product[0]);
					$('#commission').val(product[1]);
					$('#gst').val(product[2]);
				}
		  });
		}
		
			function app_status(appstatus,subid,dept)
		    { 
			$.ajax({
			    
                url     : 'app_status.php',
                type    : 'POST',				
				data    : {'appstatus':appstatus,'subid':subid,'dept':dept},
				success : function(app)
				{
					
				}
		  });
		}
		
		
		/***** DELETE PRODUCT ******/
		
		function del_product(del_id) 
 {
	 var confm = confirm('You want to Remove This Product...!!!');
	 if(confm)
	 {
	$.ajax({
			    
                url     : 'product_del.php',
                type    : 'POST',				
				data    : {'delid':del_id},
				
				success : function(response)
				{
		  swal({
		        title: 'Deleted Successfully!...',
		        type: 'success'
	           }, function() {
		        window.location = 'product_list.php';
	         });
				}
			});
	 }
 }
 
   /***** Product List Edit *****/
   
   function prod_edit(id,pname,trid)
   {  //$('#pname'+trid).val(pname);
		
		$.ajax({
			    
                url     : 'prodcut_sub.php',
                type    : 'POST',				
				data    : {'id':id,'prodname':pname},
				
				success : function(response)
				{
					$('#product_spanid'+trid).css('display','none');
	                $('#pname'+trid).attr("type","text");
	
	 
	  /**** Last Focuse *****/
	 
	    var SearchInput = $('#pname'+trid);
		SearchInput.val(SearchInput.val());
		var strLength= SearchInput.val().length;
		SearchInput.focus();
		SearchInput[0].setSelectionRange(strLength, strLength);
				 $('#pname'+trid).val(response);
				}
		});
	 
   }
   
   function prod_editprice(id,price,trid)
   {  
		
		$.ajax({
			    
                url     : 'price_sub.php',
                type    : 'POST',				
				data    : {'id':id,'price':price},
				
				success : function(response)
				{
					$('#price_spanid'+trid).css('display','none');
	                $('#price'+trid).attr("type","text");
	
	 
	  /**** Last Focuse *****/
	 
	    var SearchInput = $('#price'+trid);
		SearchInput.val(SearchInput.val());
		var strLength= SearchInput.val().length;
		SearchInput.focus();
		SearchInput[0].setSelectionRange(strLength, strLength);
				 $('#price'+trid).val(response);
				}
		});
	 
   }
   
   function productprice_type(price,id,trid)
   {
	   var typ = "inactive";
	  $.ajax({
			    
                url     : 'price_edit.php',
                type    : 'POST',				
				data    : {'id':id,'price':price,'typ':typ},
				
				success : function(response)
				{
				
				$('#price'+trid).val(response);
				 $('#price_spanid'+trid).html(response);
				
				}
	   });  
   }
   
   
   function product_type(pname,id,trid)
   {
	   var typ = "inactive";
	  $.ajax({
			    
                url     : 'prodname_edit.php',
                type    : 'POST',				
				data    : {'id':id,'prodname':pname,'typ':typ},
				
				success : function(response)
				{
				
				$('#pname'+trid).val(response);
				 $('#product_spanid'+trid).html(response);
				
				}
	   });  
   }
   
   function product_success(id,pname,trid)
   {  
        var typ = 'active';
		 $.ajax({
			    
                url     : 'prodcut_sub.php',
                type    : 'POST',				
				data    : {'id':id,'prodname':pname,'typ':typ},
				
				success : function(response)
				{
				 $('#pname'+trid).attr("type","hidden");
				 $('#pname'+trid).val(response);
				 $('#product_spanid'+trid).html(response);
	             $('#product_spanid'+trid).css('display','block');
				
				}
	   });  
	   
   }
 
 
 function price_success(id,price,trid)
   {  
        var typ = 'active';
		 $.ajax({
			    
                url     : 'price_sub.php',
                type    : 'POST',				
				data    : {'id':id,'price':price,'typ':typ},
				
				success : function(response)
				{
				 $('#price'+trid).attr("type","hidden");
				 $('#price'+trid).val(response);
				 $('#price_spanid'+trid).html(response);
	             $('#price_spanid'+trid).css('display','block');
				
				}
	   });  
	   
   }
 
 
	
		function cat_find(deptid)
		{
			$.ajax({
			    
                url     : 'category_find.php',
                type    : 'POST',				
				data    : {'deptid':deptid},
				
				success : function(response)
				{
					
					$('#category').html(response);
				}
			});
		}
	
		
	</script>
</body>
</html>