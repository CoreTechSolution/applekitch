<?php
defined('BASEPATH') OR exit('No direct script access allowed');
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
								<div class="box-title"><?= $title; ?></div>
								<div class="box-container">
                                    <div style="text-align: right;">
                                        <a class="btn btn-primary" href="<?= base_url('add-child'); ?>">Add Child</a>
                                        <p><br/></p>
                                    </div>
									<?php
									$success_msg= $this->session->flashdata('success_msg');
									$error_msg= $this->session->flashdata('error_msg');

									if($success_msg){
										?>
                                        <div class="alert alert-success">
											<?php echo $success_msg; ?>
                                        </div>
										<?php
									}
									if($error_msg){
										?>
                                        <div class="alert alert-danger">
											<?php echo $error_msg; ?>
                                        </div>
										<?php
									}
									?>
									<table class="table">
										<thead>
										<tr>
											<th>Name</th>
											<th>Username</th>
											<th>Actions</th>
										</tr>
										</thead>
										<tbody>
										<?php
										if(!empty($child_data)) {
											foreach($child_data as $child) {
												?>
												<tr>
													<td><?= $child['fname']." ".$child['lname']; ?></td>
													<td><?= $child['email_address']; ?></td>
													<td>
                                                        <a href="<?= base_url('/edit-child'); ?>/?child_id=<?= $child['id']; ?>" title="Edit"><i class="fas fa-edit"></i></a>  <a href="<?= base_url('/delete-child'); ?>/?child_id=<?= $child['id']; ?>" title="Delete"><i class="fas fa-trash"></i></a>
                                                    </td>
												</tr>
												<?php
											}
										}
										?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php
require_once 'templates/footer.php';
?>