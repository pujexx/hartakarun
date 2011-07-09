<?php

class H_game_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getIdGame() {
        $this->db->select('id_game');
        $result = $this->db->get('h_game');
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }

    function updateIdGameMember($id, $id_game) {
        $this->db->where('id', $id);
        $data = array('id_game' => $id_game);
        $this->db->update('h_member', $data);
    }

    function getGame($id) {
        $result = $this->db->query("SELECT g.lokasi_1 AS lokasi_a, g.lokasi_2 AS lokasi_b, g.lokasi_3 AS lokasi_c, g.keterangan AS keterangan
FROM h_game g, h_member m
WHERE g.id_game = m.id_game
AND m.id =1");
        if ($result->num_rows > 0) {
            return $result->result_array();
        } else {
            return false;
        }
    }

    function setPointawal($id, $id_game) {
        $data = array('id_member' => $id, 'id_game' => $id_game, 'lokasi_1' => 0, 'lokasi_2' => 0, 'lokasi_3' => 0);
        $this->db->insert('h_point', $data);
    }

    function getoneLokasi($id_lokasi) {
        $this->db->where('id', $id_lokasi);
        $result = $this->db->get('h_lokasi');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        }
    }

    function getGameby($id) {
        $this->db->where('id_game', $id);
        $result = $this->db->get('h_game');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        }
    }

    function get_all() {

        $result = $this->db->get('h_game');
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }

    function get_one($id) {
        $this->db->where('id_game', $id);
        $result = $this->db->get('h_game');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }

    function insert($data) {
       
        $this->db->insert('h_game', $data);
    }

    function update($id) {
        $data = array(
            'lokasi_1' => $this->input->post('lokasi_1', TRUE),
            'lokasi_2' => $this->input->post('lokasi_2', TRUE),
            'lokasi_3' => $this->input->post('lokasi_3', TRUE),
            'keterangan' => $this->input->post('keterangan', TRUE),
        );
        $this->db->where('id_game', $id);
        $this->db->update('h_game', $data);
    }

    function delete($id) {
      
            $this->db->where('id_game', $id);
            $this->db->delete('h_game');
        
    }

}
?>
