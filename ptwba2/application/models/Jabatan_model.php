<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jabatan_model extends CI_Model
{

    public function get_roles()
    {
        $this->db->select('id, role');
        $query = $this->db->get('user_role');
        return $query->result();
    }

    public function get_all_jabatan()
    {
        $this->db->select('id, jabatan');
        return $this->db->get('jabatan')->result_array();
    }

    public function get_count() {
        return $this->db->count_all('jabatan');
    }

    public function insert_jabatan($data)
    {
        $role_id = $this->session->userdata('role_id');
        if ($role_id == 3) { // Operator role_id is 3
            return false; // Block operator
        }

        return $this->db->insert('jabatan', $data);
    }

    public function update_jabatan($id, $data)
    {
        $role_id = $this->session->userdata('role_id');
        if ($role_id == 3) { // Operator role_id is 3
            return false; // Block operator
        }

        $this->db->where('id', $id);
        return $this->db->update('jabatan', $data);
    }

    public function delete_jabatan($id)
    {
        // $role_id = $this->session->userdata('role_id');
        // if ($role_id == 3) { // Operator role_id is 3
        //     return false; // Block operator
        // }
        $this->db->where('id', $id);
        $this->db->delete('jabatan'); // Menghapus data dari tabel 'jabatan'

        return $this->db->affected_rows() > 0;

        // $this->db->where('id', $id);
        // $this->db->destroy('jabatan');

        // return $this->db->affected_rows() > 0;
    }
}
