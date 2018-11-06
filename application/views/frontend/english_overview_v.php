<?php
$this->load->view('templates/header');
?>
    <div class="wrapper inner-pages">
        <div class="breadcrumbs_section">
            <div class="container">
                <div class="row">
                    <ul class="breadcrumbs">
                        <?php //print_r($this->uri->segment(3)); ?>
                        <li class="breadcrumbs__item"><a href="<?= base_url(); ?>" class="breadcrumbs__element">Home</a></li>
                        <!--<li class="breadcrumbs__item"><a href="<?/*= base_url('frontend/grades/'); */?>" class="breadcrumbs__element">Grade</a></li>
                        <li class="breadcrumbs__item breadcrumbs__item_active"><span class="breadcrumbs__element">Topic</span></li>-->
                    </ul>
                </div>
            </div>
        </div>
        <?php if(!empty($topics)){

            $cate_arrays=array(); $category='';
            //print_r($topics);  exit();
            foreach ($topics as $topic){
                //print_r($topic); exit();
                $grade_key = $topic->grade_id;
                $topic_key = $topic->topic_id;
                //$cate_key = $topic->category_id;

                if(array_key_exists($grade_key, $cate_arrays)){
                    array_push($cate_arrays[$grade_key], $topic_key);
                } else {
                    //$cate_arrays[$grade_key] = array();
                    $cate_arrays[$grade_key]= array();
                    array_push($cate_arrays[$grade_key], $topic_key);
                }
            }
            ksort($cate_arrays);
            //print_r($cate_arrays); exit();
        } ?>
        <div class="inner_page_content">
            <div class="container">
                <div class="subject_top_nav">
                    <div class="row">
                        <div class="col-lg-2">
                            <?php $this->load->view('frontend/template_part/grade_dropdown_sub_v'); ?>
                        </div>
                        <div class="col-lg-10">
                            <h1><?php echo ucfirst($title); ?></h1>
                        </div>
                    </div>
                </div>

                <?php
                $colorcode=explode('|',COLORCODE);
                // print_r($colorcode);
                ?>
                <?php //print_r($topics); ?>
                <?php if(!empty($cate_arrays)){ ?>
                    <div class="topic_list">
                        <div class="bhoechie-tab">
                            <?php if(!empty($cate_arrays)) { ?>
                                <div class="bhoechie-tab-content active" data-wow-delay="1s">
                                    <?php $cat_count=1; ?>
                                    <?php $rand=0; ?>
                                    <div class="row">
                                        <?php foreach ($cate_arrays as $cate_array=>$values){ // Get grades ?>
                                            <?php $grades = array_keys($cate_arrays); ?>
                                            <div class="col-lg-4 main_cat_box matchHeight1">
                                                <?php
                                                if($rand>=11){
                                                    $rand=0;
                                                }
                                                ?>

                                                <div class="category_box" style="border-top: 6px solid <?= $colorcode[$rand] ?>">
                                                    <?php
                                                    /*$cat_image=get_returnfield('category','id',$cate_array,'cat_img');*/
                                                    $grade_slug=get_returnfield('grade','id',$cate_array,'slug');
                                                    $grade_name=get_returnfield('grade','id',$cate_array,'name'); ?>

                                                    <div class="cat_lis"><!--<span class="cat_img"><i class="fas fa-question-circle"></i></span>--><h4 class="listing_category" style="color:<?= $colorcode[$rand]; ?>;"><?php echo ucfirst($grade_name); ?></h4></div>

                                                    <?php echo ''; ?>
                                                    <ul>
                                                        <?php $topic_count=1; ?>
                                                        <?php foreach ($values as $cate_arra){ ?>
                                                            <?php  $sufix=''; ?>
                                                            <?php ///print_r($completed_topics); ?>
                                                            <?php if(!empty($completed_topics)){

                                                                foreach ($completed_topics as $completed_topic){
                                                                    if($cate_arra==$completed_topic->topic_id){
                                                                        $sufix='<span class="front_check"><i class="fas fa-check-square"></i></span>';
                                                                        break;
                                                                    } else{
                                                                        $sufix='<span class="front_check"><i class="far fa-square"></i></span>';
                                                                    }
                                                                }
                                                            } else{
                                                                if(empty($sufix) || $sufix=='')
                                                                    $sufix='<span class="front_check"><i class="far fa-square"></i></span>';
                                                            }
                                                            ?>

                                                            <li>
                                                                <?php echo $sufix; ?>
                                                                <span class="topic_count"><?= $cat_count.'.'.$topic_count; ?></span>
                                                                <a href="<?php echo base_url('exercise/'.$subject.'/'.$grade_slug.'/'.get_returnfield('topics','topic_id',$cate_arra,'slug')) ?>">
                                                                    <span data-feather="edit"></span> <?php echo get_returnfield('topics','topic_id',$cate_arra,'topic_name'); ?>
                                                                </a>

                                                            </li>
                                                            <?php $topic_count++; ?>
                                                        <?php } ?>
                                                    </ul>
                                                </div>
                                            </div>
                                            <?php $cat_count++; ?>
                                            <?php $rand++; ?>
                                        <?php } ?>
                                    </div>
                                </div>

                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
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