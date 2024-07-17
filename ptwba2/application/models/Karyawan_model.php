<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @property CI_DB $db
 * @property CI_Input $input
 * @property CI_Session $session
 * @property CI_Form_validation $form_validation
 */

class Karyawan_model extends CI_Model
{

    public function get_roles()
    {
        $this->db->select('id, role');
        $query = $this->db->get('user_role');
        return $query->result();
    }

    public function get_agama()
    {
        $this->db->select('id, ket_agama');
        $query = $this->db->get('agama');
        return $query->result();
    }

    // public function get_agama()
    // {
    //     $this->db->select('id, ket_agama');
    //     $query = $this->db->get('agama');
    //     return $query->result();
    // }

    public function get_jenis_kelamin()
    {
        $this->db->select('id, jenis_kelamin, keterangan_jk');
        $query = $this->db->get('jenis_kelamin');
        return $query->result();
    }

    public function get_pendidikan()
    {
        $this->db->select('id, pendidikan');
        $query = $this->db->get('pendidikan');
        return $query->result();
    }

    public function get_kawin()
    {
        $this->db->select('id, status_kawin, keterangan_kw');
        $query = $this->db->get('kawin');
        return $query->result();
    }

    public function get_gada()
    {
        $this->db->select('id, gada, keterangan_gd');
        $query = $this->db->get('gada');
        return $query->result();
    }

    public function get_all_karyawan()
    {
        $this->db->select('karyawan.*, agama.ket_agama, jenis_kelamin.jenis_kelamin, pendidikan.pendidikan, kawin.status_kawin, gada.gada');
        $this->db->from('karyawan');
        $this->db->join('agama', 'karyawan.id_agama = agama.id');
        $this->db->join('jenis_kelamin', 'karyawan.id_jenis_kelamin = jenis_kelamin.id');
        $this->db->join('pendidikan', 'karyawan.id_pendidikan = pendidikan.id');
        $this->db->join('kawin', 'karyawan.id_kawin = kawin.id');
        $this->db->join('gada', 'karyawan.id_gada = gada.id');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_karyawan_by_id($id)
    {
        $this->db->select('karyawan.*, agama.*, jenis_kelamin.*, pendidikan.*, kawin.*, gada.*');
        $this->db->from('karyawan');
        $this->db->join('agama', 'karyawan.id_agama = agama.id');
        $this->db->join('jenis_kelamin', 'karyawan.id_jenis_kelamin = jenis_kelamin.id');
        $this->db->join('pendidikan', 'karyawan.id_pendidikan = pendidikan.id');
        $this->db->join('kawin', 'karyawan.id_kawin = kawin.id');
        $this->db->join('gada', 'karyawan.id_gada = gada.id');
        $this->db->where('karyawan.id', $id);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

    public function get_count() {
        return $this->db->count_all('karyawan');
    }

    public function insert_karyawan($data)
    {
        $role_id = $this->session->userdata('role_id');
        if ($role_id == 3) { // Operator role_id is 3
            return false; // Block operator
        }

        return $this->db->insert('karyawan', $data);
    }

    public function update_karyawan($id, $data)
    {
        $role_id = $this->session->userdata('role_id');
        if ($role_id == 3) { // Operator role_id is 3
            return false; // Block operator
        }

        $this->db->where('id', $id);
        return $this->db->update('karyawan', $data);
    }

    public function delete_karyawan($id)
    {
        // $role_id = $this->session->userdata('role_id');
        // if ($role_id == 3) { // Operator role_id is 3
        //     return false; // Block operator
        // }

        $this->db->where('id', $id);
        return $this->db->delete('karyawan');
    }
}
