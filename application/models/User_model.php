<?php
class User_model extends CI_Model{

	public function __construct(){

		parent::__construct();
		$this->load->database();

	}

	public function register_user($user){


		$this->db->insert('user', $user);

	}

	public function activate_user($email) {
		$this->db->set('activation', 1);
		$this->db->where('email_address',$email);
		$this->db->update('user');
	}
    function get_log_in_user_topic($user_id){
        $this->db->distinct();
	    $this->db->select('topic_id');
	    $this->db->where(array('user_id'=>$user_id));
	    $this->db->from('student_ans_topic');
        $query=$this->db->get();
	    if($query){
           return $query->result();
        } else{
	        return false;
        }
    }
	public function login_user($email,$pass){

		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('email_address',$email);
		$this->db->where('password',$pass);
		$this->db->where('activation',1);

		if($query=$this->db->get())
		{
			return $query->row_array();
		}
		else{
			return false;
		}


	}
	public function email_check($email){

		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('email_address',$email);
		$query=$this->db->get();

		if($query->num_rows()>0){
			return false;
		}else{
			return true;
		}

	}

	public function get_userdata() {
		$user_id = $this->session->userdata('user_id');
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('id',$user_id);

		if($query=$this->db->get())
		{
			return $query->row_array();
		}
		else{
			return false;
		}
	}

	public function get_userdata_by_id($user_id) {
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('id', $user_id);

		if($query=$this->db->get())
		{
			return $query->row_array();
		}
		else{
			return false;
		}
	}

	public function save_profile($user) {
		$this->db->set('fname', $user['fname']);
		$this->db->set('lname', $user['lname']);
		$this->db->set('phone', $user['phone']);
		if(isset($user['password']) && !empty($user['password'])) {
			$this->db->set( 'password', $user['password'] );
		}
		if(isset($user['profile_img']) && !empty($user['profile_img'])) {
			$this->db->set( 'profile_img', $user['profile_img'] );
		}
		$this->db->where('email_address',$user['email_address']);
		$this->db->update('user');
	}

	public function reset_password($user) {
		$this->db->set( 'password', $user['password'] );
		$this->db->where('email_address',$user['email_address']);
		$this->db->update('user');
	}

	public function get_memberships() {
		$this->db->select('*');
		$this->db->from('membership');
		$this->db->order_by("id", "desc");

		if($query = $this->db->get())
		{
			return $query->result_array();
		}
		else{
			return false;
		}
	}

	public function get_memberships_by_id($membership_id) {
		$this->db->select('*');
		$this->db->from('membership');
		$this->db->where("id", $membership_id);

		if($query = $this->db->get())
		{
			return $query->row_array();
		}
		else{
			return false;
		}
	}

	public function subscribe( $user_id, $membership_plan, $amount, $ym, $customer ) {
		$this->db->set( 'membership_plan', $membership_plan );
		$this->db->set( 'price', $amount );
		$this->db->set( 'ym', $ym );
		$this->db->set( 'start_date', date('Y-m-d H:i:s') );
		$this->db->set( 'stripe_cust_json', json_encode($customer) );
		$this->db->where('id',$user_id);
		$this->db->update('user');
		return true;
	}

	public function get_child_data($user_id) {
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('parent', $user_id);

		if($query=$this->db->get())
		{
			return $query->result_array();
		}
		else{
			return false;
		}
	}

	public function add_child($user) {
		if($this->db->insert('user', $user)) {
			return true;
		} else {
			return false;
		}
	}

	public function get_child_data_by_id($child_id) {
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('id', $child_id);

		if($query=$this->db->get())
		{
			return $query->row_array();
		}
		else{
			return false;
		}
	}

	public function edit_child($user) {
		$this->db->set('fname', $user['fname']);
		$this->db->set('lname', $user['lname']);
		if(isset($user['password'])) {
			$this->db->set('password', $user['password']);
		}
		$this->db->where('id', $user['id']);
		if($this->db->update('user')) {
			return true;
		} else {
			return false;
		}
	}

	public function delete_child($child_id) {
		$this->db->where('id', $child_id);
		if($this->db->delete('user')) {
			return true;
		} else {
			return false;
		}
	}
	function get_ans_certificates_by_user($user_id){
		//print_r($user_id); exit();
		$this->db->select('*');
		$this->db->where('user_id',$user_id);
		$this->db->from('student_ans_topic');
		$query=$this->db->get();
		//echo $this->db->last_query(); exit();
		if($query->result()){
			return $query->result();
		}
		else{
			return false;
		}
	}
	function get_ans_certificates_by_id($id){
		//print_r($user_id); exit();
		$this->db->select('*');
		$this->db->where('id',$id);
		$this->db->from('student_ans_topic');
		$query=$this->db->get();
		//echo $this->db->last_query(); exit();
		if($query->result()){
			return $query->row();
		}
		else{
			return false;
		}
	}
	function get_certificates_by_id($id){
		//print_r($user_id); exit();
		$this->db->select('*');
		$this->db->where('id',$id);
		$this->db->from('certificates');
		$query=$this->db->get();
		//echo $this->db->last_query(); exit();
		if($query->result()){
			return $query->row();
		}
		else{
			return false;
		}
	}
	function get_certificates_default(){
		//print_r($user_id); exit();
		$this->db->select('*');
		$this->db->where('default_status', 'true');
		$this->db->from('certificates');
		$query=$this->db->get();
		//echo $this->db->last_query(); exit();
		if($query->result()){
			return $query->row();
		}
		else{
			return false;
		}
	}
	function get_questions_ans($conditions=array(),$row=true,$order='id',$order_by='asc'){
		$this->db->select('*');
		if(!empty($conditions)){
			$this->db->where($conditions);
		}
		$this->db->order_by($order,$order_by);
		$this->db->from('student_qns_ans');
		$queries=$this->db->get();
		if($row==true){
			$query=$queries->row();
		} else{
			$query=$queries->result();
		}
		return $query;

	}
	function get_ans_topic($conditions=array(),$row=true){
		$this->db->select('*');
		if(!empty($conditions)){
			$this->db->where($conditions);
		}

		$this->db->from('student_ans_topic');
		$queries=$this->db->get();
		if($row==true){
			$query=$queries->row();
		} else{
			$query=$queries->result();
		}
		return $query;

	}


}