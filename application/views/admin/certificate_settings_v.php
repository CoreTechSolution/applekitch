<?php
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
									<a class="btn btn-sm btn-sm btn-primary btn-primary-green" href="<?php echo base_url('/admin/add_certificate'); ?>">Add New</a>
									<a class="btn btn-sm btn-secondary btn-primary-green" href="<?php echo base_url('/admin/certificate_settings'); ?>">Settings</a>
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
						<th>Subject</th>
						<th>Grade</th>
						<th>Category</th>
						<th>Topics</th>
						<th>Create Date</th>
						<th>Actions</th>
					</tr>
					</thead>
					<tbody>
					<?php
					if(!empty($certificates)) {
						$counter=1;
						foreach($certificates as $certificate) {

							?>
							<tr>
								<td><?php echo $counter; ?></td>
								<td><?php echo $certificate->name; ?></td>
								<td><?php echo get_returnfield('subject','id',$certificate->subject_id,'name'); ?></td>
								<td><?php echo get_returnfield('grade','id',$certificate->grade_id,'name'); ?></td>
								<td><?php echo get_returnfield('category','id',$certificate->category_id,'name'); ?></td>
								<td><?php echo get_returnfield('topics','topic_id',$certificate->topic_id,'topic_name'); ?></td>
								<td><?php echo  dateFormat('m-d-Y',$certificate->create_dt); ?></td>
								<td><a class="edit_link" href="<?php echo base_url('/admin/edit_certificate'); ?>/<?php echo $certificate->id; ?>"><span data-feather="edit"></span> Edit</a> | <a class="delete_link" onclick="delete_data(<?php echo $certificate->id; ?>,'id','certificates');" href="javascript:void(0)"><span data-feather="delete"></span> Delete</a></td>
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