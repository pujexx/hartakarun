<?php

class Pertanyaan extends CI_Controller {

    var $ajax;

    function __construct() {
        parent::__construct();
        $this->load->model(array('h_pertanyaan_model', "h_lokasi_model"));
    }

    function index() {
        $data['h_pertanyaans'] = $this->h_pertanyaan_model->get_all();
        $data['lokasis'] = $this->h_lokasi_model->get_lokasi();
        $data['content'] = "pertanyaan";
        $this->load->view('end/template', $data);
    }

    function tambah() {
        $config = array(
            array(
                'field' => 'pertanyaan',
                'label' => 'pertanyaan',
                'rules' => 'required'
            ),
            array(
                'field' => 'jawaban_a',
                'label' => 'jawaban_a',
                'rules' => 'required'
            ),
            array(
                'field' => 'jawaban_b',
                'label' => 'jawaban_b',
                'rules' => 'required'
            ),
            array(
                'field' => 'jawaban_c',
                'label' => 'jawaban_c',
                'rules' => 'required'
            ),
            array(
                'field' => 'jawaban_d',
                'label' => 'jawaban_d',
                'rules' => 'required'
            ),
            array(
                'field' => 'kunci',
                'label' => 'kunci',
                'rules' => 'required'
            ),
            array(
                'field' => 'id_lokasi',
                'label' => 'id_lokasi',
                'rules' => 'required'
            ),
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == TRUE) {
            if ($this->input->post('ajax') == 1) {
                $data = array(
                    'pertanyaan' => $this->input->post('pertanyaan', TRUE),
                    'jawaban_a' => $this->input->post('jawaban_a', TRUE),
                    'jawaban_b' => $this->input->post('jawaban_b', TRUE),
                    'jawaban_c' => $this->input->post('jawaban_c', TRUE),
                    'jawaban_d' => $this->input->post('jawaban_d', TRUE),
                    'kunci' => $this->input->post('kunci', TRUE),
                    'id_lokasi' => $this->input->post('id_lokasi', TRUE),
                );
                // print_r($data);
                $this->h_pertanyaan_model->insert($data);
                $this->ajax = 1;
                $this->lihat();
            }
        } else {
            echo '<script type="text/javascript">alert("semua data harus di disi");</script>';
        }
    }

    function lihat() {
        if ($this->ajax == 1) {
            $data['h_pertanyaans'] = $this->h_pertanyaan_model->get_all();
            $this->load->view('end/list_pertanyaan', $data);
        }
    }

}
?>
