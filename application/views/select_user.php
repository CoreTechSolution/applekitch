<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'templates/header.php';
?>
	<div class="inner-pages">
		<div class="wrapper2">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 registration">
						<h1><?php echo $title; ?></h1>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-2"></div>
					<div class="col-lg-8">
						<div class="login_form">
                            <ul>
                                <li>
	                                <?php if(!empty($user)) { ?>
                                        <div class="profile-img">
                                            <a href="<?php echo base_url('/login/select_user'); ?>?user_id=<?php echo $user['id']; ?>">
			                                <?php if(!empty($user['profile_img']) && $user['profile_img']!==''){ ?>
                                                <img src="<?php echo $user['profile_img']; ?>" alt="" class="admin_edit_img_preview">
			                                <?php } else { ?>
                                                <img src="<?php echo base_url('/assets/images/noimg.png'); ?>">
			                                <?php } ?>
                                            <br/>
                                            <?php echo $user['fname']; ?>
                                            </a>
                                        </div>
	                                <?php } ?>
                                </li>
	                            <?php
	                            if(!empty($childs)) {
		                            foreach($childs as $child) {
		                                ?>
                                        <li>
                                            <div class="profile-img">
                                                <a href="<?php echo base_url('/login/select_user'); ?>?user_id=<?php echo $child['id']; ?>">
		                                        <?php if(!empty($child['profile_img']) && $child['profile_img']!==''){ ?>
                                                    <img src="<?php echo $child['profile_img']; ?>" alt="" class="admin_edit_img_preview">
		                                        <?php } else { ?>
                                                    <img src="<?php echo base_url('/assets/images/noimg.png'); ?>">
		                                        <?php } ?>
                                                <br/>
                                                <?php echo $child['fname']; ?>
                                                </a>
                                            </div>
                                        </li>
                                        <?php
		                            }
	                            }
	                            ?>
                            </ul>
						</div>

					</div>
					<div class="col-lg-2"></div>
				</div>

			</div>
		</div>
	</div>
<?php
require_once 'templates/footer.php';
?>