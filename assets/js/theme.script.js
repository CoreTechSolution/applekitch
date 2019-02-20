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
        nextText: '<img src="'+base_url+'/assets/images/right-arrow.png">',
        prevText: '<img src="'+base_url+'/assets/images/left-arrow.png">'
    });
});

jQuery(document).ready(function(){
    /*jQuery.noConflict();
    jQuery(init);*/

        jQuery(".wow-listing").delay(500).each(function(i) {
            jQuery(this).delay(100 * i).queue(function() {
                jQuery(this).addClass("show");
            })
        })

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
            return "0" + valString;init()
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
    // Text to speech click volume icon
    jQuery('body').on('click', '#play_question', function(e) {
        e.preventDefault();
        var this_element=jQuery(this);
        var text_speech=this_element.attr('data-question');

        var voiceOptions = 'Microsoft Anna - English (United States)';
        var volumeSlider = 1;
        var rateSlider = 1;
        var pitchSlider = 1;
        var myText = text_speech;

        var voiceMap = [];

        var msg = new SpeechSynthesisUtterance();
        msg.volume = volumeSlider;
        msg.voice = voiceMap[voiceOptions];
        msg.rate = rateSlider;
        msg.Pitch = pitchSlider;
        msg.text = myText;
        window.speechSynthesis.speak(msg);

    });
    jQuery('body').on('click', '#play_question1', function(e) {
        e.preventDefault();
        var this_element=jQuery(this);
        var text_speech=this_element.attr('data-question');

        var voiceOptions = 'Microsoft Anna - English (United States)';
        var volumeSlider = 1;
        var rateSlider = 1;
        var pitchSlider = 1;
        var myText = text_speech;

        var voiceMap = [];

        var msg = new SpeechSynthesisUtterance();
        msg.volume = volumeSlider;
        msg.voice = voiceMap[voiceOptions];
        msg.rate = rateSlider;
        msg.Pitch = pitchSlider;
        msg.text = myText;
        window.speechSynthesis.speak(msg);

    });
    //////////////////////Report problem question /////////////////////
    jQuery('body').on('click', '#report_problem', function(e) {
        jQuery("#report_prob_modal").modal();
        jQuery('#problem_q_id').val(jQuery('#problem_q_name').val())
    });
    jQuery('body').on('click', '.problem_send_btn', function(e) {
        var q_id=jQuery('#problem_q_id').val();
        var url      = window.location.href;
        jQuery.ajax({
            type : "post",
            //dataType : "json",
            url : base_url+'ajax/send_problem_ajax',
            data : {q_id: q_id, current_url:url},
            success: function(response) {
                console.log(response);
                if(response == 'true') {
                    alert('Report send to administrator');
                }
            }
        });
    });
    ////////////////// Question submit AJAX ////////////////
    jQuery('body').on('click', '.qSubmit', function(e) {
        e.preventDefault();
        jQuery('#loading').show();
        clearInterval(my_time_interval);////////////////////////////Stop Timer
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
                //console.log(data);
                jQuery('#loading').hide();
                jQuery('#overlay').slideToggle();
                jQuery('.qAns_form').html('');
                ////////////////////// IF answer is wrong ///////////////////////////////
                var current_url = window.location.href;
                var  urls=current_url.split('/');
                var url_count=urls.length;
                if (data['type'] != 'true') {
                    jQuery('#ans_label').removeClass();
                    jQuery('#ans_label').addClass('wAns');
                    //alert(data['qWrong_feedback']);
                    var gotIt='<br><br><br><a href="" class="btn btn-primary btn-sm got_it">Got it</a>';
                    jQuery('#ans_label').html('<i class="fa fa-times" aria-hidden="true"></i> '+data['qWrong_feedback']+gotIt);
                    jQuery('.score_ans').find('.content').html(data['score_ans']);
                    jQuery('.score_smart').find('.content').html(data['score_smart']);
                    var topic = jQuery('.breadcrumbs .breadcrumbs__item_active').find('.breadcrumbs__element').html();
                    // After question submit init gauge and progress bar


                    // After question submit init gauge and progress bar end here
                    var exercise_complete_text = new Array("Exercise Complete!", "Mission accomplished!", "Mission Complete!");
                    var random_exercise_complete_text = exercise_complete_text[Math.floor( Math.random() * exercise_complete_text.length )];
                    var awesome_text = new Array("You are great!", "You're a star", "You're awesome");
                    var random_awesome_text = awesome_text[Math.floor( Math.random() * awesome_text.length )];

                    /// On Got it click next question
                    jQuery('body').on('click', '.got_it', function(e) {
                        e.preventDefault();
                        jQuery("#overlay").hide();
                        //jQuery("#ans_label").hide();
                        jQuery('.qAns_form').show();
                        my_time_interval= setInterval(setTime, 1000); //////////////// Start Timer
                        if(data['html']==''){  ////////////////// If next question not found or end of topic //////////
                            var tQ_attend= jQuery('.score_ans').find('.content').html();
                            var qScore=jQuery('.score_smart').find('.content').html();
                            var total_time=data['total_time'];
                            var tQ_score=data['tQ_score'];
                            var user_name=data['user_name'];
                            var grade=data['grade'];
                            var subject=data['subject'];
                            var score_persentage=(100*(qScore/tQ_score)).toFixed(0);
                            if(qScore >= 70){
                                var prize = base_url+'assets/images/cup.png';
                            } else {
                                var prize = base_url+'assets/images/medal.png';
                            }

                            //console.log(user_name);
                            //console.log(tQ_score);

                            var html='<div class="result_show">';
                            //html+='<table class="table table-bordered table-result">';
                            /*html+='<tr>' +
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
                                '</tr>' +
                                '<tr>' +
                                '<th>Time Taken</th>' +
                                '<td>'+score_time_count_hr+ ':' + score_time_count_min + ':'+ score_time_count_sec+'</td>' +
                                '</tr>';
                            html+='</table>';*/
                            html+='<div class="final_result">';
                            html+='<div class="row">';
                            html+='<div class="col-lg-9 col-md-9 col-xs-9">';
                            html+='<div class="subject_grade_topic">'+subject+' | '+grade+' | '+topic+'</div>';
                            html+='<div class="exercise_complete_text">'+random_exercise_complete_text+'</div>';
                            html+='<div class="awesome_text">'+random_awesome_text+'</div>';
                            html+='</div>';
                            html+='<div class="col-lg-3 col-md-3 col-xs-3"><img src="'+prize+'">';
                            html+='</div>';
                            html+='</div>';
                            html+='<div class="row">';
                            html+='<div class="col-lg-4 col-md-4 col-xs-4">';
                            html+='<div class="blueclass">';
                            html+='<div class="text1">You gained</div>';
                            html+='<div class="text2">'+qScore+'</div>';
                            html+='<div class="text3">Smart Points</div>';
                            html+='</div>';
                            html+='</div>';
                            html+='<div class="col-lg-4 col-md-4 col-xs-4">';
                            html+='<div class="orangeclass">';
                            html+='<div class="text1">You answered</div>';
                            html+='<div class="text2">'+tQ_attend+'</div>';
                            html+='<div class="text3">Questions</div>';
                            html+='</div>';
                            html+='</div>';
                            html+='<div class="col-lg-4 col-md-4 col-xs-4">';
                            html+='<div class="greenclass">';
                            html+='<div class="text1">You spent</div>';
                            html+='<div class="text2">'+ score_time_count_min + ':'+ score_time_count_sec+'</div>';
                            html+='<div class="text3">Minutes</div>';
                            html+='</div>';
                            html+='</div>';
                            html+='</div>';
                            html+='</div>';
                            html+='</div>';
                            html+='<div class="print_action_div">';

                            html+='<a class="btn btn-small btn-outline-default" onclick="printDiv(\'printableArea\')">Print</a> <a href="'+ base_url +'frontend/topic/'+urls[url_count-3]+'/'+urls[url_count-2]+'" class="btn btn-small btn-outline-default" >Back to Main Menu</a>';
                            html+='</div>';
                            //////////////// save certificate after complete a topic /////////////////////////
                            jQuery.ajax({
                                type: "POST",
                                url: base_url + 'ajax/save_ans_certificate',
                                data: {subject_id:data['subject_id'],grade_id:data['grade_id'],category_id:data['category_id'],topic_id:data['topic_id']},
                                success: function (res) {
                                    if (res==true){

                                    } else{

                                    }
                                }
                            });
                            /////////////////////////////////////////////
                            jQuery('#change_col1').removeClass('col-lg-10');
                            jQuery('#change_col1').addClass('col-lg-12');
                            jQuery('#change_col2').hide();
                            jQuery('.qAns_form').html(html);
                            clearInterval(my_time_interval);
                        }else{
                            jQuery('.qAns_form').html(data['html']);
                            jQuery('html, body').animate({
                                scrollTop: jQuery('.qAns_form').offset().top
                            }, 100);
                            jQuery( "#sortable" ).sortable();
                            jQuery( "#sortable" ).disableSelection();
                            jQuery(init);
                        }

                    });
                    //////////////////////////////////

                } else{  ////////////////////// IF answer is right ///////////////////////////////
                    jQuery('#ans_label').removeClass();
                    jQuery('#ans_label').addClass('cAns');
                    jQuery('#ans_label').html('<i class="fa fa-check" aria-hidden="true"></i> '+ data['qRight_feedback']);
                    jQuery('.score_ans').find('.content').html(data['score_ans']);
                    jQuery('.score_smart').find('.content').html(data['score_smart']);

                    var topic = jQuery('.breadcrumbs .breadcrumbs__item_active').find('.breadcrumbs__element').html();

                    var exercise_complete_text = new Array("Exercise Complete!", "Mission accomplished!", "Mission Complete!");
                    var random_exercise_complete_text = exercise_complete_text[Math.floor( Math.random() * exercise_complete_text.length )];
                    var awesome_text = new Array("You are great!", "You're a star", "You're awesome");
                    var random_awesome_text = awesome_text[Math.floor( Math.random() * awesome_text.length )];

                    /// Timer start for next question
                    setTimeout(function() {
                        jQuery("#overlay").slideToggle();
                        //jQuery("#ans_label").slideToggle();
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
                            var score_persentage=(100*(qScore/tQ_score)).toFixed(0);
                            //console.log(user_name);
                            //console.log(tQ_score);

                            if(qScore >= 70){
                                var prize = base_url+'assets/images/cup.png';
                            } else {
                                var prize = base_url+'assets/images/medal.png';
                            }

                            var html='<div class="result_show" id="printableArea">';
                            //html+='<table class="table table-bordered table-result">';
                            /*html+='<tr>' +
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
                                '</tr>' +
                                '<tr>' +
                                '<th>Time Taken</th>' +
                                '<td>'+score_time_count_hr+ ':' + score_time_count_min + ':'+ score_time_count_sec+'</td>' +
                                '</tr>';
                            html+='</table>';*/
                            html+='<div class="final_result">';
                            html+='<div class="row">';
                            html+='<div class="col-lg-9 col-md-9 col-xs-9">';
                            html+='<div class="subject_grade_topic">'+subject+' | '+grade+' | '+topic+'</div>';
                            html+='<div class="exercise_complete_text">'+random_exercise_complete_text+'</div>';
                            html+='<div class="awesome_text">'+random_awesome_text+'</div>';
                            html+='</div>';
                            html+='<div class="col-lg-3 col-md-3 col-xs-3"><img src="'+prize+'">';
                            html+='</div>';
                            html+='</div>';
                            html+='<div class="row">';
                            html+='<div class="col-lg-4 col-md-4 col-xs-4">';
                            html+='<div class="blueclass">';
                            html+='<div class="text1">You gained</div>';
                            html+='<div class="text2">'+qScore+'</div>';
                            html+='<div class="text3">Smart Points</div>';
                            html+='</div>';
                            html+='</div>';
                            html+='<div class="col-lg-4 col-md-4 col-xs-4">';
                            html+='<div class="orangeclass">';
                            html+='<div class="text1">You answered</div>';
                            html+='<div class="text2">'+tQ_attend+'</div>';
                            html+='<div class="text3">Questions</div>';
                            html+='</div>';
                            html+='</div>';
                            html+='<div class="col-lg-4 col-md-4 col-xs-4">';
                            html+='<div class="greenclass">';
                            html+='<div class="text1">You spent</div>';
                            html+='<div class="text2">'+ score_time_count_min + ':'+ score_time_count_sec+'</div>';
                            html+='<div class="text3">Minutes</div>';
                            html+='</div>';
                            html+='</div>';
                            html+='</div>';
                            html+='</div>';
                            html+='</div>';
                            html+='<div class="print_action_div">';

                            html+='<a class="btn btn-small btn-outline-default" onclick="printDiv(\'printableArea\')">Print</a> <a href="'+ base_url +'frontend/topic/'+urls[url_count-3]+'/'+urls[url_count-2]+'" class="btn btn-small btn-outline-default" >Back to Main Menu</a>';
                            html+='</div>';
                            // save certificate
                            jQuery.ajax({
                                type: "POST",
                                url: base_url + 'ajax/save_ans_certificate',
                                data: {subject_id:data['subject_id'],grade_id:data['grade_id'],category_id:data['category_id'],topic_id:data['topic_id']},
                                success: function (res) {
                                    if (res==true){

                                    } else{

                                    }
                                }
                            });
                            ///
                            jQuery('#change_col1').removeClass('col-lg-10');
                            jQuery('#change_col1').addClass('col-lg-12');
                            jQuery('#change_col2').hide();
                            jQuery('.qAns_form').html(html);
                            clearInterval(my_time_interval);
                        }else{
                            jQuery('.qAns_form').html(data['html']);
                            jQuery('html, body').animate({
                                scrollTop: jQuery('.qAns_form').offset().top
                            }, 100);
                            jQuery( "#sortable" ).sortable();
                            jQuery( "#sortable" ).disableSelection();
                            jQuery(init);
                        }

                    }, 2000);
                    //////////////////////////////
                }
                var tQ_attend= jQuery('.score_ans').find('.content').html();
                var qScore=jQuery('.score_smart').find('.content').html();
                var total_time=data['total_time'];
                var tQ_score=data['tQ_score'];
                var color_zone_position1=0
                var color_zone_position2=parseInt(parseInt(data['total_question_marks'])*(30/100));
                var color_zone_position3=parseInt(color_zone_position2)+1;
                var color_zone_position4=parseInt(parseInt(data['total_question_marks'])*(80/100));
                var color_zone_position5=parseInt(color_zone_position4)+1;
                var color_zone_position6=parseInt(data['total_question_marks']);
                var opts = {
                    angle: 0, // The span of the gauge arc
                    lineWidth: 0.55, // The line thickness
                    radiusScale: 1, // Relative radius
                    pointer: {
                        length: 0.8, // // Relative to gauge radius
                        strokeWidth: 0.050, // The thickness
                        color: '#FF4621' // Fill color
                    },

                    limitMax: false,     // If false, max value increases automatically if value > maxValue
                    limitMin: false,     // If true, the min value of the gauge will be fixed
                    colorStart: '#4ECF40',   // Colors
                    colorStop: '#2CDA49',    // just experiment with them
                    strokeColor: '#E0E0E0',  // to see which ones work best for you
                    generateGradient: true,
                    highDpiSupport: true,     // High resolution support

                    staticZones: [
                        {strokeStyle: "#F03E3E", min: color_zone_position1, max: color_zone_position2}, // Red from 100 to 130
                        {strokeStyle: "#FFDD00", min: color_zone_position3, max: color_zone_position4}, // Yellow
                        {strokeStyle: "#30B32D", min: color_zone_position5, max: color_zone_position6}, // Green
                    ],

                };
                var target = document.getElementById('progress_meter'); // your canvas element
                var gauge = new Gauge(target).setOptions(opts); // create sexy gauge!
                gauge.maxValue = data['total_question_marks']; // set max gauge value
                gauge.setMinValue(0);  // Prefer setter over gauge.minValue = 0
                gauge.animationSpeed = 32; // set animation speed (32 is default value)
                gauge.set(qScore);
                jQuery('.canvas_text').html('<span class="gauge_value">'+qScore+'</span> of <span class="gauge_value">'+data['total_question_marks']+'</span>');
                jQuery('#e1').html('');
                var  current_position=(parseInt(tQ_attend)+1);
                //alert(current_position);
                var tes=data['stepbar_count'];
                var step=data['stepbar_count'].split(',');
                //alert(tes);
                jQuery('#e1').stepbar({
                    items: step,
                    color: '#84B1FA',
                    fontColor: '#000',
                    selectedColor: '#223D8F',
                    selectedFontColor: '#fff',
                    current: current_position
                });
            }
        });
        svgCount = 0;
        setTimeout(function() {
            var itm = [];
            jQuery("ul.DragDropExtra li img").draggable();
            jQuery("#DragDropImg").droppable({
                drop: function (event, ui) {
                    var zz = ui.draggable.text()
                    jQuery(this).find(".placeholder").remove();
                    jQuery("<li></li>").text(ui.draggable.text())
                        .addClass('dropClass')
                        .appendTo(this);

                    itm.push(zz);
                    jQuery('.ui-droppable').find("li.ui-draggable:contains('" + zz + "')").addClass('bred');
                    var n = jQuery(".dropClass").length;
                    jQuery('.qAns_box_dragDrop').val(n);
                }
            });

            jQuery(".Put_uploaded_images ul li").draggable({
                helper: "clone",
                cursor: 'move',
                revert: function(valid) {
                    if(!valid) {
                        this.remove();
                    }
                }
            });
            jQuery(".putBoxes .putBox").droppable({
                accept: ".Put_uploaded_images ul li",
                classes: {
                    "ui-droppable-active": "ui-state-active",
                    "ui-droppable-hover": "ui-state-hover"
                },
                drop: function (event, ui) {
                    var $canvas = jQuery(this);
                    $canvas.addClass( "ui-state-highlight" )
                    if (!ui.draggable.hasClass('canvas-element')) {
                        var $canvasElement = ui.draggable.clone();
                        $canvasElement.addClass('canvas-element');
                        $canvasElement.draggable({
                            containment: '#container'
                        });
                        $canvas.append($canvasElement);
                        var id = $canvas.attr('data-id');
                        var title = $canvasElement.attr('data-title');
                        var text = 'id:'+id+'|title:'+title+']';
                        jQuery(".ans_textbox").val(function() {
                            return this.value + text;
                        });
                        $canvasElement.css({
                            /*left: (ui.position.left),
                            top: (ui.position.top),*/
                            position: 'absolute'
                        });
                    }
                }
            });
        }, 3000);
    });
    ////////////////// Question submit AJAX End here ////////////////

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
                //email: true
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
                //email: true
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
                //email: true
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
    //jQuery('.table').footable();

    jQuery('.tooltip').tooltipster({
        animation: 'fade',
        delay: 200,
        theme: 'tooltipster-punk',
        trigger: 'clickdropdown'
    });

    jQuery('.tooltip_award').tooltipster({
        animation: 'fade',
        delay: 200,
        theme: 'tooltipster-punk',
        maxWidth: 300,
        side: 'top'
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

function checkCompatibilty () {
    if(!('speechSynthesis' in window)){
        alert('Your browser is not supported. If google chrome, please upgrade!!');
    }
};

checkCompatibilty();

jQuery('.accordion').on('click', function (e) {
    e.preventDefault();
    var this_element=jQuery(this);
    this_element.toggleClass('active','');
    this_element.next('div.panel').slideToggle();
});
window.fbAsyncInit = function() {
    // FB JavaScript SDK configuration and setup
    FB.init({
        appId      : fb_id, // FB App ID
        cookie     : true,  // enable cookies to allow the server to access the session
        xfbml      : true,  // parse social plugins on this page
        version    : 'v2.9' // use graph api version 2.8
    });

};

// Load the JavaScript SDK asynchronously
(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

// Facebook login with JavaScript SDK
function fbLogin() {
    jQuery('#fbLogin').hide();
    jQuery('.ajax_loader').show();
    FB.login(function (response) {
        if (response.authResponse) {
            // Get and display the user profile data
            getFbUserData();
        } else {
            document.getElementById('status').innerHTML = 'User cancelled login or did not fully authorize.';
        }
    }, {scope: 'email,public_profile'});
}

// Fetch the user profile data from facebook
function getFbUserData(){
    FB.api('/me', {locale: 'en_US', fields: 'id,first_name,last_name,email,link,gender,locale,picture,birthday'},
        function (response) {
            /*document.getElementById('userData').innerHTML = '<p><b>FB ID:</b> '+response.id+'</p><p><b>Name:</b> '+response.first_name+' '+response.last_name+'</p><p><b>Email:</b> '+response.email+'</p><p><b>Gender:</b> '+response.gender+'</p><p><b>Locale:</b> '+response.locale+'</p><p><b>Picture:</b> <img src="'+response.picture.data.url+'"/></p><p><b>FB Profile:</b> <a target="_blank" href="'+response.link+'">click to view profile</a></p>';*/
            saveUserData(response);
        });
}

// Save user data to the database
function saveUserData(userData){
    jQuery.ajax({
        type : "post",
        //dataType : "json",
        url : base_url+'ajax/save_user_by_fb',
        data : {action: "fbLogin", fbId : userData.id, firstname : userData.first_name, lastname : userData.last_name, email: userData.email, picUrl: userData.picture.data.url},
        success: function(response) {
            console.log(response);
            if(response == 'true') {
                window.location.href = base_url+'dashboard';
            }
        }
    });
}

/*
jQuery('.logged-in-usermenus ul li.dropdown > a').on('click', function(e) {
   var thisClass = jQuery(this);
    thisClass.parent().toggleClass('opened');
   e.preventDefault();
   thisClass.parent().find('ul.dropdown_list').slideToggle();
});*/
var svgCount = 0;
jQuery('body').on('click', '.svgAdd', function(e){
    e.preventDefault();
    if(jQuery('.svgBoxes .svgBox:empty').length != 0) {
        svgCount++;
        var thisElement = jQuery(this);
        var img = thisElement.find('span').html();
        jQuery('.svgBoxes .svgBox:nth-child('+svgCount+')').html(img);
    }
    jQuery('input[name="qAns_box"]').val(svgCount);
});

jQuery('body').on('click', '.svgDelete', function(e){
    e.preventDefault();
    var total = jQuery('input[name="svgNum"]').val();
    if(jQuery('.svgBoxes .svgBox:empty').length != total) {
        jQuery('.svgBoxes .svgBox:nth-child(' + svgCount + ')').html('');
        console.log(svgCount);
        svgCount--;
    }
    jQuery('input[name="qAns_box"]').val(svgCount);
});


jQuery(document).ready(function() {
    var itm = [];
    jQuery( "ul.DragDropExtra li img" ).draggable();
    jQuery( "#DragDropImg" ).droppable({
        drop: function( event, ui ) {
            var zz = ui.draggable.text()
            jQuery(this).find(".placeholder").remove();
            jQuery("<li></li>").text(ui.draggable.text())
                .addClass('dropClass')
                .appendTo(this);

            itm.push(zz);
            jQuery('.ui-droppable').find("li.ui-draggable:contains('" + zz + "')").addClass('bred');
            var n = jQuery( ".dropClass" ).length;
            jQuery('.qAns_box_dragDrop').val(n);
        }
    });

    jQuery(".Put_uploaded_images ul li").draggable({
        helper: "clone",
        cursor: 'move',
        revert: function(valid) {
            if(!valid) {
                this.remove();
            }
        }
    });
    jQuery(".putBoxes .putBox").droppable({
        accept: ".Put_uploaded_images ul li",
        classes: {
            "ui-droppable-active": "ui-state-active",
            "ui-droppable-hover": "ui-state-hover"
        },
        drop: function (event, ui) {
            var $canvas = jQuery(this);
            $canvas.addClass( "ui-state-highlight" )
            if (!ui.draggable.hasClass('canvas-element')) {
                var $canvasElement = ui.draggable.clone();
                $canvasElement.addClass('canvas-element');
                $canvasElement.draggable({
                    containment: '#container'
                });
                $canvas.append($canvasElement);
                var id = $canvas.attr('data-id');
                var title = $canvasElement.attr('data-title');
                var text = 'id:'+id+'|title:'+title+']';
                jQuery(".ans_textbox").val(function() {
                    return this.value + text;
                });
                $canvasElement.css({
                    /*left: (ui.position.left),
                    top: (ui.position.top),*/
                    position: 'absolute'
                });
            }
        }
    });
    jQuery('body').on('click', '.imageQ_bg_img_wrap label img', function() {
        var thiselement = jQuery(this);
        if(thiselement.hasClass('active')) {
            thiselement.removeClass('active');
        } else {
            thiselement.addClass('active');
        }
    });
    jQuery('body').on('click', '.spaceo_rating_widget', function(e) {
        jQuery.ajax({
            type : "post",
            //dataType : "json",
            url : base_url+'ajax/login_check',
            success: function(data) {
                if(data) {
                    var thiselement = jQuery(this);
                    var rating=jQuery('#rating_star').val();
                    var worksheet_id=jQuery('#rating_star').attr('postID');
                    if(rating!=0){
                        jQuery.ajax({
                            type : "post",
                            dataType : "json",
                            url : base_url+'ajax/insert_rating',
                            data : {worksheet_id: worksheet_id,rating: rating},
                            success: function(response) {
                                if(response) {
                                    console.log(response);
                                    window.location.reload();
                                } else{
                                    alert('Please try again later');
                                }
                            }
                        });
                    }
                } else{
                    jQuery('#modalLoginForm').modal('toggle');
                }
            }
        });

    });

    jQuery(".work_single_social_share").jsSocials({
        shares: ["pinterest","twitter", "facebook", "googleplus"],
        url: encodeURI(window.location.href),
        text: "Applekitch worksheet share",
        showLabel: false,
        showCount: false,
        shareIn: "popup",
        on: {
            click: function(e) {},
            mouseenter: function(e) {},
            mouseleave: function(e) {}
        }

    });
    jQuery('.bxslider_related').bxSlider({
        auto: false,
        pager: false,
        minSlides: 4,
        maxSlides: 6,
        slideWidth: 250,
        moveSlides: 2,
        slideMargin: 20,
        infiniteLoop: false,
        controls: true
/*        nextSelector: '#slider-next3',
        prevSelector: '#slider-prev3',
        nextText: '<img src="<?php bloginfo('template_directory'); ?>/images/right-arrow.png">',
        prevText: '<img src="<?php bloginfo('template_directory'); ?>/images/left-arrow.png">'*/
    });
});
jQuery('body').on("click",'.category_li_side',function(e) {
    var thiselement=jQuery(this);
    var ul_id=thiselement.closest('ul').attr('id');
    //console.log(ul_id);
    jQuery('#'+ul_id).find('li').removeClass('active_work');
    jQuery('#'+ul_id).find('li').removeClass('txt_orange');
    thiselement.parent('li').addClass('active_work txt_orange');

});
function search_id_genarate(type,id,dom_id){
    //alert(dom_id);
    var sort_by=jQuery('#filter_short').val();
    sort_by=jQuery('select#filter_short option:selected').val();
    jQuery('.leading_worksheet').show();
    jQuery('#worksheet_list_main').html('');
    var single_id=jQuery('#single_textbox').val();

    if(type=='grade'){
        var ids=(jQuery('#search_grade_id').val()!='') ? ','+id : id;
        jQuery('#search_grade_id').val(id);
        var ul_id=jQuery('#'+dom_id).closest('ul').attr('id');
        jQuery('#'+ul_id).find('li').removeClass('active_work');
        jQuery('#'+ul_id).find('li').removeClass('txt_blue');
        jQuery('#'+dom_id).parent('li').addClass('active_work txt_blue');
        jQuery.ajax({
            type : "post",
            //dataType : "json",
            url : base_url+'ajax/get_categories',
            data : {subject_ids: jQuery('#search_subject_id').val(),grade_ids: jQuery('#search_grade_id').val(),single:jQuery('#single_textbox').val()},
            success: function(res) {
                //console.log(res);
                if(res!=''){
                    jQuery('#cat_listing_main_div').show();
                    if(single_id=='1'){
                        jQuery('#sidebar_category_listing_s').html('');
                        jQuery('#sidebar_category_listing_s').html(res);
                    } else{
                        jQuery('#sidebar_category_listing').html(res);
                    }
                } else {
                    jQuery('#cat_listing_main_div').hide();
                }
            }
        });

    }
    if(type=='subject'){
        jQuery('#search_subject_id').val(id);
        var ul_id=jQuery('#'+dom_id).closest('ul').attr('id');
        //alert(ul_id);
        jQuery('#'+ul_id).find('li').removeClass('active_work');
        jQuery('#'+ul_id).find('li').removeClass('txt_green');
        jQuery('#'+dom_id).parent('li').addClass('active_work txt_green');
        jQuery.ajax({
            type : "post",
            //dataType : "json",
            url : base_url+'ajax/get_categories',
            data : {subject_ids: jQuery('#search_subject_id').val(),grade_ids: jQuery('#search_grade_id').val(),single:jQuery('#single_textbox').val()},
            success: function(res) {
                //console.log(res);
                if(res) {
                    //alert(res);
                    if(res!=''){
                        jQuery('#cat_listing_main_div').show();
                        if(single_id=='1'){
                            jQuery('#sidebar_category_listing_s').html('');
                            jQuery('#sidebar_category_listing_s').html(res);
                        } else{
                            jQuery('#sidebar_category_listing').html(res);
                        }
                    } else {
                        jQuery('#cat_listing_main_div').hide();
                    }


                }
            }
        });

    }

    if(type=='category'){
        var ids=(jQuery('#search_cat_id').val()!='') ? ','+id : id;
        jQuery('#search_cat_id').val(id);

        //jQuery(document).('#'+dom_id).parent('li').addClass('active_work');

    }

    jQuery.ajax({
        type : "post",
        dataType : "json",
        url : base_url+'ajax/search_worksheet',
        data : {subject_ids: jQuery('#search_subject_id').val(),grade_ids: jQuery('#search_grade_id').val(),cat_ids: jQuery('#search_cat_id').val(),topic_ids: jQuery('#search_topic_id').val(),sort_by:sort_by},
        success: function(response) {
            //console.log(response);
            if(response) {
                jQuery('.leading_worksheet').hide();
                jQuery('#worksheet_list_main').html(response.html);
                jQuery('#work_list_dynamic_title').html(response.title);
                var monkeyList = new List('test-list', {
                    page: 24,
                    pagination: true
                });
                jQuery('.matchHeight1').matchHeight();
                jQuery('html, body').animate({
                    scrollTop: jQuery('.worksheet_top_div').offset().top
                }, 1000);
            }
        }
    });

}
function clear_work_search(){
    jQuery('#work_list_dynamic_title').html('All Worksheets');
    jQuery('.leading_worksheet').show();
    jQuery('#search_subject_id').val('');
    jQuery('#search_grade_id').val('');
    jQuery('#search_topic_id').val('');
    jQuery('#search_cat_id').val('');
    jQuery('.active_work').removeClass('active_work');
    jQuery.ajax({
        type : "post",
        //dataType : "json",
        url : base_url+'ajax/search_worksheet',
        data : {subject_ids: jQuery('#search_subject_id').val(),grade_ids: jQuery('#search_grade_id').val(),cat_ids: jQuery('#search_cat_id').val(),topic_ids: jQuery('#search_topic_id').val()},
        success: function(response) {
            //console.log(response);
            if(response) {
                jQuery('.leading_worksheet').hide();
                window.location.href=base_url+'worksheets';
                //jQuery('#worksheet_list_main').html(response.html);
                //jQuery('#work_list_dynamic_title').html(response.title);
            }
        }
    });
    jQuery('.leading_worksheet').hide();
}
function search_breadcumb(type, id){
    var  b_rtntext='';
    var  table='';
    var  p_field='';
    var  p_value='';
    var  r_field='';
    if(type=='subject'){
        table='work_subjects';
        p_field='id';
        p_value=id;
        r_field='name';
    } else if(type=='grade'){
        table='work_grades';
        p_field='id';
        p_value=id;
        r_field='name';
    } else if(type=='cat'){
        table='work_categories';
        p_field='id';
        p_value=id;
        r_field='name';
    } else if(type=='topic'){
        table='work_topics';
        p_field='id';
        p_value=id;
        r_field='name';
    }

    jQuery.ajax({
        type : "post",
        //dataType : "json",
        url : base_url+'ajax/get_returnfield',
        data : {table: table,p_field:p_field,p_value:p_value,r_field:r_field},
        success: function(data) {
            if(data) {
                console.log(data);
                return '<li>'+data+'</li>';
            }
        }
    });
    /*return {
        li_data : b_rtntext
    }*/
    //return '<li>'+rtntext+'</li>';
}
function worksheet_print(work_id) {
    jQuery('#loading_spinner_p').show();
    jQuery.ajax({
        type : "post",
        //dataType : "json",
        url : base_url+'ajax/login_check',
        success: function(data) {
            if(data) {
                jQuery.ajax({
                    type : "post",
                    url : base_url+'ajax/print_pdf',
                    data : {worksheet_id: work_id},
                    success: function(res) {
                        if(res!=''){
                            var iframe = document.createElement('iframe');
                            iframe.width="0";
                            iframe.height="0";
                            iframe.id="worksheet_pdf_print";
                            iframe.style="visibility: hidden";
                            iframe.src = res;
                            document.body.appendChild(iframe);  // Add the frame to the web page.
                            iframe.onload = function() {
                                setTimeout(function() {
                                    iframe.focus();
                                    iframe.contentWindow.print();
                                }, 1);
                            };
                            jQuery('#loading_spinner_p').hide();
                        } else {
                            alert('No PDF file found!');
                            jQuery('#loading_spinner_p').hide();
                        }

                    }
                });
            } else{
                jQuery('#modalLoginForm').modal('toggle');
                jQuery('#loading_spinner_p').hide();
            }
        }
    });

}
function modal_login(){
    var username=jQuery('#username').val();
    var password=jQuery('#password').val();
    if(username!='' && password!=''){
        jQuery.ajax({
            type : "post",
            //dataType : "json",
            url : base_url+'ajax/modal_login',
            data : {username: username,password:password},
            success: function(data) {
                if(data) {
                    window.location.reload();
                } else{
                    alert('username or password incorrect!');
                }
            }
        });
    }
}
function modal_register(){
    var fname=jQuery('#fname').val();
    var lname=jQuery('#lname').val();
    var email_address=jQuery('#email_address').val();
    var pwd1=jQuery('#pwd1').val();
    var user_type=jQuery("input[name='user_type']:checked").val();
    if(username!='' && password!=''){
        jQuery.ajax({
            type : "post",
            dataType : "json",
            url : base_url+'ajax/modal_register',
            data : {fname: fname,lname:lname,email_address:email_address,pwd1:pwd1,user_type:user_type},
            success: function(data) {
                if(data.status) {
                    alert(data.msg);
                    window.location.reload();
                } else{
                    alert(data.msg);
                }
            }
        });
    }
}

function worksheet_download(worksheet_id){
    jQuery('#loading_spinner_d').show();
    jQuery.ajax({
        type : "post",
        //dataType : "json",
        url : base_url+'ajax/login_check',
        success: function(data) {
            if(data) {
                jQuery.ajax({
                    type : "post",
                    url : base_url+'ajax/download_pdf',
                    data : {worksheet_id: worksheet_id},
                    success: function(res) {
                        console.log(res);
                        if(res!=''){
                            if (!window.ActiveXObject) {
                                //va
                                var save = document.createElement('a');
                                save.href = res;
                                save.target = '_blank';
                                save.download = 'workseet.pdf' || 'applekitch';

                                var evt = new MouseEvent('click', {
                                    'view': window,
                                    'bubbles': true,
                                    'cancelable': false
                                });
                                save.dispatchEvent(evt);

                                (window.URL || window.webkitURL).revokeObjectURL(save.href);
                            }

                            // for IE < 11
                            else if ( !! window.ActiveXObject && document.execCommand)     {
                                var _window = window.open(fileURL, '_blank');
                                _window.document.close();
                                _window.document.execCommand('SaveAs', true, fileName || fileURL)
                                _window.close();
                            }
                            jQuery('#loading_spinner_d').hide();
                        } else {
                            alert('No PDF file found!');
                            jQuery('#loading_spinner_d').hide();
                        }

                    }
                });

                //window.location.href=doc;
            } else{
                jQuery('#modalLoginForm').modal('toggle');
                jQuery('#loading_spinner_d').hide();
            }
        }
    });
}
function worksheet_favorite(work_id){
    jQuery.ajax({
        type : "post",
        //dataType : "json",
        url : base_url+'ajax/login_check',
        success: function(data) {
            if(data) {
                jQuery.ajax({
                    type:'post',
                    url: base_url+'ajax/add_to_favorite',
                    data:{work_id: work_id},
                    success: function(ress) {
                        if(ress) {
                            alert('worksheet add to your favourites');
                        } else{
                            alert('Please try again later');
                        }
                    }
                });
            } else{
                jQuery('#modalLoginForm').modal('toggle');
            }
        }
    });
}