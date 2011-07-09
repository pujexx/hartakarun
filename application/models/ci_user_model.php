<?php

class Ci_user_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function cek_user($username, $password) {
        $this->db->where('username', $username);
        $this->db->where('password', md5($password));
        $result = $this->db->get("user_ci");
        if ($result->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }

    function get_data_user($username, $password) {

        $this->db->where('username', $username);
        $this->db->where('password', md5($password));
        $result = $this->db->get("user_ci");
        if ($result->num_rows() == 1) {
            return $result->row_array();
        }
    }

    function get_user($id) {
        $this->db->where('id', $id);

        $result = $this->db->get("user_ci");
        if ($result->num_rows() == 1) {
            return $result->row_array();
        }
    }

    function update_user($id, $data) {
        $this->db->where('id', $id);

        $this->db->update("user_ci", $data);
    }

    function cek_password($id, $password) {
        $this->db->where('id', $id);
        $this->db->where('password', md5($password));
        $result = $this->db->get("user_ci");
        if ($result->num_rows() == 1) {
            return true;
        }
    }

    function update_password($id, $password) {
        $this->db->where('id', $id);
        $data = array('password' => md5($password));
        $this->db->update("user_ci", $data);
    }

}
?>
