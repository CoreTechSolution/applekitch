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
                                <h1 class="h2"><?php echo $title; ?></h1>
                            </div>
                            <div class="col-lg-6">
                                <div style="text-align: right;">
                                    <a class="btn btn-sm btn-sm btn-primary btn-primary-green" href="<?php echo base_url('/admin/add_grade_setting'); ?>">Add New</a>
                                    <!--<a class="btn btn-sm btn-secondary btn-primary-green" href="<?php /*echo base_url('/admin/certificate_settings'); */?>">Settings</a>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php $this->load->view('admin/templates/error_v.php'); ?>
                <table class="table" data-paging="true" data-sorting="true" data-filtering="true" data-paging-size="20">
                    <thead>
                    <tr>
                        <th>SL No</th>
                        <th>Subject</th>
                        <th>Grade</th>
                        <th>Content</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if(!empty($grade_settings)) {
                        $counter=1;
                        foreach($grade_settings as $grade_setting) {
                            /*if($grade_setting->id==10){
                                print_r($grade_setting); exit();
                            }*/
                            ?>
                            <tr>
                                <td><?php echo $counter; ?></td>
                                <td><?php echo get_returnfield('subject','id',$grade_setting->subject_id,'name'); ?></td>
                                <td><?php echo get_returnfield('grade','id',$grade_setting->grade_id,'name'); ?></td>
                                <td title="<?php echo $grade_setting->content; ?>"><?php echo  word_limiter($grade_setting->content,15); ?></td>
                                <td><a class="edit_link" href="<?php echo base_url('/admin/edit_grade_setting'); ?>/<?php echo $grade_setting->id; ?>"><span data-feather="edit"></span> Edit</a> | <a class="delete_link" onclick="delete_data(<?php echo $grade_setting->id; ?>,'id','grade_settings');" href="javascript:void(0)"><span data-feather="delete"></span> Delete</a></td>
                            </tr>
                            <?php
                            $counter++;
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