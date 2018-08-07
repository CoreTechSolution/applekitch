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
								<div class="box-title">Welcome to AppleKitch</div>
								<div class="box-container">
									<p>You are logged in as <strong><?php echo $user_data['fname']; ?> <?php echo $user_data['lname'] ?></strong>. If you are not <?php echo $user_data['fname']; ?> <?php echo $user_data['lname'] ?>, please <a href="<?= base_url('/login/user_logout'); ?>">click here</a> to logout.</p>
                                    <?php if($user_data['membership_plan'] != 1) { ?>
                                        <div class="alert alert-success">
                                            <div style="float: left; margin: 7px 0;">You are on Free Membership Plan.</div> <a style="float: right;" class="btn btn-primary btn-primary-green" href="<?= base_url('/membership-plan'); ?>">Upgrade</a>
                                            <div style="clear: both;"></div>
                                        </div>
                                    <?php } ?>
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