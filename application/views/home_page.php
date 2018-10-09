<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'templates/header.php';
?>
    <div class="wrapper2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Practice Maths and English Skills Now</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-6">
                    <form method="post" action="<?php echo base_url('frontend/topic'); ?>">
                        <div class="row row1">
                            <div class="col-lg-4">
                                <label>Select Your Grade</label>
                            </div>
                            <div class="col-lg-8">
                                <?php echo form_dropdown('grade_id',form_dropdown_cr(array('id','name'),'grade'),'', array('class'=>'form-control','id'=>'home_grade_id')); ?>
                                <!--<select class="form-control" name="age">
                                    <option value="">Select Your Grade</option>
                                </select>-->
                            </div>
                        </div>
                        <div class="row row1">
                            <div class="col-lg-4">
                                <label>Subject</label>
                            </div>
                            <div class="col-lg-8">
                                <?php echo form_dropdown('subject_id',form_dropdown_cr(array('id','name'),'subject'), '',array('class'=>'form-control','id'=>'home_subject_id')); ?>
                            </div>
                        </div>
                        <div class="row row1">
                            <div class="col-lg-4"></div>
                            <div class="col-lg-8">
                                <input type="submit" class="form-control" name="take_the_test" value="Practice Now">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-3"></div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="down-arrow"><a id="button" href="javascript:void(0);"><img src="<?php echo base_url('/assets/images/down-arrow.png'); ?>"></a></div>
                </div>
            </div>
        </div>
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
<?php $settings=$this->admin_model->get_home_settings(array('slug'=>'section-1'),true); ?>
<?php $serialize_settings=unserialize($settings->page_content); ?>
    <div class="wrapper4">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="wrapper4-content-wrap">
                        <h1><?=!empty($serialize_settings['heading'])? $serialize_settings['heading']:''; ?></h1>
                        <h2><?=!empty($serialize_settings['subheading'])? $serialize_settings['subheading']:''; ?></h2>
                        <p><?=!empty($serialize_settings['content'])? $serialize_settings['content']:''; ?></p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="video-wrap">
                        <div class="video"><img src="<?=!empty($serialize_settings['content_image'])? $serialize_settings['content_image']:''; ?>"></div>
                        <!--<div class="play-btn"><a href="javascript:void(0);"><img src="<?php /*echo base_url('/assets/images/play-btn.png'); */?>"></a></div>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!---->
<?php $settings=$this->admin_model->get_home_settings(array('slug'=>'section-2'),true); ?>
<?php $serialize_settings=unserialize($settings->page_content); ?>
    <div class="wrapper5">
        <div class="container">
            <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-lg-10">
                    <h1><?=!empty($serialize_settings['heading'])? $serialize_settings['heading']:''; ?></h1>
                    <h2><?=!empty($serialize_settings['content'])? $serialize_settings['content']:''; ?></h2>
                    <p class="get-started"><a href="<?=!empty($serialize_settings['button_link'])? base_url($serialize_settings['button_link']):''; ?>"><?=!empty($serialize_settings['button_text'])? $serialize_settings['button_text']:''; ?></a></p>
                </div>
                <div class="col-lg-1"></div>
            </div>
        </div>
    </div>
<?php $settings=$this->admin_model->get_home_settings(array('slug'=>'section-3'),true); ?>
<?php $serialize_settings=unserialize($settings->page_content); ?>
    <div class="wrapper6">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1><?=!empty($serialize_settings['heading'])? $serialize_settings['heading']:''; ?></h1>
                    <h2><?=!empty($serialize_settings['subheading'])? $serialize_settings['subheading']:''; ?></h2>
                </div>
            </div>
        </div>
    </div>
    <!---->
    <div class="wrapper7">
        <div class="wrapper7-left">
            <ul>
                <li class=""></li>
                <li class=""></li>
                <li class="">
                    <div class="featured-icons"><img src="<?php echo base_url('/assets/images/awards.png'); ?>"></div>
                    <h2>Awards</h2>
                    <p>Embark on a virtual treasure hunt as you tackle maths challenges and reveal fun prizes. The more you practise, the more you win!</p>
                </li>
                <li class=""></li>
            </ul>
        </div>
        <div class="wrapper7-right">
            <ul>
                <li class="">
                    <div class="featured-icons"><img src="<?php echo base_url('/assets/images/national-carriculum.png'); ?>"></div>
                    <h2>National curriculum</h2>
                    <p>With IXL, it's easy to meet your learning objectives! All of IXL's skills are aligned with the national curricula in the UK.</p>
                </li>
                <li class=""></li>
                <li class=""></li>
                <li class="">
                    <div class="featured-icons"><img src="<?php echo base_url('/assets/images/analytics.png'); ?>"></div>
                    <h2>Analytics</h2>
                    <p>Get unprecedented insight into student performance with IXL Analytics. View real-time data on usage, trouble spots and more!</p>
                </li>
            </ul>
        </div>
    </div>
    <!---->
<?php $settings=$this->admin_model->get_home_settings(array('slug'=>'section-4'),true); ?>
<?php $serialize_settings=unserialize($settings->page_content); ?>
    <div class="wrapper8">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1><?=!empty($serialize_settings['heading'])? $serialize_settings['heading']:''; ?></h1>
                    <h2><?=!empty($serialize_settings['subheading'])? $serialize_settings['subheading']:''; ?></h2>
                </div>
            </div>
            <div class="row testimonials-row">
                <div class="col-lg-12">
                    <div class="testimonials">
                        <div>
                            <div class="testimonials-wrapper">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="client-profile"><img src="<?php echo base_url('/assets/images/client-profile.png'); ?>"></div>
                                    </div>
                                    <div class="col-lg-9">
                                        <p class="client-comment">Pri quas audiam virtute ut, case utamur fuisset eam ut, iisque accommodare an eam. Reque blandit qui eu, cu vix nonumy volumus. Legendos intellegam id usu, vide oporteat vix eu, id illud principes has. Nam tempor utamur gubergren no.</p>
                                        <p class="client-name">Luisa Extnsa</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="testimonials-wrapper">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="client-profile"><img src="<?php echo base_url('/assets/images/client-profile.png'); ?>"></div>
                                    </div>
                                    <div class="col-lg-9">
                                        <p class="client-comment">Pri quas audiam virtute ut, case utamur fuisset eam ut, iisque accommodare an eam. Reque blandit qui eu, cu vix nonumy volumus. Legendos intellegam id usu, vide oporteat vix eu, id illud principes has. Nam tempor utamur gubergren no.</p>
                                        <p class="client-name">Luisa Extnsa</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="testimonials-wrapper">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="client-profile"><img src="<?php echo base_url('/assets/images/client-profile.png'); ?>"></div>
                                    </div>
                                    <div class="col-lg-9">
                                        <p class="client-comment">Pri quas audiam virtute ut, case utamur fuisset eam ut, iisque accommodare an eam. Reque blandit qui eu, cu vix nonumy volumus. Legendos intellegam id usu, vide oporteat vix eu, id illud principes has. Nam tempor utamur gubergren no.</p>
                                        <p class="client-name">Luisa Extnsa</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
require_once 'templates/footer.php';
?>