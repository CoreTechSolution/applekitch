<?php
$this->load->view('templates/header');
?>
<script>
    jQuery(document).ready(function() {
        jQuery("div.bhoechie-tab-menu>div.list-group>a").click(function(e) {
            e.preventDefault();
            jQuery(this).siblings('a.active').removeClass("active");
            jQuery(this).addClass("active");
            var index = jQuery(this).index();
            jQuery("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
            jQuery("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
        });
    });
</script>
    <div class="wrapper inner-pages">
        <div class="inner_page_banner">
            <div class="container">
                <div class="row">
                    <h1>Learning <?php echo $banner_title; ?></h1>
                </div>
            </div>

        </div>
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
        <div class="inner_page_content">
            <div class="container">
                <div class="row">
                    <div class="subject_top_nav">
                        <!--<ul>
							<li><a href="#"><span data-feather="edit"></span> Maths</a></li>
							<li><a href="#"><span data-feather="edit"></span> English</a></li>
						</ul>-->
                    </div>

                    <h1><?php echo $title; ?></h1>
					<?php if(!empty($topics)){
						$cate_arrays=array(); $category='';
						foreach ($topics as $topic){
							$topic_key = $topic->topic_id;
							$topic_value = $topic->category_id;
							if(array_key_exists($topic_value, $cate_arrays)){
								array_push($cate_arrays[$topic_value], $topic_key);
							} else {
								$cate_arrays[$topic_value] = array();
								array_push($cate_arrays[$topic_value], $topic_key);
							}
						}
						//print_r($cate_array);
					} ?>
					<?php //print_r($topics); ?>
					<?php if(!empty($topics)){ ?>
                        <div class="topic_list">
                            <div class="row">
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 bhoechie-tab-menu">
                                    <div class="list-group">
                                        <a href="#" class="list-group-item active text-center">Reception</a>
                                        <a href="#" class="list-group-item text-center">Year 1</a>
                                        <a href="#" class="list-group-item text-center">Year 2</a>
                                        <a href="#" class="list-group-item text-center">Year 3</a>
                                        <a href="#" class="list-group-item text-center">Year 4</a>
                                        <a href="#" class="list-group-item text-center">Year 5</a>
                                        <a href="#" class="list-group-item text-center">Year 6</a>
                                        <a href="#" class="list-group-item text-center">Year 7</a>
                                        <a href="#" class="list-group-item text-center">Year 8</a>
                                        <a href="#" class="list-group-item text-center">Year 9</a>
                                        <a href="#" class="list-group-item text-center">Year 10</a>
                                        <a href="#" class="list-group-item text-center">Year 11</a>
                                    </div>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 bhoechie-tab">
                                    <div class="bhoechie-tab-content active">
                                        <div class="row">
		                                    <?php foreach ($cate_arrays as $cate_array=>$values){ ?>
                                                <div class="col-lg-4">
				                                    <?php echo '<h4 class="listing_category">'.ucfirst(get_returnfield('category','id',$cate_array,'name')).'</h4>'; ?>
                                                    <ul>
					                                    <?php foreach ($values as $cate_arra){ ?>
                                                            <li>
                                                                <a href="<?php echo base_url('frontend/questions/'.$grade.'/'.$subject.'/'.$cate_arra) ?>">
                                                                    <span data-feather="edit"></span> <?php echo get_returnfield('topics','topic_id',$cate_arra,'topic_name'); ?>
                                                                </a>
                                                            </li>
					                                    <?php } ?>
                                                    </ul>
                                                </div>
		                                    <?php } ?>
                                        </div>
                                    </div>
                                    <div class="bhoechie-tab-content">
                                        <h4 class="listing_category">Coming Soon</h4>
                                    </div>
                                    <div class="bhoechie-tab-content">
                                        <h4 class="listing_category">Coming Soon</h4>
                                    </div>
                                    <div class="bhoechie-tab-content">
                                        <h4 class="listing_category">Coming Soon</h4>
                                    </div>
                                    <div class="bhoechie-tab-content">
                                        <h4 class="listing_category">Coming Soon</h4>
                                    </div>
                                    <div class="bhoechie-tab-content">
                                        <h4 class="listing_category">Coming Soon</h4>
                                    </div>
                                    <div class="bhoechie-tab-content">
                                        <h4 class="listing_category">Coming Soon</h4>
                                    </div>
                                    <div class="bhoechie-tab-content">
                                        <h4 class="listing_category">Coming Soon</h4>
                                    </div>
                                    <div class="bhoechie-tab-content">
                                        <h4 class="listing_category">Coming Soon</h4>
                                    </div>
                                    <div class="bhoechie-tab-content">
                                        <h4 class="listing_category">Coming Soon</h4>
                                    </div>
                                    <div class="bhoechie-tab-content">
                                        <h4 class="listing_category">Coming Soon</h4>
                                    </div>
                                    <div class="bhoechie-tab-content">
                                        <h4 class="listing_category">Coming Soon</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="display: none;">
                                <div class="col-lg-2">
                                    <div class="grade_side_list ok">
                                        <ul>
                                            <li><a class="grade_ci_1" href="">Reception</a></li>
                                            <li><a class="grade_ci_2" href="#">Year 1</a></li>
                                            <li><a class="grade_ci_3" href="#">Year 2</a></li>
                                            <li><a class="grade_ci_4" href="#">Year 3</a></li>
                                            <li><a class="grade_ci_5" href="#">Year 4</a></li>
                                            <li><a class="grade_ci_6" href="#">Year 5</a></li>
                                            <li><a class="grade_ci_7" href="#">Year 6</a></li>
                                            <li><a class="grade_ci_8" href="#">Year 7</a></li>
                                            <li><a class="grade_ci_9" href="#">Year 8</a></li>
                                            <li><a class="grade_ci_10" href="#">Year 9</a></li>
                                            <li><a class="grade_ci_11" href="#">Year 10</a></li>
                                            <li><a class="grade_ci_12" href="#">Year 11</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-10">
                                    <div class="row">
                                    <?php foreach ($cate_arrays as $cate_array=>$values){ ?>
                                        <div class="col-lg-4">
                                            <?php echo '<h4 class="listing_category">'.ucfirst(get_returnfield('category','id',$cate_array,'name')).'</h4>'; ?>
                                            <ul>
                                                <?php foreach ($values as $cate_arra){ ?>
                                                    <li>
                                                        <a href="<?php echo base_url('frontend/questions/'.$grade.'/'.$subject.'/'.$cate_arra) ?>">
                                                            <span data-feather="edit"></span> <?php echo get_returnfield('topics','topic_id',$cate_arra,'topic_name'); ?>
                                                        </a>
                                                    </li>
                                                <?php } ?>
                                            </ul>
                                        </div>
                                    <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
					<?php } ?>
                </div>
            </div>
        </div>
    </div>
<?php
$this->load->view('templates/footer');
?>