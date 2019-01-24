<div class="worksheet_sidebar">
    <?php if(!empty($work_subjects)){ ?>
        <div class="clear_search">
            <a href="javascript:void(0)" onclick="clear_work_search();">- Clear Search</a>
        </div>
        <div class="sidebar_header">By Subject</div>
        <ul>
        <?php foreach ($work_subjects as $work_subject){ ?>
            <li><a id="search_click_s_<?= $work_subject->id; ?>" href="javascript:void(0)" onclick="search_id_genarate('subject','<?=  $work_subject->id; ?>',this.id);"><?= $work_subject->name; ?> </a></li>
            <!--<li><a href="#">English</a></li>-->
        <?php } ?>

        </ul>
        <input type="hidden" id="search_subject_id" name="search_subject_id">
    <?php } ?>
<?php if(!empty($work_grades)) { ?>
    <div class="sidebar_header">By Grade</div>
    <ul>
        <?php  foreach ($work_grades as $work_grade) {?>
       <!-- <li><a href="<?php /*echo base_url('frontend/subject_english') */?>">Link</a></li>-->
            <li><a id="search_click_g_<?= $work_grade->id; ?>" href="javascript:void(0)" onclick="search_id_genarate('grade','<?=  $work_grade->id; ?>',this.id);"><?php echo $work_grade->name; ?></a></li>
        <?php } ?>
    </ul>
    <input type="hidden" id="search_grade_id" name="search_grade_id">
<?php } ?>
    <?php if(!empty($work_categories) ) {?>
    <div class="sidebar_header">By Category</div>
    <ul>

        <?php  foreach ($work_categories as $work_categorie) { ?>
            <li><a id="search_click_c_<?= $work_categorie->id; ?>" href="javascript:void(0)" onclick="search_id_genarate('category','<?=  $work_categorie->id; ?>',this.id);"><?php echo $work_categorie->name; ?></a></li>
        <?php } ?>
    </ul>
    <?php } ?>

    <input type="hidden" id="search_cat_id" name="search_cat_id">
    <?php if(!empty($work_topics)){ ?>
    <div class="sidebar_header">By Topic</div>
    <ul>

        <?php  foreach ($work_topics as $work_topic) { ?>

            <li><a id="search_click_t_<?= $work_topic->id; ?>" href="javascript:void(0)" onclick="search_id_genarate('topic','<?=  $work_topic->id; ?>',this.id);"><?php echo  $work_topic->name; ?></a></li>

        <?php } ?>
    </ul>
<!--      <li><a href="<?php /*echo base_url('frontend/subject_english') */?>">Link</a></li>
-->
        <input type="hidden" id="search_topic_id" name="search_topic_id">
    <?php } ?>
</div>
