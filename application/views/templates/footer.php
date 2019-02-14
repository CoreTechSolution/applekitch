<div class="wrapper10">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
				<div class="footer-logo">
					<img src="<?php echo base_url('/assets/images/logo.png'); ?>">
				</div>
				<div class="footer-about">
					<p>Apple Kitch is an educational platform which helps children between the ages 4 to 11 develop their Math and English skills, confidence and ability. Using Math and English worksheets in addition to interactive learning exercises Apple Kitch helps to make education fun and interesting.</p>
				</div>
			</div>
			<div class="col-lg-5">
				<div class="footermenu">
					<div class="row">
						<div class="col-lg-2 col-md-12 col-sm-12 col-xs-12">
							<p class="col1">Menu</p>
						</div>
						<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
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
						<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
							<div class="col2">
								<ul>
									<li><a href="<?php echo base_url('/pages/web-tour'); ?>">Web Tour</a></li>
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
			<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
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
                        <li><a target="_blank" href="<?php echo social_media_link('facebook'); ?>"><i class="fa fa-facebook-f"></i></a></li>
                        <li><a target="_blank" href="<?php echo social_media_link('twitter'); ?>"><i class="fa fa-twitter"></i></a></li>
                       <!-- <li><a href="<?php /*echo social_media_link('google_plus'); */?>"><i class="fa fa-google-plus-g"></i></a></li>-->
                        <li><a target="_blank" href="<?php echo social_media_link('instragram'); ?>"><i class="fa fa-instagram"></i></a></li>
                        <li><a target="_blank" href="<?php echo social_media_link('youtube'); ?>"><i class="fa fa-youtube"></i></a></li>
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
<!--Login  Registration Modal-->
<div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <ul id="myTab" class="nav nav-tabs nav-tabs-responsive" role="tablist">
                    <li role="presentation" class="active">
                        <a href="#register" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">
                            <h4 class="modal-title w-100 font-weight-bold">Register</h4>
                        </a>
                    </li>
                    <li role="presentation" class="next">
                        <a href="#login" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile">
                            <h4 class="modal-title w-100 font-weight-bold">Login</h4>
                        </a>
                    </li>
                </ul>

                <div id="myTabContent" class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active show " id="register" aria-labelledby="home-tab">
                        <div class="modal-body mx-3">
                            <div class="md-form mb-4">
                                <label>First Name <span>*</span></label>
                                <input type="text" name="fname" id="fname" class="form-control" value="<?= set_value('fname') ?>" />
                            </div>

                            <div class="md-form mb-4">
                                <label>Last Name <span>*</span></label>
                                <input type="text" name="lname" id="lname" class="form-control" value="<?= set_value('lname') ?>" />
                            </div>
                            <div class="md-form mb-4">
                                <label>Email Address <span>*</span></label>
                                <input type="text" name="email_address" id="email_address" class="form-control" value="<?= set_value('email_address') ?>" />
                            </div>
                            <div class="md-form mb-4">
                                <label>Password <span>*</span></label>
                                <input id="pwd1" type="password" name="pwd1" id="pwd1" class="form-control" />
                            </div>
                            <div class="md-form mb-4">
                                <label>User Type <span>*</span></label><br>
                                <input id="parent" checked type="radio" name="user_type" value="1"/> Parent
                                <input id="teacher" type="radio" name="user_type" value="4"/> Teacher
                                <input id="school" type="radio" name="user_type" value="4"/> School
                            </div>

                        </div>
                        <div class="modal-footer d-flex justify-content-center">
                            <button class="btn btn-outline-default" onclick="modal_register();">Register</button>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="login" aria-labelledby="profile-tab">
                        <div class="modal-body mx-3">
                            <div class="md-form mb-5">
                                <i class="fa fa-user"></i>
                                <input type="text" name="username" id="username" class="form-control validate" placeholder="Username">
                            </div>

                            <div class="md-form mb-4">
                                <i class="fa fa-lock"></i>
                                <input type="password" name="password" id="password" class="form-control validate" placeholder="Password">
                            </div>

                        </div>
                        <div class="modal-footer d-flex justify-content-center">
                            <button class="btn btn-outline-default" onclick="modal_login();">Login</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<div class="modal fade" id="report_prob_modal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" >
                <h4><span class="glyphicon glyphicon-lock"></span> Report problem</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body" style="padding:40px 50px;">
                <input type="hidden" id="problem_q_id" name="problem_q_id">

                    <div class="form-group">
                        <label for="usrname"><span class="glyphicon glyphicon-user"></span> Message</label>
                        <textarea type="text" class="form-control" id="usrname" placeholder="Message"></textarea>
                    </div>
                    <button data-dismiss="modal" class="btn btn-success btn-block problem_send_btn"><span class="glyphicon glyphicon-off"></span> Send Report</button>

            </div>

        </div>

    </div>
</div>

<!--<div class="text-center">
    <a href="" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#modalLoginForm">Launch
        Modal Login Form</a>
</div>-->
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
<script src="<?php echo base_url('/assets/js/print.min.js'); ?>" type="text/javascript"></script>
<script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
<script src="<?php echo base_url('assets/js/rating.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/list.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/gauge.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/stepbar.js'); ?>"></script>

<script src="<?php echo base_url('assets/js/combinations.js'); ?>"></script>
<script>
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        var css = '@page { size: landscape; }',
            head = document.head || document.getElementsByTagName('head')[0],
            style = document.createElement('style');

        style.type = 'text/css';
        style.media = 'print';

        if (style.styleSheet){
            style.styleSheet.cssText = css;
        } else {
            style.appendChild(document.createTextNode(css));
        }

        head.appendChild(style);

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

    var monkeyList = new List('test-list', {
        page: 24,
        pagination: true
    });
    var i = 1;

    jQuery('.next').on('click', function (e) {
        e.preventDefault();
        i+=4;
        console.log(i);
        monkeyList.show(i, 24);
    });

    jQuery('.prev').on('click', function (e) {
        e.preventDefault();
        i-=4;
        console.log(i);
        monkeyList.show(i, 24);
    });
</script>


</body>
</html>