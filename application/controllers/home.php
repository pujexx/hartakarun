<?php

class Home extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('h_member_model');
    }

    function index() {
        die();
    }

    function login() {

        $config = array(
            array(
                'field' => 'username',
                'label' => 'username',
                'rules' => 'required'
            ),
            array(
                'field' => 'password',
                'label' => 'password',
                'rules' => 'required'
            )
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == TRUE) {
            $user = $this->input->post("username");
            $pass = $this->input->post("password");
            if ($this->h_member_model->cekuser($user, $pass) == TRUE) {
                echo "TRUE";
            }
        } else {
            echo "FALSE";
        }
    }

    function logout() {

    }

    function signup() {
        $config = array(
            array(
                'field' => 'nama',
                'label' => 'nama',
                'rules' => 'required'
            ),
            array(
                'field' => 'username',
                'label' => 'username',
                'rules' => 'required'
            ),
            array(
                'field' => 'password',
                'label' => 'password',
                'rules' => 'required'
            ),
            array(
                'field' => 'jenis_kelamin',
                'label' => 'jenis_kelamin',
                'rules' => 'required'
            ),
            array(
                'field' => 'alamat',
                'label' => 'alamat',
                'rules' => 'required'
            )
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == TRUE) {
            $this->load->model("h_game_model");
            $random_game = $this->h_game_model->getIdGame();
            $random = array_rand($random_game, 1);
            $data = array(
                'nama' => $this->input->post('nama', TRUE),
                'username' => $this->input->post('username', TRUE),
                'password' => md5($this->input->post('password', TRUE)),
                'jenis_kelamin' => $this->input->post('jenis_kelamin', TRUE),
                'alamat' => $this->input->post('alamat', TRUE),
                'id_game' => $random_game[$random]['id_game']
            );
            $this->h_member_model->insert($data);
            echo 1;
        } else {
            echo 0;
        }
    }

    function getUser() {

        $config = array(
            array(
                'field' => 'username',
                'label' => 'username',
                'rules' => 'required'
            ),
            array(
                'field' => 'password',
                'label' => 'password',
                'rules' => 'required'
            )
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == TRUE) {


            $user = $this->input->post("username");
            $pass = $this->input->post("password");
            $longitude = 0;
            $latitude = 0;
            $member = $this->h_member_model->getuserid($user, $pass);
            $posisi = $this->h_member_model->get_posisi($member['id_game']);
            $posisi_1 = $this->h_member_model->getTempat($posisi['lokasi_1']);
            $posisi_2 = $this->h_member_model->getTempat($posisi['lokasi_2']);
            $posisi_3 = $this->h_member_model->getTempat($posisi['lokasi_3']);
            if ($member['posisi'] == 0) {
                $latitude = $posisi_1['latitude'];
                $longitude = $posisi_1['longitude'];
            } else if ($member['posisi'] == 1) {
                $latitude = $posisi_2['latitude'];
                $longitude = $posisi_2['longitude'];
            } else if ($member['posisi'] == 2) {
                $latitude = $posisi_3['latitude'];
                $longitude = $posisi_3['longitude'];
            } else {

            }
            $data = array(
                'id' => $member['id'],
                'nama' => $member['nama'],
                'username' => $member['username'],
                'jenis_kelamin' => $member['jenis_kelamin'],
                'alamat' => $member['alamat'],
                'id_game' => $member['id_game'],
                'posisi' => $member['posisi'],
                'latitude' => $latitude,
                'longitude' => $longitude
            );
            echo '{"member": [' . json_encode($data) . ']}';
        }
    }

}
?>
