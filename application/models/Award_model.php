<?php
class Award_model extends CI_Model {
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

	function get_subjects() {
		$this->db->select('*');
		$this->db->from('subject');
		$this->db->order_by('id', 'ASC');
		$query=$this->db->get();
		if($query){
			return $query->result();
		}
		else{
			return false;
		}
	}

	function get_grades() {
		$this->db->select('*');
		$this->db->from('grade');
		$this->db->order_by('id', 'ASC');

		if($query = $this->db->get())
		{
			return $query->result();
		}
		else{
			return false;
		}
	}

	function get_subject_by_slug($subject_slug) {
		$this->db->select('*');
		$this->db->from('subject');
		$this->db->where('slug', $subject_slug);

		if($query = $this->db->get())
		{
			return $query->row();
		}
		else{
			return false;
		}
	}

	function get_grade_by_slug($grade_slug) {
		$this->db->select('*');
		$this->db->from('grade');
		$this->db->where('slug', $grade_slug);

		if($query = $this->db->get())
		{
			return $query->row();
		}
		else{
			return false;
		}
	}

	function get_question_ans_by_sub_grade($sub_id, $grade_id, $user_id) {
		$this->db->select('*');
		$this->db->from('student_qns_ans');
		$this->db->where(
			array(
				'subject_id' => $sub_id,
				'grade_id' => $grade_id,
				'user_id' => $user_id
			)
		);

		if($query = $this->db->get())
		{
			return $query->result();
		}
		else{
			return false;
		}
	}

	function get_ans_topic_by_sub_grade($sub_id, $grade_id, $user_id) {
		$this->db->select('*');
		$this->db->from('student_ans_topic');
		$this->db->where(
			array(
				'subject_id' => $sub_id,
				'grade_id' => $grade_id,
				'user_id' => $user_id
			)
		);

		if($query = $this->db->get())
		{
			return $query->result();
		}
		else{
			return false;
		}
	}

	function award_click($user_id, $subject, $grade) {
		$award_click1 = array();
		$this->db->select('award_click');
		$this->db->from('user');
		$this->db->where('id', $user_id);
		$query = $this->db->get();
		$value = $query->row();
		$award_click = unserialize($value->award_click);
		if(!empty($award_click)) {
			foreach ( $award_click as $val ) {
				$val1 = unserialize( $val );
				if ( $val1['subject'] == $subject && $val1['grade'] == $grade ) {
					array_push($award_click1, $val1['id']);
				}
			}
		}
		return $award_click1;
	}
}
?>