<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'templates/header.php';
?>
	<div class="inner-pages">
		<div class="wrapper2">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 registration">
						<h1>Login</h1>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-3"></div>
					<div class="col-lg-6">
						<?php
						$success_msg= $this->session->flashdata('success_msg');
						$error_msg= $this->session->flashdata('error_msg');

						if($success_msg){
							?>
                            <div class="alert alert-success">
								<?php echo $success_msg; ?>
                            </div>
							<?php
						}
						if($error_msg){
							?>
                            <div class="alert alert-danger">
								<?php echo $error_msg; ?>
                            </div>
							<?php
						}
						?>
						<div class="login_form">
							<form id="login_form" action="<?php echo base_url('/login/login_user'); ?>" method="POST">
								<div class="from-group">
									<label>Username or Email Address</label>
									<input type="text" name="email_id" class="form-control">
								</div>
								<br>
								<div class="from-group">
									<label>Password</label>
									<input type="password" name="pwd" class="form-control">
									<p style="text-align: right;"><a href="<?php echo base_url('/forgot-password') ?>">Forgot Password?</a></p>
								</div>
								<br>
								<div class="from-group">
									<input type="submit" name="login" value="Login" class="form-control btn btn-primary btn-primary-green"/>
								</div>
							</form>
                            <div class="social-login">
                                <label><span>Don't want to complete the form?</span></label>
                                <ul>
                                    <!--<li><a href="javascript:void(0);" onclick="fbLogin()" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                <li><a href="<?php /*echo $loginUrl; */?>"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>-->
                                    <li><a href="javascript:void(0);" onclick="fbLogin()" class="facbook_login_btn"> Continue with Facebook</a></li>
                                    <li><a href="<?php echo filter_var($authUrl, FILTER_SANITIZE_URL); ?>" class="google_login_btn"> Continue with Google</a></li>
                                    <!--<li><a href="<?php /*echo filter_var($authUrl, FILTER_SANITIZE_URL); */?>"><i class="fab fa-google-plus-square"></i> Continue with Google</a></li>-->
                                    <!--<li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>-->
                                </ul>
                            </div>
						</div>

					</div>
					<div class="col-lg-3"></div>
				</div>

			</div>
		</div>
	</div>
<?php
require_once 'templates/footer.php';
?>