<div id="qOption_1">
	<div class="form-group">
		<div class="row">
			<div class="col-lg-6">
				<label for="imageQ_upload">Image</label>
				<input type="file" name="imageQ_upload" class="form-control imageQ_upload">
                <span class="image_size_noti">Best Size for upload 250px X 145px</span>
			</div>
			<div class="col-lg-6">
				<label for="ans_textbox">Answer</label>
				<input type="text" name="ans_textbox" class="form-control ans_textbox">
			</div>
		</div>
	</div>
</div>
<!---->
<div id="qOption_2">
    <div class="form-group">
        <div class="row" id="upload_images_section">
            <div class="col-lg-6">
                <label for="upload_images">Upload Images</label>
                <input type="file" multiple name="upload_images[]" class="form-control upload_images">
                <span class="image_size_noti">Best Size for upload 150px X 150px</span>
            </div>
            <div class="col-lg-6"></div>
        </div>
        <div id="uploaded_images" style="display: none;"></div>
    </div>
</div>
<!---->
<div id="qOption_3">
    <div class="form-group">
        <div class="row">
            <div class="col-lg-6">
                <label for="imageQ_upload">Options</label>
                <div id="option_add_div">
                    <input type="text" name="option_1[]" class="form-control option_1">
                </div>
                <div id="option_add_div_app" class="option_add_div_app"></div>
                <a class="option_add_q" href="#"><span data-feather="plus-circle" title="Add Option"></span></a>
            </div>
            <div class="col-lg-6">
                <label for="ans_textbox">Answer</label>
                <input type="text" name="ans_textbox" class="form-control ans_textbox">
            </div>
        </div>
    </div>
</div>
<!---->
<!-- Question with Arranging Option -->
<div id="qOption_5">
    <div class="form-group">
        <div class="row">
            <div class="col-lg-12">
                <div class="arrange1">
                    <label>Answers</label>
                    <div id="option_add_div">
                        <input type="text" name="option_arrange[]" class="form-control option_arrange">
                    </div>
                    <div id="option_add_div_app" class="option_add_div_app"></div>
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
<div id="qOption_6">
    <div class="form-group">
        <div class="row">
            <div class="col-lg-6">
                <label for="imageQ_upload">Options</label>
                <div id="option_add_div">
                    <input type="text" name="option_1[]" class="form-control option_1">
                </div>
                <div id="option_add_div_app" class="option_add_div_app"></div>
                <a class="option_add_q" href="#"><span data-feather="plus-circle" title="Add Option"></span></a>
            </div>
            <div class="col-lg-6">
                <label for="ans_textbox">Answer</label>
                <input type="text" name="ans_textbox" class="form-control ans_textbox">
            </div>
        </div>
    </div>
</div>
<!-- SelectMultibleImages -->
<div id="qOption_8">
    <div class="form-group">
        <div class="row" id="upload_images_section">
            <div class="col-lg-6">
                <label for="upload_images">Upload Images</label>
                <input type="file" multiple name="upload_images[]" class="form-control upload_select_multiple_images">
                <span class="image_size_noti">Best Size for upload 150px X 150px</span>
            </div>
            <div class="col-lg-6"></div>
        </div>
        <div id="uploaded_images" style="display: none;"></div>
    </div>
</div>
<div id="qOption_9">
    <div class="form-group">
        <div class="row">
            <div class="col-lg-6">
                <label for="imageQ_upload">Options</label>
                <div id="option_add_div">
                    <input type="text" name="option_1[]" class="form-control option_1">
                </div>
                <div id="option_add_div_app" class="option_add_div_app"></div>
                <a class="option_add_q" href="#"><span data-feather="plus-circle" title="Add Option"></span></a>
            </div>
            <div class="col-lg-6">
                <label for="ans_textbox">Answer</label>
                <input type="text" name="ans_textbox" class="form-control ans_textbox">
            </div>
        </div>
    </div>
</div>
<div id="qOption_11">
    <div class="form-group">
        <div class="row">
            <div class="col-lg-6">
                <label for="ans_textbox">Answer</label>
                <input type="text" name="ans_textbox" class="form-control ans_textbox">
            </div>
            <div class="col-lg-6">

            </div>
        </div>
    </div>
</div>
<!-- Question With SVGImageWithOption -->
<div id="qOption_12">
    <div class="form-group">
        <div class="row">
            <div class="col-lg-6">
                <label for="num_box">Number of Box</label>
                <input type="number" name="num_box" class="form-control num_box">
                <br/>
                <a href="javascript:void(0);" class="btn add_row_save num_box_done"><!--<span data-feather="plus-archive"></span>--> Done</a>
            </div>
            <div class="col-lg-3">
                <div class="svg_box_wrap"></div>
            </div>
            <div class="col-lg-3">
                <div class="svg_image_wrap"></div>
            </div>
        </div>
        <br/>
        <div class="svg_box_wrap_image"></div>
        <br/>
        <div class="svg_how_many" style="display: none;">
            <div class="row">
                <div class="col-lg-6">
                    <label for="num_img">How many of the image do you want into the frame?</label>
                    <input type="number" name="ans_textbox" class="form-control num_img">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Question With TextBox And Option -->
