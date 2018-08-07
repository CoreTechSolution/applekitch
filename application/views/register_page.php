<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'templates/header.php';
?>
	<div class="inner-pages">
	<div class="wrapper2">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 registration">
					<h1>Registration</h1>
					<p>Please fill up the registration form.</p>
                    <p>
                        <?php echo form_error(); ?>
                    </p>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-2"></div>
				<div class="col-lg-8">
					<?php
					$error_msg=$this->session->flashdata('error_msg');
					if($error_msg){
						?>
                        <div class="alert alert-danger">
							<?php echo $error_msg; ?>
                        </div>
					<?php } ?>
					<div class="login_form">
						<form id="register_form" action="/register/check" method="POST">
                            <div class="from-group">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h2 style="text-align: center;">I am a</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="from-group user_type_wrap">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <label for="parent" class="btn btn-primary btn-primary-green active">Parent <input id="parent" checked type="radio" name="user_type" value="1"/></label>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="teacher" class="btn btn-primary btn-primary-green">Teacher <input id="teacher" type="radio" name="user_type" value="4"/></label>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="school" class="btn btn-primary btn-primary-green">School <input id="school" type="radio" name="user_type" value="4"/></label>
                                    </div>
                                </div>
                            </div>
							<div class="from-group">
								<din class="row">
									<div class="col-lg-6">
										<label>First Name <span>*</span></label>
										<input type="text" name="fname" class="form-control" value="<?= set_value('fname') ?>" />
									</div>
									<div class="col-lg-6">
										<label>Last Name <span>*</span></label>
										<input type="text" name="lname" class="form-control" value="<?= set_value('lname') ?>" />
									</div>
								</din>
							</div>

							<div class="from-group">
								<label>Email Address <span>*</span></label>
								<input type="text" name="email_address" class="form-control" value="<?= set_value('email_address') ?>" />
							</div>
							<div class="from-group">
								<din class="row">
									<div class="col-lg-6">
										<label>Password <span>*</span></label>
										<input id="pwd1" type="password" name="pwd1" class="form-control" />
									</div>
									<div class="col-lg-6">
										<label>Confirm Password <span>*</span></label>
										<input id="pwd2" type="password" name="pwd2" class="form-control" />
									</div>
								</din>
							</div>

							<!--<br>
							<div class="from-group">
								<label>Phone</label>
								<input type="text" name="phone" class="form-control" />
							</div>-->
							<br>
							<div class="from-group">
								<div class="checkbox">
									<label><input name="terms" type="checkbox" value="1"> By clicking Register, you agree to our <a href="#">Terms & Conditions</a> and that you have read our <a href="#">Privacy Policy</a>.</label>
								</div>
							</div>
							<br>
							<div class="from-group">
								<input type="submit" name="register" value="Register" class="form-control btn btn-primary btn-primary-green"/>
							</div>
						</form>
					</div>
					<br>

				</div>
				<div class="col-lg-2"></div>
			</div>

		</div>
	</div>
<?php
require_once 'templates/footer.php';
?>