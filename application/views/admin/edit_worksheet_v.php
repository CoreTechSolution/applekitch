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
                <?php $this->load->view('admin/templates/error_v.php'); ?>
                <?php //print_r($edit_data); ?>
                <form method="post" action="<?= base_url('admin/'.$method.'/'.$edit_data->id) ?>" enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6 col-lg-6 col-6">
                                <label>Name: </label>
                                <input required type="text" name="name" id="name_worksheet" class="form-control" value="<?= (!empty($edit_data->name))?$edit_data->name:'' ?>"/>
                            </div>
                            <div class="col-md-6">
                                <label>Slug: </label>
                                <input required type="text" name="slug" id="slug" class="form-control" value="<?= (!empty($edit_data->slug))?$edit_data->slug:'' ?>" readonly/>
                            </div>
                            <div class="col-lg-6 col-md-6 col-6">
                                <label>Subject: </label>
                                <?php
                                echo form_dropdown('work_subject_id', form_dropdown_cr(array('id','name'),'work_subjects'), (!empty($edit_data->work_subject_id))?$edit_data->work_subject_id:'' ,array('class'=>'form-control','id'=>'work_subject_id'));
                                ?>

                            </div>
                            <div class="col-lg-6 col-md-6 col-6">
                                <label>Grade: </label>
                                <?php
                                echo form_dropdown('work_grade_id', form_dropdown_cr(array('id','name'),'work_grades'), (!empty($edit_data->work_grade_id))?$edit_data->work_grade_id:'' ,array('class'=>'form-control','id'=>'work_grade_id'));
                                ?>
                            </div>
                            <div class="col-lg-6 col-md-6 col-6">
                                <label>Category: </label>
                                <?php
                                echo form_dropdown('work_cat_id', form_dropdown_cr(array('id','name'),'work_categories'), (!empty($edit_data->work_cat_id))?$edit_data->work_cat_id:'' ,array('class'=>'form-control','id'=>'work_cat_id'));
                                ?>
                            </div>
                            <div class="col-lg-6 col-md-6 col-6">
                                <label>Topic: </label>
                                <?php
                                echo form_dropdown('work_topic_id', form_dropdown_cr(array('id','name'),'work_topics'), (!empty($edit_data->work_topic_id))?$edit_data->work_topic_id:'',array('class'=>'form-control','id'=>'work_topic_id'));
                                ?>
                            </div>
                            <!-- <div class="col-lg-6 col-md-6 col-6">
                                <label>Featured Image: </label>
                                <input type="file" name="worksheet_img" class="form-control" />
                            </div> -->
                            <div class="col-lg-6 col-md-6 col-6">
                                <label>PDF File: </label>
                                <input type="file" name="pdf_path" class="form-control" />

                                <br>
                                <img src="<?= (!empty($edit_data->worksheet_img))?$edit_data->worksheet_img:'' ?>" alt="" class="admin_edit_img_preview">
                            </div>

                            <div class="col-lg-4 col-md-4 col-6">
                                <label>Label: </label>
                                <?php echo form_dropdown('label',array('No Label'=>'No Label','New'=>'New','Premium'=>'Premium','Free'=>'Free'),(!empty($edit_data->label))?$edit_data->label:'',array('class'=>'form-control','id'=>'work_label_select')); ?>

                            </div>
                            <?php $display=($edit_data->label=='New')?'style="display:block;"':'style="display:none;"';  ?>
                            <div class="col-lg-2 col-md-2 col-6" id="work_new_days_limit" <?= $display; ?>>
                                <?php //if($edit_data->label=='New'){ ?>
                                    <label>Days: </label>
                                    <br><input type="number" min="0" name="new_days_limit" value="<?= (!empty($edit_data->new_days_limit))?$edit_data->new_days_limit:'' ?>">
                                <?php //} ?>

                            </div>
                            <div class="col-lg-6 col-md-6 col-6">
                                <h3>Rating</h3>
                                <input name="rating" value="0" id="rating_star" type="hidden" postID="1" />

                            </div>

                            <div class="col-md-12">
                                <label>Content: </label>
                                <textarea name="content" class="form-control" ><?= (!empty($edit_data->content))?$edit_data->content:'' ?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <div style="text-align: right;">
                                    <input type="submit" name="save" class="btn btn-primary btn-primary-green" value="Update"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
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