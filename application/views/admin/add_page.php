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
							<div class="col-lg-6"></div>
						</div>
					</div>
				</div>
                <div class="pageWrapper">
                    <div class="container">
                        <form method="post" action="<?php echo base_url('/admin/'.$method) ?>">
                            <div class="form-group">
                                <label>Page: </label>
                                <input type="text" name="page_name" value="" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Title: </label>
                                <input type="text" name="page_title" value="" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Content: </label>
                                <textarea name="page_content" class="form-control textarea-no-styles" rows="10"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Meta Keyword: </label>
                                <input type="text" name="meta_keyword" value="" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Meta Description: </label>
                                <textarea name="meta_description" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="add_page" value="Add Page" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
			</main>
		</div>
	</div>
<?php
require_once 'templates/footer.php';
?>