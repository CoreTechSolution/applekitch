<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'templates/header.php';
?>
<div class="pageBannerWrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
				<?php echo '<h1 style="text-align: center; color: #FFFFFF;">'.$page_item['page'].'</h1>'; ?>
            </div>
        </div>
    </div>
</div>
<div class="pageWrapper">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="pageContainer">
					<?php echo $page_item['page_content']; ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php require_once 'templates/footer.php'; ?>
