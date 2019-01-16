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
	function get_topics($condition=array(),$row=false) {
		$this->db->select('*');
		$this->db->from('topics');
		if(!empty($condition)){
		    $this->db->where($condition);
        }
		$this->db->order_by("topic_id", "desc");

		if($query = $this->db->get())
		{
		    if($row==true){
                return $query->row();
            } else{
                return $query->result();
            }

		}
		else{
			return false;
		}
	}
    function get_testimonials() {
        $this->db->select('*');
        $this->db->from('testimonials');
        $this->db->order_by("id", "desc");

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
    function insert_testimonial($data){
        $this->db->insert('testimonials', $data);
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
	    $this->db->select('*');
	    $this->db->from('category');
	    $query=$this->db->get();
		//$query = $this->db->query('SELECT category.id, category.name, category.grade, category.country, category.subject, category.parent, country.name AS cname, grade.name AS gname, subject.name AS sname FROM category INNER JOIN country ON category.country = country.id INNER JOIN grade ON category.grade = grade.id INNER JOIN subject ON category.subject = subject.id');

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
    function edit_topic($data,$conditions) {
        $this->db->set($data);  //Set the column name and which value to set..
        $this->db->where($conditions); //set column_name and value in which row need to update
        if($this->db->update('topics')){
            return true;
        } else{
            return false;
        }
    }
    function get_grade_settings($conditions=array(),$row=false){
        $this->db->select('*');
        if (!empty($conditions))
            $this->db->where($conditions);
        $this->db->from('grade_settings');
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
    function insert_grade_setting($data) {
        $this->db->insert('grade_settings', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    function update_grade_setting($conditions,$data) {
        $this->db->set($data);  //Set the column name and which value to set..
        $this->db->where($conditions); //set column_name and value in which row need to update
        if($this->db->update('grade_settings')){
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
		$this->db->insert('pages', $data);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}

	function edit_page($conditions,$data) {
		$this->db->set($data);  //Set the column name and which value to set..
		$this->db->where($conditions); //set column_name and value in which row need to update
		if($this->db->update('pages')){
			return true;
		} else{
			return false;
		}
	}

	function get_page_data($conditions=array(),$row=false){
		$this->db->select('*');
		if (!empty($conditions))
			$this->db->where($conditions);
		$this->db->from('pages');
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
	function get_award_templates($conditions=array(),$row=false){
		$this->db->select('*');
		if(!empty($conditions))
			$this->db->where($conditions);

		$this->db->from('award_templates');
		$query = $this->db->get();
		if($query){
			if($row==true){
				return $query->result();
			} else{
				return $query->row();
			}
		}
		else{
			return false;
		}
	}
	function get_question_by_id($qid) {
		$this->db->select('*');
		$this->db->from('questions');
		$this->db->where('question_id', $qid);
		$queries = $this->db->get();
		$query = $queries->row();
		return $query;
	}
	function update_settings($data, $condition){
        $this->db->set($data);  //Set the column name and which value to set..
        $this->db->where($condition); //set column_name and value in which row need to update
        if($this->db->update('settings')){
            return true;
        } else{
            return false;
        }
    }
    function update_home_settings($data, $condition){
        $this->db->set($data);  //Set the column name and which value to set..
        $this->db->where($condition); //set column_name and value in which row need to update
        if($this->db->update('home_settings')){
            return true;
        } else{
            return false;
        }
    }
    function get_settings(){
        $this->db->select('*');
        $this->db->from('settings');
        $queries = $this->db->get();
        $query = $queries->row();
        return $query;
    }
    function get_home_settings($conditions='', $rows=false){
        $this->db->select('*');
        if(!empty($conditions))
            $this->db->where($conditions);
        $this->db->from('home_settings');
        $queries = $this->db->get();
        if($queries){
            if($rows==true){
                $query = $queries->row();
            }else{
                $query = $queries->result();
            }

        } else{
            $query=false;
        }

        return $query;
    }
    function copy_question($qid) {
	    $this->db->where('question_id', $qid);
	    $query = $this->db->get('questions');
	    foreach ($query->result() as $row){
		    foreach($row as $key=>$val){
			    if($key != 'question_id'){
				    if($key == 'question_name') {
					    $val = 'Copy of '.$val;
					    $this->db->set( $key, $val );
				    } else {
					    $this->db->set( $key, $val );
				    }
			    }
		    }
	    }

	    $this->db->insert('questions');

	    if($this->db->affected_rows() > 0) {
	    	return true;
	    } else {
	    	return false;
	    }
    }
    function update_testimonial($data,$conditions){
        $this->db->set($data);  //Set the column name and which value to set..
        $this->db->where($conditions); //set column_name and value in which row need to update
        if($this->db->update('testimonials')){
            return true;
        } else{
            return false;
        }
	}
	function get_worksheets($conditions=array()) {
		$this->db->select('*');
		if(!empty($conditions)){
			$this->db->where($conditions);
		}
        $this->db->from('worksheets');
        $this->db->order_by("id", "desc");

        if($query = $this->db->get())
        {
            return $query->result();
        }
        else{
            return false;
        }
	}
	function insert_worksheet($data){
        $this->db->insert('worksheets', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
	}
	function get_work_subject($conditions=array()) {
		$this->db->select('*');
		if(!empty($conditions)){
			$this->db->where($conditions);
		}
        $this->db->from('work_subjects');
        $this->db->order_by("id", "desc");

        if($query = $this->db->get())
        {
            return $query->result();
        }
        else{
            return false;
        }
	}
	function insert_work_subject($data){
        $this->db->insert('work_subjects', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
	}
	function get_work_grade($conditions=array()) {
		$this->db->select('*');
		if(!empty($conditions)){
			$this->db->where($conditions);
		}
        $this->db->from('work_grades');
        $this->db->order_by("id", "desc");

        if($query = $this->db->get())
        {
            return $query->result();
        }
        else{
            return false;
        }
	}
	function insert_work_grade($data){
        $this->db->insert('work_grades', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
	}
	function get_work_cat($conditions=array()) {
		$this->db->select('*');
		if(!empty($conditions)){
			$this->db->where($conditions);
		}
        $this->db->from('work_categories');
        $this->db->order_by("id", "desc");

        if($query = $this->db->get())
        {
            return $query->result();
        }
        else{
            return false;
        }
	}
	function insert_work_cat($data){
        $this->db->insert('work_categories', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
	}
	function get_work_topic($conditions=array()) {
		$this->db->select('*');
		if(!empty($conditions)){
			$this->db->where($conditions);
		}
        $this->db->from('work_topics');
        $this->db->order_by("id", "desc");

        if($query = $this->db->get())
        {
            return $query->result();
        }
        else{
            return false;
        }
	}
	function insert_work_topic($data){
        $this->db->insert('work_topics', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
	}
	function get_ratting_number($id){
		$this->db->select('*');
		if(!empty($conditions)){
			$this->db->where(array('rating_id'=>$id));
		}
        $this->db->from('worksheet_rating');
		$query = $this->db->get();
		$f_data=$query->result();

        if($f_data->rating_number)
        {
            return $f_data->rating_number;
        }
        else{
            return 0;
        }
	}
}