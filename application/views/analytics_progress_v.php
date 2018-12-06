<?php
/**
 * Created by PhpStorm.
 * User: Rana
 * Date: 9/6/2018
 * Time: 7:02 PM
 */

?>
<?php $child_id=(!empty($this->session->userdata('child_id')))?$this->session->userdata('child_id'):get_current_user_id(); ?>
<?php
require_once 'templates/header.php';
?>
    <div class="inner-pages backend">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <?php require_once 'templates/profile_sidebar.php'; ?>
                </div>
                <div class="col-lg-9">
                    <div class="contentSection">
                        <div class="dashboard-section">
                            <div class="box-wrapper">
                                <div class="box-title"><?php echo $title; ?></div>
                                <div class="box-container">
                                    <?php if(isUserType('Student')!=true){ ?>
                                        <div class="child_search_div">
                                            <form action="<?php echo base_url('dashboard/progress') ?>" method="post" class="child_search_drop">
                                                <div class="row">
                                                    <div class="col-lg-2">
                                                        <h5>Select Child</h5>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <?php echo form_dropdown('child_id',form_dropdown_child(get_current_user_id()),$child_id,array('class'=>'form-control')); ?>
                                                    </div>

                                                    <div class="col-lg-2" >
                                                        <input type="submit" class="btn btn-small btn-primary" value="Show">

                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    <?php } ?>
                                    <?php if($get_child_id!=0){ ?>
                                        <div class="filter_box">
                                            <?php echo form_open(base_url('dashboard/'.$search_url),array('class'=>'form-control filter-form')); ?>
                                            <?php echo form_dropdown('subject_id',form_dropdown_cr(array('id','name'),'subject'),'',array('class'=>'form-control')); ?>
                                            <?php echo form_dropdown('grade_id',form_dropdown_cr(array('id','name'),'grade'),'',array('class'=>'form-control')); ?>
                                            <?php echo form_submit('search','Search',array('class'=>'btn btn-default btn-small')); ?>
                                            <?php echo form_close(); ?>
                                        </div>
                                        <?php if(!empty($jquery_day_array)){ ?>
                                            <div class="score_table">
                                                <div class="table_head">
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-4 col-sm-4 col-4"><div class="table_head_text">Skill</div></div>
                                                        <div class="col-lg-2 col-md-2 col-sm-2 col-2 mobile_hide"><div class="table_head_text">Time</div></div>
                                                        <div class="col-lg-2 col-md-2 col-sm-2 col-2 mobile_hide"><div class="table_head_text">Questions</div></div>
                                                        <div class="col-lg-4 col-md-4 col-sm-4 col-8"><div class="table_head_text">Improvement</div></div>
                                                    </div>
                                                </div>
                                                <div class="table_body">

                                                    <?php foreach ($jquery_day_array as $key_cat=>$value_cat){ ?>
                                                        <button class="accordion"><?php echo get_returnfield('category','id', $key_cat,'name'); ?> </button>
                                                        <div class="panel">
                                                            <?php foreach($value_cat as $key_top=>$value_top) { ?>
                                                                <div class="row">
                                                                    <div class="col-lg-4 col-md-4 col-sm-4 col-4"><div class="table_body_text"><?php echo get_returnfield('topics','topic_id', $key_top,'topic_name'); ?></div></div>
                                                                    <div class="col-lg-2 col-md-2 col-sm-2 col-2 mobile_hide"><div class="table_body_text"><?php echo (!empty($value_top['total_time']))?$value_top['total_time']:'0'; ?> min</div></div>
                                                                    <div class="col-lg-2 col-md-2 col-sm-2 col-2 mobile_hide"><div class="table_body_text"><?php echo (!empty($value_top['total_ans']))?$value_top['total_ans']:'0'; ?></div></div>
                                                                    <?php $persantage=round(((!empty($value_top['total_ans_right']))?$value_top['total_ans_right']:0/$value_top['total_ans'])*100); ?>
                                                                    <?php $persantage=($persantage>100)?100:$persantage; ?>
                                                                    <div class="col-lg-4 col-md-4 col-sm-4 col-8"><div class="table_body_text">
                                                                            <div class="table-cell skill-improvement" id="yui_3_14_0_1_1536582406995_90">
                                                                                <div class="improvement-container" id="yui_3_14_0_1_1536582406995_89">
                                                                                    <div class="score" style="left: calc(0% - 30px);">0</div>
                                                                                    <div class="score" style="left: <?php echo $persantage; ?>%;"><?php echo $persantage; ?></div>
                                                                                    <div class="bar"></div>
                                                                                    <div class="right-arrow arrow" style="left: calc(<?php echo $persantage; ?>% - 11px);"></div>
                                                                                    <div class="green-bar progress-bar" style="width: <?php echo $persantage; ?>%; left: 0%;" id="yui_3_14_0_1_1536582406995_87"></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <?php } ?>
                                                        </div>
                                                    <?php } ?>


                                                </div>

                                            </div>
                                        <?php } else { echo '<h3 class="no_data_h3">No data found!</h3>'; } ?>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Certificate design-->

                    <!--end here-->

                </div>
            </div>
        </div>
    </div>

<?php
require_once 'templates/footer.php';
?>