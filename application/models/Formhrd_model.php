<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Formhrd_model extends CI_Model {
    private $_table = 'tb_form_hrd';

    public $kategori;
    public $nama;
    public $nik;
    public $tgl_a;
    public $tgl_b;
    public $waktu_a;
    public $waktu_b;
    public $keterangan;
    public $stat = 1;
    public $id_user;
    public $id_hrd = null;

    public function rules(){
        return [
            [
                'field' => 'nama',
                'label' => 'nama',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'Nama wajib disiikan.'
                )
            ],
            [
                'field' => 'nik',
                'label' => 'nik',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'NIK wajib disiikan.'
                )
            ],
            [
                'field' => 'tgl_a',
                'label' => 'tgl_a',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'Tanggal harus diisi.'
                )
            ],
            [
                'field' => 'tgl_b',
                'label' => 'tgl_b',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'Tanggal harus diisi.'
                )
            ],
            [
                'field' => 'keterangan',
                'label' => 'keterangan',
                'rules' => 'required'
            ]
        ];
    }

    public function showData(){
        $this->db->select('id_form, kategori, tb_form_hrd.nama, nik, dep, tgl_a, tgl_b, waktu_a, waktu_b, keterangan, tb_form_hrd.stat, tb_hrd.nama as nama_hrd');
        $this->db->from('tb_form_hrd');
        $this->db->join('tb_admin', 'tb_admin.id_user = tb_form_hrd.id_user', 'LEFT');
        $this->db->join('tb_hrd', 'tb_hrd.id_hrd = tb_form_hrd.id_hrd', 'LEFT');
        return $this->db->order_by('id_form', 'desc')->get()->result();
    }

    public function getById($id){
        $this->db->select('id_form, kategori, tb_form_hrd.nama, nik, dep, tgl_a, tgl_b, waktu_a, waktu_b, keterangan, tb_form_hrd.stat, tb_hrd.nama as nama_hrd');
        $this->db->from('tb_form_hrd');
        $this->db->join('tb_admin', 'tb_admin.id_user = tb_form_hrd.id_user', 'LEFT');
        $this->db->join('tb_hrd', 'tb_hrd.id_hrd = tb_form_hrd.id_hrd', 'LEFT');
        return $this->db->where('id_form', $id)->get()->row();
    }

    public function save(){
        $post = $this->input->post();

        if(!empty($post['kategori'])){
            $kat = $post['kategori'];
            $data = "";
            for($i=0; $i<count($kat); $i++){
                $data = $data.$kat[$i].',';
            }
        }else{
            $this->session->set_flash('flash', 'kategori-kosong');
            redirect("formhrd/add");
        }
        
        $this->kategori = $data;
        $this->nama = $post['nama'];
        $this->nik = $post['nik'];
        $this->tgl_a = $post['tgl_a'];
        $this->tgl_b = $post['tgl_b'];
        if(!empty($post['waktu_a'])){
            $this->waktu_a = $post['waktu_a'];
        }else{
            $this->waktu_a = "00:00";
        }
        if(!empty($post['waktu_b'])){
            $this->waktu_b = $post['waktu_b'];
        }else{
            $this->waktu_b = "00:00";
        }
        
        $this->keterangan = $post['keterangan'];
        $this->id_user = $this->idUser();

        return $this->db->insert($this->_table, $this);
    }

    public function update(){
        $post = $this->input->post();

        $id = $post['id_form'];
        $this->nama = $post['nama'];
        $this->jabatan = $post['jabatan'];

        return $this->db->where('id_form', $id)->update($this->_table, $this);
    }

    public function delete($id){
        return $this->db->where('id_form', $id)->delete($this->_table);
    }

    // fungsi tambahan
    public function idUser(){
        $data = $this->db->where('username', $this->session->userdata('username'))->get('tb_admin')->row();

        return $data->id_user;
    }
}
