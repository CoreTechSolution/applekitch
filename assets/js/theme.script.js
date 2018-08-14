jQuery(function($){
    jQuery('.nav').slicknav({
        prependTo:'#rspnavigation',
        label:''
    });

    jQuery('.fancybox-media').fancybox({
        openEffect  : 'none',
        closeEffect : 'none',
        maxWidth	: 800,
        maxHeight	: 600,
        helpers : {
            media : {}
        }
    });


    $('.matchHeight1').matchHeight();
    $('.matchHeight2').matchHeight();
    $('.matchHeight3').matchHeight();

    jQuery('.testimonials').bxSlider({
        auto: true,
        pager: false,
        minSlides: 1,
        maxSlides: 2,
        slideWidth: 530,
        moveSlides: 1,
        slideMargin: 20,
        infiniteLoop: true,
        /*nextSelector: '#slider-next3',
        prevSelector: '#slider-prev3',*/
        nextText: '<img src="/assets/images/right-arrow.png">',
        prevText: '<img src="/assets/images/left-arrow.png">'
    });
});

jQuery(document).ready(function(){
    jQuery.noConflict();
    var totalSeconds = 0;
   var my_time_interval= setInterval(setTime, 1000);

    function setTime() {
        ++totalSeconds;
        var seconds = pad(totalSeconds % 60);
        var munites= pad(parseInt(totalSeconds / 60)%60);
        var hours= pad(parseInt((totalSeconds / 60)/60));
        var timestring=hours+':'+munites+':'+seconds;
        //console.log(timestring);
        jQuery('.score_time_count_hr').html(hours);
        jQuery('.score_time_count_min').html(munites);
        jQuery('.score_time_count_sec').html(seconds);
    }

    function pad(val) {
        var valString = val + "";
        if (valString.length < 2) {
            return "0" + valString;
        } else {
            return valString;
        }
    }
    jQuery('body').on('click', '#stop_question_timer', function(e) {
        e.preventDefault();
        var this_element=jQuery(this);
        if(this_element.text()=='Stop'){
            clearInterval(my_time_interval);
            this_element.text('Start');
        } else{
            var my_time_interval= setInterval(setTime, 1000);
            this_element.text('Stop');
        }

    });
    jQuery('body').on('click', '.qSubmit', function(e) {
        e.preventDefault();
        jQuery('#loading').show();
        clearInterval(my_time_interval);
        jQuery('.qAns_form').hide();
        var this_element=jQuery(this);
        var form_data = new FormData(jQuery('.qAns_form')[0]);
        var answred =jQuery('.score_ans').find('.content').text();
        var score =jQuery('.score_smart').find('.content').text();
        var score_time_count_hr =jQuery('.score_time').find('.score_time_count_hr').text();
        var score_time_count_min =jQuery('.score_time').find('.score_time_count_min').text();
        var score_time_count_sec =jQuery('.score_time').find('.score_time_count_sec').text();
        form_data.append('answred', answred);
        form_data.append('score', score);
        form_data.append('score_time_count_hr', score_time_count_hr);
        form_data.append('score_time_count_min', score_time_count_min);
        form_data.append('score_time_count_sec', score_time_count_sec);
        var totalSubmitTime=(score_time_count_hr*60*60)+(score_time_count_min*60)+score_time_count_sec;
        form_data.append('total_time_inSecond', totalSubmitTime);
        jQuery.ajax({
            type: "POST",
            url: base_url + 'ajax/question_submit',
            processData: false,
            contentType: false,
            data: form_data,
            dataType: 'json',
            success: function (data) {
                jQuery('#loading').hide();
                jQuery('#ans_label').slideToggle();
                jQuery('.qAns_form').html('');
                if (data['type'] != 'true') {
                    jQuery('#ans_label').removeClass();
                    jQuery('#ans_label').addClass('wAns');
                    jQuery('#ans_label').html(data['content']);
                    jQuery('.score_ans').find('.content').html(data['score_ans']);
                    jQuery('.score_smart').find('.content').html(data['score_smart']);

                } else{
                    jQuery('#ans_label').removeClass();
                    jQuery('#ans_label').addClass('cAns');
                    jQuery('#ans_label').html(data['content']);
                    jQuery('.score_ans').find('.content').html(data['score_ans']);
                    jQuery('.score_smart').find('.content').html(data['score_smart']);
                }
                setTimeout(function() {
                    jQuery("#ans_label").slideToggle();
                    jQuery('.qAns_form').show();
                    my_time_interval= setInterval(setTime, 1000);
                    if(data['html']==''){
                        var tQ_attend= jQuery('.score_ans').find('.content').html();
                        var qScore=jQuery('.score_smart').find('.content').html();
                        var total_time=data['total_time'];
                        var tQ_score=data['tQ_score'];
                        var user_name=data['user_name'];
                        var grade=data['grade'];
                        var subject=data['subject'];
                        var score_persentage=100*(qScore/tQ_score);
                        //console.log(qScore);
                        //console.log(tQ_score);

                        var html='<div class="result_show">';
                        html+='<table class="table table-bordered table-result">';
                        html+='<tr>' +
                            '<th>Name</th>' +
                            '<td>'+ user_name +'</td>' +
                            '</tr>' +
                            '<tr>' +
                            '<th>Grade</th>' +
                            '<td>' + grade + '</td>' +
                            '</tr>' +
                            '<tr>' +
                            '<th>Subject</th>' +
                            '<td>'+ subject +'</td>' +
                            '</tr>' +
                            '<tr>' +
                            '<th>Total Question attend</th>' +
                            '<td>'+ tQ_attend +'</td>' +
                            '</tr>' +
                            '<tr>' +
                            '<th>Score</th>' +
                            '<td>'+score_persentage+' %</td>' +
                            '</tr>';
                        html+='</table>';
                        html+='</div>';

                        jQuery('.qAns_form').html(html);
                        clearInterval(my_time_interval);
                    }else{
                        jQuery('.qAns_form').html(data['html']);
                        jQuery( "#sortable" ).sortable();
                        jQuery( "#sortable" ).disableSelection();
                    }

                }, 5000);
                //jQuery('#ans_label').hide().delay(8000);

            }
        });

    });
    var width = jQuery(window).width();

    var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
    jQuery(window).scroll(function () {
        var sc = jQuery(window).scrollTop();
        //console.log(sc);
        if(width>768){
            if (sc < 100) {
                jQuery("#headerSectionWrapper").removeClass("wrapper1boxShadow");
            } else {
                jQuery("#headerSectionWrapper").addClass("wrapper1boxShadow");
            }
        }
    });

    jQuery('#login_form').validate({
        rules: {
            email_id: {
                required: true,
                email: true
            },
            pwd:{
                required: true
            }
        },
        messages: {

        }
    });

    jQuery('#register_form').validate({
        rules: {
            fname: {
                required: true
            },
            lname: {
                required: true
            },
            email_address: {
                required: true,
                email: true
            },
            pwd1:{
                required: true,
                minlength: 8
            },
            pwd2:{
                required: true,
                minlength: 8,
                equalTo: '#pwd1'
            },
            terms:{
                required: true,
            }
        },
        messages: {

        }
    });

    jQuery('#birthdate').datetimepicker({
        timepicker: false,
        format:'m/d/Y',
        maxDate:'+1970/01/01'
    });

    jQuery('#forgot_password').validate({
        rules: {
            email_id: {
                required: true,
                email: true
            }
        },
        messages: {

        }
    });
    jQuery('#manage_profile').validate({
        rules: {
            fname: {
                required: true
            },
            lname: {
                required: true
            },
            email_address: {
                required: true,
                email: true
            },
            pwd1:{
                minlength: 8
            },
            pwd2:{
                minlength: 8,
                equalTo: '#pwd1'
            }
        },
        messages: {

        }
    });
    jQuery('#reset_password').validate({
        rules: {
            pwd1:{
                required: true,
                minlength: 8
            },
            pwd2:{
                required: true,
                minlength: 8,
                equalTo: '#pwd1'
            }
        },
        messages: {

        }
    });

    jQuery('#manage_profile').validate({
        rules: {
            fname: {
                required: true
            },
            lname: {
                required: true
            },
            email_address: {
                required: true,
                email: true
            },
            pwd1:{
                minlength: 8
            },
            pwd2:{
                minlength: 8,
                equalTo: '#pwd1'
            }
        },
        messages: {

        }
    });

    jQuery('#add_child_form').validate({
        rules: {
            fname: {
                required: true
            },
            lname: {
                required: true
            },
            email: {
                required: true,
                email: true
            },
            password:{
                required: true,
                minlength: 8
            }
        },
        messages: {

        }
    });

    jQuery('#edit_child_form').validate({
        rules: {
            fname: {
                required: true
            },
            lname: {
                required: true
            },
            email: {
                required: true,
                email: true
            },
            password:{
                minlength: 8
            }
        },
        messages: {

        }
    });

    jQuery('.user_type_wrap label').on('click', function() {
        var this_element = jQuery(this);
        jQuery('.user_type_wrap label').each(function() {
            jQuery(this).removeClass('active');
        });
        jQuery(this_element).addClass('active');
    });
    jQuery('.table').footable();

    jQuery('.tooltip').tooltipster({
        animation: 'fade',
        delay: 200,
        theme: 'tooltipster-punk',
        trigger: 'click'
    });

    jQuery('body').on('click', '.imgselector img', function(e){
        e.preventDefault();
        var this_element = jQuery(this);
        jQuery('.imgselector img').addClass('img-thumbnail');
        jQuery('.imgselector img').removeClass('selectedImg');

        jQuery(this_element).addClass('selectedImg');
        jQuery(this_element).removeClass('img-thumbnail');
        var selected_answer = jQuery(this_element).data('img_name');
        jQuery('#img_answer').val(selected_answer);
    });

    jQuery('body').on('click', '.imgselectorMultiple img', function(e){
        e.preventDefault();
        var this_element = jQuery(this);
        if(jQuery(this_element).hasClass('selectedImg')) {
            jQuery(this_element).addClass('img-thumbnail');
            jQuery(this_element).removeClass('selectedImg');
        } else {
            jQuery(this_element).addClass('selectedImg');
            jQuery(this_element).removeClass('img-thumbnail');
        }
        var selected_answer = jQuery(this_element).data('img_name');
        if(jQuery('#img_answer').val() == '') {
            jQuery('#img_answer').val(selected_answer);
        } else {
            jQuery('#img_answer').val(jQuery('#img_answer').val()+','+selected_answer);
        }
    });
});
jQuery("#button").click(function() {
    jQuery('html, body').animate({
        scrollTop: jQuery("#wrapper3").offset().top
    }, 2000);
});
//new WOW().init();