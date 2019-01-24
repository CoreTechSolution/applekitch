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
                                                <?php
                                                $total_point=get_returnfield('worksheet_rating','worksheet_id',$worksheet->id,'total_points');
                                                $rating_numbers=get_returnfield('worksheet_rating','worksheet_id',$worksheet->id,'rating_number');
                                                if($total_point!=0 && $rating_numbers!=0){
                                                    $percent= ($total_point/($rating_numbers*5))*100;
                                                } else{
                                                    $percent= 0;
                                                }

                                                ?>
                                                <div class="work_details">
                                                    <div class="details">worksheet</div>
                                                    <div class="star_rating_list">rating
                                                        <span class="stars-container stars-10" style="--bubble-color: <?php echo $percent .'%' ?>;">★★★★★</span>
                                                    </div>
                                                </div>
                                            </div>
                                            </a>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <?php } ?>

                        </div>
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