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
                        <div class="col-lg-2">
                            <?php $this->load->view('frontend/template_part/worksheet_sidebar'); ?>
                        </div>
                        <div class="col-lg-10">
                            <h1><?php echo ucfirst($title); ?></h1>
                            <?php if(!empty($worksheets)){ ?>
                            <div class="worksheet_list_main">
                                <div class="row">
                                    <?php foreach ($worksheets as $worksheet){ ?>
                                        <div class="col-lg-3">
                                            <a href="#">
                                            <div class="worksheet_box">
                                                <div class="work_img">
                                                    <img src="<?= $worksheet->worksheet_img; ?>" alt="">
                                                </div>
                                                <div class="work_name">
                                                    <?= $worksheet->name; ?>
                                                </div>
                                                <div class="work_details">
                                                    <div class="details">worksheet</div>
                                                    <div class="star_rating"></div>

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