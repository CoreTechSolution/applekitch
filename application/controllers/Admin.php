<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct(){

		parent::__construct();
		$this->load->model('admin_model');
		$this->load->database();
		//$this->load->library('image_crop_gd');
		$this->load->model('images');

        $config['upload_path'] = ADS_IMAGE_PATH;
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
			if(($this->input->get('country_id'))!='0') {
                $conditions = array('country_id' => $this->input->get('country_id'));
                $data['country_id'] = $this->input->get('country_id');
            }
			if(($this->input->get('subject_id'))!='0') {
                $conditions = array('subject_id' => $this->input->get('subject_id'));
                $data['subject_id'] = $this->input->get('subject_id');
            }
			if(($this->input->get('grade_id'))!='0') {
                $conditions = array('grade_id' => $this->input->get('grade_id'));
                $data['grade_id'] = $this->input->get('grade_id');
            }
			if(($this->input->get('category_id'))!='0') {
                $conditions = array('category_id' => $this->input->get('category_id'));
                $data['category_id'] = $this->input->get('category_id');
            }
			if(($this->input->get('topic_id'))!='0') {
                $conditions = array('topic_id' => $this->input->get('topic_id'));
                $data['topic_id'] = $this->input->get('topic_id');
            }
			if(($conditions)){
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
				$value['slug']=$this->input->post('slug');
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
    public function edit_topic($id) {
        isLogin('admin');
        $data['method']='edit_topic';
        $data['title']='Edit Topic';
        $data['topics']=$this->admin_model->get_topics(array('topic_id'=>$id),false);
        //print_r($data['topics']); exit();
        if(!empty($this->input->post('save'))){
            $this->form_validation->set_rules('topic_name', 'Topic Name', 'required');
            if ($this->form_validation->run() == FALSE){
                $this->load->view( 'admin/edit_topic_v', $data );
            } else{
                $value['topic_name']=$this->input->post('topic_name');
                //$value['status']='active';
                $con=array('topic_id'=>$id);
                $insert=$this->admin_model->edit_topic($value,$con);
                if($insert){
                    $this->session->set_flashdata(array('msg_type'=>'success','msg'=>'topic updated!'));
                    $data['topics']=$this->admin_model->get_topics(array('topic_id'=>$id),false);
                    $this->load->view( 'admin/edit_topic_v', $data );
                } else{
                    $this->session->set_flashdata(array('msg_type'=>'error','msg'=>'tSomething wrong try again later!'));
                    $data['topics']=$this->admin_model->get_topics(array('topic_id'=>$id),false);
                    $this->load->view( 'admin/edit_topic_v', $data );
                }
            }
        } else {
            $this->load->view( 'admin/edit_topic_v', $data );
        }
    }
	public function edit_question_option($id) {
		isLogin('admin');
		$data['method']='edit_question_option';
		$data['title']='Edit question option';
		//$data['options']=$this->admin_model->get_question_options(arra)
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
                //$this->load->view( 'admin/add_certificate_v', $data );
                return false;
            }
        }

        /*if ( ! $this->upload->do_upload('category_image')) {
            $this->form_validation->set_error_delimiters('<p class="error">', '</p>');
            $this->session->set_flashdata('error_msg', $this->upload->display_errors());

            $this->admin_model->insert_category($category_array);

        }else {
            $data_img = array('upload_data' => $this->upload->data());

            $return = $this->image_crop_gd->image_cropping($data_img);

            $insert = $this->images->insert($data_img);

            if($insert) {
                $category_array['cat_img']=$insert;

                $this->admin_model->insert_category($category_array);
            }
        }*/
        $insert=$this->admin_model->insert_category($category_array);

        if($insert) {
            /*$category_array['cat_img']=$insert;

            $this->admin_model->insert_category($category_array);*/
	        $this->session->set_flashdata(array('msg_type'=>'success','msg'=>'New category added!'));
        }

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
/*
                if ( ! $this->upload->do_upload('category_image')) {
                    $this->form_validation->set_error_delimiters('<p class="error">', '</p>');
                    $this->session->set_flashdata('error_msg', $this->upload->display_errors());

                    $result=$this->admin_model->update_category(array('id'=>$cat_id),$value);

                }else {
                    $data_img = array('upload_data' => $this->upload->data());

                    $return = $this->image_crop_gd->image_cropping($data_img);

                    $insert = $this->images->insert($data_img);

                    if($insert) {
                        $value['cat_img']=$insert;

                        $result=$this->admin_model->update_category(array('id'=>$cat_id),$value);
                    }
                }*/

                if(!empty($_FILES['category_image']['name'])){
                    $img_path=image_upload($_FILES,'category_image','uploads');
                    if($img_path){
                        $value['cat_img']=$img_path;
                    } else{
                        //$this->load->view( 'admin/add_certificate_v', $data );
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
				else{
                    $value['default_status']='false';
                }
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
				$value['page_slug']=slugify($this->input->post('page_name'));
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
	public function copy_q() {
		$qid = $_GET['qid'];
		$result = $this->admin_model->copy_question($qid);
		if($result) {
			redirect( 'admin/questions' );
		} else {
			redirect( 'admin/questions' );
		}
	}
	public function settings(){
        isLogin('admin');
        $data['title'] = 'Settings';
        $data['method'] = 'admin/settings';
        //$data['name']=$this->users->get_user_field($this->users->get_current_user_id(),'name');
        $data['settings']=$this->admin_model->get_settings();


        //stripe settings update
        if(!empty($this->input->post('stripe_submit'))){
            $this->form_validation->set_rules('secrete_key', 'Secrete Key', 'required');
            $this->form_validation->set_rules('publishable_key', 'Publishable Key', 'required');
            if ($this->form_validation->run() == false) {
                $this->load->view( 'admin/settings_v', $data );
            } else{
                $value['secrete_key'] = $this->input->post('secrete_key');
                $value['publishable_key'] = $this->input->post('publishable_key');
                $value['client_id'] = $this->input->post('client_id');
                $settings_id = $this->admin_model->update_settings($value, array('settings_id'=>$this->input->post('settings_id')));
                if ($settings_id > 0) {
                    $this->session->set_flashdata('msg', 'Settings successfully upadated!.');
                    $this->session->set_flashdata('msg_type', 'Success');
                    $data['settings']=$this->admin_model->get_settings();
                    $this->load->view( 'admin/settings_v', $data );
                } else {
                    $this->session->set_flashdata('msg', 'Something wrong! Please try again later.');
                    $this->session->set_flashdata('msg_type', 'Error');
                    $data['settings']=$this->admin_model->get_settings();
                    $this->load->view( 'admin/settings_v', $data );
                }
            }
        }
        elseif(!empty($this->input->post('paypal_submit'))){
            $this->form_validation->set_rules('paypal_email', 'Client ID', 'required');
            $this->form_validation->set_rules('paypal_mode', 'Paypal Mode', 'required');
            if ($this->form_validation->run() == false) {
                $this->load->view( 'admin/settings_v', $data );
            } else{
                $value['paypal_email'] = $this->input->post('paypal_email');
                $value['paypal_mode'] = $this->input->post('paypal_mode');
                $value['client_id'] = $this->input->post('client_id');
                $settings_id = $this->admin_model->update_settings($value, array('settings_id'=>$this->input->post('settings_id')));
                if ($settings_id > 0) {
                    $this->session->set_flashdata('msg', 'Settings successfully upadated!.');
                    $this->session->set_flashdata('msg_type', 'Success');
                    $data['settings']=$this->admin_model->get_settings();
                    $this->load->view( 'admin/settings_v', $data );
                } else {
                    $this->session->set_flashdata('msg', 'Something wrong! Please try again later.');
                    $this->session->set_flashdata('msg_type', 'Error');
                    $data['settings']=$this->admin_model->get_settings();
                    $this->load->view( 'admin/settings_v', $data );
                }
            }
        }
        elseif(!empty($this->input->post('login_submit'))){
            $this->form_validation->set_rules('fb_app_id', 'Facebook App ID', 'required');
            //$this->form_validation->set_rules('paypal_mode', 'Paypal Mode', 'required');
            if ($this->form_validation->run() == false) {
                $this->load->view( 'admin/settings_v', $data );
            } else{
                $value['fb_app_id'] = $this->input->post('fb_app_id');
                //$value['paypal_mode'] = $this->input->post('paypal_mode');
                //$value['client_id'] = $this->input->post('client_id');
                $settings_id = $this->admin_model->update_settings($value, array('settings_id'=>$this->input->post('settings_id')));
                if ($settings_id > 0) {
                    $this->session->set_flashdata('msg', 'Settings successfully upadated!.');
                    $this->session->set_flashdata('msg_type', 'Success');
                    $data['settings']=$this->admin_model->get_settings();
                    $this->load->view( 'admin/settings_v', $data );
                } else {
                    $this->session->set_flashdata('msg', 'Something wrong! Please try again later.');
                    $this->session->set_flashdata('msg_type', 'Error');
                    $data['settings']=$this->admin_model->get_settings();
                    $this->load->view( 'admin/settings_v', $data );
                }
            }
        }
        // General Settings updated
        elseif(!empty($this->input->post('general_submit'))){
            $this->form_validation->set_rules('admin_mail', 'Admin Email', 'required');
            $this->form_validation->set_rules('contact_mail', 'Contact Email', 'required');
            if ($this->form_validation->run() == false) {
                $this->load->view( 'admin/settings_v', $data );
            } else{
                $value['admin_mail'] = $this->input->post('admin_mail');
                $value['contact_mail'] = $this->input->post('contact_mail');
                $settings_id = $this->admin_model->update_settings($value, array('settings_id'=>$this->input->post('settings_id')));
                if ($settings_id > 0) {
                    $this->session->set_flashdata('msg', 'Settings successfully upadated!.');
                    $this->session->set_flashdata('msg_type', 'Success');
                    $data['settings']=$this->admin_model->get_settings();
                    $this->load->view( 'admin/settings_v', $data );
                } else {
                    $this->session->set_flashdata('msg', 'Something wrong! Please try again later.');
                    $this->session->set_flashdata('msg_type', 'Error');
                    $data['settings']=$this->admin_model->get_settings();
                    $this->load->view( 'admin/settings_v', $data );
                }
            }
        }
        elseif(!empty($this->input->post('smtp_setting'))){
            $this->form_validation->set_rules('protocol', 'Protocol', 'required');
            $this->form_validation->set_rules('smtp_host', 'SMTP Host', 'required');
            $this->form_validation->set_rules('smtp_port', 'SMTP Port', 'required');
            $this->form_validation->set_rules('smtp_crypto', 'SMTP Crypto', 'required');
            $this->form_validation->set_rules('smtp_user', 'SMTP User', 'required');
            $this->form_validation->set_rules('smtp_pass', 'SMTP Password', 'required');
            if ($this->form_validation->run() == false) {
                $this->load->view( 'admin/settings_v', $data );
            } else{
                $value['protocol'] = $this->input->post('protocol');
                $value['smtp_host'] = $this->input->post('smtp_host');
                $value['smtp_port'] = $this->input->post('smtp_port');
                $value['smtp_crypto'] = $this->input->post('smtp_crypto');
                $value['smtp_user'] = $this->input->post('smtp_user');
                $value['smtp_pass'] = $this->input->post('smtp_pass');
                $settings_id = $this->admin_model->update_settings($value, array('settings_id'=>$this->input->post('settings_id')));
                if ($settings_id > 0) {
                    $this->session->set_flashdata('msg', 'Settings successfully upadated!.');
                    $this->session->set_flashdata('msg_type', 'Success');
                    $data['settings']=$this->admin_model->get_settings();
                    $this->load->view( 'admin/settings_v', $data );
                } else {
                    $this->session->set_flashdata('msg', 'Something wrong! Please try again later.');
                    $this->session->set_flashdata('msg_type', 'Error');
                    $data['settings']=$this->admin_model->get_settings();
                   $this->load->view( 'admin/settings_v', $data );
                }
            }
        }
        elseif(!empty($this->input->post('download_submit'))){
            $this->form_validation->set_rules('commision_type', 'Commision Type', 'required');
            $this->form_validation->set_rules('commision_rate', 'Commision Rate', 'required');
            if ($this->form_validation->run() == false) {
               $this->load->view( 'admin/settings_v', $data );
            } else{
                $value['commision_type'] = $this->input->post('commision_type');
                $value['commision_rate'] = $this->input->post('commision_rate');
                $settings_id = $this->admin_model->update_settings($value, array('settings_id'=>$this->input->post('settings_id')));
                if ($settings_id > 0) {
                    $this->session->set_flashdata('msg', 'Settings successfully upadated!.');
                    $this->session->set_flashdata('msg_type', 'Success');
                    $data['settings']=$this->admin_model->get_settings();
                   $this->load->view( 'admin/settings_v', $data );
                } else {
                    $this->session->set_flashdata('msg', 'Something wrong! Please try again later.');
                    $this->session->set_flashdata('msg_type', 'Error');
                    $data['settings']=$this->admin_model->get_settings();
                   $this->load->view( 'admin/settings_v', $data );
                }
            }
        }
        elseif(!empty($this->input->post('social_submit'))){

            $value['facebook'] = $this->input->post('facebook');
            $value['twitter'] = $this->input->post('twitter');
            $value['google_plus'] = $this->input->post('google_plus');
            $value['instragram'] = $this->input->post('instragram');
            $value['youtube'] = $this->input->post('youtube');
            $social_media['social_media']=json_encode($value);
            $settings_id = $this->admin_model->update_settings($social_media, array('settings_id'=>$this->input->post('settings_id')));
            if ($settings_id > 0) {
                $this->session->set_flashdata('msg', 'Settings successfully upadated!.');
                $this->session->set_flashdata('msg_type', 'Success');
                $data['settings']=$this->admin_model->get_settings();
               $this->load->view( 'admin/settings_v', $data );
            } else {
                $this->session->set_flashdata('msg', 'Something wrong! Please try again later.');
                $this->session->set_flashdata('msg_type', 'Error');
                $data['settings']=$this->admin_model->get_settings();
               $this->load->view( 'admin/settings_v', $data );
            }

        }
        else{
            $this->load->view( 'admin/settings_v', $data );
        }


        //print_r($data);

    }
    public function home_settings(){
        isLogin('admin');
        $data['title'] = 'Home Page Settings';
        $data['method'] = 'admin/home_settings';
        //$data['name']=$this->users->get_user_field($this->users->get_current_user_id(),'name');
        //$data['home_settings']=$this->admin_model->get_home_settings();

        if(!empty($this->input->post('section_1_submit'))){

            $value['heading'] = $this->input->post('heading');
            $value['subheading'] = $this->input->post('subheading');
            $value['content'] = $this->input->post('content');

            if(!empty($_FILES['content_image']['name'])){
                $img_path=image_upload($_FILES,'content_image','uploads');
                if($img_path){
                    $value['content_image']=$img_path;
                } else{
                    //$this->load->view( 'admin/add_certificate_v', $data );
                    return false;
                }
            }
            $data_save['page_content']=serialize($value);
            //print_r($data_save); exit();
            $conditions=array('id'=>$this->input->post('id'));
            $home_settings=$this->admin_model->update_home_settings($data_save,$conditions);

            if ($home_settings) {
                $this->session->set_flashdata('msg', 'Settings successfully upadated!.');
                $this->session->set_flashdata('msg_type', 'Success');
                $this->load->view( 'admin/home_settings_v', $data );
            } else {
                $this->session->set_flashdata('msg', 'Something wrong! Please try again later.');
                $this->session->set_flashdata('msg_type', 'Error');
                $this->load->view( 'admin/home_settings_v', $data );
            }

        }
        elseif(!empty($this->input->post('section_2_submit'))){

            $value['heading'] = $this->input->post('heading');
            $value['button_text'] = $this->input->post('button_text');
            $value['button_link'] = $this->input->post('button_link');
            $value['content'] = $this->input->post('content');
            $data_save['page_content']=serialize($value);
            //print_r($data_save); exit();
            $conditions=array('id'=>$this->input->post('id'));
            $home_settings=$this->admin_model->update_home_settings($data_save,$conditions);

            if ($home_settings) {
                $this->session->set_flashdata('msg', 'Settings successfully upadated!.');
                $this->session->set_flashdata('msg_type', 'Success');
                $this->load->view( 'admin/home_settings_v', $data );
            } else {
                $this->session->set_flashdata('msg', 'Something wrong! Please try again later.');
                $this->session->set_flashdata('msg_type', 'Error');
                $this->load->view( 'admin/home_settings_v', $data );
            }

        }
        elseif(!empty($this->input->post('section_3_submit'))){

            $value['heading'] = $this->input->post('heading');
            $value['subheading'] = $this->input->post('subheading');
            $data_save['page_content']=serialize($value);

            $conditions=array('id'=>$this->input->post('id'));
            $home_settings=$this->admin_model->update_home_settings($data_save,$conditions);

            if ($home_settings) {
                $this->session->set_flashdata('msg', 'Settings successfully upadated!.');
                $this->session->set_flashdata('msg_type', 'Success');
                $this->load->view( 'admin/home_settings_v', $data );
            } else {
                $this->session->set_flashdata('msg', 'Something wrong! Please try again later.');
                $this->session->set_flashdata('msg_type', 'Error');
                $this->load->view( 'admin/home_settings_v', $data );
            }

        }
        elseif(!empty($this->input->post('section_4_submit'))){

            $value['heading'] = $this->input->post('heading');
            $value['subheading'] = $this->input->post('subheading');
            $data_save['page_content']=serialize($value);

            $conditions=array('id'=>$this->input->post('id'));
            $home_settings=$this->admin_model->update_home_settings($data_save,$conditions);

            if ($home_settings) {
                $this->session->set_flashdata('msg', 'Settings successfully upadated!.');
                $this->session->set_flashdata('msg_type', 'Success');
                $this->load->view( 'admin/home_settings_v', $data );
            } else {
                $this->session->set_flashdata('msg', 'Something wrong! Please try again later.');
                $this->session->set_flashdata('msg_type', 'Error');
                $this->load->view( 'admin/home_settings_v', $data );
            }

        }
        else{
            $this->load->view( 'admin/home_settings_v', $data );
        }


    }
    public function grade_settings(){
        isLogin('admin');
        $data['title'] = 'Grade Page Settings';
        $data['method'] = 'admin/grade_settings';
        $data['grade_settings']=$this->admin_model->get_grade_settings();
        $this->load->view( 'admin/grade_seetings_v', $data );

    }
    public function add_grade_setting() {
        isLogin('admin');
        $data['method']='add_grade_setting';
        $data['title']='Add New Grade Content';
        if(!empty($this->input->post('save'))){
            $this->form_validation->set_rules('subject_id', 'Subject', 'required');
            $this->form_validation->set_rules('grade_id', 'Grade', 'required');
            if ($this->form_validation->run() == FALSE){
                $this->load->view( 'admin/add_grade_settings_v', $data );
            } else{
                $value['subject_id']=$this->input->post('subject_id');
                $value['grade_id']=$this->input->post('grade_id');
                $value['content']=$this->input->post('content');
                //$value['create_dt']=date();
/*                if(!empty($_FILES['testimonial_img']['name'])){
                    $img_path=image_upload($_FILES,'testimonial_img','uploads');
                    if($img_path){
                        $value['testimonial_img']=$img_path;
                    } else{
                        //$this->load->view( 'admin/add_certificate_v', $data );
                        return false;
                    }
                }*/
                $insert=$this->admin_model->insert_grade_setting($value);
                if($insert){
                    $this->session->set_flashdata(array('msg_type'=>'success','msg'=>'New Content added!'));
                    redirect(base_url('admin/grade_settings'));
                    //$this->load->view( 'admin/grade_seetings_v', $data );
                }
            }
        } else {
            $this->load->view( 'admin/add_grade_settings_v', $data );
        }
    }
    public function edit_grade_setting($id) {
        isLogin('admin');
        $data['method']='edit_grade_setting';
        $data['title']='Edit Grade Content';
        $data['grade_settings']=$this->admin_model->get_grade_settings(array('id'=>$id),true);
        if(!empty($this->input->post('save'))){
            $this->form_validation->set_rules('subject_id', 'Subject', 'required');
            $this->form_validation->set_rules('grade_id', 'Grade', 'required');
            if ($this->form_validation->run() == FALSE){
                $this->load->view( 'admin/edit_grade_setting_v', $data );
            } else{
                $value['subject_id']=$this->input->post('subject_id');
                $value['grade_id']=$this->input->post('grade_id');
                $value['content']=$this->input->post('content');
                /*if(!empty($_FILES['testimonial_img']['name'])){
                    $img_path=image_upload($_FILES,'testimonial_img','uploads');
                    if($img_path){
                        $value['testimonial_img']=$img_path;
                    } else{
                        //$this->load->view( 'admin/add_certificate_v', $data );
                        return false;
                    }
                }*/
                $conditions=array('id'=>$id);
                $insert=$this->admin_model->update_grade_setting($conditions,$value);
                //echo $this->db->last_query();  exit();
                if($insert){
                    //$data['testimonials']=$this->admin_model->get_testimonials(array('id'=>$id),true);
                    $this->session->set_flashdata(array('msg_type'=>'success','msg'=>'Content Updated!'));
                    redirect(base_url('admin/grade_settings'));
                } else{
                    $data['grade_settings']=$this->admin_model->get_grade_settings(array('id'=>$id),true);
                    $this->session->set_flashdata(array('msg_type'=>'error','msg'=>'Something wrong! try again later!'));
                    $this->load->view( 'admin/edit_grade_setting_v', $data );
                }
            }
        } else {
            $this->load->view( 'admin/edit_grade_setting_v', $data );
        }
    }
    public function testimonials(){
        isLogin('admin');
        $data['title']='Testimonials';
        $data['testimonials']=$this->admin_model->get_testimonials();
        $this->load->view( 'admin/testimonials_v', $data );
    }
    public function add_testimonial() {
        isLogin('admin');
        $data['method']='add_testimonial';
        $data['title']='Add New Testimonial';
        if(!empty($this->input->post('save'))){
            $this->form_validation->set_rules('name', 'Name', 'required');
            if ($this->form_validation->run() == FALSE){
                $this->load->view( 'admin/add_testimonials_v', $data );
            } else{
                $value['name']=$this->input->post('name');
                $value['content']=$this->input->post('content');
                if(!empty($_FILES['testimonial_img']['name'])){
                    $img_path=image_upload($_FILES,'testimonial_img','uploads');
                    if($img_path){
                        $value['testimonial_img']=$img_path;
                    } else{
                        //$this->load->view( 'admin/add_certificate_v', $data );
                        return false;
                    }
                }
                $insert=$this->admin_model->insert_testimonial($value);
                if($insert){
                    $this->session->set_flashdata(array('msg_type'=>'success','msg'=>'New testimonial added!'));
                    $this->load->view( 'admin/add_testimonials_v', $data );
                }
            }
        } else {
            $this->load->view( 'admin/add_testimonials_v', $data );
        }
    }
    public function edit_testimonial($id) {
        isLogin('admin');
        $data['method']='edit_testimonial';
        $data['title']='Edit Testimonial';
        $data['testimonials']=$this->admin_model->get_testimonials(array('id'=>$id),true);
        //print_r($data['testimonials']); exit();
        if(!empty($this->input->post('save'))){
            $this->form_validation->set_rules('name', 'Name', 'required');
            if ($this->form_validation->run() == FALSE){
                $this->load->view( 'admin/edit_testimonial_v', $data );
            } else{
                $value['name']=$this->input->post('name');
                $value['content']=$this->input->post('content');
                if(!empty($_FILES['testimonial_img']['name'])){
                    $img_path=image_upload($_FILES,'testimonial_img','uploads');
                    if($img_path){
                        $value['testimonial_img']=$img_path;
                    } else{
                        //$this->load->view( 'admin/add_certificate_v', $data );
                        return false;
                    }
                }
                $conditions=array('id'=>$id);
                $insert=$this->admin_model->update_testimonial($value,$conditions);
                if($insert){
                    $data['testimonials']=$this->admin_model->get_testimonials(array('id'=>$id),true);
                    $this->session->set_flashdata(array('msg_type'=>'success','msg'=>'Testimonial Updated!'));
                    $this->load->view( 'admin/edit_testimonial_v', $data );
                } else{
                    $data['testimonials']=$this->admin_model->get_testimonials(array('id'=>$id),true);
                    $this->session->set_flashdata(array('msg_type'=>'error','msg'=>'Something wrong! try again later!'));
                    $this->load->view( 'admin/edit_testimonial_v', $data );
                }
            }
        } else {
            $this->load->view( 'admin/edit_testimonial_v', $data );
        }
    }
    public function awards() {
	    $submit = $this->input->post('submit');
		if(isset($submit)) {
			$subject = $this->input->post('subject');
			$grade = $this->input->post('grade');
			$data = array(
				'title' => 'Awards',
				'subject' => $subject,
				'grade' => $grade
			);
		} else {
			$data = array(
				'title' => 'Awards',
			);
		}
	    $this->load->view( 'admin/awards', $data );
	}
	
	public function worksheets(){
		isLogin('admin');
        $data['title']='Worksheet';
        $data['worksheets']=$this->admin_model->get_worksheets();
        $this->load->view( 'admin/worksheet_v', $data );
	}
	public function add_worksheet() {
        isLogin('admin');
        $data['method']='add_worksheet';
        $data['title']='Add New Worksheet';
        //$data['ratings']=$this->admin_model->get_rattings();
        if(!empty($this->input->post('save'))){
            $this->form_validation->set_rules('name', 'Name', 'required');
            //$this->form_validation->set_rules('work_subject_id', 'Name', 'required');
            //$this->form_validation->set_rules('work_grade', 'Name', 'required');
            //$this->form_validation->set_rules('work_category', 'Name', 'required');
            //$this->form_validation->set_rules('work_topic', 'Name', 'required');
            if ($this->form_validation->run() == FALSE){
                $this->load->view( 'admin/add_worksheet_v', $data );
            } else{
				$value['name']=$this->input->post('name');
                $value['content']=$this->input->post('content');
                $value['slug']=$this->input->post('slug');
                $value['work_subject_id']=$this->input->post('work_subject_id');
                $value['work_grade_id']=$this->input->post('work_grade_id');
                $value['work_cat_id']=$this->input->post('work_cat_id');
                $value['work_topic_id']=$this->input->post('work_topic_id');
                $value['label']=$this->input->post('label');
				if(!empty($_FILES['pdf_path']['name'])){
                    $img_path=image_upload($_FILES,'pdf_path','uploads/worksheets','pdf');
                    $pdf_abs_path=$this->session->userdata('delete_file_path');
                    $pdf_thumb_img=pdf_to_thumbnail($pdf_abs_path,'uploads/worksheets');
                    $pdf_page_count=getPDFPages($pdf_abs_path);
                    //$json_img_url = json_encode($pdf_thumb_img);
                    $value['worksheet_img'] = $pdf_thumb_img;
                    $value['pdf_path'] = $img_path;
                    $value['pdf_page_count']=$pdf_page_count;
                }
                $value['work_uni_id']=uniqid('app-');
                $value['create_dt']=date('Y-m-d H:i:s');
                $value['new_days_limit']=$this->input->post('new_days_limit');
                $insert=$this->admin_model->insert_worksheet($value);
                //print_r($insert);exit;

                if($insert){
					$rat_value=array();
					$rat_value['worksheet_id']=$insert;
					$rat_value['rating_number']=$this->admin_model->get_ratting_number($insert)+1;
					$rat_value['total_points']=$this->admin_model->get_total_points($insert)+$this->input->post('rating');
					$rat_value['created']=date('Y-m-d H:i:s');
					$rat_value['modified']=date('Y-m-d H:i:s');
					$insert_rating=$this->admin_model->insert_ratings($rat_value);
					if($insert_rating){
                        $this->session->set_flashdata(array('msg_type'=>'success','msg'=>'New worksheet added!'));
                        redirect('admin/worksheets');
                    } else{
                        $this->session->set_flashdata(array('msg_type'=>'success','msg'=>'New worksheet added! but rating not allowed'));
                        redirect('admin/worksheets');
                    }

                }
            }
        } else {
            $this->load->view( 'admin/add_worksheet_v', $data );
        }
	}
	
	public function work_subject(){
		isLogin('admin');
        $data['title']='Worksheet Subject';
        $data['work_subjects']=$this->admin_model->get_work_subject();
        $this->load->view( 'admin/work_subject_v', $data );
	}
	public function add_work_subject() {
        isLogin('admin');
        $data['method']='add_work_subject';
        $data['title']='Add New Worksheet Subject';
        if(!empty($this->input->post('save'))){
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('slug', 'Slug', 'required');
            if ($this->form_validation->run() == FALSE){
                $this->load->view( 'admin/add_work_subject_v', $data );
            } else{
				$value['name']=$this->input->post('name');
                $value['slug']=$this->input->post('slug');
                
                $insert=$this->admin_model->insert_work_subject($value);
                if($insert){
					$this->session->set_flashdata(array('msg_type'=>'success','msg'=>'New worksheet subject added!'));
					
					redirect('admin/work_subject');
					
                    $this->load->view( 'admin/work_subject_v', $data );
                }
            }
        } else {
            $this->load->view( 'admin/add_work_subject_v', $data );
        }
	}
    public function edit_work_subject($id) {
        isLogin('admin');
        $data['method']='edit_work_subject';
        $data['title']='Edit Worksheet Subject';
        $data['edit_data']=$this->admin_model->get_work_subject(array('id'=>$id),true);
        if(!empty($this->input->post('save'))){
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('slug', 'Slug', 'required');
            if ($this->form_validation->run() == FALSE){
                $this->load->view( 'admin/edit_work_subject_v', $data );
            } else{
                $value['name']=$this->input->post('name');
                $value['slug']=$this->input->post('slug');

                $conditions=array('id'=>$id);
                $insert=$this->admin_model->update_work_subject($value,$conditions);
                //echo $this->db->last_query();exit();
                if($insert){
                    $data['edit_data']=$this->admin_model->get_work_subject(array('id'=>$id),true);
                    $this->session->set_flashdata(array('msg_type'=>'success','msg'=>'Worksheet subject updated!'));
                    redirect('admin/work_subject');
                } else{
                    $data['edit_data']=$this->admin_model->get_work_subject(array('id'=>$id),true);
                    $this->session->set_flashdata(array('msg_type'=>'error','msg'=>'Something wrong! try again later!'));
                    $this->load->view( 'admin/edit_work_subject_v', $data );
                }
            }
        } else {
            $this->load->view( 'admin/edit_work_subject_v', $data );
        }
    }
	public function work_grade(){
		isLogin('admin');
        $data['title']='Worksheet Grade';
        $data['work_grades']=$this->admin_model->get_work_grade();
        $this->load->view( 'admin/work_grade_v', $data );
	}
	public function add_work_grade() {
        isLogin('admin');
        $data['method']='add_work_grade';
        $data['title']='Add New Worksheet Grade';
        if(!empty($this->input->post('save'))){
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('slug', 'Slug', 'required');
            if ($this->form_validation->run() == FALSE){
                $this->load->view( 'admin/add_work_grade_v', $data );
            } else{
				$value['name']=$this->input->post('name');
                $value['slug']=$this->input->post('slug');
                $value['work_subject_id']=$this->input->post('work_subject_id');
                
                $insert=$this->admin_model->insert_work_grade($value);
                if($insert){
					$this->session->set_flashdata(array('msg_type'=>'success','msg'=>'New worksheet grade added!'));
					redirect('admin/work_grade');
                    //$this->load->view( 'admin/work_grade_v', $data );
                }
            }
        } else {
            $this->load->view( 'admin/add_work_grade_v', $data );
        }
	}
    public function edit_work_grade($id) {
        isLogin('admin');
        $data['method']='edit_work_grade';
        $data['title']='Edit Worksheet Grade';
        $data['edit_data']=$this->admin_model->get_work_grade(array('id'=>$id),true);
        if(!empty($this->input->post('save'))){
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('slug', 'Slug', 'required');
            if ($this->form_validation->run() == FALSE){
                $this->load->view( 'admin/edit_work_grade_v', $data );
            } else{
                $value['name']=$this->input->post('name');
                $value['slug']=$this->input->post('slug');
                $value['work_subject_id']=$this->input->post('work_subject_id');
                $conditions=array('id'=>$id);
                $insert=$this->admin_model->update_work_grade($value,$conditions);
                //echo $this->db->last_query();exit();
                if($insert){
                    $data['edit_data']=$this->admin_model->get_work_grade(array('id'=>$id),true);
                    $this->session->set_flashdata(array('msg_type'=>'success','msg'=>'Worksheet grade updated!'));
                    redirect('admin/work_grade');
                } else{
                    $data['edit_data']=$this->admin_model->get_work_grade(array('id'=>$id),true);
                    $this->session->set_flashdata(array('msg_type'=>'error','msg'=>'Something wrong! try again later!'));
                    $this->load->view( 'admin/edit_work_grade_v', $data );
                }
            }
        } else {
            $this->load->view( 'admin/edit_work_grade_v', $data );
        }
    }
	public function work_cat(){
		isLogin('admin');
        $data['title']='Worksheet Category';
        $data['work_cats']=$this->admin_model->get_work_cat();
        $this->load->view( 'admin/work_cat_v', $data );
	}
	public function add_work_cat() {
        isLogin('admin');
        $data['method']='add_work_cat';
        $data['title']='Add New Worksheet Category';
        if(!empty($this->input->post('save'))){
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('slug', 'Slug', 'required');
            if ($this->form_validation->run() == FALSE){
                $this->load->view( 'admin/add_work_cat_v', $data );
            } else{
				$value['name']=$this->input->post('name');
                $value['slug']=$this->input->post('slug');
                $value['work_subject_id']=$this->input->post('work_subject_id');
                $value['work_grade_id']=$this->input->post('work_grade_id');
                
                $insert=$this->admin_model->insert_work_cat($value);
                if($insert){
					$this->session->set_flashdata(array('msg_type'=>'success','msg'=>'New worksheet category added!'));
					redirect('admin/work_cat');
                    //$this->load->view( 'admin/work_grade_v', $data );
                }
            }
        } else {
            $this->load->view( 'admin/add_work_cat_v', $data );
        }
	}
    public function edit_work_cat($id) {
        isLogin('admin');
        $data['method']='edit_work_cat';
        $data['title']='Edit Worksheet Category';
        $data['edit_data']=$this->admin_model->get_work_cat(array('id'=>$id),true);
        if(!empty($this->input->post('save'))){
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('slug', 'Slug', 'required');
            if ($this->form_validation->run() == FALSE){
                $this->load->view( 'admin/edit_work_cat_v', $data );
            } else{
                $value['name']=$this->input->post('name');
                $value['slug']=$this->input->post('slug');
                $value['work_subject_id']=$this->input->post('work_subject_id');
                $value['work_grade_id']=$this->input->post('work_grade_id');
                $conditions=array('id'=>$id);
                $insert=$this->admin_model->update_work_cat($value,$conditions);
                //echo $this->db->last_query();exit();
                if($insert){
                    $data['edit_data']=$this->admin_model->get_work_cat(array('id'=>$id),true);
                    $this->session->set_flashdata(array('msg_type'=>'success','msg'=>'Worksheet cat updated!'));
                    redirect('admin/work_cat');
                } else{
                    $data['edit_data']=$this->admin_model->get_work_cat(array('id'=>$id),true);
                    $this->session->set_flashdata(array('msg_type'=>'error','msg'=>'Something wrong! try again later!'));
                    $this->load->view( 'admin/edit_work_cat_v', $data );
                }
            }
        } else {
            $this->load->view( 'admin/edit_work_cat_v', $data );
        }
    }
	public function work_topic(){
		isLogin('admin');
        $data['title']='Worksheet Topic';
		$data['work_topics']=$this->admin_model->get_work_topic();
		//print_r($data['work_topics']); die();
        $this->load->view( 'admin/work_topic_v', $data );
	}
	public function add_work_topic() {
        isLogin('admin');
        $data['method']='add_work_topic';
        $data['title']='Add New Worksheet Topic';
        if(!empty($this->input->post('save'))){
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('slug', 'Slug', 'required');
            if ($this->form_validation->run() == FALSE){
                $this->load->view( 'admin/add_work_topic_v', $data );
            } else{
				$value['name']=$this->input->post('name');
                $value['slug']=$this->input->post('slug');
                $value['work_subject_id']=$this->input->post('work_subject_id');
                $value['work_grade_id']=$this->input->post('work_grade_id');
                $value['work_cat_id']=$this->input->post('work_cat_id');
                
                $insert=$this->admin_model->insert_work_topic($value);
                if($insert){
					$this->session->set_flashdata(array('msg_type'=>'success','msg'=>'New worksheet topic added!'));
					redirect('admin/work_topic');
                    //$this->load->view( 'admin/work_grade_v', $data );
                }
            }
        } else {
            $this->load->view( 'admin/add_work_topic_v', $data );
        }
	}
}