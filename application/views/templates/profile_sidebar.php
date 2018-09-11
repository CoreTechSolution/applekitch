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

        <li class="dropdown"><a href="javacript:void(0)"><i class="fa fa-user fa-fw" aria-hidden="true"></i> Analytics &nbsp;<i class="fa fa-caret-down"></i></a>
            <ul class="dropdown_list">
                <li><a href="<?php echo base_url('dashboard/usage'); ?>">Usage</a></li>
                <li><a href="<?php echo base_url('dashboard/show'); ?>">Show</a></li>
                <li><a href="<?php echo base_url('dashboard/progress'); ?>">Progress</a></li>
                <li><a href="<?php echo base_url('dashboard/questionlog'); ?>">Question Log</a></li>
                <li><a href="<?php echo base_url('dashboard/scorechart'); ?>">Score Chart</a></li>
                <li><a href="<?php echo base_url('dashboard/skill'); ?>">Skill</a></li>
                <li><a href="<?php echo base_url('dashboard/troublespot'); ?>">Trouble Spot</a></li>
            </ul>
        </li>
		<li><a href="<?php echo base_url('/login/user_logout'); ?>"><i class="fa fa-sign-out-alt fa-fw" aria-hidden="true"></i> Logout</a></li>
	</ul>
</div>
<script>
    jQuery('.logged-in-usermenus ul > li.dropdown > a').on('click', function (e) {
        e.preventDefault();
        var this_element = jQuery(this);
        this_element.parent().find('ul').slideToggle();
    });
</script>