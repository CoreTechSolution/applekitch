<?php
function send_mail($to,$subject,$message){
	$CI = & get_instance();
	$CI->load->library('email');
	$config = Array(
		'protocol' => 'smtp',
		'smtp_host' => 'gator4070.hostgator.com',
		'smtp_port' => 465,
		'smtp_crypto' => 'ssl',
		'smtp_user' => 'smtp@cgsthemes.com',
		'smtp_pass' => 'qweQWE123!@#',
		'mailtype' => 'html',
		'charset' => 'iso-8859-1',
		'wordwrap' => TRUE
	);
	$CI->email->initialize($config);
	$CI->email->set_mailtype("html");
	$CI->email->set_newline("\r\n");
	$htmlContent = $message;
	$CI->email->to($to);
	$CI->email->from('smtp@cgsthemes.com','AppleKitch');
	$CI->email->subject($subject);
	$CI->email->message($htmlContent);
	if($CI->email->send())
		return true;
	else
		return false;
}


function encripted($data){
	$key1 = '644CBEF595BC9';
	$final_data = $key1.'|'.$data;
	$val = base64_encode(base64_encode(base64_encode($final_data)));
	return $val;
}
function decripted($data){
	$val = base64_decode(base64_decode(base64_decode($data)));
	$final_data = explode('|', $val);
	return $final_data[1];
}
function isLogin($param='admin'){
	$CI = & get_instance();
	$admin_logged_in = $CI->session->userdata('admin_logged_in');
	if($admin_logged_in == 1) {

	} else{
		redirect( $param.'/login' );
	}
}
function loginCheck(){
	$CI = & get_instance();
	$admin_logged_in = $CI->session->userdata('admin_logged_in');
	if($admin_logged_in == 1) {
		return true;
	} else{
		return false;
	}
}
function get_current_user_id(){
	$CI = & get_instance();
	$user_id = $CI->session->userdata('user_id');
	if($user_id) {
		return $user_id;
	} else{
		return false;
	}
}

function form_dropdown_cr($fields,$table_name){
	$CI = & get_instance();
	$CI->db->select($fields);
	$CI->db->from($table_name);
	$CI->db->order_by($fields[0],'asc');
	$queries=$CI->db->get();
	$values= $queries->result_array();
	$query=array('0'=>'-----Choose-----');
	foreach ($values as $value){
		$query[$value[$fields[0]]]=$value[$fields[1]];
	}
	return $query;

}
function image_upload($file,$input_name, $path='uploads',$allowed_types='jpg|png',$max_size='5242880'){
	$rtntext='';
	//print_r(FCPATH); exit();
	$CI = & get_instance();
	if(!empty($file[$input_name]['name'])){
		$upload_path=$path;
		$CI->load->library('upload');
		if (!file_exists(FCPATH .$upload_path)) {
			mkdir(FCPATH .$upload_path, 0777, true);
		}
		$config['upload_path'] = FCPATH . $upload_path . '/';
		$config['allowed_types'] = $allowed_types;
		$config['max_size'] = $max_size; //default: 5MB max     = '*';
		$CI->upload->initialize($config);
		//echo "string"; exit();
		if (!$CI->upload->do_upload($input_name)) {
			//print_r($CI->upload->display_errors()); exit();
			$CI->session->set_flashdata('msg', $CI->upload->display_errors());
			$CI->session->set_flashdata('msg_type', 'Error');
			$rtntext = false;
		} else {
			$ufile = $CI->upload->data();
			$rtntext=base_url().$upload_path.'/'.$ufile['file_name'];
			$CI->session->set_userdata('delete_file_path',FCPATH.$upload_path.'/'.$ufile['file_name'] );
		}

	}
	return $rtntext;
}
function get_question_count($country='',$subject='',$grade=''){
	$CI = & get_instance();
	$country_id=0;
	$subject_id=get_id_by_slug('id',$subject,'subject');
	$grade_id=get_id_by_slug('id',$grade,'grade');
	if($country!=''){
		$CI->db->where('country_id', $country_id);
	}
	if($subject!=''){
		$CI->db->where('subject_id', $subject_id);
	}
	if($grade!=''){
		$CI->db->where('grade_id', $grade_id);
	}
	$num_rows = $CI->db->count_all_results('questions');
	//echo $CI->db->last_query(); exit();
	return $num_rows;
}
function get_id_by_slug($id='id',$slug,$table){
	$CI = & get_instance();
	$CI->db->select($id);
	$CI->db->where('slug',$slug);
	$CI->db->from($table);
	$queries=$CI->db->get();
	$values= $queries->result();
	//print_r($values);exit();
	$vv=$id;
	return $values[0]->$vv;
}
function get_returnfield($db,$p_field,$p_value,$r_field){
	$rtntext='';
	$CI = & get_instance();
	$CI->db->select($r_field);
	$CI->db->from($db);
	$CI->db->where(array($p_field=>$p_value));
	$results = $CI->db->get();

	foreach ($results->result() as $key) {
		$rtntext = $key->$r_field;
	}
	//print_r($rtntext); exit();
	return $rtntext;
}
function get_topic_by($grade_id,$subject_id){
	$CI = & get_instance();
	$CI->db->distinct();
	$CI->db->select('topic_id');
	$CI->db->where(array('grade_id'=>$grade_id,'subject_id'=>$subject_id));
	//$CI->db->group_by('category_id');
	$CI->db->from('questions');
	$queries=$CI->db->get();
	$values= $queries->result();
	/*//print_r($values);exit();
	$vv=$id;*/
	return $values;
}
function get_table_data($fields=array(), $table, $conditions=array()){
	$CI = & get_instance();
	$CI->db->select($fields);
	if(!empty($conditions)){
		$CI->db->where($conditions);
	}
	$CI->db->from($table);
	$queries=$CI->db->get();
	return $queries->result();
}