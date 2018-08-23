<?php
$this->load->view('templates/header');
?>
	<div class="wrapper inner-pages">
		<div class="inner_page_banner">

		</div>
		<div class="inner_page_content">
			<div class="container">
				<div class="row">
					<div class="subject_top_nav">
						<!--<ul>
							<li><a href="#"><span data-feather="edit"></span> Maths</a></li>
							<li><a href="#"><span data-feather="edit"></span> English</a></li>
						</ul>-->
					</div>

                    <!---->
                    <div id="wrapper3" class="wrapper3">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h1>Different Course Categories</h1>
                                    <h2>Practise <span>Maths & English</span> | Primary & Secondary</h2>
                                </div>
                            </div>
                            <div class="row row1">
                                <div class="col-lg-3">
                                    <div class="circleWrap1">
                                        <h3>Reception</h3>
                                        <p class="circleWrap1-p">Here is a list of English and Math skills students learn in reception! These skills are organised into categories.</p>
                                        <div class="circleWrap1-div">
                                            <a href="<?php echo base_url('frontend/topic/reception/math'); ?>"><p>Maths<br><small><?php echo get_question_count('','math','reception'); ?> Skills</small></p></a>
                                            <a href="<?php echo base_url('frontend/topic/reception/english'); ?>"><p>English<br><small><?php echo get_question_count('','english','reception'); ?> Skills</small></p></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="circleWrap2">
                                        <h3>Year 1</h3>
                                        <p class="circleWrap2-p">Adding and subtracting, telling time, measurement, categories, nouns, verb tense, time order and more.</p>
                                        <div class="circleWrap2-div">
                                            <a href="<?php echo base_url('frontend/topic/year-1/math'); ?>"><p>Maths<br><small><?php echo get_question_count('','math','year-1'); ?> Skills</small></p></a>
                                            <a href="<?php echo base_url('frontend/topic/year-1/english'); ?>"><p>English<br><small><?php echo get_question_count('','english','year-1'); ?> Skills</small></p></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="circleWrap3">
                                        <h3>Year 2</h3>
                                        <p class="circleWrap3-p">Adding and subtracting, telling time, measurement, categories, nouns, verb tense, time order and more.</p>
                                        <div class="circleWrap3-div">
                                            <a href="<?php echo base_url('frontend/topic/year-2/math'); ?>"><p>Maths<br><small><?php echo get_question_count('','math','year-2'); ?> Skills</small></p></a>
                                            <a href="<?php echo base_url('frontend/topic/year-2/english'); ?>"><p>English<br><small><?php echo get_question_count('','english','year-2'); ?> Skills</small></p></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="circleWrap4">
                                        <h3>Year 3</h3>
                                        <p class="circleWrap4-p">Adding and subtracting, telling time, measurement, categories, nouns, verb tense, time order and more.</p>
                                        <div class="circleWrap4-div">
                                            <a href="<?php echo base_url('frontend/topic/year-3/math'); ?>"><p>Maths<br><small><?php echo get_question_count('','math','year-3'); ?> Skills</small></p></a>
                                            <a href="<?php echo base_url('frontend/topic/year-3/english'); ?>"><p>English<br><small><?php echo get_question_count('','english','year-3'); ?> Skills</small></p></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row row2">
                                <div class="col-lg-3">
                                    <div class="circleWrap5">
                                        <h3>Year 4</h3>
                                        <p class="circleWrap5-p">Adding and subtracting, telling time, measurement, categories, nouns, verb tense, time order and more.</p>
                                        <div class="circleWrap5-div">
                                            <a href="<?php echo base_url('frontend/topic/year-4/math'); ?>"><p>Maths<br><small><?php echo get_question_count('','math','year-4'); ?> Skills</small></p></a>
                                            <a href="<?php echo base_url('frontend/topic/year-4/english'); ?>"><p>English<br><small><?php echo get_question_count('','english','year-4'); ?> Skills</small></p></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="circleWrap6">
                                        <h3>Year 5</h3>
                                        <p class="circleWrap6-p">Adding and subtracting, telling time, measurement, categories, nouns, verb tense, time order and more.</p>
                                        <div class="circleWrap6-div">
                                            <a href="<?php echo base_url('frontend/topic/year-5/math'); ?>"><p>Maths<br><small><?php echo get_question_count('','math','year-5'); ?> Skills</small></p></a>
                                            <a href="<?php echo base_url('frontend/topic/year-5/english'); ?>"><p>English<br><small><?php echo get_question_count('','english','year-5'); ?> Skills</small></p></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="circleWrap7">
                                        <h3>Year 6</h3>
                                        <p class="circleWrap7-p">Adding and subtracting, telling time, measurement, categories, nouns, verb tense, time order and more.</p>
                                        <div class="circleWrap7-div">
                                            <a href="<?php echo base_url('frontend/topic/year-6/math'); ?>"><p>Maths<br><small><?php echo get_question_count('','math','year-6'); ?> Skills</small></p></a>
                                            <a href="<?php echo base_url('frontend/topic/year-6/english'); ?>"><p>English<br><small><?php echo get_question_count('','english','year-6'); ?> Skills</small></p></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="circleWrap8">
                                        <h3>Year 7</h3>
                                        <p class="circleWrap8-p">Adding and subtracting, telling time, measurement, categories, nouns, verb tense, time order and more.</p>
                                        <div class="circleWrap8-div">
                                            <a href="<?php echo base_url('frontend/topic/year-7/math'); ?>"><p>Maths<br><small><?php echo get_question_count('','math','year-7'); ?> Skills</small></p></a>
                                            <a href="<?php echo base_url('frontend/topic/year-7/english'); ?>"><p>English<br><small><?php echo get_question_count('','english','year-7'); ?> Skills</small></p></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row row3">
                                <div class="col-lg-3">
                                    <div class="circleWrap9">
                                        <h3>Year 8</h3>
                                        <p class="circleWrap9-p">Adding and subtracting, telling time, measurement, categories, nouns, verb tense, time order and more.</p>
                                        <div class="circleWrap9-div">
                                            <a href="<?php echo base_url('frontend/topic/year-8/math'); ?>"><p>Maths<br><small><?php echo get_question_count('','math','year-8'); ?> Skills</small></p></a>
                                            <a href="<?php echo base_url('frontend/topic/year-8/english'); ?>"><p>English<br><small><?php echo get_question_count('','english','year-8'); ?> Skills</small></p></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="circleWrap10">
                                        <h3>Year 9</h3>
                                        <p class="circleWrap10-p">Adding and subtracting, telling time, measurement, categories, nouns, verb tense, time order and more.</p>
                                        <div class="circleWrap10-div">
                                            <a href="<?php echo base_url('frontend/topic/year-9/math'); ?>"><p>Maths<br><small><?php echo get_question_count('','math','year-9'); ?> Skills</small></p></a>
                                            <a href="<?php echo base_url('frontend/topic/year-9/english'); ?>"><p>English<br><small><?php echo get_question_count('','english','year-9'); ?> Skills</small></p></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="circleWrap11">
                                        <h3>Year 10</h3>
                                        <p class="circleWrap11-p">Adding and subtracting, telling time, measurement, categories, nouns, verb tense, time order and more.</p>
                                        <div class="circleWrap11-div">
                                            <a href="<?php echo base_url('frontend/topic/year-10/math'); ?>"><p>Maths<br><small><?php echo get_question_count('','math','year-10'); ?> Skills</small></p></a>
                                            <a href="<?php echo base_url('frontend/topic/year-10/english'); ?>"><p>English<br><small><?php echo get_question_count('','english','year-10'); ?> Skills</small></p></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="circleWrap12">
                                        <h3>Year 11</h3>
                                        <p class="circleWrap12-p">Adding and subtracting, telling time, measurement, categories, nouns, verb tense, time order and more.</p>
                                        <div class="circleWrap12-div">
                                            <a href="<?php echo base_url('frontend/topic/year-11/math'); ?>"><p>Maths<br><small><?php echo get_question_count('','math','year-11'); ?> Skills</small></p></a>
                                            <a href="<?php echo base_url('frontend/topic/year-11/english'); ?>"><p>English<br><small><?php echo get_question_count('','english','year-11'); ?> Skills</small></p></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!---->

				</div>
			</div>
		</div>

	</div>

<?php
$this->load->view('templates/footer');
?>