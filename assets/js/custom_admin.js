/*function slug_create(inpitval,replacetInput){
    var slug_text=$(inpitval).val().trim();
    if(slug_text.length>0){
        slug_text = slug_text.toLowerCase();
        slug_text=slug_text.replace(/[^a-zA-Z0-9 ]+/g,"");
        slug_text=slug_text.replace(/\s+/g, "-");
        $.ajax({
            url:base_url+'ajax/get_category_slug_ajax',
            data:{slug:slug_text},
            type:'post',
            success:function(res){
                $('#'+replacetInput).val(res);
            }
        })
        //$('#slug').val(slug_text);
    }
}*/
jQuery('#grade_name').change(function(){
    var slug_text=jQuery(this).val().trim();
    if(slug_text.length>0){
        slug_text = slug_text.toLowerCase();
        slug_text=slug_text.replace(/[^a-zA-Z0-9 ]+/g,"");
        slug_text=slug_text.replace(/\s+/g, "-");
        jQuery('#short_name').val(slug_text);
    }
});
function delete_data(id,check_field,table_name){
    var current_location=window.location.href;
    swal({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!',
        showLoaderOnConfirm: true,
        preConfirm: function() {
            return new Promise(function(resolve) {
                jQuery.ajax({
                    url: base_url + 'ajax/delete_data',
                    type: 'POST',
                    data: {id: id, check_field: check_field, table_name: table_name},
                    dataType: 'json'
                })
                    .done(function(response){
                        swal('Deleted!', response.message, response.status);
                        window.location.href=current_location;
                        window.location.reload();
                        //readProducts();
                    })
                    .fail(function(){
                        swal('Oops...', 'Something went wrong with ajax !', 'error');
                    });
            });
        },
        allowOutsideClick: false
    });
}
function SwalDelete(productId){

}

