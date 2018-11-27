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
                                        <form action="<?php echo base_url('dashboard/scorechart') ?>" method="post" class="child_search_drop">
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
                                    <!--<div class="graphic_chart">
                                        <h3>Overview of Rana's performance - All time</h3>
                                        <div id="score-chart" style="width: 750px; height: 450px; margin: 0;padding: 0; overflow: hidden" ></div>
                                    </div>-->
                                    <?php if(!empty($jquery_day_array)){ ?>
                                        <div class="score_table">
                                            <div class="table_head">
                                                <div class="row">
                                                    <div class="col-lg-2 col-md-2 col-sm-2 col-2"><div class="table_head_text">Skill</div></div>
                                                    <div class="col-lg-2 col-md-2 col-sm-2 col-2"><div class="table_head_text">SmartScore</div></div>
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-3"><div class="table_head_text">Answered</div></div>
                                                    <div class="col-lg-2 col-md-2 col-sm-2 col-2"><div class="table_head_text">Time</div></div>
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-3"><div class="table_head_text">Date</div></div>
                                                </div>
                                            </div>
                                            <div class="table_body">
                                                <?php //print_r($jquery_day_array); exit(); ?>

                                                <?php foreach ($jquery_day_array as $key_cat=>$value_cat){ ?>
                                                    <button class="accordion"><?php echo get_returnfield('category','id', $key_cat,'name'); ?> </button>
                                                    <div class="panel">
                                                        <?php foreach($value_cat as $key_top=>$value_top) { ?>
                                                            <div class="row">
                                                                <div class="col-lg-4 col-md-4 col-sm-4 col-4"><div class="table_body_text"><?php echo get_returnfield('topics','topic_id', $key_top,'topic_name'); ?></div></div>
                                                                <?php if(empty($value_top['total_ans_right'])){
                                                                    $value_top['total_ans_right']=0;
                                                                } ?>
                                                                <?php $persantage=round(($value_top['total_ans_right']/$value_top['total_ans'])*100); ?>
                                                                <div class="col-lg-2 col-md-2 col-sm-2 col-2"><div class="table_body_text"><?php echo $persantage; ?></div></div>
                                                                <div class="col-lg-2 col-md-2 col-sm-2 col-2"><div class="table_body_text"><?php echo $value_top['total_ans']; ?></div></div>
                                                                <div class="col-lg-2 col-md-2 col-sm-2 col-2"><div class="table_body_text"><?php echo $value_top['total_time']; ?> min</div></div>
                                                                <div class="col-lg-2 col-md-2 col-sm-2 col-2"><div class="table_body_text"><?php echo dateFormat('m-d-Y',$value_top['last_date']); ?></div></div>
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
<script type = "text/javascript">
    google.charts.load('current', {packages: ['corechart']});
</script>
<script language = "JavaScript">
    function drawChart() {
        // Define the chart to be drawn.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Browser');
        data.addColumn('number', 'Percentage');
        data.addRows([
            ['17% Mastery', 17],
            ['1% Excellence', 1],
            ['8% Practised', 8],
            ['74% No practice', 74]
        ]);

        // Set chart options
        var options = {'title':'', pieHole: 0.6,pieSliceText: 'none',
            slices: {0: {color: '#46b01e'}, 1:{color: '#00a1de'}, 2:{color: '#064a6a'}, 3: {color: '#E7E7E7'}},
            legend: { textStyle: {fontSize: 18}}};

        // Instantiate and draw the chart.
        var chart = new google.visualization.PieChart(document.getElementById ('score-chart'));
        chart.draw(data, options);
    }
    google.charts.setOnLoadCallback(drawChart);
</script>