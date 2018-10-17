<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'templates/header.php';
?>
	<div class="inner-pages">
		<div class="wrapper2">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 registration">
						<h1><?php echo $title; ?></h1>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-3"></div>
					<div class="col-lg-6">
						<div class="login_form">
							<form id="login_form" action="<?php echo base_url('/login/login_user'); ?>" method="POST"></form>
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