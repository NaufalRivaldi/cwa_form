<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct(){
		parent::__construct();

		// model
		$this->load->model('admin_model');

		// library
		$this->load->library('form_validation');

		// cek login
		$this->admin_model->cekLogin();
	}

	public function index(){
		$data['admin'] = $this->admin_model->showData();
		$this->load->view('admin/index', $data);
	}

	public function add(){
		$admin = $this->admin_model;
		$val = $this->form_validation;
		$val->set_rules($admin->rules());

		if($val->run()){
			$admin->save();
			redirect('admin/');
		}

		$data['dep'] = $this->helper->departemen();
		$this->load->view('admin/form', $data);
	}
}
