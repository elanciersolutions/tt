		<footer class="site-footer">
			<div class="">
				<div style="margin-left: 20%;float:left">
				2018 &copy; Do First
				</div>
				
				<span id="scrolltop"><i class="fa-angle-up"></i></span>
				
				<div style="float:right;">
				<!--Design by<a href="http://elancier.com/" target="_blank" style="color:#fff"> elancier</a>-->
				</div>			
				
			</div>
		</footer>
	</section>
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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
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
		
	/*********** Find SubCategory  ***************/
		
		function subcategory(catid,dept)
		{
            
          $.ajax({
			    
                url     : 'subcategory_find.php',
                type    : 'POST',				
				data    : {'catid':catid,'dept':dept},
				
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
		function brand_fetch(subid,dept,catid)
		{
			
			$.ajax({
			    
                url     : 'brand_find.php',
                type    : 'POST',				
				data    : {'subid':subid,'dept':dept,'catid':catid},
				
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
		
		/*********** Find Dynamic Purchase  ***************/
		
		function dynamic_purchase(pname,price,gst,commission,stock,tr_count,subname,brandname)
		{
			var product_name = $('#product_name').val();
			
			var pname = pname.split('&');
			if(product_name != "")
			{
			
			var data = '<tr id="row'+tr_count+'"><td>'+tr_count+'</td><td>'+pname[1]+'<input type="hidden" name="pname[]" value="'+pname[1]+'"></td><td>'+price+'<input type="hidden" name="price[]" value="'+price+'"></td><td>'+gst+'%<input type="hidden" name="gst[]" value="'+gst+'"></td><td>'+commission+'<input type="hidden" name="commission[]" value="'+commission+'"></td><td>'+stock+'<input type="hidden" name="stock[]" value="'+stock+'"><input type="hidden" name="subname[]" value="'+subname+'"><input type="hidden" name="brandname[]" value="'+brandname+'"></td><td><a  class="block_tip tooltips text-center" onclick="remove_tr('+tr_count+')"><i class="fa fa-times"></i></a></td></tr>';
			
			$('#table_div').css('display','block');
			
			var append_data = $('#product_tobody').append(data);
			
			var rowcount = parseInt(tr_count)+parseInt(1);
			
			$('#tr_count').val(rowcount);
			
			$('form#product')[0].reset();
			}
			else {
				swal('please Enter the Product');
				$('#sub_categoryname').focus();
				return false;
			}
		}
		
		function remove_tr(tr_count)
		{
		   	var rem = confirm("Do you want to Remove the Purchase ?");
			if(rem = 'true')
			{
			$('#row'+tr_count).remove();
			}
		}
		
		/******* App Status Enabled ********/
		
		function app_status(appstatus,dept,subid)
		{
			$.ajax({
			    
                url     : 'app_status.php',
                type    : 'POST',				
				data    : {'appstatus':appstatus,'dept':dept,'subid':subid},
				
				success : function(app)
				{
					
				}
		  });
		}
		function approve_status_new(saleorder_id,dept)
		{
			
		$.ajax({
			    
                url     : 'approve_status_new.php',
                type    : 'POST',				
				data    : {'saleorder_id':saleorder_id,'dept':dept},
				
				success : function(approve)
				{
					
					if(approve == 1)
					{
					  swal({
		                    
						title: 'This Sale Order is Approved',
		                type: 'success'
	                 }, function() {
		                window.location = 'salesorder_new.php';
	                  });
						
					}
				}
		  });
		}
		
		function approve_status(saleorder_id,dept)
		{
			
		$.ajax({
			    
                url     : 'approve_status.php',
                type    : 'POST',				
				data    : {'saleorder_id':saleorder_id,'dept':dept},
				
				success : function(approve)
				{
					
					if(approve == 1)
					{
					  swal({
		                    
						title: 'This Sale Order is Approved',
		                type: 'success'
	                 }, function() {
		                window.location = 'salesorder.php';
	                  });
						
					}
				}
		  });
		}
		
		function editqty(tid)
		{
			
			$('#edit_qty'+tid).removeAttr('readonly');
			$('#edit_qty'+tid).val('');
			$('#edit_qty'+tid).focus();
			
			
		}
		function edit_salesorder(saleorder_id,price,prodid,tid,sale_qty,order_qty,order_total,dept)
		{
			 if(parseInt(sale_qty) != "")
			 {
		
			if(parseInt(sale_qty) <= parseInt(order_qty))
			{
				var sale_total = parseInt(price) * parseInt(sale_qty);
				
				$('#edit_price'+tid).val(sale_total);
				
				$.ajax({
			    
                url     : 'sale_qty.php',
                type    : 'POST',				
				data    : {'saleorder_id':saleorder_id,'dept':dept,'prodid':prodid,'tid':tid,'sale_qty':sale_qty,'sale_total':sale_total},
				
				success : function(saleqty)
				{
					
				}
			});
				
				
			}
			else
			{
				alert('Execces the order Qty Limit...!!! Order Qty='+order_qty);
				$('#edit_qty'+tid).val(order_qty);
				$('#edit_price'+tid).val(order_total);
				$.ajax({
			    
                url     : 'sale_qty.php',
                type    : 'POST',				
				data    : {'saleorder_id':saleorder_id,'dept':dept,'prodid':prodid,'tid':tid,'sale_qty':order_qty,'sale_total':order_total},
				
				success : function(saleqty)
				{
					
				}
			});
				
			}
			
			
			
		}
		}
		
		/*** new Sale Change ****/
		
		function edit_salesorder_new(saleorder_id,price,prodid,tid,sale_qty,order_qty,order_total,dept)
		{
			 if(parseInt(sale_qty) != "")
			 {
			if(parseInt(sale_qty) <= parseInt(order_qty))
			{
				var sale_total = parseInt(price) * parseInt(sale_qty);
				
				$('#edit_price'+tid).val(sale_total);
				
				$.ajax({
			    
                url     : 'sale_qtynew.php',
                type    : 'POST',				
				data    : {'saleorder_id':saleorder_id,'dept':dept,'prodid':prodid,'tid':tid,'sale_qty':sale_qty,'sale_total':sale_total},
				
				success : function(saleqty)
				{
					
				}
			});
				
				
			}
			else if(parseInt(sale_qty) >= parseInt(order_qty))
			{
				alert('Execces the order Qty Limit...!!! Order Qty='+order_qty);
				
				$('#edit_qty'+tid).val(order_qty);
				$('#edit_price'+tid).val(order_total);
				$.ajax({
			    
                url     : 'sale_qty.php',
                type    : 'POST',				
				data    : {'saleorder_id':saleorder_id,'dept':dept,'prodid':prodid,'tid':tid,'sale_qty':order_qty,'sale_total':order_total},
				
				success : function(saleqty)
				{
					
				}
			});
				
			}
			
			
			
		}
		}
		
		
		/***** Print Window****/
 function printDiv(salesid,dept,userid) 
 {
 var divToPrint=document.getElementById('DivIdToPrint');
 var newWin=window.open('','Print-Window');
  
  $.ajax({
			    
                url     : 'sales_print1.php',
                type    : 'POST',				
				data    : {'salesid':salesid,'dept':dept,'userid':userid},
				success : function(sales_print)
				{ 
				var sales_print = sales_print.split('@');
				
				 $('#overall').html(sales_print[1])
				 $('#cusname').html(sales_print[2]);
				 $('#address').html(sales_print[3]);
				 $('#city').html(sales_print[4]);
				 $('#pincode').html(sales_print[5]);
				 $('#pincode').html(sales_print[6]);
				 $('#qrcode').html(sales_print[7]);
				 $('#orderdate').html(sales_print[8]);
				 $('#orderid').html(sales_print[9]);
			  	 $('#salesbody').html(sales_print[0]);
				 
                 // shipping Address

                 $('#shipping_cusname').html(sales_print[2]);
				 $('#shipping_address').html(sales_print[3]);
				 $('#shipping_city').html(sales_print[4]);
				 $('#shipping_pincode').html(sales_print[5]);
				 
				 
			  	 		
					 
				  newWin.document.open();
				  newWin.document.write('<html>');
				  newWin.document.write('<head>');
				  newWin.document.write('</head>'); 
				  newWin.document.write('<body onload="window.print()">'+divToPrint.innerHTML+'</body>');
				  newWin.document.write('<body onload="window.print()">'+divToPrint1.innerHTML+'</body>');
				  newWin.document.write('</html>');
				  newWin.document.close();
				  setTimeout(function(){newWin.close();},10);	 
 
				}

				
        });
					
  
 

}

 /***** Multiple Print *******/

 function multiple_print(salesid,dept,userid) 
{
  
   for (var count = 1; count < 3; count++) {
	   if(count == 1){ var BillType = 'Transport Copy';}
       else if(count == 2){var BillType = 'Customer Copy'}
        $('<iframe />', {
            id   : 'printIFrame' + count,
            name : 'printIFrame' + count,
            on   : {
                load: function() {
                    this.contentWindow.focus();
                    this.contentWindow.print();
                }
            },
            src  : 'sales_printnew.php?salesid='+salesid+'&dept='+dept+'&userid='+userid+'&BillType='+BillType+'&userNow='+ count,
        }).appendTo('body');
    }

}

</script>
</body>
</html>