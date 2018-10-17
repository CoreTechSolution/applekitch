<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct(){

		parent::__construct();
		$this->load->model('user_model');
		$this->load->model('ajax_model');

	}
	public function index()
	{
		$user_id = $this->session->userdata('user_id');
		if(empty($user_id)) {
			$data = array(
				'title' => 'Login',
			);
			$this->load->view( 'login_page', $data );
		} else {
			redirect('dashboard');
		}
	}
	public function login_user() {
		$user_login=array(

			'email_id'=>$this->input->post('email_id'),
			'pwd'=>md5($this->input->post('pwd'))

		);

		$data = $this->user_model->login_user($user_login['email_id'],$user_login['pwd']);
		if($data) {

			$this->session->set_userdata('user_id',$data['id']);
			$this->session->set_userdata('logged_in','1');
			$this->session->set_userdata('email',$data['email_address']);
			$this->session->set_userdata('user_type',get_returnfield('user_roles','id',$data['role'],'name'));

			if(!isUserType('student')) {
				/*$data = array(
					'title' => 'Select User',
				);
				$this->load->view("select_user", $data);*/
				redirect( '#wrapper3' );
			} else {
				redirect( '#wrapper3' );
			}

		} else{
			$this->session->set_flashdata('error_msg', 'Email address or Password mismatch');
			$data = array(
				'title' => 'Login',
			);
			$this->load->view("login_page", $data);

		}


	}
	public function google_login(){
        include_once APPPATH.'third_party/google_src/Google_Client.php';
        include_once TEMPLATEPATH.'/google_src/contrib/Google_Oauth2Service.php';

        /*
         * Configuration and setup Google API
         */
        $clientId = '982406899327-j0d3vseki759bks0q8ejfgbkgamk9pe9.apps.googleusercontent.com';
        $clientSecret = 'e9lYOWnS8ogMMmR2mTCVg2U7';
        $redirectURL = base_url('/login');

        //Call Google API
        $gClient = new Google_Client();
        $gClient->setApplicationName('Login to MyBookNG');
        $gClient->setClientId($clientId);
        $gClient->setClientSecret($clientSecret);
        $gClient->setRedirectUri($redirectURL);

        $google_oauthV2 = new Google_Oauth2Service($gClient);

        $authUrl = $gClient->createAuthUrl();

        if(isset($_GET['code'])){
            $gClient->authenticate($_GET['code']);
            $_SESSION['token'] = $gClient->getAccessToken();
            header('Location: ' . filter_var($redirectURL, FILTER_SANITIZE_URL));
        }

        if (isset($_SESSION['token'])) {
            $gClient->setAccessToken($_SESSION['token']);
        }

        if ($gClient->getAccessToken()) {
            $gpUserProfile = $google_oauthV2->userinfo->get();
            $values['social_action']='google';
            $values['fname']=$gpUserProfile['given_name'];
            $values['lname']=$gpUserProfile['family_name'];
            $values['email_address']=$gpUserProfile['email'];
            $check_user=$this->ajax_model->check_social_login_exits($values);
            if($check_user){
                $this->session->set_userdata('user_id',$check_user->id);
                $this->session->set_userdata('logged_in','1');
                $this->session->set_userdata('email',$check_user->email_address);
                $this->session->set_userdata('user_type',get_returnfield('user_roles','id',$check_user->role,'name'));
                redirect('dashboard');
            } else{
                $save=$this->ajax_model->save_user_by_fb($values);
                if($save){
                    $check_user=$this->ajax_model->check_social_login_exits($values);
                    $this->session->set_userdata('user_id',$check_user->id);
                    $this->session->set_userdata('logged_in','1');
                    $this->session->set_userdata('email',$check_user->email_address);
                    $this->session->set_userdata('user_type',get_returnfield('user_roles','id',$check_user->role,'name'));
                    redirect('dashboard');

                } else{
                    $data = array(
                        'title' => 'Login',
	                    'authUrl' => $authUrl
                    );
                    $this->load->view('login_page', $data);
                }
            }
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
