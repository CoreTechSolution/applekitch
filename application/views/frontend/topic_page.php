<?php
$this->load->view('templates/header');
?>
    <div class="wrapper inner-pages">
        <!--<div class="inner_page_banner">
            <div class="container">
                <div class="row">
                    <h1>Learning <?php /*echo $banner_title; */?></h1>
                </div>
            </div>

        </div>-->
       <!-- <div class="top_tap_sub">
            <div class="container">
                <div class="row">
                    <ul>
                        <li><a href="<?php /*echo base_url('frontend/topic/reception/math') */?>">Math</a></li>
                        <li><a href="<?php /*echo base_url('frontend/topic/reception/english') */?>">English</a></li>
                        <?php /*if(loginCheck()==true){ */?>
                            <li><a href="<?php /*echo base_url('awards'); */?>">Awards</a></li>
                            <li><a href="<?php /*echo base_url('certificates'); */?>">Certificates</a></li>
                        <?php /*} */?>

                    </ul>
                </div>
            </div>
        </div>-->
        <div class="breadcrumbs_section">
            <div class="container">
                <div class="row">
                    <ul class="breadcrumbs">
                        <?php //print_r($this->uri->segment(3)); ?>
                        <li class="breadcrumbs__item"><a href="<?= base_url(); ?>" class="breadcrumbs__element">Home</a></li>
                        <li class="breadcrumbs__item"><a href="<?= base_url('frontend/grades/'); ?>" class="breadcrumbs__element">Grade</a></li>
                        <li class="breadcrumbs__item breadcrumbs__item_active"><span class="breadcrumbs__element">Topic</span></li>
                    </ul>
                </div>
            </div>
        </div>
        <?php if(!empty($topics)){

            $cate_arrays=array(); $category='';
            foreach ($topics as $topic){
                //print_r($topic); exit();
                $grade_key = $topic->grade_id;
                $topic_key = $topic->topic_id;
                $cate_key = $topic->category_id;

                if(array_key_exists($grade_key, $cate_arrays)){
                    if(array_key_exists($cate_key,$cate_arrays[$grade_key])){
                        array_push($cate_arrays[$grade_key][$cate_key], $topic_key);
                    } else{
                        $cate_arrays[$grade_key][$cate_key] = array();
                        array_push($cate_arrays[$grade_key][$cate_key], $topic_key);
                    }

                } else {
                    //$cate_arrays[$grade_key] = array();
                    $cate_arrays[$grade_key][$cate_key] = array();
                    array_push($cate_arrays[$grade_key][$cate_key], $topic_key);
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
                                <ul class="nav navbar-nav">
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo get_returnfield('grade','slug',$grade,'name'); ?></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <?php
                                            $subject_slug=$subject;
                                            if(!empty($grades_lists)){
                                                foreach ($grades_lists as $grades_list){ ?>
                                                    <a href="<?php echo base_url('frontend/topic/'.$grades_list->slug.'/'.$subject_slug)
                                                    ?>" class="list-group-item text-center<?php if($grades_list->slug == $grade) { echo ' active'; } ?>"
                                                       data-tabid="<?php
                                                       echo $grades_list->id; ?>" ><?php echo $grades_list->name; ?></a>
                                                    <?php
                                                    if($grades_list->slug == $grade) {
                                                        $active_grade_id = $grades_list->id;
                                                    }
                                                    ?>

                                                <?php   }
                                            }
                                            ?>
                                        </ul>
                                    </li>
                                </ul>
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

                                    <?php foreach ($cate_arrays as $cate_array1=>$values1){ // get grade_ids ?>
                                        <?php if($active_grade_id == $cate_array1) { ?>
                                            <?php $grades = array_keys($cate_arrays); ?>
                                            <div class="bhoechie-tab-content active" data-wow-delay="1s" data-contentid="<?php
                                            echo $cate_array1; ?>">
                                                <?php $cat_count=1; ?>
                                                <?php $rand=0; ?>
                                                <div class="row">
                                                    <?php foreach ($values1 as $cate_array=>$values){ // Get Categories ?>
                                                        <div class="col-lg-4 matchHeight1">
                                                            <?php
                                                            if($rand>=11){
                                                                $rand=0;
                                                            }
                                                            ?>

                                                            <div class="category_box" style="border-top: 3px solid <?= $colorcode[$rand] ?>">
                                                                <?php
                                                                $cat_image=get_returnfield('category','id',$cate_array,'cat_img');
                                                                $cat_name=get_returnfield('category','id',$cate_array,'name');
                                                                ?>
                                                                <?php if($cat_image!=''){ ?>
                                                                    <div class="cat_lis"><!--<span class="cat_img"><img src="<?php /*echo $cat_image ; */?>" alt=""></span>--><h4 class="listing_category" style="color:<?= $colorcode[$rand]; ?>;"><?php echo ucfirst($cat_name); ?></h4></div>
                                                                <?php } else{ ?>
                                                                    <div class="cat_lis"><!--<span class="cat_img"><i class="fas fa-question-circle"></i></span>--><h4 class="listing_category" style="color:<?= $colorcode[$rand]; ?>;"><?php echo ucfirst($cat_name); ?></h4></div>
                                                                <?php } ?>
                                                                <?php echo ''; ?>
                                                                <ul>
                                                                    <?php $topic_count=1; ?>
                                                                    <?php foreach ($values as $cate_arra){ ?>
                                                                        <?php  $sufix=''; ?>
                                                                        <?php ///print_r($completed_topics); ?>
                                                                        <?php if(!empty($completed_topics)){

                                                                            foreach ($completed_topics as $completed_topic){
                                                                                if($cate_arra==$completed_topic->topic_id){
                                                                                    $sufix='<span class="front_check"><i class="far fa-check-square"></i></span>';
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
                                                                            <a href="<?php echo base_url('frontend/questions/'.$grade.'/'.$subject.'/'.$cate_arra) ?>">
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

                                    <?php } ?>
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