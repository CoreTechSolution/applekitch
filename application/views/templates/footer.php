<div class="wrapper10">
	<div class="container">
		<div class="row">
			<div class="col-lg-4">
				<div class="footer-logo">
					<img src="<?php echo base_url('/assets/images/logo.png'); ?>">
				</div>
				<div class="footer-about">
					<p>Ex soleat habemus usu, te nec eligendi deserunt vituperata. Natum consulatu vel ea, duo cetero repudiare efficiendi cu. Has at quas nonumy facilisis, enim percipitur mei ad. Mazim possim adipisci sea ei, omnium aeterno platonem mei no.</p>
				</div>
			</div>
			<div class="col-lg-5">
				<div class="footermenu">
					<div class="row">
						<div class="col-lg-2">
							<p class="col1">Menu</p>
						</div>
						<div class="col-lg-4">
							<div class="col2">
								<ul>
									<li><a href="javascript:void(0)">For Student</a></li>
									<li><a href="javascript:void(0)">For Parents</a></li>
									<li><a href="javascript:void(0)">For Teacher</a></li>
									<li><a href="javascript:void(0)">For School</a></li>
									<li><a href="javascript:void(0)">Exercise Page</a></li>
									<li><a href="javascript:void(0)">About Us</a></li>
								</ul>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="col2">
								<ul>
									<li><a href="javascript:void(0)">Web Tour</a></li>
									<li><a href="javascript:void(0)">Contact us</a></li>
									<li><a href="javascript:void(0)">What We offer</a></li>
									<li><a href="javascript:void(0)">Reviews/Testimonial</a></li>
									<li><a href="javascript:void(0)">Awards and Certificates</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3">
				<p class="col1">Newsletter Signup</p>
				<div class="newsletter-form">
					<form method="post" action="">
						<input type="email" name="" placeholder="Enter Your Email">
						<input type="submit" name="" value="">
					</form>
				</div>
				<div class="social-connects"><a href="javascript:void(0)"><img src="<?php echo base_url('/assets/images/social-connects.png'); ?>"></a></div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<hr>
				<p class="copyright">© 2018 apple kitch. All rights reserved.</p>
			</div>
		</div>
	</div>
</div>

<script src="<?php echo base_url('/assets/js/loader.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('/assets/js/html5.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('/assets/js/bootstrap.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('/assets/js/footable.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('/assets/js/jquery.fancybox.pack.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('/assets/js/helpers/jquery.fancybox-media.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('/assets/js/jquery.slicknav.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('/assets/js/jquery.matchHeight-min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('/assets/js/jquery.bxslider.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('/assets/js/wow.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('/assets/js/jquery.validate.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('/assets/js/jquery.datetimepicker.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('/assets/js/tooltipster.bundle.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('/assets/js/theme.script.js'); ?>" type="text/javascript"></script>
<script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
<script>
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }
</script>
<script>
    jQuery(function(){
        jQuery('.table').footable();
    });
</script>

<!--
<script>
    jQuery( document ).ready(function( $ ) {
        jQuery(".fs").fsortable({
            connectWith: ".fs",
            tolerance: "pointer",
            size: 5
        }).disableSelection();

        jQuery("#content .item").draggable({
            connectToSortable: ".fs:not(.full)",
            revert: "invalid",
            helper: "clone",
            stop: function(e, ui) {
                jQuery("#img_order_student").val("");
                var file_name_array = [];
                jQuery(".fs .item img").each(function(){
                    var this_element = jQuery(this);
                    var src = jQuery(this_element).attr("src");
                    var tarr = src.split("/");
                    var file_name = tarr[tarr.length-1];
                    console.log(file_name);
                    file_name_array.push(file_name);
                    var file_name_string = file_name_array.toString();
                    jQuery("#img_order_student").val(file_name_string);
                });
            }
        });
    });
</script>-->

</body>
</html>