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
					<li<?php if($subject->id == $subject_var->id) { echo ' class="active"'; } ?>><a href="<?php echo base_url('/awards/'.$subject->slug.'/'.$grade_var->slug); ?>"><?php echo $subject->name;
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
					<li<?php if($grade->id == $grade_var->id) { echo ' class="active"'; } ?>><a href="<?php echo base_url('/awards/'
                                                                                                                .$subject_var->slug.'/'
                                                                                                   .$grade->slug); ?>"><?php
                        echo
                        $grade->name;
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

define('EXT', '.php');
if (is_file(APPPATH.'views/awards/' . $subject_var->slug.'/'.$grade_var->slug. EXT)) {
	$this->load->view('awards/'.$subject_var->slug.'/'.$grade_var->slug, $data);
} else {
    ?>
    <div class="container" style="min-height: 300px;">
        <div class="row">
            <div class="col-lg-12">
				<h1>Coming Soon...</h1>
            </div>
        </div>
    </div>
    <?php
}
?>
<?php
require_once 'templates/footer.php';
?>