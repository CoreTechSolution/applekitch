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
                                    <a class="btn btn-primary btn-primary-green" href="<?= base_url('admin/add_testimonial'); ?>">Add New</a>
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
                        <th>Image</th>
                        <th>Name</th>
                        <th>Content</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if(!empty($testimonials)) {
                        $counter=1;
                        foreach($testimonials as $testimonial) {

                            ?>
                            <tr>
                                <td><?= $counter; ?></td>
                                <td><img src="<?php echo $testimonial->testimonial_img; ?>" alt=""></td>
                                <td><?= $testimonial->name; ?></td>
                                <td><?= word_limiter($testimonial->content,10); ?></td>
                                <td><a class="edit_link" href="<?= base_url('/admin/edit_testimonial'); ?>/<?php echo $testimonial->id; ?>"><span data-feather="edit"></span> Edit</a> | <a class="delete_link" onclick="delete_data(<?php echo $testimonial->id; ?>,'id','testimonials');" href="javascript:void(0)"><span data-feather="delete"></span> Delete</a></td>
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