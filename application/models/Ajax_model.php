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
	function insert_question($data){
		$this->db->insert('questions',$data);
		if($this->db->affected_rows()>0) {
			$insert_id = $this->db->insert_id();


		}
		return $insert_id;
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
}