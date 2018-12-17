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
                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12"></div>
                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <form method="post" action="<?php echo base_url('frontend/topic'); ?>">
                        <div class="row row1">
                            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                                <label>Select Your Grade</label>
                            </div>
                            <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
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
                            <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                                <?php echo form_dropdown('subject_id',form_dropdown_cr(array('id','name'),'subject'), '',array('class'=>'form-control','id'=>'home_subject_id')); ?>
                            </div>
                        </div>
                        <div class="row row1">
                            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12"></div>
                            <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                                <input type="submit" class="form-control" name="take_the_test" value="Practice Now">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12"></div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="down-arrow"><a id="button" href="javascript:void(0);"><img src="<?php echo base_url('/assets/images/down-arrow.png'); ?>"></a></div>
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view('frontend/template_part/grade_listing_part'); ?>
<?php $settings=$this->admin_model->get_home_settings(array('slug'=>'section-1'),true); ?>
<?php $serialize_settings=unserialize($settings->page_content); ?>
<?php if(!empty($serialize_settings['heading'])){ ?>
    <div class="wrapper4">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <div class="wrapper4-content-wrap">
                        <h1><?=!empty($serialize_settings['heading'])? $serialize_settings['heading']:''; ?></h1>
                        <h2><?=!empty($serialize_settings['subheading'])? $serialize_settings['subheading']:''; ?></h2>
                        <p><?=!empty($serialize_settings['content'])? $serialize_settings['content']:''; ?></p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <div class="video-wrap">
                        <div class="video"><img src="<?=!empty($serialize_settings['content_image'])? $serialize_settings['content_image']:''; ?>"></div>
                        <!--<div class="play-btn"><a href="javascript:void(0);"><img src="<?php /*echo base_url('/assets/images/play-btn.png'); */?>"></a></div>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
    <!---->
<?php $settings=$this->admin_model->get_home_settings(array('slug'=>'section-2'),true); ?>
<?php $serialize_settings=unserialize($settings->page_content); ?>
<?php if(!empty($serialize_settings['heading'])){ ?>
    <div class="wrapper5">
        <div class="container">
            <div class="row">
                <div class="col-lg-1 col-md-12 col-sm-12 col-xs-12"></div>
                <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12">
                    <h1><?=!empty($serialize_settings['heading'])? $serialize_settings['heading']:''; ?></h1>
                    <h2><?=!empty($serialize_settings['content'])? $serialize_settings['content']:''; ?></h2>
                    <p class="get-started"><a href="<?=!empty($serialize_settings['button_link'])? base_url($serialize_settings['button_link']):''; ?>"><?=!empty($serialize_settings['button_text'])? $serialize_settings['button_text']:''; ?></a></p>
                </div>
                <div class="col-lg-1 col-md-12 col-sm-12 col-xs-12"></div>
            </div>
        </div>
    </div>
    <?php } ?>
<?php $settings=$this->admin_model->get_home_settings(array('slug'=>'section-3'),true); ?>
<?php $serialize_settings=unserialize($settings->page_content); ?>
<?php if(!empty($serialize_settings['heading'])){ ?>
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
                    <p>With Applekitch, it's easy to meet your learning objectives! All of Applekitch's skills are aligned with the national curricula in the UK.</p>
                </li>
                <li class=""></li>
                <li class=""></li>
                <li class="">
                    <div class="featured-icons"><img src="<?php echo base_url('/assets/images/analytics.png'); ?>"></div>
                    <h2>Analytics</h2>
                    <p>Get unprecedented insight into student performance with Applekitch Analytics. View real-time data on usage, trouble spots and more!</p>
                </li>
            </ul>
        </div>
    </div>
    <!---->
<?php } ?>
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

                        <?php foreach ($testimonials as $testimonial){ ?>
                            <div>
                                <div class="testimonials-wrapper">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                                            <div class="client-profile"><img src="<?= $testimonial->testimonial_img; ?>"></div>
                                        </div>
                                        <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                                            <p class="client-comment"><?= $testimonial->content; ?></p>
                                            <p class="client-name"><?= $testimonial->name; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>



<?php
require_once 'templates/footer.php';
?>