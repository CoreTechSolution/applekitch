<?php
$CI = & get_instance();
$CI->load->database();
//print_r($CI); exit();
$query=$CI->db->get('settings');
foreach( $query->result() as $row ){
	define('STRIPE_SECRETE_KEY',$row->secrete_key);
	define('STRIPE_PUBLISHABLE_KEY',$row->publishable_key);
	define('FB_APP_ID',$row->fb_app_id);

}


function get_settings(){
    $CI = & get_instance();
    $db =$CI->db;
    $query = $db->get( 'settings' );
    return $query->row();
}
function realEscapeString($val) {
	$db = get_instance()->db->conn_id;
	$val = mysqli_real_escape_string($db, $val);
	return $val;
}
function send_mail($to,$subject,$message){
	$CI = & get_instance();
	$CI->load->library('email');
	$settings=get_settings();
	$config = Array(
		'protocol' => $settings->protocol,
		'smtp_host' => $settings->smtp_host,
		'smtp_port' => $settings->smtp_port,
		'smtp_crypto' => $settings->smtp_crypto,
		'smtp_user' => $settings->smtp_user,
		'smtp_pass' => $settings->smtp_pass,
		'mailtype' => 'html',
		'charset' => 'iso-8859-1',
		'wordwrap' => TRUE
	);
	$CI->email->initialize($config);
	$CI->email->set_mailtype("html");
	$CI->email->set_newline("\r\n");
	$htmlContent = $message;
	$CI->email->to($to);
	$CI->email->from('info@applekitch.com','AppleKitch');
	$CI->email->subject($subject);
	$CI->email->message($htmlContent);
//print_r($CI->email->send()); exit();
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
			$CI->session->set_flashdata('error_msg', 'Please login first');
			redirect( $param.'/login' );
		}
	} else{
		$logged_in = $CI->session->userdata('logged_in');
		if($logged_in == '1') {

		} else{
			$CI->session->set_flashdata('error_msg', 'Please login first');
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
function isUserType($param){
	$CI = & get_instance();
	if(strtolower($param)==strtolower($CI->session->userdata('user_type'))){
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

function get_userdata_by_id($user_id) {
	$CI = & get_instance();
	$CI->db->select('*');
	$CI->db->from('user');
	$CI->db->where('id', $user_id);

	if($query=$CI->db->get())
	{
		return $query->row();
	}
	else{
		return false;
	}
}

function form_dropdown_cr($fields,$table_name,$choose_text=true){
	$CI = & get_instance();
	$CI->db->select($fields);
	$CI->db->from($table_name);
	$CI->db->order_by($fields[1],'asc');
	$queries=$CI->db->get();
	$values= $queries->result_array();
	$query=array();
	if($choose_text==true){
		$query=array('0'=>'-----Choose-----');
	}
	
	foreach ($values as $value){
		$query[$value[$fields[0]]]=$value[$fields[1]];
	}
	return $query;

}
function form_dropdown_relative($fields,$table_name,$conditions=array(),$choose_text=true){
	$CI = & get_instance();
	$CI->db->select($fields);
	$CI->db->from($table_name);
	$CI->db->order_by($fields[1],'asc');
	$queries=$CI->db->get();
	$values= $queries->result_array();
	$query=array();
	if($choose_text==true){
		$query=array('0'=>'-----Choose-----');
	}
	
	foreach ($values as $value){
		$query[$value[$fields[0]]]=$value[$fields[1]];
	}
	return $query;

}
function genPdfThumbnail($source, $target)
{
	//$source = realpath($source);
	//$target = dirname($source).DIRECTORY_SEPARATOR.$target;
	$im     = new Imagick($source."[0]"); // 0-first page, 1-second page
	$im->setImageColorspace(255); // prevent image colors from inverting
	$im->setimageformat("jpeg");
	$im->thumbnailimage(160, 120); // width and height
	$im->writeimage($target);
	$im->clear();
	$im->destroy();
}
function form_dropdown_child($user_id){
	$CI = & get_instance();
	$fields=array('id','fname','lname');
	$CI->db->select('*');
	$CI->db->from('user');
	$CI->db->where('parent', $user_id);
	$CI->db->order_by($fields[0],'asc');
	$queries=$CI->db->get();
	$values= $queries->result_array();
	$query=array('0'=>'-----Choose-----');
	foreach ($values as $value){
		$query[$value[$fields[0]]]=$value[$fields[1]].' '.$value[$fields[2]];
	}
	return $query;
}
function get_parent($user_id) {
	$CI = &get_instance();
	$CI->db->select( '*' );
	$CI->db->from( 'user' );
	$CI->db->where( 'id', $user_id );
	$queries = $CI->db->get();
	$values = $queries->row();
	if($values->role == 1 || $values->role == 2 || $values->role == 4) {
		return $user_id;
	} else {
		return $values->parent;
	}
}
function get_childs($user_id){
	$CI = &get_instance();
	$values = array();

	if(!isUserType('student')) {
		$CI->db->select( '*' );
		$CI->db->from( 'user' );
		$CI->db->where( 'parent', $user_id );
		$CI->db->order_by( 'id', 'asc' );
		$queries = $CI->db->get();
		$values  = $queries->result_array();
	} else {
		$parent = get_parent($user_id);
		$CI->db->select( '*' );
		$CI->db->from( 'user' );
		$CI->db->where( array('parent' => $parent, 'id !=' => $user_id) );
		$CI->db->order_by( 'id', 'asc' );
		$queries1 = $CI->db->get();
		$values1  = $queries1->result_array();

		$CI->db->select( '*' );
		$CI->db->from( 'user' );
		$CI->db->where( 'id', $parent );
		$queries2 = $CI->db->get();
		$values2  = $queries2->result_array();

		$values = array_merge($values2,$values1);
	}
	return $values;
}
function get_user_by_id($user_id) {
	$CI = &get_instance();
	$CI->db->select( '*' );
	$CI->db->from( 'user' );
	$CI->db->where( 'id', $user_id );
	$queries = $CI->db->get();
	$values = $queries->row();
	return $values;
}
function image_upload($file,$input_name, $path='uploads',$allowed_types='jpg|png|svg|jpeg',$max_size='5242880'){
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
	$CI->db->select('grade_id');
	if($grade_id!=0){
		$CI->db->where(array('grade_id'=>$grade_id,'subject_id'=>$subject_id));
	} else{
		$CI->db->where(array('subject_id'=>$subject_id));
	}

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
function admin_email(){
    $CI = & get_instance();
    $CI->db->select('admin_mail');
    $CI->db->from("settings");
    $fields = $CI->db->get();
    $field=$fields->row();
    //print_r($field); exit();
    return $field->admin_mail;
}
function contact_email(){
    $CI = & get_instance();
    $CI->db->select('contact_mail');
    $CI->db->from("settings");
    $fields = $CI->db->get();
    $field=$fields->row();
    //print_r($field); exit();
    return $field->contact_mail;
}
function social_media_link($name){
    $CI = & get_instance();
    $CI->db->select('social_media');
    $CI->db->from("settings");
    $fields = $CI->db->get();
    $field=$fields->row();
    $social_medias=json_decode($field->social_media);
    return $social_medias->$name;
}

function slugify($text){
	// replace non letter or digits by -
	$text = preg_replace('~[^\pL\d]+~u', '-', $text);

	// transliterate
	$text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

	// remove unwanted characters
	$text = preg_replace('~[^-\w]+~', '', $text);

	// trim
	$text = trim($text, '-');

	// remove duplicate -
	$text = preg_replace('~-+~', '-', $text);

	// lowercase
	$text = strtolower($text);

	if (empty($text)) {
		return 'n-a';
	}

	return $text;
}

function syncMailchimp($email) {
	$apiKey = '7b421545ab8fdb0987c32b7cf92dd226-us16';
	$listId = '161155';

	$memberId = md5(strtolower($email));
	$dataCenter = substr($apiKey,strpos($apiKey,'-')+1);
	$url = 'https://' . $dataCenter . '.api.mailchimp.com/3.0/lists/' . $listId . '/members/' . $memberId;

	$json = json_encode(array(
		'email_address' => $email,
		'status'        => 'subscribed',
		'merge_fields'  => array(
			'FNAME'     => 'fname',
			'LNAME'     => 'lname'
		)
	));

	$ch = curl_init($url);

	curl_setopt($ch, CURLOPT_USERPWD, 'user:' . $apiKey);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_TIMEOUT, 10);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $json);

	$result = curl_exec($ch);
	$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
	curl_close($ch);

	return $httpCode;
}
function uploadpdfconvertjpg($path='uploads', $data, $f_name){
    $rtntext='';
    $CI = & get_instance();
    $CI->load->library('upload');
    $upload_path=$path;

    if (!file_exists(FCPATH .$upload_path)) {
        mkdir(FCPATH .$upload_path, 0777, true);
    }

    $config['upload_path'] = FCPATH . $upload_path . '/';
    $config['allowed_types']  = 'pdf';
    $config['overwrite']      = TRUE;
    $config['remove_spaces']  = TRUE;
    $config['file_name'] = $data;

    $CI->upload->initialize($config);

    if (! $CI->upload->do_upload($f_name))
    {
        $CI->session->set_flashdata('msg', $CI->upload->display_errors());
        $CI->session->set_flashdata('msg_type', 'Error');
        $rtntext = false;

    }else{

        $im = new Imagick();
        $im->setResolution(250,200);

        $ig = 0;

        //while(true){
        //    try {
                $im->readimage($config['upload_path'].$config['file_name']."[$ig]");
        //    } catch (Exception $e) {
        //        $ig = -1;
        //    }

         //   if($ig === -1) break;

            $im->setImageBackgroundColor('white');
            $im->setImageFormat('jpg');
            $exp_file = explode('.',$config['file_name']);

            $image_name     = $exp_file[0]."_$ig".'.jpg';
            //$imageprops     = $im->getImageGeometry();

            $im->writeImage($config['upload_path'] .$image_name);
            $im->clear();
            $im->destroy();

        //    ImageJPEG(ImageCreateFromString(file_get_contents($config['upload_path'].$image_name)), $config['upload_path'].$image_name);
        //    $ig++;
            $img_path[] = $rtntext=base_url().$upload_path.'/'.$image_name;
        //}

        $pdf_path = base_url().$upload_path.'/'.$config['file_name'];
    }

    $rtntext = array('image-url' => $img_path, 'pdf-url' => $pdf_path);

    //print_r($rtntext);exit;
    return $rtntext;
}
