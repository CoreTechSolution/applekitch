<?php
class Ajax_model extends CI_Model{
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

	function delete_data($id,$check_field,$table_name){
		$this->db->where($check_field, $id);
		if($this->db->delete($table_name)){
			return true;
		} else{
			return false;
		}
	}
    function get_slug($data,$db="topics"){
        $this->db->select('*');
        $this->db->where($data);
        $this->db->from($db);
        $query=$this->db->get();
        $res=$query->result();
        if(!empty($res) && $res != ''){
            return true;
        }else{
            return false;
        }

    }
	function insert_question($data){
		$this->db->insert('questions',$data);
		if($this->db->affected_rows()>0) {
			$insert_id = $this->db->insert_id();


		}
		return $insert_id;
	}
	function check_social_login_exits($data){
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('email_address',$data['email_address']);
        $this->db->where('social_action',$data['social_action']);
        $this->db->where('activation',1);

        if($query=$this->db->get())
        {
            return $query->row();
        }
        else{
            return false;
        }
    }
	function save_user_by_fb($data){
        $this->db->insert('user',$data);
		if($this->db->affected_rows()>0) {
            $insert_id = $this->db->insert_id();
        }
        if($insert_id){
            return true;
        } else{
            return false;
        }
    }
	function update_question($conditions,$data){
		$this->db->where($conditions);
		$this->db->update('questions', $data);
		if ($this->db->affected_rows()) {
			return true;
		} else{
			return false;
		}
	}
	function get_questions($conditions,$row) {
		$this->db->select('*');
		$this->db->from('questions');
		if(!empty($conditions)){
			$this->db->where($conditions);
		}
		$this->db->order_by("question_id", "desc");

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
	function save_student_qns_ans($data){
		$this->db->insert('student_qns_ans',$data);
		if($this->db->affected_rows()>0) {
			$insert_id = $this->db->insert_id();
		}
		return $insert_id;
	}
	function get_questions_by_one($conditions=array(),$row=true,$start='',$not_in=array()){
		$this->db->select('*');
		if(!empty($conditions)){
			$this->db->where($conditions);
		}
		if(!empty($not_in)){
			$this->db->where_not_in($not_in);
		}
		if($start!=''){
			$this->db->limit(1, $start);
		}
		else{
			$this->db->limit(1, 0);
		}
		$this->db->order_by('question_id');
		$this->db->from('questions');
		$queries=$this->db->get();
		//echo $this->db->last_query();
		if($row==true){
			$query=$queries->row();
		} else{
			$query=$queries->result();
		}
		return $query;

	}
	function get_certificates($conditions=array(),$row=false) {
		$this->db->select('*');
		if (!empty($conditions))
			$this->db->where($conditions);
		$this->db->from('certificates');
		$query=$this->db->get();
		//print_r($query->result());
		if(!empty($query->result())) {
			if ( $row == true ) {
				return $query->row();
			} else if ( $row == false ) {
				return $query->result();
			}
		} else {
			$this->db->select('*');
			$this->db->where(array('default_status'=>'true'));
			$this->db->from('certificates');
			$query1=$this->db->get();
			//echo $this->db->last_query();
			if ( $row == true ) {
				return $query1->row();
			} else if ( $row == false ) {
				return $query1->result();
			}
		}
	}
	function insert_ans_certificate($data) {
		$this->db->insert('student_ans_topic', $data);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}
	function award_click($conditions,$award_click1) {
		$this->db->select('award_click');
		$this->db->from('user');
		$this->db->where('id', $conditions['id']);
		$query = $this->db->get();
		$value = $query->row();
		if(empty($value->award_click)) {
			$award_click = array();
		} else {
			$award_click = unserialize($value->award_click);
		}
		array_push($award_click, $award_click1);
		$this->db->where( $conditions );
		$this->db->update( 'user', array('award_click' => serialize($award_click)) );
		if ($this->db->affected_rows()) {
			return true;
		} else{
			return false;
		}
	}
}