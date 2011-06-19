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
        print_r($_POST);
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
            $data = array(
                'nama' => $this->input->post('nama', TRUE),
                'username' => $this->input->post('username', TRUE),
                'password' => md5($this->input->post('password', TRUE)),
                'jenis_kelamin' => $this->input->post('jenis_kelamin', TRUE),
                'alamat' => $this->input->post('alamat', TRUE),
            );
            $this->h_member_model->insert($data);
            echo 1;
        } else {
            echo 0;
        }
    }

}
?>
