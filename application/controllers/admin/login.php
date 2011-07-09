<?php

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('ci_user_model');
    }

    function index() {
        $config = array(
            array(
                'field' => 'username_login',
                'label' => 'Username',
                'rules' => 'required'
            ),
            array(
                'field' => 'password_login',
                'label' => 'password',
                'rules' => 'required'
            ),
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == TRUE) {
            $username = $this->input->post('username_login', TRUE);
            $password = $this->input->post('password_login', TRUE);
            if ($this->ci_user_model->cek_user($username, $password) == true) {
                $user = $this->ci_user_model->get_data_user($username, $password);
                $session = array('id_admin' => $user['id']);
                $this->session->set_userdata($session);
                redirect('admin/dashboard');
            } else {
                $this->session->set_flashdata(array('notif' => "login gagal"));
                redirect('admin/login');
            }
        }
        $data['content'] = "login";
        $this->load->view('end/template', $data);
    }

    function logout() {

        $this->session->unset_userdata('id_admin');
        $this->session->set_flashdata(array('notif' => "anda telah logut"));
        redirect('admin/login');
    }

}
?>
