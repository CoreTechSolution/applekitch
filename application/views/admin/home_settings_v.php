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
                <?php $settings=$this->admin_model->get_home_settings(array('slug'=>'section-1'),true); ?>
                <?php $serialize_settings=unserialize($settings->page_content); ?>
                <fieldset>
                    <h3>Section 1</h3>
                    <input type="hidden" name="id" value="<?php echo $settings->id; ?>">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="heading">Heading: </label>
                                <?php echo form_input(array('name'=>'heading','id'=>'heading','class'=>'form-control'),!empty($serialize_settings['heading'])? $serialize_settings['heading']:''); ?>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="secrete_key">SubHeading: </label>
                                <?php echo form_input(array('name'=>'subheading','id'=>'subheading','class'=>'form-control'),!empty($serialize_settings['subheading'])? $serialize_settings['subheading']:''); ?>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="content">Content: </label>
                                <?php echo form_textarea(array('name'=>'content','id'=>'content','class'=>'form-control'),!empty($serialize_settings['content'])? $serialize_settings['content']:''); ?>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="content_image">Image: </label>
                                <input type="file" name="content_image" id="content_image" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <?php if(!empty($serialize_settings['content_image'])){ ?>
                            <div class="admin_home_image_preview">
                                <img src="<?php echo $serialize_settings['content_image']; ?>" alt="">
                            </div>
                            <?php } ?>
                        </div>
                    </div>

                    <div class="form-group submit-div">
                        <button type="submit" name="section_1_submit" value="Update" class="btn btn-primary">Update</button>
                    </div>
                </fieldset>
                <?php echo form_close(); ?>

                <?php echo form_open_multipart(base_url($method), array('class'=>'form settings_form')); ?>
                <?php $settings=$this->admin_model->get_home_settings(array('slug'=>'section-2'),true); ?>
                <?php $serialize_settings=unserialize($settings->page_content); ?>
                <fieldset>
                    <h3>Section 2</h3>
                    <input type="hidden" name="id" value="<?php echo $settings->id; ?>">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="heading">Heading: </label>
                                <?php echo form_input(array('name'=>'heading','id'=>'heading','class'=>'form-control'),!empty($serialize_settings['heading'])? $serialize_settings['heading']:''); ?>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="content">Content: </label>
                                <?php echo form_textarea(array('name'=>'content','id'=>'content','class'=>'form-control'),!empty($serialize_settings['content'])? $serialize_settings['content']:''); ?>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="button_text">Button Text: </label>
                                <?php echo form_input(array('name'=>'button_text','id'=>'button_text','class'=>'form-control'),!empty($serialize_settings['button_text'])? $serialize_settings['button_text']:''); ?>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="button_link">Button Link: </label>
                                <?php echo form_input(array('name'=>'button_link','id'=>'button_link','class'=>'form-control'),!empty($serialize_settings['button_link'])? $serialize_settings['button_link']:''); ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group submit-div">
                        <button type="submit" name="section_2_submit" value="Update" class="btn btn-primary">Update</button>
                    </div>
                </fieldset>
                <?php echo form_close(); ?>

                <?php echo form_open_multipart(base_url($method), array('class'=>'form settings_form')); ?>
                <?php $settings=$this->admin_model->get_home_settings(array('slug'=>'section-3'),true); ?>
                <?php $serialize_settings=unserialize($settings->page_content); ?>
                <fieldset>
                    <h3>Section 3</h3>
                    <input type="hidden" name="id" value="<?php echo $settings->id; ?>">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="heading">Heading: </label>
                                <?php echo form_input(array('name'=>'heading','id'=>'heading','class'=>'form-control'),!empty($serialize_settings['heading'])? $serialize_settings['heading']:''); ?>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="secrete_key">SubHeading: </label>
                                <?php echo form_input(array('name'=>'subheading','id'=>'subheading','class'=>'form-control'),!empty($serialize_settings['subheading'])? $serialize_settings['subheading']:''); ?>
                            </div>
                        </div>

                    </div>

                    <div class="form-group submit-div">
                        <button type="submit" name="section_3_submit" value="Update" class="btn btn-primary">Update</button>
                    </div>
                </fieldset>
                <?php echo form_close(); ?>

                <?php echo form_open_multipart(base_url($method), array('class'=>'form settings_form')); ?>
                <?php $settings=$this->admin_model->get_home_settings(array('slug'=>'section-4'),true); ?>
                <?php $serialize_settings=unserialize($settings->page_content); ?>
                <fieldset>
                    <h3>Section 4</h3>
                    <input type="hidden" name="id" value="<?php echo $settings->id; ?>">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="heading">Heading: </label>
                                <?php echo form_input(array('name'=>'heading','id'=>'heading','class'=>'form-control'),!empty($serialize_settings['heading'])? $serialize_settings['heading']:''); ?>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="secrete_key">SubHeading: </label>
                                <?php echo form_input(array('name'=>'subheading','id'=>'subheading','class'=>'form-control'),!empty($serialize_settings['subheading'])? $serialize_settings['subheading']:''); ?>
                            </div>
                        </div>

                    </div>

                    <div class="form-group submit-div">
                        <button type="submit" name="section_4_submit" value="Update" class="btn btn-primary">Update</button>
                    </div>
                </fieldset>
                <?php echo form_close(); ?>

            </main>
        </div>
    </div>
<?php
require_once 'templates/footer.php';
?>