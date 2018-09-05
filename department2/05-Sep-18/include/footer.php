       
	   <!-- start footer -->
        <footer class="footer-standard-dark bg-extra-dark-gray"> 
            <div class="bg-dark-footer padding-50px-tb text-center xs-padding-30px-tb">
                <div class="container">
                    <div class="row">
                        <!-- start copyright -->
                        <div class="col-md-6 col-sm-6 col-xs-12 text-left text-small xs-text-center">&copy; 2018 Powered by <a href="#" target="_blank" class="text-dark-gray">Do First Fortune Mart</a></div>
                        <div class="col-md-6 col-sm-6 col-xs-12 text-right text-small xs-text-center">
                            <a href="javascript:void(0);" class="text-dark-gray">Term and Condition</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="javascript:void(0);" class="text-dark-gray">Privacy Policy</a>
                        </div>
                        <!-- end copyright -->
                    </div>
                </div>
            </div>
        </footer>
        <!-- end footer --> 
        <!-- start scroll to top -->
        <a class="scroll-top-arrow" href="javascript:void(0);"><i class="ti-arrow-up"></i></a>
        <!-- end scroll to top  -->
        <!-- javascript libraries -->
        <script type="text/javascript" src="<?php echo $fsiteurl;?>js\jquery.js"></script>
        <script type="text/javascript" src="<?php echo $fsiteurl;?>js\modernizr.js"></script>
        <script type="text/javascript" src="<?php echo $fsiteurl;?>js\bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo $fsiteurl;?>js\jquery.easing.1.3.js"></script>
        <script type="text/javascript" src="<?php echo $fsiteurl;?>js\skrollr.min.js"></script>
        <script type="text/javascript" src="<?php echo $fsiteurl;?>js\smooth-scroll.js"></script>
        <script type="text/javascript" src="<?php echo $fsiteurl;?>js\jquery.appear.js"></script>
        <!-- menu navigation -->
        <script type="text/javascript" src="<?php echo $fsiteurl;?>js\bootsnav.js"></script>
        <script type="text/javascript" src="<?php echo $fsiteurl;?>js\jquery.nav.js"></script>
        <!-- animation -->
        <script type="text/javascript" src="<?php echo $fsiteurl;?>js\wow.min.js"></script>
        <!-- page scroll -->
        <script type="text/javascript" src="<?php echo $fsiteurl;?>js\page-scroll.js"></script>
        <!-- swiper carousel -->
        <script type="text/javascript" src="<?php echo $fsiteurl;?>js\swiper.min.js"></script>
        <!-- counter -->
        <script type="text/javascript" src="<?php echo $fsiteurl;?>js\jquery.count-to.js"></script>
        <!-- parallax -->
        <script type="text/javascript" src="<?php echo $fsiteurl;?>js\jquery.stellar.js"></script>
        <!-- magnific popup -->
        <script type="text/javascript" src="<?php echo $fsiteurl;?>js\jquery.magnific-popup.min.js"></script>
        <!-- portfolio with shorting tab -->
        <script type="text/javascript" src="<?php echo $fsiteurl;?>js\isotope.pkgd.min.js"></script>
        <!-- images loaded -->
        <script type="text/javascript" src="<?php echo $fsiteurl;?>js\imagesloaded.pkgd.min.js"></script>
        <!-- pull menu -->
        <script type="text/javascript" src="<?php echo $fsiteurl;?>js\classie.js"></script>
        <script type="text/javascript" src="<?php echo $fsiteurl;?>js\hamburger-menu.js"></script>
        <!-- counter  -->
        <script type="text/javascript" src="<?php echo $fsiteurl;?>js\counter.js"></script>
        <!-- fit video  -->
        <script type="text/javascript" src="<?php echo $fsiteurl;?>js\jquery.fitvids.js"></script>
        <!-- equalize -->
        <script type="text/javascript" src="<?php echo $fsiteurl;?>js\equalize.min.js"></script>
        <!-- skill bars  -->
        <script type="text/javascript" src="<?php echo $fsiteurl;?>js\skill.bars.jquery.js"></script> 
        <!-- justified gallery  -->
        <script type="text/javascript" src="<?php echo $fsiteurl;?>js\justified-gallery.min.js"></script>
        <!--pie chart-->
        <script type="text/javascript" src="<?php echo $fsiteurl;?>js\jquery.easypiechart.min.js"></script>
        <!-- instagram -->
        <script type="text/javascript" src="<?php echo $fsiteurl;?>js\instafeed.min.js"></script>
        <!-- retina -->
        <script type="text/javascript" src="<?php echo $fsiteurl;?>js\retina.min.js"></script>
        <!-- revolution -->
        <script type="text/javascript" src="<?php echo $fsiteurl;?>revolution\js\jquery.themepunch.tools.min.js"></script>
        <script type="text/javascript" src="<?php echo $fsiteurl;?>revolution\js\jquery.themepunch.revolution.min.js"></script>
       
	 		<script>
			
var $ = jQuery.noConflict();

$(document).ready(function() {


	var header = $(".navbar");
    $(window).scroll(function() {
        var scroll = $(window).scrollTop();
        if (scroll >= 100 && $(this).width() > 769) {
            header.addClass("nav-sticky");
        } else {
            header.removeClass('nav-sticky');
        }
    });	  

}); 

function Map_cse(city)
{
	$.ajax({
				
                url     : '../cse_map.php',
                type    : 'POST',				
				data    : {'city':city},
				
				success : function(mappin)
				{
				  $('#map_pincode').html(mappin);
				}
		  });
}
 
 
</script>
        <!-- setting -->
        <script type="text/javascript" src="<?php echo $fsiteurl;?>js\main.js"></script>
    </body>
</html>