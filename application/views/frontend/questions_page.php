<?php
$this->load->view('templates/header');
?>
<div id="overlay" class="overlay">
    <!--<img src="<?/*= base_url(); */?>assets/images/green-tick-mark-icon.jpg" alt="">-->
    <div id="ans_label" class="cAns"> Correct</div>
</div>
<div class="wrapper inner-pages">
    <div class="breadcrumbs_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="breadcrumbs">
                        <?php //print_r($this->uri->segment(3)); ?>
                        <li class="breadcrumbs__item"><a href="<?= base_url(); ?>" class="breadcrumbs__element">Home</a></li>
                        <li class="breadcrumbs__item"><a href="<?= base_url($this->uri->segment(2)); ?>" class="breadcrumbs__element"><?php echo ucfirst($this->uri->segment(2)) ?></a></li>
                        <li class="breadcrumbs__item"><a href="<?= base_url('topic/'.$this->uri->segment(2).'/'.$this->uri->segment(3)); ?>" class="breadcrumbs__element"><?php echo get_returnfield('grade','slug',$this->uri->segment(3),'name'); ?></a></li>
                        <li class="breadcrumbs__item breadcrumbs__item_active"><span class="breadcrumbs__element"><?= get_returnfield('topics','slug',$this->uri->segment(4),'topic_name'); ?></span></li>
                        <!--<li class="breadcrumbs__item breadcrumbs__item_active"><span class="breadcrumbs__element"><?php /*echo $banner_title; */?></span></li>-->
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="inner_page_content low_padding">
        <div class="container">
            <div class="row">
                <div class="topic_name_header">
                    <h4><?= get_returnfield('topics','slug',$this->uri->segment(4),'topic_name'); ?></h4>
                </div>
                <div id="change_col1" class="question_view col-lg-10">
                    <!--<div id="wrong_ans_label" class="wAns">Wrong Answer&#8230;</div>-->
                    <?php if(!empty($questions)){ ?>
                        <form class="form qAns_form" method="post" action="" enctype="multipart/form-data">
                            <input type="hidden" name="start" value="<?php echo $start; ?>" />
                            <input type="hidden" name="grade_id" value="<?php echo $grade_id; ?>" />
                            <input type="hidden" name="subject_id" value="<?php echo $subject_id; ?>" />
                            <input type="hidden" name="topic_id" value="<?php echo $topic_id; ?>" />

                            <div class="row">
                                <?php foreach ($questions as $question){ ?>
                                    <input type="hidden" name="id_not_in" value="<?php echo $question->question_id; ?>" />
                                    <input type="hidden" class="question_id" name="question_id" value="<?php echo $question->question_id; ?>">
                                    <div class="col-lg-12">
                                        <div class="question_count">Q. <div class="question_display"><?php echo $question->question_name; ?></div> <a href="javacript:void(0);" id="play_question" data-question="<?php echo ($question->question_name); ?>"><i class="fa fa-volume-up"></i></a></div>

                                        <!--<div id="play_text_div" class="play_text_div"></div>-->
                                    </div>
                                    <div class="col-lg-12">
                                        <?php //echo $question->form_data; exit(); ?>
                                        <?php $form_data=unserialize($question->form_data); ?>
                                        <?php //print_r( $form_data); ?>
                                        <input type="hidden" name="question_option" value="<?php echo $form_data['question_option']; ?>">
                                        <?php
                                        $check_data['question_option']=$form_data['question_option'];
                                        $check_data['form_data']=$form_data;
                                        $this->load->view('frontend/template_part/frontend_answer_check',$check_data);
                                        ?>
                                        <input type="submit" value="Submit" class="btn btn-small btn-outline-default qSubmit">
                                    </div>
                                <?php } ?>
                            </div>
                        </form>
                    <?php } ?>
                </div>
                <div class="col-lg-2" id="change_col2">
                    <div class="score_time_count">
                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                        <span class="score_time_count_hr">00</span>:<span class="score_time_count_min">00</span>:<span class="score_time_count_sec">00</span>
                    </div>
                </div>

                <div class="score_time_div" style="display: none">
                    <div class="score_ans">
                        <div class="title">Progress</div>
                        <div class="content"><?= (!empty($this->session->userdata('score_ans')))? $this->session->userdata('score_ans'):'0' ?></div>
                    </div>
                    <div class="score_smart">
                        <div class="title">Score <br><sup>out of 100</sup> <a title="This is my span's tooltip message!" href="javascript:void(0)"><i class="fa fa-question-circle"></i></a></div>
                        <div class="content"><?= (!empty($this->session->userdata('score_smart')))? $this->session->userdata('score_smart'):'0' ?></div>
                    </div>
                    <div class="score_time">
                        <div class="title">Time</div>
                        <div class="content score_time_count">
                            <div class="row">
                                <div class="time_dis_counter">
                                    <span class="score_time_count_hr">00</span><br>
                                    <span class="time_text">HR</span>
                                </div>
                                <div class="time_dis_counter">
                                    <span class="score_time_count_min">00</span><br>
                                    <span class="time_text">MIN</span>
                                </div>
                                <div class="time_dis_counter">
                                    <span class="score_time_count_sec">00</span><br>
                                    <span class="time_text">SEC</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-10">
                    <div id='e1'>
                    </div>
                </div>
                <div class="col-lg-2">
                    <canvas id="progress_meter" class="progress_meter"></canvas>
                    <div class="canvas_text">
                        <span class="gauge_value"><?= (!empty($this->session->userdata('score_smart')))? $this->session->userdata('score_smart'):'0' ?></span> of <span class="gauge_value"><?= $this->session->userdata('total_question_marks'); ?></span>
                    </div>

                </div>
                <div class="col-lg-10"></div>
                <div class="col-lg-2">
                    <p class="report_link"><a data-toggle="modal" href="#myModal">Report a problem</a></p>
                </div>
                <!--<sup><a href="" class="stop_question_timer" id="stop_question_timer">Stop</a></sup>-->
            </div>

        </div>
    </div>
