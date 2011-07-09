<?php

class Daftar extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('h_member_model');
    }

    function index() {
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
            // if();
            if ($this->h_member_model->cekusername($this->input->post('username')) == false) {
                $this->session->set_flashdata(array('notif' => "username sudah ada silahkan ganti"));
                redirect('daftar');
            } else {
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
                $this->session->set_flashdata(array('notif' => "Pendaftaran Sukses silahkan Login"));
                redirect('front');
            }
        }
        $data['content'] = "formdaftar";
        $this->load->view('front/template', $data);
    }

    function cekusername() {
        print_r($_POST);
        if ($this->h_member_model->cekusername($this->input->post('username')) == TRUE) {
            echo "ada";
        } else {
            echo "tidak";
        }
    }

}
?>
