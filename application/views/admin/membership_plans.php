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
					<h1 class="h2"><?= $title; ?></h1>
				</div>
				<table class="table">
					<thead>
					<tr>
						<th>Plan Name</th>
                        <th>Monthly Price</th>
						<th>Yearly Price</th>
						<th>Actions</th>
					</tr>
					</thead>
					<tbody>
					<?php
					if(!empty($memberships)) {
						foreach($memberships as $membership) {
							?>
                            <tr>
                                <td><?= $membership['name']; ?></td>
                                <td>£ <?= $membership['monthly_price']; ?></td>
                                <td>£ <?= $membership['yearly_price']; ?></td>
                                <td><a class="edit_link" href="<?= base_url('/admin/edit_membership'); ?>/?membership_id=<?= $membership['id']; ?>"><span data-feather="edit"></span> Edit</a></td>
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