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
								<div class="box-title">Welcome to AppleKitch</div>
								<div class="box-container">
									<p>You are logged in as <strong><?php echo $user_data['fname']; ?> <?php echo $user_data['lname'] ?></strong>. If you are not <?php echo $user_data['fname']; ?> <?php echo $user_data['lname'] ?>, please <a href="<?= base_url('/login/user_logout'); ?>">click here</a> to logout.</p>
                                    <?php if($user_data['membership_plan'] != 1 && $user_data['role'] != 3) { ?>
                                        <div class="alert alert-success">
                                            <div style="float: left; margin: 7px 0;">You are on Free Membership Plan.</div> <a style="float: right;" class="btn btn-primary btn-primary-green" href="<?= base_url('/membership-plan'); ?>">Upgrade</a>
                                            <div style="clear: both;"></div>
                                        </div>
                                    <?php } ?>
                                    <?php if(!(isUserType('student'))){ ?>
                                    <div class="child_search_div">
                                        <form action="<?php echo base_url('dashboard') ?>" method="post" class="child_search_drop">
                                            <div class="row">
                                                <div class="col-lg-2">
                                                    <h5>Select Child</h5>
                                                </div>
                                                <div class="col-lg-3">
                                                    <?php echo form_dropdown('child_id',form_dropdown_child(get_current_user_id()),'',array('class'=>'form-control')); ?>
                                                </div>

                                                <div class="col-lg-2" >
                                                    <input type="submit" class="btn btn-small btn-primary" value="Show">

                                                </div>
                                            </div>
                                        </form>
                                    </div>
    <?php  } ?>
                                    <h4>Completed Topics</h4>
                                    <form action="<?php echo base_url('dashboard'); ?>">
                                        form
                                    </form>
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th></th>
                                            <th>Topic Name</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        if(!empty($topics)) {
                                            foreach($topics as $topic) {
                                                ?>
                                                <tr>
                                                    <td><span class="dash_tick"><i class="far fa-check-square"></i></span></td>
                                                    <td><?= get_returnfield('topics','topic_id',$topic->topic_id,'topic_name'); ?></td>
                                                    <td>Completed</td>
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