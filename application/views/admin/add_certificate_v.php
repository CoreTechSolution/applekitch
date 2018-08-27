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
									<a class="btn btn-sm btn-secondary" href="<?= base_url('/admin/certificates'); ?>">Certificates</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php $this->load->view('admin/templates/error_v.php'); ?>
				<form method="post" action="<?php echo base_url('/admin/'.$method) ?>">
					<div class="form-group">
						<div class="row">
							<div class="col-md-12">
								<label>Certificate Name: </label>
								<input required type="text" name="name" class="form-control" value=""/>
							</div>

						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-12">
								<label>Description: </label>
								<textarea name="description" class="form-control teaxtarea-nostyle" rows="10"></textarea>
							</div>

						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-6">
								<label>Subject: </label>
								<?php echo form_dropdown('subject_id',form_dropdown_cr(array('id','name'),'subject'),'',array('class'=>'form-control','id'=>'subject_id','required'=>true)); ?>
							</div>
							<div class="col-md-6">
								<label>Grade: </label>
								<?php echo form_dropdown('grade_id',form_dropdown_cr(array('id','name'),'grade'),'',array('class'=>'form-control','id'=>'grade_id','required'=>true)); ?>

							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-6">
								<label>Category: </label>
								<?php echo form_dropdown('category_id',form_dropdown_cr(array('id','name'),'category'),'',array('class'=>'form-control','id'=>'category_id','required'=>true)); ?>

							</div>
							<div class="col-md-6">
								<label>Topic: </label>
								<?php echo form_dropdown('topic_id',form_dropdown_cr(array('topic_id','topic_name'),'topics'),'',array('class'=>'form-control','id'=>'topic_id','required'=>true)); ?>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-12">
								<div class="custom-control custom-checkbox">
									<input type="checkbox" class="custom-control-input"  name="default_status" id="defaultUnchecked">
									<label class="custom-control-label" for="defaultUnchecked">Default</label>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-12">
								<input type="submit" name="save" class="btn btn-primary btn-primary-green" value="Add"/>
							</div>
						</div>
					</div>
				</form>
			</main>
		</div>
	</div>
<?php
require_once 'templates/footer.php';
?>