<link href="https://fonts.googleapis.com/css?family=Aguafina+Script" rel="stylesheet">
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
        font-weight: 500;
        margin: 10px 0 27px 0;
    }
    .certified_name p{

    }
    .certificate_content p span{
        font-weight: 500;
    }
    .certificate_footer{

    }
    .certificate_logo{
        width: 50%;
        float: right;
        margin: 103px 0 20px 0;
    }
    .certificate_signature{

    }
</style>
<div id="printableArea">
    <div class="certificate_div" style="background: url('<?php echo base_url("assets/images/certificate-background.jpg"); ?>')">
        <div class="certificate_content">
            <div class="certificate_header">
                Certificate of Excellence
            </div>
            <p>This certificate is awarded to</p>
            <div class="certified_name">Rana Ghosh</div>
            <p>by <span>Applekitch</span> on <span>6 JANUARY 2018</span></p>
            <p>for excellent performance on <span>10 reception maths skills</span></p>
            <div class="certificate_footer">
                <div class="certificate_logo"><img src="http://localhost/applekitch/assets/images/logo.png" alt=""></div>
                <div class="certificate_signature"></div>
            </div>
        </div>
    </div>
</div>