<?php

class Game extends CI_Controller {

    var $ajax;

    function __construct() {
        parent::__construct();
        if ($this->session->userdata('id_admin') == "") {
            $this->session->set_flashdata(array('notif' => "Anda harus login terlebih dahulu"));
            redirect('admin/login');
        }
        $this->load->model(array('h_lokasi_model', 'h_game_model'));
    }

    function index() {
        $data['lokasis'] = $this->h_lokasi_model->get_lokasi();
        $data['content'] = "game";
        $data['games'] = $this->h_game_model->get_all();
        $this->load->view('end/template', $data);
    }

    function tambah() {
        $config = array(
            array(
                'field' => 'lokasi_1',
                'label' => 'lokasi_1',
                'rules' => 'required'
            ),
            array(
                'field' => 'lokasi_2',
                'label' => 'lokasi_2',
                'rules' => 'required'
            ),
            array(
                'field' => 'lokasi_3',
                'label' => 'lokasi_3',
                'rules' => 'required'
            ),
            array(
                'field' => 'keterangan',
                'label' => 'keterangan',
                'rules' => 'required'
            ),
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == TRUE) {
            if ($this->input->post('ajax') == 1) {
                if ($this->input->post('lokasi_1', TRUE) == 0 || $this->input->post('lokasi_2', TRUE) == 0 || $this->input->post('lokasi_3', TRUE) == 0) {
                     echo '<script type="text/javascript">alert("semua data harus di disi");</script>';
                } else {
                    $data = array(
                        'lokasi_1' => $this->input->post('lokasi_1', TRUE),
                        'lokasi_2' => $this->input->post('lokasi_2', TRUE),
                        'lokasi_3' => $this->input->post('lokasi_3', TRUE),
                        'keterangan' => $this->input->post('keterangan', TRUE),
                    );
                    // print_r($data);
                    $this->h_game_model->insert($data);
                    $this->ajax = 1;
                    $this->lihat();
                }
            }
        } else {
            echo '<script type="text/javascript">alert("semua data harus di disi");</script>';
        }
    }

    function lihat() {
        if ($this->ajax == 1) {
            $data['lokasis'] = $this->h_lokasi_model->get_lokasi();

            $data['games'] = $this->h_game_model->get_all();
            $this->load->view('end/list_game', $data);
        }
    }
    //masih ngebug
   
    function update_form(){
        
    }

}
?>
