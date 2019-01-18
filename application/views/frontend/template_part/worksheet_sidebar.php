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

    <div class="sidebar_header">By Grade</div>
    <ul>
        <li><a href="#">Math</a></li>
        <li><a href="#">English</a></li>
    </ul>
    <div class="sidebar_header">By Category</div>
    <ul>
        <li><a href="#">Math</a></li>
        <li><a href="#">English</a></li>
    </ul>
    <div class="sidebar_header">By Topic</div>
    <ul>
        <li><a href="#">Math</a></li>
        <li><a href="#">English</a></li>
    </ul>
</div>
