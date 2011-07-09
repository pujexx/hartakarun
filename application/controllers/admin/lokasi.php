<?php

class lokasi extends CI_Controller {

    var $ajax = 1;

    function __construct() {
        parent::__construct();
        if ($this->session->userdata('id_admin') == "") {
            $this->session->set_flashdata(array('notif' => "Anda harus login terlebih dahulu"));
            redirect('admin/login');
        }
        $this->load->model('h_lokasi_model');
    }

    function index() {
        $data['lokasis'] = $this->h_lokasi_model->get_lokasi();
        $data['content'] = "lokasi";
        $this->load->view('end/template', $data);
    }

    function tambah() {
        $config = array(
            array(
                'field' => 'latitude',
                'label' => 'latitude',
                'rules' => 'required'
            ),
            array(
                'field' => 'longitude',
                'label' => 'longitude',
                'rules' => 'required'
            ),
            array(
                'field' => 'nama_tempat',
                'label' => 'nama_tempat',
                'rules' => 'required'
            ),
            array(
                'field' => 'keterangan_tempat',
                'label' => 'Keterangan_tempat',
                'rules' => 'required'
            ),
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == TRUE) {
            if ($this->input->post('ajax') == 1) {
                $data = array(
                    'latitude' => $this->input->post('latitude', TRUE),
                    'longitude' => $this->input->post('longitude', TRUE),
                    'nama_tempat' => $this->input->post('nama_tempat', TRUE),
                    'keterangan_tempat' => $this->input->post('keterangan_tempat', TRUE),
                );
                $this->h_lokasi_model->insert($data);

                $this->ajax = 1;
                $this->lihat();
            }
        }
    }

    function lihat() {
        if ($this->ajax == 1) {
            $data['lokasis'] = $this->h_lokasi_model->get_lokasi();

            $this->load->view('end/lihat_lokasi', $data);
        }
    }

}
?>
