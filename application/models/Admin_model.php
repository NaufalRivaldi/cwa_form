<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {
    private $_table = 'tb_admin';

    public $username;
    public $password;
    public $nama;
    public $dep;
    public $stat;
    public $token = 0;

    public function rules(){
        return [
            [
                'field' => 'username',
                'label' => 'username',
                'rules' => 'required'
            ],
            [
                'field' => 'password',
                'label' => 'password',
                'rules' => 'required'
            ],
            [
                'field' => 'nama',
                'label' => 'nama',
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

    public function rulesEdit(){
        return [
            [
                'field' => 'username',
                'label' => 'username',
                'rules' => 'required'
            ],
            [
                'field' => 'nama',
                'label' => 'nama',
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

    public function showData(){
        return $this->db->get($this->_table)->result();
    }

    public function getById($id){
        return $this->db->where('id_user', $id)->get($this->_table)->row();
    }

    public function save(){
        $post = $this->input->post();

        $this->username = $post['username'];
        $this->password = sha1($post['password']);
        $this->nama = $post['nama'];
        $this->dep = $post['dep'];
        $this->stat = $post['stat'];

        return $this->db->insert($this->_table, $this);
    }

    public function update(){
        $post = $this->input->post();

        $id = $post['id_user'];
        $this->username = $post['username'];
        $this->password = $post['password'];
        $this->nama = $post['nama'];
        $this->dep = $post['dep'];
        $this->stat = $post['stat'];

        return $this->db->where('id_user', $id)->update($this->_table, $this);
    }

    public function delete($id){
        return $this->db->where('id_user', $id)->delete($this->_table);
    }

    // Fungsi login sistem
    public function login(){
        $post = $this->input->post();
        
        $username = $post['username'];
        $password = sha1($post['password']);
        
        $sql = $this->db->where('username', $username)->where('password', $password)->get($this->_table);
        
        $data = $sql->row();
        $row = $sql->num_rows();

        if($row > 0){
            // update token
            $token = $this->updateToken($username);
            
            $array = array(
                "username" => $data->username,
                "token" => $token,
                "nama" => $data->nama,
                "level" => $data->stat
            );

            $this->session->set_userdata($array);
            $this->session->set_flashdata('flash', 'login');

            redirect('home/dashboard');
        }else{
            $this->session->set_flashdata('flash', 'login-gagal');
            redirect('home/');
        }
    }

    public function updateToken($username){
        $char = str_split('abcdefghijklmnopqrstuvwxyz'
                 .'ABCDEFGHIJKLMNOPQRSTUVWXYZ'
                 .'0123456789!@#$%^&*()'); 
        shuffle($char);
        $rand = '';
        foreach (array_rand($char, 50) as $k) $rand .= $char[$k];
        
        $array = array(
            "token" => $rand
        );
        $this->db->where('username', $username)->update($this->_table, $array);

        return $rand;
    }

    public function cekLogin(){
        $username = $this->session->userdata('username');
        $token = $this->session->userdata('token');
        
        $row = $this->db->where('username', $username)->where('token', $token)->get($this->_table)->num_rows();
        
        if($row == 0){
            $this->session->set_flashdata('login', 'not-login');
            redirect('home/');
        }
    }

    public function logout(){
        $array = array('username', 'token', 'nama', 'level');
        $this->session->unset_userdata($array);
        redirect('home');
    }
}
