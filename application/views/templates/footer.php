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
									<li><a href="<?php echo base_url('/pages/for-student'); ?>">For Student</a></li>
									<li><a href="<?php echo base_url('/pages/for-parents'); ?>">For Parents</a></li>
									<li><a href="<?php echo base_url('/pages/for-teacher'); ?>">For Teacher</a></li>
									<li><a href="<?php echo base_url('/pages/for-school'); ?>">For School</a></li>
									<li><a href="<?php echo base_url('/grades'); ?>">Exercise Page</a></li>
									<li><a href="<?php echo base_url('/pages/about-us'); ?>">About Us</a></li>
								</ul>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="col2">
								<ul>
									<li><a href="javascript:void(0)">Web Tour</a></li>
									<li><a href="<?php echo base_url('/pages/contact-us'); ?>">Contact us</a></li>
									<li><a href="<?php echo base_url('/pages/what-we-offer'); ?>">What We offer</a></li>
									<li><a href="<?php echo base_url('/pages/reviews-testimonials'); ?>">Reviews/Testimonial</a></li>
                                    <?php if(loginCheck()){ ?>
									<li><a href="<?php echo base_url('/awards'); ?>">Awards and Certificates</a></li>
                                    <?php } ?>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3">
                <?php if(!loginCheck()) { ?>
				<p class="col1">Newsletter Signup</p>
				<div class="newsletter-form">
					<form method="post" action="<?php echo base_url('/home/newsletter'); ?>">
						<input type="email" name="email_id" placeholder="Enter Your Email">
						<input type="submit" name="submit" value="">
					</form>
				</div>
                <?php } ?>
				<div class="social-connects">
                    <ul class="footer_social_link">
                        <li><a target="_blank" href="<?php echo social_media_link('facebook'); ?>"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a target="_blank" href="<?php echo social_media_link('twitter'); ?>"><i class="fab fa-twitter"></i></a></li>
                       <!-- <li><a href="<?php /*echo social_media_link('google_plus'); */?>"><i class="fab fa-google-plus-g"></i></a></li>-->
                        <li><a target="_blank" href="<?php echo social_media_link('instragram'); ?>"><i class="fab fa-instagram"></i></a></li>
                        <li><a target="_blank" href="<?php echo social_media_link('youtube'); ?>"><i class="fab fa-youtube"></i></a></li>
                    </ul>
                </div>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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

<script src="<?php echo base_url('assets/js/combinations.js'); ?>"></script>
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
        //jQuery('.table').footable();
    });
    wow = new WOW(
        {
            boxClass:     'wow',      // default
            animateClass: 'animated', // default
            offset:       0,          // default
            mobile:       true,       // default
            live:         true        // default
        }
    )
    wow.init();
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