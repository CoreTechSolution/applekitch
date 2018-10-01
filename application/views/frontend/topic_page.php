<?php
$this->load->view('templates/header');
?>
    <script>
        jQuery(document).ready(function() {
            jQuery("div.bhoechie-tab-menu>div.list-group>a").click(function(e) {
                //e.preventDefault();
                jQuery(this).siblings('a.active').removeClass("active");
                jQuery(this).addClass("active");

                var tabid = jQuery(this).data('tabid');
//console.log('tabid: '+tabid);
                jQuery("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
                jQuery("div.bhoechie-tab>div.bhoechie-tab-content").each(function(){
                    var contentid = jQuery(this).data('contentid');
                    if(tabid == contentid){
                        console.log("contentid matched : ID = "+contentid);
                        jQuery(this).addClass("active");
                    }
                });

                var index = jQuery(this).index();
                jQuery("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
                jQuery("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
            });

            var grade_id = <?php echo $grade_id; ?>;
            jQuery("div.bhoechie-tab-menu>div.list-group>a").removeClass("active");
            jQuery("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
            jQuery("div.bhoechie-tab-menu>div.list-group>a").each(function(){
                var tabid = jQuery(this).data('tabid');
//console.log('grade_id: '+grade_id+' tabid: '+tabid);
                if(grade_id == tabid){
                    var index = jQuery(this).index();
//console.log(index);
                    jQuery("div.bhoechie-tab-menu>div.list-group>a").eq(index).addClass("active");
                    jQuery("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
                    jQuery("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
                }
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
					<?php //print_r($topics); ?>
					<?php if(!empty($cate_arrays)){ ?>
                        <div class="topic_list">
                            <div class="row">
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 bhoechie-tab-menu">
                                    <div class="list-group">
                                        <?php
                                        $subject_slug=$this->uri->segment(4);
                                            if(!empty($grades_lists)){
                                                foreach ($grades_lists as $grades_list){ ?>
                                                    <a href="<?php echo base_url('frontend/topic/'.$grades_list->slug.'/'.$subject_slug) ?>" class="list-group-item text-center" data-tabid="<?php echo $grades_list->id; ?>" ><?php echo $grades_list->name; ?></a>

                                        <?php   }
                                            }
                                        ?>

                                    </div>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 bhoechie-tab">

                                    <?php foreach ($cate_arrays as $cate_array1=>$values1){ // get grade_ids ?>
                                        <?php $grades = array_keys($cate_arrays); ?>
                                        <div class="bhoechie-tab-content" data-contentid="<?php echo $cate_array1; ?>">
                                            <div class="row">
                                                <?php foreach ($values1 as $cate_array=>$values){ // Get Categories ?>
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

                                    <?php } ?>
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