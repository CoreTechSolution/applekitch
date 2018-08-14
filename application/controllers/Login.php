<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct(){

		parent::__construct();
		$this->load->model('user_model');

	}
	public function index()
	{
		$data = array(
			'title' => 'Login',
		);
		$this->load->view('login_page', $data);
	}
	public function login_user() {
		$user_login=array(

			'email_id'=>$this->input->post('email_id'),
			'pwd'=>md5($this->input->post('pwd'))

		);

		$data = $this->user_model->login_user($user_login['email_id'],$user_login['pwd']);
		if($data) {
			$this->session->set_userdata('user_id',$data['id']);
			$this->session->set_userdata('email',$data['email_address']);

			redirect('dashboard');

		} else{
			$this->session->set_flashdata('error_msg', 'Email address or Password mismatch');
			$data = array(
				'title' => 'Login',
			);
			$this->load->view("login_page", $data);

		}


	}
	public function user_logout(){

		$this->session->sess_destroy();
		redirect('login', 'refresh');
	}
	public function forgot_password()
	{
		$data = array(
			'title' => 'Forgot Password',
		);
		$this->load->view('forgot_password', $data);
	}
	public function forgot_password_submit() {
		$email = $this->input->post('email_id');
		$email_check = $this->user_model->email_check($email);
		if($email_check) {
			$this->session->set_flashdata('error_msg', 'Email address: "'.$email.'" does not exists');
			redirect('forgot-password');
		} else {
			$msg = 'Please click on the link to reset your account password.<br><br>Password Reset Link :<a href="'.base_url('/reset-password').'/?email='.encripted($email).'" target="_blank">'.base_url('/reset-password').'/?email='.encripted($email).'</a><br><br>Regards,<br>AppleKitch';
			send_mail($email, 'Reset Password', $msg);
			$this->session->set_flashdata('success_msg', 'Please check your email.');
			redirect('forgot-password');
		}
	}
	public function reset_password() {
		$email = decripted($this->input->get('email'));
		$data = array(
			'title' => 'Reset Password',
			'email' => $email
		);
		$this->load->view('reset_password', $data);
	}
	public function reset_password_submit() {
		$pwd1 = $this->input->post('pwd1');
		$pwd2 = $this->input->post('pwd2');
		$email = $this->input->post('email');
		if($pwd1 == $pwd2) {
			$user = array(
				'email_address' => $email,
				'password' => md5($pwd1)
			);
			$this->user_model->reset_password($user);
			$this->session->set_flashdata( 'success_msg', 'Password reset successful. Please log in' );
			redirect( 'login' );
		} else {
			$this->session->set_flashdata( 'success_msg', 'Passwords do not match' );
			redirect( 'reset-password' );
		}
	}
}
