<div class="ans_template_text">
<?php if ($question_option=='1'){ ?>
	<div class="question_image">
		<img src="<?php echo $form_data['img']; ?>" alt="" class="img-thumbnail">
	</div>
	<div class="qAns_box">
		<p>Answer: </p><span><input type="text" name="qAns_box" class="form-control"></span>
	</div>
<?php } elseif($question_option=='2'){ ?>
	<?php $img_array = explode('|',$form_data['img_array']); ?>
	<?php if(!empty($img_array)){ ?>
		<div class="row">
			<input id="img_answer" type="hidden" name="img_answer" value="">
			<?php $i = 1; ?>
			<?php foreach($img_array as $img){ ?>
				<?php
				$reversedParts = explode('/', strrev($img), 2);
				$img_name = strrev($reversedParts[0]);
				?>
				<div class="col-lg-6">
					<div class="form-group">
						<div class="imgselector">
							<label for="img_<?php echo $i; ?>">
								<img data-img_name="<?php echo $img_name; ?>" src="<?php echo $img; ?>" class="img-thumbnail" style="max-width: 100%;width: auto;height: 150px;">
							</label>
							<!--<input id="img_<?php /*echo $i; */?>" type="radio" name="img_answer" value="<?php /*echo $img_name; */?>">-->
						</div>
					</div>
				</div>
				<?php $i++;  } ?>
		</div>
	<?php } ?>
<?php } elseif($question_option=='3'){ ?>
	<div class="option_list_d onlyclickable">
		<?php $option_counter=1; ?>
		<?php foreach ($form_data['option_1'] as $option){ ?>
			<div class="inputGroup">
				<input id="radio<?php echo $option_counter; ?>" name="option_1" value="<?php echo $option; ?>" type="radio"/>
				<label for="radio<?php echo $option_counter; ?>"><?php echo $option; ?></label>
			</div>
			<?php $option_counter++; ?>
		<?php } ?>
	</div>
<?php } elseif($question_option=='4'){ ?>
<?php } elseif($question_option=='5'){ ?>
	<?php //print_r($form_data); ?>
	<div class="option_list_d">
		<?php //print_r($form_data['option_arrange']); ?>
		<div class="option_list_d onlyclickable" id="sortable">
			<?php $option_counter=1; ?>
			<?php foreach ($form_data['option_dearrange'] as $option){ ?>
				<div class="inputGroup">
					<label><?php echo $option; ?></label>
					<input type="hidden" name="option_arrange[]" value="<?php echo $option; ?>"/>
				</div>
				<?php $option_counter++; ?>
			<?php } ?>
			<script>
                jQuery( "#sortable" ).sortable();
                jQuery( "#sortable" ).disableSelection();
			</script>
		</div>
	</div>
<?php } elseif($question_option=='6'){ ?>
	<div class="option_list_d onlyclickable">
		<?php $option_counter=1; ?>
		<?php foreach ($form_data['option_1'] as $option){ ?>
			<div class="inputGroup">
				<input id="radio<?php echo $option_counter; ?>" name="option_1" value="<?php echo $option; ?>" type="radio"/>
				<label for="radio<?php echo $option_counter; ?>"><?php echo $option; ?></label>
			</div>
			<?php $option_counter++; ?>
		<?php } ?>
	</div>
<?php } elseif($question_option=='7'){ ?>

<?php } elseif($question_option=='8'){ ?>
	<?php $img_array = explode('|',$form_data['img_array']); ?>
	<?php if(!empty($img_array)){ ?>
		<div class="row">
			<input id="img_answer" type="hidden" name="img_answer" value="">
			<?php $i = 1; ?>
			<?php foreach($img_array as $img){ ?>
				<?php
				$reversedParts = explode('/', strrev($img), 2);
				$img_name = strrev($reversedParts[0]);
				?>
				<div class="col-lg-6">
					<div class="form-group">
						<div class="imgselectorMultiple">
							<label for="img_<?php echo $i; ?>">
								<img data-img_name="<?php echo $img_name; ?>" src="<?php echo $img; ?>" class="img-thumbnail" style="max-width: 100%;width: auto;height: 150px;">
							</label>
							<!--<input id="img_<?php /*echo $i; */?>" type="radio" name="img_answer" value="<?php /*echo $img_name; */?>">-->
						</div>
					</div>
				</div>
				<?php $i++;  } ?>
		</div>
	<?php } ?>
<?php } elseif($question_option=='9'){ ?>
	<div class="option_list_d">
		<?php $option_counter=1; ?>
		<?php foreach ($form_data['option_1'] as $option){ ?>
			<div class="inputGroup">
				<input id="radio<?php echo $option_counter; ?>" name="option_1" value="<?php echo $option; ?>" type="radio"/>
				<label for="radio<?php echo $option_counter; ?>"><?php echo $option; ?></label>
			</div>
			<?php $option_counter++; ?>
		<?php } ?>
	</div>
<?php } elseif($question_option=='10'){ ?>
<?php } elseif($question_option=='11'){ ?>
	<?php //print_r($form_data); ?>
	<div class="qAns_box">
		<p>Answer: </p><span><input type="text" name="qAns_box" class="form-control"></span>
	</div>
<?php } elseif($question_option=='12'){ ?>
	<?php
        $count = $form_data['num_box'];
        if(!empty($count)) {
            echo '<div class="svgBoxes">';
	        for ( $i = 0; $i < $count; $i++ ) {
                echo '<div class="svgBox"></div>';
	        }
	        echo '</div>';
        }
    ?>
    <div style="clear: both;"></div>
    <input type="hidden" name="qAns_box" value="0"/>
    <input type="hidden" name="svgNum" value="<?php echo $count; ?>"/>
    <br/>
    <br/>
    <br/>
    <ul class="svgButton">
        <li><a href="#" class="svgAdd">1 <span><img src="<?php echo $form_data['img']; ?>" /></span></a></li>
        <li><a href="#" class="svgDelete">1 <span><i class="fas fa-trash-alt"></i></span></a></li>
    </ul>
    <br/>
    <br/>
<?php } elseif($question_option=='13'){ ?>
	<?php //print_r($form_data); ?>
	<div class="option_list_d">
		<?php $option_counter=1; ?>
		<?php foreach ($form_data['option_1'] as $option){ ?>
			<div class="inputGroup">
				<input id="radio<?php echo $option_counter; ?>" name="option_1" value="<?php echo $option; ?>" type="radio"/>
				<label for="radio<?php echo $option_counter; ?>"><?php echo $option; ?></label>
			</div>
			<?php $option_counter++; ?>
		<?php } ?>
		<div class="form-group">
			<textarea class="form-control" style="width: 68%; height: 150px;" name="13_textbox"></textarea>
		</div>
	</div>
<?php } elseif($question_option=='14'){ ?>
	<?php //print_r($form_data); ?>
	<div class="option_list_d">
		<div class="option_list_d">
			<?php $option_counter=1; ?>
			<?php foreach ($form_data['option_1'] as $option){ ?>
				<div class="inputGroup">
					<input id="radio<?php echo $option_counter; ?>" name="option_1" value="<?php echo $option; ?>" type="radio"/>
					<label for="radio<?php echo $option_counter; ?>"><?php echo $option; ?></label>
				</div>
				<?php $option_counter++; ?>
			<?php } ?>
		</div>
	</div>
<?php } elseif($question_option=='15'){ ?>
	<?php $img_array = explode('|',$form_data['img_array']); ?>
	<?php if(!empty($img_array)){ ?>
		<div class="row">
			<input id="img_answer" type="hidden" name="img_answer" value="">
			<?php $i = 1; ?>
			<?php foreach($img_array as $img){ ?>
				<?php
				$reversedParts = explode('/', strrev($img), 2);
				$img_name = strrev($reversedParts[0]);
				?>
				<div class="col-lg-6">
					<div class="form-group">
						<div class="imgselector">
							<label for="img_<?php echo $i; ?>">
								<img data-img_name="<?php echo $img_name; ?>" src="<?php echo $img; ?>" class="img-thumbnail" style="max-width: 100%;width: auto;height: 150px;">
							</label>
							<!--<input id="img_<?php /*echo $i; */?>" type="radio" name="img_answer" value="<?php /*echo $img_name; */?>">-->
						</div>
					</div>
				</div>
				<?php $i++;  } ?>
		</div>
	<?php } ?>
<?php } elseif($question_option=='16'){ ?>
<?php } elseif($question_option=='17'){ ?>
<?php } elseif($question_option=='18'){ ?>
	<?php //print_r($form_data); ?>
	<div class="qAns_box">
		<p>Answer 1: </p><span><input type="text" name="qAns_box1" class="form-control"></span><br>
		<p>Answer 2: </p><span><input type="text" name="qAns_box2" class="form-control"></span>

	</div>
<?php } elseif($question_option=='19'){ ?>
<?php } elseif($question_option=='20'){ ?>
	<div class="option_list_d onlyclickable">
		<div class="question_image">
			<img src="<?php echo $form_data['img']; ?>" alt="" class="img-thumbnail">
		</div>
		<?php $option_counter=1; ?>
		<?php foreach ($form_data['option_1'] as $option){ ?>
            <?php if($option!=''){ ?>
			<div class="inputGroup">
				<input id="radio<?php echo $option_counter; ?>" name="option_1" value="<?php echo $option; ?>" type="radio"/>
				<label for="radio<?php echo $option_counter; ?>"><?php echo $option; ?></label>
			</div>
            <?php } ?>
			<?php $option_counter++; ?>
		<?php } ?>
	</div>
<?php } elseif($question_option=='26'){ ?>
    <div class="row">
        <div class="col-lg-12">
            <img src="<?php echo $form_data['img']; ?>">
        </div>
    </div>
    <div class="row12">
        <ul>
        <?php $i = 0; ?>
        <?php foreach ($form_data['option_1'] as $option){ ?>
            <li>
                <div class="boxed">
                    <input type="radio" id="options_<?php echo $i; ?>" name="selected_option" value="<?php echo $option; ?>">
                    <label for="options_<?php echo $i; ?>"><?php echo $option; ?></label>
                </div>
            </li>
            <?php $i++; ?>
        <?php } ?>
        </ul>
    </div>
<?php } elseif($question_option=='27'){ ?>
    <div class="row">
        <div class="col-lg-12">
            <?php $img_order = explode(',',$form_data['img_order']); ?>
            <?php if(!empty($img_order)){ ?>
                <ul class="imgpattern">
                    <?php foreach($img_order as $img){ ?>
                        <li><img src="<?php echo base_url('uploads/images/'.$img); ?>"></li>
                    <?php } ?>
                </ul>
            <?php } ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="multi_putimages">
                <div class="bg">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
                <div class="fs">
                    <div class="fsortable-empty"></div>
                    <div class="fsortable-empty"></div>
                    <div class="fsortable-empty"></div>
                    <div class="fsortable-empty"></div>
                    <div class="fsortable-empty"></div>
                    <div class="fsortable-empty"></div>
                </div>
                <div id="content">
                    <?php $img_array = explode('|',$form_data['img_array']); ?>
                    <?php if(!empty($img_array)){ ?>
                        <?php foreach($img_array as $image){ ?>
                            <div class="item"><img src="<?php echo $image; ?>" style="max-width: 40px;" /></div>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
            <input id="img_order_student" type="hidden" name="img_order_student" value="">
        </div>
    </div>
<?php } elseif($question_option=='28'){ ?>
	<?php //print_r($form_data); ?>
    <div class="question_image">
        <img src="<?php echo $form_data['img']; ?>" alt="" class="img-thumbnail">
    </div>
    <div class="second_q">
        <p><?php echo $form_data['second_question']; ?></p>
    </div>
	<div class="qAns_box">
		<p>Answer 1: </p><span><input type="text" name="qAns_box1" class="form-control"></span><br>
		<p>Answer 2: </p><span><input type="text" name="qAns_box2" class="form-control"></span>

	</div>
<?php } elseif($question_option=='29'){ ?>
	<div id="DragDropImg"><img src="<?php echo $form_data['base_image']; ?>" /></div>
    <ul class="DragDropExtra">
        <?php
            $total = $form_data['ans_textbox'];
            $rand = rand($total, ($total+5));
            for($i=0; $i<=$rand; $i++) {
        ?>
        <li><img src="<?php echo $form_data['extra_image']; ?>" /></li>
        <?php } ?>
    </ul>
    <input type="hidden" name="qAns_box" value="0" class="qAns_box_dragDrop" />
<?php } elseif($question_option=='31'){ ?>
    <?php //print_r($form_data); ?>
    <div class="multiple_text_image">
        <div class="pre_text">
            <?php echo $form_data['ans_check_with']; ?>
        </div>
        <div class="question_box">
            <?php $option_counter=0; ?>
            <?php foreach ($form_data['imgs'] as $imgs){ ?>
                <?php if($option_counter==0){ ?>

                    <div class="ans_text"><input type="text" name="qAns_box[]" class="form-control"></div>
                    <div class="ans_img"><img src="<?php echo $imgs; ?>" alt="" class=""></div>
                <?php } else { ?>
                    <div class="ans_operator">+</div>
                    <div class="ans_text"><input type="text" name="qAns_box[]" class="form-control"></div>
                    <div class="ans_img"><img src="<?php echo $imgs; ?>" alt="" class=""></div>
                <?php } ?>
                <?php $option_counter++; ?>
            <?php } ?>
        </div>
    </div>
<?php } elseif($question_option=='32'){ ?>
    <div class="row multiple_textbox">
        <div class="col-lg-12">
            <p>
            <?php
            $ans_textbox = $form_data['ans_textbox1'];
            $s = explode('[', $ans_textbox);
            if(!empty($s)) {
	            foreach ( $s as $sa ) {
		            if ( stripos( $sa, ']' ) ) {
		                //echo $sa;
			            $saa = explode( ']', $sa );
			            echo '<input class="form-control" name="qAns_box[]"/>';
			            echo $saa[1];
		            } else {
		                echo $sa;
                    }
	            }
            }
            ?>
            </p>
        </div>
    </div>
<?php } elseif($question_option=='34'){ ?>
    <?php $img_array = explode('|',$form_data['img_array']); ?>
    <?php if(!empty($img_array)){ ?>
        <div class="row">
            <div class="question_image">
                <img src="<?php echo $form_data['img']; ?>" alt="" class="img-thumbnail">
            </div>
            <div class="second_q">
                <a href="javacript:void(0);" id="play_question1" data-question="<?php echo ($form_data['second_question']); ?>"><i class="fas fa-volume-up"></i></a> <?php echo $form_data['second_question']; ?>
            </div>
            <input id="img_answer" type="hidden" name="img_answer" value="">
            <?php $i = 1; ?>
            <?php foreach($img_array as $img){ ?>
                <?php
                $reversedParts = explode('/', strrev($img), 2);
                $img_name = strrev($reversedParts[0]);
                ?>
                <div class="col-lg-6">
                    <div class="form-group">
                        <div class="imgselector">
                            <label for="img_<?php echo $i; ?>">
                                <img data-img_name="<?php echo $img_name; ?>" src="<?php echo $img; ?>" class="img-thumbnail" style="max-width: 100%;width: auto;height: 150px;">
                            </label>
                            <!--<input id="img_<?php /*echo $i; */?>" type="radio" name="img_answer" value="<?php /*echo $img_name; */?>">-->
                        </div>
                    </div>
                </div>
                <?php $i++;  } ?>
        </div>
    <?php } ?>
<?php } ?>
</div>
