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
                                    <h3>Today, <?php echo 'Rana Has....' ; ?></h3>
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
                                                <h3>Practice by Category</h3>
                                                <div id="donutchart" style="width: 800px; height: 400px;"></div>
                                            </div>
                                            <div class="col-lg-12">
                                                <h3>Practice by Day</h3>
                                                <div id="Anthony_chart_div" style="width: 800px; height: 500px;"></div>
                                            </div>

                                        </div>
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
<script type="text/javascript">
    google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(drawChart);
    google.charts.setOnLoadCallback(drawAnthonyChart);
    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Task', 'Hours per Day'],
            ['Time (Year 2)',     11],
            ['Fractions (Year 2)',      2],
            ['Counting and number patterns (Year 2)',  2],
            ['Measurement (Year 2)', 2],
            ['Sentences (Year 2)',    7]
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
