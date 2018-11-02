<?php
require_once 'templates/header.php';
?>
	<div class="inner-pages backend">
		<div class="container">
			<div class="row">
				<div class="col-lg-3">
					<?php require_once 'templates/profile_sidebar.php'; ?>
                    <?php $colorcode = explode('|',COLORCODE); ?>
				</div>
				<div class="col-lg-9">
					<div class="contentSection">
						<div class="dashboard-section">
							<div class="box-wrapper">
								<div class="box-title"><?php echo $title; ?></div>
								<div class="box-container">
                                    <!--<table class="table">
                                        <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
/*                                        if(!empty($certificates)) {
                                        foreach($certificates as $certificate) {
                                            $name = get_returnfield('certificates','id',$certificate->id,'name');
                                            if(empty($name)) {
                                                $name = 'Certificate';
                                            }
                                            */?>
                                            <tr>
                                                <td><?php /*echo $name; */?></td>
                                                <td>
                                                    <a href="<?php /*echo base_url('dashboard/generate_pdf/'.$certificate->id); */?>">View Certificate</a>
                                                </td>
                                            </tr>
                                            <?php
/*                                        }
                                        }
                                        */?>
                                        </tbody>
                                    </table>-->
                                    <?php if(!empty($certificates)) { ?>
	                                    <?php $rand=0; ?>
                                        <?php foreach($certificates as $certificate) { ?>
                                            <?php $name = get_returnfield('certificates','id',$certificate->id,'name'); ?>
                                            <?php if(!empty($name)) { ?>
                                            <?php
                                                if($rand>=11) {
                                                    $rand=0;
                                                }

                                            ?>
                                            <div class="certificate_wrapper">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="certificate_icon" style="border-color: <?= $colorcode[$rand] ?>; color: <?= $colorcode[$rand] ?>;">
                                                            <i class="fas fa-book-open"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="certificate_content">
                                                            <?php $create_dt = get_returnfield('certificates','id',$certificate->id,'create_dt'); ?>
                                                            <span class="certficate_date"><?php echo date('j F Y', strtotime($create_dt)); ?></span>
                                                            <h2><?php echo $name; ?></h2>
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <a style="background-color: <?= $colorcode[$rand] ?>;" href="<?php echo
                                                                    base_url('dashboard/generate_pdf/'.$certificate->id); ?>" class="custom_button">View Certificate</a>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="cerfificate_share">
                                                                        <span>Share Result:</span>
                                                                        <ul>
                                                                            <li><a target="_blank" href="#"><i class="fab fa-facebook-f"></i></a></li>
                                                                            <li><a target="_blank" href="#"><i class="fab fa-twitter"></i></a></li>
                                                                            <li><a target="_blank" href="#"><i class="fab fa-instagram"></i></a></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php $rand++; ?>
                                            <?php } ?>
                                        <?php } ?>
                                    <?php } ?>
								</div>
							</div>
						</div>
					</div>
                    <!--Certificate design-->

                    <!--end here-->

				</div>
			</div>
		</div>
	</div>
<?php
require_once 'templates/footer.php';
?>