jQuery(document).ready(function() {
    initializetinymce();
    // tynimce add
    function initializetinymce(){
        tinymce.init({
            selector: ".tynimce:not(.textarea-no-styles)",
            height: 200,
            theme: 'modern',
            plugins: 'print preview fullpage searchreplace autolink directionality visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount imagetools  contextmenu colorpicker textpattern help code',
            toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat | code',
            image_advtab: true,
            templates: [
                { title: 'Test template 1', content: 'Test 1' },
                { title: 'Test template 2', content: 'Test 2' }
            ],
            content_css: [
                '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
                '//www.tinymce.com/css/codepen.min.css'
            ]
        });
    }


    /*var minutesLabel = document.getElementById("minutes");
    var secondsLabel = document.getElementById("seconds");*/
    jQuery('body').on('click','a.addQ_row_multiple', function (e) {
        e.preventDefault();
        var this_element = jQuery(this);
        if(jQuery('#add_row_counter').val()!='') {
            var row_counter=jQuery('#add_row_counter').val();
            var demo_html ='';
            for(var i=0; i<row_counter; i++ ){
                if(demo_html==''){
                    demo_html = jQuery('#combination_add_row_demo').html();
                } else{
                    demo_html += jQuery('#combination_add_row_demo').html();
                }
            }
            jQuery('#add_row').append(demo_html);
            jQuery('#add_row_counter').val('');
            var ed = tinymce.get('content');
            ed.render();
            //tinymce.remove();
            //initializetinymce();
        }
        //this_element.hide();

    });
    jQuery('body').on('click','a.addQ_row', function (e) {
        e.preventDefault();
        var this_element=jQuery(this);
        var demo_html=jQuery('#combination_add_row_demo').html();
        jQuery('#add_row').append(demo_html);
        //this_element.hide();

    });
    jQuery('body').on('click', 'a.deletQ_row', function(e){
        e.preventDefault();
        var this_element = jQuery(this);
        jQuery(this_element).closest('.add_question_row').remove();
    });
    jQuery('body').on('change', '.questions_option_drop', function(e){
        e.preventDefault();

        var this_element = jQuery(this);
        var id = this_element.val();
        var html = jQuery('#qOption_'+id).html();
        //html=combinations(id);
        jQuery(this_element).closest('.addQ_field_grp').find('.question_wrap').html('');
        jQuery(this_element).closest('.addQ_field_grp').find('.question_wrap').html(html);
        if(jQuery('#question_area').length){
            tinymce.remove();
            initializetinymce();
        }
    });
    jQuery('body').on('click','.option_add_q',function (e) {
        e.preventDefault();
        var this_element=jQuery(this);
        var demo_html=jQuery(this_element).closest('.addQ_field_grp').find('#option_add_div').html();
        jQuery(this_element).prev('.option_add_div_app').append(demo_html);

    });
    jQuery('body').on('click','.option_edit_q',function (e) {
        e.preventDefault();
        var this_element=jQuery(this);
        var demo_html=jQuery('#edit_option_input_add').html();
        jQuery(this_element).prev('.option_add_div_app').append(demo_html);

    });
    jQuery('body').on('click','.option_done',function (e) {
        e.preventDefault();
        var this_element=jQuery(this);
        jQuery('.arrange1').hide();
        jQuery('.arrange2').show();
        var html = '<ul id="sortable">';
        jQuery(this_element).closest('.addQ_field_grp').find('.option_arrange').each(function(){
            html = html+'<li class="ui-state-default"><input type="hidden" name="option_dearrange[]" value="'+jQuery(this).val()+'"/>'+jQuery(this).val()+'</li>';
        });
        html = html+'</ul>';
        jQuery('.arrange2').append(html);
        jQuery( "#sortable" ).sortable();
        jQuery( "#sortable" ).disableSelection();

    });
    jQuery('body').on('click','.addQ_preview',function (e) {
        e.preventDefault();
        //alert('hello');
        var html_c;
        var this_element = jQuery(this);
        var parent=this_element.parent();
        jQuery('#exampleModal').modal('show');
        var option =(parent).find('.questions_option_drop').val();
        //alert(option);
        if(option!=0){
            if(option==1){
                var question =(parent).find('.question').val();
                html_c
                html_c='<h4>'+question+'</h4>';
            }

        } else{
            html_c='<h4>Please select an option to see preview!</h4>';
        }


        console.log(parent);
        jQuery('#myModal_body').html(html_c);

    });
    jQuery('body').on('change','#qst_layout',function(e){
        var this_element = jQuery(this);
        var parent = this_element.closest('.add_question_row');
        if(this_element.val()=='2'){

            jQuery(parent).find('.pre_text_remove').html('<label for="second_question">Number of Image</label>\n' +
                '                        <input type="text" name="second_question" class="form-control" required>');
        } else{
            jQuery(parent).find('.pre_text_remove').html('<label for="second_question">Pre text</label>\n' +
                '                        <input type="text" name="second_question" class="form-control" required>');
        }

        //jQuery('.pre_text_remove')
    });
    jQuery('body').on('click','.addQ_save',function(e){
        e.preventDefault();
        jQuery('#loading').show();
        var this_element = jQuery(this);

        tinymce.triggerSave();

        var country_id = jQuery('#country_id').val();
        var subject_id = jQuery('#subject_id').val();
        var grade_id = jQuery('#grade_id').val();
        var category_id = jQuery('#category_id').val();
        var topic_id = jQuery('#topic_id').val();
        var parent = this_element.closest('.add_question_row');
        var questions_option_drop = parent.find('.questions_option_drop').val();
        var form_data = new FormData(parent.find('.addQ_form')[0]);
        form_data.append('country_id', country_id);
        form_data.append('subject_id', subject_id);
        form_data.append('grade_id', grade_id);
        form_data.append('category_id', category_id);
        form_data.append('topic_id', topic_id);
        if(questions_option_drop=='33' && form_data['qst_layout']=='1'){
            var fileUpload = jQuery("#qst_layout");
            if (parseInt(fileUpload.get(0).files.length) > 2){
                alert("You are only allowed to upload a maximum of 2 files");
                exit();
            }
        }
        jQuery.ajax({
            type: "POST",
            url: base_url + 'ajax/save_question',
            processData: false,
            contentType: false,
            data: form_data,
            success: function (data) {
                //console.log(data);
                jQuery('input').css('border-width', '1px');
                jQuery('input').css('border-color', '#ced4da');

                jQuery('select').css('border-width', '1px');
                jQuery('select').css('border-color', '#ced4da');

                if(isNaN(data)) {
                    jQuery('#loading').hide();
                    var json = JSON.parse(data);
                    if(jQuery.isArray(json)) {
                        if (json.length != 0) {
                            jQuery.each(json, function (key, value) {
                                jQuery('input[name="' + value + '"]').css('border-width', '2px');
                                jQuery('input[name="' + value + '"]').css('border-color', 'red');

                                jQuery('select[name="' + value + '"]').css('border-width', '2px');
                                jQuery('select[name="' + value + '"]').css('border-color', 'red');

                                jQuery('#' + value).css('border-width', '2px');
                                jQuery('#' + value).css('border-color', 'red');
                            });
                            alert('Please fill all the fields.')
                        }
                    }
                } else {
                    if (data != '0') {
                        jQuery('#loading').hide();
                        parent.find('.question_id').val(data);
                    }
                    jQuery('#loading').hide();
                    jQuery('#add_row').show();
                    this_element.hide();
                }
            }
        });
    });
    jQuery('body').on('click','.addQ_edit',function(e){
        e.preventDefault();
        jQuery('#loading').show();
        var this_element = jQuery(this);

        tinymce.triggerSave();

        var country_id = jQuery('#country_id').val();
        var subject_id = jQuery('#subject_id').val();
        var grade_id = jQuery('#grade_id').val();
        var category_id = jQuery('#category_id').val();
        var topic_id = jQuery('#topic_id').val();
        var parent = this_element.closest('.add_question_row');
        var questions_option_drop = parent.find('.questions_option_drop').val();
        var form_data = new FormData(parent.find('.addQ_form')[0]);
        form_data.append('country_id', country_id);
        form_data.append('subject_id', subject_id);
        form_data.append('grade_id', grade_id);
        form_data.append('category_id', category_id);
        form_data.append('topic_id', topic_id);

        jQuery.ajax({
            type: "POST",
            url: base_url + 'ajax/edit_question',
            processData: false,
            contentType: false,
            data: form_data,
            success: function (data) {
                //console.log(data);
                jQuery('input').css('border-width', '1px');
                jQuery('input').css('border-color', '#ced4da');

                jQuery('select').css('border-width', '1px');
                jQuery('select').css('border-color', '#ced4da');

                if(isNaN(data)) {
                    jQuery('#loading').hide();
                    var json = JSON.parse(data);
                    if(jQuery.isArray(json)) {
                        if (json.length != 0) {
                            jQuery.each(json, function (key, value) {
                                jQuery('input[name="' + value + '"]').css('border-width', '2px');
                                jQuery('input[name="' + value + '"]').css('border-color', 'red');

                                jQuery('select[name="' + value + '"]').css('border-width', '2px');
                                jQuery('select[name="' + value + '"]').css('border-color', 'red');

                                jQuery('#' + value).css('border-width', '2px');
                                jQuery('#' + value).css('border-color', 'red');
                            });
                            alert('Please fill all the fields.')
                        }
                    }
                } else {
                    if (data != '0') {
                        //jQuery('#loading').hide();
                        //parent.find('.question_id').val(data);
                        location.reload();
                    }
                    jQuery('#loading').hide();
                    jQuery('#add_row').show();
                    this_element.hide();
                }
            }
        });

    });

    jQuery('body').on('change', '.upload_images', function(e){
        e.preventDefault();
        var this_element=jQuery(this);
        var parent = this_element.closest('.add_question_row');
        var form_data = new FormData(parent.find('.addQ_form')[0]);
        jQuery.ajax({
            type: "POST",
            url: base_url + 'ajax/upload_images_and_options',
            processData: false,
            contentType: false,
            data: form_data,
            success: function (data) {
                //jQuery('#upload_images_section').hide();
                jQuery(this_element).closest('.addQ_field_grp').find('#uploaded_images').show();
                jQuery(this_element).closest('.addQ_field_grp').find('#uploaded_images').html(data);
            }
        });
    });

    jQuery('body').on('change', '.upload_select_multiple_images', function(e){
        e.preventDefault();
        var this_element=jQuery(this);
        var parent = this_element.closest('.add_question_row');
        var form_data = new FormData(parent.find('.addQ_form')[0]);
        jQuery.ajax({
            type: "POST",
            url: base_url + 'ajax/SelectMultibleImages',
            processData: false,
            contentType: false,
            data: form_data,
            success: function (data) {
                jQuery('#upload_images_section').hide();
                jQuery(this_element).closest('.addQ_field_grp').find('#uploaded_images').show();
                jQuery(this_element).closest('.addQ_field_grp').find('#uploaded_images').append(data);
            }
        });
    });

    jQuery('body').on('click', '.num_box_done', function(e){
        e.preventDefault();
        var this_element = jQuery(this);
        var parent = this_element.closest('.add_question_row');
        var num_box = jQuery(parent).find('.num_box').val();
        if(num_box > 0) {
            var text = '<div class="svgBoxes">';
            for (var i = 0; i < num_box; i++) {
                text = text + '<div class="svgBox"></div>';
            }
            text = text+'</div>';

            var textImg = '<div class="row"><div class="col-lg-12"><label for="svgBoximg">Upload image</label><input name="svgBoximg" type="file"' +
                ' class="form-control svgBoximg" accept="image/svg" /></div></div>';
        }
        jQuery(parent).find('.svg_box_wrap').html(text);
        jQuery(parent).find('.svg_box_wrap_image').html(textImg);
    });

    jQuery('body').on('change', '.svgBoximg', function(e){
        e.preventDefault();
        var this_element = jQuery(this);
        var parent = this_element.closest('.add_question_row');
        var form_data = new FormData(parent.find('.addQ_form')[0]);
        jQuery.ajax({
            type: "POST",
            url: base_url + 'ajax/svgBoximg',
            processData: false,
            contentType: false,
            dataType: 'json',
            data: form_data,
            success: function (data) {
                jQuery(parent).find('.svg_image_wrap').html('<div><img src="'+data[0].src+'" style="width: 50px; height: 50px;"/></div>');
                jQuery('.svg_how_many').show();
            }
        });
    });

    /*for GIGo Grid System*/

});


