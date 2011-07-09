<?php

class Dashboard extends CI_Controller {

    function __construct() {
        parent::__construct();
        if($this->session->userdata('id_admin')==""){
            $this->session->set_flashdata(array('notif'=>"Anda harus login terlebih dahulu"));
            redirect('admin/login');
        }
    }

    function index() {
        $data['content'] = "dashboard";
        $this->load->view('end/template', $data);
    }

}
?>
