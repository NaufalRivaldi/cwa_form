<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Formhrd_model extends CI_Model {
    private $_table = 'tb_form_hrd';

    public $nama;
    public $jabatan;

    public function rules(){
        return [
            [
                'field' => 'nama',
                'label' => 'nama',
                'rules' => 'required'
            ],
            [
                'field' => 'jabatan',
                'label' => 'jabatan',
                'rules' => 'required'
            ]
        ];
    }

    public function showData(){
        return $this->db->get($this->_table)->result();
    }

    public function getById($id){
        return $this->db->where('id_hrd', $id)->get($this->_table)->row();
    }

    public function save(){
        $post = $this->input->post();

        $this->nama = $post['nama'];
        $this->jabatan = $post['jabatan'];

        return $this->db->insert($this->_table, $this);
    }

    public function update(){
        $post = $this->input->post();

        $id = $post['id_hrd'];
        $this->nama = $post['nama'];
        $this->jabatan = $post['jabatan'];

        return $this->db->where('id_hrd', $id)->update($this->_table, $this);
    }

    public function delete($id){
        return $this->db->where('id_hrd', $id)->delete($this->_table);
    }
}
