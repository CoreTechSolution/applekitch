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
									<a class="btn btn-sm btn-primary" href="<?= base_url('/admin/add_topic'); ?>">Add Topic</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<table class="table">
					<thead>
					<tr>
						<th>Name</th>
						<th>Actions</th>
					</tr>
					</thead>
					<tbody>
					<?php
					if(!empty($topics)) {
						foreach($topics as $topic) {
							?>
							<tr>
								<td><?php echo $topic->topic_name; ?></td>
								<td><a class="edit_link" href="<?php base_url('/admin/edit_question_type'); ?>/<?php $topic->topic_id; ?>"><span data-feather="edit"></span> Edit</a> | <a class="delete_link" onclick="delete_question_type(<?php echo $topic->topic_id; ?>);" href="javascript:void(0)"><span data-feather="delete"></span> Delete</a></td>
							</tr>
							<?php
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