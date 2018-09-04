<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'templates/header.php';
?>
	<div class="container-fluid">
		<div class="row">
			<nav class="col-md-2 d-none d-md-block bg-light sidebar">
				<?php require_once 'templates/profile_sidebar.php'; ?>
			</nav>

			<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
				<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
					<h1 class="h2"><?= $title; ?></h1>
				</div>
                <h5>Welcome to AppleKitch Admin</h5>
                <p>You are logged in as <strong>Admin</strong>. If you are not <strong>Admin</strong>, please <a href="<?= base_url('/admin/admin_logout'); ?>">click here</a> to logout.</p>
			</main>
		</div>
	</div>
<?php
require_once 'templates/footer.php';
?>