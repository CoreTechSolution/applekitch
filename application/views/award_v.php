<?php
require_once 'templates/header.php';
?>
<div class="award_subject">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<?php if(!empty($subjects)) { ?>
				<ul>
					<?php foreach($subjects as $subject) { ?>
					<li><a href="<?php echo base_url('/awards/'.$subject->slug.'/'.$grade_var->slug); ?>"><?php echo $subject->name;
					?> Awards</a></li>
					<?php } ?>
				</ul>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
<div class="award_grade">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<?php if(!empty($grades)) { ?>
				<ul>
					<?php foreach($grades as $grade) { ?>
					<li><a href="<?php echo base_url('/awards/'.$subject_var->slug.'/'.$grade->slug); ?>"><?php echo $grade->name;
					?></a></li>
					<?php } ?>
				</ul>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
<?php
$data['user_data'] = $user_data;
$data['subjects'] = $subjects;
$data['grades'] = $grades;
$data['subject_var'] = $subject_var;
$data['grade_var'] = $grade_var;
$data['title'] = $title;
$data['question_ans'] = $question_ans;
$data['ans_topic'] = $ans_topic;

$this->load->view('awards/'.$subject_var->slug.'/'.$grade_var->slug, $data);
?>
<?php
require_once 'templates/footer.php';
?>