<?php

class Front extends CI_Controller {

    function __construct() {
        parent::__construct();
        // $this->load->library('GMap');
        $this->load->model('h_member_model');
    }

    function index() {
        $this->load->library('GMap');
        $this->gmap->GoogleMapAPI();
        $this->gmap->setMapType('map'); //-> hybrid, satellite, terrain, map
        $this->gmap->setWidth("100%");
        $this->gmap->setHeight("400px");
        $this->gmap->center_lon = 101.37289;
        $this->gmap->center_lat = -7.804690;
        $lokasi = $this->h_member_model->getall();
        foreach ($lokasi as $place) {
            $this->gmap->addMarkerByCoords($place['longitude'], $place['latitude'], img('members/'.$place['id'].'.jpg')."<br>Hay aku " . $place['nama'] . "<br> aku sedang di sini");
        }
        $data['headerjs'] = $this->gmap->getHeaderJS();
        $data['headerpeta'] = $this->gmap->getMapJS();
        $data['onload'] = $this->gmap->printOnLoad();
        $data['peta'] = $this->gmap->printMap();
        $data['content'] = "front";
        $this->load->view("front/template", $data);
    }

    function login() {
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
            if ($this->h_member_model->cekuser($username, $password) == true) {
                $member = $this->h_member_model->getuserid($username, $password);
                $session = array('nama' => $member['nama'], 'id_member' => $member['id']);
                $this->session->set_userdata($session);
                redirect('members');
            } else {
                $this->session->set_flashdata(array('notif' => "login gagal"));
                redirect('front');
            }
        } else {
            $this->index();
        }
    }

    function logout() {
        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('id_member');
          $this->session->set_flashdata(array('notif' => "anda telah logut"));
        redirect('front');
    }

}
?>
