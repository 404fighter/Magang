<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @property CI_DB $db
 * @property CI_Input $input
 * @property CI_Session $session
 * @property CI_Form_validation $form_validation
 */

class Penempatan_model extends CI_Model
{

    public function get_roles()
    {
        $this->db->select('id, role');
        $query = $this->db->get('user_role');
        return $query->result();
    }

    // public function get_lokasi()
    // {
    //     $this->db->select('lokasi.id, lokasi.nama_lokasi');
    //     $this->db->from('lokasi');
    //     $query = $this->db->get();
    //     return $query->result();
    // }

    public function get_lokasi()
    {
        $query = $this->db->get('lokasi');
        return $query->result();
    }


    // public function get_karyawan()
    // {
    //     $this->db->select('id, nama_karyawan');
    //     $query = $this->db->get('karyawan');
    //     return $query->result();
    // }

    public function get_karyawan()
    {
        $query = $this->db->get('karyawan');
        return $query->result();
    }

    // public function get_jabatan()
    // {
    //     $this->db->select('id, jabatan');
    //     $query = $this->db->get('jabatan');
    //     return $query->result();
    // }

    public function get_jabatan()
    {
        $query = $this->db->get('jabatan');
        return $query->result();
    }

    public function get_all_penempatan()
    {
        $this->db->select('penempatan.id, lokasi.nama_lokasi as nama_lokasi, karyawan.nama_karyawan as nama_karyawan, jabatan.jabatan as jabatan, nik, tmt, status_penempatan, tgl_mulai, tgl_selesai');
        $this->db->from('penempatan');
        $this->db->join('lokasi', 'penempatan.id_lokasi = lokasi.id');
        $this->db->join('karyawan', 'penempatan.id_karyawan = karyawan.id');
        $this->db->join('jabatan', 'penempatan.id_jabatan = jabatan.id');
        $query = $this->db->get();

        return $query->result();
    }

    // public function cek_penempatan_aktif($id) {
    //     $this->db->where('id_karyawan', $id);
    //     $this->db->where('status_penempatan', 1); // 1 untuk aktif
    //     $query = $this->db->get('penempatan');
    //     return $query->num_rows() > 0; // Mengembalikan true jika ada penempatan aktif
    // }
    public function cek_penempatan_aktif($id = null)
    {
        if ($id !== null) {
            $this->db->where('id_karyawan', $id);
            $this->db->where('status_penempatan', 1); // 1 untuk aktif
            $query = $this->db->get('penempatan');
            return $query->num_rows() > 0; // Mengembalikan true jika ada penempatan aktif
        } else {
            $query = "
                SELECT k.*
                FROM karyawan k
                LEFT JOIN penempatan p ON k.id = p.id_karyawan AND p.status_penempatan = 1
                WHERE p.id_karyawan IS NULL
            ";
            return $this->db->query($query)->result();
        }
    }


    public function tambah_penempatan($data)
    {
        if ($this->db->insert('penempatan', $data)) {
            log_message('debug', 'Data successfully inserted into penempatan');
            return true;
        } else {
            log_message('error', 'Failed to insert data into penempatan: ' . $this->db->_error_message());
            return false;
        }
    }

    // public function update_penempatan($id, $data)
    // {
    //     $this->db->where('id', $id);
    //     return $this->db->update('penempatan', $data);
    // }

    public function get_penempatan_by_id($id)
    {
        $this->db->select('penempatan.*, lokasi.nama_lokasi, karyawan.nama_karyawan, jabatan.jabatan');
        $this->db->from('penempatan');
        $this->db->join('lokasi', 'penempatan.id_lokasi = lokasi.id');
        $this->db->join('karyawan', 'penempatan.id_karyawan = karyawan.id');
        $this->db->join('jabatan', 'penempatan.id_jabatan = jabatan.id');
        $this->db->where('penempatan.id', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function update_penempatan($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('penempatan', $data);
    }

    public function delete_penempatan($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('penempatan');
    }

    public function getPenempatanKaryawan() {
        $this->db->select('penempatan.id, lokasi.nama_lokasi, karyawan.nama_karyawan, jabatan.jabatan, penempatan.nik, penempatan.tmt, penempatan.tgl_mulai, penempatan.tgl_selesai, gada.gada, karyawan.ttl, karyawan.no_telp, karyawan.alamat, karyawan.no_kk, karyawan.no_ktp, kawin.status_kawin, karyawan.nama_ibu');
        $this->db->from('penempatan');
        $this->db->join('karyawan', 'penempatan.id_karyawan = karyawan.id', 'left');
        $this->db->join('lokasi', 'penempatan.id_lokasi = lokasi.id', 'left');
        $this->db->join('jabatan', 'penempatan.id_jabatan = jabatan.id', 'left');
        $this->db->join('gada', 'karyawan.id_gada = gada.id', 'left');
        $this->db->join('kawin', 'karyawan.id_kawin = kawin.id', 'left');
        $this->db->where('karyawan.id IS NOT NULL');
        $this->db->where('penempatan.status_penempatan', 1); // Menambahkan kondisi status_penempatan = 1 (aktif)
        $query = $this->db->get();
        return $query->result();
    }

}
