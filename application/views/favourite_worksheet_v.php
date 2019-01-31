<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'templates/header.php';
?>
    <div class="inner-pages backend">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <?php require_once 'templates/profile_sidebar.php'; ?>
                </div>
                <div class="col-lg-9">
                    <div class="contentSection">
                        <div class="dashboard-section">
                            <div class="box-wrapper">
                                <div class="box-title"><?= $title; ?></div>
                                <div class="box-container">
                                    <?php if(!empty($favourite_worksheets)){ ?>
                                        <?php //print_r($favourite_worksheets); exit(); ?>
                                        <div class="dashboard_worksheet_list" style="width: 100%">
                                            <div class="row">
                                                <?php foreach ($favourite_worksheets as $favourite_worksheet){ ?>
                                                    <div class="col-lg-4 col-md-4">
                                                        <div class="worksheet_box matchHeight1">
                                                            <a href="<?php echo base_url('frontend/worksheet/'.get_returnfield('work_subjects','id',$favourite_worksheet->work_subject_id,'slug').'/'.get_returnfield('work_grades','id',$favourite_worksheet->work_grade_id,'slug').'/'.get_returnfield('work_categories','id',$favourite_worksheet->work_cat_id,'slug').'/'.$favourite_worksheet->slug) ?>">

                                                                <div class="work_list_label">

                                                                    <span class="badge badge-default"><?= $favourite_worksheet->label; ?></span>
                                                                </div>
                                                                <div class="work_img">
                                                                    <img src="<?= $favourite_worksheet->worksheet_img; ?>" alt="">
                                                                </div>
                                                                <div class="work_name">
                                                                    <?= word_limiter($favourite_worksheet->name,3); ?>
                                                                </div>
                                                                <?php
                                                                $total_point=get_returnfield('worksheet_rating','worksheet_id',$favourite_worksheet->id,'total_points');
                                                                $rating_numbers=get_returnfield('worksheet_rating','worksheet_id',$favourite_worksheet->id,'rating_number');
                                                                if($total_point!=0 && $rating_numbers!=0){
                                                                    $percent= ($total_point/($rating_numbers*5))*100;
                                                                } else{
                                                                    $percent= 0;
                                                                }

                                                                ?>
                                                                <div class="work_details">
                                                                    <div class="star_rating_list">
                                                                        <span class="stars-container stars-10" style="--bubble-color: <?php echo $percent .'%' ?>;">★★★★★</span>
                                                                    </div>
                                                                    <div class="details">
                                                                        <?= ucfirst(get_returnfield('work_grades','id',$favourite_worksheet->work_grade_id,'name')) ?>
                                                                        &nbsp;&nbsp;&nbsp;<?= ucfirst(get_returnfield('work_subjects','id',$favourite_worksheet->work_subject_id,'name')) ?>
                                                                    </div>
                                                                </div>

                                                            </a>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    <?php } ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
require_once 'templates/footer.php';
?>