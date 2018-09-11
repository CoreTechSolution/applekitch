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
								<div class="filter_box">
									<?php echo form_open('/',array('class'=>'form-control filter-form')); ?>
									<?php echo form_dropdown('subject_id',form_dropdown_cr(array('id','name'),'subject'),'',array('class'=>'form-control')); ?>
									<?php echo form_dropdown('grade_id',form_dropdown_cr(array('id','name'),'grade'),'',array('class'=>'form-control')); ?>
									<?php echo form_submit('search','Search',array('class'=>'btn btn-default btn-small')); ?>
									<?php echo form_close(); ?>
								</div>
								<div class="graphic_chart">
									<h3>Overview of Rana's performance - All time</h3>
									<div id="score-chart" style="width: 750px; height: 450px; margin: 0;padding: 0; overflow: hidden" ></div>
								</div>
								<div class="score_table">
									<div class="table_head">
										<div class="row">
											<div class="col-lg-4"><div class="table_head_text">Skill</div></div>
											<div class="col-lg-2"><div class="table_head_text">SmartScore</div></div>
											<div class="col-lg-2"><div class="table_head_text">Answered</div></div>
											<div class="col-lg-2"><div class="table_head_text">Time</div></div>
											<div class="col-lg-2"><div class="table_head_text">Date</div></div>
										</div>
									</div>
									<div class="table_body">
										<button class="accordion">Count to 3</button>
										<div class="panel">
											<div class="row">
												<div class="col-lg-4"><div class="table_body_text">A.1 Learn to count - up to 3</div></div>
												<div class="col-lg-2"><div class="table_body_text">84</div></div>
												<div class="col-lg-2"><div class="table_body_text">13</div></div>
												<div class="col-lg-2"><div class="table_body_text">3 min</div></div>
												<div class="col-lg-2"><div class="table_body_text">10th Sep, 2018</div></div>
											</div>
											<div class="row">
												<div class="col-lg-4"><div class="table_body_text">A.1 Learn to count - up to 3</div></div>
												<div class="col-lg-2"><div class="table_body_text">84</div></div>
												<div class="col-lg-2"><div class="table_body_text">13</div></div>
												<div class="col-lg-2"><div class="table_body_text">3 min</div></div>
												<div class="col-lg-2"><div class="table_body_text">10th Sep, 2018</div></div>
											</div>
											<div class="row">
												<div class="col-lg-4"><div class="table_body_text">A.1 Learn to count - up to 3</div></div>
												<div class="col-lg-2"><div class="table_body_text">84</div></div>
												<div class="col-lg-2"><div class="table_body_text">13</div></div>
												<div class="col-lg-2"><div class="table_body_text">3 min</div></div>
												<div class="col-lg-2"><div class="table_body_text">10th Sep, 2018</div></div>
											</div>
											<div class="row">
												<div class="col-lg-4"><div class="table_body_text">A.1 Learn to count - up to 3</div></div>
												<div class="col-lg-2"><div class="table_body_text">84</div></div>
												<div class="col-lg-2"><div class="table_body_text">13</div></div>
												<div class="col-lg-2"><div class="table_body_text">3 min</div></div>
												<div class="col-lg-2"><div class="table_body_text">10th Sep, 2018</div></div>
											</div>
										</div>

										<button class="accordion">Count to 5</button>
										<div class="panel">
											<div class="row">
												<div class="col-lg-4"><div class="table_body_text">A.1 Learn to count - up to 3</div></div>
												<div class="col-lg-2"><div class="table_body_text">84</div></div>
												<div class="col-lg-2"><div class="table_body_text">13</div></div>
												<div class="col-lg-2"><div class="table_body_text">3 min</div></div>
												<div class="col-lg-2"><div class="table_body_text">10th Sep, 2018</div></div>
											</div>
											<div class="row">
												<div class="col-lg-4"><div class="table_body_text">A.1 Learn to count - up to 3</div></div>
												<div class="col-lg-2"><div class="table_body_text">84</div></div>
												<div class="col-lg-2"><div class="table_body_text">13</div></div>
												<div class="col-lg-2"><div class="table_body_text">3 min</div></div>
												<div class="col-lg-2"><div class="table_body_text">10th Sep, 2018</div></div>
											</div>
											<div class="row">
												<div class="col-lg-4"><div class="table_body_text">A.1 Learn to count - up to 3</div></div>
												<div class="col-lg-2"><div class="table_body_text">84</div></div>
												<div class="col-lg-2"><div class="table_body_text">13</div></div>
												<div class="col-lg-2"><div class="table_body_text">3 min</div></div>
												<div class="col-lg-2"><div class="table_body_text">10th Sep, 2018</div></div>
											</div>
										</div>

										<button class="accordion">Count to 10</button>
										<div class="panel">
											<div class="row">
												<div class="col-lg-4"><div class="table_body_text">A.1 Learn to count - up to 3</div></div>
												<div class="col-lg-2"><div class="table_body_text">84</div></div>
												<div class="col-lg-2"><div class="table_body_text">13</div></div>
												<div class="col-lg-2"><div class="table_body_text">3 min</div></div>
												<div class="col-lg-2"><div class="table_body_text">10th Sep, 2018</div></div>
											</div>
											<div class="row">
												<div class="col-lg-4"><div class="table_body_text">A.1 Learn to count - up to 3</div></div>
												<div class="col-lg-2"><div class="table_body_text">84</div></div>
												<div class="col-lg-2"><div class="table_body_text">13</div></div>
												<div class="col-lg-2"><div class="table_body_text">3 min</div></div>
												<div class="col-lg-2"><div class="table_body_text">10th Sep, 2018</div></div>
											</div>
											<div class="row">
												<div class="col-lg-4"><div class="table_body_text">A.1 Learn to count - up to 3</div></div>
												<div class="col-lg-2"><div class="table_body_text">84</div></div>
												<div class="col-lg-2"><div class="table_body_text">13</div></div>
												<div class="col-lg-2"><div class="table_body_text">3 min</div></div>
												<div class="col-lg-2"><div class="table_body_text">10th Sep, 2018</div></div>
											</div>
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
<script>
    jQuery('.accordion').on('click', function (e) {
        e.preventDefault();
        var this_element=jQuery(this);
        this_element.next('div.panel').slideToggle();
    });

</script>