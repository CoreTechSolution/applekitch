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
								<h1 class="h2"><?php echo $title; ?></h1>
							</div>
							<div class="col-lg-6">
								<div style="text-align: right;">
									<a class="btn btn-sm btn-primary" href="<?php echo base_url('/admin/add_question_option'); ?>">Add option</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<table class="table">
					<thead>
					<tr>
						<th>SL No</th>
						<th>Name</th>
						<th>Actions</th>
					</tr>
					</thead>
					<tbody>
					<?php
					if(!empty($question_options)) {
					    $count=1;
						foreach($question_options as $question_option) {
							?>
							<tr>
								<td><?php echo $count; ?></td>
								<td><?php echo $question_option->option_name; ?></td>
								<td><a class="edit_link" href="<?php echo base_url('/admin/edit_question_option'); ?>/<?php echo $question_option->option_id; ?>"><span data-feather="edit"></span> Edit</a> | <a class="delete_link" onclick="delete_data(<?php echo $question_option->option_id; ?>,'option_id','question_option');" href="javascript:void(0)"><span data-feather="delete"></span> Delete</a></td>
							</tr>
							<?php
                            $count++;
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