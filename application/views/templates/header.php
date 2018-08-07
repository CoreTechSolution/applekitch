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
	<title><?php echo $title; ?></title>

    <link rel="stylesheet" media="all" href="<?php echo base_url('/assets/css/bootstrap.min.css'); ?>" />
    <link rel="stylesheet" media="all" href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600,700|Open+Sans:300,400,600,700|Raleway:300,400,500,600|Roboto:100,300,400,500,700|Lato:100,300,400,700|Fredoka+One|Istok+Web:400" />
    <link rel="stylesheet" media="all" href="<?php echo base_url('/assets/css/fontawesome-all.css'); ?>" />
    <link rel="stylesheet" media="all" href="<?php echo base_url('/assets/css/jquery.fancybox.css'); ?>" />
    <link rel="stylesheet" media="all" href="<?php echo base_url('/assets/css/slicknav.css'); ?>" />
    <link rel="stylesheet" media="all" href="<?php echo base_url('/assets/css/jquery.bxslider.css'); ?>" />
    <link rel="stylesheet" media="all" href="<?php echo base_url('/assets/css/jquery.datetimepicker.css'); ?>" />
    <link rel="stylesheet" media="all" href="<?php echo base_url('/assets/css/animate.css'); ?>" />
    <link rel="stylesheet" media="all" href="<?php echo base_url('/assets/css/footable.bootstrap.min.css'); ?>" />
    <link rel="stylesheet" media="all" href="<?php echo base_url('/assets/css/style.css'); ?>" />
    <link rel="stylesheet" media="all" href="<?php echo base_url('/assets/css/backend.css'); ?>" />
    <link rel="stylesheet" media="all" href="<?php echo base_url('/assets/css/tooltipster.bundle.min.css'); ?>" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

    <!--[if lt IE 9]>

    <![endif]-->

    <!-- Custom Responsive Stylesheets -->
    <link rel="stylesheet" media="only screen and (max-width: 1024px) and (min-width: 993px)" href="<?php echo base_url('/assets/css/styleMax1024.css'); ?>">
    <link rel="stylesheet" media="only screen and (max-width: 992px) and (min-width: 769px)" href="<?php echo base_url('/assets/css/styleMax992.css'); ?>">
    <link rel="stylesheet" media="only screen and (max-width: 768px) and (min-width: 481px)" href="<?php echo base_url('/assets/css/styleMax768.css'); ?>">
    <link rel="stylesheet" media="only screen and (max-width: 480px)" href="<?php echo base_url('/assets/css/styleMax480.css'); ?>">
    <script src="<?php echo base_url('/assets/js/jquery.js'); ?>" type="text/javascript"></script>
    <script>
        var base_url='<?php echo base_url(); ?>';
    </script>
</head>
<body>
<div class="wrapper1">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="logo">
                    <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url('/assets/images/logo.png'); ?>"></a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="subjects">
                    <ul>
                        <li><a href="javascript:void(0)">Maths</a></li>
                        <li><a href="javascript:void(0)">English</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="reg-log-section">
                    <ul>
						<?php if(isset($_SESSION['user_id'])){ ?>
							<?php $user_id = $_SESSION['user_id']; ?>
                                <li>
                                    <a class="btn btn-primary" href="<?php echo base_url('dashboard'); ?>">Dashboard</a>
                                </li>
                                <li>
                                    <a class="btn btn-danger" href="<?php echo base_url('/login/user_logout'); ?>">Logout</a>
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
</div>