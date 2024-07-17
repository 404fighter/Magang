<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lokasi_model extends CI_Model
{

    public function get_all_lokasi()
    {
        $this->db->select('id, nama_lokasi, alamat_lokasi');
        return $this->db->get('lokasi')->result_array();
    }

    public function get_count() {
        return $this->db->count_all('lokasi');
    }

    public function add_lokasi($data)
    {
        $role_id = $this->session->userdata('role_id');
        if ($role_id == 3) { // Operator role_id is 3
            return false; // Block operator
        }

        $this->db->insert('lokasi', $data);
    }

    public function update_lokasi($id, $data)
    {
        $role_id = $this->session->userdata('role_id');
        if ($role_id == 3) { // Operator role_id is 3
            return false; // Block operator
        }

        $this->db->where('id', $id);
        $this->db->update('lokasi', $data);
    }

    public function delete_lokasi($id)
    {
        // $role_id = $this->session->userdata('role_id');
        // if ($role_id == 3) { // Operator role_id is 3
        //     return false; // Block operator
        // }

        $this->db->where('id', $id);
        $this->db->delete('lokasi');
        return $this->db->affected_rows() > 0;
    }
}
