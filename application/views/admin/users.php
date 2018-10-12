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
				<table class="table" data-paging="true" data-sorting="true" data-filtering="true" data-paging-size="20">
					<thead>
						<tr>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Email Address</th>
                            <!--<th>Phone Number</th>-->
                            <th>Role</th>
							<th>Activation Status</th>
						</tr>
					</thead>
					<tbody>
                        <?php
                            if(!empty($users)) {
                                foreach($users as $user) {
                                    ?>
                                    <tr>
                                        <td><?= $user['fname']; ?></td>
                                        <td><?= $user['lname']; ?></td>
                                        <td><?= $user['email_address']; ?></td>
                                        <!--<td><?/*= $user['phone']; */?></td>-->
                                        <td>
                                            <?php
                                                if(!empty($roles)) {
                                                    foreach ($roles as $role) {
                                                        if($role['id'] == $user['role']) {
                                                            echo $role['name'];
                                                        }
                                                    }
                                                }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            if($user['activation'] == 1) {
                                                echo '<span style="color: green;">Active</span>';
                                            } else {
                                                echo '<span style="color: red;">Not Active</span>';
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                        ?>
					</tbody>
                    <tfoot>
                    <tr>
                        <td colspan="5">
                            <div class="pagination"></div>
                        </td>
                    </tr>
                    </tfoot>
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