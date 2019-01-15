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
									<a class="btn btn-primary btn-primary-green" href="<?= base_url('/admin/add_work_topic'); ?>">Add New</a>
								</div>
							</div>
						</div>
					</div>
				</div>
                <?php $this->load->view('admin/templates/error_v.php'); ?>
				<table class="table" data-paging="true" data-sorting="true" data-filtering="true" data-paging-size="20">
					<thead>
					<tr>
						<th>Name</th>
						<th>Subject</th>
						<th>Grade</th>
						<th>Category</th>
						<th>Action</th>
					</tr>
					</thead>
					<tbody>
					<?php
					//print_r($work_topics); exit;
					if(!empty($work_topics)) {
						foreach($work_topics as $work_topic) {
							?>
							<tr>
								<td><?= $work_topic->name; ?></td>
								<td><?= get_returnfield('work_subjects','id',$work_topic->work_subject_id,'name'); ?></td>
								<td><?= get_returnfield('work_grades','id',$work_topic->work_grade_id,'name'); ?></td>
								<td><?= get_returnfield('work_categories','id',$work_topic->work_cat_id,'name'); ?></td>
								<td>
                                <!--<a class="edit_link" href="<?php /*echo base_url('admin/edit_subject'); */?>/?subject_id=<?php /*echo $subject['id']; */?>"><span data-feather="edit"></span> Edit</a> | -->
                                <a class="delete_link" onclick="delete_data(<?php echo $work_topic->id; ?>,'id','work_topics');" href="javascript:void(0)"><span data-feather="delete"></span> Delete</a>
                                </td>
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