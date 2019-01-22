<?php
$this->load->view('templates/header');
?>
    <div class="wrapper inner-pages">
        <div class="breadcrumbs_section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <ul class="breadcrumbs">
                            <?php //print_r($this->uri->segment(3)); ?>
                            <li class="breadcrumbs__item"><a href="<?= base_url(); ?>" class="breadcrumbs__element">Home</a></li>
                            <li class="breadcrumbs__item"><a href="<?= base_url($this->uri->segment(2)); ?>" class="breadcrumbs__element"><?php echo ucfirst($this->uri->segment(2)) ?></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="inner_page_content">
            <div class="container">
                <div class="subject_top_nav">
                    <div class="row">
                        <div class="col-lg-2 col-md-3">
                            <?php $this->load->view('frontend/template_part/worksheet_sidebar'); ?>
                        </div>
                        <div class="col-lg-10 col-md-9">
                            <h1><?php echo ucfirst($title); ?></h1>
                            <div class="search_boardcumb" id="search_boardcumb">
                                <span>Filter: </span>
                                <ul id="search_boardcumb_ul">

                                </ul>
                            </div>
                            <div class="leading_worksheet">
                                <img src="<?= base_url('assets/images/leader_worksheet.gif'); ?>" alt="">
                            </div>

                            <?php if(!empty($worksheets)){ ?>
                            <div class="worksheet_list_main" id="worksheet_list_main">

                                <div class="row">
                                    <?php foreach ($worksheets as $worksheet){ ?>
                                        <div class="col-lg-3 col-md-4">
                                            <a href="<?php echo base_url('frontend/worksheet/math/1/test/'.$worksheet->slug) ?>">
                                            <div class="worksheet_box">
                                                <div class="work_img">
                                                    <img src="<?= $worksheet->worksheet_img; ?>" alt="">
                                                </div>
                                                <div class="work_name">
                                                    <?= $worksheet->name; ?>
                                                </div>
                                                <div class="work_details">
                                                    <div class="details">worksheet</div>
                                                    <div class="star_rating">rating<span class="stars-container stars-10">★★★★★</span></div>
                                                </div>
                                            </div>
                                            </a>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <?php } ?>

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
                            <?php /*echo $total_point;*/?><!--
                            --><?php /*echo $rating_numbers*/?>
                            <?php
                            $percent= ($rating_numbers/$total_point)*100;

                            /*echo $percent.'%';*/
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


<!--                        <div><span class="stars-container stars-10">★★★★★</span></div>
-->
                    </div>
                </div>
                <?php if(!empty($grade_content)){ ?>
                    <div class="topic_content_area">

                        <?php echo $grade_content->content; ?>

                    </div>
                <?php } ?>

            </div>
        </div>
    </div>
<?php
$this->load->view('templates/footer');
?>