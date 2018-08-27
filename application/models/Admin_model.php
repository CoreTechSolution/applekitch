<?php
class Admin_model extends CI_Model {

	protected $username = 'admin';
	protected $password = 'qweQWE123!@#';

	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

	function login($admin) {
		if($admin['username'] == $this->username && $admin['password'] == md5($this->password)) {
			return true;
		} else {
			return false;
		}
	}

	function get_users() {
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where("activation", 1);

		if($query = $this->db->get())
		{
			return $query->result_array();
		}
		else{
			return false;
		}
	}

	function get_roles() {
		$this->db->select('*');
		$this->db->from('user_roles');

		if($query = $this->db->get())
		{
			return $query->result_array();
		}
		else{
			return false;
		}
	}

	function get_role_by_id($role_id) {
		$this->db->select('*');
		$this->db->from('user_roles');
		$this->db->where("id", $role_id);

		if($query = $this->db->get())
		{
			return $query->row_array();
		}
		else{
			return false;
		}
	}

	function get_memberships() {
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
	function get_questions($conditions=array(), $row=false) {
		$this->db->select('*');
		if(!empty($conditions))
			$this->db->where($conditions);

		$this->db->from('questions');
		$this->db->order_by("question_id", "desc");
		$query = $this->db->get();
		if($query){
			if($row==false){
				return $query->result();
			} else{
				return $query->row();
			}
		} else{
			return false;
		}
	}
	function get_question_options() {
		$this->db->select('*');
		$this->db->from('question_option');
		$this->db->order_by("option_id", "desc");

		if($query = $this->db->get())
		{
			return $query->result();
		}
		else{
			return false;
		}
	}
	function get_question_type() {
		$this->db->select( '*' );
		$this->db->from( 'question_type' );
		$this->db->order_by( "type_id", "asc" );

		if ( $query = $this->db->get() ) {
			return $query->result();
		} else {
			return false;
		}
	}
	function get_topics() {
		$this->db->select('*');
		$this->db->from('topics');
		$this->db->order_by("topic_id", "desc");

		if($query = $this->db->get())
		{
			return $query->result();
		}
		else{
			return false;
		}
	}
	function insert_topic($data){
		$this->db->insert('topics', $data);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}
	function insert_qst_type($data){
		$this->db->insert('question_option', $data);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}
	function update_qst_type($data){
		$this->db->insert('question_option', $data);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}

	function get_memberships_by_id($membership_id) {
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

	function get_grades() {
		$this->db->select('*');
		$this->db->from('grade');

		if($query = $this->db->get())
		{
			return $query->result_array();
		}
		else{
			return false;
		}
	}

	function insert_grade($grade) {
		$this->db->insert('grade', $grade);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}

	function delete_grade($grade) {
		$this->db->where('id', $grade);
		$this->db->delete('grade');
	}

	function get_grade_by_id($grade_id) {
		$this->db->select('*');
		$this->db->from('grade');
		$this->db->where('id', $grade_id);

		if($query = $this->db->get())
		{
			return $query->row_array();
		}
		else{
			return false;
		}
	}

	function update_grade($grade) {
		$this->db->set('name', $grade['name']);
		$this->db->set('slug', $grade['slug']);
		if(!empty($grade['img'])) {
			$this->db->set( 'img', $grade['img'] );
		}
		$this->db->where('id',$grade['id']);
		$this->db->update('grade');
	}

	function get_countries() {
		$this->db->select('*');
		$this->db->from('country');

		if($query = $this->db->get())
		{
			return $query->result_array();
		}
		else{
			return false;
		}
	}

	function get_subjects() {
		$this->db->select('*');
		$this->db->from('subject');
		$query=$this->db->get();
		if($query){
			return $query->result_array();
		}
		else{
			return false;
		}
	}

	function delete_subject($subject) {
		$this->db->where('id', $subject);
		$this->db->delete('subject');
	}

	function insert_subject($subject) {
		$this->db->insert('subject', $subject);
		$insert_id = $this->db->insert_id();
		return $insert_id;

	}

	function get_subject_by_id($subject_id) {

		$query = $this->db->query('SELECT subject.id, subject.name, subject.grade, subject.country, country.name AS cname, grade.name AS gname FROM subject 
INNER JOIN country ON subject.country = country.id INNER JOIN grade ON subject.grade = grade.id WHERE subject.id = '.$subject_id);

		if($query)
		{
			return $query->row_array();
		}
		else{
			return false;
		}
	}

	function update_subject($subject) {
		$this->db->set('name', $subject['name']);
		/*$this->db->set('grade', $subject['grade']);
		$this->db->set('country', $subject['country']);*/
		$this->db->where('id',$subject['id']);
		$this->db->update('subject');
	}

	function get_category() {
		$query = $this->db->query('SELECT category.id, category.name, category.grade, category.country, category.subject, category.parent, country.name AS cname, grade.name AS gname, subject.name AS sname FROM category INNER JOIN country ON category.country = country.id INNER JOIN grade ON category.grade = grade.id INNER JOIN subject ON category.subject = subject.id');

		if($query)
		{
			return $query->result_array();
		}
		else{
			return false;
		}
	}

	function delete_category($category) {
		$this->db->where('id', $category);
		$this->db->delete('category');
	}

	function insert_category($category) {
		$this->db->insert('category', $category);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}
	function get_categories($conditions=array(), $row=true){
		$this->db->select('*');
		if (!empty($conditions))
			$this->db->where($conditions);
		$this->db->from('category');
		$query=$this->db->get();
		if($query) {
			if ( $row == true ) {
				return $query->row();
			} else if ( $row == false ) {
				return $query->result();
			}
		} else {
			return false;
		}
	}
	function get_category_by_id($category_id) {
		$this->db->select('*');
		$this->db->from('category');
		$query=$this->db->get();
		if($query){
			return $query->result_array();
		}
		else{
			return false;
		}
		/*$query = $this->db->query('SELECT category.id, category.name, category.grade, category.country, category.subject, category.parent, country.name AS cname, grade.name AS gname, subject.name  AS sname FROM category INNER JOIN country ON category.country = country.id INNER JOIN grade ON category.grade = grade.id INNER JOIN subject ON category.subject = subject.id WHERE category.id = '.$category_id);

		if($query)
		{
			return $query->row_array();
		}
		else{
			return false;
		}*/
	}

	function update_category($coditions,$value) {
		$this->db->set($value);  //Set the column name and which value to set..
		$this->db->where($coditions); //set column_name and value in which row need to update
		if($this->db->update('category')){
			return true;
		} else{
			return false;
		}
	}
	function get_certificates($conditions=array(),$row=false) {
		$this->db->select('*');
		if (!empty($conditions))
			$this->db->where($conditions);
		$this->db->from('certificates');
		$query=$this->db->get();
		if($query) {
			if ( $row == true ) {
				return $query->row();
			} else if ( $row == false ) {
				return $query->result();
			}
		} else {
			return false;
		}
	}
	function insert_certificate($data) {
		$this->db->insert('certificates', $data);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}
	function edit_certificate($conditions,$data) {
		$this->db->set($data);  //Set the column name and which value to set..
		$this->db->where($conditions); //set column_name and value in which row need to update
		if($this->db->update('certificates')){
			return true;
		} else{
			return false;
		}
	}

	function get_pages() {
		$this->db->select('*');
		$this->db->from('pages');

		if($query = $this->db->get()) {
			return $query->result_array();
		} else {
			return false;
		}
	}

	function insert_page($data){
		/*$name = $this->input->post('name');
		$name = $this->input->post('name');
		$name = $this->input->post('name');
		$name = $this->input->post('name');
		$name = $this->input->post('name');
		$name = $this->input->post('name');
		$id = $this->db->insert('mytable');
		if ($id > 0) {
			return $id;
		} else {
			return FALSE;
		}*/
	}
}