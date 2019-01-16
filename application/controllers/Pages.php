<?php
class Pages extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('page_model');
		$this->load->helper('url_helper');
	}

	public function index() {
		$data['pages'] = $this->page_model->get_pages();
	}

	public function view($slug = NULL) {
		$data['page_item'] = $this->page_model->get_pages($slug);

		if (empty($data['page_item'])) {
			show_404();
		}

		$data['title'] = $data['page_item']['page'];
		$data['page_title'] = $data['page_item']['page_title'];
		$data['page_content'] = $data['page_item']['page_content'];

		$this->load->view('page_v', $data);
	}
}