<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct(){
		parent::__construct();

		// model
		$this->load->model('user_model');
	}

	public function index(){
		$this->load->view('login');
	}

	public function dashboard(){
		$this->load->view('dashboard');
	}

	// login
	public function login(){
		
	}
}
