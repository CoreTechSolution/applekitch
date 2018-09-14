<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Media extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model( 'media_model' );
		//$config['allowed_types'] = 'gif|jpg|jpeg|png';
	}

	public function index() {
		//isLogin( 'admin' );
		$data = array(
			'title' => 'Media',
		);
		$this->load->view( 'admin/admin', $data );

	}
}