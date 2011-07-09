<?php

class H_pertanyaan_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_all() {

        $result = $this->db->get('h_pertanyaan');
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }

    function get_one($id) {
        $this->db->where('id', $id);
        $result = $this->db->get('h_pertanyaan');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }

    function insert($data) {
         
        $this->db->insert('h_pertanyaan', $data);
    }

    function update($id) {
        $data = array(
         
       'pertanyaan' => $this->input->post('pertanyaan', TRUE),
       
       'jawaban_a' => $this->input->post('jawaban_a', TRUE),
       
       'jawaban_b' => $this->input->post('jawaban_b', TRUE),
       
       'jawaban_c' => $this->input->post('jawaban_c', TRUE),
       
       'jawaban_d' => $this->input->post('jawaban_d', TRUE),
       
       'kunci' => $this->input->post('kunci', TRUE),
       
       'gambar' => $this->input->post('gambar', TRUE),
       
       'id_lokasi' => $this->input->post('id_lokasi', TRUE),
       
        );
        $this->db->where('id', $id);
        $this->db->update('h_pertanyaan', $data);
    }

    function delete($id) {
        foreach ($id as $sip) {
            $this->db->where('id', $sip);
            $this->db->delete('h_pertanyaan');
        }
    }

}
?>
