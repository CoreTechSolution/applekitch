<div class="award_heading" style="background-image: url('<?php echo base_url('/assets/images/english-reception.jpg'); ?>')">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1><?php echo $title; ?></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="award_header">
                    <img src="<?php echo base_url('/assets/images/ela-level-a-display-case.png') ?>" />
                    <div class="reward reward_0" style="top: 160px; left: 214px;">
                        <h4>Questions answered</h4>
                        <div class="reward_img">
                            <img src="<?php echo base_url('/assets/images/award/reward_q.png') ?>" />
                        </div>
                    </div>
                    <div class="reward reward_1" style="top: 114px; left: 460px;">
                        <h4>Time spent</h4>
                        <div class="reward_img">
                            <img src="<?php echo base_url('/assets/images/award/reward_q.png') ?>" />
                        </div>
                    </div>
                    <div class="reward reward_2" style="top: 210px; left: 370px;">
                        <h4>Days practised</h4>
                        <div class="reward_img">
                            <img src="<?php echo base_url('/assets/images/award/reward_q.png') ?>" />
                        </div>
                    </div>
                    <div class="reward reward_3" style="top: 114px; left: 610px;">
                        <h4>Skills mastered</h4>
                        <div class="reward_img">
                            <img src="<?php echo base_url('/assets/images/award/reward_q.png') ?>" />
                        </div>
                    </div>
                    <div class="reward reward_4" style="top: 240px; left: 528px;">
                        <h4>Total SmartScore</h4>
                        <div class="reward_img">
                            <img src="<?php echo base_url('/assets/images/award/reward_q.png') ?>" />
                        </div>
                    </div>
                    <div class="reward reward_title" style="top: 100px; left: 800px; width: 128px;">
                        <h4></h4>
                    </div>
                    <div class="reward reward_practice" style="top: 367px; left: 782px;">
                        <h4><a href="<?php echo base_url('/frontend/topic/'.$grade_var->slug.'/'.$subject_var->slug) ?>">Practise More >></a></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var header_reward = [];
