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
<!-- SelectMultibleImages -->
<?php } elseif($question_option=='7'){ ?>

<?php } elseif($question_option=='8'){ ?>
<div id="qOption_8">
	<div class="form-group">
		<div class="row" id="upload_images_section">
			<div class="col-lg-6">
				<label for="upload_images">Upload Images</label>
				<input type="file" multiple name="upload_images[]" class="form-control upload_select_multiple_images">
			</div>
			<div class="col-lg-6"></div>
		</div>
		<div id="uploaded_images" style="display: none;"></div>
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
		<div id="uploaded_images" style="display: none;"></div>
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
			</div>
			<div class="col-lg-6">
				<label for="ans_textbox">Answer</label>
				<input type="text" name="ans_textbox" class="form-control ans_textbox">
			</div>
			<div class="col-lg-6">
				<label for="imageQ_upload">Options</label>
				<div id="option_add_div">
					<input type="text" name="option_1[]" class="form-control option_1">
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
                    <label for="second_question">Question</label>
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
<?php } ?>
<!---->
