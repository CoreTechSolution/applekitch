<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Frontend extends CI_Controller {
	public function __construct(){

		parent::__construct();
		$this->load->model('frontend_model');
		$this->load->model('images');
		$this->load->database();
	}
	public function index()
	{
		$data = array(
			'title' => 'Welcome',
		);
		$data['testimonials']=$this->frontend_model->get_testimonials(array(),false);

		$this->load->view('home_page', $data);
	}
	public function home()
	{
		$data = array(
			'title' => 'Welcome',
		);
        $data['testimonials']=$this->frontend_model->get_testimonials(array(),false);
        //print_r($data['testimonials']); exit();
		$this->load->view('home_page', $data);
	}
	public function grades(){
		$data['title']='Grades';
		$this->load->view('frontend/grade_page',$data);
	}
	public function topic($subject='',$grade=''){
        $user_id = get_current_user_id();
		if(loginCheck() && get_returnfield('user','id',get_parent(get_current_user_id()),'membership_plan')=='1') {
			if ( $user_id ) {
				$this->load->model( 'user_model' );
				$data['completed_topics'] = $this->user_model->get_log_in_user_topic( $user_id );
			}
		}
	    if($grade!='' && $subject!='') {
            $data['banner_title'] = ucfirst($subject);
            $data['title'] = ucfirst(get_returnfield('grade', 'slug', $grade, 'name') . ' ' . ucfirst($subject));
            $grade_id = get_id_by_slug('id', $grade, 'grade');
            $subject_id = get_id_by_slug('id', $subject, 'subject');
            $data['grade'] = get_returnfield('grade', 'id', $grade_id, 'slug');
            $data['subject'] = get_returnfield('subject', 'id', $subject_id, 'slug');
            //$data['topic']=get_returnfield('topics','topic_id',$topic_id,'slug');
            $data['topics'] = get_topic_by(0, $subject_id);


            //print_r($data['topics']); exit();
            $data['grades_lists'] = $this->frontend_model->get_grades(array(), false);
            $data['grade_content']=$this->frontend_model->get_grade_content(array('subject_id'=>$subject_id,'grade_id'=>$grade_id),true);
            //print_r( $data['topics']); exit();
            $data['grade_id'] = $grade_id;
            $data['questions'] = $this->frontend_model->get_questions(array('grade_id' => $grade_id, 'subject_id' => $subject_id), false);

            $this->load->view('frontend/topic_page', $data);
        } elseif(!empty($_POST['grade_id']) && !empty($_POST['subject_id'])){
            $data['banner_title'] = ucfirst(get_returnfield('subject','id',$_POST['subject_id'],'name'));
            $data['title'] = ucfirst(get_returnfield('grade','id',$_POST['grade_id'],'name') . ' ' . get_returnfield('subject','id',$_POST['subject_id'],'name'));
            $grade_id = $_POST['grade_id'];
            $subject_id = $_POST['subject_id'];
            $data['grade_content']=$this->frontend_model->get_grade_content(array('subject_id'=>$subject_id,'grade_id'=>$grade_id),true);
            $data['grade'] = get_returnfield('grade', 'id', $grade_id, 'slug');
            $data['subject'] = get_returnfield('subject', 'id', $subject_id, 'slug');
            //print_r($data);
            //$data['topic']=get_returnfield('topics','topic_id',$topic_id,'slug');
            $data['topics'] = get_topic_by(0, $subject_id);
            //print_r($data['topics']); exit();
            $data['grades_lists'] = $this->frontend_model->get_grades(array(), false);
            //print_r( $data['topics']); exit();
            $data['grade_id'] = $grade_id;
            $data['questions'] = $this->frontend_model->get_questions(array('grade_id' => $grade_id, 'subject_id' => $subject_id), false);
            $this->load->view('frontend/topic_page', $data);
        } else{
            $this->home();
        }
	}
    public function math($subject='math'){
	    if($subject==''){
	        $subject=$this->uri->segment(2);
        }
        //echo $subject;
        $user_id = get_current_user_id();
	    if(loginCheck() && get_returnfield('user','id',get_parent(get_current_user_id()),'membership_plan')=='1') {
		    if ( $user_id ) {
			    $this->load->model( 'user_model' );
			    $data['completed_topics'] = $this->user_model->get_log_in_user_topic( $user_id );
		    }
	    }

        $data['banner_title'] = ucfirst($subject);
        $data['title'] = ucfirst($subject);
        $subject_id= get_id_by_slug('id', $subject, 'subject');
        //echo $this->db->last_query();
        //echo $subject_id; exit();
        $data['subject'] = get_returnfield('subject', 'id', $subject_id, 'slug');
        $data['topics'] = get_topic_by(0, $subject_id);
        $data['grades_lists'] = $this->frontend_model->get_grades(array(), false);
        //print_r($data['topics']);

        $this->load->view('frontend/maths_overview_v', $data);
        ///////////////////////////////////////

    }
    public function english($subject='english'){
        if($subject==''){
            $subject=$this->uri->segment(2);
        }
        //echo $subject;
        $user_id = get_current_user_id();
	    if(loginCheck() && get_returnfield('user','id',get_parent(get_current_user_id()),'membership_plan')=='1') {
		    if ( $user_id ) {
			    $this->load->model( 'user_model' );
			    $data['completed_topics'] = $this->user_model->get_log_in_user_topic( $user_id );
		    }
	    }

        $data['banner_title'] = ucfirst($subject);
        $data['title'] = ucfirst($subject);
        $subject_id= get_id_by_slug('id', $subject, 'subject');
        //echo $this->db->last_query();
        //echo $subject_id; exit();
        $data['subject'] = get_returnfield('subject', 'id', $subject_id, 'slug');
        $data['topics'] = get_topic_by(0, $subject_id);
        $data['grades_lists'] = $this->frontend_model->get_grades(array(), false);
        //print_r($data['topics']);

        $this->load->view('frontend/english_overview_v', $data);
        ///////////////////////////////////////

    }
	public function questions($subject,$grade,$topic,$start=0){
		$data['banner_title']=ucfirst($subject);
		$data['title']=ucfirst($grade);
		$grade_id=get_id_by_slug('id',$grade,'grade');
		$subject_id=get_id_by_slug('id',$subject,'subject');
		$topic_id=get_returnfield('topics','slug',$topic,'topic_id');
		$data['subjects']=get_table_data(array('id','name'),'subject');
		$data['questions']=$this->frontend_model->get_questions_by_one(array('grade_id'=>$grade_id,'subject_id'=>$subject_id,'topic_id'=>$topic_id),false,$start);
		$data['start']=1;
		$data['grade_id']=$grade_id;
		$data['subject_id']=$subject_id;
		$data['topic_id']=$topic_id;
		//print_r($data); exit();
		//echo $this->db->last_query(); exit();
		$this->session->unset_userdata('score_ans');
		$this->session->unset_userdata('score_smart');
		$this->session->unset_userdata('total_qScore');
		$this->load->view('frontend/questions_page',$data);
	}

	public function worksheets(){
        $data['title']='Worksheets';
        $data['worksheets']=$this->frontend_model->get_worksheets();
        $this->load->view('frontend/worksheet_list_page', $data);
    }
}