</script>
<?php
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
<div class="award_stat" style="background-color: #f96d30;">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <h4><a href="javascript:void(0);">You’ve achieved excellence in <span><?php echo count($ans_topic_array); ?></span> skills</a></h4>
            </div>
            <div class="col-lg-3">
                <h4><a href="javascript:void(0);">You’ve answered <span><?php echo $total_question; ?></span> questions</a></h4>
            </div>
            <div class="col-lg-3">
                <h4><a href="javascript:void(0);">You’ve practised <span><?php echo round($mins); ?></span> min</a></h4>
            </div>
            <div class="col-lg-3">
                <h4><a href="javascript:void(0);">You’ve collected <span class="type_num">0</span> <?php echo $type; ?></a></h4>
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
                    <div class="badge_title badge11">Questions answered</div>
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
                                         style="background-size: auto, 100% <?php echo $persentage; ?>%;"></div>
								<?php } elseif($total >= $total_item) { ?>
                                    <?php
                                    $title = 'You won this '.$total_value.' '.$type.' by answering '.$total_item.' questions!';
                                    $k++;
                                    ?>
                                    <div class="award_blank_box_img tooltip_award" title="<?php echo $title; ?>"><img src="<?php echo base_url('/assets/images/award/'.$total_value.'.png'); ?>" /></div>
								<?php } else { ?>
                                    <div class="award_blank_box lock"></div>
								<?php } ?>
								<?php echo $total_item; ?> questions
                            </div>
                        </div>
						<?php
						$i++;
					} ?>
                <script>
                    <?php
                    if($j > $k) {
                    ?>
                    header_reward[0] = ['reward_q', '<?php echo $title; ?>'];
                    <?php
                    } elseif($k > 0) {
                    ?>
                    header_reward[0] = ['<?php echo $total_array[$k-1][1]; ?>', '<?php echo $title; ?>'];
                    <?php
                    } else {
                    ?>
                    header_reward[0] = ['reward_lock', ''];
                    <?php
                    }
                    ?>
                </script>
                <?php
				}
				?>
            </div>
        </div>
        <div class="award_point">
            <div class="row">
                <div class="col-lg-4">
                    <div class="badge_title badge12">Time spent</div>
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
                                         style="background-size: auto, 100% <?php echo $persentage; ?>%;"></div>
								<?php } elseif($total >= $total_item) { ?>
                                    <?php
                                    $title = 'You won this '.$total_value.' '.$type.' by practising for '.$total_item.' minutes!';
                                    $k++
                                    ?>
                                    <div class="award_blank_box_img tooltip_award" title="<?php echo $title; ?>"><img src="<?php echo base_url('/assets/images/award/'.$total_value.'.png'); ?>" /></div>
								<?php } else { ?>
                                    <div class="award_blank_box lock"></div>
								<?php } ?>
								<?php echo $total_item/60; ?> hour
                            </div>
                        </div>
						<?php
						$i++;
					} ?>
                    <script>
						<?php
						if($j > $k) {
						?>
                        header_reward[1] = ['reward_q', '<?php echo $title; ?>'];
						<?php
						} elseif($k > 0) {
						?>
                        header_reward[1] = ['<?php echo $total_array[$k-1][1]; ?>', '<?php echo $title; ?>'];
                        <?php
                        } else {
                        ?>
                        header_reward[1] = ['reward_lock', ''];
						<?php
						}
						?>
                    </script>
					<?php
				}
				?>
            </div>
        </div>
        <div class="award_point">
            <div class="row">
                <div class="col-lg-4">
                    <div class="badge_title badge13">Days practised</div>
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
                                         style="background-size: auto, 100% <?php echo $persentage; ?>%;"></div>
						        <?php } elseif($total >= $total_item) { ?>
                                    <?php
                                    $title = 'You won this '.$total_value.' '.$type.' by practising for '.$total_item.' days!';
                                    $k++;
                                    ?>
                                    <div class="award_blank_box_img tooltip_award" title="<?php echo $title; ?>"><img src="<?php echo base_url('/assets/images/award/'.$total_value.'.png'); ?>" /></div>
						        <?php } else { ?>
                                    <div class="award_blank_box lock"></div>
						        <?php } ?>
						        <?php echo $total_item; ?> days
                            </div>
                        </div>
				        <?php
				        $i++;
			        } ?>
                    <script>
				        <?php
				        if($j > $k) {
				        ?>
                        header_reward[2] = ['reward_q', '<?php echo $title; ?>'];
				        <?php
				        } elseif($k > 0) {
				        ?>
                        header_reward[2] = ['<?php echo $total_array[$k-1][1]; ?>', '<?php echo $title; ?>'];
                        <?php
                        } else {
                        ?>
                        header_reward[2] = ['reward_lock', ''];
				        <?php
				        }
				        ?>
                    </script>
			        <?php
		        }
		        ?>
            </div>
        </div>
        <div class="award_point">
            <div class="row">
                <div class="col-lg-4">
                    <div class="badge_title badge14">Skills mastered</div>
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
                                         style="background-size: auto, 100% <?php echo $persentage; ?>%;"></div>
						        <?php } elseif($total >= $total_item) { ?>
                                    <?php
                                    $title = 'You won this '.$total_value.' '.$type.' by mastering '.$total_item.' skill!';
                                    $k++;
                                    ?>
                                    <div class="award_blank_box_img tooltip_award" title="<?php echo $title; ?>"><img src="<?php echo base_url('/assets/images/award/'.$total_value.'.png'); ?>" /></div>
						        <?php } else { ?>
                                    <div class="award_blank_box lock"></div>
						        <?php } ?>
						        <?php echo $total_item; ?> skill
                            </div>
                        </div>
				        <?php
				        $i++;
			        } ?>
                    <script>
				        <?php
				        if($j > $k) {
				        ?>
                        header_reward[3] = ['reward_q', '<?php echo $title; ?>'];
				        <?php
				        } elseif($k > 0) {
				        ?>
                        header_reward[3] = ['<?php echo $total_array[$k-1][1]; ?>', '<?php echo $title; ?>'];
                        <?php
                        } else {
                        ?>
                        header_reward[3] = ['reward_lock', ''];
				        <?php
				        }
				        ?>
                    </script>
			        <?php
		        }
		        ?>
            </div>
        </div>
        <div class="award_point">
            <div class="row">
                <div class="col-lg-4">
                    <div class="badge_title badge15">Total SmartScore</div>
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
                                         style="background-size: auto, 100% <?php echo $persentage; ?>%;"></div>
						        <?php } elseif($total >= $total_item) { ?>
                                    <?php
                                    $title = 'You won this '.$total_value.' '.$type.' by achieving '.$total_item.' points!';
                                    $k++;
                                    ?>
                                    <div class="award_blank_box_img tooltip_award" title="<?php echo $title; ?>"><img src="<?php echo base_url('/assets/images/award/'.$total_value.'.png'); ?>" /></div>
						        <?php } else { ?>
                                    <div class="award_blank_box lock"></div>
						        <?php } ?>
						        <?php echo $total_item; ?> point
                            </div>
                        </div>
				        <?php
				        $i++;
			        } ?>
                    <script>
				        <?php
				        if($j > $k) {
				        ?>
                        header_reward[4] = ['reward_q', '<?php echo $title; ?>'];
				        <?php
				        } elseif($k > 0) {
				        ?>
                        header_reward[4] = ['<?php echo $total_array[$k-1][1]; ?>', '<?php echo $title; ?>'];
                        <?php
                        } else {
                        ?>
                        header_reward[4] = ['reward_lock', ''];
				        <?php
				        }
				        ?>
                    </script>
			        <?php
		        }
		        ?>
            </div>
        </div>
    </div>
</div>
<script>
    jQuery(document).ready(function() {
        jQuery.each(header_reward, function(index, value) {
            jQuery('.reward.reward_'+index+' .reward_img').html('<img title="'+value[1]+'" ' +
                'src="'+base_url+'assets/images/award/'+value[0]+'.png" />');
        });
        jQuery('.reward .reward_img img').on('mouseover', function() {
            var title = jQuery(this).attr('title');
            jQuery('.reward.reward_title h4').text(title);
        });
        var type_num = jQuery('.award_points').find('.award_blank_box_img').length;
        jQuery('span.type_num').text(type_num);
    });
</script>