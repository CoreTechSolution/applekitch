<?php
$this->load->view('templates/header');
?>
	<div class="wrapper inner-pages">
		<div class="inner_page_banner">
            <div class="container">
                <div class="row">
                    <h1>Learning <?php echo $banner_title; ?></h1>
                </div>
            </div>

		</div>
        <div class="top_tap_sub">
            <div class="container">
                <div class="row">
                    <ul>
                        <?php //print_r($subjects); ?>
                        <?php foreach ($subjects as $subject){ ?>
                            <li><span data-feather="book"></span> <a href=""><?php echo $subject->name; ?></a></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="breadcrumbs_section">
            <div class="container">
                <div class="row">
                    <ul class="breadcrumbs">
                        <li class="breadcrumbs__item"><a href="<?= base_url(); ?>" class="breadcrumbs__element">Home</a></li>
                        <li class="breadcrumbs__item"><a href="<?= base_url(); ?>" class="breadcrumbs__element">Grade</a></li>
                        <li class="breadcrumbs__item breadcrumbs__item_active"><span class="breadcrumbs__element"><?php echo $banner_title; ?></span></li>
                    </ul>
                </div>
            </div>
        </div>
		<div class="inner_page_content">
			<div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="score_time_div">
                            <div class="score_ans">
                                <div class="title">Question
                                    Answered</div>
                                <div class="content"><?= (!empty($this->session->userdata('score_ans')))? $this->session->userdata('score_ans'):'0' ?></div>
                            </div>
                            <div class="score_smart">
                                <div class="title">Smart Score <br><sup>out of 100</sup> <a title="This is my span's tooltip message!" href="javascript:void(0)"><i class="fas fa-question-circle"></i></a></div>
                                <div class="content"><?= (!empty($this->session->userdata('score_ans')))? $this->session->userdata('score_smart'):'0' ?></div>
                            </div>
                            <div class="score_time">
                                <div class="title">Time Elapsed</div>
                                <div class="content score_time_count">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <span class="score_time_count_hr">00</span><br>
                                            <span class="time_text">HR</span>
                                        </div>
                                        <div class="col-lg-4">
                                            <span class="score_time_count_min">00</span><br>
                                            <span class="time_text">MIN</span>
                                        </div>
                                        <div class="col-lg-4">
                                            <span class="score_time_count_sec">00</span><br>
                                            <span class="time_text">SEC</span>
                                        </div>
                                    </div>

                                </div>
                                <!--<sup><a href="" class="stop_question_timer" id="stop_question_timer">Stop</a></sup>-->
                            </div>

                        </div>
                    </div>
                </div>
                <div class="question_view">
                   <div id="ans_label" class="cAns"><i class="fas fa-check"></i> Correct</div>
                    <!--<div id="wrong_ans_label" class="wAns">Wrong Answer&#8230;</div>-->
                    <?php if(!empty($questions)){ ?>
                        <form class="form qAns_form" method="post" action="" enctype="multipart/form-data">
                            <input type="hidden" name="start" value="<?php echo $start; ?>" />
                            <input type="hidden" name="grade_id" value="<?php echo $grade_id; ?>" />
                            <input type="hidden" name="subject_id" value="<?php echo $subject_id; ?>" />
                            <input type="hidden" name="topic_id" value="<?php echo $topic_id; ?>" />
                            <div class="row">
                            <?php foreach ($questions as $question){ ?>
                                <input type="hidden" class="question_id" name="question_id" value="<?php echo $question->question_id; ?>">
                                <div class="col-lg-5">
                                    <div class="question_count">Question <i class="fas fa-volume-up"></i></div>
                                    <div class="question_display"><?php echo $question->question_name; ?></div>
                                </div>
                                <div class="col-lg-7">
	                                <?php $form_data=unserialize($question->form_data); ?>
                                    <input type="hidden" name="question_option" value="<?= $form_data['question_option']; ?>">

	                                <?php if($form_data['question_option']=='1'){ ?>
                                        <div class="question_image">
                                            <img src="<?php echo $form_data['img']; ?>" alt="">
                                        </div>
                                        <div class="qAns_box">
                                            <p>Answer: </p><span><input type="text" name="qAns_box" class="form-control"></span>
                                        </div>

	                                <?php }  elseif ($form_data['question_option']=='3') { ?>
		                                <?php //print_r($form_data); ?>
                                        <div class="option_list_d onlyclickable">
			                                <?php $option_counter=1; ?>
			                                <?php foreach ($form_data['option_1'] as $option){ ?>
                                                <div class="inputGroup">
                                                    <input id="radio<?php echo $option_counter; ?>" name="option_1" value="<?php echo $option; ?>" type="radio"/>
                                                    <label for="radio<?php echo $option_counter; ?>"><?php echo $option; ?></label>
                                                </div>
				                                <?php $option_counter++; ?>
			                                <?php } ?>
                                        </div>
	                                <?php } elseif ($form_data['question_option']=='9') { ?>
		                                <?php //print_r($form_data); ?>
                                        <div class="option_list_d">
			                                <?php $option_counter=1; ?>
			                                <?php foreach ($form_data['option_1'] as $option){ ?>
                                                <div class="inputGroup">
                                                    <input id="radio<?php echo $option_counter; ?>" name="option_1" value="<?php echo $option; ?>" type="radio"/>
                                                    <label for="radio<?php echo $option_counter; ?>"><?php echo $option; ?></label>
                                                </div>
				                                <?php $option_counter++; ?>
			                                <?php } ?>
                                        </div>
	                                <?php }  elseif ($form_data['question_option']=='11') { ?>
		                                <?php //print_r($form_data); ?>
                                        <div class="qAns_box">
                                            <p>Answer: </p><span><input type="text" name="qAns_box" class="form-control"></span>
                                        </div>
	                                <?php } elseif ($form_data['question_option']=='18') { ?>
		                                <?php //print_r($form_data); ?>
                                        <div class="qAns_box">
                                            <p>Answer 1: </p><span><input type="text" name="qAns_box" class="form-control"></span><br>
                                            <p>Answer 1: </p><span><input type="text" name="qAns_box" class="form-control"></span>

                                        </div>
	                                <?php } ?>

                                    <input type="submit" value="Submit" class="btn btn-small btn-outline-default qSubmit">
                                </div>
                            <?php } ?>
                            </div>
                        </form>
                    <?php } ?>
                </div>
            </div>
		</div>
    <div id="loading" class="loading">Loading&#8230;</div>


<?php
$this->load->view('templates/footer');
?>