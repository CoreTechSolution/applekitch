<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {

	public function __construct(){

		parent::__construct();
		$this->load->model('ajax_model');
		$this->load->model('user_model');
		$this->load->model('admin_model');


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
    function edit_question(){
        $form_data=$_POST;
	    /*if(!empty($form_data)) {
		    $i = 0;
		    $error_input_names = array();
		    foreach ( $form_data as $key => $value ) {
			    if(empty($value) && $value == 0 && $key != 'question_id') {
				    $i++;
				    array_push($error_input_names, $key);
			    }
		    }
		    if(!empty($_FILES)) {
			    foreach ( $_FILES as $key => $value ) {
				    if(empty($_FILES[$key]['name'])) {
					    $i++;
					    array_push($error_input_names, $key);
				    }
			    }
		    }
		    if($i > 0) {
			    echo json_encode($error_input_names);
			    exit();
		    }
	    }*/
	    //print_r($form_data);
        $data['country_id']=$form_data['country_id'];
        $data['subject_id']=$form_data['subject_id'];
        $data['grade_id']=$form_data['grade_id'];
        $data['category_id']=$form_data['category_id'];
        $data['topic_id']=$form_data['topic_id'];
        $data['question_name']=$form_data['question'];
        $data['q_score']=$form_data['q_score'];
        $data['qWrong_feedback']=$form_data['qWrong_feedback'];
        unset($form_data['country_id']);
        unset($form_data['subject_id']);
        unset($form_data['grade_id']);
        unset($form_data['category_id']);
        unset($form_data['topic_id']);
        //print_r($_FILES);
        //exit();
        switch($form_data['question_option']){
            case '1':
                if ( ! empty( $_FILES['imageQ_upload']['name'] ) ) {
                    $img_path = image_upload( $_FILES, 'imageQ_upload', 'uploads/images' );
                    if ( $img_path ) {
                        $image_upload = $img_path;
                    } else {

                        $image_upload = '';
                    }
                    $form_data['img'] = $image_upload;
                } elseif (!empty($form_data['img'])){
                    $form_data['img']=$form_data['img'];
                }

                break;
            case '2':

                break;
            case '12':
	            /*if(!empty($form_data)) {
		            $i = 0;
		            $error_input_names = array();
		            if ( ! empty( $_FILES ) ) {
			            foreach ( $_FILES as $key => $value ) {
				            if ( empty( $_FILES[ $key ]['name'] ) ) {
					            $i ++;
					            array_push( $error_input_names, $key );
				            }
			            }
		            }
		            if ( $i > 0 ) {
			            echo json_encode( $error_input_names );
			            exit();
		            }
	            }*/
	            if ( ! empty( $_FILES['svgBoximg']['name'] ) ) {
		            $img_path = image_upload( $_FILES, 'svgBoximg', 'uploads/images' );
		            if ( $img_path ) {
			            $image_upload = $img_path;
		            } else {

			            $image_upload = '';
		            }
	            }
	            $form_data['img'] = $image_upload;
                break;
            case '20':
                if ( ! empty( $_FILES['imageQ_upload']['name'] ) ) {
                    $img_path = image_upload( $_FILES, 'imageQ_upload', 'uploads/images' );
                    if ( $img_path ) {
                        $image_upload = $img_path;
                    } else {

                        $image_upload = '';
                    }
                    $form_data['img'] = $image_upload;
                } elseif (!empty($form_data['img'])){
                    $form_data['img']=$form_data['img'];
                }

                break;
            case '26':
                if ( ! empty( $_FILES['imageQ_upload']['name'] ) ) {
                    $img_path = image_upload( $_FILES, 'imageQ_upload', 'uploads/images' );
                    if ( $img_path ) {
                        $image_upload = $img_path;
                    } else {

                        $image_upload = '';
                    }
                    $form_data['img'] = $image_upload;
                } elseif (!empty($form_data['img'])){
                    $form_data['img']=$form_data['img'];
                }

                break;

            case '28':
                if ( ! empty( $_FILES['imageQ_upload']['name'] ) ) {
                    $img_path = image_upload( $_FILES, 'imageQ_upload', 'uploads/images' );
                    if ( $img_path ) {
                        $image_upload = $img_path;
                    } else {

                        $image_upload = '';
                    }
                    $form_data['img'] = $image_upload;
                } elseif (!empty($form_data['img'])){
                    $form_data['img']=$form_data['img'];
                }

                break;
            case '29':
	            if ( ! empty( $_FILES['base_image']['name'] ) ) {
		            $img_path = image_upload( $_FILES, 'base_image', 'uploads/images' );
		            if ( $img_path ) {
			            $image_upload = $img_path;
		            } else {

			            $image_upload = '';
		            }
		            $form_data['base_image'] = $image_upload;
	            }
	            if ( ! empty( $_FILES['extra_image']['name'] ) ) {
		            $img_path = image_upload( $_FILES, 'extra_image', 'uploads/images' );
		            if ( $img_path ) {
			            $image_upload = $img_path;
		            } else {

			            $image_upload = '';
		            }
		            $form_data['extra_image'] = $image_upload;
	            }
            	break;
            case '31':
                $form_data['imgs']=$this->upload_multiple_img_path();

                break;
            case '33':
                $form_data['imgs']=$this->upload_multiple_img_path();

                break;
            case '32':
	            $ans_textbox = $form_data['ans_textbox1'];
	            $s = explode('[', $ans_textbox);
	            if(!empty($s)) {
		            $ans_textbox = array();
		            foreach ( $s as $sa ) {
			            if ( stripos( $sa, ']' ) ) {
				            $saa = explode( ']', $sa );
				            array_push($ans_textbox, $saa[0]);
			            }
		            }
		            $form_data['ans_textbox'] = $ans_textbox;
	            }
            	break;
            case '34':
                if ( ! empty( $_FILES['imageQ_upload']['name'] ) ) {
                    $img_path = image_upload( $_FILES, 'imageQ_upload', 'uploads/images' );
                    if ( $img_path ) {
                        $image_upload = $img_path;
                    } else {

                        $image_upload = '';
                    }
                    $form_data['img'] = $image_upload;
                } elseif (!empty($form_data['img'])){
                    $form_data['img']=$form_data['img'];
                }

                break;

            default:

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
	function save_question(){
		$form_data=$_POST;
		if(!empty($form_data)) {
			$i = 0;
			$error_input_names = array();
			foreach ( $form_data as $key => $value ) {
				if(empty($value) && $value == 0 && $key != 'question_id') {
					$i++;
					array_push($error_input_names, $key);
				}
			}
			if(!empty($_FILES)) {
				foreach ( $_FILES as $key => $value ) {
					if(empty($_FILES[$key]['name'])) {
						$i++;
						array_push($error_input_names, $key);
					}
				}
			}
			if($i > 0) {
				echo json_encode($error_input_names);
				exit();
			}
		}
		$data['country_id']=$form_data['country_id'];
		$data['subject_id']=$form_data['subject_id'];
		$data['grade_id']=$form_data['grade_id'];
		$data['category_id']=$form_data['category_id'];
		$data['topic_id']=$form_data['topic_id'];
		$data['question_name']=$form_data['question'];
        $data['q_score']=$form_data['q_score'];
        $data['qWrong_feedback']=$form_data['qWrong_feedback'];
		unset($form_data['country_id']);
		unset($form_data['subject_id']);
		unset($form_data['grade_id']);
		unset($form_data['category_id']);
		unset($form_data['topic_id']);
		//print_r($_FILES);
		//exit();
        if($form_data['question_option']=='31') {
            $form_data['imgs']=$this->upload_multiple_img_path();
        }
        if($form_data['question_option']=='33') {
            $form_data['imgs']=$this->upload_multiple_img_path();
        }
        if (!empty( $_FILES['imageQ_upload']['name'] ) ) {
            $img_path = image_upload( $_FILES, 'imageQ_upload', 'uploads/images' );
            if ( $img_path ) {
                $image_upload = $img_path;
            } else {

                $image_upload = '';
            }
            $form_data['img'] = $image_upload;
        }

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
		if($form_data['question_option']=='12') {
			if ( ! empty( $_FILES['svgBoximg']['name'] ) ) {
				$img_path = image_upload( $_FILES, 'svgBoximg', 'uploads/images' );
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
		if($form_data['question_option']=='26') {
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
		if($form_data['question_option']=='29') {
			if ( ! empty( $_FILES['base_image']['name'] ) ) {
				$img_path = image_upload( $_FILES, 'base_image', 'uploads/images' );
				if ( $img_path ) {
					$image_upload = $img_path;
				} else {

					$image_upload = '';
				}
				$form_data['base_image'] = $image_upload;
			}
			if ( ! empty( $_FILES['extra_image']['name'] ) ) {
				$img_path = image_upload( $_FILES, 'extra_image', 'uploads/images' );
				if ( $img_path ) {
					$image_upload = $img_path;
				} else {

					$image_upload = '';
				}
				$form_data['extra_image'] = $image_upload;
			}
		}
		if($form_data['question_option']=='32') {
			$ans_textbox = $form_data['ans_textbox1'];
			$s = explode('[', $ans_textbox);
			if(!empty($s)) {
				$ans_textbox = array();
				foreach ( $s as $sa ) {
					if ( stripos( $sa, ']' ) ) {
						$saa = explode( ']', $sa );
						array_push($ans_textbox, $saa[0]);
					}
				}
				$form_data['ans_textbox'] = $ans_textbox;
			}
		}
		if($form_data['question_option']=='35') {
			if ( ! empty( $_FILES['imageQ_bg_upload']['name'] ) ) {
				$img_path = image_upload( $_FILES, 'imageQ_bg_upload', 'uploads/images' );
				if ( $img_path ) {
					$image_upload = $img_path;
				} else {

					$image_upload = '';
				}
				$form_data['imageQ_bg_upload'] = $image_upload;
			}
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
    public function get_topic_slug_ajax(){
        $slug_text=$_POST['slug'];
        if(!empty($slug_text)){
            $i=1;
            while ($i==1) {
                $slug=array('slug'=>$slug_text);
                $rtn_slug=$this->ajax_model->get_slug($slug,'topics');
                if($rtn_slug==true){
                    $slug_text=$slug_text.'-1';
                } else{
                    echo $slug_text;
                    break;
                }
            }

        } else{
            echo '';
        }
    }
    public function get_work_sub_slug_ajax(){
        $slug_text=$_POST['slug'];
        if(!empty($slug_text)){
            $i=1;
            while ($i==1) {
                $slug=array('slug'=>$slug_text);
                $rtn_slug=$this->ajax_model->get_slug($slug,'work_subjects');
                if($rtn_slug==true){
                    $slug_text=$slug_text.'-1';
                } else{
                    echo $slug_text;
                    break;
                }
            }

        } else{
            echo '';
        }
    }
    public function get_work_grade_slug_ajax(){
        $slug_text=$_POST['slug'];
        if(!empty($slug_text)){
            $i=1;
            while ($i==1) {
                $slug=array('slug'=>$slug_text);
                $rtn_slug=$this->ajax_model->get_slug($slug,'work_grades');
                if($rtn_slug==true){
                    $slug_text=$slug_text.'-1';
                } else{
                    echo $slug_text;
                    break;
                }
            }

        } else{
            echo '';
        }
    }
    public function get_work_cat_slug_ajax(){
        $slug_text=$_POST['slug'];
        if(!empty($slug_text)){
            $i=1;
            while ($i==1) {
                $slug=array('slug'=>$slug_text);
                $rtn_slug=$this->ajax_model->get_slug($slug,'work_categories');
                if($rtn_slug==true){
                    $slug_text=$slug_text.'-1';
                } else{
                    echo $slug_text;
                    break;
                }
            }

        } else{
            echo '';
        }
    }
    public function get_work_topic_slug_ajax(){
        $slug_text=$_POST['slug'];
        if(!empty($slug_text)){
            $i=1;
            while ($i==1) {
                $slug=array('slug'=>$slug_text);
                $rtn_slug=$this->ajax_model->get_slug($slug,'work_topics');
                if($rtn_slug==true){
                    $slug_text=$slug_text.'-1';
                } else{
                    echo $slug_text;
                    break;
                }
            }

        } else{
            echo '';
        }
    }
    public function get_worksheet_slug_ajax(){
        $slug_text=$_POST['slug'];
        if(!empty($slug_text)){
            $i=1;
            while ($i==1) {
                $slug=array('slug'=>$slug_text);
                $rtn_slug=$this->ajax_model->get_slug($slug,'worksheets');
                if($rtn_slug==true){
                    $slug_text=$slug_text.'-1';
                } else{
                    echo $slug_text;
                    break;
                }
            }

        } else{
            echo '';
        }
    }
    public function get_sub_wise_grade(){
        $id=$_POST['id'];
        $table=$_POST['table'];
        $grade_id=(!empty($_POST['grade_id']))? $_POST['grade_id'] : 0;
        //print_r($_POST); 
        $rtns=array();
        if(!empty($id)){
            $rtns=$this->ajax_model->get_sub_wise_grade($id,$table,$grade_id);
        }
        $rtntext='';
        if(!empty($rtns)){
            foreach ($rtns as $rtn){
                $rtntext.='<option value='.$rtn->id.'>'.$rtn->name.'</option>';
            }
        }
        
        echo $rtntext;
    }

    public function  get_categories(){
	    $rtn='';
	    $subject_id=$_POST['subject_ids'];
	    $grade_id=$_POST['grade_ids'];
	    $single=$_POST['single'];
	    $categories=$this->ajax_model->get_categories(array('work_subject_id'=>$subject_id,'work_grade_id'=>$grade_id));
	    if(!empty($categories)){
	        foreach ($categories as $category){
	            if($single=='1'){
                    $rtn.='<li><a id="search_click_c_'.$category->id.'" href="'.base_url('worksheets?type=cat&id='.$category->id).'" class="category_li_side">'.$category->name.'</a></li>';
                } else{
	                $rtn.='<li><a id="search_click_c_'.$category->id.'" href="javascript:void(0)" onclick="search_id_genarate('."'category'".','.$category->id.','."'this.id'".')" class="category_li_side">'. $category->name.'</a></li>';
                }

            }
        }
	    echo $rtn;
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
            $id_not_in=$form_data['id_not_in'];
            if(!empty($id_not_in)) {
                $ids_not_in = explode(',', $id_not_in);
                //print_r($ids_not_in); exit();
            } else{
                $ids_not_in=array();
            }
            //print_r($form_data); exit();
            $conditions=array('question_id'=>$question_id);
            $questions=$this->ajax_model->get_questions($conditions,true);
            $form_data_ans=unserialize($questions->form_data);
            $ids_in=explode(',',$this->session->userdata('q_id_array'));
            $questions_next=$this->ajax_model->get_questions_by_one(array('grade_id'=>$grade_id,'subject_id'=>$subject_id,'topic_id'=>$topic_id),false,$start,$ids_not_in,$ids_in);
            $your_ans='';
            $correct_ans='';
            $html='';

            //print_r($question_form_data);exit);
            //print_r($questions_next);


            if ($form_data['question_option'] == '1') {

                if (!empty($questions_next)) {
                    $question_form_data = unserialize($questions_next[0]->form_data);
                    $qview_option = 'qView_option_' . $question_form_data['question_option'];
                    $html = $this->$qview_option($questions_next[0], $grade_id, $subject_id, $topic_id, $start,$questions_next[0]->question_id);
                }
                if (empty($html)) {
                    $html = '';
                }
                $rtntext['html'] = $html;
                $your_ans = $form_data['qAns_box'];
                $correct_ans = $form_data_ans['ans_textbox'];
                if (strtolower($correct_ans) == strtolower($your_ans)) {
                    $this->session->set_userdata('score_ans', ($form_data['answred'] + 1));
                    $this->session->set_userdata('score_smart', ($form_data['score'] + $questions->q_score));
                    $rtntext['score_ans'] = $this->session->userdata('score_ans');
                    $rtntext['score_smart'] = $this->session->userdata('score_smart');
                    $rtntext['type'] = 'true';
                    $rtntext['content'] = 'Correct';

                } else {
                    $this->session->set_userdata('score_ans', ($form_data['answred'] + 1));
                    $rtntext['score_ans'] = $this->session->userdata('score_ans');
                    $rtntext['type'] = 'false';
                    $rtntext['content'] = 'Wrong: Correct answer is : ' . $correct_ans;
                }
            } elseif ($form_data['question_option'] == '2') {

                //print_r($form_data_ans);
                if (!empty($questions_next)) {
                    $question_form_data = unserialize($questions_next[0]->form_data);
                    $qview_option = 'qView_option_' . $question_form_data['question_option'];
                    $html = $this->$qview_option($questions_next[0], $grade_id, $subject_id, $topic_id, $start,$questions_next[0]->question_id);
                } else {
                    $html = '';
                }
                $rtntext['html'] = $html;
                $your_ans = $form_data['img_answer'];
                $correct_ans = $form_data_ans['answer'];
                if (strtolower($correct_ans) == strtolower($your_ans)) {
                    $this->session->set_userdata('score_ans', ($form_data['answred'] + 1));
                    $this->session->set_userdata('score_smart', ($form_data['score'] + $questions->q_score));
                    $rtntext['score_ans'] = $this->session->userdata('score_ans');
                    $rtntext['score_smart'] = $this->session->userdata('score_smart');
                    $rtntext['type'] = 'true';
                    $rtntext['content'] = 'Correct';

                } else {
                    $this->session->set_userdata('score_ans', ($form_data['answred'] + 1));
                    $rtntext['score_ans'] = $this->session->userdata('score_ans');
                    $rtntext['type'] = 'false';
                    $rtntext['content'] = 'Wrong: Correct answer is : ' . $form_data_ans['answer'];
                }
            } elseif ($form_data['question_option'] == '3') {

                if (!empty($questions_next)) {
                    $question_form_data = unserialize($questions_next[0]->form_data);
                    $qview_option = 'qView_option_' . $question_form_data['question_option'];
                    $html = $this->$qview_option($questions_next[0], $grade_id, $subject_id, $topic_id, $start,$questions_next[0]->question_id);
                }
                if (empty($html)) {
                    $html = '';
                }
                //echo $html; exit();
                $rtntext['html'] = $html;
                $your_ans = $form_data['option_1'];
                $correct_ans = $form_data_ans['ans_textbox'];
                if (strtolower($correct_ans) == strtolower($your_ans)) {
                    $this->session->set_userdata('score_ans', ($form_data['answred'] + 1));
                    $this->session->set_userdata('score_smart', ($form_data['score'] + $questions->q_score));
                    $rtntext['score_ans'] = $this->session->userdata('score_ans');
                    $rtntext['score_smart'] = $this->session->userdata('score_smart');
                    $rtntext['type'] = 'true';
                    $rtntext['content'] = 'Correct';
                } else {
                    $this->session->set_userdata('score_ans', ($form_data['answred'] + 1));
                    $rtntext['score_ans'] = $this->session->userdata('score_ans');
                    $rtntext['type'] = 'false';
                    $rtntext['content'] = 'Wrong: Correct answer is : ' . $correct_ans;
                }
            } elseif ($form_data['question_option'] == '6') {

                if (!empty($questions_next)) {
                    $question_form_data = unserialize($questions_next[0]->form_data);
                    $qview_option = 'qView_option_' . $question_form_data['question_option'];
                    $html = $this->$qview_option($questions_next[0], $grade_id, $subject_id, $topic_id, $start,$questions_next[0]->question_id);
                }
                if (empty($html)) {
                    $html = '';
                }
                //echo $html; exit();
                $rtntext['html'] = $html;
                $your_ans = $form_data['option_1'];
                $correct_ans = $form_data_ans['ans_textbox'];
                if (strtolower($correct_ans) == strtolower($your_ans)) {
                    $this->session->set_userdata('score_ans', ($form_data['answred'] + 1));
                    $this->session->set_userdata('score_smart', ($form_data['score'] + $questions->q_score));
                    $rtntext['score_ans'] = $this->session->userdata('score_ans');
                    $rtntext['score_smart'] = $this->session->userdata('score_smart');
                    $rtntext['type'] = 'true';
                    $rtntext['content'] = 'Correct';
                } else {
                    $this->session->set_userdata('score_ans', ($form_data['answred'] + 1));
                    $rtntext['score_ans'] = $this->session->userdata('score_ans');
                    $rtntext['type'] = 'false';
                    $rtntext['content'] = 'Wrong: Correct answer is : ' . $correct_ans;
                }
            } elseif ($form_data['question_option'] == '8') {

                //print_r($questions_next);
                if (!empty($questions_next)) {
                    $question_form_data = unserialize($questions_next[0]->form_data);
                    $qview_option = 'qView_option_' . $question_form_data['question_option'];
                    $html = $this->$qview_option($questions_next[0], $grade_id, $subject_id, $topic_id, $start,$questions_next[0]->question_id);
                } else {
                    $html = '';
                }
                $rtntext['html'] = $html;
                $img_answer = explode(',', $form_data['img_answer']);
                $your_ans = $img_answer;
                $correct_ans = $form_data_ans['answer'];
                if ($correct_ans == $your_ans) {
                    $this->session->set_userdata('score_ans', ($form_data['answred'] + 1));
                    $this->session->set_userdata('score_smart', ($form_data['score'] + $questions->q_score));
                    $rtntext['score_ans'] = $this->session->userdata('score_ans');
                    $rtntext['score_smart'] = $this->session->userdata('score_smart');
                    $rtntext['type'] = 'true';
                    $rtntext['content'] = 'Correct';
                } else {
                    $this->session->set_userdata('score_ans', ($form_data['answred'] + 1));
                    $rtntext['score_ans'] = $this->session->userdata('score_ans');
                    $rtntext['type'] = 'false';
                    $rtntext['content'] = 'Wrong';
                }
            } elseif ($form_data['question_option'] == '9') {

                if (!empty($questions_next)) {
                    $question_form_data = unserialize($questions_next[0]->form_data);
                    $qview_option = 'qView_option_' . $question_form_data['question_option'];
                    $html = $this->$qview_option($questions_next[0], $grade_id, $subject_id, $topic_id, $start,$questions_next[0]->question_id);
                }
                if (empty($html)) {
                    $html = '';
                }
                //echo $html; exit();
                $rtntext['html'] = $html;
                $your_ans = $form_data['option_1'];
                $correct_ans = $form_data_ans['ans_textbox'];
                if (strtolower($correct_ans) == strtolower($your_ans)) {
                    $this->session->set_userdata('score_ans', ($form_data['answred'] + 1));
                    $this->session->set_userdata('score_smart', ($form_data['score'] + $questions->q_score));
                    $rtntext['score_ans'] = $this->session->userdata('score_ans');
                    $rtntext['score_smart'] = $this->session->userdata('score_smart');
                    $rtntext['type'] = 'true';
                    $rtntext['content'] = 'Correct';
                } else {
                    $this->session->set_userdata('score_ans', ($form_data['answred'] + 1));
                    $rtntext['score_ans'] = $this->session->userdata('score_ans');
                    $rtntext['type'] = 'false';
                    $rtntext['content'] = 'Wrong: Correct answer is : ' . $correct_ans;
                }
            } elseif ($form_data['question_option'] == '11') {

                if (!empty($questions_next)) {
                    $question_form_data = unserialize($questions_next[0]->form_data);
                    $qview_option = 'qView_option_' . $question_form_data['question_option'];
                    $html = $this->$qview_option($questions_next[0], $grade_id, $subject_id, $topic_id, $start,$questions_next[0]->question_id);
                }
                if (empty($html)) {
                    $html = '';
                }
                $rtntext['html'] = $html;
                $your_ans = $form_data['qAns_box'];
                $correct_ans = $form_data_ans['ans_textbox'];
                if (strtolower($correct_ans) == strtolower($your_ans)) {
                    $this->session->set_userdata('score_ans', ($form_data['answred'] + 1));
                    $this->session->set_userdata('score_smart', ($form_data['score'] + $questions->q_score));
                    $rtntext['score_ans'] = $this->session->userdata('score_ans');
                    $rtntext['score_smart'] = $this->session->userdata('score_smart');
                    $rtntext['type'] = 'true';
                    $rtntext['content'] = 'Correct';

                } else {
                    $this->session->set_userdata('score_ans', ($form_data['answred'] + 1));
                    $rtntext['score_ans'] = $this->session->userdata('score_ans');
                    $rtntext['type'] = 'false';
                    $rtntext['content'] = 'Wrong: Correct answer is : ' . $correct_ans;
                }
            } elseif ($form_data['question_option'] == '12') {

                if (!empty($questions_next)) {
                    $question_form_data = unserialize($questions_next[0]->form_data);
                    $qview_option = 'qView_option_' . $question_form_data['question_option'];
                    $html = $this->$qview_option($questions_next[0], $grade_id, $subject_id, $topic_id, $start,$questions_next[0]->question_id);
                }
                if (empty($html)) {
                    $html = '';
                }
                $rtntext['html'] = $html;
                $your_ans = $form_data['qAns_box'];
                $correct_ans = $form_data_ans['ans_textbox'];
                if ($correct_ans == $your_ans) {
                    $this->session->set_userdata('score_ans', ($form_data['answred'] + 1));
                    $this->session->set_userdata('score_smart', ($form_data['score'] + $questions->q_score));
                    $rtntext['score_ans'] = $this->session->userdata('score_ans');
                    $rtntext['score_smart'] = $this->session->userdata('score_smart');
                    $rtntext['type'] = 'true';
                    $rtntext['content'] = 'Correct';

                } else {
                    $this->session->set_userdata('score_ans', ($form_data['answred'] + 1));
                    $rtntext['score_ans'] = $this->session->userdata('score_ans');
                    $rtntext['type'] = 'false';
                    $rtntext['content'] = 'Wrong: Correct answer is : ' . $correct_ans;
                }
            } elseif ($form_data['question_option'] == '14') {

                if (!empty($questions_next)) {
                    $question_form_data = unserialize($questions_next[0]->form_data);
                    $qview_option = 'qView_option_' . $question_form_data['question_option'];
                    $html = $this->$qview_option($questions_next[0], $grade_id, $subject_id, $topic_id, $start,$questions_next[0]->question_id);
                }
                if (empty($html)) {
                    $html = '';
                }
                //echo $html; exit();
                $rtntext['html'] = $html;
                $your_ans = $form_data['option_1'];
                $correct_ans = $form_data_ans['ans_textbox'];
                if (strtolower($correct_ans) == strtolower($your_ans)) {
                    $this->session->set_userdata('score_ans', ($form_data['answred'] + 1));
                    $this->session->set_userdata('score_smart', ($form_data['score'] + $questions->q_score));
                    $rtntext['score_ans'] = $this->session->userdata('score_ans');
                    $rtntext['score_smart'] = $this->session->userdata('score_smart');
                    $rtntext['type'] = 'true';
                    $rtntext['content'] = 'Correct';
                } else {
                    $this->session->set_userdata('score_ans', ($form_data['answred'] + 1));
                    $rtntext['score_ans'] = $this->session->userdata('score_ans');
                    $rtntext['type'] = 'false';
                    $rtntext['content'] = 'Wrong: Correct answer is : ' . $correct_ans;
                }
            } elseif ($form_data['question_option'] == '15') {

                //print_r($questions_next);
                if (!empty($questions_next)) {
                    $question_form_data = unserialize($questions_next[0]->form_data);
                    $qview_option = 'qView_option_' . $question_form_data['question_option'];
                    $html = $this->$qview_option($questions_next[0], $grade_id, $subject_id, $topic_id, $start,$questions_next[0]->question_id);
                } else {
                    $html = '';
                }
                $rtntext['html'] = $html;
                $your_ans = $form_data['img_answer'];
                $correct_ans = $form_data_ans['answer'];
                if (strtolower($correct_ans) == strtolower($your_ans)) {
                    $this->session->set_userdata('score_ans', ($form_data['answred'] + 1));
                    $this->session->set_userdata('score_smart', ($form_data['score'] + $questions->q_score));
                    $rtntext['score_ans'] = $this->session->userdata('score_ans');
                    $rtntext['score_smart'] = $this->session->userdata('score_smart');
                    $rtntext['type'] = 'true';
                    $rtntext['content'] = 'Correct';

                } else {
                    $this->session->set_userdata('score_ans', ($form_data['answred'] + 1));
                    $rtntext['score_ans'] = $this->session->userdata('score_ans');
                    $rtntext['type'] = 'false';
                    $rtntext['content'] = 'Wrong: Correct answer is : ' . $form_data_ans['answer'];
                }
            } elseif ($form_data['question_option'] == '5') {

                if (!empty($questions_next)) {
                    $question_form_data = unserialize($questions_next[0]->form_data);
                    $qview_option = 'qView_option_' . $question_form_data['question_option'];
                    $html = $this->$qview_option($questions_next[0], $grade_id, $subject_id, $topic_id, $start,$questions_next[0]->question_id);
                }
                if (empty($html)) {
                    $html = '';
                }
                //echo $html; exit();
                $rtntext['html'] = $html;
                $your_ans = $form_data['option_arrange'];
                $correct_ans = $form_data_ans['option_arrange'];
                if ($correct_ans == $your_ans) {
                    $this->session->set_userdata('score_ans', ($form_data['answred'] + 1));
                    $this->session->set_userdata('score_smart', ($form_data['score'] + $questions->q_score));
                    $rtntext['score_ans'] = $this->session->userdata('score_ans');
                    $rtntext['score_smart'] = $this->session->userdata('score_smart');
                    $rtntext['type'] = 'true';
                    $rtntext['content'] = 'Correct';
                } else {
                    $this->session->set_userdata('score_ans', ($form_data['answred'] + 1));
                    $rtntext['score_ans'] = $this->session->userdata('score_ans');
                    $rtntext['type'] = 'false';
                    if (is_array($correct_ans))
                        $rtntext['content'] = 'Wrong: Correct answer is : ' . serialize($correct_ans);
                    else
                        $rtntext['content'] = 'Wrong: Correct answer is : ' . $correct_ans;
                }
            } elseif ($form_data['question_option'] == '13') {

                if (!empty($questions_next)) {
                    $question_form_data = unserialize($questions_next[0]->form_data);
                    $qview_option = 'qView_option_' . $question_form_data['question_option'];
                    $html = $this->$qview_option($questions_next[0], $grade_id, $subject_id, $topic_id, $start,$questions_next[0]->question_id);
                }
                if (empty($html)) {
                    $html = '';
                }
                //echo $html; exit();
                $rtntext['html'] = $html;
                $your_ans = $form_data['option_1'];
                $correct_ans = $form_data_ans['ans_textbox'];
                if (strtolower($correct_ans) == strtolower($your_ans)) {
                    $this->session->set_userdata('score_ans', ($form_data['answred'] + 1));
                    $this->session->set_userdata('score_smart', ($form_data['score'] + $questions->q_score));
                    $rtntext['score_ans'] = $this->session->userdata('score_ans');
                    $rtntext['score_smart'] = $this->session->userdata('score_smart');
                    $rtntext['type'] = 'true';
                    $rtntext['content'] = 'Correct';
                } else {
                    $this->session->set_userdata('score_ans', ($form_data['answred'] + 1));
                    $rtntext['score_ans'] = $this->session->userdata('score_ans');
                    $rtntext['type'] = 'false';
                    $rtntext['content'] = 'Wrong: Correct answer is : ' . $correct_ans;
                }
            } elseif ($form_data['question_option'] == '18') {

                if (!empty($questions_next)) {
                    $question_form_data = unserialize($questions_next[0]->form_data);
                    $qview_option = 'qView_option_' . $question_form_data['question_option'];
                    $html = $this->$qview_option($questions_next[0], $grade_id, $subject_id, $topic_id, $start,$questions_next[0]->question_id);
                }
                if (empty($html)) {
                    $html = '';
                }
                $rtntext['html'] = $html;
                $your_ans = $form_data['qAns_box1'] . 'and' . $form_data['qAns_box2'];
                $correct_ans = $form_data_ans['ans_textbox1'] . 'and' . $form_data_ans['ans_textbox2'];
                if (strtolower($correct_ans) == strtolower($your_ans)) {
                    $this->session->set_userdata('score_ans', ($form_data['answred'] + 1));
                    $this->session->set_userdata('score_smart', ($form_data['score'] + $questions->q_score));
                    $rtntext['score_ans'] = $this->session->userdata('score_ans');
                    $rtntext['score_smart'] = $this->session->userdata('score_smart');
                    $rtntext['type'] = 'true';
                    $rtntext['content'] = 'Correct';

                } else {
                    $this->session->set_userdata('score_ans', ($form_data['answred'] + 1));
                    $rtntext['score_ans'] = $this->session->userdata('score_ans');
                    $rtntext['type'] = 'false';
                    $rtntext['content'] = 'Wrong: Correct answer is : ' . $correct_ans;
                }
            } elseif ($form_data['question_option'] == '20') {

                if (!empty($questions_next)) {
                    $question_form_data = unserialize($questions_next[0]->form_data);
                    $qview_option = 'qView_option_' . $question_form_data['question_option'];
                    $html = $this->$qview_option($questions_next[0], $grade_id, $subject_id, $topic_id, $start,$questions_next[0]->question_id);
                }
                if (empty($html)) {
                    $html = '';

                }
                //echo $html; exit();
                $rtntext['html'] = $html;
                $your_ans = $form_data['option_1'];
                $correct_ans = $form_data_ans['ans_textbox'];
                if (strtolower($correct_ans) == strtolower($your_ans)) {
                    $this->session->set_userdata('score_ans', ($form_data['answred'] + 1));
                    $this->session->set_userdata('score_smart', ($form_data['score'] + $questions->q_score));
                    $rtntext['score_ans'] = $this->session->userdata('score_ans');
                    $rtntext['score_smart'] = $this->session->userdata('score_smart');
                    $rtntext['type'] = 'true';
                    $rtntext['content'] = 'Correct';
                } else {
                    $this->session->set_userdata('score_ans', ($form_data['answred'] + 1));
                    $rtntext['score_ans'] = $this->session->userdata('score_ans');
                    $rtntext['type'] = 'false';
                    $rtntext['content'] = 'Wrong: Correct answer is : ' . $correct_ans;
                }
            } elseif ($form_data['question_option'] == '26') {

                if (!empty($questions_next)) {
                    $question_form_data = unserialize($questions_next[0]->form_data);
                    $qview_option = 'qView_option_' . $question_form_data['question_option'];
                    $html = $this->$qview_option($questions_next[0], $grade_id, $subject_id, $topic_id, $start,$questions_next[0]->question_id);
                }
                if (empty($html)) {
                    $html = '';
                }

                $rtntext['html'] = $html;
                $your_ans = $form_data['selected_option'];
                $correct_ans = $form_data_ans['ans_textbox'];
                if ($correct_ans == $your_ans) {
                    $this->session->set_userdata('score_ans', ($form_data['answred'] + 1));
                    $this->session->set_userdata('score_smart', ($form_data['score'] + $questions->q_score));
                    $rtntext['score_ans'] = $this->session->userdata('score_ans');
                    $rtntext['score_smart'] = $this->session->userdata('score_smart');
                    $rtntext['type'] = 'true';
                    $rtntext['content'] = 'Correct';
                } else {
                    $this->session->set_userdata('score_ans', ($form_data['answred'] + 1));
                    $rtntext['score_ans'] = $this->session->userdata('score_ans');
                    $rtntext['type'] = 'false';
                    $rtntext['content'] = 'Wrong: Correct answer is : ' . $correct_ans;
                }
            } elseif ($form_data['question_option'] == '27') {

                if (!empty($questions_next)) {
                    $question_form_data = unserialize($questions_next[0]->form_data);
                    $qview_option = 'qView_option_' . $question_form_data['question_option'];
                    $html = $this->$qview_option($questions_next[0], $grade_id, $subject_id, $topic_id, $start,$questions_next[0]->question_id);
                }
                if (empty($html)) {
                    $html = '';
                }
                $rtntext['html'] = $html;
                //print_r($form_data_ans); exit();
                $your_ans = $form_data['qAns_box'];
                $correct_ans = $form_data_ans['ans_textbox'];
                if ($correct_ans == $your_ans) {
                    $this->session->set_userdata('score_ans', ($form_data['answred'] + 1));
                    $this->session->set_userdata('score_smart', ($form_data['score'] + $questions->q_score));
                    $rtntext['score_ans'] = $this->session->userdata('score_ans');
                    $rtntext['score_smart'] = $this->session->userdata('score_smart');
                    $rtntext['type'] = 'true';
                    $rtntext['content'] = 'Correct';

                } else {
                    $this->session->set_userdata('score_ans', ($form_data['answred'] + 1));
                    $rtntext['score_ans'] = $this->session->userdata('score_ans');
                    $rtntext['type'] = 'false';
                    $rtntext['content'] = 'Wrong: Correct answer is : ';
                }
            } elseif ($form_data['question_option'] == '28') {

                if (!empty($questions_next)) {
                    $question_form_data = unserialize($questions_next[0]->form_data);
                    $qview_option = 'qView_option_' . $question_form_data['question_option'];
                    $html = $this->$qview_option($questions_next[0], $grade_id, $subject_id, $topic_id, $start,$questions_next[0]->question_id);
                }
                if (empty($html)) {
                    $html = '';
                }
                $rtntext['html'] = $html;
                //print_r($form_data_ans); exit();
                $your_ans = $form_data['qAns_box1'] . 'and' . $form_data['qAns_box2'];
                $correct_ans = $form_data_ans['ans_textbox1'] . 'and' . $form_data_ans['ans_textbox2'];
                if (strtolower($correct_ans) == strtolower($your_ans)) {
                    $this->session->set_userdata('score_ans', ($form_data['answred'] + 1));
                    $this->session->set_userdata('score_smart', ($form_data['score'] + $questions->q_score));
                    $rtntext['score_ans'] = $this->session->userdata('score_ans');
                    $rtntext['score_smart'] = $this->session->userdata('score_smart');
                    $rtntext['type'] = 'true';
                    $rtntext['content'] = 'Correct';

                } else {
                    $this->session->set_userdata('score_ans', ($form_data['answred'] + 1));
                    $rtntext['score_ans'] = $this->session->userdata('score_ans');
                    $rtntext['type'] = 'false';
                    $rtntext['content'] = 'Wrong: Correct answer is : ' . $correct_ans;
                }
            } elseif ($form_data['question_option'] == '29') {
                if (!empty($questions_next)) {
                    $question_form_data = unserialize($questions_next[0]->form_data);
                    $qview_option = 'qView_option_' . $question_form_data['question_option'];
                    $html = $this->$qview_option($questions_next[0], $grade_id, $subject_id, $topic_id, $start,$questions_next[0]->question_id);
                }
                if (empty($html)) {
                    $html = '';
                }
                //echo $html; exit();
                $rtntext['html'] = $html;
                $your_ans = $form_data['qAns_box'];
                $correct_ans = $form_data_ans['ans_textbox'];
                if ($correct_ans == $your_ans) {
                    $this->session->set_userdata('score_ans', ($form_data['answred'] + 1));
                    $this->session->set_userdata('score_smart', ($form_data['score'] + $questions->q_score));
                    $rtntext['score_ans'] = $this->session->userdata('score_ans');
                    $rtntext['score_smart'] = $this->session->userdata('score_smart');
                    $rtntext['type'] = 'true';
                    $rtntext['content'] = 'Correct';
                } else {
                    $this->session->set_userdata('score_ans', ($form_data['answred'] + 1));
                    $rtntext['score_ans'] = $this->session->userdata('score_ans');
                    $rtntext['type'] = 'false';
                    $rtntext['content'] = 'Wrong: Correct answer is : ' . $correct_ans;
                }
            } elseif ($form_data['question_option'] == '31') {

                if (!empty($questions_next)) {
                    $question_form_data = unserialize($questions_next[0]->form_data);
                    $qview_option = 'qView_option_' . $question_form_data['question_option'];
                    $html = $this->$qview_option($questions_next[0], $grade_id, $subject_id, $topic_id, $start,$questions_next[0]->question_id);
                }
                if (empty($html)) {
                    $html = '';
                }
                $rtntext['html'] = $html;
                //print_r($form_data_ans); exit();
                $ans = '';
                $counter_ans = 0;
                $yans = '';
                $ycounter_ans = 0;
                foreach ($form_data_ans['option_1'] as $option_1) {
                    if ($counter_ans == 0) {
                        $ans .= $option_1;
                    } else {
                        $ans .= '|' . $option_1;
                    }
                    $counter_ans++;
                }
                foreach ($form_data['qAns_box'] as $option_1) {
                    if ($ycounter_ans == 0) {
                        $yans .= $option_1;
                    } else {
                        $yans .= '|' . $option_1;
                    }
                    $ycounter_ans++;
                }
                $your_ans = $yans;
                $correct_ans = $ans;
                if (strtolower($correct_ans) == strtolower($your_ans)) {
                    $this->session->set_userdata('score_ans', ($form_data['answred'] + 1));
                    $this->session->set_userdata('score_smart', ($form_data['score'] + $questions->q_score));
                    $rtntext['score_ans'] = $this->session->userdata('score_ans');
                    $rtntext['score_smart'] = $this->session->userdata('score_smart');
                    $rtntext['type'] = 'true';
                    $rtntext['content'] = 'Correct';

                } else {
                    $this->session->set_userdata('score_ans', ($form_data['answred'] + 1));
                    $rtntext['score_ans'] = $this->session->userdata('score_ans');
                    $rtntext['type'] = 'false';
                    $rtntext['content'] = 'Wrong: Correct answer is : ' . $ans;
                }
            } elseif ($form_data['question_option'] == '32') {
                if (!empty($questions_next)) {
                    $question_form_data = unserialize($questions_next[0]->form_data);
                    $qview_option = 'qView_option_' . $question_form_data['question_option'];
                    $html = $this->$qview_option($questions_next[0], $grade_id, $subject_id, $topic_id, $start,$questions_next[0]->question_id);
                }
                if (empty($html)) {
                    $html = '';
                }
                //echo $html; exit();
                $rtntext['html'] = $html;
                $your_ans = $form_data['qAns_box'];
                $correct_ans = $form_data_ans['ans_textbox'];
                if (json_encode($correct_ans) == json_encode($your_ans)) {
                    $this->session->set_userdata('score_ans', ($form_data['answred'] + 1));
                    $this->session->set_userdata('score_smart', ($form_data['score'] + $questions->q_score));
                    $rtntext['score_ans'] = $this->session->userdata('score_ans');
                    $rtntext['score_smart'] = $this->session->userdata('score_smart');
                    $rtntext['type'] = 'true';
                    $rtntext['content'] = 'Correct';
                } else {
                    $this->session->set_userdata('score_ans', ($form_data['answred'] + 1));
                    $rtntext['type'] = 'false';
                    $rtntext['content'] = 'Wrong: Correct answer is : ' . $form_data_ans['ans_textbox1'];
                }
            } elseif ($form_data['question_option'] == '33') {

                if (!empty($questions_next)) {
                    $question_form_data = unserialize($questions_next[0]->form_data);
                    $qview_option = 'qView_option_' . $question_form_data['question_option'];
                    $html = $this->$qview_option($questions_next[0], $grade_id, $subject_id, $topic_id, $start,$questions_next[0]->question_id);
                }
                if (empty($html)) {
                    $html = '';
                }
                //echo $html; exit();
                $rtntext['html'] = $html;
                $your_ans = $form_data['qAns_box'];
                $correct_ans = $form_data_ans['ans_textbox'];
                if (strtolower($correct_ans) == strtolower($your_ans)) {
                    $this->session->set_userdata('score_ans', ($form_data['answred'] + 1));
                    $this->session->set_userdata('score_smart', ($form_data['score'] + $questions->q_score));
                    $rtntext['score_ans'] = $this->session->userdata('score_ans');
                    $rtntext['score_smart'] = $this->session->userdata('score_smart');
                    $rtntext['type'] = 'true';
                    $rtntext['content'] = 'Correct';
                } else {
                    $this->session->set_userdata('score_ans', ($form_data['answred'] + 1));
                    $rtntext['score_ans'] = $this->session->userdata('score_ans');
                    $rtntext['type'] = 'false';
                    $rtntext['content'] = 'Wrong: Correct answer is : ' . $correct_ans;
                }
            } elseif ($form_data['question_option'] == '34') {

                if (!empty($questions_next)) {
                    $question_form_data = unserialize($questions_next[0]->form_data);
                    $qview_option = 'qView_option_' . $question_form_data['question_option'];
                    $html = $this->$qview_option($questions_next[0], $grade_id, $subject_id, $topic_id, $start,$questions_next[0]->question_id);
                } else {
                    $html = '';
                }
                $rtntext['html'] = $html;
                $your_ans = $form_data['img_answer'];
                $correct_ans = $form_data_ans['answer'];
                if (strtolower($correct_ans) == strtolower($your_ans)) {
                    $this->session->set_userdata('score_ans', ($form_data['answred'] + 1));
                    $this->session->set_userdata('score_smart', ($form_data['score'] + $questions->q_score));
                    $rtntext['score_ans'] = $this->session->userdata('score_ans');
                    $rtntext['score_smart'] = $this->session->userdata('score_smart');
                    $rtntext['type'] = 'true';
                    $rtntext['content'] = 'Correct';

                } else {
                    $this->session->set_userdata('score_ans', ($form_data['answred'] + 1));
                    $rtntext['score_ans'] = $this->session->userdata('score_ans');
                    $rtntext['type'] = 'false';
                    $rtntext['content'] = 'Wrong: Correct answer is : ' . $form_data_ans['answer'];
                }
            } elseif ($form_data['question_option'] == '35') {

	            if (!empty($questions_next)) {
		            $question_form_data = unserialize($questions_next[0]->form_data);
		            $qview_option = 'qView_option_' . $question_form_data['question_option'];
		            $html = $this->$qview_option($questions_next[0], $grade_id, $subject_id, $topic_id, $start,$questions_next[0]->question_id);
	            }
	            if (empty($html)) {
		            $html = '';
	            }
	            $rtntext['html'] = $html;
	            $your_ans = $form_data['multiple_img'];
	            $correct_ans = $form_data_ans['multiple_img'];
	            if ($correct_ans == $your_ans) {
		            $this->session->set_userdata('score_ans', ($form_data['answred'] + 1));
		            $this->session->set_userdata('score_smart', ($form_data['score'] + $questions->q_score));
		            $rtntext['score_ans'] = $this->session->userdata('score_ans');
		            $rtntext['score_smart'] = $this->session->userdata('score_smart');
		            $rtntext['type'] = 'true';
		            $rtntext['content'] = 'Correct';

	            } else {
		            $this->session->set_userdata('score_ans', ($form_data['answred'] + 1));
		            $rtntext['score_ans'] = $this->session->userdata('score_ans');
		            $rtntext['type'] = 'false';
		            $rtntext['content'] = 'Wrong: ';
	            }
            }


            /// premium user save data in database
            if(loginCheck() && get_returnfield('user','id',get_parent(get_current_user_id()),'membership_plan')=='1'){
                $save_data['user_id']=get_current_user_id();
                $save_data['question_id']=$questions->question_id;
                $save_data['country_id']=$questions->country_id;
                $save_data['subject_id']=$questions->subject_id;
                $save_data['grade_id']=$questions->grade_id;
                $save_data['category_id']=$questions->category_id;
                $save_data['topic_id']=$questions->topic_id;
                $save_data['question_type']=$form_data['question_option'];
                $save_data['marks']=$questions->q_score;
                $save_data['answer_type']=strtolower($rtntext['type']);
                $save_data['ans_time']=$form_data['total_time_inSecond'];
                $save_data['submit_date']=date('Y-m-d H:i:s');
                if(is_array($your_ans))
                    $your_ans=serialize($your_ans);
                if(is_array($correct_ans))
                    $correct_ans=serialize($correct_ans);
                $save_data['your_ans']=$your_ans;
                $save_data['correct_ans']=$correct_ans;
                $save_question=$this->ajax_model->save_student_qns_ans($save_data);
            } else{
                if($this->session->userdata('score_ans')>=10){
                    $rtntext['html']='';
                }

            }
            if(!empty($this->session->userdata('total_qScore'))){
                $this->session->set_userdata('total_qScore',($this->session->userdata('total_qScore')+$questions->q_score));
            } else{
                $this->session->set_userdata('total_qScore',($questions->q_score));
            }
            $user_name=get_returnfield('user','id',get_current_user_id(),'fname').' '.get_returnfield('user','id',get_current_user_id(),'lname');
            if($user_name=='' || $user_name==' '){
                $user_name='Guest';
            }
            $rtntext['user_name']=$user_name;
            $rtntext['grade']=get_returnfield('grade','id',$questions->grade_id,'name');
            $rtntext['subject']=get_returnfield('subject','id',$questions->subject_id,'name');
            $rtntext['subject_id']=$questions->subject_id;
            $rtntext['grade_id']=$questions->grade_id;
            $rtntext['category_id']=$questions->category_id;
            $rtntext['topic_id']=$questions->topic_id;
            if($start==1){
	            $rtntext['id_not_in']=$questions->question_id;
            }

            //$rtntext['tQ_attend']=$this->session->userdata('score_ans');
            //$rtntext['tQ_score']=$this->session->userdata('score_smart');
            $rtntext['total_time']=$form_data['total_time_inSecond'];
            $rtntext['your_ans']=$your_ans;
            $rtntext['correct_ans']=$correct_ans;
            //print_r($form_data_ans); exit();
            $rtntext['qRight_feedback']=(!empty($form_data_ans['qRight_feedback'])) ? $form_data_ans['qRight_feedback']:'Correct';
            $rtntext['qWrong_feedback']=(!empty($form_data_ans['qWrong_feedback'])) ? $form_data_ans['qWrong_feedback']:$rtntext['content'];
            $rtntext['tQ_score']=$this->session->userdata('total_qScore');
            $rtntext['total_question_count']=$this->session->userdata('total_question_count');
            $rtntext['total_question_marks']=$this->session->userdata('total_question_marks');
            $q_id_array=$this->session->userdata('q_id_array');
            $q_id_count=explode(',',$q_id_array);
            $stepbar_count='';
            for ($i=1; $i<=count($q_id_count); $i++){
                $stepbar_count .= ($stepbar_count!='')  ? ", " : " ";
            }
            $rtntext['q_id_array']=$this->session->userdata('q_id_array');
            $rtntext['stepbar_count']=$stepbar_count;
        }
        echo json_encode($rtntext);
    }

	function upload_multiple_img_path(){
        $img_array = array();
        $files = $_FILES;
        $filesCount = count($_FILES['imageQ_uploads']['name']);
        for($i = 0; $i < $filesCount; $i++){
            $_FILES['imageQ_uploads']['name']     = $files['imageQ_uploads']['name'][$i];
            $_FILES['imageQ_uploads']['type']     = $files['imageQ_uploads']['type'][$i];
            $_FILES['imageQ_uploads']['tmp_name'] = $files['imageQ_uploads']['tmp_name'][$i];
            $_FILES['imageQ_uploads']['error']     = $files['imageQ_uploads']['error'][$i];
            $_FILES['imageQ_uploads']['size']     = $files['imageQ_uploads']['size'][$i];
            $img_path = image_upload( $_FILES, 'imageQ_uploads', 'uploads/images' );
            array_push($img_array, $img_path);
        }
        return $img_array;
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

	function imageQmultipleimg() {
		if ( isset( $_FILES['imageQ_bg_upload'] ) ) {
			$resultArray = array();
			$file        = $_FILES['imageQ_bg_upload'];
			$fileName    = $file['name'];
			$tmpName     = $file['tmp_name'];
			$fileSize    = $file['size'];
			$fileType    = $file['type'];
			if ( $file['error'] != UPLOAD_ERR_OK ) {
				error_log( $file['error'] );
				echo JSON_encode( null );
			}
			$fp      = fopen( $tmpName, 'r' );
			$content = fread( $fp, filesize( $tmpName ) );
			fclose( $fp );
			$result = array(
				'name'   => $file['name'],
				'type'   => 'image',
				'src'    => "data:" . $fileType . ";base64," . base64_encode( $content ),
				'height' => 350,
				'width'  => 250
			);
			// we can also add code to save images in database here.
			array_push( $resultArray, $result );
			echo json_encode( $resultArray );
		}
	}
	function imageQuploadimg() {
		if(isset($_FILES['upload_images']))
		{
			$resultArray = array();
			$file = $_FILES['upload_images'];
			if(!empty($file['name'])) {
				$fileName = $file['name'];
				//print_r($file['tmp_name']); exit();
				foreach($fileName as $key => $filename) {
					$tmpName  = $file['tmp_name'][$key];
					$fileSize = $file['size'][$key];
					$fileType = $file['type'][$key];
					if ( $file['error'][$key] != UPLOAD_ERR_OK ) {
						error_log( $file['error'][$key] );
						echo JSON_encode( null );
					}
					$fp      = fopen( $tmpName, 'r' );
					$content = fread( $fp, filesize( $tmpName ) );
					fclose( $fp );
					$result = array(
						'name'   => $filename,
						'type'   => 'image',
						'src'    => "data:" . $fileType . ";base64," . base64_encode( $content ),
						'height' => 50,
						'width'  => 50
					);
					// we can also add code to save images in database here.
					array_push( $resultArray, $result );
				}
			}
			echo json_encode($resultArray);
		}
	}

	function svgBoximg() {
		if($_FILES)
		{
			$resultArray = array();
			foreach ( $_FILES as $file){
				$fileName = $file['name'];
				$tmpName = $file['tmp_name'];
				$fileSize = $file['size'];
				$fileType = $file['type'];
				if ($file['error'] != UPLOAD_ERR_OK)
				{
					error_log($file['error']);
					echo JSON_encode(null);
				}
				$fp = fopen($tmpName, 'r');
				$content = fread($fp, filesize($tmpName));
				fclose($fp);
				$result=array(
					'name'=>$file['name'],
					'type'=>'image',
					'src'=>"data:".$fileType.";base64,".base64_encode($content),
					'height'=>350,
					'width'=>250
				);
				// we can also add code to save images in database here.
				array_push($resultArray,$result);
			}
			echo json_encode($resultArray);
		}
	}

	function DragDropimg() {
		if($_FILES)
		{
			$resultArray = array();
			foreach ( $_FILES as $key => $file){
				if(!empty($file['name'])) {
					$fileName = $file['name'];
					$tmpName  = $file['tmp_name'];
					$fileSize = $file['size'];
					$fileType = $file['type'];
					if ( $file['error'] != UPLOAD_ERR_OK ) {
						error_log( $file['error'] );
						echo JSON_encode( null );
					}
					$fp      = fopen( $tmpName, 'r' );
					$content = fread( $fp, filesize( $tmpName ) );
					fclose( $fp );
					$result = array(
						'name'   => $file['name'],
						'type'   => 'image',
						'src'    => "data:" . $fileType . ";base64," . base64_encode( $content ),
						'height' => 350,
						'width'  => 250
					);
					// we can also add code to save images in database here.
					$resultArray[ $key ] = $result;
				}
			}
			echo json_encode($resultArray);
		}
	}

	function Putimg() {
		if($_FILES)
		{
			$resultArray = array();
			$file = $_FILES['upload_images'];
			if(!empty($file['name'])) {
				$fileName = $file['name'];
				//print_r($file['tmp_name']); exit();
				foreach($fileName as $key => $filename) {
					$tmpName  = $file['tmp_name'][$key];
					$fileSize = $file['size'][$key];
					$fileType = $file['type'][$key];
					if ( $file['error'][$key] != UPLOAD_ERR_OK ) {
						error_log( $file['error'][$key] );
						echo JSON_encode( null );
					}
					$fp      = fopen( $tmpName, 'r' );
					$content = fread( $fp, filesize( $tmpName ) );
					fclose( $fp );
					$result = array(
						'name'   => $filename,
						'type'   => 'image',
						'src'    => "data:" . $fileType . ";base64," . base64_encode( $content ),
						'height' => 50,
						'width'  => 50
					);
					// we can also add code to save images in database here.
					array_push( $resultArray, $result );
				}
			}
			echo json_encode($resultArray);
		}
	}

    function qView_option_1($data,$grade_id,$subject_id,$topic_id,$start,$id_not_in){
        $rtntext='';
        $start=$start+1;
        $rtntext.=$this->qView_common_part($data,$start,$grade_id,$subject_id,$id_not_in,$topic_id );
        $form_serializedata=unserialize($data->form_data);
        //print_r($form_serializedata);
        $rtntext.='<input type="hidden" name="question_option" value="'.$form_serializedata['question_option'].'">';
        $rtntext.='<div class="question_image">
                                            <img src="'.$form_serializedata['img'].'" alt="">
                                        </div>
                                        <div class="qAns_box">
                                            <div class="question_count">A. </div><span><input type="text" name="qAns_box" class="form-control"></span>
                                        </div>';
        $rtntext.='<input type="submit" value="Submit" class="btn btn-small btn-outline-default qSubmit">';
        $rtntext.='</div>';
        $rtntext.='</div>';

        return $rtntext;
    }
    function qView_option_2($data,$grade_id,$subject_id,$topic_id,$start,$id_not_in){
        //echo 'start'; exit();
        $rtntext='';
        $start=$start+1;
        $rtntext.=$this->qView_common_part($data,$start,$grade_id,$subject_id,$id_not_in,$topic_id );
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
    function qView_option_3($data,$grade_id,$subject_id,$topic_id,$start,$id_not_in){
        $rtntext='';
        $start=$start+1;
        $rtntext.=$this->qView_common_part($data,$start,$grade_id,$subject_id,$id_not_in,$topic_id );
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
    function qView_option_5($data,$grade_id,$subject_id,$topic_id,$start,$id_not_in){
        $rtntext='';
        $start=$start+1;
        $rtntext.=$this->qView_common_part($data,$start,$grade_id,$subject_id,$id_not_in,$topic_id );
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
    function qView_option_6($data,$grade_id,$subject_id,$topic_id,$start,$id_not_in){
        $rtntext='';
        $start=$start+1;
        $rtntext.=$this->qView_common_part($data,$start,$grade_id,$subject_id,$id_not_in,$topic_id );
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
    function qView_option_8($data,$grade_id,$subject_id,$topic_id,$start,$id_not_in){
        $rtntext='';
        $start=$start+1;
        $rtntext.=$this->qView_common_part($data,$start,$grade_id,$subject_id,$id_not_in,$topic_id );
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

                $rtntext.='<div class="col-lg-2">';
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
    function qView_option_9($data,$grade_id,$subject_id,$topic_id,$start,$id_not_in){
        $rtntext='';
        $start=$start+1;
        $rtntext.=$this->qView_common_part($data,$start,$grade_id,$subject_id,$id_not_in,$topic_id );
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
    function qView_option_11($data,$grade_id,$subject_id,$topic_id,$start,$id_not_in){
        $rtntext='';
        $start=$start+1;
        $rtntext.=$this->qView_common_part($data,$start,$grade_id,$subject_id,$id_not_in,$topic_id );
        $form_serializedata=unserialize($data->form_data);
        $rtntext.='<input type="hidden" name="question_option" value="'.$form_serializedata['question_option'].'">';
        $rtntext.='<div class="qAns_box">
                        <div class="question_count">A. </div><span><input type="text" name="qAns_box" class="form-control"></span>
                    </div>';
        $rtntext.='<input type="submit" value="Submit" class="btn btn-small btn-outline-default qSubmit">';
        $rtntext.='</div>';
        $rtntext.='</div>';

        return $rtntext;
    }
    function qView_option_12($data,$grade_id,$subject_id,$topic_id,$start,$id_not_in){
        $rtntext='';
        $start=$start+1;
        $rtntext.=$this->qView_common_part($data,$start,$grade_id,$subject_id,$id_not_in,$topic_id );
        $form_serializedata=unserialize($data->form_data);
        $rtntext.='<input type="hidden" name="question_option" value="'.$form_serializedata['question_option'].'">';
        $count = $form_serializedata['num_box'];
        if(!empty($count)) {
            $rtntext .= '<div class="svgBoxes">';
            for ( $i = 0; $i < $count; $i++ ) {
                $rtntext .= '<div class="svgBox"></div>';
            }
            $rtntext .= '</div>';
        }
        $rtntext .= '<div style="clear: both;"></div>';
        $rtntext .= '<input type="hidden" name="qAns_box" value="0"/>';
        $rtntext .= '<input type="hidden" name="svgNum" value="'.$count.'"/>';
        $rtntext .= '<br/><br/><br/>';
        $rtntext .= '<ul class="svgButton"><li><a href="#" class="svgAdd">1 <span><img src="'.$form_serializedata['img'].'" 
/></span></a></li><li><a href="#" class="svgDelete">1 <span><i class="fa fa-trash-o"></i></span></a></li></ul>';
        $rtntext .= '<br/><br/>';
        $rtntext.='<input type="submit" value="Submit" class="btn btn-small btn-outline-default qSubmit">';
        $rtntext.='</div>';
        $rtntext.='</div>';

        return $rtntext;
    }
    function qView_option_13($data,$grade_id,$subject_id,$topic_id,$start,$id_not_in){
        $rtntext='';
        $start=$start+1;
        $rtntext.=$this->qView_common_part($data,$start,$grade_id,$subject_id,$id_not_in,$topic_id );
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
    function qView_option_14($data,$grade_id,$subject_id,$topic_id,$start,$id_not_in){
        $rtntext='';
        $start=$start+1;
        $rtntext.=$this->qView_common_part($data,$start,$grade_id,$subject_id,$id_not_in,$topic_id );
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
    function qView_option_15($data,$grade_id,$subject_id,$topic_id,$start,$id_not_in){
        $rtntext='';
        $start=$start+1;
        $rtntext.=$this->qView_common_part($data,$start,$grade_id,$subject_id,$id_not_in,$topic_id );
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

                $rtntext.='<div class="col-lg-2">';
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

    function qView_option_18($data,$grade_id,$subject_id,$topic_id,$start,$id_not_in){
        $rtntext='';
        $start=$start+1;
        $rtntext.=$this->qView_common_part($data,$start,$grade_id,$subject_id,$id_not_in,$topic_id );
        $form_serializedata=unserialize($data->form_data);
        //print_r($form_serializedata);
        $rtntext.='<input type="hidden" name="question_option" value="'.$form_serializedata['question_option'].'">';
        $rtntext.='<div class="question_image">
                                            
                                        </div>
                                        <div class="qAns_box">
                                            <p>Answer1: </p><span><input type="text" name="qAns_box1" class="form-control"></span><br>
                                            <p>Answer2: </p><span><input type="text" name="qAns_box2" class="form-control"></span>
                                        </div>';
        $rtntext.='<input type="submit" value="Submit" class="btn btn-small btn-outline-default qSubmit">';
        $rtntext.='</div>';
        $rtntext.='</div>';

        return $rtntext;
    }

    function qView_option_20($data,$grade_id,$subject_id,$topic_id,$start,$id_not_in){
        $rtntext='';
        $start=$start+1;
        $rtntext.=$this->qView_common_part($data,$start,$grade_id,$subject_id,$id_not_in,$topic_id );
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

    function qView_option_26($data,$grade_id,$subject_id,$topic_id,$start,$id_not_in){
        $rtntext='';
        $start=$start+1;
        $rtntext.=$this->qView_common_part($data,$start,$grade_id,$subject_id,$id_not_in,$topic_id );
        $form_serializedata=unserialize($data->form_data);
        $rtntext.='<input type="hidden" name="question_option" value="'.$form_serializedata['question_option'].'">';
        $rtntext.='<div class="row"><div class="col-lg-12"><img src="'.$form_serializedata['img'].'"></div></div>';
        $rtntext.='<div class="row12"><ul>';
        $option_counter=1;
        foreach ($form_serializedata['option_1'] as $option){
            $rtntext.='<li>
                <div class="boxed">
                    <input type="radio" id="options_'.$option_counter.'" name="selected_option" value="'. $option.'">
                    <label for="options_'.$option_counter.'">'.$option.'</label>
                </div>
            </li>';

            $option_counter++;
        }
        $rtntext.='</ul></div>';
        $rtntext.='<input type="submit" value="Submit" class="btn btn-small btn-outline-default qSubmit">';
        $rtntext.='</div>';
        $rtntext.='</div>';

        return $rtntext;
    }

    function qView_option_27($data,$grade_id,$subject_id,$topic_id,$start,$id_not_in){
        $rtntext='';
        $start=$start+1;
        $rtntext.=$this->qView_common_part($data,$start,$grade_id,$subject_id,$id_not_in,$topic_id );
        $form_serializedata=unserialize($data->form_data);
        //print_r($form_serializedata);
        $rtntext.='<input type="hidden" name="question_option" value="'.$form_serializedata['question_option'].'">';

        if($form_serializedata['put_num_box'] > 0) {

            if(!empty($form_serializedata['question_textbox'])) {
                $question_textbox_ar = array();
                $question_textbox = explode(']', $form_serializedata['question_textbox']);
                foreach ($question_textbox as $question_text) {
                    if(!empty($question_text)) {
                        $question_text_ar = explode( '|', $question_text );
                        $question_textbox_ar[$question_text_ar[0]] = $question_text_ar[1];
                    }
                }
            }

            $rtntext .= '<div class="putBoxes1">';
            $ans_textbox = $form_serializedata['ans_textbox'];
            if(!empty($ans_textbox)) {
                $ans_textbox_ar = array();
                $ans_textbox1 = explode(']', $ans_textbox);
                foreach($ans_textbox1 as $ans1) {
                    if(!empty($ans1)) {
                        $ans_textbox2 = explode( '|', $ans1 );
                        $ans_textbox3 = explode( ':', $ans_textbox2[0] );
                        $ans_textbox4 = explode( ':', $ans_textbox2[1] );
                        $ans_textbox_ar[$ans_textbox3[1]] = $ans_textbox4[1];
                    }
                }
            }
            for ( $i = 0; $i < $form_serializedata['put_num_box']; $i++ ) {
                $rtntext .= '<div class="putBox"><li><img src="'.$question_textbox_ar[$ans_textbox_ar[$i]].'" style="width: 50px; height: auto;" /></li></div>';
            }
            $rtntext .= '</div>';
        }
        $rtntext .= '<div style="clear: both;"></div>';
        if($form_serializedata['put_num_box'] > 0) {
            $rtntext .= '<div class="putBoxes">';
            for ( $i = 0; $i < $form_serializedata['put_num_box']; $i++ ) {
                $rtntext .= '<div class="putBox" data-id="'.$i.'"></div>';
            }
            $rtntext .= '</div>';
        }
        $rtntext .= '<div style="clear: both;"></div>';
        $rtntext .= '<div class="Put_uploaded_images">';
        if(!empty($form_serializedata['question_textbox'])) {
            $rtntext .= '<ul>';
            $question_textbox = explode(']', $form_serializedata['question_textbox']);
            foreach ($question_textbox as $question_text) {
                if(!empty($question_text)) {
                    $question_text_ar = explode( '|', $question_text );
                    $rtntext .= '<li data-title="' . $question_text_ar[0] . '"><img src="' . $question_text_ar[1] . '" style="width: 50px; height: auto;"/></li>';
                }
            }
            $rtntext .= '</ul>';
        }
        $rtntext .= '</div>';
        $rtntext .= '<input class="ans_textbox" type="hidden" name="qAns_box" value=""/>';
        $rtntext.='<input type="submit" value="Submit" class="btn btn-small btn-outline-default qSubmit">';
        $rtntext.='</div>';
        $rtntext.='</div>';

        return $rtntext;
    }

    function qView_option_28($data,$grade_id,$subject_id,$topic_id,$start,$id_not_in){
        $rtntext='';
        $start=$start+1;
        $rtntext.=$this->qView_common_part($data,$start,$grade_id,$subject_id,$id_not_in,$topic_id );
        $form_serializedata=unserialize($data->form_data);
        //print_r($form_serializedata);
        $rtntext.='<input type="hidden" name="question_option" value="'.$form_serializedata['question_option'].'">';
        $rtntext.='<div class="question_image">
                                            <img src="'.$form_serializedata['img'].'" alt="">
                                        </div>
                                        <div class="qAns_box">
                                            <p>Answer1: </p><span><input type="text" name="qAns_box1" class="form-control"></span><br>
                                            <p>Answer2: </p><span><input type="text" name="qAns_box2" class="form-control"></span>
                                        </div>';
        $rtntext.='<input type="submit" value="Submit" class="btn btn-small btn-outline-default qSubmit">';
        $rtntext.='</div>';
        $rtntext.='</div>';

        return $rtntext;
    }

    function qView_option_29($data,$grade_id,$subject_id,$topic_id,$start,$id_not_in){
        $rtntext='';
        $start=$start+1;
        $rtntext.=$this->qView_common_part($data,$start,$grade_id,$subject_id,$id_not_in,$topic_id );
        $form_serializedata=unserialize($data->form_data);
        //print_r($form_serializedata);
        $rtntext.='<input type="hidden" name="question_option" value="'.$form_serializedata['question_option'].'">';
        $rtntext.='<div id="DragDropImg"><img src="'.$form_serializedata['base_image'].'" /></div>';
        $rtntext.='<ul class="DragDropExtra">';
        $total = $form_serializedata['ans_textbox'];
        $rand = rand($total, ($total+5));
        for($i=0; $i<=$rand; $i++) {
            $rtntext .= '<li><img src="'.$form_serializedata['extra_image'].'" /></li>';
        }
        $rtntext.='</ul>';
        $rtntext.='<input type="hidden" name="qAns_box" value="0" class="qAns_box_dragDrop" />';
        $rtntext.='<input type="submit" value="Submit" class="btn btn-small btn-outline-default qSubmit">';
        $rtntext.='</div>';
        $rtntext.='</div>';

        return $rtntext;
    }
    function qView_option_31($data,$grade_id,$subject_id,$topic_id,$start,$id_not_in){
        $rtntext='';
        $start=$start+1;
        $rtntext.=$this->qView_common_part($data,$start,$grade_id,$subject_id,$id_not_in,$topic_id );
        $form_serializedata=unserialize($data->form_data);
        //print_r($form_serializedata);
        $rtntext.='<input type="hidden" name="question_option" value="'.$form_serializedata['question_option'].'">';
        $rtntext.='<div class="multiple_text_image">
        <div class="pre_text">'
            .$form_serializedata['ans_check_with'].'
        </div>
        <div class="question_box">';
        $option_counter=0;
        foreach ($form_serializedata['imgs'] as $imgs){
            if($option_counter==0){
                $rtntext.='            <div class="ans_text"><input type="text" name="qAns_box[]" class="form-control"></div>
                    <div class="ans_img"><img src="'.$imgs.'" alt="" class=""></div>';
            } else {
                $rtntext.='<div class="ans_operator">+</div>
                    <div class="ans_text"><input type="text" name="qAns_box[]" class="form-control"></div>
                    <div class="ans_img"><img src="'.$imgs.'" alt="" class=""></div>';
            }
            $option_counter++;
        }
        $rtntext.='</div>
    </div>';
        $rtntext.='<input type="submit" value="Submit" class="btn btn-small btn-outline-default qSubmit">';
        $rtntext.='</div>';
        $rtntext.='</div>';

        return $rtntext;
    }

    function qView_option_32($data,$grade_id,$subject_id,$topic_id,$start,$id_not_in){
        $rtntext='';
        $start=$start+1;
        $rtntext.=$this->qView_common_part($data,$start,$grade_id,$subject_id,$id_not_in,$topic_id );
        $form_serializedata=unserialize($data->form_data);
        //print_r($form_serializedata);
        $rtntext.='<input type="hidden" name="question_option" value="'.$form_serializedata['question_option'].'">';
        $rtntext.='<div class="row multiple_textbox"><div class="col-lg-12"><p>';
        $ans_textbox = $form_serializedata['ans_textbox1'];
        $s = explode('[', $ans_textbox);
        if(!empty($s)) {
            foreach ( $s as $sa ) {
                if ( stripos( $sa, ']' ) ) {
                    //echo $sa;
                    $saa = explode( ']', $sa );
                    $rtntext.= '<input class="form-control" name="qAns_box[]"/>';
                    $rtntext.= $saa[1];
                } else {
                    $rtntext.= $sa;
                }
            }
        }
        $rtntext.='</p></div></div>';
        $rtntext.='<input type="submit" value="Submit" class="btn btn-small btn-outline-default qSubmit">';
        $rtntext.='</div>';
        $rtntext.='</div>';

        return $rtntext;
    }
    function qView_option_33($data,$grade_id,$subject_id,$topic_id,$start,$id_not_in){
        $rtntext='';
        $start=$start+1;
        $rtntext.=$this->qView_common_part($data,$start,$grade_id,$subject_id,$id_not_in,$topic_id );
        $form_serializedata=unserialize($data->form_data);
        //print_r($form_serializedata);
        $rtntext.='<input type="hidden" name="question_option" value="'.$form_serializedata['question_option'].'">';
        $rtntext.='<div class="multiple_text_image">';

        $rtntext.='<div class="multiple_text_image">';
        if( $form_serializedata['qst_layout']== '1'){
            $rtntext.='<div class="question_box">';
            $option_counter=0;
            foreach ($form_serializedata['imgs'] as $imgs){
                if($option_counter==0){
                    $rtntext.= $form_serializedata['second_question'].' <div class="ans_img"><img src="'.$imgs.'" alt="" class=""></div>';
                } else {
                    $rtntext.='<div class="ans_operator">=</div>';
                    $rtntext.='<div class="ans_text"><input type="text" name="qAns_box" class="form-control"></div>';
                    $rtntext.='<div class="ans_img"><img src="'.$imgs.'" alt="" class=""></div>';
                }
                $option_counter++;
            }
        } else{
            foreach ($form_serializedata['imgs'] as $imgs){
                $rimg=$imgs;
            }
            for ($i=0;$i<$form_serializedata['second_question'];$i++){
                $rtntext.='<div class="ans_img"><img src="'.$imgs.'" alt="" class=""></div>';
            }
            $rtntext.='<br><div class="ans_text"><input type="text" name="qAns_box" class="form-control"></div>';
        }
        $rtntext.='</div>';
        $rtntext.='</div>';

        $rtntext.='<input type="submit" value="Submit" class="btn btn-small btn-outline-default qSubmit">';
        $rtntext.='</div>';
        $rtntext.='</div>';

        return $rtntext;
    }
    function qView_option_34($data,$grade_id,$subject_id,$topic_id,$start,$id_not_in){
        $rtntext='';
        $start=$start+1;
        $rtntext.=$this->qView_common_part($data,$start,$grade_id,$subject_id,$id_not_in,$topic_id );

        $form_serializedata=unserialize($data->form_data);
        //print_r($form_serializedata);
        $rtntext.='<input type="hidden" name="question_option" value="'.$form_serializedata['question_option'].'">';
        $img_array = explode('|',$form_serializedata['img_array']);
        if(!empty($img_array)){
            $rtntext.='<div class="row">';
            $rtntext.='   <div class="question_image">';
            $rtntext.='<img src="'. $form_serializedata['img'].'" alt="" class="img-thumbnail">';
            $rtntext.='</div>';
            $rtntext.='<div class="second_q">';
            $rtntext.='  <a href="javacript:void(0);" id="play_question1" data-question="'.($form_serializedata['second_question']).'"><i class="fa fa-volume-up"></i></a>'.$form_serializedata['second_question'];
            $rtntext.='</div>';
            $rtntext.='<input id="img_answer" type="hidden" name="img_answer" value="">';
            $i = 1;
            foreach($img_array as $img){

                $reversedParts = explode('/', strrev($img), 2);
                $img_name = strrev($reversedParts[0]);

                $rtntext.='<div class="col-lg-2">';
                $rtntext.='<div class="form-group">';
                $rtntext.='<div class="imgselector">';
                $rtntext.='<label for="img_'.$i.'">';
                $rtntext.='<img data-img_name="'.$img_name.'" src="'.$img.'" class="img-thumbnail" style="max-width: 100%;width: auto;height: 150px;">';
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
    function qView_option_35($data,$grade_id,$subject_id,$topic_id,$start,$id_not_in){
        $rtntext='';
        $start=$start+1;
        $rtntext.=$this->qView_common_part($data,$start,$grade_id,$subject_id,$id_not_in,$topic_id );

        $form_serializedata=unserialize($data->form_data);
        //print_r($form_serializedata);
        $rtntext.='<input type="hidden" name="question_option" value="'.$form_serializedata['question_option'].'">';

        $rtntext.= '<div class="imageQ_bg_img_wrap">';
	    if(!empty($form_serializedata['imageQ_bg_upload'])) {
	    	$rtntext.='<img src="'.$form_serializedata['imageQ_bg_upload'].'" />';
	    }
	    if(!empty($form_serializedata['question_textbox'])) {
		    //$question_textbox_ar = array();
		    $question_textbox = explode(']', $form_serializedata['question_textbox']);
		    foreach ($question_textbox as $question_text) {
			    if(!empty($question_text)) {
				    $question_text_ar = explode( '|', $question_text );
				    //$question_textbox_ar[$question_text_ar[0]] = $question_text_ar[1];
				    $pos = explode('|', $form_serializedata[str_replace('.', '_', $question_text_ar[0])]);
				    $rtntext.='<label style="top: '.$pos[0].'px; left: '.$pos[1].'px;" for="'.$question_text_ar[0].'"><img src="' .$question_text_ar[1].'" /></label>';
				    $rtntext.='<input type="checkbox" name="multiple_img[]" value="'.$question_text_ar[0].'" id="'.$question_text_ar[0].'"/>';
			    }
		    }
	    }


        $rtntext.='<input type="submit" value="Submit" class="btn btn-small btn-outline-default qSubmit">';
        $rtntext.='</div>';
        $rtntext.='</div>';

        return $rtntext;
    }
    function qView_common_part($data,$start,$grade_id,$subject_id,$id_not_in,$topic_id){
        $rtnt='';
        //echo $id_not_in;
        if(!empty($_POST['id_not_in'])){
            $id_not_in=$_POST['id_not_in'].','.$id_not_in;
        }
        $rtnt.='<input type="hidden" name="start" value="'.$start.'" />
                            <input type="hidden" name="grade_id" value="'.$grade_id.'" />
                            <input type="hidden" name="subject_id" value="'.$subject_id.'" />
                            <input type="hidden" name="id_not_in" value="'.$id_not_in.'" />
                            <input type="hidden" name="topic_id" value="'.$topic_id.'" />
                            <input type="hidden" name="problem_q_name" id="problem_q_name" value="'.$data->question_id.'" />';

        $rtnt.='<div class="row">';
        $rtnt.='<input type="hidden" class="question_id" name="question_id" value="'.$data->question_id.'">
                                <div class="col-lg-12">
                                    <div class="question_count">Q. <div class="question_display">'.$data->question_name.'</div> <a href="javacript:void(0);" id="play_question" data-question="'.($data->question_name).'"><i class="fa fa-volume-up"></i></a></div>
                                </div>';
        $rtnt.='<div class="col-lg-12">';
        return $rtnt;
    }
	public function save_ans_certificate(){
		//print_r($this->session->userdata('logged_in')); exit();
		if($this->session->userdata('logged_in')=='1'){

			$subject_id=$_POST['subject_id'];
			$grade_id=$_POST['grade_id'];
			$category_id=$_POST['category_id'];
			$topic_id=$_POST['topic_id'];
			$conditions=array('subject_id'=>$subject_id, 'grade_id'=>$grade_id, 'category_id'=>$category_id, 'topic_id'=>$topic_id);
			$certificates=$this->ajax_model->get_certificates($conditions,true);
			//print_r($certificates); exit();
			$values['certificate_id']=$certificates->id;
			$values['user_id']=get_current_user_id();
			$values['topic_id']=$topic_id;
			$values['subject_id']=$subject_id;
			$values['grade_id']=$grade_id;
			$values['submit_dt']=date('Y-m-d H:i:s');
			$userfullname=get_returnfield('user','id',get_current_user_id(),'fname').' '.get_returnfield('user','id',get_current_user_id(),'lname');
			$parent_id=get_parent(get_current_user_id());
			if($parent_id!='0'){
                $parent_email=get_returnfield('user','id',$parent_id,'email_address');
            }

			$insert=$this->ajax_model->insert_ans_certificate($values);
			if($insert){
			    if(!empty($parent_email)){
                    $subject='Certificate Issued Date: '. date('M d, Y');
                    $msg='Hello ,<br> One Certificate issued For this child: '.$userfullname.'.<br>Please Download this certificate from this link: '.base_url('dashboard/generate_pdf/'.$insert);
                    $to=$parent_email;
                    send_mail($to,$subject,$msg);
                }
				echo true;
			} else{
				echo false;
			}
		}

	}
    public function email_notification(){
        if($this->session->userdata('logged_in')=='1'){
            $student_id = get_current_user_id();
            $subject_name = $_POST['subject'];
            $grade_name = $_POST['grade'];
            $category_id = $_POST['category_id'];
            $topic_id = $_POST['topic_id'];
            $user_name = $_POST['user_name'];
            $total_question_attended = $_POST['tQ_attend'];
            $score_persentage = $_POST['score_persentage'];
//$parent_name = get_current_user_parent_name($student_id);
            $parent_email = get_current_user_parent_email($student_id);

            $to = 'bhulbhal1981@gmail.com';
            $subject = 'Sendgrid Testing';
            $message = '';
            $message .= '<table>';
            $message .= '<tr>';
            $message .= '<th style="width: 50px;">Grade</th>';
            $message .= '<td>'.$grade_name.'</td>';
            $message .= '</tr>';

            $message .= '<tr>';
            $message .= '<th style="width: 50px;">Subject</th>';
            $message .= '<td>'.$subject_name.'</td>';
            $message .= '</tr>';

            $message .= '<tr>';
            $message .= '<th style="width: 50px;">Category</th>';
            $message .= '<td>'.$parent_email.'</td>';
            $message .= '</tr>';

            $message .= '<tr>';
            $message .= '<th style="width: 50px;">Topic</th>';
//$message .= '<td>'..'</td>';
            $message .= '</tr>';

            $message .= '<tr>';
            $message .= '<th style="width: 50px;">User Name</th>';
            $message .= '<td>'.$user_name.'</td>';
            $message .= '</tr>';

            $message .= '<tr>';
            $message .= '<th style="width: 50px;">Total Question Attended</th>';
            $message .= '<td>'.$total_question_attended.'</td>';
            $message .= '</tr>';

            $message .= '<tr>';
            $message .= '<th style="width: 50px;">Score</th>';
            $message .= '<td>'.$score_persentage.'%</td>';
            $message .= '</tr>';
            $message .= '</table>';
            if(send_mail($to,$subject,$message)){
                echo 'mail send';
            } else {
                echo 'mail not send';
            }
        }
    }
    public function save_user_by_fb(){
        $action = $_POST['action'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        /*$picUrl = $_POST['picUrl'];*/

        $values['social_action']=$action;
        $values['fname']=$firstname;
        $values['lname']=$lastname;
        $values['email_address']=$email;
        $check_user=$this->ajax_model->check_social_login_exits($values);
        if($check_user){
            $this->session->set_userdata('user_id',$check_user->id);
            $this->session->set_userdata('logged_in','1');
            $this->session->set_userdata('email',$check_user->email_address);
            $this->session->set_userdata('user_type',get_returnfield('user_roles','id',$check_user->role,'name'));
            echo 'true';
            exit();
        } else{
            $save=$this->ajax_model->save_user_by_fb($values);
        }
       /* $values['picUrl']=$picUrl;*/

        if($save){
            $check_user=$this->ajax_model->check_social_login_exits($values);
            $this->session->set_userdata('user_id',$check_user->id);
            $this->session->set_userdata('logged_in','1');
            $this->session->set_userdata('email',$check_user->email_address);
            $this->session->set_userdata('user_type',get_returnfield('user_roles','id',$check_user->role,'name'));
            echo 'true';
        } else{
            echo 'false';
        }

    }
	function question_with_put_images(){
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
		if(!empty($img_array)) {
			foreach ( $img_array as $img ) {
				$reversedParts         = explode( '/', strrev( $img ), 2 );
				$img_name              = strrev( $reversedParts[0] );
				$uploaded_images_forms .= '<div class="item"><img src="' . $img . '" style="max-width: 40px;" /></div>';
			}
			$uploaded_images_forms .= '<div style="clear: both; margin-bottom: 100px;"></div>';
			echo $uploaded_images_forms;
		}
	}
	function award_click() {
		$award_click1 = serialize($_POST);
		$award_click = $this->ajax_model->award_click(array('id'=>$_POST['user_id']),$award_click1);
		if($award_click) {
			echo 1;
		}
    }
    function give_rating(){
        if(!empty($_POST['points'])){
            $post_id = $_POST['post_id'];
            $rating_default_number = 1;
            $points = $_POST['points'];
            
            //Check the rating row with same post ID
            $prevRatingQuery = "SELECT * FROM view_rating WHERE post_id = ".$post_id;
            $prevRatingResult = $db->query($prevRatingQuery);
            if($prevRatingResult->num_rows > 0):
                $prevRatingRow = $prevRatingResult->fetch_assoc();
                $rating_default_number = $prevRatingRow['rating_number'] + $rating_default_number;
                $points = $prevRatingRow['total_points'] + $points;
                //Update rating data into the database
                $query = "UPDATE view_rating SET rating_number = '".$rating_default_number."', total_points = '".$points."', modified = '".date("Y-m-d H:i:s")."' WHERE post_id = ".$post_id;
                $update = $db->query($query);
            else:
                //Insert rating data into the database
                $query = "INSERT INTO view_rating (post_id,rating_number,total_points,created,modified) VALUES(".$post_id.",'".$rating_default_number."','".$points."','".date("Y-m-d H:i:s")."','".date("Y-m-d H:i:s")."')";
                $insert = $db->query($query);
            endif;
            
            //Fetch rating deatails from database
            $query2 = "SELECT rating_number, FORMAT((total_points / rating_number),1) as average_rating FROM view_rating WHERE post_id = ".$post_id." AND status = 1";
            
            $result = $db->query($query2);
            $ratingRow = $result->fetch_assoc();
            
            if($ratingRow){
                $ratingRow['status'] = 'ok';
            }else{
                $ratingRow['status'] = 'err';
            }
            
            //Return json formatted rating data
            echo json_encode($ratingRow);

        }
    }
    public function search_worksheet(){
	    $where='';
        $html='';
        $title='Worksheet';
        $subject_title='';
        $grade_title='';
        $cat_title='';
        $topic_title='';

	    $subject_ids=(!empty($_POST['subject_ids']))?$_POST['subject_ids']:0;
	    $grade_ids=(!empty($_POST['grade_ids']))?$_POST['grade_ids']:0;
	    $cat_ids=(!empty($_POST['cat_ids']))?$_POST['cat_ids']:0;
	    $topic_ids=(!empty($_POST['topic_ids']))?$_POST['topic_ids']:0;
	    $subject_query = (!empty($subject_ids)) ? "work_subject_id IN (".$subject_ids.")" : "";
	    $grade_query = (!empty($grade_ids)) ? "work_grade_id IN (".$grade_ids.")" : "";
	    $cat_query = (!empty($cat_ids)) ? 'work_cat_id IN ('.$cat_ids.")" : "";
	    $topic_query = (!empty($topic_ids)) ? "work_topic_id IN (".$topic_ids.")" : "";
	    if(!empty($subject_query)){
	        $where.=(!empty($where))?' AND '.$subject_query : $subject_query;
            $subject_title=get_returnfield('work_subjects','id',$subject_ids,'name');
        }
        if(!empty($grade_query)){
            $where.=(!empty($where))?' AND '.$grade_query : $grade_query;
            $grade_title=get_returnfield('work_grades','id',$grade_ids,'name');
        }
        if(!empty($cat_query)){
            $where.=(!empty($where))?' AND '.$cat_query : $cat_query;
            $cat_title=get_returnfield('work_categories','id',$cat_ids,'name');
        }
        if(!empty($topic_query)){
            $where.=(!empty($where))?' AND '.$topic_query : $topic_query;
            $topic_title=get_returnfield('work_topics','id',$topic_ids,'name');
        }
        if(!empty($_POST['sort_by'])){
            $worksheets=$this->ajax_model->get_worksheets($where,$_POST['sort_by']);
        } else {
            $worksheets=$this->ajax_model->get_worksheets($where);
        }
        $worksheets=$this->ajax_model->get_worksheets($where,$_POST['sort_by']);
        if(!empty($worksheets)){
            $html.='<div id="test-list">
                                        <ul class="list row">';
            foreach ($worksheets as $worksheet) {
                $html.='
                 <li class="col-lg-3 col-md-4">
                 <div class="worksheet_box matchHeight1">
                                         <a href="'.base_url('worksheet/'.get_returnfield('work_grades','id',$worksheet->work_grade_id,'slug').'/'.get_returnfield('work_subjects','id',$worksheet->work_subject_id,'slug').'/'.get_returnfield('work_categories','id',$worksheet->work_cat_id,'slug').'/'.$worksheet->slug) .'">';
                if($worksheet->label!='No Label'){
                    $html.='<div class="work_list_label">

                                                    <span class="badge badge-default">'. $worksheet->label.'</span>
                                                </div>';
                }

                $html.='<div class="work_img">
                                                    <img src="'.$worksheet->worksheet_img.'" alt="">
                                                </div>
                                                <div class="work_name">
                                                    '.word_limiter($worksheet->name,3).'
                                                </div>';
                $total_point=get_returnfield('worksheet_rating','worksheet_id',$worksheet->id,'total_points');
                $rating_numbers=get_returnfield('worksheet_rating','worksheet_id',$worksheet->id,'rating_number');
                if($total_point!=0 && $rating_numbers!=0){
                    $percent= ($total_point/($rating_numbers*5))*100;
                } else{
                    $percent= 0;
                }
                $html.='<div class="work_details">
                                                    <div class="star_rating_list">
                                                        <span class="stars-container stars-10" style="--bubble-color:'. $percent .'% ">★★★★★</span>
                                                    </div>
                                                    <div class="details">'.
                                                        ucfirst(get_returnfield('work_grades','id',$worksheet->work_grade_id,'name')).'
                                                        &nbsp;&nbsp;&nbsp;'.ucfirst(get_returnfield('work_subjects','id',$worksheet->work_subject_id,'name')).'
                                                    </div>
                                                </div>';
                $html.='
                                            
                                            </a>
                                            </div>
                                        </li>
                ';
            }

            $html.='</ul>
<div class="pagination_box">
                                            <ul class="pagination"></ul>
                                            <ul class="prev_ul"><li class="next">
                                                    <a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>
                                                    </a>
                                                </li></ul>
                                        </div>
</div>';
        }
        if(!empty($subject_title)){
            $title=$subject_title.' Worksheets';
        }
        if(!empty($grade_title)){
            $title=$subject_title.' Worksheets for '. $grade_title;
        }
        if(!empty($topic_title)){
            $title=$topic_title.' '. $subject_title.' Worksheets for '. $grade_title;
        }
        if(empty($html)){
            $html='<h4>No data found!</h4>';
            $title='Worksheet';
        }
        $rtn=array();
        $rtn['title']=$title;
        $rtn['html']=$html;

        echo json_encode($rtn);
    }
    function add_to_favorite(){
	    $rtn=false;
	    $work_id=$_POST['work_id'];
	    $value['worksheet_id']=$work_id;
	    $value['user_id']=get_current_user_id();
	    $value['create_dt']=date('Y-m-d H:i:s');
	    $rtn=$this->ajax_model->add_to_favorite($value);
	    if($rtn){
	        echo true;
        } else{
	        echo false;
        }
    }
    function get_returnfield(){
	    $db=$_POST['table'];
        $p_field=$_POST['p_field'];
        $p_value=$_POST['p_value'];
        $r_field=$_POST['r_field'];
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
        echo $rtntext;
    }
    function login_check($user_type='user'){
        $CI = & get_instance();
        if($user_type=='admin'){
            $admin_logged_in = $CI->session->userdata('admin_logged_in');
        } else{
            $admin_logged_in = $CI->session->userdata('logged_in');
        }
        if($admin_logged_in == 1) {
            echo true;
        } else{
            echo false;
        }
    }
    function modal_login(){
        $user_login=array(
            'email_id'=>$this->input->post('username'),
            'pwd'=>md5($this->input->post('password'))

        );
        $data = $this->user_model->login_user($user_login['email_id'],$user_login['pwd']);
        //print_r($data); exit();
        if($data) {
            $this->session->set_userdata('user_id',$data['id']);
            $this->session->set_userdata('logged_in','1');
            $this->session->set_userdata('email',$data['email_address']);
            $this->session->set_userdata('user_type',get_returnfield('user_roles','id',$data['role'],'name'));
            /*if($this->input->post('remember_me')==true){
                $this->session->set_userdata('remember_me', $this->input->post('remember_me'));
            }*/
            if(!isUserType('student')) {
                $user = $this->user_model->get_user_by_id($data['id']);
                $childs = $this->user_model->get_child_data($data['id']);
                $data = array(
                    'title' => 'Welcome, who are you?',
                    'user' => $user,
                    'childs' => $childs
                );
                echo true;

            } else {
                echo true;
            }

        } else{
            echo false;

        }
    }
    public function modal_register(){
	    $rtn=array();
        $user = array(
            'fname' => $this->input->post('fname'),
            'lname' => $this->input->post('lname'),
            'email_address' => $this->input->post('email_address'),
            //'phone' => $this->input->post('phone'),
            'password' => md5($this->input->post('pwd1')),
            'role' => $this->input->post('user_type')
        );

        $email_check = $this->user_model->email_check($user['email_address']);

        if($email_check) {
            $return_id=$this->user_model->register_user($user);
            if($return_id){
                $msg = 'Welcome to AppleKitch<br /><br />Please click on the link to complete the registration process.<br><br>Activation Link :<a href="'.base_url('/register/activation').'/?email='.encripted($this->input->post('email_address')).'" target="_blank">'.base_url('/register/activation').'/?email='.encripted($this->input->post('email_address')).'</a><br><br>Regards,<br>AppleKitch';
                send_mail($this->input->post('email_address'), 'Activate your account', $msg);
                $rtn['msg']='Please check your email to complete the activation process';
                $rtn['status']=true;
            } else{
                $rtn['msg']='Try again later';
                $rtn['status']=false;
            }



        } else {
            $rtn['msg']='Email address already exists';
            $rtn['status']=false;

        }
        echo json_encode($rtn);
    }
    public function insert_rating(){
	    $worksheet_id=$_POST['worksheet_id'];
	    $rating=$_POST['rating'];
        $insert=$worksheet_id;
        $rat_value['worksheet_id']=$worksheet_id;

        $rat_value['rating_number']=1;
        $rat_value['total_points']=$rating;
        $rat_value['user_id']=get_current_user_id();
        $rat_value['created']=date('Y-m-d H:i:s');
        $rat_value['modified']=date('Y-m-d H:i:s');
        $insert_rating=$this->admin_model->insert_ratings($rat_value);
        if($insert_rating){
            echo true;
        } else{
            echo false;
        }
    }
    public function print_pdf(){
        $worksheet_id=$_POST['worksheet_id'];
        $worksheets=$this->ajax_model->get_worksheets(array('id'=>$worksheet_id));
        if(!empty($worksheets[0]->pdf_path)){
           echo $worksheets[0]->pdf_path;
        } else {
            echo '';
        }
    }
    public function download_pdf()
    {
        $worksheet_id = $_POST['worksheet_id'];
        $worksheets = $this->ajax_model->get_worksheets(array('id' => $worksheet_id));
        if (!empty($worksheets[0]->pdf_path)) {
            echo $worksheets[0]->pdf_path;
        } else {
            echo '';
        }
    }

    public function send_problem_ajax(){
        if(!empty($_POST['q_id'])){
            $qus=$this->ajax_model->get_questions(array('question_id'=>$_POST['q_id']),true);
            $subject='Report_problem';
            $message='One user submit a problem in this question. question details:<br>
                Question: '.$qus->question_name.'<br>';
            $to=admin_email();
            send_mail($to,$subject,$message);
            echo true;

        }
    }

}
