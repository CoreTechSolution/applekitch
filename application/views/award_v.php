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
					<li<?php if($subject->id == $subject_var->id) { echo ' class="active"'; } ?>><a href="<?php echo base_url('/awards/'.$subject->slug.'/'.$grade_var->slug); ?>/?child_id=<?php echo $child_id; ?>"><?php echo $subject->name;
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
					<li<?php if($grade->id == $grade_var->id) { echo ' class="active"'; } ?>><a href="<?php echo base_url('/awards/'.$subject_var->slug.'/'.$grade->slug); ?>/?child_id=<?php echo $child_id; ?>"><?php echo $grade->name; ?></a></li>
					<?php } ?>
				</ul>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
<?php
/*$data['user_data'] = $user_data;
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
    */?><!--
    <div class="container" style="min-height: 300px;">
        <div class="row">
            <div class="col-lg-12">
				<h1>Coming Soon...</h1>
            </div>
        </div>
    </div>
    --><?php
/*}*/
?>
<?php
$colorcode = explode('|',COLORCODE);
//$answered = array();
$type = 'stuffed animal';
$days = array();
$seconds = 0;
$hours = 0;
$mins = 0;
$secs = 0;
$timeFormat = 0;
$total_question = 0;
$smartScore = 0;
$count = 0;
if(!empty($question_ans)) {
	foreach ( $question_ans as $result ) {
		//$answered[$result->question_id] = $result;
		$seconds += $result->ans_time;
		$timestamp = strtotime($result->submit_date);
		$submit_date = date("Y-m-d", $timestamp);
		$days[$submit_date] = $result->id;
		$smartScore += $result->marks;
	}
	if($seconds != 0) {
		$hours = floor( $seconds / 3600 );
		$mins  = floor( $seconds / 60 % 60 );
		$secs  = floor( $seconds % 60 );
		$timeFormat = sprintf('%02d Hour %02d Minute %02d Second', $hours, $mins, $secs);
		$mins = $seconds/60;
	}
	$total_question = count($question_ans);
}
$ans_topic_array = array();
if(!empty($ans_topic)) {
	foreach($ans_topic as $ans_topic_item) {
		$ans_topic_array[$ans_topic_item->topic_id] = $ans_topic_item->id;
	}
}
?>
    <div class="award_stat">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <h4><a class="matchHeight1" style="background-color: <?php echo $colorcode[0]; ?>" href="javascript:void(0);">You’ve achieved excellence in <span><?php echo count($ans_topic_array); ?></span> skills</a></h4>
                </div>
                <div class="col-lg-3">
                    <h4><a class="matchHeight1" style="background-color: <?php echo $colorcode[1]; ?>" href="javascript:void(0);">You’ve answered <span><?php echo $total_question; ?></span> questions</a></h4>
                </div>
                <div class="col-lg-3">
                    <h4><a class="matchHeight1" style="background-color: <?php echo $colorcode[2]; ?>" href="javascript:void(0);">You’ve practised <span><?php echo round($mins); ?></span> min</a></h4>
                </div>
                <div class="col-lg-3">
                    <h4><a class="matchHeight1" style="background-color: <?php echo $colorcode[3]; ?>" href="javascript:void(0);">You’ve collected <span class="type_num">0</span> <?php echo $type; ?></a></h4>
                </div>
            </div>
        </div>
    </div>
    <div class="award_points">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Your <?php echo $type; ?> collection</h1>
                </div>
            </div>
            <div class="award_point">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="badge_title" style="background-color: <?php echo $colorcode[0]; ?>">Questions answered</div>
                    </div>
                    <div class="col-lg-8">
                        <div class="badge_desc">You have answered <?php echo $total_question; ?> questions!</div>
                    </div>
                </div>
                <div class="row">
					<?php
					$total_array = array(
						array(100, 'bulldog'),
						array(200, 'monkey'),
						array(300, 'tiger'),
						array(400, 'rhino'),
						array(500, 'baboon'),
						array(600, 'panda'),
						array(700, 'turtle'),
						array(800, 'elephant'),
						array(900, 'zebra'),
						array(1000, 'donkey'),
					);
					$total = $total_question;
					if(!empty($total_array)) {
						$i = 0;
						$j = 0;
						$k = 0;
					foreach($total_array as $total_item_array) {
						?>
                        <div class="col-lg-2">
                            <div class="award_blank_box_wrapper">
								<?php
								$total_item = $total_item_array[0];
								$total_value = $total_item_array[1];
								if($i == 0) {
									$prev = 0;
								} else {
									$prev = $total_array[$i-1][0];
								}
								?>
								<?php if($total >= $prev && $total < $total_item) { ?>
									<?php
									$persentage = (($total-$prev)/($total_item-$prev))*100;
									$title = 'Answer '.($total_item-$total).' more questions to win the next '.$type;
									$j++;
									?>
                                    <div class="award_blank_box question tooltip_award" title="<?php echo $title; ?>"
                                         style="background-size: auto, 100% <?php echo $persentage; ?>%;">
                                        <i class="fas fa-question"></i>
                                    </div>
								<?php } elseif($total >= $total_item) { ?>
									<?php
									$title = 'You won this '.$total_value.' '.$type.' by answering '.$total_item.' questions!';
									$k++;
									?>
                                    <div class="award_box_wrap">
                                        <div class="award_blank_box tooltip_award" title="Click to Reveal" data-id="<?php echo $count;
                                        ?>"><i class="fas fa-trophy"></i></div>
                                        <div class="award_blank_box_img tooltip_award" title="<?php echo $title; ?>"><img src="<?php echo base_url('/assets/images/award/'.$total_value.'.png'); ?>" /></div>
                                    </div>
								<?php } else { ?>
                                    <div class="award_blank_box lock">
                                        <i class="fas fa-lock"></i>
                                    </div>
								<?php } ?>
								<?php echo $total_item; ?> questions
                            </div>
                        </div>
					<?php
					$i++;
					$count++;
					}
					}
					?>
                </div>
            </div>
            <div class="award_point">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="badge_title" style="background-color: <?php echo $colorcode[1]; ?>">Time spent</div>
                    </div>
                    <div class="col-lg-8">
                        <div class="badge_desc">You have practised for <?php echo secondsToTime($seconds); ?>!</div>
                    </div>
                </div>
                <div class="row">
					<?php
					$total_array = array(
						array(60, 'bulldog'),
						array(120, 'monkey'),
						array(180, 'tiger'),
						array(240, 'rhino'),
						array(300, 'baboon'),
						array(360, 'panda'),
						array(420, 'turtle'),
						array(480, 'elephant'),
					);
					$total = $mins;
					if(!empty($total_array)) {
						$i = 0;
						$j = 0;
						$k = 0;
					foreach($total_array as $total_item_array) {
						?>
                        <div class="col-lg-2">
                            <div class="award_blank_box_wrapper">
								<?php
								$total_item = $total_item_array[0];
								$total_value = $total_item_array[1];
								if($i == 0) {
									$prev = 0;
								} else {
									$prev = $total_array[$i-1][0];
								}
								?>
								<?php if($total >= $prev && $total < $total_item) { ?>
									<?php
									$persentage = (($total-$prev)/($total_item-$prev))*100;
									$title = 'Pratise for '.round($total_item-$total).' more minutes  to win the next '.$type.'!';
									$j++;
									?>
                                    <div class="award_blank_box question tooltip_award" title="<?php echo $title; ?>"
                                         style="background-size: auto, 100% <?php echo $persentage; ?>%;">
                                        <i class="fas fa-question"></i>
                                    </div>
								<?php } elseif($total >= $total_item) { ?>
									<?php
									$title = 'You won this '.$total_value.' '.$type.' by practising for '.$total_item.' minutes!';
									$k++
									?>
                                    <div class="award_box_wrap">
                                        <div class="award_blank_box tooltip_award" title="Click to Reveal" data-id="<?php echo $count; ?>"<?php if(in_array($count, $award_click)) { echo ' style="display:none;"'; } ?>><i class="fas fa-trophy"></i></div>
                                        <div class="award_blank_box_img tooltip_award" title="<?php echo $title; ?>"<?php if(in_array($count, $award_click)) { echo ' style="display:block;"'; } ?>><img src="<?php echo base_url('/assets/images/award/'.$total_value.'.png'); ?>" /></div>
                                    </div>
								<?php } else { ?>
                                    <div class="award_blank_box lock">
                                        <i class="fas fa-lock"></i>
                                    </div>
								<?php } ?>
								<?php echo $total_item/60; ?> hour
                            </div>
                        </div>
					<?php
					$i++;
					$count++;
					}
					}
					?>
                </div>
            </div>
            <div class="award_point">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="badge_title" style="background-color: <?php echo $colorcode[2]; ?>">Days practised</div>
                    </div>
                    <div class="col-lg-8">
                        <div class="badge_desc">You have practised for <?php echo count($days); ?> days!</div>
                    </div>
                </div>
                <div class="row">
					<?php
					$total_array = array(
						array(5, 'bulldog'),
						array(10, 'monkey'),
						array(25, 'tiger'),
						array(50, 'rhino'),
						array(75, 'baboon'),
						array(100, 'panda'),
						array(125, 'turtle'),
						array(150, 'elephant'),
						array(175, 'zebra'),
						array(200, 'donkey'),
					);
					$total = count($days);
					if(!empty($total_array)) {
						$i = 0;
						$j = 0;
						$k = 0;
					foreach($total_array as $total_item_array) {
						?>
                        <div class="col-lg-2">
                            <div class="award_blank_box_wrapper">
								<?php
								$total_item = $total_item_array[0];
								$total_value = $total_item_array[1];
								if($i == 0) {
									$prev = 0;
								} else {
									$prev = $total_array[$i-1][0];
								}
								?>
								<?php if($total >= $prev && $total < $total_item) { ?>
									<?php
									$persentage = (($total-$prev)/($total_item-$prev))*100;
									$title = 'Pratise for '.($total_item-$total).' more days  to win the next '.$type.'!';
									$j++;
									?>
                                    <div class="award_blank_box question tooltip_award" title="<?php echo $title; ?>"
                                         style="background-size: auto, 100% <?php echo $persentage; ?>%;">
                                        <i class="fas fa-question"></i>
                                    </div>
								<?php } elseif($total >= $total_item) { ?>
									<?php
									$title = 'You won this '.$total_value.' '.$type.' by practising for '.$total_item.' days!';
									$k++;
									?>
                                    <div class="award_box_wrap">
                                        <div class="award_blank_box tooltip_award" title="Click to Reveal" data-id="<?php echo $count;
                                        ?>"><i class="fas fa-trophy"></i></div>
                                        <div class="award_blank_box_img tooltip_award" title="<?php echo $title; ?>"><img src="<?php echo base_url('/assets/images/award/'.$total_value.'.png'); ?>" /></div>
                                    </div>
								<?php } else { ?>
                                    <div class="award_blank_box lock">
                                        <i class="fas fa-lock"></i>
                                    </div>
								<?php } ?>
								<?php echo $total_item; ?> days
                            </div>
                        </div>
					<?php
					$i++;
					$count++;
					}
					}
					?>
                </div>
            </div>
            <div class="award_point">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="badge_title" style="background-color: <?php echo $colorcode[3]; ?>">Skills mastered</div>
                    </div>
                    <div class="col-lg-8">
                        <div class="badge_desc">You have mastered <?php echo count($ans_topic_array); ?> skills!</div>
                    </div>
                </div>
                <div class="row">
					<?php
					$total_array = array(
						array(1, 'bulldog'),
						array(2, 'monkey'),
						array(5, 'tiger'),
						array(10, 'rhino'),
						array(20, 'baboon'),
						array(25, 'panda'),
						array(50, 'turtle'),
						array(75, 'elephant'),
						array(100, 'zebra')
					);
					$total = count($ans_topic_array);
					if(!empty($total_array)) {
						$i = 0;
						$j = 0;
						$k = 0;
					foreach($total_array as $total_item_array) {
						?>
                        <div class="col-lg-2">
                            <div class="award_blank_box_wrapper">
								<?php
								$total_item = $total_item_array[0];
								$total_value = $total_item_array[1];
								if($i == 0) {
									$prev = 0;
								} else {
									$prev = $total_array[$i-1][0];
								}
								?>
								<?php if($total >= $prev && $total < $total_item) { ?>
									<?php
									$persentage = (($total-$prev)/($total_item-$prev))*100;
									$title = 'Master '.($total_item-$total).' more skill to win the next '.$type.'!';
									$j++;
									?>
                                    <div class="award_blank_box question tooltip_award" title="<?php echo $title; ?>"
                                         style="background-size: auto, 100% <?php echo $persentage; ?>%;">
                                        <i class="fas fa-question"></i>
                                    </div>
								<?php } elseif($total >= $total_item) { ?>
									<?php
									$title = 'You won this '.$total_value.' '.$type.' by mastering '.$total_item.' skill!';
									$k++;
									?>
                                    <div class="award_box_wrap">
                                        <div class="award_blank_box tooltip_award" title="Click to Reveal" data-id="<?php echo $count;
                                        ?>"><i class="fas fa-trophy"></i></div>
                                        <div class="award_blank_box_img tooltip_award" title="<?php echo $title; ?>"><img src="<?php echo base_url('/assets/images/award/'.$total_value.'.png'); ?>" /></div>
                                    </div>
								<?php } else { ?>
                                    <div class="award_blank_box lock">
                                        <i class="fas fa-lock"></i>
                                    </div>
								<?php } ?>
								<?php echo $total_item; ?> skill
                            </div>
                        </div>
					<?php
					$i++;
					$count++;
					}
					}
					?>
                </div>
            </div>
            <div class="award_point">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="badge_title" style="background-color: <?php echo $colorcode[4]; ?>">Total SmartScore</div>
                    </div>
                    <div class="col-lg-8">
                        <div class="badge_desc">You have achieved a total SmartScore of <?php echo $smartScore; ?></div>
                    </div>
                </div>
                <div class="row">
					<?php
					$total_array = array(
						array(500, 'baboon'),
						array(1000, 'panda'),
						array(2000, 'turtle'),
					);
					$total = $smartScore;
					if(!empty($total_array)) {
						$i = 0;
						$j = 0;
						$k = 0;
					foreach($total_array as $total_item_array) {
						?>
                        <div class="col-lg-2">
                            <div class="award_blank_box_wrapper">
								<?php
								$total_item = $total_item_array[0];
								$total_value = $total_item_array[1];
								if($i == 0) {
									$prev = 0;
								} else {
									$prev = $total_array[$i-1][0];
								}
								?>
								<?php if($total >= $prev && $total < $total_item) { ?>
									<?php
									$persentage = (($total-$prev)/($total_item-$prev))*100;
									$title = 'Achieve '.($total_item-$total).' more points to win the next '.$type.'!';
									$j++;
									?>
                                    <div class="award_blank_box question tooltip_award" title="<?php echo $title; ?>"
                                         style="background-size: auto, 100% <?php echo $persentage; ?>%;">
                                        <i class="fas fa-question"></i>
                                    </div>
								<?php } elseif($total >= $total_item) { ?>
									<?php
									$title = 'You won this '.$total_value.' '.$type.' by achieving '.$total_item.' points!';
									$k++;
									?>
                                    <div class="award_box_wrap">
                                        <div class="award_blank_box tooltip_award" title="Click to Reveal" data-id="<?php echo $count;
                                        ?>"><i class="fas fa-trophy"></i></div>
                                        <div class="award_blank_box_img tooltip_award" title="<?php echo $title; ?>"><img src="<?php echo base_url('/assets/images/award/'.$total_value.'.png'); ?>" /></div>
                                    </div>
								<?php } else { ?>
                                    <div class="award_blank_box lock">
                                        <i class="fas fa-lock"></i>
                                    </div>
								<?php } ?>
								<?php echo $total_item; ?> point
                            </div>
                        </div>
					<?php
					$i++;
					$count++;
					}
					}
					?>
                </div>
            </div>
        </div>
    </div>
<script>
    jQuery(document).ready(function() {
       jQuery('.award_box_wrap .award_blank_box').on('click', function() {
           var this_element = jQuery(this);
           jQuery(this_element).hide();
           jQuery(this_element).parent().find('.award_blank_box_img').show();
           var id = jQuery(this_element).attr('data-id');
           jQuery.ajax({
               type: "POST",
               url: base_url + 'ajax/award_click',
               data: {id:id, subject: <?php echo $subject_var->id; ?>, grade: <?php echo $grade_var->id; ?>, user_id: <?php echo get_current_user_id(); ?>},
               success: function (data) {
                    if(data == 1) {
                        console.log('Success');
                    }
               }
           });
       })
    });
</script>
<?php
require_once 'templates/footer.php';
?>