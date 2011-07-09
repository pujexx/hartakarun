<?php

class Game extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model("h_game_model");
    }

    function index() {

    }

    function newgame() {
        $id = $this->input->post('id_member');
        $random_game = $this->h_game_model->getIdGame();
        //print_r($random_game);


        if (isset($_POST)) {
            $random = array_rand($random_game, 1);
            $this->h_game_model->updateIdGameMember($id, $random_game[$random]['id_game']);
            $data = array('id_game' => $random_game[$random]['id_game']);
            $this->h_game_model->setPointawal($id, $random_game[$random]['id_game']);
            echo '{"game":[' . json_encode($data) . ']}';
        }
    }

    function gameDetail() {
        $id_game = $this->input->post('id_game');
        if (isset($_POST)) {

            $game = $this->h_game_model->getGameby($id_game);
            $lokasi_detail_1 = $this->h_game_model->getoneLokasi($game['lokasi_1']);
            $lokasi_detail_2 = $this->h_game_model->getoneLokasi($game['lokasi_2']);
            $lokasi_detail_3 = $this->h_game_model->getoneLokasi($game['lokasi_3']);
            $keterangan = $game['keterangan'];
            $data = array(
                'keterangan' => $keterangan,
                'lokasi_1' => $lokasi_detail_1['nama_tempat'],
                'lokasi_2' => $lokasi_detail_2['nama_tempat'],
                'lokasi_3' => $lokasi_detail_3['nama_tempat']
            );
            echo '{"gamedetail":[' . json_encode($data) . ']}';
        }
    }

    function getlocationgame($id) {
        if ($id != "") {
            $game = $this->h_game_model->getGameby($id);
            $lokasi_detail_1 = $this->h_game_model->getoneLokasi($game['lokasi_1']);
            $lokasi_detail_2 = $this->h_game_model->getoneLokasi($game['lokasi_2']);
            $lokasi_detail_3 = $this->h_game_model->getoneLokasi($game['lokasi_3']);


            $lokasi_kabeh = array(
                array(
                    'latitude' => $lokasi_detail_1['latitude'],
                    'longitude' => $lokasi_detail_1['longitude'],
                    'kategori' => 1,
                    'nama_tempat' => $lokasi_detail_1['nama_tempat']
                ),
                array(
                    'latitude' => $lokasi_detail_2['latitude'],
                    'longitude' => $lokasi_detail_2['longitude'],
                    'kategori' => 2,
                    'nama_tempat' => $lokasi_detail_2['nama_tempat']
                ),
                array(
                    'latitude' => $lokasi_detail_3['latitude'],
                    'longitude' => $lokasi_detail_3['longitude'],
                    'kategori' => 3,
                    'nama_tempat' => $lokasi_detail_3['nama_tempat']
                )
            );
             echo '{"gamedetail":' . json_encode($lokasi_kabeh) . '}';
        }
    }

}
?>
