<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
    public $username;
    public $pass;
    public $email;
    public $dep;
    public $stat;

    public function rules(){
        return [
            [
                'field' => 'username',
                'label' => 'username',
                'rules' => 'required'
            ],
            [
                'field' => 'pass',
                'label' => 'pass',
                'rules' => 'required'
            ],
            [
                'field' => 'email',
                'label' => 'email',
                'rules' => 'required'
            ],
            [
                'field' => 'dep',
                'label' => 'dep',
                'rules' => 'required'
            ],
            [
                'field' => 'stat',
                'label' => 'stat',
                'rules' => 'required'
            ]
        ];
    }
}
