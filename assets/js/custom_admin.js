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
    /*var minutesLabel = document.getElementById("minutes");
    var secondsLabel = document.getElementById("seconds");*/

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
    });
    jQuery('body').on('click','.option_add_q',function (e) {
        e.preventDefault();
        var this_element=jQuery(this);
        var demo_html=jQuery(this_element).closest('.addQ_field_grp').find('#option_add_div').html();
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
    jQuery('body').on('click','.addQ_save',function(e){
       e.preventDefault();
        if(jQuery('#country_id').val()!='0' && jQuery('#subject_id').val()!='0' && jQuery('#grade_id').val()!='0' && jQuery('#category_id').val()!='0' && jQuery('#topic_id').val()!='0') {
            if(jQuery('#q_score').val()!='') {
                jQuery('#loading').show();
                var this_element = jQuery(this);

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
                    url: base_url + 'ajax/save_question',
                    processData: false,
                    contentType: false,
                    data: form_data,
                    success: function (data) {
                        //console.log(data);
                        if (data != '0') {
                            jQuery('#loading').hide();
                            parent.find('.question_id').val(data);
                        }
                        jQuery('#loading').hide();
                        jQuery('#add_row').show();
                        this_element.text('Update');
                    }
                });
            } else {
                alert('Please enter question marks!');
            }

       } else{
           alert('Please select all necessary value');
       }
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
                jQuery('#upload_images_section').hide();
                jQuery(this_element).closest('.addQ_field_grp').find('#uploaded_images').show();
                jQuery(this_element).closest('.addQ_field_grp').find('#uploaded_images').append(data);
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

    /*for GIGo Grid System*/

});


