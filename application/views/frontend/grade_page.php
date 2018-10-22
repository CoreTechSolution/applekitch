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

                    <?php $this->load->view('templates/grade_listing_part'); ?>

				</div>
			</div>
		</div>

	</div>

<?php
$this->load->view('templates/footer');
?>