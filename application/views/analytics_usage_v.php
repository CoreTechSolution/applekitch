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
                                                    <div class="score_text">938</div>
                                                    <div class="normal_text">QUESTIONS</div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="total_usage_list_box">
                                                    <div class="icon text_color_orange"><i class="fas fa-clock"></i></div>
                                                    <div class="normal_text">SPENT</div>
                                                    <div class="score_text">4 hr 6 min</div>
                                                    <div class="normal_text">PRACTISING</div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="total_usage_list_box">
                                                    <div class="icon text_color_yellow"><i class="fas fa-puzzle-piece"></i></i></div>
                                                    <div class="normal_text">MADE PROGRESS IN</div>
                                                    <div class="score_text">57</div>
                                                    <div class="normal_text">SKILLS</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="chart_area">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div id="donutchart" style="width: 400px; height: 300px;"></div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div id="Anthony_chart_div" style="width: 400px; height: 300px;"></div>
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

        var options = {
            title: 'PRACTICE BY CATEGORY',
            pieHole: 0.8,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
    }
    function drawAnthonyChart() {

        var data = new google.visualization.DataTable();
        data.addColumn('timeofday', 'Time of Day');
        data.addColumn('number', 'Motivation Level');

        data.addRows([
            [{v: [8, 0, 0], f: '8 am'}, 1],
            [{v: [9, 0, 0], f: '9 am'}, 2],
            [{v: [10, 0, 0], f:'10 am'}, 3],
            [{v: [11, 0, 0], f: '11 am'}, 4],
            [{v: [12, 0, 0], f: '12 pm'}, 5],
            [{v: [13, 0, 0], f: '1 pm'}, 6],
            [{v: [14, 0, 0], f: '2 pm'}, 7],
            [{v: [15, 0, 0], f: '3 pm'}, 8],
            [{v: [16, 0, 0], f: '4 pm'}, 9],
            [{v: [17, 0, 0], f: '5 pm'}, 10],
        ]);

        var options = {
            title: 'Motivation Level Throughout the Day',
            hAxis: {
                title: 'Time of Day',
                format: 'h:mm a',
                viewWindow: {
                    min: [7, 30, 0],
                    max: [17, 30, 0]
                }
            },
            vAxis: {
                title: 'Rating (scale of 1-10)'
            }
        };

        var chart = new google.visualization.ColumnChart(
            document.getElementById('Anthony_chart_div'));

        chart.draw(data, options);
    }
</script>
