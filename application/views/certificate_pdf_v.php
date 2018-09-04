<link href="https://fonts.googleapis.com/css?family=Aguafina+Script" rel="stylesheet" media="all">
<style>
    @page { margin: 0px; }
    body { margin: 0px; }
    .certificate_div{
        width: 100%;
        background-width: 100%;
        background-position: inherit;
        height: 775px;
        background-repeat: no-repeat;
        /* display: block; */
    }
    .certificate_content{
        text-align: center;
        padding: 100px 50px 50px 50px;
    }
    .certificate_content p{
        font-size: 22px !important;
        font-weight: 300 !important;
        margin: 10px 0 !important;

    }
    .certificate_header{
        font-family: 'Aguafina Script', cursive;
        font-size: 50px;
        margin-bottom: 33px;
    }
    .certified_name{
        color: #f1693c;
        font-size: 30px;
        font-weight: bold !important;
        margin: 10px 0 35px 0;
    }

    .certificate_content p b{
        font-weight: bold !important;
        font-size: 23px !important;
    }
    .certificate_footer{

    }
    .certificate_logo{
        width: 100%;
        /* float: right; */
        margin: 21px 0px 20px 0;
        text-align: right;
        padding: 0 75px 0 0;
    }
    .certificate_signature{
        width: 100%;
        /* float: right; */
        margin: 100px 0 0 0;
        text-align: right;
        padding: 0 75px 0 0;
    }
    .certificate_signature img{
        width: 200px;
    }
</style>
<div id="printableArea">
    <?php //print_r($certificates); exit(); ?>
    <div class="certificate_div" style="background: url('<?php echo $certificate_details->cer_bg_img; ?>')">
        <div class="certificate_content">
            <div class="certificate_header">
                <?php echo get_returnfield('certificates','id',$certificates->certificate_id,'name'); ?>
            </div>
            <p>This certificate is awarded to</p>
            <?php $user_name=get_returnfield('user','id',$certificates->user_id,'fname').' '.get_returnfield('user','id',$certificates->user_id,'lname'); ?>
            <div class="certified_name"><?php echo $user_name; ?></div>
            <p>by <b>Applekitch</b> on <b><?php echo strtoupper( dateFormat('d F Y ',$certificates->submit_dt)); ?></b></p>
            <p><?php echo get_returnfield('certificates','id',$certificates->certificate_id,'description'); ?></p>
            <div class="certificate_footer">
                <div class="certificate_signature"><img src="<?php echo $certificate_details->cer_signature_img; ?>" alt=""></div>
                <div class="certificate_logo"><img src="<?php echo base_url('assets/images/logo.png'); ?>" alt=""></div>
            </div>
        </div>
    </div>
</div>