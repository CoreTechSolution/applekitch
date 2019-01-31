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
                <?php $this->load->view('admin/templates/error_v.php'); ?>
				<form method="post" action="<?= base_url('admin/'.$method) ?>">
					<div class="form-group">
						<div class="row">
                            <div class="col-md-6">
								<label>Subject: </label>
                                <?php echo form_dropdown('work_subject_id', form_dropdown_cr(array('id','name'),'work_subjects',false), '1',array('class'=>'form-control work_subject_id'));
                                ?>
							</div>
                            <div class="col-md-6">
								<label>Grade: </label>
                                <?php echo form_dropdown('work_grade_id', '---------Choose--------', '1',array('class'=>'form-control','id'=>'work_grade_id'));
                                ?>
							</div>
							<div class="col-md-6">
								<label>Name: </label>
								<input required type="text" name="name" id="name_work_cat" class="form-control" value=""/>
							</div>
                            <div class="col-md-6">
								<label>Slug: </label>
								<input required type="text" name="slug" id="slug" class="form-control" value="" readonly/>
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