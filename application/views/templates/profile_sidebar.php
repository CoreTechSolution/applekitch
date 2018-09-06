<div class="profile-sidebar">
	<div class="profile-img">
		<img src="<?php echo get_image($user_data['profile_img']); ?>">
	</div>
	<div class="profile-display-name"><?php echo $user_data['fname']; ?> <?php echo $user_data['lname'] ?></div>
</div>
<div class="logged-in-usermenus">
	<ul>
		<li><a href="<?php echo base_url('/manage-profile'); ?>"><i class="fa fa-user fa-fw" aria-hidden="true"></i> Manage Profile</a></li>
		<?php if($user_data['role'] != 3) { ?>
		<li><a href="<?php echo base_url('/membership-plan'); ?>"><i class="fa fa-bookmark fa-fw" aria-hidden="true"></i> Membership Plans</a></li>
		<li><a href="<?php echo base_url('/children'); ?>"><i class="fa fa-child" aria-hidden="true"></i> Children</a></li>
        <?php } ?>
        <li><a href="<?php echo base_url('/certificates'); ?>"><i class="fa fa-user fa-fw" aria-hidden="true"></i> Certificates center</a></li>
		<li><a href="<?php echo base_url('/login/user_logout'); ?>"><i class="fa fa-sign-out-alt fa-fw" aria-hidden="true"></i> Logout</a></li>
	</ul>
</div>