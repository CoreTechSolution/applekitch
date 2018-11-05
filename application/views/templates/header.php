<!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" lang="en-US" prefix="og: http://ogp.me/ns#">
<![endif]-->
<!--[if IE 7]>
<html id="ie7" lang="en-US" prefix="og: http://ogp.me/ns#">
<![endif]-->
<!--[if IE 8]>
<html id="ie8" lang="en-US" prefix="og: http://ogp.me/ns#">
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html lang="en-US" prefix="og: http://ogp.me/ns#">
<!--<![endif]-->
<head>
	<meta charset="UTF-8" />
	<meta name="robots" content="noindex,nofollow,noodp,noydir,noarchive"/>
	<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
	<meta http-equiv="Pragma" content="no-cache">
	<meta http-equiv="Expires" content="0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="<?php echo base_url('/assets/images/favicon.png'); ?>">
	<title><?php echo $title; ?> | Applekitch</title>

    <link rel="stylesheet" media="all" href="<?php echo  base_url('/assets/css/bootstrap.min.css'); ?>" />
    <link rel="stylesheet" media="all" href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600,700|Open+Sans:300,400,600,700|Raleway:300,400,500,600|Roboto:100,300,400,500,700|Lato:100,300,400,700|Fredoka+One|Istok+Web:400" />
    <link href="https://fonts.googleapis.com/css?family=K2D:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" media="all" href="<?php echo base_url('/assets/css/jquery.fancybox.css'); ?>" />
    <link rel="stylesheet" media="all" href="<?php echo base_url('/assets/css/slicknav.css'); ?>" />
    <link rel="stylesheet" media="all" href="<?php echo base_url('/assets/css/jquery.bxslider.css'); ?>" />
    <link rel="stylesheet" media="all" href="<?php echo base_url('/assets/css/jquery.datetimepicker.css'); ?>" />
    <link rel="stylesheet" media="all" href="<?php echo base_url('/assets/css/animate.css'); ?>" />
    <link rel="stylesheet" media="all" href="<?php echo base_url('/assets/css/footable.bootstrap.min.css'); ?>" />
    <link rel="stylesheet" media="all" href="<?php echo base_url('/assets/css/style.css'); ?>" />
    <link rel="stylesheet" media="all" href="<?php echo base_url('/assets/css/backend.css'); ?>" />
    <link rel="stylesheet" media="all" href="<?php echo base_url('/assets/css/tooltipster.bundle.min.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('/assets/css/jquery-ui.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('/assets/css/font-awesome.css'); ?>" >

    <!--[if lt IE 9]>

    <![endif]-->

    <!-- Custom Responsive Stylesheets -->
    <link rel="stylesheet" media="only screen and (max-width: 1024px) and (min-width: 993px)" href="<?php echo base_url('/assets/css/styleMax1024.css'); ?>">
    <link rel="stylesheet" media="only screen and (max-width: 992px) and (min-width: 769px)" href="<?php echo base_url('/assets/css/styleMax992.css'); ?>">
    <link rel="stylesheet" media="only screen and (max-width: 768px) and (min-width: 481px)" href="<?php echo base_url('/assets/css/styleMax768.css'); ?>">
    <link rel="stylesheet" media="only screen and (max-width: 480px)" href="<?php echo base_url('/assets/css/styleMax480.css'); ?>">
    <script src="<?php echo base_url('/assets/js/jquery.js'); ?>" type="text/javascript"></script>
    <script src="<?php echo base_url('/assets/js/jquery-ui.js'); ?>"></script>
    <!--<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">-->
    <script>
        var base_url='<?php echo base_url(); ?>';
        var fb_id='<?php echo FB_APP_ID; ?>';
    </script>
    <script src="<?php echo base_url('/assets/js/jquery-fsortable.js'); ?>"></script>
    <script>
        function init(){
            jQuery(".fs").fsortable({
                connectWith: ".fs",
                tolerance: "pointer",
                size: 5
            }).disableSelection();

            jQuery("#content .item").draggable({
                connectToSortable: ".fs:not(.full)",
                revert: "invalid",
                helper: "clone",
                stop: function(e, ui) {
                    jQuery("#img_order_student").val("");
                    var file_name_array = [];
                    jQuery(".fs .item img").each(function(){
                        var this_element = jQuery(this);
                        var src = jQuery(this_element).attr("src");
                        var tarr = src.split("/");
                        var file_name = tarr[tarr.length-1];
                        console.log(file_name);
                        file_name_array.push(file_name);
                        var file_name_string = file_name_array.toString();
                        jQuery("#img_order_student").val(file_name_string);
                    });
                }
            });
        }
    </script>
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.css" />
    <script src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.js"></script>
    <script>
        window.addEventListener("load", function(){
            window.cookieconsent.initialise({
                "palette": {
                    "popup": {
                        "background": "#eb6c44",
                        "text": "#ffffff"
                    },
                    "button": {
                        "background": "#f5d948"
                    }
                },
                "theme": "classic",
                "content": {
                    "href": "http://localhost/applekitch/"
                }
            })});
    </script>
