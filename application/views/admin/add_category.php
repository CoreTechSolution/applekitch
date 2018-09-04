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
				<form method="post" action="<?= base_url('/admin/save_category') ?>">
					<div class="form-group">
						<div class="row">
							<div class="col-md-6">
								<label>Name: </label>
								<input required type="text" name="name" class="form-control" value=""/>
							</div>
							<?php /*if(!empty($grades)) { */?><!--
								<div class="col-md-6">
									<label>Grade: </label>
									<select class="form-control" name="grade">
										<option>----</option>
										<?php /*foreach($grades as $grade) { */?>
											<option value="<?/*= $grade['id']; */?>"><?/*= $grade['name']; */?></option>
										<?php /*} */?>
									</select>
								</div>
							--><?php /*} */?>
						</div>
					</div>
					<!--<div class="form-group">
						<div class="row">
							<?php /*if(!empty($countries)) { */?>
							<div class="col-lg-6">
								<label>Country: </label>
								<select class="form-control" name="country">
									<option>----</option>
									<?php /*foreach($countries as $country) { */?>
										<option value="<?/*= $country['id']; */?>"><?/*= $country['name']; */?></option>
									<?php /*} */?>
								</select>
							</div>
							<?php /*} */?>
							<?php /*if(!empty($subjects)) { */?>
							<div class="col-lg-6">
								<label>Subject: </label>
								<select class="form-control" name="subject">
									<option>----</option>
									<?php /*foreach($subjects as $subject) { */?>
										<option value="<?/*= $subject['id']; */?>"><?/*= $subject['name']; */?></option>
									<?php /*} */?>
								</select>
							</div>
							<?php /*} */?>
						</div>
					</div>
					<?php /*if(!empty($category)) { */?>
					<div class="form-group">
						<div class="row">
							<div class="col-lg-12">
								<label>Parent Category: </label>
								<select class="form-control" name="parent">
									<option>----</option>
									<?php /*foreach($category as $cat) { */?>
										<option value="<?/*= $cat['id']; */?>"><?/*= $cat['name']; */?></option>
									<?php /*} */?>
								</select>
							</div>
						</div>
					</div>
					--><?php /*} */?>
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