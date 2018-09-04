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
				<form method="post" action="<?= base_url('/admin/save_grade') ?>" enctype="multipart/form-data">
					<div class="form-group">
						<div class="row">
							<div class="col-md-6">
								<label>Name: </label>
								<input required type="text" name="name" id="grade_name" class="form-control" value=""/>
							</div>
							<div class="col-md-6">
								<label>Short Name: </label>
								<input required type="text" name="short_name" id="short_name" class="form-control" value=""/>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-lg-12">
								<label>Upload Image:</label>
								<input required name="img" class="form-control" type="file" accept=""/>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-12">
								<div style="text-align: right;">
									<input type="submit" name="save" class="btn btn-primary btn-primary-green" value="Add"/>
								</div>
							</div>
						</div>
					</div>
				</form>
			</main>
		</div>
	</div>
	<script>
        jQuery(function(){
            jQuery('.table').footable();
        });
	</script>
<?php
require_once 'templates/footer.php';
?>