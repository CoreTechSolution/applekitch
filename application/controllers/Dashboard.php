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
}
