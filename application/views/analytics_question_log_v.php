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
                                        <form action="<?php echo base_url('dashboard/questionlog') ?>" method="post" class="child_search_drop">
                                            <div class="row">
                                                <div class="col-lg-2">
                                                    <h5>Select Child</h5>
                                                </div>
                                                <div class="col-lg-3 col-md-8 col-sm-8 col-xs-8">
					                                <?php echo form_dropdown('child_id',form_dropdown_child(get_current_user_id()),$child_id,array('class'=>'form-control')); ?>
                                                </div>

                                                <div class="col-lg-2 col-md-4 col-sm-4 col-xs-4" >
                                                    <input type="submit" class="btn btn-small btn-primary" value="Show">

                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <?php } ?>
									<?php if($get_child_id!=0){ ?>
                                        <table class="table small_table q_log" data-paging="true" data-sorting="true" data-filtering="true"
                                               data-paging-size="20">
                                            <thead>
                                            <tr>
                                                <th data-class="expand">Question</th>
                                                <th data-hide="phone,tablet">Right Answer</th>
                                                <th data-hide="phone,tablet">Your Answer</th>
                                                <th>Time</th>
                                                <th>Marks</th>
                                                <th>Score</th>
                                                <th>Date</th>
                                            </tr>
                                            </thead>
                                            <tbody>
											<?php
											if(!empty($user_details)) {
												foreach($user_details as $user_detail) {
												    $str_y= @unserialize($user_detail->your_ans);
												    if($str_y!=false){
												        $your_ans=implode(',',$str_y);
                                                    } else{
                                                        $your_ans=$user_detail->your_ans;
                                                    }
                                                    $str_c= @unserialize($user_detail->correct_ans);
                                                    if($str_c!=false){
                                                        $correct_ans=implode(',',$str_c);
                                                    } else{
                                                        $correct_ans=$user_detail->correct_ans;
                                                    }
													//print_r($question);
													?>
                                                    <tr>
                                                        <td><?php echo get_returnfield('questions','question_id',$user_detail->question_id,'question_name'); ?></td>
                                                        <td><?php echo $correct_ans; ?></td>
                                                        <td><?php echo $your_ans; ?></td>
                                                        <td><?php echo $user_detail->ans_time; ?></td>
                                                        <td><?php echo $user_detail->marks; ?></td>
                                                        <td><?php echo ($user_detail->answer_type=='true')?$user_detail->marks:0; ?></td>
                                                        <td><?php echo dateFormat('m-d-Y', $user_detail->submit_date); ?></td>
                                                    </tr>
													<?php

												}
											}
											?>
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <td colspan="7">
                                                    <div class="pagination"></div>
                                                </td>
                                            </tr>
                                            </tfoot>
                                        </table>

									<?php } ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    jQuery(function(){
                        jQuery('.table').footable();
                    });
                </script>
            </div>
        </div>
    </div>
    </div>

<?php
require_once 'templates/footer.php';
?>