<div id="qOption_13">
    <div class="form-group">
        <div class="row">
            <div class="col-lg-6">
                <label for="imageQ_upload">Options</label>
                <div id="option_add_div">
                    <input type="text" name="option_1[]" class="form-control option_1">
                </div>
                <div id="option_add_div_app" class="option_add_div_app"></div>
                <a class="option_add_q" href="#"><span data-feather="plus-circle" title="Add Option"></span></a>
            </div>
            <div class="col-lg-6">
                <label for="ans_textbox">Answer</label>
                <input type="text" name="ans_textbox" class="form-control ans_textbox">
            </div>
        </div>
    </div>
</div>
<!-- Question with Check Box -->
<div id="qOption_14">
    <div class="form-group">
        <div class="row">
            <div class="col-lg-12">
                <label>Answer</label>
                <input type="text" name="ans_textbox" class="form-control ans_textbox">
                <label>Check Boxes</label>
                <div id="option_add_div">
                    <input type="text" name="option_1[]" class="form-control option_1">
                </div>
                <div id="option_add_div_app" class="option_add_div_app"></div>
                <a style="float: right;" class="option_add_q" href="#"><span data-feather="plus-circle" title="Add Option"></span></a>
            </div>
        </div>
    </div>
</div>
<!---->
<div id="qOption_15">
    <div class="form-group">
        <div class="row" id="upload_images_section">
            <div class="col-lg-6">
                <label for="upload_images">Upload Images</label>
                <input type="file" multiple name="upload_images[]" class="form-control upload_images">
                <span class="image_size_noti">Best Size for upload 150px X 150px</span>
            </div>
            <div class="col-lg-6"></div>
        </div>
        <div id="uploaded_images" style="display: none;"></div>
    </div>
</div>
<!---->
<!---->
<div id="qOption_18">
    <div class="form-group">
        <div class="row">
            <div class="col-lg-6">
                <label for="ans_textbox">Answer 1</label>
                <input type="text" name="ans_textbox1" class="form-control ans_textbox">
                <br>
                <br>
                <label for="ans_textbox">Answer 2</label>
                <input type="text" name="ans_textbox2" class="form-control ans_textbox">
            </div>
            <div class="col-lg-6">

            </div>
        </div>
    </div>
</div>
<!--- --->
<div id="qOption_20">
    <div class="form-group">
        <div class="row" id="upload_images_section">
            <div class="col-lg-6">
                <label for="imageQ_upload">Image</label>
                <input type="file" name="imageQ_upload" class="form-control imageQ_upload">
                <span class="image_size_noti">Best Size for upload 250px X 150px</span>
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
                <a class="option_add_q" href="#"><span data-feather="plus-circle" title="Add Option"></span></a>
            </div>
        </div>
        <div id="uploaded_images" style="display: none;"></div>
    </div>
</div>
<!---->
<div id="qOption_26">
    <div class="form-group">
        <div class="row" id="upload_images_section">
            <div class="col-lg-6">
                <label for="imageQ_upload">Image</label>
                <input type="file" name="imageQ_upload" class="form-control imageQ_upload" required>
                <span class="image_size_noti">Best Size for upload 250px X 150px</span>
            </div>
            <div class="col-lg-6">
                <label for="ans_textbox">Answer</label>
                <input type="text" name="ans_textbox" class="form-control ans_textbox" required>
            </div>
            <div class="col-lg-6">
                <label for="imageQ_upload">Options</label>
                <div id="option_add_div">
                    <input type="text" name="option_1[]" class="form-control option_1" required>
                </div>
                <div id="option_add_div_app" class="option_add_div_app"></div>
                <a class="option_add_q" href="#"><span data-feather="plus-circle" title="Add Option"></span></a>
            </div>
        </div>
        <div id="uploaded_images" style="display: none;"></div>
    </div>
