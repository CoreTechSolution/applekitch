<?php
require_once 'templates/header.php';
?>
    <div class="inner-pages backend">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <?php require_once 'templates/profile_sidebar.php'; ?>
                </div>
                <div class="col-lg-9">
                    <div class="contentSection">
                        <div class="dashboard-section">
                            <div class="box-wrapper">
                                <div class="box-title"><?= $title; ?></div>
                                <div class="box-container">
                                    <?php $this->load->view('templates/error_v.php'); ?>
                                    <form method="post" action="<?php echo base_url('/dashboard/'.$method) ?>">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label>Message: </label>
                                                    <textarea required name="message" class="form-control tinymce">Hello Friends,

Please Check this site : {{url}}</textarea>
                                                </div>
                                                <div class="col-md-12">
                                                    <label>Email: </label>
                                                    <input required type="email" name="email" class="form-control" />
                                                </div>

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <input type="submit" name="send" class="btn btn-primary btn-primary-green" value="Share"/>

                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
require_once 'templates/footer.php';
?>