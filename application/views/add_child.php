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
								<div class="box-title"><?= $title; ?></div>
								<div class="box-container">
									<?php
									$error_msg=$this->session->flashdata('error_msg');
									if($error_msg){
										?>
										<div class="alert alert-danger">
											<?php echo $error_msg; ?>
										</div>
									<?php } ?>
									<?php if(isset($child_data)) { ?>
									<form id="edit_child_form" action="<?= base_url('/dashboard/edit_child_process'); ?>" method="POST">
									<?php } else { ?>
									<form id="add_child_form" action="<?= base_url('/dashboard/add_child_process'); ?>" method="POST">
									<?php } ?>
										<div class="form-group">
											<div class="row">
												<div class="col-lg-12">
													<label for="fname">First Name <span class="required">*</span></label>
													<input id="fname" name="fname" type="text"<?php if(isset($child_data)) { ?> value="<?=$child_data['fname'];?>"<?php } ?> class="form-control"/>
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="row">
												<div class="col-lg-12">
													<label for="lname">Last Name <span class="required">*</span></label>
													<input id="lname" name="lname" type="text" <?php if(isset($child_data)) { ?> value="<?=$child_data['lname'];?>"<?php } ?> class="form-control"/>
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="row">
												<div class="col-lg-12">
													<label for="email">Username <span class="required">*</span></label>
													<input id="email" name="email" type="text"<?php if(isset($child_data)) { ?>
                                                        value="<?=$child_data['email_address'];?>" disabled<?php } ?> class="form-control"/>
													<?php if(isset($child_data)) { ?>
														<input type="hidden" name="child_id" value="<?=$child_data['id'];?>" />
													<?php } ?>
												</div>
											</div>
										</div>
										<!--<div class="form-group">
											<div class="row">
												<div class="col-lg-12">
													<label for="password">Password <span class="required">*</span></label>
													<input id="password" name="password" type="password" value="" class="form-control"/>
												</div>
											</div>
										</div>-->
										<div class="form-group">
											<div class="row">
												<div class="col-lg-12">
													<input name="submit" type="submit"<?php if(isset($child_data)) { ?> value="Update"<?php } else { ?> value="Add"<?php } ?> class="btn btn-primary btn-primary-green"/>
												</div>
											</div>
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