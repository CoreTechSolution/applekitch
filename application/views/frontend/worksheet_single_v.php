<?php
$this->load->view('templates/header');
?>
    <div class="wrapper inner-pages">
        <!--<div class="breadcrumbs_section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <ul class="breadcrumbs">
                            <?php /*//print_r($this->uri->segment(3)); */?>
                            <li class="breadcrumbs__item"><a href="<?/*= base_url(); */?>" class="breadcrumbs__element">Home</a></li>
                            <li class="breadcrumbs__item"><a href="<?/*= base_url($this->uri->segment(2)); */?>" class="breadcrumbs__element"><?php /*echo ucfirst($this->uri->segment(2)) */?></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>-->
        <style type="text/css">
            .overall-rating{font-size: 14px;margin-top: 5px;color: #8e8d8d;}
        </style>
        <div class="inner_page_content">
            <div class="container">
                <div class="subject_top_nav">
                    <div class="row">
                        <?php if(!empty($worksheets)){ ?>
                            <div class="col-lg-3 col-md-3">
                                <div class="worksheet_single_sidebar">
                                    <div class="work_single_social_share">

                                    </div>
                                    <div class="work_single_details">
                                        <div class="work_single_id">
                                            <span>Worksheet ID</span>
                                            <?= $worksheets[0]->id; ?>
                                        </div>
                                        <div class="work_single_id">
                                            <span>Worksheet Details</span>

                                        </div>
                                        <div class="work_single_id">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <span>subject</span>
                                                    <?= get_returnfield('work_subjects','id',$worksheets[0]->work_subject_id,'name') ; ?>
                                                </div>
                                                <div class="col-lg-6">
                                                    <span>grade</span>
                                                    <?= get_returnfield('work_grades','id',$worksheets[0]->work_grade_id,'name') ; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="work_single_id">
                                            <span>user ratings</span>
                                            <div class="star_rating">
                                                <?php
                                                    $rattingRow=get_rattings($worksheets[0]->id);
                                                ?>
                                                <!--<input name="rating" value="0" id="rating_star" type="hidden" postID="1" />-->
                                                <input name="rating" value="<?php echo $rattingRow->average_rating; ?>" id="rating_star" type="hidden" postID="<?= $worksheets[0]->id; ?>" />

                                                <div class="overall-rating">(Average Rating : <?php echo $rattingRow->average_rating; ?><br>
                                                    Based on : <?php echo $rattingRow->rating_number; ?> rating)</span></div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="work_single_download">
                                        download / Print
                                        <a class="work_single_print_btn" href="javascript:void(0)"  onclick="worksheet_print('<?= $worksheets[0]->pdf_path ?>')">Print</a>
                                        <a class="work_single_download_btn" href="javascript:void(0)" onclick="worksheet_download('<?= $worksheets[0]->pdf_path ?>')">Download</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-9">
                                <h1><?php echo ucfirst($title); ?></h1>


                                <div class="worksheet_single_main">
                                    <div class="work_single_main">
                                        <?=  $worksheets[0]->content; ?>
                                    </div>
                                    <div class="work_single_image">
                                        <img src="<?=  $worksheets[0]->worksheet_img; ?>" alt="">
                                    </div>

                                </div>


                            </div>

                        <?php } ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
<?php
$this->load->view('templates/footer');
?>