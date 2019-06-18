<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hrd extends CI_Controller {
	public function __construct(){
		parent::__construct();

		// model
		$this->load->model('hrd_model');
		$this->load->model('admin_model');

		// library
		$this->load->library('form_validation');

		// cek login
		$this->admin_model->cekLogin();
	}

	public function index(){
		$data['hrd'] = $this->hrd_model->showData();
		$this->load->view('hrd/index', $data);
	}

	public function add(){
		$hrd = $this->hrd_model;
		$val = $this->form_validation;
		$val->set_rules($hrd->rules());

		if($val->run()){
			$hrd->save();
			redirect('hrd/');
		}

		$data['dep'] = $this->helper->departemen();
		$this->load->view('hrd/form', $data);
	}

	public function edit($id=null){
		$hrd = $this->hrd_model;
		$val = $this->form_validation;
		$val->set_rules($hrd->rules());

		if($val->run()){
			$hrd->update();
			redirect('hrd/');
		}

		$data['hrd'] = $this->hrd_model->getById($id);
		$data['dep'] = $this->helper->departemen();
		$this->load->view('hrd/edit', $data);
	}

	public function delete($id){
		$this->hrd_model->delete($id);
		redirect('hrd/');
	}
}
