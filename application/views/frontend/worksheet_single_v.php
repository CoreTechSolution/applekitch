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
                            <?php if(!empty($this->uri->segment(1))) { ?>
                                <li class="breadcrumbs__item"><a href="<?= base_url($this->uri->segment(1).'s'); ?>" class="breadcrumbs__element"><?php echo ucfirst($this->uri->segment(1)).'s' ?></a></li>
                            <?php } ?>
                            <?php if(!empty($this->uri->segment(2))) { ?>
                                <li class="breadcrumbs__item"><a href="<?= base_url('worksheets/'.$this->uri->segment(2)); ?>" class="breadcrumbs__element"><?php echo ucfirst($this->uri->segment(2)) ?></a></li>
                            <?php } ?>
                            <?php if(!empty($this->uri->segment(3))) { ?>
                                <li class="breadcrumbs__item"><a href="<?= base_url('worksheets/'.$this->uri->segment(2).'/'.$this->uri->segment(3)); ?>" class="breadcrumbs__element"><?php echo ucfirst($this->uri->segment(3)) ?></a></li>
                            <?php } ?>
                            <?php if(!empty($this->uri->segment(4))) { ?>
                                <li class="breadcrumbs__item"><a href="<?= base_url('worksheets/'.$this->uri->segment(2).'/'.$this->uri->segment(3).'/'.$this->uri->segment(4)); ?>" class="breadcrumbs__element"><?php echo ucfirst($this->uri->segment(4)) ?></a></li>
                            <?php } ?>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <style type="text/css">
            .overall-rating{font-size: 14px;margin-top: 5px;color: #8e8d8d;}
        </style>
        <div class="inner_page_content">
            <div class="container">
                <div class="subject_top_nav">
                    <div class="row">
                        <?php if(!empty($worksheets)){ ?>
                            <div class="col-lg-3 col-md-3">
                                <?php
                                $p_data=array();
                                $p_data['single']=true;
                                ?>
                                <?php $this->load->view('frontend/template_part/worksheet_sidebar',$p_data); ?>
                            </div>
                            <div class="col-lg-9 col-md-9">
                                <div class="row">
                                    <div class="col-lg-8 col-md-8">
                                        <h1 class="work_single_h1"><?php echo ucfirst($title); ?></h1>
                                    </div>
                                    <div class="col-lg-4 col-md-4">
                                        <div class="work_single_social_text">
                                            Share this worksheet
                                        </div>
                                        <div class="work_single_social_share">

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 col-md-6">
                                        <div class="work_single_image">
                                            <img src="<?=  $worksheets[0]->worksheet_img; ?>" alt="">
                                        </div>
                                        <div class="work_single_rating">
                                            Rate this item:
                                            <input name="rating" value="0" id="rating_star" type="hidden" postID="<?= $worksheets[0]->id; ?>" />
                                        </div>
                                        <div class="work_single_pages">
                                            pages: <?= $worksheets[0]->pdf_page_count; ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 col-md-6">
                                        <div class="work_single_right_content">
                                            <div class="work_single_main">
                                                <?=  $worksheets[0]->content; ?>
                                            </div>
                                            <?php
                                            $total_point=get_returnfield('worksheet_rating','worksheet_id',$worksheets[0]->id,'total_points');
                                            $rating_numbers=get_returnfield('worksheet_rating','worksheet_id',$worksheets[0]->id,'rating_number');
                                            if($total_point!=0 && $rating_numbers!=0){
                                                $percent= ($total_point/($rating_numbers*5))*100;
                                            } else{
                                                $percent= 0;
                                            }

                                            ?>
                                            <div class="star_rating_list">
                                                <span class="stars-container stars-10" style="--bubble-color: <?php echo $percent .'%' ?>;">★★★★★</span> (<?= $rating_numbers; ?> ratings)
                                            </div>
                                            <div class="work_single_download">
                                                <a class="work_single_download_btn" href="javascript:void(0)" onclick="worksheet_download('<?= $worksheets[0]->pdf_path ?>')"> Download <i class="fa fa-download" aria-hidden="true"></i></a>
                                                <a class="work_single_print_btn" href="javascript:void(0)"  onclick="worksheet_print('<?= $worksheets[0]->pdf_path ?>')"> Print <i class="fa fa-print" aria-hidden="true"></i></a>

                                            </div>
                                            <div class="work_single_download">

                                                <a class="work_single_favorite_btn" href="javascript:void(0)"  onclick="worksheet_favorite('<?= $worksheets[0]->id ?>')"><i class="fa fa-heart" aria-hidden="true"></i> Add to Favourites</a>
                                            </div>
                                            <div class="work_single_details">
                                                <table class="work_single_table">
                                                    <tr>
                                                        <th>Year Group</th>
                                                        <td><a href="<?= base_url('worksheets/'.$this->uri->segment(2).'/'.$this->uri->segment(3)); ?>"><?= get_returnfield('work_grades','id',$worksheets[0]->work_grade_id,'name'); ?></a></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Subject</th>
                                                        <td><a href="<?= base_url('worksheets/'.$this->uri->segment(2)); ?>"><?= get_returnfield('work_subjects','id',$worksheets[0]->work_subject_id,'name'); ?></a></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Category</th>
                                                        <td><a href="<?= base_url('worksheets/'.$this->uri->segment(2).'/'.$this->uri->segment(3).'/'.$this->uri->segment(4)); ?>"><?= get_returnfield('work_categories','id',$worksheets[0]->work_cat_id,'name'); ?></a></td>
                                                    </tr>
                                                </table>

                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="work_related_div">
                                    <h3>Related Worksheets</h3>
                                    <div class="bxslider_related" style="width: 100%">
                                        <?php foreach ($related_worksheets as $related_worksheet){ ?>
                                            <div>
                                                <div class="worksheet_box matchHeight1">
                                                    <a href="<?php echo base_url('frontend/worksheet/'.get_returnfield('work_subjects','id',$related_worksheet->work_subject_id,'slug').'/'.get_returnfield('work_grades','id',$related_worksheet->work_grade_id,'slug').'/'.get_returnfield('work_categories','id',$related_worksheet->work_cat_id,'slug').'/'.$related_worksheet->slug) ?>">

                                                        <div class="work_list_label">

                                                            <span class="badge badge-default"><?= $related_worksheet->label; ?></span>
                                                        </div>
                                                        <div class="work_img">
                                                            <img src="<?= $related_worksheet->worksheet_img; ?>" alt="">
                                                        </div>
                                                        <div class="work_name">
                                                            <?= word_limiter($related_worksheet->name,3); ?>
                                                        </div>
                                                        <?php
                                                        $total_point=get_returnfield('worksheet_rating','worksheet_id',$related_worksheet->id,'total_points');
                                                        $rating_numbers=get_returnfield('worksheet_rating','worksheet_id',$related_worksheet->id,'rating_number');
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
                                                                <?= ucfirst(get_returnfield('work_grades','id',$related_worksheet->work_grade_id,'name')) ?>
                                                                &nbsp;&nbsp;&nbsp;<?= ucfirst(get_returnfield('work_subjects','id',$related_worksheet->work_subject_id,'name')) ?>
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
<?php
$this->load->view('templates/footer');
?>

