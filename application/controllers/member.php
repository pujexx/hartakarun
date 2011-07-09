<?php

class Member extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('h_member_model');
    }

    function index() {
       
        $config = array(
            'base_url' => site_url() . '/member/index/',
            'total_rows' => $this->db->count_all('h_member'),
            'per_page' => 500,
        );
        $this->pagination->initialize($config);
        $data['content'] = 'member';
      
        $data['pagination'] = $this->pagination->create_links();
        $data['members'] = $this->h_member_model->get_all($config['per_page'], $this->uri->segment(3));
        $this->load->view('front/template', $data);
    }

    function get($id) {
        if ($id != '') {
            $this->load->library('GMap');
            $this->gmap->GoogleMapAPI();
            $this->gmap->setMapType('map'); //-> hybrid, satellite, terrain, map
            $this->gmap->setWidth("100%");
            $this->gmap->setHeight("400px");
            $this->gmap->center_lon = 101.37289;
            $this->gmap->center_lat = -7.804690;
            $lokasi = $this->h_member_model->getall_by($id);
            foreach ($lokasi as $place) {
                $this->gmap->addMarkerByCoords($place['longitude'], $place['latitude'], "Hay aku " . $place['nama'] . "<br> aku sedang di sini");
            }

            $data['headerjs'] = $this->gmap->getHeaderJS();
            $data['headerpeta'] = $this->gmap->getMapJS();
            $data['onload'] = $this->gmap->printOnLoad();
            $data['peta'] = $this->gmap->printMap();
            $data['content'] = "maps";
            $this->load->view("front/template", $data);
        } else {
            die();
        }
    }

}
?>
