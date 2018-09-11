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
											<div class="col-lg-2"><div class="table_head_text">Questions</div></div>
											<div class="col-lg-2"><div class="table_head_text">Improvement</div></div>
										</div>
									</div>
									<div class="table_body">
										<button class="accordion">Count to 3</button>
										<div class="panel">
											<div class="row">
												<div class="col-lg-4"><div class="table_body_text">A.1 Learn to count - up to 3</div></div>
												<div class="col-lg-2"><div class="table_body_text">3 min</div></div>
												<div class="col-lg-2"><div class="table_body_text">13</div></div>
												<div class="col-lg-4"><div class="table_body_text">
														<div class="table-cell skill-improvement" id="yui_3_14_0_1_1536582406995_90">
															<div class="improvement-container" id="yui_3_14_0_1_1536582406995_89">
																<div class="score" style="left: calc(0% - 30px);">0</div>
																<div class="score" style="left: 84%;">84</div>
																<div class="bar"></div>
																<div class="right-arrow arrow" style="left: calc(84% - 11px);"></div>
																<div class="green-bar progress-bar" style="width: 84%; left: 0%;" id="yui_3_14_0_1_1536582406995_87"></div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-lg-4"><div class="table_body_text">A.1 Learn to count - up to 3</div></div>
												<div class="col-lg-2"><div class="table_body_text">5 min</div></div>
												<div class="col-lg-2"><div class="table_body_text">20</div></div>
												<div class="col-lg-4"><div class="table_body_text">
														<div class="table-cell skill-improvement" id="yui_3_14_0_1_1536582406995_90">
															<div class="improvement-container" id="yui_3_14_0_1_1536582406995_89">
																<div class="score" style="left: calc(0% - 30px);">0</div>
																<div class="score" style="left: 100%;">100</div>
																<div class="bar"></div>
																<div class="right-arrow arrow" style="left: calc(100% - 11px);"></div>
																<div class="green-bar progress-bar" style="width: 100%; left: 0%;" id="yui_3_14_0_1_1536582406995_87"></div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-lg-4"><div class="table_body_text">A.1 Learn to count - up to 3</div></div>
												<div class="col-lg-2"><div class="table_body_text">6 min</div></div>
												<div class="col-lg-2"><div class="table_body_text">18</div></div>
												<div class="col-lg-4"><div class="table_body_text">
														<div class="table-cell skill-improvement" id="yui_3_14_0_1_1536582406995_90">
															<div class="improvement-container" id="yui_3_14_0_1_1536582406995_89">
																<div class="score" style="left: calc(0% - 30px);">0</div>
																<div class="score" style="left: 100%;">100</div>
																<div class="bar"></div>
																<div class="right-arrow arrow" style="left: calc(100% - 11px);"></div>
																<div class="green-bar progress-bar" style="width: 100%; left: 0%;" id="yui_3_14_0_1_1536582406995_87"></div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-lg-4"><div class="table_body_text">A.1 Learn to count - up to 3</div></div>
												<div class="col-lg-2"><div class="table_body_text">3 min</div></div>
												<div class="col-lg-2"><div class="table_body_text">10</div></div>
												<div class="col-lg-4"><div class="table_body_text">
														<div class="table-cell skill-improvement" id="yui_3_14_0_1_1536582406995_90">
															<div class="improvement-container" id="yui_3_14_0_1_1536582406995_89">
																<div class="score" style="left: calc(0% - 30px);">0</div>
																<div class="score" style="left: 60%;">60</div>
																<div class="bar"></div>
																<div class="right-arrow arrow" style="left: calc(60% - 11px);"></div>
																<div class="green-bar progress-bar" style="width: 60%; left: 0%;" id="yui_3_14_0_1_1536582406995_87"></div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>

										<button class="accordion">Count to 5</button>
										<div class="panel">
											<div class="row">
												<div class="col-lg-4"><div class="table_body_text">A.1 Learn to count - up to 3</div></div>
												<div class="col-lg-2"><div class="table_body_text">3 min</div></div>
												<div class="col-lg-2"><div class="table_body_text">13</div></div>
												<div class="col-lg-4"><div class="table_body_text">
														<div class="table-cell skill-improvement" id="yui_3_14_0_1_1536582406995_90">
															<div class="improvement-container" id="yui_3_14_0_1_1536582406995_89">
																<div class="score" style="left: calc(0% - 30px);">0</div>
																<div class="score" style="left: 84%;">84</div>
																<div class="bar"></div>
																<div class="right-arrow arrow" style="left: calc(84% - 11px);"></div>
																<div class="green-bar progress-bar" style="width: 84%; left: 0%;" id="yui_3_14_0_1_1536582406995_87"></div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-lg-4"><div class="table_body_text">A.1 Learn to count - up to 3</div></div>
												<div class="col-lg-2"><div class="table_body_text">5 min</div></div>
												<div class="col-lg-2"><div class="table_body_text">20</div></div>
												<div class="col-lg-4"><div class="table_body_text">
														<div class="table-cell skill-improvement" id="yui_3_14_0_1_1536582406995_90">
															<div class="improvement-container" id="yui_3_14_0_1_1536582406995_89">
																<div class="score" style="left: calc(0% - 30px);">0</div>
																<div class="score" style="left: 100%;">100</div>
																<div class="bar"></div>
																<div class="right-arrow arrow" style="left: calc(100% - 11px);"></div>
																<div class="green-bar progress-bar" style="width: 100%; left: 0%;" id="yui_3_14_0_1_1536582406995_87"></div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-lg-4"><div class="table_body_text">A.1 Learn to count - up to 3</div></div>
												<div class="col-lg-2"><div class="table_body_text">6 min</div></div>
												<div class="col-lg-2"><div class="table_body_text">18</div></div>
												<div class="col-lg-4"><div class="table_body_text">
														<div class="table-cell skill-improvement" id="yui_3_14_0_1_1536582406995_90">
															<div class="improvement-container" id="yui_3_14_0_1_1536582406995_89">
																<div class="score" style="left: calc(0% - 30px);">0</div>
																<div class="score" style="left: 100%;">100</div>
																<div class="bar"></div>
																<div class="right-arrow arrow" style="left: calc(100% - 11px);"></div>
																<div class="green-bar progress-bar" style="width: 100%; left: 0%;" id="yui_3_14_0_1_1536582406995_87"></div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-lg-4"><div class="table_body_text">A.1 Learn to count - up to 3</div></div>
												<div class="col-lg-2"><div class="table_body_text">3 min</div></div>
												<div class="col-lg-2"><div class="table_body_text">10</div></div>
												<div class="col-lg-4"><div class="table_body_text">
														<div class="table-cell skill-improvement" id="yui_3_14_0_1_1536582406995_90">
															<div class="improvement-container" id="yui_3_14_0_1_1536582406995_89">
																<div class="score" style="left: calc(0% - 30px);">0</div>
																<div class="score" style="left: 60%;">60</div>
																<div class="bar"></div>
																<div class="right-arrow arrow" style="left: calc(60% - 11px);"></div>
																<div class="green-bar progress-bar" style="width: 60%; left: 0%;" id="yui_3_14_0_1_1536582406995_87"></div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>

										<button class="accordion">Count to 10</button>
										<div class="panel">
											<div class="row">
												<div class="col-lg-4"><div class="table_body_text">A.1 Learn to count - up to 3</div></div>
												<div class="col-lg-2"><div class="table_body_text">3 min</div></div>
												<div class="col-lg-2"><div class="table_body_text">13</div></div>
												<div class="col-lg-4"><div class="table_body_text">
														<div class="table-cell skill-improvement" id="yui_3_14_0_1_1536582406995_90">
															<div class="improvement-container" id="yui_3_14_0_1_1536582406995_89">
																<div class="score" style="left: calc(0% - 30px);">0</div>
																<div class="score" style="left: 84%;">84</div>
																<div class="bar"></div>
																<div class="right-arrow arrow" style="left: calc(84% - 11px);"></div>
																<div class="green-bar progress-bar" style="width: 84%; left: 0%;" id="yui_3_14_0_1_1536582406995_87"></div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-lg-4"><div class="table_body_text">A.1 Learn to count - up to 3</div></div>
												<div class="col-lg-2"><div class="table_body_text">5 min</div></div>
												<div class="col-lg-2"><div class="table_body_text">20</div></div>
												<div class="col-lg-4"><div class="table_body_text">
														<div class="table-cell skill-improvement" id="yui_3_14_0_1_1536582406995_90">
															<div class="improvement-container" id="yui_3_14_0_1_1536582406995_89">
																<div class="score" style="left: calc(0% - 30px);">0</div>
																<div class="score" style="left: 100%;">100</div>
																<div class="bar"></div>
																<div class="right-arrow arrow" style="left: calc(100% - 11px);"></div>
																<div class="green-bar progress-bar" style="width: 100%; left: 0%;" id="yui_3_14_0_1_1536582406995_87"></div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-lg-4"><div class="table_body_text">A.1 Learn to count - up to 3</div></div>
												<div class="col-lg-2"><div class="table_body_text">6 min</div></div>
												<div class="col-lg-2"><div class="table_body_text">18</div></div>
												<div class="col-lg-4"><div class="table_body_text">
														<div class="table-cell skill-improvement" id="yui_3_14_0_1_1536582406995_90">
															<div class="improvement-container" id="yui_3_14_0_1_1536582406995_89">
																<div class="score" style="left: calc(0% - 30px);">0</div>
																<div class="score" style="left: 100%;">100</div>
																<div class="bar"></div>
																<div class="right-arrow arrow" style="left: calc(100% - 11px);"></div>
																<div class="green-bar progress-bar" style="width: 100%; left: 0%;" id="yui_3_14_0_1_1536582406995_87"></div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-lg-4"><div class="table_body_text">A.1 Learn to count - up to 3</div></div>
												<div class="col-lg-2"><div class="table_body_text">3 min</div></div>
												<div class="col-lg-2"><div class="table_body_text">10</div></div>
												<div class="col-lg-4"><div class="table_body_text">
														<div class="table-cell skill-improvement" id="yui_3_14_0_1_1536582406995_90">
															<div class="improvement-container" id="yui_3_14_0_1_1536582406995_89">
																<div class="score" style="left: calc(0% - 30px);">0</div>
																<div class="score" style="left: 60%;">60</div>
																<div class="bar"></div>
																<div class="right-arrow arrow" style="left: calc(60% - 11px);"></div>
																<div class="green-bar progress-bar" style="width: 60%; left: 0%;" id="yui_3_14_0_1_1536582406995_87"></div>
															</div>
														</div>
													</div>
												</div>
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
<script>
    jQuery('.accordion').on('click', function (e) {
        e.preventDefault();
        var this_element=jQuery(this);
        this_element.next('div.panel').slideToggle();
    });

</script>