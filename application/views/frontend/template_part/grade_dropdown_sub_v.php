<ul class="nav navbar-nav">
    <?php  $colorcode=explode('|',COLORCODE); ?>
    <?php $rand=rand(1,11); ?>
    <li class="dropdown" style="background: <?= $colorcode[$rand] ?>; border: 3px solid <?= $colorcode[$rand] ?>;">

        <a href="#" class="dropdown-toggle"  data-toggle="dropdown">Choose</a>
        <ul class="dropdown-menu" role="menu">
            <?php
            $subject_slug=$subject;
            if(!empty($grades_lists)){
                foreach ($grades_lists as $grades_list){ ?>
                    <a href="<?php echo base_url('topic/'.$subject_slug.'/'.$grades_list->slug)
                    ?>" class="list-group-item text-center"
                       data-tabid="<?php
                       echo $grades_list->id; ?>" ><?php echo $grades_list->name; ?></a>
                    <?php

                    ?>

                <?php   }
            }
            ?>
        </ul>
    </li>
</ul>