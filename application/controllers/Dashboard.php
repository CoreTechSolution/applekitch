<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct(){

		parent::__construct();
		$this->load->model('user_model');

	}
	public function index()
	{
		$user_id = $this->session->userdata('user_id');
		if(isset($user_id) && !empty($user_id)) {
			$data = array(
				'title'     => 'Dashboard',
				'user_data' => $this->user_model->get_userdata(),
			);
			$this->load->view( 'dashboard', $data );
		} else {
			$this->session->set_flashdata('error_msg', 'Please login first');
			redirect('login');
		}
	}
	public function manage_profile() {
		$user_id = $this->session->userdata('user_id');
		if(isset($user_id) && !empty($user_id)) {
			$data = array(
				'title'     => 'Manage Profile',
				'user_data' => $this->user_model->get_userdata(),
			);
			$this->load->view( 'manage_profile', $data );
		} else {
			$this->session->set_flashdata('error_msg', 'Please login first');
			redirect('login');
		}
	}
	public function save_profile() {
		if(!empty($this->input->post('pwd1'))) {
			$user = array(
				'email_address' => $this->input->post( 'email_address' ),
				'fname'         => $this->input->post( 'fname' ),
				'lname'         => $this->input->post( 'lname' ),
				//'phone'         => $this->input->post( 'phone' ),
				'password'      => md5( $this->input->post( 'pwd1' ) )
			);
		} else {
			$user = array(
				'email_address' => $this->input->post( 'email_address' ),
				'fname'         => $this->input->post( 'fname' ),
				'lname'         => $this->input->post( 'lname' ),
				//'phone'         => $this->input->post( 'phone' ),
			);
		}
		if(!empty($_FILES['profile_img']['name'])){
			$img_path=image_upload($_FILES,'profile_img','uploads');
			if($img_path){
				$user['profile_img']=$img_path;
			} else{
				redirect('manage-profile');
				return false;
			}
		}
		//print_r($user); exit();
		//$user['profile_img']=
		$this->user_model->save_profile($user);
		$this->session->set_flashdata('success_msg', 'Profile updated successfully');
		redirect('manage-profile');
	}
	public function membership_plan() {
		$user_id = $this->session->userdata('user_id');
		if(isset($user_id) && !empty($user_id)) {
			$memberships = $this->user_model->get_memberships();
			$data = array(
				'title' => 'Membership Plans',
				'user_data' => $this->user_model->get_userdata(),
				'memberships' => $memberships
			);
			$this->load->view( 'membership_plan', $data );
		} else {
			$this->session->set_flashdata('error_msg', 'Please login first');
			redirect('login');
		}
	}
	public function payment() {
		$user_id = $this->session->userdata('user_id');
		if(isset($user_id) && !empty($user_id)) {
			$membership_plan = $this->input->post('membership_plan');
			$price = $this->input->post('membership_price');
			$membership = $this->user_model->get_memberships_by_id($membership_plan);
			$data = array(
				'title' => 'Payment',
				'user_data' => $this->user_model->get_userdata(),
				'membership' => $membership,
				'price' => $price
			);
			$this->load->view( 'payment', $data );
		} else {
			$this->session->set_flashdata('error_msg', 'Please login first');
			redirect('login');
		}
	}
	public function payment_process() {
		$user_id = $this->session->userdata('user_id');
		if(isset($user_id) && !empty($user_id)) {
			require_once(APPPATH.'third_party/stripe-php/config.php');
			$user_data = $this->user_model->get_userdata();
			$membership_plan = $this->input->post('membership_plan');
			$membership = $this->user_model->get_memberships_by_id($membership_plan);
			$amount = $this->input->post('amount');
			$stripeToken = $this->input->post('stripeToken');
			$ym = $this->input->post('ym');
			if(!empty($amount)) {
				if(!empty($stripeToken)) {
					$amount1   = $amount * 100;
					$token    = $stripeToken;
					$customer = \Stripe\Customer::create( array(
						'email' => $user_data['email_address'],
						'card'  => $token
					) );
					$charge   = \Stripe\Charge::create( array(
						'customer'    => $customer->id,
						'amount'      => $amount1,
						"description" => 'AppleKitch ' . $user_data['fname'] . ' ' . $user_data['lname'] . ' - ' . $membership['name'],
						'currency'    => 'gbp'
					) );
					if ( $charge ) {
						$this->user_model->subscribe( $user_id, $membership_plan, $amount, $ym, $customer );
					}
				} else {
					$this->user_model->subscribe( $user_id, $membership_plan, $amount, $ym, array() );
				}
			}
			echo 'success';
		} else {
			echo 'failure';
		}
	}
	public function children() {
		$user_id = $this->session->userdata('user_id');
		if(isset($user_id) && !empty($user_id)) {
			$data = array(
				'title'     => 'Children',
				'user_data' => $this->user_model->get_userdata(),
				'child_data' => $this->user_model->get_child_data($user_id)
			);
			//echo $this->db->last_query(); exit();
			$this->load->view( 'children', $data );
		} else {
			$this->session->set_flashdata('error_msg', 'Please login first');
			redirect('login');
		}
	}
	public function add_child() {
		$user_id = $this->session->userdata('user_id');
		if(isset($user_id) && !empty($user_id)) {
			$data = array(
				'title'     => 'Children',
				'user_data' => $this->user_model->get_userdata()
			);
			$this->load->view( 'add_child', $data );
		} else {
			$this->session->set_flashdata('error_msg', 'Please login first');
			redirect('login');
		}
	}
	public function add_child_process() {
		$user_id = $this->session->userdata('user_id');
		$user = array(
			'fname' => $this->input->post('fname'),
			'lname' => $this->input->post('lname'),
			'email_address' => $this->input->post('email'),
			'password' => md5($this->input->post('password')),
			'role' => 3,
			'parent' => $user_id,
			'activation' => 1
		);
		$email_check = $this->user_model->email_check($user['email_address']);

		if($email_check) {
			$add_child = $this->user_model->add_child( $user );
			if ( $add_child ) {
				redirect( 'children' );
			} else {
				$this->session->set_flashdata( 'error_msg', 'Some problem occured. Please try again' );
				redirect('add-child');
			}
		} else {
			$this->session->set_flashdata('error_msg', 'Email address already exists');
			redirect('add-child');
		}
	}
	public function edit_child() {
		$user_id = $this->session->userdata('user_id');
		$child_id = $this->input->get('child_id');
		if(isset($user_id) && !empty($user_id)) {
			$child_data = $this->user_model->get_child_data_by_id($child_id);
			$data = array(
				'title'      => 'Edit Children',
				'user_data'  => $this->user_model->get_userdata(),
				'child_data' => $child_data
			);
			$this->load->view( 'add_child', $data );
		} else {
			$this->session->set_flashdata('error_msg', 'Please login first');
			redirect('login');
		}
	}
	public function edit_child_process() {
		if(!empty($this->input->post('password'))) {
			$user = array(
				'fname'         => $this->input->post( 'fname' ),
				'lname'         => $this->input->post( 'lname' ),
				'id'            => $this->input->post( 'child_id' ),
				'password'      => md5( $this->input->post( 'password' ) )
			);
		} else {
			$user = array(
				'fname'         => $this->input->post( 'fname' ),
				'lname'         => $this->input->post( 'lname' ),
				'id'            => $this->input->post( 'child_id' )
			);
		}

		$add_child = $this->user_model->edit_child( $user );
		if ( $add_child ) {
			redirect( 'children' );
		} else {
			$this->session->set_flashdata( 'error_msg', 'Some problem occurred. Please try again' );
			redirect('edit-child/child_id', $this->input->post( 'child_id' ));
		}
	}
	public function delete_child() {
		$child_id = $this->input->get('child_id');
		if(!empty($child_id)) {
			if($this->user_model->delete_child($child_id)) {
				$this->session->set_flashdata( 'success_msg', 'Child deleted successfully.' );
				redirect( 'children' );
			} else {
				$this->session->set_flashdata( 'error_msg', 'Some problem occurred. Please try again' );
				redirect( 'children' );
			}
		}
	}
	public function certificates(){

		isLogin();
		$user_id=get_current_user_id();
		$data['title']='Certificates';
		$data['user_data'] = $this->user_model->get_userdata();
		if(!empty($this->input->post('filter'))){
			$conditions=array('user_id');
		} else{
			$data['certificates']=$this->user_model->get_ans_certificates_by_user($user_id);
		}


		$this->load->view('certificate_v',$data);
	}
	public function generate_pdf($certificate_id){

		$data['certificates']=$this->user_model->get_ans_certificates_by_id($certificate_id);
		$data['certificate_details']=$this->user_model->get_certificates_by_id($certificate_id);
		$this->load->view('certificate_pdf_v',$data);
		$html = $this->output->get_output();

		$this->load->library('pdf');
		// Load HTML content
		$this->dompdf->loadHtml($html);

		// (Optional) Setup the paper size and orientation
		$this->dompdf->setPaper('A4', 'landscape');

		// Render the HTML as PDF
		$this->dompdf->render();

		// Output the generated PDF (1 = download and 0 = preview)
		$this->dompdf->stream("certificates.pdf", array("Attachment"=>0));
	}
	public function awards($subject = 'english', $grade = 'reception'){

		$this->load->model('award_model');
		isLogin();
		$user_id=get_current_user_id();
		$data['user_data'] = $this->user_model->get_userdata();
		$data['subjects'] = $this->award_model->get_subjects();
		$data['grades'] = $this->award_model->get_grades();
		$data['subject_var'] = $this->award_model->get_subject_by_slug($subject);
		$data['grade_var'] = $this->award_model->get_grade_by_slug($grade);
		$data['title'] = $data['grade_var']->name.' '.$data['subject_var']->name.' Awards';

		$data['question_ans'] = $this->award_model->get_question_ans_by_sub_grade($data['subject_var']->id, $data['grade_var']->id, get_current_user_id());
		$data['ans_topic'] = $this->award_model->get_ans_topic_by_sub_grade($data['subject_var']->id, $data['grade_var']->id, get_current_user_id());


		if(!empty($this->input->post('filter'))){
			$conditions=array('user_id');
		} else{
			$data['certificates']=$this->user_model->get_ans_certificates_by_user($user_id);
		}


		$this->load->view('award_v',$data);
	}
	public function usage(){
		isLogin();
		$user_id=get_current_user_id();
		$data['title']='Certificates';
		$data['user_data'] = $this->user_model->get_userdata();
		if(!empty($this->input->post('filter'))){
			$conditions=array('user_id');
		} else{
			$data['certificates']=$this->user_model->get_ans_certificates_by_user($user_id);
		}
		$data['user_details']=$this->user_model->get_questions_ans(array('user_id'=>get_current_user_id()),false,'submit_date','asc');
		$total_time=0;
		$jquery_day_text='';
		$jquery_day_array=array();
		foreach ($data['user_details'] as $userdetails){
			$total_time=$total_time+$userdetails->ans_time;
			 $rcv_date=dateFormat('Y-m-d',$userdetails->submit_date);
			if(!empty($jquery_day_array[$rcv_date])){
				$jquery_day_array[$rcv_date]=1+$jquery_day_array[$rcv_date];
			} else{
				$jquery_day_array[$rcv_date]=1;
			}

		}
		//print_r($jquery_day_array); exit();
		$data['user_skill_details']=$this->user_model->get_ans_topic(array('user_id'=>get_current_user_id()),false);
		$data['total_q_ans']=count($data['user_details']);
		$data['total_time_spent']=secondsToTime($total_time, 'short');
		$data['total_completed_topic']=count($data['user_skill_details']);
		// count day wise question
		foreach ($jquery_day_array as $key=>$value){
			$jquery_day_text.="['".dateFormat('d M',$key)."',  ".$value."],";
		}
		//print_r($jquery_day_text); exit();
		$data['jquery_day_text']=$jquery_day_text;
		$this->load->view('analytics_usage_v',$data);
	}
	public function scorechart($subject='2', $grade='1'){
		isLogin();
		$user_id=get_current_user_id();
		$data['title']='Score';
		$data['user_data'] = $this->user_model->get_userdata();
		$this->load->view('analytics_score_chart_v',$data);
	}
	public function progress($subject='2', $grade='1'){
		isLogin();
		$user_id=get_current_user_id();
		$data['title']='Progress';
		$data['user_data'] = $this->user_model->get_userdata();
		$this->load->view('analytics_progress_v',$data);
	}
	public function questionlog(){
		isLogin();
		$user_id=get_current_user_id();
		$data['title']='Trouble Spots';
		$data['user_data'] = $this->user_model->get_userdata();
		$this->load->view('analytics_trouble_spots_v',$data);
	}
	public function troublespot(){
		isLogin();
		$user_id=get_current_user_id();
		$data['title']='Trouble Spots';
		$data['user_data'] = $this->user_model->get_userdata();
		$this->load->view('analytics_trouble_spots_v',$data);
	}
}