</head>
<body>
<div class="wrapper1">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3">
                <div class="logo">
                    <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url('/assets/images/logo.png'); ?>"></a>
                </div>
            </div>
            <div class="col-lg-5 col-md-5">
                <div class="subjects">
                    <ul>
                        <li><a href="<?php echo base_url('math') ?>">Maths</a></li>
                        <li><a href="<?php echo base_url('english') ?>">English</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="reg-log-section">
                    <ul>
						<?php if(loginCheck()){ ?>
							<?php
                            //print_r($_SESSION);
                            $user_id = get_current_user_id();
							$userdata = get_userdata_by_id($user_id);
							$childs_data = get_childs($user_id);
                            ?>
                                <li>
                                    <a class="btn btn-primary" href="<?php echo base_url('dashboard'); ?>">Welcome <?php echo $userdata->fname; ?>
                                        <?php
                                            if(!empty($userdata->profile_img)) {
                                                echo '<img class="head_pro_img" src="'.$userdata->profile_img.'" />';
                                            } else {
                                                echo '<img class="head_pro_img" src="'.base_url('/assets/images/noimg.png').'">';
                                            }
                                        ?>
                                    </a>
                                    <?php
                                    if(!empty($childs_data)) {
                                        ?>
                                        <ul>
                                        <?php
                                        foreach($childs_data as $child) {
                                            ?>
                                            <li>
                                                <a class="btn btn-primary" href="<?php echo base_url('/login/select_user'); ?>?user_id=<?php echo $child['id']; ?>">
	                                                <?php
	                                                if(!empty($child['profile_img'])) {
		                                                echo '<img class="head_pro_img" src="'.$child['profile_img'].'" />';
	                                                } else {
		                                                echo '<img class="head_pro_img" src="'.base_url('/assets/images/noimg.png').'">';
	                                                }
	                                                ?>
	                                                <?php echo $child['fname']; ?>
                                                </a>
                                            </li>
                                            <?php
                                        }
                                        ?>
                                        </ul>
                                        <?php
                                    }
                                    ?>
                                </li>
                                <li>
                                    <a class="btn btn-danger"<?php if(!empty($userdata->profile_img)) { ?> style="padding-top: 9px; padding-bottom: 9px;"<?php } ?> href="<?php echo base_url('/login/user_logout'); ?>">Logout</a>
                                </li>
							<?php }else{ ?>
                                <li>
                                    <a href="<?php echo base_url('/register'); ?>"><img src="<?php echo base_url('/assets/images/register.png'); ?>"></a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('/login'); ?>"><img src="<?php echo base_url('/assets/images/login.png'); ?>"></a>
                                </li>
							<?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <?php if($title!='Welcome' && $title!='Login'){ ?>
    <div class="top_tap_sub">
        <div class="container">
            <div class="row">
                <ul>
                    <li><a href="<?php echo base_url('math') ?>">Math</a></li>
                    <li><a href="<?php echo base_url('english') ?>">English</a></li>
                    <?php if(loginCheck()==true){ ?>
                        <li><a href="<?php echo base_url('awards'); ?>">Awards</a></li>
                        <li><a href="<?php echo base_url('certificates'); ?>">Certificates</a></li>
                    <?php } ?>

                </ul>
            </div>
        </div>
    </div>
    <?php } ?>
</div>