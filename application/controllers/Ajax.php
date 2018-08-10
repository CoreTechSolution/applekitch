<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {
	public function __construct(){

		parent::__construct();
		$this->load->model('ajax_model');

	}
	public function index()
	{
		$data = array(
			'title' => 'Login',
		);
		$this->load->view('login_page', $data);
	}
	public function delete_data(){
		$id=$_POST['id'];
		$check_field=$_POST['check_field'];
		$table_name=$_POST['table_name'];
		$result=$this->ajax_model->delete_data($id,$check_field,$table_name);
		if($result){
			$response['status']  = 'success';
			$response['message'] = 'Deleted Successfully ...';

		} else{
			$response['status']  = 'error';
		$response['message'] = 'Unable to delete ...';

		}
		echo json_encode($response);

	}
	function save_question(){
		$form_data=$_POST;
		$data['country_id']=$form_data['country_id'];
		$data['subject_id']=$form_data['subject_id'];
		$data['grade_id']=$form_data['grade_id'];
		$data['category_id']=$form_data['category_id'];
		$data['topic_id']=$form_data['topic_id'];
		$data['question_name']=$form_data['question'];
		unset($form_data['country_id']);
		unset($form_data['subject_id']);
		unset($form_data['grade_id']);
		unset($form_data['category_id']);
		unset($form_data['topic_id']);
		//print_r($_FILES);
		//exit();
		if($form_data['question_option']=='1') {
			if ( ! empty( $_FILES['imageQ_upload']['name'] ) ) {
				$img_path = image_upload( $_FILES, 'imageQ_upload', 'uploads/images' );
				if ( $img_path ) {
					$image_upload = $img_path;
				} else {

					$image_upload = '';
				}
			}
			$form_data['img'] = $image_upload;
		}
		if($form_data['question_option']=='20') {
			if ( ! empty( $_FILES['imageQ_upload']['name'] ) ) {
				$img_path = image_upload( $_FILES, 'imageQ_upload', 'uploads/images' );
				if ( $img_path ) {
					$image_upload = $img_path;
				} else {

					$image_upload = '';
				}
			}
			$form_data['img'] = $image_upload;
		}

		if(!empty($form_data['question_id'])){
			$question_id=$form_data['question_id'];
			unset($form_data['question_id']);
			$data['form_data']=serialize($form_data);
			$res = $this->ajax_model->update_question(array('question_id'=>$question_id),$data);
			if($res){
				$res=$question_id;
			} else{
				$res=0;
			}

		} else{
			$data['form_data']=serialize($form_data);
			$res=$this->ajax_model->insert_question($data);

		}


		if($res){
			echo $res;
		} else {
			echo false;
		}
	}
	public function question_submit(){
		$form_data=$_POST;
		$rtntext=array();
		if($form_data['question_id']!='') {
			$question_id=$form_data['question_id'];
			$grade_id=$form_data['grade_id'];
			$subject_id=$form_data['subject_id'];
			$topic_id=$form_data['topic_id'];
			$start=$form_data['start'];
			$conditions=array('question_id'=>$question_id);
			$questions=$this->ajax_model->get_questions($conditions,true);
			$form_data_ans=unserialize($questions->form_data);
			$questions_next=$this->ajax_model->get_questions_by_one(array('grade_id'=>$grade_id,'subject_id'=>$subject_id,'topic_id'=>$topic_id),false,$start);
			//print_r($questions_next); exit();
			if($form_data['question_option']=='1'){
				$qview_option='qView_option_'.$form_data['question_option'];
				if(!empty($questions_next))
					$html=$this->$qview_option($questions_next[0],$grade_id,$subject_id,$topic_id,$start);
				if(empty($html)){
					$html='';
				}
				$rtntext['html']=$html;
				if(strtolower($form_data_ans['ans_textbox'])==strtolower($form_data['qAns_box'])){
					$this->session->set_userdata('score_ans',($form_data['answred']+1));
					$this->session->set_userdata('score_smart',($form_data['score']+10));
					$rtntext['type']='true';
					$rtntext['content']='Correct';

				} else{
					$this->session->set_userdata('score_ans',($form_data['answred']+1));
					$rtntext['type']='false';
					$rtntext['content']='Wrong: Correct answer is : '.$form_data_ans['ans_textbox'];
				}
			} elseif ($form_data['question_option']=='2'){
				$qview_option='qView_option_'.$form_data['question_option'];
				//print_r($questions_next);
				if(!empty($questions_next)) {
					$html = $this->$qview_option( $questions_next[0], $grade_id, $subject_id, $topic_id, $start );
				} else {
					$html='';
				}
				$rtntext['html']=$html;
				if(strtolower($form_data_ans['answer'])==strtolower($form_data['img_answer'])){
					$this->session->set_userdata('score_ans',($form_data['answred']+1));
					$this->session->set_userdata('score_smart',($form_data['score']+10));
					$rtntext['type']='true';
					$rtntext['content']='Correct';

				} else {
					$this->session->set_userdata('score_ans',($form_data['answred']+1));
					$rtntext['type']='false';
					$rtntext['content']='Wrong: Correct answer is : '.$form_data_ans['answer'];
				}
			} elseif ($form_data['question_option']=='3'){
				$qview_option='qView_option_'.$form_data['question_option'];
				if(!empty($questions_next))
					$html=$this->$qview_option($questions_next[0],$grade_id,$subject_id,$topic_id,$start);
				if(empty($html)){
					$html='';
				}
				//echo $html; exit();
				$rtntext['html']=$html;
				if(strtolower($form_data_ans['ans_textbox'])==strtolower($form_data['option_1'])){
					$this->session->set_userdata('score_ans',($form_data['answred']+1));
					$this->session->set_userdata('score_smart',($form_data['score']+10));
					$rtntext['type']='true';
					$rtntext['content']='Correct';
				} else{
					$this->session->set_userdata('score_ans',($form_data['answred']+1));
					$rtntext['type']='false';
					$rtntext['content']='Wrong: Correct answer is : '.$form_data_ans['ans_textbox'];
				}
			} elseif ($form_data['question_option']=='6'){
				$qview_option='qView_option_'.$form_data['question_option'];
				if(!empty($questions_next))
					$html=$this->$qview_option($questions_next[0],$grade_id,$subject_id,$topic_id,$start);
				if(empty($html)){
					$html='';
				}
				//echo $html; exit();
				$rtntext['html']=$html;
				if(strtolower($form_data_ans['ans_textbox'])==strtolower($form_data['option_1'])){
					$this->session->set_userdata('score_ans',($form_data['answred']+1));
					$this->session->set_userdata('score_smart',($form_data['score']+10));
					$rtntext['type']='true';
					$rtntext['content']='Correct';
				} else{
					$this->session->set_userdata('score_ans',($form_data['answred']+1));
					$rtntext['type']='false';
					$rtntext['content']='Wrong: Correct answer is : '.$form_data_ans['ans_textbox'];
				}
			} elseif ($form_data['question_option']=='8'){
				$qview_option='qView_option_'.$form_data['question_option'];
				//print_r($questions_next);
				if(!empty($questions_next)) {
					$html = $this->$qview_option( $questions_next[0], $grade_id, $subject_id, $topic_id, $start );
				} else {
					$html='';
				}
				$rtntext['html']=$html;
				$img_answer = explode(',', $form_data['img_answer']);
				if($form_data_ans['answer']==$img_answer){
					$this->session->set_userdata('score_ans',($form_data['answred']+1));
					$this->session->set_userdata('score_smart',($form_data['score']+10));
					$rtntext['type']='true';
					$rtntext['content']='Correct';

				} else {
					$this->session->set_userdata('score_ans',($form_data['answred']+1));
					$rtntext['type']='false';
					$rtntext['content']='Wrong';
				}
			} elseif ($form_data['question_option']=='9'){
				$qview_option='qView_option_'.$form_data['question_option'];
				if(!empty($questions_next))
					$html=$this->$qview_option($questions_next[0],$grade_id,$subject_id,$topic_id,$start);
				if(empty($html)){
					$html='';
				}
				//echo $html; exit();
				$rtntext['html']=$html;
				if(strtolower($form_data_ans['ans_textbox'])==strtolower($form_data['option_1'])){
					$this->session->set_userdata('score_ans',($form_data['answred']+1));
					$this->session->set_userdata('score_smart',($form_data['score']+10));
					$rtntext['type']='true';
					$rtntext['content']='Correct';
				} else{
					$this->session->set_userdata('score_ans',($form_data['answred']+1));
					$rtntext['type']='false';
					$rtntext['content']='Wrong: Correct answer is : '.$form_data_ans['ans_textbox'];
				}
			} elseif($form_data['question_option']=='11'){
				$qview_option='qView_option_'.$form_data['question_option'];
				if(!empty($questions_next))
					$html=$this->$qview_option($questions_next[0],$grade_id,$subject_id,$topic_id,$start);
				if(empty($html)){
					$html='';
				}
				$rtntext['html']=$html;
				if(strtolower($form_data_ans['ans_textbox'])==strtolower($form_data['qAns_box'])){
					$this->session->set_userdata('score_ans',($form_data['answred']+1));
					$this->session->set_userdata('score_smart',($form_data['score']+10));
					$rtntext['type']='true';
					$rtntext['content']='Correct';

				} else{
					$this->session->set_userdata('score_ans',($form_data['answred']+1));
					$rtntext['type']='false';
					$rtntext['content']='Wrong: Correct answer is : '.$form_data_ans['ans_textbox'];
				}
			} elseif ($form_data['question_option']=='14'){
				$qview_option='qView_option_'.$form_data['question_option'];
				if(!empty($questions_next))
					$html=$this->$qview_option($questions_next[0],$grade_id,$subject_id,$topic_id,$start);
				if(empty($html)){
					$html='';
				}
				//echo $html; exit();
				$rtntext['html']=$html;
				if(strtolower($form_data_ans['ans_textbox'])==strtolower($form_data['option_1'])){
					$this->session->set_userdata('score_ans',($form_data['answred']+1));
					$this->session->set_userdata('score_smart',($form_data['score']+10));
					$rtntext['type']='true';
					$rtntext['content']='Correct';
				} else{
					$this->session->set_userdata('score_ans',($form_data['answred']+1));
					$rtntext['type']='false';
					$rtntext['content']='Wrong: Correct answer is : '.$form_data_ans['ans_textbox'];
				}
			} elseif ($form_data['question_option']=='15'){
				$qview_option='qView_option_'.$form_data['question_option'];
				//print_r($questions_next);
				if(!empty($questions_next)) {
					$html = $this->$qview_option( $questions_next[0], $grade_id, $subject_id, $topic_id, $start );
				} else {
					$html='';
				}
				$rtntext['html']=$html;
				if(strtolower($form_data_ans['answer'])==strtolower($form_data['img_answer'])){
					$this->session->set_userdata('score_ans',($form_data['answred']+1));
					$this->session->set_userdata('score_smart',($form_data['score']+10));
					$rtntext['type']='true';
					$rtntext['content']='Correct';

				} else {
					$this->session->set_userdata('score_ans',($form_data['answred']+1));
					$rtntext['type']='false';
					$rtntext['content']='Wrong: Correct answer is : '.$form_data_ans['answer'];
				}
			} elseif ($form_data['question_option']=='5'){
				$qview_option='qView_option_'.$form_data['question_option'];
				if(!empty($questions_next))
					$html=$this->$qview_option($questions_next[0],$grade_id,$subject_id,$topic_id,$start);
				if(empty($html)){
					$html='';
				}
				//echo $html; exit();
				$rtntext['html']=$html;
				if($form_data_ans['option_arrange']==$form_data['option_arrange']){
					$this->session->set_userdata('score_ans',($form_data['answred']+1));
					$this->session->set_userdata('score_smart',($form_data['score']+10));
					$rtntext['type']='true';
					$rtntext['content']='Correct';
				} else{
					$this->session->set_userdata('score_ans',($form_data['answred']+1));
					$rtntext['type']='false';
					$rtntext['content']='Wrong: Correct answer is : '.$form_data_ans['ans_textbox'];
				}
			} elseif ($form_data['question_option']=='13'){
				$qview_option='qView_option_'.$form_data['question_option'];
				if(!empty($questions_next))
					$html=$this->$qview_option($questions_next[0],$grade_id,$subject_id,$topic_id,$start);
				if(empty($html)){
					$html='';
				}
				//echo $html; exit();
				$rtntext['html']=$html;
				if(strtolower($form_data_ans['ans_textbox'])==strtolower($form_data['option_1'])){
					$this->session->set_userdata('score_ans',($form_data['answred']+1));
					$this->session->set_userdata('score_smart',($form_data['score']+10));
					$rtntext['type']='true';
					$rtntext['content']='Correct';
				} else{
					$this->session->set_userdata('score_ans',($form_data['answred']+1));
					$rtntext['type']='false';
					$rtntext['content']='Wrong: Correct answer is : '.$form_data_ans['ans_textbox'];
				}
			} elseif ($form_data['question_option']=='20'){
				$qview_option='qView_option_'.$form_data['question_option'];
				if(!empty($questions_next))
					$html=$this->$qview_option($questions_next[0],$grade_id,$subject_id,$topic_id,$start);
				if(empty($html)){
					$html='';
				}
				//echo $html; exit();
				$rtntext['html']=$html;
				if(strtolower($form_data_ans['ans_textbox'])==strtolower($form_data['option_1'])){
					$this->session->set_userdata('score_ans',($form_data['answred']+1));
					$this->session->set_userdata('score_smart',($form_data['score']+10));
					$rtntext['type']='true';
					$rtntext['content']='Correct';
				} else{
					$this->session->set_userdata('score_ans',($form_data['answred']+1));
					$rtntext['type']='false';
					$rtntext['content']='Wrong: Correct answer is : '.$form_data_ans['ans_textbox'];
				}
			}

		}
		echo json_encode($rtntext);
	}

	function upload_images_and_options(){
		$img_array = array();
		$files = $_FILES;
		$filesCount = count($_FILES['upload_images']['name']);
		for($i = 0; $i < $filesCount; $i++){
			$_FILES['upload_images']['name']     = $files['upload_images']['name'][$i];
			$_FILES['upload_images']['type']     = $files['upload_images']['type'][$i];
			$_FILES['upload_images']['tmp_name'] = $files['upload_images']['tmp_name'][$i];
			$_FILES['upload_images']['error']     = $files['upload_images']['error'][$i];
			$_FILES['upload_images']['size']     = $files['upload_images']['size'][$i];
			$img_path = image_upload( $_FILES, 'upload_images', 'uploads/images' );
			array_push($img_array, $img_path);
		}
		//$img_array_json = json_encode($img_array);
		$uploaded_images_forms = '';
		$uploaded_images_forms .= '<div class="row"><div class="col-lg-12"><label>Choose correct answer</label></div></div>';
		$uploaded_images_forms .= '<div class="row">';
		foreach($img_array as $img) {
			$reversedParts = explode('/', strrev($img), 2);
			$img_name = strrev($reversedParts[0]);
			$uploaded_images_forms .= '<div class="col-lg-3"><div class="form-group">';
			$uploaded_images_forms .= '<img src="' .$img.'" style="max-width: 100%;width: 263px;height: 150px;" />';
			$uploaded_images_forms .= '<div style="text-align: center; margin: 5px 0 10px 0;"><input type="radio" name="answer" value="' .$img_name.'"></div>';
			$uploaded_images_forms .= '</div></div>';
		}
		$uploaded_images_forms .= '<input type="hidden" name="img_array" value="'.implode('|',$img_array).'"></div>';
		echo $uploaded_images_forms;
	}

	function SelectMultibleImages(){
		$img_array = array();
		$files = $_FILES;
		$filesCount = count($_FILES['upload_images']['name']);
		for($i = 0; $i < $filesCount; $i++){
			$_FILES['upload_images']['name']     = $files['upload_images']['name'][$i];
			$_FILES['upload_images']['type']     = $files['upload_images']['type'][$i];
			$_FILES['upload_images']['tmp_name'] = $files['upload_images']['tmp_name'][$i];
			$_FILES['upload_images']['error']     = $files['upload_images']['error'][$i];
			$_FILES['upload_images']['size']     = $files['upload_images']['size'][$i];
			$img_path = image_upload( $_FILES, 'upload_images', 'uploads/images' );
			array_push($img_array, $img_path);
		}
		//$img_array_json = json_encode($img_array);
		$uploaded_images_forms = '';
		$uploaded_images_forms .= '<div class="row"><div class="col-lg-12"><label>Choose correct answers</label></div></div>';
		$uploaded_images_forms .= '<div class="row">';
		foreach($img_array as $img) {
			$reversedParts = explode('/', strrev($img), 2);
			$img_name = strrev($reversedParts[0]);
			$uploaded_images_forms .= '<div class="col-lg-3"><div class="form-group">';
			$uploaded_images_forms .= '<label><img src="' .$img.'" style="max-width: 100%;width: 263px;height: 150px;" />';
			$uploaded_images_forms .= '<div style="text-align: center; margin: 5px 0 10px 0;"><input type="checkbox" name="answer[]" value="' .$img_name.'"></div></label>';
			$uploaded_images_forms .= '</div></div>';
		}
		$uploaded_images_forms .= '<input type="hidden" name="img_array" value="'.implode('|',$img_array).'"></div>';
		echo $uploaded_images_forms;
	}

	public function qView_option_1($data,$grade_id,$subject_id,$topic_id,$start){
		$rtntext='';
		$start=$start+1;
		$rtntext.='<input type="hidden" name="start" value="'.$start.'" />
                            <input type="hidden" name="grade_id" value="'.$grade_id.'" />
                            <input type="hidden" name="subject_id" value="'.$subject_id.'" />
                            <input type="hidden" name="topic_id" value="'.$topic_id.'" />';
		$rtntext.='<div class="row">';
		$rtntext.='<input type="hidden" class="question_id" name="question_id" value="'.$data->question_id.'">
                                <div class="col-lg-5">
                                    <div class="question_count">Question <i class="fas fa-volume-up"></i></div>
                                    <div class="question_display">'.$data->question_name.'</div>
                                </div>';
		$rtntext.='<div class="col-lg-7">';
		$form_serializedata=unserialize($data->form_data);
		$rtntext.='<input type="hidden" name="question_option" value="'.$form_serializedata['question_option'].'">';
		$rtntext.='<div class="question_image">
                                            <img src="'.$form_serializedata['img'].'" alt="">
                                        </div>
                                        <div class="qAns_box">
                                            <p>Answer: </p><span><input type="text" name="qAns_box" class="form-control"></span>
                                        </div>';
		$rtntext.='<input type="submit" value="Submit" class="btn btn-small btn-outline-default qSubmit">';
		$rtntext.='</div>';
		$rtntext.='</div>';

		return $rtntext;
	}
	public function qView_option_2($data,$grade_id,$subject_id,$topic_id,$start){
		$rtntext='';
		$start=$start+1;
		$rtntext.='<input type="hidden" name="start" value="'.$start.'" />
                            <input type="hidden" name="grade_id" value="'.$grade_id.'" />
                            <input type="hidden" name="subject_id" value="'.$subject_id.'" />
                            <input type="hidden" name="topic_id" value="'.$topic_id.'" />';
		$rtntext.='<div class="row">';
		$rtntext.='<input type="hidden" class="question_id" name="question_id" value="'.$data->question_id.'">
                                <div class="col-lg-5">
                                    <div class="question_count">Question <i class="fas fa-volume-up"></i></div>
                                    <div class="question_display">'.$data->question_name.'</div>
                                </div>';
		$rtntext.='<div class="col-lg-7">';
		$form_serializedata=unserialize($data->form_data);
		$img_array = explode('|',$form_serializedata['img_array']);
		$rtntext.='<input type="hidden" name="question_option" value="'.$form_serializedata['question_option'].'">';
		//$rtntext.='<input type="hidden" name="qAns_box" value="'.$form_serializedata['answer'].'">';
		if(!empty($img_array)){
			$rtntext.='<div class="row">';
			$rtntext.='<input id="img_answer" type="hidden" name="img_answer" value="">';
			$i = 1;
			foreach($img_array as $img){
				$reversedParts = explode('/', strrev($img), 2);
				$img_name = strrev($reversedParts[0]);

				$rtntext.='<div class="col-lg-6">';
				$rtntext.='<div class="form-group">';
				$rtntext.='<div class="imgselector">';
				//$rtntext.='<input id="img_'.$i.'" type="radio" name="answer" value="'.$img_name.'" autocomplete="off">';
				$rtntext.='<label for="img_'.$i.'">';
				$rtntext.='<img data-img_name="'.$img_name.'"src="'.$img.'" class="img-thumbnail" style="max-width: 100%;width: auto;height: 150px;">';
				$rtntext.='</label>';
				$rtntext.='</div>';
				$rtntext.='</div>';
				$rtntext.='</div>';
				$i++;
			}
			$rtntext.='</div>';
		}
		$rtntext.='<input type="submit" value="Submit" class="btn btn-small btn-outline-default qSubmit">';
		$rtntext.='</div>';
		$rtntext.='</div>';

		return $rtntext;
	}
	public function qView_option_3($data,$grade_id,$subject_id,$topic_id,$start){
		$rtntext='';
		$start=$start+1;
		$rtntext.='<input type="hidden" name="start" value="'.$start.'" />
                            <input type="hidden" name="grade_id" value="'.$grade_id.'" />
                            <input type="hidden" name="subject_id" value="'.$subject_id.'" />
                            <input type="hidden" name="topic_id" value="'.$topic_id.'" />';
		$rtntext.='<div class="row">';
		$rtntext.='<input type="hidden" class="question_id" name="question_id" value="'.$data->question_id.'">
                                <div class="col-lg-5">
                                    <div class="question_count">Question <i class="fas fa-volume-up"></i></div>
                                    <div class="question_display">'.$data->question_name.'</div>
                                </div>';
		$rtntext.='<div class="col-lg-7">';
		$form_serializedata=unserialize($data->form_data);
		$rtntext.='<input type="hidden" name="question_option" value="'.$form_serializedata['question_option'].'">';
		$rtntext.='<div class="option_list_d onlyclickable">';
		$option_counter=1;
		foreach ($form_serializedata['option_1'] as $option){
			$rtntext.='<div class="inputGroup">
                           <input id="radio'.$option_counter.'" name="option_1" value="'. $option.'" type="radio"/>
                            <label for="radio'.$option_counter.'">'.$option.'</label>
                        </div>';
			$option_counter++;
		}
		$rtntext.='</div>';
		$rtntext.='<input type="submit" value="Submit" class="btn btn-small btn-outline-default qSubmit">';
		$rtntext.='</div>';
		$rtntext.='</div>';

		return $rtntext;
	}
	public function qView_option_5($data,$grade_id,$subject_id,$topic_id,$start){
		$rtntext='';
		$start=$start+1;
		$rtntext.='<input type="hidden" name="start" value="'.$start.'" />
                            <input type="hidden" name="grade_id" value="'.$grade_id.'" />
                            <input type="hidden" name="subject_id" value="'.$subject_id.'" />
                            <input type="hidden" name="topic_id" value="'.$topic_id.'" />';
		$rtntext.='<div class="row">';
		$rtntext.='<input type="hidden" class="question_id" name="question_id" value="'.$data->question_id.'">
                                <div class="col-lg-5">
                                    <div class="question_count">Question <i class="fas fa-volume-up"></i></div>
                                    <div class="question_display">'.$data->question_name.'</div>
                                </div>';
		$rtntext.='<div class="col-lg-7">';
		$form_serializedata=unserialize($data->form_data);
		$rtntext.='<input type="hidden" name="question_option" value="'.$form_serializedata['question_option'].'">';
		$rtntext.='<div class="option_list_d onlyclickable" id="sortable">';
		$option_counter=1;
		foreach ($form_serializedata['option_dearrange'] as $option){
			$rtntext.='<div class="inputGroup">
                            <label>'.$option.'</label>
                            <input type="hidden" name="option_arrange[]" value="'.$option.'"/>
                        </div>';
			$option_counter++;
		}
		$rtntext.='</div>';
		$rtntext.='<input type="submit" value="Submit" class="btn btn-small btn-outline-default qSubmit">';
		$rtntext.='</div>';
		$rtntext.='</div>';

		return $rtntext;
	}
	public function qView_option_6($data,$grade_id,$subject_id,$topic_id,$start){
		$rtntext='';
		$start=$start+1;
		$rtntext.='<input type="hidden" name="start" value="'.$start.'" />
                            <input type="hidden" name="grade_id" value="'.$grade_id.'" />
                            <input type="hidden" name="subject_id" value="'.$subject_id.'" />
                            <input type="hidden" name="topic_id" value="'.$topic_id.'" />';
		$rtntext.='<div class="row">';
		$rtntext.='<input type="hidden" class="question_id" name="question_id" value="'.$data->question_id.'">
                                <div class="col-lg-5">
                                    <div class="question_count">Question <i class="fas fa-volume-up"></i></div>
                                    <div class="question_display">'.$data->question_name.'</div>
                                </div>';
		$rtntext.='<div class="col-lg-7">';
		$form_serializedata=unserialize($data->form_data);
		$rtntext.='<input type="hidden" name="question_option" value="'.$form_serializedata['question_option'].'">';
		$rtntext.='<div class="option_list_d onlyclickable">';
		$option_counter=1;
		foreach ($form_serializedata['option_1'] as $option){
			$rtntext.='<div class="inputGroup">
                           <input id="radio'.$option_counter.'" name="option_1" value="'. $option.'" type="radio"/>
                            <label for="radio'.$option_counter.'">'.$option.'</label>
                        </div>';
			$option_counter++;
		}
		$rtntext.='</div>';
		$rtntext.='<input type="submit" value="Submit" class="btn btn-small btn-outline-default qSubmit">';
		$rtntext.='</div>';
		$rtntext.='</div>';

		return $rtntext;
	}
	public function qView_option_8($data,$grade_id,$subject_id,$topic_id,$start){
		$rtntext='';
		$start=$start+1;
		$rtntext.='<input type="hidden" name="start" value="'.$start.'" />
                            <input type="hidden" name="grade_id" value="'.$grade_id.'" />
                            <input type="hidden" name="subject_id" value="'.$subject_id.'" />
                            <input type="hidden" name="topic_id" value="'.$topic_id.'" />';
		$rtntext.='<div class="row">';
		$rtntext.='<input type="hidden" class="question_id" name="question_id" value="'.$data->question_id.'">
                                <div class="col-lg-5">
                                    <div class="question_count">Question <i class="fas fa-volume-up"></i></div>
                                    <div class="question_display">'.$data->question_name.'</div>
                                </div>';
		$rtntext.='<div class="col-lg-7">';
		$form_serializedata=unserialize($data->form_data);
		$img_array = explode('|',$form_serializedata['img_array']);
		$rtntext.='<input type="hidden" name="question_option" value="'.$form_serializedata['question_option'].'">';
		//$rtntext.='<input type="hidden" name="qAns_box" value="'.$form_serializedata['answer'].'">';
		if(!empty($img_array)){
			$rtntext.='<div class="row">';
			$rtntext.='<input id="img_answer" type="hidden" name="img_answer" value="">';
			$i = 1;
			foreach($img_array as $img){
				$reversedParts = explode('/', strrev($img), 2);
				$img_name = strrev($reversedParts[0]);

				$rtntext.='<div class="col-lg-6">';
				$rtntext.='<div class="form-group">';
				$rtntext.='<div class="imgselectorMultiple">';
				//$rtntext.='<input id="img_'.$i.'" type="radio" name="answer" value="'.$img_name.'" autocomplete="off">';
				$rtntext.='<label for="img_'.$i.'">';
				$rtntext.='<img data-img_name="'.$img_name.'"src="'.$img.'" class="img-thumbnail" style="max-width: 100%;width: auto;height: 150px;">';
				$rtntext.='</label>';
				$rtntext.='</div>';
				$rtntext.='</div>';
				$rtntext.='</div>';
				$i++;
			}
			$rtntext.='</div>';
		}
		$rtntext.='<input type="submit" value="Submit" class="btn btn-small btn-outline-default qSubmit">';
		$rtntext.='</div>';
		$rtntext.='</div>';

		return $rtntext;
	}
	public function qView_option_9($data,$grade_id,$subject_id,$topic_id,$start){
		$rtntext='';
		$start=$start+1;
		$rtntext.='<input type="hidden" name="start" value="'.$start.'" />
                            <input type="hidden" name="grade_id" value="'.$grade_id.'" />
                            <input type="hidden" name="subject_id" value="'.$subject_id.'" />
                            <input type="hidden" name="topic_id" value="'.$topic_id.'" />';
		$rtntext.='<div class="row">';
		$rtntext.='<input type="hidden" class="question_id" name="question_id" value="'.$data->question_id.'">
                                <div class="col-lg-5">
                                    <div class="question_count">Question <i class="fas fa-volume-up"></i></div>
                                    <div class="question_display">'.$data->question_name.'</div>
                                </div>';
		$rtntext.='<div class="col-lg-7">';
		$form_serializedata=unserialize($data->form_data);
		$rtntext.='<input type="hidden" name="question_option" value="'.$form_serializedata['question_option'].'">';
		$rtntext.='<div class="option_list_d">';
		$option_counter=1;
		foreach ($form_serializedata['option_1'] as $option){
			$rtntext.='<div class="inputGroup">
                           <input id="radio'.$option_counter.'" name="option_1" value="'. $option.'" type="radio"/>
                            <label for="radio'.$option_counter.'">'.$option.'</label>
                        </div>';
			$option_counter++;
			                                 }
		$rtntext.='</div>';
		$rtntext.='<input type="submit" value="Submit" class="btn btn-small btn-outline-default qSubmit">';
		$rtntext.='</div>';
		$rtntext.='</div>';

		return $rtntext;
	}
	public function qView_option_11($data,$grade_id,$subject_id,$topic_id,$start){
		$rtntext='';
		$start=$start+1;
		$rtntext.='<input type="hidden" name="start" value="'.$start.'" />
                            <input type="hidden" name="grade_id" value="'.$grade_id.'" />
                            <input type="hidden" name="subject_id" value="'.$subject_id.'" />
                            <input type="hidden" name="topic_id" value="'.$topic_id.'" />';
		$rtntext.='<div class="row">';
		$rtntext.='<input type="hidden" class="question_id" name="question_id" value="'.$data->question_id.'">
                                <div class="col-lg-5">
                                    <div class="question_count">Question <i class="fas fa-volume-up"></i></div>
                                    <div class="question_display">'.$data->question_name.'</div>
                                </div>';
		$rtntext.='<div class="col-lg-7">';
		$form_serializedata=unserialize($data->form_data);
		$rtntext.='<input type="hidden" name="question_option" value="'.$form_serializedata['question_option'].'">';
		$rtntext.='<div class="qAns_box">
                        <p>Answer: </p><span><input type="text" name="qAns_box" class="form-control"></span>
                    </div>';
		$rtntext.='<input type="submit" value="Submit" class="btn btn-small btn-outline-default qSubmit">';
		$rtntext.='</div>';
		$rtntext.='</div>';

		return $rtntext;
	}
	public function qView_option_13($data,$grade_id,$subject_id,$topic_id,$start){
		$rtntext='';
		$start=$start+1;
		$rtntext.='<input type="hidden" name="start" value="'.$start.'" />
                            <input type="hidden" name="grade_id" value="'.$grade_id.'" />
                            <input type="hidden" name="subject_id" value="'.$subject_id.'" />
                            <input type="hidden" name="topic_id" value="'.$topic_id.'" />';
		$rtntext.='<div class="row">';
		$rtntext.='<input type="hidden" class="question_id" name="question_id" value="'.$data->question_id.'">
                                <div class="col-lg-5">
                                    <div class="question_count">Question <i class="fas fa-volume-up"></i></div>
                                    <div class="question_display">'.$data->question_name.'</div>
                                </div>';
		$rtntext.='<div class="col-lg-7">';
		$form_serializedata=unserialize($data->form_data);
		$rtntext.='<input type="hidden" name="question_option" value="'.$form_serializedata['question_option'].'">';
		$rtntext.='<div class="option_list_d">';
		$option_counter=1;
		foreach ($form_serializedata['option_1'] as $option){
			$rtntext.='<div class="inputGroup">
                           <input id="radio'.$option_counter.'" name="option_1" value="'. $option.'" type="radio"/>
                            <label for="radio'.$option_counter.'">'.$option.'</label>
                        </div>';
			$option_counter++;
		}
		$rtntext.='<div class="form-group"><textarea class="form-control" style="width: 68%; height: 150px;" name="13_textbox"></textarea></div>';
		$rtntext.='</div>';
		$rtntext.='<input type="submit" value="Submit" class="btn btn-small btn-outline-default qSubmit">';
		$rtntext.='</div>';
		$rtntext.='</div>';

		return $rtntext;
	}
	public function qView_option_14($data,$grade_id,$subject_id,$topic_id,$start){
		$rtntext='';
		$start=$start+1;
		$rtntext.='<input type="hidden" name="start" value="'.$start.'" />
                            <input type="hidden" name="grade_id" value="'.$grade_id.'" />
                            <input type="hidden" name="subject_id" value="'.$subject_id.'" />
                            <input type="hidden" name="topic_id" value="'.$topic_id.'" />';
		$rtntext.='<div class="row">';
		$rtntext.='<input type="hidden" class="question_id" name="question_id" value="'.$data->question_id.'">
                                <div class="col-lg-5">
                                    <div class="question_count">Question <i class="fas fa-volume-up"></i></div>
                                    <div class="question_display">'.$data->question_name.'</div>
                                </div>';
		$rtntext.='<div class="col-lg-7">';
		$form_serializedata=unserialize($data->form_data);
		$rtntext.='<input type="hidden" name="question_option" value="'.$form_serializedata['question_option'].'">';
		$rtntext.='<div class="option_list_d">';
		$option_counter=1;
		foreach ($form_serializedata['option_1'] as $option){
			$rtntext.='<div class="inputGroup">
                           <input id="radio'.$option_counter.'" name="option_1" value="'. $option.'" type="radio"/>
                            <label for="radio'.$option_counter.'">'.$option.'</label>
                        </div>';
			$option_counter++;
		}
		$rtntext.='</div>';
		$rtntext.='<input type="submit" value="Submit" class="btn btn-small btn-outline-default qSubmit">';
		$rtntext.='</div>';
		$rtntext.='</div>';

		return $rtntext;
	}
	public function qView_option_15($data,$grade_id,$subject_id,$topic_id,$start){
		$rtntext='';
		$start=$start+1;
		$rtntext.='<input type="hidden" name="start" value="'.$start.'" />
                            <input type="hidden" name="grade_id" value="'.$grade_id.'" />
                            <input type="hidden" name="subject_id" value="'.$subject_id.'" />
                            <input type="hidden" name="topic_id" value="'.$topic_id.'" />';
		$rtntext.='<div class="row">';
		$rtntext.='<input type="hidden" class="question_id" name="question_id" value="'.$data->question_id.'">
                                <div class="col-lg-5">
                                    <div class="question_count">Question <i class="fas fa-volume-up"></i></div>
                                    <div class="question_display">'.$data->question_name.'</div>
                                </div>';
		$rtntext.='<div class="col-lg-7">';
		$form_serializedata=unserialize($data->form_data);
		$img_array = explode('|',$form_serializedata['img_array']);
		$rtntext.='<input type="hidden" name="question_option" value="'.$form_serializedata['question_option'].'">';
		//$rtntext.='<input type="hidden" name="qAns_box" value="'.$form_serializedata['answer'].'">';
		if(!empty($img_array)){
			$rtntext.='<div class="row">';
			$rtntext.='<input id="img_answer" type="hidden" name="img_answer" value="">';
			$i = 1;
			foreach($img_array as $img){
				$reversedParts = explode('/', strrev($img), 2);
				$img_name = strrev($reversedParts[0]);

				$rtntext.='<div class="col-lg-6">';
				$rtntext.='<div class="form-group">';
				$rtntext.='<div class="imgselector">';
				//$rtntext.='<input id="img_'.$i.'" type="radio" name="answer" value="'.$img_name.'" autocomplete="off">';
				$rtntext.='<label for="img_'.$i.'">';
				$rtntext.='<img data-img_name="'.$img_name.'"src="'.$img.'" class="img-thumbnail" style="max-width: 100%;width: auto;height: 150px;">';
				$rtntext.='</label>';
				$rtntext.='</div>';
				$rtntext.='</div>';
				$rtntext.='</div>';
				$i++;
			}
			$rtntext.='</div>';
		}
		$rtntext.='<input type="submit" value="Submit" class="btn btn-small btn-outline-default qSubmit">';
		$rtntext.='</div>';
		$rtntext.='</div>';

		return $rtntext;
	}


	public function qView_option_20($data,$grade_id,$subject_id,$topic_id,$start){
		$rtntext='';
		$start=$start+1;
		$rtntext.='<input type="hidden" name="start" value="'.$start.'" />
                            <input type="hidden" name="grade_id" value="'.$grade_id.'" />
                            <input type="hidden" name="subject_id" value="'.$subject_id.'" />
                            <input type="hidden" name="topic_id" value="'.$topic_id.'" />';
		$rtntext.='<div class="row">';
		$rtntext.='<input type="hidden" class="question_id" name="question_id" value="'.$data->question_id.'">
                                <div class="col-lg-5">
                                    <div class="question_count">Question <i class="fas fa-volume-up"></i></div>
                                    <div class="question_display">'.$data->question_name.'</div>
                                </div>';
		$rtntext.='<div class="col-lg-7">';
		$form_serializedata=unserialize($data->form_data);
		$rtntext.='<input type="hidden" name="question_option" value="'.$form_serializedata['question_option'].'">';
		$rtntext.='<div class="question_image">
                                            <img src="'.$form_serializedata['img'].'" alt="">
                                        </div>';
		$rtntext.='<div class="option_list_d onlyclickable">';
		$option_counter=1;
		foreach ($form_serializedata['option_1'] as $option){
			$rtntext.='<div class="inputGroup">
                           <input id="radio'.$option_counter.'" name="option_1" value="'. $option.'" type="radio"/>
                            <label for="radio'.$option_counter.'">'.$option.'</label>
                        </div>';
			$option_counter++;
		}
		$rtntext.='</div>';
		$rtntext.='<input type="submit" value="Submit" class="btn btn-small btn-outline-default qSubmit">';
		$rtntext.='</div>';
		$rtntext.='</div>';

		return $rtntext;
	}
}
