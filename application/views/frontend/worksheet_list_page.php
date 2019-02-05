<?php
$this->load->view('templates/header_worksheet');
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
                                <li class="breadcrumbs__item"><a href="<?= base_url($this->uri->segment(1)); ?>" class="breadcrumbs__element"><?php echo ucfirst($this->uri->segment(1)) ?></a></li>
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

        <div class="inner_page_content">
            <div class="container">
                <div class="subject_top_nav">
                    <div class="row">
                        <div class="col-lg-3 col-md-3">
                            <?php $this->load->view('frontend/template_part/worksheet_sidebar'); ?>
                        </div>
                        <div class="col-lg-9 col-md-9">
                            <div class="row">
                                <div class="col-lg-8 col-md-8">
                                    <h1 id="work_list_dynamic_title">All <?php echo ucfirst($title); ?></h1>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <div class="filter_sort">
                                        Sort by:
                                        <select name="filter_short" id="filter_short" onchange="search_id_genarate()">
                                            <option value="most_recent">Most recent</option>
                                            <option value="most_popular">Most popular</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="search_boardcumb" id="search_boardcumb">
                                <span>Filter: </span>
                                <ul id="search_boardcumb_ul">
                                </ul>
                            </div>

                            <div class="leading_worksheet">
                                <img src="<?= base_url('assets/images/leader_worksheet.gif'); ?>" alt="">
                            </div>

                            <div class="worksheet_list_main" id="worksheet_list_main">
                                <?php if(!empty($worksheets)){ ?>
                                    <div id="test-list">
                                        <ul class="list row">

                                            <?php foreach ($worksheets as $worksheet){ ?>
                                                <li class="col-lg-3 col-md-4">
                                                        <div class="worksheet_box matchHeight1">
                                                            <a href="<?php echo base_url('worksheet/'.get_returnfield('work_grades','id',$worksheet->work_grade_id,'slug').'/'.get_returnfield('work_subjects','id',$worksheet->work_subject_id,'slug').'/'.get_returnfield('work_categories','id',$worksheet->work_cat_id,'slug').'/'.$worksheet->slug) ?>">
                                                                <?php if($worksheet->label!='No Label'){ ?>
                                                                    <div class="work_list_label">

                                                                        <span class="badge badge-default"><?= $worksheet->label; ?></span>
                                                                    </div>
                                                                <?php } ?>

                                                                <div class="work_img">
                                                                    <img src="<?= $worksheet->worksheet_img; ?>" alt="">
                                                                </div>
                                                                <div class="work_name">
                                                                    <?= word_limiter($worksheet->name,3); ?>
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
                                                                    <div class="star_rating_list">
                                                                        <span class="stars-container stars-10" style="--bubble-color: <?php echo $percent .'%' ?>;">★★★★★</span>
                                                                    </div>
                                                                    <div class="details">
                                                                        <?= ucfirst(get_returnfield('work_grades','id',$worksheet->work_grade_id,'name')) ?>
                                                                        &nbsp;&nbsp;&nbsp;<?= ucfirst(get_returnfield('work_subjects','id',$worksheet->work_subject_id,'name')) ?>
                                                                    </div>
                                                                </div>

                                                            </a>
                                                        </div>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                        <div class="pagination_box">
                                           <!-- <ul class="prev_ul"><li class="prev">
                                                    <a href="#">Previous</a>
                                                </li></ul>-->
                                            <ul class="pagination"></ul>
                                            <ul class="prev_ul"><li class="next">
                                                    <a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>
                                                    </a>
                                                </li></ul>
                                        </div>

                                    </div>

                                <?php }  else{
                                    echo  '<h4>No data found!</h4>';
                                } ?>
                            </div>

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