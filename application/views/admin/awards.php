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
				<form method="post" action="">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Select Subject</label>
								<?php
								$subjects = form_dropdown_cr(array('slug', 'name'), 'subject');
								?>
								<select name="subject" class="form-control">
									<?php foreach($subjects as $key => $sub) { ?>
										<?php if(isset($subject)) { ?>
											<option<?php if($key == $subject) { echo ' selected="selected"'; } ?> value="<?php echo $key ?>"><?php echo $sub; ?></option>
										<?php } else { ?>
											<option value="<?php echo $key ?>"><?php echo $sub; ?></option>
										<?php } ?>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Select Subject</label>
								<?php
								$grades = form_dropdown_cr(array('slug', 'name'), 'grade');
								?>
								<select name="grade" class="form-control">
									<?php foreach($grades as $key1 => $gr) { ?>
										<?php if(isset($grade)) { ?>
											<option<?php if($key1 == $grade) { echo ' selected="selected"'; } ?> value="<?php echo $key1; ?>"><?php echo $gr; ?></option>
										<?php } else { ?>
											<option value="<?php echo $key1; ?>"><?php echo $gr; ?></option>
										<?php } ?>
									<?php } ?>
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<input type="submit" name="submit" value="Submit" class="btn btn-primary">
							</div>
						</div>
					</div>
				</form>
				<?php if(isset($grade) && isset($subject)) { ?>
				<form method="POST" action="" enctype="multipart/form-data">
					<?php for($i=0;$i<=40;$i++) { ?>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<input class="form-control" type="file" name="img_<?php echo $i; ?>" />
								</div>
							</div>
						</div>
					<?php } ?>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<input type="submit" name="save" value="Save" class="btn btn-primary">
							</div>
						</div>
					</div>
				</form>
				<?php } ?>
			</main>
		</div>
	</div>
<?php
require_once 'templates/footer.php';
?>