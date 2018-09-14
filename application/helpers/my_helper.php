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
function isLogin($param=''){
	$CI = & get_instance();
	if($param=='admin'){
		$logged_in = $CI->session->userdata('admin_logged_in');
		if($logged_in == 1) {

		} else{
			redirect( $param.'/login' );
		}
	} else{
		$logged_in = $CI->session->userdata('logged_in');
		if($logged_in == '1') {

		} else{
			redirect( 'login' );
		}
	}


}
function loginCheck($user_type='user'){
	$CI = & get_instance();
	if($user_type=='admin'){
		$admin_logged_in = $CI->session->userdata('admin_logged_in');
	} else{
		$admin_logged_in = $CI->session->userdata('logged_in');
	}
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
function get_image($image){
	$rtn_text=($image!='') ? $image : base_url('assets/images/noimg.png');
	return $rtn_text;

}
function api_curl_connect( $api_url ){
	$connection_c = curl_init(); // initializing
	curl_setopt( $connection_c, CURLOPT_URL, $api_url ); // API URL to connect
	curl_setopt( $connection_c, CURLOPT_RETURNTRANSFER, 1 ); // return the result, do not print
	curl_setopt( $connection_c, CURLOPT_TIMEOUT, 20 );
	$json_return = curl_exec( $connection_c ); // connect and get json data
	curl_close( $connection_c ); // close connection
	return json_decode( $json_return ); // decode and return
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
	$rtntxt=0;
	$CI = & get_instance();
	$CI->db->select($id);
	$CI->db->where('slug',$slug);
	$CI->db->from($table);
	$queries=$CI->db->get();
	$values= $queries->result();
	if($values){
		$vv=$id;
		$rtntxt=$values[0]->$vv;
	}
	//print_r($values);exit();
	return $rtntxt;
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
function get_topic_by($grade_id,$subject_id,$order_by='category_id', $order='ASC'){
	$CI = & get_instance();
	$CI->db->distinct();
	$CI->db->select('topic_id');
	$CI->db->select('category_id');
	$CI->db->where(array('grade_id'=>$grade_id,'subject_id'=>$subject_id));
	$CI->db->order_by($order_by,$order);
	$CI->db->from('questions');
	$queries=$CI->db->get();
	//echo $CI->db->last_query(); exit();
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
function dateFormat($format='d-m-Y', $givenDate=null){
	return date($format, strtotime($givenDate));
}
function secondsToTime($seconds, $format='default') {
	$dtF = new \DateTime('@0');
	$dtT = new \DateTime("@$seconds");
//return $dtF->diff($dtT)->format('%a days, %h hours, %i minutes and %s seconds');
	$d = $dtF->diff($dtT)->format('%a');
	$h = $dtF->diff($dtT)->format('%h');
	$m = $dtF->diff($dtT)->format('%i');
	$s = $dtF->diff($dtT)->format('%s');

	$timeString = '';
	if($format=='default'){
		if(!empty($d) || $d != '00') {
			$timeString .= $d.' days';
		}
		if(!empty($h) || $h != '00') {
			$timeString .= ' '.$h.' hours';
		}
		if(!empty($m) || $m != '00') {
			$timeString .= ' '.$m.' minutes';
		}
		if(!empty($s) || $s != '00') {
			$timeString .= ' '.$s.' seconds';
		}
	} elseif($format=='short'){
		if(!empty($d) || $d != '00') {
			$timeString .= $d.' d';
		}
		if(!empty($h) || $h != '00') {
			$timeString .= ' '.$h.' hr';
		}
		if(!empty($m) || $m != '00') {
			$timeString .= ' '.$m.' min';
		}
		/*if(!empty($s) || $s != '00') {
			$timeString .= ' '.$s.' sec';
		}*/
	}

	return $timeString;
}