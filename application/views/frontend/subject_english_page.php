<?php $this->load->view('templates/header'); ?>

<div class="pageBannerWrapper"></div>
<div class="pageWrapper">
    <div class="container">
        <div class="row">

            <div class="col-lg-9">
                <?php echo '<h1>'.$title.'</h1>'; ?>
                <div class="pageContainer">
                    <?php

                    if(!empty($subject)){
                        foreach ($subject as $worksheet){
                            echo $worksheet->name.'<br>';?>

                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
    </div>
</div>
</div>

<?php $this->load->view('templates/footer'); ?>
