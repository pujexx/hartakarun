<?php

class H_member_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_all($limit, $uri) {

        $result = $this->db->get('h_member', $limit, $uri);
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }

    function getall() {
        $result = $this->db->get('h_member');
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }

    function getall_by($id) {
        $this->db->where('id', $id);
        $result = $this->db->get('h_member');
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }

    function cekusername($username) {
        $this->db->where('username', $username);
        $result = $this->db->get('h_member');
        if ($result->num_rows() == 0) {
            return TRUE;
        } else {
            return false;
        }
    }

    function get_one($id) {
        $this->db->where('id', $id);
        $result = $this->db->get('h_member');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }

    function insert($data) {

        $this->db->insert('h_member', $data);
    }

    function update($id, $data) {

        $this->db->where('id', $id);
        $this->db->update('h_member', $data);
    }

    function delete($id) {
        foreach ($id as $sip) {
            $this->db->where('id', $sip);
            $this->db->delete('h_member');
        }
    }

    function cekuser($user, $pass) {
        $this->db->where('username', $user);
        $this->db->where("password", md5($pass));
        $result = $this->db->get("h_member");
        if ($result->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }

    function getuserid($user, $pass) {
        $this->db->where('username', $user);
        $this->db->where("password", md5($pass));
        $result = $this->db->get("h_member");
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return 0;
        }
    }

    function get_posisi($id_game) {
        $this->db->where('id_game', $id_game);
        $result = $this->db->get('h_game');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }

    function getTempat($id) {
        $this->db->where('id', $id);
        $result = $this->db->get('h_lokasi');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        }
    }

    function cekusername_passoword($user, $pass) {
        $this->db->where('username', $user);
        $this->db->where('password', md5($pass));
        $result = $this->db->get('h_member');
        if ($result->num_rows() == 1) {
            return TRUE;
        }
    }

    function cekpassword($id, $pass) {
        $this->db->where('id', $id);
        $this->db->where('password', md5($pass));
        $result = $this->db->get('h_member');
        if ($result->num_rows() == 1) {
            return TRUE;
        }
    }

}
?>
