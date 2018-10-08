<?php if($question_option=='1') { ?>
<div id="qOption_1">
	<div class="form-group">
		<div class="row">
			<div class="col-lg-6">
				<label for="imageQ_upload">Image</label>
				<input type="file" name="imageQ_upload" class="form-control imageQ_upload">
				<img class="edit_question_img" src="<?php echo $form_cdata['img']; ?>" alt="">
				<input type="hidden" name="img" id="img" value="<?php echo $form_cdata['img']; ?>">
			</div>
			<div class="col-lg-6">
				<label for="ans_textbox">Answer</label>
				<input type="text" name="ans_textbox" class="form-control ans_textbox" value="<?php echo $form_cdata['ans_textbox']; ?>">
			</div>
		</div>
	</div>
</div>
<?php } elseif($question_option=='2'){ ?>
<!---->
<div id="qOption_2">
	<div class="form-group">
		<div class="row" id="upload_images_section">
			<div class="col-lg-6">
				<label for="upload_images">Upload Images</label>
				<input type="file" multiple name="upload_images[]" class="form-control upload_images">

			</div>
			<div class="col-lg-6"></div>
		</div>
		<div id="uploaded_images" style="display: block;">
			<?php $img_array = explode('|',$form_cdata['img_array']); ?>
			<?php if(!empty($img_array)){ ?>
                <br/><br/>
            <div class="row">
				<?php foreach($img_array as $img){ ?>
					<div class="col-lg-3">
						<div class="form-group">
							<img src="<?php echo $img; ?> " style="max-width: 100%;width: 263px;height: 150px;" />
							<div style="text-align: center; margin: 5px 0 10px 0;">
								<input type="radio" name="answer" value="<?php echo $img; ?>">
							</div>
						</div>
					</div>
				<?php } ?>
            </div>
			<?php } ?>
		</div>
	</div>
</div>
<!---->
<?php } elseif($question_option=='3'){ ?>
<div id="qOption_3">
	<div class="form-group">
		<div class="row">
			<div class="col-lg-6">
				<label for="imageQ_upload">Options</label>
				<div id="option_add_div">
					<?php foreach ($form_cdata['option_1'] as $options){ ?>
					<input type="text" name="option_1[]" class="form-control option_1" value="<?php echo $options ?>">
					<?php } ?>
				</div>
				<div id="option_add_div_app" class="option_add_div_app"></div>
				<a class="option_edit_q" href="#"><span data-feather="plus-circle" title="Add Option"></span></a>
			</div>
			<div class="col-lg-6">
				<label for="ans_textbox">Answer</label>
				<input type="text" name="ans_textbox" class="form-control ans_textbox" value="<?php echo $form_cdata['ans_textbox']; ?>">
			</div>
		</div>
	</div>
</div>
<!---->
<?php } elseif($question_option=='4'){ ?>

<?php } elseif($question_option=='5'){ ?>
<!-- Question with Arranging Option -->
<div id="qOption_5">
	<div class="form-group">
		<div class="row">
			<div class="col-lg-12">
				<div class="arrange1">
					<label>Answers</label>
					<div id="option_add_div">
                        <input type="text" name="option_arrange[]" class="form-control option_arrange" value="<?php echo $form_cdata['option_arrange'][0]; ?>">
					</div>
					<div id="option_add_div_app" class="option_add_div_app">
						<?php for($i=1;$i<count($form_cdata['option_arrange']);$i++){ ?>
                            <input type="text" name="option_arrange[]" class="form-control option_arrange" value="<?php echo $form_cdata['option_arrange'][$i]; ?>">
						<?php } ?>
                    </div>
					<a style="float: right;" class="btn btn-primary option_add_q" href="#"><span data-feather="plus-circle" title="Add Option"></span></a>
					<a style="float: right; margin-right: 20px;" class="btn btn-primary option_done" href="#">Done</a>
				</div>
				<div class="arrange2" style="display: none;">
					<label>Re Arrange</label>
				</div>
			</div>
		</div>
	</div>
</div>
<!---- ----->
<?php } elseif($question_option=='6'){ ?>
<div id="qOption_6">
	<div class="form-group">
		<div class="row">
			<div class="col-lg-6">
				<label for="imageQ_upload">Options</label>
				<div id="option_add_div">
					<?php foreach ($form_cdata['option_1'] as $option_1){ ?>
					<input type="text" name="option_1[]" class="form-control option_1" value="<?php echo $option_1 ?>">
					<?php } ?>

				</div>
				<div id="option_add_div_app" class="option_add_div_app"></div>
				<a class="option_edit_q" href="#"><span data-feather="plus-circle" title="Add Option"></span></a>
			</div>
			<div class="col-lg-6">
				<label for="ans_textbox">Answer</label>
				<input type="text" name="ans_textbox" class="form-control ans_textbox" value="<?php echo $form_cdata['ans_textbox']; ?>">
			</div>
		</div>
	</div>
</div>
<?php } elseif($question_option=='7'){ ?>

<?php } elseif($question_option=='8'){ ?>
<!-- SelectMultibleImages -->
<div id="qOption_8">
    <div class="form-group">
        <div class="row" id="upload_images_section">
            <div class="col-lg-6">
                <label for="upload_images">Upload Images</label>
                <input type="file" multiple name="upload_images[]" class="form-control upload_select_multiple_images">
            </div>
            <div class="col-lg-6"></div>
        </div>
        <div id="uploaded_images" style="display: block;">
            <?php if(!empty($form_cdata['img_array'])) { ?>
            <?php $img_array = explode('|', $form_cdata['img_array']); ?>
            <div class="row">
                <div class="col-lg-12">
                    <label>Choose correct answers</label>
                </div>
            </div>
            <div class="row">
                <?php foreach($img_array as $img) { ?>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>
                                <img src="<?php echo $img; ?>" style="max-width: 100%;width: 263px;height: 150px;" />
                                <?php
                                $active = 0;
                                $trim_text = base_url('uploads/images/');
                                $img_trim = str_replace($trim_text, '', $img);
                                if(!empty($form_cdata['answer'])) {
                                    if(in_array($img_trim, $form_cdata['answer'])) {
                                        $active = 1;
                                    }
                                }
                                ?>
                                <div style="text-align: center; margin: 5px 0 10px 0;"><input type="checkbox"<?php if($active == 1) { echo ' checked="checked"'; } ?> name="answer[]" value="<?php echo $img_trim; ?>"></div>
                            </label>
                        </div>
                    </div>
                <?php } ?>
                <input type="hidden" name="img_array" value="<?php echo implode('|', $img_array); ?>"></div>
        </div>
        <?php } ?>
    </div>
</div>
<?php } elseif($question_option=='9'){ ?>
<div id="qOption_9">
	<div class="form-group">
		<div class="row">
			<div class="col-lg-6">
				<label for="imageQ_upload">Options</label>
				<div id="option_add_div">
					<?php foreach ($form_cdata['option_1'] as $option_1){ ?>
						<input type="text" name="option_1[]" class="form-control option_1" value="<?php echo $option_1 ?>">
					<?php } ?>
				</div>
				<div id="option_add_div_app" class="option_add_div_app"></div>
				<a class="option_edit_q" href="#"><span data-feather="plus-circle" title="Add Option"></span></a>
			</div>
			<div class="col-lg-6">
				<label for="ans_textbox">Answer</label>
				<input type="text" name="ans_textbox" class="form-control ans_textbox" value="<?php echo $form_cdata['ans_textbox']; ?>">
			</div>
		</div>
	</div>
</div>
<?php } elseif($question_option=='10'){ ?>

<?php } elseif($question_option=='11'){ ?>
<div id="qOption_11">
	<div class="form-group">
		<div class="row">
			<div class="col-lg-6">
				<label for="ans_textbox">Answer</label>
				<input type="text" name="ans_textbox" class="form-control ans_textbox" value="<?php echo $form_cdata['ans_textbox']; ?>">
			</div>
			<div class="col-lg-6">

			</div>
		</div>
	</div>
</div>
<?php } elseif($question_option=='12'){ ?>
    <!-- Question With SVGImageWithOption -->
    <div id="qOption_12">
        <div class="form-group">
            <div class="row">
                <div class="col-lg-6">
                    <label for="num_box">Number of Box</label>
                    <input type="number" name="num_box" class="form-control num_box" value="<?php echo $form_cdata['num_box']; ?>">
                    <br/>
                    <a href="javascript:void(0);" class="btn add_row_save num_box_done"><!--<span data-feather="plus-archive"></span>--> Done</a>
                </div>
                <div class="col-lg-3">
                    <div class="svg_box_wrap">
	                    <?php
	                    $count = $form_cdata['num_box'];
	                    if(!empty($count)) {
		                    echo '<div class="svgBoxes">';
		                    for ( $i = 0; $i < $count; $i++ ) {
			                    echo '<div class="svgBox"></div>';
		                    }
		                    echo '</div>';
	                    }
	                    ?>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="svg_image_wrap">
                        <img src="<?php echo $form_cdata['img']; ?>" style="width: 50px; height: 50px;" />
                    </div>
                </div>
            </div>
            <br/>
            <div class="svg_box_wrap_image">
                <div class="row"><div class="col-lg-12"><label for="svgBoximg">Upload image</label><input name="svgBoximg" type="file" class="form-control svgBoximg" accept="image/svg" /></div></div>
            </div>
            <br/>
            <div class="svg_how_many">
                <div class="row">
                    <div class="col-lg-6">
                        <label for="num_img">How many of the image do you want into the frame?</label>
                        <input type="number" name="ans_textbox" class="form-control num_img" value="<?php echo $form_cdata['ans_textbox']; ?>">
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } elseif($question_option=='13'){ ?>
<!-- Question With TextBox And Option -->
<div id="qOption_13">
	<div class="form-group">
		<div class="row">
			<div class="col-lg-6">
				<label for="imageQ_upload">Options</label>
				<div id="option_add_div">
					<?php foreach ($form_cdata['option_1'] as $option_1){ ?>
						<input type="text" name="option_1[]" class="form-control option_1" value="<?php echo $option_1 ?>">
					<?php } ?>
				</div>
				<div id="option_add_div_app" class="option_add_div_app"></div>
				<a class="option_edit_q" href="#"><span data-feather="plus-circle" title="Add Option"></span></a>
			</div>
			<div class="col-lg-6">
				<label for="ans_textbox">Answer</label>
				<input type="text" name="ans_textbox" class="form-control ans_textbox"  value="<?php echo $form_cdata['ans_textbox']; ?>">
			</div>
		</div>
	</div>
</div>
<?php } elseif($question_option=='14'){ ?>
<!-- Question with Check Box -->
<div id="qOption_14">

	<div class="form-group">
		<div class="row">
			<div class="col-lg-6">
                <label>Check Boxes</label>
                <div id="option_add_div">
                    <?php foreach ($form_cdata['option_1'] as $option_1){ ?>
                        <input type="text" name="option_1[]" class="form-control option_1" value="<?php echo $option_1 ?>">
                    <?php } ?>
                </div>

                <div id="option_add_div_app" class="option_add_div_app"></div>
                <a style="float: right;" class="option_edit_q" href="#"><span data-feather="plus-circle" title="Add Option"></span></a>
            </div>
            <div class="col-lg-6">
				<label>Answer</label>
				<input type="text" name="ans_textbox" class="form-control ans_textbox" value="<?php echo $form_cdata['ans_textbox']; ?>">

			</div>
		</div>
	</div>
</div>
<?php } elseif($question_option=='15'){ ?>
<!---->
<div id="qOption_15">
	<div class="form-group">
		<div class="row" id="upload_images_section">
			<div class="col-lg-6">
				<label for="upload_images">Upload Images</label>
				<input type="file" multiple name="upload_images[]" class="form-control upload_images">
			</div>
			<div class="col-lg-6"></div>
		</div>
		<div id="uploaded_images" style="display: block;">
            <?php $img_array = explode('|', $form_cdata['img_array']); ?>
            <?php if(!empty($img_array)) { ?>
                <div class="row">
                    <div class="col-lg-12">
                        <label>Choose correct answer</label>
                    </div>
                </div>
                <div class="row">
            <?php foreach($img_array as $img) { ?>
                <?php
	            $reversedParts = explode('/', strrev($img), 2);
	            $img_name = strrev($reversedParts[0]);
                ?>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <img src="<?php echo $img; ?>" style="max-width: 100%;width: 263px;height: 150px;" />
                            <div style="text-align: center; margin: 5px 0 10px 0;"><input type="radio"<?php if($form_cdata['answer'] == $img_name) { echo ' checked="checked"'; }?> name="answer" value="<?php echo $img_name; ?>"></div>
                        </div>
                    </div>
            <?php } ?>
                    <input type="hidden" name="img_array" value="<?php echo implode('|',$img_array); ?>">
                </div>
            <?php } ?>
        </div>
	</div>
</div>
<?php } elseif($question_option=='16'){ ?>

<?php } elseif($question_option=='17'){ ?>

<?php } elseif($question_option=='18'){ ?>
<!---->
<div id="qOption_18">
	<div class="form-group">
		<div class="row">
			<div class="col-lg-6">
				<label for="ans_textbox">Answer 1</label>
				<input type="text" name="ans_textbox1" class="form-control ans_textbox" value="<?php echo $form_cdata['ans_textbox1']; ?>">
				<br>
				<br>
				<label for="ans_textbox">Answer 2</label>
				<input type="text" name="ans_textbox2" class="form-control ans_textbox" value="<?php echo $form_cdata['ans_textbox2']; ?>">
			</div>
			<div class="col-lg-6">

			</div>
		</div>
	</div>
</div>
<?php } elseif($question_option=='19'){ ?>

<?php } elseif($question_option=='20'){ ?>
<!--- --->
<div id="qOption_20">
	<div class="form-group">
		<div class="row" id="upload_images_section">
			<div class="col-lg-6">
				<label for="imageQ_upload">Image</label>
                <input type="file" name="imageQ_upload" class="form-control imageQ_upload">
                <img class="edit_question_img" src="<?php echo $form_cdata['img']; ?>" alt="">
                <input type="hidden" name="img" id="img" value="<?php echo $form_cdata['img']; ?>">
			</div>
			<div class="col-lg-6">
				<label for="ans_textbox">Answer</label>
				<input type="text" name="ans_textbox" class="form-control ans_textbox" value="<?php echo $form_cdata['ans_textbox']; ?>">
			</div>
			<div class="col-lg-6">
				<label for="imageQ_upload">Options</label>
				<div id="option_add_div">
                    <?php foreach ($form_cdata['option_1'] as $option_1){ ?>
                        <input type="text" name="option_1[]" class="form-control option_1" value="<?php echo $option_1 ?>">
                    <?php } ?>

				</div>
				<div id="option_add_div_app" class="option_add_div_app"></div>
				<a class="option_edit_q" href="#"><span data-feather="plus-circle" title="Add Option"></span></a>
			</div>
		</div>
		<div id="uploaded_images" style="display: none;"></div>
	</div>
</div>
<?php } elseif($question_option=='21'){ ?>

<?php } elseif($question_option=='26'){ ?>
    <div id="qOption_26">

        <div class="form-group">
            <div class="row">
                <div class="col-lg-6">
                    <label for="imageQ_upload">Image</label>
                    <input type="file" name="imageQ_upload" class="form-control imageQ_upload">
                    <img class="edit_question_img" src="<?php echo $form_cdata['img']; ?>" alt="">
                    <input type="hidden" name="img" id="img" value="<?php echo $form_cdata['img']; ?>">
                </div>
                <div class="col-lg-6">
                    <label>Check Boxes</label>
                    <div id="option_add_div">
                        <?php foreach ($form_cdata['option_1'] as $option_1){ ?>
                            <input type="text" name="option_1[]" class="form-control option_1" value="<?php echo $option_1 ?>">
                        <?php } ?>
                    </div>

                    <div id="option_add_div_app" class="option_add_div_app"></div>
                    <a style="float: right;" class="option_edit_q" href="#"><span data-feather="plus-circle" title="Add Option"></span></a>
                </div>
                <div class="col-lg-6">
                    <label>Answer</label>
                    <input type="text" name="ans_textbox" class="form-control ans_textbox" value="<?php echo $form_cdata['ans_textbox']; ?>">

                </div>
            </div>
        </div>
    </div>
<?php } elseif($question_option=='28'){ ?>
    <div id="qOption_28">
        <div class="form-group">
            <div class="row" id="upload_images_section">
                <div class="col-lg-6">
                    <label for="imageQ_upload">Question Image</label>
                    <input type="file" name="imageQ_upload" class="form-control imageQ_upload">
                    <img class="edit_question_img" src="<?php echo $form_cdata['img']; ?>" alt="">
                    <input type="hidden" name="img" id="img" value="<?php echo $form_cdata['img']; ?>">
                </div>
                <div class="col-lg-12">
                    <label for="second_question">Pre Text</label>
                    <input type="text" name="second_question" class="form-control" value="<?php echo $form_cdata['second_question']; ?>" required>
                </div>
                <div class="col-lg-6">
                    <label for="upload_images">Answer One</label>
                    <input type="text" name="ans_textbox1" class="form-control" value="<?php echo $form_cdata['ans_textbox1']; ?>" required>
                </div>
                <div class="col-lg-6">
                    <label for="upload_images">Answer Two</label>
                    <input type="text" name="ans_textbox2" class="form-control" value="<?php echo $form_cdata['ans_textbox2']; ?>" required>
                </div>
            </div>
            <div id="uploaded_images" style="display: none;"></div>
        </div>

    </div>
<?php } elseif($question_option=='29'){ ?>
    <div id="qOption_29">
        <div class="form-group">
            <div class="row">
                <div class="col-lg-6">
                    <label for="base_image">Base Image</label>
                    <input type="file" name="base_image" class="form-control base_image ans_textbox">
                </div>
                <div class="col-lg-6">
                    <div class="drag_drop_img">
                        <img src="<?php echo $form_cdata['base_image']; ?>" style="width: 200px; height: auto;" />
                    </div>
                </div>
            </div>
            <div class="row extra_img">
                <div class="col-lg-6">
                    <label for="extra_image">Extra Image</label>
                    <input type="file" name="extra_image" class="form-control extra_image ans_textbox">
                </div>
                <div class="col-lg-6">
                    <div class="drag_drop_extra_image">
                        <img src="<?php echo $form_cdata['extra_image']; ?>" style="width: 100px; height: auto;" />
                    </div>
                </div>
            </div>
            <div class="row extra_img_num">
                <div class="col-lg-6">
                    <label for="extra_image">Number of extra Images on the Base Image</label>
                    <input type="number" value="<?php echo $form_cdata['ans_textbox']; ?>" name="ans_textbox" class="form-control ans_textbox">
                </div>
            </div>
        </div>
    </div>
<?php } elseif($question_option=='31'){ ?>
    <div id="qOption_28">
        <div class="form-group">
            <div class="row" id="upload_images_section">
                <div class="col-lg-12">
                    <label for="imageQ_upload">Question Pre Text</label>
                    <input type="text" name="ans_check_with" class="form-control" value="<?php echo $form_cdata['ans_check_with']; ?>" required>
                </div>

                <div id="option_add_div">
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="imageQ_upload">Question Image</label>
                            <input type="file" name="imageQ_uploads[]" class="form-control imageQ_upload" required>
                        </div>
                        <div class="col-lg-6">
                            <label for="imageQ_upload">Answer</label>
                            <input type="text" name="option_1[]" class="form-control option_1" required>
                        </div>
                    </div>

                </div>
                <div id="option_add_div_app" class="option_add_div_app"></div>
                <a class="option_add_q" href="#"><span data-feather="plus-circle" title="Add Option"></span></a>
            </div>
            <div id="uploaded_images" style="display: none;"></div>
        </div>

    </div>
<?php } elseif($question_option=='33'){ ?>
    <div id="qOption_33">
        <div class="form-group">
            <div class="row" id="upload_images_section">

                <div id="option_add_div">
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="qst_layout">Question Layout</label>
                            <select name="qst_layout" id="qst_layout" class="form-control" required>
                                <option value="0">-----Choose-----</option>
                                <option<?php if($form_cdata['qst_layout'] == 1) { echo ' selected'; } ?> value="1">Layout 1</option>
                                <option<?php if($form_cdata['qst_layout'] == 2) { echo ' selected'; } ?> value="2">Layout 2</option>
                            </select>
                        </div>
                        <?php $pre_text=($form_cdata['qst_layout']=='2')?'Number of Image':'Pre Text'; ?>
                        <div class="col-lg-6 pre_text_remove">
                            <label for="second_question"><?php echo $pre_text; ?></label>
                            <input type="text" name="second_question" value="<?php echo $form_cdata['second_question']; ?>" class="form-control" required>
                        </div>

                        <div class="col-lg-6">
                            <label for="imageQ_upload">Images(upload multiple at a time)</label>
                            <input type="file" multiple name="imageQ_uploads[]" class="form-control imageQ_upload" required>
                            <?php
                            if(!empty($form_cdata['imgs'])) {
                                foreach($form_cdata['imgs'] as $imgs) {
                                    ?>
                                    <img src="<?php echo $imgs; ?>" style="max-width: 100px; height: auto;" />
                                    <?php
                                }
                            }
                            ?>
                        </div>
                        <div class="col-lg-6">
                            <label for="ans_textbox">Answer</label>
                            <input type="text" name="ans_textbox" value="<?php echo $form_cdata['ans_textbox']; ?>" class="form-control" required>
                        </div>

                    </div>

                </div>

            </div>
            <div id="uploaded_images" style="display: none;"></div>
        </div>
    </div>
<?php } elseif($question_option=='34'){ ?>
<!---->
<div id="qOption_34">
	<div class="form-group">
		<div class="row" id="upload_images_section">
            <div class="col-lg-6">
                <label for="imageQ_upload">Question Image</label>
                <input type="file" name="imageQ_upload" class="form-control imageQ_upload">
                <img class="edit_question_img" src="<?php echo $form_cdata['img']; ?>" alt="">
                <input type="hidden" name="img" id="img" value="<?php echo $form_cdata['img']; ?>">
            </div>
            <div class="col-lg-12">
                <label for="second_question">Question</label>
                <input type="text" name="second_question" class="form-control" value="<?php echo $form_cdata['second_question']; ?>" required>
            </div>
			<div class="col-lg-6">
				<label for="upload_images">Upload Images</label>
				<input type="file" multiple name="upload_images[]" class="form-control upload_images">

			</div>
			<div class="col-lg-6"></div>
		</div>
		<div id="uploaded_images" style="display: none;"></div>
	</div>
</div>
<!---->
<?php } ?>
<!---->
