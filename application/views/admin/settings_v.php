<?php
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
                                <!--<div style="text-align: right;">
                                    <a class="btn btn-sm btn-secondary" href="<?/*= base_url('/admin/certificates'); */?>">Certificates</a>
                                </div>-->
                            </div>
                        </div>
                    </div>
                </div>
                <?php $this->load->view('admin/templates/error_v.php'); ?>
                <?php echo form_open_multipart(base_url($method), array('class'=>'form settings_form')); ?>
                <fieldset>
                    <h3>Stripe Settings</h3>
                    <input type="hidden" name="settings_id" value="<?php echo $settings->settings_id; ?>">
                    <div class="form-group">
                        <label for="secrete_key">Secrete Key: </label>
                        <?php echo form_input(array('name'=>'secrete_key','id'=>'secrete_key','class'=>'form-control'),!empty($settings->secrete_key)? $settings->secrete_key:''); ?>
                    </div>
                    <div class="form-group">
                        <label for="publishable_key">Publishable Key: </label>
                        <?php echo form_input(array('name'=>'publishable_key','id'=>'publishable_key','class'=>'form-control'),!empty($settings->publishable_key)? $settings->publishable_key:''); ?>

                    </div>

                    <div class="form-group submit-div">
                        <button type="submit" name="stripe_submit" value="Update" class="btn btn-primary">Update</button>
                    </div>
                </fieldset>
                <?php echo form_close(); ?>
                <?php echo form_open_multipart(base_url($method), array('class'=>'form settings_form')); ?>
                <fieldset>
                    <h3>Paypal Settings</h3>
                    <input type="hidden" name="settings_id" value="<?php echo $settings->settings_id; ?>">
                    <div class="form-group">
                        <label for="secrete_key">Client ID: </label>
                        <?php echo form_input(array('name'=>'paypal_email','id'=>'paypal_email','class'=>'form-control'),!empty($settings->paypal_email)? $settings->paypal_email:''); ?>
                    </div>
                    <div class="form-group">
                        <label for="publishable_key">Mode: </label>
                        <?php echo form_dropdown('paypal_mode',array('sandbox'=>'Sandbox','production'=>'Production'),!empty($settings->publishable_key)? $settings->publishable_key:'',array('id'=>'paypal_mode','class'=>'form-control')); ?>

                    </div>
                    <div class="form-group submit-div">
                        <button type="submit" name="paypal_submit" value="Update" class="btn btn-primary">Update</button>
                    </div>
                </fieldset>
                <?php echo form_close(); ?>
                <?php echo form_open_multipart(base_url($method), array('class'=>'form settings_form')); ?>
                <fieldset>
                    <h3>Login with settings</h3>
                    <input type="hidden" name="settings_id" value="<?php echo $settings->settings_id; ?>">
                    <div class="form-group">
                        <label for="secrete_key">Facebook App ID: </label>
                        <?php echo form_input(array('name'=>'fb_app_id','id'=>'fb_app_id','class'=>'form-control'),!empty($settings->fb_app_id)? $settings->fb_app_id:''); ?>
                    </div>
                    <div class="form-group">
                        <label for="publishable_key">Google+ App ID: </label>
                        <?php echo form_dropdown('paypal_mode',array('sandbox'=>'Sandbox','production'=>'Production'),!empty($settings->publishable_key)? $settings->publishable_key:'',array('id'=>'paypal_mode','class'=>'form-control')); ?>

                    </div>
                    <div class="form-group submit-div">
                        <button type="submit" name="login_submit" value="Update" class="btn btn-primary">Update</button>
                    </div>
                </fieldset>
                <?php echo form_close(); ?>

                <?php /*echo form_open_multipart(base_url($method), array('class'=>'form settings_form')); */?><!--
                <fieldset>
                    <h3>General Settings</h3>
                    <input type="hidden" name="settings_id" value="<?php /*echo $settings->settings_id; */?>">
                    <div class="form-group">
                        <label for="admin_mail">Admin EMail: </label>
                        <?php /*echo form_input(array('name'=>'admin_mail','id'=>'admin_mail','class'=>'form-control'),!empty($settings->admin_mail)? $settings->admin_mail:''); */?>

                    </div>
                    <div class="form-group">
                        <label for="contact_mail">Contact EMail: </label>
                        <?php /*echo form_input(array('name'=>'contact_mail','id'=>'contact_mail','class'=>'form-control'),!empty($settings->contact_mail)? $settings->contact_mail:''); */?>

                    </div>

                    <div class="form-group submit-div">
                        <button type="submit" name="general_submit" value="Update" class="btn btn-primary">Update</button>
                    </div>
                </fieldset>
                --><?php /*echo form_close(); */?>
                <?php echo form_open_multipart(base_url($method), array('class'=>'form settings_form')); ?>
                <fieldset>
                    <h3>Sendgrid Settings</h3>
                    <input type="hidden" name="settings_id" value="<?php echo $settings->settings_id; ?>">
                    <div class="form-group">
                        <label for="admin_mail">Protocol: </label>
                        <?php echo form_input(array('name'=>'protocol','id'=>'protocol', 'class'=>'form-control'),!empty($settings->protocol)? $settings->protocol:''); ?>

                    </div>
                    <div class="form-group">
                        <label for="contact_mail">SMTP Host: </label>
                        <?php echo form_input(array('name'=>'smtp_host','id'=>'smtp_host','class'=>'form-control'),!empty($settings->smtp_host)? $settings->smtp_host:''); ?>

                    </div>
                    <div class="form-group">
                        <label for="contact_mail">SMTP Port: </label>
                        <?php echo form_input(array('name'=>'smtp_port','id'=>'smtp_port','class'=>'form-control'),!empty($settings->smtp_port)? $settings->smtp_port:''); ?>

                    </div>
                    <div class="form-group">
                        <label for="contact_mail">SMTP Crypto: </label>
                        <?php echo form_input(array('name'=>'smtp_crypto','id'=>'smtp_crypto','class'=>'form-control'),!empty($settings->smtp_crypto)? $settings->smtp_crypto:''); ?>

                    </div>
                    <div class="form-group">
                        <label for="contact_mail">SMTP User: </label>
                        <?php echo form_input(array('name'=>'smtp_user','id'=>'smtp_user','class'=>'form-control'),!empty($settings->smtp_user)? $settings->smtp_user:''); ?>

                    </div>
                    <div class="form-group">
                        <label for="contact_mail">SMTP Password: </label>
                        <?php echo form_password(array('name'=>'smtp_pass','id'=>'smtp_pass','class'=>'form-control'),!empty($settings->smtp_pass)? $settings->smtp_pass:''); ?>

                    </div>

                    <div class="form-group submit-div">
                        <button type="submit" name="smtp_setting" value="Update" class="btn btn-primary">Update</button>
                    </div>
                </fieldset>
                <?php echo form_close(); ?>

                <?php echo form_open_multipart(base_url($method), array('class'=>'form settings_form')); ?>
                <fieldset>
                    <h3>Social Media Settings</h3>
                    <input type="hidden" name="settings_id" value="<?php echo $settings->settings_id; ?>">
                    <?php if(!empty($settings->social_media)) { ?>
                        <?php $social_medias=json_decode($settings->social_media); ?>
                        <?php //print_r($social_medias); ?>
                    <?php } ?>
                    <div class="form-group">
                        <label for="facebook">Facebook Link: </label>
                        <?php echo form_input(array('name'=>'facebook','id'=>'facebook','class'=>'form-control'),!empty($social_medias->facebook)? $social_medias->facebook:''); ?>
                    </div>
                    <div class="form-group">
                        <label for="twitter">twitter Link: </label>
                        <?php echo form_input(array('name'=>'twitter','id'=>'twitter','class'=>'form-control'),!empty($social_medias->twitter)? $social_medias->twitter:''); ?>
                    </div>
                    <div class="form-group">
                        <label for="google_plus">Google+ Link: </label>
                        <?php echo form_input(array('name'=>'google_plus','id'=>'google_plus','class'=>'form-control'),!empty($social_medias->google_plus)? $social_medias->google_plus:''); ?>
                    </div>
                    <div class="form-group">
                        <label for="instragram">Instragram Link: </label>
                        <?php echo form_input(array('name'=>'instragram','id'=>'instragram','class'=>'form-control'),!empty($social_medias->instragram)? $social_medias->instragram:''); ?>
                    </div>
                    <div class="form-group">
                        <label for="youtube">Youtube Link: </label>
                        <?php echo form_input(array('name'=>'youtube','id'=>'youtube','class'=>'form-control'),!empty($social_medias->youtube)? $social_medias->youtube:''); ?>
                    </div>


                    <div class="form-group submit-div">
                        <button type="submit" name="social_submit" value="Update" class="btn btn-primary">Update</button>
                    </div>
                </fieldset>
                <?php echo form_close(); ?>
                <?php /*echo form_open_multipart(base_url($method), array('class'=>'form settings_form')); */?><!--
                <fieldset>
                    <h3>Social media login Settings</h3>
                    <input type="hidden" name="settings_id" value="<?php /*echo $settings->settings_id; */?>">
                    <div class="form-group">
                        <label for="secrete_key">Email: </label>
                        <?php /*echo form_input(array('name'=>'paypal_email','id'=>'paypal_email','class'=>'form-control'),!empty($settings->paypal_email)? $settings->paypal_email:''); */?>
                    </div>
                    <div class="form-group">
                        <label for="publishable_key">Mode: </label>
                        <?php /*echo form_dropdown('paypal_mode',array('test'=>'Test','live'=>'Live'),!empty($settings->publishable_key)? $settings->publishable_key:'',array('id'=>'paypal_mode','class'=>'form-control')); */?>

                    </div>
                    <div class="form-group submit-div">
                        <button type="submit" name="stripe_submit" value="Update" class="btn btn-primary">Update</button>
                    </div>
                </fieldset>
                --><?php /*echo form_close(); */?>
            </main>
        </div>
    </div>
<?php
require_once 'templates/footer.php';
?>