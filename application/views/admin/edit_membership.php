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
				<form method="post" action="<?= base_url('/admin/save_membership') ?>">
					<input type="hidden" name="membership_id" value="<?= $membership['id']; ?>"/>
					<div class="form-group">
						<div class="row">
							<div class="col-md-12">
								<label>Name: </label>
								<input type="text" name="name" class="form-control" value="<?= $membership['name']; ?>"/>
							</div>
						</div>
                    </div>
                    <div class="form-group">
						<div class="row">
							<div class="col-md-6">
								<label>Monthly Price: </label>
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text">£</span>
									</div>
									<input type="text" onkeypress="return event.charCode >= 48 &amp;&amp; event.charCode <= 57" class="form-control" name="monthly_price" value="<?= $membership['monthly_price']; ?>">
									<div class="input-group-append">
										<span class="input-group-text">.00</span>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<label>Yearly Price: </label>
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text">£</span>
									</div>
									<input type="text" onkeypress="return event.charCode >= 48 &amp;&amp; event.charCode <= 57" class="form-control" name="yearly_price" value="<?= $membership['yearly_price']; ?>">
									<div class="input-group-append">
										<span class="input-group-text">.00</span>
									</div>
								</div>
							</div>
						</div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-4">
                                <label for="limitq">Limit question</label>
                            </div>
                            <div class="col-lg-2">
                                <input id="limitq" name="limitq"<?php if(!empty($membership['limitq'])) { echo ' checked'; } ?> type="checkbox"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group limit"<?php if(empty($membership['limitq'])) { ?> style="display: none;"<?php } ?>>
                        <div class="row">
                            <div class="col-lg-4">
                                <label for="limit">Limit</label>
                            </div>
                            <div class="col-lg-6">
                                <div class="input-group mb-3">
                                    <input id="limit" name="limit" type="number" value="<?php echo $membership['limitq']; ?>" class="form-control"/>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Questions</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
						<div class="row">
							<div class="col-md-12">
								<div style="text-align: right;">
									<input type="submit" name="save" class="btn btn-primary btn-primary-green" value="Save"/>
								</div>
							</div>
						</div>
					</div>
				</form>
			</main>
		</div>
	</div>
    <script>
        jQuery('#limitq').on('click', function(){
            if(this.checked) {
                jQuery('.limit').show();
            } else {
                jQuery('.limit').hide();
            }
        });
    </script>
<?php
require_once 'templates/footer.php';
?>