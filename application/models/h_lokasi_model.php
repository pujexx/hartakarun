<?php

class H_lokasi_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_all($limit, $uri) {

        $result = $this->db->get('h_lokasi', $limit, $uri);
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }

    function get_one($id) {
        $this->db->where('id', $id);
        $result = $this->db->get('h_lokasi');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }

    function insert() {
           $data = array(
        
            'latitude' => $this->input->post('latitude', TRUE),
           
            'longitude' => $this->input->post('longitude', TRUE),
           
            'nama_tempat' => $this->input->post('nama_tempat', TRUE),
           
        );
        $this->db->insert('h_lokasi', $data);
    }

    function update($id) {
        $data = array(
         
       'latitude' => $this->input->post('latitude', TRUE),
       
       'longitude' => $this->input->post('longitude', TRUE),
       
       'nama_tempat' => $this->input->post('nama_tempat', TRUE),
       
        );
        $this->db->where('id', $id);
        $this->db->update('h_lokasi', $data);
    }

    function delete($id) {
        foreach ($id as $sip) {
            $this->db->where('id', $sip);
            $this->db->delete('h_lokasi');
        }
    }

}
?>
