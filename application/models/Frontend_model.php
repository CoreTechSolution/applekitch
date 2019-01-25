<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Frontend_model extends CI_Model {
	public function __construct() {
		parent::__construct();
	}
	function get_questions($conditions=array(),$row=true){
		$this->db->select('*');
		if(!empty($conditions)){
			$this->db->where($conditions);
		}

		$this->db->from('questions');
		$queries=$this->db->get();
		if($row==true){
			$query=$queries->row();
		} else{
			$query=$queries->result();
		}
		return $query;

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
    function get_worksheets($conditions=array()) {
        $this->db->select('*');
        if(!empty($conditions)){
            $this->db->where($conditions);
        }
        $this->db->join('worksheet_rating','worksheets.id=worksheet_rating.worksheet_id','left');
        $this->db->from('worksheets');
        $this->db->order_by("create_dt", "desc");

        if($query = $this->db->get())
        {
            return $query->result();
        }
        else{
            return false;
        }
    }
    function get_worksheet_by_slug($conditions=array()) {
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

    function get_related_worksheets($id){
	    $this->db->select('*');
	    $this->db->where("id<>".$id);
        $this->db->limit(10, 0);
        $this->db->from('worksheets');
        $this->db->order_by("create_dt", "desc");

        if($query = $this->db->get())
        {
            return $query->result();
        }
        else{
            return false;
        }
    }

    function get_subject($conditions=array()) {
        $this->db->select('*');
        if(!empty($conditions)){
            $this->db->where($conditions);
        }
        $this->db->from('work_subjects');


        if($query = $this->db->get())
        {
            return $query->result();
        }
        else{
            return false;
        }
    }



    function get_work_subjects($conditions=array()) {
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


    function get_work_grades($conditions=array()) {
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




     function  get_work_categories ($conditions=array()){
	    $this->db->select('*');
         if(!empty($conditions)){
             $this->db->where($conditions);
         }
         $this->db->from('work_categories');
         $this->db->order_by("id","desc");
         if($query=$this->db->get()){
             return $query->result();
         }
         else {
             return false;
         }

     }



     function get_work_topics ($conditions=array()){
	    $this->db->select('*');
	    if(!empty($conditions)){
	        $this->db->where($conditions);
        }

	    $this->db->from('work_topics');
	    $this->db->order_by("id","desc");
	    if($query=$this->db->get()){
	        return $query->result();
        }
	    else {
	        return false;
        }
     }




     public function get_worksheet_rating(){
         $this->db->select('*');
         if(!empty($conditions)){
             $this->db->where($conditions);
         }

         $this->db->from('worksheet_rating');

         if($query=$this->db->get()){
             return $query->result();
         }
         else {
             return false;
         }
     }




    function get_grade_content($conditions=array(),$row=true){
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
	function get_grades($conditions=array(),$row=true){
		$this->db->select('*');
		if(!empty($conditions)){
			$this->db->where($conditions);
		}
		$this->db->order_by('id','asc');

		$this->db->from('grade');
		$queries=$this->db->get();
		if($row==true){
			$query=$queries->row();
		} else{
			$query=$queries->result();
		}
		return $query;

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
		$this->db->order_by('rand()');
		$this->db->from('questions');
		$queries=$this->db->get();
		if($row==true){
			$query=$queries->row();
		} else{
			$query=$queries->result();
		}
		return $query;

	}
}