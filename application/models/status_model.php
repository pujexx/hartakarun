<?php

class Status_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_status() {
        $this->db->select('id_member,post');
        $this->db->where('status', 1);
        $this->db->order_by('time', 'desc');
        $this->db->limit(30);
        $result = $this->db->get('h_status');
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }

    function post_status($data) {
        $this->db->insert('h_status', $data);
    }

}
?>
