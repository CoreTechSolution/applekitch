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
                                    <a class="btn btn-sm btn-secondary" href="<?= base_url('/admin/topics'); ?>">Topics</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php $this->load->view('admin/templates/error_v.php'); ?>
                <form method="post" action="<?php echo base_url('/admin/'.$method.'/'.$topics[0]->topic_id) ?>">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Type Name: </label>
                                <input required type="text" name="topic_name" class="form-control" value="<?php echo $topics[0]->topic_name; ?>"/>
                            </div>

                        </div>
                    </div>
                    <!--<div class="form-group">
						<div class="row">
							<div class="col-lg-12">
								<label>Country: </label>
								<select class="form-control" name="country">
									<option>----</option>
									<?php /*foreach($countries as $country) { */?>
										<option value="<?/*= $country['id']; */?>"><?/*= $country['name']; */?></option>
									<?php /*} */?>
								</select>
							</div>
						</div>
					</div>-->
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">

                                <input type="submit" name="save" class="btn btn-primary btn-primary-green" value="Update"/>

                            </div>
                        </div>
                    </div>
                </form>
            </main>
        </div>
    </div>
<?php
require_once 'templates/footer.php';
?>