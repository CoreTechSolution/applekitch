<?php $this->load->view('templates/header'); ?>

<div class="pageBannerWrapper"></div>
<div class="pageWrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <?php //require_once(base_url('application/views/frontend/template_parts/worksheet_sidebar.php')); ?>
                <?php $this->load->view('frontend/template_part/worksheet_sidebar'); ?>
            </div>
            <div class="col-lg-9">
                <?php echo '<h1>'.$title.'</h1>'; ?>
                <div class="pageContainer">
                    <?php

                        if(!empty($worksheets)){
                            foreach ($worksheets as $worksheet){
                                echo $worksheet->name.'<br>';?>


                                <img src=" <?php echo  $worksheet->worksheet_img  ?>" width="206" height="200" /><br>

                                <?php
                            }
                        }
                    ?>
                </div>


                <div class="pageContainer">
                    <?php
                    $total_point=0;
                    $rating_numbers=0;

                    if(!empty($worksheets)){

                        foreach ($worksheetrating as $row){
                           $row->total_points.'<br>';
                           $row->rating_number.'<br>';
                            $total_point+=$row->total_points;
                            $rating_numbers+=$row->rating_number;?>
                            <?php
                        }
                    }
                    ?>
                    <?php echo $total_point;?>
                    <?php echo $rating_numbers?>

                    <?php
                    $percent= ($rating_numbers/$total_point)*100;

                    echo $percent.'%';
                    ?>
                </div>



                <style>
                    body { font-size: 18px; }

                    .stars-container {
                        position: relative;
                        display: inline-block;
                        color: transparent;
                    }

                    .stars-container:before {
                        position: absolute;
                        top: 0;
                        left: 0;
                        content: '★★★★★';
                        color: lightgray;
                    }

                    .stars-container:after {
                        position: absolute;
                        top: 0;
                        left: 0;
                        content: '★★★★★';
                        color: gold;
                        overflow: hidden;
                    }




                    .stars-10:after { width: <?php echo $percent .'%' ?>; }



                </style>


                <div><span class="stars-container stars-10">★★★★★</span></div>







            </div>
        </div>
    </div>
</div>





<?php $this->load->view('templates/footer'); ?>
