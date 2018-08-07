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
									<a class="btn btn-sm btn-secondary btn-primary-green" href="<?= base_url('/admin/question_option'); ?>">Question Options</a>
									<a class="btn btn-sm btn-secondary btn-primary-green" href="<?= base_url('/admin/question_type'); ?>">Question Type</a>
									<a class="btn btn-sm btn-primary" href="<?= base_url('/admin/add_question'); ?>">Add Question</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<table class="table" data-paging="true" data-sorting="true" data-filtering="true" data-paging-size="20">
					<thead>
					<tr>
						<th>Sl. No</th>
						<th>Name</th>
						<th>Actions</th>
					</tr>
					</thead>
					<tbody>
					<?php
					if(!empty($questions)) {
					    $counter=1;
						foreach($questions as $question) {
						    //print_r($question);
							?>
							<tr>
								<td><?php echo $counter; ?></td>
								<td><?php echo $question->question_name; ?></td>
								<td><a href="<?php base_url('/admin/edit_question'); ?>/<?php $question->question_id; ?>">Edit</a></td>
							</tr>
							<?php
                            $counter++;
						}
					}
					?>
					</tbody>
                    <tfoot>
                        <tr>
                            <td colspan="4">
                                <div class="pagination"></div>
                            </td>
                        </tr>
                    </tfoot>
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