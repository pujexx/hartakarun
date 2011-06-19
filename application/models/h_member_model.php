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

    function update($id) {
        $data = array(
         
       'nama' => $this->input->post('nama', TRUE),
       
       'username' => $this->input->post('username', TRUE),
       
       'password' => $this->input->post('password', TRUE),
       
       'jenis_kelamin' => $this->input->post('jenis_kelamin', TRUE),
       
       'alamat' => $this->input->post('alamat', TRUE),
       
        );
        $this->db->where('id', $id);
        $this->db->update('h_member', $data);
    }

    function delete($id) {
        foreach ($id as $sip) {
            $this->db->where('id', $sip);
            $this->db->delete('h_member');
        }
    }

}
?>
