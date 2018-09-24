<?php
/**
 * Created by PhpStorm.
 * User: Rana
 * Date: 9/6/2018
 * Time: 7:02 PM
 */

?>

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
                                    <table class="table" data-paging="true" data-sorting="true" data-filtering="true" data-paging-size="20">
                                        <thead>
                                        <tr>
                                            <th>Question</th>
                                            <th>Right Answer</th>
                                            <th>Your Answer</th>
                                            <th>Time</th>
                                            <th>Marks</th>
                                            <th>SmartScore</th>
                                            <th>Date</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        if(!empty($user_details)) {
                                            foreach($user_details as $user_detail) {
                                                //print_r($question);
                                                ?>
                                                <tr>
                                                    <td><?php echo get_returnfield('questions','question_id',$user_detail->question_id,'question_name'); ?></td>
                                                    <td><?php echo $user_detail->correct_ans; ?></td>
                                                    <td><?php echo $user_detail->your_ans; ?></td>
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
                                            <td colspan="4">
                                                <div class="pagination"></div>
                                            </td>
                                        </tr>
                                        </tfoot>
                                    </table>

                                    </div>
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