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
			'title' => 'AppleKitch',
		);
		$this->load->view('home_page', $data);
	}
	public function home()
	{
		$data = array(
			'title' => 'AppleKitch',
		);
		$this->load->view('home_page', $data);
	}
	public function grades(){
		$data['title']='Grades';
		$this->load->view('frontend/grade_page',$data);
	}
	public function topic($grade,$subject){
		$data['banner_title']=ucfirst($subject);
		$data['title']=ucfirst($grade.' '.$subject);
		$grade_id=get_id_by_slug('id',$grade,'grade');
		$subject_id=get_id_by_slug('id',$subject,'subject');
		$data['grade']=get_returnfield('grade','id',$grade_id,'slug');
		$data['subject']=get_returnfield('subject','id',$subject_id,'slug');
		//$data['topic']=get_returnfield('topics','topic_id',$topic_id,'slug');
		$data['topics']=get_topic_by($grade_id,$subject_id);
		$data['questions']=$this->frontend_model->get_questions(array('grade_id'=>$grade_id,'subject_id'=>$subject_id),false);
		$this->load->view('frontend/topic_page',$data);
	}
	public function questions($grade,$subject,$topic,$start=0){
		$data['banner_title']=ucfirst($subject);
		$data['title']=ucfirst($grade);
		$grade_id=get_id_by_slug('id',$grade,'grade');
		$subject_id=get_id_by_slug('id',$subject,'subject');
		$topic_id=$topic;
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
}