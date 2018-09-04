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
				<form method="post" action="<?= base_url('/admin/edit_role_process'); ?>">
					<!--<div class="form-group">
						<div class="row">
							<div class="col-lg-4">
								<label for="limitq">Limit question</label>
							</div>
							<div class="col-lg-2">
								<input id="limitq" name="limitq"<?php /*if(!empty($role['limitq'])) { echo ' checked'; } */?> type="checkbox"/>
							</div>
						</div>
					</div>
					<div class="form-group limit"<?php /*if(empty($role['limitq'])) { */?> style="display: none;"<?php /*} */?>>
						<div class="row">
							<div class="col-lg-4">
								<label for="limit">Limit</label>
							</div>
							<div class="col-lg-6">
								<input id="limit" name="limit" type="number" value="<?php /*echo $role['limitq']; */?>" class="form-control"/>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-lg-12">
								<input name="submit" type="submit" value="Update" class="btn btn-primary btn-primary-green"/>
							</div>
						</div>
					</div>-->
				</form>
			</main>
		</div>
	</div>
	<!--<script>
        jQuery('#limitq').on('click', function(){
            if(this.checked) {
                jQuery('.limit').show();
            } else {
                jQuery('.limit').hide();
            }
        });
	</script>-->
<?php
require_once 'templates/footer.php';
?>