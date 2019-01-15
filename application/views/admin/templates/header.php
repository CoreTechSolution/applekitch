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
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="<?php echo  base_url('/assets/css/dashboard.css'); ?>" rel="stylesheet">
    <link rel="stylesheet" media="all" href="<?php echo  base_url('/assets/css/footable.bootstrap.min.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('/assets/css/sweetalert2.min.css'); ?>">
    <link href="<?php echo  base_url('/assets/css/jquery.fancybox.css'); ?>" rel="stylesheet">

    <script src="<?php echo base_url('/assets/js/jquery.js'); ?>" type="text/javascript"></script>
    <script src="<?php echo base_url('/assets/tinymce/tinymce.min.js'); ?>" ></script>
    <script src="<?php echo base_url('/assets/js/jquery-ui.js'); ?>"></script>
    <link rel="stylesheet" href="<?php echo base_url('/assets/css/jquery-ui.css'); ?>">
    <script src="<?php echo base_url('/assets/js/jquery-fsortable.js'); ?>"></script>

    <script>
        var base_url='<?php echo base_url(); ?>';

        /*tinymce.init({
            selector: ".textarea-no-styles",
            height: 400,
            theme: 'modern',
            plugins: 'searchreplace autolink directionality visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount imagetools  contextmenu colorpicker textpattern help code',
            toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat | code',
            image_advtab: true,
            templates: [],
            content_css: [
                '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
                '//www.tinymce.com/css/codepen.min.css'
            ]
        });*/
    </script>
</head>
<body>
<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
    <div class="navbar-brand col-sm-3 col-md-2 mr-0"><a target="_blank" href="<?php echo  base_url(); ?>"><img style="width: 70%;" src="<?php echo  base_url('/assets/images/logo.png'); ?>"></a></div>
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
	        <?php if(isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] == 1){ ?>
                <a class="nav-link" href="<?php echo  base_url('/admin/admin_logout') ?>">Sign out</a>
            <?php } ?>
        </li>
    </ul>
</nav>