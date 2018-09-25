<?php
require_once 'templates/header.php';
?>
<div>
	<input type="hidden" class="question_id" name="question_id" value="<?php echo $question->question_id; ?>">
	<div class="row">
		<div class="col-lg-5">
			<div class="question_count">Question <a href="javacript:void(0);" id="play_question" data-question="<?php echo ($question->question_name); ?>"><i class="fas fa-volume-up"></i></a></div>
			<div class="question_display"><?php echo $question->question_name; ?></div>
			<!--<div id="play_text_div" class="play_text_div"></div>-->
		</div>
		<div class="col-lg-7">
			<?php //echo $question->form_data; exit(); ?>
			<?php $form_data=unserialize($question->form_data); ?>
			<input type="hidden" name="question_option" value="<?= $form_data['question_option']; ?>">
			<?php
			$check_data['question_option']=$form_data['question_option'];
			$check_data['form_data']=$form_data;
			$this->load->view('frontend/template_part/frontend_answer_check',$check_data);
			?>
			<!--<input type="submit" value="Submit" class="btn btn-small btn-outline-default qSubmit">-->
		</div>
	</div>
</div>
<style>
	.wrapper1, .wrapper10 {
        display: none;
    }
</style>
<?php
require_once 'templates/footer.php';
?>
