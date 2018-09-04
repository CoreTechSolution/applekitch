<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'templates/header.php';
?>
	<div class="inner-pages backend">
		<div class="container">
			<div class="row">
				<div class="col-lg-3">
					<?php require_once 'templates/profile_sidebar.php'; ?>
				</div>
				<div class="col-lg-9">
					<div class="contentSection">
						<div class="dashboard-section">
							<div class="box-wrapper">
								<div class="box-title">Manage Profile</div>
								<div class="box-container">
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
									<form id="manage_profile" action="<?php echo base_url('/dashboard/save_profile'); ?>" method="POST" enctype="multipart/form-data">
										<div class="from-group">
											<din class="row">
												<div class="col-lg-6">
													<label>First Name <span>*</span></label>
													<input type="text" name="fname" class="form-control" value="<?php echo $user_data['fname']; ?>" />
												</div>
												<div class="col-lg-6">
													<label>Last Name <span>*</span></label>
													<input type="text" name="lname" class="form-control" value="<?php echo $user_data['lname']; ?>" />
												</div>
											</din>
										</div>
										<br>
										<div class="from-group">
											<label>Email Address <span>*</span></label>
											<input type="text" name="email_address" readonly="readonly" class="form-control" value="<?php echo $user_data['email_address']; ?>" />
										</div>
										<br>
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
                                        <br><br>
                                        <div class="from-group">
                                            <din class="row">
                                                <div class="col-lg-6">
                                                    <label>Profile Image </label>
                                                    <input id="profile_img" type="file" name="profile_img" class="form-control" />
                                                </div>
                                                <div class="col-lg-6">
	                                                <?php if(!empty($user_data['profile_img']) && $user_data['profile_img']!==''){ ?>
                                                        <img src="<?php echo $user_data['profile_img']; ?>" alt="" class="admin_edit_img_preview">
	                                                <?php } ?>
                                                </div>
                                            </din>
                                        </div>
										<!--<br>
										<div class="from-group">
											<label>Phone</label>
											<input type="text" name="phone" class="form-control" value="<?/*= $user_data['phone']; */?>" />
										</div>-->
										<br>
										<div class="from-group">
											<input type="submit" name="update" value="Update" class="form-control btn btn-primary btn-primary-green"/>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php
require_once 'templates/footer.php';
?>