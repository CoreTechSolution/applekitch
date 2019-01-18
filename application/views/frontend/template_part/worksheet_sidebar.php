<div class="worksheet_sidebar">
    <?php if(!empty($work_subjects)){ ?>
        <div class="sidebar_header">By Subject</div>
        <ul>
        <?php foreach ($work_subjects as $work_subject){ ?>
            <li><a href="#"><?= $work_subject->name; ?> </a></li>
            <!--<li><a href="#">English</a></li>-->
        <?php } ?>

        </ul>
    <?php } ?>
<?php if(!empty($work_grades)) { ?>
    <div class="sidebar_header">By Grade</div>
    <ul>
        <?php  foreach ($work_grades as $work_grade) {?>
       <!-- <li><a href="<?php /*echo base_url('frontend/subject_english') */?>">Link</a></li>-->
            <li><a href="#"><?php echo $work_grade->name; ?></a></li>
        <?php } ?>
    </ul>

<?php } ?>
    <?php if(!empty($work_categories) ) {?>
    <div class="sidebar_header">By Category</div>
    <ul>

        <?php  foreach ($work_categories as $work_categorie) { ?>
            <li><a href=""><?php echo $work_categorie->name; ?></a></li>
        <?php } ?>
    </ul>
    <?php } ?>


    <?php if(!empty($work_topics)){ ?>
    <div class="sidebar_header">By Topic</div>
    <ul>

        <?php  foreach ($work_topics as $work_topic) { ?>

            <li><a href="#"><?php echo  $work_topic->name; ?></a></li>

        <?php } ?>
    </ul>
<!--      <li><a href="<?php /*echo base_url('frontend/subject_english') */?>">Link</a></li>
-->
    <?php } ?>
</div>
