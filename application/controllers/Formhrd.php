<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Formhrd extends CI_Controller {
	public function __construct(){
		parent::__construct();

		// model
		$this->load->model('formhrd_model');
		$this->load->model('admin_model');

		// library
		$this->load->library('form_validation');

		// cek login
		$this->admin_model->cekLogin();
	}

	public function index(){
		$data['formhrd'] = $this->formhrd_model->showData();
		$this->load->view('formhrd/index', $data);
	}

	public function showform($id){
		$data['formhrd'] = $this->formhrd_model->getById($id);
		$this->load->view('formhrd/show', $data);
	}

	public function add(){
		$formhrd = $this->formhrd_model;
		$val = $this->form_validation;
		$val->set_rules($formhrd->rules());

		if($val->run()){
			$formhrd->save();
			redirect('formhrd/');
		}

		$data['dep'] = $this->helper->departemen();
		$data['kategori'] = $this->helper->kategori();
		$this->load->view('formhrd/form', $data);
	}

	public function edit($id=null){
		$formhrd = $this->formhrd_model;
		$val = $this->form_validation;
		$val->set_rules($formhrd->rules());

		if($val->run()){
			$formhrd->update();
			redirect('formhrd/');
		}

		$data['formhrd'] = $this->formhrd_model->getById($id);
		$data['dep'] = $this->helper->departemen();
		$this->load->view('formhrd/edit', $data);
	}

	public function delete($id){
		$this->formhrd_model->delete($id);
		redirect('formhrd/');
	}
}
