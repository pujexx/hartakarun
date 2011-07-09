<?php
class Soal extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {

    }

    function getSoal(){
          $soal = array(
            array(
                'id_soal' => 1,
                "pertanyaan"=>"sudah Makan? ",
                "pilihan_a" => "satu",
                "pilihan_b" => "dua",
                "pilihan_c" => "tiga",
                "pilihan_d" => "empat",
                "kunci"=>"a"
            ),
               array(
                'id_soal' => 1,
                "pertanyaan"=>"sudah Makan? ",
                "pilihan_a" => "satu",
                "pilihan_b" => "dua",
                "pilihan_c" => "tiga",
                "pilihan_d" => "empat",
                "kunci"=>"a"
            ),
              array(
                'id_soal' => 1,
                "pertanyaan"=>"sudah Makan? ",
                "pilihan_a" => "satu",
                "pilihan_b" => "dua",
                "pilihan_c" => "tiga",
                "pilihan_d" => "empat",
                "kunci"=>"a"
            ),
              array(
                'id_soal' => 1,
                "pertanyaan"=>"sudah Makan? ",
                "pilihan_a" => "satu",
                "pilihan_b" => "dua",
                "pilihan_c" => "tiga",
                "pilihan_d" => "empat",
                "kunci"=>"a"
            ),
        );
        echo '{"soal" : '.json_encode($soal).'}';
    }

}
?>
