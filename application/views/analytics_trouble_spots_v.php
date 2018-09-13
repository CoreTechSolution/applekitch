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

								<div class="score_table">
									<div class="table_head">
										<div class="row">
											<div class="col-lg-4"><div class="table_head_text">Skill</div></div>
											<div class="col-lg-2"><div class="table_head_text">Time</div></div>
											<div class="col-lg-2"><div class="table_head_text">Score</div></div>
											<div class="col-lg-2"><div class="table_head_text">Missed</div></div>
											<div class="col-lg-2"><div class="table_head_text"></div></div>
										</div>
									</div>
									<div class="table_body">
										<button class="accordion">Count to 3 </button>
										<div class="panel">
											<div class="row">
												<div class="col-lg-4"><div class="table_body_text">A.1 Learn to count - up to 3</div></div>
												<div class="col-lg-2"><div class="table_body_text">3 min</div></div>
												<div class="col-lg-2"><div class="table_body_text">52</div></div>
												<div class="col-lg-2"><div class="table_body_text">14</div></div>
												<div class="col-lg-2"><div class="table_body_text"><a href="">View All</a></div></div>
											</div>
											<div class="row">
												<div class="col-lg-4"><div class="table_body_text">A.2 Learn to count - up to 5</div></div>
												<div class="col-lg-2"><div class="table_body_text">6 min</div></div>
												<div class="col-lg-2"><div class="table_body_text">86</div></div>
												<div class="col-lg-2"><div class="table_body_text">2</div></div>
												<div class="col-lg-2"><div class="table_body_text"><a href="">View All</a></div></div>
											</div>
											<div class="row">
												<div class="col-lg-4"><div class="table_body_text">A.3 Learn to count - up to 10</div></div>
												<div class="col-lg-2"><div class="table_body_text">8 min</div></div>
												<div class="col-lg-2"><div class="table_body_text">50</div></div>
												<div class="col-lg-2"><div class="table_body_text">10</div></div>
												<div class="col-lg-2"><div class="table_body_text"><a href="">View All</a></div></div>
											</div>
											<div class="row">
												<div class="col-lg-4"><div class="table_body_text">A.4 Learn to count - up to 20</div></div>
												<div class="col-lg-2"><div class="table_body_text">3 min</div></div>
												<div class="col-lg-2"><div class="table_body_text">52</div></div>
												<div class="col-lg-2"><div class="table_body_text">14</div></div>
												<div class="col-lg-2"><div class="table_body_text"><a href="">View All</a></div></div>
											</div>
										</div>

										<button class="accordion">Count to 5</button>
										<div class="panel">
											<div class="row">
												<div class="col-lg-4"><div class="table_body_text">A.1 Learn to count - up to 3</div></div>
												<div class="col-lg-2"><div class="table_body_text">3 min</div></div>
												<div class="col-lg-2"><div class="table_body_text">52</div></div>
												<div class="col-lg-2"><div class="table_body_text">14</div></div>
												<div class="col-lg-2"><div class="table_body_text"><a href="">View All</a></div></div>
											</div>
											<div class="row">
												<div class="col-lg-4"><div class="table_body_text">A.2 Learn to count - up to 5</div></div>
												<div class="col-lg-2"><div class="table_body_text">6 min</div></div>
												<div class="col-lg-2"><div class="table_body_text">86</div></div>
												<div class="col-lg-2"><div class="table_body_text">2</div></div>
												<div class="col-lg-2"><div class="table_body_text"><a href="">View All</a></div></div>
											</div>
											<div class="row">
												<div class="col-lg-4"><div class="table_body_text">A.3 Learn to count - up to 10</div></div>
												<div class="col-lg-2"><div class="table_body_text">8 min</div></div>
												<div class="col-lg-2"><div class="table_body_text">50</div></div>
												<div class="col-lg-2"><div class="table_body_text">10</div></div>
												<div class="col-lg-2"><div class="table_body_text"><a href="">View All</a></div></div>
											</div>
											<div class="row">
												<div class="col-lg-4"><div class="table_body_text">A.4 Learn to count - up to 20</div></div>
												<div class="col-lg-2"><div class="table_body_text">3 min</div></div>
												<div class="col-lg-2"><div class="table_body_text">52</div></div>
												<div class="col-lg-2"><div class="table_body_text">14</div></div>
												<div class="col-lg-2"><div class="table_body_text"><a href="">View All</a></div></div>
											</div>
										</div>

										<button class="accordion">Count to 10</button>
										<div class="panel">
											<div class="row">
												<div class="col-lg-4"><div class="table_body_text">A.1 Learn to count - up to 3</div></div>
												<div class="col-lg-2"><div class="table_body_text">3 min</div></div>
												<div class="col-lg-2"><div class="table_body_text">52</div></div>
												<div class="col-lg-2"><div class="table_body_text">14</div></div>
												<div class="col-lg-2"><div class="table_body_text"><a href="">View All</a></div></div>
											</div>
											<div class="row">
												<div class="col-lg-4"><div class="table_body_text">A.2 Learn to count - up to 5</div></div>
												<div class="col-lg-2"><div class="table_body_text">6 min</div></div>
												<div class="col-lg-2"><div class="table_body_text">86</div></div>
												<div class="col-lg-2"><div class="table_body_text">2</div></div>
												<div class="col-lg-2"><div class="table_body_text"><a href="">View All</a></div></div>
											</div>
											<div class="row">
												<div class="col-lg-4"><div class="table_body_text">A.3 Learn to count - up to 10</div></div>
												<div class="col-lg-2"><div class="table_body_text">8 min</div></div>
												<div class="col-lg-2"><div class="table_body_text">50</div></div>
												<div class="col-lg-2"><div class="table_body_text">10</div></div>
												<div class="col-lg-2"><div class="table_body_text"><a href="">View All</a></div></div>
											</div>
											<div class="row">
												<div class="col-lg-4"><div class="table_body_text">A.4 Learn to count - up to 20</div></div>
												<div class="col-lg-2"><div class="table_body_text">3 min</div></div>
												<div class="col-lg-2"><div class="table_body_text">52</div></div>
												<div class="col-lg-2"><div class="table_body_text">14</div></div>
												<div class="col-lg-2"><div class="table_body_text"><a href="">View All</a></div></div>
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
