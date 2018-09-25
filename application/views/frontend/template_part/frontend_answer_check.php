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
		<p>Answer 1: </p><span><input type="text" name="qAns_box" class="form-control"></span><br>
		<p>Answer 1: </p><span><input type="text" name="qAns_box" class="form-control"></span>

	</div>
<?php } elseif($question_option=='19'){ ?>
<?php } elseif($question_option=='20'){ ?>
	<div class="option_list_d onlyclickable">
		<div class="question_image">
			<img src="<?php echo $form_data['img']; ?>" alt="" class="img-thumbnail">
		</div>
		<?php $option_counter=1; ?>
		<?php foreach ($form_data['option_1'] as $option){ ?>

			<div class="inputGroup">
				<input id="radio<?php echo $option_counter; ?>" name="option_1" value="<?php echo $option; ?>" type="radio"/>
				<label for="radio<?php echo $option_counter; ?>"><?php echo $option; ?></label>
			</div>
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
<?php }  ?>
</div>
