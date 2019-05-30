<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Helper extends CI_Model {
    public function level($stat){
        if($stat == 1){
            $stat = "Super User";
        }else if($stat == 2){
            $stat = "Kepala Bagian";
        }else{
            $stat = "Staff";
        }

        return $stat;
    }

    public function departemen(){
        $data = array(
            "CW1" => "Citra Warna 1 Imam Bonjol",
            "CW2" => "Citra Warna 2 Imam Bonjol",
            "CW3" => "Citra Warna 3 Buluh Indah",
            "CW4" => "Citra Warna 4 Canggu",
            "CW5" => "Citra Warna 5 Teuku Umar Barat",
            "CW6" => "Citra Warna 6 Sunset Road",
            "CW7" => "Citra Warna 7 Gatot Subroto",
            "CW8" => "Citra Warna 8 Ubud",
            "CW9" => "Citra Warna 9 Mumbul Nusa Dua",
            "CA0" => "Citra Warna 10 Mahendradatha",
            "CA1" => "Citra Warna 11 Semabaung Gianyar",
            "CA2" => "Citra Warna 12 Kediri Tabanan",
            "CA3" => "Citra Warna 13 Panjer",
            "CA4" => "Citra Warna 14 Dalung",
            "CA5" => "Citra Warna 15 Singaraja",
            "CA6" => "Citra Warna 16 Tibubeneng",
            "CA7" => "Citra Warna 17 WR. Supratman",
            "CA8" => "Citra Warna 18 Waturenggong",
            "CA9" => "Citra Warna 19 Ahmad Yani",
            "CL1" => "Citra Warna Lombok 1",
            "HRD" => "HRD",
            "GA" => "GA",
            "IT" => "IT"
        );

        return $data;
    }
}
