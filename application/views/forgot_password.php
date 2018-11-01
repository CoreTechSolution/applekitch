<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'templates/header.php';
?>
	<div class="inner-pages">
		<div class="wrapper2">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 registration">
						<h1>Forgot Password</h1>
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
							<form id="forgot_password" action="<?= base_url('/login/forgot_password_submit'); ?>" method="POST">
								<div class="from-group">
									<label>Registered Email Address</label>
									<input type="text" name="email_id" class="form-control">
								</div>
								<br>
								<div class="from-group">
									<input type="submit" name="forgot" value="Send Request" class="form-control btn btn-primary btn-primary-green"/>
								</div>

							</form>

						</div>
                        <div class="forget_message">
                            <!--<h5>Your recovery email is on its way</h5>-->
                            <ul>
                                <li>If there is an account associated with your email address, we will send you an email containing your password recovery link.</li>
                                <li>For security purposes, this link is valid only for the next 24 hours.</li>
                                <li>If you do not receive an email within 10 minutes, check your spam folder first, then try again.</li>
                                <li>If the issue persists, please <a href="<?= base_url('pages/contact-us'); ?>">contact us</a>.</li>
                            </ul>
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