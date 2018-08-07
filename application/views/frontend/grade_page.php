<?php
$this->load->view('templates/header');
?>
	<div class="wrapper inner-pages">
		<div class="inner_page_banner">

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
                    <?php //print_r($topics); ?>
                    <?php if(!empty($topics)){ ?>
                        <div class="topic_list">
                            <ul>
                                <?php foreach ($topics as $topic){ ?>
                                    <li>
                                        <a href="<?php echo base_url('frontend/topic/'.$grade.'/'.$subject.'/'.$topic->topic_id) ?>">
                                            <span data-feather="edit"></span> <?php echo get_returnfield('topics','topic_id',$topic->topic_id,'topic_name'); ?>
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

<?php
$this->load->view('templates/footer');
?>