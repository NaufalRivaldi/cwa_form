<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staffit extends CI_Controller {
	public function __construct(){
		parent::__construct();

		// model
		$this->load->model('staffit_model');
		$this->load->model('admin_model');

		// library
		$this->load->library('form_validation');

		// cek login
		$this->admin_model->cekLogin();
	}

	public function index(){
		$data['staffit'] = $this->staffit_model->showData();
		$this->load->view('staffit/index', $data);
	}

	public function add(){
		$staffit = $this->staffit_model;
		$val = $this->form_validation;
		$val->set_rules($staffit->rules());

		if($val->run()){
			$staffit->save();
			redirect('staffit/');
		}

		$data['dep'] = $this->helper->departemen();
		$this->load->view('staffit/form', $data);
	}

	public function edit($id=null){
		$staffit = $this->staffit_model;
		$val = $this->form_validation;
		$val->set_rules($staffit->rules());

		if($val->run()){
			$staffit->update();
			redirect('staffit/');
		}

		$data['staffit'] = $this->staffit_model->getById($id);
		$data['dep'] = $this->helper->departemen();
		$this->load->view('staffit/edit', $data);
	}

	public function delete($id){
		$this->staffit_model->delete($id);
		redirect('staffit/');
	}
}
