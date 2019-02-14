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
	function get_sub_wise_grade($id,$table,$grade_id=0){
		$this->db->select('*');
		//echo $table;
		if($table=="work_grades"){
			$this->db->where(array('work_subject_id'=>$id));
		} elseif ($table=="work_categories") {
			$this->db->where(array('work_subject_id'=>$id,'work_grade_id'=>$grade_id));
		} elseif ($table=="work_topics"){
			$this->db->where(array('work_cat_id'=>$id));
		} else{
			$this->db->where(array('id'=>$id));
		}
        $this->db->from($table);
		$query=$this->db->get();
		//echo $this->db->last_query();
        $res=$query->result();
        if(!empty($res) && $res != ''){
            return $res;
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
	function get_questions_by_one($conditions=array(),$row=true,$start='',$not_in=array(),$where_in=array()){
		$this->db->select('*');
		if(!empty($conditions)){
			$this->db->where($conditions);
		}
        if(!empty($where_in)){
            $this->db->where_in($where_in);
        }
		if(!empty($not_in)){
			$not_in = array_map('strval',$not_in);
			$this->db->where_not_in('question_id', $not_in);
		}
		
		$this->db->limit(1, 0);

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
    function get_worksheets($conditions=array(),$sort_by='') {
        $this->db->select('*');
        if(!empty($conditions)){
            $this->db->where($conditions);
        }
        $this->db->join('worksheet_rating','worksheets.id=worksheet_rating.worksheet_id','left');
        $this->db->from('worksheets');
        if($sort_by=='most_recent'){
            $this->db->order_by("create_dt", "desc");
        } elseif($sort_by=='most_popular') {
            $this->db->select('`id`, `name`, `slug`, `content`, `worksheet_img`, `pdf_path`, `pdf_page_count`, `work_subject_id`, `work_grade_id`, `work_cat_id`, `work_topic_id`, `label`, `new_days_limit`, `work_uni_id`, `create_dt`,`rating_id`, `worksheet_id`, `rating_number`, sum(total_points) as total_points, `user_id`, `created`, `modified`, `status`');
            $this->db->group_by('worksheet_rating.worksheet_id');
            $this->db->order_by("total_points", "desc");
        } else{
            $this->db->order_by("create_dt", "desc");
        }

        if($query = $this->db->get())
        {
            return $query->result();
        }
        else{
            return false;
        }
    }
    function get_categories($conditions=array()){
        $this->db->select('*');
        if(!empty($conditions)){
            $this->db->where($conditions);
        }
        $this->db->from('work_categories');
        if($query = $this->db->get())
        {
            return $query->result();
        }
        else{
            return false;
        }

    }
    function add_to_favorite($data) {

        $this->db->insert('worksheet_favorite', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    function modal_register(){

    }
}