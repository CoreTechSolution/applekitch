<!---->
<div id="wrapper3" class="wrapper3">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1>Different Course Categories</h1>
                <h2>Practise <span>Maths & English</span> | Primary & Secondary</h2>
            </div>
        </div>
        <?php
        $colorcode=explode('|',COLORCODE);
        // print_r($colorcode);
        ?>
        <?php $get_grades=$this->frontend_model->get_grades(array(), false); ?>
        <?php if(!empty($get_grades)){ ?>
        <div class="row">
            <?php $rand=0; ?>
            <?php foreach ($get_grades as $get_grade){ ?>

                <?php if($rand>=11){
                    $rand=0;
                }
                ?>

                <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                    <div class="circleWrap" style="background: <?= $colorcode[$rand] ?>; border: 3px solid <?= $colorcode[$rand] ?>; color: <?= $colorcode[$rand] ?>;">
                        <h3><?php echo $get_grade->name; ?></h3>
                        <!--<p class="circleWrap1-p">Here is a list of English and Math skills students learn in reception! These skills are organised into categories.</p>-->
                        <div class="circleWrap-div">
                            <a href="<?php echo base_url('topic/'.'math/'.$get_grade->slug); ?>"><p>Maths<br><small><?php echo get_question_count('','math',$get_grade->slug); ?> Skills</small></p></a>
                            <a href="<?php echo base_url('topic/'.'english/'.$get_grade->slug); ?>"><p>English<br><small><?php echo get_question_count('','english',$get_grade->slug); ?> Skills</small></p></a>
                        </div>
                    </div>
                </div>
                <?php $rand++; ?>
        <?php } ?>
        </div>
        <?php }
        ?>

    </div>
</div>
<!---->