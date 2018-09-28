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
                <div class="search_by_class">
                    <h4>Search By</h4>
                    <form action="<?php echo base_url('admin/questions/search') ?>" method="post">
                        <div class="row">
                            <div class="col-lg-2">
                                <label>Country: </label>
				                <?php echo form_dropdown('country_id',form_dropdown_cr(array('id','name'),'country'),'',array('class'=>'form-control')); ?>
                            </div>
                            <div class="col-lg-2">
                                <label>Subject: </label>
				                <?php echo form_dropdown('subject_id',form_dropdown_cr(array('id','name'),'subject'),'',array('class'=>'form-control')); ?>
                            </div>
                            <div class="col-lg-2">
                                <label>Grade: </label>
				                <?php echo form_dropdown('grade_id',form_dropdown_cr(array('id','name'),'grade'),'',array('class'=>'form-control')); ?>
                            </div>
                            <div class="col-lg-2">
                                <label>Category: </label>
				                <?php echo form_dropdown('category_id',form_dropdown_cr(array('id','name'),'category'),'',array('class'=>'form-control')); ?>
                            </div>
                            <div class="col-lg-2">
                                <label>Topic: </label>
				                <?php echo form_dropdown('topic_id',form_dropdown_cr(array('topic_id','topic_name'),'topics'),'',array('class'=>'form-control')); ?>
                            </div>
                            <div class="col-lg-2" style="margin-top: 30px;">
                                <input type="submit" class="btn btn-small btn-primary" value="Search">
                                <a href="<?php echo base_url('admin/questions'); ?>" class="btn btn-small btn-secondary">Clear</a>
                            </div>
                        </div>
                    </form>
                </div>

				<table class="table" data-paging="true" data-sorting="true" data-filtering="true" data-paging-size="20">
					<thead>
					<tr>
						<th>Sl. No</th>
						<th>Question</th>
						<th>Country</th>
						<th>Subject</th>
						<th>Grade</th>
						<th>Category</th>
						<th>Topic</th>
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
								<td><?php echo get_returnfield('country','id',$question->country_id,'name'); ?></td>
								<td><?php echo get_returnfield('subject','id',$question->subject_id,'name'); ?></td>
								<td><?php echo get_returnfield('grade','id',$question->grade_id,'name'); ?></td>
								<td><?php echo get_returnfield('category','id',$question->category_id,'name'); ?></td>
								<td><?php echo get_returnfield('topics','topic_id',$question->topic_id,'topic_name'); ?></td>
								<td>
                                    <a class="edit_link" href="<?php echo base_url('admin/edit_question/'.$question->question_id); ?>"><span data-feather="edit"></span> Edit</a><br>
                                    <a class="delete_link fancybox" data-fancybox-type="iframe" style="color: green;" href="<?php echo
                                    base_url('/admin/preview'); ?>?qid=<?php echo $question->question_id; ?>"><span data-feather="eye"></span> Preview</a>
                                    <br/>
                                    <a class="delete_link" onclick="delete_data(<?php echo $question->question_id; ?>,'question_id','questions');" href="javascript:void(0)"><span data-feather="delete"></span> Delete</a></td>
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