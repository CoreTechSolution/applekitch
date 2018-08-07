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
                                    <?php
                                        if(!empty($user_data['price'])) {
                                            foreach($memberships as $membership) {
                                                if($membership['id'] == $user_data['membership_plan']) {
                                                    echo '<p class="alert alert-success">You are currently subscribed to <strong>'.$membership['name'].'</strong> on '.$user_data['ym'].' basis.</p>';

                                                }
                                            }
                                        }
                                    ?>
									<div class="row">
										<?php
										if(!empty($memberships)) {
											foreach($memberships as $membership){
												if($membership['id'] != 3) {
												?>
												<div class="col-lg-6 col-md-6 col-sm-6 <?php if($membership['yearly_price'] == 0 || $membership['monthly_price'] == 0 || !empty($user_data['price'])){ echo 'price_plan_hide'; } ?>">
													<form method="post" action="<?= base_url('/dashboard/payment') ?>">
														<input type="hidden" name="membership_plan" value="<?= $membership['id']; ?>">
														<ul class="price_list">
															<li class="header"><?= $membership['name']; ?></li>
															<li class="price"><input type="radio" name="membership_price" value="monthly-<?= $membership['monthly_price']; ?>">&nbsp; <sup>£</sup><span><?= $membership['monthly_price']; ?></span><small>/month</small></li>
															<li class="price"><input checked type="radio" name="membership_price" value="yearly-<?= $membership['yearly_price']; ?>">&nbsp; <sup>£</sup><span><?= $membership['yearly_price']; ?></span><small>/year</small></li>
															<li class="price">
																<input type="submit" value="Select" name="<?= strtolower($membership['name']); ?>" class="button">
															</li>
														</ul>
													</form>
												</div>
											<?php } } } ?>

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
<?php
require_once 'templates/footer.php';
?>