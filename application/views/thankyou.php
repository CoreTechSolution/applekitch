<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'templates/header.php';
?>
<div class="inner-pages backend">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="contentSection">
					<?php if($action == 'payment-success'){ ?>
						<div class="alert alert-success alert-message">
							<p>Payment successful.</p>
							<p>Membership has been activated</p>
						</div>
					<?php } ?>

					<?php if($action == 'forgotpassword'){ ?>
						<div class="alert alert-success alert-message">
							<p>Please check your registered email and click on the reset password link.</p>
						</div>
					<?php } ?>

					<?php if($action == 'resetpassword'){ ?>
						<div class="alert alert-success alert-message">
							<p>Your password updated successfully. Please click here to <a class="alink" href="<?= base_url('/login'); ?>">Sign In</a></p>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
require_once 'templates/footer.php';
?>
