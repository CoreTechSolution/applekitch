<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct(){

		parent::__construct();
		$this->load->model('admin_model');
		$this->load->database();
		//$this->load->library('image_crop_gd');
        $this->load->model('frontend_model');
		$this->load->model('images');

		$config['upload_path'] = $_SERVER["DOCUMENT_ROOT"].'/files/';
		$config['allowed_types'] = 'gif|jpg|jpeg|png';
		$this->load->library('upload', $config);
	}
	public function index()
	{
		$data = array(
			'title' => 'AppleKitch',
		);
        $data['testimonials']=$this->frontend_model->get_testimonials(array(),false);
		$this->load->view('home_page', $data);
	}
}
