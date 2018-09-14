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
					<div class="container">
						<div class="row">
							<div class="col-lg-6">
								<h1 class="h2"><?= $title; ?></h1>
							</div>
							<div class="col-lg-6">
								<div style="text-align: right;">
									<a class="btn btn-sm btn-primary" href="<?= base_url('/admin/add_award_template'); ?>">Add Template</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php $this->load->view('admin/templates/error_v.php'); ?>
				<table class="table">
					<thead>
					<tr>
						<th>Sl. No.</th>
						<th>Name</th>
						<th>Actions</th>
					</tr>
					</thead>
					<tbody>
					<?php
					if(!empty($templates)) {
						$counter=1;
						foreach($templates as $template) {
							?>
							<tr>
								<td><?php echo $counter; ?></td>
								<td><?php echo $template->name; ?></td>
								<td><a class="edit_link" href="<?php base_url('/admin/edit_question_type'); ?>/<?php $template->topic_id; ?>"><span data-feather="edit"></span> Edit</a> | <a class="delete_link" onclick="delete_question_type(<?php echo $template->topic_id; ?>);" href="javascript:void(0)"><span data-feather="delete"></span> Delete</a></td>
							</tr>
							<?php
							$counter++;
						}
					}
					?>
					</tbody>
				</table>
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