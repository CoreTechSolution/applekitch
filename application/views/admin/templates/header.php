<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!--<link rel="icon" href="../../../../favicon.ico">-->

    <title><?php echo $title; ?></title>
    <link rel="stylesheet" media="all" href="<?php echo  base_url('/assets/css/bootstrap.min.css'); ?>" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo  base_url('/assets/css/dashboard.css'); ?>" rel="stylesheet">
    <link rel="stylesheet" media="all" href="<?php echo  base_url('/assets/css/footable.bootstrap.min.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('/assets/css/sweetalert2.min.css'); ?>">
    <link href="<?php echo  base_url('/assets/css/jquery.fancybox.css'); ?>" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

    <script src="<?php echo base_url('/assets/js/jquery.js'); ?>" type="text/javascript"></script>
    <!--// GIJGO Grid System-->
<!--    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/gijgo@1.9.10/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/gijgo@1.9.10/css/demo.min.css" rel="stylesheet" type="text/css" />-->
    <!--// GIJGO Grid System-->

    <script src="<?php echo base_url('/assets/js/jquery-ui.js'); ?>"></script>
    <link rel="stylesheet" href="<?php echo base_url('/assets/css/jquery-ui.css'); ?>">

    <script>
        var base_url='<?php echo base_url(); ?>';
    </script>
</head>
<body>
<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
    <div class="navbar-brand col-sm-3 col-md-2 mr-0"><a target="_blank" href="<?php echo  base_url(); ?>"><img src="<?php echo  base_url('/assets/images/logo.png'); ?>"></a></div>
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
	        <?php if(isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] == 1){ ?>
                <a class="nav-link" href="<?php echo  base_url('/admin/admin_logout') ?>">Sign out</a>
            <?php } ?>
        </li>
    </ul>
</nav>