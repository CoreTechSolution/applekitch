<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'templates/header.php';
?>
	<div class="container-fluid">
		<div class="row">
			<nav class="col-md-2 d-none d-md-block bg-light sidebar">
				<?php require_once 'templates/profile_sidebar.php'; ?>
			</nav>

			<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6">
                                <h1 class="h2"><?= $title; ?></h1>
                            </div>
                            <div class="col-lg-6">
                                <div style="text-align: right;">
                                    <a class="btn btn-primary btn-primary-green" href="<?= base_url('/admin/add_grade'); ?>">Add New</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				<table class="table">
					<thead>
					<tr>
						<th>Image</th>
						<th>Grade Name</th>
						<th>Short Name</th>
						<th>Actions</th>
					</tr>
					</thead>
					<tbody>
					<?php
					if(!empty($grades)) {
						foreach($grades as $grade) {
							?>
							<tr>
								<td>
                                    <?php if(!empty($grade['img'])) { ?>
                                    <a class="fancybox" href="<?php echo $this->image_crop_gd->show_images($grade['img'], "full"); ?>"><img src="<?php echo $this->image_crop_gd->show_images($grade['img'], "xsmall"); ?>" /></a>
                                    <?php } ?>
                                </td>
								<td><?= $grade['name']; ?></td>
								<td><?= $grade['slug']; ?></td>
								<td><a class="edit_link" href="<?= base_url('/admin/edit_grade'); ?>/?grade_id=<?= $grade['id']; ?>"><span data-feather="edit"></span> Edit</a> | <a class="delete_link" onclick="delete_data(<?php echo $grade['id']; ?>,'id','grade');" href="javascript:void(0)"><span data-feather="delete"></span> Delete</a></td>
							</tr>
							<?php
						}
					}
					?>
					</tbody>
				</table>
			</main>
		</div>
	</div>
	<script>
        jQuery(function(){
            jQuery('.table').footable();
        });
	</script>
<?php
require_once 'templates/footer.php';
?>