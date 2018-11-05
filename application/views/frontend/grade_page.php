<?php
$this->load->view('templates/header');
?>
	<div class="wrapper inner-pages">
		<!--<div class="inner_page_banner">

		</div>-->
        <!--<div class="top_tap_sub">
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
		<div class="inner_page_content">
			<div class="container">
				<div class="row">
					<div class="subject_top_nav">
						<!--<ul>
							<li><a href="#"><span data-feather="edit"></span> Maths</a></li>
							<li><a href="#"><span data-feather="edit"></span> English</a></li>
						</ul>-->
					</div>

                    <?php $this->load->view('frontend/template_part/grade_listing_part'); ?>

				</div>
			</div>
		</div>

	</div>

<?php
$this->load->view('templates/footer');
?>