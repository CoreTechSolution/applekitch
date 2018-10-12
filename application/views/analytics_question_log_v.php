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
                                    <div class="child_search_div">
                                        <form action="<?php echo base_url('dashboard/questionlog') ?>" method="post" class="child_search_drop">
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
									<?php if($get_child_id!=0){ ?>
                                        <table class="table small_table" data-paging="true" data-sorting="true" data-filtering="true" data-paging-size="20">
                                            <thead>
                                            <tr>
                                                <th>Question</th>
                                                <th>Right Answer</th>
                                                <th>Your Answer</th>
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
                                    <!--<table class="table small_table" data-paging="true" data-sorting="true" data-filtering="true" data-paging-size="5">
                                        <thead>
                                        <tr>
                                            <th data-priority="2">Rank</th>
                                            <th>Movie Title</th>
                                            <th data-priority="3">Year</th>
                                            <th data-priority="1"><abbr title="Rotten Tomato Rating">Rating</abbr></th>
                                            <th data-priority="5">Reviews</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <th>1</th>
                                            <td><a href="http://en.wikipedia.org/wiki/Citizen_Kane" data-rel="external">Citizen Kane</a></td>
                                            <td>1941</td>
                                            <td>100%</td>
                                            <td>74</td>
                                        </tr>
                                        <tr>
                                            <th>2</th>
                                            <td><a href="http://en.wikipedia.org/wiki/Casablanca_(film)" data-rel="external">Casablanca</a></td>
                                            <td>1942</td>
                                            <td>97%</td>
                                            <td>64</td>
                                        </tr>
                                        <tr>
                                            <th>3</th>
                                            <td><a href="http://en.wikipedia.org/wiki/The_Godfather" data-rel="external">The Godfather</a></td>
                                            <td>1972</td>
                                            <td>97%</td>
                                            <td>87</td>
                                        </tr>
                                        <tr>
                                            <th>4</th>
                                            <td><a href="http://en.wikipedia.org/wiki/Gone_with_the_Wind_(film)" data-rel="external">Gone with the Wind</a></td>
                                            <td>1939</td>
                                            <td>96%</td>
                                            <td>87</td>
                                        </tr>
                                        <tr>
                                            <th>5</th>
                                            <td><a href="http://en.wikipedia.org/wiki/Lawrence_of_Arabia_(film)" data-rel="external">Lawrence of Arabia</a></td>
                                            <td>1962</td>
                                            <td>94%</td>
                                            <td>87</td>
                                        </tr>
                                        <tr>
                                            <th>6</th>
                                            <td><a href="http://en.wikipedia.org/wiki/Dr._Strangelove" data-rel="external">Dr. Strangelove Or How I Learned to Stop Worrying and Love the Bomb</a></td>
                                            <td>1964</td>
                                            <td>92%</td>
                                            <td>74</td>
                                        </tr>
                                        <tr>
                                            <th>7</th>
                                            <td><a href="http://en.wikipedia.org/wiki/The_Graduate" data-rel="external">The Graduate</a></td>
                                            <td>1967</td>
                                            <td>91%</td>
                                            <td>122</td>
                                        </tr>
                                        <tr>
                                            <th>8</th>
                                            <td><a href="http://en.wikipedia.org/wiki/The_Wizard_of_Oz_(1939_film)" data-rel="external">The Wizard of Oz</a></td>
                                            <td>1939</td>
                                            <td>90%</td>
                                            <td>72</td>
                                        </tr>
                                        <tr>
                                            <th>9</th>
                                            <td><a href="http://en.wikipedia.org/wiki/Singin%27_in_the_Rain" data-rel="external">Singin' in the Rain</a></td>
                                            <td>1952</td>
                                            <td>89%</td>
                                            <td>85</td>
                                        </tr>
                                        <tr>
                                            <th>10</th>
                                            <td class="title"><a href="http://en.wikipedia.org/wiki/Inception" data-rel="external">Inception</a></td>
                                            <td>2010</td>
                                            <td>84%</td>
                                            <td>78</td>
                                        </tr>
                                        </tbody>
                                    </table>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--<script>
                    jQuery(document).ready(function(){
                        jQuery('.table').append(html).trigger('footable_redraw');
                    });
                </script>-->
                <!--Certificate design-->

                <!--end here-->
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

