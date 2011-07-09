<?php

class Lokasi extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {

    }

    function getTempat() {

        $data = array(
            array(
                "name" => "jogja",
                "keterangan" => "jogja",
            ),
            array(
                "name" => "Kulon Progo",
                "keterangan" => "jogja",
            ),
            array(
                "name" => "bantul",
                "keterangan" => "jogja",
            ),
            array(
                "name" => "Sleman",
                "keterangan" => "jogja",
            )
        );
        $encode = json_encode($data);

        echo '{ "tempat" : ' . $encode . '}';
    }

    function getEart() {

        $file = file_get_contents("http://api.geonames.org/earthquakesJSON?north=44.1&south=-9.9&east=-22.4&west=55.2&username=demo");
        print_r(json_decode($file, TRUE));
    }

    function getSoal() {

    }

    function setNilai() {

    }

    function curentLocation() {
        $this->load->model('h_member_model');
        if (isset($_POST)) {
            $id = $this->input->post('id');
            $latitude = $this->input->post("latitude");
            $longitude = $this->input->post("longitude");
            $data = array ('latitude'=>$latitude,"longitude"=>$longitude);
            $this->h_member_model->update($id,$data);
        } else {
            
        }
    }

}
?>
