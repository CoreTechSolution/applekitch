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
						<th>Role Name</th>
						<th>Actions</th>
					</tr>
					</thead>
					<tbody>
					<?php
					if(!empty($roles)) {
						foreach($roles as $role) {
							?>
                            <tr>
                                <td><?= $role['name']; ?></td>
                                <td><a class="edit_link" href="<?= base_url('/admin/edit_role'); ?>/?role_id=<?= $role['id']; ?>"><span data-feather="edit"></span> Edit</a></td>
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