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
			//print_r($form_data); exit();
			$conditions=array('question_id'=>$question_id);
			$questions=$this->ajax_model->get_questions($conditions,true);
			$form_data_ans=unserialize($questions->form_data);
			$questions_next=$this->ajax_model->get_questions_by_one(array('grade_id'=>$grade_id,'subject_id'=>$subject_id,'topic_id'=>$topic_id),false,$start);
			$your_ans='';
			$correct_ans='';
			$html='';

			//print_r($question_form_data);exit);
			//print_r($questions_next);


				if ( $form_data['question_option'] == '1' ) {

					if ( ! empty( $questions_next ) ) {
						$question_form_data=unserialize($questions_next[0]->form_data);
						$qview_option = 'qView_option_' . $question_form_data['question_option'];
						$html = $this->$qview_option( $questions_next[0], $grade_id, $subject_id, $topic_id, $start );
					}
					if ( empty( $html ) ) {
						$html = '';
					}
					$rtntext['html'] = $html;
					$your_ans        = $form_data['qAns_box'];
					$correct_ans     = $form_data_ans['ans_textbox'];
					if ( strtolower( $correct_ans ) == strtolower( $your_ans ) ) {
						$this->session->set_userdata( 'score_ans', ( $form_data['answred'] + 1 ) );
						$this->session->set_userdata( 'score_smart', ( $form_data['score'] + $questions->q_score ) );
						$rtntext['score_ans']   = $this->session->userdata( 'score_ans' );
						$rtntext['score_smart'] = $this->session->userdata( 'score_smart' );
						$rtntext['type']        = 'true';
						$rtntext['content']     = 'Correct';

					} else {
						$this->session->set_userdata( 'score_ans', ( $form_data['answred'] + 1 ) );
						$rtntext['type']    = 'false';
						$rtntext['content'] = 'Wrong: Correct answer is : ' . $correct_ans;
					}
				} elseif ( $form_data['question_option'] == '2' ) {

					//print_r($form_data_ans);
					if ( ! empty( $questions_next ) ) {
						$question_form_data=unserialize($questions_next[0]->form_data);
						$qview_option = 'qView_option_' . $question_form_data['question_option'];
						$html = $this->$qview_option( $questions_next[0], $grade_id, $subject_id, $topic_id, $start );
					} else {
						$html = '';
					}
					$rtntext['html'] = $html;
					$your_ans        = $form_data['img_answer'];
					$correct_ans     = $form_data_ans['answer'];
					if ( strtolower( $correct_ans  ) == strtolower( $your_ans ) ) {
						$this->session->set_userdata( 'score_ans', ( $form_data['answred'] + 1 ) );
						$this->session->set_userdata( 'score_smart', ( $form_data['score'] + $questions->q_score ) );
						$rtntext['score_ans']   = $this->session->userdata( 'score_ans' );
						$rtntext['score_smart'] = $this->session->userdata( 'score_smart' );
						$rtntext['type']        = 'true';
						$rtntext['content']     = 'Correct';

					} else {
						$this->session->set_userdata( 'score_ans', ( $form_data['answred'] + 1 ) );
						$rtntext['type']    = 'false';
						$rtntext['content'] = 'Wrong: Correct answer is : ' . $form_data_ans['answer'];
					}
				} elseif ( $form_data['question_option'] == '3' ) {

					if ( ! empty( $questions_next ) ) {
						$question_form_data=unserialize($questions_next[0]->form_data);
						$qview_option = 'qView_option_' . $question_form_data['question_option'];
						$html = $this->$qview_option( $questions_next[0], $grade_id, $subject_id, $topic_id, $start );
					}
					if ( empty( $html ) ) {
						$html = '';
					}
					//echo $html; exit();
					$rtntext['html'] = $html;
					$your_ans        = $form_data['option_1'];
					$correct_ans     = $form_data_ans['ans_textbox'];
					if ( strtolower( $correct_ans ) == strtolower( $your_ans ) ) {
						$this->session->set_userdata( 'score_ans', ( $form_data['answred'] + 1 ) );
						$this->session->set_userdata( 'score_smart', ( $form_data['score'] + $questions->q_score ) );
						$rtntext['score_ans']   = $this->session->userdata( 'score_ans' );
						$rtntext['score_smart'] = $this->session->userdata( 'score_smart' );
						$rtntext['type']        = 'true';
						$rtntext['content']     = 'Correct';
					} else {
						$this->session->set_userdata( 'score_ans', ( $form_data['answred'] + 1 ) );
						$rtntext['type']    = 'false';
						$rtntext['content'] = 'Wrong: Correct answer is : ' . $correct_ans;
					}
				} elseif ( $form_data['question_option'] == '6' ) {

					if ( ! empty( $questions_next ) ) {
						$question_form_data=unserialize($questions_next[0]->form_data);
						$qview_option = 'qView_option_' . $question_form_data['question_option'];
						$html = $this->$qview_option( $questions_next[0], $grade_id, $subject_id, $topic_id, $start );
					}
					if ( empty( $html ) ) {
						$html = '';
					}
					//echo $html; exit();
					$rtntext['html'] = $html;
					$your_ans        = $form_data['option_1'];
					$correct_ans     = $form_data_ans['ans_textbox'];
					if ( strtolower( $correct_ans ) == strtolower( $your_ans ) ) {
						$this->session->set_userdata( 'score_ans', ( $form_data['answred'] + 1 ) );
						$this->session->set_userdata( 'score_smart', ( $form_data['score'] + $questions->q_score ) );
						$rtntext['score_ans']   = $this->session->userdata( 'score_ans' );
						$rtntext['score_smart'] = $this->session->userdata( 'score_smart' );
						$rtntext['type']        = 'true';
						$rtntext['content']     = 'Correct';
					} else {
						$this->session->set_userdata( 'score_ans', ( $form_data['answred'] + 1 ) );
						$rtntext['type']    = 'false';
						$rtntext['content'] = 'Wrong: Correct answer is : ' . $correct_ans;
					}
				} elseif ( $form_data['question_option'] == '8' ) {

					//print_r($questions_next);
					if ( ! empty( $questions_next ) ) {
						$question_form_data=unserialize($questions_next[0]->form_data);
						$qview_option = 'qView_option_' . $question_form_data['question_option'];
						$html = $this->$qview_option( $questions_next[0], $grade_id, $subject_id, $topic_id, $start );
					} else {
						$html = '';
					}
					$rtntext['html'] = $html;
					$img_answer      = explode( ',', $form_data['img_answer'] );
					$your_ans        = $img_answer;
					$correct_ans     = $form_data_ans['answer'];
					if ( $correct_ans == $your_ans ) {
						$this->session->set_userdata( 'score_ans', ( $form_data['answred'] + 1 ) );
						$this->session->set_userdata( 'score_smart', ( $form_data['score'] + $questions->q_score ) );
						$rtntext['score_ans']   = $this->session->userdata( 'score_ans' );
						$rtntext['score_smart'] = $this->session->userdata( 'score_smart' );
						$rtntext['type']        = 'true';
						$rtntext['content']     = 'Correct';
					} else {
						$this->session->set_userdata( 'score_ans', ( $form_data['answred'] + 1 ) );
						$rtntext['type']    = 'false';
						$rtntext['content'] = 'Wrong';
					}
				} elseif ( $form_data['question_option'] == '9' ) {

					if ( ! empty( $questions_next ) ) {
						$question_form_data=unserialize($questions_next[0]->form_data);
						$qview_option = 'qView_option_' . $question_form_data['question_option'];
						$html = $this->$qview_option( $questions_next[0], $grade_id, $subject_id, $topic_id, $start );
					}
					if ( empty( $html ) ) {
						$html = '';
					}
					//echo $html; exit();
					$rtntext['html'] = $html;
					$your_ans        = $form_data['option_1'];
					$correct_ans     = $form_data_ans['ans_textbox'];
					if ( strtolower( $correct_ans ) == strtolower( $your_ans ) ) {
						$this->session->set_userdata( 'score_ans', ( $form_data['answred'] + 1 ) );
						$this->session->set_userdata( 'score_smart', ( $form_data['score'] + $questions->q_score ) );
						$rtntext['score_ans']   = $this->session->userdata( 'score_ans' );
						$rtntext['score_smart'] = $this->session->userdata( 'score_smart' );
						$rtntext['type']        = 'true';
						$rtntext['content']     = 'Correct';
					} else {
						$this->session->set_userdata( 'score_ans', ( $form_data['answred'] + 1 ) );
						$rtntext['type']    = 'false';
						$rtntext['content'] = 'Wrong: Correct answer is : ' . $correct_ans;
					}
				} elseif ( $form_data['question_option'] == '11' ) {

					if ( ! empty( $questions_next ) ) {
						$question_form_data=unserialize($questions_next[0]->form_data);
						$qview_option = 'qView_option_' . $question_form_data['question_option'];
						$html = $this->$qview_option( $questions_next[0], $grade_id, $subject_id, $topic_id, $start );
					}
					if ( empty( $html ) ) {
						$html = '';
					}
					$rtntext['html'] = $html;
					$your_ans        = $form_data['qAns_box'];
					$correct_ans     = $form_data_ans['ans_textbox'];
					if ( strtolower( $correct_ans ) == strtolower( $your_ans ) ) {
						$this->session->set_userdata( 'score_ans', ( $form_data['answred'] + 1 ) );
						$this->session->set_userdata( 'score_smart', ( $form_data['score'] + $questions->q_score ) );
						$rtntext['score_ans']   = $this->session->userdata( 'score_ans' );
						$rtntext['score_smart'] = $this->session->userdata( 'score_smart' );
						$rtntext['type']        = 'true';
						$rtntext['content']     = 'Correct';

					} else {
						$this->session->set_userdata( 'score_ans', ( $form_data['answred'] + 1 ) );
						$rtntext['type']    = 'false';
						$rtntext['content'] = 'Wrong: Correct answer is : ' . $correct_ans;
					}
				} elseif ( $form_data['question_option'] == '12' ) {

					if ( ! empty( $questions_next ) ) {
						$question_form_data=unserialize($questions_next[0]->form_data);
						$qview_option = 'qView_option_' . $question_form_data['question_option'];
						$html = $this->$qview_option( $questions_next[0], $grade_id, $subject_id, $topic_id, $start );
					}
					if ( empty( $html ) ) {
						$html = '';
					}
					$rtntext['html'] = $html;
					$your_ans        = $form_data['qAns_box'];
					$correct_ans     = $form_data_ans['ans_textbox'];
					if ( $correct_ans == $your_ans ) {
						$this->session->set_userdata( 'score_ans', ( $form_data['answred'] + 1 ) );
						$this->session->set_userdata( 'score_smart', ( $form_data['score'] + $questions->q_score ) );
						$rtntext['score_ans']   = $this->session->userdata( 'score_ans' );
						$rtntext['score_smart'] = $this->session->userdata( 'score_smart' );
						$rtntext['type']        = 'true';
						$rtntext['content']     = 'Correct';

					} else {
						$this->session->set_userdata( 'score_ans', ( $form_data['answred'] + 1 ) );
						$rtntext['type']    = 'false';
						$rtntext['content'] = 'Wrong: Correct answer is : ' . $correct_ans;
					}
				} elseif ( $form_data['question_option'] == '14' ) {

					if ( ! empty( $questions_next ) ) {
						$question_form_data=unserialize($questions_next[0]->form_data);
						$qview_option = 'qView_option_' . $question_form_data['question_option'];
						$html = $this->$qview_option( $questions_next[0], $grade_id, $subject_id, $topic_id, $start );
					}
					if ( empty( $html ) ) {
						$html = '';
					}
					//echo $html; exit();
					$rtntext['html'] = $html;
					$your_ans        = $form_data['option_1'];
					$correct_ans     = $form_data_ans['ans_textbox'];
					if ( strtolower( $correct_ans ) == strtolower( $your_ans ) ) {
						$this->session->set_userdata( 'score_ans', ( $form_data['answred'] + 1 ) );
						$this->session->set_userdata( 'score_smart', ( $form_data['score'] + $questions->q_score ) );
						$rtntext['score_ans']   = $this->session->userdata( 'score_ans' );
						$rtntext['score_smart'] = $this->session->userdata( 'score_smart' );
						$rtntext['type']        = 'true';
						$rtntext['content']     = 'Correct';
					} else {
						$this->session->set_userdata( 'score_ans', ( $form_data['answred'] + 1 ) );
						$rtntext['type']    = 'false';
						$rtntext['content'] = 'Wrong: Correct answer is : ' . $correct_ans;
					}
				} elseif ( $form_data['question_option'] == '15' ) {

					//print_r($questions_next);
					if ( ! empty( $questions_next ) ) {
						$question_form_data=unserialize($questions_next[0]->form_data);
						$qview_option = 'qView_option_' . $question_form_data['question_option'];
						$html = $this->$qview_option( $questions_next[0], $grade_id, $subject_id, $topic_id, $start );
					} else {
						$html = '';
					}
					$rtntext['html'] = $html;
					$your_ans        = $form_data['img_answer'];
					$correct_ans     = $form_data_ans['answer'];
					if ( strtolower( $correct_ans ) == strtolower( $your_ans ) ) {
						$this->session->set_userdata( 'score_ans', ( $form_data['answred'] + 1 ) );
						$this->session->set_userdata( 'score_smart', ( $form_data['score'] + $questions->q_score ) );
						$rtntext['score_ans']   = $this->session->userdata( 'score_ans' );
						$rtntext['score_smart'] = $this->session->userdata( 'score_smart' );
						$rtntext['type']        = 'true';
						$rtntext['content']     = 'Correct';

					} else {
						$this->session->set_userdata( 'score_ans', ( $form_data['answred'] + 1 ) );
						$rtntext['type']    = 'false';
						$rtntext['content'] = 'Wrong: Correct answer is : ' . $form_data_ans['answer'];
					}
				} elseif ( $form_data['question_option'] == '5' ) {

					if ( ! empty( $questions_next ) ) {
						$question_form_data=unserialize($questions_next[0]->form_data);
						$qview_option = 'qView_option_' . $question_form_data['question_option'];
						$html = $this->$qview_option( $questions_next[0], $grade_id, $subject_id, $topic_id, $start );
					}
					if ( empty( $html ) ) {
						$html = '';
					}
					//echo $html; exit();
					$rtntext['html'] = $html;
					$your_ans        = $form_data['option_arrange'];
					$correct_ans     = $form_data_ans['option_arrange'];
					if ( $correct_ans == $your_ans ) {
						$this->session->set_userdata( 'score_ans', ( $form_data['answred'] + 1 ) );
						$this->session->set_userdata( 'score_smart', ( $form_data['score'] + $questions->q_score ) );
						$rtntext['score_ans']   = $this->session->userdata( 'score_ans' );
						$rtntext['score_smart'] = $this->session->userdata( 'score_smart' );
						$rtntext['type']        = 'true';
						$rtntext['content']     = 'Correct';
					} else {
						$this->session->set_userdata( 'score_ans', ( $form_data['answred'] + 1 ) );
						$rtntext['type']    = 'false';
						if(is_array($correct_ans))
						    $rtntext['content'] = 'Wrong: Correct answer is : ' . serialize($correct_ans);
						else
                            $rtntext['content'] = 'Wrong: Correct answer is : ' . $correct_ans;
					}
				} elseif ( $form_data['question_option'] == '13' ) {

					if ( ! empty( $questions_next ) ) {
						$question_form_data=unserialize($questions_next[0]->form_data);
						$qview_option = 'qView_option_' . $question_form_data['question_option'];
						$html = $this->$qview_option( $questions_next[0], $grade_id, $subject_id, $topic_id, $start );
					}
					if ( empty( $html ) ) {
						$html = '';
					}
					//echo $html; exit();
					$rtntext['html'] = $html;
					$your_ans        = $form_data['option_1'];
					$correct_ans     = $form_data_ans['ans_textbox'];
					if ( strtolower( $correct_ans ) == strtolower( $your_ans ) ) {
						$this->session->set_userdata( 'score_ans', ( $form_data['answred'] + 1 ) );
						$this->session->set_userdata( 'score_smart', ( $form_data['score'] + $questions->q_score ) );
						$rtntext['score_ans']   = $this->session->userdata( 'score_ans' );
						$rtntext['score_smart'] = $this->session->userdata( 'score_smart' );
						$rtntext['type']        = 'true';
						$rtntext['content']     = 'Correct';
					} else {
						$this->session->set_userdata( 'score_ans', ( $form_data['answred'] + 1 ) );
						$rtntext['type']    = 'false';
						$rtntext['content'] = 'Wrong: Correct answer is : ' . $correct_ans;
					}
				} elseif ( $form_data['question_option'] == '18' ) {

                    if ( ! empty( $questions_next ) ) {
                        $question_form_data=unserialize($questions_next[0]->form_data);
                        $qview_option = 'qView_option_' . $question_form_data['question_option'];
                        $html = $this->$qview_option( $questions_next[0], $grade_id, $subject_id, $topic_id, $start );
                    }
                    if ( empty( $html ) ) {
                        $html = '';
                    }
                    $rtntext['html'] = $html;
                    $your_ans     = $form_data['qAns_box1'] . 'and' .$form_data['qAns_box2'];
                    $correct_ans     = $form_data_ans['ans_textbox1']. 'and' .$form_data_ans['ans_textbox2'];
                    if ( strtolower( $correct_ans ) == strtolower( $your_ans) ) {
                        $this->session->set_userdata( 'score_ans', ( $form_data['answred'] + 1 ) );
                        $this->session->set_userdata( 'score_smart', ( $form_data['score'] + $questions->q_score ) );
                        $rtntext['score_ans']   = $this->session->userdata( 'score_ans' );
                        $rtntext['score_smart'] = $this->session->userdata( 'score_smart' );
                        $rtntext['type']        = 'true';
                        $rtntext['content']     = 'Correct';

                    } else {
                        $this->session->set_userdata( 'score_ans', ( $form_data['answred'] + 1 ) );
                        $rtntext['type']    = 'false';
                        $rtntext['content'] = 'Wrong: Correct answer is : ' . $correct_ans;
                    }
                } elseif ( $form_data['question_option'] == '20' ) {

					if ( ! empty( $questions_next ) ) {
						$question_form_data=unserialize($questions_next[0]->form_data);
						$qview_option = 'qView_option_' . $question_form_data['question_option'];
						$html = $this->$qview_option( $questions_next[0], $grade_id, $subject_id, $topic_id, $start );
					}
					if ( empty( $html ) ) {
						$html = '';

					}
					//echo $html; exit();
					$rtntext['html'] = $html;
					$your_ans        = $form_data['option_1'];
					$correct_ans     = $form_data_ans['ans_textbox'];
					if ( strtolower( $correct_ans ) == strtolower( $your_ans ) ) {
						$this->session->set_userdata( 'score_ans', ( $form_data['answred'] + 1 ) );
						$this->session->set_userdata( 'score_smart', ( $form_data['score'] + $questions->q_score ) );
						$rtntext['score_ans']   = $this->session->userdata( 'score_ans' );
						$rtntext['score_smart'] = $this->session->userdata( 'score_smart' );
						$rtntext['type']        = 'true';
						$rtntext['content']     = 'Correct';
					} else {
						$this->session->set_userdata( 'score_ans', ( $form_data['answred'] + 1 ) );
						$rtntext['type']    = 'false';
						$rtntext['content'] = 'Wrong: Correct answer is : ' . $correct_ans;
					}
				} elseif ( $form_data['question_option'] == '26' ) {

					if ( ! empty( $questions_next ) ) {
						$question_form_data=unserialize($questions_next[0]->form_data);
						$qview_option = 'qView_option_' . $question_form_data['question_option'];
						$html = $this->$qview_option( $questions_next[0], $grade_id, $subject_id, $topic_id, $start );
					}
					if ( empty( $html ) ) {
						$html = '';
					}

					$rtntext['html'] = $html;
					$your_ans        = $form_data['selected_option'];
					$correct_ans     = $form_data_ans['ans_textbox'];
					if ( $correct_ans == $your_ans ) {
						$this->session->set_userdata( 'score_ans', ( $form_data['answred'] + 1 ) );
						$this->session->set_userdata( 'score_smart', ( $form_data['score'] + $questions->q_score ) );
						$rtntext['score_ans']   = $this->session->userdata( 'score_ans' );
						$rtntext['score_smart'] = $this->session->userdata( 'score_smart' );
						$rtntext['type']        = 'true';
						$rtntext['content']     = 'Correct';
					} else {
						$this->session->set_userdata( 'score_ans', ( $form_data['answred'] + 1 ) );
						$rtntext['type']    = 'false';
						$rtntext['content'] = 'Wrong: Correct answer is : ' . $correct_ans;
					}
				} elseif ( $form_data['question_option'] == '27' ) {

					if ( ! empty( $questions_next ) ) {
						$question_form_data=unserialize($questions_next[0]->form_data);
						$qview_option = 'qView_option_' . $question_form_data['question_option'];
						$html = $this->$qview_option( $questions_next[0], $grade_id, $subject_id, $topic_id, $start );
					}
					if ( empty( $html ) ) {
						$html = '';
					}
					$rtntext['html'] = $html;
					//print_r($form_data_ans); exit();
					$your_ans     = $form_data['qAns_box'];
					$correct_ans     = $form_data_ans['ans_textbox'];
					if ( $correct_ans == $your_ans ) {
						$this->session->set_userdata( 'score_ans', ( $form_data['answred'] + 1 ) );
						$this->session->set_userdata( 'score_smart', ( $form_data['score'] + $questions->q_score ) );
						$rtntext['score_ans']   = $this->session->userdata( 'score_ans' );
						$rtntext['score_smart'] = $this->session->userdata( 'score_smart' );
						$rtntext['type']        = 'true';
						$rtntext['content']     = 'Correct';

					} else {
						$this->session->set_userdata( 'score_ans', ( $form_data['answred'] + 1 ) );
						$rtntext['type']    = 'false';
						$rtntext['content'] = 'Wrong: Correct answer is : ';
					}
				} elseif ( $form_data['question_option'] == '28' ) {

                    if ( ! empty( $questions_next ) ) {
                        $question_form_data=unserialize($questions_next[0]->form_data);
                        $qview_option = 'qView_option_' . $question_form_data['question_option'];
                        $html = $this->$qview_option( $questions_next[0], $grade_id, $subject_id, $topic_id, $start );
                    }
                    if ( empty( $html ) ) {
                        $html = '';
                    }
                    $rtntext['html'] = $html;
                    //print_r($form_data_ans); exit();
                    $your_ans     = $form_data['qAns_box1'] . 'and' .$form_data['qAns_box2'];
                    $correct_ans     = $form_data_ans['ans_textbox1']. 'and' .$form_data_ans['ans_textbox2'];
                    if ( strtolower( $correct_ans ) == strtolower( $your_ans) ) {
                        $this->session->set_userdata( 'score_ans', ( $form_data['answred'] + 1 ) );
                        $this->session->set_userdata( 'score_smart', ( $form_data['score'] + $questions->q_score ) );
                        $rtntext['score_ans']   = $this->session->userdata( 'score_ans' );
                        $rtntext['score_smart'] = $this->session->userdata( 'score_smart' );
                        $rtntext['type']        = 'true';
                        $rtntext['content']     = 'Correct';

                    } else {
                        $this->session->set_userdata( 'score_ans', ( $form_data['answred'] + 1 ) );
                        $rtntext['type']    = 'false';
                        $rtntext['content'] = 'Wrong: Correct answer is : ' . $correct_ans;
                    }
				} elseif ( $form_data['question_option'] == '29' ) {
					if ( ! empty( $questions_next ) ) {
						$question_form_data=unserialize($questions_next[0]->form_data);
						$qview_option = 'qView_option_' . $question_form_data['question_option'];
						$html = $this->$qview_option( $questions_next[0], $grade_id, $subject_id, $topic_id, $start );
					}
					if ( empty( $html ) ) {
						$html = '';
					}
					//echo $html; exit();
					$rtntext['html'] = $html;
					$your_ans        = $form_data['qAns_box'];
					$correct_ans     = $form_data_ans['ans_textbox'];
					if ( $correct_ans == $your_ans ) {
						$this->session->set_userdata( 'score_ans', ( $form_data['answred'] + 1 ) );
						$this->session->set_userdata( 'score_smart', ( $form_data['score'] + $questions->q_score ) );
						$rtntext['score_ans']   = $this->session->userdata( 'score_ans' );
						$rtntext['score_smart'] = $this->session->userdata( 'score_smart' );
						$rtntext['type']        = 'true';
						$rtntext['content']     = 'Correct';
					} else {
						$this->session->set_userdata( 'score_ans', ( $form_data['answred'] + 1 ) );
						$rtntext['type']    = 'false';
						$rtntext['content'] = 'Wrong: Correct answer is : ' . $correct_ans;
					}
                } elseif ( $form_data['question_option'] == '31' ) {

                    if ( ! empty( $questions_next ) ) {
                        $question_form_data=unserialize($questions_next[0]->form_data);
                        $qview_option = 'qView_option_' . $question_form_data['question_option'];
                        $html = $this->$qview_option( $questions_next[0], $grade_id, $subject_id, $topic_id, $start );
                    }
                    if ( empty( $html ) ) {
                        $html = '';
                    }
                    $rtntext['html'] = $html;
                    //print_r($form_data_ans); exit();
                    $ans='';
                    $counter_ans=0;
                    $yans='';
                    $ycounter_ans=0;
                    foreach ($form_data_ans['option_1'] as $option_1){
                        if($counter_ans==0){
                            $ans.=$option_1;
                        } else{
                            $ans.='|'.$option_1;
                        }
                        $counter_ans++;
                    }
                    foreach ($form_data['qAns_box'] as $option_1){
                        if($ycounter_ans==0){
                            $yans.=$option_1;
                        } else{
                            $yans.='|'.$option_1;
                        }
                        $ycounter_ans++;
                    }
                    $your_ans     = $yans;
                    $correct_ans     = $ans;
                    if ( strtolower( $correct_ans ) == strtolower( $your_ans) ) {
                        $this->session->set_userdata( 'score_ans', ( $form_data['answred'] + 1 ) );
                        $this->session->set_userdata( 'score_smart', ( $form_data['score'] + $questions->q_score ) );
                        $rtntext['score_ans']   = $this->session->userdata( 'score_ans' );
                        $rtntext['score_smart'] = $this->session->userdata( 'score_smart' );
                        $rtntext['type']        = 'true';
                        $rtntext['content']     = 'Correct';

                    } else {
                        $this->session->set_userdata( 'score_ans', ( $form_data['answred'] + 1 ) );
                        $rtntext['type']    = 'false';
                        $rtntext['content'] = 'Wrong: Correct answer is : ' . $ans;
                    }
				} elseif ( $form_data['question_option'] == '32' ) {
					if ( ! empty( $questions_next ) ) {
						$question_form_data=unserialize($questions_next[0]->form_data);
						$qview_option = 'qView_option_' . $question_form_data['question_option'];
						$html = $this->$qview_option( $questions_next[0], $grade_id, $subject_id, $topic_id, $start );
					}
					if ( empty( $html ) ) {
						$html = '';
					}
					//echo $html; exit();
					$rtntext['html'] = $html;
					$your_ans        = $form_data['qAns_box'];
					$correct_ans     = $form_data_ans['ans_textbox'];
					if ( json_encode($correct_ans) == json_encode($your_ans) ) {
						$this->session->set_userdata( 'score_ans', ( $form_data['answred'] + 1 ) );
						$this->session->set_userdata( 'score_smart', ( $form_data['score'] + $questions->q_score ) );
						$rtntext['score_ans']   = $this->session->userdata( 'score_ans' );
						$rtntext['score_smart'] = $this->session->userdata( 'score_smart' );
						$rtntext['type']        = 'true';
						$rtntext['content']     = 'Correct';
					} else {
						$this->session->set_userdata( 'score_ans', ( $form_data['answred'] + 1 ) );
						$rtntext['type']    = 'false';
						$rtntext['content'] = 'Wrong: Correct answer is : ' . $form_data_ans['ans_textbox1'];
					}
                } elseif ( $form_data['question_option'] == '33' ) {

                    if ( ! empty( $questions_next ) ) {
                        $question_form_data=unserialize($questions_next[0]->form_data);
                        $qview_option = 'qView_option_' . $question_form_data['question_option'];
                        $html = $this->$qview_option( $questions_next[0], $grade_id, $subject_id, $topic_id, $start );
                    }
                    if ( empty( $html ) ) {
                        $html = '';
                    }
                    //echo $html; exit();
                    $rtntext['html'] = $html;
                    $your_ans        = $form_data['qAns_box'];
                    $correct_ans     = $form_data_ans['ans_textbox'];
                    if ( strtolower( $correct_ans ) == strtolower( $your_ans ) ) {
                        $this->session->set_userdata( 'score_ans', ( $form_data['answred'] + 1 ) );
                        $this->session->set_userdata( 'score_smart', ( $form_data['score'] + $questions->q_score ) );
                        $rtntext['score_ans']   = $this->session->userdata( 'score_ans' );
                        $rtntext['score_smart'] = $this->session->userdata( 'score_smart' );
                        $rtntext['type']        = 'true';
                        $rtntext['content']     = 'Correct';
                    } else {
                        $this->session->set_userdata( 'score_ans', ( $form_data['answred'] + 1 ) );
                        $rtntext['type']    = 'false';
                        $rtntext['content'] = 'Wrong: Correct answer is : ' . $correct_ans;
                    }
                } elseif ( $form_data['question_option'] == '34' ) {

                    //print_r($form_data_ans);
                    if ( ! empty( $questions_next ) ) {
                        $question_form_data=unserialize($questions_next[0]->form_data);
                        $qview_option = 'qView_option_' . $question_form_data['question_option'];
                        $html = $this->$qview_option( $questions_next[0], $grade_id, $subject_id, $topic_id, $start );
                    } else {
                        $html = '';
                    }
                    $rtntext['html'] = $html;
                    $your_ans        = $form_data['img_answer'];
                    $correct_ans     = $form_data_ans['answer'];
                    if ( strtolower( $correct_ans  ) == strtolower( $your_ans ) ) {
                        $this->session->set_userdata( 'score_ans', ( $form_data['answred'] + 1 ) );
                        $this->session->set_userdata( 'score_smart', ( $form_data['score'] + $questions->q_score ) );
                        $rtntext['score_ans']   = $this->session->userdata( 'score_ans' );
                        $rtntext['score_smart'] = $this->session->userdata( 'score_smart' );
                        $rtntext['type']        = 'true';
                        $rtntext['content']     = 'Correct';

                    } else {
                        $this->session->set_userdata( 'score_ans', ( $form_data['answred'] + 1 ) );
                        $rtntext['type']    = 'false';
                        $rtntext['content'] = 'Wrong: Correct answer is : ' . $form_data_ans['answer'];
                    }
                }




			/// premium user save data in database
			if(loginCheck() && get_returnfield('user','id',get_current_user_id(),'membership_plan')=='1'){
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
			//$rtntext['tQ_attend']=$this->session->userdata('score_ans');
			//$rtntext['tQ_score']=$this->session->userdata('score_smart');
			$rtntext['total_time']=$form_data['total_time_inSecond'];
			$rtntext['your_ans']=$your_ans;
			$rtntext['correct_ans']=$correct_ans;
			//print_r($form_data_ans); exit();
			$rtntext['qRight_feedback']=(!empty($form_data_ans['qRight_feedback'])) ? $form_data_ans['qRight_feedback']:'Correct';
			$rtntext['qWrong_feedback']=(!empty($form_data_ans['qWrong_feedback'])) ? $form_data_ans['qWrong_feedback']:$rtntext['content'];
			$rtntext['tQ_score']=$this->session->userdata('total_qScore');

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

	function qView_option_1($data,$grade_id,$subject_id,$topic_id,$start){
		$rtntext='';
		$start=$start+1;
		$rtntext.='<input type="hidden" name="start" value="'.$start.'" />
                            <input type="hidden" name="grade_id" value="'.$grade_id.'" />
                            <input type="hidden" name="subject_id" value="'.$subject_id.'" />
                            <input type="hidden" name="topic_id" value="'.$topic_id.'" />';
		$rtntext.='<div class="row">';
		$rtntext.='<input type="hidden" class="question_id" name="question_id" value="'.$data->question_id.'">
                                <div class="col-lg-5">
                                    <div class="question_count">Question <a href="javacript:void(0);" id="play_question" data-question="<?php echo ($data->question_name); ?>"><i class="fas fa-volume-up"></i></a></div>
                                            <div class="question_display">'.$data->question_name.'</div>
                                </div>';
		$rtntext.='<div class="col-lg-7">';
		$form_serializedata=unserialize($data->form_data);
		//print_r($form_serializedata);
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
	function qView_option_2($data,$grade_id,$subject_id,$topic_id,$start){
		//echo 'start'; exit();
		$rtntext='';
		$start=$start+1;
		$rtntext.='<input type="hidden" name="start" value="'.$start.'" />
                            <input type="hidden" name="grade_id" value="'.$grade_id.'" />
                            <input type="hidden" name="subject_id" value="'.$subject_id.'" />
                            <input type="hidden" name="topic_id" value="'.$topic_id.'" />';
		$rtntext.='<div class="row">';
		$rtntext.='<input type="hidden" class="question_id" name="question_id" value="'.$data->question_id.'">
                                <div class="col-lg-5">
                                    <div class="question_count">Question <a href="javacript:void(0);" id="play_question" data-question="<?php echo ($data->question_name); ?>"><i class="fas fa-volume-up"></i></a></div>
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
	function qView_option_3($data,$grade_id,$subject_id,$topic_id,$start){
		$rtntext='';
		$start=$start+1;
		$rtntext.='<input type="hidden" name="start" value="'.$start.'" />
                            <input type="hidden" name="grade_id" value="'.$grade_id.'" />
                            <input type="hidden" name="subject_id" value="'.$subject_id.'" />
                            <input type="hidden" name="topic_id" value="'.$topic_id.'" />';
		$rtntext.='<div class="row">';
		$rtntext.='<input type="hidden" class="question_id" name="question_id" value="'.$data->question_id.'">
                                <div class="col-lg-5">
                                    <div class="question_count">Question <a href="javacript:void(0);" id="play_question" data-question="'.$data->question_name.'"><i class="fas fa-volume-up"></i></a></div>
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
	function qView_option_5($data,$grade_id,$subject_id,$topic_id,$start){
		$rtntext='';
		$start=$start+1;
		$rtntext.='<input type="hidden" name="start" value="'.$start.'" />
                            <input type="hidden" name="grade_id" value="'.$grade_id.'" />
                            <input type="hidden" name="subject_id" value="'.$subject_id.'" />
                            <input type="hidden" name="topic_id" value="'.$topic_id.'" />';
		$rtntext.='<div class="row">';
		$rtntext.='<input type="hidden" class="question_id" name="question_id" value="'.$data->question_id.'">
                                <div class="col-lg-5">
                                    <div class="question_count">Question <a href="javacript:void(0);" id="play_question" data-question="'.$data->question_name.'"><i class="fas fa-volume-up"></i></a></div>
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
	function qView_option_6($data,$grade_id,$subject_id,$topic_id,$start){
		$rtntext='';
		$start=$start+1;
		$rtntext.='<input type="hidden" name="start" value="'.$start.'" />
                            <input type="hidden" name="grade_id" value="'.$grade_id.'" />
                            <input type="hidden" name="subject_id" value="'.$subject_id.'" />
                            <input type="hidden" name="topic_id" value="'.$topic_id.'" />';
		$rtntext.='<div class="row">';
		$rtntext.='<input type="hidden" class="question_id" name="question_id" value="'.$data->question_id.'">
                                <div class="col-lg-5">
                                    <div class="question_count">Question <a href="javacript:void(0);" id="play_question" data-question="'.$data->question_name.'"><i class="fas fa-volume-up"></i></a></div>
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
	function qView_option_8($data,$grade_id,$subject_id,$topic_id,$start){
		$rtntext='';
		$start=$start+1;
		$rtntext.='<input type="hidden" name="start" value="'.$start.'" />
                            <input type="hidden" name="grade_id" value="'.$grade_id.'" />
                            <input type="hidden" name="subject_id" value="'.$subject_id.'" />
                            <input type="hidden" name="topic_id" value="'.$topic_id.'" />';
		$rtntext.='<div class="row">';
		$rtntext.='<input type="hidden" class="question_id" name="question_id" value="'.$data->question_id.'">
                                <div class="col-lg-5">
                                    <div class="question_count">Question <a href="javacript:void(0);" id="play_question" data-question="'.$data->question_name.'"><i class="fas fa-volume-up"></i></a></div>
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
	function qView_option_9($data,$grade_id,$subject_id,$topic_id,$start){
		$rtntext='';
		$start=$start+1;
		$rtntext.='<input type="hidden" name="start" value="'.$start.'" />
                            <input type="hidden" name="grade_id" value="'.$grade_id.'" />
                            <input type="hidden" name="subject_id" value="'.$subject_id.'" />
                            <input type="hidden" name="topic_id" value="'.$topic_id.'" />';
		$rtntext.='<div class="row">';
		$rtntext.='<input type="hidden" class="question_id" name="question_id" value="'.$data->question_id.'">
                                <div class="col-lg-5">
                                    <div class="question_count">Question <a href="javacript:void(0);" id="play_question" data-question="'.$data->question_name.'"><i class="fas fa-volume-up"></i></a></div>
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
	function qView_option_11($data,$grade_id,$subject_id,$topic_id,$start){
		$rtntext='';
		$start=$start+1;
		$rtntext.='<input type="hidden" name="start" value="'.$start.'" />
                            <input type="hidden" name="grade_id" value="'.$grade_id.'" />
                            <input type="hidden" name="subject_id" value="'.$subject_id.'" />
                            <input type="hidden" name="topic_id" value="'.$topic_id.'" />';
		$rtntext.='<div class="row">';
		$rtntext.='<input type="hidden" class="question_id" name="question_id" value="'.$data->question_id.'">
                                <div class="col-lg-5">
                                    <div class="question_count">Question <a href="javacript:void(0);" id="play_question" data-question="'.$data->question_name.'"><i class="fas fa-volume-up"></i></a></div>
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
	function qView_option_12($data,$grade_id,$subject_id,$topic_id,$start){
		$rtntext='';
		$start=$start+1;
		$rtntext.='<input type="hidden" name="start" value="'.$start.'" />
                            <input type="hidden" name="grade_id" value="'.$grade_id.'" />
                            <input type="hidden" name="subject_id" value="'.$subject_id.'" />
                            <input type="hidden" name="topic_id" value="'.$topic_id.'" />';
		$rtntext.='<div class="row">';
		$rtntext.='<input type="hidden" class="question_id" name="question_id" value="'.$data->question_id.'">
                                <div class="col-lg-5">
                                    <div class="question_count">Question <a href="javacript:void(0);" id="play_question" data-question="'.$data->question_name.'"><i class="fas fa-volume-up"></i></a></div>
                                            <div class="question_display">'.$data->question_name.'</div>
                                </div>';
		$rtntext.='<div class="col-lg-7">';
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
/></span></a></li><li><a href="#" class="svgDelete">1 <span><i class="fas fa-trash-alt"></i></span></a></li></ul>';
		$rtntext .= '<br/><br/>';
		$rtntext.='<input type="submit" value="Submit" class="btn btn-small btn-outline-default qSubmit">';
		$rtntext.='</div>';
		$rtntext.='</div>';

		return $rtntext;
	}
	function qView_option_13($data,$grade_id,$subject_id,$topic_id,$start){
		$rtntext='';
		$start=$start+1;
		$rtntext.='<input type="hidden" name="start" value="'.$start.'" />
                            <input type="hidden" name="grade_id" value="'.$grade_id.'" />
                            <input type="hidden" name="subject_id" value="'.$subject_id.'" />
                            <input type="hidden" name="topic_id" value="'.$topic_id.'" />';
		$rtntext.='<div class="row">';
		$rtntext.='<input type="hidden" class="question_id" name="question_id" value="'.$data->question_id.'">
                                <div class="col-lg-5">
                                    <div class="question_count">Question <a href="javacript:void(0);" id="play_question" data-question="'.$data->question_name.'"><i class="fas fa-volume-up"></i></a></div>
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
	function qView_option_14($data,$grade_id,$subject_id,$topic_id,$start){
		$rtntext='';
		$start=$start+1;
		$rtntext.='<input type="hidden" name="start" value="'.$start.'" />
                            <input type="hidden" name="grade_id" value="'.$grade_id.'" />
                            <input type="hidden" name="subject_id" value="'.$subject_id.'" />
                            <input type="hidden" name="topic_id" value="'.$topic_id.'" />';
		$rtntext.='<div class="row">';
		$rtntext.='<input type="hidden" class="question_id" name="question_id" value="'.$data->question_id.'">
                                <div class="col-lg-5">
                                    <div class="question_count">Question <a href="javacript:void(0);" id="play_question" data-question="'.$data->question_name.'"><i class="fas fa-volume-up"></i></a></div>
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
	function qView_option_15($data,$grade_id,$subject_id,$topic_id,$start){
		$rtntext='';
		$start=$start+1;
		$rtntext.='<input type="hidden" name="start" value="'.$start.'" />
                            <input type="hidden" name="grade_id" value="'.$grade_id.'" />
                            <input type="hidden" name="subject_id" value="'.$subject_id.'" />
                            <input type="hidden" name="topic_id" value="'.$topic_id.'" />';
		$rtntext.='<div class="row">';
		$rtntext.='<input type="hidden" class="question_id" name="question_id" value="'.$data->question_id.'">
                                <div class="col-lg-5">
                                    <div class="question_count">Question <a href="javacript:void(0);" id="play_question" data-question="'.$data->question_name.'"><i class="fas fa-volume-up"></i></a></div>
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

    function qView_option_18($data,$grade_id,$subject_id,$topic_id,$start){
        $rtntext='';
        $start=$start+1;
        $rtntext.='<input type="hidden" name="start" value="'.$start.'" />
                            <input type="hidden" name="grade_id" value="'.$grade_id.'" />
                            <input type="hidden" name="subject_id" value="'.$subject_id.'" />
                            <input type="hidden" name="topic_id" value="'.$topic_id.'" />';
        $rtntext.='<div class="row">';
        $rtntext.='<input type="hidden" class="question_id" name="question_id" value="'.$data->question_id.'">
                                <div class="col-lg-5">
                                    <div class="question_count">Question <a href="javacript:void(0);" id="play_question" data-question="<?php echo ($data->question_name); ?>"><i class="fas fa-volume-up"></i></a></div>
                                            <div class="question_display">'.$data->question_name.'</div>
                                </div>';
        $rtntext.='<div class="col-lg-7">';
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

	function qView_option_20($data,$grade_id,$subject_id,$topic_id,$start){
		$rtntext='';
		$start=$start+1;
		$rtntext.='<input type="hidden" name="start" value="'.$start.'" />
                            <input type="hidden" name="grade_id" value="'.$grade_id.'" />
                            <input type="hidden" name="subject_id" value="'.$subject_id.'" />
                            <input type="hidden" name="topic_id" value="'.$topic_id.'" />';
		$rtntext.='<div class="row">';
		$rtntext.='<input type="hidden" class="question_id" name="question_id" value="'.$data->question_id.'">
                                <div class="col-lg-5">
                                    <div class="question_count">Question <a href="javacript:void(0);" id="play_question" data-question="'.$data->question_name.'"><i class="fas fa-volume-up"></i></a></div>
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

	function qView_option_26($data,$grade_id,$subject_id,$topic_id,$start){
		$rtntext='';
		$start=$start+1;
		$rtntext.='<input type="hidden" name="start" value="'.$start.'" />
                            <input type="hidden" name="grade_id" value="'.$grade_id.'" />
                            <input type="hidden" name="subject_id" value="'.$subject_id.'" />
                            <input type="hidden" name="topic_id" value="'.$topic_id.'" />';
		$rtntext.='<div class="row">';
		$rtntext.='<input type="hidden" class="question_id" name="question_id" value="'.$data->question_id.'">
                                <div class="col-lg-5">
                                    <div class="question_count">Question <a href="javacript:void(0);" id="play_question" data-question="'.$data->question_name.'"><i class="fas fa-volume-up"></i></a></div>
                                            <div class="question_display">'.$data->question_name.'</div>
                                </div>';
		$rtntext.='<div class="col-lg-7">';
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

    function qView_option_27($data,$grade_id,$subject_id,$topic_id,$start){
        $rtntext='';
        $start=$start+1;
        $rtntext.='<input type="hidden" name="start" value="'.$start.'" />
                            <input type="hidden" name="grade_id" value="'.$grade_id.'" />
                            <input type="hidden" name="subject_id" value="'.$subject_id.'" />
                            <input type="hidden" name="topic_id" value="'.$topic_id.'" />';
        $rtntext.='<div class="row">';
        $rtntext.='<input type="hidden" class="question_id" name="question_id" value="'.$data->question_id.'">
                                <div class="col-lg-5">
                                    <div class="question_count">Question <a href="javacript:void(0);" id="play_question" data-question="<?php echo ($data->question_name); ?>"><i class="fas fa-volume-up"></i></a></div>
                                            <div class="question_display">'.$data->question_name.'</div>
                                </div>';
        $rtntext.='<div class="col-lg-7">';
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

    function qView_option_28($data,$grade_id,$subject_id,$topic_id,$start){
        $rtntext='';
        $start=$start+1;
        $rtntext.='<input type="hidden" name="start" value="'.$start.'" />
                            <input type="hidden" name="grade_id" value="'.$grade_id.'" />
                            <input type="hidden" name="subject_id" value="'.$subject_id.'" />
                            <input type="hidden" name="topic_id" value="'.$topic_id.'" />';
        $rtntext.='<div class="row">';
        $rtntext.='<input type="hidden" class="question_id" name="question_id" value="'.$data->question_id.'">
                                <div class="col-lg-5">
                                    <div class="question_count">Question <a href="javacript:void(0);" id="play_question" data-question="<?php echo ($data->question_name); ?>"><i class="fas fa-volume-up"></i></a></div>
                                            <div class="question_display">'.$data->question_name.'</div>
                                </div>';
        $rtntext.='<div class="col-lg-7">';
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

    function qView_option_29($data,$grade_id,$subject_id,$topic_id,$start){
        $rtntext='';
        $start=$start+1;
        $rtntext.='<input type="hidden" name="start" value="'.$start.'" />
                            <input type="hidden" name="grade_id" value="'.$grade_id.'" />
                            <input type="hidden" name="subject_id" value="'.$subject_id.'" />
                            <input type="hidden" name="topic_id" value="'.$topic_id.'" />';
        $rtntext.='<div class="row">';
        $rtntext.='<input type="hidden" class="question_id" name="question_id" value="'.$data->question_id.'">
                                <div class="col-lg-5">
                                    <div class="question_count">Question <a href="javacript:void(0);" id="play_question" data-question="<?php echo ($data->question_name); ?>"><i class="fas fa-volume-up"></i></a></div>
                                            <div class="question_display">'.$data->question_name.'</div>
                                </div>';
        $rtntext.='<div class="col-lg-7">';
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
    function qView_option_31($data,$grade_id,$subject_id,$topic_id,$start){
        $rtntext='';
        $start=$start+1;
        $rtntext.='<input type="hidden" name="start" value="'.$start.'" />
                            <input type="hidden" name="grade_id" value="'.$grade_id.'" />
                            <input type="hidden" name="subject_id" value="'.$subject_id.'" />
                            <input type="hidden" name="topic_id" value="'.$topic_id.'" />';
        $rtntext.='<div class="row">';
        $rtntext.='<input type="hidden" class="question_id" name="question_id" value="'.$data->question_id.'">
                                <div class="col-lg-5">
                                    <div class="question_count">Question <a href="javacript:void(0);" id="play_question" data-question="<?php echo ($data->question_name); ?>"><i class="fas fa-volume-up"></i></a></div>
                                            <div class="question_display">'.$data->question_name.'</div>
                                </div>';
        $rtntext.='<div class="col-lg-7">';
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

	function qView_option_32($data,$grade_id,$subject_id,$topic_id,$start){
		$rtntext='';
		$start=$start+1;
		$rtntext.='<input type="hidden" name="start" value="'.$start.'" />
                            <input type="hidden" name="grade_id" value="'.$grade_id.'" />
                            <input type="hidden" name="subject_id" value="'.$subject_id.'" />
                            <input type="hidden" name="topic_id" value="'.$topic_id.'" />';
		$rtntext.='<div class="row">';
		$rtntext.='<input type="hidden" class="question_id" name="question_id" value="'.$data->question_id.'">
                                <div class="col-lg-5">
                                    <div class="question_count">Question <a href="javacript:void(0);" id="play_question" data-question="<?php echo ($data->question_name); ?>"><i class="fas fa-volume-up"></i></a></div>
                                            <div class="question_display">'.$data->question_name.'</div>
                                </div>';
		$rtntext.='<div class="col-lg-7">';
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
    function qView_option_33($data,$grade_id,$subject_id,$topic_id,$start){
        $rtntext='';
        $start=$start+1;
        $rtntext.='<input type="hidden" name="start" value="'.$start.'" />
                            <input type="hidden" name="grade_id" value="'.$grade_id.'" />
                            <input type="hidden" name="subject_id" value="'.$subject_id.'" />
                            <input type="hidden" name="topic_id" value="'.$topic_id.'" />';
        $rtntext.='<div class="row">';
        $rtntext.='<input type="hidden" class="question_id" name="question_id" value="'.$data->question_id.'">
                                <div class="col-lg-5">
                                    <div class="question_count">Question <a href="javacript:void(0);" id="play_question" data-question="<?php echo ($data->question_name); ?>"><i class="fas fa-volume-up"></i></a></div>
                                            <div class="question_display">'.$data->question_name.'</div>
                                </div>';
        $rtntext.='<div class="col-lg-7">';
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
			$values['submit_dt']=date('Y-m-d H:i:s');
			$insert=$this->ajax_model->insert_ans_certificate($values);
			if($insert){
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
}