</div>
<!---->
<!---->
<div id="qOption_27">
    <div class="form-group">
        <div class="row">
            <div class="col-lg-6">
                <label for="num_box">Number of Box</label>
                <input type="number" name="put_num_box" class="form-control put_num_box">
                <br/>
                <a href="javascript:void(0);" class="btn add_row_save put_num_box_done"><!--<span data-feather="plus-archive"></span>-->Done</a>
            </div>
            <div class="col-lg-6">
                <div class="put_num_boxes_wrap"></div>
            </div>
        </div>
        <br/>
        <br/>
        <div class="row upload_images_section" style="display: none;">
            <div class="col-lg-6">
                <label for="upload_images">Upload Pattern Images</label>
                <input type="file" multiple name="upload_images[]" class="form-control question_with_put_images">
                <span class="image_size_noti">Best Size for upload 50px X 50px</span>
                <br/>
                <a href="javascript:void(0);" class="btn add_row_save question_with_put_images_done"><!--<span data-feather="plus-archive"></span>-->Done</a>
            </div>
            <div class="col-lg-6">
                <div class="Put_uploaded_images" style="display: none;"></div>
            </div>
        </div>
        <input class="question_textbox" type="hidden" name="question_textbox" value=""/>
        <input class="ans_textbox" type="hidden" name="ans_textbox" value=""/>
    </div>
</div>
<!---->
<!--- --->
<div id="qOption_28">
    <div class="form-group">
        <div class="row" id="upload_images_section">
            <div class="col-lg-6">
                <label for="imageQ_upload">Question Image</label>
                <input type="file" name="imageQ_upload" class="form-control imageQ_upload" required>
                <span class="image_size_noti">Best Size for upload 250px X 150px</span>
            </div>
            <div class="col-lg-12">
                <label for="second_question">Question</label>
                <input type="text" name="second_question" class="form-control" required>
            </div>
            <div class="col-lg-6">
                <label for="upload_images">Answer One</label>
                <input type="text" name="ans_textbox1" class="form-control" required>
            </div>
            <div class="col-lg-6">
                <label for="upload_images">Answer Two</label>
                <input type="text" name="ans_textbox2" class="form-control" required>
            </div>
        </div>
        <div id="uploaded_images" style="display: none;"></div>
    </div>
</div>
<!---->
<div id="qOption_29">
    <div class="form-group">
        <div class="row">
            <div class="col-lg-6">
                <label for="base_image">Base Image</label>
                <input type="file" name="base_image" class="form-control base_image ans_textbox">
                <span class="image_size_noti">Best Size for upload 350px X 350px</span>
            </div>
            <div class="col-lg-6">
                <div class="drag_drop_img"></div>
            </div>
        </div>
        <div class="row extra_img" style="display: none;">
            <div class="col-lg-6">
                <label for="extra_image">Extra Image</label>
                <input type="file" name="extra_image" class="form-control extra_image ans_textbox">
            </div>
            <div class="col-lg-6">
                <div class="drag_drop_extra_image"></div>
            </div>
        </div>
        <div class="row extra_img_num" style="display: none;">
            <div class="col-lg-6">
                <label for="extra_image">Number of extra Images on the Base Image</label>
                <input type="number" name="ans_textbox" class="form-control ans_textbox">
            </div>
        </div>
    </div>
</div>
<!--- --->
<!--- --->
<div id="qOption_31">
    <div class="form-group">
        <div class="row" id="upload_images_section">
            <div class="col-lg-12">
                <label for="imageQ_upload">Question Pre Text</label>
                <input type="text" name="ans_check_with" class="form-control" required>
            </div>

            <div id="option_add_div">
                    <div class="row">
                    <div class="col-lg-6">
                        <label for="imageQ_upload">Question Image</label>
                        <input type="file" name="imageQ_uploads[]" class="form-control imageQ_upload" required>
                        <span class="image_size_noti">Best Size for upload 80px X 50px</span>
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
<!--- --->
<div id="qOption_32">
    <div class="form-group">
        <div class="row" id="upload_images_section">
            <div class="col-lg-12">
                <label for="question_area">Answer <span style="color: red;">(Denote the textboxes by wrapping the element in [ ])
                    </span></label>
                <textarea rows="8" class="form-control textarea-no-styles" id="question_area" name="ans_textbox1"></textarea>
            </div>
        </div>
    </div>
</div>
<!--- --->
<div id="qOption_33">
    <div class="form-group">
        <div class="row" id="upload_images_section">

            <div id="option_add_div">
                <div class="row">
                    <div class="col-lg-6">
                        <label for="qst_layout">Question Layout</label>
                        <select name="qst_layout" id="qst_layout" class="form-control" required>
                            <option value="0">-----Choose-----</option>
                            <option value="1">Layout 1</option>
                            <option value="2">Layout 2</option>
                        </select>
                    </div>
                    <div class="col-lg-6 pre_text_remove">
                        <label for="second_question">Pre text</label>
                        <input type="text" name="second_question" class="form-control" required>
                    </div>

                    <div class="col-lg-6">
                        <label for="imageQ_upload">Images(upload multiple at a time)</label>
                        <input type="file" multiple name="imageQ_uploads[]" class="form-control imageQ_upload" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="ans_textbox">Answer</label>
                        <input type="text" name="ans_textbox" class="form-control" required>
                    </div>

                </div>

            </div>

        </div>
        <div id="uploaded_images" style="display: none;"></div>
    </div>
