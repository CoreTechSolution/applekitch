
<?php if(!empty($single) && $single==true){ ?>
    <input type="hidden" name="single_textbox" value="1" id="single_textbox">
    <div class="worksheet_sidebar">
        <div class="clear_search">
            <a href="<?= base_url('worksheets') ?>">- Clear Search</a>
        </div>
        <?php if(!empty($work_grades)) { ?>
            <div class="sidebar_list_main grade_list">
                <div class="sidebar_header">Year Group</div>
                <ul id="sidebar_grade_listing">
                    <?php  foreach ($work_grades as $work_grade) {?>
                        <!-- <li><a href="<?php /*echo base_url('frontend/subject_english') */?>">Link</a></li>-->
                        <li><a id="search_click_g_<?= $work_grade->id; ?>" href="<?= base_url('worksheets?type=grade&id='.$work_grade->id); ?>"><?php echo $work_grade->name; ?></a></li>
                    <?php } ?>
                </ul>
                <input type="hidden" id="search_grade_id" name="search_grade_id">
            </div>

        <?php } ?>
        <?php if(!empty($work_subjects)){ ?>
            <div class="sidebar_list_main subject_list">
                <div class="sidebar_header">Subject</div>
                <ul id="sidebar_subject_listing">
                    <?php foreach ($work_subjects as $work_subject){ ?>
                        <li><a id="search_click_s_<?= $work_subject->id; ?>" href="<?= base_url('worksheets?type=subject&id='.$work_subject->id); ?>"><?= $work_subject->name; ?> </a></li>
                        <!--<li><a href="#">English</a></li>-->
                    <?php } ?>

                </ul>
                <input type="hidden" id="search_subject_id" name="search_subject_id">
            </div>

        <?php } ?>
        <?php if(!empty($work_categories) ) {  ?>
            <div id="cat_listing_main_div" style="display: none;">
                <div class="sidebar_list_main cat_list">
                    <div class="sidebar_header">Category</div>
                    <ul id="sidebar_category_listing_s">
                    </ul>
                </div>
            </div>


        <?php } ?>

        <input type="hidden" id="search_cat_id" name="search_cat_id">

    </div>

<?php } else { ?>
    <input type="hidden" name="single_textbox" value="0" id="single_textbox">
    <div class="worksheet_sidebar">
        <?php if(!empty($work_grades)) { ?>
            <div class="clear_search">
                <a href="javascript:void(0)" onclick="clear_work_search();">- Clear Search</a>
            </div>
            <div class="sidebar_list_main grade_list">
                <div class="sidebar_header">Year Group</div>
                <ul id="sidebar_grade_listing">
                    <?php  foreach ($work_grades as $work_grade) {?>
                        <!-- <li><a href="<?php /*echo base_url('frontend/subject_english') */?>">Link</a></li>-->
                        <li><a id="search_click_g_<?= $work_grade->id; ?>" href="javascript:void(0)" onclick="search_id_genarate('grade','<?=  $work_grade->id; ?>',this.id);"><?php echo $work_grade->name; ?></a></li>
                    <?php } ?>
                </ul>
                <input type="hidden" id="search_grade_id" name="search_grade_id">
            </div>
        <?php } ?>
        <?php if(!empty($work_subjects)){ ?>
            <div class="sidebar_list_main subject_list">
                <div class="sidebar_header">Subject</div>
                <ul id="sidebar_subject_listing">
                    <?php foreach ($work_subjects as $work_subject){ ?>
                        <li><a id="search_click_s_<?= $work_subject->id; ?>" href="javascript:void(0)" onclick="search_id_genarate('subject','<?=  $work_subject->id; ?>',this.id);"><?= $work_subject->name; ?> </a></li>
                        <!--<li><a href="#">English</a></li>-->
                    <?php } ?>

                </ul>
                <input type="hidden" id="search_subject_id" name="search_subject_id">
            </div>
        <?php } ?>

        <?php if(!empty($work_categories) ) {  ?>
            <div id="cat_listing_main_div" style="display: none;">
                <div class="sidebar_list_main cat_list">
                    <div class="sidebar_header">Category</div>
                    <ul id="sidebar_category_listing">
                    </ul>
                </div>
            </div>

        <?php } ?>

        <input type="hidden" id="search_cat_id" name="search_cat_id">

    </div>
<?php } ?>

