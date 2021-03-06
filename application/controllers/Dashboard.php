<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct(){

		parent::__construct();
		$this->load->model('user_model');

	}
	public function index()
	{
        if(!empty($_POST['child_id'])){
            $user_id=$_POST['child_id'];
            $this->session->set_userdata('child_id',$user_id);
        } else{
            $user_id = $this->session->userdata('user_id');
            $this->session->set_userdata('child_id',$user_id);
        }
        //$data['child_id']=$user_id;

        //$user_id = $this->session->userdata('user_id');
        if(isset($user_id) && !empty($user_id)) {
            $data = array(
                'title'     => 'Dashboard',
                'user_data' => $this->user_model->get_userdata(),
	            'child_id'  => $user_id
            );
            $data['topics']=$this->user_model->get_log_in_user_topic($user_id);
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
    public function favourite_worksheet() {
        isLogin();
        $user_id = $this->session->userdata('user_id');
        $data['title']='Favourite worksheet';
        $data['user_data']=$this->user_model->get_userdata();
        $data['child_data']=$this->user_model->get_child_data($user_id);
        $data['favourite_worksheets']=$this->user_model->get_favourite_worksheet(array('user_id'=>get_current_user_id()),false);
        $this->load->view( 'favourite_worksheet_v', $data );
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

            $msg = 'Successfully activate the plan<br><br>
                    <b>Membership Plan Details:</b>
                    <b>Subscriber Name:  </b>'.get_returnfield('user','id',$user_id,'fname').'<br>
                    <b>Membership:  </b>'.get_returnfield('membership','id',$membership_plan,'name').'<br>
                    <b>Amount:  </b>$'.$amount.'
                    <br><br>
                    Regards,<br>AppleKitch';
            send_mail(get_returnfield('user','id',$user_id,'email_address'), 'Subscription plan details', $msg);

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
			//'password' => md5($this->input->post('password')),
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
	public function childcertificate() {
		isLogin();
		$user_id = $this->session->userdata('user_id');
		$data['title']='Children';
		$data['user_data']=$this->user_model->get_userdata();
		$data['child_data']=$this->user_model->get_child_data($user_id);
		//echo $this->db->last_query(); exit();
		$this->load->view( 'children_certificate_v', $data );

	}
    public function share() {
        isLogin();
        $user_id = $this->session->userdata('user_id');
        $data['title']='Share with friends';
        $data['method']='share';
        $data['user_data']=$this->user_model->get_userdata();
        if(!empty($this->input->post('send'))){
            $this->form_validation->set_rules('message', 'Message', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required');
			if ($this->form_validation->run() == FALSE){
                $this->load->view( 'child_share_v', $data );
            } else{
                $value['message']=str_replace("{{url}}",'<a href='.base_url().' >Applekitch</a>',$this->input->post('message'));
                $value['email']=$this->input->post('email');
                $send_mail=send_mail($value['email'],'Invitation from Applekitch',$value['message']);
                if($send_mail){
                    $this->session->set_flashdata(array('msg_type'=>'success','msg'=>'One email send to your friends email address!'));
                    $this->load->view( 'child_share_v', $data );
                } else{
                    $this->session->set_flashdata(array('msg_type'=>'error','msg'=>'Email not send. Please try again later!'));
                    $this->load->view( 'child_share_v', $data );
                }
            }
        }
        //echo $this->db->last_query(); exit();
        $this->load->view( 'child_share_v', $data );

    }
	public function certificates(){

		isLogin();
		if(loginCheck() && get_returnfield('user','id',get_parent(get_current_user_id()),'membership_plan')=='1') {
			$user_id           = ( ! empty( $_GET['child_id'] ) ) ? $_GET['child_id'] : get_current_user_id();
			$data['title']     = 'Certificates';
			$data['user_data'] = $this->user_model->get_userdata();
			if ( ! empty( $this->input->post( 'filter' ) ) ) {
				$conditions = array( 'user_id' );
			} else {
				$data['certificates'] = $this->user_model->get_ans_certificates_by_user( $user_id );
			}
		} else {
			$user_id = ( ! empty( $_GET['child_id'] ) ) ? $_GET['child_id'] : get_current_user_id();
			$data['title']     = 'Certificates';
			$data['user_data'] = $this->user_model->get_userdata($user_id);
			$data['certificates'] = 0;
		}

		//print_r($data['certificates']); exit;


		$this->load->view('certificate_v',$data);
	}
	public function generate_pdf($certificate_id){

		$data['certificates']=$this->user_model->get_ans_certificates_by_id($certificate_id);
		//print_r($data['certificates']); exit();
		$data['certificate_details']=$this->user_model->get_certificates_by_id($data['certificates']->certificate_id);
		$this->load->view('certificate_pdf_v',$data);
		$html = $this->output->get_output();
		//echo $html; exit;

		$this->load->library('pdf');
		// Load HTML content
		$this->dompdf->loadHtml($html);
		//echo $html; exit();

		// (Optional) Setup the paper size and orientation
		$this->dompdf->setPaper('A4', 'landscape');

		// Render the HTML as PDF
		$this->dompdf->render();

		// Output the generated PDF (1 = download and 0 = preview)
		$this->dompdf->stream("certificates.pdf", array("Attachment"=>0));
	}
	public function childaward() {
		isLogin();
		$user_id = $this->session->userdata('user_id');
		$data['title']='Children';
		$data['user_data']=$this->user_model->get_userdata();
		$data['child_data']=$this->user_model->get_child_data($user_id);
		//echo $this->db->last_query(); exit();
		$this->load->view( 'children_award_v', $data );

	}
	public function awards($subject = 'english', $grade = 'reception'){

		$this->load->model('award_model');
		isLogin();
		if(!empty($_GET['child_id'])) {
			$user_id = $_GET['child_id'];
			$data['user_data'] = $this->user_model->get_userdata_by_id($user_id);
		} else {
			$user_id = get_current_user_id();
			$data['user_data'] = $this->user_model->get_userdata();
		}
		$data['subjects'] = $this->award_model->get_subjects();
		$data['grades'] = $this->award_model->get_grades();
		$data['subject_var'] = $this->award_model->get_subject_by_slug($subject);
		$data['grade_var'] = $this->award_model->get_grade_by_slug($grade);
		$data['title'] = $data['grade_var']->name.' '.$data['subject_var']->name.' Awards';
		$data['child_id'] = $user_id;
		$data['award_click'] = $this->award_model->award_click($user_id, $data['subject_var']->id, $data['grade_var']->id);

		$data['question_ans'] = $this->award_model->get_question_ans_by_sub_grade($data['subject_var']->id, $data['grade_var']->id, $user_id);
		$data['ans_topic'] = $this->award_model->get_ans_topic_by_sub_grade($data['subject_var']->id, $data['grade_var']->id, $user_id);


		if(!empty($this->input->post('filter'))){
			$conditions=array('user_id');
		} else{
			$data['certificates']=$this->user_model->get_ans_certificates_by_user($user_id);
		}


		$this->load->view('award_v',$data);
	}
	public function usage(){
		isLogin();
		//$this->session->unset_userdata('child_id');
		if(isUserType('Parent')==true || isUserType('Teacher')==true || isUserType('School')==true){
			if(!empty($_POST['child_id'])){
				$user_id=$_POST['child_id'];
				$this->session->set_userdata('child_id',$user_id);
			} else{
				$user_id=0;
			}
			if(!empty($this->session->userdata('child_id'))){
				$user_id=$this->session->userdata('child_id');
			}

		} else{
			$user_id=get_current_user_id();
		}
		$data['get_child_id']=$user_id;
		$data['title']='Usage';
		$data['user_data'] = $this->user_model->get_userdata();
		if(!empty($this->input->post('filter'))){
			$conditions=array('user_id');
		} else{
			$data['certificates']=$this->user_model->get_ans_certificates_by_user($user_id);
		}
		$data['user_details']=$this->user_model->get_questions_ans(array('user_id'=>$user_id),false,'submit_date','asc');
		$total_time=0;
		$jquery_day_text='';
		$jquery_day_array=array();
        $jquery_year_pie='';
        $jquery_year_array=array();
		foreach ($data['user_details'] as $userdetails){
			$total_time=$total_time+$userdetails->ans_time;
			$rcv_date=dateFormat('Y-m-d',$userdetails->submit_date);
			$rcv_year=$userdetails->grade_id;
			if(!empty($jquery_day_array[$rcv_date])){
				$jquery_day_array[$rcv_date]=1+$jquery_day_array[$rcv_date];
			} else{
				$jquery_day_array[$rcv_date]=1;
			}
            if(!empty($jquery_year_array[$rcv_year])){
                $jquery_year_array[$rcv_year]=1+$jquery_year_array[$rcv_year];
            } else{
                $jquery_year_array[$rcv_year]=1;
            }

		}
		//print_r($jquery_day_array); exit();
		$data['user_skill_details']=$this->user_model->get_ans_topic(array('user_id'=>$user_id),false);
		$data['total_q_ans']=count($data['user_details']);
		$data['total_time_spent']=secondsToTime($total_time, 'short');
		$data['total_completed_topic']=count($data['user_skill_details']);
		// count day wise question
        ksort($jquery_day_array);
		foreach ($jquery_day_array as $key=>$value){
			$jquery_day_text.="['".dateFormat('d M',$key)."',  ".$value."],";
		}
        ksort($jquery_year_array);
        foreach ($jquery_year_array as $key=>$value){
            $grade_name=get_returnfield('grade','id',$key,'name');
            if(!empty($grade_name) || $grade_name!=''){
                $jquery_year_pie.="['".$grade_name."',  ".$value."],";
            }

        }


		//print_r($jquery_day_text); exit();
		$data['jquery_day_text']=$jquery_day_text;
		$data['jquery_year_pie']=$jquery_year_pie;
		$this->load->view('analytics_usage_v',$data);
	}
	public function scorechart($subject='2', $grade='1'){
		isLogin();
		if(isUserType('Parent')==true || isUserType('Teacher')==true || isUserType('School')==true){
			if(!empty($_POST['child_id'])){
				$user_id=$_POST['child_id'];
				$this->session->set_userdata('child_id',$user_id);
			} else{
				$user_id=0;
			}
			if(!empty($this->session->userdata('child_id'))){
				$user_id=$this->session->userdata('child_id');
			}

		} else{
			$user_id=get_current_user_id();
		}
		$data['get_child_id']=$user_id;
		$data['title']='Score';
		$data['search_url']='scorechart';
		$data['user_data'] = $this->user_model->get_userdata();

		$conditions="user_id='".$user_id."'";
		if(!empty($_POST['subject_id'])){
			$conditions.=" AND subject_id='".$_POST['subject_id']."'";
		}
		if(!empty($_POST['grade_id'])){
			$conditions.=" AND grade_id='".$_POST['grade_id']."'";
		}
		$data['user_details']=$this->user_model->get_questions_ans($conditions,false,'category_id','asc');
		foreach ($data['user_details'] as $userdetails){
			//$total_time=$total_time+$userdetails->ans_time;
			//$rcv_date=dateFormat('Y-m-d',$userdetails->submit_date);
			if(!empty($jquery_day_array[$userdetails->category_id])){ //// if category id array key present
				if(!empty($jquery_day_array[$userdetails->category_id][$userdetails->topic_id])) { //// if topic id array key present
					$jquery_day_array[ $userdetails->category_id ][$userdetails->topic_id]['total_time']=( $jquery_day_array[ $userdetails->category_id ][ $userdetails->topic_id ]['total_time'] ) + $userdetails->ans_time;
					$jquery_day_array[ $userdetails->category_id ][$userdetails->topic_id]['total_ans']=( $jquery_day_array[ $userdetails->category_id ][ $userdetails->topic_id ]['total_ans'] ) + 1;
					if($userdetails->answer_type=='true'){
						if(!empty($jquery_day_array[ $userdetails->category_id ][$userdetails->topic_id]['total_ans_right'])) {
							$jquery_day_array[ $userdetails->category_id ][ $userdetails->topic_id ]['total_ans_right'] = ( $jquery_day_array[ $userdetails->category_id ][ $userdetails->topic_id ]['total_ans_right'] ) + 1;
						} else{
							$jquery_day_array[ $userdetails->category_id ][ $userdetails->topic_id ]['total_ans_right'] =0;
						}
					}
					$jquery_day_array[ $userdetails->category_id ][$userdetails->topic_id]['last_date']=($jquery_day_array[ $userdetails->category_id ][$userdetails->topic_id]['last_date']>$userdetails->submit_date)?$jquery_day_array[ $userdetails->category_id ][$userdetails->topic_id]['last_date']:$userdetails->submit_date;
				}else {
					$jquery_day_array[$userdetails->category_id][$userdetails->topic_id]['total_time']=$userdetails->ans_time;
					$jquery_day_array[$userdetails->category_id][$userdetails->topic_id]['total_ans']=1;
					if($userdetails->answer_type=='true'){
						$jquery_day_array[ $userdetails->category_id ][$userdetails->topic_id]['total_ans_right']= 1;
					}
					$jquery_day_array[ $userdetails->category_id ][$userdetails->topic_id]['last_date']=$userdetails->submit_date;
				}
			} else{ //// if category id array key not present
				$jquery_day_array[$userdetails->category_id][$userdetails->topic_id]['total_time']=$userdetails->ans_time;
				$jquery_day_array[$userdetails->category_id][$userdetails->topic_id]['total_ans']=1;
				if($userdetails->answer_type=='true'){
					$jquery_day_array[$userdetails->category_id][$userdetails->topic_id]['total_ans_right']= 1;
				}
				$jquery_day_array[ $userdetails->category_id ][$userdetails->topic_id]['last_date']=$userdetails->submit_date;
			}

		}

		if(!empty($jquery_day_array)){
			$data['jquery_day_array']=$jquery_day_array;
		}

		$this->load->view('analytics_score_chart_v',$data);
	}
	public function progress($subject='2', $grade='1'){
		isLogin();
		if(isUserType('Parent')==true || isUserType('Teacher')==true || isUserType('School')==true){
			if(!empty($_POST['child_id'])){
				$user_id=$_POST['child_id'];
				$this->session->set_userdata('child_id',$user_id);
			} else{
				$user_id=0;
			}
			if(!empty($this->session->userdata('child_id'))){
				$user_id=$this->session->userdata('child_id');
			}

		} else{
			$user_id=get_current_user_id();
		}
		$data['get_child_id']=$user_id;
		$data['title']='Progress';
		$data['user_data'] = $this->user_model->get_userdata();
		$data['search_url']='progress';
		$conditions="user_id='".$user_id."'";
		if(!empty($_POST['subject_id'])){
			$conditions.=" AND subject_id='".$_POST['subject_id']."'";
		}
		if(!empty($_POST['grade_id'])){
			$conditions.=" AND grade_id='".$_POST['grade_id']."'";
		}
		$data['user_details']=$this->user_model->get_questions_ans($conditions,false,'category_id','asc');
		//echo $this->db->last_query(); exit;
		foreach ($data['user_details'] as $userdetails){
			//$total_time=$total_time+$userdetails->ans_time;
			//$rcv_date=dateFormat('Y-m-d',$userdetails->submit_date);
			if(!empty($jquery_day_array[$userdetails->category_id])){ //// if category id array key present
				if(!empty($jquery_day_array[$userdetails->category_id][$userdetails->topic_id])) { //// if topic id array key present
					$jquery_day_array[ $userdetails->category_id ][$userdetails->topic_id]['total_time']=( $jquery_day_array[ $userdetails->category_id ][ $userdetails->topic_id ]['total_time'] ) + $userdetails->ans_time;
					$jquery_day_array[ $userdetails->category_id ][$userdetails->topic_id]['total_ans']=( $jquery_day_array[ $userdetails->category_id ][ $userdetails->topic_id ]['total_ans'] ) + 1;
					if($userdetails->answer_type=='true'){
						if(!empty($jquery_day_array[ $userdetails->category_id ][$userdetails->topic_id]['total_ans_right'])) {
							$jquery_day_array[ $userdetails->category_id ][ $userdetails->topic_id ]['total_ans_right'] = ( $jquery_day_array[ $userdetails->category_id ][ $userdetails->topic_id ]['total_ans_right'] ) + 1;
						} else {
							$jquery_day_array[ $userdetails->category_id ][$userdetails->topic_id]['total_ans_right']=0;
						}
					}
				}else {
					$jquery_day_array[$userdetails->category_id][$userdetails->topic_id]['total_time']=$userdetails->ans_time;
					$jquery_day_array[$userdetails->category_id][$userdetails->topic_id]['total_ans']=1;
					if($userdetails->answer_type=='true'){
						$jquery_day_array[ $userdetails->category_id ][$userdetails->topic_id]['total_ans_right']= 1;
					}
				}
			} else{ //// if category id array key not present
				$jquery_day_array[$userdetails->category_id][$userdetails->topic_id]['total_time']=$userdetails->ans_time;
				$jquery_day_array[$userdetails->category_id][$userdetails->topic_id]['total_ans']=1;
				if($userdetails->answer_type=='true'){
					$jquery_day_array[$userdetails->category_id][$userdetails->topic_id]['total_ans_right']= 1;
				}
			}

		}
		if(!empty($jquery_day_array)){
			$data['jquery_day_array']=$jquery_day_array;
		}

		//print_r($jquery_day_array); exit;
		$this->load->view('analytics_progress_v',$data);
	}
	public function questionlog(){
		isLogin();
		if(isUserType('Parent')==true || isUserType('Teacher')==true || isUserType('School')==true){
			if(!empty($_POST['child_id'])){
				$user_id=$_POST['child_id'];
				$this->session->set_userdata('child_id',$user_id);
			} else{
				$user_id=0;
			}
			if(!empty($this->session->userdata('child_id'))){
				$user_id=$this->session->userdata('child_id');
			}

		} else{
			$user_id=get_current_user_id();
		}
		$data['get_child_id']=$user_id;
		$data['title']='Question Logs';
        $data['search_url']='questionlog';
		$data['user_data'] = $this->user_model->get_userdata();
        $conditions="user_id='".$user_id."'";
        if(!empty($_POST['subject_id'])){
            $conditions.=" AND subject_id='".$_POST['subject_id']."'";
        }
        if(!empty($_POST['grade_id'])){
            $conditions.=" AND grade_id='".$_POST['grade_id']."'";
        }
        $data['user_details']=$this->user_model->get_questions_ans($conditions,false,'category_id','asc');
        //print_r($data['user_details']); exit();

		$this->load->view('analytics_question_log_v',$data);
	}
	public function troublespot(){
		isLogin();
		if(isUserType('Parent')==true || isUserType('Teacher')==true || isUserType('School')==true){
			if(!empty($_POST['child_id'])){
				$user_id=$_POST['child_id'];
				$this->session->set_userdata('child_id',$user_id);
			} else{
				$user_id=0;
			}
			if(!empty($this->session->userdata('child_id'))){
				$user_id=$this->session->userdata('child_id');
			}

		} else{
			$user_id=get_current_user_id();
		}
		$data['get_child_id']=$user_id;
		$data['title']='Trouble Spots';
		$data['user_data'] = $this->user_model->get_userdata();
		$data['search_url']='troublespot';
		$conditions="user_id='".$user_id."'";
		if(!empty($_POST['subject_id'])){
			$conditions.=" AND subject_id='".$_POST['subject_id']."'";
		}
		if(!empty($_POST['grade_id'])){
			$conditions.=" AND grade_id='".$_POST['grade_id']."'";
		}
		$data['user_details']=$this->user_model->get_questions_ans($conditions,false,'category_id','asc');
		//echo $this->db->last_query(); exit;
		foreach ($data['user_details'] as $userdetails){
			//$total_time=$total_time+$userdetails->ans_time;
			//$rcv_date=dateFormat('Y-m-d',$userdetails->submit_date);

			if(!empty($jquery_day_array[$userdetails->category_id])){ //// if category id array key present
				//$jquery_day_array[ $userdetails->category_id ][$userdetails->topic_id]['total_ans_wrong']=0;
				if(!empty($jquery_day_array[$userdetails->category_id][$userdetails->topic_id])) { //// if topic id array key present
					$jquery_day_array[ $userdetails->category_id ][$userdetails->topic_id]['total_time']=( $jquery_day_array[ $userdetails->category_id ][ $userdetails->topic_id ]['total_time'] ) + $userdetails->ans_time;

					if($userdetails->answer_type=='true'){
						if(!empty($jquery_day_array[ $userdetails->category_id ][$userdetails->topic_id]['total_marks'])){
							$jquery_day_array[ $userdetails->category_id ][$userdetails->topic_id]['total_marks']=( $jquery_day_array[ $userdetails->category_id ][ $userdetails->topic_id ]['total_marks'] ) + $userdetails->marks;
						} else{
							$jquery_day_array[ $userdetails->category_id ][$userdetails->topic_id]['total_marks']=0;
						}

					} else {
						if(!empty($jquery_day_array[ $userdetails->category_id ][ $userdetails->topic_id ]['total_ans_wrong'])){
							$jquery_day_array[ $userdetails->category_id ][$userdetails->topic_id]['total_ans_wrong']=( $jquery_day_array[ $userdetails->category_id ][ $userdetails->topic_id ]['total_ans_wrong'] ) + 1;
						} else{
							$jquery_day_array[ $userdetails->category_id ][$userdetails->topic_id]['total_ans_wrong']=1;
						}


					}
				}else {
					$jquery_day_array[$userdetails->category_id][$userdetails->topic_id]['total_time']=$userdetails->ans_time;

					if($userdetails->answer_type=='true'){
						$jquery_day_array[ $userdetails->category_id ][$userdetails->topic_id]['total_marks']= $userdetails->marks;

					} else {
						$jquery_day_array[ $userdetails->category_id ][$userdetails->topic_id]['total_ans_wrong']=1;
					}
				}
			} else{ //// if category id array key not present
				$jquery_day_array[$userdetails->category_id][$userdetails->topic_id]['total_time']=$userdetails->ans_time;
				if($userdetails->answer_type=='true'){
					$jquery_day_array[ $userdetails->category_id ][$userdetails->topic_id]['total_marks']= $userdetails->marks;

				} else {
					$jquery_day_array[ $userdetails->category_id ][$userdetails->topic_id]['total_ans_wrong']=1;
				}
			}

		}
		if(!empty($jquery_day_array)){
			$data['jquery_day_array']=$jquery_day_array;
		}
		$this->load->view('analytics_trouble_spots_v',$data);
	}
}
