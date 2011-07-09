<?php

class Dashboard extends CI_Controller {

    var $ajax;

    function __construct() {
        parent::__construct();
        if ($this->session->userdata('id_member') == '') {
            redirect('front');
        }
        $this->load->model('h_member_model');
    }

    function index() {
        $data['content'] = "member_front";
        $this->load->view("front/template", $data);
    }

    function lokasi() {
        $this->load->library('GMap');
        $this->gmap->GoogleMapAPI();
        $this->gmap->setMapType('map'); //-> hybrid, satellite, terrain, map
        $this->gmap->setWidth("100%");
        $this->gmap->setHeight("400px");
        $this->gmap->center_lon = 101.37289;
        $this->gmap->center_lat = -7.804690;
        $lokasi = $this->h_member_model->getall_by($this->session->userdata('id_member'));
        foreach ($lokasi as $place) {
            $this->gmap->addMarkerByCoords($place['longitude'], $place['latitude'], "Hape saya disini");
        }

        $data['headerjs'] = $this->gmap->getHeaderJS();
        $data['headerpeta'] = $this->gmap->getMapJS();
        $data['onload'] = $this->gmap->printOnLoad();
        $data['peta'] = $this->gmap->printMap();
        $data['content'] = "maps";
        $this->load->view("front/template", $data);
    }

    function profil() {
        $data['member'] = $this->h_member_model->get_one($this->session->userdata('id_member'));
        $data['content'] = "member_profil";
        $this->load->view("front/template", $data);
    }

    function update_profil() {
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
                'field' => 'jenis_kelamin',
                'label' => 'jenis_kelamin',
                'rules' => 'required'
            )
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == TRUE) {
            // if();
            $data = array(
                'nama' => $this->input->post('nama', TRUE),
                'username' => $this->input->post('username', TRUE),
                'jenis_kelamin' => $this->input->post('jenis_kelamin', TRUE),
                'alamat' => $this->input->post('alamat', TRUE),
            );
            $this->h_member_model->update($this->session->userdata('id_member'), $data);
            $this->session->set_flashdata(array('notif' => "Profil sudah di ganti"));
            redirect('members/dashboard/profil');
        } else {
            $validation = form_error('nama') . form_error('username');
            $this->session->set_flashdata(array('notif' => $validation));
            redirect('members/dashboard/profil');
        }
    }

    function form_password() {
        $data['content'] = "member_password";
        $this->load->view("front/template", $data);
    }

    function update_password() {
        $config = array(
            array(
                'field' => 'oldpassword',
                'label' => 'old password',
                'rules' => 'required'
            ),
            array(
                'field' => 'newpassword',
                'label' => 'new password',
                'rules' => 'required'
            ),
            array(
                'field' => 'repassword',
                'label' => 're password',
                'rules' => 'required|matches[newpassword]'
            )
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == TRUE) {
            $oldpassword = $this->input->post('oldpassword');
            $newpassword = $this->input->post('newpassword');
            if ($this->h_member_model->cekpassword($this->session->userdata('id_member'), $oldpassword) == TRUE) {
                $data = array("password" => md5($newpassword));
                $this->h_member_model->update($this->session->userdata('id_member'), $data);
                $this->session->set_flashdata(array('notif' => "Berhasil mengubah password"));
                redirect('members/dashboard/');
            } else {
                $this->session->set_flashdata(array('notif' => "password lama tidak cocok"));
                redirect('members/dashboard/form_password');
            }
        } else {
            $this->form_password();
        }
    }

    function foto_profil() {
        $data['content'] = "form_foto";
        $this->load->view("front/template", $data);
    }

    function upload() {
        $config['upload_path'] = './members/';
        $config['allowed_types'] = 'jpg';
        $config['max_size'] = '1000';
        $config['max_width'] = '2024';
        $config['max_height'] = '2068';
        $config['overwrite'] = true;
        $config['file_name'] = $this->session->userdata('id_member');
        $this->load->library('upload', $config);


        if (isset($_FILES['userfile'])) {
            if (!$this->upload->do_upload()) {
                $data = array('notif' => $this->upload->display_errors());
                $this->session->set_flashdata($data);
                redirect("members/dashboard/foto_profil");
            } else {
                $data = array('upload_data' => $this->upload->data());
                //  print_r($data['upload_data']);
                $config['image_library'] = 'gd2';
                $config['source_image'] = "./members/" . $data['upload_data']['file_name'];

                $config['maintain_ratio'] = TRUE;
                $config['width'] = 100;
                $config['height'] = 200;
                $this->load->library('image_lib', $config);

                if ($this->image_lib->resize()) {


                    $berhasil = array(
                        "notif" => "success menambah client"
                    );

                    $this->session->set_flashdata($berhasil);
                    redirect('members/dashboard/foto_profil');
                    //$data['content'] = "admin/clientsucces";
                    //$this->load->view('admin/template', $data);
                }
            }
        }
    }

    function postStatus() {
         $this->load->model('status_model');
        $config = array(
            array(
                'field' => 'post',
                'label' => 'post',
                'rules' => 'required'
                ));
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == TRUE) {

            if ($this->input->post('ajax') == 1) {
                $data = array(
                    'post'=>$this->input->post('post'),
                    'time'=> date("Y-m-d H:i:s"),
                    'id_member'=>$this->session->userdata('id_member')
                );
                $this->status_model->post_status($data);
                $this->ajax =1;
                $this->listStatus();
            }
        }
    }

    function listStatus() {
         $this->load->model('status_model');
        if ($this->input->post('ajax') == 1 || $this->ajax == 1) {
            $data['status'] = $this->status_model->get_status();
            $this->load->view('front/member_status',$data);
        }
    }

}
?>