</div>
<!--- --->
<!--- --->
<div id="qOption_34">
    <div class="form-group">

        <div id="uploaded_images" style="display: none;"></div>
        <div class="row" id="upload_images_section">
            <div class="col-lg-6">
                <label for="imageQ_upload">Question Image</label>
                <input type="file" name="imageQ_upload" class="form-control imageQ_upload" required>
            </div>
            <div class="col-lg-6">
                <label for="second_question">Pre text</label>
                <input type="text" name="second_question" class="form-control" required>
            </div>
            <div class="col-lg-12">
                <label for="imageQ_upload">Answer Images(upload multiple at a time)</label>
                <input type="file" multiple name="upload_images[]" class="form-control upload_images">
            </div>
        </div>
        <div id="uploaded_images" style="display: none;"></div>
    </div>
</div>
<!--- --->
<div id="qOption_35">
    <div class="form-group">
        <div id="uploaded_images" style="display: none;"></div>
        <div class="row" id="upload_images_section">
            <div class="col-lg-6">
                <label for="imageQ_upload">Question Background Image</label>
                <input type="file" name="imageQ_bg_upload" class="form-control imageQ_bg_upload" required>
            </div>
        </div>
        <div class="imageQ_bg_img_wrap" style="display: none; position: relative;"></div>
        <br/>
        <br/>
        <div class="row imageQ_multiple_image_wrap" style="display: none">
            <div class="col-lg-6">
                <label for="imageQ_upload">Upload Images</label>
                <input type="file" name="upload_images[]" multiple class="form-control
                imageQ_multiple_image" required>
            </div>
        </div>
        <!--<input type="hidden" name="ans_textbox" class="ans_textbox">-->
        <input class="question_textbox" type="hidden" name="question_textbox" value=""/>
        <div class="imageQ_multiple_image_show_wrap" style="display: none;"></div>
    </div>
</div>
<!---->
<div id="combination_add_row_demo">
    <div class="add_question_row">
        <div class="row_delete">
            <a class="deletQ_row" href="#" title="Delete"><span data-feather="delete"></span></a>
        </div>
        <form action="" class="addQ_form" enctype="multipart/form-data">
            <div class="addQ_field_grp">
                <div class="form-group">
                    <div class="row">
                        <div class="col-lg-12">
                            <input type="hidden" name="question_id" class="question_id">
                            <label for="question">Question</label>
                            <input class="form-control question" name="question" id="question" type="text">
                        </div>

                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="question">Question Option</label>
			                <?php echo form_dropdown('question_option',form_dropdown_cr(array('option_id','option_name'),'question_option'),'',array('class'=>'form-control questions_option_drop','required'=>true)); ?>
                        </div>
                        <div class="col-lg-6">
                            <label for="q_score">Question Marks</label>
                            <input class="form-control" name="q_score" id="q_score" type="number" required>
                        </div>
                        <br>
                        <br>
                        <br>
                        <br>
                        <div style="width: 100%; margin: 10px 0;">
                            <label for="qRight_feedback">If Answer Right</label>
                            <input type="text" class="form-control" name="qRight_feedback" id="qRight_feedback">
                        </div>
                        <div style="width: 100%; margin: 10px 0;">
                            <label for="qRight_feedback">If Answer Wrong (explanation)</label>
                            <textarea class="form-control tynimce" name="qWrong_feedback" id="qWrong_feedback"></textarea>
                        </div>
                        <div class="col-lg-6">
                            <div class="add_dynamic_field">

                            </div>

                            <!--<label for="question">Question Type</label>
							--><?php /*echo form_dropdown('question_type',form_dropdown_cr(array('type_id','type_name'),'question_type'),'',array('class'=>'form-control')); */?>
                        </div>

                    </div>
                </div>
                <div class="question_wrap"></div>
            </div>
            <!--<a href="javascript:void(0)" class="btn add_row_save addQ_preview"><span data-feather="eye"></span> Preview</a>-->
            <a href="javascript:void(0)" class="btn add_row_save addQ_save"><span data-feather="save"></span> Save</a>
        </form>
    </div>
</div>
<style>
    #sortable { list-style-type: none; margin: 0; padding: 0; }
    #sortable li { margin: 0 3px 3px 3px; padding: 12px; padding-left: 1.5em; font-size: 1.4em; height: 18px; line-height: 0; }
    #sortable li span { position: absolute; margin-left: -1.3em; }
</style>