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

<div class="container">
    <div class="award_wrap">
        <div class="row">
            <div class="col-lg-12">
                <p><strong>What's under that square?</strong> Each square has a different challenge. Meet it, and you'll reveal a virtual prize. See how many you can  discover!</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <div class="award_squares matchHeight1">
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
		                foreach ( $total_array as $total_item_array ) {
			                ?>
                            <div class="award_square_wrap">
                                <div class="award_square">
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
		                                $title = 'Answer '.($total_item-$total).' more questions to win the next '.$type;
		                                ?>
                                        <img class="tooltip_award" src="<?php echo base_url('/assets/images/q.png'); ?>" title="<?php echo $title; ?>"/>
	                                <?php } elseif($total >= $total_item) { ?>
		                                <?php
		                                $title = 'You won this '.$total_value.' '.$type.' by answering '.$total_item.' questions!';
		                                ?>
                                        <img class="tooltip_award" src="<?php
                                            echo base_url('/assets/images/award/'.$total_value.'.png'); ?>" title="<?php echo $title; ?>" />
	                                <?php } else { ?>
                                        <img class="tooltip_award" src="<?php echo base_url('/assets/images/l.png'); ?>"/>
	                                <?php } ?>
                                </div>
                            </div>
			                <?php
                            $i++;
		                }
	                }
                    ?>

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
	                $total = $total_question;
	                if(!empty($total_array)) {
		                $i = 0;
		                foreach ( $total_array as $total_item_array ) {
			                ?>
                            <div class="award_square_wrap">
                                <div class="award_square">
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
						                $title = 'Pratise for '.round($total_item-$total).' more minutes  to win the next '.$type.'!';
						                ?>
                                        <img class="tooltip_award" src="<?php echo base_url('/assets/images/q.png'); ?>" title="<?php echo $title; ?>"/>
					                <?php } elseif($total >= $total_item) { ?>
						                <?php
						                $title = 'You won this '.$total_value.' '.$type.' by practising for '.$total_item.' minutes!';
						                ?>
                                        <img class="tooltip_award" src="<?php
						                echo base_url('/assets/images/award/'.$total_value.'.png'); ?>" title="<?php echo $title; ?>" />
					                <?php } else { ?>
                                        <img class="tooltip_award" src="<?php echo base_url('/assets/images/l.png'); ?>"/>
					                <?php } ?>
                                </div>
                            </div>
			                <?php
			                $i++;
		                }
	                }
	                ?>

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
	                $total = $total_question;
	                if(!empty($total_array)) {
		                $i = 0;
		                foreach ( $total_array as $total_item_array ) {
			                ?>
                            <div class="award_square_wrap">
                                <div class="award_square">
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
						                $title = 'Pratise for '.($total_item-$total).' more days  to win the next '.$type.'!';
						                ?>
                                        <img class="tooltip_award" src="<?php echo base_url('/assets/images/q.png'); ?>" title="<?php echo $title; ?>"/>
					                <?php } elseif($total >= $total_item) { ?>
						                <?php
						                $title = 'You won this '.$total_value.' '.$type.' by practising for '.$total_item.' days!';
						                ?>
                                        <img class="tooltip_award" src="<?php
						                echo base_url('/assets/images/award/'.$total_value.'.png'); ?>" title="<?php echo $title; ?>" />
					                <?php } else { ?>
                                        <img class="tooltip_award" src="<?php echo base_url('/assets/images/l.png'); ?>"/>
					                <?php } ?>
                                </div>
                            </div>
			                <?php
			                $i++;
		                }
	                }
	                ?>

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
	                $total = $total_question;
	                if(!empty($total_array)) {
		                $i = 0;
		                foreach ( $total_array as $total_item_array ) {
			                ?>
                            <div class="award_square_wrap">
                                <div class="award_square">
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
						                $title = 'Master '.($total_item-$total).' more skill to win the next '.$type.'!';
						                ?>
                                        <img class="tooltip_award" src="<?php echo base_url('/assets/images/q.png'); ?>" title="<?php echo $title; ?>"/>
					                <?php } elseif($total >= $total_item) { ?>
						                <?php
						                $title = 'You won this '.$total_value.' '.$type.' by mastering '.$total_item.' skill!';
						                ?>
                                        <img class="tooltip_award" src="<?php
						                echo base_url('/assets/images/award/'.$total_value.'.png'); ?>" title="<?php echo $title; ?>" />
					                <?php } else { ?>
                                        <img class="tooltip_award" src="<?php echo base_url('/assets/images/l.png'); ?>"/>
					                <?php } ?>
                                </div>
                            </div>
			                <?php
			                $i++;
		                }
	                }
	                ?>

	                <?php
	                $total_array = array(
		                array(500, 'baboon'),
		                array(1000, 'panda'),
		                array(2000, 'turtle'),
	                );
	                $total = $total_question;
	                if(!empty($total_array)) {
		                $i = 0;
		                foreach ( $total_array as $total_item_array ) {
			                ?>
                            <div class="award_square_wrap">
                                <div class="award_square">
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
						                $title = 'Achieve '.($total_item-$total).' more points to win the next '.$type.'!';
						                ?>
                                        <img class="tooltip_award" src="<?php echo base_url('/assets/images/q.png'); ?>" title="<?php echo $title; ?>"/>
					                <?php } elseif($total >= $total_item) { ?>
						                <?php
						                $title = 'You won this '.$total_value.' '.$type.' by achieving '.$total_item.' points!';
						                ?>
                                        <img class="tooltip_award" src="<?php
						                echo base_url('/assets/images/award/'.$total_value.'.png'); ?>" title="<?php echo $title; ?>" />
					                <?php } else { ?>
                                        <img class="tooltip_award" src="<?php echo base_url('/assets/images/l.png'); ?>"/>
					                <?php } ?>
                                </div>
                            </div>
			                <?php
			                $i++;
		                }
	                }
	                ?>
                    <div style="clear: both;"></div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="matchHeight1">
                    <div class="award_info_header"><h4>This is what's been keeping you busy</h4></div>
                    <div class="award_info">
                        <h4>You’ve achieved excellence in <span><?php echo count($ans_topic_array); ?></span> skills</h4>
                        <h4>You’ve answered <span><?php echo $total_question; ?></span> questions</h4>
                        <h4>You’ve practised <span><?php echo round($mins); ?></span> min</h4>
                        <h4>You’ve collected <span class="type_num">0</span> <?php echo $type; ?></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>