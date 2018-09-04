<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {
	function __construct(){

		parent::__construct();
		$this->load->model('user_model');

	}
	public function index() {
		$data = array(
			'title' => 'Register',
		);
		$this->load->view('register_page', $data);
	}
	public function check() {
		/*$this->form_validation->set_rules('fname', 'First Name', 'trim|required|alpha');
		$this->form_validation->set_rules('lname', 'Last Name', 'trim|required|alpha');
		$this->form_validation->set_rules('email_address', 'Email Address', 'trim|required|valid_email');
		$this->form_validation->set_rules('email_address', 'Email Address', 'trim|required|valid_email');
		$this->form_validation->set_rules('pwd1', 'Password', 'trim|required|min_length[5]|max_length[18]', array(
			'required'      => 'You have not provided %s.',
			'min_length'    => 'This %s length should be greater than 5.',
			'max_length'    => 'This %s length should be less than 18.'
		));
		$this->form_validation->set_rules('pwd2', 'Password Confirmation', 'trim|required|min_length[5]|max_length[18]|matches[pwd1]', array(
			'required'      => 'You have not provided %s.',
			'min_length'    => 'This %s length should be greater than 5.',
			'max_length'    => 'This %s length should be less than 18.',
			'matches'       => 'The %s must match the Password'
		));

		if($this->form_validation->run()) {
			$this->load->view('register_page', $data);
		} else {
			echo "Validation is successful";
			exit;
			$data = array(
				'title' => 'Register',
			);
			$this->load->view('register_page', $data);
			echo validation_errors();
		}*/

		$user = array(
			'fname' => $this->input->post('fname'),
			'lname' => $this->input->post('lname'),
			'email_address' => $this->input->post('email_address'),
			//'phone' => $this->input->post('phone'),
			'password' => md5($this->input->post('pwd1')),
			'role' => $this->input->post('user_type')
		);
		//print_r($user);

		$email_check = $this->user_model->email_check($user['email_address']);

		if($email_check) {
			$this->user_model->register_user($user);
			$msg = 'Welcome to AppleKitch<br /><br />Please click on the link to complete the registration process.<br><br>Activation Link :<a href="'.base_url('/register/activation').'/?email='.encripted($this->input->post('email_address')).'" target="_blank">'.base_url('/register/activation').'/?email='.encripted($this->input->post('email_address')).'</a><br><br>Regards,<br>AppleKitch';
			send_mail($this->input->post('email_address'), 'Activate your account', $msg);
			$this->session->set_flashdata('success_msg', 'Please check your email to complete the activation process');
			redirect('login');

		} else {
			$this->session->set_flashdata('error_msg', 'Email address already exists');
			redirect('register');
		}
	}
	public function activation() {
		$email = decripted($this->input->get('email'));
		$this->user_model->activate_user($email);
		$this->session->set_flashdata('success_msg', 'Account activated successfully. Now login to your account.');
		redirect('login');
	}
	/*public function thankyou() {
		$data = array(
			'title' => 'Thank You',
		);
		$this->load->view('thankyou', $data);
	}*/
}
