<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct(){

		parent::__construct();
		$this->load->model('admin_model');
		$this->load->database();
		//$this->load->library('image_crop_gd');
		$this->load->model('images');

		$config['upload_path'] = $_SERVER["DOCUMENT_ROOT"].'/files/';
		$config['allowed_types'] = 'gif|jpg|jpeg|png';
		$this->load->library('upload', $config);
	}
	public function index() {
		isLogin('admin');
		$data = array(
			'title' => 'Dashboard',
		);
		$this->load->view( 'admin/admin', $data );

	}
	public function login() {
		$data = array(
			'title' => 'Login',
		);
		$this->load->view('admin/login', $data);
	}
	public function login_submit() {
		$admin = array(
			'username' => $this->input->post( 'username' ),
			'password' => md5( $this->input->post( 'pwd' ) )
		);
		$login = $this->admin_model->login($admin);
		if($login) {
			$this->session->set_userdata('admin_logged_in', 1);
			redirect( 'admin' );
		} else {
			$this->session->set_flashdata( 'success_msg', 'Username or Password does not match' );
			redirect( 'admin/login' );
		}
	}
	public function admin_logout() {
		$this->session->sess_destroy();
		//$this->session->set_flashdata( 'success_msg', 'You have been successfully logged out' );
		redirect('admin/login');
	}
	public function users() {
		isLogin('admin');
		$users = $this->admin_model->get_users();
		$roles = $this->admin_model->get_roles();
		$data = array(
			'title' => 'Users',
			'users' => $users,
			'roles' => $roles
		);
		$this->load->view( 'admin/users', $data );

	}
	public function user_roles() {
		isLogin('admin');

		$roles = $this->admin_model->get_roles();
		$data = array(
			'title' => 'User Roles',
			'roles' => $roles
		);
		$this->load->view( 'admin/user_roles', $data );

	}
	public function edit_role() {
		//echo dirname(__DIR__); exit();
		isLogin('admin');
		$role_id = $this->input->get('role_id');
		if(isset($role_id)) {
			$role = $this->admin_model->get_role_by_id($role_id);
			$data = array(
				'title' => 'Edit Role',
				'role' => $role
			);
			$this->load->view( 'admin/edit_role', $data );
		} else {
			$roles = $this->admin_model->get_roles();
			$data = array(
				'title' => 'User Roles',
				'roles' => $roles
			);
			$this->load->view( 'admin/user_roles', $data );
		}


	}
	public function edit_role_process() {

	}
	public function questions($s='') {
		isLogin('admin');
		if($s=='') {
			$data['title']     = 'Questions';
			$data['questions'] = $this->admin_model->get_questions();
			$this->load->view( 'admin/questions_v', $data );
		} else{
			$conditions=array();
			if(!empty($this->input->post('country_id')))
				$conditions=array('country_id'=>$this->input->post('country_id'));
			if(!empty($this->input->post('subject_id')))
				$conditions=array('subject_id'=>$this->input->post('subject_id'));
			if(!empty($this->input->post('grade_id')))
				$conditions=array('grade_id'=>$this->input->post('grade_id'));
			if(!empty($this->input->post('category_id')))
				$conditions=array('category_id'=>$this->input->post('category_id'));
			if(!empty($this->input->post('topic_id')))
				$conditions=array('topic_id'=>$this->input->post('topic_id'));
			if(!empty($conditions)){
				$data['title']     = 'Search Result';
				$data['questions'] = $this->admin_model->get_questions($conditions,false);
				$this->load->view( 'admin/questions_v', $data );
			}

		}
	}
	public function preview() {
		$qid = $_GET['qid'];
		if(!empty($qid)) {
			$data['question']=$this->admin_model->get_question_by_id($qid);
			$this->load->view( 'preview_v', $data );
		}
	}
	public function edit_question($question_id){
		isLogin('admin');
		$data['title']='Edit Question';
		$data['questions']=$this->admin_model->get_questions(array('question_id'=>$question_id), true);
		//print_r($data['questions']);
		$this->load->view( 'admin/edit_question_v', $data );
	}
	public function question_option() {
		isLogin('admin');
		$data['title']='Question options';
		$data['question_options']=$this->admin_model->get_question_options();
		$this->load->view( 'admin/question_option_v', $data );

	}
	public function question_type() {
		isLogin('admin');
		$data['title']='Question Types';
		$data['question_types']=$this->admin_model->get_question_type();
		$this->load->view( 'admin/question_type_v', $data );

	}
	public function topics() {
		isLogin('admin');
		$data['title']='Topics';
		$data['topics']=$this->admin_model->get_topics();
		$this->load->view( 'admin/topics_v', $data );
	}
	public function add_question_option() {
		isLogin('admin');
		$data['method']='add_question_option';
		$data['title']='Add question option';
		if(!empty($this->input->post('save'))){
			$this->form_validation->set_rules('option_name', 'Type Name', 'required');
			if ($this->form_validation->run() == FALSE){
				$this->load->view( 'admin/add_question_option_v', $data );
			} else{
				$value['option_name']=$this->input->post('option_name');
				$value['status']='active';
				$insert=$this->admin_model->insert_qst_type($value);
				if($insert){
					$this->session->set_flashdata(array('msg_type'=>'success','msg'=>'New question option added!'));
					$this->load->view( 'admin/add_question_option_v', $data );
				} else{
					$this->session->set_flashdata(array('msg_type'=>'error','msg'=>'Please try again later!'));
					$this->load->view( 'admin/add_question_option_v', $data );
				}
			}
		} else {
			$this->load->view( 'admin/add_question_option_v', $data );
		}
	}
	public function add_topic() {
		isLogin('admin');
		$data['method']='add_topic';
		$data['title']='Add Topic';
		if(!empty($this->input->post('save'))){
			$this->form_validation->set_rules('topic_name', 'Topic Name', 'required');
			if ($this->form_validation->run() == FALSE){
				$this->load->view( 'admin/add_topic_v', $data );
			} else{
				$value['topic_name']=$this->input->post('topic_name');
				$value['status']='active';
				$insert=$this->admin_model->insert_topic($value);
				if($insert){
					$this->session->set_flashdata(array('msg_type'=>'success','msg'=>'New topic added!'));
					$this->load->view( 'admin/add_topic_v', $data );
				}
			}
		} else {
			$this->load->view( 'admin/add_topic_v', $data );
		}
	}
	public function edit_question_option($id) {
		isLogin('admin');
		$data['method']='edit_question_option';
		$data['title']='Edit question option';
		if(!empty($this->input->post('update'))){
			$this->form_validation->set_rules('option_name', 'Type Name', 'required');
			if ($this->form_validation->run() == FALSE){
				$this->load->view( 'admin/add_question_option_v', $data );
			} else{
				$value['option_name']=$this->input->post('option_name');
				$value['status']='active';
				$condition=array('option_id'=>$id);
				$insert=$this->admin_model->update_qst_type($condition,$value);
				if($insert){
					$this->session->set_flashdata(array('msg_type'=>'success','msg'=>'New question option added!'));
					$this->load->view( 'admin/add_question_option_v', $data );
				} else{
					$this->session->set_flashdata(array('msg_type'=>'error','msg'=>'Please try again later!'));
					$this->load->view( 'admin/add_question_option_v', $data );
				}
			}
		} else {
			$this->load->view( 'admin/add_question_option_v', $data );
		}
	}
	public function add_question(){
		isLogin('admin');
		$data['method']='add_question';
		$data['title']='Add question';
		$this->load->view( 'admin/add_question_v', $data );
	}
	public function membership_plans() {
		isLogin('admin');
		$memberships = $this->admin_model->get_memberships();
		$data = array(
			'title' => 'Membership Plans',
			'memberships' => $memberships
		);
		$this->load->view( 'admin/membership_plans', $data );
	}
	public function edit_membership() {
		isLogin('admin');
		$membership_id = $this->input->get('membership_id');
		$membership_plan = $this->admin_model->get_memberships_by_id($membership_id);
		$data = array(
			'title' => $membership_plan['name'],
			'membership' => $membership_plan
		);
		$this->load->view( 'admin/edit_membership', $data );
	}
	public function save_membership() {
		isLogin('admin');
		$membership_id = $this->input->post('membership_id');
		$name = $this->input->post('name');
		$yearly_price = $this->input->post('yearly_price');
		$monthly_price = $this->input->post('monthly_price');
		$limitq = $this->input->post('limit');
		$this->db->set('name', $name);
		$this->db->set('yearly_price', $yearly_price);
		$this->db->set('monthly_price', $monthly_price);
		$this->db->set('limitq', $limitq);
		$this->db->where('id',$membership_id);
		$this->db->update('membership');

		redirect( 'admin/membership_plans' );

	}
	public function grade() {
		isLogin('admin');

		$grades = $this->admin_model->get_grades();
		$data = array(
			'title' => 'Grades',
			'grades' => $grades
		);
		$this->load->view( 'admin/grades', $data );

	}
	public function add_grade() {
		isLogin('admin');

		$data = array(
			'title' => 'Add Grade'
		);
		$this->load->view( 'admin/add_grades', $data );

	}
	public function save_grade() {
		isLogin('admin');

		$name = $this->input->post('name');
		$short_name = $this->input->post('short_name');

		if ( ! $this->upload->do_upload('img')) {
			$this->form_validation->set_error_delimiters('<p class="error">', '</p>');
			$this->session->set_flashdata('error_msg', $this->upload->display_errors());
			redirect('admin/grade');
		} else {
			$data = array('upload_data' => $this->upload->data());
			$file_name = $data['upload_data']['file_name'];

			$return = $this->image_crop_gd->image_cropping($data);

			$insert = $this->images->insert($data);

			if($insert) {
				$grade_array = array(
					'name' => $name,
					'slug' => $short_name,
					'img' => $insert,
				);
				$this->admin_model->insert_grade($grade_array);
			}
			//$this->load->view('success', $data);
			redirect('admin/grade');
		}
	}
	public function delete_grade() {
		isLogin('admin');

		$grade = $this->input->get('grade_id');
		$this->admin_model->delete_grade($grade);
		redirect('admin/grade');
	}
	public function edit_grade() {
		isLogin('admin');

		$grade = $this->admin_model->get_grade_by_id($this->input->get('grade_id'));
		if($grade) {
			$data = array(
				'title' => $grade['name'],
				'grade' => $grade
			);
			$this->load->view( 'admin/edit_grades', $data );
		} else {
			redirect('admin/grade');
		}

	}
	public function update_grade() {
		isLogin('admin');

		$name = $this->input->post('name');
		$grade_id = $this->input->post('grade_id');
		$short_name = $this->input->post('short_name');

		if ( ! $this->upload->do_upload('img')) {
			$this->form_validation->set_error_delimiters('<p class="error">', '</p>');
			$this->session->set_flashdata('error_msg', $this->upload->display_errors());
			$grade_array = array(
				'id' => $grade_id,
				'name' => $name,
				'slug' => $short_name,
			);
			$this->admin_model->update_grade($grade_array);
			redirect('admin/grade');
		} else {
			$data = array('upload_data' => $this->upload->data());
			$file_name = $data['upload_data']['file_name'];

			$return = $this->image_crop_gd->image_cropping($data);

			$insert = $this->images->insert($data);

			if($insert) {
				$grade_array = array(
					'id' => $grade_id,
					'name' => $name,
					'slug' => $short_name,
					'img' => $insert,
				);
				$this->admin_model->update_grade($grade_array);
				redirect('admin/grade');
			}
			//$this->load->view('success', $data);
			redirect('admin/grade');
		}
	}
	public function subjects() {
		isLogin('admin');

		$subjects = $this->admin_model->get_subjects();
		$data = array(
			'title' => 'Subjects',
			'subjects' => $subjects
		);
		$this->load->view( 'admin/subjects', $data );

	}
	public function add_subject() {
		isLogin('admin');

		$data = array(
			'title' => 'Add Subject',
			'grades' => $this->admin_model->get_grades(),
			'countries' => $this->admin_model->get_countries()
		);
		$this->load->view( 'admin/add_subject', $data );

	}
	public function delete_subject() {
		isLogin('admin');
		$subject = $this->input->get('subject_id');
		$this->admin_model->delete_subject($subject);
		redirect('admin/subjects');
	}
	public function save_subject() {
		isLogin('admin');
		$name = $this->input->post('name');
		//$grade = $this->input->post('grade');
		/*if(empty($grade)) {
			$grade = 0;
		}*/
		//$country = $this->input->post('country');
		/*if(empty($country)) {
			$country = 0;
		}*/

		$subject_array = array(
			'name' => $name
			/*'grade' => $grade,
			'country' => $country,*/
		);
		$this->admin_model->insert_subject($subject_array);
		redirect('admin/subjects');
	}
	public function edit_subject() {
		isLogin('admin');
		$subject = $this->admin_model->get_subject_by_id($this->input->get('subject_id'));
		if($subject) {
			$data = array(
				'title' => $subject['name'],
				'subject' => $subject,
				'grades' => $this->admin_model->get_grades(),
				'countries' => $this->admin_model->get_countries(),
			);
			$this->load->view( 'admin/edit_subject', $data );
		} else {
			redirect('admin/subjects');
		}

	}
	public function update_subject() {
		isLogin('admin');
		$subject_id = $this->input->post('subject_id');
		$name = $this->input->post('name');
		$grade = $this->input->post('grade');
		if(empty($grade)) {
			$grade = 0;
		}
		$country = $this->input->post('country');
		if(empty($country)) {
			$country = 0;
		}

		$subject_array = array(
			'id' => $subject_id,
			'name' => $name,
			'grade' => $grade,
			'country' => $country,
		);
		$this->admin_model->update_subject($subject_array);
		redirect('admin/subjects');
	}
	public function category() {
		isLogin('admin');
		$category = $this->admin_model->get_category();
		$data = array(
			'title' => 'Category',
			'category' => $category
		);
		$data['category']=$category;
		$this->load->view( 'admin/category', $data );

	}
	public function add_category() {
		isLogin('admin');

		$data = array(
			'title' => 'Add Category',
			'category' => $this->admin_model->get_category(),
			'grades' => $this->admin_model->get_grades(),
			'countries' => $this->admin_model->get_countries(),
			'subjects' => $this->admin_model->get_subjects(),

		);

        //$this->session->set_flashdata(array('msg_type'=>'success','msg'=>'New category added!'));
		$this->load->view( 'admin/add_category', $data );

	}
	public function delete_category() {
		isLogin('admin');
		$category = $this->input->get('category_id');
		$this->admin_model->delete_category($category);
		redirect('admin/category');
	}
	public function save_category() {
		isLogin('admin');

		$name = $this->input->post('name');
		/*$grade = $this->input->post('grade');
		if(empty($grade)) {
			$grade = 0;
		}
		$country = $this->input->post('country');
		if(empty($country)) {
			$country = 0;
		}
		$subject = $this->input->post('subject');
		if(empty($subject)) {
			$subject = 0;
		}
		$parent = $this->input->post('parent');
		if(empty($parent)) {
			$parent = 0;
		}*/

		$category_array = array(
			'name' => $name,
			/*'grade' => $grade,
			'country' => $country,
			'subject' => $subject,
			'parent' => $parent,*/
		);
        if(!empty($_FILES['category_image']['name'])){
            $img_path=image_upload($_FILES,'category_image','uploads');
            if($img_path){
                $category_array['cat_img']=$img_path;
            } else{
                $this->session->set_flashdata(array('msg_type'=>'success','msg'=>'Image not uploaded!'));
                $this->load->view( 'admin/add_category', $data );
                return false;
            }
        }
		$this->admin_model->insert_category($category_array);
        $this->session->set_flashdata(array('msg_type'=>'error','msg'=>'New category added!'));
		redirect('admin/category');
	}
	public function edit_category($cat_id) {
		isLogin( 'admin' );
		$data['title']    = 'Edit Category';
		$data['category'] = $this->admin_model->get_categories( array( 'id' => $cat_id ) );
		if ( ! empty( $this->input->post( 'save' ) ) ) {
			$this->form_validation->set_rules( 'cat_name', 'Category Name', 'required' );
			if ( $this->form_validation->run() == false ) {
				$this->load->view( 'admin/edit_category', $data );
			} else {
				$value['name']=$this->input->post('cat_name');
                if(!empty($_FILES['category_image']['name'])){
                    $img_path=image_upload($_FILES,'category_image','uploads');
                    if($img_path){
                        $value['cat_img']=$img_path;
                    } else{
                        $this->session->set_flashdata(array('msg_type'=>'success','msg'=>'Image not uploaded!'));
                        $this->load->view( 'admin/edit_category', $data );
                        return false;
                    }
                }
				$result=$this->admin_model->update_category(array('id'=>$cat_id),$value);
				if($result){
					$data['category'] = $this->admin_model->get_categories( array( 'id' => $cat_id ) );
					$this->session->set_flashdata(array('msg_type'=>'success','msg'=>'Category edited!'));
					$this->load->view( 'admin/edit_category', $data );
				} else{
					$this->session->set_flashdata(array('msg_type'=>'error','msg'=>'Please try again later!'));
					$this->load->view( 'admin/edit_category', $data );
				}
			}
		} else{
			$this->load->view( 'admin/edit_category', $data );
		}
	}
	public function update_category() {
		isLogin('admin');
		$category_id = $this->input->post('category_id');
		$name = $this->input->post('name');
		$grade = $this->input->post('grade');
		if(empty($grade)) {
			$grade = 0;
		}
		$country = $this->input->post('country');
		if(empty($country)) {
			$country = 0;
		}
		$subject = $this->input->post('subject');
		if(empty($subject)) {
			$subject = 0;
		}
		$parent = $this->input->post('parent');
		if(empty($parent)) {
			$parent = 0;
		}

		$category_array = array(
			'id' => $category_id,
			'name' => $name,
			'grade' => $grade,
			'country' => $country,
			'subject' => $subject,
			'parent' => $parent
		);
		$this->admin_model->update_category($category_array);
		redirect('admin/category');
	}
	public function certificates() {
		isLogin('admin');
		$data['title']='Certificates';
		$data['certificates']=$this->admin_model->get_certificates();
		$this->load->view( 'admin/certificate_v', $data );
	}
	public function add_certificate() {
		isLogin('admin');
		$data['method']='add_certificate';
		$data['title']='Add Certificate';
		if(!empty($this->input->post('save'))){
			$this->form_validation->set_rules('name', 'Certificate Name', 'required');
			$this->form_validation->set_rules('subject_id', 'Subject', 'required');
			$this->form_validation->set_rules('grade_id', 'Grade', 'required');
			$this->form_validation->set_rules('category_id', 'Category', 'required');
			$this->form_validation->set_rules('topic_id', 'Topic', 'required');
			if ($this->form_validation->run() == FALSE){
				$this->load->view( 'admin/add_certificate_v', $data );
			} else{
				$value['name']=$this->input->post('name');
				$value['subject_id']=$this->input->post('subject_id');
				$value['grade_id']=$this->input->post('grade_id');
				$value['category_id']=$this->input->post('category_id');
				$value['topic_id']=$this->input->post('topic_id');
				$value['description']=$this->input->post('description');
				if(!empty($this->input->post('default_status')))
					$value['default_status']='true';
				$value['status']='active';
				$value['create_dt']=date('Y-m-d H:i:s');

				if(!empty($_FILES['cer_bg_img']['name'])){
					$img_path=image_upload($_FILES,'cer_bg_img','uploads');
					if($img_path){
						$value['cer_bg_img']=$img_path;
					} else{
						$this->load->view( 'admin/add_certificate_v', $data );
						return false;
					}
				}
				if(!empty($_FILES['cer_signature_img']['name'])){
					$img_path=image_upload($_FILES,'cer_signature_img','uploads');
					if($img_path){
						$value['cer_signature_img']=$img_path;
					} else{
						$this->load->view( 'admin/add_certificate_v', $data );
						return false;
					}
				}

				$insert=$this->admin_model->insert_certificate($value);
				if($insert){
					$this->session->set_flashdata(array('msg_type'=>'success','msg'=>'New certificate added!'));
					$this->load->view( 'admin/add_certificate_v', $data );
				} else{
					$this->session->set_flashdata(array('msg_type'=>'error','msg'=>'Something goes wrong. Please try again later!'));
					$this->load->view( 'admin/add_certificate_v', $data );
				}
			}
		} else {
			$this->load->view( 'admin/add_certificate_v', $data );
		}
	}
	public function edit_certificate($id) {
		isLogin('admin');
		$data['method']='edit_certificate';
		$data['title']='Edit Certificate';
		$data['certificates']=$this->admin_model->get_certificates(array('id'=>$id),true);
		if(!empty($this->input->post('update'))){
			$this->form_validation->set_rules('name', 'Certificate Name', 'required');
			$this->form_validation->set_rules('subject_id', 'Subject', 'required');
			$this->form_validation->set_rules('grade_id', 'Grade', 'required');
			$this->form_validation->set_rules('category_id', 'Category', 'required');
			$this->form_validation->set_rules('topic_id', 'Topic', 'required');
			if ($this->form_validation->run() == FALSE){
				$this->load->view( 'admin/add_certificate_v', $data );
			} else{
				$value['name']=$this->input->post('name');
				$value['subject_id']=$this->input->post('subject_id');
				$value['grade_id']=$this->input->post('grade_id');
				$value['category_id']=$this->input->post('category_id');
				$value['topic_id']=$this->input->post('topic_id');
				//$value['status']=$this->input->post('status');
				$value['description']=$this->input->post('description');
				if(!empty($this->input->post('default_status')))
					$value['default_status']='true';
				//$value['create_dt']=date('Y-m-d H:i:s');
				if(!empty($_FILES['cer_bg_img']['name'])){
					$img_path=image_upload($_FILES,'cer_bg_img','uploads');
					if($img_path){
						$value['cer_bg_img']=$img_path;
					} else{
						$this->load->view( 'admin/add_certificate_v', $data );
						return false;
					}
				}
				if(!empty($_FILES['cer_signature_img']['name'])){
					$img_path=image_upload($_FILES,'cer_signature_img','uploads');
					if($img_path){
						$value['cer_signature_img']=$img_path;
					} else{
						$this->load->view( 'admin/add_certificate_v', $data );
						return false;
					}
				}
				$conditions=array('id'=>$id);
				$update=$this->admin_model->edit_certificate($conditions,$value);
				if($update){
					$data['certificates']=$this->admin_model->get_certificates(array('id'=>$id),true);
					$this->session->set_flashdata(array('msg_type'=>'success','msg'=>'certificate updated successfully!'));
					$this->load->view( 'admin/edit_certificate_v', $data );
				} else{
					$this->session->set_flashdata(array('msg_type'=>'error','msg'=>'Something goes wrong. Please try again later!'));
					$this->load->view( 'admin/edit_certificate_v', $data );
				}
			}
		} else {
			$this->load->view( 'admin/edit_certificate_v', $data );
		}
	}

	public function certificate_settings(){
		isLogin('admin');
		$data['title']='Certificate settings';
		$data['settings']=$this->admin_model->get_certificate_settings();
		$this->load->view( 'admin/certificate_settings_v', $data );

	}
	public function pages() {
		isLogin('admin');
		$pages = $this->admin_model->get_pages();
		$data = array(
			'title' => 'Pages',
			'pages' => $pages
		);
		$this->load->view( 'admin/pages', $data );
	}

	public function add_page(){
		isLogin('admin');
		/*$data = array(
			'title' => 'Add Page',
		);*/

		$data['method']='add_page';
		$data['title']='Add Page';
		if(!empty($this->input->post('add_page'))){
			$this->form_validation->set_rules('page_name', 'Page Name', 'required');
			$this->form_validation->set_rules('page_title', 'Page Title', 'required');
			if ($this->form_validation->run() == FALSE){
				$this->load->view( 'admin/add_page', $data );
			} else {
				$value['page']=$this->input->post('page_name');
				$value['page_title']=$this->input->post('page_title');
				$value['page_content']=$this->input->post('page_content');
				$value['meta_keyword']=$this->input->post('meta_keyword');
				$value['meta_description']=$this->input->post('meta_description');
				$value['status']='active';
				$value['create_dt']=date('Y-m-d H:i:s');
				$value['modify_dt']=date('Y-m-d H:i:s');
				$insert=$this->admin_model->insert_page($value);
				if($insert){
					$this->session->set_flashdata(array('msg_type'=>'success','msg'=>'New page added!'));
					$this->load->view( 'admin/add_page', $data );
				} else{
					$this->session->set_flashdata(array('msg_type'=>'error','msg'=>'Something goes wrong. Please try again later!'));
					$this->load->view( 'admin/add_page', $data );
				}
			}
		} else {
			$this->load->view( 'admin/add_page', $data );
		}
	}

	public function edit_page($id){
		isLogin('admin');
		$data['method']='edit_page';
		$data['title']='Edit Page';
		$data['page_data']=$this->admin_model->get_page_data(array('page_id'=>$id),true);
		if(!empty($this->input->post('update_page'))){
			$this->form_validation->set_rules('page_name', 'Page Name', 'required');
			$this->form_validation->set_rules('page_title', 'Page Title', 'required');
			if ($this->form_validation->run() == FALSE) {
				$this->load->view( 'admin/edit_page', $data );
			} else {
				$value['page']=$this->input->post('page_name');
				$value['page_title']=$this->input->post('page_title');
				$value['page_content']=$this->input->post('page_content');
				$value['meta_keyword']=$this->input->post('meta_keyword');
				$value['meta_description']=$this->input->post('meta_description');
				$value['status']='active';
				$value['modify_dt']=date('Y-m-d H:i:s');
				$conditions=array('page_id'=>$id);
				$update=$this->admin_model->edit_page($conditions,$value);

				if($update){
					$data['page_data']=$this->admin_model->get_page_data(array('page_id'=>$id),true);
					$this->session->set_flashdata(array('msg_type'=>'success','msg'=>'Page updated successfully!'));
					$this->load->view( 'admin/edit_page', $data );
				} else{
					$this->session->set_flashdata(array('msg_type'=>'error','msg'=>'Something goes wrong. Please try again later!'));
					$this->load->view( 'admin/edit_page', $data );
				}
			}
		} else {
			$this->load->view( 'admin/edit_page', $data );
		}
	}

	public function award_templates(){
		isLogin('admin');
		$data['title']='Award Templates';
		$data['templates']=$this->admin_model->get_award_templates(array(),false);
		$this->load->view( 'admin/award_templates_v', $data );
	}
	public function add_award_template(){
		isLogin('admin');
		$data['method']='add_award_template';
		$data['title']='Add Template';
		if(!empty($this->input->post('save'))){
			$this->form_validation->set_rules('title', 'title', 'required');
			if ($this->form_validation->run() == FALSE){
				$this->load->view( 'admin/add_award_template_v', $data );
			} else {
				$value['title']=$this->input->post('title');
				$value['details']=$this->input->post('details');
				/*$value['page_content']=$this->input->post('page_content');
				$value['meta_keyword']=$this->input->post('meta_keyword');
				$value['meta_description']=$this->input->post('meta_description');
				$value['status']='active';*/
				$value['create_dt']=date('Y-m-d H:i:s');
				$value['modify_dt']=date('Y-m-d H:i:s');
				$insert=$this->admin_model->insert_award_template($value);
				if($insert){
					$this->session->set_flashdata(array('msg_type'=>'success','msg'=>'New template added!'));
					$this->load->view( 'admin/award_templates_v', $data );
				} else{
					$this->session->set_flashdata(array('msg_type'=>'error','msg'=>'Something goes wrong. Please try again later!'));
					$this->load->view( 'admin/add_award_template_v', $data );
				}
			}
		} else {
			$this->load->view( 'admin/add_award_template_v', $data );
		}
	}
}
