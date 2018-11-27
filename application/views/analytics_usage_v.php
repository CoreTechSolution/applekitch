<?php
require_once 'templates/header.php';
?>

<?php $child_id=(!empty($this->session->userdata('child_id')))?$this->session->userdata('child_id'):get_current_user_id(); ?>
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
                                        <form action="<?php echo base_url('dashboard/usage') ?>" method="post" class="child_search_drop">
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
                                        <h3>All Time, <?php echo get_returnfield('user','id',$get_child_id,'fname') ; ?> has...</h3>
                                        <div class="total_usage_counter_div">

                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="total_usage_list_box">
                                                        <div class="icon text_color_seegreen"><i class="fas fa-pencil-alt"></i></div>
                                                        <div class="normal_text">ANSWERED</div>
                                                        <div class="score_text"><?php echo $total_q_ans; ?></div>
                                                        <div class="normal_text">QUESTIONS</div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="total_usage_list_box">
                                                        <div class="icon text_color_orange"><i class="fas fa-clock"></i></div>
                                                        <div class="normal_text">SPENT</div>
                                                        <div class="score_text"><?php echo $total_time_spent; ?></div>
                                                        <div class="normal_text">PRACTISING</div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="total_usage_list_box">
                                                        <div class="icon text_color_yellow"><i class="fas fa-puzzle-piece"></i></i></div>
                                                        <div class="normal_text">MADE PROGRESS IN</div>
                                                        <div class="score_text"><?php echo $total_completed_topic; ?></div>
                                                        <div class="normal_text">SKILLS</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="chart_area">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <h3>Practice by Grade</h3>
                                                    <div id="donutchart" class="pie_chart_style"></div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <h3>Practice by Day</h3>
                                                    <?php if(!empty($jquery_day_text)){ ?>
                                                        <div id="Anthony_chart_div" class="bar_chart_style"></div>
                                                    <?php } else{ ?>
                                                        <p class="no_data_h3">No Data</p>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
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
<script type="text/javascript">
    google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(drawChart);
    google.charts.setOnLoadCallback(drawAnthonyChart);
    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Years', 'Total question attend'],
            <?php echo $jquery_year_pie; ?>
        ]);

       /* var options = {
            title: 'PRACTICE BY CATEGORY',
            pieHole: 0.6,
            pieSliceText: 'none'
        };*/
        var options = {'title':'', pieHole: 0.6,pieSliceText: 'none',
            slices: {0: {color: '#46b01e'}, 1:{color: '#00a1de'}, 2:{color: '#064a6a'}, 3: {color: '#E7E7E7'}},
            legend: { textStyle: {fontSize: 15}}};

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
    }
    function drawAnthonyChart() {

        // Define the chart to be drawn.
        var data = google.visualization.arrayToDataTable([
            ['Day', 'Questions'],
            <?php echo $jquery_day_text; ?>
        ]);

        var options = {title: '',
            hAxis: {
                title: 'Day',

            },
            vAxis: {
                title: 'Question Answered'
            }
        };

        // Instantiate and draw the chart.
        var chart = new google.visualization.ColumnChart(document.getElementById('Anthony_chart_div'));
        chart.draw(data, options);
    }
</script>
