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
