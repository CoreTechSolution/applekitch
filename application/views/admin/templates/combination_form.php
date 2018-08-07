<div id="qOption_1">
	<div class="form-group">
		<div class="row">
			<div class="col-lg-6">
				<label for="imageQ_upload">Image</label>
				<input type="file" name="imageQ_upload" class="form-control imageQ_upload">
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
        <div class="row">
            <div class="col-lg-6">
                <label for="imageQ_upload">Upload Images</label>
                <input type="file" multiple name="imageQ_upload" class="form-control imageQ_upload">
            </div>
            <div class="col-lg-6">
                <!--<label for="ans_textbox">Answer</label>
                <input type="text" name="ans_textbox" class="form-control ans_textbox">-->
            </div>
        </div>
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
							<?php echo form_dropdown('question_option',form_dropdown_cr(array('option_id','option_name'),'question_option'),'',array('class'=>'form-control questions_option_drop')); ?>
                        </div>
                        <div class="col-lg-6">

                            <!--<label for="question">Question Type</label>
							--><?php /*echo form_dropdown('question_type',form_dropdown_cr(array('type_id','type_name'),'question_type'),'',array('class'=>'form-control')); */?>
                        </div>
                    </div>
                </div>
            </div>
            <a href="javascript:void(0)" class="btn add_row_save addQ_preview"><span data-feather="eye"></span> Preview</a>
            <a href="javascript:void(0)" class="btn add_row_save addQ_save"><span data-feather="save"></span> Save</a>
        </form>
    </div>
</div>