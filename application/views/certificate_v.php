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
									<!--<div style="text-align: right;">
										<a class="btn btn-primary" href="<?/*= base_url('add-child'); */?>">Add Child</a>
										<p><br/></p>
									</div>-->

										<table class="table">
											<thead>
											<tr>
												<th>Name</th>
												<th>Action</th>
											</tr>
											</thead>
											<tbody>
											<?php
											if(!empty($certificates)) {
											foreach($certificates as $certificate) {
												?>
												<tr>
													<td><?php echo get_returnfield('certificates','id',$certificate->id,'name'); ?></td>
													<td>
														<a href="<?php echo base_url('dashboard/generate_pdf/'.$certificate->id); ?>">View Certificate</a>
													</td>
												</tr>
												<?php
											}
                                            }
											?>
											</tbody>
										</table>
										<?php

									?>
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