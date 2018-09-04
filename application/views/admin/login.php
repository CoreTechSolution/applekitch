<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'templates/header.php';
?>
	<div class="container-fluid">
		<div class="row">
			<main role="main" class="col-md-12 ml-sm-auto col-lg-12">
				<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
					<h1 class="h2"><?php $title; ?></h1>
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
							<form id="login_form" action="<?php echo base_url('/admin/login_submit'); ?>" method="POST">
								<div class="from-group">
									<label>Username</label>
									<input type="text" name="username" class="form-control" required>
								</div>
								<br>
								<div class="from-group">
									<label>Password</label>
									<input type="password" name="pwd" class="form-control" required>
								</div>
								<br>
								<div class="from-group">
									<input type="submit" name="login" value="Login" class="form-control btn btn-primary btn-primary-green"/>
								</div>
							</form>
						</div>
					</div>
					<div class="col-lg-3"></div>
				</div>
			</main>
		</div>
	</div>
<?php
require_once 'templates/footer.php';
?>