</div>

</div>
</div>
<div id="loading" class="loading">Loading&#8230;</div>
</div>


<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" >
                <h4><span class="glyphicon glyphicon-lock"></span> Report problem</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body" style="padding:40px 50px;">
                <form role="form">
                    <div class="form-group">
                        <label for="usrname"><span class="glyphicon glyphicon-user"></span> Message</label>
                        <textarea type="text" class="form-control" id="usrname" placeholder="Message"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Send Report</button>
                </form>
            </div>

        </div>

    </div>
</div>
<?php
$total_question_count=$this->session->userdata('total_question_count');
$total_question_marks=$this->session->userdata('total_question_marks');
//echo $total_question_marks; exit();
$q_id_array=$this->session->userdata('q_id_array');
$q_id_count=explode(',',$q_id_array);
$stepbar_count='';
for ($i=1; $i<=count($q_id_count); $i++){
    $stepbar_count .= ($stepbar_count!='')  ? ",''" : "''";
}
//print_r($stepbar_count); exit();

?>

<?php
$this->load->view('templates/footer');
?>
<script>
    var color_zone_position1=0
    var color_zone_position2=parseInt(parseInt(<?= $total_question_marks; ?>)*(30/100));
    var color_zone_position3=parseInt(color_zone_position2)+1;
    var color_zone_position4=parseInt(parseInt(<?= $total_question_marks; ?>)*(80/100));
    var color_zone_position5=parseInt(color_zone_position4)+1;
    var color_zone_position6=parseInt(<?= $total_question_marks; ?>);
    var opts = {
        angle: 0,
        lineWidth: 0.55,
        radiusScale: 1,
        pointer: {
            length: 0.8,
            strokeWidth: 0.050,
            color: '#FF4621'
        },

        limitMax: false,
        limitMin: false,
        colorStart: '#4ECF40',
        colorStop: '#2CDA49',
        strokeColor: '#E0E0E0',
        generateGradient: true,
        highDpiSupport: true,

        staticZones: [
            {strokeStyle: "#F03E3E", min: color_zone_position1, max: color_zone_position2}, // Red from 100 to 130
            {strokeStyle: "#FFDD00", min: color_zone_position3, max: color_zone_position4}, // Yellow
            {strokeStyle: "#30B32D", min: color_zone_position5, max: color_zone_position6}, // Green
        ],

    };
    var target = document.getElementById('progress_meter'); // your canvas element
    var gauge = new Gauge(target).setOptions(opts); // create sexy gauge!
    // set max gauge value
    gauge.setMinValue(0);  // Prefer setter over gauge.minValue = 0
    gauge.animationSpeed = 32; // set animation speed (32 is default value)
    gauge.maxValue = <?= $total_question_marks; ?>;
    gauge.set(<?= (!empty($this->session->userdata('score_ans')))? $this->session->userdata('score_ans'):'0' ?>);

</script>

<script type="text/javascript">
    jQuery(document).ready(function() {
        jQuery('#e1').stepbar({
            items: [<?= $stepbar_count; ?>],
            color: '#84B1FA',
            fontColor: '#000',
            selectedColor: '#223D8F',
            selectedFontColor: '#fff',
            current: <?= (!empty($this->session->userdata('score_ans')))? $this->session->userdata('score_ans'):'0' ?>
        });
    });
</script>